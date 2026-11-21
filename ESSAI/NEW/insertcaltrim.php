<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';require '../bullinfo.php'; 
require '../listabrvtype.php'; 
 set_time_limit(2000);

 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){
  
    
 
$nbrematiere=0;     $leseleve=array();
$reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  sup='0' AND anens='".$_SESSION['annee']."' ORDER BY idcl");
while ($donnees = $reponse->fetch()){                            
   if($donnees['idcl']==$_SESSION['clascalcul']){
          $nbrematiere++;
    }
} 
$reponse->closeCursor(); 

$tisch="marktrim".$_SESSION['trimcalcul']; $tischmoy="markmoytrim".$_SESSION['trimcalcul'];
  $keytisch="idmark".$_SESSION['trimcalcul'];   $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
$cb=1; $cpte=0; $j=0; $nbrecompose=0; $nbreadmis=0;  $tabl=array();
$v="SELECT matelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['ancalcul']."' AND niveauelev='".$_SESSION['clascalcul']."'" ;
$reponse = $bdda->query($v);
 $tabmoy=0; $ordre=0;
while ($donnees = $reponse->fetch() )
{
    $matkey=$donnees['matelev'];  $leseleve[$j]=$matkey;
    $ntrim=0;  $nctrim=0; $ctrim=0; $moytrim=0; 
    $n1=0;  $nc1=0; $c1=0; $moy1=0;  
    $n2=0;  $nc2=0; $c2=0; $moy2=0; 
    $n3=0;  $nc3=0; $c3=0; $moy3=0; 
    $inclustrim=0; // VERIFIE SI L'eleve a participer au trim
    $inclus1=0; // VERIFIE SI L'eleve a participe EVAL 1
    $inclus2=0; // VERIFIE SI L'eleve a participe EVAL 2
    $inclus3=0; // VERIFIE SI L'eleve a participe EVAL 3
    $vi="SELECT  ".$keytisch." ,matelev,anelev,idcl,mark1,mark2,mark3,notetrim,coef,notrimcoef,m1c,m2c,m3c,rg1,rg2,rg3,ok1,ok2,ok3,oktrim FROM ".$tisch." 
        WHERE   anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY ".$keytisch." DESC" ; 
$reponses = $bdda->query($vi);
 $bi=1;  
while ($donzees = $reponses->fetch())
{     
     if($donzees['matelev']==$matkey){ 

   $ok1=$donzees['ok1']+0; $ok2=$donzees['ok2']; $ok3=$donzees['ok3']; $oktrim=$donzees['oktrim']; 
    $m1c=$donzees['m1c']; $m2c=$donzees['m2c']; $m3c=$donzees['m3c']; $cof=$donzees['coef'];  $cof1=$donzees['coef'];
    $notrimcoef=$donzees['notrimcoef']; $notrim=$donzees['notetrim']; 
 // echo $cb." ] t1 : eval1 : ".$m1c." ok1 ".$ok1."  eval2 : ".$m2c." ok2 ".$ok2."  coef ".$cof."</br>";
   /* if($m1c==-1 AND $ok1==0) { $m1c=0; $c1+=0;  } if($m1c==-1 AND $ok1==1) { $m1c=0;  $nc1+=$m1c; $c1+=$cof;}
    if($m1c!=-1) {  $nc1+=$m1c; $c1+=$cof;}  */
    if($m1c==-1 AND $ok1==0) { $c1+=0;  } if($m1c==-1 AND $ok1==1) { $c1+=$cof;} if($m1c!=-1) {  $c1+=$cof;} 
     if($m1c==-1 AND $ok1==0) { $m1c=0;  } if($m1c==-1 AND $ok1==1) { $m1c=0;  $nc1+=$m1c;  } if($m1c!=-1) {  $nc1+=$m1c;  } 

  // echo $cb." ] t1 : eval1 : ".$m1c." c1 ".$c1."  eval2 : ".$m2c." ok2 ".$ok2."  coef ".$cof."</br>";
   
  // if($m1c==-1) { $m1c=0;  $nc1+=$m1c; $c1+=$cof;}
  /*  if($m2c==-1 AND $ok2==0) { $m2c=0; } if($m2c==-1 AND $ok2==1) { $m2c=0;  $nc2+=$m2c; $c2+=$cof;}
    if($m2c!=-1) {  $nc2+=$m2c; $c2+=$cof;} */

   if($m2c==-1 AND $ok2==0) { $c2+=0;  } if($m2c==-1 AND $ok2==1) { $c2+=$cof;} if($m2c!=-1) {  $c2+=$cof;} 
     if($m2c==-1 AND $ok2==0) { $m2c=0;  } if($m2c==-1 AND $ok2==1) { $m2c=0;  $nc2+=$m2c;  } if($m2c!=-1) {  $nc2+=$m2c;  } 

  /*  if($m3c==-1 AND $ok3==0) { $m3c=0; } if($m3c==-1 AND $ok3==1) { $m3c=0;  $nc3+=$m3c; $c3+=$cof;}
    if($m3c!=-1) {  $nc3+=$m3c; $c3+=$cof;}  */

    if($m3c==-1 AND $ok3==0) { $c3+=0;  } if($m3c==-1 AND $ok3==1) { $c3+=$cof;} if($m3c!=-1) {  $c3+=$cof;} 
     if($m3c==-1 AND $ok3==0) { $m3c=0;  } if($m3c==-1 AND $ok3==1) { $m3c=0;  $nc3+=$m3c;  } if($m3c!=-1) {  $nc3+=$m3c;  } 


     if($oktrim==0) {   }  if($oktrim==1) {  $nctrim+=$notrimcoef; $ctrim+=$cof; }
      
   }
} 
$reponses->closeCursor(); 
if($c1>0){ $moy1=$nc1/$c1; $inclus1=1;}  if($c1==0){$moy1=-1; }
if($c2>0){ $moy2=$nc2/$c2; $inclus2=1;}  if($c2==0){$moy2=-1; }
if($c3>0){ $moy3=$nc3/$c3; $inclus3=1;}  if($c3==0){$moy3=-1; }
if($ctrim>0){$nbrecompose++;
    $moytrim=$nctrim/$ctrim; $tabmoy+=$moytrim; $inclustrim=1;
    $tabl[$j]=$moytrim;
    if($moytrim>=10){
      $nbreadmis++; 
    }
}
if($ctrim==0){ $moytrim=-1;  }
 //echo $cb." ] t1 : ".$nc1." eval1 : ".$moy1." / eval2 : ".$moy2." / eval3 : ".$moy3." / TRIM : ".$moytrim."</br>";

$r="DELETE FROM ".$tischmoy." WHERE matelev='".$matkey."'   AND idcl='".$_SESSION['clascalcul']."' AND anelev='".$_SESSION['ancalcul']."'";
  $req=$bdda->query($r); 

$req = $bdda->prepare("INSERT INTO ".$tischmoy." (matelev,idcl,anelev,moy1,moy2,moy3,moytrim) 
VALUES( ?,?,?,?,?,?,? )"); 
 $req->execute(array($matkey,$_SESSION['clascalcul'],$_SESSION['ancalcul'],$moy1,$moy2,$moy3,$moytrim));
 
 $cb++; $cpte++; $j++; //$nbrecompose=0; $nbreadmis=0; $pctreussite=0; $tabl=array();
} 
$reponse->closeCursor(); 
$moycl=-1; $pctreussite=-1;  $min=-1; $max=-1;
if($nbrecompose==0){ $nbrecompose=-1; $nbreadmis=-1; }
if($nbrecompose>0){
    $min=min($tabl); $max=max($tabl);
        $moycl=$tabmoy/$nbrecompose;
      $pctreussite=($nbreadmis*100)/$nbrecompose;
}



 // echo " ] moy : ".$moycl." / pct : ".$pctreussite." / cpse : ".$nbrecompose." / admis : ".$nbreadmis."</br>";
 
   $r="UPDATE  ".$tischmoy."  SET mcltrim='".$moycl."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischmoy."  SET cpse='".$nbrecompose."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischmoy."  SET adm='".$nbreadmis."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischmoy."  SET pctrim='".$pctreussite."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischmoy."  SET mintrim='".$min."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
  $r="UPDATE  ".$tischmoy."  SET maxtrim='".$max."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."'  ";
 $req=$bdda->query($r);




$nbrevaltri=nbreval($bdda,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
if($nbrevaltri==1){  
 $v="SELECT  ".$keytischmoy.", moy1,rg1,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
         ORDER BY moy1 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy1=$donnees['moy1']; 
    $key=$donnees[$keytischmoy]; 
    if($moy1!=-1) { //echo $moy1;
     $r="UPDATE ".$tischmoy." SET rg1='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 
}


if($nbrevaltri==2){  
 $v="SELECT  ".$keytischmoy.", moy1,rg1,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
         ORDER BY moy1 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy1=$donnees['moy1']; 
    $key=$donnees[$keytischmoy]; 
    if($moy1!=-1) { //echo $moy1;
     $r="UPDATE ".$tischmoy." SET rg1='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 



$v="SELECT  ".$keytischmoy.", moy2,rg2,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY moy2 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy2=$donnees['moy2']; $key=$donnees[$keytischmoy]; 
    if($moy2!=-1) {
     $r="UPDATE ".$tischmoy." SET rg2='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 

}




if($nbrevaltri==2){  
 $v="SELECT  ".$keytischmoy.", moy1,rg1,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
         ORDER BY moy1 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy1=$donnees['moy1']; 
    $key=$donnees[$keytischmoy]; 
    if($moy1!=-1) { //echo $moy1;
     $r="UPDATE ".$tischmoy." SET rg1='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 



$v="SELECT  ".$keytischmoy.", moy2,rg2,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY moy2 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy2=$donnees['moy2']; $key=$donnees[$keytischmoy]; 
    if($moy2!=-1) {
     $r="UPDATE ".$tischmoy." SET rg2='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 




$v="SELECT  ".$keytischmoy.", moy3,rg3,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY moy3 DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moy3=$donnees['moy3']; $key=$donnees[$keytischmoy]; 
    if($moy3!=-1) {
     $r="UPDATE ".$tischmoy." SET rg3='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 

}



 
$v="SELECT  ".$keytischmoy.", moytrim,rgtrim,idcl,anelev  FROM ".$tischmoy." 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY moytrim DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moytrim=$donnees['moytrim']; $key=$donnees[$keytischmoy]; 
    if($moytrim!=-1) {
     $r="UPDATE ".$tischmoy." SET rgtrim='".$ordre."' WHERE ".$keytischmoy."='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor(); 

 

$total=count($leseleve);

$nbrtrimexige=2; $taban=array(); $par=0; $sumoy=0;
if($_SESSION['trimcalcul']==3){  
$total=count($leseleve);  $nbretrim=0; $admel=-1; $cpse=-1;
if($total>0){  
    for($pos=0; $pos<$total; $pos++){    
        $valmat=$leseleve[$pos];   $nbretrim=0;  $moyan=-1; $som=0;
        $moyt1=searchmoytrim($bdda,$valmat,$_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
        $moyt2=searchmoytrim($bdda,$valmat,$_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
        $moyt3=searchmoytrim($bdda,$valmat,$_SESSION['clascalcul'],3,$_SESSION['ancalcul']);
        // ECHO $total; 
        $r="DELETE FROM markmoyan WHERE matelev='".$valmat."'   AND idcl='".$_SESSION['clascalcul']."' AND anelev='".$_SESSION['ancalcul']."'";
  $req=$bdda->query($r); 
       if($moyt1!=-1){
           $som+=$moyt1; $nbretrim++;
        }
        if($moyt2!=-1){
           $som+=$moyt2; $nbretrim++;
        }
        if($moyt3!=-1){
            $som+=$moyt3; $nbretrim++;
        }
        if($nbretrim>=$nbrtrimexige){
           $moyan=$som/$nbretrim; $taban[$par]=$moyan; 
           if($moyan>=10){
             $admel++;
           } 
           $sumoy+=$moyan;
           $cpse++;
           $par++;
        } 
        
        

        $req = $bdda->prepare("INSERT INTO markmoyan (matelev,idcl,anelev,moyan) 
VALUES( ?,?,?,? )"); 
 $req->execute(array($valmat,$_SESSION['clascalcul'],$_SESSION['ancalcul'],$moyan));
 
        echo $moyan."</br>";
    }
}

$min=-1; $max=-1; $mcl=-1; $pct=-1; 

if($cpse>-1){
    $min=min($taban); $max=max($taban);
    $admel++; $cpse++;
    $pct=($admel*100)/$cpse;
    $mcl=$sumoy/$cpse;
}
$r="UPDATE  markmoyan  SET cpse='".$cpse."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  markmoyan  SET adm='".$admel."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  markmoyan  SET pctan='".$pct."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  markmoyan  SET mclan='".$mcl."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
$r="UPDATE  markmoyan  SET minan='".$min."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  markmoyan  SET maxan='".$max."' WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ";
 $req=$bdda->query($r);


$v="SELECT  idmarkmoyan,matelev,idcl,anelev,moyan,rgan   FROM markmoyan 
        WHERE  anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' 
            ORDER BY moyan DESC" ; 
$reponses = $bdda->query($v);
 $ordre=1;   $i=0; //$cpte  EST LE NBRE D'ELEVE
while ($donnees = $reponses->fetch() )
{
    $moyan=$donnees['moyan']; $key=$donnees['idmarkmoyan']; 
    if($moyan!=-1) {
     $r="UPDATE markmoyan SET rgan='".$ordre."' WHERE idmarkmoyan='".$key."'";
     $req=$bdda->query($r); 
        $ordre++;
    }
     
} 
$reponses->closeCursor();

 } 

}
 $_SESSION['caltrimerfolg']=1 ;
   header('location:insertcalculvu1.php');
?>