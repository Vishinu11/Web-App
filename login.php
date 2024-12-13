<?php
// Database connection
@include 'db.php';
session_start();
if(isset($_POST['login'])){
// Fetch form data
$username = $_POST['username'];
$password=md5($_POST['password']);

// Query admin_login
$sql = "SELECT * FROM admin_login WHERE username='$username'&& password_hash='$password'";
$result =mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
} else {
    echo'<script>alert("INCORRECT USERNAME OR PASSWORD!")</script>';
    $error1[]='INCORRECT USERNAME OR PASSWORD!';
}
};

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .login-card {
            background: #ffffff;
            color: #000;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #6a11cb;
        }
        .login-card .form-control {
            border-radius: 30px;
        }
        .login-card .btn {
            background: #6a11cb;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
        }
        .login-card .btn:hover {
            background: #2575fc;
        }
        .login-card .icon {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .login-card .icon i {
            font-size: 50px;
            color: #6a11cb;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="icon">
            <i class="fas fa-user-shield"></i>
        </div>
        <h2>Admin Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </form>
        <?php

if (isset($error1)){
    foreach($error1 as $error1){
        echo '<span style="color: red; font-weight: bold;" class="error-msg">'.$error1.'</span><br>';
    };
};

?>
    </div>
</body>
</html>