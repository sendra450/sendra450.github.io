<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Nrp			= $_POST['Nrp'];
			$Nama_Mhs			= $_POST['Nama_Mhs'];
			$Kode_Prodi	= $_POST['Kode_Prodi'];
			$Kd_Dosen		= $_POST['Kd_Dosen'];

			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nrp='$Nrp'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(Nrp, Nama_Mhs, Kode_Prodi, Kd_Dosen) VALUES('$Nrp', '$Nama_Mhs', '$Kode_Prodi', '$Kd_Dosen')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NRP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nrp</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nrp" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" required>
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
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
