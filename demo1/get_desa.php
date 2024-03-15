<?php 
 date_default_timezone_set('Asia/Jakarta');
 $hostname = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'surat';

 $konek = mysqli_connect($hostname,$username,$password,$database);


$id_kec = $_POST['id'];
$data_json = array();
$desa = mysqli_query($konek, "SELECT * FROM mst_desa where id_kec=$id_kec ORDER BY nm_desa");
while($desaa=mysqli_fetch_array($desa)){ 
    $data_json[] = array('id_desa' => $desaa['id_desa'],
        'nm_desa'=> $desaa['nm_desa']);
} 
echo json_encode($data_json);
?>