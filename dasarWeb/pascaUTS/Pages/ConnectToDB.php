<?php

$servername = "DESKTOP-ONR2FF9\VARIZKY03";
$array = array(
  "database" => "DB_Provinsi",

);
// Create connection
$conn = sqlsrv_connect($servername, $array);

// Check connection
if ($conn) {
  // echo "[Database nyambung.]\n";
} else {
  echo "[Ga nyambung.]\n";
}

?>