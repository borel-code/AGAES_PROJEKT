<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 

  $an=$_SESSION['annee'];



    if(isset($_POST['modifsco'])){
 $tab=array();
 $tab=explode("-",$_POST['matetresp']);
$id=$_POST['modifsco'];
$matricule1=$tab[0];
 $montant=$_POST['montant'];
  
 $datebrut=$_POST['date'];
 $heure=$_POST['heure'];
 $date=format2($datebrut);
  
 $auteur=$tab[1];
 $transfer=$_POST['transfdec'];
 
 if($transfer==2 AND $montant>=0 ){
     $r="UPDATE exam SET  montant ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
    $r="UPDATE exam SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  heure ='".$heure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
        
        $_SESSION['modifmisexam']=1;
        $_SESSION['msgmodifmisexam']="Les frais des examens de 
  ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." 
 sont désormais à ".$montant ;
   
 }
 
 if($montant<0){
    $_SESSION['modifmisexam']=2;
}

 if($transfer!=2 AND $montant>=0 ){
     
    $matricule2=$_POST['matritransf'];
    $classe2=Classe($bdda,$matricule2,$_SESSION['annee']);
    $nom=nameschuler($bdda,$matricule2);
    $prenom=vornameschuler($bdda,$matricule2);
    $r="DELETE FROM exam WHERE  matelev ='".$matricule2."' AND anelev= '".$an."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  matelev ='".$matricule2."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  nomelev ='".$nom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  preelev ='".$prenom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  niveauelev ='".$classe2."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  montant ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r); 
    $r="UPDATE exam SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE exam SET  heure ='".$heure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['msgmodifmisexam']="Les frais des examens de 
    ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." sont à 0 et pour 
    ".nameschuler($bdda,$matricule2)." ".vornameschuler($bdda,$matricule2)."  sont désormais à ".$montant ;
           $_SESSION['modifmisexam']=3;
 

 }

 header('location:misexam.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       $matricule1=$_POST['matelev'];  
       $r="DELETE FROM exam  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supmisexam']=1;
              $_SESSION['msgsupmisexam']="Les frais des examens de 
              ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." 
             sont désormais à 0" ;
              header('location:misexam.php');
    }
 



    if(isset($_POST['engmisexam'])){
     
      $mat=$_POST['matelev'];
     
      $an=$_SESSION['annee'];
       $mtnt=$_POST['montant'];
      $date=format2($_POST['date']);
      $heur=$_POST['heure'];
      $idresp=$_POST['idresp'];
      $true=0; echo $mtnt;
      $v="SELECT * FROM eleve WHERE   anelev= '".$an."'";
      $rep=$bdda->query($v);
      while($don=$rep->fetch() AND $true==0){
    
      if($don['matelev']==$mat){ 
        $nom=$don['nomelev'];
        $pre=$don['preelev'];
        $clas=$don['niveauelev'];
        $datelev=$don['datelev'];
        $sex=$don['sexelev'];
        $stat=$don['statut'];
         
       



      if ($mtnt >= 0){
        $req = $bdda->prepare('INSERT INTO exam(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,telev,montant,date,heure,idempl) VALUES(?,?,?,?,?,?, ?,?,?, ?,?,?, ?)'); 
        $req->execute(array($mat,$nom,$pre,$datelev,$clas,$an,$sex,'0',' ',$mtnt,$date,$heur,$idresp)); 
         
       
 $_SESSION['engmisexam']=1;
    }

    else{
      $_SESSION['msgengmisexam'] ="Vous ne 
      pouvez pas enregistrer ce paiement";
          $_SESSION['engmisexam']=2;
        }
$true=1;
  }
     
     }
    $rep->closeCursor();
      
 $_SESSION['reqmisexam']="SELECT *  FROM exam  WHERE  date='".$date."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
  
     header('location:misexam.php');
   }










} 
 
 

   ?>