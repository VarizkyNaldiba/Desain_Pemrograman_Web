<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];

$nilaiLulus = [];

foreach ($nilaiSiswa as $value) {
    if ($value >= 70) {
        $nilaiLulus[] = $value;
    }
    echo "Daftar nilai siswa yang lulus : " . implode(", ", $nilaiLulus) . "<br>";
}

echo "<br>";
echo "<br>";

$daftarKaryawan = [
    ['Alice,7'],
    ['Bob,8'],
    ['Charlie,9'],
    ['David,10'],
    ['Eve,11'],
];
$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[0] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}
echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun : " . implode(',', $karyawanPengalamanLimaTahun);
echo "<br>";

 echo "<br>";
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ]
];

$mataKuliah = 'Fisika';

echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah: <br>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
    echo "Nama :  {$nilai[0]} | Nilai : " . $nilai[1] . "<br>";
}
echo "<br>";
$MatExam = [
    ["Alice", 85],
    ["Bob", 92],
    ["Charlie", 78],
    ["David", 64],
    ["Eve", 90],
    ];

    echo " Nilai Ujian Mat, Hayooloo Panik dikit ga ngaruh <br>";
    foreach ($MatExam as $nilai) {
        echo "Nama :  {$nilai[0]} | Nilai : " . $nilai[1] . "<br>";
    }
?>