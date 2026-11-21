<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
 require '../lesemploi.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';

 set_time_limit(2000);

 $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
    


function verifierdabord($mat,$jour,$per,$clas,$an){ //verifie si la mat ds cette classe est dja ds cette periode
    

 $v="SELECT *  FROM emploi WHERE an='".$an."' AND class='".$clas."' AND idjour='".$jour."' 
 AND idh='".$per."'";
 $reponse = $bdda->query($v);
 $true=0; $matiere=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $matier=$donnees['matier'] ;
   
  if($matier==$mat){
      $true=$donnees['ide'];  
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}





function matierenplace($jour,$per,$clas,$an){ // mat ds cette classe est dja ds cette periode
    

 $v="SELECT *  FROM emploi WHERE an='".$an."' AND class='".$clas."' AND idjour='".$jour."'";
 $reponse = $bdda->query($v);
 $true=0; $matiere=" ";
 while ($donnees = $reponse->fetch() AND $true==0)
 {
     $idper=$donnees['idh'] ;
   
  if($idper==$per){
      $true=$donnees['ide'];  
  }
  } 
 $reponse->closeCursor(); 
 return $true;
}




$listperiode=array();
$listperiode=$_SESSION['listperiode'];
$nbreperiode=count($listperiode) ;
if($nbreperiode>0){
     for($m=1;$m<=$nbreperiode;$m++){
      $idper=$listperiode[$m];
      $discipline="discipline".$m;
      $idmat=$_POST[$discipline];
      $cniEns=cniensmatier($idmat,$_SESSION['anemploi'],$_SESSION['clasemploi']);
      $deja=dejamatier($idmat,$_SESSION['anemploi'],$_SESSION['clasemploi']);// VERIFIE SI UN ENSG DONNE CETTE MATIERE 
      
      if($deja==1){ //UN ENSEIGNANT DONNE CETTE MATIERE
        $disponible=dispoavt($_SESSION['jouremploi'],$idper,$_SESSION['clasemploi'],
        $_SESSION['anemploi'],$cniEns);   //VERIFIE ENSG DEJA DS UNE AUTRE CLASSE SUR CETTE PERIOD ET CE JOUR
        
        if($disponible==0){ //N'EST PAS DS UNE AUTRE CLASSE POUR CETTE PERIODE ET CE JOUR
            

            $verifierdabord=verifierdabord($idmat,$_SESSION['jouremploi'],$idper,$_SESSION['clasemploi'],
            $_SESSION['anemploi']); //verifie si la mat ds cette classe est dja ds cette periode 
            $matierenplace=matierenplace($_SESSION['jouremploi'],$idper,$_SESSION['clasemploi'],$_SESSION['anemploi']);   //id da periode ds emploi
               if($verifierdabord==0){ // matier N'existe pas
                    if($idmat!=" " AND !empty($idmat)){ // matiere NON vide
                        if($matierenplace==0){ //PAS DE ID LIGNE
                    $req = $bdda->prepare('INSERT INTO emploi(idh,matier,class,an,idjour
                    ,id_etab,cni ) VALUES( ?,?,?,?,?,?,?)'); 
                    $req->execute(array($idper,$idmat,$_SESSION['clasemploi'],
                    $_SESSION['anemploi'],$_SESSION['jouremploi'],'0',$cniEns)); 
                        }
                        else{
                            $r="UPDATE emploi  SET matier='".$idmat."' WHERE ide='".$matierenplace."'";
                            $req=$bdda->query($r);
                            $r="UPDATE emploi  SET cni='".$cniEns."' WHERE ide='".$matierenplace."'";
                            $req=$bdda->query($r);  
                        }

                    }

                    else{ // VIDE
                        $r="DELETE FROM emploi WHERE idh='".$idper."' AND matier='".$idmat."' 
                        AND class='".$_SESSION['clasemploi']."'
                         AND an='".$_SESSION['anemploi']."' AND idjour='".$_SESSION['jouremploi']."' 
                         AND id_etab='0'";
                         $req=$bdda->query($r);
                    }
                }
                else{// matier EXISTE  
                    if($idmat!=" " AND !empty($idmat)){ //MATIERE NON VIDE
                        $r="UPDATE emploi  SET matier='".$idmat."' WHERE ide='".$verifierdabord."'";
                        $req=$bdda->query($r);
                        $r="UPDATE emploi  SET cni='".$cniEns."' WHERE ide='".$verifierdabord."'";
                        $req=$bdda->query($r);
                    }
                    else{ // MATIERE VIDE
                        $r="DELETE FROM emploi WHERE ide='".$verifierdabord."'";
                        $req=$bdda->query($r);
                    }
         
                } 

                echo $matierenplace."</br>";


        
            }}
       else{//UN ENSEIGNANT NE DONNE PAS CETTE MATIERE
         

        $verifierdabord=verifierdabord($idmat,$_SESSION['jouremploi'],$idper,$_SESSION['clasemploi'],
        $_SESSION['anemploi']); //verifie si la mat ds cette classe est dja ds cette periode 
        $matierenplace=matierenplace($_SESSION['jouremploi'],$idper,$_SESSION['clasemploi'],
        $_SESSION['anemploi']);   //id da periode ds emploi
           if($verifierdabord==0){ // matier N'existe pas
                if($idmat!=" " AND !empty($idmat)){ // matiere NON vide
                    if($matierenplace==0){ //PAS DE ID LIGNE
                $req = $bdda->prepare('INSERT INTO emploi(idh,matier,class,an,idjour
                ,id_etab,cni ) VALUES( ?,?,?,?,?,?,?)'); 
                $req->execute(array($idper,$idmat,$_SESSION['clasemploi'],
                $_SESSION['anemploi'],$_SESSION['jouremploi'],'0',$cniEns)); 
                    }
                    else{
                        $r="UPDATE emploi  SET matier='".$idmat."' WHERE ide='".$matierenplace."'";
                        $req=$bdda->query($r);
                        $r="UPDATE emploi  SET cni='".$cniEns."' WHERE ide='".$matierenplace."'";
                        $req=$bdda->query($r);  
                    }

                }

                else{ // VIDE
                    $r="DELETE FROM emploi WHERE idh='".$idper."' AND matier='".$idmat."' 
                    AND class='".$_SESSION['clasemploi']."'
                     AND an='".$_SESSION['anemploi']."' AND idjour='".$_SESSION['jouremploi']."' 
                     AND id_etab='0'";
                     $req=$bdda->query($r);
                }
            }
            else{// matier EXISTE  
                if($idmat!=" " AND !empty($idmat)){ //MATIERE NON VIDE
                    $r="UPDATE emploi  SET matier='".$idmat."' WHERE ide='".$verifierdabord."'";
                    $req=$bdda->query($r);
                    $r="UPDATE emploi  SET cni='".$cniEns."' WHERE ide='".$verifierdabord."'";
                    $req=$bdda->query($r);
                }
                else{ // MATIERE VIDE
                    $r="DELETE FROM emploi WHERE ide='".$verifierdabord."'";
                    $req=$bdda->query($r);
                }
     
            }  






        }  




     }
}
    
}
  header('location:ecriremploi2.php');
?>