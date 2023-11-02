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
    <title>Modify Reviews</title>
    <style>
    .button-container {
        display: flex;
    }

    .button {
        margin: 10px;
        padding: 10px;
        background-color: #000000; 
        color: #fff; 
        border: 1px solid #000;
        border-radius: 5px;
        cursor: pointer;
    }

    .button.button-back {
        background-color: #000000; 
        color: #fff; 
        border: 1px solid #000; 
        border-radius: 5px;
        cursor: pointer;
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
        border-radius: 5px;
        padding: 10px;
        text-align: left;
        width: calc(50% - 20px); 
        background-color: #9DC08B; 
    }

    .review h3 {
        font-size: 18px;
        margin: 0;
    }

    .review p {
        margin: 5px 0;
    }

    .review .location {
        color: #007BFF;
        font-weight: bold;
    }

    .review .rating {
        color: #28A745;
        font-weight: bold;
    }

    .review .stars {
        color: #FFD700; /* Yellow color for stars */
        font-size: 20px; 
    }

    .review .message {
        font-size: 14px;
    }

    .reviews-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
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
            <li><a href="/admin/modifyRewards"><i class="fas fa-ticket-alt"></i>Modify Rewards</a></li>
            <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
            <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
            </ul> 
        </div>
        <div class="main_content">
        <div class="info">
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
</body>
</html>