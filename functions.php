<?php
// Koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "data_harga");

function query($query)
{
    global $connection;

    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $connection;

    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);

    // Query Insert Data
    $query = "INSERT INTO daftar_harga VALUES ('', '$nama_barang','$harga')";
    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

function hapus($id)
{
    global $connection;

    mysqli_query($connection, "DELETE FROM daftar_harga WHERE id = $id");
    return mysqli_affected_rows($connection);
}

function ubah($data)
{
    global $connection;

    $id = $data["id"];
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);

    // Query Insert Data
    $query = "UPDATE daftar_harga SET nama_barang = '$nama_barang', harga = '$harga' WHERE id = '$id' ";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

function cari($keyword)
{
    $query = "SELECT * FROM daftar_harga WHERE nama_barang LIKE '%$keyword%' OR harga LIKE '%$keyword%' ";
    return query($query);
}
