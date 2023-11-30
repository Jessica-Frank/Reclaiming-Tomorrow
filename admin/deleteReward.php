<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql1 = "SET FOREIGN_KEY_CHECKS=0";
    $result1 = mysqli_query($db, $sql1);

    if ($result1) {
        $sql2 = "DELETE FROM rewards WHERE id=$id";
        $result2 = mysqli_query($db, $sql2);}

    if($result2){
        session_start();
        $_SESSION['message'] = 'Successfully deleted reward!';
        header('location:../admin/modifyRewards');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

