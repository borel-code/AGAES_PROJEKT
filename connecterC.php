<?php
 
require 'lienC.php'; 



 




function verifconnect($user,$mot){

  
	$v="SELECT * FROM employe WHERE bloq='0'";
	 $reponse = $bdda->query($v);
	 $true=0;
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['nomutil']==$user AND $donnees['mtp']==$mot){ 
		 $true=$donnees['idempl']; 
		  
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }
  
   ?>
 