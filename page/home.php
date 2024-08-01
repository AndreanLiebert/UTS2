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
    <h1>Toko Mancing Perkoro</h1>
    <h3>Mau Cari Apa?</h3>
    <form action="belanja.php" method="post">
        <input type="text" placeholder="ketik disini" style="width: 80%;"><button style="width: 20%;">Cari</button>
    </form>
</div>
<div class="card">
  
  <div class="catalog">
     <div class="card-catalog enable-cc">
          <img class="img-catalog" src="gambar/box.jpg" alt="gambar box" />
          <h3 class="title-catalog">Produk 1</h3>
          <p>Rp 123.123</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+produk+?" class="btn">Pesan Sekarang</a>
        </div>
     <div class="card-catalog enable-cc">
          <img class="img-catalog" src="gambar/box.jpg" alt="gambar box" />
          <h3 class="title-catalog">Produk 2</h3>
          <p>Rp 123.123</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+produk+?" class="btn">Pesan Sekarang</a>
        </div>
     <div class="card-catalog enable-cc">
          <img class="img-catalog" src="gambar/box.jpg" alt="gambar box" />
          <h3 class="title-catalog">Produk 3</h3>
          <p>Rp 123.123</p>
          <a href="https://api.whatsapp.com/send?phone=6282246584813&text=Halo+Apakah+ada+produk+?" class="btn">Pesan Sekarang</a>
        </div>
    </div>
    <a href="index.php?page=belanja" style="text-decoration: none;margin-left:45%;">See More</a>
</div>


</body>
</html>