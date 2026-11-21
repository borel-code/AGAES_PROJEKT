<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
 require 'salaireoutil.php'; require 'pointagefonction.php';
 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5) ){ 
  ?>
   
  
 
<?php
 echo "<html>
 <head><meta charset='utf-8'></head>";


 $q=$_GET["q"];
if($q!=0){ 
    echo "<div class='row'>
    <H4><B>Synthèse des paiements de ".namensgrade($bdda,$q)." sur l'année scolaire ".$_SESSION['annee']."</B></H4> 
     
</div></br></br>";
$isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
if($isMob){    
  echo "<div class='card-body table-responsive p-0' style='height: 300px;''>";
 }
    echo "     
        
    <table class='table table-bordered table-hover'> 
    <thead>              
    <tr bgcolor='#70DBDB'><td><B>Periodes</B></td>
    <td><B>Total des heures</B></td>
    <td><B>Montant total</B></td>
    <td><B>Montant déjà payé</B></td>
    <td><B>Reste</B></td>
    <td><B>Montant partiel</B></td>
    <td><B>Date d'enregistrement</B></td>
    <td><B>responsable de l'enregistrement</B></td>
    <td><B>Date dernière modification</B></td>
    <td><B>responsable de la dernière modification</B></td>
     </tr></thead> ";
     $i=1;
     while($i<11){
 $fixe=verisalfixe($q,$i,$_SESSION['annee']);
   if($fixe==0){
     $totalapay=lohnpermonatlehr($q,$i,$_SESSION['annee']);
    }
     else{
      $totalapay=lohnfixelehr($q,$i,$_SESSION['annee']);   
    }     
    $reste=$totalapay-lohnohnelehr($q,$i,$_SESSION['annee']); 
$nbligne=totalignesal($q,$i,$_SESSION['annee']);
if($nbligne>0){
echo "<tr><td rowspan='".$nbligne."'><B>".periode($i)."</B></td>
<td rowspan='".$nbligne."'><B>".totaluhrperiod($q,$i,$_SESSION['annee'])."</B></td>
<td rowspan='".$nbligne."'><B>".$totalapay." ".nomdevise($bdda,1)."</B></td>
<td rowspan='".$nbligne."'><B>".lohnohnelehr($q,$i,$_SESSION['annee'])." ".nomdevise($bdda,1)."</B></td>
<td rowspan='".$nbligne."'><B>".$reste." ".nomdevise($bdda,1)."</B></td>";

if($nbligne>0){
$v="SELECT * FROM salaire WHERE an='".$_SESSION['annee']."' AND idens='".$q."' ORDER BY datep DESC";
$reponse = $bdda->query($v);
 
while ($donnees = $reponse->fetch() )
{$o=0;
    $idpe=$donnees['idpe'];
  $nomperio=periode($idpe) ;
  $montant=$donnees['montant']+$o;
  $datep=$donnees['datep'];
  $heureng=$donnees['heurenreg'];
  $idresp=$donnees['idempl'];
  $idrespmodif=$donnees['idemplmodif'];
  $datemodif=$donnees['datemodif'];
  $taux=$donnees['taux'];
    if($donnees['idpe']==$i){
        
        echo "<td><B>".$montant." ".nomdevise($bdda,1)."</B></td>
        <td><B>".format($datep)." ".$heureng."</B></td>
        <td><B>".nomC($bdda,$idresp)."</B></td>
        <td><B>".format($datemodif)."</B></td>
        <td><B>".nomC($bdda,$idrespmodif)."</B></td></tr><tr>";
    }
 }
$reponse->closeCursor();
echo "</tr>";
}
else{
    echo "<td><B></B></td><td><B></B></td>
        <td><B></B></td><td><B></B></td>
        <td><B></B></td>";
        echo "</tr>";
}
} //


 $i++;

}
 echo"  </table>";
 if($isMob){ 
  echo "</div>";
 }
 }
}
?>