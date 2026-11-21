
<?php


$v="SELECT *  FROM detail";
 $reponse = $bdd->query($v);
  while ($donnees = $reponse->fetch())
   {
  echo  $donnees['montant'] ;
    
  }
  $reponse->closeCursor();


echo 'oui';
echo date('H:i') ;
// 213.130.145.226

 ?>