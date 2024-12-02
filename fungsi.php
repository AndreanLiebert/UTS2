<?php
function createNewGuest(){
    require "./koneksi.php";
    
    $id = strval(round(microtime(true)*1000)).strval(rand(1, 7));
    $name = "Guest".$id;
    $_SESSION['id'] = $id;
    mysqli_query($mysqli, "INSERT INTO tbl_pengguna (id_pengguna, nama_pengguna, akun_tamu) VALUES ('$id', '$name', 1)");
    return $name;
}
function formatNumber($num){
    $num = strval($num);
    if(strlen($num)<4) return $num;
    $dot = 1;
    $rtn ="";
    for($i=strlen($num)-1;$i>=0;$i--){
        $rtn = ($dot>=3&&$i!=0?".".$num[$i]:$num[$i]).$rtn;
        $dot = $dot>=3?1:($dot+1);
    }
    return $rtn;
}

?>