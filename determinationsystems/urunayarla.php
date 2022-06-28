<?php

include("../system/connection.php");

$urunid = $_GET["urunid"];

$urunmalzeme = $_GET["urunmalzeme"];
$urunrenk = $_GET["urunrenk"];
$urunsayi = $_GET["urunsayisi"];

$gerekensayi = $_POST["gerekensayi"];
$malzemeler = $_POST["malzemeler"];
if(isset($urunmalzeme)) {

$urunmalzemesql = "UPDATE `urunler` SET `urunmalzeme` = '$urunmalzeme' WHERE `urunid` = '$urunid'";

mysqli_query($conn,$urunmalzemesql);

} else if (isset($urunrenk)) {

    $urunrenksql = "UPDATE `urunler` SET `urunrenk` = '$urunrenk' WHERE `urunid` = '$urunid'";

mysqli_query($conn,$urunrenksql);

} else if (isset($gerekensayi)){
    $urunlericeksql = "SELECT * FROM `urunler` WHERE `urunid` = '$urunid'";
    $urunlericek = mysqli_query($conn,$urunlericeksql);
    $urunlericekrow = mysqli_fetch_array($urunlericek);
    $explodeurunlericekrow = explode(",", $urunlericekrow["urunmalzeme"]);
    print_r($explodeurunlericekrow);
    for ($i=0; $i < count($explodeurunlericekrow) ; $i++) { 
        if($explodeurunlericekrow[$i] == $malzemeler){
            $sqlihtiyaccek = "SELECT * FROM `urunler` WHERE `urunid` = '$urunid'";
            $ihtiyacsql = mysqli_query($conn,$sqlihtiyaccek);
            $ihtiyacrow = mysqli_fetch_array($ihtiyacsql);
            $explodeihtiyacrow = explode(",", $ihtiyacrow["urunihtiyac"]);
            $explodeihtiyacrow[$i] = $gerekensayi;
            print_r($explodeihtiyacrow);
            echo "test <br>";
            $implodeihtiyacrow = implode(",", $explodeihtiyacrow);
            print_r($implodeihtiyacrow);
            $sqlayarlasql = "UPDATE `urunler` SET `urunihtiyac` = '$implodeihtiyacrow' WHERE `urunid` = '$urunid'";
            echo $sqlayarlasql;
            mysqli_query($conn,$sqlayarlasql);
        }}
} else if (isset($urunsayi)) {
    $urunlericeksql = "UPDATE `urunler` SET `urunEnvanter` = `$urunsayi`  WHERE `urunid` = '$urunid'";
    $urunlericek = mysqli_query($conn,$urunlericeksql);
    $urunlericekrow = mysqli_fetch_array($urunlericek);
}
header("Location: ../pages/urun-listele.php");

?>