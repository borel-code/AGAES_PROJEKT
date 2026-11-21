<?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php'; require '../lesmenushoriz2.php'; require '../lesemploi.php';
 


function effectif($bdda,$an,$clas){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['niveauelev']==$clas ){
		$true++;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}


$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
  $recup=$_POST['send4'];
 $tab=explode('-',$recup);
 $id=$tab[0]; $ancduree=$tab[1]; 
 $uhr='uhr'.$id;
 $nvelleduree=$_POST[$uhr];  echo $nvelleduree;
 $reste=$ancduree-$nvelleduree;
  $datenreg=date('Y-m-d');
  $heurenreg=date('H:i');
  $idetab=0;
  $abs="abs".$_SESSION['trimabsedit1'];
  $valtrim=heurelevtri($bdda,$_SESSION['matabsedit1'],$_SESSION['anabsedit1'],$abs)-$nvelleduree; 
      
     
      
        if($reste>=0){ 
         
        $r="UPDATE absence SET  duree='".$reste."' WHERE id_etab='0' AND id='".$id."' ";
        $reqi=$bdda->query($r);
        $rr="UPDATE eleve SET  ".$abs."='".$valtrim."' WHERE id_etab='0' AND matelev= '".$_SESSION['matabsedit1']."' AND anelev= '".$_SESSION['anabsedit1']."'";
        $reqr=$bdda->query($rr);
      }
  
      $rr="DELETE FROM absence    WHERE duree= ' '";
      $reqr=$bdda->query($rr);
   header('location:absedit2.php');
} 

 
?>