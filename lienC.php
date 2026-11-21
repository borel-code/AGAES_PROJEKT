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
function host(){
    
  $host='mysql:host=localhost;dbname=u356752624_agaes'; 
    return $host; 
}
 
function UTIL(){
  
    $UTIL='u356752624_agaes';
    return $UTIL;
}
function mtp(){
 
    $mtp='SV6PduF7v8UDq5S';
    return $mtp;
}

function hosts(){
    
    $host='mysql:host=127.0.0.1'; 
    return $host; 
}
 
function UTILs(){
  
    $UTIL='borelkammogne@gmail.com';
    return $UTIL;
}
function mtps(){
 
    $mtp='Agaes2024';
    return $mtp;
}

*/
 

?>