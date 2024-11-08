<?php  
require "session.php";
require "../koneksi.php";

    $id = $_GET['id'];
    $q=mysqli_query($mysqli,"SELECT * FROM produk WHERE id='$id'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
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
             <i class="fas fa-align-justify"></i> Kategori
         </li>
     </ol>
     </nav>
     <form action="produk.php" method="POST">
        <?php
             while($data=mysqli_fetch_array($q)){
            ?>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?=$data['nama']?>"><br>
        <input type="text" name="id" value="<?=$data['id']?>" hidden><br>

        <label>Kategori:</label><br>
        <select name="kategori_id">
            <?php
                $qq = mysqli_query($mysqli, "SELECT * FROM kategori");
                while($dataa=mysqli_fetch_array($qq)){
            ?>
            <option value="<?=$dataa['id']?>"><?=$dataa['nama']?></option>
            <?php
                }
            ?>
        </select><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?=$data['harga']?>"><br>

        <label>Foto:</label><br>
        <input type="text" name="foto" value="<?=$data['foto']?>"><br>
        
        <label>Detail:</label><br>
        <textarea name="detail"><?=$data['detail']?></textarea><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?=$data['stok']?>"><br>
                <?php
                }?>
        <input type="submit" name="perbarui">
     </form>  


</div>
    
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>