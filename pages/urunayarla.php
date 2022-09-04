<h1>X Urunu Bir Satista</h1>

<ul>
              <?php

include ("../system/connection.php");
$id = $_GET["id"];

$database = mysqli_query($conn, "SELECT * FROM urunler WHERE urunid='$id'");

while ($insert = mysqli_fetch_array($database))

{

  $urunmalzeme = $insert["urunmalzeme"];
  $urunihtiyac = $insert["urunihtiyac"];
  $explodeurunmalzeme = explode(",", $urunmalzeme);
  $explodeurunihtiyac = explode(",", $urunihtiyac);
  for ($i=0; $i < count($explodeurunmalzeme) ; $i++) { 
    echo "<li>".$explodeurunmalzeme[$i]." icin gereken malzeme sayisi: ".$explodeurunihtiyac[$i]."</li>";
  }



?>
</ul>
<h1>Malzeme Harcayacak</h1>
<!-- Sadece Admin -->
<h1>Degistir:</h1>
<form action="../determinationsystems/urunayarla.php?urunid=<?php echo $insert["urunid"]?>" method='POST'>
<label for="malzemelerid">Bir Malzeme Sec:</label>
<select name="malzemeler" id="malzemelerid">
<?php 
for ($i=0; $i < count($explodeurunmalzeme) ; $i++) { 
  echo "<option value='".$explodeurunmalzeme[$i]."'> ".$explodeurunmalzeme[$i]."</option>";
}
?>
</select>
<input type='text' name='gerekensayi' placeholder='Sayi seciniz'>
<button type="submit">Gonder</button>
</form>
<?php
}



function qrCode($s, $w = 250, $h = 250){
  $u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
  $url = sprintf($u, $w, $h, $s);
    return $url;
}

$urunid = $_GET["id"];


$urunlersql = "SELECT * FROM `urunler` WHERE `urunid`='$urunid'";
$urunlerveri = mysqli_query($conn, $urunlersql);
$urunlercekveri = mysqli_fetch_array($urunlerveri);
$urunisim = $urunlercekveri["urunisim"];
$theword = strval($urunid).strval($urunisim);

  $qr = qrCode($theword, 200, 200); // 200x200
echo '<img src="'.$qr.'">';



?>