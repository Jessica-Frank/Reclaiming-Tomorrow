<?php
$conn = new mysqli("localhost", "root", "", "reclaiming_tomorrow_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch FAQs from the database
$sql = "SELECT * FROM faq ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <style>

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            
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

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 80%;
        }

        li {
            background-color: #ecf0f1; 
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h3 {
            color: #609966;
            cursor: pointer;
            margin: 0;
        }

        .answer {
            display: none; /* Hide answers by default */
            margin-top: 10px;
        }

        .answer.active {
            display: block; 
            background-color: #609966;
            color: #fff;
        }
    </style>
    <script>
        $(document).ready(function () {
            // Toggle answers when clicking on questions
            $('h3').click(function () {
                $(this).next('.answer').toggleClass('active');
            });
        });
    </script>
</head>
<body>
    <?php include "../admin/header.php"; ?>
    <h1>Frequently Asked Questions</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<h3>" . $row["question"] . "</h3>";
                echo "<p class='answer'>" . $row["answer"] . "</p>";
                echo "</li>";
            }
        } else {
            echo "<li>No FAQs found.</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
