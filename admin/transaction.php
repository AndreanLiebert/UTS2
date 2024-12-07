<?php  
require "session.php";
require "../koneksi.php";

$qItem = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi");
$jItem = mysqli_num_rows($qItem);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="global.css"> 
    <style>
        .table img{
            max-width: 10%;
        }
        td{
            max-width: 5vw;
        }
        .status-aktif,.status-nonaktif{
            background-color: red;
            height: 5vh;
            width: 20%;
        }
        .status-aktif{
            background-color: lime;
        }
        
        .status-history-warning{
            background-color: yellow;
            text-align: center;
            border-radius: 10px;
            color: black;
            font-size: 0.9rem;
        }
        .status-history-danger{
            background-color: red;
            text-align: center;
            border-radius: 10px;
            color: white;
            font-size: 0.9rem;
        }
        .status-history-safe{
            background-color: green;
            text-align: center;
            border-radius: 10px;
            color: white;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<?php require "navbar.php"; ?>
<div class="container mt-5">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">
             <a href="index.php"><i class="fas fa-home"></i> Home </a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">
             <i class="fas fa-align-justify"></i> Transaksi
         </li>
     </ol>
     </nav> 
     <div class="my-5 col-12 col-md-6">
         <div class="mt-3">
            </div>
            <?php include("control-transaction.html")?>
          <?php 
            
            if(isset($_POST['delete'])){
                $id = htmlspecialchars($_POST['id']);
                
                $queryExist = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_transaksi='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Transaksi tidak ada
                    </div>
                    <?php
                }
                else{
                    $queryHapus = mysqli_query($mysqli, "DELETE FROM tbl_transaksi WHERE id_transaksi='$id'");
                    if($queryHapus){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Transaksi Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="1; url=transaction.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
          ?>

      </div>

     <div class="mt-3">
        <h2>List Transaksi</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>ID Player</th>
                        <th>Barang</th>
                        <th>Pembayaran</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      if($jItem==0){
                     ?>
                     <tr>
                        <td colspan=3 class="text-center">Data tidak tersedia</td>
                     </tr>
                     <?php   
                      }
                      else{
                        $jumlah = 1;
                        $date = new DateTime();
                        while($data=mysqli_fetch_array($qItem)){
                            $idg = $data['id_pengguna'];
                            $idp = $data['data_player'];
                            $idpdc = $data['id_produk'];
                            $qName = mysqli_query($mysqli, "SELECT nama_pengguna FROM tbl_pengguna WHERE id_pengguna='$idg'");
                            $gname;
                            if(mysqli_num_rows($qName)==0){
                                $gname = "Akun dihapus";
                            }else{
                                $gname = mysqli_fetch_array($qName)["nama_pengguna"];
                            }
                            $qpdc = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk='$idpdc'");
                            $iname;
                            $icount;
                            while($dataitem=mysqli_fetch_array($qpdc)){
                                $icount = $dataitem['jumlah_produk'];
                                $iitem=$dataitem['id_barang'];
                                $qiitem = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$iitem'");
                                $iname = mysqli_fetch_array($qiitem)['nama_barang'];
                            }

                            $ipay = $data['id_pembayaran'];
                            $qpay = mysqli_query($mysqli, "SELECT nama_pembayaran FROM tbl_pembayaran WHERE id_pembayaran='$ipay'");
                            $payname = mysqli_fetch_array($qpay)['nama_pembayaran'];
                            $trdate = $data["tanggal_pemesanan"];

                            $so;
                            $cso;
                            $po=$data['tanggal_pembayaran'];
                            if($po==null){
                                $eo=new DateTime($data['tanggal_kadaluarsa']);
                                if($eo>$date){
                                    $so="Menunggu";
                                    $cso="status-history-warning";
                                }else{
                                    $so="Gagal";
                                    $cso="status-history-danger";
                                }
                            }else{
                                $so="Berhasil";
                                $cso="status-history-safe";
                            }
                            $total = $data['total'];
                            
                        ?>
                            <tr>
                                <td><?=$jumlah?></td>
                                <td><?=$gname?></td>
                                <td><?=$idp?></td>
                                <td><?=$icount." ".$iname?></td>
                                <td><?=$payname?></td>
                                <td><?=$trdate?></td>
                                <td><div class="<?=$cso?>"><?=$so?></div></td>
                                <td><?=$total?></td>
                                <td>
                                    <button id="delete-game-show" class="btn btn-danger" onclick="deleteGameShow(`<?=$data['id_transaksi']?>`,`<?=$jumlah?>`)">Hapus</button>
                                </td>
                            </tr>
                        <?php 
                        $jumlah++;   
                        }
                      }
                    ?>
                </tbody>
            </table>
        </div>
     </div>
</div>
    
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>