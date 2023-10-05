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

    <div id="map"></div>

    <script>
       var map = L.map('map').setView([36.089987, -79.829674], 11);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([36.089987, -79.829674]).addTo(map);

        var circle = L.circle([36.089987, -79.829674], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
        }).addTo(map);

        var polygon = L.polygon([
        [36.089987, -79.829674],
        [36.089981, -79.829674],
        [36.089983, -79.829674]
        ]).addTo(map);

        marker.bindPopup("<b>Welcome To Greensboro!</b><br>I am a popup.").openPopup();

        var popup = L.popup();

        function onMapClick(e) {
        popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
        }

map.on('click', onMapClick);

    </script>

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
