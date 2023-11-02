<?php
  session_start();

  include "../admin_verify/admin_access.php";
  access('ADMIN');
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
          <div>INSERT HOME PAGE HERE WHEN IT'S FINISHED</div>
      </div>
    </div>
</div>

</body>
</html>