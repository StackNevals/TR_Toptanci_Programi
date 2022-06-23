<?php
include '../vendor/autoload.php';
include '../system/connection.php';
$siparisdetayid = $_GET['siparisid'];
$index = $_GET['index'];
if ($_FILES["fayl"]) {
    
    
    $yol = "./dosyalar"; 
    
    $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["fayl"]["name"];
    $sonuc = move_uploaded_file($_FILES["fayl"]["tmp_name"], $yuklemeYeri);
    
    $qrcode = new \Zxing\QrReader('./dosyalar/'.$_FILES["fayl"]["name"]);  //图片路径
    $text = $qrcode->text(); 
    // if($text == $siparisdetayid+)
    $truefalseceksql = "SELECT `malzemedurumu` FROM `siparisler` WHERE `id`='$siparisdetayid'";
    $truefalsecekveri = mysqli_query($conn, $truefalseceksql);
    $inserttruefalseveri = mysqli_fetch_array($truefalsecekveri);
    
    $siparislersql = "SELECT `urunisim` FROM `siparisler` WHERE `id`='$siparisdetayid'";
    $siparislerveri = mysqli_query($conn, $siparislersql);
    $siparislercekveri = mysqli_fetch_array($siparislerveri);
    $urunisim = $siparislercekveri["urunisim"];
    $theword = strval($siparisdetayid).strval($index).strval($urunisim);
    if($text == $theword) {
      $truefalseexplode= explode(", ", $inserttruefalseveri["malzemedurumu"]);
      $truefalseexplode[$index] = "True";
      echo $truefalseexplode[$index];
      echo "<br>";
      $truefalseexplode= implode(", ", $truefalseexplode);
      print_r($truefalseexplode);
      $sqlsonquery = "UPDATE `siparisler` SET `malzemedurumu` = '$truefalseexplode' WHERE `siparisler`.`id` = '$siparisdetayid'";
      mysqli_query($conn,$sqlsonquery);
      header("Location: ../pages/siparisdetay.php?siparisdetayid=".$siparisdetayid);
    }
  } 
  else {
  
    echo "Lütfen bir dosya seçin";
  
  }

?>





<!-- 
    use PHPZxing\PHPZxingDecoder;

$decoder        = new PHPZxingDecoder();
$data           = $decoder->decode('../images/Code128Barcode.jpg');
if($data->isFound()) {
    $data->getImageValue();
    $data->getFormat();
    $data->getType();        
}
 -->