<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 ) ){ 

  $an=$_SESSION['annee'];





    function prixmotif($id){

            $nom=" ";
           
          $reponse = $bdda->query("SELECT * FROM autrefrais ");
          $true=0;
          while ($donnees = $reponse->fetch() AND $true==0){                            
             $phrase =$donnees['id'] ; 
             if($phrase==$id){
             $nom=$donnees['prix'];
             $true=1;
               }
         } 
        $reponse->closeCursor(); 
        return $nom;                  
     }
    

     function nommotif($id){

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

     function namemois($id){
        $nom=" ";
        if($id==1){
            $nom="Septembre";
        }
        if($id==2){
            $nom="Octobre";
        }
        if($id==3){
            $nom="Novembre";
        }
        if($id==4){
            $nom="Dècembre";
        }
        if($id==5){
            $nom="Janvier";
        }
        if($id==6){
            $nom="Février";
        }
        if($id==7){
            $nom="Mars";
        }
        if($id==8){
            $nom="Avril";
        }
        if($id==9){
            $nom="Mai";
        }
        if($id==10){
            $nom="Juin";
        }
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


    if(isset($_POST['modifsco'])){
 
$id=$_POST['modifsco'];
 
 $montant=$_POST['montant'];
 $motif=$_POST['frais'];
 $mois=$_POST['mois'];
 $decision=$_POST['decision'];
 $heure=$_POST['heure'];
 $datebrut=$_POST['date'];
  $date=format2($datebrut);
  $prixmotif=prixmotif($motif) ;
  if($decision==1 ){
 if( $montant>=0 ){


//FRAIS NON EXIGIBLES modif
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditsup=" ";
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM autrepayefrais WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        
           $id=$dona['id']; $matelev=$dona['matelev'];

           $auditsup="modification frais non exigibles à l'inscription / ".nameschuler($matelev)." ".vornameschuler($matelev)." , Matricule : ".$matelev." ,  
           Classe : ".classparid(estla2($matelev,$dona['anelev']),$dona['anelev'])."
           , Année scolaire ".$_SESSION['annee']." NOUVELLE CONFIGURATION====>>> Montant : ".$montant." fcfa , Nature des frais : ".nommotif($motif)." ,
              par ".nomC($_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr; 


   $auditsupavt="modification frais non exigibles à l'inscription / ".nameschuler($matelev)." ".vornameschuler($matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid(estla2($matelev,$dona['anelev']),$dona['anelev'])."
   , Année scolaire ".$_SESSION['annee']." , Montant : ".$dona['montant']." fcfa , Nature des frais : ".nommotif($dona['frais'])." ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor();
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
//FIN FRAIS NON EXIGIBLES modif


     $r="UPDATE autrepayefrais SET  montant ='".$montant."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
    $r="UPDATE autrepayefrais SET  date ='".$date."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE autrepayefrais SET  frais ='".$motif."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE autrepayefrais SET  heure='".$heure."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    
    $r="UPDATE autrepayefrais SET  mois ='".$mois."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
  
        
        $_SESSION['modifmiseaut']=1;
        $_SESSION['msgmodifmiseaut']=" ";
 }
 
 if($montant<0){
    $_SESSION['modifmiseaut']=2;
}
 
}






if($decision==0 ){
    if( $prixmotif>=0 ){


//FRAIS NON EXIGIBLES modif
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditsup=" ";
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM autrepayefrais WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        
           $id=$dona['id']; $matelev=$dona['matelev'];

           $auditsup="modification frais non exigibles à l'inscription / ".nameschuler($matelev)." ".vornameschuler($matelev)." , Matricule : ".$matelev." ,  
           Classe : ".classparid(estla2($matelev,$dona['anelev']),$dona['anelev'])."
           , Année scolaire ".$_SESSION['annee']." NOUVELLE CONFIGURATION====>>> Montant : ".$prixmotif." fcfa , Nature des frais : ".nommotif($motif)." ,
              par ".nomC($_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr; 


   $auditsupavt="modification frais non exigibles à l'inscription / ".nameschuler($matelev)." ".vornameschuler($matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid(estla2($matelev,$dona['anelev']),$dona['anelev'])."
   , Année scolaire ".$_SESSION['annee']." , Montant : ".$dona['montant']." fcfa , Nature des frais : ".nommotif($dona['frais'])." ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor();
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
//FIN FRAIS NON EXIGIBLES modif


        $r="UPDATE autrepayefrais SET  montant ='".$prixmotif."'  WHERE id ='".$id."'";
       $req=$bdda->query($r);
       
       $r="UPDATE autrepayefrais SET  date ='".$date."'  WHERE id ='".$id."'";
       $req=$bdda->query($r);
       $r="UPDATE autrepayefrais SET  frais ='".$motif."'  WHERE id ='".$id."'";
       $req=$bdda->query($r);
       $r="UPDATE autrepayefrais SET  heure='".$heure."'  WHERE id ='".$id."'";
       $req=$bdda->query($r);
        
       $r="UPDATE autrepayefrais SET  mois ='".$mois."'  WHERE id ='".$id."'";
       $req=$bdda->query($r);
      
           
           $_SESSION['modifmiseaut']=1;
           $_SESSION['msgmodifmiseaut']=" ";
    }
    
    if($montant<0){
       $_SESSION['modifmiseaut']=2;
   }
    
   }

 header('location:miseaut.php');
    } 



    if(isset($_POST['supadm'])){
     
       $id=$_POST['supadm'];

      
//FRAIS NON EXIGIBLES supp
$datum=date('d/m/Y'); $uhr=date('H:i');
$auditsup="Suppression des frais non exigibles à l'inscription de cet élève par ".nomC($_SESSION['id'])."-".$_SESSION['id']." le ".$datum." à ".$uhr;
$auditsupavt=" "; $lesrem='NON'; 
$z="SELECT * FROM autrepayefrais WHERE id= '".$id."'";
     $repa=$bdda->query($z);
     while($dona=$repa->fetch()){
        
           $id=$dona['id']; $matelev=$dona['matelev'];
   $auditsupavt="Suppression frais non exigibles à l'inscription / ".nameschuler($matelev)." ".vornameschuler($matelev)." , Matricule : ".$matelev." ,  
   Classe : ".classparid(estla2($matelev,$dona['anelev']),$dona['anelev'])."
   , Année scolaire ".$_SESSION['annee']." , Montant : ".$dona['montant']." fcfa , Nature des frais : ".nommotif($dona['frais'])." ,
    Enregistré le ".format($dona['date'])." à ".$dona['heure']." par ".nomC($dona['idempl'])."-".$dona['idempl']; 
}
$repa->closeCursor();
$req = $bdda->prepare('INSERT INTO proofmodifdetail(idpaiem,matelev,anelev,ancien,nouveau,date,heure,idresp) VALUES(?,?,?,?,?,?,?,?)'); 
$req->execute(array($id,$matelev,$_SESSION['annee'],$auditsupavt,$auditsup,$datum,$uhr,$_SESSION['id'])); 
//FIN FRAIS NON EXIGIBLES supp


     
       $r="DELETE FROM autrepayefrais  
        WHERE id ='".$id."' ";
          $req=$bdda->query($r);
       
   
              $_SESSION['supmiseaut']=1;
              $_SESSION['msgsupmiseaut']=" " ;
              header('location:miseaut.php');
    }
 



    if(isset($_POST['engmiseaut'])){
        $matelev=$_POST['matelev'];
        $montant=$_POST['montant'];
        $motif=$_POST['frais'];
        $mois=$_POST['mois'];
        $decision=$_POST['decision'];
        $heure=$_POST['heure'];
        $datebrut=$_POST['date'];
         $date=format2($datebrut);
         $prixmotif=prixmotif($motif) ;
         $idresp=$_POST['idresp'];
         if ($decision== 0){    
            if( $prixmotif>=0 ){
                $req = $bdda->prepare('INSERT INTO autrepayefrais(matelev,anelev,  
                frais,mois,montant,date,heure,idempl) VALUES( ?,?,?,?,?,?,?,?  )'); 
               $req->execute(array($matelev, $_SESSION['annee'],
               $motif,$mois,$prixmotif ,$date,$heure,$idresp));  
               $paye=$prixmotif;
   $_SESSION['engmiseaut']=1;
   $_SESSION['msgengmiseaut'] =nameschuler($matelev)."
   ".vornameschuler($matelev)."</Br> 
   ".nommotif($motif)." = ".$paye." </Br>".
   namemois($mois);
    }
 else{
      $_SESSION['msgengmiseaut'] ="Vous ne 
      pouvez pas enregistrer.  ";
          $_SESSION['engmiseaut']=2;
  }
}


  if ($decision==1){    
    if( $montant>=0 ){
        $req = $bdda->prepare('INSERT INTO autrepayefrais(matelev,anelev,  
        frais,mois,montant,date,heure,idempl) VALUES( ?,?,?,?,?,?,?,?  )'); 
       $req->execute(array($matelev, $_SESSION['annee'],
       $motif,$mois,$montant,$date,$heure,$idresp));  
       $paye=$montant;
$_SESSION['engmiseaut']=1;
$_SESSION['msgengmiseaut'] =nameschuler($matelev)."
".vornameschuler($matelev)."</Br> 
".nommotif($motif)." = ".$paye." </Br>".
namemois($mois);
}
else{
$_SESSION['msgengmiseaut'] ="Vous ne 
pouvez pas enregistrer.  ";
  $_SESSION['engmiseaut']=2;
}

    }




 $_SESSION[' reqmiseaut']="SELECT *  FROM autrepayefrais   WHERE  date='".$date."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";     


 header('location:miseaut.php');
  }
    
      
      
    
    










} 
 
 

   ?>