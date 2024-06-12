<?php
 $page=(isset($_GET['page']))?$_GET['page']:"main";
 switch ($page){
    case 'home':include "page/home.html";break;
    case 'about':include "page/cv.html";break;
    case 'gallery':include "page/gallery.html";break;
    case 'contact':include "page/contact.html";break;
    case 'main';
    default:include"page/home.html";    
 }
 ?>