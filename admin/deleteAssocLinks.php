<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="SELECT * FROM county_associated_links WHERE id='$id'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    $county=$row['County'];

    $sql="DELETE from county_associated_links WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully deleted!';
        header('location:../admin/countyPreview.php?id='.$county.'');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

