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
            echo "<td>" . $row['Associated Links'] . "</td>";
            echo "<td>" . $row['Pick-up Schedule'] . "</td>";
            echo "<td>" . $row['Buy Bins'] . "</td>";
            echo "<td>" . $row['Alternatives'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "County not found or data not available.";
    }
}

$conn->close();
?>

