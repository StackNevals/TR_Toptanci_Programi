<?php

include("../system/connection.php");

$urunid = $_GET["urunid"];

$sql = "SELECT * FROM urunler WHERE urunid = '$urunid'";

$result = mysqli_query($conn, $sql);

$insert = mysqli_fetch_array($result);

$explodeurunler = explode(',', $insert['urunrenk']);





header("Content-Type: application/json");

echo json_encode($explodeurunler);

?>

