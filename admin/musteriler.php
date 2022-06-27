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
    echo "<hr>";
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
<!-- 
    // ! Daha yapilmadi.
 -->
 <hr>
<form action="../determinationsystems/admin/musterisirala.php" method="get">
    <label for="number">Id'si</label><input type="number" id="number">    
<label for="sekil">Olan Kolonu </label>
    <select name="sekil" id="sekil">
        <option value="asc">Artan</option>
        <option value="desc">Azalan</option>
    </select>
    <label for="sekil">olarak sirala</label>
<button type="submit">Sirala</button>
</form>

