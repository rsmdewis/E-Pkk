<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    
	$tampil_id = "SELECT * FROM data_desa WHERE nik=$_SESSION[nik]";
	$query = mysqli_query($konek,$tampil_id);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$nik = $data['nik'];
    $nama = $data['nama'];
    $id_desa = $data['id_desa'];
    $id_kec = $data['id_kec'];
    $kode = $data['kode'];
    $alamat = $data['alamat'];
    $kodepos = $data['kodepos'];
    $nohp = $data['nohp'];
    $website = $data['website'];
    $email = $data['email'];
    
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
                        <h4 class="card-title">BIODATA DESA</h4>
                            <a href="?halaman=ubah_desa&nik=<?=$nik;?>" class="btn btn-sm btn-warning btn-round ml-auto">
                                <i class="fa fa-edit"></i>
                                    Ubah Biodata Desa
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NAMA KEPALA DESA</th>
                                <td>:</td>
                                <td><?= $nama;?></td>
                            </tr>
                            <tr>
                                <th>NAMA DESA</th>
                                <td>:</td>
                                <td><?php echo strtoupper($data2['nm_desa']); ?></td>
                            </tr>
                            <tr>
                                <th>NAMA KECAMATAN</th>
                                <td>:</td>
                                <td><?php echo strtoupper($data2['nm_kec']); ?></td>
                            </tr>

                            <tr>
                                <th>KODE PEMERINTAH</th>
                                <td>:</td>
                                <td><?= $kode;?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td>:</td>
                                <td><?= $alamat;?></td>
                            </tr>
                            <tr>
                                <th>KODE POS</th>
                                <td>:</td>
                                <td><?= $kodepos;?></td>
                            </tr>
                            <tr>
                                <th>NO.HP</th>
                                <td>:</td>
                                <td><?= $nohp;?></td>
                            </tr>
                            <tr>
                                <th>WEBSITE</th>
                                <td>:</td>
                                <td><?= $website;?></td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>:</td>
                                <td><?= $email;?></td>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>