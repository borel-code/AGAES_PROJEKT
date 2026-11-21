<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'salaireoutil.php'; require 'pointagefonction.php';

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==5) ){ 

  $an=$_SESSION['annee'];



    if(isset($_POST['modifsco'])){
 
$id=$_POST['modifsco'];
 $nbheure=$_POST['nbheure'];
 $idperiod=$_POST['periode']; 
 $taux=$_POST['taux'];
 $idens=$_POST['idens'];
 $mode=$_POST['mode'];
 $nom=namensg($bdda,$idens);
 $heure=date('H:i');
 $date=date('Y-m-d');
 
 if($taux>=0  AND $nbheure>=0 ){
    
if($mode==1){
  $r="UPDATE pointage SET  taux ='".$taux."'  WHERE id ='".$id."'";
  $req=$bdda->query($r); 
  $r="UPDATE pointage SET  fixe ='0'  WHERE id ='".$id."'";
  $req=$bdda->query($r); 
}
if($mode==2){
  $r="UPDATE pointage SET  taux ='0'  WHERE id ='".$id."'";
  $req=$bdda->query($r); 
  $r="UPDATE pointage SET  fixe ='".$taux."'  WHERE id ='".$id."'";
  $req=$bdda->query($r); 
}
  

    $r="UPDATE pointage SET  heurp ='".$nbheure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE pointage SET  idpe ='".$idperiod."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE pointage SET  datemodif ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE pointage SET  idemplmodif ='".$_SESSION['id']."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE pointage SET  nomens ='".$nom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['msgmodifpointage']=" ";
    $_SESSION['modifpointage']=1;
   }
   else{
    $_SESSION['msgmodifpointage']="Vérifiez si le taux horaire et le nombre d'heures sont supérieurs à 0";
    $_SESSION['modifpointage']=2;
   }
  
 header('location:salairens.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];   
       $r="DELETE FROM pointage  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['suppointage']=1;
              $_SESSION['msgsuppointage']=" " ;
              header('location:salairens.php');
    }
 


 










} 
 
 

   ?>