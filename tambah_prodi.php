<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Kd			= $_POST['Kd'];
			$Nama_Prodi			= $_POST['Nama_Prodi'];
			$Jenjang	= $_POST['Jenjang'];

			$cek = mysqli_query($koneksi, "SELECT * FROM prodi WHERE Kd='$Kd'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO prodi(Kd, Nama_Prodi, Jenjang) VALUES('$Kd', '$Nama_Prodi', '$Jenjang')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_prodi";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, KODE sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_prodi" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Prodi</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="number" name="Kd" class="form-control" size="4" required>
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
							<input type="radio" class="join-btn" name="Jenjang" value="S1" required>S1
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenjang" value="D3" required>D3
						</label>
					</div>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
