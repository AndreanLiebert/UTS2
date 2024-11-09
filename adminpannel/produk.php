<?php  
require "session.php";
require "../koneksi.php";

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];
    $detail = $_POST['detail'];
    $stok = $_POST['stok'];

    mysqli_query($mysqli, "INSERT INTO produk (nama,kategori_id,harga,foto,detail,stok) VALUES('$nama','$kategori_id','$harga','$foto','$detail','$stok')");
}
if(isset($_POST['perbarui'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];
    $detail = $_POST['detail'];
    $stok = $_POST['stok'];

    mysqli_query($mysqli, "UPDATE produk SET nama = '$nama',kategori_id = '$kategori_id',harga='$harga',foto='$foto',detail='$detail',stok='$stok' WHERE id='$id'");
}
if(isset($_POST['hapus'])){
    $id = $_POST['id'];

    mysqli_query($mysqli, "DELETE from produk WHERE id='$id'");
}

$queryProduk;
if(isset($_GET['s'])){
    $id = $_GET['s'];
    $queryProduk = mysqli_query($mysqli, "SELECT * FROM produk WHERE kategori_id='$id'");
}else{
    $queryProduk = mysqli_query($mysqli, "SELECT * FROM produk");
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
            <a href="produk_tambah.php"><button class="btn btn-primary">Tambah</button></a>

          <?php 
            if(isset($_POST['simpan_kategori'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                $queryExist = mysqli_query($mysqli, "SELECT nama FROM kategori WHERE nama='$kategori'");
                $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                if($jumlahDataKategoriBaru > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori sudah ada
                    </div>
                    <?php
                }
                else{
                    $querySimpan = mysqli_query($mysqli, "INSERT INTO kategori (nama) VALUES('$kategori')");

                    if($querySimpan){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Disimpan
                        </div>

                        <meta http-equiv="refresh" content="1; url=kategori.php" />
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
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Detail</th>
                       
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
                        ?>
                          <tr>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['harga']; ?></td>
                            <td><img src="../<?=$data['foto']?>" alt="" style="width:15vw"></td>
                            <td><?php echo $data['detail']; ?></td>
                            <td><a href="produk_perbarui.php?id=<?=$data['id']?>"> <button>Perbarui</button> </a></td>
                            <td><a href="produk_hapus.php?id=<?=$data['id']?>"> <button>Hapus</button> </a></td>
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