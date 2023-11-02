<?php
require '../connect.php';
if(isset($_GET['reward_id'])) {
    $reward_id=$_GET['reward_id'];
    $user_id=$_GET['user_id'];
    $action_name = "CLAIM_REWARD";
    $sql="INSERT INTO reward_point_log (`user_id`, `reward_id`, `action_name`)
    VALUES('$user_id','$reward_id','$action_name')";
    $result=mysqli_query($db,$sql);
    if($result){
        session_start();
        $_SESSION['message'] = 'Successfully gave reward!';
        header('location:../admin/userProfile?id='.$user_id.'');
    } else {
        die(mysqli_error($db));
    }
}
?>

