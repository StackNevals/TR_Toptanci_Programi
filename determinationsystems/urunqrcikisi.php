<?php
include "../system/connection.php";

$scannedtext = $_GET["sikennidtext"];
$scannedtext = explode(", ", $scannedtext);
echo "count: ". count($scannedtext) ."<br>";

for($i=1; $i<count($scannedtext); $i++){
    echo $i . " 8</br>";
    $sql = "SELECT * FROM `urunler` WHERE `urunisim` = '$scannedtext[$i]'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($scannedtext[$i] == $row["urunisim"]) {
        echo "<br>UYUSMA BULUNDU".$row["urunid"]."<br>";
        $yenistok = $row["urunEnvanter"] -1;
        $sql = "UPDATE `urunler` SET `urunEnvanter` = '$yenistok' WHERE `urunler`.`urunid` = '$row[urunid]'";
        mysqli_query($conn,$sql);
    }
    print_r($scannedtext);
    echo "<br> COunt:". count($row) ."<br>";
}
?>