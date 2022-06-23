<?php
include("../system/connection.php");
$tedarikciisim = $_GET["tedarikciusername"];
$tedarikcipassword = $_GET["tedarikcisifre"];
$sql = "INSERT INTO uyeler (`username`, `password` ,`authorization`) VALUES ('$tedarikciisim', '$tedarikcipassword', 1)";
mysqli_query($conn,$sql);
header("Location: ../pages/tedarikci-ekle.php");
?>