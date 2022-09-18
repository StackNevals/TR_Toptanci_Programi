<?php
include("../system/connection.php");
$siparisid = $_GET["siparisid"];

$sql = "SELECT * FROM siparisler WHERE id='$siparisid'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$musteriismi = $row["adsoyad"];
$tarihi = $row["tarih"];
$kontroletsql = "SELECT * FROM siparisler WHERE adsoyad='$musteriismi' AND tarih='$tarihi'";
$kontroletresult = $conn->query($kontroletsql);
while($kontroletrow = mysqli_fetch_array($kontroletresult)) {
    $urunismi = $kontroletrow['urunisim'];
    $envanterdusmesql = "SELECT * FROM `urunler` WHERE `urunisim`='$urunismi'";
    $resultenvanterdusme = $conn->query($envanterdusmesql);
    echo $urunismi . "<br>";
    while($envanterdusmerow = mysqli_fetch_array($resultenvanterdusme)) {
        $sayi = $envanterdusmerow["urunEnvanter"];
        $aydi = $envanterdusmerow['urunid'];
        $sayi = intval($sayi)- 1;
        $tamamdustu="UPDATE `urunler` SET `urunEnvanter` = '$sayi' WHERE `urunid`='$aydi'";
        $oldubube = $conn->query($tamamdustu);
        echo $sayi.$aydi;
    }
}
header("Location: ../index.php");
?>

<!-- UPDATE `urunler` SET `urunEnvanter` = '12399' WHERE `urunler`.`urunid` = 194; -->