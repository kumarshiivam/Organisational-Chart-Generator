<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <title>PHP login system!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .navbar-custom {
        background-color: #b1d9e0;
        color:black;
      }
      .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text, a {
            color: black;
            font-weight: bold;
        }
      button{
        background-color: #b1d9e0;
        border: none;
        border-radius:5px;
        color: black;
        font-weight:bold;
      }
      #loader {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #b1d9e0; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      margin-left: 40%;
      margin-top: 10%;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .hidden {
      display: none;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-custom ">
    <a class="navbar-brand" href="#">Chart Generating System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>
        </li>
        
       
      </ul>
    
      <div class="navbar-collapse collapse">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
          </li>
      </ul>
      </div>
    </div>
    
      
  </nav>
  <div style="margin-top:5%">
    <div class="container mt-4">
    <h3 style="font-weight: bold"><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
    <hr>

    <div class="container">
      <input style="color:#b1d9e0;  font-weight: bold" type="file" accept=".csv">
      <button style="font-wieght: bold; padding:10px" type="submit" id="startButton">Generate Chart</button>
    </div>
    <div id="loader" class="hidden"></div>

    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script >
    document.getElementById("startButton").addEventListener("click", function() {
      var loader = document.getElementById("loader");
      loader.classList.remove("hidden");

      setTimeout(function() {
        window.location.href = "display.php";
      }, 5000);
    });
    </script>
    
  </body>
</html>
