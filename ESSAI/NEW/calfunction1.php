<?php
// CALCUL SEQ
function returnmatpourtri ($tabl,$matr,$clas,$ans ){
 

   $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."'  ";
   $reponse = $bdda->query($v);
   $i=0;  
    while ($don = $reponse->fetch() )
    {
       if( $don['matelev']==$matr AND  $don['niveauelev']==$clas ){
        
        $dec1=$don['dec1'];$dec2=$don['dec2'];$dec3=$don['dec3'];
        if($dec1==1 OR $dec2==1 OR $dec3==1){
            $i++;
        }
       }
     }
    $reponse->closeCursor();
     return $i ;
  } 


function nbrmatpourtri($mtr,$an,$tbl,$clas,$dec){

$v="SELECT * FROM $tbl WHERE id_etab='0' AND matelev='".$mtr."' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
$rep=$bdda->query($v);
$i=0;
while ($donnee=$rep->fetch())
{
  $n=$donnee[$dec];
  if($n==1){
    $i++;
  }    
}
$rep->closeCursor();
return $i;
}

// CALCUL MOY SEQ
function totalseq($mtr,$an,$eva,$clas,$ncseq){

$v="SELECT * FROM $eva WHERE id_etab='0' AND matelev='".$mtr."' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
$rep=$bdda->query($v);
$total=0;
while ($donnee=$rep->fetch())
{

  $n=$donnee[$ncseq];
  $total=$total+$n;
}
$rep->closeCursor();
return $total;
}

function coefseq($mtr,$an,$eva,$clas ){

  $v="SELECT * FROM $eva WHERE id_etab='0' AND matelev='".$mtr."' AND niveauelev='".$clas."' AND anelev='".$an."'" ;
  $rep=$bdda->query($v);
  $total=0;
  while ($donnee=$rep->fetch())
  {
  
    $n=$donnee['coef'];
    $total=$total+$n;
  }
  $rep->closeCursor();
  return $total;
  }

  function moyseq($total,$coef){
      if($coef!=0){
          $moy=$total/$coef;
          return $moy;
      }
    
  }
 
  


// retourne la note trim COEFFic en une matiere
  function vuenote($matr,$clas,$ans,$tabl,$matier){


     $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' ";
     $reponse = $bdda->query($v);
       $i=0;  $val='';
      while ($don = $reponse->fetch() AND $i==0)
      {
         if( $don['matelev']==$matr AND $don['codemat']==$matier){
         
           $val=$don['notricoef'];
         $i=1;
         }
       }
      $reponse->closeCursor();
      return  $val;
    } 

    function vuecoef($matr,$clas,$ans,$tabl,$matier){


       $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' ";
       $reponse = $bdda->query($v);
         $i=0;  $val='';
        while ($don = $reponse->fetch() AND $i==0)
        {
           if( $don['matelev']==$matr AND $don['codemat']==$matier){
           
             $val=$don['coef'];
           $i=1;
           }
         }
        $reponse->closeCursor();
        return  $val;
      } 

      
      function cycle($clas){


         $v="SELECT *  FROM classe  ";
         $reponse = $bdda->query($v);
           $i=0;  
          while ($don = $reponse->fetch() AND $i==0)
          {
             if( $don['code']==$clas){
             
               $val=$don['cycle'];
             $i=1;
             }
           }
          $reponse->closeCursor();
          return  $val;
        } 
        
        function vuemoyrang($matr,$clas,$ans,$tabl,$chp){


           $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' ";
           $reponse = $bdda->query($v);
             $i=0;  $val='';
            while ($don = $reponse->fetch() AND $i==0)
            {
               if( $don['matelev']==$matr ){
               
                 $val=$don[$chp];
               $i=1;
               }
             }
            $reponse->closeCursor();
            return  $val;
          } 
       

          function manoteparmatiere($matr,$clas,$ans,$tabl,$eval,$matier,$dec){


             $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
             $reponse = $bdda->query($v);
                
              while ($don = $reponse->fetch())
              {
                 if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
                   $val=$don[$eval];
                    if($don[$dec]==1){ 
                       return $val;
                    }
                    else{
                      return ' ';
                    }
                  }
               }
              $reponse->closeCursor();
              
            } 

   
           // la valeur qu'on veut dans une table NOTE
            function lesvaleursdetable($matr,$clas,$ans,$tabl,$chp,$matier){


               $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
               $reponse = $bdda->query($v);
                 $i=0; 
                while ($don = $reponse->fetch() AND $i==0)
                {
                   if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don['codemat']==$matier){
                     $val=$don[$chp];
                     $i=1;
                     return $val;

                    }
                 }
                $reponse->closeCursor(); 
              } 

              //moyenne Trimestrielle de la classe par matiere
              function moycltriparmatier( $clas,$ans,$tabl, $matier){


                 $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' 
                 AND notricoef !=' ' ";
                 $reponse = $bdda->query($v);
                   $eff=0; $val=0; $mcl=' ';
                  while ($don = $reponse->fetch() )
                  {
                     if($don['codemat']==$matier){
                       $val=$val+$don['notetri']; 
                       $eff++;
                      }
                      
                   }
                  $reponse->closeCursor();
                  if($eff!=0){
                    $mcl= Round($val/$eff,2); 
                  } 
                  else{
                   $mcl=' '; 
                   
                  } 
                  return $mcl;
                } 

           //   echo  moycltriparmatier('1ERE-F3','2021/2022','notetrim1','d19');
                
            //Pourcentage de reussite Trimestrielle de la classe par matiere
            function pctcltriparmatier( $clas,$ans,$tabl, $matier){


               $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' 
               AND notricoef !='' ";
               $reponse = $bdda->query($v);
                 $eff=0; $admis=0;
                while ($don = $reponse->fetch() )
                {
                   if($don['codemat']==$matier){
                     $val=$don['notetri']; 
                     if($val>=10){
                       $admis++;
                     }
                     $eff++;
                    }
                   
                 }
                $reponse->closeCursor();
                if($eff!=0){
                  $pct=Round(($admis*100)/$eff,2);
                } 
                else{
                  $pct='';
                } 
                return $pct;
              } 

 // echo pctcltriparmatier('1ERE-F3','2021/2022','notetrim1','d19');

  // la valeur qu'on veut dans une table groupe
  function valeurgroupeeinElev($matr,$clas,$ans,$tabl,$chp,$dec){


     $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' ";
     $reponse = $bdda->query($v);
       $i=0; 
      while ($don = $reponse->fetch() AND $i==0)
      {
         if( $don['matelev']==$matr AND  $don['niveauelev']==$clas AND $don[$dec]==1){
           $val=$don[$chp];
           $i=1;
           return $val;

          }
       }
      $reponse->closeCursor(); 
    } 
   // echo valeurgroupeeinElev('293','1ERE-F3','2021/2022','groupetrim1','msc','decsc');

   // la valeur qu'on veut dans une table moy 
  function valeurmoyseqinElev($matr,$clas,$ans,$tabl,$chp,$total){


     $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' 
     AND matelev='".$matr."'";
     $reponse = $bdda->query($v);
        
      while ($don = $reponse->fetch() )
      {
         if( $don[$total]!=' ' ){
           $val=$don[$chp];
            
           return $val;

          }
       }
      $reponse->closeCursor(); 
    } 
   // echo  valeurmoyseqinElev('291','1ERE-F3','2021/2022','moytrim1','moy2','total2');

      // la valeur qu'on veut CONCERNANT LE TRIMESTRE dans une table moy 
  function valeurmoyTRIinElev($matr,$clas,$ans,$tabl,$chp){


     $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' 
     AND matelev='".$matr."'";
     $reponse = $bdda->query($v);
        
      while ($don = $reponse->fetch() )
      {
         if( $don['dec']==1 ){
           $val=$don[$chp];
            
           return $val;

          }
       }
      $reponse->closeCursor(); 
    } 
  //  echo  valeurmoyTRIinElev('291','1ERE-F3','2021/2022','moytrim1','moytri');

  function moygeneElev($clas,$ans,$tabl,$chp){


     $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."'";
     $reponse = $bdda->query($v);
      $i=0; $to=0;  
      while ($don = $reponse->fetch() )
      {
         if( $don['dec']==1 ){
           $val=$don[$chp];
            
           $to=$to+$val;
           $i++;

          }
       }
      $reponse->closeCursor(); 
       if($i!=0){
         $moy=Round($to/$i,2);
         return $moy;
       }
        
    } 
    // echo  moygeneElev('1ERE-F3','2021/2022','moytrim1','moytri');


    function valeurannuel($matr,$clas,$ans,$tabl,$chp){


       $v="SELECT *  FROM ".$tabl.  " WHERE id_etab='0' AND anelev='".$ans."' AND niveauelev='".$clas."' 
       AND matelev='".$matr."'";
       $reponse = $bdda->query($v);
           
        while ($don = $reponse->fetch() )
        {
         
             $val=$don[$chp];
              
             return $val;
  
            
         }
        $reponse->closeCursor(); 
      } 
?> 