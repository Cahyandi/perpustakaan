<?php
include("../db/koneksi.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css?v=<?php echo time(); ?>">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Form Edir</title>
</head>

<body style="background-color: #e9eaef;">
    <div class="container-sm d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="inner-container rounded" style="width: 500px; background-color: #fff; padding: 40px;">
            
        <!-- Form Edit  -->
        <form class="row g-3" action="../proses/insert_databuku.php" method="POST">
                <h3>Form Edit Data Buku</h3>
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
                    <input type="date" name="tahun_terbit" style="width: 130px;" required>
                </div>
                <div class="col-12 ">
                    <a href="data_buku.php" style="text-decoration: none;">
                        <button type="button" class="btn btn-secondary" >Cancel</button>
                    </a>
                    <button type="button" class="btn btn-primary" name="input">Edit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>