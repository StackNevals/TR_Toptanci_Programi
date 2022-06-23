<?php
session_start();
if(!$_SESSION["username"]) {
    header("Location: ../index.php");
} else {

?>
<link rel="stylesheet" href="style.css">
<?php 
if($_SESSION["authorization"] == 3) {
  echo '
  <h1>Tedarikci Ekle</h1>
<form action="../determinationsystems/tedarikciekle.php" method="GET">
<input type="text" name="tedarikciusername" placeholder="Tedarikci Username"/>
<input type="text" name="tedarikcisifre" placeholder="Tedarikci Sifresi"/>
<button type="submit">GONDER</button>
</form>
  ';
}
?>

<h1>Tedarikciler</h1>
  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Tedarikci IDsi</th>
          <th>Tedarikci Isim</th> 
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
              <?php
include ("../system/connection.php");
$database = mysqli_query($conn, "SELECT * FROM uyeler WHERE authorization IN (1)");
while ($insert = mysqli_fetch_array($database))
{
    echo "<tr>";
    echo "<td>" . $insert['id'] . "</td>";
    echo "<td>" . $insert['username'] . "</td>";
    echo "</tr>";
}

?>
      </tbody>
    </table>
    <?php }?>