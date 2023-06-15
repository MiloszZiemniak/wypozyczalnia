<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$sql = 'select id,imie,nazwisko,pesel,ulica,miejscowosc,kod_pocztowy,telefon,stanowisko,wynagrodzenie from pracownik';
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pracownicy</title>
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
          <th>Imię</th>
          <th>Nazwisko</th>
          <th data-class-name="priority">PESEL</th>
          <th>Ulica</th>
          <th>Miejscowość</th>
          <th>Kod</th>
          <th>Telefon</th>
          <th>Stanowisko</th>
          <th>Wynagrodzenie</th>
          <th>Akcje</th>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($query)) {
            $imie = $row["imie"];
            $nazwisko = $row["nazwisko"];
            $pesel = $row["pesel"];
            $ulica = $row["ulica"];
            $miejscowosc = $row["miejscowosc"];
            $kod_pocztowy = $row["kod_pocztowy"];
            $telefon = $row["telefon"];
            $stanowisko = $row["stanowisko"];
            $wynagrodzenie = $row["wynagrodzenie"];
            $id = $row["id"];
            echo '<tr>';
            printf("<td>%s</td>", $imie);
            printf("<td>%s</td>", $nazwisko);
            printf("<td>%s</td>", $pesel);
            printf("<td>%s</td>", $ulica);
            printf("<td>%s</td>", $miejscowosc);
            printf("<td>%s</td>", $kod_pocztowy);
            printf("<td>%s</td>", $telefon);
            printf("<td>%s</td>", $stanowisko);
            printf("<td>%s zł</td>", $wynagrodzenie);
            printf("<td><button class='btn btn-warning' id='%s' onclick='deletePracownik(%s)'>Usuń</button></td>", $id, $id);
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </form>
    <div id='bg'
      style='width:100%; height:100%; position: fixed; background: rgb(0,0,0,0.5); z-index:10; top:0; left:0; visibility:hidden;'>
      <div
        style='position:fixed; background:white; width:65%; height:65%; left: 17.5%; top:17.5%; z-index: 10; border-radius: 15px; '
        class="p-2">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="imie">Imię</label>
            <input type="text" class="form-control" id="imie" name="imie" placeholder="Imię">
          </div>
          <div class="form-group col-md-6">
            <label for="nazwisko">Nazwisko</label>
            <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Nazwisko">
          </div>
        </div>
        <div class="form-group">
          <label for="adres">Ulica i nr domu</label>
          <input type="text" class="form-control" id="adres" name="adres" placeholder="Ulica i numer domu">
        </div>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="miejscowosc">Miejscowość</label>
            <input type="text" class="form-control" name="miejscowosc" id="miejscowosc">
          </div>
          <div class="form-group col-md-4">
            <label for="kod_pocztowy">Kod pocztowy</label>
            <input type="text" class="form-control" name="kod_pocztowy" id="kod_pocztowy">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="pesel">Pesel</label>
            <input type="text" class="form-control" name="pesel" id="pesel">
          </div>
          <div class="form-group col-md-6">
            <label for="telefon">Telefon</label>
            <input type="text" class="form-control" name="telefon" id="telefon">
          </div>
          <div class="form-group col-md-6">
            <label for="stanowisko">Stanowisko</label>
            <input type="text" class="form-control" name="stanowisko" id="stanowisko">
          </div>
          <div class="form-group col-md-6">
            <label for="wynagrodzenie">Wynagrodzenie</label>
            <input type="text" class="form-control" name="wynagrodzenie" id="wynagrodzenie">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary w-75" onclick="insertPracownik()">Dodaj</button>
          </div>
          <div class="form-group col-md-6">
            <button id="exit" class="btn btn-warning w-75">Wyjdz</button>
          </div>
        </div>

      </div>
    </div>
    <button class='btn' id="addNewItem">Dodaj nowego Pracownika</button>
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
    function insertPracownik() {
      $.ajax({
        type: 'POST',
        url: 'functions/insertPracownik.php',
        data: {
          'imie': $('#imie').val(),
          'nazwisko': $('#nazwisko').val(),
          'pesel': $('#pesel').val(),
          'adres': $('#adres').val(),
          'miejscowosc': $('#miejscowosc').val(),
          'kod_pocztowy': $('#kod_pocztowy').val(),
          'telefon': $('#telefon').val(),
          'stanowisko': $('#stanowisko').val(),
          'wynagrodzenie': $('#wynagrodzenie').val(),
        },
        success: function (response) {
          window.location.replace("pracownicy.php");
        }
      });
    }
    function deletePracownik(id) {
      $.ajax({
        type: 'POST',
        url: 'functions/deletePracownik.php',
        data: {
          'id': id
        },
        success: function (response) {
          window.location.replace("pracownicy.php");
        }
      });
    }
  </script>
</body>

</html>