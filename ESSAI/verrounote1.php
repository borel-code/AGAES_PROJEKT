<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 
  

 

if(isset($_POST['send1'])){
$act=$_POST['send1'];
$evall=1;
}
if(isset($_POST['send2'])){
    $act=$_POST['send2'];
    $evall=2;
}
if(isset($_POST['send3'])){
    $act=$_POST['send3'];
    $evall=3;
}

 $ane=$_SESSION['annee'];  
 
 function verif($bdda,$an,$eval){
 

  $v="SELECT *  FROM delai WHERE id_etab='0' AND an= '".$an."'";
  $reponse = $bdda->query($v);
     $t=0;
   while ($donnees = $reponse->fetch() AND $t==0)
   {
     if($donnees['eval']==$eval) {
      $t= 1;
	}
	}
   $reponse->closeCursor();
 return $t;
 
 } 
 
 $verifier=verif($bdda,$ane,$evall);
echo $evall." ".$verifier ;
 
  if($verifier==1) {
     
 $r="UPDATE delai SET verrou ='".$act."' WHERE id_etab='0' AND eval= '".$evall."' AND an= '".$ane."'";
 $req=$bdda->query($r); 
  
	}
	else{
       $req = $bdda->prepare('INSERT INTO delai(id_etab,an, eval, verrou) VALUES(?,?,?,?)'); 
 $req->execute(array('0',$ane,$evall,$act)); 
 
 }
}
 header('location:verrounote.php');
?>