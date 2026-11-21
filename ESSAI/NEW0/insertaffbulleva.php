 <?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require '../bullinfo.php';
require '../lesemploi.php';
   set_time_limit(2000);

   $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
   if($trueadmin!=0 
   AND ($_SESSION['code']==50 OR $_SESSION['code']==1
   OR $_SESSION['code']==2 OR $_SESSION['code']==3
   OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
     
 
   function effectif($an,$clas){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['niveauelev']==$clas ){
		$true++;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}



   $eva=$_POST['eval'];
   $ordre=$_POST['ordre'];
   $choix=$_POST['ordre'];
   if($ordre==1){
      $min=1; $max=15;
   }
   if($ordre==2){
     $min=16; $max=30;
  }
  if($ordre==3){
     $min=31; $max=45;
  }
  if($ordre==4){
     $min=46; $max=60;
  }
  if($ordre==5){
     $min=61; $max=75;
  }
  if($ordre==6){
     $min=76; $max=90;
  }
  if($ordre==7){
     $min=91; $max=105;
  }
  
   
 
  

  
    

      function app($a) {
         if($a!=" " AND !empty($a)){ 
            if( $a>=0 AND $a <10){
         return 'NA / CAN';
         }
         if($a>=10 AND $a <15){
         return 'ECA / CBA';
         }
         if($a>=15 AND $a <18 ){
         return 'A / CA';}
         if($a>=18 AND $a <=20){
         return 'A+';}
         }
         else{
         
            return $a;
         }

     }


     function ecriturerang ($rang){
      if($rang!=" " AND !empty($rang)){
         if($rang==1){
             $rang=$rang."<sup>er(e)/st</sup>";
          }
          else if($rang==2){
             $rang=$rang."<sup>e/nd</sup>";
          }
          else if($rang==3){
             $rang=$rang."<sup>e/rd</sup>";
          }
          else{
             $rang=$rang."<sup>e/th</sup>";
             }
      }
      return $rang;
   
   }
   


     $_SESSION['elevemateva']=array();  $_SESSION['elevemarkeva']=array(); $_SESSION['eleveposeva']=array();


     $vZ="SELECT *  FROM moyenne WHERE anens='".$_SESSION['ancalcul']."' 
     AND idcl='".$_SESSION['clascalcul']."' AND codeval='".$eva."'
    AND codetrim='".$_SESSION['trimcalcul']."' 
      ORDER BY moyeval DESC";
      $reponsZ = $bdda->query($vZ);
      $pos=1;
      while ($donneesZ = $reponsZ->fetch())
      {
       $_SESSION['elevemateva'][$pos]= $donneesZ['matricule'];
       $_SESSION['elevemarkeva'][$pos]= $donneesZ['moyeval'];
       $_SESSION['eleveposeva'][$pos]= $donneesZ['rgeval'];
        $pos++;
     }$reponsZ->closeCursor();



      $lesidgroupe=array();   $totalparidgroupe=array();

      $v="SELECT *  FROM groupmatensg1   WHERE   typeEns='".$_SESSION['typensgcalcul']."'" ;
         $reponse= $bdda->query($v);
          $i=1;   
          while ($donnees= $reponse->fetch())
           {
            $lesidgroupe[$i]=$donnees['code'];
            $gruppe=$donnees['code'];



            $fach[$i]=array(); $moyfach[$i]=array();$minfach[$i]=array();
            $maxfach[$i]=array();$pctfach[$i]=array();$ensgfach[$i]=array();
             
            $vles="SELECT  *  FROM matclasse  WHERE anens='".$_SESSION['ancalcul']."' 
            AND idcl='".$_SESSION['clascalcul']."' AND idgp='".$gruppe."' AND sup='0'";
        $reponles = $bdda->query($vles);
        $h=1;
        while ($donneeles = $reponles->fetch())
        {
         $IDMAT=$donneeles['idmat'];
         $fach[$i][$h]=$donneeles['idmat'];
         
         $moyfach[$i][$h]=moyclmat ($_SESSION['clascalcul'],
         $IDMAT,$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
         $adm=admiscompomat($IDMAT,$_SESSION['clascalcul'], 
    $eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $cps=effectcompomat($IDMAT,$_SESSION['clascalcul'], 
    $eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);

    $pctfach[$i][$h]=" ";
    if($cps>0){ 
      $pctfach[$i][$h]=Round((($adm*100)/$cps),2);
    }
         
         $maxfach[$i][$h]=notemaxmatclaseva($IDMAT,$_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
         $minfach[$i][$h]=noteminmatclaseva($IDMAT,$_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
         $ensgfach[$i][$h]=ensgdsmat($IDMAT,$_SESSION['clascalcul'],$_SESSION['ancalcul']);
         $h++;
        } 
        $reponles->closeCursor();   
        $totalparidgroupe[$i]=$h-1;

      
            $i++;
          } 
          $reponse->closeCursor();   
      $NBRGROUPE=count($lesidgroupe);
      
    


      $ensgtitul=ensgdstitulaire($_SESSION['clascalcul'],$_SESSION['ancalcul']);

     //AND rgeval >= ".$min." AND rgeval <= ".$max."
    
     $moymin =minmoyEval($_SESSION['clascalcul'],$_SESSION['ancalcul'],$eva,$_SESSION['trimcalcul']);
        $moymax =maxmoyEval($_SESSION['clascalcul'],$_SESSION['ancalcul'],$eva,$_SESSION['trimcalcul']);
        
        $moyennecl= myenneklaseva($_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
        $effecl=belegklaseva($_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                    
if($choix==8){ 
        $min=1;  $max=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
}
$effect=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
if($max>$effect){ 
    $max=$effect;
}

     for($pos=$min;$pos<=$max;$pos++){ 
    
        
        $mazt=$_SESSION['elevemateva'][$pos];
        $abs="abs".$_SESSION['trimcalcul']; 
        $absen=heurelevtri($mazt,$_SESSION['ancalcul'],$abs);
        $dat="date".$_SESSION['trimcalcul']; 
    $totalretard=heurelevtri($mazt,$_SESSION['ancalcul'],$dat);
    $nom=nameschuler($mazt);$prenom=vornameschuler($mazt);
    $cls=classparid($_SESSION['clascalcul'],$_SESSION['ancalcul']);
    $date=dateElevuniq($mazt,$_SESSION['ancalcul']);
    $sex=sexeElevuniq($mazt,$_SESSION['ancalcul']);
    $effect=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
    $anee=$_SESSION['ancalcul'];
        echo"<html>
        
        <head>
           <style type='text/css'> 
           
         
          .nummerCircle{
                 width: 35px;
               line-height: 20px;
                border-radius: 70%;
               text-align: center;
             
             
              
             
              font-size:15px ;
              border: 2px solid red;
              }
             
              </style>
           
           </head>
        
        <body><CENTER><table  cellspacing='0' CELLPADING='3' border='1'   >
        <tr><img src='ENTBULL.png' width='1330px' height='200px'><br>
        <img src='ENTBULL1.png' width='915px' height='150px'></tr>
        
        <TR>
       <table  cellspacing='0' CELLPADING='3' border='1'>
       <TD colspan='14' nowrap><H2>Nom / Name: ".$nom."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
       &nbsp &nbsp &nbsp A/S -School year: ".$anee."
      <br> Prenom / Surname: ".$prenom ."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp 
      &nbsp  &nbsp &nbsp &nbsp Sexe / Sex : ".$sex."<br>Date de naissance / Date of birth : ".$date."&nbsp &nbsp &nbsp &nbsp 
      &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp <br>
      Matricule / Reference : ".$mazt."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp
       &nbsp  &nbsp &nbsp &nbsp Classe / Class : ".$cls." <br>
       Effectif / Roll : ".$effect."  &nbsp &nbsp &nbsp &nbsp &nbsp   Prof.Titulaire / Class Master:   ".$ensgtitul."</H2></center></TD>
      
      </TR>
       <TR><TD colspan='14'><CENTER> <img src='EVAL".$eva.".png'> </CENTER></center></TD></TR>
          
       <TR><TD><center><H2>Matières</br>Subjects</H2></center></TD><TD nowrap><center> <H2>Eval ".$eva."</H2></center></TD> 
       <TD><center><H2>Coef</H2></center></TD><TD nowrap><center> <CENTER><H2>NxC</br>MxC</H2></CENTER></center></TD><TD><center><H2>Rg</br>Pos.</H2></center></TD>
       <TD><center><H2>M. cl</br>A .cl</H2></center></TD><TD><center><H2>Min</br>Last</H2></center></TD>
       <TD><center><H2>Max</br>First</H2></center></TD><TD><center><H2>%Réussite</br>%Success</H2></center></TD>
       <TD nowrap><center> <H2>Appréciations/Professeurs</br>Observations/Teachers</H2></center></TD></TR>";
       
       for($j=1;$j<=$NBRGROUPE;$j++){
        $nomgp=groupmatensgnom($lesidgroupe[$j]);
        $num=$lesidgroupe[$j];
          $notegp=Elevnotegroupeva($mazt,$_SESSION['clascalcul'],$eva,$num,$_SESSION['ancalcul']);
        $rggp=Elevrggroupeva($mazt,$_SESSION['clascalcul'],$eva,$num,$_SESSION['ancalcul']);
        if($rggp!=" " AND !empty($rggp)){
           if($rggp==1){
            $rggp=$rggp."<sup>er(e)/st</sup>";
            }
            else{
               $rggp=$rggp."<sup>e/th</sup>";
               }
        }

        $apprgp=app($notegp);
        $totalfach=$totalparidgroupe[$j];
        for($jm=1;$jm<=$totalfach;$jm++){
         
        $idmat=$fach[$j][$jm];
        $namemat=matparid($idmat,$_SESSION['ancalcul']);
        $ensbmat=array();
        $noteETrgmatevaluation=noteETrgmatevaluation($idmat,$_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul'],$mazt);
        $ensbmat=explode(":",$noteETrgmatevaluation);
       // $note=noteeleveva($mazt,$_SESSION['clascalcul'],$idmat,$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
       $note=$ensbmat[0];if($note=='a'){$note=' ';}
       if($ensbmat[3]==1){$note=$note;}if($ensbmat[3]==0){
         $verifNOTE=effectcompomat($idmat,$_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
         if($verifNOTE>=1){
            $note="N.C";
        }
        if($verifNOTE<1){
         $note=" ";
        }   
      }
        $nc=$ensbmat[2];if($nc=='a'){$nc=' ';}
        $coef=returncoefevaluation($idmat ,$_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],
        $_SESSION['ancalcul']);
       
        $rgmat=$ensbmat[1];if($rgmat=='a'){$rgmat=' ';};  
        
         

         $appr=app($note);
 

       

        $rgeva=$_SESSION['eleveposeva'][$pos];
         
        
        

        $moyeva=$_SESSION['elevemarkeva'][$pos];
        $apprmoy=app($moyeva);

        


        if($note!=" " AND !empty($note)){
         if($note<10){
            $note="<div class='nummerCircle'>".$note."</div>";
         }
         else{
            $note= $note ;
         }
      }
      if($note==" " AND empty($note)){
         $note= $note ;
      }


        echo "<TR><TD><H3>".$namemat."</H3></TD><TD><center><B><H4>".$note."</H4></B></center></TD> 
        <TD><center><B><H4>".$coef."</H4></B></center></TD><TD><center><B><H4>".$nc."</H4></B></center></TD>
        <TD><center><B><H4>".$rgmat."</H4></B></center></TD><TD><center><B><H4>".$moyfach[$j][$jm]."</H4></B></center></TD>
        <TD><center><B><H4>".$minfach[$j][$jm]."</H4></B></center></TD>
        <TD><center><B><H4>".$maxfach[$j][$jm]."</H4></B></center></TD>
        <TD><center><B><H4>".$pctfach[$j][$jm]."</H4></B></center></TD>
        <TD><B><H4>".$appr."&nbsp &nbsp/&nbsp  ".$ensgfach[$j][$jm]."</H4></B></TD></TR>";

    }
    



        echo "<TR bgcolor='orange'><TD nowrap colspan='4'><H7><B><I>SYNTHESE ENS.".$nomgp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>MOY/Avg</I></B></H7></center></TD><TD><center><H7><B><I>".$notegp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>RANG/Pos</I></B></H7></center></TD><TD><center><H7><B><I>".$rggp."</I></B></H7></center></TD> 
         <TD><center><H7><B><I> </I></B></H7></center></TD><TD><center><H7><B><I>".$apprgp."</I></B></H7></center></TD>
         </TR>";
       }
      
       if($moyeva>=12){
       $tabhonneur="<img src='EVALCOCH.png'>";
       }
       if($moyeva<12){
         $tabhonneur=" ";
         }
         
        echo  "<TR bgcolor='grey'><TD colspan='14'> <center> <H2><B>RECAPITULATIF/SUMMARY</H2></B> </center> </TD></TR>
       
       
      
       </table>


 

 <table cellspacing='0' CELLPADING='3' border='1'>
 <TR><TD nowrap><H2><B>MOYENNE</Br>AVERAGE</B></H2></TD>
 <TD nowrap bgcolor='orange'><H2><B>".$moyeva."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Appréciations</Br>Observations</B></H7></TD>
 <TD nowrap  bgcolor='orange'><H7><B>".$apprmoy."&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Retard(s) / Late</B></H7></TD><TD nowrap><H7><B> &nbsp".$totalretard."</B></H7></TD>
 <TD nowrap colspan='2' bgcolor='grey'><center><H7><B>Travail de la classe</br>Class profile</center></B></H7></TD></TR>

 <TR><TD nowrap><H2><B>RANG/POS.</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>".ecriturerang ($rgeva)."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Tableau d'honneur</B></H7></TD><TD nowrap><H7><B>".$tabhonneur."</B></H7></TD>
 <TD nowrap><H7><B>Blames/Blame</B></H7></TD><TD nowrap><H7><B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Moy.Gene.Cl</Br>Average class : ".$moyennecl."</B></H7></TD><TD nowrap><H7><B>Effectif classé : ".$effecl."&nbsp&nbsp</B></H7></TD></TR>

 <TR><TD nowrap><H2><B>ABSENCES</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>  ".$absen." H</B></H2></TD>
 <TD nowrap><H7><B>Avertissement</Br>Behaviour warning</B></H7></TD><TD nowrap><H7><B></B></H7></TD>
 <TD nowrap><H7><B>Exclusion en jours</Br>Exclusion</B></H7></TD><TD nowrap><H7><B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>1ère Moy </Br> First Average : ".$moymax."&nbsp&nbsp</B></H7></TD><TD nowrap><H7><B>dernière Moy</Br>Last Average : ".$moymin."&nbsp&nbsp</B></H7></TD></TR>

 <TR><TD colspan='6'><B>Visa du parent</Br>Parent's signature</B>&nbsp&nbsp</Br></Br></Br></Br></Br></Br></TD>
 <TD colspan='12'><B>Observations du conseil de classe sur l'élève</Br>Observations of the class council on the student</B>&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
 </Br></Br></Br></Br></Br></Br></Br></TD></TR>



 <TR><TD colspan='6'><B>VISA  DU PROFESSEUR TITULAIRE / CLASS MASTER/MISTRESS</B>&nbsp&nbsp</Br></Br></Br>
 </Br></Br></Br></Br></Br></Br></Br></Br></Br></TD>
     <TD colspan='12'><B>VISA DU PRINCIPAL / VISA OF THE PRINCIPAL</B>&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
     </Br></Br></Br></Br></Br></Br></Br></Br></Br></Br></Br></Br></Br></TD></TR>



 </table>
   </Br></Br></Br></Br>
 </CENTER> ";
    
    
     
       
       
    }
     


 
  



}
    ?>  
 


