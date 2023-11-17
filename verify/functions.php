<?php

session_start();

function signup($data)
{
    $errors = array();

    //validate information
    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "Please enter a valid email";
    }

    if (!preg_match('/^[a-zA-Z0-9]+$/', $data['username']))
    {
        $errors[] = "Please enter a valid username (letters and numbers only)";
    }


    if(strlen(trim($data['password'])) < 8)
    {
        $errors[] = "Password must be at least 8 characters";
    }
     // Check if password contains at least 1 special character
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $data['password'])) 
    {
        $errors[] = "Password must contain at least 1 special character";
    }

    if($data['password'] != $data['password2'])
    {
        $errors[] = "Password does not match";
    }

    $check = database_run("select * from users where email = :email limit 1",['email'=>$data['email']]);
    if(is_array($check))
    {
        $errors[] = "Email already exists";
    }

    //save all if no errors found
    if(count($errors) == 0){
        $arr['name'] = $data['name'];
        $arr['email'] = $data['email'];
        $arr['username'] = $data['username'];
        $arr['password'] = password_hash($data['password'], PASSWORD_DEFAULT) ;
        $arr['role'] = "user";
        $arr['date'] = date("Y-m-d H:i:s");
        $query = "insert into users (name,email,username,password, role, date) values 
        (:name,:email,:username,:password,:role,:date)";

        database_run($query,$arr);

    }

    return $errors;
}

function login($data)
    {
        $errors = array(); // Initialize $errors as an empty array
    
        // Check if the provided value can be treated as either email or username
        $loginField = filter_var($data['email_or_username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $loginValue = $data['email_or_username'];
    
        // Check if a password is provided
        if (empty($data['password'])) {
            $errors[] = "Please enter your password.";
        }
    
        if (count($errors) == 0) {
            $arr['email'] = $loginField === 'email' ? $loginValue : '';
            $arr['username'] = $loginField === 'username' ? $loginValue : '';
    
            $query = "SELECT * FROM users WHERE (email = :email OR username = :username) LIMIT 1";
            $row = database_run($query, $arr);
    
            if (is_array($row) && count($row) > 0) {
                $row = $row[0];
                $hash = $row->password;
    
                if (password_verify($data['password'], $hash)) {
                    // Update the is_logged_in column to 1 for the logged-in user
                    $user_id = $row->id; 
                    $_SESSION['current'] = $user_id;
                    $_SESSION['current_role'] = "USER";
                    updateUserLoginStatus($user_id, 1); // Call the function to update is_logged_in
    
                    $_SESSION['USER'] = $row;
                    $_SESSION['LOGGED_IN'] = true;
                    
                } else {
                    $errors[] = "Wrong email/username or password";
                }
            } else {
                $errors[] = "Wrong email/username or password";
            }
        }
    
        return $errors;
}
    
// Function to update the is_logged_in column
function updateUserLoginStatus($userId, $status) {
    $updateQuery = "UPDATE users SET is_logged_in = :status WHERE id = :id";
    database_run($updateQuery, ['id' => $userId, 'status' => $status]);
}

function getLoggedInUsers() {
    $query = "SELECT username FROM users WHERE is_logged_in = 1";
    $loggedInUsers = database_run($query);

    if (is_array($loggedInUsers)) {
        return $loggedInUsers;
    } else {
        return array(); // Return an empty array if no users are logged in
    }
}

function database_run($query,$vars = array())
{
    $string = "mysql:host=localhost;dbname=reclaiming_tomorrow_db";
    

    $con = new PDO($string, 'root', '');

    if(!$con){
        return false;
    }
    $stm = $con->prepare($query);
    $check = $stm->execute($vars);

    if($check){
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
        if(count($data) > 0)
        {
            return $data;
        }
    }
    return false;
}

function check_login($redirect = true){
    if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN']))
    {
        return true;
    }

    if($redirect)
    {
        header("Location: login.php");
        die;
    }
    else{
    return false;
    }
}

function check_verification(){

    $id = $_SESSION['USER']->id;
    $query = "select * from users where id = '$id' limit 1";
    $row = database_run($query);

    if(is_array($row)){
        $row = $row[0];

        if($row->email == $row->email_verification)
    {
        return true;
    }

    }

    return false;
}

function getUserProfile($userId) {
    // Assuming you have a database connection
    $conn = new PDO("mysql:host=localhost;dbname=reclaiming_tomorrow_db", 'root', '');

    // Prepare and execute a query to fetch the user's profile
    $query = "SELECT * FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the user's profile data
    $userProfile = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the database connection
    $conn = null;

    return $userProfile;
}

function updateProfile($data)
{
    $errors = array();

    // Validate the input data for name, username, and email
    $name = trim($data['name']);
    $username = trim($data['username']);
    $email = trim($data['email']);

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    if (count($errors) == 0) {
        // Update the user's profile in the database
        $userId = $_SESSION['USER']->id; // Get the user's ID from the session

        $query = "UPDATE users SET name = :name, username = :username, email = :email WHERE id = :id";
        $params = array('id' => $userId, 'name' => $name, 'username' => $username, 'email' => $email);

        if (database_run($query, $params)) {
            // Profile updated successfully
            $_SESSION['USER']->name = $name; // Update the name in the session
            $_SESSION['USER']->username = $username; // Update the username in the session
            $_SESSION['USER']->email = $email; // Update the email in the session
        } else {
            $errors[] = "Failed to update profile. Please try again later.";
        }
    }

    return $errors;
}



