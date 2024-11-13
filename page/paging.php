<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
switch ($page) {
   case 'catalog':
      include "page/catalog.php";
      break;
   case 'account':
      include "page/account.php";
      break;
   default:
      include "page/catalog.php";
}
?>