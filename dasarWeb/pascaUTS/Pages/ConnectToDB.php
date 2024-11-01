<?php

$servername = "DESKTOP-ONR2FF9\VARIZKY03";
$array = array(
  "database" => "DB_Provinsi",

);
// Create connection
$conn = sqlsrv_connect($servername, $array);

// Check connection
if ($conn) {
  echo "Connection established.\n";
} else {
  echo "Connection could not be established.\n";
}

?>