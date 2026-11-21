<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3 OR $_SESSION['code']==4
OR $_SESSION['code']==5 OR $_SESSION['code']==6 OR $_SESSION['code']==7 ) ){ 

  $an=$_SESSION['annee'];



    if(isset($_POST['modifsco'])){
 
$id=$_POST['modifsco'];
 
 $montant=$_POST['montant'];
 $descr=$_POST['descr'];
 
 $r="UPDATE periode SET  duree ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r); 
    $r="UPDATE periode SET  nom ='".$descr."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
     
   $_SESSION['modifconfigfrais']=1;
        $_SESSION['msgmodifconfigfrais']=" ";
   
  
  header('location:horaire.php');
    } 



    if(isset($_POST['supadm'])){
     $id=$_POST['supadm'];
       $r="DELETE FROM periode  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
      $_SESSION['supconfigfrais']=1;
              $_SESSION['msgsupconfigfrais']=" " ;
              header('location:horaire.php');
    }
 



    if(isset($_POST['engconfigfrais'])){
        $total=$_POST['montant'];
        $descr=$_POST['descr'];
        
   
        $req = $bdda->prepare('INSERT INTO
 periode(nom,duree)
  VALUES(?,? )'); 
        $req->execute
(array($descr ,$total )); 
   $_SESSION['engconfigfrais']=1;
   $_SESSION['msgengconfigfrais'] =" ";
   
 header('location:horaire.php');
  }
    
      
      
    
    










} 
 
 

   ?>