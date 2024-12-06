<?php

include("config.php");

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	$sql_get = "SELECT foto FROM pegawai WHERE id=$id";
	$result = mysqli_query($db, $sql_get);
	$data = mysqli_fetch_assoc($result);

	if (is_file("images/" . $data['foto'])) {
		unlink("images/" . $data['foto']);
	}

	$sql = "DELETE FROM pegawai WHERE id=$id";
	$query = mysqli_query($db, $sql);

	if ($query) {
		header('Location: list-pegawai.php');
	} else {
		die("gagal menghapus...");
	}
} else {
	die("akses dilarang...");
}
