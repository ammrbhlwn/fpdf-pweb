<?php
include("config.php");

$sql = "SELECT * FROM pegawai";
$query = mysqli_query($db, $sql);

if (!$query) {
	die("Query Error: " . mysqli_error($db));
}

$pegawaiList = [];
while ($pegawai = mysqli_fetch_assoc($query)) {
	$pegawaiList[] = $pegawai;
}
?>

<?php include 'form-daftar-pegawai.php'; ?>


<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css">
	<title>Daftar Pegawai | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Daftar Pegawai</h3>
	</header>

	<main>
		<div class="cta">
			<button class="daftar" onclick="openModal()">Daftar Baru</button>
			<a href="print-pdf-pegawai.php" target="_blank">Cetak Pdf</a>
		</div>

		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Jabatan</th>
				<th>Email</th>
				<th>Foto</th>
				<th>Aksi</th>
			</tr>
			<?php
			if (count($pegawaiList) > 0) {
				foreach ($pegawaiList as $pegawai) {
					echo "<tr>
                        <td>{$pegawai['id']}</td>
                        <td>{$pegawai['nama']}</td>
                        <td>{$pegawai['alamat']}</td>
                        <td>{$pegawai['jenis_kelamin']}</td>
                        <td>{$pegawai['agama']}</td>
                        <td>{$pegawai['jabatan']}</td>
                        <td>{$pegawai['email']}</td>
                        <td><img src='images/" . $pegawai['foto'] . "' width='100' height='100'></td>
                        <td>
                            <a class='edit' onclick='openEditModal()'>Edit</a>
                            <a class='delete' href='hapus-pegawai.php?id=" . $pegawai['id'] . "'>Hapus</a>
                        </td>
                      </tr>";
				}
			} else {
				echo "<tr><td colspan='8'>Tidak ada data pegawai.</td></tr>";
			}
			?>
		</table>

		<button class="back" onclick="window.location.href='index.php'">Kembali</button>


		<?php if (isset($_GET['status'])): ?>
			<p class="status">
				<?php if ($_GET['status'] == 'sukses') {
					echo "Pendaftaran pegawai baru berhasil!";
				} else {
					echo "Pendaftaran gagal!";
				}
				?>
			</p>
		<?php endif; ?>

		<div>
			<div id="editModal" class="modal-container" style="display:none;">
				<div class="modal-content">
					<h3>Edit Pegawai <span class="close" onclick="closeEditModal()">&times;</span></h3>

					<form action="proses-edit-pegawai.php" method="POST" class="register-form" enctype="multipart/form-data">
						<input type="hidden" id="id" name="id" value="<?php echo $pegawai['id'] ?>" />
						<div class="input-field">
							<label for="nama">Nama: </label>
							<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?php echo $pegawai['nama'] ?>" />
						</div>
						<div class="input-field">
							<label for="alamat">Alamat: </label>
							<input type="text" id="alamat" name="alamat" required value="<?php echo $pegawai['alamat'] ?>"></input>
						</div>
						<div class="input-field">
							<label>Jenis Kelamin: </label>
							<label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required <?php echo ($pegawai['jenis_kelamin'] == 'Laki-Laki') ? "checked" : "" ?> /> Laki-laki</label>
							<label><input type="radio" name="jenis_kelamin" value="Perempuan" required <?php echo ($pegawai['jenis_kelamin'] == 'Perempuan') ? "checked" : "" ?> /> Perempuan</label>
						</div>
						<div class="input-field">
							<label for="agama">Agama: </label>
							<select id="agama" name="agama" required>
								<option <?php echo ($pegawai['agama'] == 'Islam') ? "selected" : "" ?> value="Islam">Islam</option>
								<option <?php echo ($pegawai['agama'] == 'Kristen') ? "selected" : "" ?> value="Kristen">Kristen</option>
								<option <?php echo ($pegawai['agama'] == 'Hindu') ? "selected" : "" ?> value="Hindu">Hindu</option>
								<option <?php echo ($pegawai['agama'] == 'Budha') ? "selected" : "" ?> value="Budha">Budha</option>
								<option <?php echo ($pegawai['agama'] == 'Atheis') ? "selected" : "" ?> value="Atheis">Atheis</option>
							</select>
						</div>
						<div class="input-field">
							<label for="jabatan">Jabatan: </label>
							<input type="text" id="jabatan" name="jabatan" required placeholder="Jabatan" value="<?php echo $pegawai['jabatan'] ?>" />
						</div>
						<div class="input-field">
							<label for="email">Email: </label>
							<input type="email" id="email" name="email" required placeholder="Email" value="<?php echo $pegawai['email'] ?>" />
						</div>
						<div class="input-field">
							<label for="foto">Foto: </label>
							<input type="file" id="foto" name="foto" required />
						</div>
						<button type="submit" name="simpan" class="send" value="simpan">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</main>
	<script src="./scripts/index.js"></script>
</body>

</html>