<link rel="stylesheet" href="style.css">
<form action="../determinationsystems/malzemeekle.php" method="GET">
<input type="text" name="malzemeismi" placeholder="malzemeismi"/>
<select name="eylem" id="">
  <!-- ayarlamayi unutma -->
<option value="ekle">EKLE</option>
  <option value="sil">SIL</option>
</select>
<button type="submit">GONDER</button>
</form>



<h1>Malzemeler</h1>
  <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Malzeme IDsi</th>
          <th>Malzeme Isim</th> 
          <th>Envanterdeki Malzeme Sayisi</th> 
          <th>Gonder</th> 
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
    echo "<td>" . $insert['malzemeid'] . "</td>";
    echo "<td>" . $insert['malzemeisim'] . "</td>";
    echo "<form action='../determinationsystems/malzemeayarla.php?malzemeidsi=".$insert['malzemeid']."' method='POST'>";
    echo "<td><input type='number' name='ayarla' placeholder='" . $insert['envanter'] . "'/></td>";
    echo "<td><button type='submit'>GONDER</button></td></form>";
    echo "</tr>";
}
?>
      </tbody>
    </table>

    <!-- <h1>Envanter Guncelle</h1>
    <form action="../determinationsystems/malzemeayarla.php" method="get">
    <input type="number" name="malzemeidsi" placeholder="Envanterdeki sayiyi degistireceginiz Malzeme IDsi">
    <select name="eylem" id="">
        <option value="ekle">EKLE</option>
        <option value="azalt">AZALT</option>
        <option value="ayarla">SAYIYI BU YAP</option>
    </select>
    <input type="number" name="malzemedeger" placeholder="Etki edecek sayiyi giriniz">
    <button type="submit">GONDER</button>
</form> -->