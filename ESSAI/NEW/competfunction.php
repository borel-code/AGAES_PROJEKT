<?php

function  listcpevaclas($bdda,$matri,$idcl,$matier,$trim,$an){
        

  $v="SELECT matricule,idcl,note,matiere,idcomp,trimestre,anens FROM  notenew WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
    AND anens='".$an."' ORDER BY numero" ;
  $reponse = $bdda->query($v);
  $i=0;   $tab=array(); 
  while ($donnees = $reponse->fetch() )
  {
   if($donnees['matricule']==$matri AND $donnees['matiere']==$matier){
     $mel=$donnees['idcomp'].":".$donnees['note'];
     $tab[$i]=$mel;
     $i++;
   }
  } 
  $reponse->closeCursor(); 
    return $tab;
  } 


  function compevaluee($bdda,$matr,$idmat,$idcl,$trim,$an){//note trimestre en une matière 

  
  $v="SELECT matricule,idcl,note,matiere,idcomp,trimestre,anens  FROM  notenew WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
  AND   matiere='".$idmat."' AND anens='".$an."' AND matricule='".$matr."'" ;
  $reponse = $bdda->query($v);
  $som=0; $mel="a:a"; //$mel=$idcomp.":".$num;
  while ($donnees = $reponse->fetch() )
  {
   $som++; 
  } 
  $reponse->closeCursor(); 
   
  return $som;
   
  }


  function  cptexistclas($bdda,$idcom,$iclas,$an){
        

     $v="SELECT *  FROM competenceclas";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch() AND $t==0)
      {
        if($donnees['idcomp']==$idcom AND $donnees['idclas']==$iclas AND $donnees['anens']==$an){ 
           $t=$donnees['id'];        
            }
       }
      $reponse->closeCursor();
      return $t;
    } 


    function  nomcompetence($bdda,$idcom){
        

       $v="SELECT id,intitule  FROM competence";
       $reponse = $bdda->query($v);
         $t=0;   $n=' ';
        while ($donnees = $reponse->fetch() AND $t==0)
        {
          if($donnees['id']==$idcom){ 
             $t=$donnees['id']; 
             $n=$donnees['intitule'];       
              }
         }
        $reponse->closeCursor();
        return $n;
      } 
  

      function noteETrgmatcompet($bdda,$idmat,$idcl,$comp,$num,$trim,$an,$mat){

      
      $v="SELECT *  FROM  notenew WHERE anens='".$an."' AND idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."' ORDER BY id DESC" ;
      $reponse = $bdda->query($v);
      $true=0;   $tr="a"; $note="a";  $nc="a";
      while ($donnees = $reponse->fetch() AND $true==0)
      {
        
      if($donnees['matiere']==$idmat AND $donnees['idcomp']==$comp  AND $donnees['numero']==$num){
        
        $tr=$donnees['rgeval']; $note=$donnees['note'];$true=1;
      }
      } 
      $reponse->closeCursor(); 
      if($tr==1){
      $tr=$tr."<sup>er(e)</sup>";
      }
      if($tr>1){
        $tr=$tr."<sup>e</sup>";
        }
        
        $resultat=$note.':'.$tr.":".$true;
      return $resultat;
      } 


      function presentETadmiscompet($bdda,$idmat,$idcl,$idcomp,$num,$trim,$an){//effectif admis ayant composé matière 

      
      $v="SELECT *  FROM  notenew WHERE anens='".$an."' AND idcl='".$idcl."' AND
       trimestre='".$trim."' AND idcomp='".$idcomp."'  AND numero='".$num."' AND matiere='".$idmat."' ORDER BY note DESC" ;
      $reponse = $bdda->query($v);
      $i=0;  $j=0;  $som=0; $moy="a";
      while ($donnees = $reponse->fetch() )
      {
        $som=$som+ $donnees['note']; 
      if($donnees['note']>=10){
        
        $i++; 
      }
      if( $donnees['rgeval']!=" " AND !empty($donnees['rgeval'])){
        
        $j++; 
      }
      } 
      $reponse->closeCursor(); 
      if($j>0){
        $moy=Round(($som/$j),2);
      }
      $ens=$j.':'.$i.':'.$moy;
       return $ens;
      }
      
 
      function Nbrevalpartrimcpsenew($bdda,$idmat,$idcl,$trim ,$an){//note trimestre en une matière 

      
      $v="SELECT DISTINCT typeval FROM  notenew WHERE idcl='".$idcl."' AND trimestre='".$trim."' 
      AND   matiere='".$idmat."' AND anens='".$an."' " ;
      $reponse = $bdda->query($v);
      $som=0; $mel="a:a"; //$mel=$idcomp.":".$num;
      while ($donnees = $reponse->fetch() )
      {
       $som++; 
      } 
      $reponse->closeCursor(); 
       
      return $som;
       
      }
 
     
 

      function existshuleva($bdda,$idmat,$idcl,$trim,$matri,$an ){//note trimestre en une matière 

      
      $v="SELECT * FROM  notenew WHERE idcl='".$idcl."'   
          AND anens='".$an."' " ;
      $reponse = $bdda->query($v);
      $som=0;
      while ($donnees = $reponse->fetch() AND $som==0)
      {
        if($donnees['matricule']==$matri AND $donnees['trimestre']==$trim  AND $donnees['matiere']==$idmat){ 
       $som=1; }
      } 
      $reponse->closeCursor(); 
       
      return $som;
       
      }



      function admiscompomatrimnew($bdda,$idmat,$idcl,$trim,$an){//effectif admis ayant composé matière 

     $requis=Nbrevalpartrimcpsenew($bdda,$idmat,$idcl,$trim,$an);
      $v="SELECT matricule,idcl,matiere,trimestre,note,anens  FROM  notetrimestre WHERE  idcl='".$idcl."' AND
       trimestre='".$trim."' AND matiere='".$idmat."' AND anens='".$an."' " ;
      $reponse = $bdda->query($v);
      $i=0;  
      while ($donnees = $reponse->fetch() )
      {
        $requisperso=existshuleva($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
        if($requis>0 AND $requisperso>0){ 
      if($donnees['note']>=10){
        
        $i++; 
      }
    }
      } 
      $reponse->closeCursor(); 
       return $i;
      }

      function nomelcmplet($bdda,$mat,$an){

         $v="SELECT nomelev,preelev,matelev,anelev,id_etab  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
         $reponse = $bdda->query($v);
            $true=0; $nom=" ";
          while ($donnees = $reponse->fetch() AND $true==0)
          {
              $nom=$donnees['nomelev']." ".$donnees['preelev'];
              $true=1;
           }
          $reponse->closeCursor();
          return $nom;
         }

         function presentrimETmoynew($bdda,$idmat,$idcl,$trim,$an){//effectif ayant composé matière 

        $requis=Nbrevalpartrimcpsenew($bdda,$idmat,$idcl,$trim,$an);
        
        $v="SELECT *  FROM  notetrimestre WHERE anens='".$an."' AND idcl='".$idcl."' AND
         trimestre='".$trim."'  ORDER BY note DESC" ;
        $reponse = $bdda->query($v);
        $i=0;  $total=0; $moy="a";
        while ($donnees = $reponse->fetch() )
        {
          
           if($donnees['matiere']==$idmat ){
            $requisperso=existshuleva($bdda,$idmat,$idcl,$trim,$donnees['matricule'],$an);
            if($requis>0 AND $requisperso>0){ 
                $total+=$donnees['note']; 
                  $i++; 
        
               }
            }
        } 
        $reponse->closeCursor(); 
        if($i>0){
          $moy=Round(($total/$i),2);
        }
        
        $ensb=$i.':'.$moy;
        return $ensb;
        }




        function notetraitevalnew($bdda,$idmat,$idcomp,$num,$trim,$an,$mat){//verifie si la matier existe, si oui retourne id de note 

        
        $v="SELECT  id,matricule,matiere,idcomp,numero,trimestre,anens  FROM
          notenew WHERE matricule='".$mat."'  AND  anens='".$an."' AND trimestre='".$trim."'" ;
        $reponse = $bdda->query($v);
        $true=0;   $tr=0;
        while ($donnees = $reponse->fetch() AND $true==0)
        {
          
        if($donnees['matiere']==$idmat AND $donnees['idcomp']==$idcomp AND $donnees['numero']==$num){
          
          $tr=$donnees['id'];$true=1;
        }
        } 
        $reponse->closeCursor(); 
        return $tr;
        } 

        function calculnotetrimnew($bdda,$idmat,$idcl,$trim, $mat,$nbreval,$an){//note trimestre en une matière 

        
        $v="SELECT *  FROM  notenew WHERE idcl='".$idcl."' AND trimestre='".$trim."' AND matricule='".$mat."' AND anens='".$an."' " ;
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

        function newcote($note){
          $val=" ";
          
          if($note>='0' AND $note<10){
            $val="D";
          }
          if($note>=10 AND $note<12){
            $val="C";
          }
          if($note>=12 AND $note<14){
            $val="C+";
          }
          if($note>=14 AND $note<15){
            $val="B";
          }
          if($note>=15 AND $note<16){
            $val="B+";
          }
          if($note>=16 AND $note<18){
            $val="A";
          }
          if($note>=18 AND $note<=20){
            $val="A+";
          }
          return $val;
        }

        function newappr($note){
          $val=" ";
          
          if($note>='0' AND $note<10){
            $val="CNA";
          }
          if($note>=10 AND $note<12){
            $val="CMA/CAA";
          }
          if($note>=12 AND $note<14){
            $val="CA";
          }
          if($note>=14 AND $note<16){
            $val="CBA/CWA";
          }
          if($note>=16 AND $note<=20){
            $val="CTBA/CVWA";
          }
          return $val;
        }

 ?>