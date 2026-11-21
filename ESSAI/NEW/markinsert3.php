<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);


$conneEns=idtl($bdda,$_SESSION['mtp'],$_SESSION['annee']); 
 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
 if(($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==5 OR $_SESSION['code']==7) )  OR $conneEns!=0){ 
    
     $tab=array();
  $tisch="marktrim".$_SESSION['trimremplir'];
  $keytisch="idmark".$_SESSION['trimremplir']; 
  $tischgp="markgrouptrim".$_SESSION['trimremplir'];
  $keytischgp="idmarkgp".$_SESSION['trimremplir']; 
  
if(isset($_POST['inserer']) AND $_POST['coef']>=1) { 
  
  $compet1=$_POST['compet1']; $compet2=$_POST['compet2']; $compet3=$_POST['compet3'];
  $coef=$_POST['coef'];   $tabmark=array(); $p=0; $min=-1; $max=-1; $moycl=-1; $pctcl=0; $adm=0;
 // $effectif=$_SESSION['effecremplir'];
  for($j=1;$j<=$_SESSION['effecremplir'];$j++){
  //   $_SESSION['nbevalrplir'] 
  $matricule=$_SESSION['tableaumatrikule'][$j];
  $r="DELETE FROM ".$tisch." WHERE matelev='".$matricule."' AND idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
  $req=$bdda->query($r);
  $r="DELETE FROM ".$tischgp." WHERE matelev='".$matricule."' AND  idgroup = '".$_SESSION['idkrupmat']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
  $req=$bdda->query($r); 
   $oktrim=0; $numo="numo".$j;  $valnumo=$_POST[$numo];
     $champn1="champn1".$j; $champdec1="champdec1".$j;
     $champn2="champn2".$j; $champdec2="champdec2".$j;
     $champn3="champn3".$j; $champdec3="champdec3".$j;
     if($_SESSION['nbevalrplir']==1){
       $note1=$_POST[$champn1];  $dec1=$_POST[$champdec1];
       if(mb_strlen(trim($note1))==0){ // NOTE VIDE
         $note1=-1; $mark1=" "; 
       }
       if(mb_strlen(trim($note1))!=0){ // NOTE NON VIDE
         if($note1>=0 AND $note1<=20){
            $dec1=1;
           $mark1=$note1;
         }
         if($note1<-1 OR $note1>20){
             $dec1 = 0;  
           $note1=-1; $mark1=" ";
         } 
       }
       if($dec1==0){
        $notetrim=-1;  
       }
       if($dec1==1){
        $notetrim=$mark1;  $oktrim=1;  $tabmark[$p]=$notetrim; $p++;
       }
       if($note1==-1 AND $dec1==1){
        $m1c=0;
       }
       if($note1==-1 AND $dec1==0){
        $m1c=-1;
       }
       if($note1!=-1){
        $m1c=$note1*$coef;
       }
       if($dec1==1){
        $oktrim=1;
       }
       if($oktrim==0){
        $notrimcoef=-1;
       }
        if($oktrim==1){
        $notrimcoef=$notetrim*$coef;
       } 
       if($notetrim>=10){
         $adm++;
       }

       $req = $bdda->prepare("INSERT INTO ".$tisch." (matelev,anelev,idcl,idmat,idgp,mark1,mark2,mark3,notetrim,coef,notrimcoef,m1c,m2c,m3c,rg1,rg2,rg3,rgtrim,ok1,ok2,ok3,oktrim,compet1,compet2,compet3) 
VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,?,?,?,?)"); 
 $req->execute(array($matricule,$_SESSION['anremplir'],$_SESSION['clasremplir'],$_SESSION['fachrempl'],$_SESSION['idkrupmat'],$note1,'-1','-1',$notetrim,$coef,$notrimcoef,$m1c,'-1','-1',' ',' ',' ',' ',$dec1,'-1','-1',$oktrim,$compet1,$compet2,$compet3));

     }


     if($_SESSION['nbevalrplir']==2){
        
       $note1=$_POST[$champn1];   $dec1=$_POST[$champdec1];
       $note2=$_POST[$champn2];    $dec2=$_POST[$champdec2];
        $m1c=-1; $m2c=-1; 
       if(mb_strlen(trim($note1))==0){ // NOTE VIDE
         $note1=-1; $mark1=" ";  
       }
       if(mb_strlen(trim($note1))!=0){ // NOTE NON VIDE
        $note1=$note1+0;
         if($note1>=0 AND $note1<=20){
            $dec1=1;
           $mark1=$note1;
         }
        if($note1<-1 OR $note1>20){
             $dec1 = 0;  
           $note1=-1; $mark1=" ";
         } 
          
       }    $vue=$note1;
       if(mb_strlen(trim($note2))==0){ // NOTE VIDE
         $note2=-1; $mark2=" "; 
       }
       if(mb_strlen(trim($note2))!=0){ // NOTE NON VIDE
         if($note2>=0 AND $note2<=20){
            $dec2=1;
           $mark2=$note2;
         }
         if($note2<-1 OR $note2>20){
             $dec2 = 0;   
           $note2=-1; $mark2=" ";
         } 
       }
       if($dec1==0 AND $dec2==0){
        $notetrim=-1;
       }
       if($dec1==0 AND $dec2==1){
        $notetrim=$mark2;
       }
       if($dec1==1 AND $dec2==0){
        $notetrim=$mark1;
       }
       if($dec1==1 AND $dec2==1){
        $notetrim=($mark1+$mark2)/2;
       }
       if($dec1==1 OR $dec2==1){
        $oktrim=1; $tabmark[$p]=$notetrim; $p++;
       }
       if($note1==-1 AND $dec1==1){
        $m1c=0;
       }
       if($note1==-1 AND $dec1==0){
        $m1c=-1;
       }
       if($note1!=-1){
        $m1c=$note1*$coef;
       }
       if($note2==-1 AND $dec2==1){
        $m2c=0;
       }
       if($note2==-1 AND $dec2==0){
        $m2c=-1;
       }
       if($note2!=-1){
        $m2c=$note2*$coef;
       }
      if($oktrim==0){
        $notrimcoef=-1;
       }
        if($oktrim==1){
        $notrimcoef=$notetrim*$coef;
       } 
       if($notetrim>=10){
         $adm++;
       }

       /*
$tisch="marktrim".$_SESSION['trimremplir'];
  $keytisch="idmark".$_SESSION['trimremplir']; 
 
*/
 
 $req = $bdda->prepare("INSERT INTO ".$tisch." (matelev,anelev,idcl,idmat,idgp,mark1,mark2,mark3,notetrim,coef,notrimcoef,m1c,m2c,m3c,rg1,rg2,rg3,rgtrim,ok1,ok2,ok3,oktrim,compet1,compet2,compet3) 
VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,?,?,?,? )"); 
 $req->execute(array($matricule,$_SESSION['anremplir'],$_SESSION['clasremplir'],$_SESSION['fachrempl'],$_SESSION['idkrupmat'],$note1,$note2,'-1',$notetrim,$coef,$notrimcoef,$m1c,$m2c,'-1',' ',' ',' ',' ',$dec1,$dec2,'-1',$oktrim,$compet1,$compet2,$compet3));

  

    
      // echo $j.". ".$vue."] N1 ".$note1." - DEC1 ".$dec1." / N2 ".$note2." - DEC2 ".$dec2."  / NTRIM".$notetrim." / NTRIMCOEF ".$notrimcoef." / OKTRIM ".$oktrim." / M1C ".$m1c."  / M2C ".$m2c."</br>";
     }





     if($_SESSION['nbevalrplir']==3){
        
       $note1=$_POST[$champn1];   $dec1=$_POST[$champdec1];
       $note2=$_POST[$champn2];    $dec2=$_POST[$champdec2];
       $note3=$_POST[$champn3];    $dec3=$_POST[$champdec3];
        $m1c=-1; $m2c=-1; $m3c=-1; 
       if(mb_strlen(trim($note1))==0){ // NOTE VIDE
         $note1=-1; $mark1=" ";  
       }
       if(mb_strlen(trim($note1))!=0){ // NOTE NON VIDE
        $note1=$note1+0;
         if($note1>=0 AND $note1<=20){
            $dec1=1;
           $mark1=$note1;
         }
        if($note1<-1 OR $note1>20){
             $dec1 = 0;  
           $note1=-1; $mark1=" ";
         } 
          
       }    $vue=$note1;
       if(mb_strlen(trim($note2))==0){ // NOTE VIDE
         $note2=-1; $mark2=" "; 
       }
       if(mb_strlen(trim($note2))!=0){ // NOTE NON VIDE
         if($note2>=0 AND $note2<=20){
            $dec2=1;
           $mark2=$note2;
         }
         if($note2<-1 OR $note2>20){
             $dec2 = 0;   
           $note2=-1; $mark2=" ";
         } 
       }
        if(mb_strlen(trim($note3))==0){ // NOTE VIDE
         $note3=-1; $mark3=" "; 
       }
       if(mb_strlen(trim($note3))!=0){ // NOTE NON VIDE
         if($note3>=0 AND $note3<=20){
            $dec3=1;
           $mark3=$note3;
         }
         if($note3<-1 OR $note3>20){
             $dec3 = 0;   
           $note3=-1; $mark3=" ";
         } 
       }
       if($dec1==0 AND $dec2==0 AND $dec3==0){
        $notetrim=-1;
       }
       if($dec1==0 AND $dec2==0 AND $dec3==1){
        $notetrim=$mark3;
       }
       if($dec1==0 AND $dec2==1 AND $dec3==0){
        $notetrim=$mark2;
       }
       if($dec1==0 AND $dec2==1 AND $dec3==1){
        $notetrim=($mark2+$mark3)/2;
       }
       if($dec1==1 AND $dec2==0 AND $dec3==0){
        $notetrim=$mark1;
       }
       if($dec1==1 AND $dec2==0 AND $dec3==1){
        $notetrim=($mark1+$mark3)/2;
       }
       if($dec1==1 AND $dec2==1 AND $dec3==0){
        $notetrim=($mark1+$mark2)/2;
       }
       if($dec1==1 AND $dec2==1 AND $dec3==1){
        $notetrim=($mark1+$mark2+$mark3)/3;
       }
       
       if($dec1==1 OR $dec2==1 OR $dec3==1){
       $oktrim=1; $tabmark[$p]=$notetrim; $p++;
       }
       if($note1==-1 AND $dec1==1){
        $m1c=0;
       }
       if($note1==-1 AND $dec1==0){
        $m1c=-1;
       }
       if($note1!=-1){
        $m1c=$note1*$coef;
       }
       if($note2==-1 AND $dec2==1){
        $m2c=0;
       }
       if($note2==-1 AND $dec2==0){
        $m2c=-1;
       }
       if($note2!=-1){
        $m2c=$note2*$coef;
       }
       if($note3==-1 AND $dec3==1){
        $m3c=0;
       }
       if($note3==-1 AND $dec3==0){
        $m3c=-1;
       }
       if($note3!=-1){
        $m3c=$note3*$coef;
       }
      if($oktrim==0){
        $notrimcoef=-1;
       }
        if($oktrim==1){
        $notrimcoef=$notetrim*$coef;
       } 
       if($notetrim>=10){
         $adm++;
       }
        
       
 $req = $bdda->prepare("INSERT INTO ".$tisch." (matelev,anelev,idcl,idmat,idgp,mark1,mark2,mark3,notetrim,coef,notrimcoef,m1c,m2c,m3c,rg1,rg2,rg3,rgtrim,ok1,ok2,ok3,oktrim,compet1,compet2,compet3) 
VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,?,?,?,? )"); 
 $req->execute(array($matricule,$_SESSION['anremplir'],$_SESSION['clasremplir'],$_SESSION['fachrempl'],$_SESSION['idkrupmat'],$note1,$note2,$note3,$notetrim,$coef,$notrimcoef,$m1c,$m2c,$m3c,' ',' ',' ',' ',$dec1,$dec2,$dec3,$oktrim,$compet1,$compet2,$compet3));

     //  echo $j.". ".$vue."] N1 ".$note1." - DEC1 ".$dec1." / N2 ".$note2." - DEC2 ".$dec2."  / NTRIM".$notetrim." / NTRIMCOEF ".$notrimcoef." / OKTRIM ".$oktrim." / M1C ".$m1c."  / M2C ".$m2c."</br>";
     }



  }
    
   if($p==0){ $adm=-1; $pctcl= -1;} 
   if($p>0){ $max= max($tabmark);  $min= min($tabmark); $moycl=array_sum($tabmark)/$p; $pctcl=($adm*100)/$p;}
     
   $r="UPDATE  ".$tisch."  SET mcltrim='".$moycl."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
    $r="UPDATE  ".$tisch."  SET mintrim='".$min."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
    $r="UPDATE  ".$tisch."  SET maxtrim='".$max."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
    $r="UPDATE  ".$tisch."  SET cpse='".$p."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tisch."  SET adm='".$adm."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tisch."  SET pctrim='".$pctcl."' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);



 // CLASSER MATIERE TRIM    
 $r="UPDATE  ".$tisch."  SET rgtrim=' ' WHERE idmat = '".$_SESSION['fachrempl']."' AND idcl='".$_SESSION['clasremplir']."' AND anelev='".$_SESSION['anremplir']."'";
 $req=$bdda->query($r);
 $v="SELECT  ".$keytisch." , anelev,idcl,idmat,notetrim,rgtrim,oktrim  FROM ".$tisch." 
WHERE  anelev='".$_SESSION['anremplir']."' AND idcl='".$_SESSION['clasremplir']."' 
AND idmat='".$_SESSION['fachrempl']."' AND oktrim='1' ORDER BY notetrim DESC" ; 
$reponses = $bdda->query($v);
 $bi=1;   
while ($donnees = $reponses->fetch() )
{
   $bum= $donnees[$keytisch];
    $ri="UPDATE  ".$tisch."  SET rgtrim='".$bi."' WHERE ".$keytisch." = '".$bum."' ";
   
   $reqi=$bdda->query($ri);  
    $bi++;  
} 
$reponses->closeCursor(); 
 //FIN  CLASSER MATIERE TRIM


//debut gerer les groupes de matières
$nbcpsegp=0; 
 for($j=1;$j<=$_SESSION['effecremplir'];$j++){
   $matricul=$_SESSION['tableaumatrikule'][$j];
$v="SELECT  ".$keytisch." ,  matelev,anelev,idcl,idgp,coef,notetrim,notrimcoef,oktrim  FROM ".$tisch." 
WHERE  anelev='".$_SESSION['anremplir']."' AND matelev='".$matricul."' AND idcl='".$_SESSION['clasremplir']."'  AND idgp='".$_SESSION['idkrupmat']."'   ORDER BY ".$keytisch." DESC" ;
$reponse = $bdda->query($v);
 $moygpel="-1";    $paqcoefel=0; $paqncoefel=0; $konter=0;  $kontotal=0;
while ($donnees = $reponse->fetch() )
{
 
   if($donnees['matelev']==$matricul){
  $ncoef=$donnees['coef']; $notri=$donnees['notetrim'];  $notricoef=$donnees['notrimcoef'];
  $octrim=$donnees['oktrim'];
  if($notri==-1){
    if($octrim==0){
        // NE COMPTE PAS

     }
     if($octrim==1){
        // COMPTE 
        $paqcoefel=$paqcoefel+$ncoef; 
        $konter=1;
     }

  }
  if($notri!=-1){
      $paqcoefel=$paqcoefel+$ncoef;
      $paqncoefel=$paqncoefel+$notricoef;
      $konter=1;
       
  }
  
   }
   
 
} 
$reponse->closeCursor(); 
 
if($paqcoefel!=0){
  $moygpel=$paqncoefel/$paqcoefel;
}
 
 $req = $bdda->prepare("INSERT INTO ".$tischgp." (matelev,idcl,anelev,notegroup,coef,nc,idgroup) 
VALUES( ?,?,?,?,?,?,? )"); 
 $req->execute(array($matricul,$_SESSION['clasremplir'],$_SESSION['anremplir'],$moygpel,$paqcoefel,$paqncoefel,$_SESSION['idkrupmat']));
 
echo " moygp : ".$moygpel."  coef : ".$paqcoefel." NC ".$paqncoefel."</br>";

 }   
 //fin gerer les groupes de matières

// debut classer les notes des groupoes des matières et statistiques claase du groupe

$araygpcl=array(); $ara=0;
$v="SELECT  ".$keytischgp." ,  matelev,idcl,anelev,notegroup,coef,nc,idgroup,rg  FROM ".$tischgp." 
  WHERE  anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."'   ORDER BY notegroup DESC" ;
$reponse = $bdda->query($v);
  $totnote=0; $totcpse=0; $totadm=0;    $ordre=1; $pctgpcl=-1; $mgpcl=-1;  $min=-1; $max=-1; 
while ($donnees = $reponse->fetch() )
{
  $idty=$donnees[$keytischgp];
  if($donnees['coef']>0){
    $araygpcl[$ara]=$donnees['notegroup'];
   $r="UPDATE ".$tischgp." SET rg='".$ordre."' WHERE ".$keytischgp."='".$idty."'";
  $req=$bdda->query($r); 
      if($donnees['notegroup']>=10){
         $totadm++;
      }
  $totnote+=$donnees['notegroup'];
   $ordre++;  $ara++;
   $totcpse++;
   }
   
 
} 
$reponse->closeCursor(); 
if($totcpse==0){
  $pctgpcl=-1;   $mgpcl=-1;
}
if($totcpse>0){
  $pctgpcl=($totadm*100)/$totcpse;
  $mgpcl=$totnote/$totcpse;
}
$min=min($araygpcl); $max=max($araygpcl);
$r="UPDATE  ".$tischgp."  SET mcltrim='".$mgpcl."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischgp."  SET cpse='".$totcpse."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischgp."  SET adm='".$totadm."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischgp."  SET pctrim='".$pctgpcl."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
 $r="UPDATE  ".$tischgp."  SET mintrim='".$min."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
  $r="UPDATE  ".$tischgp."  SET maxtrim='".$max."' WHERE anelev='".$_SESSION['anremplir']."'  AND idcl='".$_SESSION['clasremplir']."'  AND idgroup='".$_SESSION['idkrupmat']."' ";
 $req=$bdda->query($r);
     
   // fin classer les notes des groupoes des matières et statistiques claase du groupe


    echo "min : ".$min." max : ".$max."  MOCL  ".$moycl." ADM ".$totadm." PCT ".$pctgpcl." CPSE ".$totcpse."</br>"; 
  // ON SUPPRIME TOUTES LES NOTES AU DEPART ; ON INSERE UNE NOTE SI AU MOINS UN DEC EST EGALE A ZERO




$_SESSION['remplerfolg']=1;

  }

    
}
if($_SESSION['backnew']==0){
  header('location:markinsert2.php');
}
if($_SESSION['backnew']==1){
  header('location:insertmarkEns2.php');
}
   
?>