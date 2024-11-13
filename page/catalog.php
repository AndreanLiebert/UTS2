<?php
include_once('koneksi.php');

if(isset($_GET['c'])){
  include "page/product.php";
}else{

?>

<h1>Rekomendasi</h1>
<div class="catalog" style="margin-bottom: 50px;">
  <?php
    $sql     = "SELECT * FROM tbl_game WHERE kategori_game ='rekomendasi'";
    $query   = mysqli_query($mysqli,$sql);
    while($data = mysqli_fetch_array($query)){
  ?>
  <div class="card-catalog" onclick="changeCatalog(<?=$data['id_game']?>)">
    <img class="img-catalog" src="<?=$data['gambar_game']?>" />
    <p class="title-catalog"><?=$data['nama_game']?></p>
  </div>
  <?php
    }
  ?>
</div>

<hr />
<h1 style="margin-top: 20px">Produk Lainnya</h1>
<div class="catalog" style="margin-bottom: 50px;">
  <?php
    $sql     = "SELECT * FROM tbl_game";
    $query   = mysqli_query($mysqli,$sql);
    while($data = mysqli_fetch_array($query)){
  ?>
  <div class="card-catalog" onclick="changeCatalog(<?=$data['id_game']?>)">
    <img class="img-catalog" src="<?=$data['gambar_game']?>" />
    <p class="title-catalog"><?=$data['nama_game']?></p>
  </div>
  <?php
    }
  ?>
</div>
<?php
}
?>