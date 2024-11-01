<?php
include 'ConnectToDB.php';

function getProvinceById($conn, $id) {
    $query = "SELECT * FROM Provinsi WHERE id = ?";
    $params = [$id];
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt) {
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    } else {
        handleError("Data tidak ditemukan");
    }
}

function updateProvince($conn, $id, $nama_provinsi, $ibukota) {
    $query = "UPDATE Provinsi SET nama_provinsi = ?, ibukota = ? WHERE id = ?";
    $params = [$nama_provinsi, $ibukota, $id];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        redirect("index.php");
    } else {
        handleError();
    }
}

function handleError($message = "Error") {
    echo $message . ": " . print_r(sqlsrv_errors(), true);
    exit();
}

function redirect($url) {
    header("Location: $url");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = getProvinceById($conn, $id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_provinsi = $_POST['nama_provinsi'];
        $ibukota = $_POST['ibukota'];
        updateProvince($conn, $id, $nama_provinsi, $ibukota);
    }
} else {
    handleError("ID tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Provinsi</title>
</head>
<body>
    <h2>Edit Provinsi</h2>
    <form action="Edit.php" method="POST">
        <label>ID Provinsi: <input type="text" name="id_provinsi" value="<?= htmlspecialchars($user['id_provinsi']) ?>" required></label><br>
        <label>Nama Provinsi: <input type="text" name="nama_provinsi" value="<?= htmlspecialchars($user['nama_provinsi']) ?>" required></label><br>
        <label>Ibu Kota: <input type="text" name="ibukota" value="<?= htmlspecialchars($user['ibukota']) ?>" required></label><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
