<?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require '../lienC.php'; require '../lesfunctions.php';
function copiedossier($orig,$dest){
    $dir=dir($orig);

            fclose($cop);
            fclose($fp);
        }
    }
    $dir->close();
}
if(isset($_POST['modifvar'])){ 
    $nometab=$_POST['nometab'];$numetab=$_POST['numetab'];$villetab=$_POST['villetab'];
    $qtieretab=$_POST['qtieretab']; 
   $lien=$_POST['lien'];$lienparent=$_POST['lienparent'];$user=$_SESSION['util'];$motp=$_SESSION['mtp'];
   $lien="../".$lien;
   $lienparent="../".$lienparent;




    $server="localhost";
    $benutzer="root";
    $passwort="";
   
    $diffdossier1=difflien($lien,$lienparent);
    if($diffdossier1==0){
        
           //copie dossier  
            if(!file_exists($lien) AND !file_exists($lienparent)){ 
                $nometab=$_POST['nometab'];$numetab=$_POST['numetab'];$villetab=$_POST['villetab'];
                $qtieretab=$_POST['qtieretab']; $_SESSION['nomadm']=$_SESSION['nomsimpl'];
                $_SESSION['lien']=$_POST['lien'];$_SESSION['lienparent']=$_POST['lienparent'];$_SESSION['user']=$_SESSION['util'];
                $_SESSION['motp']=$_SESSION['mtp']; $_SESSION['liencomplet']="http://localhost/ETAB2022_2023/AGAES/".$_SESSION['lien'];
                $_SESSION['liencompletparent']="http://localhost/ETAB2022_2023/AGAES/".$_SESSION['lienparent'];
                $_SESSION['typus']=$_POST['type'];
                if($_SESSION['typus']==1){
                    $baseoriginal="bddeclic";
                }
                if($_SESSION['typus']==2){
                    $baseoriginal="college1test";
                }
                  //année en cours
                  $v="SELECT * FROM anne";
                  $reponse = $bd->query($v);
                     while ($donnees = $reponse->fetch())
                     {$idlu=$donnees['idannee']; 
                         $lu=$donnees['annee']; 
                    } 
                     $reponse->closeCursor(); 
                  $annee=$lu;$IDannee=$idlu;
                  //fin année en cours


                  //debut gestion base de doonnées  
         
        $idEtab=$_SESSION['lieugpe'];
        $req=$bd->prepare('INSERT INTO etablier(idetabl,nometab,numetab,villetab,qtieretab,nomadm,numadm,lien,lienparent,user,motp)
          VALUES(?,?,?,?,?,?,?,?,?,?,?)');
         $req->execute(array($idEtab,$nometab,$numetab,$villetab,$qtieretab,$_SESSION['nomadm'],' ',$_SESSION['lien'],$_SESSION['lienparent']
        ,$_SESSION['user'],$_SESSION['motp'])); 
        $idEtablier=$bd->lastInsertId();
        $dp=date('d'); $mp=date('m'); $ap=date('Y'); 
        if($mp==12){ $ap=$ap+1; $mpnew='01'; }  if($mp!=12){ $mpnew=$mp+1; }
           if(strlen($mpnew)==1) {
            $mpnew="0".$mpnew;
           }

        $newdateproro=$ap.".".$mpnew.".".$dp;
         $datedeb=date('Y.m.d');
        $req=$bd->prepare('INSERT INTO inscrit(cout,totalavance,datedeb,dateproro,idetabl,idleiter,idas)
          VALUES(?,?,?,?,?,?,?)');
         $req->execute(array('0','0',$datedeb,$newdateproro,$idEtablier,'1',$IDannee)); 

         $req=$bd->prepare('INSERT INTO lesbases(nom) VALUES(?)');
         $req->execute(array('baseagaes')); 
         $idlesbases=$bd->lastInsertId(); 
         $nombase="serveur"."baseagaes".$idlesbases;

         $r="CREATE DATABASE ".$nombase;
         $req=$bdda->query($r);
         $r="UPDATE etablier SET base='".$nombase."' WHERE idetablier='".$idEtablier."'";
         $req=$bd->query($r);

         $v="SHOW TABLES FROM ".$baseoriginal;
	     $reponse = $bdda->query($v);
		while ($donnees = $reponse->fetch())
		{
            // copie la table admin de la base college1test dans base fougeres
            $r="CREATE TABLE ".$nombase.".".$donnees[0]." LIKE ".$baseoriginal.".".$donnees[0];
            $req=$bdda->query($r);
            $r="INSERT ".$nombase.".".$donnees[0]." SELECT * FROM ".$baseoriginal.".".$donnees[0];
            $req=$bdda->query($r);
            
		} 
			$reponse->closeCursor(); 
           //fin gestion base de doonnées 


                
                 
                //copie dossier personnel etabl
                mkdir($lien,0777);
                if($_SESSION['typus']==1){
                    copiedossier("../AGAES_ETAB_PRI",$lien);
                }
                if($_SESSION['typus']==2){
                    copiedossier("../AGAES_ETAB",$lien);
                }
                
               $dirconnect=$lien."/lien.php";
               $texte="<?php
               function host(){
           
                   /host='mysql:host=".$server.";dbname=".$nombase."';
                   return /host; 
               }
                
               function UTIL(){
                 
                   /UTIL='".$benutzer."';
                   return /UTIL;
               }
               function mtp(){
                
                   /mtp='".$passwort."';
                   return /mtp;
               }
               ?>";
               $texte=str_replace("/","$",$texte);
                $fpo=fopen($dirconnect,"w");
                fwrite($fpo,$texte);
                    // fin copie dossier personnel etabl

                   //copie dossier parent etabl
                   mkdir($lienparent,0777);
                   if($_SESSION['typus']==1){
                    copiedossier("../PARENTS_PRI",$lienparent);
                }
                if($_SESSION['typus']==2){
                    copiedossier("../PARENTS",$lienparent);
                }
                   
                  $dirconnect=$lienparent."/lien.php";
                  $texte="<?php
                  function host(){
              
                      /host='mysql:host=".$server.";dbname=".$nombase."';
                      return /host; 
                  }
                   
                  function UTIL(){
                    
                      /UTIL='".$benutzer."';
                      return /UTIL;
                  }
                  function mtp(){
                   
                      /mtp='".$passwort."';
                      return /mtp;
                  }
                  ?>";
                  $texte=str_replace("/","$",$texte);
                   $fpo=fopen($dirconnect,"w");
                   fwrite($fpo,$texte);
                    

                  //fin copie dossier parent etabl
                  


                   
            $r="UPDATE lien SET idetabl='".$idEtab."' WHERE id='1'";
            $req=$bdc->query($r);
            $r="UPDATE lien SET idetablier='".$idEtablier."' WHERE id='1'";
            $req=$bdc->query($r);
                   $req = $bdc->prepare
            ('INSERT INTO admin(nom,mtpasse,user,genre,numtel,anens,verrou
            ,id_etab,sup,cni,intrus,migrer) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,? )'); 
                $req->execute(array($_SESSION['nomadm'],$_SESSION['motp'],$_SESSION['user'],'M',' ',$annee,'0',
            '0','0',' ','0','1'));  
            $idadmin2=$bdc->lastInsertId();  
            $req = $bdc->prepare('INSERT INTO admin_poste(idadmin,idposte,anens,sup) 
              VALUES(?,?,?,? )'); 
               $req->execute(array($idadmin2,'1',$annee,'0' )); 
               $req = $bdc->prepare
               ('INSERT INTO admin_salaire(idadmin,salaire,anens) 
               VALUES(?,?,?)'); 
                $req->execute(array($idadmin2,' ',$annee));
                $req = $bdc->prepare
                ('INSERT INTO prorogation(date) 
                VALUES(?)'); 
                 $req->execute(array($newdateproro));
               }
            // fin copie dossier personnel etabl
   
header('location:deplacer.php');
             
    }

}
?>