<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);
 
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
 
$min=$_POST['min'];
$eval=$_POST['eval'];
 $v="SELECT  matelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['ancalcul']."' AND niveauelev='".$_SESSION['clascalcul']."'" ;
 
$reponse = $bdda->query($v);
 
while ($donnees = $reponse->fetch() )
{
    $matkey=$donnees['matelev'];
 


   $r="UPDATE moyenne SET moyeval='0' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
     AND idcl='".$_SESSION['clascalcul']."' AND  codeval='".$eval."' AND  codetrim='".$_SESSION['trimcalcul']."'";
    $req=$bdda->query($r);

    $r="UPDATE moyenne SET rgeval=' ' WHERE matricule='".$matkey."' AND anens='".$_SESSION['ancalcul']."'
    AND idcl='".$_SESSION['clascalcul']."' AND  codeval='".$eval."' AND  codetrim='".$_SESSION['trimcalcul']."'";
   $req=$bdda->query($r);

    $totalNC=totalNCeval($matkey,$_SESSION['clascalcul'],$eval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $totalCO=totalCOeval($_SESSION['clascalcul'],$eval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    echo $totalCO;
   if($totalCO>0){ 
        $existmatmoyEval=existmoyEval($matkey,$_SESSION['clascalcul'], $_SESSION['ancalcul'],$eval,$_SESSION['trimcalcul']);
        $moyenne=$totalNC/$totalCO;
        if($existmatmoyEval==0){ 
            $req = $bdda->prepare('INSERT INTO moyenne(matricule,idcl,anens, 
            moytrim,rgtrim,codetrim,moyeval,rgeval,codeval,moyan,rgan  ) VALUES(?,?,?,?,?,?,?,?,?,?,?)'); 
            $req->execute(array($matkey,$_SESSION['clascalcul'],$_SESSION['ancalcul'],' ',' ',
            $_SESSION['trimcalcul'],$moyenne,' ',$eval,' ',' '));
              
    
        }
        else{
            $r="UPDATE moyenne SET moyeval='".$moyenne."' WHERE id='".$existmatmoyEval."'";
            $req=$bdda->query($r);
        }
      } 
} 
$reponse->closeCursor(); 





$v="SELECT id,matricule,idcl,moyeval,rgeval,codetrim,anens   FROM moyenne WHERE idcl='".$_SESSION['clascalcul']."'
AND  codeval='".$eval."' AND  codetrim='".$_SESSION['trimcalcul']."' AND  anens='".$_SESSION['ancalcul']."' ORDER BY moyeval DESC" ;
 
$reponse = $bdda->query($v);
 $i=1;
while ($donnees = $reponse->fetch() )
{
    $matkey=$donnees['matricule'];
    $hier=existmoyEval($matkey,$_SESSION['clascalcul'], $_SESSION['ancalcul'],$eval,$_SESSION['trimcalcul']);
       
    $minelev=compternbreval($matkey,$_SESSION['clascalcul'],$eval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    if($minelev>=$min AND $hier!=0){
         
         $r="UPDATE moyenne SET rgeval='".$i."' WHERE id='".$hier."'";
         $req=$bdda->query($r);
         $i++;
    }

} 
$reponse->closeCursor();    

//rang DES GROUPE
$lesidgroupe=array();
$v="SELECT *  FROM groupmatensg1   WHERE   typeEns='".$_SESSION['typensgcalcul']."'" ;
   $reponse= $bdda->query($v);
    $i=1;   
    while ($donnees= $reponse->fetch())
     {
      $lesidgroupe[$i]=$donnees['code'];
      $CODE=$donnees['code'];
          
      $va="SELECT id,idcl,idgroup,eval,notegroup,anens  FROM  notegroupeval  WHERE   
      idcl='".$_SESSION['clascalcul']."' AND 
      idgroup='".$CODE."' AND eval='".$eval."' AND  anens='".$_SESSION['ancalcul']."' AND rg='O' ORDER BY notegroup DESC" ;
      $reponsea= $bdda->query($va);
       $j=1;   
       while ($donneesa= $reponsea->fetch())
        {
           $idkey=$donneesa['id']; 
            $ra="UPDATE notegroupeval SET rg='".$j."' WHERE id='".$idkey."'";
           $reqa=$bdda->query($ra);
           $j++;
         
       } 
     $reponsea->closeCursor(); 



  $i++;
    } 
    $reponse->closeCursor(); 


  
   
 

//




    
}
$_SESSION['calerfolg']=1 ;
 header('location:insertcalcul1.php');
?>