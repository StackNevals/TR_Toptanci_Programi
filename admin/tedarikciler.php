<?php
/* Including the connection.php file. */
include("../system/connection.php"); 
?>
<table>
    <tr>
    <th>Tedarikci ID</th>
    <th>Tedarikci Ismi</th>
    <th>Detay</th>
    </tr>
    <?php
/* Fetching the data from the database and displaying it in a table. */

$database = mysqli_query($conn, "SELECT * FROM uyeler WHERE authorization IN (1)");

while($insert = mysqli_fetch_array($database)) {
        echo "<tr>";
        echo "<td>" . $insert["id"] . "</td>";
        echo "<td>" . $insert["username"] . "</td>";
        echo "<td>" . "<a href='./index.php?sayfa=tedarikciler&detayid=".$insert["id"]."'>Detay" . "</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<hr>
<?php
/* Fetching the data from the database and displaying it in a table. */
if(isset($_GET["detayid"])) {
    echo "
    <details>
    <summary>Tedarikciyi Ilgilendiren Siparisler</summary>";
?>
<table>
    <tr>
    <th>Siparis ID</th>
    <th>Siparis Ismi</th>
    <th></th>
    </tr>
    <?php
    $detayid = $_GET["detayid"];
    $uyeisimbuldatabase = mysqli_query($conn, "SELECT * FROM uyeler WHERE id = $detayid");
    
    $uyeisimbulinsert = mysqli_fetch_array($uyeisimbuldatabase);

    $tedarikciisim = $uyeisimbulinsert["username"];
    $siparislerdebulsql = mysqli_query($conn, "SELECT * FROM `siparisler` WHERE `tedarikci` = '$tedarikciisim'");
    while($siparislerdebulrow = mysqli_fetch_array($siparislerdebulsql)) {
        
        echo "<tr>";
        echo "<td>" . $siparislerdebulrow["id"] . "</td>";
        echo "<td>" . $siparislerdebulrow["urunisim"] . "</td>";
        echo "</tr>";
    }}
?>

</table>
</details>