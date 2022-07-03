<?php
?>


<table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Malzeme Isim</th> 
          <th>Envanterdeki Malzeme Sayisi</th> 
          <th>QR Okut</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
              <?php
include ("../system/connection.php");
$database = mysqli_query($conn, "SELECT * FROM malzemeler");
while ($insert = mysqli_fetch_array($database))
{
    echo "<tr>";
    echo "<td>" . $insert['malzemeisim'] . "</td>";
    echo "<td>" . $insert['envanter'] . "</td>";
    echo "<td><form action='../determinationsystems/stok.php?malzemeid=".$insert['malzemeid']."' method='POST' enctype='multipart/form-data'><input type='file' name='qrdosya' id='qrdosya'/><layer for='qrdosya'>QR Okut</layer><button type='submit'>GONDER</button></form></td>";
    echo "</tr>";
}
?>
      </tbody>
    </table>