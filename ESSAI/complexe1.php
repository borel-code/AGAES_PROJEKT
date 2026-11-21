<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50  OR $_SESSION['code']==1  OR $_SESSION['code']==2  OR $_SESSION['code']==7 ) ){ 

 



    if(isset($_POST['modif'])){
 
$id=$_POST['modif'];
$initial=$_POST['initial'];
$lien=$_POST['lien'];
$serveur=$_POST['serveur'];
$nom_bd=$_POST['nombd'];
$user_bd=$_POST['userbd'];
 $mtp=$_POST['mtpbd'];
 $ici=$_POST['lieu'];
 $actif=$_POST['statut'];
  
 
   
     
    $r="UPDATE lien SET  initial ='".$initial."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  lien ='".$lien."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  serveur ='".$serveur."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  basedonnees ='".$nom_bd."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  user ='".$user_bd."'  WHERE id ='".$id."'";
    $req=$bdda->query($r); 
    $r="UPDATE lien SET  mtp ='".$mtp."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  ici ='".$ici."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE lien SET  actif ='".$actif."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['modifcomplexe']=1;

 header('location:complexe.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       
       $r="DELETE FROM lien  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supcomplexe']=1;
              
              header('location:complexe.php');
    }
 



    










} 
 
 

   ?>