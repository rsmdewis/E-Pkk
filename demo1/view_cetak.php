<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    $id_request = $_GET['id_request'];
    $id_berkas = $_GET['id_berkas'];
    $nik = $_GET['nik'];
    $nip = $_POST['pejabat'];
    $tgl_acc = $_POST['tgl_acc'];
    
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
                                
    $sql = "SELECT * FROM data_request inner join data_user on data_request.nik = data_user.nik 
            inner join master_berkas on data_request.id_berkas = master_berkas.id_berkas
            where data_request.nik=$nik and data_request.id_berkas=$id_berkas";

        
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
    $idpekerjaan = $data['idpekerjaan'];
    $tujuan = $data['tujuan'];
    // $form_tambahan = $data['form_tambahan'];
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

    $sql4 = "SELECT tbl_pekerjaan.nama_pekerjaan FROM tbl_pekerjaan 
    where tbl_pekerjaan.idpekerjaan=$idpekerjaan";
    $query4 = mysqli_query($konek, $sql4);
    $data4 = mysqli_fetch_array($query4, MYSQLI_BOTH);
    $pekerjaan = $data4['nama_pekerjaan'];

    $sql6 = "SELECT data_request.form_tambahan FROM data_request 
    where data_request.id_berkas = $id_berkas";
    $query6 = mysqli_query($konek, $sql6);
    $data6 = mysqli_fetch_array($query6, MYSQLI_BOTH);
    $form_tambahan = $data6['form_tambahan'];

    $sql5 = "SELECT * FROM data_desa
    where nik=$nik";
    $query5 = mysqli_query($konek, $sql5);
    $data5 = mysqli_fetch_array($query5, MYSQLI_BOTH);
    $nik = $data5['nik'];
    $alamat2 = $data5['alamat'];

    $array_delimiter = ['$nama','$jabatan','$nip','$alamat','$rt','$rw','$nik','$tempat_lahir','$tanggal_lahir','$tanggal_request','$pekerjaan','$agama','$jekel','$warganegara','$jekel_anak','$id_kec','$id_desa','$status_warga','$nama_anak','$tempat_lahir_anak','$tanggal_lahir_anak','$sekolah','$jurusan','$semester','$status_nikah','$nik_ayah','$nik_ibu','$nama_usaha','$tahun_usaha','$alamat_usaha','$tujuan','$desa','$kecamatan','$nm_pejabat', '$alamat2'];
    $array_value = [$nama,$jabatan,$nip,$alamat,$rt,$rw,$nik,$tempat,$tgl,$tgl2,$pekerjaan,$agama,$jekel,$warganegara,$jekel_anak,$id_kec, $id_desa,$status_warga,$nama_anak,$tempat_lahir_anak,$tanggal_lahir_anak,$sekolah,$jurusan,$semester,$status_nikah,$nik_ayah,$nik_ibu,$nama_usaha,$tahun_usaha,$alamat_usaha,$tujuan,$desa,$kecamatan,$nm_pejabat, $alamat2];
    //$nip = $data['nip'];

    //form tambahan
    if($form_tambahan!=0){
        $array_delimiter2 = [];
    $array_value2 = [];
    $pecahform = explode(',',$form_tambahan);
    for($i=0; $i<count($pecahform);$i++){
        $pecahvariabel = explode(':',$pecahform[$i]);
        $array_delimiter2[]='"$'.$pecahvariabel[0].'"';
        $array_value2[]=$pecahvariabel[1];
        echo $array_delimiter2[2];
        echo '<br>nilai : '.$array_value2[2];
    }
    }
    
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        
                        <div class="form-group">
                                <!-- <label>Pejabat</label>
                                    <select name="nama" id="nama" class="form-control">
                                    <option value="">-Pilih Pejabat-</option>
									<?php 
									// $namaPejabat = mysqli_query($konek, "SELECT * FROM data_pejabat ORDER BY nama");
									// while($pejabat=mysqli_fetch_array($namaPejabat)){ ?>
									  <option value=<?php //echo $pejabat['nip'] ?>> <?php //echo $pejabat['nama'] ?></option>;
									<?php //} ?>
      
                  
                                </select>
                                </div> -->
                            
                                
                                <div>
                                    <!-- <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm"> -->
                                    <a href="cetak_surat.php?nik=<?php echo $nik ?>&id_request=<?php echo $id_request ?>&id_berkas=<?php echo $id_berkas ?>&nip=<?php echo $nip ?>&tgl_acc=<?php echo $tgl_acc ?>&judul_berkas=<?php echo $judul_berkas ?>&status=1" class="btn btn-primary btn-sm">Cetak</a>
                                </div>
                                <br>
                                
                                
                            </div>
                           
                        </form>
                        <?php
                        if (isset($_POST['ttd'])) {
                            $cetak = $_POST['dicetak'];
                            $tgl = $_POST['tgl_acc'];
                            $update = mysqli_query($konek, "UPDATE data_request SET keterangan='$cetak',acc='$tgl', status=1 WHERE id_request=$id_request");
                            if ($update) {
                                echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=surat_dicetak">';
                            } else {
                                echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_cetak">';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                            </tr>
                            <tr>
                            <th>&emsp;&emsp;&emsp;&emsp;<img src="img/kabmalang.png" width="90" height="107" alt=""></th>
                            <th><center>
                                
                                                    <font size="4">PEMERINTAHAN KABUPATEN MALANG</font><br>
                                                    <font size="4">KECAMATAN <?php echo strtoupper($data2['nm_kec']); ?> </font><br>
                                                    <font size="5"><b>DESA <?php echo strtoupper($data2['nm_desa']); ?> </b></font><br>
                                                    <font size="3"><i><?php echo $alamat2 ?></i></font><br><br>
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
                            <tr>
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
                                    for($j=0;$j<count($array_delimiter2);$j++){
                                           $konten = str_replace($array_delimiter2[$j],$array_value2[$j],$konten);
                                       
                                    }
                                    echo $konten;
                                    ?>
                                    <?php
                                    // $konten2 = '';
                                    //  for($j=0;$j<count($array_delimiter2);$j++){
                                    //      if($j==0){
                                    //          $konten2 = str_replace($array_delimiter2[$j],$array_value2[$j],$template);
                                    //      }else{
                                    //          $konten2 = str_replace($array_delimiter2[$j],$array_value2[$j],$konten2);
                                    //      }
                                    //  }
                                    //  echo $konten2;
                                    ?>
                                </th>
                            </tr>
                            <tr font="Times New Roman">
                                <th></th>
                                <th>Malang, <?php echo tgl_indo($tgl_acc) ?><br>
                                    <?php 
                                    if($jabatan=='Kepala'){
                                        echo $jabatan.' Desa';
                                    } else {
                                        echo 'an. Kepala Desa<br>'.$jabatan;
                                    }
                                    ?> <br><br><br><br><?php echo $nm_pejabat ?></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
        <?php  ?>
    </div>
</div>