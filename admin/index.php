<?php
    require "session.php";
    require "../koneksi.php";

    $querygame = mysqli_query($mysqli, "SELECT * FROM tbl_game");
    $jumlahgame = mysqli_num_rows($querygame);

    $queryProduk = mysqli_query($mysqli, "SELECT * FROM tbl_produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);

    $queryBarang = mysqli_query($mysqli, "SELECT * FROM tbl_barang");
    $jumlahBarang = mysqli_num_rows($queryBarang);

    $jPembayaran = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran");
    $jumPembayaran = mysqli_num_rows($jPembayaran);

    $jTransaksi = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi");
    $jumTransaksi = mysqli_num_rows($jTransaksi);
    
    $jPengguna = mysqli_query($mysqli, "SELECT * FROM tbl_pengguna");
    $jumPengguna = mysqli_num_rows($jPengguna);
    ?> 
    <!DOCTYPE html>
    <html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css"> 
    </head>

     <style>
        .kotak{
            border:solid;
        }

        .summary-game{
            background-color: #2596be;
            border-radius: 10px;
        }

        .no-decoration{
           text-decoration: none; 
        }
     </style> 

    <body>
        <?php require "navbar.php"; ?>
        <div class="container mt-5">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                     <i class="fas fa-home"></i> Home
                  </li>
               </ol>
            </nav>
            <h2>halo admin</h2>
            
            <div class="container mt-5">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-game p-3">
                      <div class="row">
                         <div class="col-6">
                            <i class="fas fa-align-justify fa-7x text-black-50"></i>
                         </div>
                         <div class="col-6 text-white">
                              <h3 class="fs-2">Game</h3>
                              <p class="fs-4"><?php echo $jumlahgame; ?> Game</p>
                              <p><a href="game.php" class="text-white no-decoration">Lihat Detail</a></p> 
                         </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <div class="summary-game p-3">
                        <div class="row">
                           <div class="col-6">
                             <i class="fas fa-box fa-7x text-black-50"></i>
                           </div>
                           <div class="col-6 text-white">
                              <h3 class="fs-2">Barang</h3>
                              <p class="fs-4"><?php echo $jumlahBarang ?> Barang</p>
                              <p><a href="item.php" class="text-white no-decoration">Lihat Detail</a></p> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <div class="summary-game p-3">
                        <div class="row">
                           <div class="col-6">
                             <i class="fas fa-box fa-7x text-black-50"></i>
                           </div>
                           <div class="col-6 text-white">
                              <h3 class="fs-2">Produk</h3>
                              <p class="fs-4"><?php echo $jumlahProduk ?> Produk</p>
                              <p><a href="product.php" class="text-white no-decoration">Lihat Detail</a></p> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <div class="summary-game p-3">
                        <div class="row">
                           <div class="col-6">
                             <i class="fas fa-box fa-7x text-black-50"></i>
                           </div>
                           <div class="col-6 text-white">
                              <h3 class="fs-3">Pembayaran</h3>
                              <p class="fs-4"><?php echo $jumPembayaran ?> Metode</p>
                              <p><a href="payment.php" class="text-white no-decoration">Lihat Detail</a></p> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <div class="summary-game p-3">
                        <div class="row">
                           <div class="col-6">
                             <i class="fas fa-box fa-7x text-black-50"></i>
                           </div>
                           <div class="col-6 text-white">
                              <h3 class="fs-3">Transaksi</h3>
                              <p class="fs-4"><?php echo $jumTransaksi ?> Transaksi</p>
                              <p><a href="transaction.php" class="text-white no-decoration">Lihat Detail</a></p> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12 mb-3">
                     <div class="summary-game p-3">
                        <div class="row">
                           <div class="col-6">
                             <i class="fas fa-box fa-7x text-black-50"></i>
                           </div>
                           <div class="col-6 text-white">
                              <h3 class="fs-3">Pengguna</h3>
                              <p class="fs-4"><?php echo $jumPengguna ?> Pengguna</p>
                              <p><a href="user.php" class="text-white no-decoration">Lihat Detail</a></p> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
    </body>
    </html>