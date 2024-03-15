<?php
error_reporting(0);
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
}
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    if(isset($_GET['nik'])){
        $nik = $_GET['nik'];
		$sql = "SELECT * FROM data_user WHERE nik=$nik";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
		$nik = $data['nik'];
		$id_desa = $data['id_desa'];
		$id_kec = $data['id_kec'];
		$nama = $data['nama'];
		$kode = $data['kode'];
		$alamat = $data['alamat'];
		$kodepos = $data['kodepos'];
		$nohp = $data['nohp'];
		$website = $data['website'];
		$email = $data['email'];
		
    }
?>
<?php

if ($hak_akses == "Admin Desa") {
?>
	<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH BIODATA ADMIN DESA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
											<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>Kepala Desa</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Kepala Desa.." value="<?= $nama;?>">
												</div>
												<div class="form-group">
													<label>Nama Kecamatan</label>
													<select name="kecamatan" id="kecamatan" class="form-control">
                  									<option value="">-Pilih Kecamatan-</option>
													<?php 
													$nama_kec = mysqli_query($konek, "SELECT * FROM mst_kec ORDER BY nm_kec");
													while($kec=mysqli_fetch_array($nama_kec)){ ?>
													<option value=<?php echo $kec['id_kec'] ?>> <?php echo $kec['nm_kec'] ?></option>;
													<?php } ?>
												</select>
								
												</div>
							
												<div class="form-group">
													<label>Nama Desa</label>
													<select name="desa" id="desa" class="desa form-control">
														<option value="0">-PILIH DESA-</option>
													</select>
								
												</div>
							
												
												<div class="form-group">
													<label>Kode</label>
													<input type="text" name="kode" class="form-control" placeholder="Kode Pemerintahan/Desa.."value="<?= $kode;?>">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label for="comment">Alamat</label>
													<input class="form-control" name="alamat" rows="5"value="<?= $alamat?>"></input>
												</div>
												<div class="form-group">
													<label>Kode Pos</label>
													<input type="text" name="kodepos" class="form-control" placeholder="Kode Pos.."value="<?= $kodepos;?>">
												</div>
												<div class="form-group">
													<label>No HP</label>
													<input type="number" name="nohp" class="form-control" placeholder="No HP.."value="<?= $nohp;?>">
                                                </div>
                                                <div class="form-group">
													<label>Website</label>
													<input type="text" name="website" class="form-control" placeholder="Website.."value="<?= $website;?>">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Email.."value="<?= $email;?>">
                                                </div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_desa" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
}
else if ($hak_akses == "Admin Pemkab") {
?>
	<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH BIODATA ADMIN DESA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
											<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>Kepala Desa</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Kepala Desa.." value="<?= $nama;?>">
												</div>
												<div class="form-group">
													<label>Nama Kecamatan</label>
													<select name="kecamatan" id="kecamatan" class="form-control">
                  									<option value="">-Pilih Kecamatan-</option>
													<?php 
													$nama_kec = mysqli_query($konek, "SELECT * FROM mst_kec ORDER BY nm_kec");
													while($kec=mysqli_fetch_array($nama_kec)){ ?>
													<option value=<?php echo $kec['id_kec'] ?>> <?php echo $kec['nm_kec'] ?></option>;
													<?php } ?>
												</select>
								
												</div>
							
												<div class="form-group">
													<label>Nama Desa</label>
													<select name="desa" id="desa" class="desa form-control">
														<option value="0">-PILIH DESA-</option>
													</select>
								
												</div>
							
												
												<div class="form-group">
													<label>Kode</label>
													<input type="text" name="kode" class="form-control" placeholder="Kode Pemerintahan/Desa.."value="<?= $kode;?>">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label for="comment">Alamat</label>
													<input class="form-control" name="alamat" rows="5"value="<?= $alamat?>"></input>
												</div>
												<div class="form-group">
													<label>Kode Pos</label>
													<input type="text" name="kodepos" class="form-control" placeholder="Kode Pos.."value="<?= $kodepos;?>">
												</div>
												<div class="form-group">
													<label>No HP</label>
													<input type="number" name="nohp" class="form-control" placeholder="No HP.."value="<?= $nohp;?>">
                                                </div>
                                                <div class="form-group">
													<label>Website</label>
													<input type="text" name="website" class="form-control" placeholder="Website.."value="<?= $website;?>">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Email.."value="<?= $email;?>">
                                                </div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_user" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>
<?php
}
?>



