<?php
 $page=(isset($_GET['page']))?$_GET['page']:"main";
 switch ($page){
    case 'home':include "page/home.php";break;
    case 'berita':include "page/berita.html";break;
    case 'belanja':include "page/belanja.php";break;
    case 'main';
    default:include"page/home.php";    
 }
 ?>