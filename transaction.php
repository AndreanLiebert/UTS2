<!DOCTYPE php, name : transaction.php> 
<html>
  <head>
    <title>TopUp Zone</title>
    <link rel="stylesheet" href="./assets/CSS/global.css" />
    
  </head> 
  <body>
    <?php
    require_once "./koneksi.php";
    include "./fungsi.php";
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    $id = $_SESSION['id'];
    if(isset($_POST['create'])){
      $id = $_SESSION['id'];
      $trid = str_split(strrev($id),strlen($id)/2)[0].$_POST['i-trid'];
      $iid = $_POST['i-iid'];
      $pid = $_POST['i-pid'];
      $gid = $_POST['i-gid'];
      $tax = $_POST['i-tax'];
      $total = $_POST['i-total'];
      $dorder= new DateTime();
      $dorder = $dorder->format("Y-m-d H:i:s");
      $dexp= new DateTime();
      $dexp->add(new DateInterval("PT15M"));
      $dexp = $dexp->format("Y-m-d H:i:s");
      
      $q1 = mysqli_query($mysqli, 
      "INSERT INTO tbl_transaksi (`id_transaksi`,`id_pengguna`,`id_produk`,`id_pembayaran`,`data_player`,`tanggal_pemesanan`,`tanggal_kadaluarsa`,`pajak`,`total`) 
      VALUES ('$trid','$id','$iid','$pid','$gid','$dorder','$dexp','$tax','$total')");
      ?>
      <meta http-equiv="refresh" content="1; url=transaction.php?trid=<?=$trid?>" />
      <?php
    }else if(isset($_POST['buy'])){
      $trid = $_GET['trid'];
      $q2=mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$trid' AND id_pengguna='$id'");
      if(mysqli_num_rows($q2)==0){
        ?>
        <p>Transaksi tidak ada</p>
        <meta http-equiv="refresh" content="1; url=index.php" />
        <?php
      }else{
        $eo = mysqli_fetch_array($q2)['tanggal_kadaluarsa'];
        $eo = new DateTime($eo);
        $date = new DateTime();
        if($eo>$date){
          $date = $date->format("Y-m-d H:i:s");
          $q3=mysqli_query($mysqli, "UPDATE tbl_transaksi SET tanggal_pembayaran='$date' WHERE id_transaksi='$trid'");
          if($q3){
            $qtr = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$trid' AND id_pengguna='$id'");
            $rqtr = mysqli_fetch_array($qtr);
            $ipd=$rqtr['id_produk'];
            $ip=$rqtr['id_pembayaran'];
            $total=$rqtr['total'];
            $do=$rqtr['tanggal_pembayaran'];
            $do = str_replace("-","/",$do);

            $qpd = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk='$ipd'");
            $rqpd = mysqli_fetch_array($qpd);
            $ii=$rqpd['id_barang'];
            
            $qp = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran WHERE id_pembayaran='$ip'");
            $rqp = mysqli_fetch_array($qp);
            $imgp=$rqp['gambar_pembayaran'];
            
            $qi = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$ii'");
            $rqi = mysqli_fetch_array($qi);
            $ni=$rqi['nama_barang'];
            $ig=$rqi['id_game'];

            $qg = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$ig'");
            $rqg = mysqli_fetch_array($qg);
            $ng=$rqg['nama_game'];     
            ?>
            <link rel="stylesheet" href="./assets/CSS/payment.css" />
            <div class="payment flexy">
                <div class="back">
                    <div class="header">
                        
                    </div>
                    <div class="top flexy">
                        <div class="correct">&#10004;</div>
                        <p>Pembayaran</p>
                        <p>Berhasil</p>
                    </div>
                    <div class="bot">
                        <div class="predetail">
                            <div class="detail flexy">
                                <p>Pembelian Anda</p>
                                <h3><?=$ng?>-<?=$ni?></h3>
                                <table>
                                    <tr>
                                        <td>Pedagang</td>
                                        <td><?=$ng?></td>
                                    </tr>
                                    <tr>
                                        <td>Metode Pembayaran</td>
                                        <td><img src="<?=$imgp?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Total</td>
                                        <td id="price">Rp. <?=formatNumber($total)?></td>
                                    </tr>
                                </table>
                            </div>
                            <h3 id="title">Rincian tagihan</h3>
                            <p id="title-idtr">ID transaksi</p>
                            <p id="idtransaction"><?=$trid?></p>
                            <p id="title-date">Tanggal pembayaran</p>
                            <p id="date"><?=$do?></p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
              setTimeout(()=>{
                window.location.href = "index.php?page=account";
              },20000);
            </script>
            <?php
          }else{
            ?>
            <p>Gagal melanjutkan</p>
            <meta http-equiv="refresh" content="1; url=index.php" />
            <?php
          }
        }else{
          ?>
          <p>Transaksi sudah kadaluarsa</p>
          <meta http-equiv="refresh" content="1; url=index.php" />
          <?php
        }
      }
    }else if(isset($_POST['cancel'])){
      $trid = $_GET['trid'];
      $qtr = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$trid' AND id_pengguna='$id'");
      if(mysqli_num_rows($qtr)==0){
        ?>
        <p>Data tidak ada</p>
        <meta http-equiv="refresh" content="1; url=index.php" />
        <?php
        return;
      }else{
        $qtr = mysqli_query($mysqli, "DELETE FROM tbl_transaksi WHERE id_transaksi='$trid'");
        ?>
        <p>Transaksi dibatalkan</p>
        <meta http-equiv="refresh" content="1; url=index.php" />
        <?php
        return;
      }
      
    }else if(isset($_GET['trid'])){
      $trid = $_GET['trid'];
      $qtr = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$trid' AND id_pengguna='$id'");
      if(mysqli_num_rows($qtr)==0){
        ?>
        <p>Data tidak ada</p>
        <meta http-equiv="refresh" content="1; url=index.php" />
        <?php
        return;
      }
      $rqtr = mysqli_fetch_array($qtr);
      if($rqtr['tanggal_pembayaran']!=null){
        $qtr = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$trid' AND id_pengguna='$id'");
        $rqtr = mysqli_fetch_array($qtr);
        $ipd=$rqtr['id_produk'];
        $ip=$rqtr['id_pembayaran'];
        $total=$rqtr['total'];
        $do=$rqtr['tanggal_pembayaran'];
        $do = str_replace("-","/",$do);

        $qpd = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk='$ipd'");
        $rqpd = mysqli_fetch_array($qpd);
        $ii=$rqpd['id_barang'];

        $qp = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran WHERE id_pembayaran='$ip'");
        $rqp = mysqli_fetch_array($qp);
        $imgp=$rqp['gambar_pembayaran'];

        $qi = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$ii'");
        $rqi = mysqli_fetch_array($qi);
        $ni=$rqi['nama_barang'];
        $ig=$rqi['id_game'];
        $qg = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$ig'");
        $rqg = mysqli_fetch_array($qg);
        $ng=$rqg['nama_game'];     
        ?>
        <link rel="stylesheet" href="./assets/CSS/payment.css" />
        <div class="payment flexy">
            <div class="back">
                <div class="header">
                    
                </div>
                <div class="top flexy">
                    <div class="correct">&#10004;</div>
                    <p>Pembayaran</p>
                    <p>Berhasil</p>
                </div>
                <div class="bot">
                    <div class="predetail">
                        <div class="detail flexy">
                            <p>Pembelian Anda</p>
                            <h3><?=$ng?>-<?=$ni?></h3>
                            <table>
                                <tr>
                                    <td>Pedagang</td>
                                    <td><?=$ng?></td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td><img src="<?=$imgp?>" alt=""></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total</td>
                                    <td id="price">Rp. <?=formatNumber($total)?></td>
                                </tr>
                            </table>
                        </div>
                        <h3 id="title">Rincian tagihan</h3>
                        <p id="title-idtr">ID transaksi</p>
                        <p id="idtransaction"><?=$trid?></p>
                        <p id="title-date">Tanggal pembayaran</p>
                        <p id="date"><?=$do?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
      }else{
        $total = $rqtr['total'];
        $expdate = $rqtr['tanggal_kadaluarsa'];
        $prid= $rqtr['id_produk'];
        $pyid = $rqtr['id_pembayaran'];

        
        $qpy = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran WHERE id_pembayaran='$pyid'");
        $rqpy = mysqli_fetch_array($qpy);
        $imgpy = $rqpy['gambar_pembayaran'];
        
        $qpr = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk='$prid'");
        $rqpr = mysqli_fetch_array($qpr);
        $iid = $rqpr['id_barang'];
        
        $qi = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$iid'");
        $rqi = mysqli_fetch_array($qi);
        $iname = $rqi['nama_barang'];
        $gid = $rqi['id_game'];

        $qg = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$gid'");
        $rqg = mysqli_fetch_array($qg);
        $gname = $rqg['nama_game'];
        
        
        ?>
        <link rel="stylesheet" href="./assets/CSS/transaction.css" />
        <div class="transaction">
          <div class="tr-card">
              <div class="tr-header"></div>
              <div class="tr-content">
                  <div class="tr">
                      <p>Pembelian anda</p>
                      <h4><?=$gname?>-<?=$iname?></h4>
                      <div class="tr-seller">
                          <p>Pedagang</p>
                          <p><?=$gname?></p>
                      </div>
                      <div class="tr-payment">
                          <p>Metode Pembayaran</p>
                          <img src="<?=$imgpy?>" alt="">
                      </div>
                      <div class="tr-total">
                          <p>Jumlah Total</p>
                          <p id="total">Rp. 99.999.999</p>
                      </div>
                  </div>
                  <div class="timer">
                      <p>Silakan selesaikan pembayaran Anda dalam</p>
                      <p id="timer">0:00:00</p>
                  </div>
                  <p>Tekan lanjutkan untuk menyelesaikan pembayaran anda</p>
                  <div class="control">
                      <form action="" method="POST">
                        <button name="buy">Lanjutkan</button>
                      </form>
                      <hr>
                      <form action="" method="POST">
                        <button name="cancel" id="cancel">Batalkan transaksi ini</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <script src="./assets/JS/global.js"></script>
      <script>
          document.getElementById("total").textContent = `Rp. ${formatNumber(<?=$total?>)}`
          let date = "<?=$expdate?>".replace(' ','T');
          let time = new Date(date);
          let timer = document.getElementById("timer");
          let min;let sec;let intv;
          if(time>Date.now()){
              intv = setInterval(()=>{
                sec = Math.floor((time-Date.now())/1000%60);
                min = Math.floor((time-Date.now())/1000/60);
                  if(min<=0&&sec<=0){ 
                      clearInterval(intv)
                  }
                  timer.textContent=`0:${min.toString().padStart(2,"0")}:${sec.toString().padStart(2,"0")}`;
              },1000)
          }
      </script>
      <?php
      }
    }
    ?>
  </body>
</html>