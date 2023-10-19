<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['token'])) {
        $token_hash = $_POST['token'];

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "reclaiming_tomorrow_db";

        // Create a mysqli connection
        $mysqli = new mysqli($hostname, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if ($password !== $password2) {
            echo "Passwords do not match.";
        } elseif (strlen($password) < 4) {
            echo "Password must be at least 4 characters long.";
        } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            echo "Password must contain at least one special character.";
        } else {
            // Retrieve the user's information based on the token
            $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
            $stm = $mysqli->prepare($sql);
            $stm->bind_param("s", $token_hash);

            if ($stm->execute()) {
                $result = $stm->get_result();
                $user = $result->fetch_assoc();

                if ($user === null) {
                    echo "Invalid token. Please request another password reset.";
                } else {
                    // The user is found; update their password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Update the user's password in the database
                    $sql = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires = NULL WHERE id = ?";
                    $stm = $mysqli->prepare($sql);
                    $stm->bind_param("si", $hashedPassword, $user["id"]);

                    if ($stm->execute()) {
                        echo "Password has been successfully updated. <a href=' /verify/login.php'>Click here to login</a>";
                    } else {
                        // Handle database update error
                        echo "Error updating password: " . $stm->error;
                    }
                }
            } else {
                echo "Error executing the query: " . $stm->error;
            }
        }
    }
}
?>
