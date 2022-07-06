<!-- <!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
 
</body>
</html> -->
<script href="./siparis.js"></script>

<style>

h1 {
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table {
  width: 100%;
  table-layout: fixed;
}
.tbl-header {
  background-color: rgba(255, 255, 255, 0.3);
}
.tbl-content { 
  height:60vh;
  overflow-x: auto;
  margin-top: 0px;
  border: 1px solid rgba(255, 255, 255, 0.3);
}
th {
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td {
  padding: 15px;
  text-align: left;
  vertical-align: middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255, 255, 255, 0.1);
}

/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body {
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: "Roboto", sans-serif;
}
section {
  margin: 50px;
}

/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #f50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}

/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
  width: 6px;
}
/* ::-webkit-scrollbar-track { */
  /* -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); */
/* } */
/* ::-webkit-scrollbar-thumb { */
  /* -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); */
/* } */
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
<!-- </head> -->
<!-- <body> -->

<section>
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Sipariş idsi</th>
          <th>Ad Soyad</th>
		      <th>Ürün</th>
          <th>Sipariş Tarihi</th>
          <th>Planlanan Sevkiyat Tarihi</th>
          <th>Telefon numarası</th>
          <th>Adresi</th>
          <th>Tedarikci</th>
          <th>Durum</th>
          <th>Durum Degistir</th> 
          <th>Onayla</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
              <?php
/**
 * Class and Function List:
 * Function list:
 * Classes list:
 */
include ("./system/connection.php");
include ("./determinationsystems/DurumDegisFonksiyon.php");
$database = mysqli_query($conn, "SELECT * FROM siparisler");
while ($insert = mysqli_fetch_array($database))
{
  $adsoyad = $insert["adsoyad"];
  $musterilerdatabase = mysqli_query($conn, "SELECT * FROM `musteriler` WHERE `isim`='$adsoyad'");
  while($musterilerrow = mysqli_fetch_array($musterilerdatabase)){
      $url = "./pages/musteridetay.php?id=".$musterilerrow["id"];
  }
  if($_SESSION["authorization"] == 1){
    if($insert["tedarikci"] == $_SESSION["username"]) {
          $planlanantarih = strtotime('15 day', strtotime($insert["tarih"]));
    $planlanantarih = date('Y-m-d', $planlanantarih);
    echo "<tr>";
    echo "<td><a href='./pages/siparisdetay/index.php?siparisid=" . $insert["id"] . "'> #" . $insert['id'] . "</td>";
    echo "<td>" . $insert['adsoyad'] . "</td>";
    echo "<td>" . $insert['urunisim'] . "</td>";
    echo "<td>" . $insert['tarih'] . "</td>";
    echo "<td>" . $planlanantarih . "</td>";
    echo "<td>" . $insert['telefon'] . "</td>";
    echo "<td>" . $insert['adres'] . "</td>";
    echo "<td>" . $insert['urundurumu'] . "</td>";
 

    echo "<form action='./determinationsystems/forDurumDegistir.php?id=" . $insert["id"] . "' method='POST'>";
    echo siparisDurumDegistir($_SESSION["authorization"]);
    echo "<td><button type='submit'>Onayla</button></form>";
   
    echo "</tr>";
    }
  } else if ($_SESSION["authorization"]==4){
    if($insert["urundurumu"] == "TAMAMLANDI" || $insert["urundurumu"] == "URETIMDEN TESLIM ALINDI" || $insert["urundurumu"] == "DEPOYA TESLIM EDILDI" ||$insert["urundurumu"] == "SEVKIYATTA" || $insert["urundurumu"] == "SIPARIS TAMAMLANDI"  ) {
          $planlanantarih = strtotime('15 day', strtotime($insert["tarih"]));
    $planlanantarih = date('Y-m-d', $planlanantarih);
    echo "<tr>";
    echo "<td><a href='./pages/siparisdetay/index.php?siparisid=" . $insert["id"] . "'> #" . $insert['id'] . "</td>";
    echo "<td>" . $insert['adsoyad'] . "</td>";
    echo "<td>" . $insert['urunisim'] . "</td>";
    echo "<td>" . $insert['tarih'] . "</td>";
    echo "<td>" . $planlanantarih . "</td>";
    echo "<td>" . $insert['telefon'] . "</td>";
    echo "<td>" . $insert['adres'] . "</td>";
    echo "<td>" . $insert['urundurumu'] . "</td>";
 
    if($insert["urundurumu"] == "SIPARIS TAMAMLANDI") {
      } else {
    echo "<form action='./determinationsystems/forDurumDegistir.php?id=" . $insert["id"] . "' method='POST'>";
    echo siparisDurumDegistir($_SESSION["authorization"]);
    echo "<td><button type='submit'>Onayla</button></form>";
   }
    echo "</tr>";
    }
  } else{
    $planlanantarih = strtotime('15 day', strtotime($insert["tarih"]));
    $planlanantarih = date('Y-m-d', $planlanantarih);
    echo "<tr>";
    echo "<td><a href='./pages/siparisdetay/index.php?siparisid=" . $insert["id"] . "'> #" . $insert['id'] . "</td>";
    echo "<td><a href=".$url.">" . $insert['adsoyad'] . "</a></td>";
    echo "<td>" . $insert['urunisim'] . "</td>";
    echo "<td>" . $insert['tarih'] . "</td>";
    echo "<td>" . $planlanantarih . "</td>";
    echo "<td>" . $insert['telefon'] . "</td>";
    echo "<td>" . $insert['adres'] . "</td>";
    echo "<td>" . $insert['tedarikci'] . "</td>";
    echo "<td>" . $insert['urundurumu'] . "</td>";
 

    echo "<form action='./determinationsystems/forDurumDegistir.php?id=" . $insert["id"] . "' method='POST'>";
    echo siparisDurumDegistir($_SESSION["authorization"]);
    echo "<td><button type='submit'>Onayla</button></form>";
   
    echo "</tr>";
}}
?>
      </tbody>
    </table>
  </div>
 
	<h1><a href="./pages/urungiriscikis.php">Urun Giris/Cikisi</a></h1>
 
</section>
