<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);

 
 

 


 
//DEB PARCOURS CLASSE
$bordclasidold=array();
 $bordclasnomold=array();
 $l=0;
$b="SELECT *  FROM classe WHERE anens='2022/2023' AND sup='0'";
 $beponse = $bdda->query($b);
 while ($bonnees = $beponse->fetch() )
 {
    $idroom=$bonnees['id'] ;
    $coderoom=$bonnees['code'] ;
    $typeroom=$bonnees['typeEns'] ;
    $cycleroom=$bonnees['cycle'] ;
    $effroom=$bonnees['etab0'] ;
    $categroom=$bonnees['categ'] ;  
     
        $bordclasidold[$l]=$idroom;
        $bordclasnomold[$l]=$coderoom;
        $l++;
 } 
$beponse->closeCursor();

$bordclasidchge=array();
 $bordclasnomchge=array();
 $t=0;
$b="SELECT *  FROM classe WHERE anens!='2022/2023' AND sup='0'";
 $beponse = $bdda->query($b);
 while ($bonnees = $beponse->fetch() )
 {
    $idroom=$bonnees['id'] ;
    $coderoom=$bonnees['code'] ;
    $typeroom=$bonnees['typeEns'] ;
    $cycleroom=$bonnees['cycle'] ;
    $effroom=$bonnees['etab0'] ;
    $categroom=$bonnees['categ'] ;  
     
        $bordclasidchge[$l]=$idroom;
        $bordclasnomchge[$l]=$coderoom;
        for($j=0;$j<$t;$j++) { 
            if($bordclasnomold[$j]==$coderoom){
                echo $bordclasnomold[$j]." 22/23__".$coderoom." <22/23</br>";
                $r="UPDATE detail SET niveauelev='".$bordclasidold[$j]."'  WHERE  niveauelev='".$idroom."'";
                $req=$bdda->query($r);
                $r="UPDATE exam SET niveauelev='".$bordclasidold[$j]."'  WHERE  niveauelev='".$idroom."'";
                $req=$bdda->query($r);
                $r="UPDATE eleve SET niveauelev='".$bordclasidold[$j]."'  WHERE  niveauelev='".$idroom."'";
                $req=$bdda->query($r);
                
            }
            
           
        }

        $t++;
 } 
$beponse->closeCursor();

$r="UPDATE detail SET niveauelev='22'  WHERE  niveauelev=''2NDE-STT'";
$req=$bdda->query($r);
$r="UPDATE exam SET niveauelev='22'  WHERE  niveauelev='2NDE-STT'";
$req=$bdda->query($r);
$r="UPDATE eleve SET niveauelev='22'  WHERE  niveauelev='2NDE-STT'";
$req=$bdda->query($r);
 

//FIN PARCOURS CLASSE




//DEB PARCOURS MATIERE


$bordmatieridold=array();
 $bordmatiernomold=array();
 $am=0;
$b="SELECT *  FROM matiere WHERE anens='2022/2023' AND sup='0'";
 $beponse = $bdda->query($b);
 while ($bonnees = $beponse->fetch() )
 {
    $idroom=$bonnees['id'] ;
    $coderoom=$bonnees['codemat'] ;
     
        $bordmatieridold[$am]=$idroom;
        $bordmatiernomold[$am]=$coderoom;
        $am++;
 } 
$beponse->closeCursor();

 
 

//FIN PARCOURS MATIERE



function exist_enseig3($cni){ 


$vue=0;
$b="SELECT *  FROM enseignant3  ";
 $beponse = $bdda->query($b);
 while ($bonnees = $beponse->fetch() AND $vue==0)
 {
    $CNI=$bonnees['cni'] ;
    if($cni==$CNI){
        $vue=1; 
    }
        
 } 
$beponse->closeCursor();
return $vue;
}


function idmatdanc($code){ 

    
    $vue=0;
    $b="SELECT *  FROM matiere  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
        $CODE=$bonnees['code'] ;
        if($code==$CODE){
            $vue=$bonnees['id'] ; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }

    function idcldanc($code){ 

        
        $vue=0;
        $b="SELECT *  FROM classe  ";
         $beponse = $bdda->query($b);
         while ($bonnees = $beponse->fetch() AND $vue==0)
         {
            $CODE=$bonnees['code'] ;
            if($code==$CODE){
                $vue=$bonnees['id'] ; 
            }
                
         } 
        $beponse->closeCursor();
        return $vue;
        }
    


function exist_enseig($cni){ 

    
    $vue=0;
    $b="SELECT *  FROM enseignant  ";
     $beponse = $bdda->query($b);
     while ($bonnees = $beponse->fetch() AND $vue==0)
     {
        $CNI=$bonnees['cni'] ;
        if($cni==$CNI){
            $vue=1; 
        }
            
     } 
    $beponse->closeCursor();
    return $vue;
    }


    function exist_salaire($idens,$an){ 

        
        $vue=0;
        $b="SELECT *  FROM enseigsalaire  ";
         $beponse = $bdda->query($b);
         while ($bonnees = $beponse->fetch() AND $vue==0)
         {
             
            if($bonnees['idens']==$idens  AND $bonnees['anens']==$an){
                $vue=1; 
            }
                
         } 
        $beponse->closeCursor();
        return $vue;
        }
    

    function exist_enseigmatclasse($idens,$idcl,$idmat){ 

        
        $vue=0;
        $b="SELECT *  FROM enseigmatclasse  ";
         $beponse = $bdda->query($b);
         while ($bonnees = $beponse->fetch() AND $vue==0)
         {
          
            if($bonnees['idens'] ==$idens AND $bonnees['idcl'] ==$idcl AND $bonnees['idmat'] ==$idmat){
                $vue=1; 
            }
                
         } 
        $beponse->closeCursor();
        return $vue;
        }


$ba="SELECT *  FROM enseignant WHERE discipline!=' ' AND supp='0' ";
 $beponsea = $bdda->query($ba);
 while ($bonnees = $beponsea->fetch() )
 {
    $nom=$bonnees['nomens'] ;
    $pnom=$bonnees['prenomens'] ;
    $tel=$bonnees['telens'] ;
    $mot=$bonnees['mtpasse'] ;
    $an=$bonnees['anens'] ;
    $genre=$bonnees['genre'] ;
    $naiss=$bonnees['datens'] ;
    $cni=$bonnees['cni'] ;
    $vue=exist_enseig3($cni);
    if($vue==0){ 
    $req = $bdda->prepare('INSERT INTO enseignant3(nomens, prenomens,  telens,  mtpasse, anens,genre,datens,cni  ) VALUES(?,?,?,?,?, ?,?,? )'); 
    $req->execute(array($nom,$pnom,$tel,$mot ,$an,$genre,$naiss,$cni )); 
  }
        
 } 
$beponsea->closeCursor();


$ba="SELECT *  FROM enseignant3  ORDER BY nomens";
 $beponsea = $bdda->query($ba);
 while ($bonnees = $beponsea->fetch() )
 {
    $nom=$bonnees['nomens'] ;
    $pnom=$bonnees['prenomens'] ;
    $tel=$bonnees['telens'] ;
    $mot=$bonnees['mtpasse'] ;
    $an=$bonnees['anens'] ;
    $genre=$bonnees['genre'] ;
    $naiss=$bonnees['datens'] ;
    $cni=$bonnees['cni'] ;
    $ids=$bonnees['id'] ;
    echo $nom." ".$pnom."  ".$cni."<br>";

    $bax="SELECT *  FROM enseignant WHERE discipline!=' '  AND cni='".$cni."' AND supp='0'  ";
    $beponseax = $bdda->query($bax);
    while ($bonneesx = $beponseax->fetch() )
    { 
        $taux=$bonneesx['taux'] ;
        $salaire=$bonneesx['salaire'] ;
        $anx=$bonneesx['anens'];
        $verisal=exist_salaire($ids,$anx);
        
       if($taux>=1000 AND $salaire<1000){ 
        if($verisal==0){
        echo  $ids."t". $anx." ".$verisal;
        $req = $bdda->prepare('INSERT INTO enseigsalaire(idens,type,valeur,idmonnaie,anens) VALUES(?,?,?,?,? )'); 
        $req->execute(array($ids,'1',$taux,'1',$anx)); 
        }
    } 
         
         if($salaire>=1000 AND $taux<1000){ 
            if($verisal==0){
            echo  $ids."s".$anx." ".$verisal; 
            $req = $bdda->prepare('INSERT INTO enseigsalaire(idens,type,valeur,idmonnaie,anens) VALUES(?,?,?,?,? )'); 
            $req->execute(array($ids,'2',$salaire,'1',$anx)); 
            }
        } 
        
    }
    $beponseax->closeCursor();  



        
 } 
$beponsea->closeCursor();



$ba="SELECT *  FROM enseignant3 ";
 $beponsea = $bdda->query($ba);
 while ($bonnees = $beponsea->fetch() )
 {
    $idE=$bonnees['id'] ;
    $nom=$bonnees['nomens'] ;
    $pnom=$bonnees['prenomens'] ;
    
    $cni=$bonnees['cni'] ;
    $bax="SELECT *  FROM enseignant WHERE discipline!=' ' AND anens='2022/2023' AND cni='".$cni."' AND supp='0'  ";
    $beponseax = $bdda->query($bax);
    while ($bonneesx = $beponseax->fetch() )
    {
        $titul=$bonneesx['titulaire'] ;
        $matiere=$bonneesx['discipline'] ;
        $clas=$bonneesx['nivens'] ;
        $veri=exist_enseigmatclasse($idE,$clas,$matiere); 
       if($veri==0){ 
        $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens,titulaire ) VALUES(?,?,?,?,? )'); 
        $req->execute(array($matiere,$clas,$idE,'2022/2023',$titul)); 
        } 
         
         
    }
    $beponseax->closeCursor();   


    $bax="SELECT *  FROM enseignant WHERE discipline!=' ' AND anens!='2022/2023' AND cni='".$cni."' AND supp='0'  ";
    $beponseax = $bdda->query($bax);
    while ($bonneesx = $beponseax->fetch() )
    { 
        $titul=$bonneesx['titulaire'] ;
        $anx=$bonneesx['anens'];
        $matiere=idmatdanc($bonneesx['discipline']) ;
        $class=idcldanc($bonneesx['nivens'] );
        $veri=exist_enseigmatclasse($idE,$class,$matiere); 
       if($veri==0){ 
        $req = $bdda->prepare('INSERT INTO enseigmatclasse(idmat,idcl,idens,anens,titulaire ) VALUES(?,?,?,?,?  )'); 
        $req->execute(array($matiere,$class,$idE,$anx,$titul)); 
        } 
        
         
    }
    $beponseax->closeCursor();  

     





 } 
$beponsea->closeCursor();



 
$r="DELETE FROM classe WHERE  anens!='2022/2023'";
$req=$bdda->query($r);
$r="DELETE FROM matiere WHERE  anens!='2022/2023'";
$req=$bdda->query($r);

 // DEB ADMINI


 //FIN ADMINI
//header('location:recond.php');

 
?>