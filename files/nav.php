<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius:15px">
  <a class="navbar-brand" href="dashboard.php">Strona startowa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="klienci.php">Klienci</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pracownicy.php">Pracownicy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="samochody.php">Samochody</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="wypozyczenia.php">Wypozyczenia</a>
      </li>
    </ul>

    <a class="nav-link" href="">Wyloguj</a>
    <div class="navbar-text">Jestes zalogowany jako:
      <?php echo $_SESSION['login'] ?>
      <div>
      </div>
</nav>