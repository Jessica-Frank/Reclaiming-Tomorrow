<?php
require("point_log_access.php");

function claimTicket($ticket_id, $user_id)
{
    try {
        //Get the ticket with the given ID
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_check = "SELECT * FROM tickets WHERE id = :id && date_redeemed IS NULL";
        $check_statement = $connection->prepare($sql_check);
        $check_statement->bindParam(':id', $ticket_id, PDO::PARAM_STR);
        $check_statement->execute();
        $check_result = $check_statement->fetchAll();

        if (sizeof($check_result) == 0) {
            //If there are no unclaimed tickets with that ID...
            return null;
        }

        //Claim the ticket
        $sql_claim = "UPDATE tickets SET date_redeemed = UTC_TIMESTAMP(), 
        redeeming_user = :user WHERE id = :id ";
        $claim_statement = $connection->prepare($sql_claim);
        $claim_statement->bindParam(':id', $ticket_id, PDO::PARAM_STR);
        $claim_statement->bindParam(':user', $user_id, PDO::PARAM_STR);
        $claim_statement->execute();

        //Add the points
        $sql_add = "UPDATE users SET reward_points = reward_points + :points 
        WHERE id = :user_id";
        $add_statement = $connection->prepare($sql_add);
        $add_statement->bindParam(':points', $check_result[0]['point_value'], PDO::PARAM_STR);
        $add_statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $add_statement->execute();

        logTicketRedemption($user_id, $check_result[0]['point_value']);
        return $check_result[0];
    } catch (PDOException $ex) {
        echo "Error: Unable to claim this ticket. Please check that you are logged in.";
        return null;
    }
}

function getAllRewards()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "SELECT * FROM rewards";
        $statement = $connection->prepare($sql_command);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    } catch (PDOException $ex) {
        echo "Error: Unable to get the list of rewards";
        return null;
    }
}

function redeemReward($reward_id, $user_id)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $reward_sql = "SELECT * FROM rewards WHERE id = :id";
        $reward_statement = $connection->prepare($reward_sql);
        $reward_statement->bindParam(':id', $reward_id, PDO::PARAM_INT);
        $reward_statement->execute();
        $reward_data = $reward_statement->fetchAll()[0];

        $points_sql = "SELECT reward_points FROM users WHERE id = :user_id";
        $points_statement = $connection->prepare($points_sql);
        $points_statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $points_statement->execute();
        $user_points = $points_statement->fetchColumn(0);

        if ($user_points >= $reward_data['price']) {
            $spend_sql = "UPDATE users SET reward_points = reward_points - :price WHERE id = :user_id";
            $spend_statement = $connection->prepare($spend_sql);
            $spend_statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $spend_statement->bindParam(':price', $reward_data['price'], PDO::PARAM_INT);
            $spend_statement->execute();

            logRewardRedemption($user_id, $reward_id, $reward_data['price']);
            return $reward_data;
        } else {
            return null;
        }
    } catch (PDOException $ex) {
        echo "Error: Unable to redeem rewards. Please check that you are logged in.";
        return null;
    }
}

function getUserPoints($user_id)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "SELECT reward_points FROM users WHERE id = :user_id";
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchColumn(0);
        return $result;
    } catch (PDOException $ex) {
        echo "Error: Unable to load point data. Please check that you are logged in.";
        return null;
    }
}

function getTicketsFromOrg($organization)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "SELECT * FROM tickets WHERE organization = :user_org";
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':user_org', $organization, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    } catch (PDOException $ex) {
        return null;
    }
}

function addTicketForOrg($organization, $ticket_code, $ticket_points)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "INSERT INTO tickets (organization, id, point_value, date_created) VALUES (:org, :id, :points, UTC_TIMESTAMP())";
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':org', $organization, PDO::PARAM_STR);
        $ticket_code = strtoupper($ticket_code);
        $statement->bindParam(':id', $ticket_code, PDO::PARAM_STR);
        $statement->bindParam(':points', $ticket_points, PDO::PARAM_INT);
        $statement->execute();
        return true;
    } catch (PDOException $ex) {
        return false;
    }
}
