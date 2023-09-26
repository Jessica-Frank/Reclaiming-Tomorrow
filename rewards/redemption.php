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
    require "../database/reward_db_access.php"; ?>

    <div class="container">
        <?php
        $reward_list = getRewards();
        
        if (isset($_POST['ticket_num'])) {
            $ticket = claimTicket($_POST['ticket_num'], "test");
        }
        $points_available = getUserPoints("test");
        ?>
        <h2>Recycling Rewards</h2>

        <h6>Earn tickets by recycling at supporting locations</h6>
        <h5 style="margin-top: 2rem;">Your current points: <?php echo $points_available; ?></h5>
        <div id="ticket_div" style="width: 50%; padding:2%;">
            <p>Redeem your tickets to earn points, which you can use to get rewards!</p>
            <div style="display: inline-block; margin-bottom:2%;" id="ticket_input_div">
                <form method="POST">
                    <input placeholder="Ticket number" name="ticket_num" required style="vertical-align: middle;"></input>
                    <button class="btn btn-dark" type="submit">Redeem</button>
                </form>
            </div>
            <?php if (isset($_POST['ticket_num'])) {
                if ($ticket != null) {
            ?>
                    <div class="alert alert-success" role="alert">
                        Ticket <span><?php echo $_POST['ticket_num']; ?></span>
                        successfully redeemed for
                        <span><?php echo $ticket['point_value']; ?></span> points
                    </div>
                <?php

                } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Unable to redeem ticket <span><?php echo $_POST['ticket_num']; ?></span>.
                        <br>Please check that the code has been entered correctly.
                    </div>
            <?php }
            } ?>
        </div>
        <div id="reward_display">
            <?php foreach ($reward_list as $reward) : ?>
                <div class="card" style="width: 22%; margin:1%;display:inline-block;">
                    <div height="250px" class="card-img-top" style="overflow: hidden;">
                        <img height="250px" width="100%" style="object-fit: cover;" alt="Reward Image" src='<?php echo $reward['img_link']; ?>' />
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $reward['name']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $reward['price']; ?> Points</h6>

                        <?php if ($points_available >= $reward['price']) { ?>
                            <button class="btn btn-dark">Redeem!</button>
                        <?php } else { ?>
                            <button class="btn btn-disabled" disabled>Not enough points</button>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>