<?php
/* Including the connection.php file. */
include("../system/connection.php"); 
?>
<details>
    <summary>Urunler Veritabani</summary>
<table>
    <tr>
    <th>Urun ID</th>
    <th>Urun Ismi</th>
    <th>Urun Envanter</th>
    </tr>
    <?php
/* Fetching the data from the database and displaying it in a table. */
    $result = mysqli_query($conn, "SELECT * FROM urunler");
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["urunid"] . "</td>";
        echo "<td>" . $row["urunisim"] . "</td>";
        echo "<td>" . $row["urunEnvanter"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</details>
<h1>Son 30 gunde en cok satilan urun:
<?php
// SELECT `urunisim` FROM `siparisler` GROUP BY `urunisim` ORDER BY COUNT(*) DESC LIMIT 1
/* Fetching the most sold product in the last 30 days. */
$encoktercihedilen = "SELECT `urunisim` FROM `siparisler` GROUP BY `urunisim` ORDER BY COUNT(*) DESC LIMIT 1";
$enaztercihedilen = "SELECT `urunisim` FROM `siparisler` GROUP BY `urunisim` ORDER BY COUNT(*) ASC LIMIT 1";

$resultencoktercihedilen = mysqli_query($conn, $encoktercihedilen);
$resultenaztercihedilen = mysqli_query($conn, $enaztercihedilen);

$rowencoktercihedilen = mysqli_fetch_assoc($resultencoktercihedilen);
$rowenaztercihedilen = mysqli_fetch_assoc($resultenaztercihedilen);

echo $rowencoktercihedilen["urunisim"];
?>
</h1>
<h1>En az Tercih Edilen Urun:
    <?php
    echo $rowenaztercihedilen["urunisim"];
    ?>
</h1>
<!-- 
    En cok satilan
    En az satilan
 -->