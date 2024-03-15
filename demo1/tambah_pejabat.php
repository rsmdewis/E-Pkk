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
									<div class="card-title">FORM TAMBAH PEJABAT</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIP</label>
													<input type="number" name="nip" class="form-control" placeholder="NIP.." autofocus>
												</div>
												<div class="form-group">
													<label>Nama Pejabat</label>
													<input type="nama" name="nama" class="form-control" placeholder="Nama..">
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
													<input name="pangkat" class="form-control" placeholder="Pangkat..">
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
									<a href="?halaman=tampil_pejabat" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['simpan'])){
	$kdkec = $_SESSION['id_kec'];
	$kddesa = $_SESSION['id_desa'];
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	if($jabatan == 'Lainnya'){
		$jabatan = $_POST['jblain'];
	}else {
		$jabatan = $_POST['jabatan'];
	}
	$pangkat = $_POST['pangkat'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['desa'];
	

	

	$sql = "INSERT INTO data_pejabat (nip, nm_pejabat, jabatan, pangkat, id_kec, id_desa) VALUES ('$nip','$nama','$jabatan','$pangkat', '$kdkec','$kddesa')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pejabat">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_pejabat">';
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