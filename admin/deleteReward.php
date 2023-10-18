<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql="DELETE from rewards WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully deleted reward!';
        header('location:../admin/modifyRewards');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

