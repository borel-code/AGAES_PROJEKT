<?php
 


   function TremiseCLASSpourETAT($bdda,$clas,$an){
	 
	$v="SELECT * FROM detail WHERE id_etab='0' AND niveauelev ='".$clas."' AND anelev ='".$an."' AND remise ='OUI'";
	$reponse = $bdda->query($v);
    $ts=0;
	while ($donnees = $reponse->fetch())
	{
		 $ts=$ts+$donnees['montant'] ; 
        	} 
	$reponse->closeCursor(); 
	return $ts;
   }

   function TfraisCLASSpourETAT($bdda,$clas,$an){
	 
	$v="SELECT * FROM detail WHERE id_etab='0' AND niveauelev ='".$clas."' AND anelev ='".$an."' AND frais >'0'";
	$reponse = $bdda->query($v);
    $ts=0;
	while ($donnees = $reponse->fetch())
	{
		 $ts=$ts+$donnees['frais'] ; 
        	} 
	$reponse->closeCursor(); 
	return $ts;
   }


   
   ?>
 