<?php
  session_start();

  include "../admin_verify/admin_access.php";
  access('ADMIN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modify Rewards</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <link href="../style.css" rel="stylesheet">

  <script>
    $(document).ready(function () {
      // Attach a click event handler to the delete links
      $(".link-dark").on("click", function (e) {
        // Prevent the default action (following the link) from occurring
        e.preventDefault();

        // Store the href attribute of the clicked link
        var deleteLink = $(this).attr("href");

        // Display a confirmation dialog
        var isConfirmed = confirm("Are you sure you want to delete this reward?");

        // If the user clicks OK, redirect to the delete link
        if (isConfirmed) {
          window.location.href = deleteLink;
        }
        // If the user clicks Cancel, do nothing
      });
    });
  </script>

<style>
.popup {
        display: none;
        position: absolute;
        top: 5%;
        left: 55%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        padding: 10px;
        border: 1px solid #d4d4d4;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            <li><a href="/admin/modifyRewards"><i class="fas fa-edit"></i>Modify Rewards</a></li>
            <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
            <li><a href="/rewards/log"><i class="fas fa-history"></i>Activity Log</a></li>
            <li><a href="/rewards/manage_tickets"><i class="fas fa-ticket-alt"></i>Manage Tickets</a></li>
            <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
          </ul> 
    </div>
    <div class="main_content">
        <div class="info">
        <?php
            if (!empty($_SESSION['message'])) {
                $message = $_SESSION['message'];
                // Display the message in a popup
                echo '<div class="popup" id="popupMessage" style="color: #000000">' . $message . '</div>';
                unset($_SESSION['message']);
            }
            ?>

        <?php
        $reward_list = getAllRewards();
        ?>
        <h2 style="color: #000000;display: inline-block;margin-right: 20px;">Recycling Rewards</h2>
        <a class="btn btn-dark btn" href="addReward" style="width:150px" role="button">Add a Reward</a>
        <br>
        <div id="reward_display">
            <?php if ($reward_list != null) { foreach ($reward_list as $reward) : ?>
                <div class="card" style="width: 22%; margin:1%;display:inline-block;">
                    <div height="250px" class="card-img-top" style="overflow: hidden;">
                        <img height="250px" width="100%" style="object-fit: cover;" alt="Reward Image" src='<?php echo $reward['img_link']; ?>' />
                    </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reward['name']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $reward['price']; ?> Points</h6>
                            <form method="POST">
                                <input name="reward_id" style="display: none;" 
                                <?php $reward_id = $reward['id']; echo " value=\"$reward_id \"";?> ></input>
                                <a class="btn btn-dark btn" href="updateReward.php?id=<?php echo $reward_id?>" style="width:100px; margin-right: 10px;" role="button">Modify</a>
                                <a class="link-dark" href="deleteReward.php?id=<?php echo $reward_id?>"><i class="fas fa-trash-alt fa-lg"></i></a>
                            </form>
                        </div>
                    </div>
                <?php endforeach; } else {echo "Error: Unable to load rewards";} ?>
            </div>
        </div>
      </div>
</div>

<script>
    // Function to show the popup message and hide it after a delay
    function showPopup() {
        var popup = document.getElementById('popupMessage');
        if (popup) {
            popup.style.display = 'block';
            setTimeout(function () {
                popup.style.display = 'none';
            }, 5000); // Adjust the duration in milliseconds (3 seconds in this example)
        }
    }

    // Call the function to show the popup
    showPopup();
</script>
</body>
</html>