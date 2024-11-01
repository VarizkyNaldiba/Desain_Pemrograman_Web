<?php
include 'ConnectToDB.php';



// add Province
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
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinsi Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>Provinsi Indonesia</b></a>
        </div>
    </nav>

    <div class="container mt-4">
        <form action="index.php" method="post">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <div class="mb-3">
                <label for="id_provinsi" class="form-label">Nomor</label>
                <input type="number" class="form-control" id="id_provinsi" name="id_provinsi" required>
            </div>
            <div class="mb-3">
                <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
                <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" required>
            </div>
            <div class="mb-3">
                <label for="ibukota" class="form-label">Ibu Kota Provinsi</label>
                <input type="text" class="form-control" id="ibukota" name="ibukota" required>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Ibu Kota Provinsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; $sql = "SELECT * FROM provinsi"; $stmt = sqlsrv_query($conn, $sql); while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($row['nama_provinsi']) ?></td>
                        <td><?= htmlspecialchars($row['ibukota']) ?></td>
                        <td>
                            <a href="Edit.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-secondary">Edit</a>
                            <a href="Delete.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

