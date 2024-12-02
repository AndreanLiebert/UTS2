<!DOCTYPE php, name : test.php>
<html>
  <head>
    <title>TopUp Zone</title>
    <!-- <link rel="stylesheet" href="CSS/product.css" /> -->
  </head> 
  <body>
    <h1>TEST</h1>
    <p id="d1"></p>
    <p id="d2"></p>
    <p id="compare"></p>
    <?php
      require_once "./koneksi.php";
      // $q2 = mysqli_query($mysqli,"INSERT INTO tbl_transaksi (id_transaksi) VALUES ('121221')");
      $q1 = mysqli_query($mysqli,"SELECT * FROM tbl_transaksi");
      $dater = new DateTime("2024-11-30 19:48:24");
      $date = new DateTime("2024-11-30 19:48:24");
      $date->add(new DateInterval("PT15M"));
      $date=$date->format("Y-m-d H:i:s");
      echo str_replace(" ",", ","kont ol");
      // if($dater>$date){echo "ya benar";}

    ?>
  </body>
</html>
 