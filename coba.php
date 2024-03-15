<?php include 'konek.php'; ?>
<?php 
$nm_kec = mysqli_query($konek, "SELECT * FROM mst_kec ORDER BY nm_kec");
while($kec=mysqli_fetch_row($nm_kec)){ ?>
    <option value=<?php echo $kec['id_kec'] ?>> <?php echo $kec['nm_kec'] ?></option>;
<?php } ?>

<?php print_r($kec) ?>