<?php
require '../connect.php';

session_start();

if (isset($_POST['selectedMessages']) && is_array($_POST['selectedMessages'])) {
    $selectedMessages = $_POST['selectedMessages'];

    foreach ($selectedMessages as $id) {
        $id = mysqli_real_escape_string($db, $id);
        $sql = "DELETE FROM admin_inbox WHERE id = $id";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            die(mysqli_error($db));
        }
    }

    $_SESSION['message'] = 'Successfully deleted selected messages!';
    header('location:../admin/inbox');
} else {
    $_SESSION['message'] = 'No messages selected for deletion.';
    header('location:../admin/inbox');
}
?>
