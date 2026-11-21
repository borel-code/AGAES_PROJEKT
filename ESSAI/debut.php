<?php
 
 
function verifconnect($bdda,$mot){
	 
  
	$v="SELECT matelev FROM eleve ";
	 $reponse = $bdda->query($v);
	 $true=0;
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['matelev']==$mot){ 
		 $true=1; 
		  
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }


   function namecomp($bdda,$mot){
	 
  
	$v="SELECT matelev,nomelev,preelev FROM eleve ";
	 $reponse = $bdda->query($v);
	 $true=0;
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['matelev']==$mot){ 
		 $true=$donnees['nomelev']." ".$donnees['preelev']; 
		  
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }

   ?>