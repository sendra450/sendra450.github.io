<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Kode			= $_POST['Kode'];
			$Nama_Dosen			= $_POST['Nama_Dosen'];
			$Nidn	= $_POST['Nidn'];
			$Nip		= $_POST['Nip'];
            $Jenis_Kelamin		= $_POST['Jenis_Kelamin'];

			$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE Kode='$Kode'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO dosen(Kode, Nama_Dosen, Nidn, Nip, Jenis_Kelamin) VALUES('$Kode', '$Nama_Dosen', '$Nidn', '$Nip', '$Jenis_Kelamin')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dosen";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_dosen" method="post">
		<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Kode" class="form-control" size="4" required>
				</div>
			</div>	
		<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nidn</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nidn" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nip</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nip" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dosen</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Dosen" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
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
