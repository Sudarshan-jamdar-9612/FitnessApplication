<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: index.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
      echo '<script>alert("Enter Username or Password")</script>';
        // $err = " Please enter username + password " ;
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: index.php");
                            
                        }
                        else{
                          echo '<script>alert("Incorrect Details")</script>';

                            // echo "Warning : Verification went wrong";
                        }
                    }

                }

    }
}    


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="design/login.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body class="index">
<header id="header">
        <img class="logo" src="media/0001.jpg" alt="logo" height="50px" width="150px">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="support.html">Support</a></li>
            <li><a href="#"  class="active">Login</a></li>
            <li><a href="register.php">Signup</a></li>
        </ul>
    </header>

    <div class="container mt-4">
<h3>Welcome to JimYog.com , please Login/Register</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">LogIn</button>
</form>
</div>
<!-- ================================================================================================================= -->
<!-- ================================================================================================================= -->

<section>
        <h2 id="txt"></h2>
        <img src="media/bird1.png" id="bird1">
        <img src="media/bird2.png" id="bird2">
        <img src="media/forest.png" id="forest">
    </section>
<!-- ================================================================================================================= -->
<!-- ================================================================================================================= -->
    <div class="sec">
        <h2>About JimYog</h2>
        <p>JimYog is applcaion where every single person no matter whether it is men,women or teenager everyone can use it to train themself<br><br> by just sitting back at home or anywhere,no need to go to trainer or at extreme if unable to go to gym not an issue you can workout by referring the videos and clips related to your choose.<br><br>
            Your choose can Gym workout or Yoga....
        </p>
        <p><marquee> <h1> Below Card's[feature's] will be Accessable only after Log_In</h1></marquee></p>

    </div>
    </div>
    <div class="slider">
        <span style="--i:1;"><a href="#"><img src="media/gym-swap.png" alt="Gym" ></a></span>
        <span style="--i:2;"><a href="#"><img src="media/yoga-swap.png" alt="yoga" ></a></span>
        <span style="--i:3;"><a href="#"><img src="media/food-swap.png" alt="food" ></a></span>
        <span style="--i:4;"><a href="#"><img src="media/cardiocard.jpg" alt="BMI"  ></a></span>
        <span style="--i:5;"><a href="#"><img src="media/wheather-swap.jpg" alt="wheather" ></a></span>
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
