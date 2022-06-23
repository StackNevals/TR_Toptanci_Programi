<?php
session_start();

?>
<!-- <link rel="stylesheet" href="style.css"> -->

  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Ismi</th> 
          <th>En sonki Siparis Tarihi</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
          <?php
include ("../system/connection.php");
$database = mysqli_query($conn, "SELECT * FROM musteriler");
while ($insert = mysqli_fetch_array($database)) {
    echo "<tr>";
    echo "<td><a href='./musteridetay.php?id=". $insert['id'] ."'>". $insert['isim'] ."</a></td>";
    echo "<td>". $insert['tarih'] ."</td>";
    echo "<tr>";
}
          
          ?>
      </tbody>
    </table>