<?php
require '../connect.php';

session_start();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    // Display the message in a popup
    echo '<div class="popup" id="popupMessage" style="color: #000000">' . $message . '</div>';
    unset($_SESSION['message']);
}

$data = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$data";
$result = mysqli_query($db, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $user_name = $row['name'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <title>User Profile</title>
    <style>
        .flex-box2{ /*Used to hold SQL content within the Admin pages. As seen on the User Profiles & Modify Points pages*/
            width: auto;
            height: auto;
            background-color: #9DC08B;
            line-height: 20px;
            border-radius: 20px;
            margin: 20px;
            color: #000000;
            justify-content: center;
            text-align: center;
        }

        .popup {
            display: none;
            position: absolute;
            top: 5%;
            left: 55%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 10px;
            border: 1px solid #d4d4d4;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            width: 40%;
            margin: 10px auto; /* Adjust margin as needed */
            padding: 20px; /* Adjust padding as needed */
            border-radius: 10px;
            background-color: #9DC08B; /* Set the background color of the container */
            box-shadow: 0px 50px 100px -20px rgba(50,50,93,0.25),
                0px 30px 60px -30px rgba(0,0,0,0.3),
                0px -2px 6px 0px rgba(10,37,64,0.35) inset;
        }

        .inside {
            width: 80%;
            margin: 10px auto;
            border-radius: 10px;
            background-color: #ffffff; /* Set the background color of the container */
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .label, .value {
            color: #000000;
            font-size: 28px;
        }

        .label {
            font-weight: bold;
            margin-bottom: 5px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <?php include "../admin/header.php"; ?>

        <div class="wrapper">
            <div class="sidebar"><i class=""></i>
                <ul>
                    <li><a href="/admin/dashboard"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="/admin/search"><i class="fas fa-user"></i>Search Users</a></li>
                    <li><a href="/admin/modifyContent"><i class="fas fa-recycle"></i>Modify Content</a></li>
                    <li><a href="/admin/modifyRewards"><i class="fas fa-ticket-alt"></i>Modify Rewards</a></li>
                    <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
                    <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
                </ul>
            </div>
            <div class="main_content">
                <div style="text-align:center;">
                    <br>
                </div>
                <div class="info">
                    <div class="container my-5" style="text-align: center;">
                        <div class="form-container">
                            <div class="inside">
                                <h1 style="margin-top: 20px;margin-bottom: 20px; color: #000000;"><?= $row['name'] ?></h1>
                                
                                <!-- Displaying information with labels on top of values -->
                                <div class="info-item">
                                    <span class="label">ID</span>
                                    <span class="value"><?= $row['id'] ?></span>
                                </div>

                                <div class="info-item">
                                    <span class="label">Username</span>
                                    <span class="value"><?= $row['username'] ?></span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="label">Reward Points</span>
                                    <p style="margin: 0;">
                                    <span class="value"><?= $row['reward_points'] ?></span>
                                    <a class="fas fa-edit link-underline-opacity-0 link-dark" href="updatePoints.php?id=<?= $row['id'] ?>" role="button"></a>
                                    </p>
                                </div>

                                <div class="info-item">
                                    <span class="label">Email</span>
                                    <span class="value"><?= $row['email'] ?></span>
                                </div>

                                <!-- Buttons at the bottom -->
                                <p style="margin-top: 30px">
                                    <a class="btn btn-dark btn" href="/admin/search" style="width:100px" role="button">Back</a>
                                    <a class="btn btn-dark btn" href="/admin/composeMessage?id=<?= $row['id'] ?>" style="width:100px" role="button">Message</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                    <?php
                    $sql = "SELECT * FROM reward_point_log WHERE user_id=$data ORDER BY date DESC";
                    $result = mysqli_query($db, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="flex-box2">
                            <div style="text-align: center;">
                                <h1 style="margin-top: 20px"><?= $user_name ?>'s Reward History</h1>
                            </div>
                            <div>
                                <table style="width: 500px;margin-right: 20px;margin-left: 20px" class="table table-hover">
                                    <thead class="table-dark">
                                    <tr>
                                        <th style="width: 100px;">Date Redeemed</th>
                                        <th>Reward</th>
                                        <th>Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sql2 = "SELECT * FROM rewards";
                                        $result2 = mysqli_query($db, $sql2);

                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            if ($row['reward_id'] == $row2['id']) {
                                                $reward_name = $row2['name'];
                                                $reward_cost = $row2['price'];
                                                break;
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td style="width: 175px;"><?= $row['date'] ?></td>
                                            <td style="width: 175px;"><?= $reward_name ?></td>
                                            <td style="width: 150px;"><?= $reward_cost ?></td>
                                        </tr>

                                    <?php } // end while ?>

                                    </tbody>
                                </table>
                                <a class="btn btn-dark btn" href="/admin/giveReward?id=<?= $data ?>" style="width:150px" role="button">Give Reward</a>
                            </div>
                        </div>
                    <?php } // end if ?>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php } // end if ?>
