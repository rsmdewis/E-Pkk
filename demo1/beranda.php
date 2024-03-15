<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$nik = $_SESSION['nik'];
}
?>
<?php
if ($hak_akses == "Pemohon") {
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h1 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h1>
					<h4 class="text-white op-7 mb-2">Sebelum Anda Mengajukan Surat Keterangan Lengkapi Biodata Anda, Klik Biodata Anda</h4>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<a href="?halaman=tampil_pemohon" class="btn btn-sm btn-primary btn-round"><span class="btn-label">
							<i class="fas fa-user"></i> Biodata Anda</a>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
		<div class="row mt--2">
			<?php
			$card_array = ['card-primary','card-success','card-warning','card-secondary','card-danger'];
			$card_array2 = ['btn-primary','btn-success','btn-warning','btn-secondary','btn-danger'];
			$count = 0;
			$sql = "SELECT * FROM master_berkas";
			$query = mysqli_query($konek, $sql);
			while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
				$judul_berkas = $data['judul_berkas'];
				$id_berkas = $data['id_berkas'];
			?>
			<div class="col-md-3 pr-md-0">
				<div class="card-pricing2 
				<?php 
				if($count>=5){
					$count=0;
					echo $card_array[$count];
				}else {
					echo $card_array[$count];
				}
				?>
				">
					<div class="pricing-header">
						<h4 class="fw-bold text-center text-uppercase"><?php echo $judul_berkas ?></h4>
					</div>
					<div class="price-value">
						<div class="value">
							<span class="currency"></span>
							<span class="amount"><i class="flaticon-envelope-1"></i><span></span></span>
							<span class="month"></span>
						</div>
					</div>
					<ul class="pricing-content">
					</ul>
					<a href="?halaman=request&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>" class="btn 
					<?php 
				if($count>=5){
					$count=0;
					echo $card_array2[$count];
				}else {
					echo $card_array2[$count];
				}
				$count++;
				?>
					btn-round btn-sm mb-3">
						<span class="btn-label">
							<i class="fas fa-plus-circle"></i>
						</span> Request</a>
				</div>
				<br>
			</div>
			<?php
			}
			?>
	<?php
	} elseif ($hak_akses == "Admin Desa") {
	?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h3 class="fw-bold text-uppercase">TAMPIL SURAT KETERANGAN PEMOHON</h3>
		<!-- Card With Icon States Background -->
		<div class="row">
		<?php
			$card_array = ['icon-primary','icon-success','icon-warning','icon-secondary','icon-danger'];
			$card_array2 = ['btn-primary','btn-success','btn-warning','btn-secondary','btn-danger'];
			$count = 0;
			$sql = "SELECT * FROM master_berkas";
			$query = mysqli_query($konek, $sql);
			while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
				$judul_berkas = $data['judul_berkas'];
				$id_berkas = $data['id_berkas'];
			?>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=sudah_acc&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>">
								<div class="col-icon">
									<div class="icon-big text-center <?php 
									if($count>=5){
										$count=0;
										echo $card_array[$count];
									}else {
										echo $card_array[$count];
									}
									$count++;
									?> 
									bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"><?php echo $judul_berkas ?></p>
									<?php
									$idkec = $_SESSION['id_kec'];
									$iddesa = $_SESSION['id_desa'];
									$sql2 = "SELECT count(data_request.id_request) as total FROM data_request 
											inner join data_user on data_request.nik=data_user.nik WHERE 
											(data_request.id_berkas=$id_berkas and status=0) and data_user.id_kec=$idkec and data_user.id_desa=$iddesa";
									$query2 = mysqli_query($konek, $sql2);
									while ($data2 = mysqli_fetch_array($query2, MYSQLI_BOTH)) {
									$jumlah_req = $data2['total'];
								}
								?>

									
									<h4 class="card-title"><?php echo $jumlah_req; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
		</div>
		<?php
}
else if ($hak_akses == "Admin Pemkab") {
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h3 class="fw-bold text-uppercase">BERKAS SURAT SELESAI</h3>
		<!-- Card With Icon States Background -->
		<div class="row">
		<?php
			$card_array = ['icon-primary','icon-success','icon-warning','icon-secondary','icon-danger'];
			$card_array2 = ['btn-primary','btn-success','btn-warning','btn-secondary','btn-danger'];
			$count = 0;
			$sql = "SELECT * FROM master_berkas";
			$query = mysqli_query($konek, $sql);
			while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
				$judul_berkas = $data['judul_berkas'];
				$id_berkas = $data['id_berkas'];
			?>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=berkas_cetak&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>">
								<div class="col-icon">
									<div class="icon-big text-center <?php 
									if($count>=5){
										$count=0;
										echo $card_array[$count];
									}else {
										echo $card_array[$count];
									}
									$count++;
									?> 
									bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"><?php echo $judul_berkas ?></p>
									<?php
									$sql4 = "SELECT count(id_request) as total FROM data_request WHERE (id_berkas=$id_berkas and status=1)";
									$query4 = mysqli_query($konek, $sql4);
									while ($data4 = mysqli_fetch_array($query4, MYSQLI_BOTH)) {
										$jumlah_req = $data4['total'];
									}
									?>

									
									<h4 class="card-title"><?php echo $jumlah_req; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<?php
}
?>

