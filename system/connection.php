<?php
$servername = "localhost";
$database = "cahitarf_deniz";
$username = "cahitarf_deniz";
$password = "4F_^p9KUy+s%";
// $conn = mysqli_connect($servername, $username, $password, $database);
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}
?>