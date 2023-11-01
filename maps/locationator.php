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

        var locations = [];

        <?php

        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = ''; 
        $dbName = 'reclaiming_tomorrow_db';

        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name, address, latitude, longitude FROM recycling_center";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
        
        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(location.name + '<br>' + location.address);
        });
    </script>

    <div class="text-center">
        <h1>Search Results</h1>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recyclingMaterial = $_POST["recyclingMaterial"];
        $currentLocation = $_POST["currentLocation"];
        $distance = $_POST["distance"];

        $recyclingMaterial = explode(',', $recyclingMaterial);

        $placeholders = str_repeat('?,', count($recyclingMaterial) - 1) . '?';

        $query = "SELECT name, address, material_recycled, latitude, longitude
              FROM recycling_center
              WHERE material_recycled IN ($placeholders)";

        $stmt = $conn->prepare($query);
        $paramTypes = str_repeat('s', count($recyclingMaterial));
        $stmt->bind_param($paramTypes, ...$recyclingMaterial);
        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<div class="container">';
            echo '  <div class="row justify-content-md-center">';
            echo '    <div class="col-md-3 border">';
            echo '      Recycling Center:';
            echo "<p>" . $row["name"] . "</p>";
            echo '    </div>';
            echo '    <div class="col-md-3 border">';
            echo '      Address:';
            echo "<p>" . $row["address"] . "</p>";
            echo '    </div>';
            echo '    <div class="col-md-3 border">';
            echo '      Recycling Material Accepted:';
            $materials = explode(', ', $row["material_recycled"]);
            echo "<ul>";
            foreach ($materials as $material) {
                echo "<li>" . $material . "</li>";
            }
            echo "</ul>";
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
