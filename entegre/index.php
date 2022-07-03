<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>X Siparis Bilgileri</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
  <link rel="stylesheet" href="./style.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->

</head>
<?php
      $sayfa = $_GET["sayfa"];
?>
<body>
  <div class="upclass">
  <h1 class="siparisid">XX Siparis Bilgileri</h1>
  </div>
  <div class="downclass">
  <!-- partial:index.partial.html -->
  <div class="container">
  <div id="logo"><h1 class="logo"></h1>
  </div>
  <div class="leftbox">
    <nav>
      <a id="profile" <?php if(!isset($sayfa) || $sayfa == "kisiselbilgiler"){echo "class='active'";}?> href="index.php?sayfa=kisiselbilgiler"><i class="fa fa-user"></i></a>
      <a id="payment" <?php if($sayfa == "fiyatbilgileri"){echo "class='active'";}?> href="index.php?sayfa=fiyatbilgileri"><i class="fa fa-credit-card"></i></a>
      <a id="subscription" <?php if($sayfa == "urunbilgileri"){echo "class='active'";}?> href="index.php?sayfa=urunbilgileri"><i class="fa fa-tv"></i></a>
      <!-- <a id="privacy"><i class="fa fa-tasks"></i></a> -->
      <!-- <a id="settings"><i class="fa fa-cog"></i></a> -->
    </nav>
  </div>
  <div class="rightbox">
    <?php

      if(!isset($sayfa)){
        include("./pages/kisiselbilgiler.php");
      } else if($sayfa == "fiyatbilgileri") {
        include("./pages/fiyatbilgileri.php");
      } else if($sayfa == "urunbilgileri") {
        include("./pages/urunbilgileri.php");
      } else if($sayfa == "kisiselbilgiler") {
        include("./pages/kisiselbilgiler.php");
      }
      // include("./pages/kisiselbilgiler.php");
      

    ?>
    </div>
  </div>
</div>
<!-- partial -->
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script> -->

</body>
</html>
