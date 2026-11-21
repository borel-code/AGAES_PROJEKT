<?php  


function typegroupe($param){
 
  if($param=='1' )
 {
   $retour='groupetrim1';
  } 
  if($param=='2' )
 {
   $retour='groupetrim2';
  } 
  if($param=='3' )
 {
   $retour='groupetrim3';
  } 
   
   return $retour;
  } 

function nomtri($param){
 
 if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
{
  $retour='note1';
 } 
 if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
{
  $retour='note2';
 } 
 if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
{
  $retour='note3';
 } 
 if($param=='trim1' OR $param=='trim2' OR $param=='trim3')
{
  $retour='notri';
 } 
  return $retour;
 } 

 function chpmoy($param){
 
  if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
 {
   $retour='moy1';
  } 
  if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
 {
   $retour='moy2';
  } 
  if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
 {
   $retour='moy3';
  } 
  if($param=='trim1' OR $param=='trim2' OR $param=='trim3')
 {
   $retour='moytri';
  } 
  if($param=='annuel')
 {
   $retour='manuel';
  } 
   return $retour;
  } 
 

  function chptotal($bdda,$param){
 
    if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
   {
     $retour='total1';
    } 
    if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
   {
     $retour='total2';
    } 
    if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
   {
     $retour='total3';
    } 
    if($param=='trim1' OR $param=='trim2' OR $param=='trim3')
   {
     $retour='totaltri';
    } 
     
     return $retour;
    } 

    function coftotal($bdda,$param){
 
      if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
     {
       $retour='coef1';
      } 
      if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
     {
       $retour='coef2';
      } 
      if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
     {
       $retour='coef3';
      } 
      if($param=='trim1' OR $param=='trim2' OR $param=='trim3')
     {
       $retour='coeftri';
      } 
       
       return $retour;
      } 

      function chprg($param){
 
        if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
       {
         $retour='rg1';
        } 
        if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
       {
         $retour='rg2';
        } 
        if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
       {
         $retour='rg3';
        } 
        if($param=='trim1' OR $param=='trim2' OR $param=='trim3')
       {
         $retour='rgtri';
        } 
        if($param=='annuel' )
       {
         $retour='rganu';
        } 
         
         return $retour;
        } 
   

 function decision($param){
 
    if($param=='1ere_sequence' OR $param=='4eme_sequence' OR $param=='7eme_sequence')
   {
     $retour='dec1';
    } 
    if($param=='2eme_sequence' OR $param=='5eme_sequence' OR $param=='8eme_sequence')
   {
     $retour='dec2';
    } 
    if($param=='3eme_sequence' OR $param=='6eme_sequence' OR $param=='9eme_sequence')
   {
     $retour='dec3';
    } 
     return $retour;
    } 
   

    function tblemoy($param){

      if($param=='1ere_sequence' OR $param=='2eme_sequence' OR $param=='3eme_sequence' OR $param=='trim1')
     {
       $retour='moytrim1';
      } 
      if($param=='4eme_sequence' OR $param=='5eme_sequence' OR $param=='6eme_sequence'  OR $param=='trim2')
     {
       $retour='moytrim2';
      } 
      if($param=='7eme_sequence' OR $param=='8eme_sequence' OR $param=='9eme_sequence'  OR $param=='trim3')
     {
       $retour='moytrim3';
      } 
       return $retour;
      } 


 function trimestre($param){

     if($param=='1ere_sequence' OR $param=='2eme_sequence' OR $param=='3eme_sequence' OR $param=='trim1')
    {
      $retour='notetrim1';
     } 
     if($param=='4eme_sequence' OR $param=='5eme_sequence' OR $param=='6eme_sequence'  OR $param=='trim2')
    {
      $retour='notetrim2';
     } 
     if($param=='7eme_sequence' OR $param=='8eme_sequence' OR $param=='9eme_sequence'  OR $param=='trim3')
    {
      $retour='notetrim3';
     } 
      return $retour;
     } 

function returnvaleur1($matr,$clas,$ans,$tabl,$eval,$matier){


  $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
  $reponse = $bdda->query($v);
     
   while ($don = $reponse->fetch())
   {
      if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
      $vraitrim=nomtri($eval);
         
            $val=$don[$vraitrim];
            return $val;

      }
    }
   $reponse->closeCursor();
   
 } 

 function returnvaleur2($matr,$clas,$ans,$tabl,$eval,$matier){


      $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
      $reponse = $bdda->query($v);
        $i=0;  $val='';
       while ($don = $reponse->fetch() AND $i==0)
       {
          if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
          $vraitrim=nomtri($eval);
          $vraitrim2=$vraitrim."coef";
            $val=$don[$vraitrim2];
          $i=1;
          }
        }
       $reponse->closeCursor();
       return  $val;
     } 

     function returnvaleur3($matr,$clas,$ans,$tabl,$eval,$matier,$coef){


          $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."'  ";
          $reponse = $bdda->query($v);
          $i=0;
           while ($don = $reponse->fetch() AND $i==0)
           {
             
              if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
                 $val=$don['coef'];
              $i=1;	
              }
             
            }
           $reponse->closeCursor();
           if(!empty($val)){
             $x=$val;	 
           }
           else{
               $x=$coef;
           }
          return $x;
         
         }


         function existence ($matr,$clas,$ans,$tabl,$matier){
 

             $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."'  ";
             $reponse = $bdda->query($v);
             $i=0; $idnote=0;
              while ($don = $reponse->fetch() AND $i==0)
              {
                 if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
                  $i=1;	
                  $idnote=$don['idnote'];
                 }
               }
              $reponse->closeCursor();
               return $idnote;
            } 

         
            function returnvaleurdec($matr,$clas,$ans,$tabl,$eval,$matier){
                 $dec=decision($eval);

                 $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
                 $reponse = $bdda->query($v);
                    
                  while ($don = $reponse->fetch())
                  {
                     if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
                     $vraitrim=nomtri($eval);
                        
                           $val=$don[$dec];
                           return $val;
               
                     }
                   }
                  $reponse->closeCursor();
                  
                } 


            function bonnenote($n,$nc){
                if($nc==0){
                    $vn= '';
                }
                else{
                    $vn=$n;
                }
                return $vn;
            }
         
            function updatecoef ($matr,$clas,$ans,$tabl,$matier){
 

                 $v="SELECT *  FROM ".$tabl. " WHERE id_etab='0' AND anelev='".$ans."'";
                 $reponse = $bdda->query($v);
                 
                  while ($don = $reponse->fetch())
                  {
                     if($don['niveauelev']==$clas AND $don['codemat']==$matier ){
                       $matri=$don['matelev'];
                      
                       $note1=$don['note1']; $note2=$don['note2']; $note3=$don['note3'];
                       $note1nc=$don['note1coef'];$note2nc=$don['note2coef'];$note3nc=$don['note3coef'];
                       $note1ncn=$don['note1coef']*$coef;$note2ncn=$don['note2coef']*$coef;$note3ncn=$don['note3coef']*$coef;
                       if($note1nc !=''){
                          $reqr="UPDATE ".$tabl." SET note1nc ='".$note1ncn."' WHERE matelev ='".$matri."' 
                          AND niveauelev='".$classe."' AND codemat='".$matiere."' AND anelev='".$an."' ";
                          $repor = $bdda->query($reqr);
                       }
                       if($note2nc !=''){
                        $reqr="UPDATE ".$tabl." SET note2nc ='".$note2ncn."' WHERE matelev ='".$matri."' 
                        AND niveauelev='".$classe."' AND codemat='".$matiere."' AND anelev='".$an."' ";
                        $repor = $bdda->query($reqr);
                     }
                     if($note3nc !=''){
                        $reqr="UPDATE ".$tabl." SET note3nc ='".$note3ncn."' WHERE matelev ='".$matri."' 
                        AND niveauelev='".$classe."' AND codemat='".$matiere."' AND anelev='".$an."' ";
                        $repor = $bdda->query($reqr);
                     }


                     }
                      
                   }
                   $reponse->closeCursor();
                }
              
            // Recupérer données table moy      
                function Avoirvaleur ($matr,$clas,$ans,$tabl,$chp){
 

                   $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."'  ";
                   $reponse = $bdda->query($v);
                    $i=0;$val='';
                    while ($don = $reponse->fetch() AND $i==0)
                    {
                       if( $don['matelev']==$matr AND  $don['niveauelev']==$clas ){
                        $i=1;	
                        $val=$don[$chp];
                       }
                     }
                    $reponse->closeCursor();
                     return $val;
                  } 
                  function exprg ($matr){
                      if(!empty($matr)){
                        $val="e";
                      }
                    else{
                      $val=" ";
                    }
                       return $val;
                    } 
                  
                  
                   
        
          ?>
