<?php
 include_once('koneksi.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<div class="container d-flex align-items-center text-center">
    <h1>Toko Sahabat Mancing</h1>
   
</div>
<div class="card">
  <h1>Produk Terlaris</h1>
  <div class="catalog" style="margin-bottom: 50px;">
    <?php
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
     <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
     <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
    <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
    ?>
    </div>
    <hr>
    
  <h1 style="margin-top: 20px;">Produk Lainnya</h1>
  <div class="catalog" style="margin-bottom:20px;">
  <?php
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
     <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
     <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
        $sql     = "SELECT * FROM produk WHERE id ='20'";
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
    <div class="card-catalog enable-cc">
          <img
            class="img-catalog"
            src="<?=$data['foto']?>"
            alt="gambar <?=$data['nama']?>"
          />
          <h3 class="title-catalog"><?=$data['nama']?></h3>
          <textarea disabled>
            <?=$data['detail']?>
          </textarea>
          <p>
            Rp
            <?=$data['harga']?>
          </p>
          <a
            href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?=$data['nama']?>+?"
            class="btn"
            >Pesan Sekarang</a
          >
        </div>
    <?php
        }
    ?>
    </div>
    <a href="index.php?page=belanja" id="seemore">Lihat Lebih Banyak...</a>
</div>


</body>
</html>