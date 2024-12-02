<?php
include_once('koneksi.php');

if(isset($_GET['c'])){

  include_once('./page/confirm transaction.html');
?>
<link rel="stylesheet" href="assets/CSS/product.css" />
<div class="product"> 
    <div class="product-userInput">
      <h3><span class="number">1</span>Masukkan Player ID</h3>
      <div class="product-content">
        <input type="text" id="gid"/>
        <p class="input-info">
          *id player berada pada profil atau pada pengaturan permainan
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
            <img src="<?=$dataa['gambar_barang']?>" id="item-img" />
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
              <button id="buy-button" onclick="preShowCT()">Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    let item = {name:"",id:null,price:null,img:""};
    let payment = {name:"",id:null,fee:null};
    let prevISpotlight=null,ISpotight=null;
    let prevPSpotlight=null,PSpotight=null;
    let allPayment = document.querySelectorAll(".payment-card");
    let allItem = document.querySelectorAll(".item-card");
    function changeItem(comp){
        ISpotight=comp;
        if(prevISpotlight!=null){prevISpotlight.classList.remove("item-choosen");}
        prevISpotlight=comp;
        ISpotight.classList.add("item-choosen");
        item.id = comp.querySelector("#item-id").value;
        item.name = comp.querySelector("#item-name").textContent;
        item.img = comp.querySelector("#item-img").src;
        item.price = parseInt(comp.querySelector("#item-price").value);
        for(let i=0;i<allPayment.length;i++){
            allPayment[i].querySelector("#price").textContent = `Rp. ${formatNumber(item.price+parseInt(allPayment[i].querySelector("#payment-fee").value))}`;
        }
        if(PSpotight==null) changePayment(allPayment[0]);
        else changeBuy();
    }
    function changePayment(comp){
        PSpotight=comp;
        if(prevPSpotlight!=null){prevPSpotlight.classList.remove("payment-choosen");}
        prevPSpotlight=comp;
        PSpotight.classList.add("payment-choosen");
        payment.name = comp.querySelector("#payment-name").textContent;
        payment.id = comp.querySelector("#payment-id").value;
        payment.fee = parseInt(comp.querySelector("#payment-fee").value);
        if(item.id==null) changeItem(allItem[0]);
        changeBuy();
    }
    function changeBuy(){
        document.querySelector(".product-buy").style.display="block";
        document.querySelector("#detail-item").textContent = item.name;
        document.querySelector("#detail-payment").textContent = payment.name;
        document.querySelector("#detail-price").textContent = `Rp. ${formatNumber(item.price+payment.fee)}`;
    }
    function preShowCT(){
      let gid = document.querySelector("#gid");
      if(gid.value.trim().length==0){
        gid.focus();
        alert("Masukan player id!!");
      }else{
        showCT(gid.value, item, payment);
      }
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
    for(let i=0;i<allItem.length;i++){
        allItem[i].querySelector(".item-bot").textContent = "Rp. "+formatNumber(allItem[i].querySelector(".item-bot").textContent);
    }
  </script>
<?php
}else{
  include "page/catalog.php";
}
?>