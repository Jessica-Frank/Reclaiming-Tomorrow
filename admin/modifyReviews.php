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

    <script>
        $(document).ready(function () {
        // Attach a click event handler to the delete links
        $(document).on("click", ".link-dark", function (e) {
            // Prevent the default action (following the link) from occurring
            e.preventDefault();

            // Store the href attribute of the clicked link
            var deleteLink = $(this).attr("href") || $(this).data("href");

            // Display a confirmation dialog
            var isConfirmed = confirm("Are you sure you want to delete this?");

            // If the user clicks OK, redirect to the delete link
            if (isConfirmed) {
                window.location.href = deleteLink;
            }
            // If the user clicks Cancel, do nothing
        });
    });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <title>Modify Reviews</title>
    <style>
 /* Add this line to the top of your CSS to import the desired font */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

/* Rest of your CSS remains unchanged */

.button-container {
    display: flex;
}

.button,
.button-back {
    font-family: 'Roboto', sans-serif; /* Apply the new font family */
    margin: 10px;
    padding: 10px;
    background-color: #000000;
    color: #fff;
    border: 1px solid #000;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.button:hover {
    background-color: #333;
}

.reviews-container {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.review {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 15px;
    font-weight: bolder;
    color: #F9F7F7; 
    text-align: left;
    width: calc(50% - 20px);
    background: linear-gradient(45deg, #9DC08B, #5A8F58); /* Gradient background */
    transition: transform 0.3s, box-shadow 0.3s; /* Add box-shadow transition */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box-shadow */
}

.review:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Increase box-shadow on hover for a glow effect */
}


.review h3 {
    font-family: 'Roboto', sans-serif; /* Apply the new font family */
    font-size: 20px;
    margin: 0;
}

.review p {
    margin: 10px 0;
}

.review .location {
    color: #3282B8;
    font-weight: bold;
}

.review .rating {
    color: #FF2E63;
    font-weight: bold;
}

.review .stars {
    color: #FFD700;
    font-size: 24px;
    animation: tilt-n-move-shaking 1s infinite;
}

.review .message {
    font-size: 16px;
}

.reviews-title {
    font-family: 'Roboto', sans-serif; /* Apply the new font family */
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

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

@keyframes tilt-n-move-shaking {
  0% { transform: translate(0, 0) rotate(0deg); }
  25% { transform: translate(0.5px, 0.5px) rotate(0.5deg); }
  50% { transform: translate(0, 0) rotate(0eg); }
  75% { transform: translate(-0.5px, 0.5px) rotate(-0.5deg); }
  100% { transform: translate(0, 0) rotate(0deg); }
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
        <?php
            if (!empty($_SESSION['message'])) {
                $message = $_SESSION['message'];
                // Display the message in a popup
                echo '<div class="popup" id="popupMessage" style="color: #000000">' . $message . '</div>';
                unset($_SESSION['message']);
            }
            ?>
        <div class="reviews-container">
        <?php
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $result=mysqli_query($db,$sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="review">';
                    echo '<h3 style="color: #000">'.$row["name"].'</h3>';
                    echo '<p style="color: #000"><span class="location">Location: </span>'.$row["location"].'</p>';
                    echo '<p><span class="rating">Rating:</span>'.getStars($row["rating"]).'</p>'; // Display stars for rating
                    echo '<p style="color: #000" class="message">'.$row["message"].'</p>';
                    echo '<a class="btn btn-dark btn" href="updateReview.php?id='.$row["id"].'" style="width:100px; margin-right: 10px;" role="button">Modify</a>';
                    echo '<a class="link-dark" href="deleteReview.php?id='.$row["id"].'"><i class="fas fa-trash-alt fa-lg"></i></a>';
                    echo '</div>';
                }
            } else {
                echo "No reviews yet.";
            }

            echo '</div>';

            function getStars($rating) {
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        $stars .= '<i class="fas fa-star stars"></i>';
                    } else {
                        $stars .= '<i class="far fa-star stars"></i>';
                    }
                }
                return $stars;
            }
        ?>
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