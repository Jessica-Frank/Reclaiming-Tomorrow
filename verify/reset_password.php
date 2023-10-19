<?php

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    //echo "Token found";

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

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stm = $mysqli->prepare($sql);
    $stm->bind_param("s", $token);

    if ($stm->execute()) {
        $result = $stm->get_result();
        $user = $result->fetch_assoc();

        if ($user === null) {
            $message = "Invalid token. Please request another password reset.";
        } else {
            if (strtotime($user["reset_token_expires"]) < time()) {
                $message = "Token has expired. Please request another password reset.";
            } else {
                $message = "Token is valid. You can reset your password.";
            }
        }
    } else {
        $message = "Error executing the query: " . $stm->error;
    }
} else {
    $message = "Token not found. Please request another password reset.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../style.css" rel="stylesheet">
    
    <style>
        .wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 440px;
            background: transparent;
            border: 2px solid #609966;
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            padding: 20px; /* Add padding for spacing */
        }

        .password-fields div {
            margin-bottom: 10px; /* Add margin between email and password fields */
        }

        .password-fields label {
            text-align: center; /* Center-align the labels */
        }
        .wrapper button {
            background-color: #000000; /* Set the background color to black */
            color: white; /* Set the text color to white */
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            justify-content: flex-end;
            transition: .5s;
        }
       
    </style>
</head>
<body>
    <?php include 'index.php';?>
    <div class="wrapper"> 
        <h2>Reset Password</h2> 
        <form method="POST" action="process_reset_password">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <div class="password-fields">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name = "password" required>
                </div>
                <div>
                    <label for="password2">Confirm Password:</label>
                    <input type="password" id="password2" name="password2" required>
                </div>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        
        <div><?php echo $message; ?></div>
    </div> 
</body>
</html>
