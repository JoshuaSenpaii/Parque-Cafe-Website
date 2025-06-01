<?php
    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password)){
            echo '<script type="text/javascript">
                alert("Please fill in all the required fields.");
                window.location = "registerform.php";
            </script>';
            exit();
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);

            if($stmt === false){
                echo header("location: registerform.php");
                exit();
            }

            mysqli_stmt_bind_param($stmt, 'sssis', $firstname, $lastname, $email, $phone, $hashed_password);
            if(mysqli_stmt_execute($stmt)){
                echo '<script type="text/javascript">
                    alert("New record created successfully, Redirecting to login page ...");
                </script>';
                header("location: index.php");
                exit();
            }
            else{
                if(mysqli_error($conn) == 1062){
                    echo '<script type="text/javascript">
                    alert("Email or phone number already exists");
                    window.location = "registerform.php";
                    </script>';
                }
                else{
                    echo "Error: " . mysqli_error($conn);
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);

