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
    body {
      padding-top: 64px;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .wrapper {
      display: flex;
      position: relative;
    }

    .sidebar {
      width: 200px;
      height: 200%;
      background: rgba(96, 153, 102, 0.9);
      padding: 30px 0px;
      position: fixed;
      top: 50px;
      z-index: 1;
    }

    .sidebar h2 {
      color: #FAF1E4;
      text-transform: uppercase;
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar ul li {
      padding: 10px;
      border-bottom: 1px solid #CEC5B7;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .sidebar ul li a {
      color: #FAF1E4;
      display: block;
    }

    .sidebar ul li a .fas {
      width: 25px;
    }

    .sidebar ul li:hover {
      background-color: #9DC08B;
    }

    .sidebar ul li:hover a {
      color: #FAF1E4;
    }

    .main_content {
      width: 100%;
      margin-left: 200px;
      padding: 240px;
      z-index: 0;
      background-size: cover;
      animation: slideshow 8s infinite; /* 8s for 4 images, adjust accordingly */
    }

    .info {
      margin: 20px;
      color: #717171;
      line-height: 25px;
      text-align: center;
    }

    .info div {
      margin-bottom: 20px;
    }


    /* Quote and Welcome Styling */
    .quote {
      font-size: 24px;
      font-style: italic;
      margin-bottom: 20px;
      color: #fff;
    }

    .welcome {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #E2725B;
    }

    /* Keyframes for background image slideshow */
    @keyframes slideshow {
      0%, 20% {
        background-image: url('images/recycle1.jpg');
        background-size: cover;
      background-position: center;
      }
      20%, 40% {
        background-image: url('images/recycle3.jpg');
        background-size: cover;
      background-position: center;
      }
      40%, 60% {
        background-image: url('images/recycle7.jpg');
        background-size: cover;
      background-position: center;
      }
      60%, 80% {
        background-image: url('images/recycle5.jpg');
        background-size: cover;
      background-position: center;
      }
      80%, 100% {
        background-image: url('images/recycle2.jpg');
        background-size: cover;
      background-position: center;
      }
    }
  </style>
</head>
<body>

<?php include "../include/header.php"; ?>

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
      <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
      <li><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
    </ul>
  </div>
  <div class="main_content">
    <div class="info">
      <div class="welcome">Welcome to Reclaiming Tomorrow!</div>
      <div class="quote">"The greatest threat to our planet is the belief that someone else will save it." - Robert Swan</div>
     
    </div>
  </div>
</div>

</body>
</html>
