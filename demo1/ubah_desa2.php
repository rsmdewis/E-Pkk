<!-- <?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> -->
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
		$jekel = $data['jekel'];
		$kode = $data['kode'];
		$alamat = $data['alamat'];
		$kodepos = $data['kodepos'];
		$nohp = $data['nohp'];
		$website = $data['website'];
		$email = $data['email'];
		$rt = $data['rt'];
		$rw = $data['rw'];
		$password = $data['password'];
		
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
									<div class="card-title">UBAH ADMIN </div>
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
													<input type="text" name="nama" id="nama" class="form-control" onkeyup="myFunction()" placeholder="Nama Kepala Desa.." value="<?= $nama;?>">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option <?php if( $jekel=='Laki-Laki'){echo "selected"; } ?> value='Laki-Laki'>Laki-Laki</option>
														<option <?php if( $jekel=='Perempuan'){echo "selected"; } ?> value='Perempuan'>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" value="<?= $password;?>" placeholder="Password..">
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
											<div class="col-md-6 col-lg-6">
											<div class="form-group">
											<label>Kecamatan</label>
                								<select name="kecamatan" id="kecamatan" class="form-control">
                  									<option value="">-Pilih Kecamatan-</option>
													<?php 
													$nama_kec = mysqli_query($konek, "SELECT * FROM mst_kec ORDER BY nm_kec");
													while($kec=mysqli_fetch_array($nama_kec)){ 
														if($id_kec==$kec['id_kec']){
															?>
															<option value=<?php echo $kec['id_kec'].'-'.$id_desa ?> selected> <?php echo $kec['nm_kec'] ?></option>;
															<?php
														} else {
															?>
															<option value=<?php echo $kec['id_kec'].'-'.$id_desa ?>> <?php echo $kec['nm_kec'] ?></option>;
															<?php
														}
													} ?>
												</select>
												</div>
												<div class="form-group">
												<label>Desa</label>
													<select name="desa" id="desa" class="desa form-control">
														<option value="0">-PILIH DESA-</option>
													</select>
												</div>
												<div class="form-group">
													<label>RT</label>
													<input type="number" name="rt" class="form-control"value="<?= $rt?>" placeholder="RT Anda..">
												</div>
												<div class="form-group">
													<label>RW</label>
													<input type="number" name="rw" class="form-control" value="<?= $rw?>" placeholder="RW Anda..">
												</div>
												<div class="form-group">
													<label>Kode</label>
													<input type="text" name="kode" class="form-control" placeholder="Kode Pemerintahan/Desa.."value="<?= $kode;?>">
												</div>
												<div class="form-group">
													<label>Kode Pos</label>
													<input type="text" name="kodepos" class="form-control" placeholder="Kode Pos.."value="<?= $kodepos;?>">
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="3"><?= $alamat?></textarea>
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
	$desa = $_POST['desa'];
	$kecamatan = $_POST['kecamatan'];
    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $alamat = $_POST['alamat'];
    $kodepos = $_POST['kodepos'];
    $nohp = $_POST['nohp'];
    $website = $_POST['website'];
    $email = $_POST['email'];
	$jekel = $_POST['jekel'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	$password = $_POST['password'];

	
	$sql = "UPDATE data_user SET
	id_desa='$desa',
	id_kec='$kecamatan',
	nama='$nama',
	kode='$kode',
	alamat='$alamat',
	kodepos='$kodepos',
	nohp='$nohp',
	website='$website',
	email='$email',
	jekel='$jekel',
	rt='$rt',
	rw='$rw',
	password='$password',
	email='$email' WHERE nik=$nik";
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
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script><script type="text/javascript">
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