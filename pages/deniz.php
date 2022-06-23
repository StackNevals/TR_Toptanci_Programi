





<!DOCTYPE html>

<html>



<head>

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <script href="./siparis.js"></script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>







  <script>

    function satirEkle() {

      $(".item-adi:last").clone().insertAfter(".item-adi:last");

    }



    function silSatir() {

      $('div.item-adi').each(function (index, item) {

        jQuery(':checkbox', this).each(function () {

          if ($(this).is(':checked') && $("input[name='item_urun[]']").length > 0) {

            $(item).remove();

          }

        });

      });

    }





    function gonderr() {

      var arrayDizi = [];

      console.log(arrayDizi);

      $("#urunlerlistesi .satis").each(function () {

        var obj = $(this);

        var urunadi = obj.find(".urun").val();

        var fiyatmiktar = obj.find(".fiyat").val();

        if (urunadi) {

          arrayDizi.push({

            AD: urunadi,

            MIKTAR: fiyatmiktar

          });

        }

      });

      return arrayDizi;

    };

  </script>

</head>



<body>

  <?php

session_start();



if($_SESSION["authorization"] != 2) {

  if($_SESSION["authorization"] != 3){

  header("Location: ../index.php?error=wrongauth");

    }





    

    

  }

  

    ?>

  <div class="container">

    <form id="contact_form" class="well form-horizontal" action="../determinationsystems/siparisekle.php" method="GET">

      <i class="fa-solid fa-house">Anasayfa</i><i class="fa-solid fa-clipboard-list">Sipariş</i>

      <fieldset>

        <legend>Sipariş Ekle</legend> <!-- Text input-->

        <div class="form-group">

          <div class="col-md-2 inputGroupContainer">

            <div class="input-group"><input class="form-control" name="isim" type="text" placeholder="İsim Soyisim" />

            </div>

          </div>

        </div>



        <!-- Text input-->

        <div class="form-group">

          <div class="col-md-4 inputGroupContainer">

            <div class="input-group"><input class="form-control" name="email" type="text" placeholder="E-Mail Adresi" />

            </div>

          </div>

        </div>

        <!-- Text input-->

        <div class="form-group"><label class="col-md-4 control-label"></label>

          <div class="col-md-4 inputGroupContainer">

            <div class="input-group"><input class="form-control" name="telefon" type="text"

                placeholder="(542)596-8538" /><input class="form-control" name="telefon2" type="text"

                placeholder="(542)596-85382" /></div>

          </div>

        </div>



        <!-- Select Basic -->

        <div class="form-group"><label class="col-md-4 control-label">Şehir</label>

          <div class="col-md-4 selectContainer">

            <div class="input-group"><select class="form-control selectpicker" name="sehir">

                <option value="secilmedi">Secilmedi</option>

                <option value="edirne">Edirne</option>

                <option value="tekirdag">Tekirdağ</option>

                <option value="kiriklareli">Kırklareli</option>

                <option value="istanbul">İstanbul</option>

                <option value="kocaeli">Kocaeli</option>

                <option value="sakarya">Sakarya</option>

              </select>

              <input class="form-control" name="ilce" type="text" placeholder="İlce" /></div>

          </div>

        </div>



        <!-- Text area -->

        <div class="form-group"><label class="col-md-4 control-label">Adres</label>

          <div class="col-md-4 inputGroupContainer">

            <div class="input-group"><textarea class="form-control" name="adres" placeholder="Adres Bilgisi"></textarea>

            </div>

          </div>

        </div>

        <div id="urunlerlistesi">

        <div id="demo-outer">

            <div id="product">

                <div class="item-adi float-clear satis" style="clear:both;">

                    <div class="float-left"><input type="checkbox" name="item_index[]" /></div>

                    <div class="float-left"><input type="text" class="urun" name="item_urun[]"  /></div>

                         <label>Ürün Ekle</label>

          <div class="form-group">

            <div class="col-md-4 inputGroupContainer">

              <div class="input-group">

                <input list="products" name="product" id="product">

                <div class="item-adi float-clear satis" style="clear:both;">

                    <select class="form-control selectpicker" name="urunRenk_select">

                      <option value="renk">Renk</option>

                      <option value="kirmizi">Kırmızı</option>

                      <option value="mavi">Mavi</option>

                      <option value="mor">Mor</option>

                      <option value="siyah">Siyah</option>

                    </select>

                    <select class="form-control selectpicker" name="urunMalzeme1_select">

                      <option value="malzeme1">Malzemesi</option>

                      <option value="mdf">MDF</option>

                      <option value="suntalem">Suntalem</option>

                      <option value="demirayak">demir ayak</option>

                      <option value="kromayak">krom ayak</option>

                      <option value="sakarya">Sakarya</option>

                    </select>



                    <select class="form-control selectpicker" name="urunMalzeme2_select">

                      <option value="malzeme2">Malzemesi 2</option>

                      <option value="mdf">MDF</option>

                      <option value="suntalem">Suntalem</option>

                      <option value="demirayak">demir ayak</option>

                      <option value="kromayak">krom ayak</option>

                      <option value="sakarya">Sakarya</option>

                    </select>

                  </div>



                </div>

              </div>

            </div>

            <div class="btn-action float-clear">

                <input type="button" name="add_item" value="Satırı Kopyala" onClick="satirEkle();" />

                <input type="button" name="del_item" value="Sil" onClick="silSatir();" />

            </div>

                <datalist id="products">







                  <?php

  include("../system/connection.php");

  $database = mysqli_query($conn, "SELECT * FROM urunler");

  while($insert = mysqli_fetch_array($database)) {

  echo '<option value="' . $insert['urunisim'] . '">'; 

} 

  ?>

                </datalist>



              </div>



              <!-- number input-->

              <div class="form-group"><label class="col-md-4 control-label">Kapora</label>

                <div class="col-md-4 inputGroupContainer">

                  <div class="input-group"><input class="form-control" name="kapora" type="number"

                      placeholder="Kapora" /></div>

                </div>

              </div>



              <label>Tedarikci Ekle</label>

              <div class="multi-field-wrapper">

                <div class="multi-fields">

                  <div class="multi-field">

                    <input list="tedarikci" name="tedarik" id="tedarik">

                    <datalist id="tedarikci">

                      <?php

  include("../system/connection.php");

  $database = mysqli_query($conn, "SELECT * FROM tedarikciler");

  while($insert = mysqli_fetch_array($database)) {

  echo '<option value="' . $insert['tedarikci_isim'] . '">'; 

} 

  ?>

                    </datalist>

                    <!-- Text area -->

                    <div class="form-group"><label class="col-md-4 control-label">Sipariş Notu</label>

                      <div class="col-md-4 inputGroupContainer">

                        <div class="input-group"><textarea class="form-control" name="comment"

                            placeholder="Sipariş Notu"></textarea></div>

                      </div>

                    </div>

                    <div class="form-group"><label class="col-md-4 control-label">Tedarikci Notu</label>

                      <div class="col-md-4 inputGroupContainer">

                        <div class="input-group"><textarea class="form-control" name="tedarikcomment"

                            placeholder="Tedarikci Notu"></textarea></div>

                      </div>

                    </div>

                    <!-- Success message -->



                    <!-- Button -->

                    <div class="form-group"><label class="col-md-4 control-label"></label>

                      <div class="col-md-4"><button class="btn btn-warning" type="submit">Siparişi Ekle</button></div>

                    </div>

      </fieldset>

    </form>

  </div>

  <!-- /.container -->



  <div class="drops">

    <div class="drop drop-1"></div>

    <div class="drop drop-2"></div>

    <div class="drop drop-3"></div>

    <div class="drop drop-4"></div>

    <div class="drop drop-5"></div>

  </div>





</body>



</html>