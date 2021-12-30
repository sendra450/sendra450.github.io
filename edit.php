<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Nrp'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Nrp = $_GET['Nrp'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nrp='$Nrp'") or die(mysqli_error($koneksi));

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
			$Nama_Mhs			  = $_POST['Nama_Mhs'];
			$Kode_Prodi	= $_POST['Kode_Prodi'];
			$Kd_Dosen	= $_POST['Kd_Dosen'];

			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET Nama_Mhs='$Nama_Mhs', Kode_prodi='$Kode_Prodi', Kd_Dosen='$Kd_Dosen' WHERE Nrp='$Nrp'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_mhs&Nrp=<?php echo $Nrp; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nrp</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nrp" class="form-control" size="4" value="<?php echo $data['Nrp']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" value="<?php echo $data['Nama_Mhs']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Prodi</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="Kode_Prodi" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Dosen Wali</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Kd_Dosen" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
