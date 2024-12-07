<?php  
require "session.php";
require "../koneksi.php";

$qItem = mysqli_query($mysqli, "SELECT * FROM tbl_pengguna");
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
             <i class="fas fa-align-justify"></i> Pelanggan
         </li>
     </ol>
     </nav> 
     <div class="my-5 col-12 col-md-6">
         <div class="mt-3">
            </div>
            

      </div>

     <div class="mt-3">
        <h2>List Pelanggan</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Password</th>
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
                            $nama = $data['nama_pengguna'];
                            $passwordx = isset($data['password_pengguna'])?$data['password_pengguna']:"Akun Tamu";
                            
                            
                        ?>
                            <tr>
                                <td><?=$jumlah?></td>
                                <td><?=$nama?></td>
                                <td><?=$passwordx?></td>
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