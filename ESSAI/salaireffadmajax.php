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
    <H4><B>Paiement du salaire de ".nomC($bdda,$q)." sur l'année scolaire ".$_SESSION['annee']."</B></H4> 
     
</div></br></br>";
    echo "     
      <form action='salairetraitadm.php' method='POST'> 
      <div style='display:none';>
    idens<input name='idens' value='".$q."'  class='form-control'>
     </div> 
    <div class='card-body table-responsive p-0' style='height: 300px;''>  
    <table border='3'  class='table table-head-fixed text-nowrap table-hover'> 
 <thead>              
    <tr bgcolor='#70DBDB'><td><B>Periodes</Br>Avance</B></td>
     
    <td><B>Montant total</Br> à payer  </B></td>
    <td><B>Montant total</Br> déjà payé  </B></td>
    <td><B>Reste</B></td>
     
     </tr></thead> ";
     $i=1;$to=0;$RESTE=0;$PAYET=0;$PAYETDJ=0;
     while($i<11){
         $exist=existlohnadmin($q,$i,$_SESSION['annee']);
         if($exist==0){
            $totalapay=0+salaireeladmin($q,$_SESSION['annee']);
         }
         if($exist==1){
            $totalapay=0+lohnbrutadmin($q,$i,$_SESSION['annee']);
         }
        
        
        $total=$totalapay;
        $recu=lohnadminrecept($q,$i,$_SESSION['annee']);
        $reste=$total-$recu;
        $RESTE+=$reste;
        $PAYET+=$total;
        $PAYETDJ+=$recu;
        $champ='champ'.$to;
        $idmois="mois".$to;
        $topay="total".$to;
        $todjpay="totaldj".$to;
        $affiche=periode($i)." 
        Montant total à payer : ".$totalapay." ".nomdevise($bdda,1)." 
        Montant déjà reçu : ".$recu." ".nomdevise($bdda,1)." 
        Reste : ".$reste."  ".nomdevise($bdda,1);
echo "<tr><td title='".$affiche."'><B>".periode($i)."
</Br>
    <input name='".$champ."'  class='form-control'>
    <div style='display:none';>
    mois<input name='".$idmois."' value='".$i."'  class='form-control'>
 
    totaldj<input name='".$todjpay."' value='".$recu."'  class='form-control'>
    </div>
    </B></td>
    
    <td title='Montant total à payer pour ".periode($i)."'><B><input name='".$topay."' value='".$totalapay."'  class='form-control'>".nomdevise($bdda,1)."</B></td>
    <td title='Montant déjà reçu pour ".periode($i)."'><B>".$recu." ".nomdevise($bdda,1)."</B></td>
    <td title='Reste pour ".periode($i)."'><B>".$reste." ".nomdevise($bdda,1)."</B></td>
    ";

 
  
        
         
    
echo "</tr>";
 



 $i++;$to++;

}
$RESTE+=$reste;
        $PAYET+=$total;
        $PAYETDJ+=$recu;
 echo"  </table></div>
 Total du salaire : ".$PAYET." ".nomdevise($bdda,1)."<Br>
 Total du salaire déjà payé: ".$PAYETDJ." ".nomdevise($bdda,1)."<Br>
 Reste total à payer : ".$RESTE." ".nomdevise($bdda,1)."
 <Br><Br>
 <button type='submit' name='engpointsalad' value='".$to."' class='btn btn-primary' name='enregpoint' style='width: 100%; height: 4%;' class='btn btn-default' data-toggle='modal' data-target='# '>
 Enregistrer</button></form></form>";
 }
}
?>