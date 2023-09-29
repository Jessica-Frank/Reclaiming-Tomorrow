<?php
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

        //Return the claimed ticket's data
        return $check_result[0];
    } catch (PDOException $ex) {
        echo $ex->getMessage();
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
        echo $ex->getMessage();
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
            return $reward_data;
        } else {
            return null;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
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
        echo $ex->getMessage();
        return null;
    }
}
