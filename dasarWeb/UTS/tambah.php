<?php
// Proses penambahan tata tertib 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tataTertibBaru = $_POST['tataTertib'];
    // Proses simpan
    echo "<script>alert('Tata tertib berhasil ditambahkan: $tataTertibBaru'); window.location.href = 'index.php';</script>";
}
?>
