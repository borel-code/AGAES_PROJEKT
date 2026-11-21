<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50  ) ){ 

 



    if(isset($_POST['modif'])){
 
$id=$_POST['modif'];
$url=$_POST['url'];  
$user=$_POST['userbd'];
 $mtp=$_POST['mtpbd']; 
 $actif=$_POST['statut'];
  
 
   
     
    $r="UPDATE liensms SET  url ='".$url."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE liensms SET  user ='".$user."'  WHERE id ='".$id."'";
    $req=$bdda->query($r); 
    $r="UPDATE liensms SET  mtp ='".$mtp."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE liensms SET  actif ='".$actif."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['modifconfigsms']=1;

 header('location:configsms.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       
       $r="DELETE FROM liensms  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supconfigsms']=1;
              
              header('location:configsms.php');
    }
 



    










} 
 
 

   ?>