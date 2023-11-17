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

  <style>
.popup {
    display: none;
    position: absolute;
    top: 5%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #d4d4d4;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-container,
.form-container2,
.inside {
    width: 60%;
    margin: 20px auto;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Increased box shadow for a more pronounced effect */
    transition: box-shadow 0.3s ease; /* Added a smooth transition for the box shadow */
}

.form-container {
    background-color: #9DC08B; /* Adjusted color for a more modern look */
    margin: 20px auto;
}

.inside {
    width: 80%;
    text-align: center;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Adjusted box shadow for consistency */
}

.info-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 15px;
}

.label,
.value {
    color: #333333; /* Darkened text color for better readability */
    font-size: 18px;
}

.label {
    font-weight: bold;
    margin-bottom: 8px;
    text-decoration: underline;
}

.flex-container {
    margin: 0;
    display: flex;
    flex-direction: column;
}

/* Added a glow effect on hover */
.form-container:hover,
.form-container2:hover,
.inside:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4), 0 0 20px rgba(0, 175, 255, 0.4); /* Added a glow effect on hover */
}

.quote {
  margin: 0 auto;
}

.slideshow-container {
    margin: 0 auto;
    max-width: 50%;
    max-height: 300px; /* Set your desired height */
    overflow: hidden;
}

.slideshow-container img {
    width: 100%;
    height: auto; /* Maintain aspect ratio */
    display: none;
}

.list-container {
    max-width: 40%;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
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
            <li><a href="/admin/modifyRewards"><i class="fas fa-edit"></i>Modify Rewards</a></li>
            <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
            <li><a href="/rewards/log"><i class="fas fa-history"></i>Activity Log</a></li>
            <li><a href="/rewards/manage_tickets"><i class="fas fa-ticket-alt"></i>Manage Tickets</a></li>
            <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
          </ul> 
      </div>
      <div class="main_content">
          <div class="info">
            <div class="form-container">
              <div class="inside">
                  <h1 style="margin-top: 20px;margin-bottom: 20px; color: #000000;">Welcome!</h1>
                  <h3 style="color: #000000;"> Make sure to check the inbox and keep everything up-to-date!</h3>
                  <div class="slideshow-container">
                      <!-- Slides -->
                      <img src="images/recycle1.jpg" alt="Slide 1">
                      <img src="images/recycle2.jpg" alt="Slide 2">
                      <img src="images/recycle8.jpg" alt="Slide 3">
                      <img src="images/recycle9.jpg" alt="Slide 3">
                      <!-- Add more slides as needed -->

                      <!-- Navigation dots/buttons if desired -->
                      <!-- For simplicity, you can add these later based on your slideshow script -->
                  </div>
                  <div class="quote" style="color: #000000;">"The greatest threat to our planet is the belief that someone else will save it." - Robert Swan</div>
              </div>
          </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the slideshow container and images
        var slideshowContainer = document.querySelector(".slideshow-container");
        var slides = slideshowContainer.getElementsByTagName("img");

        // Set the index for the current slide
        var slideIndex = 0;

        // Display the first slide initially
        showSlide(slideIndex);

        // Function to show a specific slide
        function showSlide(index) {
            // Hide all slides
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            // Show the selected slide
            slides[index].style.display = "block";
        }

        // Function to move to the next slide
        function nextSlide() {
            slideIndex++;
            if (slideIndex >= slides.length) {
                slideIndex = 0; // Restart from the first slide
            }
            showSlide(slideIndex);
        }

        // Set an interval to automatically move to the next slide every 3 seconds (adjust as needed)
        setInterval(nextSlide, 3000);
    });
</script>

</body>
</html>