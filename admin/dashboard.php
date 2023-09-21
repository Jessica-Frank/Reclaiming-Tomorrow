<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    
    <style>
        <?php include "../admin_css/dash_custom.css" ?>
    </style>

</head>
<body>
  <?php include '../include/header.php'; ?>

    <div>
  <div class="home-container">
    <div class="home-container1">
      <span class="home-text">Admin Dashboard</span>
    </div>
    <div class="home-container2">
      <a href="/">  
        <button type="button" class="home-button button">Inbox</button>
      </a>
      <a href="/">  
        <button type="button" class="home-button1 button">
            <span class="home-text01">
            <span>Search Users</span>
            <br />
            </span>
        </button>
      </a>  
      <a href="/">  
        <button type="button" class="home-button2 button">
            <span class="home-text04">
            <span>Modify Rewards Page</span>
            <br />
            </span>
        </button>
      </a>
      <a href="/">  
        <button type="button" class="home-button3 button">
            <span>
            <span class="home-text08">Modify Recycling Information</span>
            <br />
            </span>
        </button>
      </a>
    </div>
  </div>
</div>
   
</body>
</html>   