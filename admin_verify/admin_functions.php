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

    $check = database_run("select * from admin where email = :email limit 1",['email'=>$data['email']]);
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
        $arr['role'] = "admin";
        $arr['date'] = date("Y-m-d H:i:s");
        $query = "insert into admin (name,email,username,password,role,date) values 
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

        $query = "select * from admin where (email = :email OR username = :username) limit 1";
        $row = database_run($query, $arr);

        if (is_array($row) && count($row) > 0) {
            $row = $row[0];
            $hash = $row->password;

            if (password_verify($data['password'], $hash)) {
                $_SESSION['USER'] = $row;
                $_SESSION['LOGGED_IN'] = true;
                $_SESSION['admin'] = true;
            } else {
                $errors[] = "Wrong email/username or password";
            }
        } else {
            $errors[] = "Wrong email/username or password";
        }
    }

    return $errors;
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
        header("Location: admin_login.php");
        die;
    }
    else{
    return false;
    }
}

function check_verification(){

    $id = $_SESSION['USER']->id;
    $query = "select * from admin where id = '$id' limit 1";
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