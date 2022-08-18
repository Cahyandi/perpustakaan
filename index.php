<?php 
// Memanggil koneksi database dari folder db
include './db/koneksi.php';

error_reporting(0);

// Inisialisasi session
session_start();

if (isset($_SESSION['username'])) {
    header("Location:form/dashboard.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location:form/dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/loginRegister.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="./assets/images/logo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Perpustakaan
        </div>
        <label class="d-flex align-items-center justify-content-center">Login to manage your acount</label>
        <form class="p-3 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3" name="submit">Sign In</button>
        </form>
        <div class="text-center fs-6">
            <label>Don't have an acount? <a href="register.php">Sign up</a></label>
        </div>
    </div>
</body>
</html>