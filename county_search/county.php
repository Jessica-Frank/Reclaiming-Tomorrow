<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
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
            width: 70px;
        }

        .word {
            font-size: 24px;
        }
    </style>
</head>
<body>
<?php include '../include/header.php'; ?>



    <h2 style="text-align: center;">County Search</h2>
    <p style="text-align: center;">Welcome to the County search page!</p>
    <form method="post" action="search_results" style="text-align: center;">
        <label for="County">Search for County:</label>
        <input type="text" name="County" id="County" required pattern=".*\S+.*">
        <input type="submit" value="Search" class="btn btn-dark btn-sm">
    </form>

    <div class="line_box">
    <div class="line_box2" style="margin-top: 40px;margin-bottom: 35px;">
        <div class="line"></div>
        <div class="word">or</div>
        <div class="line"></div>
    </div>
    </div>

    <h2 style="text-align: center;">Select a County</h2>



<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'reclaiming_tomorrow_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql = "SELECT * FROM county_search";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<form method="post" action="search_results" style="text-align: center;">';
        
        while ($row = $result->fetch_assoc()) {
            echo '<input type="submit" name="County" value="'.$row['County'].'" class="btn btn-dark" style="margin-right: 10px;margin-top: 20px">';
        }
        
        echo "</form>";
    }

?>

</body>
</html>


