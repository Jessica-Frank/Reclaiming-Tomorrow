<?php
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<?php include "../admin/header.php"; ?>
</head>
<body>

    <div>
        <h2>Access Denied</h2>
        <p>Sorry, you do not have permission to access this page.</p>
        <p>Go back to <a href="../index.php">Home</a></p>
    </div>
</body>
</html>