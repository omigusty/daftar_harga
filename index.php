<?php

require 'functions.php';
$barang = query("SELECT * FROM daftar_harga");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <!-- Start Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container hello-text">
      <h5>Selamat Datang</h5>
      <h6>Omi Gusty Rifani</h6>
    </div>
  </div>
  <!-- End Jumbotron -->

  <!-- Start Table-->
  <div class="container">
    <form class="form-inline ml-auto">
      <input class="form-control mr-sm-2 ml-auto" type="search" placeholder="Search" aria-label="Search" />
      <button class="btn btn-outline-success my-2 my-sm-0 ml-auto" type="submit">
        Search
      </button>
    </form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($barang as $row) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $row["nama_barang"]; ?></td>
            <td><?= $row["harga"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- End Table -->

  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>