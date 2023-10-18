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
    <title>Inbox</title>
</head>
<body>
<?php include "../admin/header.php"; ?>

    <div style="text-align:center;">
        <?php
        session_start();
        if(!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            echo '<h2 style="color: #000000">'.$message.'</h2>';
            unset($_SESSION['message']);
        }
        ?>
    </div>
    <div class="info">
    <div class="container my-5" style="text-align: center;">
    <h1 style="color: #000000">Inbox / <a href="sent" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Sent</a></h1>
    <p><a href="compose_message?id=<?php echo $_SESSION['current'];?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Message an Admin</a></p>
    <div class="container my-5">
        <table class="table table-hover">
            <?php
                $to_id=$_SESSION['current'];
                $sql="SELECT * FROM user_inbox WHERE to_id='$to_id' ORDER BY id DESC";
                $result=mysqli_query($db,$sql);
                if($result){
                    if(mysqli_num_rows($result) > 0) {
                        echo '<thead class="table-dark">
                        <tr>
                        <th></th>
                        <th>From</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>
                        </tr>
                        </thead>
                        ';
                        while($row=mysqli_fetch_assoc($result)){
                        echo '<tbody>
                        <tr>
                        <td>'.($row['read_receipt'] != 0 ? "<i class=\"fas fa-circle fa-sm\"></i>" : "" ).'</td>
                        <td>'.$row['from_name'].'</td>
                        <td><a href="openMessage.php?id='.$row['id'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['title'].'</a></td>
                        <td>'.$row['date_sent'].'</td>
                        <td><a class="link-dark" href="deleteMessage.php?id='.$row['id'].'"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        </tbody>
                        ';
                        }
                    } else {
                        echo '<h2 class=text-danger>No messages found</h2>';
                    }
                } 
            ?>
        </table>
    </div>
</div>
</div>
</body>
</html>