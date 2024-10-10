<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="pt.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("fast");
       
            });
        });
        </script>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <div id="flip"> click database</div>
    <div id="panel">

        <table>
            <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Kelas</th>
            <th>Alamat</th>

        </tr>
        <?php
    
        $absen = array(
            array("Josh", "20", "TI 2F","Batu"),
            array("Variz", "21", "TI 2F","Papua"),
            array("Rafi", "23", "TI 2F","Padang"),
            array("Agil", "24", "TI 2F","Malang"),

        );
        foreach ($absen as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value[0] . "</td>";
            echo "<td>" . $value[1] . "</td>";
            echo "<td>" . $value[2] . "</td>";
            echo "<td>" . $value[3] . "</td>";
            echo "</tr>";
        }   
        echo "</tr>";        
        ?>
    </table>
    <?php 
    $usia = 0;
    foreach ($absen as $key => $value) {
        $usia += $value[1];
    }
    $avg_usia = $usia / count($absen);
    echo "<h1> Nilai rata-rata usia :  " . ($avg_usia) . "</h1>  ";
    ?>
</div>

</body>
</html>

