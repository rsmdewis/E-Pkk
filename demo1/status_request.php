<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
	<?php
	$sql = "SELECT * FROM master_berkas";
			$query = mysqli_query($konek, $sql);
			while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
				$judul_berkas = $data['judul_berkas'];
				$id_berkas = $data['id_berkas'];
			?>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS PERMOHONAN 
							</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Permohonan</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Keterangan</th>
									<th>Catatan</th>
									<th>Status</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$n_ik = $_SESSION['nik'];
								$sql = "SELECT * FROM data_request INNER JOIN data_user ON data_request.nik=data_user.nik WHERE data_request.nik='$n_ik' order by data_request.tanggal_request DESC";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$sts = $data['status'];
									$keterangan = $data['keterangan'];
									$keperluan = $data['keperluan'];
									$id_request = $data['id_request'];

									if ($sts == "1") {
										$status = "<b style='color:green'>Sudah ACC Admin Desa</b>";
									} elseif ($sts == "0") {
										$status = "<b style='color:red'>BELUM ACC Admin Desa</b>";
									}  elseif ($sts == "2") {
										$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><?php echo $keterangan; ?></td>
										<td><?php echo $keperluan; ?></td>
										<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status; ?></td>
										<td>
											<div class="form-button-action">
												<?php
												if($sts == 0){
												?>
													<a href="?halaman=ubah_request&id_request=<?= $id_request; ?>&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
														<i class="fa fa-edit"></i>
													</button>
												</a>
												<?php
												}else {
													echo 'Sudah Dicetak';
												}
												?>
												<a href="?halaman=tampil_status&id_request=<?= $id_request; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
														<i class="fa fa-times"></i>
													</button>
												</a>
											</div>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php
if (isset($_GET['id_request'])) {
	$hapus = mysqli_query($konek, "DELETE FROM data_request WHERE id_request=$id_request");
	if ($hapus) {
		echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status&id_request=<?= $id_request">';
	}
} 
?>