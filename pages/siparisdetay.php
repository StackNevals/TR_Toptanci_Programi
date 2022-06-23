<!DOCTYPE html>
<html lang="en">
<head>

<?php
session_start();
if(!$_SESSION["username"]){
  header("Location: ../index.php");
} else {
include ("../system/connection.php");
$id = $_GET["siparisdetayid"];
$database = mysqli_query($conn, "SELECT * FROM siparisler WHERE id=$id");
while ($insert = mysqli_fetch_array($database))
{
?>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $insert['id']; ?> Numarali Siparis Detayi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
 
<div class="container">
    <fieldset>
      <legend><?php echo $insert['id']; ?> Numarali Siparis Detayi</legend>
  
      <?php
      
      if($_GET["success"] == "yes") {
        echo "<div class='alert alert-success' role='alert' id='success_message'>Başarılı <i class='glyphicon glyphicon-thumbs-up'></i> Bilgiler Başarılı Bir Şekilde Kaydedildi</div>";
      }
      
      ?>
      <form action="../determinationsystems/siparisdetayekle.php?id=<?php echo $insert["id"];?>" method="POST">
      <?php
      if($_SESSION["authorization"] == 4 ) {
      echo '      <div   class="form-group">
        <label class="col-md-2 control-label">Isim Soyisim</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="adsoyad" placeholder=" ' . $insert["adsoyad"] .' " class="form-control" type="text"></input>
          </div>
        </div>
      </div>';
           echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Şehir</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <select class="form-control selectpicker" name="sehir">
              <option value="secilmedi">'.$insert["sehir"].'</option>
              <option value="edirne">Edirne</option>
              <option value="tekirdag">Tekirdağ</option>
              <option value="kiriklareli">Kırklareli</option>
              <option value="istanbul">İstanbul</option>
              <option value="kocaeli">Kocaeli</option>
              <option value="sakarya">Sakarya</option>
            </select>
          </div>
        </div>
      </div>';
echo '
      <div class="form-group">
        <label class="col-md-2 control-label">İlce</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="ilce" placeholder="'. $insert["ilce"]. '" class="form-control" type="text">
          </div>
        </div>
      </div>';
echo '
      <div class="form-group">
        <label class="col-md-2 control-label">adres</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="adres" placeholder="'.$insert["adres"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Ürün Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunisim" placeholder="'. $insert["urunisim"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Renk</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <select class="form-control selectpicker" name="urunrenk" placeholder="'.$insert["urunrenk"]. '">
              <option value="default">Renk</option>
              <option value="edirne">Edirne</option>
              <option value="tekirdag">Tekirdağ</option>
              <option value="kiriklareli">Kırklareli</option>
              <option value="istanbul">İstanbul</option>
              <option value="kocaeli">Kocaeli</option>
              <option value="sakarya">Sakarya</option>
            </select>
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzemeismi" placeholder="'.$insert["urunmalzeme1"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme2 </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzeme2" placeholder="'. $insert["urunmalzeme2"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '               <div class="form-group">
        <label class="col-md-2 control-label">Sipariş Tarihi<label>
          <label class="col-md-2 control-label">'.$insert["tarih"].'</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih">
          </div>
        </div>
      </div>';
          echo '
          <div class="form-group">
        <label class="col-md-2 control-label">Teslim Tarihi<label>
          ';
    $planlanantarih = strtotime('15 day', strtotime($insert["tarih"]));
    $planlanantarih = date('Y-m-d', $planlanantarih);
    echo "<label class='col-md-2 control-label'>" . $planlanantarih . "</label>";
       echo' <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih" placeholder="' . $planlanantarih.'">
          </div>
        </div>
      </div>
      ';
      }
    else if($_SESSION["authorization"] != 1) {
      echo '      <div   class="form-group">
        <label class="col-md-2 control-label">Isim Soyisim</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="adsoyad" placeholder="'.$insert["adsoyad"] .'" class="form-control" type="text"></input>
          </div>
        </div>
      </div>';
      echo '<div class="form-group">
        <label class="col-md-2 control-label">e-Mail</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder=" '. $insert["email"]. '" class="form-control" type="text">
          </div>
        </div>
      </div>
      ';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Telefon #</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="telefon" placeholder="' .$insert["telefon"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>
      ';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Yedek Telefon #</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="yedektelefon" placeholder="'. $insert["yedektelefon"].'" class="form-control" type="text">
          </div>
        </div>
      </div>
      <!-- Select Basic -->';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Şehir</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <select class="form-control selectpicker" name="sehir">
              <option value="secilmedi">'.$insert["sehir"].'</option>
              <option value="edirne">Edirne</option>
              <option value="tekirdag">Tekirdağ</option>
              <option value="kiriklareli">Kırklareli</option>
              <option value="istanbul">İstanbul</option>
              <option value="kocaeli">Kocaeli</option>
              <option value="sakarya">Sakarya</option>
            </select>
          </div>
        </div>
      </div>';
echo '
      <div class="form-group">
        <label class="col-md-2 control-label">İlce</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="ilce" placeholder="'. $insert["ilce"]. '" class="form-control" type="text">
          </div>
        </div>
      </div>';
echo '
      <div class="form-group">
        <label class="col-md-2 control-label">adres</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="adres" placeholder="'.$insert["adres"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Tedarikci</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="tedarikci" placeholder="'. $insert["tedarikci"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Ürün Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunisim" placeholder="'. $insert["urunisim"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Renk</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <select class="form-control selectpicker" name="urunrenk" placeholder="'.$insert["urunrenk"]. '">
              <option value="default">Renk</option>
              <option value="edirne">Edirne</option>
              <option value="tekirdag">Tekirdağ</option>
              <option value="kiriklareli">Kırklareli</option>
              <option value="istanbul">İstanbul</option>
              <option value="kocaeli">Kocaeli</option>
              <option value="sakarya">Sakarya</option>
            </select>
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzemeismi" placeholder="'.$insert["urunmalzeme1"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme2 </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzeme2" placeholder="'. $insert["urunmalzeme2"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
             <div class="form-group">
        <label class="col-md-2 control-label">Kapora </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="kapora" placeholder=" '. $insert["kapora"] . '" class="form-control" type="number">
          </div>
        </div>
      </div>';
      echo '
              <div class="form-group">
        <label class="col-md-2 control-label">Ürün Fiyat<label>
        <label class="col-md-2 control-label">' . $insert["urunfiyat"] .' <label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunfiyat" placeholder="" class="form-control" type="number">
          </div>
        </div>
      </div>';
      echo '
                    <div class="form-group">
        <label class="col-md-2 control-label">Kalan Borc<label>
        <label class="col-md-2 control-label">' . $insert["urunfiyat"] - $insert["kapora"] . '<label>
      </div>';
      echo '
                     <div class="form-group">
        <label class="col-md-2 control-label">Sipariş Tarihi<label>
          <label class="col-md-2 control-label">' .$insert["tarih"].'</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih">
          </div>
        </div>
      </div>';
      echo '
                    <div class="form-group">
        <label class="col-md-2 control-label">Kalan Borc<label>
        <label class="col-md-2 control-label">' . $insert["urunfiyat"] - $insert["kapora"] .'<label>
      </div>
      
      ';
    }
      ?>

                     
      <!-- Text input-->

      <!-- Text area -->
    <?php
    if($_SESSION['authorization'] != 1) {
      echo "      
      <div class='form-group'>
        <label class='col-md-2 control-label'>Sipariş Notu</label>
        <div class='col-md-4 inputGroupContainer'>
          <div class='input-group'>
            <span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span>
            <textarea class='form-control' name='siparisnotu' placeholder='";
            echo $insert['siparisnotu'] . "'></textarea>
          </div>
        </div>
      </div>";

    }
    // 
if ($_SESSION["authorization"] == 1) {
   echo '      <div   class="form-group">
        <label class="col-md-2 control-label">Isim Soyisim</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="adsoyad" placeholder="'.$insert["adsoyad"] .'" class="form-control" type="text"></input>
          </div>
        </div>
      </div>';
                  echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Ürün Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunisim" placeholder="'. $insert["urunisim"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
       <div class="form-group">
        <label class="col-md-2 control-label">Renk</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <select class="form-control selectpicker" name="urunrenk" placeholder="'.$insert["urunrenk"]. '">
              <option value="default">Renk</option>
              <option value="edirne">Edirne</option>
              <option value="tekirdag">Tekirdağ</option>
              <option value="kiriklareli">Kırklareli</option>
              <option value="istanbul">İstanbul</option>
              <option value="kocaeli">Kocaeli</option>
              <option value="sakarya">Sakarya</option>
            </select>
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzemeismi" placeholder="'.$insert["urunmalzeme1"].'" class="form-control" type="text">
          </div>
        </div>
      </div>';
      echo '
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme2 </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzeme2" placeholder="'. $insert["urunmalzeme2"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>';
        echo '
                     <div class="form-group">
        <label class="col-md-2 control-label">Sipariş Tarihi<label>
          <label class="col-md-2 control-label">' .$insert["tarih"].'</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih">
          </div>
        </div>
      </div>';

           
}
// 
  if($_SESSION['authorization'] == 1 || $_SESSION['authorization'] == 2 | $_SESSION['authorization'] == 3 ){
  echo'        <div class="form-group">
        <label class="col-md-2 control-label">Tedarikci Notu </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="tedarikcinotu" placeholder="">' . $insert["tedarikcinotu"] .'</textarea>
          </div>
        </div>
      </div>';
} 


?>
      <div class="form-group">
        <label class="col-md-6 control-label"></label>
        <div class="col-md-4">
          <button type="submit" class="btn btn-warning">Kaydet <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>

    </fieldset>
    </form>
</div>
</div>

   <?php
   $urunismi = $insert['urunisim'];
    if($_SESSION["authorization"] == 4 || $_SESSION["authorization"] == 3 || $_SESSION["authorization"] == 1 ) {
      $depocuurunler = mysqli_query($conn, "SELECT * FROM urunler WHERE `urunisim`='$urunismi'");
      // $truefalseiliskisisql = "SELECT "
      while ($insertdepocu = mysqli_fetch_array($depocuurunler))
    {
      $truefalseceksql = "SELECT `malzemedurumu` FROM `siparisler` WHERE `id`='$id'";
      $truefalsecekveri = mysqli_query($conn, $truefalseceksql);
      $inserttruefalseveri = mysqli_fetch_array($truefalsecekveri);
      $truefalseexplode= explode(", ", $inserttruefalseveri["malzemedurumu"]);
      $urunmalzemedepocu = $insertdepocu['urunmalzeme'];
      // virgul ekleme disabled checked
      $explode= explode(", ", $urunmalzemedepocu);
      for ($i=0; $i < count($explode); $i++) { 
        $truefalsedurumu = $truefalseexplode[$i];
        if($_SESSION["authorization"] == 4 || $_SESSION["authorization"] == 3) {
          if($insert["urundurumu"] == "DEPOYA TESLIM EDILDI") {
        echo "<form action='../determinationsystems/malzemealgila.php?index=".$i."&siparisid=".$insert['id']."' method='POST'  enctype='multipart/form-data'>";
        echo '  <input type="checkbox" id="vehicle1" name="cekboks" value="Bike" ';
        if($truefalsedurumu == "True") {
          echo "checked disabled";
        } else {
          echo "disabled";
        }
        echo ' >
        <label> '. $explode[$i] .'</label><br>
        ';
        if($truefalsedurumu == "True") {
          echo "";
        } else {
          echo '<input type="file" name="fayl" id="fayl">
          <button type="submit">GONDER</button>
          </form>
          ';

        }}
        }
        if($_SESSION["authorization"] == 1 || $_SESSION["authorization"] == 3) {
          echo "<form action='../determinationsystems/qrolustur.php?index=".$i."&siparisid=".$insert['id']."' method='POST'  enctype='multipart/form-data'>";
          echo '<label> '. $explode[$i] .' icin qr kod olustur</label><br>
        <button type="submit">olustur</button>
        </form>
          ';
        }
        echo $truefalsedurumu;
        $falseara = array_search("False",$truefalsedurumu, true);
        echo $falseara;
      }
      
    }}
    echo "<br>ara sonucu <br>";
    if(in_array("False", $truefalseexplode, true)) {
      echo "";
    } else {
      if($insert["urundurumu"] == "DEPOYA TESLIM EDILDI") {
      
      // echo "<form action='../determinationsystems/qrolustur.php?index=".$i."&siparisid=".$insert['id']."' method='POST'  enctype='multipart/form-data'><button type='submit'>SIPARISI TAMAMLA</button></form>";
      echo '<form action="../determinationsystems/siparisurunleritamamlandi.php?siparisid='.$id.'" method="POST"><button type="submit">SIPARISI TAMAMLA</button></form>';
    }}echo "<br>ara sonucu <br>";
   echo $_SESSION["authorization"];
}}?>
</body>
</html>
