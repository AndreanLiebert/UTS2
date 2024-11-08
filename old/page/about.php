<?php
include_once('koneksi.php');
?>
<html>
    <head>
        <title>About</title>
</head>
<body bgcolor="#ccccc">
    <?php
        $sql     = 'SELECT * FROM tentang';
        $query   = mysqli_query($mysqli,$sql);
        while($data = mysqli_fetch_array($query)){
    ?>
            <center>
            <h2><p><?=$data['judul']?></p></h2>
            </center>
            <p><?=$data['isi']?></p>
    <?php
        }
    ?>
    </body>
    </html>