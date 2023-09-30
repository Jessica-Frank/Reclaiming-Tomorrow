<?php
require '../connect.php';
?>

<?php
$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$reward_points=$row['reward_points'];

if(isset($_POST['submit'])){
    $reward_points=$_POST['reward_points'];

    $sql="UPDATE users SET reward_points='$reward_points' WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully updated points!';
        header('location:../admin/userProfile.php?id='.$id.'');
    } else {
        die(mysqli_error($db));
    }
}
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
    <link rel="stylesheet" href="../admin_css/dash_custom.css">
    <title>Update Points</title>
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
                <li><a href="#"><i class="fas fa-envelope"></i>Inbox</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="info">
            <div class="flex-container">
                <div class="flex-box">
                    <form method="post" style="margin-top: 20px; margin-bottom: 20px">
                        <div>
                            <h1><?php echo $name;?></h1>
                        </div>
                        <div>
                            <label>Reward Points:</label>
                            <input type="text" placeholder="points" name="reward_points" value="<?php
                            echo $reward_points;?>" size="5">
                        </div>

                        <a class="btn btn-dark btn" href="/admin/userProfile.php?id=<?php echo $id ?>" style="width:60px" role="button">Back</a>
                        <button type="submit" class="btn btn-dark" name="submit">Update Points</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>