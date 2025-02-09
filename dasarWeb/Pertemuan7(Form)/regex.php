<?php
$pattern = '/[a-z]/';
$text= 'this is a Simple Text';
if (preg_match($pattern,$text,$matches)) {
    echo "Huruf kecil ditemukan!";
  } else {
    echo "tidak ada huruf kecil !"  ;
  }

echo "<br>";
$pattern = '/[0-9]+/';
$text= 'there are 123 apples';
if (preg_match($pattern,$text,$matches)) {
    echo "cocokkan : <b>" . $matches[0] . "</b>";
  } else {
    echo "tidak ada yang cocok ! " ;
    
  }
  echo "<br>";
  $pattern = '/apple/';
  $replacement = 'banana';
  $text = 'I like apple pie';
  $new_text = preg_replace($pattern, $replacement, $text);
  echo "<p>Hasil penggantian: <b>$new_text</b></p>";

  $pattern = '/go*d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok";
}

$pattern = '/go0d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok" . "<br>";
}

$pattern = '/go{n,m}d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok";
}

?> 