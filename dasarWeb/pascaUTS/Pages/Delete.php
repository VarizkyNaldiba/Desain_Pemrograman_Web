<?php
include 'ConnectToDB.php';

function deleteProvince($conn, $id) {
    $query = "DELETE FROM Provinsi WHERE id = ?";
    $params = [$id];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        redirect("index.php");
    } else {
        handleError();
    }
}

function handleError() {
    echo "Error: " . print_r(sqlsrv_errors(), true);
}

function redirect($url) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProvince($conn, $id);
} else {
    echo "ID tidak ditemukan";
}
?>
