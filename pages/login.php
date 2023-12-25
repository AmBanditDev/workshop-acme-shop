<?php

session_start();
require_once("../config/connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ACME Shop</title>
    <link rel="shortcut icon" href="../assets/logos/shop.png" type="image/x-icon">

    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body class="position-relative">
    
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success position-absolute top-0 end-0 m-2 w-25" role="alert">
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger position-absolute top-0 end-0 m-2 w-25" role="alert">
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
    <?php } ?>

    <main class="container mx-auto">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="card custom-card shadow-lg">
                <div class="card-header bg-white border-bottom-0">
                    <h1 class="text-center py-2">Login</h1>
                </div>
                <div class="card-body">
                    <form action="../management/login_db.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email.." />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password.." />
                        </div>
                        <button class="btn btn-light w-100 py-2" name="login">Login</button>
                        <div class="d-block text-center mt-2">
                            <small>Are you don't have an account? <a href="register.php" class="text-primary fw-semibold">Register</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>