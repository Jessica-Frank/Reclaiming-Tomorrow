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
.button-link {
  display: inline-block;
  background-color: #40513B;
  color: #FAF1E4;
  text-decoration: none;
  padding: 10px 20px;
  border-radius: 5px;
  margin: 10px;
  text-align: center;
}

.button-link:hover {
  background-color: #FAF1E4;
  color: #40513B;
  text-decoration: underline;
  text-decoration-color: #40513B;
}
h1 {
            text-align: center;
        }
p{
	text-align: center;
}
</style>

</head>

<body>
    <?php include "include/header.php"; ?>

    <h1>Welcome to Reclaiming Tomorrow!</h1>
<p> Your one-stop shop for local recycling needs </p>
<br>
<h2> Users</h2>
   <br>
     <a href="/verify/login" class="button-link">User Login Page</a>
    <a href="/verify/dashboard" class="button-link">User Dashboard</a>
    <a href="/rewards/redemption" class="button-link">Rewards page link</a>
<a href="/maps/search" class="button-link">Recycling Location Search</a>
    <a href="/county_search/county" class="button-link">County Search</a>
<br>

<h2> Admins </h2>
<br>
<a href="/rewards/manage_tickets" class="button-link">Manage Tickets</a>
    <a href="/rewards/log" class="button-link">Points Log (For Admins)</a>
    
    <a href="/admin/dashboard" class="button-link">Preview of Admin Dashboard</a>
 
    <a href="/admin_verify/admin_login" class="button-link"> Admin Login Page</a>
    <br>

</body>

</html>

