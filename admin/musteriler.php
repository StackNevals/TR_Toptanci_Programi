<?php include("../system/connection.php"); ?>
<table>
    <tr>
    <th>ID</th>
    <th>Isim</th>
    <th>Toplam Urun Fiyati</th>
    <th>Toplam Kapora</th>
    <th>En sonki siparis tarihi</th>
    <th>Toplam Durum</th>
    </tr>
    <?php
    
    $sql = "SELECT * FROM musteriler";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["isim"] . "</td>";
        echo "<td>" . $row["toplamurunfiyati"] . "</td>";
        echo "<td>" . $row["kapora"] . "</td>";
        echo "<td>" . $row["tarih"] . "</td>";
        $toplamfiyat = intval($row["toplamurunfiyati"]);
        $kapora = ($row["kapora"]);
        $toplamdurum = $toplamfiyat - $kapora;
        echo "<td>" . $toplamdurum . "</td>";
        echo "</tr>";
    }
    ?>
</table>

