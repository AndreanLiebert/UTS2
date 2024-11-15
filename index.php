<!DOCTYPE php, name : index.php>
<html>
  <head>
    <title>TopUp Zone</title>
    <!-- <link rel="stylesheet" href="CSS/product.css" /> -->
    <link rel="stylesheet" href="assets/CSS/catalog.css" />
    <link rel="stylesheet" href="assets/CSS/product.css" />
    <link rel="stylesheet" href="assets/CSS/global.css" />
  </head> 
  <body>
    
    <div class="header">
      <img src="assets/images/web/header.png" width="100%" height="230px" />
    </div>

    <div id="navbar">
      <a href="index.php?page=home">Topup Zone</a>
      <a href="index.php?page=home">Akun</a>
    </div>
    
    <marquee>Selamat datang di TopupZone,Tempat topup favorit semua orang</marquee>

    <div class="row">
      
      <div class="leftcolumn">
        <div class="card">
          <?php include"page/paging.php"?>
        </div>
      </div>

      <div class="rightcolumn">
        <div class="card">
          <h2>aboutxx</h2>
          <p>data aboutxx</p>
        </div>

        <div class="card er">
          <h2>SOSIAL MEDIA</h2>
          <p>
            Join sosial media Sahabat Mancing untuk saling berinteraksi sesama
            angler.
          </p>
          <div class="sosmed">
            <a
              href="https://chat.whatsapp.com/JmlB87cH1Co3bkqXyCUOuy"
              target="_blank"
              ><img src="gambar/wa.png" alt="" />Whatsapp</a
            >
          </div>
          <div class="sosmed">
            <a
              href="https://www.facebook.com/groups/1491049075102696/"
              target="_blank"
              ><img src="gambar/fb.png" alt="" />Facebook</a
            >
          </div>
        </div>
      </div>

    </div>

    <div class="footer">
      <p>Copyleft &copy;TopupZone 2024</p>
    </div>

    <script src="assets/JS/aksi.js"></script>
    <script src="assets/JS/global.js"></script>
  </body>
</html>
 