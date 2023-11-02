<?php
require '../connect.php';
?>

<?php
  session_start();

  include "../admin_verify/admin_access.php";
  access('ADMIN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modify Contents</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <link href="../style.css" rel="stylesheet">
  <style>
        .line_box {
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .line_box2 {
        display: flex;
        align-items: center;
        }

        .line {
            height: 2px;
            background-color: #000;
            margin: 0 5px;
            width: 70px;
        }

        .word {
            font-size: 24px;
        }
    </style>
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
        <h1 style="text-align: center;color: #000000;">Select a County to Modify</h1>

        <?php
        $sql="SELECT DISTINCT County FROM county_search";
          $result=mysqli_query($db,$sql);
          if($result){
              if(mysqli_num_rows($result) > 0) {
                echo '<form method="post" action="search_results" style="text-align: center;">';

                while($row=mysqli_fetch_assoc($result)){
                  echo '<a class="btn btn-dark btn" href="countyPreview?id='.$row['County'].'" style="margin-right: 10px;margin-top: 20px" role="button">'.$row['County'].'</a>';
                }

              } else {
                  echo '<h2 class=text-danger>No counties found</h2>';
              }
          } 
        ?>

        <div class="line_box">
        <div class="line_box2" style="margin-top: 40px;margin-bottom: 5px;color: #000000;">
            <div class="line"></div>
            <div class="word">or</div>
            <div class="line"></div>
        </div>
        </div>

        <a class="btn btn-dark btn" href="addCounty" style="width:450px;font-size:45px;text-align: center;" role="button">Add a New County</a>

        </div>
    </div>
</div>

</body>
</html>