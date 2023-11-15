<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reclaiming_tomorrow_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST['name'];
$location = $_POST['location'];
$rating = $_POST['rating'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO posts (name, location, rating, message) VALUES ('$name', '$location', '$rating', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully!";
    header("Location: display_reviews.php");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>