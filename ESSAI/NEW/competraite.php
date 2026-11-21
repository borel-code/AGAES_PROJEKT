<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php'; require 'competfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 

AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7)  ){ 

if(isset($_POST['engcompet'])){
   $idmat=$_POST['matiere'];
   $intitule=$_POST['intitule'];
   $niveau=$_POST['niveauclas'];
   $trimestre=$_POST['trimestre'];
   $req = $bdda->prepare('INSERT INTO competence(intitule,idmat,niveauclas,trimestre)
    VALUES(?,?,?,?)'); 
    $req->execute(array($intitule,$idmat,$niveau,$trimestre)); 
    $_SESSION['engmisesco']=1;
    header('location:competence1.php');
}

if(isset($_POST['modcompet'])){
    $id=$_POST['modcompet'];
    $idmat=$_POST['matiere'];
    $intitule=$_POST['intitule'];
    $niveau=$_POST['niveauclas'];
    $trimestre=$_POST['trimestre']; 
    $r="UPDATE competence SET  trimestre ='".$trimestre."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE competence SET  idmat='".$idmat."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE competence SET  intitule ='".$intitule."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE competence SET  niveauclas ='".$niveau."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['modifmisesco']=1;
     header('location:competencevu.php');
 }

 //sUPPRIMER COMPETENCE
if(isset($_POST['supcompet'])){
    $id=$_POST['supcompet'];
    $r="DELETE FROM competence WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $_SESSION['supmisesco']=1;
     header('location:competencevu.php');
 }
// FIN SUPPRIMER COMPETENCE  
if(isset($_POST['supcompetclas'])){
   $id=$_POST['supcompetclas'];
   $r="DELETE FROM competenceclas WHERE id ='".$id."'";
   $req=$bdda->query($r);
   $_SESSION['supmisesco']=1;
    header('location:competparclas1.php');
}

if(isset($_POST['rechcompet'])){
    $idmat=$_POST['matiere'];
    $niveau=$_POST['niveauclas'];
    $trimestre=$_POST['trimestre']; 
  
        if($idmat=='0' AND $niveau=='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau=='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE trimestre='".$trimestre."' ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau!='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau!='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' AND trimestre='".$trimestre."' ORDER BY idmat";
         }
     
        if($idmat!='0' AND $niveau=='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE idmat='".$idmat."' ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau=='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE trimestre='".$trimestre."' AND  idmat='".$idmat."' ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau!='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."'  AND  idmat='".$idmat."'  ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau!='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' AND trimestre='".$trimestre."'  AND  idmat='".$idmat."' ORDER BY idmat";
         }
     header('location:competencevu.php');
 }




 if(isset($_POST['rechcompetasso'])){
    $idmat=$_POST['matiere'];
    $niveau=$_POST['niveauclas'];
    $trimestre=$_POST['trimestre']; 
  
        if($idmat=='0' AND $niveau=='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau=='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE trimestre='".$trimestre."' ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau!='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' ORDER BY idmat";
         }
         if($idmat=='0' AND $niveau!='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' AND trimestre='".$trimestre."' ORDER BY idmat";
         }
     
        if($idmat!='0' AND $niveau=='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE idmat='".$idmat."' ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau=='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE trimestre='".$trimestre."' AND  idmat='".$idmat."' ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau!='0' AND $trimestre=='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."'  AND  idmat='".$idmat."'  ORDER BY idmat";
         }
         if($idmat!='0' AND $niveau!='0' AND $trimestre!='0'){
            $_SESSION['reqcompets']="SELECT *  FROM competence WHERE niveauclas='".$niveau."' AND trimestre='".$trimestre."'  AND  idmat='".$idmat."' ORDER BY idmat";
         }
     header('location:competassocie.php');
 }

 if(isset($_POST['confcompetasso'])){
   $total=$_SESSION['totcom'];
   $tabcls=$_POST['clas'];
   $lencls=count($tabcls);
   if($total>0){
      for($i=0;$i<$total;$i++){
         $nomcom="nomcom".$i;
         if(isset($_POST[$nomcom])){
            $idcomp=$_POST[$nomcom];
            for($j=0;$j<$lencls;$j++){
               $idclas=$tabcls[$j];
               $verif=cptexistclas($idcomp,$idclas,$_SESSION['annee']);
               if($verif==0){
                  $req = $bdda->prepare('INSERT INTO competenceclas(idcomp,idclas,anens)
                  VALUES(?,?,?)'); 
                  $req->execute(array($idcomp,$idclas,$_SESSION['annee'])); 
                  $_SESSION['engmisesco']=1;
               }
            }
         }
      }
     
   }
  
     header('location:competassocie.php');
}






}
?>