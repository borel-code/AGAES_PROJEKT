<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 

  $an=$_SESSION['annee'];





    if(isset($_POST['modifsco'])){
$id=$_POST['modifsco'];
 $descr=$_POST['descr'];
 $r="UPDATE batiment SET  nom ='".$descr."'  WHERE idb ='".$id."'";
    $req=$bdda->query($r);
     $_SESSION['modifconfigfrais']=1;
        $_SESSION['msgmodifconfigfrais']=" ";
   
  header('location:structureetab.php');
    } 


if(isset($_POST['supadm'])){  $id=$_POST['supadm'];
       $r="DELETE FROM batiment  
        WHERE idb ='".$id."' ";
          $req=$bdda->query($r); $_SESSION['supconfigfrais']=1;
              $_SESSION['msgsupconfigfrais']=" " ;
              header('location:structureetab.php');
    }
 



    if(isset($_POST['engconfigfrais'])){
       
        $descr=$_POST['descr'];
        
   
        $req = $bdda->prepare('INSERT INTO
 batiment(nom)
  VALUES(?)'); 
        $req->execute
(array($descr )); 
   $_SESSION['engconfigfrais']=1;
   $_SESSION['msgengconfigfrais'] =" ";
     

 header('location:structureetab.php');
  }
    
      
      
    
    










} 
 
 

   ?>