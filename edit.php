<?php
require 'functions.php';

// Ambil Data di URL
$id = $_GET["id"];

// Query Data Berdasarkan id
$data_barang = query("SELECT * FROM daftar_harga WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    // Cek Apakah Data Berhasil Diubah
    if (ubah($_POST) > 0) {
        echo
            "<script>
            alert('Data Berhasil Diubah')
            document.location.href = 'index.php'
            </script>";
    } else {
        echo
            "<script>
            alert('Data Gagal Diubah')
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
    <div class="container">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $data_barang["id"]; ?>">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $data_barang["nama_barang"] ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" value="<?= $data_barang["harga"] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>