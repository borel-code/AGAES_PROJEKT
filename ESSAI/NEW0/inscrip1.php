<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
   
// Connexion à la base de données 
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==4 ) ){ 

  
    if(isset($_POST['sendancien']) ){
    
      


	function grenzensms($paye,$mtantinscrip,$mtanttr1,$mtanttr2,$mtanttr3,$cout){
		$xa=-1;
		
		  if($paye>=$mtantinscrip AND $paye<$mtanttr1) {
			$xa=0; //inscription achevée 
		  }
		  if($paye>=$mtanttr1 AND $paye<$mtanttr2) {
			$xa=1; //tranche 1 achevée 
		  }
		  if($paye>=$mtanttr2 AND $paye<$mtanttr3) {
			$xa=2; //tranche 2 achevée 
		  } 
		  if($paye>=$mtanttr3 AND $paye<$cout) {
			$xa=3; //tranche 3 achevée 
		  }  
		  if($paye==$cout) {
			$xa= 4; //scolar achevée 
		  }  
		  
		  return $xa;    
	  }










 function niv($clas){
 

  $v="SELECT *  FROM classe WHERE code= '".$clas."'";
  $reponse = $bdda->query($v);
     
   while ($donnees = $reponse->fetch())
   {
      return $donnees['niveau'];
	}
   $reponse->closeCursor();
 }
 
 
 
function recnam($an,$clas,$nom,$pre){

	$v="SELECT *  FROM eleve  WHERE niveauelev ='".$clas."' AND anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=1;
  while ($donnees = $reponse->fetch() AND $true ==1)
  {
	 
	 if(strcasecmp($donnees['nomelev'],$nom)==0 AND strcasecmp( $donnees['preelev'] ,$pre)==0){
		$true=0;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}



function effectif($an,$clas){

	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true ==1)
  {
	 
	 if( $donnees['niveauelev']==$clas ){
		$true++;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}
 
 
function effectifc($an,$clas){

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





 $stat=$_POST['stat'];
 $cout= vollpension($_POST['niveauelev'],$stat,$_POST['anelev']);
 $fraisd=volldivers($_POST['niveauelev'],$stat,$_POST['anelev']);
 
 
$total=$_POST['mtnt']-$fraisd;
$reste=$cout-$total;
$date=date('Y-m-d');
$heur=date('H:i'); 
 
$totalc=total($_POST['anelev'],$_POST['niveauelev']);
$effc=effectifc($_POST['anelev'],$_POST['niveauelev'])+1;
 
function format($date){
  $a=substr($date,0,4);
   
  $m=substr($date,5,2);
   
  $j=substr($date,8,2);
   
  $dat=$j."/".$m."/".$a;
  return $dat;
}
$xd=format($date);  
  $_SESSION['matnational']=$_POST['idnational'];
 
// Connexion à la base de données 

 
$verifnom=recnam($_POST['anelev'],$_POST['niveauelev'],$_POST['nomelev'],$_POST['preelev']);
 
if($verifnom == 0){ 
	echo'<HTML>
	<HEAD>
	<meta charset="utf-8" />
	<meta charset="UTF-8"  >
	<title> </title>
	
	<link rel="stylesheet" type="text/css" href="pcn.css" media="all" />
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css" media="all" /> -->
	
	<script language="javascript" type="text/javascript" src="new.js">
	
	</script>
	<TITLE>
	</TITLE>
	</HEAD>
	<BODY>';
    $niv=niv($_POST['niveauelev']); 
	$_SESSION['nomelev']=$_POST['nomelev'];
	$_SESSION['preelev']=$_POST['preelev'];
	$_SESSION['datelev']=$_POST['datelev'];
	$_SESSION['niveauelev']=$_POST['niveauelev'];
	$_SESSION['niv']=$niv;
	$_SESSION['anelev']=$_POST['anelev'];
	$_SESSION['sexelev']=$_POST['sexe'];
	$_SESSION['mtnt']=$_POST['mtnt'];
	$_SESSION['etab']=0;
	$_SESSION['stat']=$stat;
	$_SESSION['tel']=$_POST['tel'];
	$_SESSION['cout']=$cout;
	$_SESSION['frais']=$fraisd;
	$_SESSION['total']=$total;
	$_SESSION['reste']=$reste;
	$_SESSION['date']=$xd;
	$_SESSION['heur']=$heur;
   


	echo '<form method="POST" enctype="multipart/form-data" name="form1" action="exceptinscrip.php" onsubmit="return vide();" id="form">
	  <fieldset>
		<legend align="center"><H2 id="H2">'.$_POST['nomelev'].' '.$_POST['preelev'].'
		<br/> éxiste déjà en '.classparid($_POST['niveauelev'] ,$_POST['anelev']).'</H2></legend> <br/><br/>
		Voulez-vous enregistrer ?
		 
							
	</br></br>';	
	if(isset($_POST['sendancien'])){ 
			echo	'<input type="hidden" name="sendancien" value="non" id="decision"/>';
	}
	else{ 
		echo	'<input type="hidden" name="decision"  value="non" id="decision"/>';
}

				echo '<input type="submit"  value="OUI" name="send" /> 		
				 
			 
			 
      </fieldset>
	</form>';
	 
}

else{ 
	echo'<HTML>
	<HEAD>
	<meta charset="utf-8" />
	<TITLE>
	</TITLE>
	</HEAD>
	<BODY>';

  
  if( $total >=0 AND $reste>=0){
	if(isset($_POST['sendancien'])){ 
           $nb=$_POST['sendancien'];
	}
	else{ 
	$req = $bdda->prepare('INSERT INTO fact(an,id_etab ) VALUES(?,? )'); 
	$req->execute(array($_POST['anelev'],'0' )); 
	
	$v="SELECT * FROM fact WHERE id_etab='0'";
	$rep=$bdda->query($v);
	$tid=0;
	 while($d=$rep->fetch()){
	 $anyea=$d['an'];
	  if($anyea==$_POST['anelev']){
		  $tid++;
	  }
	 } 
	$rep->closeCursor(); 
	$long=strlen($tid);
	$part1=part1($long,$tid);
    $part2=part2($_POST['anelev'],$_POST['niveauelev']);
    $part3=part3($_POST['anelev']);
    $nb=$part1.$part2.$part3;

	}



 
  
 
  $req = $bdda->prepare('INSERT INTO eleve(matelev,nomelev, preelev, datelev, niveauelev,niveau,anelev,sexelev,id_etab,statut,telev,cout,total,reste,date,heure,abs1,date1,abs2,date2,abs3,date3,idnational) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?, ?, ?, ?)'); 
   $req->execute(array($nb,$_POST['nomelev'],$_POST['preelev'],$_POST['datelev'],$_POST['niveauelev'],' ',$_POST['anelev'],$_POST['sexe'],'0',$stat,$_POST['tel'],$cout,$total,$reste,$date,$heur,' ',' ',' ',' ',' ',' ',$_SESSION['matnational'])); 
  
    $r="UPDATE  eleve  SET idnational='".$_SESSION['matnational']."' WHERE matelev='".$nb."'";
 $req=$bdda->query($r);

 $req = $bdda->prepare('INSERT INTO detail(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,statut,frais,montant,date,heure,idempl) VALUES(?,?,?,?,?,?,?,?,?,?, ?,?,?, ?)'); 
 $req->execute(array($nb,$_POST['nomelev'],$_POST['preelev'],$_POST['datelev'],$_POST['niveauelev'],$_POST['anelev'],$_POST['sexe'],'0',$stat,$fraisd,$total,$date,$heur,$_SESSION['id'])); 
  
  
  
  

  echo"<br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
  <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
   
   <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>
  
   <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_POST['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
   
    <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_POST['nomelev']." </br>".$_POST['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$_SESSION['matnational']." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($_POST['niveauelev'] ,$_POST['anelev'])." </H2></td></tr>
   
   <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
   
   <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
   
  
   <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
					  
																		   
   
																											
																
  
   <br> Aucun remboursement ni transfert n'est possible !
  </center><br><br> <center> </center> ";
  
 /*
 echo"<center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
 <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
  
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>
 
  <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_POST['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
  
   <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_POST['nomelev']." </br>".$_POST['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$_SESSION['matnational']." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($_POST['niveauelev'] ,$_POST['anelev'])." </H2></td></tr>
  
  <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
  
  <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
  
 
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
					 
																		  
  
																										   
															   
 
  <br> Aucun remboursement ni transfert n'est possible ! 
  </center> ";

 
echo"  <center><img src='AGAES3.png' height='15%' width='85%' >
<TABLE height='250px' width='90' border='0'> 


<tr> <center> <b><U><h1>RECU  D'INSCRIPTION / SCHOOL FEES RECEIPT</h1></U></b> <br><br> </center></tr>

<tr>  <TD nowrap> <H2><b>Année scolaire / School year :</b></H2> <H1><b> ".$_POST['anelev']." &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  </b></H1> </td> <td nowrap> </td><td nowrap><H2><b>B.P.F :</b></H2> <H1><b> ".$_POST['mtnt']." fcfa  </b></H1><br><br></td> </tr>

  <tr> <TD nowrap> <H2>  Noms / Names of pupil :</b></H2> <H1><b> ".$_POST['nomelev']." ".$_POST['preelev']."             &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp    </b></H1><br><br> </td><td nowrap> <H2>  Matricule / Matricule: </b></H2> <H1><b>".$_SESSION['matnational']."</H1><br><br> </td><td nowrap><H2><b>Classe / Class : </b></H2> <H1><b> ".classparid($_POST['niveauelev'] ,$_POST['anelev'])." </b></H1><br><br> </td></tr>

<tr> <TD nowrap> <H2>Frais divers / Other fees :</b></H2> <H1><b> ".$fraisd." fcfa    </b></H1><br><br> </td><td nowrap> <H2>Avance scolarité / Amount paid :</b></H2> <H1><b>  ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp         </b></H1><br><br> </td><td nowrap> <H2>Cout de la scolarite / School fees :</b></H2> <H1><b>  ".$cout." fcfa </b></H1><br><br> </td></tr>

<tr><td nowrap><H2><b> Statut / Status :</b></H2> <H1><b> ".$stat." </b></H1> <br><br> </td> <TD nowrap> <H2> Reste scolarité / Balance : </b></H2> <H1><b>  ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</b></H1><br><br> </td><td nowrap> <H2>Date / Date of payement :</b></H2> <H1><b> ".$xd."    ".$heur." </b></H1><br><br> </td></tr>                                                


<tr> <TD nowrap> <H2>SIGNATURE PARENT</H2 ></td><td nowrap>   </td>
<td nowrap><H2><b>POUR LE SERVICE DE LA SCOLARITE :  <br>  ". $_SESSION['nom']." <b></H2 > </td></tr></table>                                                               
				   
																		

																										 
															 

<br><br><br><font size='6pt'>N.B : Bien vouloir apporter ce reçu au prochain paiement  / Aucun remboursement ni transfert n'est possible !</font> 
</center><br><br> <center> </center><br><br>";
*/


/*


  echo"<br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='RECU2.png' height='145px' width='1000px' ></center></tr>
  <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
   
   <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>
  
   <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_POST['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
   
   <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_POST['nomelev']." </br>".$_POST['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$_SESSION['matnational']." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($_POST['niveauelev'] ,$_POST['anelev'])." </H2></td></tr>
   
   <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
   
   <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
   
  
   <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
					  
																		   
   
																											
																
  
   <br> Aucun remboursement ni transfert n'est possible !
  </center><br><br> <center> </center> ";
  
 
 echo"<center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='RECU2.png' height='145px' width='1000px' ></center></tr>
 <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
  
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>
 
  <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_POST['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
  
   <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_POST['nomelev']." </br>".$_POST['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$_SESSION['matnational']." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($_POST['niveauelev'] ,$_POST['anelev'])." </H2></td></tr>
  
  <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
  
  <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
  
 
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
					 
																		  
  
																										   
															   
 
  <br> Aucun remboursement ni transfert n'est possible ! 
  </center> ";



*/






$an=$_POST['anelev'];
$mtantinscrip=inscripension($_POST['niveauelev'],$stat,$an);
  $mtanttr1=inscripension($_POST['niveauelev'],$stat,$an)+tranche1pension($_POST['niveauelev'],$stat,$an) ;
  $mtanttr2=inscripension($_POST['niveauelev'],$stat,$an)+tranche1pension($_POST['niveauelev'],$stat,$an)
  +tranche2pension($_POST['niveauelev'],$stat,$an) ;
  $mtanttr3=inscripension($_POST['niveauelev'],$stat,$an)+tranche1pension($_POST['niveauelev'],$stat,$an)
  +tranche2pension($_POST['niveauelev'],$stat,$an)+tranche3pension($_POST['niveauelev'],$stat,$an);
    $cout=vollpension($_POST['niveauelev'],$stat,$an);
	
$anwortung=grenzensms($total,$mtantinscrip,$mtanttr1,$mtanttr2,$mtanttr3,$cout);

if($anwortung>=0){
  $msg="a";
  if($anwortung==0){
   $msg=$_POST['nomelev']." ".$_POST['preelev']." vous venez de payer ".$total." fcfa pour la scolarite et frais exigibles ".$fraisd." fcfa.Votre inscription est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
  }
  if($anwortung==1){
    $msg=$_POST['nomelev']." ".$_POST['preelev']." vous venez de payer ".$total." fcfa pour la scolarite et frais exigibles ".$fraisd." fcfa.Votre tranche 1 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==2){
    $msg=$_POST['nomelev']." ".$_POST['preelev']." vous venez de payer ".$total." fcfa pour la scolarite et frais exigibles ".$fraisd." fcfa.Votre tranche 2 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==3){
    $msg=$_POST['nomelev']." ".$_POST['preelev']." vous venez de payer ".$total." fcfa pour la scolarite et frais exigibles ".$fraisd." fcfa.Votre tranche 3 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==4){
    $msg=$_POST['nomelev']." ".$_POST['preelev']." vous venez de payer ".$total." fcfa pour la scolarite et frais exigibles ".$fraisd." fcfa.Votre scolarite est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }

   $toutlesnum=" ";
   $numer=$_POST['tel'];
   $numer=substr($numer,0,9); 
   $debnumer=substr($numer,0,1);
   $numersend="237".$numer; 
   if(is_numeric($numer)==1 AND $debnumer==6){
     $toutlesnum="237".$numer.",";
     
     if($toutlesnum!=" " AND !empty($toutlesnum) AND $msg!="a"){
      $toutlesnum=rtrim($toutlesnum,",");
       //DEBUT ENVOI
    
    // 1- constante à ne pas modifier 
    /*$user = 'hermannfotso0@gmail.com';
    $password = 'nexah2022';
    $url = 'https://smsvas.com/bulk/public/index.php/api/v1/sendsms';
*/

$user = usersms();
    $password = mtpsms();
    $url = urlsms();

    // 2 - variable à remplir à completer: senderid, sms, mobiles
    $senderid =initialEtab();
    $mobiles =$toutlesnum;
    $sms = $msg;

    
    $sms_body = array(
        'user' => $user,
        'password' => $password,
        'senderid' => $senderid,
        'sms' => $sms,
        'mobiles' => $mobiles
    );

    $send_data = http_build_query($sms_body);
    $gateway_url = $url . "?" . $send_data;

    $back ="";

            $output = curl_error($ch);
            $back = "erreur_sms";
            $back = curl_error($ch);
        }
        else{
            var_dump($output);
        }
        curl_close($ch);
    }

    catch (Exception $exception){
        echo $exception->getMessage();
    }

   }

  }

}




 


   
  } 
  else {
   echo "Verifiez le montant saisi !";
   } 
 
   
 
}
 

  
}







 

}


 










 ?>