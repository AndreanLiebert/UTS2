<?php
include_once('koneksi.php');
?>

<html>

<head>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css" />
</head>

<body>
  <div class="card">

    <h1>Rekomendasi Alat Pancing Pemula</h1>
    <div class="catalog">
      <?php
      if (isset($_GET['cari'])) {
      } else {


      ?>
        <?php
        $sql     = "SELECT * FROM produk WHERE kategori_id ='2'";
        $query   = mysqli_query($mysqli, $sql);
        while ($data = mysqli_fetch_array($query)) {


        ?>
          <div class="card-catalog enable-cc">
            <img class="img-catalog" src="<?= $data['foto'] ?>" alt="gambar <?= $data['nama'] ?>" />
            <h3 class="title-catalog"><?= $data['nama'] ?></h3>
            <textarea disabled>
            <?= $data['detail'] ?>
          </textarea>
            <p>
              Rp
              <?= $data['harga'] ?>
            </p>
            <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?= $data['nama'] ?>+?" class="btn">Pesan Sekarang</a>
          </div>

        <?php
        }
        ?>
    </div>
    <hr style="margin-top: 30px;">
    <br>
    <h1>Rekomendasi Alat Pancing Profesional</h1>
    <div class="catalog">
      <?php
        $sql     = "SELECT * FROM produk WHERE kategori_id='1'";
        $query   = mysqli_query($mysqli, $sql);
        while ($data = mysqli_fetch_array($query)) {

      ?>

        <div class="card-catalog enable-cc">
          <img class="img-catalog" src="<?= $data['foto'] ?>" alt="gambar <?= $data['nama'] ?>" />
          <h3 class="title-catalog"><?= $data['nama'] ?></h3>
          <textarea disabled>
            <?= $data['detail'] ?>
          </textarea>
          <p>
            Rp
            <?= $data['harga'] ?>
          </p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?= $data['nama'] ?>+?" class="btn">Pesan Sekarang</a>
        </div>
      <?php
        }
      ?>
    </div>
    <hr style="margin-top: 30px;">
    <br />
    <h1>Umpan</h1>
    <div class="catalog">
      <?php
        $sql     = "SELECT * FROM produk WHERE kategori_id='3'";
        $query   = mysqli_query($mysqli, $sql);
        while ($data = mysqli_fetch_array($query)) {

      ?>

        <div class="card-catalog enable-cc">
          <img class="img-catalog" src="<?= $data['foto'] ?>" alt="gambar <?= $data['nama'] ?>" />
          <h3 class="title-catalog"><?= $data['nama'] ?></h3>
          <textarea disabled>
            <?= $data['detail'] ?>
          </textarea>
          <p>
            Rp
            <?= $data['harga'] ?>
          </p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+<?= $data['nama'] ?>+?" class="btn">Pesan Sekarang</a>
        </div>
    <?php
        }
      }
    ?>
    </div>
  </div>
</body>

</html>