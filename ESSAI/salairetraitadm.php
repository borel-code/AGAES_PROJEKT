<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'salaireoutil.php'; require 'pointagefonction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5) ){ 

  $an=$_SESSION['annee'];



  
 



    if(isset($_POST['engpointsalad'])){
     $date=date('Y-m-d');
     $heure=date('H:i');
      $total=$_POST['engpointsalad'];
      $idens=$_POST['idens'];
      $i=0;
    if($total>0){ 
        while($i<$total){ 
        $champ='champ'.$i ;
        $idmois="mois".$i;
        $topay="total".$i;
        $todjpay="totaldj".$i;

        $valeur=$_POST[$champ];
        $midmois=$_POST[$idmois];
        $mtopay=$_POST[$topay];
        $mtodjpay=$_POST[$todjpay];
        $nomens=nomC($bdda,$idens);
        if($valeur>0){
        $compar=$mtodjpay+$valeur;
        $reste=$mtopay-$compar;
        
        if($reste>=0){
            echo $reste;
            $req = $bdda->prepare('INSERT INTO salaireadmin(idadmin,idpe,montant,salaire,datep,heurenreg,idempl,idemplmodif,datemodif,an,taux,nomens) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)'); 
            $req->execute(array($idens,$midmois,$valeur,$mtopay,$date,$heure,$_SESSION['id'],' ',' ',$_SESSION['annee'], '0',$nomens)); 
          
        }
        }
 
        
        $i++;
       }
      }
 
      $_SESSION['engpointsalad']=1;
   header('location:salaire0ad.php');
   }










} 
 
 

   ?>