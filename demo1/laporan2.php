<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
$idkec = $_SESSION['id_kec'];
$iddesa = $_SESSION['id_desa'];

@$bulan = $_POST['bulan'];
		@$tahun = $_POST['tahun'];
		if($bulan != ''){
			$bulan = "AND month(data_request.acc) = '$bulan'";
		}else {
			$bulan = '';
		}
		if($tahun != ''){
			$tahun = "AND year(data_request.acc) = '$tahun'";
		} else {
			$tahun = '';
		}
		$sql = "SELECT
		data_user.nik,
		data_user.nama,
		data_request.acc,
		data_request.id_berkas,
		data_request.keterangan,
		data_request.id_request
	FROM
		data_user
	INNER JOIN data_request ON data_request.nik = data_user.nik
	WHERE data_request.status = 1 and data_user.id_kec=$idkec and data_user.id_desa=$iddesa $bulan $tahun 
	order by acc DESC";
	$query = mysqli_query($konek,$sql);
	// echo $sql;

?>
			    <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">LAPORAN PERMOHONAN SURAT KETERANGAN</h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <select name="bulan" id="bulan" class="form-control">
													<option value="">Pilih</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">Nopember</option>
                                                    <option value="12">Desember</option>
												</select>
                                                <div class="form-group">
                                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
													<a href="?halaman=laporan_perbulan">
													<input type="submit" value="Reload" class="btn btn-primary btn-sm">
													</a>
                                                </div>
												<!-- <select name="tahun" class="form-control">
													<option value="">Pilih</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
													<option value="2021">2021</option>
												</select>
                                                <div class="form-group">
                                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
													<a href="?halaman=laporan_pertahun">
													<input type="submit" value="Reload" class="btn btn-primary btn-sm">
													</a>
                                                </div> -->
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<!-- <div class="card-tools">
											<a href="cetak_bulan.php?bulan=<?php echo $bulan;?>" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print Data Bulan
											</a>
											<a href="cetak_tahun.php?tahun=<?php echo $tahun;?>" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print Data Tahun
											</a>
										</div> -->
								</div>
								<div class="card-body">
									<table class="table mt-3">
										<thead>
											<tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal ACC</th>
                                                <th scope="col">Nik</th>
												<th scope="col">Nama</th>
												<th scope="col">Keterangan</th>
												<th scope="col">Request</th>
												<th style="width: 10%">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=0;
												while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
													$no++;
													$nik = $data['nik'];	
													$nama = $data['nama'];
													$tanggal = $data['acc'];
													$id_berkas = $data['id_berkas'];
													$tgl = date('d F Y', strtotime($tanggal));
													$keterangan = $data['keterangan'];
													$id_request = $data['id_request'];
											?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $tgl;?></td>
												<td><?php echo $nik;?></td>
												<td><?php echo $nama;?></td>
												<td><?php echo $keterangan;?></td>
												<td><?php echo $id_request;?></td>
												<td>
												<div class="form-button-action">
												<button type="button" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-original-title="View Cetak" data-target="#myModal<?php echo $no ?>">
														<i class="fa fa-print"></i>
													</button>
												<div id="myModal<?php echo $no ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- konten modal-->
															<form action="?halaman=view_cetak&nik=<?php echo $nik ?>&id_request=<?php echo $id_request ?>&id_berkas=<?php echo $id_berkas ?>&status=1" method="POST">
															<div class="modal-content">
																<!-- heading modal -->
																<div class="modal-header">
																	<h4 class="modal-title">Pilih Pejabat</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	
																</div>
																<!-- body modal -->
																<div class="modal-body">
																	<div class="form-group">
																		<label>Pejabat</label>
																		<select name="pejabat" id="pejabat" class="form-control">
																			<option value="">-PILIH PEJABAT-</option>
																			<?php 
																			$idkec = $_SESSION['id_kec'];
																			$iddesa = $_SESSION['id_desa'];
																			$nama_pejabat = mysqli_query($konek, "SELECT * FROM data_pejabat WHERE id_kec=$idkec and id_desa=$iddesa ");
																			while($p=mysqli_fetch_array($nama_pejabat)){ ?>
																			<option value=<?php echo $p['nip'] ?>> <?php echo $p['nm_pejabat'] ?></option>;
																			<?php } ?>
																		</select>
																	</div>
																	<div class="form-group">
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
				</div>

