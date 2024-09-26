<?php 
    function perkenalan($nama , $salam){
        echo $salam.",";
        echo "Perkenalkan, nama saya ".$nama." <br>";
        echo "Senang berenalan dengan anda <br>";  
    }
    perkenalan("Dharui", "Selamat Pagi");

    echo "<hr>";

    $saya = "Adit";
    $ucapanSalam = "Selamat Pagi";

    perkenalan($saya, $ucapanSalam);

    function hitungUmur($thnLahir, $thnHariIni) {
        $umur = $thnHariIni - $thnLahir;
        return $umur;
    }
    echo "<br>";
    echo "Umur saya adalah ".hitungUmur(2003, 2024)." tahun";
?>