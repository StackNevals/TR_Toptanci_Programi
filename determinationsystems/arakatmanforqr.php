<?php
include("../system/connection.php");
$yonlendirecekyer = $_GET["yonlendirecekyer"];
$scannedtext = $_POST["sikennidtext"];
$scannedtext = explode(", ", $scannedtext);
echo count($scannedtext);
if($yonlendirecekyer == "urungirisi") {
    $url = "./urunqrgirisi.php";
} else if ($yonlendirecekyer == "uruncikisi") {
    $url = "./urunqrcikisi.php";
}
?>
<table>
    <tr>
        <th>Urun Adi</th>
        <th>Kac tane yazdirilacagi</th>
    </tr>
    <form action=<?php echo $url?> method="POST">
<?php
$urunisimarray = array();
$urunmiktar = array();
for($i=1; $i<count($scannedtext); $i++){
    $sql = "SELECT * FROM `urunler` WHERE `urunisim` = '$scannedtext[$i]'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if(in_array($row["urunisim"], $urunisimarray)) {
        $number = array_search($row["urunisim"], $urunisimarray);
        $urunmiktar[$number] = $urunmiktar[$number] + 1;
    } else {
        $urunisimarray[$i] = $row["urunisim"];
        $urunmiktar[$i]= 1;
    }
    // array_push()
    // echo "<td>".in_array($scannedtext[$i],$row)."</td>";
}

for($i=1; $i<count($scannedtext); $i++){
    if($urunisimarray[$i] == "") {

    } else {
    echo "<tr>";
    echo "<td><input name='urunisimleri[$i]' readonly value='".$urunisimarray[$i]."'/></td>";
    echo "<td><input name='miktarlar[$i]' value='".$urunmiktar[$i]."'/></td>";
    echo "</tr>";
}}
?>
<button type="submit">ONAYLA</button>
</form>
</table>
<?php
print_r($urunisimarray);
print_r($urunmiktar);
?>