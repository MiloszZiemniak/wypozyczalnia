<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$sql = 'select id,id_klienta,id_samochodu,id_pracownika,data_wypo,data_zwrot,koszt_wypo from wypozyczenia';
$query = mysqli_query($conn, $sql);
// var_dump($query);
// var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypozyczenia</title>
    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div id="main-dashboard">
        <?php
        include "nav.php";
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="general_settings" />
            <table id='myTable' class="table table-striped table-bordered">
                <thead>
                    <th>Imię i nazwisko klienta</th>
                    <th>Pracownik odpowiedzialny</th>
                    <th data-class-name="priority">Samochod</th>
                    <th>Data wypozyczenia</th>
                    <th>Data zwrotu</th>
                    <th>Cena</th>
                    <th>Akcje</th>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                        // var_dump($row);
                        $idKlient = $row["id_klienta"];
                        $idSamochodu = $row["id_samochodu"];
                        $id_pracownika = $row["id_pracownika"];
                        $data_wypo = $row["data_wypo"];
                        $data_zwrot = $row["data_zwrot"];
                        $koszt_wypo = $row["koszt_wypo"];
                        $id = $row["id"];

                        $sqlKlient = "SELECT imie,nazwisko FROM klient WHERE id = '$idKlient'";

                        $queryKlient = mysqli_query($conn, $sqlKlient);
                        $rowKlient = mysqli_fetch_assoc($queryKlient);

                        echo '<tr>';
                        printf("<td>%s %s</td>", $rowKlient['imie'], $rowKlient['nazwisko']);


                        $sqlPracownik = "SELECT imie,nazwisko FROM pracownik WHERE id = $id_pracownika";
                        $queryPracownik = mysqli_query($conn, $sqlPracownik);
                        $rowPracownik = mysqli_fetch_assoc($queryPracownik);
                        printf("<td>%s %s</td>", $rowPracownik['imie'], $rowPracownik['nazwisko']);

                        $sqlSamochod = "SELECT marka,model,silnik FROM samochod WHERE id = $idSamochodu";
                        $querySamochod = mysqli_query($conn, $sqlSamochod);
                        $rowSamochod = mysqli_fetch_assoc($querySamochod);
                        printf("<td>%s %s %s</td>", $rowSamochod['marka'], $rowSamochod['model'], $rowSamochod['silnik']);

                        printf("<td>%s</td>", $data_wypo);
                        printf("<td>%s</td>", $data_zwrot);
                        printf("<td>%s</td>", $koszt_wypo);
                        printf("<td><button class='btn btn-warning' id='%s' onclick='deleteWypo(%s)'>Usuń</button></td>", $id, $id);
                        // printf("<td>%s</td>",$do_wypozyczenia);
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </form>
        <div id='bg'
            style='width:100%; height:100%; position: fixed; background: rgb(0,0,0,0.5); z-index:10; top:0; left:0; visibility:hidden;'>
            <div style='position:fixed; background:white; width:65%; height:65%; left: 17.5%; top:17.5%; z-index: 10; border-radius: 15px; '
                class="p-2">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="klient">Klient: </label>
                        <select name="klient" id="klient">
                            <?php
                            $sqlKlientDropdown = "Select id,imie,nazwisko from klient";
                            $queryKlientDropdown = mysqli_query($conn, $sqlKlientDropdown);
                            while ($row = mysqli_fetch_assoc($queryKlientDropdown)) {
                                printf('<option value="%s">%s %s</option>', $row['id'], $row['imie'], $row['nazwisko']);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="samochod">Samochód: </label>
                        <select name="samochod" id="samochod">
                            <?php
                            $sqlSamochodDropdown = "Select id,marka,model,silnik from samochod where do_wypozyczenia = 1";
                            $querySamochodDropdown = mysqli_query($conn, $sqlSamochodDropdown);
                            while ($row = mysqli_fetch_assoc($querySamochodDropdown)) {
                                printf('<option value="%s">%s %s %s</option>', $row['id'], $row['marka'], $row['model'], $row['silnik']);
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="pracownik">Pracownik: </label>
                        <select name="pracownik" id="pracownik">

                            <?php
                            $sqlPracownikDropdown = "Select id,imie,nazwisko from pracownik";
                            $queryPracownikDropdown = mysqli_query($conn, $sqlPracownikDropdown);
                            while ($row = mysqli_fetch_assoc($queryPracownikDropdown)) {
                                printf('<option value="%s">%s %s</option>', $row['id'], $row['imie'], $row['nazwisko']);
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="datawypo">Data wypozyczenia</label>
                        <input type="date" class="form-control" name="datawypo" id="datawypo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datazwrot">Data zwrotu</label>
                        <input type="date" class="form-control" name="datazwrot" id="datazwrot">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary w-75" onclick="insertWypo()">Dodaj</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button id="exit" class="btn btn-warning w-75">Wyjdz</button>
                    </div>
                </div>
            </div>
        </div>
        <button class='btn' id="addNewItem">Dodaj nowe wypozyczenie</button>
    </div>
    </div>

    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.1.0" type="text/javascript"></script>
    <!-- <script src="http://jqueryte.com/js/jquery-te-1.4.0.min.js"></script> -->
    <script src="https:////cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#myTable').dataTable({
            "lengthChange": false
        });
        let table = new DataTable('#myTable');

        let add_new_item = document.getElementById('addNewItem');
        let exit = document.getElementById('exit');
        add_new_item.addEventListener('click', () => {
            let bg = document.getElementById('bg');
            bg.style.visibility = 'visible';
        });
        exit.addEventListener('click', () => {
            let bg = document.getElementById('bg');
            bg.style.visibility = 'hidden';
        });
        function insertWypo() {
            $.ajax({
                type: 'POST',
                url: 'functions/insertWypo.php',
                data: {
                    'klient': $('#klient').val(),
                    'samochod': $('#samochod').val(),
                    'pracownik': $('#pracownik').val(),
                    'datawypo': $('#datawypo').val(),
                    'datazwrot': $('#datazwrot').val(),
                },
                success: function (response) {
                    window.location.replace("wypozyczenia.php");

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Error Thrown: " + errorThrown);
                    console.log("Text Status: " + textStatus);
                    console.log("XMLHttpRequest: " + XMLHttpRequest);
                    console.warn(XMLHttpRequest.responseText)
                }
            });
        }
        function deleteWypo(id) {
            $.ajax({
                type: 'POST',
                url: 'functions/deleteWypo.php',
                data: {
                    'id': id
                },
                success: function (response) {
                    window.location.replace("wypozyczenia.php");
                }
            });
        }
    </script>
</body>

</html>