<?php 
 
 set_time_limit(2000);

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



                       function idnational($bdda,$mat,$an){

                        $v="SELECT *  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'";
                        $reponse = $bdda->query($v);
                           
                         while ($donnees = $reponse->fetch())
                         {
                            return $donnees['idnational'] ;
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

                           function noteeleveva($bdda,$matri,$idcl,$matier,$eval,$trim,$an){// 

                          
                          $v="SELECT *  FROM  note WHERE anens='".$an."' AND typeval='".$eval."' AND idcl='".$idcl."' AND
                           matiere='".$matier."' AND trimestre='".$trim."' " ;
                          $reponse = $bdda->query($v);
                          $i=0;  $val=" ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matricule']==$matri){
                            $val=$donnees['note'];
                            $i=1; 
                          }
                          } 
                          $reponse->closeCursor(); 
                           if($i==1){
                               $val=$val;
                           }
                           else{
                            $verif=effectcompomat($bdda,$matier,$idcl,$eval,$trim,$an);
                            if($verif>=1){
                                $val="N.C";
                            }
                            else{
                                $val=" ";
                            }        
                           }
                           return $val;
                          } 




                          function verifmoymatrim($bdda,$idcl,$matiere,$trim,$an){//  

                            
                          $i=0;  $som=0;
                          $v="SELECT id,idcl,matiere,trimestre,anens FROM moymatieretrim 
                            WHERE   idcl='".$idcl."'
                          AND trimestre='".$trim."' AND anens='".$an."'";
                          $reponse = $bdda->query($v);
                          $i=0;$tr=0;
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            if($donnees['matiere']==$matiere){
                              $tr=$donnees['id'];
                             $i=1;
                            }
                            
                          } 
                          $reponse->closeCursor(); 
                           return $tr;
                          }




                          function noteelevetrim($bdda,$matri,$idcl,$matier,$trim,$an){// 

                          
                          $v="SELECT *  FROM  notetrimestre WHERE anens='".$an."'   AND idcl='".$idcl."' AND
                           matiere='".$matier."' AND trimestre='".$trim."' " ;
                          $reponse = $bdda->query($v);
                          $i=0;  $val=" ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matricule']==$matri){
                            $val=$donnees['note'];
                            $i=1; 
                          }
                          } 
                          $reponse->closeCursor(); 
                        /*  if($i==1){
                               $val=$val;
                           }
                           else{
                            
                            $verif=verifmoymatrim($idcl,$matier,$trim);
                            if($verif==1){
                                $val="N.C";
                            }
                            else{
                                $val=" ";
                            }        
                           } */
                           return $val;
                          } 
                          





                          function notecoefeleveva($bdda,$matri,$idcl,$matier,$eval,$trim,$an){// 

                          
                          $v="SELECT *  FROM  note WHERE anens='".$an."' AND typeval='".$eval."' AND idcl='".$idcl."' AND
                           matiere='".$matier."' AND trimestre='".$trim."' " ;
                          $reponse = $bdda->query($v);
                          $i=0;  $val=" ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matricule']==$matri){
                            $val=$donnees['nc'];
                            $i=1; 
                          }
                          } 
                          $reponse->closeCursor(); 
                            
                           return $val;
                          }  
                          
                          

                          function notecoefelevetrim($bdda,$matri,$idcl,$matier,$trim,$an){// 

                          
                          $v="SELECT *  FROM  notetrimestre WHERE anens='".$an."'  AND idcl='".$idcl."' AND
                           matiere='".$matier."' AND trimestre='".$trim."' " ;
                          $reponse = $bdda->query($v);
                          $i=0;  $val=" ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matricule']==$matri){
                            $val=$donnees['nc'];
                            $i=1; 
                          }
                          } 
                          $reponse->closeCursor(); 
                            
                           return $val;
                          }  

  


                          function  moyclmat($bdda,$idcl,$matier,$eval,$trim,$an){//return note gpe en une eval d& eleve

                          
                          $v="SELECT * FROM
                             moymatiereval   WHERE  idcl='".$idcl."' AND 
                          trimestre='".$trim."' AND eval='".$eval."' AND anens='".$an."'" ;
                          $reponse = $bdda->query($v);
                          $i=0;  $not= " ";  $cps= " ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matiere']==$matier){
                             $not=$donnees['moy'];
                             $cps=$donnees['compose'];
                              $i=1;
                          }
                          } 
                          $reponse->closeCursor(); 
                          if($cps==0){
                               $not=" ";
                          }
                          else{
                            $not=$not;
                           }
                           return $not;
                          }
                          

                          function visuelnote($note){
                            $note=trim($note,"00");
                            $note=trim($note,".");
                             return $note;
                        }


                          function  pctclmat($bdda,$idcl,$matier,$eval,$trim,$an){//return note gpe en une eval d& eleve

                          
                          $v="SELECT * FROM
                             pourcentagematiereval    WHERE  idcl='".$idcl."' AND 
                          trimestre='".$trim."' AND eval='".$eval."' AND anens='".$an."'" ;
                          $reponse = $bdda->query($v);
                          $i=0;  $not= " ";  $cps= " ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matiere']==$matier){
                             $not=$donnees['pct'];
                             $cps=$donnees['compose'];
                              $i=1;
                          }
                          } 
                          $reponse->closeCursor(); 
                          if($cps==0){
                               $not=" ";
                          }
                          else{
                            $not=visuelnote($not)."%";
                           }
                           return $not;
                          }





                          function  pctclmatrim($bdda,$idcl,$matier, $trim,$an){//return note gpe en une eval d& eleve

                          
                          $v="SELECT * FROM
                             pourcentagematieretrim    WHERE  idcl='".$idcl."' AND 
                          trimestre='".$trim."' AND anens='".$an."'" ;
                          $reponse = $bdda->query($v);
                          $i=0;  $not= " ";  $cps= " ";
                          while ($donnees = $reponse->fetch() AND $i==0)
                          {
                            
                          if($donnees['matiere']==$matier){
                             $not=$donnees['pct'];
                             $cps=$donnees['compose'];
                              $i=1;
                          }
                          } 
                          $reponse->closeCursor(); 
                          if($cps==0){
                               $not=" ";
                          }
                          else{
                            $not=visuelnote($not)."%";
                           }
                           return $not;
                          }
                          



 

                           



function professeurtitul($bdda,$idcl){

    $vei="SELECT *  FROM enseignant WHERE id_etab='0' AND supp='0' AND titulaire='1'";
    $hes=" "; $i=0;
      $reponse = $bdda->query($vei); 
      while ($donnee = $reponse->fetch() AND $i==0)
      {
        if($donnee['nivens']==$idcl){
          
           $genre = $donnee['genre'];
            if($genre=="F"){
          $hes="Mme <I>".$donnee['nomens']." ".$donnee['prenomens']."</I>";
          
         }
               else{
                  $hes="M . <I>".$donnee['nomens']." ".$donnee['prenomens']."</I>";
          
             } 
             $i=1;
         }
      }
      $reponse->closeCursor();
      return $hes;
}




function  rgeleveva($bdda,$matri,$idcl,$eval,$trim,$an){ 

  
  $v="SELECT matricule,idcl,codetrim,codeval,rgeval,moyeval,anens FROM
     moyenne    WHERE  idcl='".$idcl."' AND 
  codetrim='".$trim."' AND codeval='".$eval."' AND anens='".$an."'" ;
  $reponse = $bdda->query($v);
  $i=0;  $not= " ";  $cps= " ";
  while ($donnees = $reponse->fetch() AND $i==0)
  {
    
  if($donnees['matricule']==$matri){
     $not=$donnees['rgeval'];
      $i=1;
  }
  } 
  $reponse->closeCursor(); 
  if($not!=" " AND !empty($not)){
    if($not==1){
      $not=$not."<sup>er(e)</sup>";
      }
      else{
        $not=$not."<sup>e</sup>";
         }
  
  }
  else{
    $not= "NC";
   }
   return $not;
  }
  

  function  moyeleveva($bdda,$matri,$idcl,$eval,$trim,$an){ 

  
  $v="SELECT matricule,idcl,codetrim,codeval,rgeval,moyeval,anens FROM
     moyenne    WHERE  idcl='".$idcl."' AND 
  codetrim='".$trim."' AND codeval='".$eval."' AND anens='".$an."'" ;
  $reponse = $bdda->query($v);
  $i=0;  $not= " ";  $cps= " ";
  while ($donnees = $reponse->fetch() AND $i==0)
  {
    
  if($donnees['matricule']==$matri){
     $not=$donnees['moyeval'];
      $i=1;
  }
  } 
  $reponse->closeCursor(); 
   
   return $not;
  }







  function myenneklaseva($bdda,$idcl,$eva,$trim,$an){//  

  
  $v="SELECT  matricule,moyeval,rgeval, idcl,codeval,codetrim,anens  FROM moyenne  
  WHERE codetrim='".$trim."' AND idcl='".$idcl."'
          AND codeval='".$eva."' AND anens='".$an."' ORDER BY  moyeval DESC";
     $reponse = $bdda->query($v);
      $totalmoy=0;  $moyennecl=" ";$admis=0;$effeclasse=0;  
   while ($donnees = $reponse->fetch())
   {
     
     $MOY=$donnees['moyeval'];
     $RG=$donnees['rgeval'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;$totalmoy+=$MOY; 
        if($MOY>=10){
          $admis++;
        }
    }   
  } 
  $reponse->closeCursor(); 
  if($effeclasse>0){
    $i=Round(($totalmoy/$effeclasse),2);
  }
   return $i;
  }
  



  function myenneklastrim($bdda,$idcl,$trim,$an){//  

  
  $v="SELECT  moytrim,rgtrim,idcl,codetrim,anens  FROM moyennetrim  
  WHERE codetrim='".$trim."' AND idcl='".$idcl."' AND anens='".$an."'";
     $reponse = $bdda->query($v);
      $totalmoy=0;  $moyennecl=" ";$admis=0;$effeclasse=0;  $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     $MOY=$donnees['moytrim'];
     $RG=$donnees['rgtrim'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;$totalmoy+=$MOY; 
        if($MOY>=10){
          $admis++;
        }
    }   
  } 
  $reponse->closeCursor(); 
  if($effeclasse>0){
    $i=Round(($totalmoy/$effeclasse),2);
  }
   return $i;
  }



  function myenneklasan($bdda,$idcl,$an){//  

  
  $v="SELECT  * FROM moyenneannuel  
  WHERE  idcl='".$idcl."' AND anens='".$an."'";
     $reponse = $bdda->query($v);
      $totalmoy=0;  $moyennecl=" ";$admis=0;$effeclasse=0;  $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     $MOY=$donnees['moyan'];
     $RG=$donnees['rgan'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;$totalmoy+=$MOY; 
        if($MOY>=10){
          $admis++;
        }
    }   
  } 
  $reponse->closeCursor(); 
  if($effeclasse>0){
    $i=Round(($totalmoy/$effeclasse),2);
  }
   return $i;
  }



  function belegklasan($bdda,$idcl,$an){//  

  
  $v="SELECT  * FROM moyenneannuel  
  WHERE  idcl='".$idcl."' AND anens='".$an."'";
     $reponse = $bdda->query($v);
      $totalmoy=0;  $moyennecl=" ";$admis=0;$effeclasse=0;  $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     
     $RG=$donnees['rgan'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;  
        
    }   
  } 
  $reponse->closeCursor(); 
   
   return $effeclasse;
  }







  function myenneklasannuel($bdda,$idcl,$matr,$an){//  pour chaque eleve

  
  $v="SELECT  moytrim,rgtrim,idcl,codetrim,matricule,anens  FROM moyennetrim  
  WHERE  idcl='".$idcl."' AND matricule='".$matr."'  AND anens='".$an."'";
     $reponse = $bdda->query($v);
   $div=0; $totalmoy=0; $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     $MOY=$donnees['moytrim'];
     $totalmoy+=$MOY; 
       $div++;
  } 
  $reponse->closeCursor(); 
  if($div>0){
    $i=Round(($totalmoy/$div),2);
  }
   return $i;
  }





  function myennetrimparelev($bdda,$idcl,$matr,$trim,$an){//  pour chaque eleve

  
  $v="SELECT  moytrim,rgtrim,idcl,codetrim,matricule,anens  FROM moyennetrim  
  WHERE  idcl='".$idcl."' AND matricule='".$matr."' AND codetrim='".$trim."' AND anens='".$an."'";
     $reponse = $bdda->query($v);
   $div=0; $totalmoy=0; $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     $i=$donnees['moytrim'];
    
  } 
  $reponse->closeCursor(); 
   
   return $i;
  }


  function Rgtrimparelev($bdda,$idcl,$matr,$trim,$an){//  pour chaque eleve

  
  $v="SELECT  moytrim,rgtrim,idcl,codetrim,matricule,anens  FROM moyennetrim  
  WHERE  idcl='".$idcl."' AND matricule='".$matr."' AND codetrim='".$trim."' AND anens='".$an."'";
     $reponse = $bdda->query($v);
   $div=0; $totalmoy=0; $i=" ";
   while ($donnees = $reponse->fetch())
   {
     
     $i=$donnees['rgtrim'];
    
  } 
  $reponse->closeCursor(); 
   
   return $i;
  }









  function nombretrimestreperso($bdda,$idcl,$matr,$an){//  

  
  $v="SELECT    idcl, matricule,anens  FROM moyennetrim  
  WHERE  idcl='".$idcl."' AND matricule='".$matr."'  AND anens='".$an."'";
     $reponse = $bdda->query($v);
   $div=0; $totalmoy=0;
   while ($donnees = $reponse->fetch())
   {
     
       $div++;
  } 
  $reponse->closeCursor(); 
  
   return $div;
  }


  function nombretrimestre($bdda,$idcl,$an){

  
  $v="SELECT MAX(codetrim) AS n  FROM moyennetrim WHERE  idcl='".$idcl."' AND anens='".$an."'" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
  {
   $nb=$donnee['n'];   
  }
  $rep->closeCursor();
  return $nb;   
  }







  function belegklaseva($bdda,$idcl,$eva,$trim,$an){//  

  
  $v="SELECT  matricule,moyeval,rgeval, idcl,codeval,anens  FROM moyenne  
  WHERE codetrim='".$trim."' AND idcl='".$idcl."'
          AND codeval='".$eva."'  AND anens='".$an."' ORDER BY  moyeval DESC";
     $reponse = $bdda->query($v);
      $totalmoy=0;  $moyennecl=" ";$admis=0;$effeclasse=0;  
   while ($donnees = $reponse->fetch())
   {
     
     $MOY=$donnees['moyeval'];
     $RG=$donnees['rgeval'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;$totalmoy+=$MOY; 
        
    }   
  } 
  $reponse->closeCursor(); 
  
   return $effeclasse;
  }




?> 