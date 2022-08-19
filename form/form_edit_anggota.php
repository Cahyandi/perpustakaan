<?php
include("../db/koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: data_anggota.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_anggota WHERE id=$id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

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
    <title>Form Edit</title>
</head>

<body style="background-color: #e9eaef;">
    <div class="container-sm d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="inner-container rounded" style="width: 500px; background-color: #fff; padding: 40px;">

            <!-- Form Edit  -->

            <form class="row g-3" action="../proses/update_data_anggota.php" method="POST">
                <h3>Form Edit Data Anggota</h3>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                <div class="col-md-6">
                    <label for="" class="form-label label-form">nim</label>
                    <input type="number" name="nim" class="form-control" placeholder="Masukkan nim" value="<?php echo $data['nim']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label label-form">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div class="col-12">
                    <label for="" class="form-label label-form">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option selected>Pilih</option>
                        <option value="Laki-Laki" <?php if($data['jenis_kelamin'] == 'Laki-Laki'){ echo 'selected'; } ?>>
                        Laki-laki</option>
                        <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan'){ echo 'selected'; } ?>>
                        Perempuan</option>
                    </select>
                    <!-- <select name="jenis_buku" id="jenis_buku" class="form-control">
                <option value="Teknik" <?php if($data['jenis_buku'] == 'Teknik'){ echo 'selected'; } ?>>
                Teknik</option>
                <option value="Komputer" <?php if($data['jenis_buku'] == 'Komputer'){ echo 'selected'; } ?>>
                Komputer</option>
                <option value="Novel" <?php if($data['jenis_buku'] == 'Novel'){ echo 'selected'; } ?>>
                Novel </option>
                <option value="Komik" <?php if($data['jenis_buku'] == 'Komik'){ echo 'selected'; } ?>>
                Komik</option>
                <option value="Dongeng" <?php if($data['jenis_buku'] == 'Dongeng'){ echo 'selected'; } ?>>
                Dongeng</option>
                <option value="Majalah" <?php if($data['jenis_buku'] == 'Majalah'){ echo 'selected'; } ?>>
                Majalah</option>
              </select> -->
                
                </div>
                <div class="col-12">
                    <label for="" class="form-label label-form">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukkan alamat"><?php echo $data['alamat'] ?></textarea>
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label for="" class="form-label label-form">No Handphone</label>
                    <input type="number" name="no_hp" class="form-control" maxlength="12" placeholder="Masukkan No Handphone" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <div class="col-12 ">
                    <a href="data_anggota.php" style="text-decoration: none;">
                        <button type="button" class="btn btn-secondary" >Cancel</button>
                    </a>
                    <button type="submit" class="btn btn-primary" name="edit">Update Data</button>
                    
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>