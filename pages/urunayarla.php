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






?>

<!-- 
// var a = b
// var A = b
// ? bu ne amk
// * bu sayfada error var
-->