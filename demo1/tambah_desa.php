<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH DESA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password..">
												</div>
												<div class="form-group">
													<label>Nama Admin Desa</label>
													<input type="nama" name="nama" id="nama" class="form-control" onkeyup="myFunction()" placeholder="Nama Kepala Desa..">
												</div>
												<!-- <div class="form-check">
													<label>Jenis Kelamin</label><br/>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option  value="Perempuan">Perempuan</option>
													</select>
												</div> -->
												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disabled="" selected="">Pilih Hak Akses</option>
														<option value="Admin Desa">Admin Desa</option>
													</select>
												</div>
												<div class="form-group">
													<label>No Hp</label>
													<input type="text" name="nohp" class="form-control" placeholder="No Handphone..">
												</div>
												<!-- <div class="form-group">
													<label>Website</label>
													<input type="website" name="website" class="form-control" placeholder="Website..">
												</div> -->
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
												<label>Nama Kecamatan</label>
                								<select name="kecamatan" id="kecamatan" class="form-control">
                  									<option value="">-PILIH KECAMATAN-</option>
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
													<label>Kode Pemerintah</label>
													<input type="number" name="kode" class="form-control" placeholder="Kode Pemerintah..">
												</div>
												<div class="form-group">
													<label>Kode Pos</label>
													<input type="number" name="kodepos" class="form-control" placeholder="Kode Pos..">
												</div>
												<!-- <div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat.."></textarea>
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" class="form-control" placeholder="Email..">
												</div> -->
												
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
	// $jekel = $_POST['jekel'];
	$kode = $_POST['kode'];
	$kodepos = $_POST['kodepos'];
	$nohp = $_POST['nohp'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['desa'];
	// $rt = $_POST['rt'];
	// $rw = $_POST['rw'];
	// $alamat = $_POST['alamat'];
	// $website = $_POST['website'];
	// $email = $_POST['email'];

	$sql4 = "SELECT count(*) as total from data_user where nik=$nik";
    $query4 = mysqli_query($konek, $sql4);
    $data4 = mysqli_fetch_array($query4, MYSQLI_BOTH);
    $total = $data4['total'];
	if($total == 0){
		$sql = "INSERT INTO data_user(nik,password,hak_akses,nama,kode,kodepos,nohp,id_kec,id_desa) VALUES ('$nik','$password','$hak_akses','$nama','$kode','$kodepos','$nohp','$kecamatan','$desa')";
		$sql2 = "INSERT INTO data_desa(nik,nama,kode,kodepos,nohp,id_kec,id_desa) VALUES ('$nik','$nama','$kode','$kodepos','$nohp','$kecamatan','$desa')";
		$query = mysqli_query($konek,$sql);
		$query2 = mysqli_query($konek,$sql2);


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