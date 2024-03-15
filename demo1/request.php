<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST 
							<?php 
							$judul_berkas = $_GET['judul_berkas']; 
							$id_berkas = $_GET['id_berkas'];
							echo strtoupper($judul_berkas)
							?>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
							<input type="text" name="id_berkas" hidden value="<?php echo $id_berkas ?>">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nama" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan.." rows="5" autofocus></textarea>
								</div>
								<?php
								$sql_berkas = "SELECT * FROM master_berkas where id_berkas=$id_berkas";
								$query_berkas = mysqli_query($konek, $sql_berkas);
								$form_temp = array();
								while ($data_berkas = mysqli_fetch_array($query_berkas, MYSQLI_BOTH)) {
									$form_tambahan = $data_berkas['form_tambahan'];
									if($form_tambahan!=0){
										$form_temp = explode(',',$form_tambahan);
										for ($i=0; $i<count($form_temp); $i++){
										?>
										<div class="form-group">
											<label><?php echo str_replace("_"," ",$form_temp[$i]) ?></label>
											<input type="text" name="<?php echo $form_temp[$i] ?>" class="form-control" placeholder="<?php echo str_replace("_"," ",$form_temp[$i]) ?>" autofocus>
										</div>
										<?php
									}
									}
								}
								?>
							</div>

						</div>
					</div>
					<div class="card-action">
						<button name="kirim" class="btn btn-success">Kirim</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nik = $_POST['nik'];
	$id_berkas = $_POST['id_berkas'];
	$keterangan = $_POST['keterangan'];
	$masukan = '';
	if(count($form_temp)>0){
		for($i=0; $i<count($form_temp);$i++){
			$variabel = str_replace(" ","_",$form_temp[$i]);
			$masukan = $masukan.$variabel.':'.$_POST["$variabel"].',';
		}
	}
	$idkec = $_SESSION['id_kec'];
    $iddesa = $_SESSION['id_desa'];


	$sql = "INSERT INTO data_request (nik, id_berkas ,keterangan, form_tambahan, id_kec, id_desa) VALUES ('$nik','$id_berkas','$keterangan','$masukan','$idkec','$iddesa')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error());

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request">';
	}
}

?>