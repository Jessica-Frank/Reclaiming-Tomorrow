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
    <title>Search Users</title>
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
            <div class="container my-5" style="text-align: center;">
            <form method="post">
                <input type="text" placeholder="Search Users" name="search" size="60">
                <button class="btn btn-dark btn-sm" name="submit">Search</button>
            </form>

            <div class="container my-5">
                <table class="table table-hover">
                    <?php
                    if(isset($_POST['submit'])){
                        $search=$_POST['search'];
                        $sql="SELECT * FROM users WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'";
                        $result=mysqli_query($db,$sql);
                        if($result){
                            if(mysqli_num_rows($result) > 0) {
                                echo '<thead class="table-dark">
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                </tr>
                                </thead>
                                ';
                                while($row=mysqli_fetch_assoc($result)){
                                echo '<tbody>
                                <tr>
                                <td><a href="userProfile.php?id='.$row['id'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['id'].'</a></td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                </tr>
                                </tbody>
                                ';
                                }
                            } else {
                                echo '<h2 class=text-danger>No users found</h2>';
                            }
                        } 
                    }
                    ?>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>