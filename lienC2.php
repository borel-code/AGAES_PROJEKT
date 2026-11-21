<?php

try 
{
 $bddt = new PDO('mysql:host=localhost;dbname=agaesbd','root','');  
 } 
 catch(Exception $e) 
 {       
 die('Erreur : '.$e->getMessage());
 }

  
/*
function hostc2(){
    
     
    $host='mysql:host=localhost;dbname=u356752624_agaes'; 
    return $host; 
}
 
function UTILc2(){
  
    $UTIL='u356752624_agaes';
    return $UTIL;
}
function mtpc2(){
 
    $mtp='SV6PduF7v8UDq5S';
    return $mtp;
}
*/

 

?>