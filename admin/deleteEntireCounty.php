<?php
require '../connect.php';
if(isset($_GET['id'])) {
    $county=$_GET['id'];
    $sql="DELETE from county_search WHERE County='$county'";
    $result=mysqli_query($db,$sql);

    $sql="DELETE from county_associated_links WHERE County='$county'";
    $result=mysqli_query($db,$sql);

    $sql="DELETE from county_alternatives WHERE County='$county'";
    $result=mysqli_query($db,$sql);

    $sql="DELETE from county_buy_bins WHERE County='$county'";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully deleted!';
        header('location:../admin/modifyContent');
    }
    else {
        die(mysqli_error($db));
    }
}
?>