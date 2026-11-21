<?php
 
 function testco($a,$b,$c){ 
    $_tab[0]=$a;
    $_tab[1]=$b;
    $_tab[2]=$c; 
  $n=0;
  for($i=0;$i<3;$i++){ 
  if($_tab[$i]!=''){
     $n++;
  }
  }
  
  return $n;
  
  }

  function reste($bdda,$mat,$an){

      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['reste'];
        }
       $reponse->closeCursor();
     }
    
     function Classe($bdda,$mat,$an){

        $v="SELECT *  FROM eleve WHERE  anelev='".$an."'";
        $reponse = $bdda->query($v);
         $true=0; $cout=0;  
         while ($donnees = $reponse->fetch() AND $true==0)
         {
          if($donnees['matelev']==$mat){
            $cout= $donnees['niveauelev'];
            $true=1;
           }
          }
         $reponse->closeCursor();
         return $cout;
       }

             function format($date){
                $a=substr($date,0,4);
                
                $m=substr($date,5,2);
                
                $j=substr($date,8,2);
                
                $dat=$j."/".$m."/".$a;
                return $dat;
                } 

                function DATEmax($bdda,$mat,$an){

                  $v="SELECT MAX(date) AS n  FROM detail WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'" ;
                  $rep=$bdda->query($v);
                  while ($donnee=$rep->fetch())
                  {
                    $nb=$donnee['n'];   
                  }
                  $rep->closeCursor();
                  return $nb;
                  }

                  function idrecuDATEmax($bdda,$mat,$an){

                  $v="SELECT MAX(id) AS n  FROM detail WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'" ;
                  $rep=$bdda->query($v);
                  while ($donnee=$rep->fetch())
                  {
                    $nb=$donnee['n'];   
                  }
                  $rep->closeCursor();
                  return $nb;
                  }

                  function heuridrecuDATEmax($bdda,$mat,$an,$id ){

                     $v="SELECT * FROM detail WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' AND id='".$id."'" ;
                      $reponse = $bdda->query($v);
                         
                       while ($donnees = $reponse->fetch())
                       {
                          return $donnees['heure'];
                        }
                       $reponse->closeCursor();
                     }

         function montantcout($bdda,$mat,$an,$idr){

              $v="SELECT *  FROM detail WHERE id='".$idr."' AND matelev= '".$mat."' AND anelev='".$an."' AND id_etab='0'";
              $reponse = $bdda->query($v);
                 
               while ($donnees = $reponse->fetch())
               {
                  return $donnees['montant'];
                }
               $reponse->closeCursor();
             }

             function datemontant($bdda,$mat,$an,$idr){

                  $v="SELECT *  FROM detail WHERE id= '".$idr."' AND matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                  $reponse = $bdda->query($v);
                     
                   while ($donnees = $reponse->fetch())
                   {
                      return $donnees['date'];
                    }
                   $reponse->closeCursor();
                 }
    


         function cout($bdda,$mat,$an){

              $v="SELECT *  FROM eleve WHERE  anelev='".$an."'";
              $reponse = $bdda->query($v);
               $true=0; $cout=0;  
               while ($donnees = $reponse->fetch() AND $true==0)
               {
                if($donnees['matelev']==$mat){
                  $cout= $donnees['cout'];
                  $true=1;
                 }
                }
               $reponse->closeCursor();
               return $cout;
             }


        function TOTALSCOV($bdda,$mat,$an){

              $v="SELECT *  FROM detail WHERE  anelev='".$an."'";
              $reponse = $bdda->query($v);
               $total=0;  
               while ($donnees = $reponse->fetch())
               {
                if($donnees['matelev']==$mat){
                  $total+= $donnees['montant'];
                }
                }
               $reponse->closeCursor();
               return $total;
             }      
 
             function TOTALSCOV0($bdda,$mat,$an,$idrec){

                $v="SELECT *  FROM detail WHERE  anelev='".$an."'";
                $reponse = $bdda->query($v);
                 $total=0;  
                 while ($donnees = $reponse->fetch())
                 {
                  if($donnees['matelev']==$mat AND $donnees['id']!=$idrec){
                    $total+= $donnees['montant'];
                  }
                  }
                 $reponse->closeCursor();
                 return $total;
               }      
                      




             function nomElev($bdda,$mat,$an){

                  $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                  $reponse = $bdda->query($v);
                     
                   while ($donnees = $reponse->fetch())
                   {
                      return $donnees['nomelev']." ".$donnees['preelev'];
                    }
                   $reponse->closeCursor();
                 }



                 function nomElevuniq($bdda,$mat,$an){

                    $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                    $reponse = $bdda->query($v);
                       
                     while ($donnees = $reponse->fetch())
                     {
                        return $donnees['nomelev'] ;
                      }
                     $reponse->closeCursor();
                   }

                   function preElevuniq($bdda,$mat,$an){

                      $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                      $reponse = $bdda->query($v);
                         
                       while ($donnees = $reponse->fetch())
                       {
                          return $donnees['preelev'] ;
                        }
                       $reponse->closeCursor();
                     }

                     function dateElevuniq($bdda,$mat,$an){

                        $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                        $reponse = $bdda->query($v);
                           
                         while ($donnees = $reponse->fetch())
                         {
                            return $donnees['datelev'] ;
                          }
                         $reponse->closeCursor();
                       }

                       function sexeElevuniq($bdda,$mat,$an){

                          $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                          $reponse = $bdda->query($v);
                             
                           while ($donnees = $reponse->fetch())
                           {
                              return $donnees['sexelev'] ;
                            }
                           $reponse->closeCursor();
                         }

                         function statElevuniq($bdda,$mat,$an){

                            $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
                            $reponse = $bdda->query($v);
                               
                             while ($donnees = $reponse->fetch())
                             {
                                return $donnees['statut'] ;
                              }
                             $reponse->closeCursor();
                           }


  
  function niv($clas){
 

     $v="SELECT *  FROM classe WHERE code= '".$clas."'";
     $reponse = $bdda->query($v);
        
      while ($donnees = $reponse->fetch())
      {
         return $donnees['niveau'];
       }
      $reponse->closeCursor();
    }
 


  function notemin ($an,$eva,$clas,$matiere){

 
  $v="SELECT MIN($matiere) AS n  FROM $eva WHERE id_etab='0' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
  {
    $nb=$donnee['n'];   
  }
  $rep->closeCursor();
 
  return $nb;
  
  }
   
  function notemax ($an,$eva,$clas,$matiere){

  $v="SELECT MAX($matiere) AS n  FROM $eva WHERE id_etab='0' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
  {
    $nb=$donnee['n'];   
  }
  $rep->closeCursor();
  return $nb;
  }
  
  function noteei($dma,$mtr,$an,$eva ){

  $v="SELECT * FROM $eva WHERE id_etab='0' AND matelev='".$mtr."'  AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
  {
      $n=$donnee[$dma];
      return  $n;    
  }
  $rep->closeCursor();
  }
  
  
   function app($a) {
        if( $a>=0 AND $a <10){
    return 'NA';
    }
     if($a>=10 AND $a <15){
    return 'ECA';
    }
     if($a>=15 AND $a <18 ){
    return 'A';}
     if($a>=18 AND $a <=20){
    return 'A+';}
    }
     
    function htrim1($mat,$an){

    $v="SELECT *  FROM eleve WHERE id_etab='0' AND anelev='".$an."' AND matelev='".$mat."'";
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
      
     return $donnees['abs1'];
     
     }
     $reponse->closeCursor(); 
    
    }
     
    
     function htrim2($mat,$an){

   
    $v="SELECT *  FROM eleve WHERE id_etab='0' AND anelev='".$an."' AND matelev='".$mat."'";
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
      $h=$donnees['abs1']+$donnees['abs2'];
     return $h;
     
     }
     $reponse->closeCursor(); 
    
    }
    
    
     function htrim3($mat,$an){

    $v="SELECT *  FROM eleve WHERE id_etab='0' AND anelev='".$an."' AND matelev='".$mat."'";
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
      $h=$donnees['abs1']+$donnees['abs2']+$donnees['abs3'];
     return $h;
     
     }
     $reponse->closeCursor(); 
    
    }
    
    
    
    
    
    
    
    function ens($mat,$clas,$an){

    $v="SELECT *  FROM enseignant WHERE id_etab='0' ";
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
     if($donnees['discipline']==$mat AND $donnees['nivens']== $clas AND $donnees['anens']== $an  AND $donnees['genre']== 'M'){
     return 'M . <I><small>'.$donnees['nomens'].'</small></I>';
     }
     if($donnees['discipline']==$mat AND $donnees['nivens']== $clas AND $donnees['anens']== $an  AND $donnees['genre']== 'F'){
     return 'Mme <I><small>'.$donnees['nomens'].'</small></I>';
     }
     }
     $reponse->closeCursor(); 
   }
   


   
   function notee($dma,$mtr,$an,$eva,$clas){

  $v="SELECT * FROM $eva WHERE id_etab='0' AND matelev='".$mtr."' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
   {
       $n=$donnee[$dma];
	   return  $n;    
   }
   $rep->closeCursor();
 }


 function returnnbrmat($mtr,$an,$eva,$clas){

$v="SELECT * FROM $eva WHERE id_etab='0' AND matelev='".$mtr."' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
$rep=$bdda->query($v);
while ($donnee=$rep->fetch())
{
    $n=$donnee['nbrmat'];
    return  $n;    
}
$rep->closeCursor();
}
 
 
 function nbrmate($an,$eva,$clas){

$v="SELECT * FROM $eva WHERE id_etab='0'  AND niveauelev='".$clas."' AND anelev='".$an."'" ;
$rep=$bdda->query($v);
 
while ($donnee=$rep->fetch())
{
    $matricule=$donnee['matelev'];

         
    $vc="SELECT * FROM $eva WHERE id_etab='0'  AND niveauelev='".$clas."' AND anelev='".$an."' AND matelev='".$matricule."'" ;
    $repc=$bdda->query($vc);
    $t=0;
    while ($donneec=$repc->fetch())
    {
        if(!empty($donneec['d1'])){
            $t++;
            }
            if(!empty($donneec['d2'])){
                $t++;
                }
         if(!empty($donneec['d3'])){
                    $t++;
                }
             if(!empty($donneec['d4'])){
                        $t++;
            }
            if(!empty($donneec['d5'])){
                $t++;
            }      
            if(!empty($donneec['d6'])){
                $t++;
            }
            if(!empty($donneec['d7'])){
                $t++;
            }
            if(!empty($donneec['d8'])){
                $t++;
            }
            if(!empty($donneec['d9'])){
                $t++;
            }
            if(!empty($donneec['d10'])){
                $t++;
            }
            if(!empty($donneec['d11'])){
                $t++;
            }
            if(!empty($donneec['d12'])){
                $t++;
            }
            if(!empty($donneec['d13'])){
                $t++;
            }
            if(!empty($donneec['d14'])){
                $t++;
            }
            if(!empty($donneec['d15'])){
                $t++;
            }
            if(!empty($donneec['d16'])){
                $t++;
            }
            if(!empty($donneec['d17'])){
                $t++;
            }
            if(!empty($donneec['d18'])){
                $t++;
            }
            if(!empty($donneec['d19'])){
                $t++;
            }
            if(!empty($donneec['d20'])){
                $t++;
            }
            if(!empty($donneec['d21'])){
                $t++;
            }
            if(!empty($donneec['d22'])){
                $t++;
            }
            if(!empty($donneec['d23'])){
                $t++;
            }

            $req="UPDATE ".$eva." SET nbrmat ='".$t."' WHERE matelev ='".$matricule."' AND anelev ='".$an."' AND id_etab='0'";
            $repo = $bdda->query($req); 
          }
    $repc->closeCursor();
  
     
             
 }
$rep->closeCursor();

}

 
   
function nbrmatepourtri($an,$eva,$clas){

$v="SELECT * FROM $eva WHERE id_etab='0'  AND niveauelev='".$clas."' AND anelev='".$an."'" ;
$rep=$bdda->query($v);

while ($donnee=$rep->fetch())
{
  $matricule=$donnee['matelev'];

       
  $vc="SELECT * FROM $eva WHERE id_etab='0'  AND niveauelev='".$clas."' AND anelev='".$an."' AND matelev='".$matricule."'" ;
  $repc=$bdda->query($vc);
  $t=0;
  while ($donneec=$repc->fetch())
  {
    if(!empty($donneec['d1nc'])){
      $t++;
      }
      if(!empty($donneec['d2nc'])){
          $t++;
          }
   if(!empty($donneec['d3nc'])){
              $t++;
          }
       if(!empty($donneec['d4nc'])){
                  $t++;
      }
      if(!empty($donneec['d5nc'])){
          $t++;
      }      
      if(!empty($donneec['d6nc'])){
          $t++;
      }
      if(!empty($donneec['d7nc'])){
          $t++;
      }
      if(!empty($donneec['d8nc'])){
          $t++;
      }
      if(!empty($donneec['d9nc'])){
          $t++;
      }
      if(!empty($donneec['d10nc'])){
          $t++;
      }
      if(!empty($donneec['d11nc'])){
          $t++;
      }
      if(!empty($donneec['d12nc'])){
          $t++;
      }
      if(!empty($donneec['d13nc'])){
          $t++;
      }
      if(!empty($donneec['d14nc'])){
          $t++;
      }
      if(!empty($donneec['d15nc'])){
          $t++;
      }
      if(!empty($donneec['d16nc'])){
          $t++;
      }
      if(!empty($donneec['d17nc'])){
          $t++;
      }
      if(!empty($donneec['d18nc'])){
          $t++;
      }
      if(!empty($donneec['d19nc'])){
          $t++;
      }
      if(!empty($donneec['d20nc'])){
          $t++;
      }
      if(!empty($donneec['d21nc'])){
          $t++;
      }
      if(!empty($donneec['d22nc'])){
          $t++;
      }
      if(!empty($donneec['d23nc'])){
          $t++;
      } 
          
        }
  $repc->closeCursor();
  $req="UPDATE ".$eva." SET nbrmat ='".$t."' WHERE matelev ='".$matricule."' AND anelev ='".$an."' AND id_etab='0'";
          $repo = $bdda->query($req); 
   
                
}
$rep->closeCursor();

}
  
 
function triazero($an,$eva,$s){

$v="SELECT *  FROM $eva WHERE id_etab='0' AND anelev='". $_POST['an']."' AND niveauelev='". $s."'" ;
$repons = $bdda->query($v);

while ($donnee = $repons->fetch()) {
$mat=$donnee['matelev'];
 
$requet = "UPDATE ".$eva." SET  total=' ' WHERE id_etab='0' AND niveauelev ='".$s."' AND anelev = '".$an."' AND matelev='".$mat."'" ;
$repon = $bdda->query($requet);

$requet = "UPDATE ".$eva." SET  coef=' ' WHERE id_etab='0' AND niveauelev ='".$s."' AND anelev = '".$an."' AND matelev='".$mat."'" ;
$repon = $bdda->query($requet);

$requet = "UPDATE ".$eva." SET  mtrim=' ' WHERE id_etab='0' AND niveauelev ='".$s."' AND anelev = '".$an."' AND matelev='".$mat."'" ;
$repon = $bdda->query($requet);


 




}
$repons->closeCursor();

}
  
   
   function ef($an,$clas){

  $v="SELECT * FROM eleve WHERE id_etab='0' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  $n=0;
  while ($donnee=$rep->fetch())
   {
       $n++;
	       
   }
   $rep->closeCursor();
   return  $n;
 }



 ?>