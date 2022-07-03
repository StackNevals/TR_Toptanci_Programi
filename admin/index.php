<?php
$kategoriler = array("satislar", "musteriler", "kullanicilar", "urunler", "tedarikciler", "ayarlar", "Genel Istatistikler");
?>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<meta name="description" content="Neon Admin Panel" />

	<meta name="author" content="" />



	<link rel="icon" href="assets/images/favicon.ico">



	<title>Neon | Cafe Skin</title>



	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">

	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">

	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/css/neon-core.css">

	<link rel="stylesheet" href="assets/css/neon-theme.css">

	<link rel="stylesheet" href="assets/css/neon-forms.css">

	<link rel="stylesheet" href="assets/css/custom.css">

	<link rel="stylesheet" href="assets/css/skins/cafe.css">



	<script src="assets/js/jquery-1.11.3.min.js"></script>



	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->





</head>

<body class="page-body skin-cafe" data-url="http://neon.dev">



<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

<div class="sidebar-menu">
    <?php
        include("navbar.php");
    ?>
</div>
<div class="main-content">
	<?php
	
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
	} else if ($sayfa == "genelistatistikler") {
        include("genelistatistikler.php");
    }
    if(!$sayfa){
        include("genelistatistikler.php");
    }
	
	?>
	</div>




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