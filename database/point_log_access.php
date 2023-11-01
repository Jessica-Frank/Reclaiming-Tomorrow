<?php
function getLogData()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "SELECT * FROM reward_point_log ORDER BY date DESC";
        $statement = $connection->prepare($sql_command);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    } catch (PDOException $ex) {
        return null;
    }
}

function logTicketRedemption($user_id, $ticket_code, $ticket_points)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "INSERT INTO reward_point_log (user_id, point_change, ticket_code, action_name) VALUES (:user_id, :point_change, :ticket_code, 'REDEEM_TICKET')";
        
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':point_change', $ticket_points, PDO::PARAM_INT);
        $statement->bindParam(':ticket_code', $ticket_code, PDO::PARAM_INT);
        $statement->execute();

        return true;
    } catch (PDOException $ex) {
        return null;
    }
}

function logRewardRedemption($user_id, $reward_id, $reward_cost)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "INSERT INTO reward_point_log (user_id, reward_id, point_change, action_name) VALUES (:user_id, :reward_id, :point_change, 'CLAIM_REWARD')";
        
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':reward_id', $reward_id, PDO::PARAM_INT);
        $point_change = (0 - $reward_cost);
        $statement->bindParam(':point_change', $point_change, PDO::PARAM_INT);
        $statement->execute();
        
        return true;
    } catch (PDOException $ex) {
        return false;
    }
}

function logAdminPointChange($user_id, $admin_id, $old_points, $new_points)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", "root", "");
        $sql_command = "INSERT INTO reward_point_log (user_id, admin_id, point_change, action_name) VALUES (:user_id, :admin_id, :point_change, 'ADMIN_OVERWRITE')";
        
        $statement = $connection->prepare($sql_command);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $point_change = $new_points - $old_points;
        $statement->bindParam(':point_change', $point_change, PDO::PARAM_INT);
        $statement->execute();
        
        return true;
    } catch (PDOException $ex) {
        return false;
    }
}
