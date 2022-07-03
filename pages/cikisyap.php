<?php
session_start();
session_unset();
session_destroy();
session_abort();
header("Location: ../index.php");

?>
