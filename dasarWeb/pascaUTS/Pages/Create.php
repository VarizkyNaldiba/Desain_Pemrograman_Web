<?php
// create.php
include 'ConnectToDB.php';

function createProvince($conn, $id_provinsi, $nama_provinsi, $ibukota) {
    $sql = "INSERT INTO provinsi (id_provinsi, nama_provinsi, ibukota) VALUES (?, ?, ?)";
    $params = [$id_provinsi, $nama_provinsi, $ibukota];
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_provinsi = $_POST['id_provinsi'];
    $nama_provinsi = $_POST['nama_provinsi'];
    $ibukota = $_POST['ibukota'];
    if (createProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}
?>

