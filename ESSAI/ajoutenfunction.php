<?php

 function nomens($bdda,$cni,$an){
 
 // Insertion du message à l'aide d'une requête préparée 
  $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
  $reponse = $bdda->query($v);
    $t=0; 
   while ($donnees = $reponse->fetch())
   {
     
       if($donnees['cni']==$cni ){ 
         $genr=$donnees['genre'];

      if($genr=='M') {
         $nom='M. '.$donnees['nomens'].'  '.$donnees['prenomens']  ;
             }
               else {
         $nom='Mme. '.$donnees['nomens'].' '.$donnees['prenomens'] ;
             } 
             

       }
    }
   $reponse->closeCursor();
   return $nom;
 } 
 ?>