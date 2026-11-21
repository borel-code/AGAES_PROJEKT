<?php 
function TYPENS($bdda,$clas,$an){

	$v="SELECT id,typeEns  FROM classe ";
	$reponse = $bdda->query($v);
  
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['id']==$clas ){
        return  $donnees['typeEns'];
	  } 
	  
  } 
  $reponse->closeCursor();
     
}

function TYPMATENS($bdda,$matier,$an){

	$v="SELECT *  FROM matiere WHERE  sup='0'";
	$reponse = $bdda->query($v);
  
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['id']==$matier){
        $typ=$donnees['typeEns'];
        return $typ;
         
	  } 
	  
  } 
  $reponse->closeCursor();
     
}

function ABRVTYPENS($c){
      if( $c=="1"){
        return  "GEN";
	  } 
      if( $c=="2"){
        return  "COM";
	  } 
      if( $c=="3"){
        return  "IND";
	  } 
      if( $c=="4"){
        return  "ANGL";
	  } 
         
}



function BelegschaftG($bdda,$type,$sex,$an){

    
     
            $total3=0;
            $v="SELECT *  FROM eleve  WHERE id_etab='0' AND sexelev='".$sex."' AND anelev='".$an."'";
            $reponse = $bdda->query($v);
            while ($donnees = $reponse->fetch())
            {  
                if(TYPENS($bdda,$donnees['niveauelev'],$an)==$type){
                $total3++; 
                 }
            } 
      $reponse->closeCursor();
      return $total3; 
       }


       function BelegschaftA($bdda,$type,$anc,$an){

        
         
                $total3=0;
                $v="SELECT *  FROM eleve  WHERE id_etab='0' AND statut='".$anc."' AND anelev='".$an."'";
                $reponse = $bdda->query($v);
                while ($donnees = $reponse->fetch())
                {  
                    if(TYPENS($bdda,$donnees['niveauelev'],$an)==$type){
                    $total3++; 
                     }
                } 
          $reponse->closeCursor();
          return $total3; 
           }     



           function BelegschaftATS($bdda,$type,$anc,$sex,$an){

            
             
                    $total3=0;
                    $v="SELECT *  FROM eleve  WHERE id_etab='0' AND statut='".$anc."' AND anelev='".$an."' AND sexelev='".$sex."'";
                    $reponse = $bdda->query($v);
                    while ($donnees = $reponse->fetch())
                    {  
                        if(TYPENS($bdda,$donnees['niveauelev'],$an)==$type){
                        $total3++; 
                         }
                    } 
              $reponse->closeCursor();
              return $total3; 
               }     

 // BELEGSCHAFT  KLASSE UND TYPE

 function BelegschaftKLASSE($bdda,$type,$sex,$an,$cls){

  
   
          $total3=0;
          $v="SELECT *  FROM eleve  WHERE id_etab='0' AND sexelev='".$sex."' AND anelev='".$an."' AND niveauelev='".$cls."'";
          $reponse = $bdda->query($v);
          while ($donnees = $reponse->fetch())
          {  
              if(TYPENS($bdda,$donnees['niveauelev'],$an)==$type){
              $total3++; 
               }
          } 
    $reponse->closeCursor();
    return $total3; 
     }


     function BelegschaftKLASSEA($bdda,$type,$anc,$an,$cls){

      
       
              $total3=0;
              $v="SELECT *  FROM eleve  WHERE id_etab='0' AND statut='".$anc."' AND anelev='".$an."' AND niveauelev='".$cls."'";
              $reponse = $bdda->query($v);
              while ($donnees = $reponse->fetch())
              {  
                  if(TYPENS($bdda,$donnees['niveauelev'],$an)==$type){
                  $total3++; 
                   }
              } 
        $reponse->closeCursor();
        return $total3; 
         }     

?>