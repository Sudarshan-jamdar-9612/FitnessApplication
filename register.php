<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = ""; //handel error

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
        echo '<script>alert("Enter Username or Password")</script>';
    }
    else{
        //sql query
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt); //if no error thn store
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; //if user has account thn msg error to user
                    echo '<script>alert(" Username Already Exist")</script>';

                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "ERROR : Fuzzy code...";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo '<script>alert("Password should be more then 5 characters")</script>';
}
else{
    $password = trim($_POST['password']); //set the password
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Sorry,Passwords Mis_Match....";
    echo '<script>alert("Password & Confirm Password are not same")</script>';
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Warning : Lost!,can't Redirect";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="design/Register.css">

</head>
<body class="index">
   <header id="header">
        <img class="logo" src="media/0001.jpg" alt="logo" height="50px" width="150px">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="support.html">Support</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="#"  class="active">Signup</a></li>
        </ul>
    </header>

    <div class="container mt-4">
<h3>Welcome to JimYog.com , please Register/Login</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
<section>
        <h2 id="txt"></h2>
        <img src="media/bird1.png" id="bird1">
        <img src="media/bird2.png" id="bird2">
        <img src="media/forest.png" id="forest">
    </section>
    <div class="sec">
        <h2>About JimYog</h2>
        <p>JimYog is applcaion where every single person no matter whether it is men,women or teenager everyone can use it to train themself<br><br> by just sitting back at home or anywhere,no need to go to trainer or at extreme if unable to go to gym not an issue you can workout by referring the videos and clips related to your choose.<br><br>
            Your choose can Gym workout or Yoga....
        </p>
        <p><marquee> <h1> Below Card's[feature's] will be Accessable only after Log_In</h1></marquee></p>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body> 
</html>