<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$sql = 'select id,id_klienta,id_samochodu,id_pracownika,data_wypo,data_zwrot,koszt_wypo from wypozyczenia';
$query = mysqli_query($conn, $sql);
/* $sql2 = "INSERT INTO `wypozyczenia`(`id_klienta`, `id_samochodu`, `id_pracownika`, `data_wypo`, `data_zwrot`, `koszt_wypo`) VALUES ('2','2','3','2022-2-2','2022-2-3','330');";
mysqli_query($conn,$sql2); */
var_dump($_POST);
if (isset($_POST['klient'])) {
  $idKlient = $_POST['klient'];
  $idSamochod = $_POST['samochod'];
  $idPracownik = $_POST['pracownik'];
  $dataWypo = $_POST['datawypo'];
  $dataZwrot = $_POST['datazwrot'];


  $kosztDni = strtotime($dataZwrot) - strtotime($dataWypo);
  $kosztDniRound = $kosztDni / (60 * 60 * 24);

  $kosztZaDzienSql = "SELECT cena_za_dobe from samochod where id = '$idSamochod';";
  $kosztZaDzienQuery = mysqli_query($conn, $kosztZaDzienSql);
  $kosztZaDzienAssoc = mysqli_fetch_assoc($kosztZaDzienQuery);

  $kosztWypo = $kosztZaDzienAssoc['cena_za_dobe'] * $kosztDniRound;

  $sql2 = "INSERT INTO `wypozyczenia`(`id_klienta`, `id_samochodu`, `id_pracownika`, `data_wypo`, `data_zwrot`, `koszt_wypo`) VALUES ('$idKlient','$idSamochod','$idPracownik','$dataWypo','$dataZwrot','$kosztWypo'); UPDATE `samochod` SET `do_wypozyczenia`='0' WHERE `id` = '$idSamochod';";

  // var_dump($sql2);
  mysqli_multi_query($conn, $sql2);

  // var_dump($_POST);
}
?>