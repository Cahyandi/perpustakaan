<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css?v=<?php echo time(); ?>">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper d-flex">
        <!-- Side bar -->
        <nav class="navbar navbar-expand d-flex flex-column align-item-start " id="sidebar">
            <a href="" class=" navbar-brand  mt-3" style="margin-right: inherit;">
                <div class="display-5 fw-bold fs-4 text-white "> PERPUSTAKAAN</div>
            </a>
            <ul class="navbar-nav d-flex flex-column mt-5 w-100 p-3">
                <li class="nav-item d-flex align-items-center ">
                    <label><i class="fa-solid fa-house"></i></label>
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item d-flex align-items-center pt-2">
                    <label><i class="fa-solid fa-users"></i></label>
                    <a class="nav-link" href="pages/data_anggota.php">Data Anggota</a>
                </li>
                <li class="nav-item d-flex align-items-center pt-2">
                    <label><i class="fa-solid fa-book"></i></label>
                    <a class="nav-link" href="pages/data_buku.php">Data Buku</a>
                </li>
                <li class="nav-item d-flex align-items-center pt-2">
                    <label><i class="fa-solid fa-plus"></i></label>
                    <a class="nav-link" href="">Transaksi</a>
                </li>
            </ul>
            <div class="logout ">
                <a href="logout.php" class="btn d-flex flex-column">
            <i class="fa-solid fa-right-from-bracket"></i>Log out</a>
        </div>
        </nav>
        
        <!-- Content -->
        <div class="content-wrapper d-flex flex-column" style="width: 100%;">
            <!-- Top bar -->
            <nav class="navbar-expand navbar-light bg-white top-bar shadow d-flex justify-content-around align-items-center p-2">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-bars" style="color: black;"></i></a>
                <?php echo "<span class='fs-6' > Hi, " . $_SESSION['username']  . "<span class='far fa-user' style='padding-left: 10px;'></span></span>"; ?>
            </nav>

            <!-- Content Dashboard -->
            <div class="container pt-3">
                <h1 class="mb-5">Data Buku</h1>
                <!-- Masukkan fe data buku dibawah ini -->
                
            </div>
        </div>
    </div>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>