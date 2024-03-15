<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" name="form1">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="nama" id="nama" name="nama" class="form-control" placeholder="Nama.." onkeyup="myFunction()">
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir.." >
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal" class="form-control" >
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disabled="" selected="">Pilih Hak Akses</option>
														<option value="Pemohon">Pemohon</option>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												
											<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password..">
												</div>
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
													<input type="number" name="rt" class="form-control" value="" placeholder="RT Anda..">
												</div>
												<div class="form-group">
													<label>RW</label>
													<input type="number" name="rw" class="form-control" value="" placeholder="RW Anda..">
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat.."></textarea>
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['simpan'])){
	$nik = $_POST['nik'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$nama = $_POST['nama'];
	$jekel = $_POST['jekel'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$alamat = $_POST['alamat'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['desa'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	

	$sql4 = "SELECT count(*) as total from data_user where nik=$nik";
    $query4 = mysqli_query($konek, $sql4);
    $data4 = mysqli_fetch_array($query4, MYSQLI_BOTH);
    $total = $data4['total'];
	if($total == 0){
		$sql = "INSERT INTO data_user (nik,password,hak_akses,nama,jekel,tempat_lahir,tanggal_lahir,alamat,id_kec,id_desa,rt,rw) VALUES ('$nik','$password','$hak_akses','$nama','$jekel','$tempat','$tanggal','$alamat','$kecamatan','$desa','$rt','$rw')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	  }
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'NIK sudah pernah didaftarkan', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	}


	
}
?>
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