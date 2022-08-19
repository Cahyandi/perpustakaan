<?php
include("../db/koneksi.php");

// cek apakah tombol edit sudah diklik atau blum?
if(isset($_POST['edit'])){

// menyimpan data ke dalam variabel
$id     = $_POST['id'];
$judulbuku = $_POST['judul_buku'];
$jenisbuku = $_POST['jenis_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahunterbit = $_POST['thn'];

    // buat query
    $sql = "UPDATE tb_buku SET judul_buku='$judulbuku', jenis_buku='$jenisbuku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahunterbit' WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:../form/data_buku.php?status=sukses');
    } else {
      // kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
} else {
	die("Akses gagal...");
}

?>