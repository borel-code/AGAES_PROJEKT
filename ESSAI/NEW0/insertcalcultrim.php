<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';require '../bullinfo.php'; 
require '../listabrvtype.php'; 
 set_time_limit(2000);

 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){
  
    
 
 
 $v="SELECT matelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['ancalcul']."' AND niveauelev='".$_SESSION['clascalcul']."'" ;
 
$reponse = $bdda->query($v);
 
while ($donnees = $reponse->fetch() )
{
    $matkey=$donnees['matelev'];
 


   $r="UPDATE moyennetrim SET moytrim='0' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
     AND idcl='".$_SESSION['clascalcul']."' AND  codetrim='".$_SESSION['trimcalcul']."'";
    $req=$bdda->query($r);

    $r="UPDATE moyennetrim SET rgtrim=' ' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
    AND idcl='".$_SESSION['clascalcul']."'  AND  codetrim='".$_SESSION['trimcalcul']."'";
   $req=$bdda->query($r);

    $totalNC=totalNCtrim($matkey,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $totalCO=totalCOtrim($matkey,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    if($totalCO>0){ 
        $moyenne=$totalNC/$totalCO;  //echo $moyenne." ".$matkey." ".$totalCO." ".$totalNC."</br>";
        $test=voirmoytrim($matkey,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
        if($test==0){
          $req = $bdda->prepare('INSERT INTO moyennetrim(matricule,idcl,anens, 
          moytrim,rgtrim,codetrim) VALUES(?,?,?,?,?,?)'); 
          $req->execute(array($matkey,$_SESSION['clascalcul'],$_SESSION['ancalcul'],$moyenne,' ',
          $_SESSION['trimcalcul']));
        }
        else{ 
        $r="UPDATE moyennetrim SET moytrim='".$moyenne."' WHERE matricule='".$matkey."' AND 
        idcl='".$_SESSION['clascalcul']."' 
         AND codetrim='".$_SESSION['trimcalcul']."' AND anens='".$_SESSION['ancalcul']."'";
            $req=$bdda->query($r);
          }     
    } 
} 
$reponse->closeCursor(); 


 


$v="SELECT * FROM moyennetrim WHERE  idcl='".$_SESSION['clascalcul']."'
AND codetrim='".$_SESSION['trimcalcul']."' AND anens='".$_SESSION['ancalcul']."'  ORDER BY moytrim DESC" ;
 
$reponse = $bdda->query($v);
 $i=1;
while ($donnees = $reponse->fetch() )
{
        
         $id=$donnees['id'];
         $r="UPDATE moyennetrim SET rgtrim='".$i."' WHERE id='".$id."'";
         $req=$bdda->query($r);
         $i++;
    

} 
$reponse->closeCursor();    






//CLASSEMENT DES GROUPEs
 
//rang DES GROUPE
$lesidgroupe=array();
$v="SELECT *  FROM groupmatensg1   WHERE   typeEns='".$_SESSION['typensgcalcul']."'" ;
   $reponse= $bdda->query($v);
    $i=1;   
    while ($donnees= $reponse->fetch())
     {
      $lesidgroupe[$i]=$donnees['code'];
      $CODE=$donnees['code'];



  $va="SELECT id,idcl,idgroup,trimestre,notegroup,anens  FROM  notegrouptrim 
    WHERE idgroup='".$CODE."'   AND idcl='".$_SESSION['clascalcul']."' 
    AND trimestre='".$_SESSION['trimcalcul']."' AND anens='".$_SESSION['ancalcul']."' AND rg='O'  ORDER BY notegroup DESC" ;
   $reponsea= $bdda->query($va);
    $j=1;   
    while ($donneesa= $reponsea->fetch())
     {
   
         $idkey=$donneesa['id'];  
         $ra="UPDATE notegrouptrim  SET rg='".$j."' WHERE id='".$idkey."'";
        $reqa=$bdda->query($ra);
        $j++;
        
    } 
  $reponsea->closeCursor(); 
  
   
 
  $i++;
    } 
    $reponse->closeCursor(); 

 




//MOYENNE ANNUELLE
$NbreTrim=nombretrimestre($_SESSION['clascalcul'],$_SESSION['ancalcul']);
 
$v="SELECT matelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['ancalcul']."' AND niveauelev='".$_SESSION['clascalcul']."'" ;
 
$reponse = $bdda->query($v);
 
while ($donnees = $reponse->fetch() )
{
    $matkey=$donnees['matelev'];
 
    $nombretrimestreperso=nombretrimestreperso($_SESSION['clascalcul'],$matkey,$_SESSION['ancalcul']);
    if($NbreTrim==$nombretrimestreperso){
      $rang="O";
    }
    else{
      $rang=" ";
    }
     
   $r="UPDATE moyenneannuel SET moyan=' ' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
     AND idcl='".$_SESSION['clascalcul']."'";
    $req=$bdda->query($r);

    $r="UPDATE moyenneannuel SET rgan=' ' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
    AND idcl='".$_SESSION['clascalcul']."'";
   $req=$bdda->query($r);
     $moyan= myenneklasannuel($_SESSION['clascalcul'],$matkey,$_SESSION['ancalcul']);
    
     echo $moyan;
        
        $test1=voirmoyan($matkey,$_SESSION['clascalcul'],$_SESSION['ancalcul']);  
        if($test1==0){
          $req = $bdda->prepare('INSERT INTO moyenneannuel(matricule,idcl,anens, 
          moyan,rgan) VALUES(?,?,?,?,?)'); 
          $req->execute(array($matkey,$_SESSION['clascalcul'],$_SESSION['ancalcul'],$moyenne,$rang));
        }
        else{ 
        $r="UPDATE moyenneannuel SET moyan='".$moyan."' WHERE matricule='".$matkey."' AND 
        idcl='".$_SESSION['clascalcul']."' AND anens='".$_SESSION['ancalcul']."'";
            $req=$bdda->query($r);
            $r="UPDATE moyenneannuel SET rgan='".$rang."' WHERE matricule='".$matkey."' AND 
            idcl='".$_SESSION['clascalcul']."' AND anens='".$_SESSION['ancalcul']."'";
                $req=$bdda->query($r);    
          }     
    
} 
$reponse->closeCursor(); 




$v="SELECT * FROM moyenneannuel WHERE anens='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ORDER BY moyan DESC" ;
 
$reponse = $bdda->query($v);
 $i=1;
while ($donnees = $reponse->fetch() )
{
        
         $id=$donnees['id'];
         if($donnees['rgan']=='O'){ 
         $r="UPDATE moyenneannuel SET rgan='".$i."' WHERE id='".$id."'";
         $req=$bdda->query($r);
         $i++;
        }

} 
$reponse->closeCursor(); 







//



    
}
 $_SESSION['caltrimerfolg']=1 ;
   header('location:insertcalcul1.php');
?>