<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require '../bullinfo.php';
require '../lesemploi.php';    require 'competfunction.php';
   set_time_limit(2000);

   $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
   if($trueadmin!=0 
   AND ($_SESSION['code']==50 OR $_SESSION['code']==1
   OR $_SESSION['code']==2 OR $_SESSION['code']==3
   OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
     
   function effectif($bdda,$an,$clas){
	
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

$matri=$_SESSION['momatri'];

      $nbrevaltri1=nbreval($bdda,$_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
     $nbrevaltri2=nbreval($bdda,$_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
     $nbrevaltri3=nbreval($bdda,$_SESSION['clascalcul'],3,$_SESSION['ancalcul']);
if($_SESSION['trimcalcul']==1){ $nbrecomp=$nbrevaltri1;}
 if($_SESSION['trimcalcul']==2){ $nbrecomp=$nbrevaltri2;}  
 if($_SESSION['trimcalcul']==3){ $nbrecomp=$nbrevaltri3;}  
      
      $lesidgroupe=array();  $totalparidgroupe=array();

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
$ensgfach[$i][$h]=ensgdsmat($bdda,$IDMAT,$_SESSION['clascalcul'],$_SESSION['ancalcul']);
        
   $h++;
        } 
        $reponles->closeCursor();   
        $totalparidgroupe[$i]=$h-1;
            $i++;
          } 
          $reponse->closeCursor();   
      $NBRGROUPE=count($lesidgroupe);
      
    

$effect=effectif($bdda,$_SESSION['ancalcul'],$_SESSION['clascalcul']);
$cls=classparid($bdda,$_SESSION['clascalcul'],$_SESSION['ancalcul']);
      $ensgtitul=ensgdstitulaire($bdda,$_SESSION['clascalcul'],$_SESSION['ancalcul']);

     //AND rgeval >= ".$min." AND rgeval <= ".$max."
    if($_SESSION['trimcalcul']<3){ 
       
                     
 
         $min=1;  $max=count($_SESSION['elevemattri']);
 
$true=0;
     while($min<=$max AND $true==0){ 
        if($_SESSION['elevemattri'][$min]==$matri){ 
        
         
      $abs="abs".$_SESSION['trimcalcul'];
      
        $mazt=$_SESSION['elevemattri'][$min];
        $datenschuler=datenschuler($bdda,$mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
    $date=$tableau[2];  $sex=$tableau[4];
    $idnational=$tableau[5];
    if($nom==-1){$nom=" ";}  if($prenom==-1){$prenom=" ";}
    if($date==-1){$date=" ";} if($idnational==-1){$idnational=" ";}
    $absen=$tableau[6]; if($absen==-1){$absen=" ";}
    $totalretard=$tableau[7]; if($totalretard==-1){$totalretard=" ";}
    
    
    
    $anee=$_SESSION['ancalcul'];
    $moytrim=$_SESSION['elevemarktri'][$min];
    $rgtrim=$_SESSION['elevepostri'][$min];
    $avge1=$_SESSION['elevemoy1'][$min] ;   
          $avge2=$_SESSION['elevemoy2'][$min] ;
          $avge3=$_SESSION['elevemoy3'][$min] ;
          $rgavge1=$_SESSION['eleverg1'][$min] ;
          $rgavge2=$_SESSION['eleverg2'][$min] ;
          $rgavge3=$_SESSION['eleverg3'][$min] ;
          $elevMCL=$_SESSION['elevMCL'][$min] ;
          $elevFM=$_SESSION['elevFM'][$min] ;
          $elevLM=$_SESSION['elevLM'][$min] ;
          $elevCPSE=$_SESSION['elevCPSE'][$min] ;
   
    if($rgtrim!=" " AND !empty($rgtrim)){
        if($rgtrim==1){
            $rgtrim=$rgtrim."<sup>er(e)/st</sup>";
         }
         else if($rgtrim==2){
            $rgtrim=$rgtrim."<sup>e/nd</sup>";
         }
         else if($rgtrim==3){
            $rgtrim=$rgtrim."<sup>e/rd</sup>";
         }
         else{
            $rgtrim=$rgtrim."<sup>e/th</sup>";
            }
     }
        echo"<html><head>
       


        <style type='text/css'> 
	     
		
		 .nummerCircle{
		        width: 35px;
				line-height: 20px;
				 border-radius: 70%;
		      text-align: center;
			 
			 
			  
			 
			  font-size:15px ;
			  border: 2px solid red;
			  }


            .nummerCircle2{
		        width: 67px;
				line-height: 63px;
				 border-radius: 90%;
		      text-align: center;
			 
			 
			  
			 
			  font-size:30px ;
			  border: 4px solid red;
			  }

           .nummerCircle3{
		        width: 67px;
				line-height: 63px;
				 border-radius: 90%;
		      text-align: center;
			 
			 
			  
			 
			  font-size:30px ;
			  border: 4px solid green;
			  }
			  </style>
        
           </head><body><CENTER><table cellspacing='0' CELLPADING='3' border='1'>
        <tr><img src='ENTBULL.png' width='1000px' height='210px'><br>
        <img src='ENTBULL1.png' width='950px' height='190px'></tr>
        
        <TR>
        <table  cellspacing='0' CELLPADING='3' border='1'>
        <TD colspan='14' nowrap><H2>Nom / Name: ".$nom."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
        &nbsp &nbsp &nbsp A/S -School year: ".$anee."
       <br> Prenom / Surname: ".$prenom ."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp 
       &nbsp  &nbsp &nbsp &nbsp Sexe / Sex : ".$sex."<br>Date de naissance / Date of birth : ".$date."&nbsp &nbsp &nbsp &nbsp 
       &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp <br>
       Matricule nationale / National Reference : ".$idnational."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp
        &nbsp  &nbsp &nbsp &nbsp Classe / Class : ".$cls." <br>
          
        Effectif / Roll : ".$effect."  &nbsp &nbsp &nbsp &nbsp &nbsp   Prof.Titulaire / Class Master:   ".$ensgtitul."</H2></center></TD>
       
       </TR>
       <TR><TD colspan='14'><CENTER> <img src='TRIM".$_SESSION['trimcalcul'].".png'> </CENTER></center></TD></TR>";
          
       echo" <TR><TD><H2>Matières / nom de l'enseignant</br>Subjects / name of teacher</H2></TD>
       <TD><H2>Compétences évaluées</H2></TD><TD><center><H2>N/20</H2></center></TD><TD><center><H2>MOY/20</H2></center></TD>
       <TD nowrap><center><H2>Coef</H2></center></TD><TD><center><H2>MOY x Coef</H2></center></TD>
       <TD><center><H2>COTE</H2></center></TD><TD nowrap><center><H2>[Min-Max]</H2></center></TD>
       
       <TD nowrap><center><H2>Appréciations<Br>Observations</H2></center></TD></TR>";

      
         $totaleval=array();
          if($_SESSION['trimcalcul']==1){   $debut=1;
         for($i=1;$i<$nbrevaltri1+1;$i++){
          
          $totaleval[$i]=$i;
        }
      }
      if($_SESSION['trimcalcul']==2){
      
        $total=$nbrevaltri1+$nbrevaltri2;
        $j=$nbrevaltri1+1;    $debut=$j;
        $grand=$total-$j+1;
        for($i=1;$i<$grand+1;$i++){  
        
          $totaleval[$i]=$j;  $j++;
        }
      }
      if($_SESSION['trimcalcul']==3){
       
        $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
        $j=$nbrevaltri1+$nbrevaltri2+1; $debut=$j;
        $grand=$total-$j+1;
        for($i=1;$i<$grand+1;$i++){  
         
          $totaleval[$i]=$j;  $j++;
        }
      }
      
        
      


       
       
       for($j=1;$j<=$NBRGROUPE;$j++){
        $nomgp=groupmatensgnom($bdda,$lesidgroupe[$j]);
        $num=$lesidgroupe[$j];
        $searchnotgptrim=searchnotgptrim($bdda,$num,$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 
$cormul=array();
      $cormul=explode("@",$searchnotgptrim);
      $notegp=$cormul[0]; $rggp=$cormul[1]; 
        if($notegp==-1){$notegp=" ";} 
        if($rggp==-1){$rggp=" ";} 
        
          if($rggp!=" " AND !empty($rggp)){
           if($rggp==1){
            $rggp=$rggp."<sup>er(e)/st</sup>";
            }
            else if($rggp==2){
               $rggp=$rggp."<sup>e/nd</sup>";
               }
               else if($rggp==3){
                  $rggp=$rggp."<sup>e/rd</sup>";
                  }
            else{
               $rggp=$rggp."<sup>e/th</sup>";
               }
        }

      

        $apprgp=app($notegp);
        
        $totalfach=$totalparidgroupe[$j];
        for($jm=1;$jm<=$totalfach;$jm++){
           $idmat=$fach[$j][$jm];
           $namemat=matparid($bdda,$idmat,$_SESSION['ancalcul']);
 $searchnotbulltrim=searchnotbulltrim($bdda,$idmat,$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
$mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; $comp1=$formul[17]; $comp2=$formul[18]; 
$comp3=$formul[19]; 



        echo "<TR><TD rowspan='".$nbrecomp."'><small><b>".$namemat."</br>".$ensgfach[$j][$jm]."</b></small></TD>";
       
if($nbrecomp==1){
  if($ok1==1 AND $mark1==-1) { $mark1=" ";} if($ok1==0 AND $mark1==-1) { $mark1=" ";}   if($ok1==1 AND $mark1!=-1) { $mark1=$mark1;}
  
}
if($nbrecomp==2){
  if($ok1==1 AND $mark1==-1) { $mark1=" ";} if($ok1==0 AND $mark1==-1) { $mark1=" ";}   if($ok1==1 AND $mark1!=-1) { $mark1=$mark1;}
if($ok2==1 AND $mark2==-1) { $mark2=" ";} if($ok2==0 AND $mark2==-1) { $mark2=" ";}   if($ok2==1 AND $mark2!=-1) { $mark2=$mark2;}
 
}
if($nbrecomp==3){
  if($ok1==1 AND $mark1==-1) { $mark1=" ";} if($ok1==0 AND $mark1==-1) { $mark1=" ";}   if($ok1==1 AND $mark1!=-1) { $mark1=$mark1;}
if($ok2==1 AND $mark2==-1) { $mark2=" ";} if($ok2==0 AND $mark2==-1) { $mark2=" ";}   if($ok2==1 AND $mark2!=-1) { $mark2=$mark2;}
if($ok3==1 AND $mark3==-1) { $mark3=" ";} if($ok3==0 AND $mark3==-1) { $mark3=" ";}   if($ok3==1 AND $mark3!=-1) { $mark3=$mark3;}
 
}
 
if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 
   if($mcl==-1){$mcl=" ";}  if($mcl!=-1){$mcl=$mcl;}   if($mini==-1){$mini=" ";}  if($mini!=-1){$mini=$mini;}
  if($maxi==-1){$maxi=" ";}  if($maxi!=-1){$maxi=$maxi;}  
  if($pct==-1){$pct=" ";}  if($pct!=-1){$pct=$pct;}   
    if($rgmat==-1){$rgmat=" ";}  if($rgmat!=-1){$rgmat=$rgmat;} 
  $appr=app($marktrim);

            // fin note evaluation

            if($marktrim!=" " AND !empty($marktrim)){
               if($marktrim<10){
                  $marktrim="<div class='nummerCircle'>".$marktrim."</div>";
               }
               else{
                  $marktrim= $marktrim ;
               }
            }
            if($marktrim==" " AND empty($marktrim)){
               $marktrim= $marktrim ;
            }
 
 
      
        echo "<TD><small><b>".$comp1."</b></small></TD><TD><small><b>".$mark1."</b></small></TD><TD rowspan='".$nbrecomp."'><center><B><H4>".$marktrim."</H4></B></center></TD>
        <TD rowspan='".$nbrecomp."'><center><B><H4>".$coef."</H4></B></center></TD>
        <TD rowspan='".$nbrecomp."'><center><B><H4>".$maktrimcoef."</H4></B></center></TD>
        <TD rowspan='".$nbrecomp."'><center><B><H4>".newcote($marktrim)."</H4></B></center></TD>
        <TD rowspan='".$nbrecomp."'><center><B><H4>[".$mini." - ".$maxi."]</H4></B></center></TD>
        <TD rowspan='".$nbrecomp."'><center><B><H4>".newappr($marktrim)."</H4></B></center></TD>
         </TR>";
        if($nbrecomp==2){
          echo "<TR><TD><small><b>".$comp2."</b></small></TD><TD><small><b>".$mark2."</b></small></TD></TR>";
        }
        if($nbrecomp==3){
          echo "<TR><TD><small><b>".$comp2."</b></small></TD><TD><small><b>".$mark2."</b></small></TD></TR>";
          echo "<TR><TD><small><b>".$comp3."</b></small></TD><TD><small><b>".$mark3."</b></small></TD></TR>";
        }
 // ensgfach[$j][$jm]
    }
     
    


         echo "<TR bgcolor='orange'><TD nowrap colspan='3'><H7><B><I>SYNTHESE ENS.".$nomgp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>MOY / AVG</I></B></H7></center></TD><TD><center><H7><B><I>".$notegp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>RG / POS.</I></B></H7></center></TD><TD><center><H7><B><I>".$rggp."</I></B></H7></center></TD> 
          <TD><center><H7><B><I>".$apprgp."</I></B></H7></center></TD></TR>";
       }
      
        if($moytrim==-1){$moytrim=" ";}  if($moytrim!=-1){$moytrim=$moytrim;} 
       if($moytrim>=12){
       $tabhonneur="<img src='EVALCOCH.png'>";
       }
       if($moytrim<12){
         $tabhonneur=" ";
         }
         
        echo  "<TR bgcolor='grey'><TD colspan='14'> <center> <H2><B>RECAPITULATIF/SUMMARY</H2></B> </center> </TD></TR>";
          
           
              $apprmoy=app($moytrim);
              if($moytrim<10){
 $moytrim="<div class='nummerCircle2'>".$moytrim."</div>";
               }
               if($moytrim>=10){
 $moytrim="<div class='nummerCircle3'>".$moytrim."</div>";
               }

               if($elevMCL==-1){$elevMCL=" ";}
               if($elevFM==-1){$elevFM=" ";}
               if($elevLM==-1){$elevLM=" ";}
               if($elevCPSE==-1){$elevCPSE=" ";} 


       echo "</table>

 
<Br>
 <table cellspacing='0' CELLPADING='3' width='1050px' height='200px' border='1'>
 <TR><TD nowrap><H2><B>Moyenne trimestrielle</Br>Term Average</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>".$moytrim."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Appréciations</Br>Observations</B></H7></TD><TD nowrap  bgcolor='orange'><H7><B>".$apprmoy."&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Retard(s) / Late</B></H7></TD><TD nowrap><H7><B> &nbsp".$totalretard."</B></H7></TD>
 <TD nowrap colspan='2' bgcolor='grey'><center><H3><B>Travail de la classe au trimestre</br>Class profile</center></B></H3></TD></TR>

 <TR><TD nowrap><H2><B>Rang / Position</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>".$rgtrim."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Tableau d'honneur</B></H7></TD><TD nowrap><H7><B>".$tabhonneur."</B></H7></TD>
 <TD nowrap><H7><B>Blames/Blame</B></H7></TD><TD nowrap><H7><B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Moy.Gene.Cl</Br>Average class : ".$elevMCL."</B></H7></TD><TD nowrap><H7><B>Effectif classé : ".$elevCPSE."&nbsp&nbsp</B></H7></TD></TR>

 <TR><TD nowrap><H2><B>Absence</B></H2></TD><TD nowrap bgcolor='orange'><H2><B> ".$absen." H</B></H2></TD>
 <TD nowrap><H7><B>Avertissement</Br>Behaviour warning</B></H7></TD><TD nowrap><H7><B></B></H7></TD>
 <TD nowrap><H7><B>Exclusion en jours</Br>Exclusion</B></H7></TD><TD nowrap><H7><B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>1ère Moy </Br> First Average : ".$elevFM."&nbsp&nbsp</B></H7></TD><TD nowrap><H7><B>dernière Moy</Br>Last Average : ".$elevLM."&nbsp&nbsp</B></H7></TD></TR>

 <TR><TD colspan='6'><B>Visa du parent</Br>Parent's signature</B>&nbsp&nbsp</Br></Br></Br></Br></Br></Br></TD>
 <TD colspan='12'><B>Observations du conseil de classe sur l'élève</Br>Observations of the class council on the student</B>&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
 </Br></Br></Br></Br></Br></Br></Br></TD></TR>


<TR><TD colspan='6'><B>VISA  DU PROFESSEUR TITULAIRE / CLASS MASTER/MISTRESS</B>&nbsp&nbsp</Br></Br></Br>
</Br></Br></Br> </TD>
    <TD colspan='12'><B>VISA DU PRINCIPAL / VISA OF THE PRINCIPAL</B>&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </Br></Br></Br></Br></Br></Br></Br></TD></TR>


 </table> </B></Br></Br> 
 </CENTER> ";
    
    
     $true=1;
      }
      $min++; 
       
    }
    

   }
 //BULLETIN TRIMESTRIEL

 












 //
  



}
    ?>  
 


