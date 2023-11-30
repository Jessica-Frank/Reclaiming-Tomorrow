<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reclaiming Tomorrow</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet">


<style>
.button-link {
  display: inline-block;
  background-color: #40513B;
  color: #FAF1E4;
  text-decoration: none;
  text-align: center;
  width: 150px;
}

.button-link:hover {
  background-color: #FAF1E4;
  color: #40513B;
  text-decoration: underline;
  text-decoration-color: #40513B;
 
}
 h1 {
            text-align: center;
        }
p{
	text-align: center;
}
.image-container {
            text-align: center;
        }

        .image-container span {
            display: inline-block;
            margin: 0 20px; /* Adjust the margin as needed */
        }

        .image-container img {
            width: 150px;
            height: 150px;
            display: block;
            margin: 0 auto; /* Center the image within the span */
        }

        .button-container {
            text-align: center;
        }

        .button-container a {
            display: inline-block;
            margin-top: 10px; /* Add space between each button for better aesthetics */
        }

.custom-div {
        background-color: #40513B;
        border-radius: 20px;
        height: 170px;
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white; /* Set text color to contrast with the background */
    }

body {
        align-items: center;
        justify-content: center;
    }

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
        width: 500px;
    }

    .word {
        font-size: 24px;
    }

</style>

</head>

<body>
    <?php include "include/header.php"; ?>

<h1>Welcome to Reclaiming Tomorrow!</h1>
<p> Your one-stop shop for local recycling needs.</p>
<br>

<div class="custom-div">
        <!-- Content goes here -->
        <p>Discover convenient recycling centers near you with our user-friendly search feature. Explore comprehensive county recycling information to stay informed and make eco-friendly choices. Plus, be rewarded for your commitment to the environment with our exciting recycling incentives program. Join us in creating a greener, cleaner community – one recyclable at a time!</p>
</div>
<div class="custom-div2">
</div>

<h2>Explore our pages!</h2>
<br>

<div class="image-container">
        <span>
            <img src="/images/rPage.jpg" alt="Rewards Page">
            <a href="/rewards/redemption" class="button-link">View Rewards</a>
        </span>
        <span>
            <img src="/images/rlSearch.jpg" alt="Recycling Location Search">
            <a href="/maps/search" class="button-link">Recycling Locations</a>
        </span>
        <span>
            <img src="/images/cSearch.jpg" alt="County Search">
            <a href="/county_search/county" class="button-link">County Information</a>
        </span>
    </div>
<div class="line_box">
<div class="line_box2" style="margin-top: 40px;margin-bottom: 5px;color: #000000;">
    <div class="line"></div>
</div>
</div>

<h2 style="margin-top: 20px;">Admin Content</h2>
<br>
<div class="image-container">
        <span>
            <a href="/admin_verify/admin_login" class="button-link">Admin Login</a>
        </span>
    </div>

</body>

</html>


