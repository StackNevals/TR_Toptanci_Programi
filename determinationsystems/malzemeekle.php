<?php
include("../system/connection.php");
$malzemeismi = $_GET["malzemeismi"];
$malzemeismi = $_GET["malzemeismi"];

$sql = "INSERT INTO malzemeler (`malzemeisim`) VALUES ('$malzemeismi')";
mysqli_query($conn,$sql);

header("Location: ../pages/malzeme-ekle.php");
?>


<!-- 
<link rel="stylesheet" href="style.css">
<form action="../determinationsystems/malzemeekle.php" method="GET">
<input type="text" name="malzemeismi" placeholder="malzemeismi">
<button type="submit">GONDER</button>
</form>
 -->