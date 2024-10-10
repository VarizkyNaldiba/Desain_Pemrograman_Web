<?php
$umur ;
if(isset($umur) && $umur >= 18) {
    echo "Anda sudah Dewasa";
} else {
    echo "Anda belum Dewasa atau variabel 'umur' tidak ditemukan";
}
echo "<br>";
$data = array("nama" => "Andi", "umur" => 17);
if (isset($data["nama"])) {
    echo "Nama : " . $data["nama"];
} else {
    echo "Variabel 'nama' tidak ditemukan";
}
echo "<br>";
$nama = "";
if (empty($nama)) {
    echo "Nama tidak terdefenisi atau kosong";
} else {
    echo "Nama terdefenisis dan tidak kosong";
}


?>  