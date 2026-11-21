<?php 
 
 set_time_limit(2000);



 function compternbrevalmat($idcl,$eval,$trim,$an){// nombr matière totale ds evaluations 


$v="SELECT DISTINCT matiere FROM  note WHERE anens='".$an."'  AND
typeval='".$eval."' AND idcl='".$idcl."' AND    trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
 
  $i++; 
 
} 
$reponse->closeCursor(); 
 return $i;
}
 
function ensgsexe($id){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant WHERE supp='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['genre'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

function ensgparsexe($sexe,$an){ 

    
    $vue=0; 
    $b="SELECT DISTINCT idens  FROM enseigmatclasse 
    WHERE sup='0' AND anens='".$an."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         $idens=$bonnees['idens'];
         $val=ensgsexe($idens);
        if($val==$sexe){
          $vue++; 
        }
            
     } 
    $beponse->closeCursor();
   return $vue;
    }

 function montantpayeadmin($id,$an){ 

  
  $vue=0;$val=0;
  $b="SELECT *  FROM admin_salaire WHERE sup='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idadmin']==$id  AND $bonnees['anens']==$an){
         $val= $bonnees['salaire'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $val;
  }


 function allmatensg($idens,$an){
        


  $tabId=array(); $tabMat=array(); $tabclas=array();
   $v="SELECT DISTINCT idmat FROM enseigmatclasse WHERE  idens='".$idens."' AND anens='".$an."' AND sup='0'";
   $reponse = $bdda->query($v);
     $t=0; $nom=" ";$i=0;$tab=array(); 
    while ($donnees = $reponse->fetch() )
    {
      
           $tab[$i]=$donnees['idmat'] ;
           
           $t++; $i++; 
           
     }
    $reponse->closeCursor();
    $debpar="("; $finpar=")";$matclas=" ";
      for($j=0;$j<count($tab);$j++){
          $mat=$tab[$j];
          $mat1=matparid($mat,$an)." ".$debpar; $mat1virgul=$mat1;
           //DEB
           $v="SELECT * FROM enseigmatclasse WHERE idens='".$idens."' AND idmat='".$mat."' AND anens='".$an."' AND sup='0'";
           $reponse = $bdda->query($v);
           while ($donnees = $reponse->fetch() )
           {
               if($mat1virgul==$mat1){ 
                 $virg=" ";
                 $mat1=$mat1.$virg."&nbsp".classparid($donnees['idcl'],$an);
               }
               else{
                  $virg=","; 
                  $mat1=$mat1."&nbsp".$virg."&nbsp".classparid($donnees['idcl'],$an);
               }
              
          }
          $reponse->closeCursor();
          $mat1=$mat1.$finpar."<Br><Br>";
           //FIN
         $matclas=$matclas.$mat1;
      }return $matclas;
  } 



 function idprotitul($idcl,$an){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl AND $bonnees['anens']==$an AND  $bonnees['titulaire']==1){
         $vue=$bonnees['idens']; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existclasan($idcl,$an){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl AND $bonnees['anens']==$an){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existensmaclas($idcl){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idcl']==$idcl){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

 function existensan($idens,$ann){ 

  
  $vue=0; 
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens AND $bonnees['anens']==$ann){
         $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }



 function totalelev($idcl,$an){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM eleve WHERE anelev='".$an."' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['niveauelev']==$idcl  ){
         
        $vue++; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }

  function recupidensgpartps($tps){ 

    
    $vue=0; 
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['temps']==$tps ){
           $vue=$bonnees['id'] ; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }



    


 function namensg($id){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseignant WHERE supp='0' ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['nomens']." ".$bonnees['prenomens'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

  function namensgrade($id){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['id']==$id  ){
          $genre=$bonnees['genre'];
          if($genre=='M'){
            $nom= "M . <i>".$bonnees['nomens']." ".$bonnees['prenomens']."</i>";
          }
          if($genre=='F'){
            $nom= "Mme  <i>".$bonnees['nomens']." ".$bonnees['prenomens']."</i>";
          }
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return $nom;
    }

    function namensgradebull($id){ 

      
      $vue=0;$nom=" ";
      $b="SELECT *  FROM enseignant WHERE supp='0' ";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['id']==$id  ){
            $genre=$bonnees['genre'];
            if($genre=='M'){
              $nom= "M . <i>".$bonnees['nomens']."</i>";
            }
            if($genre=='F'){
              $nom= "Mme  <i>".$bonnees['nomens']."</i>";
            }
            $vue=1; 
          }
              
       } 
      $beponse->closeCursor();
      return $nom;
      }
  function ensgdsmat($idmat,$idcl,$an){ 

    
    $vue=0;$liste=" ";
    $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'
    AND idcl='".$idcl."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         
        if($bonnees['idmat']==$idmat){
          $idens=$bonnees['idens'];
           $liste=$liste.namensgradebull($idens)." ,";
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return rtrim($liste,',');
    }


    function ensgdstitulaire($idcl,$an){ 

      
      $vue=0;$liste=" ";
      $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'
      AND titulaire='1'";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['idcl']==$idcl ){
            $vue=1;
             $liste=namensgrade($bonnees['idens']) ;
            
          }
              
       } 
      $beponse->closeCursor();
      return  $liste ;
      }
  


  function mmpassensg($mot){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseignant WHERE supp='0' ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['mtpasse']==$mot ){
           $vue=$bonnees['id']; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }

    function mmcniensg($cni){ 

      
      $vue=0;$nom=" ";
      $b="SELECT *  FROM enseignant WHERE supp='0' ";
       $beponse = $bdda->query($b);
       while ($bonnees = $beponse->fetch() AND $vue==0)
       {
           
          if($bonnees['cni']==$cni ){
             $vue=$bonnees['id']; 
          }
              
       } 
      $beponse->closeCursor();
      return $vue;
      }

 function matdiffdelui($idens,$idcl,$idmat,$an){ 

  
  $vue=0;$nom=" ";
  $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
         
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $vue;
  }


  function matierealui($idens,$idcl,$idmat,$an){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseigmatclasse WHERE sup='0' AND anens='".$an."'";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['idens']==$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
           
          $vue=$bonnees['id']; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }


  function ensglistocupp($idens,$idcl,$idmat,$an){ 

    
    $vue=0;$nom=" ";
    $b="SELECT *  FROM enseigmatclasse 
    WHERE sup='0' AND anens='".$an."'  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() )
     {
         
        if( $bonnees['idens']!=$idens AND $bonnees['idcl']==$idcl AND $bonnees['idmat']==$idmat ){
           $nom=$nom.", ".namensg($bonnees['idens']);
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    if($vue==1){
      return "(déjà occupée par".$nom.")";
    }
  
    }



 function nomdevise($id){ 

  
  $vue=0;$nom=0;
  $b="SELECT *  FROM devise  ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['id']==$id  ){
         $nom= $bonnees['nom'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $nom;
  }

 function typepaye($idens,$an){ 

  
  $vue=0;$type=0;
  $b="SELECT *  FROM enseigsalaire  ";
   $beponse = $bdda->query($b);
   while ($bonnees = $beponse->fetch() AND $vue==0)
   {
       
      if($bonnees['idens']==$idens  AND $bonnees['anens']==$an){
         $type= $bonnees['type'];
        $vue=1; 
      }
          
   } 
  $beponse->closeCursor();
  return $type;
  }

  function montantpaye($idens,$an){ 

    
    $vue=0;$val=0;
    $b="SELECT *  FROM enseigsalaire  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
         
        if($bonnees['idens']==$idens  AND $bonnees['anens']==$an){
           $val= $bonnees['valeur'];
          $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return $val;
    }
//FIN MISE A JOUR 











 function verifsco($idcl,$stat,$an,$type){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id=$donnees['id'] ;
  $type1=$donnees['type'] ; 
  $stat1=$donnees['stat'] ; 
  if($type==$type1 AND $stat==$stat1){
      $true=$id;
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}



function verifscowant($idcl,$stat,$an,$type){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $id=$donnees['id'] ;
  $type1=$donnees['type'] ; 
  $stat1=$donnees['stat'] ; 
  $montant=$donnees['tant'] ; 
  if($type==$type1 AND $stat==$stat1){
      $true=1;
      $paye=$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}


function vollpension($idcl,$stat,$an){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type!='4' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye=$paye+$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}


function volldivers($idcl,$stat,$an){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='4' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye=$paye+$montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}



function grade($idcl,$an){


 $v="SELECT *  FROM classe WHERE   sup='0'";
 $reponse = $bdda->query($v);
 $grade=" "; $true=0;
 while ($donnees = $reponse->fetch() AND $true==0)
 {
    
  if($donnees['id']==$idcl){
       $grade=$donnees['categ'] ;
       $true=1;
  }
  } 
 $reponse->closeCursor(); 
 return $grade;
}


function part1($nb,$val){
	if($nb==1){
		return '000'.$val;
	}
	if($nb==2){
		return '00'.$val;
	}
	if($nb==3){
		return '0'.$val;
	}
	if($nb==4){
		return $val;
	}
}



function part2($an,$cls){
    return grade($cls,$an);
 }

function part3($an){
   return substr($an,0,4);
}

//pour inscription ancien

function nameschuler($mat){

      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['nomelev'] ;
        }
       $reponse->closeCursor();
     }

     function vornameschuler($mat){

          $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
          $reponse = $bdda->query($v);
             
           while ($donnees = $reponse->fetch())
           {
              return $donnees['preelev'] ;
            }
           $reponse->closeCursor();
         }
         function nomelevecompl($mat){

            $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
            $reponse = $bdda->query($v);
               
             while ($donnees = $reponse->fetch())
             {
                return $donnees['nomelev']." ".$donnees['preelev'] ;
              }
             $reponse->closeCursor();
           }
      
         function geburtstag($mat){

              $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
              $reponse = $bdda->query($v);
                 
               while ($donnees = $reponse->fetch())
               {
                  return $donnees['datelev'] ;
                }
               $reponse->closeCursor();
             }


             function genre($mat){

                  $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
                  $reponse = $bdda->query($v);
                     
                   while ($donnees = $reponse->fetch())
                   {
                      return $donnees['sexelev'] ;
                    }
                   $reponse->closeCursor();
                 }

                 function nummer($mat){

                      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."'  AND id_etab='0'";
                      $reponse = $bdda->query($v);
                         
                       while ($donnees = $reponse->fetch())
                       {
                          return $donnees['telev'] ;
                        }
                       $reponse->closeCursor();
                     }
    
                                   

//fin


function schuleschuler($mat,$an){

    $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev= '".$an."'  AND id_etab='0'";
    $reponse = $bdda->query($v);
       
     while ($donnees = $reponse->fetch())
     {
        return $donnees['niveauelev'] ;
      }
     $reponse->closeCursor();
   }




   

   function vollnameschuler($mat,$an){

      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev= '".$an."' AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['nomelev']." ".$donnees['preelev'] ;
        }
       $reponse->closeCursor();
     }





     function inscripension($idcl,$stat,$an){

  
   $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='0' AND sup='0'";
   $reponse = $bdda->query($v);
   $true=0; $paye=0;
   while ($donnees = $reponse->fetch())
   {
     $montant=$donnees['tant'] ; 
    if($donnees['idcl']==$idcl){
         $paye= $montant;
    }
    } 
   $reponse->closeCursor(); 
   return $paye;
  }


  function tranche1pension($idcl,$stat,$an){


 $v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='1' AND sup='0'";
 $reponse = $bdda->query($v);
 $true=0; $paye=0;
 while ($donnees = $reponse->fetch())
 {
   $montant=$donnees['tant'] ; 
  if($donnees['idcl']==$idcl){
       $paye= $montant;
  }
  } 
 $reponse->closeCursor(); 
 return $paye;
}

function tranche2pension($idcl,$stat,$an){


$v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='2' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $paye=0;
while ($donnees = $reponse->fetch())
{
 $montant=$donnees['tant'] ; 
if($donnees['idcl']==$idcl){
     $paye= $montant;
}
} 
$reponse->closeCursor(); 
return $paye;
}

function tranche3pension($idcl,$stat,$an){


$v="SELECT *  FROM cordon WHERE anens='".$an."' AND stat='".$stat."' AND type='3' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $paye=0;
while ($donnees = $reponse->fetch())
{
 $montant=$donnees['tant'] ; 
if($donnees['idcl']==$idcl){
     $paye= $montant;
}
} 
$reponse->closeCursor(); 
return $paye;
}
  

function nbreval($idcl,$trim,$an){


$v="SELECT *  FROM evaltrim WHERE anens='".$an."' AND codetrim='".$trim."' AND sup='0'";
$reponse = $bdda->query($v);
$true=0; $nbre=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['idcl']==$idcl){
  $nbre=$donnees['nbre'] ;
  $true=1;
}
} 
$reponse->closeCursor(); 
return $nbre;
} 
 

function existnbreval($idcl,$trim,$an){


$v="SELECT *  FROM evaltrim WHERE anens='".$an."' AND idcl='".$idcl."' AND sup='0'";
$reponse = $bdda->query($v);
$true=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['codetrim']==$trim){
  
  $true=$donnees['id'];
}
} 
$reponse->closeCursor(); 
return $true;
} 



function Nametrim($code){


$v="SELECT *  FROM trimestre ";
$reponse = $bdda->query($v);
$true=0;   
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['code']==$code){
  
  $tr=$donnees['nom'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 

function returncoefevaluation($idmat,$idcl,$eval,$trim,$an){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['idcl']==$idcl AND $donnees['typeval']==$eval){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function returncoefTRIMCALCUL($idmat,$idcl,$trim,$an){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function returncoeftrim($idmat,$idcl, $trim,$an ){


$v="SELECT idcl,matiere,coef,trimestre,anens  FROM  notetrimestre 
WHERE  idcl='".$idcl."' AND anens='".$an."'  " ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['trimestre']==$trim   AND $donnees['coef']!=0){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function returncoefevaluationPERSO($idmat,$idcl,$eval,$trim,$an,$matri){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."'
AND matricule='".$matri."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function returncoeftrimPERSO($idmat,$idcl,$trim,$matri,$an){


$v="SELECT idcl,matiere,coef,trimestre,anens  FROM  notetrimestre 
WHERE  idcl='".$idcl."' AND trimestre='".$trim."'
AND matricule='".$matri."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['coef'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 

 

function notelevevaluation($idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['note'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function notecoeflevevaluation($idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['nc'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function notetrim($idmat,$trim,$mat,$an){


$v="SELECT  matricule,matiere,trimestre,nc,anens  FROM  notetrimestre WHERE  matricule='".$mat."' AND trimestre='".$trim."'  AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['nc'] ;
  $true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 


function rgmatevaluation($idmat,$idcl,$eval,$trim,$an,$mat){


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['rgeval'];$true=1;
}
} 
$reponse->closeCursor(); 
if($tr==1){
$tr=$tr."<sup>er(e)</sup>";
}
if($tr>1){
  $tr=$tr."<sup>e</sup>";
  }
return $tr;
} 

 



function rgmattrim($idmat,$idcl,$trim,$an,$mat){


$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['coef']!=0){
  
  $tr=$donnees['rgtrim'];$true=1;
}
} 
$reponse->closeCursor(); 
if($tr==1){
$tr=$tr."<sup>er(e)</sup>";
}
if($tr>1){
  $tr=$tr."<sup>e</sup>";
  }
return $tr;
} 




function notetraiteval($idmat,$eval,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 


$v="SELECT  id,matricule,matiere,typeval,trimestre,anens  FROM
  note WHERE matricule='".$mat."'  AND  anens='".$an."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat AND $donnees['typeval']==$eval){
  
  $tr=$donnees['id'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 



function notetraitrim($idmat,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 


$v="SELECT  id,matricule,matiere,trimestre,anens  FROM
  notetrimestre WHERE matricule='".$mat."'  AND  anens='".$an."' AND trimestre='".$trim."'" ;
$reponse = $bdda->query($v);
$true=0;   $tr=0;
while ($donnees = $reponse->fetch() AND $true==0)
{
  
if($donnees['matiere']==$idmat){
  
  $tr=$donnees['id'];$true=1;
}
} 
$reponse->closeCursor(); 
return $tr;
} 




function Nbrevalpartrimcpse($idmat,$idcl,$trim,$an ){//note trimestre en une matière 


$v="SELECT DISTINCT typeval FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
AND   matiere='".$idmat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch() )
{
 $som++; 
} 
$reponse->closeCursor(); 
 
return $som;
 
}


function NbrevalpartrimcpsePARELEV($idmat,$idcl,$trim,$matri,$an ){//note trimestre en une matière 


$v="SELECT DISTINCT typeval FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
AND   matiere='".$idmat."' AND   matricule='".$matri."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch() )
{
 $som++; 
} 
$reponse->closeCursor(); 
 
return $som;
 
}





function calculnotetrim($idmat,$idcl,$trim, $mat,$nbreval,$an){//note trimestre en une matière 


$v="SELECT *  FROM  note WHERE idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$true=0; $notetrim=" ";$som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  
  $som=$som+$donnees['note']; 
}
} 
$reponse->closeCursor(); 
if($nbreval>0){
 $notetrim=$som/$nbreval;
}  
return $notetrim;
 
}







function classereval($idmat,$idcl,$eval,$trim,$an){//classer note eval matière 


$v="SELECT id,idcl,matiere,typeval,trimestre,rgeval,anens
 FROM  note WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."'  AND anens='".$an."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=1;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  $id=$donnees['id'];
  $r="UPDATE note SET rgeval='".$i."' WHERE id='".$id."'";
  $req=$bdda->query($r);
  $i++; 
}
} 
$reponse->closeCursor(); 
 
}

function classertrim($idmat,$idcl,$trim,$an){//classer note eval matière 


$v="SELECT id,idcl,matiere, trimestre,rgtrim,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."'  AND anens='".$an."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=1;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat ){
  $id=$donnees['id'];
  $r="UPDATE notetrimestre SET rgtrim='".$i."' WHERE id='".$id."'";
  $req=$bdda->query($r);
  $i++; 
}
} 
$reponse->closeCursor(); 
 
}


 



function effectcompomat($idmat,$idcl,$eval,$trim,$an){//effectif ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat AND $donnees['rgeval']!=" " AND !empty($donnees['rgeval'])){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function effectcompomatrim($idmat,$idcl,$trim,$an){//effectif ayant composé matière 

$requis=Nbrevalpartrimcpse($idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){
       $requisperso=NbrevalpartrimcpsePARELEV($idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
          $i++; 
       }
    }
} 
$reponse->closeCursor(); 
 return $i;
}


function myenneclascompomatrim($idmat,$idcl,$trim,$compo,$an){// 

$requis=Nbrevalpartrimcpse($idmat,$idcl,$trim,$an); 

$v="SELECT *  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."'  AND anens='".$an."'  ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  $total=0; $moy=" ";
while ($donnees = $reponse->fetch() )
{
  
   if($donnees['matiere']==$idmat ){
       $requisperso=NbrevalpartrimcpsePARELEV($idmat,$idcl,$trim,$donnees['matricule'],$an);
       if($requis==$requisperso ){
          $total+=$donnees['note']; 
       }
    }
} 
$reponse->closeCursor(); 
if($compo>0){
  $moy=Round(($total/$compo),2);
}
 return $moy ;
}


function admiscompomat($idmat,$idcl,$eval,$trim,$an){//effectif admis ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' ORDER BY note DESC" ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  $bareme= $donnees['coef']/2;
if($donnees['matiere']==$idmat AND $donnees['note']>=$bareme AND $donnees['coef']!=0){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


 



function admiscompomatrim($idmat,$idcl,$trim,$an){//effectif admis ayant composé matière 


$v="SELECT idcl,matiere,trimestre,note,coef,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
 trimestre='".$trim."' AND matiere='".$idmat."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
 $bareme= $donnees['coef']/2;
if($donnees['note']>=$bareme AND $donnees['coef']!=0){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}



function myenneclascompomat($idmat,$idcl,$eval,$trim,$an,$effec){//moyen   ayant composé matière 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 trimestre='".$trim."' AND typeval='".$eval."' " ;
$reponse = $bdda->query($v);
$i=" ";  $som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matiere']==$idmat){
  
  $som=$som+ $donnees['note'];
}
} 
$reponse->closeCursor(); 
if($effec>0){
  $i=Round(($som/$effec),2);
}
 return $i;
}

 


function namelehrer($idmat,$idcl,$an){//nom ensg matière 


$v="SELECT *  FROM  enseignant WHERE anens='".$an."' AND nivens='".$idcl."' AND discipline='".$idmat."' AND supp='0'" ;
$reponse = $bdda->query($v);
 $nom=" "; $ch=" ";
while ($donnees = $reponse->fetch() )
{
  $nom=$donnees['nomens']." ".$donnees['prenomens'];
  $genre=$donnees['genre'];
if($genre=="M"){
  $nom="M . <I>".$nom."</I></br>";
 }
 else{
  $nom="Mme <I>".$nom."</I></br>";
 }
$ch=$ch.$nom;
} 
$reponse->closeCursor(); 
 
 return $ch;
}



function feuvertbullensg($mtp,$idcl,$an){ 


$v="SELECT *  FROM  enseignant WHERE anens='".$an."' AND nivens='".$idcl."' AND mtpasse='".$mtp."' AND supp='0'" ;
$reponse = $bdda->query($v);
$nom=0;
while ($donnees = $reponse->fetch() AND $nom==0)
{
  
  $genre=$donnees['titulaire'];
if($genre==1){
  $nom=1;
 }
 
} 
$reponse->closeCursor(); 
 
 return $nom;
}




function compternbreval($matri,$idcl,$eval,$trim,$an){// nombr matière ds evaluations 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 typeval='".$eval."' AND trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matricule']==$matri ){
  
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


function totalNCeval($matri,$idcl,$eval,$trim,$an){// total note coefficiee ds evaluations 


$v="SELECT matricule,idcl,typeval,trimestre,nc,anens  FROM  note WHERE   idcl='".$idcl."' AND
 typeval='".$eval."' AND trimestre='".$trim."' AND anens='".$an."'  " ;
$reponse = $bdda->query($v);
$i=0;  $som=0;
while ($donnees = $reponse->fetch() )
{
  
if($donnees['matricule']==$matri){
  $som=$som+$donnees['nc'];
  $i++; 
}
} 
$reponse->closeCursor(); 
 return $som;
}




function retrouvernotecoeftrim($matri,$idcl,$matier,$trim,$an){// total note coefficiee ds evaluations 


$v="SELECT *  FROM  note WHERE anens='".$an."' AND idcl='".$idcl."' AND
 matiere='".$matier."' AND trimestre='".$trim."' " ;
$reponse = $bdda->query($v);
$i=0;  $val=0;
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
  $val=$donnees['notetrim']*$donnees['coef'];
  $i=1; 
}
} 
$reponse->closeCursor(); 
 return $val;
}





function totalNCtrim($matri,$idcl,$trim,$an){// total note coefficiee ds evaluations 

  
$i=0;  $som=0;
$v="SELECT matricule,idcl,trimestre,note,anens FROM notetrimestre  WHERE matricule='".$matri."' AND idcl='".$idcl."'
AND trimestre='".$trim."' AND anens='".$an."' ";
$reponse = $bdda->query($v);
$som=0;
while ($donnees = $reponse->fetch())
{
  $som+=$donnees['note']; 
  
  
} 
$reponse->closeCursor(); 
 return $som;
}





function totalCOeval($idcl,$eval,$trim,$an){// total coef  ds evaluations 

 
$v="SELECT *  FROM matclasse  WHERE sup='0' AND idcl='".$idcl."' AND anens='".$an."'";
$reponse = $bdda->query($v);
$som=0;$coef=0;
while ($donnees = $reponse->fetch())
{
  $idmat=$donnees['idmat']; 
   
  
    $coef=returncoefevaluation($idmat,$idcl,$eval,$trim,$an);
     $som=$som+$coef;                
    
} 
$reponse->closeCursor();
 return $som;
}




function totalCOtrim($matri,$idcl,$trim,$an){// total coef  ds evaluations 

    
  $i=0;  $som=0;
  $v="SELECT  matricule,idcl,trimestre,coef,anens  FROM notetrimestre  WHERE matricule='".$matri."' AND idcl='".$idcl."'
  AND trimestre='".$trim."' AND anens='".$an."' ";
  $reponse = $bdda->query($v);
  $som=0;
  while ($donnees = $reponse->fetch())
  {
    $som+=$donnees['coef']; 
    
    
  } 
  $reponse->closeCursor(); 
   return $som;
}




function existmoyEval($matri,$idcl,$an,$eval,$trim){//existence matri ds eval et trim 


$v="SELECT *  FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."'" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}


function voirmoytrim($matri,$idcl,$trim,$an){//existence matri  ds moyennetrim 


$v="SELECT *  FROM  moyennetrim WHERE idcl='".$idcl."' 
AND  codetrim='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}



function voirmoyan($matri,$idcl,$an){//existence matri  ds moyenneannuel 


$v="SELECT *  FROM  moyenneannuel WHERE idcl='".$idcl."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}






function existmoyTRIM($matri,$idcl,$an,$trim){//existence matri ds eval et trim 


$v="SELECT *  FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."'  AND codetrim='".$trim."'" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}






function existdsnotegroup($matri,$idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  id,matricule,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function existdsnotegrouptrim($matri,$idcl, $trim,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT id,matricule,idcl,idgroup,trimestre,anens  FROM  notegrouptrim  WHERE   idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $i=$donnees['id']; 
}
} 
$reponse->closeCursor(); 
 return $i;
}





function Elevnotegroupeva($matri,$idcl,$eval,$idgroup,$an){//return note gpe en une eval d& eleve


$v="SELECT  id,matricule,idcl,idgroup,eval,notegroup,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  $not= " "; 
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $not=$donnees['notegroup']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $not;
}

function Elevnotegrouptrim($matri,$idcl,$idgroup,$trim,$an){//return note gpe au trimestre d& eleve


$v="SELECT  id,matricule,idcl,idgroup, notegroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND 
trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;  $not= " "; 
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $not=$donnees['notegroup']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $not;
}

function Elevrggroupeva($matri,$idcl,$eval,$idgroup,$an){//return note gpe en une eval d& eleve


$v="SELECT  id,matricule,idcl,idgroup,eval,rg,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   $rg=" ";
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $rg=$donnees['rg']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $rg;
}



function Elevrggrouptrim($matri,$idcl,$idgroup,$trim,$an){//return note gpe au trimd& eleve


$v="SELECT  id,matricule,idcl,idgroup, rg,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND 
trimestre='".$trim."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$i=0;   $rg=" ";
while ($donnees = $reponse->fetch() AND $i==0)
{
  
if($donnees['matricule']==$matri){
   $rg=$donnees['rg']; $i=1;
}
} 
$reponse->closeCursor(); 
 return $rg;
}



function moyclassegroupeval($idcl,$eval,$idgroup,$an){//moy classe gpe de matière


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $moy= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
   $total+=$donnees['notegroup']; 
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $moy=Round(($total/$effectif),2);
}return $moy;
}


function moyclassegrouptrim($idcl,$trim,$idgroup,$an){//moy classe gpe de matière


$v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $moy= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){
   $total+=$donnees['notegroup']; 
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $moy=Round(($total/$effectif),2);
}return $moy;
}


function pctclassegroupeval($idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
  if($donnees['notegroup']>=10){
   $total++; 
  }
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $pct=Round((($total*100)/$effectif),2);
}return $pct;
}


function pctclassegrouptrim($idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 

 $v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){

  if($donnees['notegroup']>=10){
   $total++; 
  }
   $effectif++;
}
} 
$reponse->closeCursor(); 
if($effectif>0){ 
 $pct=Round((($total*100)/$effectif),2);
}return $pct;
 
}





function compoclassegrouptrim($idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 

 $v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){

  
   $effectif++;
}
} 
$reponse->closeCursor(); 
 return $effectif;
 
}




function nbradmisclassegroupeval($idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['eval']==$eval){
  if($donnees['notegroup']>=10){
   $total++; 
  }
    
}
} 
$reponse->closeCursor(); 
 return $total;
}




function nbrcpseclassegroupeval($idcl,$eval,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,eval,anens  FROM
  notegroupeval  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND rg!=' ' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  if($donnees['eval']==$eval){
   $total++; 
  }
} 
$reponse->closeCursor(); 
 return $total;
}





function nbradmisclassegrouptrim($idcl,$trim,$idgroup,$an){//existence matri ds eval et trim 


$v="SELECT  notegroup,idcl,idgroup,trimestre,anens  FROM
  notegrouptrim  WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND anens='".$an."' " ;
$reponse = $bdda->query($v);
$effectif=0;   $total=0; $pct= " ";
while ($donnees = $reponse->fetch())
{
  
if($donnees['trimestre']==$trim){
  if($donnees['notegroup']>=10){
   $total++; 
  }
    
}
} 
$reponse->closeCursor(); 
 return $total;
}



function notemaxmatclaseva($idmat,$idcl,$eval,$trim,$an){



$v="SELECT MAX(note) AS n  FROM note WHERE  idcl='".$idcl."' AND typeval='".$eval."'
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}




function notemaxmatclastrim($idmat,$idcl,$trim,$an){



$v="SELECT MAX(note) AS n  FROM notetrimestre WHERE  idcl='".$idcl."' 
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function noteminmatclastrim($idmat,$idcl,$trim,$an){


$requis=Nbrevalpartrimcpse($idmat,$idcl,$trim,$an); 


$v="SELECT * FROM notetrimestre WHERE  idcl='".$idcl."' 
AND trimestre='".$trim."'  AND matiere='".$idmat."' AND anens='".$an."'  ORDER BY note DESC" ;
$rep=$bdda->query($v); $nb=" ";
while ($donnee=$rep->fetch())
{
  $requisperso=NbrevalpartrimcpsePARELEV($idmat,$idcl,$trim,$donnee['matricule'],$an);
  if($requis==$requisperso){
      $nb=$donnee['note'];   
   }
}
$rep->closeCursor();
return $nb;   
}


function noteminmatclaseva($idmat,$idcl,$eval,$trim,$an){


$v="SELECT MIN(note) AS n  FROM note WHERE  idcl='".$idcl."' AND typeval='".$eval."'
AND trimestre='".$trim."' AND matiere='".$idmat."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}

function noteminGPEeva($idcl,$eval,$idgroup,$an){


$v="SELECT MIN(notegroup) AS n FROM notegroupeval WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function noteminGPEtrim($idcl,$trim,$idgroup,$an){


$v="SELECT MIN(notegroup) AS n FROM notegrouptrim WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}





function notemaxGPEeva($idcl,$eval,$idgroup,$an ){


$v="SELECT MAX(notegroup) AS n FROM notegroupeval WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND eval='".$eval."' AND rg!=' ' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}





function notemaxGPEtrim($idcl,$trim,$idgroup,$an ){


$v="SELECT MAX(notegroup) AS n FROM notegrouptrim WHERE  idcl='".$idcl."' AND 
idgroup='".$idgroup."' AND trimestre='".$trim."' AND anens='".$an."' " ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
 $nb=$donnee['n'];   
}
$rep->closeCursor();
return $nb;   
}



function minmoyEval($idcl,$an,$eval,$trim){ 


$v="SELECT  MIN(moyeval) AS n   FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."' AND rgeval!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}



function minmoytrim($idcl,$an,$trim){ 


$v="SELECT  MIN(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."' AND idcl='".$idcl."' AND 
  codetrim='".$trim."' AND rgtrim!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function minmoyan($idcl,$an){ 



$v="SELECT  MIN(moyan) AS n   FROM  moyenneannuel  WHERE anens='".$an."' AND idcl='".$idcl."'  AND rgan!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function maxmoyan($idcl,$an){ 


$v="SELECT  MAX(moyan) AS n   FROM  moyenneannuel WHERE anens='".$an."' AND idcl='".$idcl."' AND 
   rgan!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}




function maxmoytrim($idcl,$an,$trim){ 


$v="SELECT  MAX(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."' AND idcl='".$idcl."' AND 
  codetrim='".$trim."' AND rgtrim!= ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function maxmoyEval($idcl,$an,$eval,$trim){  


$v="SELECT  MAX(moyeval) AS n   FROM  moyenne WHERE anens='".$an."' AND idcl='".$idcl."' AND 
codeval='".$eval."' AND codetrim='".$trim."'   AND rgeval != ' '" ;
$reponse = $bdda->query($v);
$i=0;   
while ($donnees = $reponse->fetch() )
{
  $nb=$donnees['n'];
} 
$reponse->closeCursor(); 
 return $nb;
}


function familleleve($idparent,$mat,$an){  

$true=0;
$v="SELECT *  FROM parenteleve  WHERE anelev='".$an."'";
$reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch() )
 {
 if($donnees['matelev']==$mat AND $donnees['idparent']==$idparent){
  $true=$donnees['idpaele'];
 } 
} 
$reponse->closeCursor();
return $true;   
 }
 
 

 ?>