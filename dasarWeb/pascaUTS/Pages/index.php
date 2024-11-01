<?php
include 'ConnectToDB.php';

$query = "SELECT * FROM Provinsi";
$result = sqlsrv_query($conn, $query);

if (!$result) {
    die("Query gagal: " . print_r(sqlsrv_errors(), true));
}

$i = 1;
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
        <a href="Create.php" class="btn btn-success mb-3">Tambah Provinsi</a>
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
                <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($row['nama_provinsi']) ?></td>
                        <td><?= htmlspecialchars($row['ibukota']) ?></td>
                        <td>
                            <a href="Edit.php?id=<?= $row[$i] ?>" class="btn btn-primary">Edit</a>
                            <a href="Delete.php?id=<?= $row[$i] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
