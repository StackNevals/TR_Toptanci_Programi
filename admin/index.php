<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
                <div class="container">
                <a class="brand" href="#">Admin Paneli</a>
                <ul class="nav">
                    <li><a href="index.php">GENEL ISTATISTIKLER</a></li>
                    <li><a href="satislar.php">Satislar</a></li>
                    <li><a href="musteriler.php">Musteriler</a></li>
                    <li><a href="kullanicilar.php">Kullanıcılar</a></li>
                    <li><a href="siparisler.php">Siparişler</a></li>
                    <li><a href="tedarikciler.php">Tedarikciler</a></li>
                    <li><a href="ayarlar.php">Ayarlar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="others">
        <?php
        
        $sayfa = $_GET["sayfa"];

        if(isset($sayfa)){
            
        } else if ($sayfa == "satislar") {
            include("satislar.php");
        } else if ($sayfa == "musteriler") {
            include("musteriler.php");
        } else if ($sayfa == "kullanicilar") {
            include("kullanicilar.php");
        } else if ($sayfa == "siparisler") {
            include("siparisler.php");
        } else if ($sayfa == "tedarikciler") {
            include("tedarikciler.php");
        } else if ($sayfa == "ayarlar") {
            include("ayarlar.php");
        } else {

        }
        ?>
    </div>

</body>
</html>