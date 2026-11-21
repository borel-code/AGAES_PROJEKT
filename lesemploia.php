<?php 
 
 set_time_limit(2000);


 function jour($id){


 $v="SELECT *  FROM jour";
 $reponse = $bdda->query($v);
 $true=0; $jour=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id1=$donnees['id'] ;
   
  if($id==$id1){
      $true=1; $jour=$donnees['nom'] ;
  }
  } 
 $reponse->closeCursor(); 
 return $jour;
}



function nomperiod($id){


 $v="SELECT *  FROM periode";
 $reponse = $bdda->query($v);
 $true=0; $jour=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id1=$donnees['id'] ;
   
  if($id==$id1){
      $true=1; $jour=$donnees['nom'] ;
  }
  } 
 $reponse->closeCursor(); 
 return $jour;
}

function dureeperiod($id){


 $v="SELECT *  FROM periode";
 $reponse = $bdda->query($v);
 $true=0; $jour=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id1=$donnees['id'] ;
   
  if($id==$id1){
      $true=1; $jour=$donnees['duree'] ;
  }
  } 
 $reponse->closeCursor(); 
 return $jour;
}


function matjourpecl($jour,$per,$clas,$an){


 $v="SELECT *  FROM emploi WHERE an='".$an."' AND class='".$clas."' AND idjour='".$jour."'";
 $reponse = $bdda->query($v);
 $true=0; $matiere=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id1=$donnees['idh'] ;
   
  if($per==$id1){
      $true=1; $matiere=$donnees['matier'] ;
  }
  } 
 $reponse->closeCursor(); 
 return $matiere;
}



function matjourpeclehrer($jour,$per,$cni,$an){


$v="SELECT *  FROM emploi WHERE an='".$an."' AND cni='".$cni."' AND idjour='".$jour."'";
$reponse = $bdda->query($v);
$true=0; $matiere=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
   $id1=$donnees['idh'] ;
 
if($per==$id1){
    $true=1; $matiere=$donnees['matier'] ;
}
} 
$reponse->closeCursor(); 
return $matiere;
}

function classjourpeclehrer($jour,$per,$cni,$an){


$v="SELECT *  FROM emploi WHERE an='".$an."' AND cni='".$cni."' AND idjour='".$jour."'";
$reponse = $bdda->query($v);
$true=0; $matiere=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
   $id1=$donnees['idh'] ;
 
if($per==$id1){
    $true=1; $matiere=$donnees['class'] ;
}
} 
$reponse->closeCursor(); 
return $matiere;
}


function veriftaglehrer($jour,$cni,$an){


$v="SELECT *  FROM emploi WHERE an='".$an."' ";
$reponse = $bdda->query($v);
$true=0; 
while ($donnees = $reponse->fetch() AND $true==0)
{
  if($donnees['cni']==$cni AND $donnees['idjour']==$jour){
    $true=1;  
}
} 
$reponse->closeCursor(); 
return $true;
}

function verifzeitlehrer($per,$cni,$an){


$v="SELECT *  FROM emploi WHERE an='".$an."' AND idh='".$per."'";
$reponse = $bdda->query($v);
$true=0; $matiere=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  if($donnees['cni']==$cni){
    $true=1;  
}
} 
$reponse->closeCursor(); 
return $true;
}



function verifzeittaglehrer($idjour,$per,$cni,$an){


$v="SELECT *  FROM emploi WHERE an='".$an."' AND idh='".$per."' AND idjour='".$idjour."'";
$reponse = $bdda->query($v);
$true=0; $matiere=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  if($donnees['cni']==$cni){
    $true=1;  
}
} 
$reponse->closeCursor(); 
return $true;
}


function dispoavt($jour,$per,$clas,$an,$cni){

$true=0; $matiere=" "; $dec=0;
if( $cni!=" " AND !empty($cni)){
 $v="SELECT *  FROM emploi WHERE an='".$an."'  AND idjour='".$jour."' AND cni='".$cni."'";
 $reponse = $bdda->query($v);
 
 while ($donnees = $reponse->fetch() AND $dec==0)
 {
     $id1=$donnees['idh'] ;
     $cni1=$donnees['cni'] ;
  
    $period1=$donnees['idh'] ;
    if($period1==$per){
        $klas=$donnees['class'] ;
        if($klas!=$clas){
          $dec=1;
        }
     
    }  
    
  
} 
 $reponse->closeCursor(); 
}
 return $dec;
}



function cniensmatier($mat,$an,$clas){
 

     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND nivens='".$clas."' AND supp='0'";
     $reponse = $bdda->query($v);
       $t=0; $nom=" ";
      while ($donnees = $reponse->fetch() AND $t==0)
      {
        
          if($donnees['discipline']==$mat ){ 
             $nom= $donnees['cni'];
             $t=1;
           }
       }
      $reponse->closeCursor();
      return $nom;
    } 





    function dejamatier($mat,$an,$clas){
 

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND nivens='".$clas."' AND supp='0'";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() AND $t==0)
          {
            
              if($donnees['discipline']==$mat ){ 
                 $nom= $donnees['cni'];
                 $t=1;
               }
           }
          $reponse->closeCursor();
          return $t;
        } 


        function heurelevtri($mat,$an,$nomtri){

         $heure=0; $dec=0;
         
         $v="SELECT *  FROM eleve WHERE anelev='".$an."'";
         $reponse = $bdda->query($v);
         
         while ($donnees = $reponse->fetch() AND $dec==0)
         {
            $matri=$donnees['matelev'] ;
            if($matri==$mat){
                $heure=$donnees[$nomtri] ;
               $dec=1;
          }  
       } 
         $reponse->closeCursor(); 
          return $heure;
        }




        function heurelevtag($mat,$an,$tri,$tag){

         $heure=" "; $dec=0;
         
         $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
         AND datenreg='".$tag."'";
         $reponse = $bdda->query($v);
         
         while ($donnees = $reponse->fetch() AND $dec==0)
         {
            $matri=$donnees['matelev'] ;
            if($matri==$mat){
                $heure=$donnees['duree'] ;
               $dec=1;
          }  
       } 
         $reponse->closeCursor(); 
          return $heure;
        }


        function totalheurelevtag($mat,$an,$tri,$tag){

         $heure=" "; $dec=0;$total=0;
         
         $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
         AND datenreg='".$tag."'";
         $reponse = $bdda->query($v);
         
         while ($donnees = $reponse->fetch()  )
         {
            $matri=$donnees['matelev'] ;
            if($matri==$mat){
                $heure=$donnees['duree'] ;
               $total+=$heure;
          }  
       } 
         $reponse->closeCursor(); 
          return $total;
        }



        function totalretardtri($mat,$an,$tri){

             $heure=" "; $dec=0;$total=0;
             
             $v="SELECT *  FROM retard WHERE anelev='".$an."' AND trimestre='".$tri."' ";
             $reponse = $bdda->query($v);
             
             while ($donnees = $reponse->fetch()  )
             {
                $matri=$donnees['matelev'] ;
                if($matri==$mat){
                     
                   $total++;
              }  
           } 
             $reponse->closeCursor(); 
              return $total;
        }







function existretardelevtag($mat,$an,$tri,$tag){

$heure=" "; $dec=0;

$v="SELECT *  FROM retard WHERE anelev='".$an."' AND trimestre='".$tri."'
AND datenreg='".$tag."'";
$reponse = $bdda->query($v);

while ($donnees = $reponse->fetch() AND $dec==0)
{
  $matri=$donnees['matelev'] ;
  if($matri==$mat){
       
     $dec=$donnees['id'];
}  
} 
$reponse->closeCursor(); 
return $dec;
}



function existabsencelevtag($mat,$an,$tri,$tag,$period,$mot,$matier){

  $heure=" "; $dec=0;
  
  $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
  AND datenreg='".$tag."' AND motensgt='".$mot."'";
  $reponse = $bdda->query($v);
  
  while ($donnees = $reponse->fetch() AND $dec==0)
  {
    $matri=$donnees['matelev'] ;
    if($matri==$mat AND $donnees['dateabs']==$period AND $donnees['matiere']==$matier){
         
       $dec=$donnees['id'];
  }  
  } 
  $reponse->closeCursor(); 
  return $dec;
  }

  function totalheureperiod($mat,$an,$tri,$tag,$period,$mot,$matier){

  $heure=" "; $dec=0;
  
  $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
  AND datenreg='".$tag."' AND motensgt='".$mot."'";
  $reponse = $bdda->query($v);
  
  while ($donnees = $reponse->fetch() AND $dec==0)
  {
    $matri=$donnees['matelev'] ;
    if($matri==$mat AND $donnees['dateabs']==$period AND $donnees['matiere']==$matier){
         
       $dec=$donnees['id'];
  }  
  } 
  $reponse->closeCursor(); 
  return $dec;
  }


  function verifschonabsence($mat,$an,$tri,$tag,$period, $matier){

  $heure=" "; $dec=0;
  
  $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
  AND datenreg='".$tag."' ";
  $reponse = $bdda->query($v);
  
  while ($donnees = $reponse->fetch() AND $dec==0)
  {
    $matri=$donnees['matelev'] ;
    if($matri==$mat AND $donnees['dateabs']==$period AND $donnees['matiere']==$matier){
         
       $dec=$donnees['id'];
  }  
  } 
  $reponse->closeCursor(); 
  return $dec;
  }



  function totalheureabstri($mat,$an,$tri ){

 $heure=" "; $dec=0;$total=0;
 
 $v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'";
 $reponse = $bdda->query($v);
 
 while ($donnees = $reponse->fetch()  )
 {
    $matri=$donnees['matelev'] ;
    if($matri==$mat){
        $heure=$donnees['duree'] ;
       $total+=$heure;
  }  
} 
 $reponse->closeCursor(); 
  return $total;
}





function allabsencetri($mat,$an,$tri,$mtp,$matier){

$heure=" "; $dec=0;

$v="SELECT *  FROM absence WHERE anelev='".$an."' AND trimestre='".$tri."'
 ";
$reponse = $bdda->query($v);

while ($donnees = $reponse->fetch() )
{
  $matri=$donnees['matelev'] ;
  if($matri==$mat  AND $donnees['motensgt']==$mtp AND $donnees['matiere']==$matier){
       
     $dec+=$donnees['duree'];
}  
} 
$reponse->closeCursor(); 
return $dec;
}







?>