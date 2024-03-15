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
									<div class="card-title">FORM TAMBAH TEMPLATE SURAT</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg">
											<div class="form-group">
													<label>Judul</label>
													<input type="jenis" name="judul_berkas" class="form-control" placeholder="Jenis Surat..">
												</div>
												<div class="form-group">
													<label>Kode Berkas</label>
													<input type="kode_berkas" name="kode_berkas" class="form-control" placeholder="Kode Berkas.." autofocus>
												</div>
												<div class="form-group">
													<label>Kode Belakang</label>
													<input type="kode_belakang" name="kode_belakang" class="form-control" placeholder="Kode Belakang..">
												</div>
												<div class="form-group">
													<label>Template Surat</label>
													<form>
														<div class="form-group">
															<textarea name="content" id="template" cols="150" rows="300"></textarea>
														</div>
													</form>
													<script src="ckeditor/ckeditor.js"></script>
													<script>
													CKEDITOR.replace('content');
													</script>
													<label>*Jika menambahkan data supaya menggunakan $</label>
												</div>
												<div class="form-group">
													<label>Form Tambahan</label>
													<input type="form_tambahan" name="form_tambahan" class="form-control" placeholder="Form Tambahan.."></input>
													<label>*Jika menambahkan Form tambahan supaya menggunakan Spasi</label>
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
	$judul_berkas = $_POST['judul_berkas'];
	$kode_berkas = $_POST['kode_berkas'];
	$kode_belakang = $_POST['kode_belakang'];
	$template = $_POST['content'];
	$form_tambahan = str_replace(" ","_",$_POST['form_tambahan']);
	
	

	

	$sql = "INSERT INTO master_berkas (`judul_berkas`, `kode_berkas`, `kode_belakang`, `template`, `form_tambahan`) VALUES ('$judul_berkas','$kode_berkas','$kode_belakang','$template','$form_tambahan')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_berkas">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_surat">';
	  }
}
?>