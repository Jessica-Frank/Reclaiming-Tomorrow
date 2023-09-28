<!DOCTYPE html>
<html lang="en">
<head>

    <title>Reclaiming Tomorrow</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="style.css" rel="stylesheet">
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
section{

display: block;
background-color: #40513B;
height: 250px;
width: 36%;
margin:5px;
padding:16px;
color: #FAF1E4;
}




</style>

<div class="dropdown">
  <button class="dropbtn">Counties</button>
  <div class="dropdown-content">
    <a href="county1.php">County 1</a>
    <a href="#">County 2</a>
    <a href="#">County 3</a>
  </div>
</div>


<div class="dropdown">
  <button class="dropbtn">Buying Bins</button>
  <div class="dropdown-content">
    <a href="#">County 1</a>
    <a href="#">County 2</a>
    <a href="#">County 3</a>
  </div>
</div>

</head>
<body>
    <?php include '../include/header.php'; ?>




<div class= "column left">
<section>
<h2> Associated Links </h2>

</section>

<section>
<h2> Recyling Pick-up Schuedule </h2>

</section>

<section>
<h2> Local Events </h2>

</section>
</div>

<div class= "column right">
<section>
<h2> Accepted Materials </h2>

</section>

<section>
<h2> Alternative Uses </h2>

</section>

<section>
<h2> Unacceptable Materials </h2>

</section>
</div>
</body>

</html> 