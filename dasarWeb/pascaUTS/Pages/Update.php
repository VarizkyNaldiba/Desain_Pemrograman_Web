<?php
// update.php
include 'ConnectToDB.php';

$id_provinsi = '002';
$nama_provinsi = 'Sumatera Utara';
$ibukota = 'Medan Baru';

$sql = "UPDATE provinsi SET nama_provinsi = ?, ibukota = ? WHERE id_provinsi = ?";
$params = [$nama_provinsi, $ibukota, $id_provinsi];
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Data berhasil diperbarui!";
}
?>
