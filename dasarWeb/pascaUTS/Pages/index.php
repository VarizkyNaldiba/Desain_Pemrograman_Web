<?php
include 'ConnectToDB.php';

// Fungsi untuk menambah provinsi
function createProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)
{
        
    $sql = "INSERT INTO provinsi (id_provinsi, nama_provinsi, ibukota) VALUES (?, ?, ?)";
    $parameter = [$id_provinsi, $nama_provinsi, $ibukota];
    $DataPengganti = sqlsrv_prepare($conn, $sql, $parameter);
    // sqlsrv_prepare untuk mempersiapkan query sql trus di simpan di $DataPengganti
    if ($DataPengganti && sqlsrv_execute($DataPengganti)) {
        // sqlsrv_execute untuk menjalankan query kalo kedua persyaratan terpenuhi
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['tambah'])) {
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

// Fungsi untuk mengedit provinsi
function editProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)
{
    $sql = "UPDATE provinsi SET nama_provinsi = ?, ibukota = ? WHERE id_provinsi = ?";
    $parameter = [$nama_provinsi, $ibukota, $id_provinsi];
    $DataPengganti = sqlsrv_prepare($conn, $sql, $parameter);

    if ($DataPengganti && sqlsrv_execute($DataPengganti)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
    $id_provinsi = $_GET['id'];
    $sql = "SELECT * FROM provinsi WHERE id_provinsi = ?";
    $parameter = [$id_provinsi];
    $DataPengganti = sqlsrv_prepare($conn, $sql, $parameter);
    sqlsrv_execute($DataPengganti);
    $row = sqlsrv_fetch_array($DataPengganti, SQLSRV_FETCH_ASSOC);
    // sqlsrv_fetch_array mengambil data hasil query trus simpan di array asosiatif SQLSRV_FETCH_ASSOC
    if (isset($_POST['edit'])) {
        $id_provinsi = $_POST['id_provinsi'];
        $nama_provinsi = $_POST['nama_provinsi'];
        $ibukota = $_POST['ibukota'];
        if (editProvince($conn, $id_provinsi, $nama_provinsi, $ibukota)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        }
    }
}

// Fungsi untuk menghapus provinsi
function deleteProvince($conn, $id_provinsi)
{
    $sql = "DELETE FROM provinsi WHERE id_provinsi = ?";
    $parameter = [$id_provinsi];
    $DataPengganti = sqlsrv_prepare($conn, $sql, $parameter);

    if ($DataPengganti && sqlsrv_execute($DataPengganti)) {
        return true;
    } else {
        return false;
    }
}

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
    <link rel="stylesheet" href="style.css">
    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $("#addPanel").slideToggle("slow");
                $("#formEdit").hide("slow");
            });

            // jq cancel add
            $('#addCancel').click(function () {
                $('#addPanel').hide("slow");
            });

            // jq edit
            $('.edit').click(function () {
                var id = $(this).data('id');
                var nama_provinsi = $(this).data('nama_provinsi');
                var ibukota = $(this).data('ibukota');
                $('#edit_id_provinsi').val(id);
                $('#edit_nama_provinsi').val(nama_provinsi);
                $('#edit_ibukota').val(ibukota);
                $("#formEdit").show("slow");
                $("#addPanel").hide("slow");
            });

            // jq cancel edit
            $('.cancel').click(function () {
                $('#formEdit').hide("slow");
            });
            
            // jq delete
            $('.delete').click(function () {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        type: 'GET',
                        url: 'index.php',
                        data: 'aksi=delete&id=' + id,
                        success: function (response) {
                            window.location.href = 'index.php';
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><b>Provinsi Indonesia</b></a>
        </div>
    </nav>

    <div class="container mt-4">
        <button id="flip" class="btn btn-primary mb-3"><b>[+]</b></button>
        <div id="addPanel" style="display:none;">
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="id_provinsi" class="form-number">Nomor Index (dari 001 ya)</label>
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
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary cancel" id="addCancel">Batal</button>
                
            </form>
        </div>
        <div id="formEdit" style="display:none;">
            <form action="index.php?aksi=edit" method="post">
                <div class="mb-3">
                    <label for="edit_id_provinsi" class="form-number">Nomor</label>
                    <input type="number" class="form-control" id="edit_id_provinsi" name="id_provinsi" readonly>
                </div>
                <div class="mb-3">
                    <label for="edit_nama_provinsi" class="form-label">Nama Provinsi</label>
                    <input type="text" class="form-control" id="edit_nama_provinsi" name="nama_provinsi" required>
                </div>
                <div class="mb-3">
                    <label for="edit_ibukota" class="form-label">Ibu Kota Provinsi</label>
                    <input type="text" class="form-control" id="edit_ibukota" name="ibukota" required>
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                <button type="button" class="btn btn-secondary cancel">Batal</button>
            </form>
        </div>
        <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Ibu Kota Provinsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $sql = "SELECT * FROM provinsi";
                $DataPengganti = sqlsrv_query($conn, $sql);
                while ($row = sqlsrv_fetch_array($DataPengganti, SQLSRV_FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($row['nama_provinsi']) ?></td>
                        <td><?= htmlspecialchars($row['ibukota']) ?></td>
                        <td>
                            <!-- data-* untuk mengakses data tertentu jik tombol di klik  -->
                            <button class="btn btn-secondary edit" data-id="<?= $row['id_provinsi'] ?>"
                                data-nama_provinsi="<?= htmlspecialchars($row['nama_provinsi']) ?>"
                                data-ibukota="<?= htmlspecialchars($row['ibukota']) ?>"><b>Edit</b></button>
                            <button class="btn btn-danger delete" data-id="<?= $row['id_provinsi'] ?>"><b>Hapus</b></button>
                        </td>
                    </tr>
                    <?php $i++;
                } ?>
            </tbody>
        </table>

    </div>
</body>

</html>