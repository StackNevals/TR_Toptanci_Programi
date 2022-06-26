<h1>Son 30 gunde toplam satis istsatistikleri</h1>

<?php
include("../system/connection.php"); 

$onemonthago = date("Y-m-d", strtotime("-1 months"));
$today = date("Y-m-d");


$sql = "SELECT * FROM siparisler WHERE tarih BETWEEN '$onemonthago' AND '$today'";
$result = mysqli_query($conn, $sql);
$sqlmusteriler = "SELECT * FROM musteriler";
$resultmusteriler = mysqli_query($conn, $sqlmusteriler);
$rowmusteriler = mysqli_fetch_assoc($resultmusteriler);

while ($row = mysqli_fetch_assoc($result)) {
    $i = 0;
    $toplamsayi = $toplamsayi + 1;
    $fiyat = $rowmusteriler["toplamurunfiyati"] - $rowmusteriler["kapora"];
    echo $fiyat;
    $toplamfiyat = $toplamfiyat + $fiyat;
    $i = $i + 1;
}
echo "<h1>Toplam Satis:" . $toplamsayi . "</h1>";
echo "<h1>Toplam Kar: ". $toplamfiyat ." </h1>"
?>