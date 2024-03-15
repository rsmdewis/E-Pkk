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
						<h4 class="card-title">STATUS REQUEST SURAT</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Status</th>
									<th>Keperluan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$idkec = $_SESSION['id_kec'];
								$iddesa = $_SESSION['id_desa'];
								$sql = "SELECT * FROM data_request inner join data_user on data_request.nik=data_user.nik
										WHERE status=1 and data_user.id_kec=$idkec and data_user.id_desa=$iddesa";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_request = $data['id_request'];
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$keperluan = $data['keperluan'];
									$id_berkas = $data['id_berkas'];

									if ($status == "1") {
										$status = "<b style='color:blue'>ACC</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><?php echo $status; ?></td>
										<td><?php echo $keperluan; ?></td>
										<td>
											<div class="form-button-action">
												<a href="?halaman=view_cetak&nik=<?= $nik; ?>&id_request=<?= $id_request; ?>&id_berkas=<?php echo $id_berkas ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
														<i class="fa fa-print"></i>
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
		<?php
								}
								?>
	</div>
</div>