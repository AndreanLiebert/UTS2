<?php  
require "session.php";
require "../koneksi.php";

$queryProduk;
if(isset($_GET['b'])){
    $idb = $_GET['b'];
    $queryProduk = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_barang='$idb' ORDER BY jumlah_produk ASC");
}else{
    $queryProduk = mysqli_query($mysqli, "SELECT * FROM tbl_produk");
}
$jumlahProduk = mysqli_num_rows($queryProduk);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css"> 
    <style>
        .table img{
            max-width: 10%;
        }
        /* td{
            max-width: 5vw;
        } */
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
             <i class="fas fa-align-justify"></i> Produk
         </li>
     </ol>
     </nav>

      <div class="my-5 col-12 col-md-6">
           <h3>Tambah Produk</h3>
            <button class="btn btn-primary" id="add-item-show">Tambah</button>
            <?php include("control-product.php")?>

          <?php 
            if(isset($_POST['add'])){
                $id = htmlspecialchars($_POST['id']);
                $iid = htmlspecialchars($_POST['item']);
                $qty = htmlspecialchars($_POST['quantity']);
                $prc = htmlspecialchars($_POST['price']);

                $queryExist = mysqli_query($mysqli, "SELECT jumlah_produk FROM tbl_produk WHERE jumlah_produk=$qty AND id_barang='$iid'");
                $jml = mysqli_num_rows($queryExist);
                if($jml > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Produk sudah ada
                    </div>
                    <?php
                }
                else{
                    $queryTambah = mysqli_query($mysqli, "INSERT INTO tbl_produk (id_produk,id_barang,jumlah_produk,harga_produk) VALUES ('$id','$iid',$qty,$prc)");

                    if($queryTambah){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Produk Berhasil Disimpan
                        </div>

                        <meta http-equiv="refresh" content="1; url=product.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['delete'])){
                $id = htmlspecialchars($_POST['id']);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_produk FROM tbl_produk WHERE id_produk='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Produk tidak ada
                    </div>
                    <?php
                }
                else{
                    $queryHapus = mysqli_query($mysqli, "DELETE FROM tbl_produk WHERE id_produk='$id'");

                    if($queryHapus){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Produk Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="1; url=item.php" />
                        
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['update'])){
                $id = htmlspecialchars($_POST['id']);
                $iid = htmlspecialchars($_POST['item']);
                $qty = htmlspecialchars($_POST['quantity']);
                $prc = htmlspecialchars($_POST['price']);

                $queryExist = mysqli_query($mysqli, "SELECT jumlah_produk FROM tbl_produk WHERE jumlah_produk=$qty AND id_barang='$iid'");
                $jml = mysqli_num_rows($queryExist);
                if($jml > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Produk sudah ada
                    </div>
                    <?php
                }
                else{                   
                    $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_produk set id_barang='$iid', jumlah_produk=$qty, harga_produk=$prc WHERE id_produk='$id'");

                    if($queryPerbarui){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Produk Berhasil Diperbarui
                        </div>

                        <meta http-equiv="refresh" content="1; url=product.php" />
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
        <h2>List Produk</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      if($jumlahProduk==0){
                     ?>
                     <tr>
                        <td colspan=3 class="text-center">Data tidak tersedia</td>
                     </tr>
                     <?php   
                      }
                      else{
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($queryProduk)){
                            $temp = $data['id_barang'];
                            $qTemp = mysqli_query($mysqli, "SELECT nama_barang,id_game,gambar_barang FROM tbl_barang WHERE id_barang='$temp'");
                            $iname;
                            $iimage;
                            while($dataname=mysqli_fetch_array($qTemp)){
                                $iname = $dataname['nama_barang'];
                                $iimage = $dataname['gambar_barang'];
                                $temp = $dataname['id_game'];
                            }
                            $qTemp = mysqli_query($mysqli, "SELECT nama_game FROM tbl_game WHERE id_game='$temp'");
                            $gname;
                            while($dataname=mysqli_fetch_array($qTemp)){
                                $gname = $dataname['nama_game'];
                            }
                        ?>
                          <tr>
                            <td><?=$jumlah?></td>
                            <td><?=$gname.'-'.$iname?></td>
                            <td><img src=".<?=$iimage?>"></td>
                            <td><?=$data['harga_produk']?></td>
                            <td><?=$data['jumlah_produk']?></td>
                            <td>
                                <button class="btn btn-warning" onclick="updateItemShow(`<?=$data['id_produk']?>`,`<?=$data['id_barang']?>`,`<?=$data['jumlah_produk']?>`,`<?=$data['harga_produk']?>`)" >Ubah</button>
                                <a href="product.php?b=<?=$data['id_barang']?>"><button class="btn btn-primary">Cari</button></a>
                                <button id="delete-game-show" class="btn btn-danger" onclick="deleteItemShow(`<?=$data['id_produk']?>`, `<?=$gname.'-'.$data['jumlah_produk'].'-'.$iname?>`)">Hapus</button>
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