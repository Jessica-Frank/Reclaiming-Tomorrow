<?php
session_start();
$conn = new mysqli("localhost", "root", "", "reclaiming_tomorrow_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM faq");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Reclaiming Tomorrow</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="../style.css" rel="stylesheet">
</head>

<body>
    <?php include "../include/header.php"; ?>
    <h1 class="body-title">Frequently Asked Questions</h1>
    <ul class="faq-list">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li class='faq-item'>";
                echo "<h3 class='faq-question'>" . $row["question"] . "</h3>";
                echo "<p class='faq-answer'>" . $row["answer"] . "</p>";
                echo "</li>";
            }
        } else {
            echo "<li class='faq-item'>No FAQs found.</li>";
        }
        ?>
    </ul>

    <div class="wrapper">
        <div class="sidebar">
            <i class=""></i>
            <ul>
                <li class="menu-item"><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
                <li class="menu-item"><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
                <li class="menu-item"><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations
                        reviews</a></li>
                <li class="menu-item"><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="info">
                <!-- Add any additional information or content here -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Toggle answers when clicking on questions
            $('.faq-question').click(function () {
                $(this).next('.faq-answer').toggleClass('active');
            });
        });
    </script>

    <style>
        .wrapper {
            display: flex;
            position: relative;
        }

        .wrapper .sidebar {
            width: 200px;
            height: 200%;
            background: #609966;
            padding: 30px 0px;
            position: fixed;
            top: 50px;
        }

        .wrapper .sidebar h2 {
            color: #FAF1E4;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
        }

        .wrapper .sidebar .menu-item {
            padding: 10px;
            border-bottom: 1px solid #CEC5B7;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .wrapper .sidebar .menu-item a {
            color: #FAF1E4;
            display: block;
        }

        .wrapper .sidebar .menu-item a .fas {
            width: 25px;
        }

        .wrapper .sidebar .menu-item:hover {
            background-color: #9DC08B;
        }

        .wrapper .sidebar .menu-item:hover a {
            color: #FAF1E4;
        }

        .wrapper .main_content {
            width: 100%;
            margin-left: 1326px;
            top: 25px;
        }

        .wrapper .main_content .info {
            margin: 20px;
            color: #717171;
            line-height: 25px;
        }

        .wrapper .main_content .info div {
            margin-bottom: 20px;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 20px;
            padding: 30px 160px;

            min-height: 100vh;
            background: url('images/recycle3.jpg') center center fixed;
            background-size: cover;
        }

        h1 {
            background-color: #000000;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin: 0;
        }

        .faq-list {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 80%;
        }

        .faq-item {
            background-color: #ecf0f1;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .faq-question {
            color: #609966;
            cursor: pointer;
            margin: 0;
        }

        .faq-answer {
            display: none;
            /* Hide answers by default */
            margin-top: 10px;
        }

        .faq-answer.active {
            display: block;
            background-color: #609966;
            color: #fff;
        }
    </style>
</body>

</html>
