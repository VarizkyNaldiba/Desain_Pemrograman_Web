<?php 
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$pangkat= $a ** $b;

echo "Hasil Tambah : $hasilTambah <br>";
echo "Hasil Kurang : $hasilKurang <br>";
echo "Hasil Kali : $hasilKali <br>";
echo "Hasil Bagi : $hasilBagi <br>";
echo "Hasil Pangkat : $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;


echo "<br>";
echo "Hasil Perbandingan $a dan $b Sama :" . ($hasilSama ? 'True' : 'False') . "<br>";
echo "Hasil Perbandingan $a dan $b Tidak Sama :" .($hasilTidakSama ? 'True' : 'False') . "<br>";
echo "Hasil Perbandingan $a dan $b Lebih Kecil :" . ($hasilLebihKecil ? 'True' : 'False') . "<br>";
echo "Hasil Perbandingan $a dan $b Lebih Besar : " .($hasilLebihBesar ? 'True' : 'False') . "<br>";
echo "Hasil Perbandingan $a dan $b Lebih Kecil Sama :" . ($hasilLebihKecilSama ? 'True' : 'False') . "<br>";
echo "Hasil Perbandingan $a dan $b Lebih Besar Sama :" .($hasilLebihBesarSama ? 'True' : 'False') . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<br>";   
echo "Hasil Operasi AND : " . ($hasilAnd ? 'True' : 'False') . "<br>";
echo "Hasil Operasi OR : " . ($hasilOr ? 'True' : 'False') . "<br>";
echo "Hasil Operasi NOT A : " . ($hasilNotA ? 'True' : 'False') . "<br>";
echo "Hasil Operasi NOT B : " . ($hasilNotB ? 'True' : 'False') . "<br>";

// $a += $b ;
// $a -= $b ;
// $a *= $b ;
// $a /= $b ;
// $a %= $b ;

echo "<br>";
echo "Hasil A += B : " . ($a += $b) . "<br>";
echo "Hasil A -= B : " . ($a -= $b) . "<br>";
echo "Hasil A *= B : " . ($a *= $b) . "<br>";
echo "Hasil A /= B : " . ($a /= $b) . "<br>";
echo "Hasil A %= B : " . ($a %= $b) . "<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "<br>";
echo "Hasil A === B : " . ($hasilIdentik ? 'True' : 'False') . "<br>";
echo "Hasil A !== B : " . ($hasilTidakIdentik ? 'True' : 'False') . "<br>";

// soal
$kursi = 45;
$adaOrang = 18;
$presentase = (45 - 18) / 45 * 100;

echo "<br>";
echo "Kursi yang tersedia : $kursi <br>";
echo "Orang yang ada : $adaOrang <br>";
echo "Presentase Kursi yang tersedia : $presentase% <br>";
?>

