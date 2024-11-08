<!DOCTYPE php, name : index.php>
<html>
  <head>
    <title>website Sahabat Mancing update</title>
    <link rel="stylesheet" href="CSS/popup.css" />
    <link rel="stylesheet" href="CSS/tampilan.css" />
  </head>
  <body>
    
    <div class="header">
      <img src="gambar/header.png" width="100%" height="230px" />
    </div>

    <div id="navbar">
      <a href="index.php?page=home">Home</a>
    </div>
    
    <marquee>Selamat datang di Sahabat Mancing,anda sopan kami Mancing</marquee>

    <div class="row">
      
      <div class="leftcolumn">
        <div class="card">
          <?php include"page/paging.php"?>
        </div>
      </div>

      <div class="rightcolumn">
        <div class="card">
          <?php include"page/about.php"?>
        </div>

        <div class="card er">
          <?php include"page/sosialmedia.html"?>
        </div>
      </div>

    </div>

    <div class="footer">
      <?php include"page/footer.html"?>
    </div>

    <script src="js/aksi.js"></script>
    <script src="js/render.js"></script>
  </body>
</html>
 