<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2  ) ){ 

    function  vexistposte($id,$an,$poste){

     $true=0;$d=" ";
     $v="SELECT * FROM admin_poste  ";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch()  AND $true==0)
        {
            if($donnees['idadmin']==$id AND $donnees['anens']==$an
            AND $donnees['idposte']==$poste ){ 
              $true=$donnees['id']; 
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }

    function veridamin($user,$mot){

     $true=0;
     $v="SELECT * FROM admin  WHERE   sup ='0'";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['user']==$user AND $donnees['mtpasse']==$mot ){ 
              $true=$donnees['id'];
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }

    function cnidamin($cni){

     $true=0;
     $v="SELECT * FROM admin  WHERE   sup ='0'";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['cni']==$cni){ 
              $true=$donnees['id'];
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }
    



    if(isset($_POST['modifadm'])){
 
$id=$_POST['modifadm'];
 $genre=$_POST['genre'];
 $nom=$_POST['nom'];
 $statut=$_POST['statut'];
 $migrer=$_POST['migrer']; 
 $mtp=$_POST['mtp']; 
 $user=$_POST['user'];
 $tel=$_POST['tel'];
 $salaire=$_POST['montant'];
 $cni=$_POST['cni'];
 $idadmin=veridamin($user,$mtp);
 if($idadmin==0 OR $idadmin==$id){
    $r="UPDATE admin SET  mtpasse ='".$mtp."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
    $r="UPDATE admin SET  user ='".$user."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
 }
 $cnidadmin=cnidamin($cni);
 if($cnidadmin==0 OR $cnidadmin==$cni){
    $r="UPDATE admin SET cni ='".$cni."'  WHERE id ='".$id."'";
    $req=$bdda->query($r);
     
 }
 $r="UPDATE admin SET  nom ='".$nom."' WHERE id ='".$id."'";
 $req=$bdda->query($r);
$r="UPDATE salaireadmin SET  nomens ='".$nom."' WHERE idadmin ='".$id."'";
 $req=$bdda->query($r);
$r="UPDATE admin SET  genre ='".$genre."' WHERE id ='".$id."'";
 $req=$bdda->query($r);
 $r="UPDATE admin SET  numtel ='".$tel."'  WHERE id ='".$id."'";
 $req=$bdda->query($r);
 $r="UPDATE admin SET  verrou ='".$statut."' WHERE id ='".$id."'";
 $req=$bdda->query($r);

 $r="UPDATE admin_salaire SET  salaire ='".$salaire."' WHERE idadmin ='".$id."' AND anens='".$_SESSION['annee']."'";
 $req=$bdda->query($r);
 $r="UPDATE admin SET  migrer ='".$migrer."' WHERE id ='".$id."'";
 $req=$bdda->query($r);


 if(isset($_POST['poste50'])){
    $r="UPDATE admin SET  intrus='1' WHERE id ='".$id."' ";
    $req=$bdda->query($r);
}
if(!isset($_POST['poste50'])){
    $r="UPDATE admin SET  intrus='0' WHERE id ='".$id."' ";
    $req=$bdda->query($r);
}


if($id==$_SESSION['id']){
    $_SESSION['mtp']=$mtp;
    $_SESSION['util']=$user;
    $_SESSION['migrer']=$migrer;
}
    $v1=vexistposte($id,$_SESSION['annee'],'1');
    if($v1==0){
        if(isset($_POST['poste1'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste1'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste1'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste1'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }

    $v1=vexistposte($id,$_SESSION['annee'],'2');
    if($v1==0){
        if(isset($_POST['poste2'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste2'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste2'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste2'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }
 
    $v1=vexistposte($id,$_SESSION['annee'],'3');
    if($v1==0){
        if(isset($_POST['poste3'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste3'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste3'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste3'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }


    $v1=vexistposte($id,$_SESSION['annee'],'4');
    if($v1==0){
        if(isset($_POST['poste4'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste4'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste4'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste4'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }


    $v1=vexistposte($id,$_SESSION['annee'],'5');
    if($v1==0){
        if(isset($_POST['poste5'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste5'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste5'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste5'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }

 

    $v1=vexistposte($id,$_SESSION['annee'],'6');
    if($v1==0){
        if(isset($_POST['poste6'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste6'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste6'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste6'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }

    $v1=vexistposte($id,$_SESSION['annee'],'7');
    if($v1==0){
        if(isset($_POST['poste7'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($id,$_POST['poste7'],$_SESSION['annee'],'0' )); 
         }
     }
    if($v1!=0){
        if(isset($_POST['poste7'])){
            $r="UPDATE admin_poste SET  sup='0' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
        }
        if(!isset($_POST['poste7'])){
            $r="UPDATE admin_poste SET  sup='1' WHERE id ='".$v1."' ";
            $req=$bdda->query($r);
          }
    }
   

$_SESSION['modifadmin']=1;
header('location:enregad.php');
    } 
 

    if(isset($_POST['supadm'])){
        $id=$_POST['supadm'];
        $r="UPDATE admin SET  sup='1' WHERE id ='".$id."' ";
        $req=$bdda->query($r);
        $r="UPDATE admin_poste SET  sup='1' WHERE idadmin ='".$id."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
      $r="UPDATE admin_salaire SET  sup='1' WHERE idadmin ='".$id."' AND anens='".$_SESSION['annee']."'";
      $req=$bdda->query($r);
        $_SESSION['supadmin']=1;
header('location:enregad.php');
    }

    if(isset($_POST['engadm'])){
        $genre=$_POST['genre'];
        $nom=$_POST['nom'];
        $statut=$_POST['statut'];
        $mtp=$_POST['mtp']; 
        $user=$_POST['user'];
        $tel=$_POST['tel'];
        $salaire=$_POST['montant'];
        $cni=$_POST['cni'];
        $migrer=$_POST['migrer'];
        $idadmin=veridamin($user,$mtp);
        $cnidadmin=cnidamin($cni);
        if($idadmin==0 AND $cnidadmin==0 ){
            
            
       
        if(isset($_POST['poste50'])){
            $intrus=1;
            $req = $bdda->prepare
            ('INSERT INTO admin(nom,mtpasse,user,genre,numtel,anens,verrou
            ,id_etab,sup,cni,intrus,migrer) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,? )'); 
                $req->execute(array($nom,$mtp,$user,$genre,$tel,$_SESSION['annee'],'0',
            '0','0',$cni,$intrus,$migrer)); 
        }
        if(!isset($_POST['poste50'])){
            $intrus=0;
            $req = $bdda->prepare
        ('INSERT INTO admin(nom,mtpasse,user,genre,numtel,anens,verrou
        ,id_etab,sup,cni,intrus,migrer) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,? )'); 
            $req->execute(array($nom,$mtp,$user,$genre,$tel,$_SESSION['annee'],'0',
        '0','0',$cni,$intrus,$migrer)); 
        }

       $idadmin2=idamin($user,$mtp);

       $req = $bdda->prepare
       ('INSERT INTO admin_salaire(idadmin,salaire,anens) 
       VALUES(?,?,?)'); 
        $req->execute(array($idadmin2,$salaire,$_SESSION['annee'] )); 
      
        if(isset($_POST['poste1'])){
        $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
    VALUES(?,?,?,? )'); 
    $req->execute(array($idadmin2,$_POST['poste1'],$_SESSION['annee'],'0' )); 
        }
        if(isset($_POST['poste2'])){
         $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($idadmin2,$_POST['poste2'],$_SESSION['annee'],'0' )); 
       }
       if(isset($_POST['poste3'])){
       $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
         $req->execute(array($idadmin2,$_POST['poste3'],$_SESSION['annee'],'0' )); 
        }
         if(isset($_POST['poste4'])){
        $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
    VALUES(?,?,?,? )'); 
    $req->execute(array($idadmin2,$_POST['poste4'],$_SESSION['annee'],'0' )); 
        }

        if(isset($_POST['poste5'])){
            $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
        VALUES(?,?,?,? )'); 
        $req->execute(array($idadmin2,$_POST['poste5'],$_SESSION['annee'],'0' )); 
            }
            if(isset($_POST['poste6'])){
                $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
            VALUES(?,?,?,? )'); 
            $req->execute(array($idadmin2,$_POST['poste6'],$_SESSION['annee'],'0' )); 
                }    
          if(isset($_POST['poste7'])){
        $req = $bdda->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
      VALUES(?,?,?,? )'); 
      $req->execute(array($idadmin2,$_POST['poste7'],$_SESSION['annee'],'0' )); 
        }
$_SESSION['engadmin']=0;
        }


        else{
            $_SESSION['engadmin']=2;
        }

header('location:enregad.php');

    }
    
} 
 
 

   ?>