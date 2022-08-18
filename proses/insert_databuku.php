<?php
include("../db/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

// ambil data dari formulir
$judulbuku = $_POST['judul_buku'];
$jenisbuku = $_POST['jenis_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahunterbit = $_POST['thn'];


    // buat query
    $sql = "INSERT INTO tb_buku (judul_buku, jenis_buku, pengarang, penerbit, tahun_terbit) VALUES ('$judulbuku','$jenisbuku','$pengarang','$penerbit','$tahunterbit')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:../form/data_buku.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location:../form/data_buku.php?status=gagal');
    }
}
    ?>