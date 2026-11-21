<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
set_time_limit(2000);
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require '../lesmenushoriz2.php';

if(isset($_POST['envoi1'])){
$an= $_SESSION['annee'] ;
}
else{
  $an=$_SESSION['annee'] ;
}
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


$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  

	

function mmcodemat($nom){
	
	$v="SELECT *  FROM matiere  WHERE  sup='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['codemat']==$nom ){
		$true=$donnees['id'];
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}

    if($_SESSION['compter']>0){
       
for($j=1;$j<=$_SESSION['compter'];$j++){
    $identif="identif".$j;
    $subject="nom".$j;
    $tup="type".$j;
    $grou1="gpe1".$j;
     $grou2="gpe2".$j;
     $grou3="gpe3".$j;
     $grou4="gpe4".$j;

       
       $idmat= $_POST[$identif];
       $nom=$_POST[$subject];
        $type=$_POST[$tup];
        $gp1=$_POST[$grou1];
        $gp2=$_POST[$grou2];
        $gp3=$_POST[$grou3];
        $gp4=$_POST[$grou4];
        if($nom!=" " AND !empty($nom)){
          $verifie2=mmcodemat($nom);
          if($verifie2==0){ 
          $r="UPDATE matiere SET codemat='".$nom."' WHERE id='".$idmat."' ";
          $req=$bdda->query($r);
        }
          $r="UPDATE matiere SET typeEns='".$type."' WHERE id='".$idmat."' ";
          $req=$bdda->query($r);
          $r="DELETE FROM matgroup  WHERE idmat='".$idmat."' ";
          $req=$bdda->query($r);
          
          
 if($gp1!=" " AND !empty($gp1)){
  $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
  $req->execute(array($idmat,$gp1,$_SESSION['annee'],1,0)); 
}

if($gp2!=" " AND !empty($gp2)){
$req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
$req->execute(array($idmat,$gp2,$_SESSION['annee'],2,0)); 
}


if($gp3!=" " AND !empty($gp3)){
$req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
$req->execute(array($idmat,$gp3,$_SESSION['annee'],3,0)); 
}

if($gp4!=" " AND !empty($gp4)){
$req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
$req->execute(array($idmat,$gp4,$_SESSION['annee'],4,0)); 
}
        }
               

    }


       } 
       
 
header('location:ajoutmat1.php');
  }   ?>