<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';





  function idpremierpaiement($bdda,$mat,$an){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM detail WHERE anelev='".$an."' ORDER BY id";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['matelev']==$mat){
           $vue=$bonnees['id'];
         }
     } 
    $beponse->closeCursor();
    return $vue;
    }


    function premierpaiement($bdda,$id,$chp){ 

      
      $vue=0;$nom=" ";
      $b="SELECT *  FROM detail";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['id']==$id){
             $vue=$bonnees[$chp];
           }
       } 
      $beponse->closeCursor();
      return $vue;
      }

      $datum=date('d/m/Y'); $uhr=date('H:i');
  
        if(isset($_POST['modifEng'])){ 
             
            $matelev=$_POST['matricule'];
            $niveau=$_POST['classe'];
            $total=$_POST['modifEng'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $genre=$_POST['genre'];
            $tel=$_POST['tel'];
            $datelev=$_POST['datelev'];
            $statut=$_POST['statut'];
            $idnational=$_POST['idnational'];
               
            $prix=vollpension($bdda,$niveau,$statut,$_SESSION['annee']);  
            $rest=$prix-$total;
            
            $idpremierpaiement=idpremierpaiement($bdda,$bdda,$matelev,$_SESSION['annee']);
            $ancienfrais=premierpaiement($bdda,$idpremierpaiement,"frais");
            $ancienmontant=premierpaiement($bdda,$idpremierpaiement,"montant");
            $fraisd=volldivers($bdda,$niveau,$statut,$_SESSION['annee']);
            $diffrais=$fraisd-$ancienfrais;
            
            $audityester=" ";
            $b="SELECT *  FROM eleve WHERE anelev='".$_SESSION['annee']."'";
                   $beponse = $bdda->query($b); $yes=0;
                   while ($bonnees = $beponse->fetch() AND $yes==0)
                   {
                       
                      if($bonnees['matelev']==$matelev){
                         $audityester= $bonnees['nomelev']." ".$bonnees['preelev']." , Matricule : ".$matelev."  , 
                        Genre : ".$bonnees['sexelev']." , Date de naissance : ".$bonnees['datelev']." , Statut : ".$bonnees['statut']." , Classe : ".classparid($bdda,$bonnees['niveauelev'],$_SESSION['annee'])."
                       , Téléphone : ".$bonnees['telev']." , Année scolaire ".$_SESSION['annee']." , Coût de la scolarité : ".$bonnees['cout']." fcfa , total scolarité payé : ".$bonnees['total']." fcfa , reste : ".$bonnees['reste']." fcfa , 
                       ancien frais exigibles : ".$ancienfrais." fcfa , dernière date de paiement : ".format($bonnees['date'])." ".$bonnees['heure'];
                      $yes=1;
                       }
                   } 
                  $beponse->closeCursor();

            if($diffrais==0){
              $requete = "UPDATE detail SET frais='".$fraisd."' WHERE id='".$idpremierpaiement."'" ;
              $repons = $bdda->query($requete);
            }
             
            if($diffrais>0){
              $newmont=$ancienmontant-$diffrais;
              $requete = "UPDATE detail SET montant='".$newmont."' WHERE id='".$idpremierpaiement."'" ;
              $repons = $bdda->query($requete);
              $prix=vollpension($bdda,$niveau,$statut,$_SESSION['annee']);  
              $total=TOTALSCOV($bdda,$matelev,$_SESSION['annee']);
              $r="UPDATE eleve SET  total ='".$total."'  WHERE matelev ='".$matelev."'  AND anelev ='".$_SESSION['annee']."'";
               $req=$bdda->query($r);
              $rest=$prix-$total;
              $requete = "UPDATE detail SET frais='".$fraisd."' WHERE id='".$idpremierpaiement."'" ;
              $repons = $bdda->query($requete);
            }
            if($diffrais<0){
              $newmont=$ancienmontant+(-1*$diffrais);
              $requete = "UPDATE detail SET montant='".$newmont."' WHERE id='".$idpremierpaiement."'" ;
              $repons = $bdda->query($requete);
              $prix=vollpension($bdda,$niveau,$statut,$_SESSION['annee']);  
              $total=TOTALSCOV($bdda,$matelev,$_SESSION['annee']);
              $r="UPDATE eleve SET  total ='".$total."'  WHERE matelev ='".$matelev."'  AND anelev ='".$_SESSION['annee']."'";
               $req=$bdda->query($r);
              $rest=$prix-$total;
              $requete = "UPDATE detail SET frais='".$fraisd."' WHERE id='".$idpremierpaiement."'" ;
              $repons = $bdda->query($requete);
            }$_SESSION['tabcodage'][7]=$total;

            

  //DEB MODIFICATION 1 INFO PERSO
           $auditnow="Modification / NOUVELLES DONNEES ====>>>> ".$nom." ".$prenom." , Matricule : ".$matelev."  , 
            Genre : ".$genre." , Date de naissance : ".$datelev." , Statut : ".$statut." , Classe : ".classparid($bdda,$niveau,$_SESSION['annee'])."
           , Téléphone : ".$tel." , Année scolaire ".$_SESSION['annee']." , Coût de la scolarité : ".$prix." fcfa , total scolarité payé : ".$total." fcfa , reste : ".$rest." fcfa ,
           frais divers exigibles : ".$fraisd." fcfa / Mise à jour par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;

           

           $req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
           $req->execute(array(' ',$matelev,$_SESSION['annee'],$audityester,$auditnow,$datum,$uhr,$_SESSION['id'])); 

           //FIN MODIFICATION 1 INFO PERSO
            




            $_SESSION['confirmodif']=$matelev."-".$nom."-".$prenom."-".
            $niveau."-".$genre."-".$statut."-".$prix.
            "-".$total."-".$tel."-".$idnational;

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



            $requete = "UPDATE eleve SET idnational='".$idnational."' WHERE matelev='".$matelev."'" ;
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
           header('location:nomav.php');
                
        } 





        
       
        if(isset($_POST['supElev'])){ 
            if($_SESSION['code']==1 OR $_SESSION['code']==50) {
            $matelev=$_POST['supElev'];


//SUPPRIMER SCOLA


function nommotif($bdda,$id){

          $nom=" ";
         
        $reponse = $bdda->query("SELECT * FROM autrefrais ");
        $true=0;
        while ($donnees = $reponse->fetch() AND $true==0){                            
           $phrase =$donnees['id'] ; 
           if($phrase==$id){
           $nom=$donnees['nom'];
           $true=1;
             }
       } 
      $reponse->closeCursor(); 
      return $nom;                  
    }

function estla2($mat,$an){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."'";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
	 if( $donnees['matelev']==$mat){
		$true=$donnees['niveauelev'];
	  } 
 } 
  $reponse->closeCursor();
   return $true;   
}


$auditsup=" ";
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM detail WHERE matelev= '".$matelev."'  AND anelev='".$_SESSION['annee']."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        if($dona['remise']=='OUI'){
           $lesrem='OUI';
        }
           $id=$dona['id'];
    $auditsup="Suppression de ce paiement de la scolarité suite à la suppression de l'élève ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev." , Statut : ".$dona['statut']." , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;
echo $auditsup;
   $auditsupavt=" Suppression scolarité/ ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev." , Statut : ".$dona['statut']." , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , Montant : ".$dona['montant']." fcfa , 
   Remise : ".$lesrem." , Frais associés : ".$dona['frais']." fcfa ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 

    $req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
}
$repa->closeCursor();

//FIN DETAIL


//DEBUT EXAM
$auditsup=" ";
$auditsupavt=" ";   
$z="SELECT * FROM exam WHERE matelev= '".$matelev."' AND anelev='".$_SESSION['annee']."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        
           $id=$dona['id'];

 $auditsup="Suppression de ce paiement des examens suite à la suppression de l'élève  ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;

   $auditsupavt=" Suppression examens/ ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev."  , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , Montant : ".$dona['montant']." fcfa , 
  Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 

  $req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
}
$repa->closeCursor();

//FIN EXAM



//FRAIS NON EXIGIBLES
$auditsup=" ";
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM autrepayefrais WHERE matelev= '".$matelev."'  AND anelev='".$_SESSION['annee']."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        
           $id=$dona['id'];
 $auditsup="Suppression de ce paiement des frais non exigibles à l'inscription suite à la suppression de l'élève ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;

   $auditsupavt="Suppression frais non exigibles à l'inscription / ".nameschuler($bdda,$matelev)." ".vornameschuler($bdda,$matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid($bdda,estla2($matelev,$dona['anelev']),$dona['anelev'])."
   , Année scolaire ".$_SESSION['annee']." , Montant : ".$dona['montant']." fcfa , Nature des frais : ".nommotif($bdda,$dona['frais'])." ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 


    $req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
}
$repa->closeCursor();

//FIN FRAIS NON EXIGIBLES
//FIN SUPPRIMER SCOL 




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
            $requete = "DELETE FROM marktrim1 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM marktrim2 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM marktrim3 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM markgrouptrim1 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM markgrouptrim2 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM markgrouptrim3 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);

              $requete = "DELETE FROM markmoytrim1 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM markmoytrim2 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $requete = "DELETE FROM markmoytrim3 WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);

             $requete = "DELETE FROM markmoyan WHERE matelev='".$matelev."' AND anelev='".$_SESSION['annee']."'   " ;
            $repons = $bdda->query($requete);
            $_SESSION['elevsup']=1;
             header('location:nom.php');
           }
        } 


       
 
   

           

 
   
  ?>
   