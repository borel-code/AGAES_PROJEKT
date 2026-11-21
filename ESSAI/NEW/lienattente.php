function host(){
    
    $host='mysql:host=localhost;dbname=college1test'; 
    return $host; 
}
 
function UTIL(){
  
    $UTIL='root';
    return $UTIL;
}
function mtp(){
 
    $mtp='';
    return $mtp;
}

'mysql:host=localhost;dbname=college1test','root',''


function host(){
     $host='mysql:host=91.216.107.184;dbname=educa1739783';
     
    
    return $host; 
}
 
function UTIL(){
    $UTIL='educa1739783';
  
    return $UTIL;
}
function mtp(){
    $mtp=''b2ivm0psyx'; 
  
    return $mtp;
}




 
function idt($user,$mot,$an){
	
	$v="SELECT * FROM admin WHERE id_etab='0' AND code ='4' AND anens ='".$an."'";
	$reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch())
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		 return 1; 
		}
	} 
	$reponse->closeCursor(); 
   }


   function nomC($bdda,$user,$mot,$an){
	
	$v="SELECT * FROM admin WHERE id_etab='0' AND code ='4' AND anens ='".$an."'";
	$reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch())
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		  $genre= $donnees['genre'];
		  if($genre=='M'){
			  $nom= 'M . '.$donnees['nom'];
		  }
		  if($genre=='F'){
			$nom= 'Mme '.$donnees['nom'];
		}
		}
	} 
	$reponse->closeCursor(); 
	return $nom;
   }
 
   function codeC($user,$mot,$an){
	
	$v="SELECT * FROM admin WHERE id_etab='0' AND code ='4' AND anens ='".$an."'";
	$reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch())
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		  $code= $donnees['code'];
		   
		}
	} 
	$reponse->closeCursor(); 
	return $code;
   }


   function idC($user,$mot,$an){

	$v="SELECT * FROM admin WHERE id_etab='0' AND code ='4' AND anens ='".$an."'";
	$reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch())
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		  $id= $donnees['id'];
		   
		}
	} 
	$reponse->closeCursor(); 
	return $id;
   }


