<?php 
 
 set_time_limit(2000);


 function veriflohn($bdda,$idn,$an){

     $true=0;
     $v="SELECT * FROM admin_salaire  WHERE   sup ='0'";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['idadmin']==$idn AND $donnees['anens']==$an){ 
              $true=$donnees['id'];
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }



function searchetatnottrim($bdda,$idmat,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT ".$key." , ok1,ok2,ok3,mark1,mark2,mark3,idcl,anelev,idmat FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."' AND idmat='".$idmat."'  ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
$note1=-1; $note2=-1; $note3=-1;  
 $notetrim=-1;  $coef=-1;  $notrimcoef=-1;
  $rgtrim=-1;  $ok1=0; $ok2=0; $ok3=0;
  $oktrim=0;  $ok1=0; $ok2=0; $ok3=0; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;  
 $remplir1=0;   $remplir2=0;  $remplir3=0;
while ($donnees = $reponse->fetch())
{
  $note1=$donnees['mark1']; $note2=$donnees['mark2']; $note3=$donnees['mark3'];
 $ok1=$donnees['ok1']; $ok2=$donnees['ok2']; $ok3=$donnees['ok3'];
   if($ok1==1 AND $note1!=-1){ $remplir1++;}    if($ok2==1 AND $note2!=-1){ $remplir2++;}
    if($ok3==1 AND $note3!=-1){ $remplir3++;}
  
} 
$reponse->closeCursor(); 
$ensb=$remplir1."@".$remplir2."@".$remplir3;
 return $ensb;
} 




function searchgpclastrim($bdda,$idgp,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="markgrouptrim".$trim; $key="idmarkgp".$trim;
$v="SELECT  * FROM ".$table." WHERE  anelev='".$an."' AND idgroup='".$idgp."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
  
 $notegroup=-1;  
  $rgtrim=-1; $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;
while ($donnees = $reponse->fetch() AND $true==0)
{
 
 if($donnees['idcl']==$idcl){
 $notegroup=$donnees['notegroup'];$rgtrim=$donnees['rg']; 
  $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $true=1;
 }
   
} 
$reponse->closeCursor(); 
$ensb=$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 return $ensb;
} 




function searchnotclatrim($bdda,$idmat,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT ".$key." , idmat,anelev,idcl,mcltrim,mintrim,maxtrim,cpse,adm,pctrim FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
$note1=-1; $note2=-1; $note3=-1;  
 $notetrim=-1;  $coef=-1;  $notrimcoef=-1;
  $rgtrim=-1;  $ok1=0; $ok2=0; $ok3=0;
  $oktrim=0;  $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['idmat']==$idmat){
   
   $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $true=1;
}
   
} 
$reponse->closeCursor(); 
$ensb=$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 return $ensb;
} 


function searchclassemoy($bdda,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="markmoytrim".$trim; $key="idmarkmoy".$trim;
$v="SELECT  * FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
$note1=-1; $note2=-1; $note3=-1;  
 $notetrim=-1;    
  $rgtrim=-1;  $rg1=-1; $rg2=-1; $rg3=-1;
    $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['idcl']==$idcl){
 $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
 $notetrim=$donnees['moytrim'];   
  $rgtrim=$donnees['rgtrim'];  $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
   $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $true=1;
}
   
} 
$reponse->closeCursor(); 
$ensb=$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 return $ensb;
} 








 function searchtablemoy($bdda,$mat,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="markmoytrim".$trim; $key="idmarkmoy".$trim;
$v="SELECT  * FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
$note1=-1; $note2=-1; $note3=-1;  
 $notetrim=-1;    
  $rgtrim=-1;  $rg1=-1; $rg2=-1; $rg3=-1;
    $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['matelev']==$mat){
 $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
 $notetrim=$donnees['moytrim'];   
  $rgtrim=$donnees['rgtrim'];  $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
   $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $true=1;
}
   
} 
$reponse->closeCursor(); 
$ensb=$note1."@".$rg1."@".$note2."@".$rg2."@".$note3."@".$rg3."@".$notetrim."@".$rgtrim."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 return $ensb;
} 



function searchnotgptrim($bdda,$idgp,$matri,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="markgrouptrim".$trim; $key="idmarkgp".$trim;
$v="SELECT  * FROM ".$table." WHERE  anelev='".$an."'  AND idcl='".$idcl."' AND idgroup='".$idgp."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
  
 $notegroup=-1;  
  $rgtrim=-1; $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;
while ($donnees = $reponse->fetch() AND $true==0)
{
 
 if($donnees['matelev']==$matri){
 $notegroup=$donnees['notegroup'];$rgtrim=$donnees['rg']; 
  $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $true=1;
 }
   
} 
$reponse->closeCursor(); 
$ensb=$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 return $ensb;
} 




function searchnotbulltrim($bdda,$idmat,$mat,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT  * FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   
$note1=-1; $note2=-1; $note3=-1;  
 $notetrim=-1;  $coef=-1;  $notrimcoef=-1;
  $rgtrim=-1;  $ok1=0; $ok2=0; $ok3=0;
  $oktrim=0;  $mcl=-1; $min=-1; $max=-1;   $cpse=-1; $adm=-1;
 $pct=-1;  $comp1="---"; $comp2="---"; $comp3="---";
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['matelev']==$mat AND $donnees['idmat']==$idmat){
 $note1=$donnees['mark1']; $note2=$donnees['mark2']; $note3=$donnees['mark3'];  
 $notetrim=$donnees['notetrim'];  $coef=$donnees['coef'];  $notrimcoef=$donnees['notrimcoef'];
  $rgtrim=$donnees['rgtrim'];  $ok1=$donnees['ok1']; $ok2=$donnees['ok2']; $ok3=$donnees['ok3'];
  $oktrim=$donnees['oktrim'];  $mcl=$donnees['mcltrim']; $min=$donnees['mintrim']; $max=$donnees['maxtrim'];
  $cpse=$donnees['cpse']; $adm=$donnees['adm']; $pct=$donnees['pctrim'];
  $comp1=$donnees['compet1']; $comp2=$donnees['compet2']; $comp3=$donnees['compet3'];
  $true=1;
}
   
} 
$reponse->closeCursor(); 
$ensb=$note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct."@".$comp1."@".$comp2."@".$comp3;
 return $ensb;
} 




function searchmoytrim($bdda,$mat,$idcl,$trim,$an){//verifie si la matier existe, si oui retourne id de note 

$table="markmoytrim".$trim; $key="idmarkmoy".$trim;
$v="SELECT  ".$key." , matelev,anelev,idcl,moytrim FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'   ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   $moy=-1;  
 
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['matelev']==$mat){
 $moy=$donnees['moytrim'];  
  $true=1;
}
   
} 
$reponse->closeCursor(); 
 return $moy;
} 

function avoiridgpmat($bdda,$idmat,$idcl,$an){// total coef  ds evaluations 

 
$v="SELECT *  FROM matclasse  WHERE sup='0' AND idcl='".$idcl."' AND anens='".$an."'";
$reponse = $bdda->query($v);
$true=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  $mat=$donnees['idmat']; 
   if($idmat==$mat){
     $true=$donnees['idgp']; 
   }
  
} 
$reponse->closeCursor();
 return $true;
}

function searchkoef($bdda,$idmat,$trim,$an,$idcl ){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT  ".$key." ,  anelev,idcl,idmat,mark1,mark2,mark3,coef,ok1,ok2,ok3  FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'    ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;   $nb=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['idmat']==$idmat ){
  $nb=$donnees['coef']+0;
  $true=1;
}
 
} 
$reponse->closeCursor(); 
return $nb;
} 



function searchmark($bdda,$idmat,$trim,$an,$idcl,$matelev){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT  ".$key." , matelev,anelev,idcl,idmat,mark1,mark2,mark3,ok1,ok2,ok3,compet1,compet2,compet3  FROM ".$table." 
WHERE  anelev='".$an."' AND idcl='".$idcl."'  AND idmat='".$idmat."' ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;  $id=0; $note1=-1; $note2=-1;  $note3=-1; 
$ok1=1; $ok2=1;  $ok3=1;  $nb=0; $compet1="---"; $compet2="---"; $compet3="---";
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['matelev']==$matelev ){
 $id=$donnees[$key]; $note1=$donnees['mark1']; $note2=$donnees['mark2'];  $note3=$donnees['mark3'];
   $ok1=$donnees['ok1']; $ok2=$donnees['ok2'];  $ok3=$donnees['ok3'];
$compet1=$donnees['compet1'];  $compet2=$donnees['compet2']; $compet3=$donnees['compet3'];
  
  $true=1;
}
  $nb++;
} 
$reponse->closeCursor(); 
$ensb=$id."@".$note1."@".$note2."@".$note3."@".$ok1."@".$ok2."@".$ok3."@".$nb."@".$compet1."@".$compet2."@".$compet3;
return $ensb;
}

 function acomposertrim($bdda,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 


$v="SELECT  id,matricule,matiere,trimestre,anens  FROM
  note WHERE matricule='".$mat."'  AND  anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['trimestre']==$trim){
  
  $tr=$donnees['id'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


 function Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim ,$an){//note trimestre en une matière 


$v="SELECT DISTINCT typeval FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
AND   matiere='".$idmat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch() )
{
 $som++; 
} 
$reponse->closeCursor(); 
 
return $som;
 
}


function NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$matri,$an ){//note trimestre en une matière 


$v="SELECT DISTINCT typeval FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
AND   matiere='".$idmat."' AND   matricule='".$matri."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch() )
{
 $som++; 
} 
$reponse->closeCursor(); 
 
return $som;
 
}



function admmoypctclasgroupeval($bdda,$idcl,$eval,$idgroup,$an){//moy classe gpe de matière


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $totalmoy=0; $moy= "a"; $pct="a"; $admis=0;
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
   $totalmoy+=$donnees['notegroup']; 
   if($donnees['notegroup']>=10){
   $admis++; 
  }
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $moy=Round(($totalmoy/$effectif),2);
 $pct=Round((($admis*100)/$effectif),2);
}
 $ensb=$admis.":".$moy.":".$pct;
return $ensb;
}




 function cpadmavgclassmatitrim($bdda,$idmat,$idcl,$trim,$an){//effectif ayant composé matière 

$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$compo=0;  $admis=0; $tnote=0; $moy='a';
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){

      
       $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
        if($donnees['note']>=10){
          $admis++; 
        }
           $tnote+=$donnees['note']; 
          $compo++; 
       }

    }
} 
$reponse->closeCursor(); 
if($compo>0){
  $moy=Round(($tnote/$compo),2);
}
$ensb=$compo.':'.$admis.':'.$moy;
 return $ensb;
}

 function cppctmoyadmgrouptrimclas($bdda,$idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 

 $v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$compo=0;   $admis=0; $tmoy=0;$pct= "a"; $moy='a'; 
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){
  $tmoy+=$donnees['notegroup']; 
$compo++;
if($donnees['notegroup']>=10){
   $admis++; 
  }
}
} 
$reponse->closeCursor();
if($compo>0){ 
 $pct=Round((($admis*100)/$compo),2);
 $moy=Round(($tmoy/$compo),2);
} 
$ensb=$compo.':'.$pct.':'.$moy.':'.$admis;
 return $ensb;
 
}



 function NCTRIMetCOEF($bdda,$idmat,$idcl,$trim,$matri,$an){


$v="SELECT *  FROM  notetrimestre 
WHERE  idcl='".$idcl."' AND trimestre='".$trim."'
AND matricule='".$matri."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $coef=0; $nc='a'; $note='a'; $rg='a';
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $coef=$donnees['coef']; $nc=$donnees['nc'];
  $note=$donnees['note']; $rg=$donnees['rgtrim'];
  $true=1;
}
} 
$reponse->closeCursor(); 
$tr=$nc.':'.$coef.':'.$note.':'.$rg;
return $tr;
} 

 

 function NCetCOEFevaluation($bdda,$idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $nc="a"; $coef=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $nc=$donnees['nc']; $coef=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
$tr=$nc.':'.$coef;
return $tr;
} 
 
 function presentrimETmoy($bdda,$idmat,$idcl,$trim,$an){//effectif ayant composé matière 

$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  $total=0; $moy="a";
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){
       $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
        $total+=$donnees['note']; 
          $i++; 

       }
    }
} 
$reponse->closeCursor(); 
if($i>0){
  $moy=Round(($total/$i),2);
}

$ensb=$i.':'.$moy;
return $ensb;
}

 function noteETrgmatevaluation($bdda,$idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."' ORDER BY id DESC" ;
$reponse = $bdda->query($v);
$true=0;   $tr="a"; $note="a";  $nc="a"; $id="s";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['rgeval']; $note=$donnees['note']; $nc=$donnees['nc'];$true=1;   $id=$donnees['id'];
}
} 
$reponse->closeCursor(); 
if($tr==1){
$tr=$tr."<sup>er(e)</sup>";
}
if($tr>1){
  $tr=$tr."<sup>e</sup>";
  }
  
  $resultat=$note.':'.$tr.":".$nc.":".$true;   //$true à la fin
return $resultat;
} 

 
 function presentETadmiseva($bdda,$idmat,$idcl,$eval,$trim,$an){//effectif admis ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' AND matiere='".$idmat."' ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  $j=0;  $som=0; $moy="a";
while ($donnees = $reponse->fetch() )
{
  $som=$som+ $donnees['note']; 
if($donnees['note']>=10){
  
  $i++; 
}
if( $donnees['rgeval']!=" " AND !empty($donnees['rgeval'])){
  
  $j++; 
}
} 
$reponse->closeCursor(); 
if($j>0){
  $moy=Round(($som/$j),2);
}
$ens=$j.':'.$i.':'.$moy;
 return $ens;
}

 function compternbrevalmat($bdda,$idcl,$eval,$trim,$an){// nombr matière totale ds evaluations 


$v="SELECT DISTINCT matiere FROM  note WHERE anens='".$an."'  AND
typeval='".$eval."' AND idcl='".$idcl."' AND    trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
 
  $i++; 
 
} 
$reponse->closeCursor(); 
 return $i;
}
 
function ensgsexe($bdda,$id){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant WHERE supp='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['genre'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

function ensgparsexe($bdda,$sexe,$an){ 

    
    $vue=0; 
    $b="SELECT DISTINCT idens  FROM enseigmatclasse 
    WHERE sup='0' AND anens='".$an."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         $idens=$bonnees['idens'];
         $val=ensgsexe($idens);
        if($val==$sexe){
          $vue++; 
        }
            
     } 
    $beponse->closeCursor();
   return $vue;
    }

 function montantpayeadmin($bdda,$id,$an){ 

  
  $vue=0;$val=0;
  $b="SELECT *  FROM admin_salaire WHERE sup='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idadmin']==$id  AND $bonnees['anens']==$an){
         $val= $bonnees['salaire'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $val;
  }


 function allmatensg($bdda,$idens,$an){
        


  $tabId=array(); $tabMat=array(); $tabclas=array();
   $v="SELECT DISTINCT idmat FROM enseigmatclasse WHERE  idens='".$idens."' AND anens='".$an."' AND sup='0'";
   $reponse = $bdda->query($v);
     $t=0; $nom=" ";$i=0;$tab=array(); 
    while ($donnees = $reponse->fetch() )
    {
      
           $tab[$i]=$donnees['idmat'] ;
           
           $t++; $i++; 
           
     }
    $reponse->closeCursor();
    $debpar="("; $finpar=")";$matclas=" ";
      for($j=0;$j<count($tab);$j++){
          $mat=$tab[$j];
          $mat1=matparid($bdda,$mat,$an)." ".$debpar; $mat1virgul=$mat1;
           //DEB
           $v="SELECT * FROM enseigmatclasse WHERE idens='".$idens."' AND idmat='".$mat."' AND anens='".$an."' AND sup='0'";
           $reponse = $bdda->query($v);
           while ($donnees = $reponse->fetch() )
           {
               if($mat1virgul==$mat1){ 
                 $virg=" ";
                 $mat1=$mat1.$virg."&nbsp".classparid($bdda,$donnees['idcl'],$an);
               }
               else{
                  $virg=","; 
                  $mat1=$mat1."&nbsp".$virg."&nbsp".classparid($bdda,$donnees['idcl'],$an);
               }
              
          }
          $reponse->closeCursor();
          $mat1=$mat1.$finpar."<Br><Br>";
           //FIN
         $matclas=$matclas.$mat1;
      }return $matclas;
  } 



 function idprotitul($bdda,$idcl,$an){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl AND $bonnees['anens']==$an AND  $bonnees['titulaire']==1){
         $vue=$bonnees['idens']; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existclasan($bdda,$idcl,$an){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl AND $bonnees['anens']==$an){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existensmaclas($bdda,$idcl){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existensan($bdda,$idens,$ann){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens AND $bonnees['anens']==$ann){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }



 function totalelev($bdda,$idcl,$an){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM eleve WHERE anelev='".$an."' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['niveauelev']==$idcl  ){
         
        $vue++; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

  function recupidensgpartps($bdda,$tps){ 

    
    $vue=0; 
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['temps']==$tps ){
           $vue=$bonnees['id'] ; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }



   function existemailensg($bdda,$email){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['emailens']==$email){
          $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  } 

  function existoken($bdda,$token){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM  passwordforget";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
      if($bonnees['tokenhash']==$token){
         $expire=$bonnees['expiredate'];
         if(date('Y-m-d H:i:s')<$expire){
            $vue=1;
         }
           
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  } 

   function emailensg($bdda,$id){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id){
        $nom=$bonnees['emailens'];
          $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  } 


 function namensg($bdda,$id){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant WHERE supp='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['nomens']." ".$bonnees['prenomens'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

  function namensgrade($bdda,$id){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['id']==$id  ){
          $genre=$bonnees['genre'];
          if($genre=='M'){
            $nom= "M . <i>".$bonnees['nomens']." ".$bonnees['prenomens']."</i>";
          }
          if($genre=='F'){
            $nom= "Mme  <i>".$bonnees['nomens']." ".$bonnees['prenomens']."</i>";
          }
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return $nom;
    }

    function namensgradebull($bdda,$id){ 

      
      $vue=0;$nom=" ";
      $b="SELECT *  FROM enseignant WHERE supp='0' ";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['id']==$id  ){
            $genre=$bonnees['genre'];
            if($genre=='M'){
              $nom= "M . <i>".$bonnees['nomens']."</i>";
            }
            if($genre=='F'){
              $nom= "Mme  <i>".$bonnees['nomens']."</i>";
            }
            $vue=1; 
          }
              
       } 
      $beponse->closeCursor();
      return $nom;
      }
  function ensgdsmat($bdda,$idmat,$idcl,$an){ 

    
    $vue=0;$liste=" ";
    $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'
    AND idcl='".$idcl."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         
        if($bonnees['idmat']==$idmat){
          $idens=$bonnees['idens'];
           $liste=$liste.namensgradebull($bdda,$idens)." ,";
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return rtrim($liste,',');
    }


    function ensgdstitulaire($bdda,$idcl,$an){ 

      
      $vue=0;$liste=" ";
      $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'
      AND titulaire='1'";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['idcl']==$idcl ){
            $vue=1;
             $liste=namensgrade($bdda,$bonnees['idens']) ;
            
          }
              
       } 
      $beponse->closeCursor();
      return  $liste ;
      }
  


  function mmpassensg($bdda,$mot){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['mtpasse']==$mot ){
           $vue=$bonnees['id']; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }

    function mmcniensg($bdda,$cni){ 

      
      $vue=0;$nom=" ";
      $b="SELECT *  FROM enseignant WHERE supp='0' ";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['cni']==$cni ){
             $vue=$bonnees['id']; 
          }
              
       } 
      $beponse->closeCursor();
      return $vue;
      }

 function matdiffdelui($bdda,$idens,$idcl,$idmat,$an){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
         
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }


  function matierealui($bdda,$idens,$idcl,$idmat,$an){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['idens']==$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
           
          $vue=$bonnees['id']; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }


  function ensglistocupp($bdda,$idens,$idcl,$idmat,$an){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseigmatclasse 
    WHERE sup='0' AND anens='".$an."'  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         
        if( $bonnees['idens']!=$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
           $nom=$nom.", ".namensg($bdda,$bonnees['idens']);
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    if($vue==1){
      return "(déjà occupée par".$nom.")";
    }
  
    }



 function nomdevise($bdda,$id){ 

  
  $vue=0;$nom=0;
  $b="SELECT *  FROM devise  ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['nom'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

 function typepaye($bdda,$idens,$an){ 

  
  $vue=0;$type=0;
  $b="SELECT *  FROM enseigsalaire  ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens  AND $bonnees['anens']==$an){
         $type= $bonnees['type'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $type;
  }

  function montantpaye($bdda,$idens,$an){ 

    
    $vue=0;$val=0;
    $b="SELECT *  FROM enseigsalaire  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['idens']==$idens  AND $bonnees['anens']==$an){
           $val= $bonnees['valeur'];
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return $val;
    }
//FIN MISE A JOUR 






 function verifsco($bdda,$idcl,$stat,$an,$type){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id=$donnees['id'] ;
  $type1=$donnees['type'] ; 
  $stat1=$donnees['stat'] ; 
  if($type==$type1 AND $stat==$stat1){
      $true=$id;
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}



function verifscowant($bdda,$idcl,$stat,$an,$type){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id=$donnees['id'] ;
  $type1=$donnees['type'] ; 
  $stat1=$donnees['stat'] ; 
  $montant=$donnees['tant'] ; 
  if($type==$type1 AND $stat==$stat1){
      $true=1;
      $paye=$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}


function vollpension($bdda,$idcl,$stat,$ans){


 $v="SELECT *  FROM cordon WHERE anens='".$ans."' AND stat='".$stat."' AND type!='4' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye=$paye+$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}


function volldivers($bdda,$idcl,$stat,$an){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='4' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye=$paye+$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}



function grade($bdda,$idcl,$an){


 $v="SELECT *  FROM classe WHERE    sup='0'";
 $reponse = $bdda->query($v);
 $grade=" "; $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
    
  if($donnees['id']==$idcl){
       $grade=$donnees['categ'] ;
       $true=1;
  }
  } 
 $reponse->closeCursor(); 
 return $grade;
}


function part1($nb,$val){
	if($nb==1){
		return '000'.$val;
	}
	if($nb==2){
		return '00'.$val;
	}
	if($nb==3){
		return '0'.$val;
	}
	if($nb==4){
		return $val;
	}
}



function part2($bdda,$an,$cls){
    return grade($bdda,$cls,$an);
 }

function part3($an){
   return substr($an,0,4);
}

//pour inscription ancien



function datenschuler($bdda,$mat,$an,$trim){

      $v="SELECT id,matelev,nomelev,preelev,datelev,niveauelev,abs1,abs2,abs3,date1,date2,date3,niveau,anelev,sexelev,id_etab,idnational FROM eleve WHERE id_etab='0' ORDER BY id DESC";
      $reponse = $bdda->query($v);
         $true=0;   $nom=-1; $pnom=-1; $date=-1; $absen=-1; $retard=-1; $idnat=-1; $sexe="M"; $cls="e";
         $abs="abs".$trim;  $reta="date".$trim;
       while ($donnees = $reponse->fetch() AND $true==0)
       {
           if($donnees['matelev']==$mat AND $donnees['anelev']==$an){
             $nom=$donnees['nomelev'];
             if($nom==" "){ $nom=-1;} 
             $pnom=$donnees['preelev']; if($pnom==" "){ $pnom=-1;}
             $date=$donnees['datelev'];  if($date==" "){ $date=-1;}
             $absen=$donnees[$abs];  if($absen==" "){ $absen=-1;}
             $retard=$donnees[$reta];  if($retard==" "){ $retard=-1;}
             $cls=$donnees['niveauelev']; $sexe=$donnees['sexelev'];  
             $idnat=$donnees['idnational'];  if($idnat==" "){ $idnat=-1;}
              $true=1; 
           }
           
        }
       $reponse->closeCursor();
       $ensb=$nom."@".$pnom."@".$date."@".$cls."@".$sexe."@".$idnat."@".$absen."@".$retard; 
       return $ensb;
     }


function nameschuler($bdda,$mat){

      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['nomelev'] ;
        }
       $reponse->closeCursor();
     }

     function vornameschuler($bdda,$mat){

          $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
          $reponse = $bdda->query($v);
             
           while ($donnees = $reponse->fetch())
           {
              return $donnees['preelev'] ;
            }
           $reponse->closeCursor();
         }

         function geburtstag($bdda,$mat){

              $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
              $reponse = $bdda->query($v);
                 
               while ($donnees = $reponse->fetch())
               {
                  return $donnees['datelev'] ;
                }
               $reponse->closeCursor();
             }


             function genre($bdda,$mat){

                  $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
                  $reponse = $bdda->query($v);
                     
                   while ($donnees = $reponse->fetch())
                   {
                      return $donnees['sexelev'] ;
                    }
                   $reponse->closeCursor();
                 }

                 function nummer($bdda,$mat){

                      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
                      $reponse = $bdda->query($v);
                         
                       while ($donnees = $reponse->fetch())
                       {
                          return $donnees['telev'] ;
                        }
                       $reponse->closeCursor();
                     }
    
                                   

//fin


function schuleschuler($bdda,$mat,$an){

    $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev= '".$an."'  AND id_etab='0'";
    $reponse = $bdda->query($v);
       
     while ($donnees = $reponse->fetch())
     {
        return $donnees['niveauelev'] ;
      }
     $reponse->closeCursor();
   }




   

   function vollnameschuler($bdda,$mat,$an){

      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev= '".$an."' AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['nomelev']." ".$donnees['preelev'] ;
        }
       $reponse->closeCursor();
     }





     function inscripension($bdda,$idcl,$stat,$an){

  
   $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='0' AND sup='0'";
   $reponse = $bdda->query($v);
   $true=0; $paye=0;
   while ($donnees = $reponse->fetch())
   {
     $montant=$donnees['tant'] ; 
    if($donnees['idcl']==$idcl){
         $paye= $montant;
    }
    } 
   $reponse->closeCursor(); 
   return $paye;
  }


  function tranche1pension($bdda,$idcl,$stat,$an){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='1' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye= $montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}

function tranche2pension($bdda,$idcl,$stat,$an){


$v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='2' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $paye=0;
while ($donnees = $reponse->fetch())
{
 $montant=$donnees['tant'] ; 
if($donnees['idcl']==$idcl){
     $paye= $montant;
}
} 
$reponse->closeCursor(); 
return $paye;
}

function tranche3pension($bdda,$idcl,$stat,$an){


$v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='3' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $paye=0;
while ($donnees = $reponse->fetch())
{
 $montant=$donnees['tant'] ; 
if($donnees['idcl']==$idcl){
     $paye= $montant;
}
} 
$reponse->closeCursor(); 
return $paye;
}
  

function nbreval($bdda,$idcl,$trim,$an){


$v="SELECT *  FROM evaltrim WHERE anens='".$an."' AND codetrim='".$trim."' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $nbre=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['idcl']==$idcl){
  $nbre=$donnees['nbre'] ;
  $true=1;
}
} 
$reponse->closeCursor(); 
return $nbre;
} 
 

function existnbreval($bdda,$idcl,$trim,$an){


$v="SELECT *  FROM evaltrim WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
$reponse = $bdda->query($v);
$true=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['codetrim']==$trim){
  
  $true=$donnees['id'];
}
} 
$reponse->closeCursor(); 
return $true;
} 



function Nametrim($bdda,$code){


$v="SELECT *  FROM trimestre ";
$reponse = $bdda->query($v);
$true=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['code']==$code){
  
  $tr=$donnees['nom'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 

function returncoefevaluation($bdda,$idmat,$idcl,$eval,$trim,$an){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function returncoefTRIMCALCUL($bdda,$idmat,$idcl,$trim,$an){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function returncoeftrim($bdda,$idmat,$idcl, $trim,$an){


$v="SELECT idcl,matiere,coef,trimestre,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function returncoefevaluationPERSO($bdda,$idmat,$idcl,$eval,$trim,$an,$matri){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."'
AND matricule='".$matri."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function returncoeftrimPERSO($bdda,$idmat,$idcl,$trim,$matri,$an){


$v="SELECT idcl,matiere,coef,trimestre,anens  FROM  notetrimestre 
WHERE  idcl='".$idcl."' AND trimestre='".$trim."'
AND matricule='".$matri."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 

 

function notelevevaluation($bdda,$idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['note'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function notecoeflevevaluation($bdda,$idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['nc'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function notetrim($bdda,$idmat,$trim,$mat,$an){


$v="SELECT  matricule,matiere,trimestre,nc,anens  FROM  notetrimestre WHERE  matricule='".$mat."' AND trimestre='".$trim."'  AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['nc'] ;
  $true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function rgmatevaluation($bdda,$idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['rgeval'];$true=1;
}
} 
$reponse->closeCursor(); 
if($tr==1){
$tr=$tr."<sup>er(e)</sup>";
}
if($tr>1){
  $tr=$tr."<sup>e</sup>";
  }
return $tr;
} 

 



function rgmattrim($bdda,$idmat,$idcl,$trim,$an,$mat){


$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['rgtrim'];$true=1;
}
} 
$reponse->closeCursor(); 
if($tr==1){
$tr=$tr."<sup>er(e)</sup>";
}
if($tr>1){
  $tr=$tr."<sup>e</sup>";
  }
return $tr;
} 




function notetraiteval($bdda,$idmat,$eval,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 


$v="SELECT  id,matricule,matiere,typeval,trimestre,anens  FROM
  note WHERE matricule='".$mat."'  AND  anens='".$an."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['id'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function notetraitrim($bdda,$idmat,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 


$v="SELECT  id,matricule,matiere,trimestre,anens  FROM
  notetrimestre WHERE matricule='".$mat."'  AND  anens='".$an."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['id'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 







function calculnotetrim($bdda,$idmat,$idcl,$trim, $mat,$nbreval,$an){//note trimestre en une matière 


$v="SELECT *  FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0; $notetrim=" ";$som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  
  $som=$som+$donnees['note']; 
}
} 
$reponse->closeCursor(); 
if($nbreval>0){
 $notetrim=$som/$nbreval;
}  
return $notetrim;
 
}







function classereval($bdda,$idmat,$idcl,$eval,$trim,$an){//classer note eval matière 


$v="SELECT id,idcl,matiere,typeval,trimestre,rgeval,anens
 FROM  note WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' AND anens='".$an."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=1;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  $id=$donnees['id'];
  $r="UPDATE note SET rgeval='".$i."' WHERE id='".$id."'";
  $req=$bdda->query($r);
  $i++; 
}
} 
$reponse->closeCursor(); 
 
}

function classertrim($bdda,$idmat,$idcl,$trim,$an){//classer note eval matière 


$v="SELECT id,idcl,matiere, trimestre,rgtrim,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."'  AND anens='".$an."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=1;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  $id=$donnees['id'];
  $r="UPDATE notetrimestre SET rgtrim='".$i."' WHERE id='".$id."'";
  $req=$bdda->query($r);
  $i++; 
}
} 
$reponse->closeCursor(); 
 
}


 



function effectcompomat($bdda,$idmat,$idcl,$eval,$trim,$an){//effectif ayant composé matière 


$v="SELECT anens,idcl,trimestre,typeval,matiere,note,rgeval  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' AND matiere='".$idmat."' ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
if( $donnees['rgeval']!=" " AND !empty($donnees['rgeval'])){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function effectcompomatrim($bdda,$idmat,$idcl,$trim,$an){//effectif ayant composé matière 

$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){
       $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
          $i++; 
       }
    }
} 
$reponse->closeCursor(); 
 return $i;
}


function myenneclascompomatrim($bdda,$idmat,$idcl,$trim,$compo,$an){// 

$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."' AND anens='".$an."'   ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  $total=0; $moy=" ";
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){
       $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
          $total+=$donnees['note']; 
       }
    }
} 
$reponse->closeCursor(); 
if($compo>0){
  $moy=Round(($total/$compo),2);
}
 return $moy ;
}


function admiscompomat($bdda,$idmat,$idcl,$eval,$trim,$an){//effectif admis ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat AND $donnees['note']>=10){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


 



function admiscompomatrim($bdda,$idmat,$idcl,$trim,$an){//effectif admis ayant composé matière 

$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an);
$v="SELECT matricule,idcl,matiere,trimestre,note,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."' AND matiere='".$idmat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
  if($requis==$requisperso ){ 
if($donnees['note']>=10){
  
  $i++; 
}}
} 
$reponse->closeCursor(); 
 return $i;
}



function myenneclascompomat($bdda,$idmat,$idcl,$eval,$trim,$an,$effec){//moyen   ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' " ;
$reponse = $bdda->query($v);
$i=" ";  $som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat){
  
  $som=$som+ $donnees['note'];
}
} 
$reponse->closeCursor(); 
if($effec>0){
  $i=Round(($som/$effec),2);
}
 return $i;
}

 


function namelehrer($bdda,$idmat,$idcl,$an){//nom ensg matière 


$v="SELECT *  FROM  enseignant WHERE anens='".$an."' AND nivens='".$idcl."' AND discipline='".$idmat."' AND supp='0'" ;
$reponse = $bdda->query($v);
 $nom=" "; $ch=" ";
while ($donnees = $reponse->fetch() )
{
  $nom=$donnees['nomens']." ".$donnees['prenomens'];
  $genre=$donnees['genre'];
if($genre=="M"){
  $nom="M . <I>".$nom."</I></br>";
 }
 else{
  $nom="Mme <I>".$nom."</I></br>";
 }
$ch=$ch.$nom;
} 
$reponse->closeCursor(); 
 
 return $ch;
}



function feuvertbullensg($bdda,$mtp,$idcl,$an){ 


$v="SELECT *  FROM  enseignant WHERE anens='".$an."' AND nivens='".$idcl."' AND mtpasse='".$mtp."' AND supp='0'" ;
$reponse = $bdda->query($v);
$nom=0;
while ($donnees = $reponse->fetch() AND $nom==0)
{
  
  $genre=$donnees['titulaire'];
if($genre==1){
  $nom=1;
 }
 
} 
$reponse->closeCursor(); 
 
 return $nom;
}




function compternbreval($bdda,$matri,$idcl,$eval,$trim,$an){// nombr matière ds evaluations 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 typeval='".$eval."' AND trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matricule']==$matri ){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


function totalNCeval($bdda,$matri,$idcl,$eval,$trim,$an){// total note coefficiee ds evaluations 


$v="SELECT matricule,idcl,typeval,trimestre,nc,anens  FROM  note WHERE   idcl='".$idcl."' AND
 typeval='".$eval."' AND trimestre='".$trim."' AND anens='".$an."'  " ;
$reponse = $bdda->query($v);
$i=0;  $som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matricule']==$matri){
  $som=$som+$donnees['nc'];
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $som;
}




function retrouvernotecoeftrim($bdda,$matri,$idcl,$matier,$trim,$an){// total note coefficiee ds evaluations 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 matiere='".$matier."' AND trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  $val=0;
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
  $val=$donnees['notetrim']*$donnees['coef'];
  $i=1; 
}
} 
$reponse->closeCursor(); 
 return $val;
}





function totalNCtrim($bdda,$matri,$idcl,$trim,$an){// total note coefficiee ds evaluations 

  
$i=0;  $som=0;
$v="SELECT matricule,idcl,trimestre,nc,anens FROM notetrimestre  WHERE matricule='".$matri."' AND idcl='".$idcl."'
AND trimestre='".$trim."' AND anens='".$an."' ";
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch())
{
  $som+=$donnees['nc']; 
  
  
} 
$reponse->closeCursor(); 
 return $som;
}





function totalCOeval($bdda,$idcl,$eval,$trim,$an){// total coef  ds evaluations 

 
$v="SELECT *  FROM matclasse  WHERE sup='0' AND idcl='".$idcl."' AND anens='".$an."'";
$reponse = $bdda->query($v);
$som=0;$coef=0;
while ($donnees = $reponse->fetch())
{
  $idmat=$donnees['idmat']; 
   
  
    $coef=returncoefevaluation($bdda,$idmat,$idcl,$eval,$trim,$an);
     $som=$som+$coef;                
    
} 
$reponse->closeCursor();
 return $som;
}




function totalCOtrim($bdda,$matri,$idcl,$trim,$an){// total coef  ds evaluations 

    
  $i=0;  $som=0;
  $v="SELECT  matricule,idcl,trimestre,coef,anens  FROM notetrimestre  WHERE matricule='".$matri."' AND idcl='".$idcl."'
  AND trimestre='".$trim."' AND anens='".$an."' ";
  $reponse = $bdda->query($v);
  $som=0;
  while ($donnees = $reponse->fetch())
  {
    $som+=$donnees['coef']; 
    
    
  } 
  $reponse->closeCursor(); 
   return $som;
}




function existmoyEval($bdda,$matri,$idcl,$an,$eval,$trim){//existence matri ds eval et trim 


$v="SELECT *  FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."'" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


function voirmoytrim($bdda,$matri,$idcl,$trim,$an){//existence matri  ds moyennetrim 


$v="SELECT *  FROM  moyennetrim WHERE idcl='".$idcl."' AND  codetrim='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}



function voirmoyan($bdda,$matri,$idcl,$an){//existence matri  ds moyenneannuel 


$v="SELECT *  FROM  moyenneannuel WHERE idcl='".$idcl."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}






function existmoyTRIM($bdda,$matri,$idcl,$an,$trim){//existence matri ds eval et trim 


$v="SELECT *  FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."'  AND codetrim='".$trim."'" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}






function existdsnotegroup($bdda,$matri,$idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  id,matricule,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function existdsnotegrouptrim($bdda,$matri,$idcl, $trim,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT id,matricule,idcl,idgroup,trimestre,anens  FROM  notegrouptrim  WHERE   idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function Elevnotegroupeva($bdda,$matri,$idcl,$eval,$idgroup,$an){//return note gpe en une eval d& eleve


$v="SELECT  id,matricule,idcl,idgroup,eval,notegroup,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  $not= " "; 
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $not=$donnees['notegroup']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $not;
}

function Elevnotegrouptrim($bdda,$matri,$idcl,$idgroup,$trim,$an){//return note gpe au trimestre d& eleve


$v="SELECT  id,matricule,idcl,idgroup, notegroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
 
trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  $not= " "; 
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri AND $donnees['idgroup']==$idgroup){
   $not=$donnees['notegroup']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $not;
}

function Elevrggroupeva($bdda,$matri,$idcl,$eval,$idgroup,$an){//return note gpe en une eval d& eleve


$v="SELECT  id,matricule,idcl,idgroup,eval,rg,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   $rg=" ";
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $rg=$donnees['rg']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $rg;
}



function Elevrggrouptrim($bdda,$matri,$idcl,$idgroup,$trim,$an){//return note gpe au trimd& eleve


$v="SELECT  id,matricule,idcl,idgroup, rg,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND 
trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   $rg=" ";
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $rg=$donnees['rg']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $rg;
}



function moyclassegroupeval($bdda,$idcl,$eval,$idgroup,$an){//moy classe gpe de matière


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $moy= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
   $total+=$donnees['notegroup']; 
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $moy=Round(($total/$effectif),2);
}return $moy;
}


function moyclassegrouptrim($bdda,$idcl,$trim,$idgroup,$an){//moy classe gpe de matière


$v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $moy= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){
   $total+=$donnees['notegroup']; 
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $moy=Round(($total/$effectif),2);
}return $moy;
}


function pctclassegroupeval($bdda,$idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
  if($donnees['notegroup']>=10){
   $total++; 
  }
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $pct=Round((($total*100)/$effectif),2);
}return $pct;
}


function pctclassegrouptrim($bdda,$idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 

 $v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){

  if($donnees['notegroup']>=10){
   $total++; 
  }
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $pct=Round((($total*100)/$effectif),2);
}return $pct;
 
}





function compoclassegrouptrim($bdda,$idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 

 $v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){

  
   $effectif++;
}
} 
$reponse->closeCursor(); 
 return $effectif;
 
}




function nbradmisclassegroupeval($bdda,$idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
  if($donnees['notegroup']>=10){
   $total++; 
  }
    
}
} 
$reponse->closeCursor(); 
 return $total;
}




function nbrcpseclassegroupeval($bdda,$idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  if($donnees['eval']==$eval){
   $total++; 
  }
} 
$reponse->closeCursor(); 
 return $total;
}





function nbradmisclassegrouptrim($bdda,$idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){
  if($donnees['notegroup']>=10){
   $total++; 
  }
    
}
} 
$reponse->closeCursor(); 
 return $total;
}



function notemaxmatclaseva($bdda,$idmat,$idcl,$eval,$trim,$an){



$v="SELECT MAX(note) AS n  FROM note WHERE  idcl='".$idcl."' AND typeval='".$eval."'
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}




function notemaxmatclastrim($bdda,$idmat,$idcl,$trim,$an){



$v="SELECT MAX(note) AS n  FROM notetrimestre WHERE  idcl='".$idcl."' 
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function noteminmatclastrim($bdda,$idmat,$idcl,$trim,$an){


$requis=Nbrevalpartrimcpse($bdda,$idmat,$idcl,$trim,$an); 


$v="SELECT * FROM notetrimestre WHERE  idcl='".$idcl."' 
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."'  ORDER BY note DESC" ;
$rep=$bdda->query($v); $nb=" ";
while ($donnee=$rep->fetch())
{
  $requisperso=NbrevalpartrimcpsePARELEV($bdda,$idmat,$idcl,$trim,$donnee['matricule'],$an);
  if($requis==$requisperso){
      $nb=$donnee['note'];   
   }
}
$rep->closeCursor();
return $nb;   
}


function noteminmatclaseva($bdda,$idmat,$idcl,$eval,$trim,$an){


$v="SELECT MIN(note) AS n  FROM note WHERE  idcl='".$idcl."' AND typeval='".$eval."'
AND trimestre='".$trim."' AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}

function noteminGPEeva($bdda,$idcl,$eval,$idgroup,$an ){


$v="SELECT MIN(notegroup) AS n FROM notegroupeval WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function noteminGPEtrim($bdda,$idcl,$trim,$idgroup,$an){


$v="SELECT MIN(notegroup) AS n FROM notegrouptrim WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}





function notemaxGPEeva($bdda,$idcl,$eval,$idgroup,$an ){


$v="SELECT MAX(notegroup) AS n FROM notegroupeval WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}





function notemaxGPEtrim($bdda,$idcl,$trim,$idgroup,$an ){


$v="SELECT MAX(notegroup) AS n FROM notegrouptrim WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function minmoyEval($bdda,$idcl,$an,$eval,$trim){ 


$v="SELECT  MIN(moyeval) AS n   FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."' AND rgeval!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}



function minmoytrim($bdda,$idcl,$an,$trim){ 


$v="SELECT  MIN(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."' AND idcl='".$idcl."' AND 
  codetrim='".$trim."' AND rgtrim!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function minmoyan($bdda,$idcl,$an){ 



$v="SELECT  MIN(moyan) AS n   FROM  moyenneannuel  WHERE anens='".$an."' AND idcl='".$idcl."'  AND rgan!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function maxmoyan($bdda,$idcl,$an){ 


$v="SELECT  MAX(moyan) AS n   FROM  moyenneannuel WHERE anens='".$an."' AND idcl='".$idcl."' AND 
   rgan!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}




function maxmoytrim($bdda,$idcl,$an,$trim){ 


$v="SELECT  MAX(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."' AND idcl='".$idcl."' AND 
  codetrim='".$trim."' AND rgtrim!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function maxmoyEval($bdda,$idcl,$an,$eval,$trim){  


$v="SELECT  MAX(moyeval) AS n   FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."'   AND rgeval != ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}




 

 ?>