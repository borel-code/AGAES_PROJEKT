<?php session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';
?>
<HTML><HEAD><link rel="stylesheet" type="text/css" href="" media="all" />
<meta charset='utf-8'><TITLE>payer3</TITLE></HEAD>
<BODY > 
<?php 
 
if(isset($_POST['vermitteln'])){
 
function grenzensms($paye,$mtantinscrip,$mtanttr1,$mtanttr2,$mtanttr3,$cout){
  $xa=-1;
  
    if($paye>=$mtantinscrip AND $paye<$mtanttr1) {
      $xa=0; //inscription achev�e 
    }
    if($paye>=$mtanttr1 AND $paye<$mtanttr2) {
      $xa=1; //tranche 1 achev�e 
    }
    if($paye>=$mtanttr2 AND $paye<$mtanttr3) {
      $xa=2; //tranche 2 achev�e 
    } 
    if($paye>=$mtanttr3 AND $paye<$cout) {
      $xa=3; //tranche 3 achev�e 
    }  
    if($paye==$cout) {
      $xa= 4; //scolar achev�e 
    }  
    
    return $xa;    
}

 $mat=$_POST['mat'];
 $remise=$_POST['remise'];
 $an=$_POST['an'];
  $mtnt=$_POST['mtnt'];
 $date=date('Y-m-d');
 $heur=date('H:i');
 function format($date){
    $a=substr($date,0,4);
     
    $m=substr($date,5,2);
     
    $j=substr($date,8,2);
     
    $dat=$j."/".$m."/".$a;
    return $dat;
  }
  $xd=format($date);  
  
 $v="SELECT * FROM eleve WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $rep=$bdda->query($v);
 while($don=$rep->fetch()){
 $nom=$don['nomelev'];
 $pre=$don['preelev'];
 $clas=$don['niveauelev'];
 $datelev=$don['datelev'];
 $sex=$don['sexelev'];
 $stat=$don['statut'];
 $reste=$don['cout']-$don['total']-$mtnt;
 $res=$don['reste'];
 $totalver=$don['total']+$mtnt;
 $idnational=$don['idnational'];

 if ($reste >= 0){
 $r="UPDATE eleve SET total = total+".$mtnt."  WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $req=$bdda->query($r);
 $r="UPDATE eleve SET reste = cout-total  WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $req=$bdda->query($r);
 $r="UPDATE eleve SET date = '".$date."' WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $req=$bdda->query($r);
 $r="UPDATE eleve SET heure = '".$heur."' WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $req=$bdda->query($r); 

 $cout=$don['cout'];
 
 $req = $bdda->prepare('INSERT INTO detail(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,statut,frais,remise,montant,date,heure,idempl,typerem) VALUES(?,?,?,?,?,?,?,?,?, ?,?,?, ?,?,?, ?)'); 
 $req->execute(array($mat,$nom,$pre,$datelev,$clas,$an,$sex,'0',$stat,' ',$remise,$mtnt,$date,$heur,$_SESSION['id'],$_POST['genre'])); 
 
  
 
 
 
 
 
 
 echo" <br><br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
 <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
  
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  DE REGLEMENT DE LA SCOLARITE</U></H2></td><td nowrap> </H2></td></tr>
 
  <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$an."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
  
  <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$nom." </br>".$pre."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$idnational." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($bdda,$clas,$an)." </H2></td></tr>
  
  <tr> <TD nowrap> <H3>Frais divers:</H3><H2> 0 fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Montant déjà versé :</H3><H2> ".$totalver." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
  
  <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
  
 
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
                     
                                                                          
  
                                                                                                           
                                 
 
  <br> Aucun remboursement ni transfert n'est possible !
 </center><br><br><br><br><br> <br><br><br> <center> </center> ";
 
/*
echo"<br><br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='AGAES3.png' height='145px' width='1000px' ></center></tr>
<tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
 
 <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  DE REGLEMENT DE LA SCOLARITE</U></H2></td><td nowrap> </H2></td></tr>

 <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$an."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
 
   <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$nom." </br>".$pre."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$idnational." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($bdda,$clas,$an)." </H2></td></tr>
 
 <tr> <TD nowrap> <H3>Frais divers:</H3><H2>  0 fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Montant déjà versé:</H3><H2> ".$totalver." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité: </H3><H2>".$cout." fcfa </H2></td></tr>
 
 <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
 

 <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
                    
                                                                         
 
                                                                                                          
															  

 <br> Aucun remboursement ni transfert n'est possible ! 
 </center> ";
 




 echo"  <center><img src='AGAES3.png' height='15%' width='85%' >
 <TABLE height='250px' width='90' border='0'> 
 
 
 <tr> <center> <b><U><h1>RECU DE REGLEMENT DE LA SCOLARITE  / SCHOOL FEES RECEIPT</h1></U></b> <br><br> </center></tr>

 <tr>  <TD nowrap> <H2><b>Ann�e scolaire / School year :</b></H2> <H1><b> ".$an." &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  </b></H1> </td> <td nowrap> </td><td nowrap><H2><b>B.P.F :</b></H2> <H1><b> ".$_POST['mtnt']." fcfa  </b></H1><br><br></td> </tr>
 
  <tr> <TD nowrap> <H2>  Noms / Names of pupil :</b></H2> <H1><b> ".$nom." ".$pre."             &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp    </b></H1><br><br> </td><td nowrap> <H2>  Matricule / Matricule: </b></H2> <H1><b>".$idnational."</H1><br><br> </td><td nowrap><H2><b>Classe / Class : </b></H2> <H1><b> ".classparid($bdda,$clas,$an)." </b></H1><br><br> </td></tr>
 
 <tr> <TD nowrap> <H2>Frais divers / Other fees :</b></H2> <H1><b>  0 fcfa    </b></H1><br><br> </td><td nowrap> <H2>Montant d�j� vers� / Amount already paid :</b></H2> <H1><b>  ".$totalver." fcfa &nbsp &nbsp   &nbsp &nbsp  &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp  &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp         </b></H1><br><br> </td><td nowrap> <H2>Cout de la scolarite / School fees :</b></H2> <H1><b>  ".$cout." fcfa </b></H1><br><br> </td></tr>
 
 <tr><td nowrap><H2><b> Statut / Status :</b></H2> <H1><b> ".$stat." </b></H1> <br><br> </td> <TD nowrap> <H2> Reste scolarit� / Balance : </b></H2> <H1><b>  ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</b></H1><br><br> </td><td nowrap> <H2>Date / Date of payement :</b></H2> <H1><b> ".$xd."    ".$heur." </b></H1><br><br> </td></tr>                                                
 

 <tr> <TD nowrap> <H2>SIGNATURE PARENT</H2 ></td><td nowrap>   </td>
 <td nowrap><H2><b>POUR LE SERVICE DE LA SCOLARITE :  <br>  ". $_SESSION['nom']." <b></H2 > </td></tr></table>                                                               
          
                                     
 
                                                      
                                

 <br><br><br><font size='6pt'>N.B : Bien vouloir apporter ce re�u au prochain paiement  / Aucun remboursement ni transfert n'est possible !</font> 
</center><br><br> <center> </center><br><br>"; 




*/



/*




 echo" <br><br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='RECU2.png' height='145px' width='1000px' ></center></tr>
 <tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
  
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  DE REGLEMENT DE LA SCOLARITE</U></H2></td><td nowrap> </H2></td></tr>
 
  <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$an."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
  
   <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$nom." </br>".$pre."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$idnational." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($bdda,$clas,$an)." </H2></td></tr>
  
  <tr> <TD nowrap> <H3>Frais divers:</H3><H2> 0 fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Montant déjà versé :</H3><H2> ".$totalver." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
  
  <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
  
 
  <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
                     
                                                                          
  
                                                                                                           
                                 
 
  <br> Aucun remboursement ni transfert n'est possible !
 </center><br><br><br><br><br> <br><br><br> <center> </center> ";
 

echo"<br><br><center><TABLE height='120px' width='100' border='1'><tr><td nowrap><TABLE height='120px' width='100'><tr><center><img src='RECU2.png' height='145px' width='1000px' ></center></tr>
<tr><td nowrap><H3>  </H2></td><td nowrap>  <br> </H2></td><td nowrap> </td></tr>
 
 <tr> <TD nowrap> <H2>  </H2></td><td nowrap><H2>                                                 <U>RECU  DE REGLEMENT DE LA SCOLARITE</U></H2></td><td nowrap> </H2></td></tr>

 <tr> <TD nowrap>  <H3>Année scolaire :</H3><H2> ".$an."</H2></br></td><td nowrap> <H2>    &nbsp &nbsp  &nbsp &nbsp &nbsp                                            </H2></br></td><td nowrap><H3>B.P.F :</H3><H2> ".$_POST['mtnt']." fcfa  </H2></br></td></tr>
 
  <tr> <TD nowrap> <H3>  Noms et prénoms de l'élève :</H3><H2> ".$nom." </br>".$pre."   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp           </H2></td><td nowrap> <H2> Matricule : ".$idnational." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td><td nowrap><H3>CLASSE :</H3><H2> ".classparid($bdda,$clas,$an)." </H2></td></tr>
 
 <tr> <TD nowrap> <H3>Frais divers:</H3><H2>  0 fcfa  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp  </H2></td><td nowrap> <H3>Montant déjà versé :</H3><H2> ".$totalver." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Cout de la scolarité : </H3><H2>".$cout." fcfa </H2></td></tr>
 
 <tr><td nowrap><H3> Statut: </H3><H2>".$stat." &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp</H2></td> <TD nowrap> <H3> Reste scolarité:</H3><H2> ".$reste." fcfa &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp </H2></td><td nowrap> <H3>Date du jour : </H3><H2>".$xd."    ".$heur." </H2></td></tr>                                                
 

 <tr> <TD nowrap> <H2>  </H2></td><td nowrap>  </H2></td><td nowrap><H3>POUR LE SERVICE DE LA SCOLARITE :</H3><H2> <br>  ". $_SESSION['nom']." </H2>  </TABLE>   </td></tr></table>                                                               
                    
                                                                         
 
                                                                                                          
															  

 <br> Aucun remboursement ni transfert n'est possible ! 
 </center> ";
 






*/




$mtantinscrip=inscripension($bdda,$clas,$stat,$an);
  $mtanttr1=inscripension($bdda,$clas,$stat,$an)+tranche1pension($bdda,$clas,$stat,$an) ;
  $mtanttr2=inscripension($bdda,$clas,$stat,$an)+tranche1pension($bdda,$clas,$stat,$an)
  +tranche2pension($bdda,$clas,$stat,$an) ;
  $mtanttr3=inscripension($bdda,$clas,$stat,$an)+tranche1pension($bdda,$clas,$stat,$an)
  +tranche2pension($bdda,$clas,$stat,$an)+tranche3pension($bdda,$clas,$stat,$an);
    $cout=vollpension($bdda,$clas,$stat,$an);

$anwortung=grenzensms($totalver,$mtantinscrip,$mtanttr1,$mtanttr2,$mtanttr3,$cout);

if($anwortung>=0){
  $msg="a";
  if($anwortung==0){
   $msg=$nom." ".$pre." vous venez de payer ".$mtnt." fcfa pour la scolarite.Votre inscription est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
  }
  if($anwortung==1){
    $msg=$nom." ".$pre." vous venez de payer ".$mtnt." fcfa pour la scolarite.Votre tranche 1 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==2){
    $msg=$nom." ".$pre." vous venez de payer ".$mtnt." fcfa pour la scolarite.Votre tranche 2 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==3){
    $msg=$nom." ".$pre." vous venez de payer ".$mtnt." fcfa pour la scolarite.Votre tranche 3 est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }
   if($anwortung==4){
    $msg=$nom." ".$pre." vous venez de payer ".$mtnt." fcfa pour la scolarite.Votre scolarite est achevee et le reste de la scolarite est ".$reste." fcfa."  ;
   }

   $toutlesnum=" ";
   $numer=nummer($bdda,$mat);
   $numer=substr($numer,0,9); 
   $debnumer=substr($numer,0,1);
   $numersend="237".$numer; 
   /*
   if(is_numeric($numer)==1 AND $debnumer==6){
     $toutlesnum="237".$numer.",";
     
     if($toutlesnum!=" " AND !empty($toutlesnum) AND $msg!="a"){
      
$toutlesnum=rtrim($toutlesnum,",");
       //DEBUT ENVOI
    
    // 1- constante � ne pas modifier 
    $user = 'hermannfotso0@gmail.com';
    $password = 'nexah2022';
    $url = 'https://smsvas.com/bulk/public/index.php/api/v1/sendsms';

    // 2 - variable � remplir � completer: senderid, sms, mobiles
    $senderid ="AGAES";
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
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $gateway_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        $output = curl_exec($ch);

        if (curl_errno($ch)) {
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

  }  */

}

 







 }

else{
    echo "Vous ne pouvez pas enregistrer ce paiement car la somme vers�e (".$_POST['mtnt']." Fcfa) est superieure au reste de la scolarit�</Br>";
     echo "Il restait ".$res." Fcfa � payer pour ".$nom." ".$pre;
}
 
 }
$rep->closeCursor();


}
 

?>