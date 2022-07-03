<!-- <link rel="stylesheet" href="style.css"> -->







<script>
<?php
include("../system/connection.php");

function qrCode($s, $w = 250, $h = 250){

  $u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';

  $url = sprintf($u, $w, $h, $s);

    return $url;

}



$urunid = $_GET["id"];




$urunlersql = "SELECT * FROM `urunler` WHERE `urunid`='$urunid'";

$urunlerveri = mysqli_query($conn, $urunlersql);

$urunlercekveri = mysqli_fetch_array($urunlerveri);

$urunisim = $urunlercekveri["urunisim"];

$theword = strval($urunid).strval($urunisim);



  $qr = qrCode($theword, 200, 200); // 200x200
  /*
  function qryaz()
  {
    var URL = '.$qr.'; 
    var W = window.open(URL); 
    W.window.print();
  }
*/







?>
function qryazdir(){
  var URL = '<?php echo $qr; ?>';
  var W = window.open(URL);
  W.window.print();
}
</script>






<h1>URUNLER</h1>



  <table cellpadding="0" cellspacing="0" border="0">



      <thead>



        <tr>



          <th>Urun IDsi</th>



          <th>Urun Isim</th> 



          <th>Urun Malzemeleri</th> 



          <th>Urun Renkleri</th> 



          <th>Envanterdeki Urun Sayisi</th> 


            <th>Qr Yazdır</th>

        </tr>



      </thead>



    </table>



  </div>



  <div class="tbl-content">



    <table cellpadding="0" cellspacing="0" border="0">



      <tbody>



              <?php



include ("../system/connection.php");



$database = mysqli_query($conn, "SELECT * FROM urunler");



while ($insert = mysqli_fetch_array($database))



{



    echo "<tr>";



    echo "<td><a href= 'urunayarla.php?id=". $insert['urunid']. "'>" . $insert['urunid'] . "</a></td>";



    echo "<td>" . $insert['urunisim'] . "</td>";



    echo "<td>" . $insert['urunmalzeme'] . "</td>";



    echo "<td>" . $insert['urunrenk'] . "</td>";



    echo "<td>" . $insert['urunEnvanter'] . "</td>";


    echo "<td><button onClick='qryazdir()'>Qr Yazdır</button></td>";
 
 echo "</tr>";



}



?>



      </tbody>



    </table>







    <h1>Urun Malzeme Degistirme</h1>



    <form action="../determinationsystems/urunayarla.php?" method="GET">



        <input type="number" name="urunid" id=""/>



        <input type="text" placeholder="Orn: kirmizi ayaklik, tahta" name="urunmalzeme" id=""/>



        <button type="submit">GONDER</button>



    </form>



    <h1>Urun Renk Secenekleri Degistirme</h1>



    <form action="../determinationsystems/urunayarla.php?" method="GET">



        <input type="number" name="urunid" id=""/>



        <input type="text" placeholder="Orn: kirmizi, mavi, yesil, mor" name="urunrenk" id=""/>



        <button type="submit">GONDER</button>



    </form>



    <h1>Urun Envanter Sayisi Degistirme</h1>



<form action="../determinationsystems/urunayarla.php?" method="GET">



    <input type="number" name="urunid" id=""/>



    <input type="number" placeholder="Sayi Giriniz" name="urunsayisi" id=""/>



    <button type="submit">GONDER</button>



</form>