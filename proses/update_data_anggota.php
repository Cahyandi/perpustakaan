<?php
include("../db/koneksi.php");

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['edit'])){

// menyimpan data ke dalam variabel
$id     = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$nohp = $_POST['no_hp'];

    // buat query
    $sql = "UPDATE tb_anggota SET nim='$nim', nama='$nama', jenis_kelamin='$jeniskelamin', alamat='$alamat', no_hp='$nohp' WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:../form/data_anggota.php?status=sukses');
    } else {
      // kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
} else {
	die("Akses gagal...");
}

?>