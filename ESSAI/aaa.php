<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php';  
 economatcollege();
      /*
	$a='kam';
	//$v="SELECT *  FROM eleve WHERE  nomelev LIKE'%TZ%' OR preelev LIKE'%el%' "; recherche les chaines de caractere
	//$v="SELECT  SUM(montant)  AS n FROM detail WHERE matelev='2' "; $donnees['n'];
    $v="SELECT * FROM eleve WHERE  nomelev LIKE'%tchind%'   ORDER BY anelev DESC ";  
    $reponse = $bdda->query($v);
  // $nbretablissement=nbretablissement($bdda);
  while ($donnees = $reponse->fetch() )
  {  $nb=$donnees['nomelev']." ".$donnees['preelev']." ".$donnees['niveauelev']." ".$donnees['anelev']."</br>";
	 
	echo  $nb;
	 
  } 
  $reponse->closeCursor();
  */
?>