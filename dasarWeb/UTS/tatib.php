<?php
session_start();

// Inisialisasi tata tertib
if (!isset($_SESSION['tataTertib']) || !is_array($_SESSION['tataTertib'])) {
    $_SESSION['tataTertib'] = [
        ["Menggunakan handphone di kelas", "V"],
        ["Berbicara pada saaat pembelajaran berlangsung", "V"],
        ["Menggunakan handphone di perpustakaan", "V"],
        ["Membawa makanan dan minuman ke dalam kelas", "IV"],
        ["Menyalahgunakan fasilitas kampus", "III"],
        ["Menggunakan fasilitas laboratorium tanpa izin", "II"],
        ["Merusak fasilitas kampus", "III"],
        ["Mengganggu kegiatan kampus ", "III"],
        ["Membuat keributan di kampus", "I"]
    ];
}

// hapus tatib
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['tataTertib'][$index])) {
        unset($_SESSION['tataTertib'][$index]);
        $_SESSION['tataTertib'] = array_values($_SESSION['tataTertib']); // Reset indeks array
    }
}

// tambah tatib
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_rule = $_POST['new_rule'];
    $new_level = $_POST['new_level'];
    $_SESSION['tataTertib'][] = [$new_rule, $new_level];
    echo "<script>alert('Tata tertib berhasil ditambahkan: $new_rule'); window.location.href = 'tatib.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Tertib Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function konfirmasiHapus() {
            return confirm("Apakah Anda yakin ingin menghapus tata tertib ini?");
        }
    </script>

</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Tata Tertib Mahasiswa</h1>

        <!-- Tabel tata tertib -->
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Pelanggaran</th>
                    <th scope="col">Tingkat Pelanggaran</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['tataTertib'] as $index => $item): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $item[0] ?></td>
                    <td><?= $item[1] ?></td>
                    <td>
                        <a href="tatib.php?delete=<?= $index ?>" class="btn btn-danger" onclick="return konfirmasiHapus();">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form tambah tata tertib -->
        <form action="tatib.php" method="POST" class="mt-4">
            <div class="form-group mb-3">
                <label for="new_rule">Jenis Pelanggaran:</label>
                <input type="text" name="new_rule" id="new_rule" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="new_level">Tingkat Pelanggaran:</label>
                <select name="new_level" id="new_level" class="form-control" required>
                    <option value="">Pilih Tingkat Pelanggaran</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Tata Tertib</button>
        </form>
    </div>
</body>
</html>

