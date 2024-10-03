<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'nidn' => '123456789',
        'alamat' => 'Jl. Jendral Sudirman No. 10'
    ];

    echo "Nama : " . $Dosen['nama'] . "<br>";
    echo "Domisili : " . $Dosen['alamat'] . "<br>";
    echo "NIDN : " . $Dosen['nidn'] . "<br>";
    ?>
</body>
</html>