<?php
    session_start();

    require_once '../assets/connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT user_id, username, password, role FROM users WHERE email = ?";

        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> store_result();

        if ($stmt -> num_rows == 1){
            $stmt -> bind_result($user_id, $username, $hashed_password, $role);
            $stmt -> fetch();
            if (password_verify($password, $hashed_password)){
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                if($role == 'admin'){
                    header('Location: ../admin/dashboard.php'); //admin dashboard
                    exit();
                }
                else{
                    header('Location: ../index.php'); //main page
                    exit();
                }
            }
            else{
                echo "Wrong password";
            }
        }
        else{
            echo "Wrong email";
        }
        $stmt -> close();
    }
    $conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Parque Login</title>
        <link href="../assets/css/login.css" rel="stylesheet">
        <link href=".." rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="left-panel">
                <img src="../assets/images/pexelscoffee.jpg" alt="Coffee Cup"/>
            </div>
            <div class="right-panel">
                <div class="login-box">
                    <div class="logo">
                        <h2>☕<br><span>Parque</span> Cafe </h2>
                    </div>
                    <h3>Welcome Back, Please log in to your account</h3>
                    <form method="post">
                        <label>
                            <input name="email" type="email" placeholder="Email" required />
                        </label>
                        <label>
                            <input name="password" type="password" placeholder="Password" required />
                        </label>
                        <br>
                        <br>
                        <button name="submit" type="submit" class="sign-in">Login</button>
                        <a id="a" href="register.php">Don't have an account? Register here!</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>