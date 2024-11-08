<?php
 $page=(isset($_GET['page']))?$_GET['page']:"main";
 switch ($page){
    case 'katalog':include "page/katalog.php";break;
    default:include"page/katalog.php";    
 }
 ?>