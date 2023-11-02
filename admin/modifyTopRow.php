<?php
require '../connect.php';
?>

<?php
$county=$_GET['id'];
$sql="SELECT * FROM county_search WHERE County='$county'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$accepted_materials=$row['Accepted Materials'];
$local_events=$row['Local Events'];
$schedule=$row['Pick-up Schedule'];

if(isset($_POST['submit'])){
    $accepted_materials=$_POST['Accepted_Materials'];
    $local_events=$_POST['Local_Events'];
    $schedule=$_POST['Pickup_Schedule'];

    $sql = "UPDATE county_search SET `Accepted Materials`='$accepted_materials', `Local Events`='$local_events', `Pick-up Schedule`='$schedule' WHERE `County`='$county'";
    $result = mysqli_query($db, $sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully updated!';
        header('location:../admin/countyPreview.php?id='.$county.'');
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
    <title>Update Top Row</title>
    <style>
        .custom-textarea {
        width: 550px;
        height: 100px;
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
            <div class="info">
            <div class="flex-container">
                <div class="flex-box">
                    <form method="post" style="margin-top: 20px; margin-bottom: 20px">
                        <div>
                            <h1><?php echo $county." County";?></h1>
                        </div>
                        <div>
                            <label>Accepted Materials:</label>
                            <textarea class="custom-textarea" style="margin-right: 20px;margin-left: 20px;line-height: 100%;margin-bottom: 10px;margin-top: 10px;text-align: left;padding: 5px;" name="Accepted_Materials"><?php
                            echo $accepted_materials;?></textarea>
                            <label>Local Events:</label>
                            <textarea class="custom-textarea" style="margin-right: 20px;margin-left: 20px;line-height: 100%;margin-bottom: 10px;margin-top: 10px;text-align: left;padding: 5px;" name="Local_Events"><?php
                            echo $local_events;?></textarea>
                            <label>Pick-up Schedule:</label>
                            <textarea class="custom-textarea" style="margin-right: 20px;margin-left: 20px;line-height: 100%;margin-bottom: 10px;margin-top: 10px;text-align: left;padding: 5px;" name="Pickup_Schedule"><?php
                            echo $schedule;?></textarea>
                        </div>

                        <a class="btn btn-dark btn" href="/admin/countyPreview.php?id=<?php echo $county ?>" style="width:60px" role="button">Back</a>
                        <button type="submit" class="btn btn-dark" name="submit">Update</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>