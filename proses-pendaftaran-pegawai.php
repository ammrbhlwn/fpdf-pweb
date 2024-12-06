<?php

include("config.php");

if (isset($_POST['daftar'])) {

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
		$sql = "INSERT INTO pegawai (nama, alamat, jenis_kelamin, agama, jabatan, email, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$jabatan', '$email', '$foto')";
		$query = mysqli_query($db, $sql);

		if ($query) {
			header('Location: list-pegawai.php?status=sukses');
		} else {
			header('Location: list-pegawai.php?status=gagal');
		}
	}
} else {
	die("Akses dilarang...");
}
