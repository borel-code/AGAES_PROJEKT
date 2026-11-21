<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);



 $conneEns=idtl($bdda,$_SESSION['mtp'],$_SESSION['annee']); 
 
 if($conneEns!=0){  
    
     $tab=array();
     $Nbrevapartrimcpse=0;
     if(isset($_POST['sendok']) AND $_POST['coef']>=1) { 
        $coef=$_POST['coef'];
     $effectif= $_SESSION['effecremplir'];
     $allmatgrup=count($_SESSION['tableaulistmatgrup']);
  //   $nbreval=nbreval($bdda,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
     for($i=1;$i<=$effectif;$i++){
        $champnote="champ".$i;
        $matricule=$_SESSION['tableaumatricule'][$i];
        $valnote=$_POST[$champnote]; 
        $notemul=$valnote*$coef;
        
            $exist=notetraiteval($bdda,$_SESSION['matiereremplir'],
            $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$matricule);
            if($exist==0){ //n'existe pas
              if($valnote>=0 AND $valnote<=20 AND mb_strlen(trim($valnote))!=0){ //note conforme et aussi non vide
                     $req = $bdda->prepare('INSERT INTO note(matricule,idcl,note,matiere,coef
                    ,nc,typeval,trimestre, rgeval ,anens ) VALUES( ?,?,?,?,?,?,?,?,?,? )'); 
                    $req->execute(array($matricule,$_SESSION['clasremplir'],$valnote,$_SESSION['matiereremplir'],
                    $coef,$notemul,$_SESSION['evalremplir'],$_SESSION['trimremplir'],' ' ,$_SESSION['anremplir'] ));
                }
            }
            else{//éxiste 
              if($valnote>=0 AND $valnote<=20 AND mb_strlen(trim($valnote))!=0){ //note conforme et aussi non vide
                    $r="UPDATE note SET note='".$valnote."' WHERE id='".$exist."'";
                    $req=$bdda->query($r);
                    $r="UPDATE note SET nc='".$notemul."' WHERE id='".$exist."'";
                    $req=$bdda->query($r);
                    $r="UPDATE note SET coef='".$coef."' WHERE id='".$exist."'";
                    $req=$bdda->query($r);

                }
                else{//note non conforme
                    $r="DELETE FROM note WHERE id='".$exist."'";
                    $req=$bdda->query($r);  
                }
            }
            // NOTE TRIMESTRE
            $Nbrevapartrimcpse=Nbrevalpartrimcpse($bdda,$_SESSION['matiereremplir'],$_SESSION['clasremplir'],
            $_SESSION['trimremplir'],$_SESSION['anremplir']);
            $notetrim=calculnotetrim($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'], 
            $_SESSION['trimremplir'], $matricule,$Nbrevapartrimcpse,$_SESSION['anremplir']);
            $notetrimcoef=$notetrim*$coef;  
            $existrim=notetraitrim($bdda,$_SESSION['matiereremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$matricule);
             if($existrim==0){
             
              $req = $bdda->prepare('INSERT INTO notetrimestre(matricule,idcl,note,matiere,coef
              ,nc, trimestre,rgtrim, anens ) VALUES( ?,?,?,?,?,?,?,?,? )'); 
              $req->execute(array($matricule,$_SESSION['clasremplir'],$notetrim,$_SESSION['matiereremplir'],
              $coef,$notetrimcoef, $_SESSION['trimremplir'],' ' ,$_SESSION['anremplir'] ));
             }
             else{
              $r="UPDATE notetrimestre SET note='".$notetrim."' WHERE id='".$existrim."'";
              $req=$bdda->query($r);
              $r="UPDATE notetrimestre  SET nc='".$notetrimcoef."' WHERE id='".$existrim."'";
              $req=$bdda->query($r);
              $r="UPDATE notetrimestre  SET coef='".$coef."' WHERE id='".$existrim."'";
              $req=$bdda->query($r);

             }
            
           //
           //classer l'evaluation
          classereval($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'], 
           $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'] );
           //
           //classer trimestre
           classertrim($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'], 
          $_SESSION['trimremplir'],$_SESSION['anremplir']);
           //

           //SEC 2
          
           //FIN SEC2
     }

//DEB SUPPRIMER LES NOTES DU TRIMSTRES SI AUCUNE COMPETENCE N'EST EVALUEE
if($Nbrevapartrimcpse==0){
  $r="DELETE FROM notetrimestre WHERE matiere='".$_SESSION['matiereremplir']."' AND idcl='".$_SESSION['clasremplir']."' AND trimestre='".$_SESSION['trimremplir']."' AND anens='".$_SESSION['anremplir']."'";
  $req=$bdda->query($r); 
}
// FIN SUPPRIMER LES NOTES DU TRIMSTRES SI AUCUNE COMPETENCE N'EST EVALUEE





    
 


 




$allmatgrup=count($_SESSION['tableaulistmatgrup']);

 
for($i=1;$i<=$effectif;$i++){
    $champnote="champ".$i;
    $matricule=$_SESSION['tableaumatricule'][$i];  
    if($allmatgrup>0){ 
        //DEBUT CALCUL MOY GPE MATIER PAR ELEV A L'EVALUATION
        $totalgroupe=0; $coefgroupe=0; $moy=0; $nbremaminerPERSO=0;$nbremaminerCOLLECT=0;//initial total gpe pour chaq elève
        $decision=" ";
        for($j=1;$j<=$allmatgrup;$j++){
          $tabnccoef=array(); 
          $NCetCOEFevaluation=NCetCOEFevaluation($bdda,$_SESSION['tableaulistmatgrup'][$j],$_SESSION['clasremplir'],
        $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$matricule);
        $tabnccoef=explode(':',$NCetCOEFevaluation);

        $total=$tabnccoef[0]; //NOTE COEFF EN UNE MATIERE
        if($total=='a'){$total=' ';}
        $coef=returncoefevaluation($bdda,$_SESSION['tableaulistmatgrup'][$j] 
        ,$_SESSION['clasremplir'],$_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);

        $coefPERSO=$tabnccoef[1]; 
        if($coefPERSO!=0){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE PAR ELEVE
            $nbremaminerPERSO++;
        }

        if($coef!=" " AND !empty($coef)){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE DS LA CLASSE
            $nbremaminerCOLLECT++;
        }
        $totalgroupe=$totalgroupe+$total;
        $coefgroupe=$coefgroupe+$coef;
      }
      $EXIST=existdsnotegroup($bdda,$matricule,$_SESSION['clasremplir'],$_SESSION['evalremplir']
      ,$_SESSION['gpematiereremplir'],$_SESSION['anremplir']);
      if($coefgroupe>0){//CALCUL MOY
        $moy=$totalgroupe/$coefgroupe;
      }
      if($nbremaminerPERSO>=1 AND $nbremaminerPERSO<=$nbremaminerCOLLECT){//Si on compose au moins une matiere du groupe
        $decision="O";
      }
      echo $moy."</Br>";
      if($EXIST==0){ //qd on ne retrouve le matri pour cette matiere ds notegroupeval
        if(!empty($moy) AND $moy!=" "){
          $req = $bdda->prepare('INSERT INTO notegroupeval (matricule,idcl,anens, 
          notegroup,coef,nc,idgroup,eval,rg ) VALUES( ?,?,?,?,?,?,?,?,?)'); 
          $req->execute(array($matricule,$_SESSION['clasremplir'],$_SESSION['anremplir'],$moy
          ,$coefgroupe,$totalgroupe,$_SESSION['gpematiereremplir'],$_SESSION['evalremplir'],$decision));
          }
      }
      else{
        if(!empty($moy) AND $moy!=" "){
          $r="UPDATE notegroupeval SET notegroup='".$moy."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegroupeval SET coef='".$coefgroupe."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegroupeval SET nc='".$totalgroupe."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegroupeval SET rg='".$decision."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          }
          else{
            $r="DELETE FROM notegroupeval WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          }
      }
      
    //FIN CALCUL MOY MATIER GPE EVALUATION


 //DEBUT CALCUL MOY GPE MATIER PAR ELEV TRIMESTRE
 $totalgroupe=0; $coefgroupe=0; $moy=0; $nbremaminerPERSO=0;$nbremaminerCOLLECT=0;//initial total gpe pour chaq elève
 $decision=" ";
 for($j=1;$j<=$allmatgrup;$j++){
   $tabnccoeftrim=array(); 
   $NCTRIMetCOEF=NCTRIMetCOEF($bdda,$_SESSION['tableaulistmatgrup'][$j] 
 ,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$matricule,$_SESSION['anremplir']);
 $tabnccoeftrim=explode(':',$NCTRIMetCOEF);
 $total=$tabnccoeftrim[0];if($total=='a'){$total=' ';}//NOTE COEFF EN UNE MATIERE
  
 $coef=returncoeftrim($bdda,$_SESSION['tableaulistmatgrup'][$j] 
 ,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'] );
     
 $coefPERSO=$tabnccoeftrim[1];
 $requis=Nbrevalpartrimcpse($bdda,$_SESSION['tableaulistmatgrup'][$j],$_SESSION['clasremplir']
 ,$_SESSION['trimremplir'],$_SESSION['anremplir']);
 $requisperso=NbrevalpartrimcpsePARELEV($bdda,$_SESSION['tableaulistmatgrup'][$j],
 $_SESSION['clasremplir'],$_SESSION['trimremplir'],$matricule,$_SESSION['anremplir']);
 if($coefPERSO!=0 AND $requis==$requisperso){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE PAR ELEVE
     $nbremaminerPERSO++;
 }

 if($coef!=" " AND !empty($coef)){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE DS LA CLASSE
     $nbremaminerCOLLECT++;
 }
 $totalgroupe=$totalgroupe+$total;
 $coefgroupe=$coefgroupe+$coef;
 
}





$EXIST=existdsnotegrouptrim($bdda,$matricule,$_SESSION['clasremplir'], 
$_SESSION['trimremplir'] ,$_SESSION['gpematiereremplir'],$_SESSION['anremplir']);

//inquiet
if($nbremaminerPERSO>=1 AND $nbremaminerPERSO<=$nbremaminerCOLLECT){//Si on compose au moins une matiere du groupe
 $decision="O";
}


$moy=" ";
if($coefgroupe>0){
 $moy=$totalgroupe/$coefgroupe;
}

//NOTE COEFF EN UNE MATIERE

if($EXIST==0){ //qd on ne retrouve le matri pour cette matiere ds notegroupeval
if(!empty($moy) AND $moy!=" "){
$req = $bdda->prepare('INSERT INTO notegrouptrim (matricule,idcl,anens, 
notegroup,coef,nc,idgroup,trimestre,rg ) VALUES( ?,?,?,?,?,?,?,?,?)'); 
$req->execute(array($matricule,$_SESSION['clasremplir'],$_SESSION['anremplir'],$moy
,$coefgroupe,$totalgroupe,$_SESSION['gpematiereremplir'],$_SESSION['trimremplir'],$decision));
}
}
else{
if(!empty($moy) AND $moy!=" "){
$r="UPDATE notegrouptrim SET notegroup='".$moy."' WHERE id='".$EXIST."'";
$req=$bdda->query($r);
$r="UPDATE notegrouptrim SET coef='".$coefgroupe."' WHERE id='".$EXIST."'";
$req=$bdda->query($r);
$r="UPDATE notegrouptrim SET nc='".$totalgroupe."' WHERE id='".$EXIST."'";
$req=$bdda->query($r);
$r="UPDATE notegrouptrim SET rg='".$decision."' WHERE id='".$EXIST."'";
$req=$bdda->query($r);
}
else{
 $r="DELETE FROM notegrouptrim WHERE id='".$EXIST."'";
$req=$bdda->query($r);
}
}


//FIN CALCUL MOY MATIER GPE EVALUATION



    }
   
   
}   





    //CALCUL MATIERE TRIMESTRE

   
/*
    for($i=1;$i<=$effectif;$i++){
        $champnote="champ".$i;
        $matricule=$_SESSION['tableaumatricule'][$i];  
        if($allmatgrup>0){ 
            //DEBUT CALCUL MOY GPE MATIER PAR ELEV TRIMESTRE
            $totalgroupe=0; $coefgroupe=0; $moy=0; $nbremaminerPERSO=0;$nbremaminerCOLLECT=0;//initial total gpe pour chaq elève
            $decision=" ";
            for($j=1;$j<=$allmatgrup;$j++){
              $tabnccoeftrim=array(); 
              $NCTRIMetCOEF=NCTRIMetCOEF($bdda,$_SESSION['tableaulistmatgrup'][$j] 
            ,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$matricule,$_SESSION['anremplir']);
            $tabnccoeftrim=explode(':',$NCTRIMetCOEF);
            $total=$tabnccoeftrim[0];if($total=='a'){$total=' ';}//NOTE COEFF EN UNE MATIERE
             
            $coef=returncoeftrim($bdda,$_SESSION['tableaulistmatgrup'][$j] 
            ,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'] );
                
            $coefPERSO=$tabnccoeftrim[1];
            $requis=Nbrevalpartrimcpse($bdda,$_SESSION['tableaulistmatgrup'][$j],$_SESSION['clasremplir']
            ,$_SESSION['trimremplir'],$_SESSION['anremplir']);
            $requisperso=NbrevalpartrimcpsePARELEV($bdda,$_SESSION['tableaulistmatgrup'][$j],
            $_SESSION['clasremplir'],$_SESSION['trimremplir'],$matricule,$_SESSION['anremplir']);
            if($coefPERSO!=0 AND $requis==$requisperso){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE PAR ELEVE
                $nbremaminerPERSO++;
            }
    
            if($coef!=" " AND !empty($coef)){ //COMPTE LE NBRE DE MATIERE COMPOSE DS GRPE DS LA CLASSE
                $nbremaminerCOLLECT++;
            }
            $totalgroupe=$totalgroupe+$total;
            $coefgroupe=$coefgroupe+$coef;
            
          }



 
          
          $EXIST=existdsnotegrouptrim($bdda,$matricule,$_SESSION['clasremplir'], 
          $_SESSION['trimremplir'] ,$_SESSION['gpematiereremplir'],$_SESSION['anremplir']);

          //inquiet
          if($nbremaminerPERSO>=1 AND $nbremaminerPERSO<=$nbremaminerCOLLECT){//Si on compose au moins une matiere du groupe
            $decision="O";
          }


          $moy=" ";
           if($coefgroupe>0){
            $moy=$totalgroupe/$coefgroupe;
           }

         //NOTE COEFF EN UNE MATIERE
          
         if($EXIST==0){ //qd on ne retrouve le matri pour cette matiere ds notegroupeval
          if(!empty($moy) AND $moy!=" "){
          $req = $bdda->prepare('INSERT INTO notegrouptrim (matricule,idcl,anens, 
          notegroup,coef,nc,idgroup,trimestre,rg ) VALUES( ?,?,?,?,?,?,?,?,?)'); 
          $req->execute(array($matricule,$_SESSION['clasremplir'],$_SESSION['anremplir'],$moy
          ,$coefgroupe,$totalgroupe,$_SESSION['gpematiereremplir'],$_SESSION['trimremplir'],$decision));
          }
        }
        else{
          if(!empty($moy) AND $moy!=" "){
          $r="UPDATE notegrouptrim SET notegroup='".$moy."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegrouptrim SET coef='".$coefgroupe."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegrouptrim SET nc='".$totalgroupe."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          $r="UPDATE notegrouptrim SET rg='".$decision."' WHERE id='".$EXIST."'";
          $req=$bdda->query($r);
          }
          else{
            $r="DELETE FROM notegrouptrim WHERE id='".$EXIST."'";
        $req=$bdda->query($r);
          }
        }
       
         
        //FIN CALCUL MOY MATIER GPE EVALUATION
        }
       
       
    }      
      
     

   //FIN CALCUL MATIERE TRIMESTRE 

*/


    
    


 
//ci-dessus calcul moy grpe matiere eval-trim,classemt matiere evaluation-trimestre







    }

    
}
$_SESSION['remplerfolg']=1;
 header('location:insertnote2Ens.php');
?>