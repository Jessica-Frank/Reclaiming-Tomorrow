<?php
function claimTicket($ticket_id, $username) {
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
        $claim_statement->bindParam(':user', $username, PDO::PARAM_STR);
        $claim_statement->execute();

        //Add the points
        $sql_add = "UPDATE users SET reward_points = reward_points + :points 
        WHERE username = :user";
        $add_statement = $connection->prepare($sql_add);
        $add_statement->bindParam(':points', $check_result[0]['point_value'], PDO::PARAM_STR);
        $add_statement->bindParam(':user', $username, PDO::PARAM_STR);
        $add_statement->execute();

        //Return the claimed ticket's data
        return $check_result[0];
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        return null;
    }
}

function getRewards() {
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

function getUserPoints($username) {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "SELECT reward_points FROM users WHERE username = :username";
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchColumn(0);
        return $result;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        return null;
    }
}
