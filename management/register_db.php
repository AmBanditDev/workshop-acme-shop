<?php

session_start();
require_once('../config/connect.php');

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    if (empty($firstname)) {
        $_SESSION['error'] = "Please enter firstname.";
        header("location: ../pages/register.php");
    } else if (empty($lastname)) {
        $_SESSION['error'] = "Please enter lastname.";
        header("location: ../pages/register.php");
    } else if (empty($email)) {
        $_SESSION['error'] = "Please enter email.";
        header("location: ../pages/register.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("location: ../pages/register.php");
    } else if (empty($password)) {
        $_SESSION['error'] = "Please enter password.";
        header("location: ../pages/register.php");
    } else if (strlen($password) < 5 || strlen($password) > 20) {
        $_SESSION['error'] = "Password must be between 5 and 20 characters long.";
        header("location: ../pages/register.php");
    } else if ($password != $cPassword) {
        $_SESSION['error'] = "Passwords don't match.";
        header("location: ../pages/register.php");
    } else {
        try {
            $check_email = $conn->prepare("SELECT email FROM user WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['email'] == $email) {
                $_SESSION['error'] = "This email is already in the system.";
                header("location: ../pages/register.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO user(firstname, lastname, email, password) 
                                        VALUES(:firstname, :lastname, :email, :password)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->execute();

                $_SESSION['success'] = "You have successfully applied for membership! <a href='login.php'><b>Login</b></a>";
                header("location: ../pages/register.php");
            } else {
                $_SESSION['success'] = "Something went wrong!";
                header("location: ../pages/register.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
