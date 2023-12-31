<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycling Map Locationator 3000</title>
    <meta name="description" content="A brief description of your page">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link href="../style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>

<body>
    <?php include '../include/header.php'; ?>

    <div id="map"></div>

    <?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'reclaiming_tomorrow_db';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recyclingMaterial = $_POST["recyclingMaterial"];
        $currentLocation = $_POST["currentLocation"];
        $distance = $_POST["distance"];

        $queryXXX = "SELECT id, name, latitude, longitude 
            FROM user_location
            WHERE name = '$currentLocation'";

        $stmt = $conn->prepare($queryXXX);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        $LatValue = $result['latitude'];
        $LongValue = $result['longitude'];
    ?>

        <script>
            var locations = [];
            var lat = <?php echo $LatValue ?>;
            var long = <?php echo $LongValue ?>;
            var rad = <?php echo $distance * 1000 ?>;

            var map = L.map('map').setView([lat, long], 11);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);



            var circle = L.circle([lat, long], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: rad * 0.621371
            }).addTo(map);

            <?php
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $query = "SELECT name, address, material_recycled, latitude, longitude
              FROM recycling_center
              WHERE material_recycled LIKE '%$recyclingMaterial%'
              AND ROUND((6371 * acos( cos(radians($LatValue)) * cos(radians(latitude)) * cos(radians(longitude) - radians($LongValue)) + sin(radians($LatValue)) * sin(radians(latitude)))), 2) < $distance";

            $result = $conn->query($query);

            $markerCount = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    icon = L.divIcon({
                        className: 'custom-div-icon',
                        html: "<div class='marker-pin'></div><i class='material-icons'><?php echo $markerCount ?></i>",
                        iconSize: [30, 42],
                        iconAnchor: [15, 42]
                    });

                    L.marker([<?php echo $row['latitude'] ?>, <?php echo $row['longitude'] ?>], {
                            icon: icon
                        })
                        .addTo(map)
                        .bindPopup('<?php echo $row['name'] ?> <br> <?php echo $row['address'] ?>');
            <?php echo "locations.push({
                    name: '{$row['name']}',
                    address: '{$row['address']}',
                    latitude: {$row['latitude']},
                    longitude: {$row['longitude']}
                });\n";
                $markerCount = $markerCount + 1;
                }
            }
            ?>
        </script>

        <h1 id='mapTable'>Results</h1>

        <table id='mapTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Recycling Center</th>
                    <th>Address</th>
                    <th>Recycling Material Accepted</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $result = $conn->query($query);

                $rowCount = 1;

                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowCount ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php $materials = explode(', ', $row["material_recycled"]);
                            echo "<ul>";
                            foreach ($materials as $material) {
                                echo "<li>" . $material . "</li>";
                            } ?></td>
                        <?php $rowCount = $rowCount + 1; ?>
                    <tr>
                <?php }
            } ?>
            </tbody>
        </table>
</body>

</html>