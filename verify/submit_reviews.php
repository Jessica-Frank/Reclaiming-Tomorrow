<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $location = $_POST["location"];
    $rating = $_POST["rating"];
    $message = $_POST["message"];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "reclaiming_tomorrow_db";

    // Create a mysqli connection
    $mysqli = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO posts(name, rating, message) VALUES ('$name', '$location', $rating, '$message')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Review submitted successfully.";
    } else {
        // Check if the error is due to a duplicate primary key (id)
        if ($mysqli->errno == 1062) {
            echo "Error: Duplicate review ID. Please try again.";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>
