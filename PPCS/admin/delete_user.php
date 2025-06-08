<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["role"] != 'admin'){
        header("location: ../auth/login.php");
        exit;
    }

    require_once '../assets/connection.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt === false){
            $_SESSION['delete'] = "<div>Error:".mysqli_error($conn)."</div>";
            header("location: dashboard.php");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);
        if ($result !== false) {
            if(mysqli_stmt_affected_rows($stmt) > 0){
                $_SESSION['delete'] = "<div>User has been deleted</div>";
            }
            else{
                $_SESSION['delete'] = "<div>Failed to delete</div>";
            }
        }
        else{
            $_SESSION['delete'] = "<div>Failed to delete: ". mysqli_stmt_error($stmt) ."</div>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('location: dashboard.php');
        exit();
    }