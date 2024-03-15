<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request'])) {
    $id_request = $_GET['id_request'];
    $id_berkas = $_GET['id_berkas'];
    $nik = $_GET['nik'];
    $nip = $_GET['nip'];
    $tgl_acc = $_GET['tgl_acc'];
    
    $status = $_GET['status'];
	if($status==0){
        $no_urut = $_POST['no_urut'];
        $update = mysqli_query($konek, "UPDATE data_request SET acc='$tgl_acc',no_urut='$no_urut', status=1 WHERE id_request=$id_request");
	} else {
        $sql_agenda = "SELECT no_urut FROM data_request where id_request='$id_request'";
		$query_agenda = mysqli_query($konek, $sql_agenda);
		$data_agenda = mysqli_fetch_array($query_agenda, MYSQLI_BOTH);
		$no_urut = $data_agenda['no_urut'];
        $update = mysqli_query($konek, "UPDATE data_request SET acc='$tgl_acc' WHERE id_request=$id_request");
    }	
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    $id_request = $_GET['id_request'];
    $id_berkas = $_GET['id_berkas'];
    $nik = $_GET['nik'];
    $nip = $_GET['nip'];
    $sql = "SELECT * FROM data_request inner join data_user on data_request.nik = data_user.nik 
    inner join master_berkas on data_request.id_berkas = master_berkas.id_berkas
    where data_request.nik=$nik and data_request.id_berkas=$id_berkas";
    // and id_request='$id'
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id_request = $data['id_request'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = tgl_indo($data['tanggal_lahir']);
    $tgl2 = tgl_indo($data['tanggal_request']);
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $warganegara = $data['warganegara'];
    $nama = $data['nama'];
    $id_kec = $data['id_kec'];
    $id_desa = $data['id_desa'];
    $rt = $data['rt'];
    $rw = $data['rw'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $status_nikah = $data['status_nikah'];
    $keperluan = $data['keperluan'];
    $keterangan = $data['keterangan'];
    $status = $data['status'];
    $acc = $data['acc'];
    $id_berkas = $data['id_berkas'];
    $judul_berkas = $data['judul_berkas'];
    $kode_berkas = $data['kode_berkas'];
    $kode_belakang = $data['kode_belakang'];
    $template = $data['template'];
    $status = $data['status'];
    $jekel_anak = $data['jekel_anak'];
    $nama_anak = $data['nama_anak'];
    $tempat_lahir_anak = $data['tempat_lahir_anak'];
    $tanggal_lahir_anak = $data['tanggal_lahir_anak'];
    $sekolah = $data['sekolah'];
    $jurusan = $data['jurusan'];
    $semester = $data['semester'];
    $nm_organisasi = $data['nm_organisasi'];
    $alamat_Organisasi = $data['alamat_organisasi'];
    $nm_ketua = $data['nm_ketua'];
    $status_nikah = $data['status_nikah'];
    $nik_ayah = $data['nik_ayah'];
    $nik_ibu = $data['nik_ibu'];
    $nama_usaha = $data['nama_usaha'];
    $tahun_usaha = $data['tahun_usaha'];
    $alamat_usaha = $data['alamat_usaha'];
    $tujuan = $data['tujuan'];
    $format4 = date('d F Y', strtotime($acc));

    $sql2 = "SELECT mst_kec.nm_kec, mst_desa.nm_desa FROM mst_kec inner join mst_desa on mst_kec.id_kec = mst_desa.id_kec 
    where mst_desa.id_desa=$id_desa and mst_desa.id_kec=$id_kec";
    $query2 = mysqli_query($konek, $sql2);
    $data2 = mysqli_fetch_array($query2, MYSQLI_BOTH);
    $ds = $data2['nm_desa'];
    $desa = ucwords("$ds");
    $kecamatan = ucwords($data2['nm_kec']);

    $sql3 = "SELECT * FROM data_pejabat where nip=$nip";
    $query3 = mysqli_query($konek, $sql3);
    $data3 = mysqli_fetch_array($query3, MYSQLI_BOTH);
    $nip = $data3['nip'];
    $nm_pejabat = $data3['nm_pejabat'];
    $jabatan = $data3['jabatan'];


    $array_delimiter = ['$nama','$jabatan','$nip','$alamat','$rt','$rw','$nik','$tempat_lahir','$tanggal_lahir','$tanggal_request','$agama','$jekel','$warganegara','$jekel_anak','$id_kec','$id_desa','$status_warga','$nama_anak','$tempat_lahir_anak','$tanggal_lahir_anak','$sekolah','$jurusan','$semester','$nm_organisasi','$alamat_Organisasi','$nm_ketua','$status_nikah','$nik_ayah','$nik_ibu','$nama_usaha','$tahun_usaha','$alamat_usaha','$tujuan','$desa','$kecamatan','$nm_pejabat'];
    $array_value = [$nama,$jabatan,$nip,$alamat,$rt,$rw,$nik,$tempat,$tgl,$tgl2,$agama,$jekel,$warganegara,$jekel_anak,$id_kec, $id_desa,$status_warga,$nama_anak,$tempat_lahir_anak,$tanggal_lahir_anak,$sekolah,$jurusan,$semester,$nm_organisasi,$alamat_Organisasi,$nm_ketua,$status_nikah,$nik_ayah,$nik_ibu,$nama_usaha,$tahun_usaha,$alamat_usaha,$tujuan,$desa,$kecamatan,$nm_pejabat];
    //$nip = $data['nip'];
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK <?php 
							$judul_berkas = $_GET['judul_berkas']; 
							$id_berkas = $_GET['id_berkas'];
							echo strtoupper($judul_berkas)
							?></title>
</head>

<body>
<table>
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                            </tr>
                            <tr>
                            <th><img src="img/kabmalang.png" width="90" height="107" alt=""></th>
                            <th><center>
                                
                                                    <font size="5">PEMERINTAHAN KABUPATEN MALANG</font><br>
                                                    <font size="5">KECAMATAN <?php echo strtoupper($data2['nm_kec']); ?> </font><br>
                                                    <font size="5"><b>DESA <?php echo strtoupper($data2['nm_desa']); ?> </b></font><br>
                                                    <font size="4"><i><?php echo $alamat; ?></i></font><br><br>
                                                </center></th>
                            </tr>
                            <tr>
                                <th colspan="2"><hr style="margin:0px" color="black"></th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                <center> <br><br>
                                                    <h3><b>SURAT KETERANGAN / PENGANTAR</b></h3>
                                                    
                                                    <span>Nomor : <?php echo $id_berkas; ?> / <?php echo $no_urut; ?> / <?php echo $kode_belakang; ?> </span>
                                                </center>
                                </th>
                            </tr>
                            <tr align="justify">
                                <th colspan="2">
                                    <?php
                                    $konten = '';
                                    for($i=0;$i<count($array_delimiter);$i++){
                                        if($i==0){
                                            $konten = str_replace($array_delimiter[$i],$array_value[$i],$template);
                                        }else{
                                            $konten = str_replace($array_delimiter[$i],$array_value[$i],$konten);
                                        }
                                    }
                                    echo $konten;
                                    ?>
                                </th>
                            </tr>
                            <tr font="Times New Roman">
                                <th></th>
                                <th>Malang, <?php echo tgl_indo($tgl_acc) ?><br>
                                    <?php 
                                    if($jabatan='Kepala' || $jabatan='kepala' || $jabatan='Kepala'){
                                        echo $jabatan;
                                    } else {
                                        echo 'an. '.$lainnya;
                                    }
                                    ?> Desa <br><br><br><br><?php echo $nm_pejabat ?></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        
                    </table>
</body>

</html>
<script>
    window.print();
</script>