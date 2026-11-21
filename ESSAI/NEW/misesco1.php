<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
)){ 

   $an=$_SESSION['annee'];


    if(isset($_POST['modifsco'])){
 $tab=array();
 $tab=explode("-",$_POST['matetresp']);
$id=$_POST['modifsco'];
$matricule1=$tab[0];
 $montant=$_POST['montant'];
 $frais=$_POST['frais'];
 $datebrut=$_POST['date'];
 $heure=$_POST['heure'];
 $date=format2($datebrut);
 $remise=$_POST['remise'];
 $typeremise=$_POST['typerem']; 
 $auteur=$tab[1];
 $transfer=$_POST['transfdec'];
 
 if($transfer==2 AND $montant>=0 ){
    $totalv0=TOTALSCOV0($bdda,$matricule1,$_SESSION['annee'],$id)+$montant;
    $cout0=cout($bdda,$matricule1,$_SESSION['annee']);
    if($totalv0>=0 AND $cout0>=$totalv0){



//MODIF SCOLA
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditmod=" "; 
$auditmodavt=" "; $lesrem='NON'; 
$z="SELECT * FROM detail WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        if($dona['remise']=='OUI'){
           $lesrem='OUI';
        }
        if($remise!='OUI'){
         $remise='NON';
      }

        $auditmod="SCOLARITE/ Modification effectuée par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr." sur l'élève ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." , Matricule : ".$matricule1." , Statut : ".$dona['statut']." , 
        Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
        , Année scolaire ".$dona['anelev']." , NOUVELLE CONFIGURATION ===>>> Montant : ".$montant." fcfa , 
        Remise : ".$remise." , Frais associés : ".$frais." fcfa ,
         Nouvelle date enregistrement ".format($date)." , nouvelle heure d'enregistrement ".$heure; 


   $auditmodavt="SCOLARITE/ ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." , Matricule : ".$matricule1." , Statut : ".$dona['statut']." , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , Montant : ".$dona['montant']." fcfa , 
   Remise : ".$lesrem." , Frais associés : ".$dona['frais']." fcfa ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor(); echo $auditmod;
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matricule1,$_SESSION['annee'],$auditmodavt,$auditmod,$datum,$uhr,$_SESSION['id'])); 
//FIN MODIF SCOL


    $r="UPDATE detail SET  montant ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  frais ='".$frais."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  heure ='".$heure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  remise =' '  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  typerem =' '  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    if($remise=='OUI'){
      $r="UPDATE detail SET  remise ='OUI'  WHERE id ='".$id."'";
      $req=$bdda->query($r);
      $r="UPDATE detail SET  typerem ='".$typeremise."'   WHERE id ='".$id."'";
      $req=$bdda->query($r);
    }
}
    $totalv=TOTALSCOV($bdda,$matricule1,$_SESSION['annee']);
    $cout=cout($bdda,$matricule1,$_SESSION['annee']);
    if($totalv>=0 AND $cout>=$totalv){
        $reste=$cout-$totalv;
        $r="UPDATE eleve SET  total ='".$totalv."'  
         WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        $r="UPDATE eleve SET  reste ='".$reste."'  
         WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        
        $datemax=DATEmax($bdda,$matricule1,$_SESSION['annee']);
        $r="UPDATE eleve SET  date ='".$datemax."'  
         WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        $_SESSION['modifmisesco']=1;
        $_SESSION['msgmodifmisesco']="Il reste désormais 
 ".$reste." pour la scolarité à ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." et le montant total versé pour la scolarité 
 est désormais à ".$totalv ;
    }
    if($totalv<0 OR $cout<$totalv){
        $_SESSION['modifmisesco']=2;
    }
   
 }
 

 if($transfer!=2 AND $montant>=0 ){
    echo $_POST['matritransf'];
    $matricule2=$_POST['matritransf'];
    $totalv=TOTALSCOV($bdda,$matricule2,$_SESSION['annee'])+$montant;
    $cout=cout($bdda,$matricule2,$_SESSION['annee']);
    if($totalv>=0 AND $cout>=$totalv){



//MODIF SCOLA
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditmodtransf=" "; 
$auditmodtransfavt=" "; $lesrem='NON'; 
$z="SELECT * FROM detail WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        if($dona['remise']=='OUI'){
           $lesrem='OUI';
        }
        if($remise!='OUI'){
         $remise='NON';
      }

        $auditmod="SCOLARITE/ Transfert du paiement effectué par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr." sur l'élève ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." , Matricule : ".$matricule1." , Statut : ".$dona['statut']." , 
        Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
        , Vers l'élève  ".nameschuler($bdda,$matricule2)." ".vornameschuler($bdda,$matricule2)." , Matricule : ".$matricule2." , Année scolaire ".$dona['anelev']." , NOUVELLE CONFIGURATION DU VIREMENT===>>> Montant : ".$montant." fcfa , 
        Remise : ".$remise." , Frais associés : ".$frais." fcfa ,
         Nouvelle date enregistrement ".format($date)." , nouvelle heure d'enregistrement ".$heure; 

 
   $auditmodtransfavt="SCOLARITE/ ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." , Matricule : ".$matricule1." , Statut : ".$dona['statut']." , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , Montant : ".$dona['montant']." fcfa , 
   Remise : ".$lesrem." , Frais associés : ".$dona['frais']." fcfa ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor();
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matricule1,$_SESSION['annee'],$auditmodtransfavt,$auditmod,$datum,$uhr,$_SESSION['id'])); 
//FIN MODIF SCOL






        $reste=$cout-$totalv;
        $r="UPDATE eleve SET  total ='".$totalv."'  
         WHERE matelev ='".$matricule2."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        $r="UPDATE eleve SET  reste ='".$reste."'  
         WHERE matelev ='".$matricule2."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        
        $datemax=DATEmax($bdda,$matricule2,$_SESSION['annee']);
        $r="UPDATE eleve SET  date ='".$datemax."'  
         WHERE matelev ='".$matricule2."'  AND anelev ='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
    $classe2=Classe($bdda,$matricule2,$_SESSION['annee']);
    $nom=nameschuler($bdda,$matricule2);
    $prenom=vornameschuler($bdda,$matricule2);
    $r="UPDATE detail SET  matelev ='".$matricule2."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  nomelev ='".$nom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  preelev ='".$prenom."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  niveauelev ='".$classe2."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  montant ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  frais ='".$frais."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  heure ='".$heure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  remise =' '  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE detail SET  typerem =' '  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    if($remise=='OUI'){
      $r="UPDATE detail SET  remise ='OUI'  WHERE id ='".$id."'";
      $req=$bdda->query($r);
      $r="UPDATE detail SET  typerem ='".$typeremise."'   WHERE id ='".$id."'";
      $req=$bdda->query($r);
    }


    $_SESSION['msgmodifmisesco']="Il reste désormais 
    ".$reste." pour la scolarité à ".nameschuler($bdda,$matricule2)." ".vornameschuler($bdda,$matricule2)." et le montant total versé pour la scolarité 
    est désormais à ".$totalv ;

    $totalv=TOTALSCOV($bdda,$matricule1,$_SESSION['annee']);
    $cout=cout($bdda,$matricule1,$_SESSION['annee']);
    $reste=$cout-$totalv;
    $r="UPDATE eleve SET  total ='".$totalv."'  
            WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
           $req=$bdda->query($r);
           $r="UPDATE eleve SET  reste ='".$reste."'  
            WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
           $req=$bdda->query($r);
           
           $datemax=DATEmax($bdda,$matricule1,$_SESSION['annee']);
           $r="UPDATE eleve SET  date ='".$datemax."'  
            WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
           $req=$bdda->query($r);

           $_SESSION['modifmisesco']=3;

           $_SESSION['msgmodifmisesco']= $_SESSION['msgmodifmisesco']." </br>Il reste désormais 
           ".$reste." pour la scolarité à ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." et le montant total versé pour la scolarité 
           est désormais à ".$totalv ;

    }

 }

  header('location:misesco.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];
       $matricule1=$_POST['matelev'];  


//SUPPRIMER SCOLA
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditsup="SCOLARITE/ Suppression par ".nomC($bdda,$_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM detail WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        if($dona['remise']=='OUI'){
           $lesrem='OUI';
        }
   $auditsupavt="SCOLARITE/ ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." , Matricule : ".$matricule1." , Statut : ".$dona['statut']." , 
   Classe : ".classparid($bdda,$dona['niveauelev'],$dona['anelev'])."
   , Année scolaire ".$dona['anelev']." , Montant : ".$dona['montant']." fcfa , 
   Remise : ".$lesrem." , Frais associés : ".$dona['frais']." fcfa ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($bdda,$dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor();
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matricule1,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
//FIN SUPPRIMER SCOL
 



       $r="DELETE FROM detail  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       $totalv=TOTALSCOV($bdda,$matricule1,$_SESSION['annee']);
       $cout=cout($bdda,$matricule1,$_SESSION['annee']);
       $reste=$cout-$totalv;

       $r="UPDATE eleve SET  total ='".$totalv."'  
               WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
              $req=$bdda->query($r);
              $r="UPDATE eleve SET  reste ='".$reste."'  
               WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
              $req=$bdda->query($r);
              
              $datemax=DATEmax($bdda,$matricule1,$_SESSION['annee']);
              $r="UPDATE eleve SET  date ='".$datemax."'  
               WHERE matelev ='".$matricule1."'  AND anelev ='".$_SESSION['annee']."'";
              $req=$bdda->query($r);
   
              $_SESSION['supmisesco']=1;
              $_SESSION['msgsupmisesco']="Il reste désormais 
 ".$reste." pour la scolarité à ".nameschuler($bdda,$matricule1)." ".vornameschuler($bdda,$matricule1)." et le montant total versé pour la scolarité 
 est désormais à ".$totalv ;



             header('location:misesco.php');
    }
 



    if(isset($_POST['engmisesco'])){
     
      $mat=$_POST['matelev'];
      $remise=$_POST['remise'];
      $typerem=$_POST['typerem'];
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
        $reste=$don['cout']-$don['total']-$mtnt;
        $res=$don['reste'];
        $totalver=$don['total']+$mtnt;
       



      if ($reste >= 0){
      $r="UPDATE eleve SET total = total+".$mtnt."  WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
      $req=$bdda->query($r);
      $r="UPDATE eleve SET reste = cout-total  WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
      $req=$bdda->query($r);
      $r="UPDATE eleve SET date = '".$date."' WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
      $req=$bdda->query($r);
      $r="UPDATE eleve SET heure = '".$heur."' WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
      $req=$bdda->query($r); 
     
      $cout=$don['cout'];
      
      $req = $bdda->prepare('INSERT INTO detail(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,statut,frais,remise,montant,date,heure,idempl,typerem) VALUES(?,?,?,?,?,?,?,?,?, ?,?,?, ?,?,?, ?)'); 
      $req->execute(array($mat,$nom,$pre,$datelev,$clas,$an,$sex,'0',$stat,' ',$remise,$mtnt,$date,$heur,$idresp,$typerem)); 
      
      $totalv=TOTALSCOV($bdda,$mat,$_SESSION['annee']);
       $coutv=cout($bdda,$mat,$_SESSION['annee']);
       $restev=$coutv-$totalv;
      
      
      $_SESSION['msgengmisesco']="Il reste désormais 
 ".$restev." pour la scolarité à ".nameschuler($bdda,$mat)." ".vornameschuler($bdda,$mat)." et le montant total versé pour la scolarité 
 est désormais à ".$totalv ;
 $_SESSION['engmisesco']=1;
    }

    else{
      $_SESSION['msgengmisesco'] ="Vous ne pouvez pas enregistrer ce paiement car la somme vers�e (".$mtnt." Fcfa)
         est superieure au reste de la scolarité
          Il restait ".$res." Fcfa à payer pour ".$nom." ".$pre;
          $_SESSION['engmisesco']=2;
        }
$true=1;
  }
     
     }
    $rep->closeCursor();
      
      
$_SESSION['reqmiseco']="SELECT *  FROM detail  WHERE date='".$date."' AND anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
     header('location:misesco.php');
   }










} 
 
 

   ?>