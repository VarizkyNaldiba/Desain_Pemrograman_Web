<?php
session_start();

// Inisialisasi tata tertib
if (!isset($_SESSION['tataTertib']) || !is_array($_SESSION['tataTertib'])) {
    $_SESSION['tataTertib'] = [
        ["Menggunakan handphone di kelas", "V"],
        ["Berbicara pada saat pembelajaran berlangsung", "V"],
        ["Menggunakan handphone di perpustakaan", "V"],
        ["Membawa makanan dan minuman ke dalam kelas", "IV"],
        ["Menyalahgunakan fasilitas kampus", "III"],
        ["Menggunakan fasilitas laboratorium tanpa izin", "II"],
        ["Merusak fasilitas kampus", "III"],
        ["Mengganggu kegiatan kampus", "III"],
        ["Membuat keributan di kampus", "I"]
    ];
}

// hapus tatib
if (isset($_GET['hapus'])) {
    $index = (int) $_GET['hapus'];
    if (isset($_SESSION['tataTertib'][$index])) {
        unset($_SESSION['tataTertib'][$index]);
        $_SESSION['tataTertib'] = array_values($_SESSION['tataTertib']); // Reset indeks array
    }
}

// tambah tatib
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tatib_baru = trim($_POST['tatib_baru']);
    $tingkatan = trim($_POST['tingkatan']);
    if (!empty($tatib_baru) && !empty($tingkatan)) {
        $_SESSION['tataTertib'][] = [$tatib_baru, $tingkatan];
        header("Location: tatib.php");
        exit;
    }
}

// logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Tertib Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="apalah.css">
    <script>
        function konfirmasiHapus() {
            return confirm("Apakah Anda yakin ingin menghapus tata tertib ini?");
        }

        $(document).ready(function() {
            $("#logout").click(function() {
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    $.ajax({
                        url: "logout.php",
                        type: "POST",
                        success: function() {
                            window.location.href = "login.php";
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-center " id="logo" href="tatib.php" ><b>TATA TERTIB MAHASISWA</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tatib.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" id="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <!-- Tabel tata tertib -->
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Pelanggaran</th>
                    <th scope="col">Tingkat Pelanggaran</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['tataTertib'] as $index => $item): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= ($item[0]) ?></td>
                    <td><?= ($item[1]) ?></td>
                    <td>
                        <a href="tatib.php?hapus=<?= $index ?>" class="btn btn-danger" onclick="return konfirmasiHapus();">hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form tambah tata tertib -->
        <form action="tatib.php" method="POST" class="mt-4">
            <div class="form-group mb-3">
                <label id ="jenis" for="tatib_baru" >Jenis Pelanggaran:</label>
                <input type="text" name="tatib_baru" id="tatib_baru" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label id="tingkat" for="tingkatan">Tingkat Pelanggaran:</label>
                <select name="tingkatan" id="tingkatan" class="form-control" required>
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

