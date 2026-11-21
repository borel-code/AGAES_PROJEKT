<?php
 
require 'lien.php';
 

//initial de l'etablissement


function initialEtab($bdda){
    

     $true=0;$migrer=" ";
     $v="SELECT * FROM lien  WHERE  ici ='0' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $migrer= $donnees['initial'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $migrer;
}

function nbretablissement($bdda){
    

      $nbre=0;
     $v="SELECT * FROM lien  ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() )
        {
            if($donnees['actif']==0 AND $donnees['ici']==1){ 
                $nbre++;
               
            
            }
        } 
        $reponse->closeCursor(); 
        return $nbre;
}


function initialEtabext($bdda){
    

     $true=0;$migrer=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $migrer= $donnees['initial'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $migrer;
}



 



 


function format2($xdat){
	$xj=substr($xdat,0,2);
$xm=substr($xdat,3,2);
$xa=substr($xdat,6,4);
$xdate=$xa."-".$xm."-".$xj;
return $xdate;
}

function idamin($bdda,$user,$mot){

 $true=0;
 $v="SELECT * FROM admin  WHERE   sup ='0'";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		  $true=$donnees['id'];
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }

   function idaminweb($bdda,$user,$mot){

 $true=0;
 $v="SELECT * FROM admin  WHERE   sup ='0' AND intrus='1'";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
		  $true=$donnees['id'];
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }

   


   function intrus_admin($bdda,$id){

 $true=0;
 $v="SELECT * FROM admin  WHERE   sup ='0' ";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['intrus']==1 AND $donnees['id']==$id AND $donnees['verrou']=='0'){ 
		  $true=1;
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }






   function postemaxadmin($bdda,$id,$an){

 $true=0;
 $v="SELECT * FROM admin_poste  WHERE sup ='0' ORDER BY idposte";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['idadmin']==$id AND $donnees['anens']==$an){ 
		  $true=$donnees['idposte'];
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }
 
   function  adminexistposte($bdda,$id,$an,$idposte){

 $true=0;
 $v="SELECT * FROM admin_poste  WHERE sup ='0' ORDER BY idposte";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['idadmin']==$id AND $donnees['anens']==$an
		AND $donnees['idposte']==$idposte){ 
		  $true=1;
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }

   function  cochposte($bdda,$id,$an,$idposte){

 $true=0;$d=" ";
 $v="SELECT * FROM admin_poste  WHERE sup ='0' ORDER BY idposte";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['idadmin']==$id AND $donnees['anens']==$an
		AND $donnees['idposte']==$idposte){ 
		  $true=1;$d= "checked";
		}
	} 
	$reponse->closeCursor(); 
	return $d;
   }




   function genre_admin($bdda,$id){

 $true=0;$genre=" ";
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
		  $genre= $donnees['genre'];
		   
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $genre;
   }

   function migrer_admin($bdda,$id){

 $true=0;$migrer=0;
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
			$migrer= $donnees['migrer'];
		   
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $migrer;
   }

   function cni_admin($bdda,$id){

 $true=0;$migrer=" ";
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
			$migrer= $donnees['cni'];
		   
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $migrer;
   }



   function tel_admin($bdda,$id){

 $true=0;$migrer=" ";
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
			$migrer= $donnees['numtel'];
		   
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $migrer;
   }





   function nomC($bdda,$id){

 $true=0;$nom=" ";
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
		  $genre= $donnees['genre'];
		  if($genre=='M'){
			  $nom= 'M . '.$donnees['nom'];
		  }
		  if($genre=='F'){
			$nom= 'Mme '.$donnees['nom'];
		}
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $nom;
   }
 
   function nomsimple($bdda,$id){

 $true=0;$nom=" ";
 $v="SELECT * FROM admin  WHERE  verrou ='0' AND sup ='0'";
	 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id  ){ 
		 
			$nom= $donnees['nom'];
		 
		$true=1	;
		}
	} 
	$reponse->closeCursor(); 
	return $nom;
   }
    
function nom_poste($idposte,$genre){
	
	$poste=" ";
	if($idposte==1 AND $genre=="F" ){
		$poste="Fondatrice";
	}
	if($idposte==1 AND $genre=="M" ){
		$poste="Fondateur";
	}
	if($idposte==2 AND $genre=="F" ){
		$poste="Principale";
	}
	if($idposte==2 AND $genre=="M" ){
		$poste="Principal";
	}
	if($idposte==3 AND $genre=="F" ){
		$poste="Censeure";
	}
	if($idposte==3 AND $genre=="M" ){
		$poste="Censeur";
	}
	if($idposte==4   ){
		$poste="Econome";
	}
	if($idposte==5 AND $genre=="F" ){
		$poste="Surveillante générale";
	}
	if($idposte==5 AND $genre=="M" ){
		$poste="Surveillant  général ";
	}
	if($idposte==6 AND $genre=="F" ){
		$poste="Surveillante de secteur";
	}
	if($idposte==6 AND $genre=="M" ){
		$poste="Surveillant de secteur";
	}
	if($idposte==7){
		$poste="Sécretaire";
	}
        if($idposte==50){
		$poste="Webmaster";
	}
	return $poste;
} 


function  toutposte($bdda,$id,$an,$genre){

 $true=0;$d=" ";
 $v="SELECT * FROM admin_poste  WHERE sup ='0' ORDER BY idposte";
 $reponse = $bdda->query($v);
	while ($donnees = $reponse->fetch() )
	{
		if($donnees['idadmin']==$id AND $donnees['anens']==$an
		 ){ 
		  $true=1;$d=$d." ,".nom_poste($donnees['idposte'],$genre);
		}
	} 
	$reponse->closeCursor(); 
	return $d;
   }

   


  

//LLLLLLLLLLLhr

function idtl($bdda,$mot,$an){

   $v="SELECT * FROM enseignant WHERE  supp ='0'";
	 
	$reponse = $bdda->query($v);
	$true=0;
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['mtpasse']==$mot){ 
		 $true=$donnees['id']; 
		}
	} 
	$reponse->closeCursor(); 
	return $true;
   }


   function cniENSG($bdda,$id){

   $v="SELECT * FROM enseignant WHERE  supp ='0'";
	 
	$reponse = $bdda->query($v);
	$true=0;$cni=" "; 
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['id']==$id){ 
			$cni=$donnees['cni']; 
		 $true=1; 
		}
	} 
	$reponse->closeCursor(); 
	return $cni;
   }
 




//

//LIEN SMS
function urlsms($bdda){

   $v="SELECT * FROM liensms ";
	 
	$reponse = $bdda->query($v);
	$true=0;$url=" "; 
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['actif']==1){ 
			$url=$donnees['url']; 
		 $true=1; 
		}
	} 
	$reponse->closeCursor(); 
	return $url;
   }

   function mtpsms($bdda){

   $v="SELECT * FROM liensms ";
	 
	$reponse = $bdda->query($v);
	$true=0;$url=" "; 
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['actif']==1){ 
			$url=$donnees['mtp']; 
		 $true=1; 
		}
	} 
	$reponse->closeCursor(); 
	return $url;
   }

   function usersms($bdda){

   $v="SELECT * FROM liensms ";
	 
	$reponse = $bdda->query($v);
	$true=0;$url=" "; 
	while ($donnees = $reponse->fetch() AND $true==0)
	{
		if($donnees['actif']==1){ 
			$url=$donnees['user']; 
		 $true=1; 
		}
	} 
	$reponse->closeCursor(); 
	return $url;
   }

   ?>
 