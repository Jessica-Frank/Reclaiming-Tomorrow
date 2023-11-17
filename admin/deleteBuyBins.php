<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="SELECT * FROM county_buy_bins WHERE id='$id'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
    $county=$row['County'];

    $sql="DELETE from county_buy_bins WHERE id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        header('location:../admin/countyPreview.php?id='.$county.'');
    }
    else {
        die(mysqli_error($db));
    }
}
?>

