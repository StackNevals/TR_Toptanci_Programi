<?php
session_start();

/**
* Class and Function List:
* Function list:
* Classes list:
*/
if(!$_SESSION["username"]){
    header("Location: ../index.php");
} else {

include ("../system/connection.php");
$islem     = $_POST["islem"];
$siparisid = $_GET["id"];
if ($islem == 0) {
    $islem     = "bekleniyor";
}
else if ($islem == 1) {
    $islem     = "yapim asamasinda";
}
else if ($islem == 2) {
    $islem     = "tamamlandi";
}
else if ($islem == 3) {
    $islem     = "Uretimden Teslim Alindi";
}
else if ($islem == 4) {
    $islem     = "Depoya Teslim Edildi";
}
else if ($islem == 5) {
    $islem     = "Sevkiyatta";
}
else if ($islem == 6) {
    $islem     = "Siparis Tamamlandi";
}
else if ($islem == 7) {
    $islem     = "Siparis Iptali";
}
$islem     = mb_strtoupper($islem, "utf8");
echo $islem . "<br>" . $siparisid;
// 0 bekleniyor
//  1 yapim asamasinda
// 2 tamamlandi
// 3 uretimden teslim aldi
// 4 depoya teslim edildi
//  5 sevkiyatta
//  6 siparis tamamlandi
//  7 siparis iptali


$sql = "UPDATE `siparisler` SET `urundurumu` = '$islem' WHERE `siparisler`.`id` = '$siparisid'";
mysqli_query($conn, $sql);
header("Location: ../index.php");
//
}
?>


<!-- 
<option value='0'>Bekleniyor</option>
        <option value='1'>Yapım aşamasında</option>
        <option value='2'>Tamamlandı</option>
        <option value='3'>üretimden teslim aldı</option>
        <option value='4'>depoya teslim edildi</option>
        <option value='5'>Sevkiyatta</option>
        <option value='6'>Sipariş tamamlandı</option>
        <option value='7'>Sipariş iptali</option>  -->
