<?php
session_start();
include('connection.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT userid, password FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt === false){
        echo '<script type="text/javascript">
                    window.location = "index.php";
            </script>';
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if(password_verify($password, $hashed_password)){
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['email'] = $email;

            echo '<script type="text/javascript">
                    alert("Welcome");
                    window.location = "#";
                </script>';
            exit();
        }
        else{
            echo '<script type="text/javascript">
                    alert("Invalid Email or Password");
                    window.location = "index.php";
                </script>';
            exit();
        }
    }
    else{
        echo '<script type="text/javascript">
                alert("Invalid email or password");
                window.location = "index.php";
            </script>';
        exit();
    }
    $conn->close();
}
?>
