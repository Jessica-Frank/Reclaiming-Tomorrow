<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recyclingMaterial = $_POST["recyclingMaterial"];
    $currentLocation = $_POST["currentLocation"];
    $distance = $_POST["distance"];

    // Process the form data (e.g., search for recycling centers or locations)
    // You can replace this with your own logic based on the inputs


    // Example: Display the submitted data
    echo "<h2>Search Results</h2>";
    echo "<p>Recycling Material: $recyclingMaterial</p>";
    echo "<p>Current Location: $currentLocation</p>";
    echo "<p>Distance willing to travel: $distance miles</p>";
}
else{
    echo "<h1>Error<h1>";
}
?>

<!-- <?php 
    print_r ($_SERVER);
?> -->