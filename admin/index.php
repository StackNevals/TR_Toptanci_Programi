<?php
$kategoriler = array("satislar", "musteriler", "kullanicilar", "urunler", "tedarikciler", "ayarlar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
</head>
<body>

    <?php
        include("main.php");
    ?>
    
    <!-- <div class="navbar">
        <div class="navbar-inner">
                <div class="container">
                <a class="brand" href="#">Admin Paneli</a>
                <ul class="nav">
                    <li><a href="index.php">GENEL ISTATISTIKLER</a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[0] ?>"><?php // echo ucfirst($kategoriler[0]) ?></a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[1] ?>"><?php // echo ucfirst($kategoriler[1]) ?></a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[2] ?>"><?php // echo ucfirst($kategoriler[2]) ?></a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[3] ?>"><?php // echo ucfirst($kategoriler[3]) ?></a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[4] ?>"><?php // echo ucfirst($kategoriler[4])?></a></li>
                    <li><a href="index.php?sayfa=<?php //echo $kategoriler[5] ?>"><?php // echo ucfirst($kategoriler[5]) ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="others">
        <?php
        /*
        $sayfa = $_GET["sayfa"];

        if(!isset($sayfa)){
        } else if ($sayfa == $kategoriler[0]) {
            include($kategoriler[0].".php");
        } else if ($sayfa == $kategoriler[1]) {
            include($kategoriler[1].".php");
        } else if ($sayfa == $kategoriler[2]) {
            include($kategoriler[2].".php");
        } else if ($sayfa == $kategoriler[3]) {
            include($kategoriler[3].".php");
        } else if ($sayfa == $kategoriler[4]) {
            include($kategoriler[4].".php");
        } else if ($sayfa == $kategoriler[5]) {
            include($kategoriler[5].".php");
        } else {
            include("main.php");
        }
       */ ?>
    </div> -->

</body>
</html>