<?php include '../konek.php'; ?>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
$password = $data['password'];
$jekel = $data['jekel'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$agama = $data['agama'];
$email = $data['email'];

?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">BIODATA ANDA</h4>
                        <a href="?halaman=ubah_pemkab&nik=<?= $nik; ?>" class="btn btn-sm btn-warning btn-round ml-auto">
                            <i class="fa fa-edit"></i>
                            Ubah Biodata
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td><?= $nik; ?></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                <td>:</td>
                                <td><?= $nama; ?></td>
                            </tr>
                            
                            <tr>
                                <th>JEKEL</th>
                                <td>:</td>
                                <td><?= $jekel; ?></td>
                            </tr>
                            <tr>
                                <th>AGAMA</th>
                                <td>:</td>
                                <td><?= $agama; ?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td>:</td>
                                <td><?= $alamat; ?></td>
                            </tr>
                            <tr>
                                <th>TELEPON</th>
                                <td>:</td>
                                <td><?= $telepon; ?></td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>:</td>
                                <td><?= $email; ?></td>
                            </tr>
                            
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>