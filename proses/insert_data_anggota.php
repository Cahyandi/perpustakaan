<?php
include("../db/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

// ambil data dari formulir
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$nohp = $_POST['no_hp'];


    // buat query
    $sql = "INSERT INTO tb_anggota (nim, nama, jenis_kelamin, alamat, no_hp) VALUES ('$nim','$nama','$jeniskelamin','$alamat','$nohp')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:../form/data_anggota.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location:../form/data_anggota.php?status=gagal');
    }
}
    ?>