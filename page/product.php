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
      <div class="product-content">
      <?php
      $sql     = "SELECT * FROM tbl_produk WHERE id_game = ".$_GET['c'];
      $query   = mysqli_query($mysqli,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
        <div class="item-card" onclick="changeItem(this,<?=$data['harga_produk']?>)">
          <div class="item-top">
            <h4><?=$data['jumlah_produk']?> <?=$data['nama_produk']?></h4>
            <img src="<?=$data['gambar_produk']?>" />
          </div>
          <div class="item-bot">Rp. <?=$data['harga_produk']?></div>
        </div>
      <?php
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
          <input type="text" id="tax" value="<?=$data['pajak_pembayaran']?>" hidden>
          <div class="payment-left">
            <img src="<?=$data['gambar_pembayaran']?>" alt="" />
            <p><?=$data['nama_pembayaran']?></p>
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

    <div class="product-buy">
      <h3><span class="number">4</span>Beli</h3>
      <div class="product-content">
        <div class="buy">
          <p class="rule">
            Pastikan informasi akun player benar, kesalahan penulisan
            bukan tanggung jawab kami.
          </p>

          <div class="buy-detail">
            <div class="buy-left">
              <p id="detail">5 Diamonds <span class="dot"></span> Shopee Pay</p>
              <p id="price">Rp. 99.999.999</p>
              <p class="info">*Sudah termasuk pajak</p>
            </div>
            <div class="buy-right">
              <button>Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/product.js"></script>
<?php
}else{
  include "page/catalog.php";
}
?>