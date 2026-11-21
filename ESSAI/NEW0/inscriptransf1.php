<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
 

 $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==2
 OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5
 OR $_SESSION['code']==6 OR $_SESSION['code']==7)){ 

	

  function eleveEXIST($bdda,$mat,$an){

    $v="SELECT matelev,anelev,id  FROM eleve  WHERE anelev='".$an."'";
    $reponse = $bdda->query($v);
    $true=0;
    while ($donnees = $reponse->fetch() )
    {
     if( $donnees['matelev']==$mat ){
      $true=1;
      } 
      
    } 
    $reponse->closeCursor();
     return $true;   
  }  
if(isset($_POST['save'])){
  
  $_SESSION['totlsave']=$_POST['total'];
  $_SESSION['clasave']=$_POST['clsnew'];
  $cout= vollpension($_SESSION['clasave'],"A",$_SESSION['annee']);
 $i=1;
 while($i<=$_SESSION['totlsave']){
  $cocher="cocher".$i; 
  $nomelev="nomelev".$i; $datelev="datelev".$i;
  $preelev="preelev".$i;$sexe="sexe".$i;
  $tel="tel".$i;
  if(isset($_POST[$cocher])){ 
  $val=$_POST[$cocher];
 $testexist=eleveEXIST($bdda,$val,$_SESSION['annee']);
 if($testexist==0){
  $date=date('Y-m-d');
$heur=date('H:i'); 
   $req = $bdda->prepare('INSERT INTO eleve(matelev,nomelev, preelev,
   datelev, niveauelev,niveau,anelev,sexelev,id_etab,
   statut,telev,cout,total,reste,date,heure) 
   VALUES(?,?,?,?,?,?,?,?,?,?, ?,?,?, ?, ?, ?)'); 
  $req->execute(array($val,$_POST[$nomelev],$_POST[$preelev],
  $_POST[$datelev],$_SESSION['clasave'],' ',$_SESSION['annee'],
  $_POST[$sexe],'0',"A",$_POST[$tel],$cout,0,0,$date,$heur)); 
   

  echo $val." ".$_POST[$nomelev]." ".$_POST[$preelev]." ".
  $_POST[$datelev]." ".$_POST[$tel]." ".$cout."</Br>";
 }
 if($testexist!=0){
   $r="UPDATE eleve SET niveauelev='".$_SESSION['clasave']."' WHERE matelev='".$val."' AND anelev='".$_SESSION['annee']."'";
 $req=$bdda->query($r);
  
 }
}
 // echo $val."</Br>";
  $i++;
 }
}


 }
 
 header('location:inscriptransf.php');
 ?>