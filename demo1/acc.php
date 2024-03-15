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
						<h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST <?php 
							$judul_berkas = $_GET['judul_berkas']; 
							$id_berkas = $_GET['id_berkas'];
							echo strtoupper($judul_berkas)
							?></h4>
					</div>
				</div>
				<div class="card-body">
					<!-- <form method="POST"> -->
						<div class="table-responsive">
							<table id="add1" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Request</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Keterangan</th>
										<th>Catatan</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$idkec = $_SESSION['id_kec'];
									$iddesa = $_SESSION['id_desa'];
									$sql = "SELECT * FROM data_request inner join data_user on data_request.nik=data_user.nik 
									WHERE status=0 AND id_berkas=$id_berkas and data_user.id_kec=$idkec and data_user.id_desa=$iddesa";
									$query = mysqli_query($konek, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$id_request = $data['id_request'];
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$keterangan = $data['keterangan'];
										$keperluan = $data['keperluan'];
										

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
											<td><?php echo $keterangan; ?></td>
											<td><?php echo $keperluan; ?></td>
											<td>
												<div class="form-button-action">
												<a href="?halaman=detail_request&id_request=<?php echo $id_request ?>&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>"
													 data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cek Data">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <!-- <a href="?halaman=modal_pejabat" 
													type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
                                                        <i class="fa fa-print"></i>
                                                    </a> -->
													<!-- Tombol untuk menampilkan modal-->
													<button type="button" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-original-title="View Cetak" data-target="#myModal">
														<i class="fa fa-print"></i>
													</button>
													
													<!-- Modal -->
													
													<div id="myModal" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- konten modal-->
															<form action="?halaman=view_cetak&nik=<?php echo $nik ?>&id_request=<?php echo $id_request ?>&id_berkas=<?php echo $id_berkas ?>&status=0" method="POST">
															<div class="modal-content">
																<!-- heading modal -->
																<div class="modal-header">
																<h4 class="modal-title">Pilih Pejabat</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	
																</div>
																<!-- body modal -->
																
																<div class="modal-body">
																	
																	
																	<div class="form-group">
																		<?php 
																		$idkec = $_SESSION['id_kec'];
																		$iddesa = $_SESSION['id_desa'];
																		$sql_agenda = "SELECT no_urut FROM data_request where id_kec='$idkec' and id_desa='$iddesa' order by no_urut DESC limit 1 ";
																		$query_agenda = mysqli_query($konek, $sql_agenda);
																		$data_agenda = mysqli_fetch_array($query_agenda, MYSQLI_BOTH);
																		$no_urut = $data_agenda['no_urut'];
																		$no_agenda = $no_urut+1;
																		?>
																		<label>No Urut</label>
																			<input type="text" value="<?php echo $no_agenda ?>" name="no_urut" id="tgl_acc" class="form-control" readonly>
																	</div>
																	<div class="form-group">
																	<label>Pejabat</label>
																	<select name="pejabat" id="pejabat" class="form-control">
																		<option value="">-PILIH PEJABAT-</option>
																		<?php 
																		$idkec = $_SESSION['id_kec'];
																		$iddesa = $_SESSION['id_desa'];
																		$nama_pejabat = mysqli_query($konek, "SELECT * FROM data_pejabat WHERE id_kec=$idkec and id_desa=$iddesa ");
																		while($p=mysqli_fetch_array($nama_pejabat)){ ;
																		?>
																		<option value=<?php echo $p['nip'] ?>> <?php echo $p['nm_pejabat'] ?></option>;
																		<?php } ?>
																	</select>
																	</div>
																	<div class="form-group">
																	<label>Tanggal Cetak</label>
																		<input type="date" name="tgl_acc" id="tgl_acc" class="form-control">
																	</div>

																	
																</div>
																<!-- footer modal -->
																<div class="modal-footer">
																<input type="submit" name="cetak" value="Cetak Surat" class="btn btn-info btn-lg" ></input>
																	<!-- <a href="?halaman=view_cetak&nik=<?php //echo $nik ?>&id_request=<?php //echo $id_request ?>&id_berkas=<?php //echo $id_berkas ?>&nip=<?php //echo $nip ?>"
																	data-toggle="tooltip" title="" class="btn btn-info btn-lg" data-original-title="View Cetak">
																		Cetak Surat
																		
																	</a> -->
																</div>
														
															
															</div>
															</form>
														</div>
													</div>

																							
														
											
													
                                                    
                                                </div>
												<!-- <div class="form-button-action">
													<a href="?halaman=view_cetak&nik=<?= $nik; ?>&id_request=<?= $id_request; ?>&id_berkas=<?php echo $id_berkas ?>">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
															<i class="fa fa-print"></i>
														</button>
													</a>
												</div>
												<input type="checkbox" name="check[$i]" value="<?php echo $id_request; ?>">
												<input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
												<div class="form-button-action">
													<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" 
													data-original-title="Cek Data" 
													href="?halaman=detail_request&id_request=<?php echo $id_request ?>&id_berkas=<?php echo $id_berkas2 ?>&judul_berkas=<?php echo $judul_berkas2 ?>">
														<i class="fa fa-edit"></i></a>
												</div> -->
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
		<?php  ?>
	</div>
</div>

<?php
if (isset($_POST['acc'])) {
	if (isset($_POST['check'])) {
		foreach ($_POST['check'] as $value) {
			// echo $value;
			$ubah = "UPDATE data_request set status =1 where id_request = $value";

			$query = mysqli_query($konek, $ubah);

			if ($query) {
				echo "<script language='javascript'>swal('Selamat...', 'ACC Admin Desa Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc&id_request='. $id_request. '&id_berkas='. $id_berkas. '&judul_berkas='. $judul_berkas. '">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'ACC Admin Desa Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc&id_berkas=<?php echo $id_berkas ?>&judul_berkas=<?php echo $judul_berkas ?>">';
			}
		}
	}
}
				}
?>