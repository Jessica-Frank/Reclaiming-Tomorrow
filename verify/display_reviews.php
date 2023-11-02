<?php
$conn = new mysqli("localhost", "root", "", "reclaiming_tomorrow_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<style>
    * {
    
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
    
    
    }
    body {
    padding-top: 10px;
    flex-direction: column;
    min-height: 100vh;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

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

</style>';

echo '<div class="header">
    <h2 class="reviews-title">Recent Reviews</h2>
    <div class="button-container">
        
        <a href="reviews.php" class="button">Write a Review</a> <!-- Link to "Write a Review" -->
        <a href="dashboard.php" class="button button-back">Back</a> <!-- Link to "Back" -->
    </div>
</div>';

echo '<div class="reviews-container">';

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="review">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p><span class="location">Location:</span> ' . $row["location"] . '</p>';
        echo '<p><span class="rating">Rating:</span> ' . getStars($row["rating"]) . '</p>'; // Display stars for rating
        echo '<p class="message">' . $row["message"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No reviews yet.";
}

echo '</div>'; // Close reviews-container

$conn->close();

// Function to generate star icons based on the rating
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



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<title>Reclaiming Tomorrow</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <body style="background-color: #FAF1E4;">