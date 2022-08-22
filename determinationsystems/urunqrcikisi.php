<?php
include "../system/connection.php";

$urunisimleri = $_POST["urunisimleri"];
$miktarlar = $_POST["miktarlar"];
end($miktarlar);
$key = key($miktarlar);
for($i=1; $i<=$key; $i++){
    if($urunisimleri == "") {
    }else {
    $sqlupdate = "UPDATE `urunler` SET `urunEnvanter` = `urunEnvanter` - '$miktarlar[$i]' WHERE `urunler`.`urunisim` = '$urunisimleri[$i]'";
    $result = mysqli_query($conn,$sqlupdate);
}}
header("Location: ../index.php");
?>