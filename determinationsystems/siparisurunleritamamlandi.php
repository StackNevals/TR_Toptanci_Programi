<?php
include '../system/connection.php';

$id = $_GET["siparisid"];
        $truefalseceksql = "SELECT * FROM `siparisler` WHERE `id`='$id'";
      $truefalsecekveri = mysqli_query($conn, $truefalseceksql);
      $inserttruefalseveri = mysqli_fetch_array($truefalsecekveri);
      $truefalseexplode= explode(", ", $inserttruefalseveri["malzemedurumu"]);
      if(in_array("False", $truefalseexplode, true)) {
        echo "false";
      } else {
        $durumdegistir = "UPDATE `siparisler` SET `urundurumu` = 'SEVKIYATTA' WHERE `siparisler`.`id` = '$id'";
mysqli_query($conn,$durumdegistir);
// durum sevkiyatta

$urunisim = $inserttruefalseveri["urunisim"];
$stokeksibir = "SELECT * FROM `urunler` WHERE `urunisim`='$urunisim'";
$stokeksibirveri = mysqli_query($conn,$stokeksibir);
$insertstokeksibir = mysqli_fetch_array($stokeksibirveri);
$urunmalzeme = $insertstokeksibir["urunmalzeme"];
$urunihtiyac = $insertstokeksibir["urunihtiyac"];
$urunmalzemeexplode = explode(", ", $urunmalzeme);
$urunihtiyacexplode = explode(",", $urunihtiyac);

for ($i=0; $i < count($urunmalzemeexplode); $i++) { 
$mevcutmalzeme = $urunmalzemeexplode[$i];
$malzemebul = "SELECT * FROM `malzemeler` WHERE `malzemeisim`='$mevcutmalzeme'";
$malzemeveri = mysqli_query($conn,$malzemebul);
$insertmalzeme = mysqli_fetch_array($malzemeveri);
$sayi = $insertmalzeme['envanter'];
$malzemeid = $insertmalzeme["malzemeid"];
// malzemeihtiyac cekme
echo $urunihtiyacexplode[$i];
$stoksayi = $sayi-$urunihtiyacexplode[$i];
$yenistok = "UPDATE `malzemeler` SET `envanter` = '$stoksayi' WHERE `malzemeler`.`malzemeid` = '$malzemeid'";
// stok -1
mysqli_query($conn,$yenistok);
// header("Location: ../pages/stoklar.php");

}

// while($malzemearray = mysqli_fetch_array($malzemeveri)){
    // echo $malzemeismi = $malzemearray["malzemeisim"];
    // $stoksayi = $malzemearray["envanter"];
    // $stoksayi = $stoksayi-1;
    // $malzemeveri = mysqli_query($conn,$stokeksibir);
}
// }
?>