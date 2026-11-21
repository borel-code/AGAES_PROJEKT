<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);

 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 

 
//GENERAL

if(isset($_POST['sendg']) AND !empty($_POST['sendg']) AND $_POST['nbre']>=1){
    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='1' ");
    while ($donnees = $reponse->fetch()){                            
       $idcl=$donnees['id'] ; 
       $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
       if($exist==0){
        $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
        $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
       }
        else{
            $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
    } 
    $reponse->closeCursor(); 
    header('location:gestn3.php');
} 

//FIN GENERAL



//COMMERCIAL

if(isset($_POST['sendc']) AND !empty($_POST['sendc']) AND $_POST['nbre']>=1){
    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='2' ");
    while ($donnees = $reponse->fetch()){                            
       $idcl=$donnees['id'] ; 
       $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
       if($exist==0){
        $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
        $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
       }
        else{
            $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
    } 
    $reponse->closeCursor(); 
    header('location:gestn3.php');
} 

//


//INDUSTRIEL

if(isset($_POST['sendi']) AND !empty($_POST['sendi']) AND $_POST['nbre']>=1){
    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='3' ");
    while ($donnees = $reponse->fetch()){                            
       $idcl=$donnees['id'] ; 
       $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
       if($exist==0){
        $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
        $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
       }
        else{
            $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
    } 
    $reponse->closeCursor(); 
    header('location:gestn3.php');
} 

//



//ANGLOPHONE

if(isset($_POST['senda']) AND !empty($_POST['senda']) AND $_POST['nbre']>=1){
    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='4' ");
    while ($donnees = $reponse->fetch()){                            
       $idcl=$donnees['id'] ; 
       $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
       if($exist==0){
        $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
        $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
       }
        else{
            $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
    } 
    $reponse->closeCursor(); 
    header('location:gestn3.php');
} 

//

//tout

if(isset($_POST['sendall']) AND !empty($_POST['sendall']) AND $_POST['nbre']>=1){
    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0'  ");
    while ($donnees = $reponse->fetch()){                            
       $idcl=$donnees['id'] ; 
       $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
       if($exist==0){
        $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
        $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
       }
        else{
            $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
    } 
    $reponse->closeCursor(); 
    header('location:gestn3.php');
} 

//



if(isset($_POST['send']) AND !empty($_POST['send'])){
$classeg=array();$classec=array();$classei=array();$classea=array();

 
 //GNE
if(!empty($_POST['nivensg'])){ 
$classeg=$_POST['nivensg'];
$total=count($classeg); 
if($total>0){
      for($i=0;$i<$total;$i++){
        $idcl=$classeg[$i];  
        $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
        if($exist==0){
         $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
         $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
        }
         else{
             $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
             $req=$bdda->query($r);
         }
      }
    
    }header('location:gestn3.php');
}//

  

//COM
if(!empty($_POST['nivensc'])){ 
    $classec=$_POST['nivensc'];
    $total=count($classec); 
    if($total>0){
          for($i=0;$i<$total;$i++){
            $idcl=$classec[$i];  
            $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
            if($exist==0){
             $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
             $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
            }
             else{
                 $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                 $req=$bdda->query($r);
             }
          }
        
        }header('location:gestn3.php');
    }//





//IND
if(!empty($_POST['nivensi'])){ 
    $classei=$_POST['nivensi'];
    $total=count($classei); 
    if($total>0){
          for($i=0;$i<$total;$i++){
            $idcl=$classei[$i];  
            $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
            if($exist==0){
             $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
             $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
            }
             else{
                 $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                 $req=$bdda->query($r);
             }
          }
        
        }header('location:gestn3.php');
    }//   
    
    
//ANGL
if(!empty($_POST['nivensa'])){ 
    $classea=$_POST['nivensa'];
    $total=count($classea); 
    if($total>0){
          for($i=0;$i<$total;$i++){
            $idcl=$classea[$i];  
            $exist=existnbreval($bdda,$idcl,3,$_SESSION['annee']);
            if($exist==0){
             $req = $bdda->prepare('INSERT INTO evaltrim(idcl,codetrim,nbre,anens,sup) VALUES(?,?,?,?,? )'); 
             $req->execute(array($idcl,3,$_POST['nbre'],$_SESSION['annee'],'0'));
            }
             else{
                 $r="UPDATE evaltrim SET nbre='".$_POST['nbre']."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                 $req=$bdda->query($r);
             }
          }
        
        }header('location:gestn3.php');
    }//       


//TRIMESTRE 2







    //

}





}
?>