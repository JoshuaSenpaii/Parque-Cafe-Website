<?php
    include('../assets/connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = trim($_POST['username']);
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "SELECT user_id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0){
            echo "This email is already taken";
        }
        else{
            $sql = "INSERT INTO users (username, firstname, lastname, email, phone, password) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt -> bind_param("ssssss", $username, $firstname, $lastname, $email, $phone, $password);
            if ($stmt->execute()){
                echo "New record created successfully";
                header("location: login.php");
            }
            else{
                echo "Something went wrong. Please try again later";
            }
        }
        $stmt->close();
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Parque Cafe Sign-Up</title>
        <link href ="../assets/css/register.css" type ="text/css" rel ="stylesheet">
    </head>
    <body>
        <img class="background-image" src="../assets/images/pexelheartcoffee.jpg" alt="Coffee Background">

        <div class="container">
            <div class="left-panel">
                <h2>Welcome to</h2>
                <div class="logo">☕</div>
                <h1>Parque Cafe</h1>
                <p>text here.</p>
            </div>
            <div class="right-panel">
                <h2>Registration</h2>
                <form method="post">
                    <div class="form-row">
                        <div>
                            <label>First Name</label>
                            <label><input type="text" placeholder="First Name" name="firstname"></label>
                        </div>
                        <div>
                            <label>Last Name</label>
                            <label><input type="text" placeholder="Last Name" name="lastname"></label>
                        </div>
                    </div>

                    <label>Username</label>
                    <label><input type="text" placeholder="Username" name="username"></label>

                    <label>Email</label>
                    <label><input type="text" placeholder="Email" name="email"></label>

                    <label>Phone</label>
                    <label><input type="text" placeholder="Phone" name="phone"></label>

                    <label>Password</label>
                    <label><input type="password" placeholder="Password" name="password"></label>

                    <button type="submit" name="submit">Submit</button>
                    <a href="login.php">Already have an account? Login here!</a>
                </form>
            </div>
        </div>
    </body>
</html>

