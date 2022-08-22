<?php
include '../system/connection.php';

function qrCode($s, $w = 250, $h = 250){
	$u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
	$url = sprintf($u, $w, $h, $s);
  	return $url;
}

$urunid = $_GET["urunid"];


$urunlersql = "SELECT * FROM `urunler` WHERE `urunid`='$urunid'";
$urunlerveri = mysqli_query($conn, $urunlersql);
$urunlercekveri = mysqli_fetch_array($urunlerveri);
$urunisim = $urunlercekveri["urunisim"];
$theword = strval($urunid).strval($urunisim);

    $qr = qrCode($theword, 200, 200); // 200x200
?>
<img src="<?=$qr?>">