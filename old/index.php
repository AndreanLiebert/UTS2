
<!DOCTYPE php, name : index.php>
<?php
if(isset($_SESSION['username'])){
  echo "asep";
}else{
  echo "aseps";
  $_SESSION['username'] = "asaaaas";
  
}
?>
<html>
  <head>
    <title>website Sahabsat Mancng update</title>
    <link rel="stylesheet" href="CSS/popup.css" />
    <link rel="stylesheet" href="CSS/tampilan.css" />
  </head>
  <body>
    <div class="header">
      <?php include"page/header.html"?>
    </div>
    <div id="navbar">
      <?php include"page/menu.html"?>
    </div>
    <?php include"page/runningteks.html"?>

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
