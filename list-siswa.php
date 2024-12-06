<?php
include("config.php");

$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);

if (!$query) {
	die("Query Error: " . mysqli_error($db));
}

$siswaList = [];
while ($siswa = mysqli_fetch_assoc($query)) {
	$siswaList[] = $siswa;
}
?>

<?php include 'form-daftar-siswa.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
	<title>Daftar Siswa | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Daftar Siswa</h3>
	</header>

	<main>
		<div class="cta">
			<button class="daftar" onclick="openModal()">Daftar Baru</button>
			<a href="print-pdf-siswa.php" target="_blank">Cetak Pdf</a>
		</div>

		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Sekolah Asal</th>
				<th>Foto</th>
				<th>Aksi</th>
			</tr>
			<?php
			if (count($siswaList) > 0) {
				foreach ($siswaList as $siswa) {
					echo "<tr>
                        <td>{$siswa['id']}</td>
                        <td>{$siswa['nama']}</td>
                        <td>{$siswa['alamat']}</td>
                        <td>{$siswa['jenis_kelamin']}</td>
                        <td>{$siswa['agama']}</td>
                        <td>{$siswa['sekolah_asal']}</td>
                        <td><img src='images/" . $siswa['foto'] . "' width='100' height='100'></td>
                        <td>
                            <a class='edit' onclick='openEditModal()'>Edit</a>
                            <a class='delete' href='hapus-siswa.php?id=" . $siswa['id'] . "'>Hapus</a>
                        </td>
                      </tr>";
				}
			} else {
				echo "<tr><td colspan='8'>Tidak ada data siswa.</td></tr>";
			}
			?>
		</table>

		<button class="back" onclick="window.location.href='index.php'">Kembali</button>

		<?php if (isset($_GET['status'])): ?>
			<p class="status">
				<?php if ($_GET['status'] == 'sukses') {
					echo "Pendaftaran siswa baru berhasil!";
				} else {
					echo "Pendaftaran gagal!";
				}
				?>
			</p>
		<?php endif; ?>

		<div>
			<div id="editModal" class="modal-container" style="display:none;">
				<div class="modal-content">
					<h3>Edit Siswa <span class="close" onclick="closeEditModal()">&times;</span></h3>

					<form action="proses-edit-siswa.php" method="POST" class="register-form" enctype="multipart/form-data">
						<input type="hidden" id="id" name="id" value="<?php echo $siswa['id'] ?>" />
						<div class="input-field">
							<label for="nama">Nama: </label>
							<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?php echo $siswa['nama'] ?>" />
						</div>
						<div class="input-field">
							<label for="alamat">Alamat: </label>
							<input type="text" id="alamat" name="alamat" placeholder="Alamat" required value="<?php echo $siswa['alamat'] ?>"></input>
						</div>
						<div class="input-field">
							<label>Jenis Kelamin: </label>
							<label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required <?php echo ($siswa['jenis_kelamin'] == 'Laki-Laki') ? "checked" : "" ?> /> Laki-laki</label>
							<label><input type="radio" name="jenis_kelamin" value="Perempuan" required <?php echo ($siswa['jenis_kelamin'] == 'Perempuan') ? "checked" : "" ?> /> Perempuan</label>
						</div>
						<div class="input-field">
							<label for="editAgama">Agama: </label>
							<select id="editAgama" name="agama" required>
								<option <?php echo ($siswa['agama'] == 'Islam') ? "selected" : "" ?>>Islam</option>
								<option <?php echo ($siswa['agama'] == 'Kristen') ? "selected" : "" ?>>Kristen</option>
								<option <?php echo ($siswa['agama'] == 'Hindu') ? "selected" : "" ?>>Hindu</option>
								<option <?php echo ($siswa['agama'] == 'Budha') ? "selected" : "" ?>>Budha</option>
								<option <?php echo ($siswa['agama'] == 'Atheis') ? "selected" : "" ?>>Atheis</option>
							</select>
						</div>
						<div class="input-field">
							<label for="sekolah_asal">Sekolah Asal: </label>
							<input type="text" id="sekolah_asal" name="sekolah_asal" required placeholder="Sekolah Sal" value="<?php echo $siswa['sekolah_asal'] ?>" />
						</div>
						<div class="input-field">
							<label for="foto">Foto: </label>
							<input type="file" id="foto" name="foto" required />
						</div>
						<button type="submit" name="simpan" class="send">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</main>
	<script src="./scripts/index.js"></script>
</body>

</html>