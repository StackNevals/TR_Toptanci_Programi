<?php
echo $thispage = $_SERVER['PHP_SELF'];
echo $domain = $_SERVER['HTTP_HOST'];
$url = strval($domain).strval($thispage);
echo "https://". $url;
?>