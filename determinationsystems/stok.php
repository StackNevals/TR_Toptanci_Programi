<?php
include '../vendor/autoload.php';
include '../system/connection.php';
$malzemeid = $_GET["malzemeid"];

echo "test5<br>";
echo $_POST["qrdosya"];
echo "test8<br>";
print_r($_FILES["qrdosya"]);
echo "test10<br>";

if ($_FILES["qrdosya"]) {
    
    echo "test10";
    
    $yol = "./dosyalar"; 
    echo "test13";
    $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["qrdosya"]["name"];
    $sonuc = move_uploaded_file($_FILES["qrdosya"]["tmp_name"], $yuklemeYeri);
    echo "test16";
    
    $qrcode = new \Zxing\QrReader('./dosyalar/'.$_FILES["qrdosya"]["name"]);  //图片路径
    $text = $qrcode->text();
    echo "test20";

    $sql = "SELECT * FROM `malzemeler` WHERE `malzemeid`='$malzemeid'";
    $malzemeveri = mysqli_query($conn,$sql);
    $malzemearray = mysqli_fetch_array($malzemeveri);
    $malzemeismi = $malzemearray["malzemeisim"];
    echo "test26<br>".$text."<br>".$malzemeismi."<br>";
    
    if($text == $malzemeismi) {
        $stoksayi = $malzemearray["envanter"];
        $stoksayi = $stoksayi+1;
        $yenistok = "UPDATE `malzemeler` SET `envanter` = '$stoksayi' WHERE `malzemeler`.`malzemeid` = 1";
        mysqli_query($conn,$yenistok);
        header("Location: ../pages/stoklar.php");
        echo "test33";
    }
    echo "test35";
}
echo "test37";
?>