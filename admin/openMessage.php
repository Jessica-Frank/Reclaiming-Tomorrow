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
    <title>Message</title>
</head>
<body>
<?php include "../admin/header.php"; ?>

<div class="wrapper">
        <div class="sidebar"><i class=""></i>
            <ul>
                <li><a href="/admin/dashboard"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="/admin/search"><i class="fas fa-user"></i>Search Users</a></li>
                <li><a href="#"><i class="fas fa-recycle"></i>Modify Content</a></li>
                <li><a href="#"><i class="fas fa-ticket-alt"></i>Modify Rewards</a></li>
                <li><a href="/admin/admin_inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="info">
            <?php
                $data=$_GET['id'];
                $sql="SELECT * FROM admin_inbox WHERE id=$data";
                $result=mysqli_query($db,$sql);
                if($result){
                    $row=mysqli_fetch_assoc($result);
                    echo '<div class="flex-container">
                        <div class="flex-box">
                        <h1 style="margin-top: 20px">'.$row['title'].'</h1>
                        <p style="margin-right: 20px;margin-left: 20px">
                           '.$row['date_sent'].'
                        </p>
                        <p style="margin-right: 20px;margin-left: 20px">
                            ID: '.$row['from_name'].'
                        </p>
                        <textarea rows="12" cols="40" style="margin-right: 20px;margin-left: 20px;margin-bottom: 10px;resize: none;text-align: left;padding: 5px;" readonly>'.$row['message'].'</textarea>
                        <p>
                            <a class="btn btn-dark btn" href="/admin/admin_inbox" role="button">Back</a>
                            <a class="btn btn-dark btn" href="reply.php?id='.$row['id'].'" style="width:100px" role="button">Reply</a>
                        </p>
                    </div>
                </div>';
                }
            ?>
      </div>
    </div>
</div>
</body>
</html>


