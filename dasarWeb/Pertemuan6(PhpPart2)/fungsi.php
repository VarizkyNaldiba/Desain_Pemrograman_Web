<?php

function perkenalan($nama, $salam="Assalamualikum") {
    echo $salam . ",";
    echo "Perkenalkan saya " . $nama . "<br/>";
    echo "Senang berkenalan denganmu <br/>";}

perkenalan("Hamdana","Hallo");
echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat Pagi";

perkenalan($saya );

function hitungUmur($thnLahir, $thnHariIni) {
    $umur = $thnHariIni - $thnLahir;
    return $umur;
}
echo "<br>";
perkenalan("Hamdana","Hallo");
echo "Umur saya adalah ".hitungUmur(2003, 2024)." tahun";

?>
