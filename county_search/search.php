<!DOCTYPE html>
<html lang="en">
<head>

    <title>Reclaiming Tomorrow</title>

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../verify/login.css">
<style>
body {
    background-color: #FAF1E4;
}

.navbar {
    background-color: #40513B;
}
.nav-link {
    color: #FAF1E4;
}
.nav-link:hover {
    color: #CEC5B7;
}

.navbar-brand {
    color:#FAF1E4;
}
.navbar-brand:hover {
    color: #CEC5B7;
}
/* Style The Dropdown Button */
.dropbtn {
  background-color: #40513B;
  color: #FAF1E4;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content  */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #FAF1E4;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #609966}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #40513B;
}
</style>
</head>
<body>
    <?php include '../include/header.php'; ?>



<h2> County Search</h2>
<p> Welcome to the County search page!</p>
<form>
  <label for="county">County Name</label>
  <input type="text" id="county" name="county">
</form>

</body>

</html> 
