<?php
include("../system/connection.php");
$ayarla = $_POST["ayarla"];
$malzemeidsi = $_GET["malzemeidsi"];
// echo $ayarla . $malzemeidsi;
$sql = "UPDATE `malzemeler` SET `envanter` = '$ayarla' WHERE `malzemeler`.`malzemeid` = '$malzemeidsi'";
mysqli_query($conn,$sql);
header("Location: ../pages/malzeme-ekle.php");













// $eylem = $_GET["eylem"];
// if($eylem == "ekle") {
    //     $sql = "SELECT `envanter` FROM `malzemeler` where `malzemeid`='$malzemeidsi'";
//     $sorgu = mysqli_query($conn,$sql);
//     $sonuc = mysqli_fetch_array($sorgu);
//     $veritabanindakisayi = $sonuc['envanter'];
//     $islemsonuc = $veritabanindakisayi+$malzemedeger;
//     echo $islemsonuc;
//     $ekleislemi = "UPDATE `malzemeler` SET `envanter` = '$islemsonuc' WHERE `malzemeler`.`malzemeid` = '$malzemeidsi'";
//     mysqli_query($conn,$ekleislemi);
//     header("Location: ../pages/malzeme-ekle.php");
// } else if($eylem == "azalt") {
//     $sql = "SELECT `envanter` FROM `malzemeler` where `malzemeid`='$malzemeidsi'";
//     $sorgu = mysqli_query($conn,$sql);
//     $sonuc = mysqli_fetch_array($sorgu);
//     $veritabanindakisayi = $sonuc['envanter'];
//     $islemsonuc = $veritabanindakisayi-$malzemedeger;
//     echo $islemsonuc;
//     $cikarislemi = "UPDATE `malzemeler` SET `envanter` = '$islemsonuc' WHERE `malzemeler`.`malzemeid` = '$malzemeidsi'";
//     mysqli_query($conn,$cikarislemi);
//     header("Location: ../pages/malzeme-ekle.php");
// }
// else if($eylem == "ayarla"){
// $sql = "UPDATE `malzemeler` SET `envanter` = '$malzemedeger' WHERE `malzemeler`.`malzemeid` = '$malzemeidsi'";
// mysqli_query($conn,$sql);
// header("Location: ../pages/malzeme-ekle.php");
// } else {
//     die("ERROR");
// }

?>
