<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
   
 

  $v="SELECT *  FROM eleve WHERE anelev= '2021/2022'";
  $reponse = $bdda->query($v);
     
   while ($donnees = $reponse->fetch())
   {
      $nom= $donnees['nomelev'];  $pnom= $donnees['preelev'];
      $mat= $donnees['matelev'];
      $r="UPDATE eleve SET matelev='".$mat."' WHERE nomelev='".$nom."' AND preelev='".$pnom."' 
      AND anelev= '2022/2023' AND statut= 'A' ";
      $req=$bdda->query($r);
      $r="UPDATE detail SET matelev='".$mat."' WHERE nomelev='".$nom."' AND preelev='".$pnom."' 
      AND anelev= '2022/2023' AND statut= 'A' ";
      $req=$bdda->query($r);
	}
   $reponse->closeCursor();







 










 ?>