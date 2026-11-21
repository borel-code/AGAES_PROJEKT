<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php'; 
require '../lesmenushoriz.php'; 
 

    $v="SELECT *  FROM classe WHERE  sup='0'";
    $reponse = $bdda->query($v);
    $true=0;
    while ($donnees = $reponse->fetch() AND $true==0)
    {
     $code=$donnees['code'] ;
     $an=$donnees['anens'] ; $id=$donnees['id'] ; 
     if($an=='2021/2022' OR $an=='2020/2021'){
        $r="UPDATE schuler SET niveauelev ='".$id."'  WHERE  niveauelev='".$code."' AND anelev= '".$an."'";
        $req=$bdda->query($r);
        $r="UPDATE schulerdetail SET niveauelev ='".$id."'  WHERE  niveauelev='".$code."' AND anelev= '".$an."'";
        $req=$bdda->query($r);
     }
     } 
    $reponse->closeCursor(); 


?>