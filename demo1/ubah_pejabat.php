<!-- <?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['nip'])){
        $nip = $_GET['nip'];
        $sql = "SELECT * FROM data_pejabat WHERE nip='$nip'";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $nm_pejabat = $data['nm_pejabat'];
		$jabatan = $data['jabatan'];
		$pangkat = $data['pangkat'];
		
    }
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIP</label>
													<input type="text" readonly="" name="nip" value="<?php echo $nip;?>" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama..">
												</div>
												<div class="form-group">
													<label>Jabatan</label>
													<input name=jabatan" class="form-control" value="<?php echo $jabatan;?>" placeholder="Jabatan..">
												</div>
												<div class="form-group">
													<label>Pangkat</label>
													<input name="pangkat" class="form-control" value="<?php echo $pangkat;?>" placeholder="Pangkat..">
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success btn-sm">Ubah</button>
									<a href="?halaman=tampil_pejabat" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $nip = $_POST['nip'];
	$nm_pejabat = $data['nm_pejabat'];
		$jabatan = $data['jabatan'];
		$pangkat = $data['pangkat'];

    $sql = "UPDATE data_pejabat SET
    jabatan='$jabatan', pangkat='$pangkat',
	nm_pejabat='$nm_pejabat' WHERE nip='$nip'";
    $query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pejabat">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_pejabat">';
	  }
}
?> -->

<?php
	if(isset($_GET['nip'])){
		$nip = $_GET['nip'];
		$tampil_nip = "SELECT * FROM data_pejabat WHERE nip=$nip";
		$query = mysqli_query($konek,$tampil_nip);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$nip = $data['nip'];
		$nm_pejabat = $data['nm_pejabat'];
		$jabatan = $data['jabatan'];
		$pangkat = $data['pangkat'];
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
									<div class="card-title">UBAH PEJABAT</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIP</label>
													<input type="number" name="nip" class="form-control" placeholder="NIP Anda.." value="<?= $nip;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama Pejabat</label>
													<input type="text" name="nm_pejabat" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nm_pejabat;?>">
												</div>
												<div class="form-group">
													<label>Jabatan</label>
													<select name="jabatan" class="form-control" id="jabatan">
														<option disabled="" selected="">Pilih Jabatan</option>
														<option value="Kepala Desa">Kepala Desa</option>
														<option value="Sekretaris Desa">Sekretaris Desa</option>
														<option value="Lainnya">Lainnya</option>
														
													</select>
												</div>
												<div class="form-group" id="jblain">
													<label>Isikan Jabatan Lainnya</label>
													<input name="jblain" class="form-control" placeholder="Jabatan..">
												</div>
												<div class="form-group">
													<label>Pangkat</label>
													<input type="text" name="pangkat" class="form-control" placeholder="Pangkat Anda.." value="<?= $pangkat;?>">
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_pejabat" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$kdkec = $_SESSION['id_kec'];
	$kddesa = $_SESSION['id_desa'];
	$nip = $_POST['nip'];
	$nm_pejabat = $_POST['nm_pejabat'];
	$jabatan = $_POST['jabatan'];
	if($jabatan == 'Lainnya'){
		$jabatan = $_POST['jblain'];
	}else {
		$jabatan = $_POST['jabatan'];
	}
	$pangkat = $_POST['pangkat'];
	

	$sql = "UPDATE data_pejabat SET
	nm_pejabat='$nm_pejabat',
	jabatan ='$jabatan',
	pangkat='$pangkat',
	id_desa='$kddesa',
	id_kec='$kdkec' where nip='$nip' ";
	
	$query = mysqli_query($konek,$sql);

	if($query){
		echo '<script language="javascript">swal("Selamat...", "Ubah Berhasil", "success");</script>' ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pejabat">';
	  }else{
		echo '<script language="javascript">swal("Gagal...", "Ubah Gagal", "error");</script>' ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_pejabat">';
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
	$(document).ready(function () {
		$('#jblain').hide();
        $('#jabatan').change(function () {
            var jab = $('#jabatan').val();
			if(jab == 'Lainnya'){
				$('#jblain').show();
			}else{
				$('#jblain').hide();
			}
        });
    });
</script>