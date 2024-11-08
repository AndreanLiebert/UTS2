<?php
 include_once('koneksi.php');
 ?>







<html>
  <head> 

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css"> 
  </head>
  <body>

  <?php
        $sql     = 'SELECT * FROM produk';
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
          
        }
    ?>
    <div class="card">
      <!-- home, cv, galery, contact -->
      <h1>Rekomendasi Alat Pancing Pemula</h1>
      <div class="catalog">
        <div
          class="card-catalog enable-cc"
          onclick=""
          id="iid-dbm"
        >
          <img class="img-catalog" src="gambar/bc.jpg" alt="gambar pancing" />
          <h3 class="title-catalog">1 set pancing bc(bait casting)</h3>
          <p>Rp.200.000</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang</a>
        </div>

        <div
          class="card-catalog enable-cc"
          onclick=""
          id="iid-cs"
        >
          <img class="img-catalog" src="gambar/sp.jpg" alt="gambar pancing" />
          <h3 class="title-catalog">1 set pancing Spinning</h3>
          <p>Rp.180.000</p>
          <br />
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang</a>
        </div>

        <div class="card-catalog enable-cc" onclick="" id="iid-sl">
          <img class="img-catalog" src="gambar/box.jpg" alt="gambar box" />
          <h3 class="title-catalog">Toolbox Perlatan Mancing H-415</h3>
          <p>Rp.64.000</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang</a>
        </div>

        <br />
        <h1>Rekomendasi Alat Pancing Profesional</h1>
        <div class="card-catalog enable-cc" onclick="" id="iid-sl">
          <img class="img-catalog" src="gambar/shimano.jpg" alt="gambar reel" />
          <h3 class="title-catalog">Reel BC Shimano SLX DC XT 151XG</h3>
          <p>Rp.2.650.000</p>
          <br />
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang</a>
        </div>
        <div class="card-catalog enable-cc" onclick="" id="iid-sl">
          <img class="img-catalog" src="gambar/relix.jpg" alt="gambar reel" />
          <h3 class="title-catalog">Reel BC Relix Nusantara Fury 101</h3>
          <p>Rp.800.000</p>
          <br />
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang</a>
        </div>
        <div class="card-catalog enable-cc" onclick="" id="iid-sl">
          <img
            class="img-catalog"
            src="gambar/shimano sp.jpg"
            alt="gambar reel"
          />
          <h3 class="title-catalog">
            Reel Spinning Shimano Stella SW 2019 2020-SW4000HG
          </h3>
          <p>Rp.9.000.000</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+Reel-BCnya+?" class="btn">Pesan Sekarang2</a>
        </div>
      </div>
    </div>
  </body>
</html>
