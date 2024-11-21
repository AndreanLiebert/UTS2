<?php  
require "session.php";
require "../koneksi.php";

$qItem;
if(isset($_GET['s'])){
    $idb = $_GET['s'];
    $qItem = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_game='$idb'");
}else{
    $qItem = mysqli_query($mysqli, "SELECT * FROM tbl_barang");
}
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
             <i class="fas fa-align-justify"></i> Barang
         </li>
     </ol>
     </nav> 
     <div class="my-5 col-12 col-md-6">
         <div class="mt-3">
             <button class="btn btn-primary" id="add-item-show">Tambah</button>
            </div>
            <?php include("control-item.php")?>
           

          <?php 
            if(isset($_POST['add'])){
                $name = htmlspecialchars($_POST['name']);
                $id = htmlspecialchars($_POST['id']);
                $idg = htmlspecialchars($_POST['game']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/product/";
                $image=$location.$name_file;

                $forDb="../assets/images/product/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);

                $queryExist = mysqli_query($mysqli, "SELECT nama_barang FROM tbl_barang WHERE nama_barang='$name'");
                $jml = mysqli_num_rows($queryExist);

                if($jml > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Barang sudah ada
                    </div>
                    <?php
                }
                else{
                    $queryTambah = mysqli_query($mysqli, "INSERT INTO tbl_barang (id_barang,id_game,nama_barang,gambar_barang) VALUES ('$id','$idg','$name','$image')");

                    if($queryTambah){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Barang Berhasil Disimpan
                        </div>

                        <meta http-equiv="refresh" content="1; url=item.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['delete'])){
                $id = htmlspecialchars($_POST['id']);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_barang FROM tbl_barang WHERE id_barang='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Barang tidak ada
                    </div>
                    <?php
                }
                else{
                    $queryHapus = mysqli_query($mysqli, "DELETE FROM tbl_barang WHERE id_barang='$id'");

                    if($queryHapus){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Barang Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="1; url=item.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['update'])){
                $name = htmlspecialchars($_POST['name']);
                $id = htmlspecialchars($_POST['id']);
                $idg = htmlspecialchars($_POST['game']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/product/";
                $image=$location.$name_file;

                $forDb="../assets/images/product/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_barang FROM tbl_barang WHERE id_barang='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Barang tidak ada
                    </div>
                    <?php
                }
                else{

                    $queryPerbarui;
                    if(isset($_POST['img-changed']) && $_POST['img-changed']=="true"){
                        echo "with new foto";
                        move_uploaded_file($temp,$forDbimg);
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_barang set nama_barang='$name', id_game='$idg', gambar_barang='$image' WHERE id_barang='$id'");
                    }else{
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_barang set nama_barang='$name', id_game='$idg' WHERE id_barang='$id'");
                    }

                    if($queryPerbarui){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Game Berhasil Diperbarui
                        </div>

                        <meta http-equiv="refresh" content="1; url=item.php" />
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
        <h2>List Barang</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
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
                        while($data=mysqli_fetch_array($qItem)){
                            $idg = $data['id_game'];
                            $qName = mysqli_query($mysqli, "SELECT nama_game FROM tbl_game WHERE id_game='$idg'");
                            $gname;
                            while($dataname=mysqli_fetch_array($qName)){
                                $gname = $dataname['nama_game'];
                            }
                            
                        ?>
                            <tr>
                                <td><?=$jumlah?></td>
                                <td><?=$gname."-".$data['nama_barang']?></td>
                                <td><img src=".<?=$data['gambar_barang']?>"></td>
                                <td>
                                    <button class="btn btn-warning" onclick="updateItemShow(`<?=$data['id_barang']?>`,`<?=$data['nama_barang']?>`,`<?=$data['id_game']?>`,`<?=$data['gambar_barang']?>`)">Ubah</button>
                                    <a href="product.php?b=<?=$data['id_barang']?>"><button class="btn btn-primary">Cari</button></a>
                                    <button id="delete-game-show" class="btn btn-danger" onclick="deleteItemShow(`<?=$data['id_barang']?>`, `<?=$gname.'-'.$data['nama_barang']?>`)">Hapus</button>
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