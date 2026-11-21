<html>
<head>  
  <meta charset="utf-8">
</head>
<?php 
 
 set_time_limit(2000);



 function visueldecimal($note){
   if(substr($note,-2)=='00'){ 
      $note=trim($note,"00");
      $note=trim($note,".");
   }
   
       return $note;
  }

 function periode($idpe){
 

     $v="SELECT *  FROM periodesal ";
     $reponse = $bdda->query($v);
       $t=0; $nom=" ";
      while ($donnees = $reponse->fetch() AND $t==0)
      {
          if($donnees['id']==$idpe  ){ 
         $nom=$donnees['nom'];
         $t=1;
          }
       }
      $reponse->closeCursor();
      return $nom;
    } 

 function totalh($cni,$an,$periode){
 

     $v="SELECT *  FROM pointage WHERE id_etab='0' AND an='".$an."'";
     $reponse = $bdda->query($v);
       $t=0; 
      while ($donnees = $reponse->fetch())
      {
          if($donnees['cni']==$cni AND $donnees['idpe']==$periode){ 
         $t=$t+$donnees['heurp'];
          }
       }
      $reponse->closeCursor();
      return $t;
    } 


    function totaluhrglobal($idpe,$an){
 

       $v="SELECT  an,idpe,heurp  FROM pointage WHERE  an='".$an."' ";
       $reponse = $bdda->query($v);
         $t=0; 
        while ($donnees = $reponse->fetch())
        {
            if($donnees['idpe']==$idpe){ 
           $t+=$donnees['heurp'];
            }
         }
        $reponse->closeCursor();
        return $t;
      } 

      function totalsalglobal($idpe,$an){

           $v="SELECT  an,idpe,heurp,taux,fixe FROM pointage WHERE  an='".$an."' ";
           $reponse = $bdda->query($v);
             $t=0; 
            while ($donnees = $reponse->fetch())
            {
                if($donnees['idpe']==$idpe AND $donnees['fixe']==0){ 
               $t+=$donnees['heurp']*$donnees['taux'];
                }
             }
            $reponse->closeCursor();
            return $t;
         } 

         
 


            function verisalfixe($idens,$idpe,$an){
 

                $v="SELECT idens,an,idpe,taux  FROM pointage WHERE  an='".$an."' ";
                $reponse = $bdda->query($v);
                  $t=0; 
                 while ($donnees = $reponse->fetch())
                 {
                     if($donnees['idens']==$idens AND $donnees['idpe']==$idpe AND $donnees['taux']==0){ 
                    $t =1;
                     }
                  }
                 $reponse->closeCursor();
                 return $t;
               } 


               function totalsalglobalfixe($idpe,$an){

                    $v="SELECT  *  FROM enseigsalaire WHERE  anens='".$an."' AND sup='0'";
                    $reponse = $bdda->query($v);
                      $t=0; 
                     while ($donnees = $reponse->fetch())
                     {
                         if($donnees['type']==2){
                           $idens=$donnees['idens'];
                           $veri=verisalfixe($idens,$idpe,$an);
                           if($veri==1){
                              $t+=lohnfixelehr($idens,$idpe,$an);
                           } 
                        
                         }
                      }
                     $reponse->closeCursor();
                     return $t;
                  } 


    function lohnpermonatlehr($idens,$idpe,$an){
 

       $v="SELECT idens,an,idpe,heurp,taux  FROM pointage WHERE  an='".$an."' ";
       $reponse = $bdda->query($v);
         $t=0; 
        while ($donnees = $reponse->fetch())
        {
            if($donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
           $t+=$donnees['heurp']*$donnees['taux'];
            }
         }
        $reponse->closeCursor();
        return $t;
      } 


      function lohnfixelehr($idens,$idpe,$an){
 

          $v="SELECT MAX(fixe) AS n 
          FROM pointage WHERE  an='".$an."' AND idens='".$idens."'
           AND idpe='".$idpe."'";
          $reponse = $bdda->query($v);
            $t=0; 
           while ($donnees = $reponse->fetch())
           {
                $t =$donnees['n'] ;
               
            }
           $reponse->closeCursor();
           return $t;
         } 

      function lohnohnerecu($idpe,$an){
 

          $v="SELECT  * FROM salaire WHERE  an='".$an."' ";
          $reponse = $bdda->query($v);
            $t=0; 
           while ($donnees = $reponse->fetch())
           {
               if($donnees['idpe']==$idpe){ 
              $t+=$donnees['montant'] ;
               }
            }
           $reponse->closeCursor();
           return $t;
         } 

         function lohnohnerecuad($idpe,$an){
 

           $v="SELECT  * FROM salaireadmin WHERE  an='".$an."' ";
           $reponse = $bdda->query($v);
             $t=0; 
            while ($donnees = $reponse->fetch())
            {
                if($donnees['idpe']==$idpe){ 
               $t+=$donnees['montant'] ;
                }
             }
            $reponse->closeCursor();
            return $t;
          } 


      function lohnohneid($idens,$idpe,$an,$idsal){
 

          $v="SELECT  * FROM salaire WHERE  an='".$an."' ";
          $reponse = $bdda->query($v);
            $t=0; 
           while ($donnees = $reponse->fetch())
           {
               if($donnees['id']!=$idsal AND $donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
              $t+=$donnees['montant'] ;
               }
            }
           $reponse->closeCursor();
           return $t;
         } 

         function lohnohneidadmin($idadmin,$idpe,$an,$idsal){
 

           $v="SELECT  * FROM salaireadmin WHERE  an='".$an."' ";
           $reponse = $bdda->query($v);
             $t=0; 
            while ($donnees = $reponse->fetch())
            {
                if($donnees['id']!=$idsal AND $donnees['idadmin']==$idadmin AND $donnees['idpe']==$idpe){ 
               $t+=$donnees['montant'] ;
                }
             }
            $reponse->closeCursor();
            return $t;
          } 

          function lohnbrutadmin($idadmin,$idpe,$an){
 

             $v="SELECT  * FROM salaireadmin WHERE idpe='".$idpe."' AND an='".$an."' ORDER BY datep";
             $reponse = $bdda->query($v);
               $t=0; 
              while ($donnees = $reponse->fetch())
              {
                  if($donnees['idadmin']==$idadmin){ 
                 $t=$donnees['salaire'] ;
                  }
               }
              $reponse->closeCursor();
              return $t;
            } 

            function existlohnadmin($idadmin,$idpe,$an){
 

               $v="SELECT  * FROM salaireadmin WHERE idpe='".$idpe."' AND an='".$an."' ORDER BY datep";
               $reponse = $bdda->query($v);
                 $t=0; 
                while ($donnees = $reponse->fetch() AND $t==0)
                {
                    if($donnees['idadmin']==$idadmin){ 
                   $t=1;
                    }
                 }
                $reponse->closeCursor();
                return $t;
              } 
  
              function totalsalglobaladm($idpe,$an){

                 $v="SELECT  * FROM admin_salaire WHERE sup='0' AND anens='".$an."'";
                 $reponse = $bdda->query($v);
                   $t=0; $sal=0;
                  while ($donnees = $reponse->fetch())
                  {
                     
                        $exist=existlohnadmin($donnees['idadmin'],$idpe,$an);
                        if($exist==0){
                          $sal+=0+salaireeladmin($donnees['idadmin'],$an);
                        }
                        if($exist==1){
                          $sal+=0+lohnbrutadmin($donnees['idadmin'],$idpe,$an);
                        }
                     
                   }
                  $reponse->closeCursor();
                  return $sal;
                } 


            function salaireeladmin($idadmin,$an){
 

               $v="SELECT  * FROM admin_salaire WHERE sup='0' AND anens='".$an."'";
               $reponse = $bdda->query($v);
                 $t=0; $sal=0;
                while ($donnees = $reponse->fetch() AND $t==0)
                {
                    if($donnees['idadmin']==$idadmin){ 
                      $sal=$donnees['salaire'] ;
                      $t=1;
                    }
                 }
                $reponse->closeCursor();
                return $sal;
              } 

         function lohnohnelehr($idens,$idpe,$an){
 

             $v="SELECT  * FROM salaire WHERE  an='".$an."' ";
             $reponse = $bdda->query($v);
               $t=0; 
              while ($donnees = $reponse->fetch())
              {
                  if($donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
                 $t+=$donnees['montant'] ;
                  }
               }
              $reponse->closeCursor();
              return $t;
            } 

            function lohnadminrecept($idadmin,$idpe,$an){
 

               $v="SELECT  * FROM salaireadmin WHERE  an='".$an."' ";
               $reponse = $bdda->query($v);
                 $t=0; 
                while ($donnees = $reponse->fetch())
                {
                    if($donnees['idadmin']==$idadmin AND $donnees['idpe']==$idpe){ 
                   $t+=$donnees['montant'] ;
                    }
                 }
                $reponse->closeCursor();
                return $t;
              } 
  

    function totaluhrperiod($idens,$idpe,$an){
 

       $v="SELECT idens,an,idpe,heurp  FROM pointage WHERE  an='".$an."' ";
       $reponse = $bdda->query($v);
         $t=0; 
        while ($donnees = $reponse->fetch())
        {
            if($donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
           $t+=$donnees['heurp'];
            }
         }
        $reponse->closeCursor();
        return $t;
      } 


      function totaluhrjahr($idens,$an){
 

          $v="SELECT idens,an,idpe,heurp  FROM pointage WHERE  an='".$an."' ";
          $reponse = $bdda->query($v);
            $t=0; 
           while ($donnees = $reponse->fetch())
           {
               if($donnees['idens']==$idens){ 
              $t+=$donnees['heurp'];
               }
            }
           $reponse->closeCursor();
           return $t;
         } 

         function totaligneperiod($idens,$idpe,$an){
 

             $v="SELECT idens,an,idpe FROM pointage WHERE  an='".$an."' ";
             $reponse = $bdda->query($v);
               $t=0; 
              while ($donnees = $reponse->fetch())
              {
                  if($donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
                 $t++;
                  }
               }
              $reponse->closeCursor();
              return $t;
            } 

            function totalignesal($idens,$idpe,$an){
 

                $v="SELECT idens,an,idpe FROM salaire WHERE  an='".$an."' ";
                $reponse = $bdda->query($v);
                  $t=0; 
                 while ($donnees = $reponse->fetch())
                 {
                     if($donnees['idens']==$idens AND $donnees['idpe']==$idpe){ 
                    $t++;
                     }
                  }
                 $reponse->closeCursor();
                 return $t;
               } 
   
               function totalignesalad($idadmin,$idpe,$an){
 

                 $v="SELECT idadmin,an,idpe FROM salaireadmin WHERE  an='".$an."' ";
                 $reponse = $bdda->query($v);
                   $t=0; 
                  while ($donnees = $reponse->fetch())
                  {
                      if($donnees['idadmin']==$idadmin AND $donnees['idpe']==$idpe){ 
                     $t++;
                      }
                   }
                  $reponse->closeCursor();
                  return $t;
                } 


    function idemph($cni,$an,$periode,$date){
 

         $v="SELECT *  FROM pointage WHERE id_etab='0' AND an='".$an."' AND datep='".$date."'";
         $reponse = $bdda->query($v);
           $t=0; 
          while ($donnees = $reponse->fetch())
          {
              if($donnees['cni']==$cni AND $donnees['idpe']==$periode){ 
             $t=$donnees['idempl'];
              }
           }
          $reponse->closeCursor();
          return $t;
        } 

        


        function datemaxP($cni,$an,$periode){

            $v="SELECT MAX(datep) AS n FROM pointage WHERE id_etab='0' AND an='".$an."' AND cni='".$cni."' AND idpe='".$periode."'";
      $rep=$bdda->query($v);
       while($d=$rep->fetch()){
       $nb=$d['n'];
       } 
      $rep->closeCursor();
     return $nb;
        }











 ?>