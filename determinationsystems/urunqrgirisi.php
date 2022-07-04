<?php
include '../vendor/autoload.php';
include '../system/connection.php';
$fayl = $_FILES['fayl']["tmp_name"];
echo $fayl;
echo "<br>";
if ($_FILES["fayl"]) {
    echo "fayl";
    // $yol = "./dosyalar"; 
    
    // $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["fayl"]["name"];
    // $sonuc = move_uploaded_file($_FILES["fayl"]["tmp_name"], $yuklemeYeri);
    
    // $qrcode = new \Zxing\QrReader($_FILES["fayl"]["tmp_name"]);  //图片路径
    // $text = $qrcode->text();
    $yol = "./dosyalar"; 
    
    $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["fayl"]["name"];
    $sonuc = move_uploaded_file($_FILES["fayl"]["tmp_name"], $yuklemeYeri);
    
    $qrcode = new \Zxing\QrReader('./dosyalar/'.$_FILES["fayl"]["name"]);  //图片路径
    $text = $qrcode->text(); 
    echo $text ."<br>";
    echo "text";

    $sql = "SELECT * FROM `urunler`";
    $veri = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($veri)) {
        $deger = strval($row["urunid"]) . strval($row["urunisim"]);
        if($text == $deger){
            $updatesql = "UPDATE `urunler` SET `urunEnvanter` = `urunEnvanter` + 1 WHERE `urunler`.`urunid` = '$row[urunid]'";
            mysqli_query($conn,$updatesql);
        }
    }
    header("Location: ../pages/urungiris.php");
}