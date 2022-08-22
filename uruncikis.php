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
            <textarea id="scannedTextMemo" class="textInput form-memo form-field-input textInput-readonly" rows="3" readonly>
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
            <form action="../determinationsystems/arakatmanforqr.php?yonlendirecekyer=urungirisi" method="POST">
            <textarea id="scannedTextMemoHist" name='sikennidtext' class="textInput form-memo form-field-input textInput-readonly" value="" rows="6" readonly>
            </textarea>
            <button type="submit">GONDER</button>
            </form>
          </div>
        </div>
      </div>
      <br>
    </div>
  <script type="text/javascript">
var b;
    function onQRCodeScanned(scannedText)
    {
      var scannedTextMemo = document.getElementById("scannedTextMemo");
      var scannedTextMemoHist = document.getElementById("scannedTextMemoHist");
    	
      
      if(scannedTextMemoHist)
    	{
        if(scannedTextMemo.value != scannedText) {
        scannedTextMemoHist.value = scannedTextMemoHist.value + ', ' + scannedText;
      }
      }
      if(scannedTextMemo)
    	{
    		scannedTextMemo.value = scannedText;
    	}
      
    }
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
        jbScanner.setSnapImageMaxSize(300);
        jbScanner.setScanInterval(1500)
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
    		jbScanner.appendTo(scannerParentElement);
    	}
    }
    <?php
    ?>
  </script>
  </body>
</html>