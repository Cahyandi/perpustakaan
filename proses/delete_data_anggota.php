<?php
include ("../db/koneksi.php");
if( isset($_GET['id']) ){
// ambil id dari query string
$id = $_GET['id'];
// buat query hapus
$sql = "DELETE FROM tb_anggota WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
// apakah query hapus berhasil?
if( $query ){
echo "data terhapus berhasil";
header("Location:../form/data_anggota.php");
} else {
die("gagal menghapus...");
}
}
else {
die("akses dilarang...");
}
?>