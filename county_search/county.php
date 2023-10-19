<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../verify/login.css">
 <style>
        
        table {
            width: 50%; 
            background-color: #FAF1E4; 
            color: #40513B;
            border-collapse: collapse; 
        }

        table, th, td {
            border: 1px solid #40513B; 
            padding: 10px; 
        }

        th {
            text-align: center; 
            background-color: #40513B; 
            color: #FAF1E4; 
            border: 1px solid #FAF1E4;
        }
    </style>
</head>
<body>
<?php include '../include/header.php'; ?>
  <h2>County Search</h2>
    <p>Welcome to the County search page!</p>
<form method="post" action="">
    <label for="County">Search for County:</label>
    <input type="text" name="County" id="County">
    <input type="submit" value="Search">
</form>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'reclaiming_tomorrow_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['County'])) {
    $county = $_POST['County'];

    $sql = "SELECT * FROM county_search WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Local Events</th>";
        echo "<th>Associated Links</th>";
        echo "<th>Pick-up Schedule</th>";
        echo "<th>Buy Bin</th>";
        echo "<th>Alternatives</th>";
        echo "</tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Local event'] . "</td>";
             echo "<td><a href='" . $row['Associated Links'] . "'>" . $row['Associated Links'] . "</a></td>";
            echo "<td>" . $row['Pick-up Schedule'] . "</td>";
             echo "<td><a href='" . $row['Buy Bins'] . "'>" . $row['Buy Bins'] . "</a></td>";
            echo "<td>" . $row['Alternatives'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "County not found or data not available.";
    }
}
?>


</body>
</html>