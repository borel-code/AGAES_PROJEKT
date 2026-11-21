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
   
 

function verifnom($bdda,$nom,$annew){
    

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


function verifclas($bdda,$nom,$annew){
    

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

function maxmat($bdda){
    

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

   function verifscol($bdda,$type,$stat,$idcl,$an){
    

$v="SELECT *  FROM cordon WHERE anens='".$an."' AND sup='0'" ;
$reponse = $bdda->query($v);
$true=0;
while ($donnees = $reponse->fetch() AND $true==0)
{  
 
if($type==$donnees['type'] AND $idcl==$donnees['idcl'] AND $stat==$donnees['stat']){
    $true=$donnees['id'];;
}
 

} 
$reponse->closeCursor(); 
    return $true;
   }

    
   function verifmatgp($bdda,$idmat,$idgroup,$typeEns,$an){
    

$v="SELECT *  FROM matgroup WHERE anens='".$an."' AND sup='0'" ;
$reponse = $bdda->query($v);
$true=0;
while ($donnees = $reponse->fetch() AND $true==0)
{  
 
if($typeEns==$donnees['typeEns'] AND $idgroup==$donnees['idgroup'] AND $idmat==$donnees['idmat']){
    $true=$donnees['id'];;
}
 

} 
$reponse->closeCursor(); 
    return $true;
   }

$ancyear=$_POST['ann'];
 $newyear=$_SESSION['annee'];
  if(isset($_POST['send'])){
    if(isset($_POST['matclasse'])){
        $v="SELECT *  FROM matclasse WHERE anens='".$ancyear."' AND sup='0'" ;
        $reponse = $bdda->query($v);
        
        while ($donnees = $reponse->fetch() )
        {
        $idmat=$donnees['idmat'];
        $idcl=$donnees['idcl'];
        $idgp=$donnees['idgp'];
        $exist=existmatclass($bdda,$idmat,$_SESSION['annee'],$idcl);
        if($exist==0){
            $req=$bdda->prepare('INSERT INTO matclasse(idmat,idcl,idgp,anens,sup) VALUES(?,?,?,?,?)');
            $req->execute(array($idmat,$idcl,$idgp,$_SESSION['annee'],0)); 
        }
        else{ 
        $id=$exist;
        
        }
    } 
        $reponse->closeCursor(); 



        $va="SELECT *  FROM matgroup WHERE anens='".$ancyear."' AND sup='0'" ;
        $reponsea = $bdda->query($va);
        
        while ($donneesa = $reponsea->fetch() )
        {
        $idmat=$donneesa['idmat'];
        $idgroup=$donneesa['idgroup'];
        $typeEns=$donneesa['typeEns'];
        $exist=verifmatgp($bdda,$idmat,$idgroup,$typeEns,$_SESSION['annee']);
        if($exist==0){
            $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
            $req->execute(array($idmat,$idgroup,$_SESSION['annee'],$typeEns,0)); 
        }
        else{ 
        $id=$exist;
        
        }
    } 
        $reponsea->closeCursor(); 



    }


    if(isset($_POST['cout'])){
        $v="SELECT *  FROM cordon WHERE anens='".$ancyear."' AND sup='0'" ;
        $reponse = $bdda->query($v);
        
        while ($donnees = $reponse->fetch() )
        {
       $type=$donnees['type'];
       $montant=$donnees['tant'];
        $idcl=$donnees['idcl'];
        $stat=$donnees['stat'];
        $exist=verifscol($bdda,$type,$stat,$idcl,$_SESSION['annee']);
        if($exist==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array($type,$stat,$_SESSION['annee'],$idcl,$montant,'0'));
         }
        else{ 
            $r="UPDATE cordon SET tant='".$montant."' WHERE id='".$exist."'";
            $req=$bdda->query($r);

        echo $exist."</Br> ";
        }
    
    } 
        $reponse->closeCursor(); 
    }

$_SESSION['recondaj']=1;
  }
 header('location:recond.php');

}
?>