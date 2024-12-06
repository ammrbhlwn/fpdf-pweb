<?php
include("config.php");

if (isset($_POST['simpan'])) {

	$id = (int)$_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah_asal'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	$path = "images/" . $foto;

	if (move_uploaded_file($tmp, $path)) {
		$sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$foto' WHERE id=$id";
		$query = mysqli_query($db, $sql);

		if ($query) {
			header('Location: list-siswa.php');
		} else {
			die("Gagal menyimpan perubahan...");
		}
	}
} else {
	die("Akses dilarang...");
}
