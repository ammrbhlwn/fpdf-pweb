<div>
	<div id="myModal" class="modal-container">
		<div class="modal-content">
			<h3>Formulir Pendaftaran Siswa Baru <span class="close" onclick="closeModal()">&times;</span></h3>

			<form action="proses-pendaftaran-siswa.php" method="POST" class="register-form" enctype="multipart/form-data">
				<div class="input-field">
					<label for="nama">Nama: </label>
					<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required />
				</div>
				<div class="input-field">
					<label for="alamat">Alamat: </label>
					<input type="text" id="alamat" name="alamat" placeholder="Alamat" required></input>
				</div>
				<div class="input-field">
					<label>Jenis Kelamin: </label>
					<label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-laki</label>
					<label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
				</div>
				<div class="input-field">
					<label for="agama">Agama: </label>
					<select id="agama" name="agama" required>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Atheis">Atheis</option>
					</select>
				</div>
				<div class="input-field">
					<label for="sekolah_asal">Sekolah Asal: </label>
					<input type="text" id="sekolah_asal" name="sekolah_asal" required placeholder="Nama Sekolah" />
				</div>
				<div class="input-field">
					<label for="foto">Foto: </label>
					<input type="file" id="foto" name="foto" required />
				</div>

				<button type="submit" value="Daftar" name="daftar" class="send">Daftar</button>
			</form>
		</div>
	</div>
</div>