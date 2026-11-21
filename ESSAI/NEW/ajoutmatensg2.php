<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 



 
 

  
$matiere1=$_POST['matiere1'];
if($_SESSION['totalcl1']>0){
  $tmat1=0;
  while($tmat1<$_SESSION['totalcl1']){
      $chpclasse="classe".$tmat1;  
      if(isset($_POST[$chpclasse])){ 
          $valeur=$_POST[$chpclasse];
          echo $valeur."</br>";
           $verifie1=matierealui($bdda,$_SESSION['idens2'],$valeur,$matiere1,$_SESSION['annee']);
          if($verifie1==0){
              $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
          $req->execute(array($matiere1,$valeur,$_SESSION['idens2'],$_SESSION['annee']));
          }
      } 
      $tmat1++;
  }
}

  $matiere2=$_POST['matiere2'];
  if($_SESSION['totalcl2']>0){
     $tmat2=0;
       while($tmat2<$_SESSION['totalcl2']){
        $chpclasse2="school".$tmat2;
       
          if(isset($_POST[$chpclasse2])){ 
             $valeur2=$_POST[$chpclasse2];
            $verifie2=matierealui($bdda,$_SESSION['idens2'],$valeur2,$matiere2,$_SESSION['annee']);
             if($verifie2==0){
                 $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
             $req->execute(array($matiere2,$valeur2,$_SESSION['idens2'],$_SESSION['annee']));
             }
            
         } 
         $tmat2++;
     }
   }





  

  $matiere3=$_POST['matiere3'];
  if($_SESSION['totalcl3']>0){
    $tmat3=0;
    while($tmat3<$_SESSION['totalcl3']){
        $chpclasse3="cl".$tmat3;  
        if(isset($_POST[$chpclasse])){
            $valeur3=$_POST[$chpclasse];echo $valeur3;
            $verifie3=matierealui($bdda,$_SESSION['idens2'],$valeur3,$matiere3,$_SESSION['annee']);
            if($verifie3==0){
                $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
            $req->execute(array($matiere3,$valeur3,$_SESSION['idens2'],$_SESSION['annee']));
            }
        } 
        $tmat3++;
    }
  }


  $matiere4=$_POST['matiere4'];
  if($_SESSION['totalcl4']>0){
    $tmat4=0;
    while($tmat4<$_SESSION['totalcl4']){
        $chpclasse4="clas".$tmat4;  
        if(isset($_POST[$chpclasse])){
            $valeur4=$_POST[$chpclasse];
            $verifie4=matierealui($bdda,$_SESSION['idens2'],$valeur4,$matiere4,$_SESSION['annee']);
            if($verifie4==0){
                $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
            $req->execute(array($matiere4,$valeur4,$_SESSION['idens2'],$_SESSION['annee']));
            }
        } 
        $tmat4++;
    }
  }

   
if($_SESSION['totalcl1']>0 OR $_SESSION['totalcl2']>0
 OR $_SESSION['totalcl3']>0 OR $_SESSION['totalcl4']>0){ 
  $_SESSION['confajout']=1;
}
   header('location:ajoutmatensg.php');
  ?>
   
  
 