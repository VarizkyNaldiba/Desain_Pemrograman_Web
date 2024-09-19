<?php 
$nilaiNumerik = 92;
echo "Nilai Inputan = $nilaiNumerik <br>";
if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo"Nilai =  A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik <= 90) {
    echo "Nilai =  B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik <= 80) {
    echo "Nilai =  C";
} elseif ($nilaiNumerik >= 60 && $nilaiNumerik <= 70) {
    echo "Nilai =  D" ;
    
}

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "<br    >";
echo "Atlet tersebut membutuhkan = $hari hari untuk mencapai jarak 500 KM <br>";

$jumlahLahan = 10;
$tanamanPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {    
    $jumlahBuah += ($tanamanPerlahan * $buahPerTanaman);
}

echo "Jumlah buah yang diperlukan = $jumlahBuah buah <br>"; 

$skorUjian = [85, 92, 78, 9, 88] ;
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "<br> Total Skor = $totalSkor ";

$nilaiSiswa = [85,92,58,4, 90, 55, 88, 79, 70, 96];

echo "<br>";
echo "<br>";

foreach ($nilaiSiswa as $nilai) {
    if ($nilai <60 ) {
        echo "Nilai : $nilai (Tidak Lulus)<br>";
        continue;
    }
    echo "Nilai : $nilai (Lulus)<br>";
}

// Soal
echo "<br>";
echo "<br>";

$nilaiMTK = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$nilaiTerkecil = min($nilaiMTK);
$nilaiTerbesar = max($nilaiMTK);

$nilaiTotal = 0;

echo "Nilai MTK : ";
foreach ($nilaiMTK as $nilai) {
    echo "$nilai ";
}
echo "<br>";


foreach ($nilaiMTK as $nilai) {
    if ($nilai != $nilaiTerkecil && $nilai != $nilaiTerbesar) {
        $nilaiTotal += $nilai;
    }
}

echo "<br>";
echo "Nilai Terkecil : $nilaiTerkecil <br>";
echo "Nilai Terbesar : $nilaiTerbesar <br>";
echo "Nilai Total (Selain Nilai Terkecil dan Terbesar) : $nilaiTotal <br>"; 


?>

