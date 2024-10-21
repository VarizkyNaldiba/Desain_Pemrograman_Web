<?php
session_start();

// Inisialisasi tata tertib jika belum ada di session
if (!isset($_SESSION['tataTertib'])) {
    $_SESSiON['tataTertib'] = [
        ["Menggunakan handphone di kelas", "V"],
        ["Menggunakan handphone di perpustakaan", "V"],
        ["Membawa makanan dan minuman ke dalam kelas", "IV"],
        ["Salah menggunakan fasilitas laboratorium", "III"],
        ["Menggunakan fasilitas laboratorium tanpa izin", "II"],
        ["Tidak mengikuti kegiatan kampus", "III"],
        ["Mengganggu ketertiban kampus", "III"],
        ["Membuat keributan di kampus", "I"]
    ];
}

// Menangani penghapusan tata tertib
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($_SESSION['tataTertib'][$index]);
    $_SESSION['tataTertib'] = array_values($_SESSION['tataTertib']); // Reset index
    header("Location: index.php");
    exit();
}

// Menangani penambahan tata tertib baru
if (isset($_POST['new_rule']) && isset($_POST['new_level'])) {
    $new_rule = $_POST['new_rule'];
    $new_level = $_POST['new_level'];
    $_SESSION['tataTertib'][] = [$new_rule, $new_level];
    header("Location: index.php");
    exit();
}

// Mengatur cookies pengguna jika belum ada
if (!isset($_COOKIE['user'])) {
    setcookie("user", "Pengguna", time() + (86400 * 30), "/");
} else {
    $user = $_COOKIE['user'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Tertib Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="konfirmasi.js"></script>
</head>
<body>
    <div class="form-container">
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
                        <a href="index.php?delete=<?= $index ?>" class="btn btn-danger" onclick="return konfirmasiHapus();">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form tambah tata tertib -->
        <form action="index.php" method="POST" class="mt-4">
            <div class="form-group mb-3">
                <label for="new_rule"><b>Jenis Pelanggaran:</b></label>
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
