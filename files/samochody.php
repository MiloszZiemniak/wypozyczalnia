<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$sql = 'select id,marka,model,rocznik,kolor,silnik,numer_rej,cena_za_dobe,do_wypozyczenia from samochod';
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samochody</title>
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
                    <th>Marka</th>
                    <th>Model</th>
                    <th data-class-name="priority">Rocznik</th>
                    <th>Kolor</th>
                    <th>Silnik</th>
                    <th>Numer rejestracyjny</th>
                    <th>Cena za dobę</th>
                    <th>Do wypozyczenia</th>
                    <th>Akcje</th>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                        $marka = $row["marka"];
                        $model = $row["model"];
                        $rocznik = $row["rocznik"];
                        $kolor = $row["kolor"];
                        $silnik = $row["silnik"];
                        $num_rej = $row["numer_rej"];
                        $cena_za_dobe = $row["cena_za_dobe"];
                        $do_wypozyczenia = $row["do_wypozyczenia"];
                        $id = $row["id"];
                        echo '<tr>';
                        printf("<td>%s</td>", $marka);
                        printf("<td>%s</td>", $model);
                        printf("<td>%s</td>", $rocznik);
                        printf("<td>%s</td>", $kolor);
                        printf("<td>%s</td>", $silnik);
                        printf("<td>%s</td>", $num_rej);
                        printf("<td>%s zł</td>", $cena_za_dobe);
                        if ($do_wypozyczenia == 1) {
                            printf("<td>Do wypozyczenia</td>");
                        } else {
                            printf("<td>Wypozyczony</td>");
                        }
                        printf("<td><button class='btn btn-warning' id='%s' onclick='deleteSamochod(%s)'>Usuń</button></td>", $id, $id);
                        // printf("<td>%s</td>",$do_wypozyczenia);
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </form>
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
        function deleteSamochod(id) {
            $.ajax({
                type: 'POST',
                url: 'functions/deleteSamochod.php',
                data: {
                    'id': id
                },
                success: function (response) {
                    window.location.replace("samochody.php");
                }
            });
        }
    </script>
</body>

</html>