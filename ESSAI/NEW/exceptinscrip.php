<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
?>

<?php 
  
   
	echo'<HTML>
	<HEAD>
	<meta charset="utf-8" />
	<meta charset="UTF-8"  >
	<title> </title>
	
	 
	</HEAD>
	<BODY>';
 
	 
	 $niv=$_SESSION['niv'];
 
	$_SESSION['etab']=0;
	$stat=$_SESSION['stat'];
	 
  $cout= $_SESSION['cout'];
    $fraisd=$_SESSION['frais'];
	$total=$_SESSION['total'];
	$reste=$_SESSION['reste'];
    
  $xd=$_SESSION['date'];
	$heur=$_SESSION['heur'];

 
  $dte=date('Y-m-d');
	 
	 
 

  if( $total >=0){

    if(isset($_POST['sendancien'])){ 
      $nb=$_SESSION['matschule'];
}
else{ 
$req = $bdda->prepare('INSERT INTO fact(an,id_etab ) VALUES(?,? )'); 
$req->execute(array($_SESSION['anelev'],'0' )); 

$v="SELECT * FROM fact WHERE id_etab='0'";
$rep=$bdda->query($v);
$tid=0;
while($d=$rep->fetch()){
$anyea=$d['an'];
if($anyea==$_SESSION['anelev']){
 $tid++;
}
} 
$rep->closeCursor(); 
$long=strlen($tid);
$part1=part1($long,$tid);
$part2=part2($_SESSION['anelev'],$_SESSION['niveauelev']);
$part3=part3($_SESSION['anelev']);
$nb=$part1.$part2.$part3;

}



      
 $req = $bdda->prepare('INSERT INTO eleve(matelev,nomelev, preelev, datelev, niveauelev,niveau,anelev,sexelev,id_etab,statut,telev,cout,total,reste,date,heure) VALUES(?,?,?,?,?,?,?,?,?,?, ?,?,?, ?, ?, ?)'); 
 $req->execute(array($nb,$_SESSION['nomelev'],$_SESSION['preelev'],$_SESSION['datelev'],$_SESSION['niveauelev'],' ',$_SESSION['anelev'],$_SESSION['sexelev'],'0',$stat,$_SESSION['tel'],$cout,$total,$reste,$dte,$heur)); 
   

 $req = $bdda->prepare('INSERT INTO detail(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,statut,frais,montant,date,heure,idempl) VALUES(?,?,?,?,?,?,?,?,?,?, ?,?,?, ?)'); 
 $req->execute(array($nb,$_SESSION['nomelev'],$_SESSION['preelev'],$_SESSION['datelev'],$_SESSION['niveauelev'],$_SESSION['anelev'],$_SESSION['sexelev'],'0',$stat,$fraisd,$total,$dte,$heur,$_SESSION['id'])); 
 
 echo"<br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
 <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
  
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>
 
  <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_SESSION['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_SESSION['mtnt']." fcfa  </H2></br></td></tr>
  
  <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_SESSION['nomelev']." </br>".$_SESSION['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$nb." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($bdda,$_SESSION['niveauelev'] ,$_SESSION['anelev'])." </H2></td></tr>
  
  <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
  
  <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
  
 
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
           
                                      
  
                                                     
                               
 
  <br> Aucun remboursement ni transfert n'est possible !
 </center><br><br> <center> </center> ";
 

echo"<center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
<tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
 
 <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  D'INSCRIPTION</U></H2></td><td nowrap> </H2></td></tr>

 <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$_SESSION['anelev']."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_SESSION['mtnt']." fcfa  </H2></br></td></tr>
 
 <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$_SESSION['nomelev']." </br>".$_SESSION['preelev']."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$nb." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".$_SESSION['niveauelev']." </H2></td></tr>
 
 <tr> <TD nowrap> <H3>Frais divers:</H3><H2> ".$fraisd." fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Avance scolarité:</H3><H2> ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
 
 <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
 

 <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
          
                                     
 
                                                      
                                

 <br> Aucun remboursement ni transfert n'est possible ! 
 </center> ";

 /*

 echo"  <center><img src='AGAES3.png' height='15%' width='85%' >
 <TABLE height='250px' width='90' border='0'> 
 
 
 <tr> <center> <b><U><h1>RECU  D'INSCRIPTION / SCHOOL FEES RECEIPT</h1></U></b> <br><br> </center></tr>

 <tr>  <TD nowrap> <H2><b>Année scolaire / School year :</b></H2> <H1><b> ".$_SESSION['anelev']." &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  </b></H1> </td> <td nowrap> </td><td nowrap><H2><b>B.P.F :</b></H2> <H1><b> ".$_SESSION['mtnt']." fcfa  </b></H1><br><br></td> </tr>
 
 <tr> <TD nowrap> <H2>  Noms / Names of pupil :</b></H2> <H1><b> ".$_SESSION['nomelev']." ".$_SESSION['preelev']."             &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp    </b></H1><br><br> </td><td nowrap> <H2>  Matricule / Matricule: </b></H2> <H1><b>".$nb."</H1><br><br> </td><td nowrap><H2><b>Classe / Class : </b></H2> <H1><b> ".$_SESSION['niveauelev']." </b></H1><br><br> </td></tr>
 
 <tr> <TD nowrap> <H2>Frais divers / Other fees :</b></H2> <H1><b> ".$fraisd." fcfa    </b></H1><br><br> </td><td nowrap> <H2>Avance scolarité / Amount paid :</b></H2> <H1><b>  ".$total." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp         </b></H1><br><br> </td><td nowrap> <H2>Cout de la scolarite / School fees :</b></H2> <H1><b>  ".$cout." fcfa </b></H1><br><br> </td></tr>
 
 <tr><td nowrap><H2><b> Statut / Status :</b></H2> <H1><b> ".$stat." </b></H1> <br><br> </td> <TD nowrap> <H2> Reste scolarité / Balance : </b></H2> <H1><b>  ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</b></H1><br><br> </td><td nowrap> <H2>Date / Date of payement :</b></H2> <H1><b> ".$xd."    ".$heur." </b></H1><br><br> </td></tr>                                                
 

 <tr> <TD nowrap> <H2>SIGNATURE PARENT</H2 ></td><td nowrap>   </td>
 <td nowrap><H2><b>POUR LE SERVICE DE LA SCOLARITE :  <br>  ". $_SESSION['nom']." <b></H2 > </td></tr></table>                                                               
          
                                     
 
                                                      
                                

 <br><br><br><font size='6pt'>N.B : Bien vouloir apporter ce reçu au prochain paiement  / Aucun remboursement ni transfert n'est possible !</font> 
</center><br><br> <center> </center><br><br>";

 */
 



 // Redirection du visiteur vers la page du minichat 
  } 
  else {
   echo "Votre montant est inférieur aux frais divers !";
   } 
 
   
 
 
 
 ?>