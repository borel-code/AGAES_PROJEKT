<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';
   echo'<meta charset="utf-8" />';
 
   $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
   if($trueadmin!=0 
   AND ($_SESSION['code']==50 OR $_SESSION['code']==1
   OR $_SESSION['code']==2 OR $_SESSION['code']==4 OR $_SESSION['code']==7) ){ 
     

$an=$_POST['ann'];
  
 $qte=$_POST['mot']; 
 $total=$_POST['user'];
 $descr=$_POST['mat'];
 $desti=$_POST['nom'];

  $dat=date('Y-m-d');
 echo $total;

     if(!empty($total)) { 
    $req = $bdda->prepare('INSERT INTO sortie(descr,qte,total,id_etab,an,idempl,date,desti) VALUES(?,?,?, ?,?,?, ?, ? )'); 
 $req->execute(array($descr,$qte,$total,'0',$an,$_SESSION['id'],$dat,$desti)); 
		header('location:sorteff.php');  
     }
    }
   ?>