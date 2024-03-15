<!-- <?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['id_berkas'])){
        $id_berkas = $_GET['id_berkas'];
        $sql = "SELECT * FROM master_berkas WHERE id_berkas='$id_berkas'";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $judul_berkas = $data['judul_berkas'];
		$kode_berkas = $data['kode_berkas'];
		$kode_belakang = $data['kode_belakang'];
		$template = $data['template'];
		$form_tambahan = $data['form_tambahan'];
    }
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM UBAH BERKAS</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Judul Berkas</label>
													<input type="text" readonly="" name="JudulBerkas" value="<?php echo $JudulBerkas.'-'.$KodeBerkas ;?>" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Kode Belakang</label>
													<input type="text" name="KodeBelakang" class="form-control" value="<?php echo $KodeBelakang;?>" placeholder="Kode Belakang..">
												</div>
												<div class="form-group">
													<label>Template</label>
													<textarea name="template" class="form-control"  cols="30" rows="10" placeholder="Template.."><?php echo $Template;?></textarea>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success btn-sm">Ubah</button>
									<a href="?halaman=tampil_berkas" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $id_berkas = $_POST['id_berkas'];
	$judul_berkas = $_POST['judul_berkas'];
	$kode_berkas = $_POST['kode_berkas'];
	$kode_belakang = $_POST['kode_belakang'];
	$template = $_POST['template'];
	$form_tambahan = $_POST['form_tambahan'];
	
    $sql = "UPDATE master_berkas SET
    form_tambahan='$form_tambahan', template='$template', kode_belakang='$kode_belakang',
	kode_berkas='$kode_berkas', judul_berkas='$judul_berkas' WHERE id_berkas='$id_berkas'";
    $query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_berkas">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_berkas&id_berkas=<?php echo $id_berkas;?>">';
	  }
}
?> -->

<?php
	if(isset($_GET['id_berkas'])){
		$id_berkas = $_GET['id_berkas'];
		$tampil = "SELECT * FROM master_berkas WHERE id_berkas=$id_berkas";
		$query = mysqli_query($konek,$tampil);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$id_berkas = $data['id_berkas'];
		$judul_berkas = $data['judul_berkas'];
		$kode_berkas = $data['kode_berkas'];
		$kode_belakang = $data['kode_belakang'];
		$template = $data['template'];
		$form_tambahan = $data['form_tambahan'];
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
									<div class="card-title">FORM UBAH BERKAS</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg">
												<div class="form-group">
													<label>Judul Berkas</label>
													<input type="hidden" name="id_berkas" class="form-control" value="<?= $id_berkas; ?>">
													<input type="text" name="judul_berkas" class="form-control" value="<?= $judul_berkas; ?>" readonly>
												</div>
												<div class="form-group">
													<input type="text" name="kode_berkas" class="form-control" value="<?= $kode_berkas; ?>" readonly>
												</div>
												<div class="form-group">
													<label>Kode Belakang</label>
													<input type="text" name="kode_belakang" class="form-control" placeholder="Kode Belakang.."value="<?= $kode_belakang; ?>" >
                                                </div>
												<div class="form-group">
													<label for="comment">Template</label>
													<br>
													<b>*Jika menambahkan data supaya menggunakan $</b>
													<form>
														<div class="form-group">
															<textarea name="content" id="template" cols="150" rows="300"><?= $template; ?></textarea>
														</div>
													</form>
													<script src="ckeditor/ckeditor.js"></script>
													<script>
													CKEDITOR.replace('content');
													</script>
												</div>
												<div class="form-group">
													<label>Form Tambahan</label>
													<input type="text" name="form_tambahan" class="form-control" placeholder="Form Tambahan.."value="<?= $form_tambahan; ?>"></input>
													<b>*Jika menambahkan Form tambahan supaya menggunakan Spasi</b>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_berkas" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php

if(isset($_POST['ubah'])){

	$id_berkas = $_POST['id_berkas'];

	$judul_berkas = $_POST['judul_berkas'];
	$kode_berkas = $_POST['kode_berkas'];
	$kode_belakang = $_POST['kode_belakang'];
	$template = $_POST['content'];
	$form_tambahan_baru = str_replace(" ","_",$_POST['form_tambahan']);
	$form_tambahan_lama = explode(',',$form_tambahan);
	$form_tambahan_replace = explode(',',$form_tambahan_baru);
	
		$tampilrequest = "SELECT * FROM data_request where id_berkas=$id_berkas";
        $queryrequest = mysqli_query($konek,$tampilrequest);
        while($datar=mysqli_fetch_array($queryrequest,MYSQLI_BOTH)){
            $form_tambahan_request = $datar['form_tambahan'];
            $id_request = $datar['id_request'];
			for($i=0; $i<count($form_tambahan_replace);$i++){
				for($j=0; $j<count($form_tambahan_lama);$j++){
					echo $form_tambahan_lama[$j];
					echo $form_tambahan_replace[$i];
					$form_tambahan_fix = str_replace($form_tambahan_lama[$j],$form_tambahan_replace[$i],$form_tambahan_request);
					$sql3 = "UPDATE data_request SET
					`form_tambahan`='$form_tambahan_fix' WHERE `id_request`='$id_request'";
					$query3 = mysqli_query($konek,$sql3);
				}			
			}

		}

	

	$sql2 = "UPDATE master_berkas SET
	`judul_berkas`='$judul_berkas',
	`kode_berkas` ='$kode_berkas',
	`kode_belakang`='$kode_belakang',
	`template` ='$template' ,
	`form_tambahan` = '$form_tambahan_baru' WHERE `id_berkas`='$id_berkas'";

	
	$query2 = mysqli_query($konek,$sql2);
	

	if($query2){
		echo '<script language="javascript">swal("Selamat...", "Ubah Berhasil", "success");</script>' ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_berkas">';
	//echo $sql2;
	  }else{
		echo '<script language="javascript">swal("Gagal...", "Ubah Gagal", "error");</script>' ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_berkas&id_berkas=<?php echo $id_berkas;?>">';
	//echo $sql2;
	  }
}
	
?>