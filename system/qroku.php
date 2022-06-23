
<?php
$qrcode = new Zxing\QrReader('path/3131.png');
$text = $qrcode->text(); //return decoded text from QR Code
echo $text;
$msg = "";
    session_start();
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "path/".$filename;
    
    
    // $sql = "INSERT INTO imagepath (adminsettings) VALUES ('$filename')";
    
        // mysqli_query($db, $sql);
         
        // if (move_uploaded_file($tempname, $folder))  {
            // $msg = "Image uploaded successfully";
        // }else{
            // $msg = "Failed to upload image";
      move_uploaded_file($tempname, $folder);
      $result = mysqli_query($db, "SELECT * FROM adminsettings WHERE id=1");
       $data = mysqli_fetch_array($result);
      $_SESSION["upload"] = 1;
      $_SESSION["word"] = $data["word"];
      $_SESSION["pathimage"] = "./path/".$filename;
      header("Location: ./index.php");
?>