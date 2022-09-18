<!doctype html>
<!-- The DOCTYPE declaration above will set the     -->
<!-- browser's rendering engine into                -->
<!-- "Standards Mode". Replacing this declaration   -->
<!-- with a "Quirks Mode" doctype is not supported. -->

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Consider inlining CSS to reduce the number of requested files -->
    <!--                                                               -->
    <!-- <link type="text/css" rel="stylesheet" href="JsQRScanner.css"> -->

    <!--                                           -->
    <!-- Any title is fine                         -->
    <!--                                           -->
    <title>Qr Kod Okutma</title>
    
    <!--                                           -->
    <!-- This script loads your compiled module.   -->
    <script type="text/javascript" src="./js/jsqrscanner.nocache.js"></script>
  </head>
  <body>
    <div class="row-element-set row-element-set-QRScanner">
    <!-- RECOMMENDED if your web app will not function without JavaScript enabled -->
    <noscript>
      <div class="row-element-set error_message">
        Your web browser must have JavaScript enabled
        in order for this application to display correctly.
      </div>
    </noscript>
    <div class="row-element-set error_message" id="secure-connection-message" style="display: none;" hidden >
      Eger Hata Aliyorsaniz 
      <?php
      echo $thispage = $_SERVER['PHP_SELF'];
      echo $domain = $_SERVER['HTTP_HOST'];
      $url = strval($domain).strval($thispage);
      ?>
      <a href=<?php echo "https://". $url; ?> >BURAYA</a> 
      basin.
    </div>  
    <script>
    if (location.protocol != 'https:') { 
      document.getElementById('secure-connection-message').style='display: block';
      }
      </script> 
      <h1>Qr Kod Okuma</h1>
      <div class="row-element">
        <div class="FlexPanel detailsPanel QRScannerShort">
          <div class="FlexPanel shortInfoPanel">
            <div class="gwt-HTML">
              QR Kodunu kameraya yakinlastirin
            </div>
            <div>
                <h1>Urunler</h1>
                <ul id="urunler"></ul>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row-element">
        <div class="qrscanner" id="scanner">
        </div>
      </div>
      <div class="row-element">
        <div class="form-field form-field-memo">
          <div class="form-field-caption-panel">
            <div class="gwt-Label form-field-caption">
              En Son Okunan
            </div>
          </div>
          <div class="FlexPanel form-field-input-panel">
            <textarea id="scannedTextMemo" class="textInput form-memo form-field-input textInput-readonly" rows="3" >
            </textarea>
          </div>
        </div>
        <div class="form-field form-field-memo">
          <div class="form-field-caption-panel">
            <div class="gwt-Label form-field-caption">
            Cikarilacak Urunler
            </div>
          </div>
          <div class="FlexPanel form-field-input-panel">
            <form action="../determinationsystems/siparisqrokuttum.php?siparisid=1" method="POST">
            <textarea id="scannedTextMemoHist" name='sikennidtext' class="textInput form-memo form-field-input textInput-readonly" value="" rows="6" readonly>
            </textarea>
            <button type="submit" id="buttonforqr" disabled>GONDER</button>
            </form>
          </div>
        </div>
      </div>
      <br>
    </div>
  <script type="text/javascript">
    document.getElementById("buttonforqr").disabled = true;
    const urunler = [];
    // urunler.push("asd"); urunler.push("asdf");
                      <?php
                  include("../system/connection.php");
                  $siparisid = $_GET["siparisid"];
                  $sql = "SELECT * FROM siparisler WHERE id='$siparisid'";
                  $result = $conn->query($sql);
                  $row = mysqli_fetch_array($result);
                  $musteriismi = $row["adsoyad"];
                  $tarihi = $row["tarih"];
                  $kontroletsql = "SELECT * FROM siparisler WHERE adsoyad='$musteriismi' AND tarih='$tarihi'";
                  $kontroletresult = $conn->query($kontroletsql);
                  while($kontroletrow = mysqli_fetch_array($kontroletresult)){
                    echo "urunler.push('" . $row["urunisim"] . "');";
                  }
                  ?>


                  console.log(urunler.length);
        
const urunlerEl = document.getElementById('urunler')
urunler.forEach(urun => {
    const el = `<li class="urun">${urun}</li>`
    urunlerEl.innerHTML += el
})

const input = document.getElementById('scannedTextMemo')


    const check = () => {
            const data = input.value.trim()

            for(i=0; i <= urunler.length; i++) {
              const urun = urunler.includes(urunler[i])
                if(urun) {
                  if(document.querySelectorAll('li')[i].style.backgroundColor == 'green') {
                  } else {
                    document.querySelectorAll('li')[i].style.backgroundColor = 'green';
                    return;
                  }
                } 
              }}

        const setInput = data => {
            input.value = data
            check()
            controlgreen()
        }

        
        input.addEventListener('input' , e => {
            const data = e.target.value.trim()
            
            check()
            
        })
        // setInterval(check , 1000)

var b;
    function provideVideo()
    {
        var n = navigator;

        if (n.mediaDevices && n.mediaDevices.getUserMedia)
        {
          return n.mediaDevices.getUserMedia({
            video: {
              facingMode: "environment"
            },
            audio: false
          });
        } 
        
        return Promise.reject('Your browser does not support getUserMedia');
    }

    function onQRCodeScanned(scannedText)
    {
      var scannedTextMemo = document.getElementById("scannedTextMemo");
      var scannedTextMemoHist = document.getElementById("scannedTextMemoHist");
    	
      if(scannedText) {
        scannedTextMemo.value = setInput(scannedText)
      }
      
      if(scannedTextMemoHist)
    	{
        if(scannedTextMemo.value != scannedText) {
        scannedTextMemoHist.value = scannedTextMemoHist.value + ', ' + scannedText;
      }
      }
      if(scannedTextMemo)
    	{
    		scannedTextMemo.value = scannedText
        
    	}
      
    }

    function provideVideoQQ()
    {
        return navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var exCameras = [];
            devices.forEach(function(device) {
              if (device.kind === 'videoinput') {
                exCameras.push(device.deviceId)
              }
            });
            
            return Promise.resolve(exCameras);
        }).then(function(ids){
            if(ids.length === 0)
            {
              return Promise.reject('Could not find a webcam');
            }
            
            return navigator.mediaDevices.getUserMedia({
                video: {
                  'optional': [{
                    'sourceId': ids.length === 1 ? ids[0] : ids[1]//this way QQ browser opens the rear camera
                    }]
                }
            });        
        });                
    }
    
    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady()
    {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
        //reduce the size of analyzed image to increase performance on mobile devices
        // jbScanner.setSnapImageMaxSize(300);
        jbScanner.setScanInterval(1500)
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
    		jbScanner.appendTo(scannerParentElement);
    	}
    }

    function controlgreen() {
      j = 0
      for (let index = 0; index <= urunler.length; index++) {
        if(document.querySelectorAll('li')[index].style.backgroundColor == 'green') {
          j++
          console.log(j)
          if(j == urunler.length) {
          document.getElementById("buttonforqr").disabled = false;
          // alert("Tüm ürünler alındı");
        }
        }      

      }
    }

    setInterval(controlgreen, 1000);
    <?php
    ?>
  </script>
  </body>
</html>