<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql="DELETE from user_inbox WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully deleted message!';
        header('location:../verify/inbox');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

