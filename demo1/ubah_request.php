<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request'])) {
	$id = $_GET['id_request'];
	$tampil_nik = "SELECT * FROM data_request NATURAL JOIN data_user WHERE id_request=$id";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$keterangan = $data['keterangan'];
}
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH REQUEST <?php 
							$judul_berkas = $_GET['judul_berkas']; 
							$id_berkas = $_GET['id_berkas'];
							echo strtoupper($judul_berkas)
							?></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value="<?= $s2; ?>" readonly>
												</div> -->
								<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value=<?= $date; ?> required>
												</div> -->
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" name="keterangan" class="form-control" value="<?= $keterangan ?>" placeholder="Keterangan.." autofocus>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$keterangan = $_POST['keterangan'];

	$sql = "UPDATE data_request SET keterangan='$keterangan' WHERE id_request=$id";
	$query = mysqli_query($konek, $sql);

	if ($query) {

		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status&id_request=<?= $id_request; ?>">';
	}
}

?>