<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reclaiming Tomorrow</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../verify/login.css">
    <style>
        body {
            background-color: #FAF1E4;
        }
        .navbar {
            background-color: #40513B;
        }
        .nav-link {
            color: #FAF1E4;
        }
        .nav-link:hover {
            color: #CEC5B7;
        }
        .navbar-brand {
            color: #FAF1E4;
        }
        .navbar-brand:hover {
            color: #CEC5B7;
        }
    </style>
</head>
<body>
    <?php include '../include/header.php'; ?>

    <h2>County Search</h2>
    <p>Welcome to the County search page!</p>
    <form method="post" action="search_county.php">
        <label for="County">County Name</label>
        <input type="text" id="County" name="County">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['County'])) {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'reclaiming_tomorrow_db';

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $county = $_POST['County'];

        $sql = "SELECT * FROM county_search WHERE County LIKE '%$county%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>Local Events</h3>";
                echo "<p>" . $row['Local_event'] . "</p>";

                echo "<h3>Associated Links</h3>";
                echo "<p>" . $row['associated_links'] . "</p>";

                echo "<h3>Pick-up Schedule</h3>";
                echo "<p>" . $row['pick_up_schedule'] . "</p>";

                echo "<h3>Buy Bin</h3>";
                echo "<p>" . $row['buy_bin'] . "</p>";

                echo "<h3>Alternatives</h3>";
                echo "<p>" . $row['alternatives'] . "</p>";
            }
        } else {
            echo "County not found or data not available.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
