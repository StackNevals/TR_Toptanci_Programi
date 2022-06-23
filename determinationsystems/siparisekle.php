<!-- INSERT INTO `urunler` (`id`, `name`, `miktar`) VALUES ('2', 'annen', '31'); -->
<?php
session_start();
if(!$_SESSION["username"]) {
    header("Location: ../index.php");
} else {

include ("../system/connection.php");
$adsoyad = $_GET["isim"];
$email = $_GET["email"];
$telefon = $_GET["telefon"];
$yedektelefon = $_GET["telefon2"];
$sehir = $_GET["sehir"];
$ilce = $_GET["ilce"];
$adres = $_GET["adres"];
// 
// 
$tedarikci = $_GET["tedarik"];
$urunisim = $_GET["product"];
$urunfiyat = $_GET["urunfiyat"];
$urunrenk = $_GET["urunRenk_select"];
$urunmalzeme = $_GET["urunMalzeme1_select"];
$urunmalzemeiki = $_GET["urunMalzeme2_select"];
$kapora = $_GET["kapora"];
// 
// 
$siparisnotu = $_GET["comment"];
$tedarikcinotu = $_GET["tedarikcomment"];
// mysqli_query($conn, $sql);

// echo count($tedarikci);
    $depocuurunler = mysqli_query($conn, "SELECT * FROM urunler WHERE `urunisim`='$urunisim'");
    $insertdepocu = mysqli_fetch_array($depocuurunler);
    $urunmalzemedepocu = $insertdepocu['urunmalzeme'];  
    $depocuexplode= explode(", ", $urunmalzemedepocu);
    $falses = array();
    for ($i=0; $i < count($depocuexplode); $i++) { 
        $falses[$i] = "False";       
    }
    $fal = implode(", ", $falses);
    
$adsoyad = mb_strtoupper($adsoyad, "utf8");
for ($i=0; $i <count($tedarikci) ; $i++) { 
    
    $sifirtedarikci = $tedarikci[$i];
    $sifirurunisim = $urunisim[$i];
    $sifirurunfiyat = $urunfiyat[$i];
    $sifirurunrenk = $urunrenk[$i];
    $sifirurunmalzeme = $urunmalzeme[$i];
    $sifirurunmalzemeiki = $urunmalzemeiki[$i];
    $depocuurunler = mysqli_query($conn, "SELECT * FROM urunler WHERE `urunisim`='$sifirurunisim'");
    $insertdepocu = mysqli_fetch_array($depocuurunler);
    $urunmalzemedepocu = $insertdepocu['urunmalzeme'];  
    $depocuexplode= explode(", ", $urunmalzemedepocu);
    $falses = array();
    for ($i=0; $i < count($depocuexplode); $i++) { 
        $falses[$i] = "False";       
    }
    $fal = implode(", ", $falses);
    $sql = "INSERT INTO `siparisler` (`adsoyad`,`email`,`telefon`,`yedektelefon`,`sehir`,`ilce`,`adres`,`tedarikci`,`urunisim`,`urunfiyat`,`urunrenk`,`urunmalzeme1`,`urunmalzeme2`,`kapora`,`siparisnotu`,`tedarikcinotu`,`malzemedurumu`) VALUES ('$adsoyad','$email','$telefon','$yedektelefon','$sehir','$ilce','$adres','$sifirtedarikci','$sifirurunisim','$sifirurunfiyat','$sifirurunrenk','$sifirurunmalzeme','$sifirurunmalzemeiki','$kapora','$siparisnotu','$tedarikcinotu','$fal')";
    $basarili = mysqli_query($conn,$sql);
    $toplamurunfiyat = $toplamurunfiyat + $sifirurunfiyat;
}


    $kontrol = "SELECT * FROM `musteriler` WHERE `isim`='$adsoyad'";

    $sayibakma = mysqli_query($conn,$kontrol);
    $result = $sayibakma->fetch_array();
    $number = mysqli_num_rows($sayibakma);
    if($number <1) {
        $sqle = "INSERT INTO `musteriler` (`isim`,`toplamurunfiyati`,`kapora`) VALUES ('$adsoyad','$toplamurunfiyat','$kapora')";
       mysqli_query($conn,$sqle);
    }
    if($number == 1) {
        $degistirveritabani = mysqli_query($conn,"SELECT * FROM `musteriler` WHERE `isim`='$adsoyad'");
        $degistirveri = mysqli_fetch_array($degistirveritabani);
        $yenifiyat = $degistirveri["toplamurunfiyati"] + $toplamurunfiyat;
        $yenikapora = $degistirveri["kapora"] + $kapora;
        date_default_timezone_set('Europe/Istanbul');
        $bugun= date("Y.m.d");
        $updatesql = "UPDATE `musteriler` SET `tarih` = '$bugun' WHERE `isim` = '$adsoyad'";
        $updatesql1 = "UPDATE `musteriler` SET `toplamurunfiyati` = '$yenifiyat' WHERE `isim` = '$adsoyad'";
        $updatesql2 = "UPDATE `musteriler` SET `kapora` = '$yenikapora' WHERE `isim` = '$adsoyad'";
        // echo $updatesql."<br>".$updatesql1."<br>".$updatesql2."<br>".$degistirveri["toplamurunfiyati"]."<br>".$degistirveri["kapora"]."<br>".$yenifiyat."<br>".$yenikapora."<br>";
         mysqli_query($conn,$updatesql);
         mysqli_query($conn,$updatesql1);
         mysqli_query($conn,$updatesql2);
    }



    header("Location: ../index.php");

// print_r($tedarikci);
// echo "<br>";
// print_r($urunisim);
// echo "<br>";
// print_r($urunfiyat);
// echo "<br>";
// print_r($urunrenk);
// echo "<br>";
// print_r($urunmalzeme);
// echo "<br>";
// print_r($urunmalzemeiki);
// echo "<br>";
// print_r($kapora);
// echo "<br>";
}
?>