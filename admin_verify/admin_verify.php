<?php
    
    require "admin_functions.php";
    check_login();

    $errors = array();

    if($_SERVER['REQUEST_METHOD']== "GET" && !check_verification())
    {
        //send email
        $vars['code'] = rand(10000,99999);

        //save  to database
        $vars['expired'] = (time()+ (60 *5)); //code expires i 5 min
        $vars['email'] = $_SESSION['USER']->email;

        $query = "insert into admin_verification (code, expired, email) values (:code, :expired, :email)";
        database_run($query,$vars);

    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(!check_verification()){
        $query = "select * from admin_verification where code = :code && email = :email";
        $vars = array();
        $vars['email'] = $_SESSION['USER']->email;
        $vars['code'] = $_POST['code'];

        $row = database_run($query,$vars);
        
        if(is_array($row)){
            $row = $row[0];
            $time = time();
            
            if($row->expired > $time){
                $id = $_SESSION['USER']->id;
                $query = "update admin set email_verification = email where id = '$id' limit 1";
                database_run($query);

                header("Location: admin_profile.php");
                die;

            }else{
                echo "code expired";
            }

        }else{
            echo "wrong code";
        }
    }else
    {
        echo "You are already verified";
    }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>
    <h1>Verify</h1>

    <?php include('admin_header.php');?>

    <br><br>
    <div>
            <br>A code was sent to your email.<br>
        <div>
            <?php if(count($errors) > 0):?>
                <?php foreach ($errors as $error):?>
                    <?= $error?> <br>
                <?php endforeach;?>
            <?php endif;?>

        </div><br>
        <form method="post">
            <input type="text" name="code" placeholder="Enter your code"><br>
            <br>
            <input type="submit" value="Verify">
        </form>
    </div>
</body>
</html>   

