<?php  
if(isset($_POST['send2'])){
    session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php'; require '../lesemploi.php'; 


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
  
$datenreg= $_SESSION['tagretard1'];
$heurenreg=date('H:i');
$idetab=0;
$abs="abs".$_SESSION['trimretard1'];
$absd="date".$_SESSION['trimretard1'];


$req = $bdda->prepare('INSERT INTO  retard(matelev,matiere,anelev, id_etab,trimestre,duree,dateabs,datenreg 
,heurenreg,typeutil,idleiter,motensgt,nomenreg ) 
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,? )'); 
$req->execute(array(' ',' ',$_SESSION['anretard1'],$idetab,$_SESSION['trimretard1'],' ',' ',$datenreg,$heurenreg,
$_SESSION['code'],$_SESSION['id'],' ',$_SESSION['nom']));  




$effectif=effectif($bdda,$_SESSION['anretard1'],$_SESSION['clasretard1']);
$i=1;
while($i<$effectif+1){
  $heur="heure".$i;
  $matri="matricule".$i;
  $justif="justif".$i;
   
      
      $justif=" "; 
    
      $matricule=$_SESSION['listabs1'][$i];
      $nomtri="abs".$_SESSION['trimretard1'];
      
      if(isset($_POST[$heur])){ 
        $valtag=existretardelevtag($bdda,$matricule,$_SESSION['anretard1'],$_SESSION['trimretard1'],$_SESSION['tagretard1']);
        if($valtag>0){
     
      
    }
    else{
        $duree=$_POST[$heur];
        $req = $bdda->prepare('INSERT INTO  retard(matelev,matiere,anelev, id_etab,trimestre,duree,dateabs,datenreg 
         ,heurenreg,typeutil,idleiter,motensgt,nomenreg ) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,? )'); 
        $req->execute(array($matricule,' ',$_SESSION['anretard1'],$idetab,$_SESSION['trimretard1'],$duree,' ',$datenreg,$heurenreg,
        $_SESSION['code'],$_SESSION['id'],' ',$_SESSION['nom']));  
        
         
      }
   }
   else{ 
    $valtag=existretardelevtag($bdda,$matricule,$_SESSION['anretard1'],$_SESSION['trimretard1'],$_SESSION['tagretard1']);
    if($valtag>0){

  $r="DELETE FROM retard WHERE id='".$valtag."'";
  $reqi=$bdda->query($r);
   
}
 
} $totalretardtri=totalretardtri($bdda,$matricule,$_SESSION['anretard1'],$_SESSION['trimretard1']);
$rr="UPDATE eleve SET ".$absd."='".$totalretardtri."' WHERE id_etab='0' AND matelev= '".$matricule."' AND anelev= '".$_SESSION['anretard1']."'";
$reqr=$bdda->query($rr);
  $i++;
}

} 
 
 header('location:retardedit1.php');

}
?>