<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <?php
  session_start();
  if(!$_SESSION["username"]){
  echo "<title>Giris Yap</title>";
  } else {
    echo "<title>ANA SAYFA</title>";
  }

  ?>
  
</head>
<body>
<!-- partial:index.partial.html -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
<?php

if(!$_SESSION["username"]){
  include("pages/loginform.php");
} else {
  include('pages/siparis-listesi.php');
}

if($_GET["error"] == "wrongauth"){
  echo "<script>alert('BURAYA GIRIS YETKINIZ YOKTUR " . $_SESSION["authorization"] . "')</script>";
}
if($_GET["error"] == "wrongpas3"){
  echo "<script>alert('SIFRENIZ YANLIS')</script>";
}

if($_SESSION["authorization"] == 2 | $_SESSION["authorization"] == 3){
  echo "<h1><a href='pages/siparis-ekle.php'>SIPARIS OLUSTUR</a></h1>";
  echo "<h1><a href='pages/tedarikci-ekle.php'>TEDARIKCI OLUSTUR</a></h1>";
}


?>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
