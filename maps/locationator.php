<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycling Map Locationator 3000</title>
    <meta name="description" content="A brief description of your page">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link href="maps.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>
<body>
    <?php include '../include/header.php';?>

    <div id="map" style="height: 500px;"></div>

    <script>
        var map = L.map('map').setView([36.089987, -79.829674], 11);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var locations = [
            // PHP will populate this array with data from the database
        ];

        // PHP code to fetch data from your SQL database and populate the locations array
        <?php
        // Database configuration
        $dbHost = 'localhost'; // Change to your database host
        $dbUsername = 'root'; // Change to your database username
        $dbPassword = ''; // Change to your database password
        $dbName = 'locations_db'; // Change to your database name

        // Create a database connection
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch locations from the database
        $sql = "SELECT name, address, latitude, longitude FROM recycling_center";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Add each location to the JavaScript array
                echo "locations.push({
                    name: '{$row['name']}',
                    address: '{$row['address']}',
                    latitude: {$row['latitude']},
                    longitude: {$row['longitude']}
                });\n";
            }
        }

        $sql = "SELECT name, address, material_recycled FROM recycling_center";
        $result = $conn->query($sql);
        ?>
        
        // Add markers for each location
        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(location.name + '<br>' + location.address);
        });
    </script>

    <h2>Recycing Centers Available</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Item Recycled</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['material_recycled']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recyclingMaterial = $_POST["recyclingMaterial"];
        $currentLocation = $_POST["currentLocation"];
        $distance = $_POST["distance"];
    
        echo "<h2>Search Results</h2>";
        echo "<p>Distance willing to travel: $distance miles</p>";
    
        // Display the recycling center information here
        echo '<div class="container">';
        echo '  <div class="row justify-content-md-center">';
        echo '    <div class="col col-lg-2 border">';
        echo '      Recycling Center';
        echo '    </div>';
        echo '    <div class="col-md-auto border">';
        echo '      Address';
        echo "<p>Current Location: $currentLocation</p>";
        echo '    </div>';
        echo '    <div class="col col-lg-2 border">';
        echo '      What They Recycle';
        echo "<p>Recycling Material: $recyclingMaterial</p>";
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    } else {
        echo "<h1>Error</h1>";
    }
    ?>
</body>
</html>
