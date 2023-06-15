<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div id="main">
        <h1>Logowanie</h1>
        <form method="post" action="#">
            <input type="text" name="Login" class="form-control w-75 mx-auto my-2" id="login" placeholder="Login">
            <input type="password" name="Password" class="form-control w-75 mx-auto my-2" id="password"
                placeholder="Password">
            <input type="submit" class='btn btn-primary' value="Zaloguj">
        </form>
    </div>
    <?php
    include "database/config.php";
    if (!empty($_POST)) {
        session_start();

        // var_dump($_POST);
        $login = $_POST['Login'];
        $password = $_POST['Password'];
        // var_dump($login);
        // var_dump($password);
    
        $sql = "SELECT logindb,passworddb FROM logowanie WHERE login = '$login' AND password = '$password';";

        $login = mysqli_query($conn, $sql);

        var_dump($login);
        $login_fetch = mysqli_fetch_assoc($login);

        var_dump($login_fetch);
        $_SESSION['login'] = $login_fetch['logindb'];
        $_SESSION['password'] = $login_fetch['passworddb'];
        if (!empty($login_fetch)) {
            echo '<script>
                window.location.replace("files/dashboard.php");
                </script>';
        }
    }
    ?>
</body>

</html>