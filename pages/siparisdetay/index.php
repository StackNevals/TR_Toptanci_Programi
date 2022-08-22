<!DOCTYPE html>
<html>
<head>
<?php
include("../../system/connection.php");
$siparisid=$_GET["siparisid"];


?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<img style="position:absolute; right: 10px;" src="https://upload.wikimedia.org/wikipedia/tr/d/d3/QR_kodu.jpeg" height="150px"; />
<h2>Müşteri Bilgileri</h2>
<?php

$sql = "SELECT * FROM siparisler WHERE id='$siparisid'";
$result = $conn->query($sql);
while($row = mysqli_fetch_array($result)){

  echo "<label>Ad Soyad:" . $row["adsoyad"]. "</label><br>";
  echo "<label>Telefon:" . $row["telefon"]. "</label><br>";
  echo "<label>Telefon2:" . $row["yedektelefon"]. "</label><br>";
  echo "<label>Adres:" . $row["adres"]. "</label><br>";



}
?>
<h2>Sipariş Listesi</h2>

<table>
  <tr>
    <th>Ürün</th>
    <th>Fiyat</th>
    <th>QR</th>
  </tr>
  <?php
  $sql = "SELECT * FROM siparisler WHERE id='$siparisid'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  $musteriismi = $row["adsoyad"];
  $tarihi = $row["tarih"];
  $kontroletsql = "SELECT * FROM siparisler WHERE adsoyad='$musteriismi' AND tarih='$tarihi'";
  $kontroletresult = $conn->query($kontroletsql);
  while($kontroletrow = mysqli_fetch_array($kontroletresult)){
    echo "<tr>";
    echo "<td>" . $row["urunisim"] . "</td>";
    echo "<td>" . $row["urunfiyat"] . "</td>";
    echo "<td><img src='https://upload.wikimedia.org/wikipedia/tr/d/d3/QR_kodu.jpeg' height='150px' style='align-item:center;'; /></td>";
    echo "</tr>";
  }
  ?>   
</table>

</body>
</html>