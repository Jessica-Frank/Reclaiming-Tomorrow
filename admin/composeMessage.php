<?php
require '../connect.php';
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$user_name = $row['name'];

if (isset($_POST['submit'])) {
    $from_id = 0;
    $from_name = "admin";
    $to_id = $id;
    $message = $_POST['message'];
    $title = $_POST['title'];

    $sql = "INSERT INTO user_inbox (from_id, from_name, to_id, message, title, read_receipt)
    VALUES('$from_id','$from_name','$to_id','$message','$title',1)";
    $result = mysqli_query($db, $sql);
    if ($result) {
    } else {
        die(mysqli_error($db));
    }

    $sql = "INSERT INTO admin_inbox (from_id, from_name, to_id, message, title)
    VALUES('$from_id','$from_name','$to_id','$message','$title')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        session_start();
        $_SESSION['message'] = 'Successfully sent message!';
        header('location:../admin/userProfile.php?id=' . $id . '');
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
                    <div class="form-container">
                        <form method="post" style="margin-top: 20px; margin-bottom: 20px">
                            <div>
                                <h3>Message to <?php echo $user_name?></h3>
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

                            <a class="btn btn-dark btn" href="/admin/userProfile.php?id=<?php echo $id?>"
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
