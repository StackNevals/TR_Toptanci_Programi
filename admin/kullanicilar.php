<?php include("../system/connection.php"); ?>
<table>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Authorization</th>
    </tr>
    <?php
    
    $sql = "SELECT * FROM uyeler";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        if($row["authorization"] == 3){
            echo "<td>ADMIN (" . $row["authorization"] . ")</td>";
        } else {
            // ! Daha yapilmadi.
            echo "<td><form action='../determinationsystems/admin/changeauthorization?".$row["id"]."'>" ."<input type='number' placeholder='". $row["authorization"] . "'><button type='submit'>Gonder</button></form></td>";
        }
        echo "</tr>";
    }
    ?>
</table>

 <!-- 
    // ! Daha yapilmadi.
  -->
<form action="../determinationsystems/admin/kullaniciayarla">
    <label for="number">Id'si</label>
    <input type="number" id="number">
    
    <label for="sekil">Olan Kullaniciyi</label>

    <select name="sekil" id="sekil">
    <option value="Satisci">Satis Gorevlisi</option>
    <option value="Tedarikci">Tedarikci</option>
    <option value="Depocu">Depocu</option>
    </select>
    <label for="sekil">olarak ayarla</label>
    
    <button type="submit">Ayarla</button>
</form>
