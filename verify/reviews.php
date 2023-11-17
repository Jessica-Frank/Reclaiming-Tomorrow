
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclaiming Tomorrow</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
    
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');

          * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
        }
        body {
            background-color: #FAF1E4;
            background-color:#FAF1E4;
            background-size: cover;
            background-position: center;
            
            padding-top: 64px;
            flex-direction: column;
           
            min-height: 100vh;
           
        }

        header {
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 100px;
            background: #40513B;
            display: flex;
            position: fixed;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .logo {
            font-size: 1.2em;
            color: #FAF1E4;
            user-select: none;
        }

        .navigation {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navigation a {
            position: relative;
            font-size: 1em;
            color: #FAF1E4;
            text-decoration: none;
            margin-right: 40px;
            margin: 0 auto 0 60px;
        }

        .navigation a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 3px;
            background: #FAF1E4;
            border-radius: 5px;
            transform-origin: right;
            transform: scaleX(0);
            transition: transform .5s;
        }

        .navigation a:hover::after {
            transform: scaleX(1);
        }

        .navigation .btnLogin-popup {
            font-size: 1em;
            color: #FAF1E4;
            background: transparent;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            justify-content: flex-end;
            transition: .5s;
            text-decoration: none;
        }

        .navigation .btnLogin-popup:hover {
            background: #CEC5B7;
            color: #162938;
        }




        h1 {
            text-align: center;
        }

        form {
            max-width: 370px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #9DC08B;
        }

        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100px;
        }

        .reviews {
            margin: 20px auto;
            max-width: 600px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #ffffff;
        }

        .review {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        form input[type="submit"] {
            background-color: #000000; 
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            justify-content: flex-end;
            transition: .5s;
        }

        .wrapper{     
        display: flex;
        position: relative;
      
      }
      
      .wrapper .sidebar{ /*Used to maintain content within the sidebar*/
        width: 200px;
        height: 100%;
        background: #609966;
        padding: 30px 0px;
        position: fixed;
        top: 50px;
      }
      
      .wrapper .sidebar h2{
        color: #FAF1E4;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
      }
      
      .wrapper .sidebar ul li{
        padding: 10px;
        border-bottom: 1px solid #CEC5B7;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-top: 1px solid rgba(255,255,255,0.05);
      }    
      
      .wrapper .sidebar ul li a{
        color: #FAF1E4;
        display: block;
      }
      
      .wrapper .sidebar ul li a .fas{
        width: 25px;
      }
      
      .wrapper .sidebar ul li:hover{ /*Used to modify the hovering style on the sidebar*/
        background-color: #9DC08B;
      }
          
      .wrapper .sidebar ul li:hover a{
        color: #FAF1E4;
      } 
      
      .wrapper .main_content{ /*Contains the main page content*/
        width: 100%;
        margin-left: 200px;
      }
      
      .wrapper .main_content .info{
        margin: 20px;
        color: #717171;
        line-height: 25px;
      }
      
      .wrapper .main_content .info div{
        margin-bottom: 20px;
      }
      

    </style>
</head>
<body>
    <header>
        <h2 class="logo">Reclaiming Tomorrow</h2>
        <nav class="navigation">
        <a href="../index.php">Home</a>
        <a href="../county_search/search">Search</a>
        <a href="#">Local Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="#">Contact Us</a>
        <a href="../verify/login" class="btnLogin-popup">Login</a>
    </nav>
    </header>
    

    <h1>Location Reviews</h1>
    
    <form action="submit_reviews" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="location"> Location:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>

        <label for="message">Review:</label>
        <textarea  id="name" name="message" rows="4" required></textarea><br>

        <input type="submit" value="Submit Review">
    </form>

    <div class="reviews">


    </div>
    <div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
      <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
      <li><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
    </ul>
  </div>
</body>
</html>


