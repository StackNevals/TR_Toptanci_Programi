<?php
/**
 * Class and Function List:
 * Function list:/
 * Classes list:
 */
include "../system/connection.php";
ob_start();
session_start();
$tempusername = $_POST["username"];
$temppassword = $_POST["password"];
$determinator = mysqli_query($conn, "SELECT * FROM uyeler WHERE username='" . $tempusername . "' AND password='" . $temppassword . "' ");
$result = $determinator->fetch_array();
$number = mysqli_num_rows($determinator);
if ($number == 1) {
    $_SESSION["username"] = $result["username"];
    $_SESSION["authorization"] = $result["authorization"];
    $_SESSION["id"] = $result["id"];
    header("Location: ../index.php");
} else {
    session_destroy();
    header("Location: ../index.php?error=wrongpas3");
}
?>


