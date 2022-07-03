
  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Ismi</th> 
          <th>En sonki siparis Tarihi</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <?php
include ("../system/connection.php");
$id = $_GET["id"];
$database = mysqli_query($conn, "SELECT * FROM musteriler WHERE `id`='$id'");
while ($insert = mysqli_fetch_array($database)) {
    echo "<tr>";
    echo "<td>". $insert['isim'] ."</td>";
    echo "<td>". $insert['tarih'] ."</td>";
    $musteriisim = $insert["isim"];
}
          
          ?>
      </tbody>
    </table>

  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Satin aldigi urunlerin idsi</th> 
          <th>Satin aldigi urunler</th> 
          <th>Satin aldigi urunlerin tarihi</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <?php
$database = mysqli_query($conn, "SELECT * FROM siparisler WHERE `adsoyad`='$musteriisim'" );
while ($siparisbilgi = mysqli_fetch_array($database))
{
    echo "<tr>";
    echo "<td><a href='./siparisdetay.php?siparisdetayid=" . $siparisbilgi["id"] . "'> #" . $siparisbilgi['id'] . "</td>";
    echo "<td>". $siparisbilgi['urunisim'] ."</td>";
    echo "<td>". $siparisbilgi['tarih'] ."</td>";
    echo "</tr>";
}
    ?>
      </tbody>
    </table>




  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Toplam Urun Fiyati</th> 
          <th>Kaporasi</th> 
          <th>Durum</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <?php
$database = mysqli_query($conn, "SELECT * FROM musteriler WHERE `isim`='$musteriisim'" );
while ($muhasebe = mysqli_fetch_array($database))
{
    echo "<tr>";
    echo "<td>". $muhasebe['toplamurunfiyati'] ."</td>";
    echo "<td>". $muhasebe['kapora'] ."</td>";
    $borc = $muhasebe['toplamurunfiyati']-$muhasebe['kapora'];
    echo "<td>". $borc ."</td>";
    echo "</tr>";
}
    ?>
      </tbody>
    </table>


<?php


?>