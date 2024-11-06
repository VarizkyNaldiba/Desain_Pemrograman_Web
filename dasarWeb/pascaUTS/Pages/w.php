<?php
include 'ConnectToDB.php';

// Fungsi menambahkan provinsi
function createProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)
{
    $sql = "INSERT INTO provinsi (id_provinsi, nama_provinsi, ibukota) VALUES (?, ?, ?)";
    $params = [$id_provinsi, $nama_provinsi, $ibukota];
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Proses penambahan provinsi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
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

// Fungsi mengedit provinsi
function editProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)
{
    $sql = "UPDATE provinsi SET nama_provinsi = ?, ibukota = ? WHERE id_provinsi = ?";
    $params = [$nama_provinsi, $ibukota, $id_provinsi];
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Proses edit provinsi
$edit = false;
if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
    $edit = true;
    $id_provinsi = $_GET['id'];
    $sql = "SELECT * FROM provinsi WHERE id_provinsi = ?";
    $params = [$id_provinsi];
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    sqlsrv_execute($stmt);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
}

// Fungsi menghapus provinsi
function deleteProvince($conn, $id_provinsi)
{
    $sql = "DELETE FROM provinsi WHERE id_provinsi = ?";
    $params = [$id_provinsi];
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Proses hapus provinsi
if (isset($_GET['aksi']) && $_GET['aksi'] == 'delete') {
    $id_provinsi = $_GET['id'];
    if (deleteProvince($conn, $id_provinsi)) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle form tambah
            $("#flip").click(function () {
                $("#panel").slideToggle("slow");
                $('#editForm').hide(); // Ensure edit form is hidden when adding
            });

            // Function to show edit form
            $('.edit-button').click(function () {
                $('#editForm').slideDown("slow");
                $("#panel").hide(); // Ensure add form is hidden when editing
            });

            // Hide form edit
            $('.cancel-edit').click(function () {
                $('#editForm').hide("slow");
            });

            // Hide form tambah
            $('.cancel-tambah').click(function () {
                $('#panel').hide("slow");
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=" index.php"><b>Provinsi Indonesia</b></a>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Tombol tambah untuk membuka form tambah -->
        <button id="flip" class="btn btn-primary mb-3"><b>[+]</b></button>

        <!-- Form Tambah Data -->
        <div id="panel" style="display:none;">
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="id_provinsi" class="form-label">Nomor Index</label>
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
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                <button type="button" class="btn btn-secondary cancel-tambah">Batal</button>
            </form>
        </div>

        <!-- Form Edit Data -->
        <div id="editForm" style="display:none;">
            <form action="index.php?aksi=edit&id=<?= isset($row['id_provinsi']) ? htmlspecialchars($row['id_provinsi']) : '' ?>" method="post">
                <div class="mb-3">
                    <label for="id_provinsi" class="form-label">Nomor Index</label>
                    <input type="number" class="form-control" id="id_provinsi" name="id_provinsi"
                        value="<?= isset($row['id_provinsi']) ? htmlspecialchars($row['id_provinsi']) : '' ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
                    <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi"
                        value="<?= isset($row['nama_provinsi']) ? htmlspecialchars($row['nama_provinsi']) : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ibukota" class="form-label">Ibu Kota Provinsi</label>
                    <input type="text" class="form-control" id="ibukota" name="ibukota"
                        value="<?= isset($row['ibukota']) ? htmlspecialchars($row['ibukota']) : '' ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                <button type="button" class="btn btn-secondary cancel-edit">Batal</button>
            </form>
        </div>

        <!-- Tabel Daftar Provinsi -->
        <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Ibu Kota Provinsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $sql = "SELECT * FROM provinsi";
                $stmt = sqlsrv_query($conn, $sql);
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= htmlspecialchars($row['nama_provinsi']) ?></td>
                        <td><?= htmlspecialchars($row['ibukota']) ?></td>
                        <td>
                            <button class="btn btn-secondary edit-button" data-id="<?= $row['id_provinsi'] ?>">Edit</button>
                            <a href="index.php?aksi=delete&id=<?= $row['id_provinsi'] ?>" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>