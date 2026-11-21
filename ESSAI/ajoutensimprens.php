<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 



if($_SESSION['totsesmatiere']>0){
    $g=0;
    while($g<$_SESSION['totsesmatiere']){
        $matensg='matensg'.$g; 
        echo $_POST[$matensg]."</br>";
        if(isset($_POST[$matensg])){
            $id=$_POST[$matensg];
            $r="DELETE FROM enseigmatclasse WHERE id='".$id."'";
            $req=$bdda->query($r);
        } 
        $g++;
    }
  }
 
   
if($_SESSION['totsesmatiere']){ 
  $_SESSION['confajout']=2;
} 
    header('location:ajoutmatensg.php');
 
  
  


  ?>
   
  
 