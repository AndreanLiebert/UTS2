<?php 
    include_once "./koneksi.php";
    $id = $_SESSION['id'];
    $pass = $_SESSION['password'];
    $q2 = mysqli_query($mysqli, "SELECT nama_pengguna FROM tbl_pengguna WHERE id_pengguna='$id' and password_pengguna='$pass'");
    if(isset($_POST['signOut'])){
        session_destroy();
        header('location: index.php?page=account');
    }
?>
<div class="user">
        <link rel="stylesheet" href="./assets/CSS/user.css">
         
    <div class="top flexy">
        <div class="info flexy">
        <img src="./assets/images/web/login.png" alt="">
        <p><?=mysqli_fetch_array($q2)['nama_pengguna']?></p>
        </div>
        <form action="" method="POST">
            <button class="flexy" name="signOut"><img src="./assets/images/web/logout.png" alt="">Sign out</button>             
        </form>
    </div>
    <div class="mid">
        <h3>Riwayat Transaksi</h3>
        <div class="history flexy">
        <?php
        $q2 = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi WHERE id_pengguna='$id' ORDER BY tanggal_pemesanan DESC");
        $date=new DateTime();
        if(mysqli_num_rows($q2)==0){
        ?>
        <p>Belum ada transaksi..</p>
        <?php
        }else{
            while($tr=mysqli_fetch_array($q2)){
                $itr=$tr['id_transaksi'];
                $ip=$tr['id_pembayaran'];
                $tt=$tr['total'];
                $do=$tr['tanggal_pemesanan'];
                $ipd = $tr['id_produk'];
                $qpd = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk='$ipd'");
                $rqpd = mysqli_fetch_array($qpd);
                $ii=$rqpd['id_barang'];
                $cpd=$rqpd['jumlah_produk'];
                $do = str_replace(" ",", ",$do);
                $so;
                $cso;
                $po=$tr['tanggal_pembayaran'];
                if($po==null){
                    $eo=new DateTime($tr['tanggal_kadaluarsa']);
                    if($eo>$date){
                        $so="Menunggu pembayaran";
                        $cso="status-history-warning";
                    }else{
                        $so="Gagal";
                        $cso="status-history-danger";
                    }
                    
                }else{
                    $so="Berhasil";
                    $cso="status-history-safe";
                }
                
                $qp = mysqli_query($mysqli, "SELECT * FROM tbl_pembayaran WHERE id_pembayaran='$ip'");
                $rqp = mysqli_fetch_array($qp);
                $np=$rqp['nama_pembayaran'];
                
                $qi = mysqli_query($mysqli, "SELECT * FROM tbl_barang WHERE id_barang='$ii'");
                $rqi = mysqli_fetch_array($qi);
                $ni=$rqi['nama_barang'];
                $ig=$rqi['id_game'];

                $qg = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$ig'");
                $rqg = mysqli_fetch_array($qg);
                $ng=$rqg['nama_game'];     
        ?>
        
        <div class="card history-card" <?=($so=='Gagal'?:'onclick="toTransaction(this)"')?>>
            <h4><?=$ng?> Top-up</h4>
            <table>
            <tr>
                <td>Tanggal pemesanan</td>
                <td>:</td>
                <td><?=$do?></td>
            </tr>
            <tr>
                <td>Status transaksi</td>
                <td>:</td>
                <td><div class="<?=$cso?>"><?=$so?></div></td>
            </tr>
            <tr>
                <td>ID Transaksi</td>
                <td>:</td>
                <td id="itr"><?=$itr?></td>
            </tr>
            <tr>
                <td>Barang yang dibeli</td>
                <td>:</td>
                <td><?=$cpd." ".$ni?></td>
            </tr>
            <tr>
                <td>Metode pembayaran</td>
                <td>:</td>
                <td><?=$np?></td>
            </tr>
            </table>
            <hr>
            <div class="history-total flexy">
            <h4>Total pembayaran</h2>
            <p><?=($so=="Gagal"?'-':"Rp. ".formatNumber($tt))?></p>
            </div>
        </div>
        <?php
            }
        }
        ?>
        <div class="control-history"></div>
    </div>
</div>