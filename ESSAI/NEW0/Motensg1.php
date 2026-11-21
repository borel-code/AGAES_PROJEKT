<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

function effectif($an,$clas){
	
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
$conneEns=idtl($_SESSION['mtp'],$_SESSION['annee']); 
 
if($conneEns!=0){  
    if(isset($_POST['send'])){ 
$mot=$_POST['mot'];
$cni=cniENSG($_SESSION['idENS']);




 $verifmot=mmpassensg($mot);
 $verifcni=mmcniensg($cni);

 
    if($verifmot==0 ){
        $req="UPDATE enseignant SET mtpasse='".$mot."' WHERE id='".$_SESSION['idENS']."'  " ;
         $repon = $bdda->query($req);
         $_SESSION['mtp']=$mot;
         $_SESSION['mitteilung']="Votre mot de passe a été modifié avec succès à ".date('H:i');
        

         
    }
 
else{ 
  $_SESSION['mitteilung']="Veuillez changer ce mot de passe saisi !" ;
 

}


header('location:Motensg.php');

    }
  }   ?>