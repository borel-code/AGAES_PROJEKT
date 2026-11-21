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
 
  
 
    $r="UPDATE remise SET  nom ='".$descr."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
     
    
        
        $_SESSION['modifconfigremise']=1;
        $_SESSION['msgmodifconfigremise']=" ";
   
 


  header('location:configremise.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       $r="DELETE FROM remise  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supconfigremise']=1;
              $_SESSION['msgsupconfigremise']=" " ;
              header('location:configremise.php');
    }
 



    if(isset($_POST['engconfigremise'])){
       
        $descr=$_POST['descr'];
        $req = $bdda->prepare('INSERT INTO
        remise(nom)
         VALUES(? )'); 
               $req->execute
       (array($descr)); 

       echo $descr;
   $_SESSION['engconfigremise']=1;
   $_SESSION['msgengconfigremise'] =" ";
   $_SESSION['reqconfigremise']="SELECT *  FROM  remise   ORDER BY nom";
  header('location:configremise.php');
  }
    
      
      
    
    










} 
 
 

   ?>