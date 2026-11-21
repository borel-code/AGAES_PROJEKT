<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0){ 



    function serveurfremd(){

     $true=0;$host=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $host= $donnees['serveur'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $host;
       }



    function basefremd(){

     $true=0;$host=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $host= $donnees['basedonnees'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $host;
       }
    
    
    
       function userfremd(){

     $true=0;$host=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $host= $donnees['user'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $host;
       }
    
       function mtpfremd(){

     $true=0;$host=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $host= $donnees['mtp'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $host;
       }

    

       function cnidaminautr($cni){
        
       $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
  

     } 
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



       function existmmpostautr($id,$idposte){
        
        $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
   

      } 
      $true=0;
      $v="SELECT * FROM admin_poste  WHERE   sup ='0' AND anens='".$_SESSION['annee']."'";
      $reponse = $bdda->query($v);
         while ($donnees = $reponse->fetch() AND $true==0)
         {
             if($donnees['idadmin']==$id AND $donnees['idposte']==$idposte){ 
               $true=$donnees['id'];
             }
         } 
         $reponse->closeCursor(); 
         return $true;
        }



        function postemaxextadmin($id,$an){
            $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
   

      } 
         $true=0;
         $v="SELECT * FROM admin_poste  WHERE sup ='0' ORDER BY idposte";
         $reponse = $bdda->query($v);
            while ($donnees = $reponse->fetch() AND $true==0)
            {
                if($donnees['idadmin']==$id AND $donnees['anens']==$an){ 
                  $true=$donnees['idposte'];
                }
            } 
            $reponse->closeCursor(); 
            return $true;
           }
         


 
       $hst="mysql:host=".serveurfremd().";dbname=".basefremd();


 




    function lien_migration_ext(){

     $true=0;$migrer=" ";
     $v="SELECT * FROM lien  WHERE  ici ='1' ";
         $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['actif']==0 ){ 
                $migrer= $donnees['lien'];
               
            $true=1	;
            }
        } 
        $reponse->closeCursor(); 
        return $migrer;
       }

       function veriextdamin($user,$mot){
        $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
   

     } 
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
   
       function cniextdamin($cni){
        $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
   

     } 
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
    
       function idaminext($user,$mot){
        $hst="mysql:host=".serveurfremd().";dbname=".basefremd();
   

     } 
     $true=0;
     $v="SELECT * FROM admin  WHERE   sup ='0'";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch() AND $true==0)
        {
            if($donnees['user']==$user AND $donnees['mtpasse']==$mot AND $donnees['verrou']=='0'){ 
              $true=$donnees['id'];
            }
        } 
        $reponse->closeCursor(); 
        return $true;
       }

$cniexistautr=cnidaminautr($_SESSION['cni']);
if($cniexistautr==0){//il n'éxiste pas ds l'autre établissement
    $nom=nomsimple($bdda,$_SESSION['id']);
    $genre=$_SESSION['genreadmin'];
    $cni=$_SESSION['cni'];   
        $statut=0;
        $mtp=$_SESSION['mtp']; 
        $user=$_SESSION['util'];
        $tel=$_SESSION['tel'];
       // $salaire=$_POST['montant'];
        $cni=$_SESSION['cni'];
        $idadmin=veriextdamin($user,$mtp);
        $cnidadmin=cniextdamin($cni);
        if($idadmin==0 AND $cnidadmin==0 ){
            $intrus=0;
            if($_SESSION['code']==50){
                $intrus=1;
            }
            $req = $bdda->prepare
            ('INSERT INTO admin(nom,mtpasse,user,genre,numtel,anens,verrou
            ,id_etab,sup,cni,intrus,migrer) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,? )'); 
            $req->execute(array($nom,$mtp,$user,$genre,$tel,$_SESSION['annee'],'0',
        '0','0',$cni,$intrus,'1')); 
        if($_SESSION['code']!=50){
        $idadmin2=idaminext($user,$mtp);
        $req = $bdda->prepare('INSERT INTO admin_poste($bdda,idadmin,idposte,anens,sup) 
    VALUES(?,?,?,? )'); 
    $req->execute(array($idadmin2,$_SESSION['code'],$_SESSION['annee'],'0' )); 
        }

        $_SESSION['MTP']=$_SESSION['mtp'];
        $_SESSION['UTIL']=$_SESSION['util'];
        $mmposte=existmmpostautr($_SESSION['id'],$_SESSION['code']);
        if(isset($_POST['inscripvers'])){
            $_SESSION['id']=$idadmin2;
            if($_SESSION['code']!=50){
            if($mmposte==0){
                $_SESSION['CODE']=postemaxextadmin($_SESSION['id'],$_SESSION['annee']);
                $_SESSION['code']=postemaxextadmin($_SESSION['id'],$_SESSION['annee']);
            }
            if($mmposte!=0){
                $_SESSION['CODE']=$_SESSION['code'];
            }
            $migration=lien_migration_ext();
            $liencomplet="location:".$migration."/inscripold1.php";
             header($liencomplet) ;
          }

          if($_SESSION['code']==50){
             
                $_SESSION['CODE']=$_SESSION['code'];
             
            $migration=lien_migration_ext();
            $liencomplet="location:".$migration."/inscripold1.php";
             header($liencomplet) ;
          }
        }
        else if(isset($_POST['paiemvers'])){
            $_SESSION['id']=$idadmin2;
            if($_SESSION['code']!=50){
            if($mmposte==0){
                $_SESSION['CODE']=postemaxextadmin($_SESSION['id'],$_SESSION['annee']);
            }
            if($mmposte!=0){
                $_SESSION['CODE']=$_SESSION['code'];
            } 
            $migration=lien_migration_ext();
            $liencomplet="location:".$migration."/paiem1.php";
             header($liencomplet) ;
          }
          if($_SESSION['code']==50){
             
            $_SESSION['CODE']=$_SESSION['code'];
         
        $migration=lien_migration_ext();
        $liencomplet="location:".$migration."/paiem1.php";
         header($liencomplet) ;
      }
        }
        else{
            if($_SESSION['code']!=50){
            $migration=lien_migration_ext();
            $liencomplet="location:".$migration."/menufondat.php";
             header($liencomplet) ;
            }
            if($_SESSION['code']==50){
                $migration=lien_migration_ext();
                $liencomplet="location:".$migration."/menuweb.php";
                 header($liencomplet) ;
                }
        }

         
        }
       




}



if($cniexistautr!=0){//il éxiste ds l'autre établissement
  
$nom=nomsimple($bdda,$_SESSION['id']);
    $r="UPDATE admin SET  mtpasse ='".$_SESSION['mtp']."'  WHERE id ='".$cniexistautr."'";
    $req=$bdda->query($r);
    $r="UPDATE admin SET  user ='".$_SESSION['util']."'  WHERE id ='".$cniexistautr."'";
    $req=$bdda->query($r);
    $r="UPDATE admin SET  nom ='".$nom."' WHERE id ='".$cniexistautr."'";
 $req=$bdda->query($r);
$r="UPDATE admin SET  genre ='".$_SESSION['genreadmin']."' WHERE id ='".$cniexistautr."'";
 $req=$bdda->query($r);
 $r="UPDATE admin SET  numtel ='".$_SESSION['tel']."'  WHERE id ='".$cniexistautr."'";
 $req=$bdda->query($r); 
 $r="UPDATE admin SET  migrer ='1' WHERE id ='".$cniexistautr."'";
 $req=$bdda->query($r);
 $_SESSION['MTP']=$_SESSION['mtp'];
 $_SESSION['UTIL']=$_SESSION['util'];
$mmposte=existmmpostautr($_SESSION['id'],$_SESSION['code']);
/*

*/

if(isset($_POST['inscripvers'])){
    if($_SESSION['code']!=50){
    if($mmposte==0){
        $_SESSION['CODE']=postemaxextadmin($_SESSION['id'],$_SESSION['annee']);
    }
    if($mmposte!=0){
        $_SESSION['CODE']=$_SESSION['code'];
    }
    $migration=lien_migration_ext();
    $liencomplet="location:".$migration."/inscripold1.php";
     header($liencomplet) ;
  }

  if($_SESSION['code']==50){
     
        $_SESSION['CODE']=$_SESSION['code'];
     
    $migration=lien_migration_ext();
    $liencomplet="location:".$migration."/inscripold1.php";
     header($liencomplet) ;
  }
}
else if(isset($_POST['paiemvers'])){
    if($_SESSION['code']!=50){
    if($mmposte==0){
        $_SESSION['CODE']=postemaxextadmin($_SESSION['id'],$_SESSION['annee']);
    }
    if($mmposte!=0){
        $_SESSION['CODE']=$_SESSION['code'];
    } 
    $migration=lien_migration_ext();
    $liencomplet="location:".$migration."/paiem1.php";
     header($liencomplet) ;
  }
  if($_SESSION['code']==50){
     
    $_SESSION['CODE']=$_SESSION['code'];
 
$migration=lien_migration_ext();
$liencomplet="location:".$migration."/paiem1.php";
 header($liencomplet) ;
}
}
else{
    if($_SESSION['code']!=50){
    $migration=lien_migration_ext();
    $liencomplet="location:".$migration."/menufondat.php";
     header($liencomplet) ;
    }
    if($_SESSION['code']==50){
        $migration=lien_migration_ext();
        $liencomplet="location:".$migration."/menuweb.php";
         header($liencomplet) ;
        }
}


 
}




   
} 
 
 

   ?>