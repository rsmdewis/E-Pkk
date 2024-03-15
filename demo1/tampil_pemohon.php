<?php include '../konek.php'; ?>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
$tempat = $data['tempat_lahir'];
$tanggal = $data['tanggal_lahir'];
$format = date('d-m-Y', strtotime($tanggal));
$jekel = $data['jekel'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$agama = $data['agama'];
$id_kec = $data['id_kec'];
$id_desa = $data['id_desa'];
$rt = $data['rt'];
$rw = $data['rw'];
$email = $data['email'];
$warganegara= $data['warganegara'];
$status_nikah= $data['status_nikah'];

$sql2 = "SELECT mst_kec.nm_kec, mst_desa.nm_desa FROM mst_kec inner join mst_desa on mst_kec.id_kec = mst_desa.id_kec 
    where mst_desa.id_desa=$id_desa and mst_desa.id_kec=$id_kec";
    $query2 = mysqli_query($konek, $sql2);
    $data2 = mysqli_fetch_array($query2, MYSQLI_BOTH);
    $ds = $data2['nm_desa'];
    $desa = ucwords("$ds");
    $kecamatan = ucwords($data2['nm_kec']);

?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">BIODATA ANDA</h4>
                        <a href="?halaman=ubah_pemohon&nik=<?= $nik; ?>" class="btn btn-sm btn-warning btn-round ml-auto">
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
                                
                                <td><?= $nik; ?></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                
                                <td><?= $nama; ?></td>
                            </tr>
                            <tr>
                                <th>TEMPAT, TANGGAL LAHIR</th>
                               
                                <td><?= $tempat . ', ' . $format; ?></td>
                            </tr>

                            <tr>
                                <th>JENIS KELAMIN</th>
                                
                                <td><?= $jekel; ?></td>
                            </tr>
                            <tr>
                                <th>AGAMA</th>
                                
                                <td><?= $agama; ?></td>
                            </tr>
                            <tr>
                                <th>KECAMATAN</th>
                                
                                <td><?php echo strtoupper($data2['nm_kec']); ?></td>
                            </tr>
                            <tr>
                                <th>DESA</th>
                                
                                <td><?php echo strtoupper($data2['nm_desa']); ?></td>
                            </tr>
                            <tr>
                                <th>RT</th>
                               
                                <td><?= $rt; ?></td>
                            </tr>
                            <tr>
                                <th>RW</th>
                               
                                <td><?= $rw; ?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td><?= $alamat; ?></td>
                            </tr>
                            <tr>
                                <th>TELEPON</th>
                                                               
                                <td><?= $telepon; ?></td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                
                                <td><?= $email; ?></td>
                            </tr>
                            <tr>
                                <th>KEWARGANEGARAAN</th>
                               
                                <td><?= $warganegara; ?></td>
                            </tr>
                            <tr>
                                <th>STATUS PERNIKAHAN</th>
                                
                                <td><?= $status_nikah; ?></td>
                            </tr>
                            
                            </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>