<?php
// Memanggil koneksi database dari folder db
include './db/koneksi.php';
error_reporting(0);

// Inisialisasi session
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // $cpassword = password_hash($_POST["cpassword"], PASSWORD_DEFAULT);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_petugas WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_petugas VALUES ('', '$nama','$username','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
    <title>Register</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="./assets/images/logo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Perpustakaan
        </div>
        <label class="d-flex align-items-center justify-content-center">Create your account</label>
        <form class="p-3 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nama" class="input" placeholder="Nama Lengkap"required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="cpassword" class="input" placeholder="Confirm Password" required>
            </div>
            <button class="btn mt-3" name="submit">Sign Up</button>
        </form>
        <div class="text-center fs-6">
            <label>Already have an account?<a href="index.php"> Sign in</a></label>
        </div>
    </div>
</body>
</html>