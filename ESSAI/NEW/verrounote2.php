<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 
  


  if(isset($_GET['etat'])){
$act=$_GET['etat'];
$evall=$_GET['trim'];
$r="UPDATE delai SET verrou ='".$act."' WHERE id_etab='0' AND eval= '".$_SESSION['trimremplir']."' AND an= '".$_SESSION['anremplir']."'";
 $req=$bdda->query($r); 
}
 header('location:markinsert2.php');
}
?>