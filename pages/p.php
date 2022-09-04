<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
      <div   class="form-group">
        <label class="col-md-2 control-label">Isim Soyisim</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="adsoyad" placeholder="<?php echo $insert["adsoyad"]; ?>" class="form-control" type="text"></input>
          </div>
        </div>
      </div>
      <?php
    if($_SESSION['authorization'] != 1) {
      echo ' <div class="form-group">
        <label class="col-md-2 control-label">e-Mail</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder=" '. $insert["email"]. '" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Telefon #</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="telefon" placeholder="' .$insert["telefon"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Yedek Telefon #</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="yedektelefon" placeholder="'. $insert["yedektelefon"].'" class="form-control" type="text">
          </div>
        </div>
      </div>
      <!-- Select Basic -->

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
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">İlce</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="ilce" placeholder="'. $insert["ilce"]. '" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">adres</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="adres" placeholder="'.$insert["adres"].'" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Tedarikci</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="tedarikci" placeholder="'. $insert["tedarikci"].'" class="form-control" type="text">
          </div>
        </div>
      </div>
      
       <div class="form-group">
        <label class="col-md-2 control-label">Ürün Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunisim" placeholder="'. $insert["urunisim"].'" class="form-control" type="text">
          </div>
        </div>
      </div>
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
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme Ismi</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzemeismi" placeholder="'.$insert["urunmalzeme1"].'" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Malzeme2 </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="malzeme2" placeholder="'. $insert["urunmalzeme2"] .'" class="form-control" type="text">
          </div>
        </div>
      </div>';
    }
      ?>
     
      <?php
    if($_SESSION['authorization'] != 1) {
            echo '       <div class="form-group">
        <label class="col-md-2 control-label">Kapora </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="kapora" placeholder=" '. $insert["kapora"] . '" class="form-control" type="number">
          </div>
        </div>
      </div>';
    }
      ?>

      <?php
    if($_SESSION['authorization'] != 1) {
    echo '        <div class="form-group">
        <label class="col-md-2 control-label">Ürün Fiyat<label>
        <label class="col-md-2 control-label">' . $insert["urunfiyat"] .' <label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input name="urunfiyat" placeholder="" class="form-control" type="number">
          </div>
        </div>
      </div>';
    }
      ?>

      <?php
    if($_SESSION['authorization'] != 1) {
      echo '              <div class="form-group">
        <label class="col-md-2 control-label">Kalan Borc<label>
        <label class="col-md-2 control-label">' . $insert["urunfiyat"] - $insert["kapora"] . '<label>
      </div>
                     <div class="form-group">
        <label class="col-md-2 control-label">Sipariş Tarihi<label>
          <label class="col-md-2 control-label"><?php echo $insert["tarih"]; ?></label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih">
          </div>
        </div>
      </div>';
    }
      ?>
              <div class="form-group">
        <label class="col-md-2 control-label">Kalan Borc<label>
        <label class="col-md-2 control-label"><?php echo $insert["urunfiyat"] - $insert["kapora"]; ?><label>
      </div>
                     <div class="form-group">
        <label class="col-md-2 control-label">Sipariş Tarihi<label>
          <label class="col-md-2 control-label"><?php echo $insert["tarih"]; ?></label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih">
          </div>
        </div>
      </div>
          
          <div class="form-group">
        <label class="col-md-2 control-label">Teslim Tarihi<label>
          <?php
    $planlanantarih = strtotime('15 day', strtotime($insert["tarih"]));
    $planlanantarih = date('Y-m-d', $planlanantarih);
    echo "<label class='col-md-2 control-label'>" . $planlanantarih . "</label>";
?>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-box-open"></i></span>
            <input type="date" id="siparisTarihi" name="tarih" placeholder="<?php echo $planlanantarih;?>">
          </div>
        </div>
      </div>
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
    ?>

          <div class="form-group">
        <label class="col-md-2 control-label">Tedarikci Notu </label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="tedarikcinotu" placeholder=""><?php echo $insert["tedarikcinotu"]; ?></textarea>
          </div>
        </div>
      </div>


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
}}?>
</body>
</html>
