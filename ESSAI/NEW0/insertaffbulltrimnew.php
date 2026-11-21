<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require '../bullinfo.php';
require '../lesemploi.php';  require 'competfunction.php';
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
   if($ordre!=8){
      $tabORD=array();
     $tabORD=explode("-",$ordre); 
     $min=$tabORD['0'];
     $max=$tabORD['1'];
       
   }
   if($ordre==8){
     
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



     $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
     $nbrevaltri2=nbreval($_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
     $nbrevaltri3=nbreval($_SESSION['clascalcul'],3,$_SESSION['ancalcul']);

       
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

         $TABm=array();
    $cpadmavgclassmatitrim=cpadmavgclassmatitrim($IDMAT,$_SESSION['clascalcul'], 
    $_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $TABm=explode(':',$cpadmavgclassmatitrim);
    $cps=$TABm[0];

          
         $moyfach[$i][$h]=$TABm[2];if($moyfach[$i][$h]=='a'){$moyfach[$i][$h]=' ';}
         $admMAT=$TABm[1];
          
         $pctfach[$i][$h]=" ";
    if($cps>0){ 
      $pctfach[$i][$h]=Round((($admMAT*100)/$cps),2);
    }
         $maxfach[$i][$h]=notemaxmatclastrim($IDMAT,$_SESSION['clascalcul'], $_SESSION['trimcalcul'],$_SESSION['ancalcul']);
         $minfach[$i][$h]=noteminmatclastrim($IDMAT,$_SESSION['clascalcul'], $_SESSION['trimcalcul'],$_SESSION['ancalcul']);
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
    if($_SESSION['trimcalcul']<3){ 
      $moymin =minmoytrim($_SESSION['clascalcul'],$_SESSION['ancalcul'], $_SESSION['trimcalcul']);
      $moymax =maxmoytrim($_SESSION['clascalcul'],$_SESSION['ancalcul'], $_SESSION['trimcalcul']); 
      $moyennecl= myenneklastrim($_SESSION['clascalcul'], $_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $effecl=belegklaseva($_SESSION['clascalcul'],$eva,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                     
if($choix==8){ 
         $min=1;  $max=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
 }

      for($pos=$min;$pos<=$max;$pos++){ 
     
         
         
      $abs="abs".$_SESSION['trimcalcul'];
      
        $mazt=$_SESSION['elevemattri'][$pos];
    $nom=nameschuler($mazt);$prenom=vornameschuler($mazt);
    $idnational=idnational($mazt,$_SESSION['ancalcul']);
    $cls=classparid($_SESSION['clascalcul'],$_SESSION['ancalcul']);
    $date=dateElevuniq($mazt,$_SESSION['ancalcul']);
    $sex=sexeElevuniq($mazt,$_SESSION['ancalcul']);
    $effect=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
    $anee=$_SESSION['ancalcul'];
    $moytrim=$_SESSION['elevemarktri'][$pos];
    $rgtrim=$_SESSION['elevepostri'][$pos];
    $absen=heurelevtri($mazt,$_SESSION['ancalcul'],$abs);
    $dat="date".$_SESSION['trimcalcul']; 
    $totalretard=heurelevtri($mazt,$_SESSION['ancalcul'],$dat);
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
			  </style>
        
        </head><body><CENTER><table cellspacing='0' CELLPADING='3' border='1'>
        <tr><img src='ENTBULL.png' width='1730px' height='200px'><br>
        <img src='ENTBULL1.png' width='915px' height='180px'></tr>
        
        <TR>
        <table  cellspacing='0' CELLPADING='3' border='1'>
        <TD colspan='14' nowrap><H2>Nom / Name: ".$nom."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
        &nbsp &nbsp &nbsp A/S -School year: ".$anee."
       <br> Prenom / Surname: ".$prenom ."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp 
       &nbsp  &nbsp &nbsp &nbsp Sexe / Sex : ".$sex."<br>Date de naissance / Date of birth : ".$date."&nbsp &nbsp &nbsp &nbsp 
       &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp <br>
       Matricule en classe / Reference in class: ".$mazt."&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp
        &nbsp  &nbsp &nbsp &nbsp Classe / Class : ".$cls." <br>
         Matricule nationale / National Reference : ".$idnational." &nbsp &nbsp &nbsp &nbsp 
       &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  <br>
        Effectif / Roll : ".$effect."  &nbsp &nbsp &nbsp &nbsp &nbsp   Prof.Titulaire / Class Master:   ".$ensgtitul."</H2></center></TD>
       
       </TR>
       <TR><TD colspan='14'><CENTER> <img src='TRIM".$_SESSION['trimcalcul'].".png'> </CENTER></center></TD></TR>
          
       <TR><TD><H2>Matières / nom de l'enseignant</br>Subjects / name of teacher</H2></TD>
       <TD><H2>Compétences évaluées</H2></TD>";

      
         $totaleval=array();
       if($_SESSION['trimcalcul']==1){
         for($i=1;$i<$nbrevaltri1+1;$i++){
          
          $totaleval[$i]=$i;
        }
      }
      if($_SESSION['trimcalcul']==2){
      
        $total=$nbrevaltri1+$nbrevaltri2;
        $j=$nbrevaltri1+1;
        $grand=$total-$j+1;
        for($i=1;$i<$grand+1;$i++){  
          
          $totaleval[$i]=$j;  $j++;
        }
      }
      if($_SESSION['trimcalcul']==3){
       
        $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
        $j=$nbrevaltri1+$nbrevaltri2+1;
        $grand=$total-$j+1;
        for($i=1;$i<$grand+1;$i++){  
        
          $totaleval[$i]=$j;  $j++;
        }
      }

      
        
      


       echo" <TD><center><H2>N/20</H2></center></TD><TD><center><H2>MOY/20</H2></center></TD>
       <TD nowrap><center><H2>Coef</H2></center></TD><TD><center><H2>MOY x Coef</H2></center></TD>
       <TD><center><H2>COTE</H2></center></TD><TD nowrap><center><H2>[Min-Max]</H2></center></TD>
       
       <TD nowrap><center><H2>Appréciations<Br>Observations</H2></center></TD></TR>";
       
       for($j=1;$j<=$NBRGROUPE;$j++){
        $nomgp=groupmatensgnom($lesidgroupe[$j]);
        $num=$lesidgroupe[$j];
         $notegp=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $num,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
           $rggp=Elevrggrouptrim($mazt,$_SESSION['clascalcul'],$num,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
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

        $totalfach=$totalparidgroupe[$j];
        for($jm=1;$jm<=$totalfach;$jm++){
         
        $idmat=$fach[$j][$jm];
        $namemat=matparid($idmat,$_SESSION['ancalcul']);
        $nbrfoismatri=compevaluee($mazt,$idmat,$_SESSION['clascalcul'],
        $_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
        $tabnccoeftrim=array(); 
   $NCTRIMetCOEF=NCTRIMetCOEF($idmat
 ,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$mazt,$_SESSION['ancalcul']);
 $tabnccoeftrim=explode(':',$NCTRIMetCOEF);
 $nc=$tabnccoeftrim[0];if($nc=='a'){$nc=' ';}
       // $note=noteelevetrim($mazt,$_SESSION['clascalcul'],$idmat,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
        $note=$tabnccoeftrim[2];if($note=='a'){$note=' ';}
        $coef=returncoeftrim($idmat ,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],
        $_SESSION['ancalcul']);
        $rgmat=$tabnccoeftrim[3];if($rgmat=='a'){$rgmat=' ';}
        
          

         $appr=app($note);
         
        
      

        $apprgp=app($notegp);

        

        
        
         
        
         

        
        
           if($nbrfoismatri==0){ 
        echo "<TR><TD><H5>".$namemat."<Br><Br>".$ensgfach[$j][$jm]."</H5></TD><TD><H5></H5></TD><TD><H5></H5></TD>";
          }
          if($nbrfoismatri>0){
            $tab=array(); 
            $listcpevaclas=listcpevaclas($mazt,$_SESSION['clascalcul'],$idmat,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
            $tab=$listcpevaclas;
            $comp1=$tab[0]; $decomp=array(); $decomp=explode(":",$comp1);
            $nbrfoismatri=$nbrfoismatri;  
            echo "<TR><TD rowspan='".$nbrfoismatri."'><H5>".$namemat."<Br><Br>".$ensgfach[$j][$jm]."</H5></TD>
            <TD><B><H4>".nomcompetence($decomp[0])."</H4></B></TD><TD><center><B><H4>".$decomp[1]."</H4></B></center></TD>";
              }
           //note par evaluation
          
            // fin note evaluation

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
            if($nbrfoismatri>0){ 
        echo "<TD rowspan='".$nbrfoismatri."'><center><B><H4>".$note."</H4></B></center></TD>
        <TD rowspan='".$nbrfoismatri."'><center><B><H4>".$coef."</H4></B></center></TD>
        <TD rowspan='".$nbrfoismatri."'><center><B><H4>".$nc."</H4></B></center></TD>
        <TD rowspan='".$nbrfoismatri."'><center><B><H4>".newcote($note)."</H4></B></center></TD>
        <TD rowspan='".$nbrfoismatri."' nowrap><center><B><H4>[".$minfach[$j][$jm]." - ".$maxfach[$j][$jm]."]</H4></B></center></TD>
        <TD rowspan='".$nbrfoismatri."'><B><H4>".newappr($note)."</H4></B></TD>";
            }
            if($nbrfoismatri==0){ 
                echo "<TD><center><B><H4>".$note."</H4></B></center></TD><TD><center><B><H4>".$coef."</H4></B></center></TD>
                <TD><center><B><H4>".$nc."</H4></B></center></TD>
                <TD><center><B><H4>".newcote($note)."</H4></B></center></TD>
                <TD nowrap><center><B><H4>[".$minfach[$j][$jm]." - ".$maxfach[$j][$jm]."]</H4></B></center></TD>
                <TD><B><H4>".newappr($note)."</H4></B></TD>";
                    }
        echo "</TR>";

    }
     

    if($nbrfoismatri>0){ 
        $len=count($tab);
        if($len>1){ 
            for($p=1;$p<$len;$p++){ 
                $comp1=$tab[$p]; $decomp=array(); $decomp=explode(":",$comp1); 
    echo "<TR><TD><B><H4>".nomcompetence($decomp[0])."</H4></B></TD><TD><center><B><H4>".$decomp[1]."</H4></B></center></TD></TR>";
            }
        }
     }
      echo "<TR bgcolor='orange'><TD nowrap colspan='4'><H7><B><I>SYNTHESE ENS.".$nomgp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>MOY / AVG</I></B></H7></center></TD><TD><center><H7><B><I>".$notegp."</I></B></H7></center></TD>
         <TD><center><H7><B><I>RG / POS.</I></B></H7></center></TD><TD><center><H7><B><I>".$rggp."</I></B></H7></center></TD> 
         <TD><center><H7><B><I>".$apprgp."</I></B></H7></center></TD></TR>";
       }
      
       if($moytrim>=12){
       $tabhonneur="<img src='EVALCOCH.png'>";
       }
       if($moytrim<12){
         $tabhonneur=" ";
         }
         $apprmoy=app($moytrim);
        echo  "<TR bgcolor='grey'><TD colspan='14'> <center> <H2><B>RECAPITULATIF/SUMMARY</H2></B> </center> </TD></TR>";
       
      

       echo "</table>


 

 <table cellspacing='0' CELLPADING='3' border='1'>
 <TR><TD nowrap><H2><B>Moyenne trimestrielle</Br>Term Average</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>".$moytrim."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Appréciations</Br>Observations</B></H7></TD><TD nowrap  bgcolor='orange'><H7><B>".$apprmoy."&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Retard(s) / Late</B></H7></TD><TD nowrap><H7><B> &nbsp".$totalretard."</B></H7></TD>
 <TD nowrap colspan='2' bgcolor='grey'><center><H3><B>Travail de la classe au trimestre</br>Class profile</center></B></H3></TD></TR>

 <TR><TD nowrap><H2><B>Rang / Position</B></H2></TD><TD nowrap bgcolor='orange'><H2><B>".$rgtrim."&nbsp&nbsp</B></H2></TD>
 <TD nowrap><H7><B>Tableau d'honneur</B></H7></TD><TD nowrap><H7><B>".$tabhonneur."</B></H7></TD>
 <TD nowrap><H7><B>Blames/Blame</B></H7></TD><TD nowrap><H7><B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</B></H7></TD>
 <TD nowrap><H7><B>Moy.Gene.Cl</Br>Average class : ".$moyennecl."</B></H7></TD><TD nowrap><H7><B>Effectif classé : ".$effect."&nbsp&nbsp</B></H7></TD></TR>

 <TR><TD nowrap><H2><B>Absence</B></H2></TD><TD nowrap bgcolor='orange'><H2><B> ".$absen." H</B></H2></TD>
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
</Br></Br></Br> </TD>
    <TD colspan='12'><B>VISA DU PRINCIPAL / VISA OF THE PRINCIPAL</B>&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </Br></Br></Br></Br></Br></Br></Br></TD></TR>


 </table> </B></Br></Br> 
 </CENTER> ";
    
    
     
       
       
    }
    

   }
 //BULLETIN ANNUEL

 












 //
  



}
    ?>  
 


