<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql="DELETE from posts WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully deleted!';
        header('location:../admin/modifyReviews');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

