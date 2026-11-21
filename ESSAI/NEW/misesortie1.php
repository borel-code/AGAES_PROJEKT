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
 
$id=$_POST['modifsco'];
 
 $montant=$_POST['montant'];
 $descr=$_POST['descr'];
 $qte=$_POST['qte'];
 $desti=$_POST['desti'];
 $datebrut=$_POST['date'];
 
 $date=format2($datebrut);
   
 
 if( $montant>=0 ){
     $r="UPDATE sortie SET  total ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
    $r="UPDATE sortie SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE sortie SET  descr ='".$descr."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE sortie SET  qte='".$qte."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE sortie SET  desti ='".$desti."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
        
        $_SESSION['modifmisesortie']=1;
        $_SESSION['msgmodifmisesortie']=" ";
   
 }
 
 if($montant<0){
    $_SESSION['modifmisesortie']=2;
}
 

 header('location:misesortie.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       $matricule1=$_POST['matelev'];  
       $r="DELETE FROM sortie  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supmisesortie']=1;
              $_SESSION['msgsupmisesortie']=" " ;
              header('location:misesortie.php');
    }
 



    if(isset($_POST['engmisesortie'])){
        $total=$_POST['montant'];
        $descr=$_POST['descr'];
        $qte=$_POST['qte'];
        $desti=$_POST['desti'];
        $dat=format2($_POST['date']);
        $idresp=$_POST['idresp']; 
  if ($total >= 0){
        $req = $bdda->prepare('INSERT INTO
 sortie(descr,qte,total,id_etab,an,idempl,date,desti)
  VALUES(?,?,?, ?,?,?, ?, ? )'); 
        $req->execute
(array($descr,$qte,$total,'0',$_SESSION['annee'],$idresp,$dat,$desti)); 
   $_SESSION['engmisesortie']=1;
   $_SESSION['msgengmisesortie'] =" ";
    }
 else{
      $_SESSION['msgengmisesortie'] ="Vous ne 
      pouvez pas enregistrer cette sortie d'argent";
          $_SESSION['engmisesortie']=2;
  }
$_SESSION['reqmisesortie']="SELECT *  FROM sortie  WHERE date='".$date."' AND an='".$_SESSION['annee']."'  ORDER BY date DESC";

 header('location:misesortie.php');
  }
    
      
      
    
    










} 
 
 

   ?>