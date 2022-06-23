<?php
include '../system/connection.php';

function qrCode($s, $w = 250, $h = 250){
	$u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
	$url = sprintf($u, $w, $h, $s);
  	return $url;
}

$index = $_GET["index"];
$siparisid = $_GET["siparisid"];


$siparislersql = "SELECT `urunisim` FROM `siparisler` WHERE `id`='$siparisid'";
$siparislerveri = mysqli_query($conn, $siparislersql);
$siparislercekveri = mysqli_fetch_array($siparislerveri);
$urunisim = $siparislercekveri["urunisim"];
$theword = strval($siparisid).strval($index).strval($urunisim);


    $qr = qrCode($theword, 200, 200); // 200x200
?>
<img src="<?=$qr?>">