<?php
require '../connect.php';
?>

<?php
$id=$_GET['id'];
$sql="SELECT * FROM admin_inbox WHERE id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$user_id=$row['from_id'];
$user_name=$row['from_name'];
$reply_title="RE: ".$row['title'];

if(isset($_POST['submit'])){
    $from_id=0;
    $from_name="admin";
    $to_id=$user_id;
    $message=$_POST['message'];
    $title=$reply_title;

    $sql="INSERT INTO user_inbox (from_id, from_name, to_id, message, title)
    VALUES('$from_id','$from_name','$to_id','$message','$title')";
    $result=mysqli_query($db,$sql);
    if($result){
    } else {
        die(mysqli_error($db));
    }

    $sql="INSERT INTO admin_inbox (from_id, from_name, to_id, message, title)
    VALUES('$from_id','$from_name','$to_id','$message','$title')";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully sent message!';
        header('location:../admin/admin_inbox');
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
    <title>Reply</title>

    <script>
        function countChar(val) {
        var len = val.value.length;
        if (len >= 255) {
            val.value = val.value.substring(0, 255);
        } else {
            $('#charNum').text(255 - len);
        }
        };
    </script>

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
            <div class="flex-container">
                <div class="flex-box">
                    <form method="post" style="margin-top: 20px; margin-bottom: 20px">
                        <div>
                            <h1><?php echo $reply_title;?></h1>
                            <p>
                                To: <?php echo $user_name;?>
                            </p>
                        </div>
                        <div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <textarea rows="12" cols="40" onkeyup="countChar(this)" style="margin-right: 20px;margin-left: 20px;margin-bottom: 10px;resize: none;text-align: left;padding: 5px;" placeholder="Type message here" name="message"></textarea>
                            <div id="charNum" style="margin-bottom: 20px;text-align: left;margin-right: 20px;margin-left: 93px;"></div>
                        </div>

                        <a class="btn btn-dark btn" href="/admin/openMessage.php?id=<?php echo $id?>" style="width:60px" role="button">Back</a>
                        <button type="submit" class="btn btn-dark" name="submit">Send</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>