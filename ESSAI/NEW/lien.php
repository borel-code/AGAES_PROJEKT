<?php

try 
{
$bdda = new PDO('mysql:host=localhost;dbname=school','root','');  
} 
catch(Exception $e) 
{       
die('Erreur : '.$e->getMessage());
}

/*
              function host(){
    
    $host='mysql:host=localhost;dbname=u356752624_base2'; 
    return $host; 
}
 
function UTIL(){
  
    $UTIL='u356752624_base2';
    return $UTIL;
}
function mtp(){
 
    $mtp='SV6PduF7v8UDq5S';
    return $mtp;
}
*/
?>