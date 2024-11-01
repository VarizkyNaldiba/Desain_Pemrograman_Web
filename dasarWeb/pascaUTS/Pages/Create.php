<?php
include 'ConnectToDB.php';

function tambahProvinsi($conn, $id_provinsi, $nama_provinsi, $ibukota) {
    $query = "INSERT INTO Provinsi (id_provinsi, nama_provinsi, ibukota) VALUES (?, ?, ?)";
    $params = [$id_provinsi, $nama_provinsi, $ibukota];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        redirect('index.php');
    } else {
        handleError();
    }
}

function handleError() {
    echo "Error: " . print_r(sqlsrv_errors(), true);
}

function redirect($url) {
    header("Location: $url");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_provinsi = $_POST['id_provinsi'];
    $nama_provinsi = $_POST['nama_provinsi'];
    $ibukota = $_POST['ibukota'];
    tambahProvinsi($conn, $id_provinsi, $nama_provinsi, $ibukota);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Provinsi</title>
</head>
<body>
    <h2>Tambah Provinsi</h2>
    <form action="index.php" method="POST">
        <label>ID Provinsi: <input type="text" name="id_provinsi" required></label><br>
        <label>Nama Provinsi: <input type="text" name="nama_provinsi" required></label><br>
        <label>Ibu Kota: <input type="text" name="ibukota" required></label><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>

