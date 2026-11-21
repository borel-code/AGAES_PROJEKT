<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
require 'calfunction.php';
 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0   ){ 

   


    if(isset($_POST['modif'])){
 
$idposte=$_POST['modif'];
$genre=genre_admin($bdda,$_SESSION['id']); 
$nompost=nom_poste($idposte,$genre);
$_SESSION['code']=$idposte;
$_SESSION['nomfonct']=$nompost;
$_SESSION['modifmode']=1;
  header('location:mode.php');
    } 



 
 



    
      
      
    
    










} 
 
 

   ?>