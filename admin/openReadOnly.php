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
    <title>Open Message</title>

    <style>
        .form-container {
            width: 40%;
            margin: 20px auto;
            padding: 10px;
            border-radius: 10px;
            background-color: #9DC08B;
            box-shadow: 0px 50px 100px -20px rgba(50, 50, 93, 0.25),
                0px 30px 60px -30px rgba(0, 0, 0, 0.3),
                0px -2px 6px 0px rgba(10, 37, 64, 0.35) inset;
            text-align: center;
            color: #000;
        }

        .form-container textarea {
            width: 90%;
            border-radius: 20px;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
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
            <li><a href="/admin/modifyRewards"><i class="fas fa-edit"></i>Modify Rewards</a></li>
            <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
            <li><a href="/rewards/log"><i class="fas fa-history"></i>Activity Log</a></li>
            <li><a href="/rewards/manage_tickets"><i class="fas fa-ticket-alt"></i>Manage Tickets</a></li>
            <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
          </ul> 
        </div>
        <div class="main_content">
            <div class="info">
            <?php
                $data=$_GET['id'];
                $sql="SELECT *, DATE_FORMAT(date_sent, '%b %e, %Y %H:%i:%s') AS date_sent FROM admin_inbox WHERE id=$data";
                $result=mysqli_query($db,$sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
            ?>
                    <div class="flex-container">
                    <div class="form-container">
                            <h1 style="margin-top: 20px"><?= $row['title'] ?></h1>
                            <p style="margin-right: 20px;margin-left: 20px">
                                <?= $row['date_sent'] ?>
                            </p>
                        <div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <textarea 
                                style="resize: none; text-align: left; padding: 5px;"
                                name="message" readonly><?= $row['message'] ?></textarea>
                        </div>

                        <p class="text-center">
                            <a class="btn btn-dark btn" href="/admin/sent" style="margin-bottom: 5px" role="button">Back</a>
                        </p>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</body>

</html>


