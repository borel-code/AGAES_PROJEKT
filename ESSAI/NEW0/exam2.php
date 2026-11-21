<?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php'; 
require '../lesmenushoriz.php'; 
$mat=$_POST['mat'];
  
 $an=$_POST['an'];
  $mtnt=$_POST['mtnt'];
 $date=date('Y-m-d');
 $heur=date('H:i');
 function format($date){
  $a=substr($date,0,4);
   
  $m=substr($date,5,2);
   
  $j=substr($date,8,2);
   
  $dat=$j."/".$m."/".$a;
  return $dat;
}
$xd=format($date);

 $v="SELECT * FROM eleve WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
 $rep=$bdda->query($v);
 while($don=$rep->fetch()){
 $nom=$don['nomelev'];
 $pre=$don['preelev'];
 $clas=$don['niveauelev'];
 $datelev=$don['datelev'];
 $sex=$don['sexelev'];
 $stat=$don['statut'];
  
if($_POST['mtnt'] >0){ 
 $req = $bdda->prepare('INSERT INTO exam(matelev,nomelev, preelev, datelev, niveauelev,anelev,sexelev,id_etab,telev,montant,date,heure,idempl) VALUES(?,?,?,?,?,?, ?,?,?, ?,?,?, ?)'); 
 $req->execute(array($mat,$nom,$pre,$datelev,$clas,$an,$sex,'0',' ',$mtnt,$date,$heur,$_SESSION['id'])); 
  
}
}  
 
$rep->closeCursor();

header('location:exam1.php');

?>