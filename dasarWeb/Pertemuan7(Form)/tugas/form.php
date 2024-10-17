
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua input nama yang dikirim
    $indeks = count($_POST) / 3; 
    
    echo "<h2>Data yang Dikirim</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nama</th><th>Alamat</th><th>Asal Daerah</th></tr>";
    for ($i = 1; $i <= $indeks; $i++) {
        if (isset($_POST["nama_$i"]) && isset($_POST["alamat_$i"]) && isset($_POST["asal_$i"])) {
            $nama = ($_POST["nama_$i"]);
            $alamat = ($_POST["alamat_$i"]);
            $asal = ($_POST["asal_$i"]);
            echo "<tr><td>$nama</td><td>$alamat</td><td>$asal</td></tr>";
        }
    }
    echo "</table>";
}
?>

