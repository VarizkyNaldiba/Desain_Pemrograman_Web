<link rel="stylesheet" href="formphp.css">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua input nama yang dikirim
    $indeks = count($_POST); // Jumlah nama user yang diisi
    
    echo "<h2>Data yang Dikirim</h2>";
    for ($i = 1; $i <= $indeks; $i++) {
        if (isset($_POST["nama_$i"])) {
            $nama = $_POST["nama_$i"];
            echo "<p>Nama User $i: " . htmlspecialchars($nama) . "</p>";
        }
    }
}
?>

