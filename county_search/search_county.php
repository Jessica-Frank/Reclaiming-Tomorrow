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
            while ($row = $result->fetch_assoc()) {
                echo "<h3>Local Events</h3>";
                echo "<p>" . $row['Local event'] . "</p";

                echo "<h3>Associated Links</h3>";
                echo "<p>" . $row['Associated Links'] . "</p";

                echo "<h3>Pick-up Schedule</h3>";
                echo "<p>" . $row['Pick-up Scedule'] . "</p";

                echo "<h3>Buy Bin</h3>";
                echo "<p>" . $row['Buy Bins'] . "</p";

                echo "<h3>Alternatives</h3>";
                echo "<p>" . $row['Alternatives'] . "</p";
            }
        } else {
            echo "County not found or data not available.";
        }
    }

    $conn->close();
    ?>

