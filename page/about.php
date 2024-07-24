<?php
include('admin/page/koneksi.php');
?>
<html>
    <head>
        <title>About</title>
</head>
<body bgcolor="#ccccc">
    <?php
    $sql     = 'select * from tbl_about';
    $query   = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_array($query)); {
        ?>
        <center>
            <h2><p><?php echo $data['judul']; ?></p></h2>
    </center>
    <p><?php echo $data['isi']; ?></p>
    <?php
    }
    ?>
    </body>
    </html>