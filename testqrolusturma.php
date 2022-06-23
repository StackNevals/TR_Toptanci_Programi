<?php
function qrCode($s, $w = 250, $h = 250){
	$u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
	$url = sprintf($u, $w, $h, $s);
  	return $url;
}
$qr = qrCode('allah', 200, 200); // 200x200
?>
<img src="<?=$qr?>">