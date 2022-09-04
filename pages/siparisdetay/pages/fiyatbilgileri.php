
    <div class="subscription">
      <h1>Fiyat Hakkinda</h1>
      <h2>Urun Fiyati</h2>
      <input type="text" name="" placeholder=<?php echo $row["urunfiyat"]?> id="">
      <h2>Kapora</h2>
      <input type="text" name="" placeholder=<?php echo $row["kapora"]?> id=""><button class="btn">update</button>
      <h2>Kalan Borc</h2>
      <input type="text" name="" placeholder=<?php echo $borc = $row["urunfiyat"]-$row["kapora"]?> id="">
    </div>