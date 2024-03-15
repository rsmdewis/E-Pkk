<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">PERMOHONAN SURAT SUDAH DICETAK</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add1" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Permohonan</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Keterangan</th>
                                    <th>Id Request</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idkec = $_SESSION['id_kec'];
                                $iddesa = $_SESSION['id_desa'];
                                $sql = "SELECT
                                                    data_user.nik,
                                                    data_user.nama,
                                                    data_request.tanggal_request,
                                                    data_request.keterangan,
                                                    data_request.id_request,
                                                    data_request.status
                                                FROM
                                                    data_user
                                                INNER JOIN data_request ON data_request.nik = data_user.nik
                                                WHERE data_request.status = 1 and data_user.id_kec=$idkec and data_user.id_desa=$iddesa order by tanggal_request DESC
                                                ";
                                // $sql = "SELECT * FROM data_request inner join data_user on data_request.nik=data_user.nik WHERE status=1
                                // and data_user.id_kec=$idkec and data_user.id_desa=$iddesa";
                                $query = mysqli_query($konek, $sql);
                                while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                    $tgl = $data['tanggal_request'];
                                    $format = date('d F Y', strtotime($tgl));
                                    $nik = $data['nik'];
                                    $nama = $data['nama'];
                                    $status = $data['status'];
                                    $keterangan = $data['keterangan'];
                                    // $keterangan = $data['keterangan'];
                                    // $id= $data['id_request_skd'];
                                    $id_request = $data['id_request'];

                                    if ($status == "1") {
                                        $status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
                                    } elseif ($status == "0") {
                                        $status = "<b style='color:red'>BELUM Admin Desa</b>";
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $format; ?></td>
                                        <td><?php echo $nik; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><?php echo $keterangan; ?></td>
                                        <td><?php echo $id_request; ?></td>
                                        <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status; ?></td>
                                    </tr>
                                    <!-- <?php
                                            if (isset($_GET['id_request'])) {
                                                $hapus = mysqli_query($konek, "DELETE FROM data_request WHERE id_request=$id");
                                                if ($hapus) {
                                                    echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
                                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
                                                } else {
                                                    echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
                                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
                                                }
                                            }
                                            ?> -->
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>