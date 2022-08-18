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
                <a href="../logout.php" class="btn d-flex flex-column">
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH DATA BUKU <i class="fa-solid fa-plus"></i></button>
                <!-- Modal Box -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- Form input data buku -->
                                <form class="row g-3" action="../proses/insert_databuku.php" method="POST">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Judul Buku</label>
                                        <input type="text" name="judul_buku" class="form-control" placeholder="Masukkan judul buku" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Jenis Buku</label>
                                        <select class="form-select" name="jenis_buku">
                                            <option selected>Pilih</option>
                                            <option>Novel</option>
                                            <option>Komik</option>
                                            <option>Dongeng</option>
                                            <option>Majalah</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control" placeholder="Masukkan pengarang" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control" placeholder="Masukkan penerbit" required>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <label for="" class="form-label label-form">Tahun Terbit</label>
                                        <input type="date" name="thn" style="width: 130px;" required>
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
                            <th scope="col" class="text-white">Judul Buku</th>
                            <th scope="col" class="text-white">Jenis Buku</th>
                            <th scope="col" class="text-white">Pengarang</th>
                            <th scope="col" class="text-white">penerbit</th>
                            <th scope="col" class="text-white">Tahun Terbit</th>
                            <th scope="col" class="text-white">Form</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_buku";
                        $query = mysqli_query($conn, $sql);

                        while ($nama_buku = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            echo "<td>" . $nama_buku['id'] . "</td>";
                            echo "<td>" . $nama_buku['judul_buku'] . "</td>";
                            echo "<td>" . $nama_buku['jenis_buku'] . "</td>";
                            echo "<td>" . $nama_buku['pengarang'] . "</td>";
                            echo "<td>" . $nama_buku['penerbit'] . "</td>";
                            echo "<td>" . $nama_buku['tahun_terbit'] . "</td>";

                            echo "<td>";

                            echo "<a href='form_edit_buku.php?id=" . $nama_buku['id'] . "'><button type='button' class='btn btn-warning'>
                            <i class='fa-solid fa-pen-to-square'></i></button></a> | ";
                            echo "<a href='../proses/hapus.php?id=" . $nama_buku['id'] . "'><button type='button' class='btn btn-danger'>
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
</body>

</html>