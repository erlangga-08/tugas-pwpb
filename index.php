<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <title></title>
</head>

<body>
  <?php
  include('class/Database.php');
  include('class/Mahasiswa.php');
  include('class/Jurusan.php');
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand p-2" href="index.php">
      <i class="fa fa-home fa-2x" aria-hidden="true"></i>
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link navbar-brand" href="index.php?file=mahasiswa&aksi=tampil">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-brand" href="index.php?file=jurusan&aksi=tampil">Data Jurusan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <?php
  if (isset($_GET['file'])) {
    include($_GET['file'] . '.php');
  } else {
    echo '<h1 align="center" class="mt-3">Selamat Datang</h1>';
  }
  ?>
  <footer class="bg-light text-center text-lg-start fixed-bottom">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: white">
    © 2023 Copyright:
    <a class="text-dark" href="#">Desta Erlangga</a>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>