<?php

session_start();
require_once("../config/connect.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $_SESSION['error'] = "Please enter email.";
        header("location: ../pages/login.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("location: ../pages/login.php");
    } else if(empty($password)) {
        $_SESSION['error'] = "Please enter password.";
        header("location: ../pages/login.php");
    } else if (strlen($password) < 5 || strlen($password) > 20) {
        $_SESSION['error'] = "Password must be between 5 and 20 characters long.";
        header("location: ../pages/login.php");
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM user WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if($check_data->rowCount() > 0){
                if($email == $row['email']){
                    if(password_verify($password, $row['password'])){
                        $_SESSION['user_login'] = $row['id'];
                        header("location: ../index.php");
                    } else {
                        $_SESSION['error'] = "Invalid password.";
                        header("location: ../pages/login.php");
                    }
                } else {
                    $_SESSION['error'] = "Invalid email.";
                    header("location: ../pages/login.php");
                }
            } else {
                $_SESSION['error'] = "There is no information in the system.";
                    header("location: ../pages/login.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>