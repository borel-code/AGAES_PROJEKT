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
$ensgfach[$i][$h]=ensgdsmat($IDMAT,$_SESSION['clascalcul'],$_SESSION['ancalcul']);
        
   $h++;
        } 
        $reponles->closeCursor();   
        $totalparidgroupe[$i]=$h-1;
            $i++;
          } 
          $reponse->closeCursor();   
      $NBRGROUPE=count($lesidgroupe);
      
    

$effect=effectif($_SESSION['ancalcul'],$_SESSION['clascalcul']);
$cls=classparid($_SESSION['clascalcul'],$_SESSION['ancalcul']);
      $ensgtitul=ensgdstitulaire($_SESSION['clascalcul'],$_SESSION['ancalcul']);

     //AND rgeval >= ".$min." AND rgeval <= ".$max."
  
      $moymin =4;
      $moymax =4; 
      $moyennecl= 4;
      $effecl=4;
   $table="markmoytrim".$_SESSION['trimcalcul'];
 
    $tri="moy".$eva;
     $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
     $nbrevaltri2=nbreval($_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
     $nbrevaltri3=nbreval($_SESSION['clascalcul'],3,$_SESSION['ancalcul']);
if($_SESSION['trimcalcul']==1){ $intitule=$eva; $nomeval="EVAL".$intitule;}
 if($_SESSION['trimcalcul']==2){ $intitule=$nbrevaltri1+$eva;  $nomeval="EVAL".$intitule;}  
 if($_SESSION['trimcalcul']==3){ $intitule=$nbrevaltri1+$nbrevaltri2=$eva;  $nomeval="EVAL".$intitule;}  
    	$v="SELECT  matelev,idcl,anelev,moy1,moy2,moy3,moytrim,rg1,rg2,rg3   FROM ".$table."  WHERE anelev='".$_SESSION['ancalcul']."' AND idcl='".$_SESSION['clascalcul']."' ORDER BY ".$tri." DESC ";
	$reponse = $bdda->query($v);
  $true=0;  $position=1;
  while ($donnees = $reponse->fetch() )
  { 
     
        
         
      $abs="abs".$_SESSION['trimcalcul'];
      
        $mazt=$donnees['matelev'];
        $datenschuler=datenschuler($mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
    $date=$tableau[2];  $sex=$tableau[4];
    $idnational=$tableau[5];
    if($nom==-1){$nom=" ";}  if($prenom==-1){$prenom=" ";}
    if($date==-1){$date=" ";} if($idnational==-1){$idnational=" ";}
    $absen=$tableau[6]; if($absen==-1){$absen=" ";}
    $totalretard=$tableau[7]; if($totalretard==-1){$totalretard=" ";}
    
    
    
    $anee=$_SESSION['ancalcul'];
    
    $avge1=$donnees['moy1'] ;   
          $avge2=$donnees['moy2'] ;  
          $avge3=$donnees['moy3'] ;  
          $rgavge1=$donnees['rg1'] ;  
          $rgavge2=$donnees['rg2'] ;  
          $rgavge3=$donnees['rg3'] ;  
          
   
   
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
        <tr><img src='ENTBULL.png' width='1000px' height='160px'><br>
        <img src='ENTBULL1.png' width='915px' height='180px'></tr>
        
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
       <TR><TD colspan='14'><CENTER> <img src='".$nomeval.".png'> </CENTER></center></TD></TR>
          
       <TR><TD><H2>Matières</br>Subjects</H2></TD>";

      
         $totaleval=array();
           echo "<TD nowrap><center> <H2>Note</br>Mark</H2></center></TD>";
        

      
        
      


       echo" <TD><center><H2>Coef</H2></center></TD>
       <TD nowrap><center> <CENTER><H2>NotexCoef</br>MarkxCoef</H2></CENTER></center></TD>
    <TD nowrap><center><H2>Appréciations/Professeurs</br>Observations/Teachers</H2></center></TD></TR>";
       
       for($j=1;$j<=$NBRGROUPE;$j++){
        $nomgp=groupmatensgnom($lesidgroupe[$j]);
        $num=$lesidgroupe[$j];
       
  echo "<TR bgcolor='orange'><TD nowrap colspan='5'><H7><B><I>ENS.".$nomgp."</I></B></H7></center></TD>
       </TR>";

 
        
      

      
 
        $totalfach=$totalparidgroupe[$j];
        for($jm=1;$jm<=$totalfach;$jm++){
           $idmat=$fach[$j][$jm];
           $namemat=matparid($idmat,$_SESSION['ancalcul']);
 $searchnotbulltrim=searchnotbulltrim($idmat,$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
$mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; 


 

        echo "<TR><TD><H3>".$namemat."</H3></TD>";
 $appr=" ";     $makcoef=" ";  
if($eva==1){
  if($ok1==1 AND $mark1==-1) { $mark1=" ";} if($ok1==0 AND $mark1==-1) { $mark1=" ";}   if($ok1==1 AND $mark1!=-1) { $mark1=$mark1; $makcoef=$mark1*$coef; }
$appr=app($mark1);
   if($mark1!=" " AND !empty($mark1)){
               if($mark1<10){
                  $mark1="<div class='nummerCircle'>".$mark1."</div>";
               }
               else{
                  $mark1= $mark1 ;
               }
            }
            if($mark1==" " AND empty($mark1)){
               $mark1= $mark1 ;
            }
  echo "<TD><center><B><H4>".$mark1."</H4></B></center></TD>"; 
}


 if($eva==2){
    
  if($ok1==1 AND $mark2==-1) { $mark2=" ";} if($ok2==0 AND $mark2==-1) { $mark2=" ";}   if($ok2==1 AND $mark2!=-1) { $mark2=$mark2; $makcoef=$mark2*$coef;}

$appr=app($mark2);
 if($mark2!=" " AND !empty($mark2)){
               if($mark2<10){
                  $mark2="<div class='nummerCircle'>".$mark2."</div>";
               }
               else{
                  $mark2= $mark2 ;
               }
            }
            if($mark2==" " AND empty($mark2)){
               $mark2= $mark2 ;
            }
  echo "<TD><center><B><H4>".$mark2."</H4></B></center></TD>"; 
}
 
if($eva==3){
  if($ok3==1 AND $mark3==-1) { $mark3=" ";} if($ok3==0 AND $mark3==-1) { $mark3=" ";}   if($ok3==1 AND $mark3!=-1) { $mark3=$mark3; $makcoef=$mark3*$coef;}
echo "<TD><center><B><H4>".$mark3."</H4></B></center></TD>"; 

$appr=app($mark3);
 if($mark3!=" " AND !empty($mark3)){
               if($mark3<10){
                  $mark3="<div class='nummerCircle'>".$mark3."</div>";
               }
               else{
                  $mark3= $mark3 ;
               }
            }
            if($mark3==" " AND empty($mark3)){
               $mark3= $mark3 ;
            }
}

 
if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 

  

            // fin note evaluation

            
 
      
        echo " <TD><center><B><H4>".$coef."</H4></B></center></TD>
        <TD><center><B><H4>".$makcoef."</H4></B></center></TD>
         
        <TD><B><H4>".$appr."&nbsp &nbsp/&nbsp".$ensgfach[$j][$jm]."</H4></B></TD></TR>";
        
 // ensgfach[$j][$jm]
    }
     
    


      
       }
      
      
         
        echo  "<TR bgcolor='grey'><TD colspan='14'> <center> <H2><B>RECAPITULATIF/SUMMARY</H2></B> </center> </TD></TR>";
          
           if($avge1==-1){$avge1=" ";}  if($avge2==-1){$avge2=" ";}  if($avge3==-1){$avge3=" ";}
        
  if($eva==1){
             $apprmoy=app($avge1);
             
               echo "</TR><TD><center><B><H2>Moyenne</H2></B></center></TD>
               <TD> <B><H2><center>".$avge1."<center></H2></B> </TD></TR>
               <TR><TD><center><B><H2>Rang</H2></B></center></TD>
               <TD> <B><H2><center>".$position."<center></H2></B> </TD></TR>
               <TR><TD><center><B><H2>APPR.</H2></B></center></TD>
               <TD> <B><H2><center>".$apprmoy."<center></H2></B> </TD></TR>
             
               </TR>"; 
          }
           if($eva==2){
              $apprmoy=app($avge2);
             
               echo "</TR><TD><center><B><H2>Moyenne</H2></B></center></TD>
               <TD> <B><H2><center>".$avge2."<center></H2></B> </TD></TR>
               <TR><TD><center><B><H2>Rang</H2></B></center></TD>
               <TD> <B><H2><center>".$position."<center></H2></B> </TD></TR>
                 <TR><TD><center><B><H2>APPR.</H2></B></center></TD>
               <TD> <B><H2><center>".$apprmoy."<center></H2></B> </TD></TR>
              
               </TR>"; 
          }
           if($eva==3){
              $apprmoy=app($avge3);
            
               echo "</TR><TD><center><B><H2>Moyenne</H2></B></center></TD>
               <TD> <B><H2><center>".$avge3."<center></H2></B> </TD></TR>
               <TR><TD><center><B><H2>Rang</H2></B></center></TD>
               <TD> <B><H2><center>".$position."<center></H2></B> </TD></TR>
                 <TR><TD><center><B><H2>APPR.</H2></B></center></TD>
               <TD> <B><H2><center>".$apprmoy."<center></H2></B> </TD></TR>
              
               </TR>"; 
          }
        
           
     
             
            


       echo "</table>

  <Br>
 <table cellspacing='0' CELLPADING='3' border='1'>
 <TR><TD><B>Visa du parent</Br>Parent's signature</B>&nbsp&nbsp</Br></Br></Br></Br></Br></Br></TD>
 <TD><B>Observations du conseil de classe sur l'élève</Br>Observations of the class council on the student</B>&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp 
 </Br></Br></Br></Br></Br></Br></Br></TD></TR>


<TR><TD><B>VISA  DU PROFESSEUR TITULAIRE / CLASS MASTER/MISTRESS</B>&nbsp&nbsp</Br></Br></Br>
</Br></Br></Br> </TD>
    <TD><B>VISA DU PRINCIPAL / VISA OF THE PRINCIPAL</B>&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </Br></Br></Br></Br></Br></Br></Br></TD></TR></table>
 
<Br>
 </B></Br></Br> 
 </CENTER> ";
    
    
     
        $position++;
       
     } 
  $reponse->closeCursor();
    

   
 //BULLETIN TRIMESTRIEL

 












 //
  



}
    ?>  
 











