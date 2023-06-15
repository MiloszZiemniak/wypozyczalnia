<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$sql = 'select imie,nazwisko,pesel,ulica,miejscowosc,kod_pocztowy,telefon from klient';
$query = mysqli_query($conn, $sql);

// var_dump($_POST);
if (isset($_POST['imie'])) {
  $imieSend = $_POST['imie'];
  $nazwiskoSend = $_POST['nazwisko'];
  $adresSend = $_POST['adres'];
  $miejscowoscSend = $_POST['miejscowosc'];
  $kod_pocztowySend = $_POST['kod_pocztowy'];
  $peselSend = $_POST['pesel'];
  $telefonSend = $_POST['telefon'];

  $sql2 = "INSERT INTO `klient` (`id`, `pesel`, `imie`, `nazwisko`, `ulica`, `miejscowosc`, `kod_pocztowy`, `telefon`) VALUES (NULL, '$peselSend', '$imieSend', '$nazwiskoSend', '$adresSend', '$miejscowoscSend', '$kod_pocztowySend', '$telefonSend');";

  // var_dump($sql2);
  mysqli_query($conn, $sql2);
  $_POST = array();
  // var_dump($_POST);
}
?>