<?php
session_start();

$message = ""; // Initialize an empty message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the email exists in the database
    $email = $_POST['email'];
    $user = getUserByEmail($email);

    if ($user) {
        // Generate a unique token and store its hash and expiration time in the database
        $token = bin2hex(random_bytes(32)); // Generate a random token
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour
        storeResetToken($user->id, $hashedToken, $expires);

        // Send the reset password email to the user with the token
        sendResetPasswordEmail($user->email, $hashedToken);

        $message = "We've sent an email with instructions on how to reset your password to your email address. 
        Please check your spam folder if you're using Outlook, just in case.";

    } else {
        $message = "Email not found in the database.";
    }
}

function getUserByEmail($email) {
    // Query the database to get the user with the given email
    // Replace this with your database query
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $result = database_run($query, ['email' => $email]);

    if (is_array($result) && count($result) > 0) {
        return $result[0];
    } else {
        return null;
    }
}

function storeResetToken($userId, $hashedToken, $expires) {
    // Store the hashed token and its expiration time in the database
    // Replace this with your database insert/update logic
    $query = "UPDATE users SET reset_token_hash = :token, reset_token_expires = :expires WHERE id = :id";
    database_run($query, ['id' => $userId, 'token' => $hashedToken, 'expires' => $expires]);
}

function sendResetPasswordEmail($email, $token) {
    $mail = require __DIR__ . "/mailer.php";
    $mail->setFrom("noreply@gmail.com");
    $mail->addAddress($email);
    
    $websiteName = "Reclaiming Tomorrow"; 
    $subject = "Password Reset at $websiteName"; 
    
    $mail->Subject = $subject;
    $mail->isHTML(true);
   
    $resetLink = "http://localhost/verify/reset_password.php?token=$token";
    $message = "Click <a href='$resetLink'>here</a> to reset your password at $websiteName."; 

    $mail->Body = $message;

    try {
        $mail->send();
    } catch (Exception $e) {
        // Handle the mailer error here
    }
}

function database_run($query, $vars = array()) {
    $string = "mysql:host=localhost;dbname=reclaiming_tomorrow_db";
    $con = new PDO($string, 'root', '');

    if (!$con) {
        // Handle database connection error
        die("Database connection error: " . print_r($con->errorInfo(), true));
    }

    try {
        $stm = $con->prepare($query);
        $check = $stm->execute($vars);

        if ($check) {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if (count($data) > 0) {
                return $data;
            }
        }
    } catch (PDOException $e) {
        // Handle database query error
        die("Database query error: " . $e->getMessage());
    }

    return false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
            height: 240px;
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
            padding: 20px; 
        }

        .password-fields div {
            margin-bottom: 10px; 
        }

        .password-fields label {
            text-align: center; 
        }

        .wrapper button {
            background-color: #000000;
            color: white;
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
    <h2>Forgot Password</h2>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Send</button>
        </form>

        <div><?php echo $message; ?></div>
    </div>
</body>
</html>
