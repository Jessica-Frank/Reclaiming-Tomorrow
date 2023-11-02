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
        display: flex;
        flex-direction: column;
    }
    .logo {
        font-size: 1.2em; /* Adjust font size here */
        color: #FAF1E4;
        user-select: none;
    }
    

    .navigation {
        display: flex;
        justify-content: flex-end;
        align-items: center;
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
        text-align: center;
    }
    .wrapper{     
        display: flex;
        position: relative;
      
      }
      
      .wrapper .sidebar{ /*Used to maintain content within the sidebar*/
        width: 200px;
        height: 100%;
        background: #609966;
        padding: 30px 0px;
        position: fixed;
        top:0.2px;
      }
      
      .wrapper .sidebar h2{
        color: #FAF1E4;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
      }
      
      .wrapper .sidebar ul li{
        padding: 10px;
        border-bottom: 1px solid #CEC5B7;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-top: 1px solid rgba(255,255,255,0.05);
      }    
      
      .wrapper .sidebar ul li a{
        color: #FAF1E4;
        display: block;
      }
      
      .wrapper .sidebar ul li a .fas{
        width: 25px;
      }
      
      .wrapper .sidebar ul li:hover{ /*Used to modify the hovering style on the sidebar*/
        background-color: #9DC08B;
      }
          
      .wrapper .sidebar ul li:hover a{
        color: #FAF1E4;
      } 
      
      .wrapper .main_content{ /*Contains the main page content*/
        width: 100%;
        margin-left: 200px;
      }
      
      .wrapper .main_content .info{
        margin: 20px;
        color: #717171;
        line-height: 25px;
      }
      
      .wrapper .main_content .info div{
        margin-bottom: 20px;
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
    <div class="wrapper">
        <div class="sidebar">
            <i class=""></i>
            <ul>
                <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
                <li><a href="#"><i class="fas fa-light fa-clipboard"></i>FAQ</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="info">
                <div></div>
            </div>
        </div>
    </div>
    <body>
    <header>
        <h2 class="logo">Reclaiming Tomorrow</h2>
        <nav class="navigation">
        <a href="../index.php">Home</a>
        <a href="../county_search/search">Search</a>
        <a href="#">Local Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="#">Contact Us</a>
        <a href="../verify/login" class="btnLogin-popup">Login</a>
    </nav>
    </header>

</body>

 