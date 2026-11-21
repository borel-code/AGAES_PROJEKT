<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
  function Vensgs_salaire($id,$an){ 
   
  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseigsalaire  WHERE sup='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$id AND $bonnees['anens']==$an ){
         $vue=$bonnees['id'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }
        if(isset($_POST['modifEng'])){ 
            $idens=$_POST['modifEng'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $complet=$nom." ".$prenom;
            $genre=$_POST['genre'];
            $tel=$_POST['tel'];
            $datens=$_POST['datens'];
            $mtp=$_POST['mtp'];
            $cni=$_POST['cni'];
            $paiement=$_POST['paiement'];
            $montant=$_POST['montant'];
            $r="UPDATE pointage SET nomens='".$complet."' WHERE idens='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE salaire SET nomens='".$complet."' WHERE idens='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE enseignant SET nomens='".$nom."' WHERE id='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE enseignant SET prenomens='".$prenom."' WHERE id='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE enseignant SET telens='".$tel."' WHERE id='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE enseignant SET genre='".$genre."' WHERE id='".$idens."'";
            $req=$bdda->query($r);
            $r="UPDATE enseignant SET datens='".$datens."' WHERE id='".$idens."'";
            $req=$bdda->query($r);

$Vensgs_salaire=Vensgs_salaire($idens,$_SESSION['annee']);
if($Vensgs_salaire!=0){
            $r="UPDATE enseigsalaire SET type='".$paiement."' WHERE idens='".$idens."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
            $r="UPDATE enseigsalaire SET valeur='".$montant."' WHERE idens='".$idens."' AND anens='".$_SESSION['annee']."'";
$req=$bdda->query($r);
}
if($Vensgs_salaire==0){
          $req = $bdda->prepare('INSERT INTO enseigsalaire(idens,type,valeur,idmonnaie,
                anens) VALUES(?,?,?,?,?)'); 
                $req->execute(array($idens,$paiement,$montant,
                '1',$_SESSION['annee']));
}
            

            $verifmot=mmpassensg($bdda,$mtp);
            if($verifmot==0){
                $r="UPDATE enseignant SET mtpasse='".$mtp."' WHERE id='".$idens."'";
                $req=$bdda->query($r);
            }
            $verifcni=mmcniENSG($bdda,$cni);
            if($verifcni==0){
                $r="UPDATE enseignant SET cni='".$cni."' WHERE id='".$idens."'";
                $req=$bdda->query($r);
            }

 /*  $verifie1=matierealui($bdda,$_SESSION['idens2'],$valeur,$matiere1,$_SESSION['annee']);
            if($verifie1==0){
                $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
            $req->execute(array($matiere1,$valeur,$_SESSION['idens2'],$_SESSION['annee']));
            }*/

            $_SESSION['modifensg']=1;
            if($_SESSION['pagenregens']==0){
            header('location:ajoutensn.php');
            }
            if($_SESSION['pagenregens']==1){
                header('location:ajoutensANNEE.php');
                }
        } 
       
        if(isset($_POST['enregEng'])){ 
             
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $genre=$_POST['genre'];
            $tel=$_POST['tel'];
            $datens=$_POST['datens'];
            $mtp=$_POST['mtp'];
            $cni=$_POST['cni'];
            $paiement=$_POST['paiement'];
            $montant=$_POST['montant'];
            
            $verifmot=mmpassensg($bdda,$mtp);
            $verifcni=mmcniENSG($bdda,$cni);
            if($verifmot==0 AND $verifcni==0){
                $temps=time();
                $req = $bdda->prepare('INSERT INTO enseignant(nomens,prenomens,telens,mtpasse,
                anens,genre,datens,cni,temps) VALUES(?,?,?,?,?,?,?,?,?)'); 
                $req->execute(array($nom,$prenom,$tel,
                $mtp,$_SESSION['annee'],$genre,$datens,$cni,$temps));
                $idens=recupidensgpartps($bdda,$temps); 
                $req = $bdda->prepare('INSERT INTO enseigsalaire(idens,type,valeur,idmonnaie,
                anens) VALUES(?,?,?,?,?)'); 
                $req->execute(array($idens,$paiement,$montant,
                '1',$_SESSION['annee']));
                $_SESSION['idens2']=$idens;
                $_SESSION['engensg']=1; echo $idens." ".$temps;
                header('location:ajoutmatensg.php');
            }
            

 /*  $verifie1=matierealui($bdda,$_SESSION['idens2'],$valeur,$matiere1,$_SESSION['annee']);
            if($verifie1==0){
                $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens) VALUES(?,?,?,?)'); 
            $req->execute(array($matiere1,$valeur,$_SESSION['idens2'],$_SESSION['annee']));
            }*/

           
        } 


        if(isset($_POST['supENSG'])){ 
             $idens=$_POST['supENSG'];

            $r="DELETE FROM enseignant WHERE id='".$idens."'";
                $req=$bdda->query($r);
             $r="DELETE FROM enseigmatclasse WHERE idens='".$idens."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
                $_SESSION['supensg']=1;
                if($_SESSION['pagenregens']==0){
                    header('location:ajoutensn.php');
                    }
                    if($_SESSION['pagenregens']==1){
                        header('location:ajoutensANNEE.php');
                        }
           
        } 
 
        if(isset($_POST['supsesmat'])){ 
            
                      $id=$_POST['supsesmat'];
                      $r="DELETE FROM enseigmatclasse WHERE id='".$id."'";
                      $req=$bdda->query($r);
                      $_SESSION['supsesmat']=1;
              header('location:ajoutsesmat.php');
            }

            if(isset($_POST['subtitulaire'])){ 
                $total=$_POST['subtitulaire'];
                if($total>0){
                    $i=0;
                    for($i=0;$i<$total;$i++){
                        $titulaire='titulaire'.$i;
                        $ensetclas=$_POST[$titulaire];
                        $tab=array();
                        $tab=explode("-",$ensetclas); 
                        $idens=$tab[0];
                        $idcl=$tab[1];
                        echo $idens."-".$idcl."</br>";
                        $r="UPDATE enseigmatclasse SET titulaire='0' WHERE idcl='".$idcl."' AND anens='".$_SESSION['titulairean']."'";
                        $req=$bdda->query($r);
                        $r="UPDATE enseigmatclasse SET titulaire='1' WHERE idens='".$idens."' AND idcl='".$idcl."' AND anens='".$_SESSION['titulairean']."'";
                        $req=$bdda->query($r);
                    }
                }
                $_SESSION['titulaireaj']=1;
        header('location:ajoutitulaire.php');
      }

 
   
  ?>
   