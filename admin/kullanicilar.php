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
            echo "<td><form action='../determinationsystems/changeauthorization?".$row["id"]."'>" ."<input type='number' placeholder='". $row["authorization"] . "'><button type='submit'>Gonder</button></form></td>";
        }
        echo "</tr>";
    }
    ?>
    <!-- <tr> -->
        <!-- <td><?php echo $kullanici->yetki; ?></td> -->
    <!-- </tr> -->
</table>

