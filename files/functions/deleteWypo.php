<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$id = $_POST['id'];
$idSamochodSql = "SELECT `id_samochodu` FROM `wypozyczenia` WHERE `id` = '$id'";
$idSamochodQuery = mysqli_query($conn, $idSamochodSql);
$idSamochodAssoc = mysqli_fetch_assoc($idSamochodQuery);
$idSamochod = $idSamochodAssoc['id_samochodu'];
$sql = "DELETE from wypozyczenia where id ='$id'; UPDATE `samochod` SET `do_wypozyczenia`='1' WHERE `id` = '$idSamochod';";
$query = mysqli_multi_query($conn, $sql);
?>