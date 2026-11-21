<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'salaireoutil.php'; require 'pointagefonction.php';
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==5) ){ 

  $an=$_SESSION['annee'];



  
 



    if(isset($_POST['engpointi'])){
     $date=date('Y-m-d');
     $heure=date('H:i');
      $total=$_POST['engpointi'];
      $i=0;
    if($total>0){ 
        while($i<$total){ 
        $champ='champ'.$i ;
        $valeur=$_POST[$champ];
        $taux=0;
        $nomens=namensg($_SESSION['tabensgpoint'][$i]);
        $typepaye=typepaye($_SESSION['tabensgpoint'][$i],$_SESSION['annee']);
        if($typepaye==1){
          $taux=montantpaye($_SESSION['tabensgpoint'][$i],$_SESSION['annee']);
          if($valeur>0){
            $req = $bdda->prepare('INSERT INTO pointage(idens,idpe,heurp,datep,heurenreg,idempl,idemplmodif,datemodif,an,taux,fixe,nomens) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)'); 
            $req->execute(array($_SESSION['tabensgpoint'][$i],$_SESSION['idppointi'],$valeur,$date,$heure,$_SESSION['id'],' ',' ',$_SESSION['annee'],$taux,'0',$nomens)); 
          
        }
        }
        if($typepaye==2){
          $taux=montantpaye($_SESSION['tabensgpoint'][$i],$_SESSION['annee']);
          if($valeur>0){
            $req = $bdda->prepare('INSERT INTO pointage(idens,idpe,heurp,datep,heurenreg,idempl,idemplmodif,datemodif,an,taux,fixe,nomens) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)'); 
            $req->execute(array($_SESSION['tabensgpoint'][$i],$_SESSION['idppointi'],$valeur,$date,$heure,$_SESSION['id'],' ',' ',$_SESSION['annee'],'0',$taux,$nomens)); 
          
        }
        }
        
        $i++;
       }
      }
 
      $_SESSION['engpointi']=1;
  header('location:pointage0.php');
   }










} 
 
 

   ?>