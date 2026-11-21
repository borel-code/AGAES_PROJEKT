<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);


 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
   
 

function verifnom($nom,$annew){
    

 $v="SELECT *  FROM matiere WHERE anens='".$annew."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
  $nomanc= $donnees['codemat'] ; 
  if($nomanc==$nom){
      $true=1;
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}


function verifclas($nom,$annew){
    

 $v="SELECT *  FROM classe WHERE anens='".$annew."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
  $nomanc= $donnees['code'] ; 
  if($nomanc==$nom){
      $true=1;
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}

function maxmat(){
    

    $v="SELECT MAX(id) AS n  FROM matiere WHERE sup='0'" ;
    $rep=$bdda->query($v);
    $id=0;
    while ($donnee=$rep->fetch())
    {
     $id=$donnee['n'];   
    }
    $rep->closeCursor();
    return $id;
   }

   function maxclas(){
    

    $v="SELECT MAX(id) AS n  FROM classe WHERE sup='0'" ;
    $rep=$bdda->query($v);
    $id=0;
    while ($donnee=$rep->fetch())
    {
     $id=$donnee['n'];   
    }
    $rep->closeCursor();
    return $id;
   }

$ancyear=$_POST['ann'];
 $newyear=$_SESSION['annee'];
 
$bordmatold=array();
$bordmatnew=array();
$c=0;
$v="SELECT *  FROM matiere WHERE anens='".$ancyear."' AND sup='0'";
$reponse = $bdda->query($v);
$true=0;
while ($donnees = $reponse->fetch() )
{
 $idanc= $donnees['id'] ; 
 $nomanc= $donnees['codemat'] ; 
 $type= $donnees['typeEns'] ;
 $exist=verifnom($nomanc,$newyear);
 if($exist==0){
    $bordmatold[$c]=$idanc;
    $req=$bdda->prepare('INSERT INTO matiere(codemat,code,typeEns,sup,anc,anens) VALUES(?,?,?,?,?,?)');
    $req->execute(array($nomanc,' ',$type,0,0,$newyear)); 
    $idnew=maxmat();  
    $bordmatnew[$c]=$idnew;
    $f="SELECT *  FROM matgroup WHERE anens='".$ancyear."' AND sup='0'";
    $feponse = $bdda->query($f);
    while ($fonnees = $feponse->fetch() )
    {
       $Type=$fonnees['typeEns'] ;
       $Idgroup=$fonnees['idgroup'] ;
       $Idmat=$fonnees['idmat'] ;
       if($Idmat==$idanc){
        $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
        $req->execute(array($idnew,$Idgroup,$newyear,$Type,0)); 
       }
   } 
   $feponse->closeCursor();
$c++;
} 

}
$reponse->closeCursor(); 
 
//DEB PARCOURS CLASSE
$bordclasold=array();
 $bordclasnew=array();
 $l=0;
$b="SELECT *  FROM classe WHERE anens='".$ancyear."' AND sup='0'";
 $beponse = $bdda->query($b);
 while ($bonnees = $beponse->fetch() )
 {
    $idroom=$bonnees['id'] ;
    $coderoom=$bonnees['code'] ;
    $typeroom=$bonnees['typeEns'] ;
    $cycleroom=$bonnees['cycle'] ;
    $effroom=$bonnees['etab0'] ;
    $categroom=$bonnees['categ'] ;  
    $exist1=verifclas($coderoom,$newyear);
    if($exist1==0){
        $bordclasold[$l]=$idroom;
        $reqA = $bdda->prepare('INSERT INTO classe(code,niveau,typeEns,cycle,etab0,anc,anens,categ,sup) VALUES(?,?,?,?,?,?,?,?,?)'); 
        $reqA->execute(array($coderoom,' ',$typeroom, $cycleroom,$effroom,'1',$newyear,$categroom,'0'));
        $idnewroom=maxclas();
        $bordclasnew[$l]=$idnewroom;
      
        $l++;
    }
} 
$beponse->closeCursor();

//FIN PARCOURS CLASSE

$longmat=count($bordmatold);
$longclas=count($bordclasold);
  
function retouve($mat,$cls,$an){

    $true=0;
    $a="SELECT *  FROM matclasse WHERE anens='".$an."' AND sup='0'";
    $aeponse = $bdda->query($a);
    while ($aonnees = $aeponse->fetch() AND $true==0)
    {
       if($aonnees['idmat']==$mat AND $aonnees['idcl']==$cls){ 
          $true=$aonnees['idgp'];
       }
   } 
   $aeponse->closeCursor();
   return $true;
}
 
 // INSERT CLASSE ET IDGP ANC MATIERE  
 for($w=0;$w<$longmat;$w++){ 
    for($p=0;$p<$longclas;$p++){
        $idgp=retouve($bordmatold[$w],$bordclasold[$p],$ancyear);
        if($idgp!=0){ 
            $feq=$bdda->prepare('INSERT INTO matclasse(idmat,idcl,idgp,anens,sup) VALUES(?,?,?,?,?)');
            $feq->execute(array($bordmatnew[$w],$bordclasnew[$p],$idgp,$newyear,0)); 
        }
   } 
}




// FIN RECENSE

 
/*
$r="DELETE FROM  matiere  WHERE  anens='".$newyear."'";
$req=$bdda->query($r);
 

*/
header('location:recond.php');

}
?>