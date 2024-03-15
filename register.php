<?php include 'konek.php'; ?>
<link href="demo1/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="demo1/js/jquery-2.1.3.min.js"></script>
<script src="demo1/js/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Pendaftaran Pemohon</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="main/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="main/vendors/base/vendor.bundle.base.css">
  <link href="main/js/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="main/js/jquery-2.1.3.min.js"></script>
  <script src="main/js/sweetalert.min.js"></script>
  <script src="main/js/sweetalert-dev.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="main/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="main/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="main/img/kabmalang.png" width="125" style="display:block; margin:auto;" alt="logo">
              </div>
              <h4 class="text-center">HALAMAN PENDAFTARAN</h4>
              <form method="POST" class="pt-3">
                <div class="form-group">
									  <label>NIK</label>
                  <input type="number" name="nik" class="form-control form-control-lg" placeholder="NIK Anda.." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required autofocus>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" id="nama" class="form-control form-control-lg" onkeyup="myFunction()" placeholder="Nama Lengkap Anda.."  required>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jekel" id="" class="form-control">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

                <?php
                  if (isset($_GET['kecamatan'])) {
                    $cari = $_GET['kecamatan'];

                    $data = mysqli_query($konek, "SELECT * FROM mst_desa ORDER BY nm_desa WHERE id_kec = '$cari'");
                  }else{
                    $data= [];
                  }
                  ?>

                <div class="form-group">
                <label>Kecamatan</label>
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
                <label>Desa</label>
                <select name="desa" id="desa" class="desa form-control">
                  <option value="0">-PILIH DESA-</option>
								</select>
                </div>
                <div class="form-group">
                <label>Tempat Lahir</label>
                  <input type="text" name="kota" class="form-control form-control-lg" placeholder="Kota Lahir Anda.." required>
                </div>
                <div class="form-group">
                <label>Tanggal Lahir</label>
                  <input type="date" name="tgl" class="form-control form-control-lg" required>
                </div>
                <div class="form-group">
                <label>Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="mb-4">

                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">
                    DAFTAR
                  </button>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost/surat-keterangan-desa/">BATAL</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah memiliki akun? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- insert register -->
  <?php
  if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = "Pemohon";
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $kota = $_POST['kota'];
    $tgl = $_POST['tgl'];
    
    $sql4 = "SELECT count(*) as total from data_user where nik=$nik";
    $query4 = mysqli_query($konek, $sql4);
    $data4 = mysqli_fetch_array($query4, MYSQLI_BOTH);
    $total = $data4['total'];
	if($total == 0){
		$sql = "INSERT INTO data_user (nik,password,hak_akses,nama,tanggal_lahir,jekel,tempat_lahir,id_kec,id_desa) VALUES ('$nik','$password','$hak_akses','$nama','$tgl','$jekel','$kota','$kecamatan','$desa')";
	$query = mysqli_query($konek,$sql);

  

    if ($query) {
      echo "<script language='javascript'>swal('Selamat...', 'Akun Berhasil dibuat!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="3; url=login.php">';
    } else {
      echo "<script language='javascript'>swal('Gagal...', 'Akun Gagal dibuat!', 'error');</script>";
      echo '<meta http-equiv="refresh" content="3; url=register.php">';
    }
  } else {
		echo "<script language='javascript'>swal('Gagal...', 'NIK sudah pernah didaftarkan', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	}
  }
  ?>
  <!-- plugins:js -->
  <script src="main/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="main/js/off-canvas.js"></script>
  <script src="main/js/hoverable-collapse.js"></script>
  <script src="main/js/template.js"></script>
  <!-- endinject -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <script src="jquey.js"></script>
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        $('#kecamatan').change(function () {
            var id = $(this).val();
            $.ajax({
                url: "demo1/get_desa.php",
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
  
</body>

</html>