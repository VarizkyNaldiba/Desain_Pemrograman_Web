<?php
// Data Tatib
$tataTertib = [
    ["Menggunakan handphone di kelas", "V"],
    ["Menggunakan handphone di perpustakaan", "V"],
    ["Membawa makanan dan minuman ke dalam kelas", "IV"],
    ["Salah menggunakan fasilitas laboratorium", "III"],
    ["Menggunakan fasilitas laboratorium tanpa izin", "II"],
    ["Tidak mengikuti kegiatan kampus", "III"],
    ["Mengganggu ketertiban kampus", "III"],
    ["Membuat keributan di kampus", "I"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Tertib Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center rounded-5">Tata Tertib Mahasiswa</h1>
        <div class="row align-items-start">
            <!-- Tabel Tata Tertib -->
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Pelanggaran</th>
                    <th scope="col">Tingkat Pelanggaran</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tataTertib as $index => $item): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $item[0] ?></td>
                        <td><?= $item[1] ?></td>
                        <td><button class="btn btn-danger" onclick="konfirmasiHapus()">Hapus</button></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Form Tambah Tata Tertib -->
        <h2 id="tambah" class="rounded-5">Tambah Tata Tertib Baru</h2>
        <form action="tambah.php" method="POST" class="mb-5">
            <div class="mb-3">
                <label for="jenisPelanggaran" class="form-label" style="color: white;">Jenis Pelanggaran</label>
                <input type="text" class="form-control" id="jenisPelanggaran" name="jenisPelanggaran" required>
            </div>
            <div class="mb-3">
                <label for="tingkatPelanggaran" class="form-label" style="color: white;">Tingkat Pelanggaran</label>
                <select class="form-control" id="tingkatPelanggaran" name="tingkatPelanggaran" required>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option> 
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGFjqzO/Ej8i0/lbV0hEs+3BUI6FGTcfTUEiPIJS+jcz" crossorigin="anonymous"></script>
    <script src="konfirmasi.js"></script>
</body>
</html>
