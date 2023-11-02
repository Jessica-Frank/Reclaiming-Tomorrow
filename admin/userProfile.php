<?php
require '../connect.php';
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
    <title>Profile</title>
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
                <?php
                session_start();
                if(!empty($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    echo '<h2 style=color: #000000">'.$message.'</h2>';
                    unset($_SESSION['message']);
                }
                ?>
            </div>
            <div class="info">
            <?php
                $data=$_GET['id'];
                $sql="SELECT * FROM users WHERE id=$data";
                $result=mysqli_query($db,$sql);
                if($result){
                    $row=mysqli_fetch_assoc($result);
                    $user_name=$row['name'];
                    echo '<div class="flex-container">
                        <div class="flex-box">
                        <h1 style="margin-top: 20px">'.$row['name'].'</h1>
                        <p style="margin-right: 20px;margin-left: 20px">
                            Reward Points: '.$row['reward_points'].'
                            <a class="fas fa-edit link-underline-opacity-0 link-light" href="updatePoints.php?id='.$row['id'].'" role="button"></a>
                        </p>
                        <p style="margin-right: 20px;margin-left: 20px">
                            ID: '.$row['id'].'
                        </p>
                        <p style="margin-right: 20px;margin-left: 20px">
                            Username: '.$row['username'].'
                        </p>
                        <p style="margin-right: 20px;margin-left: 20px">
                            Email: '.$row['email'].'
                        </p>
                        <p>
                            <a class="btn btn-dark btn" href="/admin/search" style="width:100px" role="button">Back</a>
                            <a class="btn btn-dark btn" href="/admin/composeMessage?id='.$row['id'].'" style="width:100px" role="button">Message</a>
                        </p>
                    </div>';
                }
                $sql = "SELECT * FROM reward_point_log WHERE user_id=$data ORDER BY date DESC";
                $result = mysqli_query($db, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<div class="flex-box2">';
                        
                        echo '<div style="text-align: center;">';
                        echo '<h1 style="margin-top: 20px">' . $user_name . '\'s Reward History</h1>';
                        echo '</div>';

                        echo '<div>';
                        echo '<table style="width: 500px;margin-right: 20px;margin-left: 20px" class="table table-hover">';
                        echo '<thead class="table-dark">
                        <tr>
                        <th style="width: 100px;">Date Redeemed</th>
                        <th>Reward</th>
                        <th>Cost</th>
                        </tr>
                        </thead>';

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

                            echo '<tbody>
                            <tr>
                            <td style="width: 175px;">' . $row['date'] . '</td>
                            <td style="width: 175px;">' . $reward_name . '</td>
                            <td style="width: 150px;">' . $reward_cost . '</td>
                            </tr>
                            </tbody>';
                        }

                        echo '</table>';
                        echo '<a class="btn btn-dark btn" href="/admin/giveReward?id='.$data.'" style="width:150px" role="button">Give Reward</a>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '';
                    }
                }
            ?>
      </div>
    </div>
</div>
</body>
</html>
