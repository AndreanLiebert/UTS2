<!DOCTYPE php, name : index.php>
<html>
  <head>
    <title>TopUp Zone</title>
    <link rel="stylesheet" href="assets/CSS/global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head> 
  <body>
    <?php
      require_once "./koneksi.php";
      session_start();
      date_default_timezone_set("Asia/Jakarta");
      $name;
      // $queryGame = mysqli_query($mysqli, "SELECT * FROM tbl_game");
      // $jumlahGame = mysqli_num_rows($queryGame);
      // $data=mysqli_fetch_array($queryGame);
      include_once "./fungsi.php";
      if(!isset($_SESSION['id'])){
        $name = createNewGuest();
      }else{
        $id = $_SESSION['id'];
        $q1 = mysqli_query($mysqli, "SELECT nama_pengguna FROM tbl_pengguna WHERE id_pengguna ='$id'");
        if(mysqli_num_rows($q1)==0){
          $name = createNewGuest();
        }else if(isset($_SESSION['password'])){
          $pass = $_SESSION['password'];
          $q2 = mysqli_query($mysqli, "SELECT nama_pengguna FROM tbl_pengguna WHERE id_pengguna ='$id' and password_pengguna='$pass'");
          if(mysqli_num_rows($q2)==0){
            $name = createNewGuest();
            $_SESSION['password'] = null;
          }else{
            $name = mysqli_fetch_array($q2)['nama_pengguna'];
          }
        }else{
          $name = mysqli_fetch_array($q1)['nama_pengguna'];
        }
      }
    ?>
    <div class="header">
      
    </div>

    <div id="navbar">
      <a href="index.php?page=home">Topup Zone</a>
      <a href="index.php?page=account"><?=$name?></a>
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
          <h2>Tentang Kami</h2>
          <p>Kami adalah TopUp Zone, platform top up game terpercaya yang berkomitmen memberikan pengalaman bertransaksi yang mudah dan cepat.</p>
          <p>Visi kami adalah menjadi platform top up game nomor satu di Indonesia. Misi kami adalah menyediakan layanan top up game yang aman, cepat, dan mudah untuk semua gamers.</p>
          <p>Tim kami terdiri dari para profesional yang berpengalaman di bidang game dan teknologi. Kami selalu berusaha memberikan yang terbaik untuk para pelanggan.</p>
          <p>Kami menjamin keamanan data pribadi Anda. Semua transaksi yang dilakukan di TopUp Zone dijamin aman dan terpercaya.</p>
        </div>

        <div class="card er">
          <h2>Hubungi Kami</h2>
          <div class="sosmed">
            <a href=""
              target="_blank"
              ><img src="./assets/images/web/wa.png" alt="" />086969555</a
            >
          </div>
          <div class="sosmed">
            <a
              href=""
              target="_blank"
              ><img src="./assets/images/web/tel.png" alt="" />@topupzone21</a
            >
          </div>
          <div class="sosmed">
            <a
              href=""
              target="_blank"
              ><img src="./assets/images/web/ig.png" alt="" />@topupzonegacor</a
            >
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <p>Copyright &copy;TopupZone 2024</p>
    </div>
    <script src="assets/JS/aksi.js"></script>
    <script>
      function changeCatalog(game_id){
          window.location.href = `index.php?page=catalog&c=${game_id}`;
      }
      function toTransaction(tridd){
        if(tridd==null)return;
        window.location.href = `transaction.php?trid=${tridd.querySelector("#itr").textContent}`;
      }
      function formatNumber(num){
          if(num.toString().length<4) return num;
          let dot = 1;
          let rtn ="";
          for(let i=num.toString().length-1;i>=0;i--){
              rtn = (dot>=3&&i!=0?`.${num.toString()[i]}`:num.toString()[i]) + rtn;
              dot = dot>=3?1:(dot+1);
          }
          return rtn;
      }
    </script>
  </body>
</html>
 