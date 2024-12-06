<?php
include("config.php");

if (isset($_POST['simpan'])) {

	$id = (int)$_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$jabatan = $_POST['jabatan'];
	$email = $_POST['email'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	$path = "images/" . $foto;

	if (move_uploaded_file($tmp, $path)) {
		$sql = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jk', agama = '$agama', jabatan = '$jabatan', email = '$email', foto = '$foto' WHERE id = $id";
		$query = mysqli_query($db, $sql);

		if ($query) {
			header('Location: list-pegawai.php');
		} else {
			die("Gagal menyimpan perubahan...");
		}
	}
} else {
	die("Akses dilarang...");
}
