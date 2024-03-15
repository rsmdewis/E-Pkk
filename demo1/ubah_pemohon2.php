<?php include '../konek.php';?>

<?php
	if(isset($_GET['nik'])){
		$nik = $_GET['nik'];
		$tampil_nik = "SELECT * FROM data_user WHERE nik=$nik";
		$query = mysqli_query($konek,$tampil_nik);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
		$tanggal = $data['tanggal_lahir'];
		$jekel = $data['jekel'];
		$agama = $data['agama'];
		$alamat = $data['alamat'];
		$telepon = $data['telepon'];
		$warganegara= $data['warganegara'];
		$status_nikah= $data['status_nikah'];
		$status_warga = $data['status_warga'];
		$id_kec = $data['id_kec'];
		$id_desa = $data['id_desa'];
		$rt = $data['rt'];
		$rw = $data['rw'];
		$email = $data['email'];
		$idpekerjaan = $data['idpekerjaan'];
	}
	
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH BIODATA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" id="nama" onkeyup="myFunction()" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama;?>">
												</div>
												<div class="form-check">
													<label>Jenis Kelamin</label><br/>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option <?php if( $jekel=='Laki-Laki'){echo "selected"; } ?> value='Laki-Laki'>Laki-Laki</option>
														<option <?php if( $jekel=='Perempuan'){echo "selected"; } ?> value='Perempuan'>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" value="<?= $tempat;?>" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tgl" class="form-control" value="<?= $tanggal;?>">
												</div>
												<div class="form-group">
												<label>Pekerjaan</label>
                								<select name="pekerjaan" id="pekerjaan" class="form-control">
                  									<option value="">Pilih Pekerjaan</option>
													<?php 
													$nama_pekerjaan = mysqli_query($konek, "SELECT * FROM tbl_pekerjaan ORDER BY nama_pekerjaan");
													while($p=mysqli_fetch_array($nama_pekerjaan)){ 
														if($idpekerjaan==$p['idpekerjaan']){
															?>
															<option value=<?php echo $p['idpekerjaan'] ?> selected> <?php echo $p['nama_pekerjaan'] ?></option>;
															<?php
														} else {
															?>
															<option value=<?php echo $p['idpekerjaan'] ?>> <?php echo $p['nama_pekerjaan'] ?></option>;
															<?php
														}
													} ?>
													<?php
														if($pekerjaan=="Lainnya"){?>
															<input type="nama" name="nama" class="form-control" placeholder="Detail Pekerjaan..">
														<?php
														}else{

														}
														?>
												</select>
												</div>
												<div class="form-group" id="jblain">
													<label>Isikan Jabatan Lainnya</label>
													<input name="jblain" class="form-control" placeholder="Jabatan..">
												</div>
												<div class="form-group" id="jblain">
													<label>Isikan Jabatan Lainnya</label>
													<input name="jblain" class="form-control" placeholder="Jabatan..">
												</div>
												<div class="form-group">
													<label>Agama</label>
													<select name="agama" class="form-control">
														<option value="">Pilih Agama Anda</option>
														<option <?php if( $agama=='Islam'){echo "selected"; } ?> value='Islam'>Islam</option>
														<option <?php if( $agama=='Katolik'){echo "selected"; } ?> value='Katolik'>Katolik</option>
														<option <?php if( $agama=='Kristen'){echo "selected"; } ?> value='Kristen'>Kristen</option>
														<option <?php if( $agama=='Hindu'){echo "selected"; } ?> value='Hindu'>Hindu</option>
														<option <?php if( $agama=='Budha'){echo "selected"; } ?> value='Budha'>Budha</option>
													</select>
												</div>
												<div class="form-group">
													<label>Warganegara</label>
													<select name="warganegara" class="form-control">
														<option disabled="" selected="">Pilih Warganegara</option>
														<option <?php if( $warganegara=='WNI'){echo "selected"; } ?> value='WNI'>WNI</option>
														<option <?php if( $warganegara=='WNA'){echo "selected"; } ?> value='WNA'>WNA</option>
													</select>
												</div>
												<div class="form-group">
													<label>Status Pernikahan</label>
													<select name="status_nikah" class="form-control">
														<option disabled="" selected="">Pilih Status Pernikahan</option>
														<option <?php if( $status_nikah=='Belum Kawin'){echo "selected"; } ?> value='Belum Kawin'>Belum Kawin</option>
														<option <?php if( $status_nikah=='Kawin'){echo "selected"; } ?> value='Kawin'>Kawin</option>
														<option <?php if( $status_nikah=='Cerai Mati'){echo "selected"; } ?> value='Cerai Mati'>Cerai Mati</option>
													</select>
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option <?php if( $status_warga=='Sekolah'){echo "selected"; } ?> value='Sekolah'>Sekolah</option>
														<option <?php if( $status_warga=='Kerja'){echo "selected"; } ?> value='Kerja'>Kerja</option>
														<option <?php if( $status_warga=='Belum Bekerja'){echo "selected"; } ?> value='Belum Bekerja'>Belum Bekerja</option>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
											<!-- <div class="form-group">
												<label>Kecamatan</label>
                								<select name="kecamatan" id="kecamatan" class="form-control">
                  									<option value="">-Pilih Kecamatan-</option>
													<?php 
													// $nama_kec = mysqli_query($konek, "SELECT * FROM mst_kec ORDER BY nm_kec");
													// while($kec=mysqli_fetch_array($nama_kec)){ 
													// 	if($id_kec==$kec['id_kec']){
													// 		?>
													// 		<option value=<?php //echo $kec['id_kec'].'-'.$id_desa ?> selected> <?php //echo $kec['nm_kec'] ?></option>;
													// 		<?php
													// 	} else {
													// 		?>
													// 		<option value=<?php //echo $kec['id_kec'].'-'.$id_desa ?>> <?php //echo $kec['nm_kec'] ?></option>;
													// 		<?php
													// 	}
													// } ?>
												</select>
												</div>
												<div class="form-group">
												<label>Desa</label>
													<select name="desa" id="desa" class="desa form-control">
														<option value="0">-PILIH DESA-</option>
													</select>
												</div> -->
												<div class="form-group">
												<label>Kecamatan</label>
                								<select name="kecamatan" id="kecamatan" class="form-control">
													<?php 
													session_start();
													$idkec = $_SESSION['id_kec'];
													$iddesa = $_SESSION['id_desa'];
													$nama_kec = mysqli_query($konek, "SELECT * FROM mst_kec where id_kec='$idkec'");
													while($kec=mysqli_fetch_array($nama_kec)){ ?>
													<option value=<?php echo $kec['id_kec'] ?> selected> <?php echo $kec['nm_kec'] ?></option>;
													<?php }
														?>
												</select>
												</div>
												<div class="form-group">
												<label>Desa</label>
												<select name="desa" class="form-control">
													<?php 
													$nama_desa = mysqli_query($konek, "SELECT * FROM mst_desa where id_kec='$idkec' AND id_desa='$iddesa'");
												while($desa=mysqli_fetch_array($nama_desa)){ ?>
												<option value=<?php echo $desa['id_desa'] ?> selected> <?php echo $desa['nm_desa'] ?></option>
												<?php }
													?>
												</select>
												</div>
												<div class="form-group">
													<label>RT</label>
													<input type="number" name="rt" class="form-control" value="<?= $rt?>" placeholder="RT Anda..">
												</div>
												<div class="form-group">
													<label>RW</label>
													<input type="number" name="rw" class="form-control" value="<?= $rw?>" placeholder="RW Anda..">
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="3"><?= $alamat?></textarea>
												</div>				
												<div class="form-group">
													<label>Telepon</label>
													<input type="number" name="telepon" class="form-control" value="<?= $telepon?>" placeholder="Telepon Anda..">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="<?= $email?>" placeholder="Email Anda..">
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
if(isset($_POST['ubah'])){
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$status_warga = $_POST['status_warga'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['desa'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	$email = $_POST['email'];
	$warganegara = $_POST['warganegara'];
	$status_nikah = $_POST['status_nikah'];
	$idpekerjaan = $_POST['pekerjaan'];
	if($idpekerjaan == 'Lainnya'){
		$idpekerjaan = $_POST['jblain'];
	}else {
		$idpekerjaan = $_POST['pekerjaan'];
	}

	$sql = "UPDATE data_user SET
	nama='$nama',
	tanggal_lahir='$tgl',
	tempat_lahir='$tempat',
	jekel='$jekel',
	idpekerjaan='$idpekerjaan',
	agama='$agama',
	alamat='$alamat',
	telepon='$telepon',
	warganegara='$warganegara',
	status_nikah='$status_nikah',
	status_warga='$status_warga',
	id_kec='$kecamatan',
	id_desa='$desa',
	rt='$rt',
	rw='$rw',
	email='$email'
	WHERE nik=$nik";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
	
?>

<!-- <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script><script type="text/javascript">
    $(document).ready(function () {
		var id = $('#kecamatan').val();
		var array = id.split("-");
            $.ajax({
                url: "get_desa.php",
                method: "POST",
                data: {
                    id: array[0]
                },
                async: false,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if(data[i].id_desa == array[1]){
							html += '<option value="' + data[i].id_desa + '" selected="">' + data[i].nm_desa + '</option>';
						}else {
							html += '<option value="' + data[i].id_desa + '">' + data[i].nm_desa + '</option>';
						}
                    }
                    $('.desa').html(html);

                }
            });


        $('#kecamatan').change(function () {
            var id = $(this).val();
			var array = id.split("-");
            $.ajax({
                url: "get_desa.php",
                method: "POST",
                data: {
                    id: array[0]
                },
                async: false,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_desa + '">' + data[i].nm_desa + '</option>';
                    }
                    $('.desa').html(html);

                }
            });
        });
    });
</script> -->
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script><script type="text/javascript">
    $(document).ready(function () {
        $('#kecamatan').change(function () {
            var id = $(this).val();
            $.ajax({
                url: "get_desa.php",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_desa + '">' + data[i].nm_desa + '</option>';
                    }
                    $('.desa').html(html);

                }
            });
        });
    });
</script>
<script>
	$(document).ready(function () {
		$('#jblain').hide();
        $('#pekerjaan').change(function () {
            var jab = $('#pekerjaan').val();
			if(jab == 'Lainnya'){
				$('#jblain').show();
			}else{
				$('#jblain').hide();
			}
        });
    });
</script>
<script>
	$(document).ready(function () {
		$('#jblain').hide();
        $('#pekerjaan').change(function () {
            var jab = $('#pekerjaan').val();
			if(jab == 'Lainnya'){
				$('#jblain').show();
			}else{
				$('#jblain').hide();
			}
        });
    });
</script>
<script>
function myFunction() {
  let x = document.getElementById("nama");
  var letters = /^[a-zA-Z ]+$/;
  if(x.value.match(letters))
{
}
else
{
alert('Tolong jangan masukkan karakter selain huruf');
return false;
}
}
</script>