<?php
include_once('koneksi.php');

if(isset($_GET['c'])){

?>

<div class="product"> 
    <div class="product-userInput">
      <h3><span class="number">1</span>Masukkan Player ID</h3>
      <div class="product-content">
        <input type="text" />
        <p class="input-info">
          *id player berada dibawah telapak kaki ibu
        </p>
      </div>
    </div>

    <div class="product-item">
      <h3><span class="number">2</span>Pilih Nominal Top Up</h3>
      <?php
      $sqll     = "SELECT * FROM tbl_barang WHERE id_game = ".$_GET['c'];
      $queryy   = mysqli_query($mysqli,$sqll);
      while($dataa = mysqli_fetch_array($queryy)){
      ?>
      <h4><?=$dataa['nama_barang']?></h4>
      <div class="product-content">
      <?php
        $iid= $dataa['id_barang'];
        $sql     = "SELECT * FROM tbl_produk WHERE id_barang ='$iid' ORDER BY jumlah_produk ASC";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
      ?>
        <div class="item-card" onclick="changeItem(this)">
          <input type="text" value="<?=$data['id_produk']?>" id="item-id" hidden>
          <input type="text" value="<?=$data['harga_produk']?>" id="item-price" hidden>
          <div class="item-top">
            <h4 id="item-name"><?=$data['jumlah_produk']?> <?=$dataa['nama_barang']?></h4>
            <img src="<?=$dataa['gambar_barang']?>" />
          </div>
          <div class="item-bot"><?=$data['harga_produk']?></div>
        </div>
      <?php
        }
      }
      ?>
      </div>
    </div>

    <div class="product-payment">
      <h3><span class="number">3</span>Pilih Pembayaran</h3>

      <div class="product-content">
      <?php
      $sql     = "SELECT * FROM tbl_pembayaran";
      $query   = mysqli_query($mysqli,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
        <div class="payment-card" onclick="changePayment(this)">
          <input type="text" id="payment-fee" value="<?=$data['biaya_pembayaran']?>" hidden>
          <input type="text" id="payment-id" value="<?=$data['id_pembayaran']?>" hidden>
          <div class="payment-left">
            <img src="<?=$data['gambar_pembayaran']?>" alt="" />
            <p id="payment-name"><?=$data['nama_pembayaran']?></p>
          </div>
          <div class="payment-right">
            <p id="price"></p>
          </div>
        </div>
      <?php
      }
      ?>
      </div>
    </div>

    <div class="product-buy" style="display: none;">
      <h3><span class="number">4</span>Beli</h3>
      <div class="product-content">
        <div class="buy">
          <p class="rule">
            Pastikan informasi akun player benar, kesalahan penulisan
            bukan tanggung jawab kami.
          </p>

          <div class="buy-detail">
            <div class="buy-left">
              <p><span id="detail-item"></span><span class="dot"></span><span id="detail-payment"></span></p>
              <p id="detail-price"></p>
              <p class="info">*Belum termasuk pajak</p>
            </div>
            <div class="buy-right">
              <button id="buy-button">Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/JS/product.js"></script>
<?php
}else{
  include "page/catalog.php";
}
?>