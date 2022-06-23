<?php
include("../system/connection.php");
$id = $_GET["id"];
$adsoyad = $_POST["adsoyad"];
$email = $_POST["email"];
$telefon = $_POST["telefon"];
$yedektelefon = $_POST["yedektelefon"];
$sehir = $_POST["sehir"];
$ilce = $_POST["ilce"];
$adres = $_POST["adres"];
$tedarikci = $_POST["tedarikci"];
$urunisim = $_POST["urunisim"];
$urunrenk = $_POST["urunrenk"];
$malzemeismi = $_POST["malzemeismi"];
$malzeme2 = $_POST["malzemeiki"];
$kapora = $_POST["kapora"];
$urunfiyat = $_POST["urunfiyat"];
$tarih = $_POST["tarih"];
$siparisnotu = $_POST["siparisnotu"];
$tedarikcinotu = $_POST["tedarikcinotu"];
// echo $id . "<br>" . $adsoyad . "<br>" . $email . "<br>" .  $telefon . "<br>" .  $yedektelefon . "<br>" . $sehir;
if($adsoyad) {
$sql = "UPDATE `siparisler` SET `adsoyad` = '$adsoyad' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($email) {
$sql = "UPDATE `siparisler` SET `email` = '$email' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($telefon) {
$sql = "UPDATE `siparisler` SET `telefon` = '$telefon' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($yedektelefon) {
$sql = "UPDATE `siparisler` SET `yedektelefon` = '$yedektelefon' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($sehir) {
$sql = "UPDATE `siparisler` SET `sehir` = '$sehir' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($ilce) {
$sql = "UPDATE `siparisler` SET `ilce` = '$ilce' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($adres){
$sql = "UPDATE `siparisler` SET `adres` = '$adres' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($tedarikci){
$sql = "UPDATE `siparisler` SET `tedarikci` = '$tedarikci' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($urunisim){
$sql = "UPDATE `siparisler` SET `urunisim` = '$urunisim' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($urunrenk){
$sql = "UPDATE `siparisler` SET `urunrenk` = '$urunrenk' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($malzemeismi){
$sql = "UPDATE `siparisler` SET `urunmalzeme1` = '$malzemeismi' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($malzeme2){
$sql = "UPDATE `siparisler` SET `urunmalzeme2` = '$malzeme2' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($kapora){
$sql = "UPDATE `siparisler` SET `kapora` = '$kapora' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($urunfiyat){
$sql = "UPDATE `siparisler` SET `urunfiyat` = '$urunfiyat' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($tarih){
$sql = "UPDATE `siparisler` SET `tarih` = '$tarih' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($siparisnotu){
$sql = "UPDATE `siparisler` SET `siparisnotu` = '$siparisnotu' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}
if($tedarikcinotu){
$sql = "UPDATE `siparisler` SET `tedarikcinotu` = '$tedarikcinotu' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$sql);
}


header("Location: ../pages/siparisdetay.php?siparisdetayid=".$id."&success=yes");
?>

<!-- 
    
isim soyisim->adsoyad
email->email
telefon->telefon
yedek telefon->yedektelefon
sehir->sehir
ilce->ilce
adres->adres
tedarikci->tedarikci
urun ismi->urunisim
urun renk ->urunrenk
malzeme1-> malzemeismi
malzeme2-> malzeme2
kapora->kapora
urunfiyat->urunfiyat
siparistarihi->tarih
siparisnotu->siparisnotu
tedarikcinotu->tedarikcinotu
 -->