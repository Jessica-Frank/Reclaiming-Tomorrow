<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reclaiming Tomorrow - Rewards</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
</head>

<body>
    <?php include '../include/header.php';
    require "../database/reward_db_access.php";
    ?>

    <div class="container">
        <h1 class="center-heading">Points Log</h1>

        <table class="table table-hover">
            <thead class="table-dark">
                <td>User ID</td>
                <td>Time</td>
                <td>Point Change</td>
                <td>Action</td>
            <tbody>
                <?php
                $log_events = getLogData();
                foreach ($log_events as $event) {
                    echo "<tr>";
                    echo "<td>", $event['user_id'], "</td>";
                    echo "<td>", $event['date'], "</td>";
                    echo "<td>", $event['point_change'], "</td>";
                    if ($event['action_name'] == "REDEEM_TICKET") {
                        echo "<td>";
                        echo "Redeemed ticket with code \"", $event['ticket_code'], "\"";
                        echo "</td>";
                    }
                    elseif ($event['action_name'] == "CLAIM_REWARD") {
                        echo "<td>";
                        echo "Claimed reward #", $event['reward_id'],
                        " (", getRewardById($event['reward_id'])['name'], ")";
                        echo "</td>";
                    }
                    elseif ($event['action_name'] == "ADMIN_OVERWRITE") {
                        echo "<td>";
                        echo "Points changed by admin ", $event['admin_id'];
                        echo "</td>";
                    }
                    else {echo "<td>Error: Unrecognized Event</td>";}
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>