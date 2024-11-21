<?php  
require "session.php";
require "../koneksi.php";

$queryGame = mysqli_query($mysqli, "SELECT * FROM tbl_game");
$jumlahGame = mysqli_num_rows($queryGame);

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
             <i class="fas fa-align-justify"></i> Game
         </li>
     </ol>
     </nav> 
     <div class="my-5 col-12 col-md-6">
         <div class="mt-3">
             <button class="btn btn-primary" id="add-game-show">Tambah</button>
            </div>
            <?php include("control-game.html")?>
           

          <?php 
            if(isset($_POST['add'])){
                $name = htmlspecialchars($_POST['name']);
                $category = htmlspecialchars($_POST['category']);
                $id = htmlspecialchars($_POST['id']);
                $status = htmlspecialchars($_POST['status']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/game/";
                $image=$location.$name_file;

                $forDb="../assets/images/game/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);

                $queryExist = mysqli_query($mysqli, "SELECT nama_game FROM tbl_game WHERE nama_game='$name'");
                $jml = mysqli_num_rows($queryExist);

                if($jml > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Game sudah ada
                    </div>
                    <?php
                }
                else{
                    $queryTambah = mysqli_query($mysqli, "INSERT INTO tbl_game (id_game,nama_game,kategori_game,gambar_game,status_game) VALUES ('$id','$name','$category','$image',$status)");

                    if($queryTambah){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Game Berhasil Disimpan
                        </div>

                        <meta http-equiv="refresh" content="1; url=game.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['delete'])){
                $id = htmlspecialchars($_POST['id']);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_game FROM tbl_game WHERE id_game='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Game tidak ada
                    </div>
                    <?php
                }
                else{
                    $queryHapus = mysqli_query($mysqli, "DELETE FROM tbl_game WHERE id_game='$id'");

                    if($queryHapus){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Game Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="1; url=game.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }else if(isset($_POST['update'])){
                $name = htmlspecialchars($_POST['name']);
                $category = htmlspecialchars($_POST['category']);
                $id = htmlspecialchars($_POST['id']);
                $status = htmlspecialchars($_POST['status']);

                $name_file = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
            
                $location="./assets/images/game/";
                $image=$location.$name_file;

                $forDb="../assets/images/game/";
                $forDbimg=$forDb.$name_file;
                move_uploaded_file($temp,$forDbimg);
                
                $queryExist = mysqli_query($mysqli, "SELECT id_game FROM tbl_game WHERE id_game='$id'");
                $jml = mysqli_num_rows($queryExist);

                if($jml <= 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Game tidak ada
                    </div>
                    <?php
                }
                else{

                    $queryPerbarui;
                    if(isset($_POST['img-changed']) && $_POST['img-changed']=="true"){
                        echo "with new foto";
                        move_uploaded_file($temp,$forDbimg);
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_game set nama_game='$name', kategori_game='$category', status_game='$status', gambar_game='$image' WHERE id_game='$id'");
                    }else{
                        $queryPerbarui = mysqli_query($mysqli, "UPDATE tbl_game set nama_game='$name', kategori_game='$category', status_game='$status' WHERE id_game='$id'");
                    }

                    if($queryPerbarui){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Game Berhasil Diperbarui
                        </div>

                        <meta http-equiv="refresh" content="1; url=game.php" />
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
        <h2>List Game</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Status</th>
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
                                <td><?php echo $data['nama_game']; ?></td>
                                <td><img src=".<?php echo $data['gambar_game']?>"></td>
                                <td><div class="<?=$data['status_game']==1?"status-aktif":"status-nonaktif"?>"></div></td>
                                <td>
                                    <button class="btn btn-warning" onclick="updateGameShow(`<?=$data['id_game']?>`, `<?=$data['nama_game']?>`, `<?=$data['kategori_game']?>`, `<?=$data['status_game']?>`, `<?=$data['gambar_game']?>`)">Ubah</button>
                                    <a href="item.php?s=<?=$data['id_game']?>"><button class="btn btn-primary">Cari</button></a>
                                    <button id="delete-game-show" class="btn btn-danger" onclick="deleteGameShow(`<?=$data['id_game']?>`, `<?=$data['nama_game']?>`)">Hapus</button>
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