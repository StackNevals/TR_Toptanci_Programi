<h1>Son 30 gunde toplam satis istsatistikleri</h1>

<?php
include("../system/connection.php"); 

$onemonthago = date("Y-m-d", strtotime("-1 months"));

$today = date("Y-m-d");


$sql = "SELECT * FROM siparisler WHERE tarih BETWEEN '$onemonthago' AND '$today'";
$result = mysqli_query($conn, $sql);
$sqlmusteriler = "SELECT * FROM musteriler";
$resultmusteriler = mysqli_query($conn, $sqlmusteriler);



while($row = mysqli_fetch_assoc($result)) {
    $i = $i+1;
}

$musterisayisi=1;
while ($rowmusteriler = mysqli_fetch_assoc($resultmusteriler)) {
    $musterisayisi = $musterisayisi+1;
    $fiyat = $rowmusteriler["toplamurunfiyati"] - $rowmusteriler["kapora"];
    $toplamfiyat = $toplamfiyat + $fiyat;
}
echo "<h1>Toplam Satis:" . $i . "</h1>";
echo "<h1>Toplam Kar: ". $toplamfiyat ." </h1>";
echo "<h1>Toplam Musteri Sayisi: ". $musterisayisi ." </h1>";
?>


<!-- 
 -->