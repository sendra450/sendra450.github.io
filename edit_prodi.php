<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Kd'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Kd = $_GET['Kd'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM prodi WHERE Kd='$Kd'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Nama_Prodi			  = $_POST['Nama_Prodi'];
			$Jenjang	= $_POST['Jenjang'];
			$Kd	= $_POST['Kd'];

			$sql = mysqli_query($koneksi, "UPDATE prodi SET Nama_Prodi='$Nama_Prodi', Jenjang='$Jenjang', Kd='$Kd' WHERE Kd='$Kd'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_prodi";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_prodi&Kd=<?php echo $Kd; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Prodi</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="Kd" class="form-control" size="4" value="<?php echo $data['Kd']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Prodi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Nama_Prodi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Manajemen Informatika">Manajemen Informatika</option>
						<option value="Sistem Informasi">Sistem Informasi</option>
						<option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenjang</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenjang" value="S1" <?php if($data['Jenjang'] == 'S1'){ echo 'checked'; } ?> required>S1
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenjang" value="D3" <?php if($data['Jenjang'] == 'D3'){ echo 'checked'; } ?> required>D3
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dosen" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
