<?php


// Query Data barang
require 'functions.php';


$jumlahdataperhalaman = 5;
$jumlahData = count(query("SELECT * FROM daftar_harga"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;



$barang = query("SELECT * FROM daftar_harga LIMIT $awalData,$jumlahdataperhalaman");
if (isset($_POST["cari"])) {
  $barang = cari($_POST["keyword"]);
}


// Insert Data Barang
// Cek Tombol Submit Pernah Ditekan Atau Belum
if (isset($_POST["submit"])) {

  // Cek Apakah Data Berhasil Ditambahkan
  if (tambah($_POST) > 0) {
    echo
      "<script>
      alert('Data Berhasil Ditambahkan')
      document.location.href = 'index.php'
      </script>";
  } else {
    echo
      "<script>
      alert('Data Gagal Ditambahkan')
      document.location.href = 'index.php'
      </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <form class="form-inline ml-auto" action="" method="POST">
      <input class="form-control mr-sm-2 ml-auto" name="keyword" type="text" placeholder="Cari Barang" autofocus autocomplete="off" />
      <button class="btn btn-outline-success my-2 my-sm-0 ml-auto" name="cari" type="submit">
        Search
      </button>
    </form>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
      Tambah Barang
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($barang as $row) : ?>
          <tr>
            <td><?= $row["nama_barang"]; ?></td>
            <td><?= $row["harga"]; ?></td>
            <td>
              <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm rounded-circle">
                <i class="fa fa-edit"></i></a>
              <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm rounded-circle" onclick="return confirm('Yakin Untuk Menghapus?');"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- End Table -->
  <div class="container">
    <nav class="ml-auto">
      <ul class="pagination pagination-sm">
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if ($i == $halamanAktif) : ?>
            <li class="page-item active"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
          <?php else : ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
          <?php endif; ?>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>

  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>