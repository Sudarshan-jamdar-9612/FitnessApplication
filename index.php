<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="design.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body class="index">
   <header id="header">
        <img class="logo" src="media/0001.jpg" alt="logo" height="50px" width="150px">
        
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="support.html">Support</a></li>
            <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <div class="avatar" style="font-family: 'Poppins',sans-serif;
	font-size: 20px;font-weight :bold;">
        <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome, ". $_SESSION['username'] ," !"?>
        </div>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
        </ul>

    </header>
    <section>
        <h2 id="txt"><span>An online physio training platform</span><br>JimYog.com</h2>
        <img src="media/bird1.png" id="bird1">
        <img src="media/bird2.png" id="bird2">
        <img src="media/forest.png" id="forest">
        <img src="media/clif.png" id="clif">
        <img src="media/water.png" id="water">
    </section>

    <div class="sec">
        <h2>About JimYog</h2>
        <p>JimYog is applcaion where every single person no matter whether it is men,women or teenager everyone can use it to train themself<br><br> by just sitting back at home or anywhere,no need to go to trainer or at extreme if unable to go to gym not an issue you can workout by referring the videos and clips related to your choose.<br><br>
            Your choose can Gym workout or Yoga....
        </p>

        <!-- <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div> -->
    </div>
    <div class="slider">
        <span style="--i:1;"><a href="workout.html"><img src="media/gym-swap.png" alt="Gym" ></a></span>
        <span style="--i:2;"><a href="yoga.html"><img src="media/yoga-swap.png" alt="yoga" ></a></span>
        <span style="--i:3;"><a href="food.html"><img src="media/food-swap.png" alt="food" ></a></span>
        <span style="--i:4;"><a href="cardio.html"><img src="media/cardiocard.jpg" alt="BMI"  ></a></span>
        <span style="--i:5;"><a href="Weather.html"><img src="media/wheather-swap.jpg" alt="wheather" ></a></span>
    </div>

    <script>
        let txt = document.getElementById('txt');
        let bird1 = document.getElementById('bird1');
        let bird2 = document.getElementById('bird2');
        let btn = document.getElementById('btn');
        let clif = document.getElementById('clif');
        let forest = document.getElementById('forest');
        let water = document.getElementById('water');
        let header = document.getElementById('header');

        window.addEventListener('scroll',function(){
            let value = window.scrollY;
            txt.style.top = 50 + value * -0.5 + '%';
            bird1.style.top = value * -1.5 + 'px';
            bird1.style.left = value * 2 + 'px';
            bird2.style.top = value * -5 + 'px';
            bird2.style.left = value * -1.5 + 'px';
            btn.style.marginTop = value * 1.5 + 'px';
            clif.style.top = value * -0.12 + 'px';
            forest.style.top = value * 0.25 + 'px';
            header.style.top = value * -0.5 + 'px';
        })

    </script>
</body> 
</html>