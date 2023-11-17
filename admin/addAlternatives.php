<?php
require '../connect.php';
?>

<?php
$county=$_GET['id'];

if(isset($_POST['submit'])){
    $placeholder=$_POST['placeholder'];
    $link=$_POST['link'];

    $sql="INSERT INTO county_alternatives (County, Placeholder, Link)
    VALUES('$county','$placeholder','$link')";
    $result=mysqli_query($db,$sql);
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
    <title>Add Links</title>
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
            <div class="flex-container">
                <div class="flex-box">
                    <form method="post" style="margin-top: 20px; margin-bottom: 20px" id="add_form">
                        <div id="show_links">
                        <div id="contain_links">
                        <div>
                        <label>Placeholder:</label>
                        <input type="text" name="placeholder">
                        </div>
                        <div>
                        <label>Link:</label>
                        <input type="text" name="link">
                        </div>
                        </div>
                        </div>

                        <a class="btn btn-dark btn" href="/admin/countyPreview.php?id=<?php echo $county ?>" style="width:60px" role="button">Back</a>
                        <button type="submit" class="btn btn-dark" name="submit" id="add_btn">Add Link</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>