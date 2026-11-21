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
 $tab=array();
 $tab=explode("-",$_POST['periode']);
 $idperiod=$tab[1]; 
 $idens=$_POST['idens'];
 $nom=nomC($idens);
 $heure=date('H:i');
 $date=date('Y-m-d');
 $salbrut=$_POST['salbrut'];
 
 if($avance>=0 AND $salbrut>=0){
   
   // $totalvrai=lohnbrutadmin($idens,$idperiod,$_SESSION['annee']) ;
   $totalvrai=$salbrut ;
   $totaltemporaire=lohnohneidadmin($idens,$idperiod,$_SESSION['annee'],$id);
    $acomparer=$totaltemporaire+$avance;
    if($totalvrai>=$acomparer){

    $r="UPDATE salaireadmin SET  salaire ='".$salbrut."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaireadmin SET  montant ='".$avance."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaireadmin SET  idpe ='".$idperiod."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
   
    $r="UPDATE salaireadmin SET  datemodif ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaireadmin SET  idemplmodif ='".$_SESSION['id']."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE salaireadmin SET  nomens ='".$nom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['msgmodifsalairead']=" ";
    $_SESSION['modifsalairead']=1;
     } 
   }
   else{
    $_SESSION['msgmodifsalairead']="Vérifiez le montant saisi";
    $_SESSION['modifsalairead']=2;
   }
  
 header('location:salairad.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];   
       $r="DELETE FROM salaireadmin  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supsalairead']=1;
              $_SESSION['msgsupsalairead']=" " ;
              header('location:salairad.php');
    }
 



     










} 
 
 

   ?>