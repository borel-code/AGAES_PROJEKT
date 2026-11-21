<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 

  $an=$_SESSION['annee'];



    if(isset($_POST['modifsco'])){
 
$id=$_POST['modifsco'];
 
 $montant=$_POST['montant'];
 $descr=$_POST['descr'];
 
  
 
 if( $montant>=0 ){ echo  $montant;
     $r="UPDATE autrefrais SET  prix ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r); 
    $r="UPDATE autrefrais SET  nom ='".$descr."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
     
    
        
        $_SESSION['modifconfigfrais']=1;
        $_SESSION['msgmodifconfigfrais']=" ";
   
 }
 
 if($montant<0){
    $_SESSION['modifconfigfrais']=2;
}
 

  header('location:configfrais.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       $r="DELETE FROM autrefrais  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supconfigfrais']=1;
              $_SESSION['msgsupconfigfrais']=" " ;
              header('location:configfrais.php');
    }
 



    if(isset($_POST['engconfigfrais'])){
        $total=$_POST['montant'];
        $descr=$_POST['descr'];
        
  if ($total >= 0){
        $req = $bdda->prepare('INSERT INTO
 autrefrais(nom,prix)
  VALUES(?,? )'); 
        $req->execute
(array($descr ,$total )); 
   $_SESSION['engconfigfrais']=1;
   $_SESSION['msgengconfigfrais'] =" ";
    }
 else{
      $_SESSION['msgengconfigfrais'] ="Vous ne 
      pouvez pas enregistrer ";
          $_SESSION['engconfigfrais']=2;
  }
 header('location:configfrais.php');
  }
    
      
      
    
    










} 
 
 

   ?>