<?php
include("../db/koneksi.php");

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
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/dropdown.css?v=<?php echo time(); ?>">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data anggota</title>
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
                    <a class="nav-link" href="data_anggota.php">Data Anggota</a>
                </li>
                <li class="nav-item d-flex align-items-center pt-2">
                    <label><i class="fa-solid fa-book"></i></label>
                    <a class="nav-link" href="data_buku.php">Data Buku</a>
                </li>
                <li class="nav-item pt-2">
                    <div class="dropdown-action d-flex align-items-center"  onclick="dropDown(this)">
                    <label class="me-2"><i class="fa-solid fa-plus "></i></label>    
                    <div class="nav-link">Transaksi</div>
                        <span class="caret-down">
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                    </div>
                    <div class="dropdown-content " >
                        <a class="nav-link" href="peminjaman.php">Peminjaman</a>
                        <a class="nav-link" href="pengembalian.php">Pengembalian</a>
                    </div>
                </li>
            </ul>
            <div class="logout ">
                <a href="../logout.php" class="btn d-flex flex-column">
                    <i class="fa-solid fa-right-from-bracket"></i>Log out</a>
            </div>
        </nav>

        <!-- Content -->
        <div class="content-wrapper d-flex flex-column" style="width: 100%;">
            <!-- Top bar -->
            <nav class="navbar-expand navbar-light bg-white top-bar shadow d-flex justify-content-around align-items-center p-3">
                <a class="navbar-brand" href="#"></a>
                <?php echo "<span class='fs-6' > Hi, " . $_SESSION['username']  . "<span class='far fa-user' style='padding-left: 10px;'></span></span>"; ?>
            </nav>

            <!-- Content Dashboard -->
            <div class="container pt-3">
                <h1 class="mb-5">Data Anggota</h1>
                <!-- Masukkan fe data buku dibawah ini -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH DATA ANGGOTA <i class="fa-solid fa-plus"></i></button>
                <!-- Modal Box -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Anggota</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- Form input data buku -->
                                <form class="row g-3" action="../proses/insert_data_anggota.php" method="POST">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Nim</label>
                                        <input type="number" name="nim" class="form-control" placeholder="Masukkan nim" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option selected>Pilih</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="Masukkan alamat"></textarea>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <label for="" class="form-label label-form">No Handphone</label>
                                        <input type="number" name="no_hp" class="form-control" maxlength="12" placeholder="Masukkan No Handphone" required>
                                    </div>
                                    <div class="col-12 ">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="input">Tambah</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Table data buku -->
                <table class="table table-striped mt-5">
                    <thead style="background-color: rgb(56, 145, 145);">
                        <tr>
                            <th scope="col" class="text-white">No</th>
                            <th scope="col" class="text-white">Nim</th>
                            <th scope="col" class="text-white">Nama</th>
                            <th scope="col" class="text-white">Jenis Kelamin</th>
                            <th scope="col" class="text-white">Alamat</th>
                            <th scope="col" class="text-white">No Handphone</th>
                            <th scope="col" class="text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_anggota";
                        $query = mysqli_query($conn, $sql);

                        while ($nama_buku = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            echo "<td>" . $nama_buku['id'] . "</td>";
                            echo "<td>" . $nama_buku['nim'] . "</td>";
                            echo "<td>" . $nama_buku['nama'] . "</td>";
                            echo "<td>" . $nama_buku['jenis_kelamin'] . "</td>";
                            echo "<td>" . $nama_buku['alamat'] . "</td>";
                            echo "<td>" . $nama_buku['no_hp'] . "</td>";

                            echo "<td>";

                            echo "<a href='form_edit_anggota.php?id=" . $nama_buku['id'] . "'><button type='button' class='btn btn-warning'>
                            <i class='fa-solid fa-pen-to-square'></i></button></a> | ";
                            echo "<a href='../proses/delete_data_anggota.php?id=" . $nama_buku['id'] . "'><button type='button' class='btn btn-danger'>
                            <i class='fa-solid fa-trash-can'></i></button></a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Custom js -->
    <script src="../assets/js/script.js"></script>
</body>

</html>