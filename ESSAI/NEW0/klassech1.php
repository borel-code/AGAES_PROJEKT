 <?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';

 echo'<meta charset="utf-8" />';



 $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==4 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  

 $a=$_POST['clas'];
$b=$_POST['mat'];
$c=$_POST['ann'];
 


  


 $ve="SELECT * FROM eleve WHERE id_etab='0' ";
 $reponse = $bdda->query($ve);
    $t=0;
   while ($donnees = $reponse->fetch() AND $t==0)
   {
   if($donnees['matelev']==$b AND $donnees['anelev']==$c){
	$statut=$donnees['statut'];   
   $prix=vollpension($a,$statut,$c);  
   $rest=$prix-$donnees['total'];
$requete = "UPDATE eleve SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repons = $bdda->query($requete);
$requete = "UPDATE eleve SET cout='".$prix."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repons = $bdda->query($requete);
$requete = "UPDATE eleve SET reste='".$rest."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repons = $bdda->query($requete);
$requet = "UPDATE moytrim1 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$reque = "UPDATE moytrim2 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repo = $bdda->query($reque);
$requ = "UPDATE moytrim3 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$rep = $bdda->query($requ);
$requet = "UPDATE notetrim1 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$requet = "UPDATE notetrim2 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$requet = "UPDATE notetrim3 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$requet = "UPDATE groupetrim1 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$requet = "UPDATE groupetrim2 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
$requet = "UPDATE groupetrim3 SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$repon = $bdda->query($requet);
 
$requ = "UPDATE exam SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$rep = $bdda->query($requ);
$requ = "UPDATE detail SET niveauelev='".$a."' WHERE matelev ='".$b. "' AND anelev='".$c."' AND id_etab='0' " ;
$rep = $bdda->query($requ);
$t=1; 	 
}
	   
     
   } 
   $reponse->closeCursor(); 
 header('location:klasse.php');
}
// Exécution de l ’ ordre SQL
 ?>