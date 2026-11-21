<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0   ){ 

    function veridamin($user,$mot){

     $true=0;
     $v="SELECT * FROM admin  WHERE   sup ='0'";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['user']==$user AND $donnees['mtpasse']==$mot ){ 
              $true=$donnees['id'];
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }



    if(isset($_POST['change'])){
 
$user=$_POST['user'];
$mtp=$_POST['mtp'];
$idadmin=veridamin($user,$mtp);
 if($idadmin==0 OR $idadmin==$id){
    $r="UPDATE admin SET  mtpasse ='".$mtp."'  WHERE id ='".$_SESSION['id']."'";
    $req=$bdda->query($r);
    $r="UPDATE admin SET  user ='".$user."'  WHERE id ='".$_SESSION['id']."'";
    $req=$bdda->query($r);
    $_SESSION['util']=$user;
    $_SESSION['mtp']=$mtp;
    $_SESSION['modifmotad']=1;
 }

  header('location:motad.php');
    } 



 
 



    
      
      
    
    










} 
 
 

   ?>