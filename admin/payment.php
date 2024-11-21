<?php  
require "session.php";
require "../koneksi.php";

$queryGame = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran");
$jumlahGame = mysqli_num_rows($queryGame);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
             <i class="fas fa-align-justify"></i> Pembayaran
         </li>
     </ol>
     </nav> 
     <div class="my-5 col-12 col-md-6">
         <div class="mt-3">
             <button class="btn btn-primary" id="add-game-show">Tambah</button>
            </div>
            <?php include("control-payment.html")?>
           

          <?php 
            if(isset($_POST['add'])){
                $id = htmlspecialchars($_POST['id']);
                $name = htmlspecialchars($_POST['name']);
                $fee = htmlspecialchars($_POST['fee']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/payment/";
                $image=$location.$name_file;

                $forDb="../assets/images/payment/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);

                $queryExist = mysqli_query($mysqli, "SELECT nama_pembayaran FROM tbl_pembayaran WHERE nama_pembayaran='$name'");
                $jml = mysqli_num_rows($queryExist);

                if($jml > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Pembayaran sudah ada
                    </div>
                    <?php
                }
                else{
                    $queryTambah = mysqli_query($mysqli, "INSERT INTO tbl_pembayaran (id_pembayaran,nama_pembayaran,biaya_pembayaran,gambar_pembayaran) VALUES ('$id','$name',$fee,'$image')");

                    if($queryTambah){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Pembayaran Berhasil Disimpan
                        </div>

                        <meta http-equiv="refresh" content="1; url=payment.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['delete'])){
                $id = htmlspecialchars($_POST['id']);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_pembayaran FROM tbl_pembayaran WHERE id_pembayaran='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Pembayaran tidak ada
                    </div>
                    <?php
                }
                else{
                    $queryHapus = mysqli_query($mysqli, "DELETE FROM tbl_pembayaran WHERE id_pembayaran='$id'");

                    if($queryHapus){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Pembayaran Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="1; url=payment.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['update'])){
                $id = htmlspecialchars($_POST['id']);
                $name = htmlspecialchars($_POST['name']);
                $fee = htmlspecialchars($_POST['fee']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/game/";
                $image=$location.$name_file;

                $forDb="../assets/images/game/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_pembayaran FROM tbl_pembayaran WHERE id_pembayaran='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Pembayaran tidak ada
                    </div>
                    <?php
                }
                else{

                    $queryPerbarui;
                    $wnf='';
                    if(isset($_POST['img-changed']) && $_POST['img-changed']=="true"){
                        $wnf= ", Foto baru";
                        move_uploaded_file($temp,$forDbimg);
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_pembayaran set nama_pembayaran='$name', biaya_pembayaran='$fee', gambar_pembayaran='$image' WHERE id_pembayaran='$id'");
                    }else{
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_pembayaran set nama_pembayaran='$name', biaya_pembayaran='$fee' WHERE id_pembayaran='$id'");
                    }

                    if($queryPerbarui){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Pembayaran berhasil diperbarui<?=$wnf?>                        
                        </div>

                        <meta http-equiv="refresh" content="1; url=payment.php" />
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
        <h2>List Metode Pembayaran</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      if($jumlahGame==0){
                     ?>
                     <tr>
                        <td colspan=3 class="text-center">Data tidak tersedia</td>
                     </tr>
                     <?php   
                      }
                      else{
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($queryGame)){
                        ?>
                            <tr>
                                <td><?=$jumlah?></td>
                                <td><?php echo $data['nama_pembayaran']; ?></td>
                                <td><?=$data['biaya_pembayaran']?></td>
                                <td><img src=".<?php echo $data['gambar_pembayaran']?>"></td>
                                <td>
                                    <button class="btn btn-warning" onclick="updateGameShow(`<?=$data['id_pembayaran']?>`, `<?=$data['nama_pembayaran']?>`,<?=$data['biaya_pembayaran']?>,`<?=$data['gambar_pembayaran']?>`)">Ubah</button>
                                    <a href="item.php?s=s"><button class="btn btn-primary">Cari</button></a>
                                    <button class="btn btn-danger" onclick="deleteGameShow(`<?=$data['id_pembayaran']?>`, `<?=$data['nama_pembayaran']?>`)" >Hapus</button>
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