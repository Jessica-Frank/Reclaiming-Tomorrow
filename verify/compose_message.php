<?php
require '../connect.php';
?>

<?php
$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$user_name=$row['name'];

if(isset($_POST['submit'])){
    $from_id=$id;
    $from_name=$user_name;
    $to_id="admin";
    $message=$_POST['message'];
    $title=$_POST['title'];

    $sql="INSERT INTO user_inbox (from_id, from_name, to_id, message, title)
    VALUES('$from_id','$from_name','$to_id','$message','$title')";
    $result=mysqli_query($db,$sql);
    if($result){
    } else {
        die(mysqli_error($db));
    }

    $sql="INSERT INTO admin_inbox (from_id, from_name, to_id, message, title, read_receipt)
    VALUES('$from_id','$from_name','$to_id','$message','$title',1)";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully sent message!';
        header('location:../verify/inbox');
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <title>Compose</title>

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

    <style>
        .form-container {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #9DC08B;
            box-shadow: 0px 50px 100px -20px rgba(50, 50, 93, 0.25),
                0px 30px 60px -30px rgba(0, 0, 0, 0.3),
                0px -2px 6px 0px rgba(10, 37, 64, 0.35) inset;
            text-align: center;
            color: #000;
        }

        .form-container input,
        .form-container textarea {
            width: 90%;
            border-radius: 20px;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php include "../admin/header.php"; ?>

    <div class="wrapper">
    <div class="sidebar">
        <i class=""></i>
        <ul>
            <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
            <li><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
        </ul>
    </div>
        <div class="main_content">
            <div class="info">
                <div class="flex-container">
                    <div class="form-container">
                        <form method="post" style="margin-top: 20px; margin-bottom: 20px">
                            <div>
                                <h3>Message to admin</h3>
                            </div>
                            <div>
                                <input type="text" placeholder="Title" name="title">
                            </div>
                            <div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                <textarea onkeyup="countChar(this)"
                                    style="resize: none; text-align: left; padding: 5px;" placeholder="Type message here"
                                    name="message"></textarea>
                                <div id="charNum" style="margin-bottom: 20px;margin-left:22px; text-align: left;"></div>
                            </div>

                            <a class="btn btn-dark btn" href="/verify/inbox"
                                style="width:60px" role="button">Back</a>
                            <button type="submit" class="btn btn-dark" name="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
