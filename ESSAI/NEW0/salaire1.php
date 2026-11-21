<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'salaireoutil.php'; require 'pointagefonction.php';

$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5) ){ 

  $an=$_SESSION['annee'];



    if(isset($_POST['modifsco'])){
 
$id=$_POST['modifsco'];
 $avance=$_POST['nbheure'];
 $idperiod=$_POST['periode']; 
  
 $idens=$_POST['idens'];
 $nom=namensg($idens);
 $heure=date('H:i');
 $date=date('Y-m-d');
 $totalvrai=lohnpermonatlehr($idens,$idperiod,$_SESSION['annee']);
 $totaltemporaire=lohnohneid($idens,$idperiod,$_SESSION['annee'],$id);
 $acomparer=$totaltemporaire+$avance;
 if($avance>=0 AND $totalvrai>=$acomparer){
    
    $r="UPDATE salaire SET  montant ='".$avance."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaire SET  idpe ='".$idperiod."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
   
    $r="UPDATE salaire SET  datemodif ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaire SET  idemplmodif ='".$_SESSION['id']."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaire SET  nomens ='".$nom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['msgmodifsalaire']=" ";
    $_SESSION['modifsalaire']=1;
   }
   else{
    $_SESSION['msgmodifsalaire']="Vérifiez le montant saisi";
    $_SESSION['modifsalaire']=2;
   }
  
 header('location:pointagesal.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];   
       $r="DELETE FROM salaire  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supsalaire']=1;
              $_SESSION['msgsupsalaire']=" " ;
              header('location:pointagesal.php');
    }
 



     










} 
 
 

   ?>