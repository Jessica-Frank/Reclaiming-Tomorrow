<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql="DELETE from posts WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        header('location:../admin/modifyReviews');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

