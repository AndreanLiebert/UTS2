<?php
include_once "./koneksi.php";
$error_msg="";

if(isset($_POST['signIn'])){
    $usn = $_POST['username'];
    $pass = $_POST['password'];
    $q1 = mysqli_query($mysqli, "SELECT * FROM tbl_pengguna WHERE nama_pengguna='$usn' and password_pengguna='$pass'");
    if(mysqli_num_rows($q1)==0){
        $error_msg="Username atau password salah!!";
    }else{
        $d_id=mysqli_fetch_array($q1)['id_pengguna'];
        $s_id=$_SESSION['id'];
        if($s_id!==$d_id){
            mysqli_query($mysqli, "DELETE FROM tbl_pengguna WHERE id_pengguna='$s_id'");
            mysqli_query($mysqli, "UPDATE tbl_transaksi SET id_pengguna='$d_id' WHERE id_pengguna='$s_id'");
        }
        $_SESSION['id']=$d_id;
        $_SESSION['password']=$pass;
        ?>
            <meta http-equiv="refresh" content="1; url=index.php?page=account" />
        <?php
        include_once "./page/acc-user.php";
        return;
    }
}else if(isset($_POST['signUp'])){
    $usn = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpass'];
    $q1 = mysqli_query($mysqli, "SELECT * FROM tbl_pengguna WHERE nama_pengguna='$usn'");
    if(mysqli_num_rows($q1)>0){
        $error_msg="Username sudah ada!!";
    }else if(strlen($pass)<8){
        $error_msg="Password terlalu pendek (minimal 8)!!";
    }else if($pass !== $cpass){
        $error_msg="Password tidak cocok!!";
    }else{
        mysqli_query($mysqli, "UPDATE tbl_pengguna SET nama_pengguna='$usn', password_pengguna='$pass',akun_tamu=0 WHERE id_pengguna ='$id'");
        $_SESSION['password'] = $pass;
        ?>
            <meta http-equiv="refresh" content="1; url=index.php?page=account" />
        <?php
        include_once "./page/acc-user.php";
        return;
    }
}
if(isset($_SESSION['id'])&&isset($_SESSION['password'])){
    $id = $_SESSION['id'];
    $q1 = mysqli_query($mysqli, "SELECT * FROM tbl_pengguna WHERE id_pengguna='$id' and akun_tamu=0");
    if(mysqli_num_rows($q1)>0){
        $pass = $_SESSION['password'];
        $q2 = mysqli_query($mysqli, "SELECT nama_pengguna FROM tbl_pengguna WHERE id_pengguna='$id' and password_pengguna='$pass'");
        if(mysqli_num_rows($q2)==0){ createNewGuest(); }
        else{
            include_once "./page/acc-user.php";
        }
        return;
    }
}else if(!isset($_SESSION['id'])){
    createNewGuest();
}
include_once "./page/acc-sign.php";
?>
