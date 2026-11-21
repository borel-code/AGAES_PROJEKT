<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php'; require '../lesmenushoriz2.php'; require '../lesemploi.php';
 

     
 if(isset($_POST['send2'])){
  
  
  function effectif($bdda,$an,$clas){

    $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
    $reponse = $bdda->query($v);
    $true=0;
    while ($donnees = $reponse->fetch() )
    {
     
     if( $donnees['niveauelev']==$clas ){
      $true++;
      } 
      
    } 
    $reponse->closeCursor();
     return $true;   
  }
  
  
  $conneEns=idtl($bdda,$_SESSION['mtp'],$_SESSION['annee']); 
 
  if($conneEns!=0){  
   
        











    $datenreg=$_SESSION['tagabsedit1']; 
      $heurenreg=date('H:i'); 
      $idetab=0;
      $abs="abs".$_SESSION['trimabsedit1'];
      $absd="date".$_SESSION['trimabsedit1'];

      for($j=0;$j<$_SESSION['totaligne'];$j++){
      $req = $bdda->prepare('INSERT INTO  absence(matelev,matiere,anelev, id_etab,trimestre
            ,duree,dateabs,datenreg 
             ,heurenreg,typeutil,idleiter,motensgt,nomenreg ) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,? )'); 
            $req->execute(array(' ',$_SESSION['idmatiere'],$_SESSION['anabsedit1'],
            $idetab,$_SESSION['trimabsedit1'],' ',$_SESSION['periode'][$j],$datenreg,$heurenreg,
            '0',$_SESSION['id'],$_SESSION['idENS'],$_SESSION['nom']));  
             
          }




    $effectif=effectif($bdda,$_SESSION['anabsedit1'],$_SESSION['clasabsedit1']);
    $i=1;  
    while($i<$effectif+1){
        $heur="heure".$i;
        $matri="matricule".$i;
        $justif="justif".$i;
        $matricule=$_SESSION['listabs1'][$i];
        $nomtri="abs".$_SESSION['trimabsedit1']; 
        for($j=0;$j<$_SESSION['totaligne'];$j++){
            $HEURE=$heur.$j; 
             
            $verifschon=verifschonabsence($bdda,$matricule,$_SESSION['anabsedit1'],$_SESSION['trimabsedit1']
            ,$_SESSION['tagabsedit1'],$_SESSION['periode'][$j],$_SESSION['idmatiere']);
            echo $verifschon;
            if(isset($_POST[$HEURE])){ 
              $duree=$_POST[$HEURE];
         

            
            $nomper=nomperiod($bdda,$_SESSION['periode'][$j]);
            $heurencrs=heurelevtri($bdda,$matricule,$_SESSION['anabsedit1'],$nomtri);
           
                   if($verifschon==0){ 
            $req = $bdda->prepare('INSERT INTO  absence(matelev,matiere,anelev, id_etab,trimestre
            ,duree,dateabs,datenreg 
             ,heurenreg,typeutil,idleiter,motensgt,nomenreg ) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,? )'); 
            $req->execute(array($matricule,$_SESSION['idmatiere'],$_SESSION['anabsedit1'],
            $idetab,$_SESSION['trimabsedit1'],$duree,$_SESSION['periode'][$j],$datenreg,$heurenreg,
            '0',$_SESSION['id'],$_SESSION['idENS'],$_SESSION['nom']));  
          
                   }
                 else{
              $r="UPDATE absence SET duree='".$duree."' WHERE id ='".$verifschon."'";
              $reqi=$bdda->query($r);
                 }
          }
          else{
            if($verifschon==0){ 

            }
            else{
              $r="DELETE FROM absence WHERE id ='".$verifschon."'";
              $reqi=$bdda->query($r);
            }

          }
        }

        $alluhrabstri=totalheureabstri($bdda,$matricule,$_SESSION['anabsedit1'],$_SESSION['trimabsedit1'] );
          $r="UPDATE eleve SET  ".$abs."='".$alluhrabstri."' WHERE  matelev= '".$matricule."' AND anelev= '".$_SESSION['anabsedit1']."'";
           $reqi=$bdda->query($r);
        $i++;
    }
     
     
    $rr="DELETE FROM absence    WHERE duree= ' '";
            $reqr=$bdda->query($rr);
   header('location:Presencensg1.php');
  }
}
    ?>