<?php
    include('connection.php');
    session_start();

    if(isset($_SESSION['email'])) {
        header("Location: Parque.php");
        exit();
    }

    // Your login logic here
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Parque Log In Form</title>
    <link href="index.css" rel="stylesheet">
</head>
    <body>
        <div class="container">
            <div class="left-panel">
                <img src="img/pexelscoffee.jpg" alt="Coffee Cup"/>
            </div>
            <div class="right-panel">
                <div class="login-box">
                    <div class="logo">
                        <h2>☕<br><span>Parque</span> Cafe </h2>
                    </div>
                    <h3>Welcome Back, Please login to your account</h3>
                    <form action="login.php" method="post">
                        <input name="email" type="email" placeholder="Email address" required />
                        <input name="password" type="password" placeholder="Password" required />
                        <div class="options">
                            <label><input type="checkbox" name="remember"/>Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>
                        <button name="submit" type="submit" class="sign-in">Sign In</button>
                        <div class="google-signin"></div>
                    </form>
                    <p class="signup-text">Don't have an account? <a href="registerform.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
