<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 





  
        if(isset($_POST['modifgroupe'])){ 
                 
            $total=$_POST['total'];
               $i=0;
               if($total>0){
                while($i<$total){
               $chpmat="matricule".$i;
               $chpverse="verse".$i;
               $chpnom="nom".$i;
               $chprenom="prenom".$i;
               $chpdatelev="datelev".$i;
               $chpgenre="genre".$i;
               $chptel="tel".$i;
               $chpclasse="classe".$i;
               $chpstatut="statut".$i;

            $matelev=$_POST[$chpmat];
            $niveau=$_POST[$chpclasse];
            $total=$_POST[$chpverse];
            $nom=$_POST[$chpnom];
            $prenom=$_POST[$chprenom];
            $genre=$_POST[$chpgenre];
            $tel=$_POST[$chptel];
            $datelev=$_POST[$chpdatelev];
            $statut=$_POST[$chpstatut];
               
            $prix=vollpension($bdda,$niveau,$statut,$_SESSION['annee']);  
            $rest=$prix-$total;
            
            $fraisd=volldivers($bdda,$niveau,$statut,$_SESSION['annee']);
            $requete = "UPDATE detail SET frais='".$fraisd."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);

            $_SESSION['confirmodif']=$matelev."-".$nom."-".$prenom."-".
            $niveau."-".$genre."-".$statut."-".$prix.
            "-".$total."-".$tel;
echo $_SESSION['confirmodif']."</br>";
            $requete = "UPDATE eleve SET niveauelev='".$niveau."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE detail SET niveauelev='".$niveau."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE exam SET niveauelev='".$niveau."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE moyenne SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE moyenneannuel SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE moyennetrim SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE note SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE notegroupeval SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE notegrouptrim SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "UPDATE notetrimestre SET idcl='".$niveau."' WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);




            $requete = "UPDATE eleve SET cout='".$prix."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
$repons = $bdda->query($requete);
$requete = "UPDATE eleve SET reste='".$rest."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'  " ;
$repons = $bdda->query($requete);
 $requete = "UPDATE eleve SET  statut='".$statut."' WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'" ;
$reponse = $bdda->query($requete);
  $requ = "UPDATE detail SET  statut='".$statut."'WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'" ;
    $rep = $bdda->query($requ);
            
            $r="UPDATE eleve SET nomelev='".$nom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET nomelev='".$nom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET nomelev='".$nom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);

            $r="UPDATE eleve SET preelev='".$prenom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET preelev='".$prenom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET preelev='".$prenom."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);

            $r="UPDATE eleve SET datelev='".$datelev."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE eleve SET telev='".$tel."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);

            $r="UPDATE eleve SET sexelev='".$genre."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET sexelev='".$genre."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            $r="UPDATE exam SET sexelev='".$genre."' WHERE matelev='".$matelev."'";
            $req=$bdda->query($r);
            
             
            $_SESSION['elevmodif']=1;

             header('location:nomaclasse.php');
             $i++;
             }
            }   
        } 
 /*      
        if(isset($_POST['supElev'])){ 
            if($_SESSION['id']==1 OR $_SESSION['id']==50) {
            $matelev=$_POST['supElev'];
            $requete = "DELETE FROM eleve WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM exam WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM detail WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM autrepayefrais WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM moyenne WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM moyennetrim WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM moyenneannuel WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM note WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM notegroupeval WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM notegrouptrim WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM notetrimestre WHERE matricule='".$matelev."' AND anens='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $_SESSION['elevsup']=1;
            header('location:nom.php');
           }
        } 
*/

       
 
   

           

 
   
  ?>
   