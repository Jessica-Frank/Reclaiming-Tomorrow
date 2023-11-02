<?php
  session_start();

  include "../admin_verify/admin_access.php";
  access('ADMIN');
?>

<?php
require '../connect.php';
?>

<?php
$data=$_GET['id'];
$sql="SELECT * FROM users WHERE id=$data";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$user_name=$row['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reclaiming Tomorrow</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <link href="../style.css" rel="stylesheet">
</head>
<body>
<?php include "../admin/header.php"; ?>
<?php require "../database/reward_db_access.php"; ?>

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
        <div class="info">
        <?php
            if(!empty($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo '<h2 style="color: #000000">'.$message.'</h2>';
                unset($_SESSION['message']);
            }
        ?>

        <?php
        $reward_list = getAllRewards();
        ?>
        <h2 style="color: #000000;display: inline-block;margin-right: 20px;">Select a reward to give to <?php echo $user_name; ?></h2>
        <a class="btn btn-dark btn" href="/admin/userProfile?id=<?php echo $data?>" style="width:100px" role="button">Back</a>
        <br>
        <div id="reward_display">
            <?php if ($reward_list != null) { foreach ($reward_list as $reward) : ?>
                <div class="card" style="width: 22%; margin:1%;display:inline-block;">
                    <div height="250px" class="card-img-top" style="overflow: hidden;">
                        <img height="250px" width="100%" style="object-fit: cover;" alt="Reward Image" src='<?php echo $reward['img_link']; ?>' />
                    </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reward['name']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $reward['price']; ?> Points</h6>
                            <form method="POST">
                                <input name="reward_id" style="display: none;" 
                                <?php $reward_id = $reward['id']; echo " value=\"$reward_id \"";?> ></input>
                                <a class="btn btn-dark btn" href="giveRewardFxn.php?reward_id=<?php echo $reward_id?>&user_id=<?php echo $data?>" style="width:100px; margin-right: 10px;" role="button">Select</a>
                            </form>
                        </div>
                    </div>
                <?php endforeach; } else {echo "Error: Unable to load rewards";} ?>
            </div>
        </div>
      </div>
</div>

</body>
</html>