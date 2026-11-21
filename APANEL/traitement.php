<?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'lesmenusac.php';  require 'connecterC.php';require 'lesfunctions.php';
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
    $qtieretab=$_POST['qtieretab'];$nomadm=$_POST['nomadm'];$numadm=$_POST['numadm'];
   $lien=$_POST['lien'];$lienparent=$_POST['lienparent'];$user=$_POST['user'];$motp=$_POST['motp'];
   



   //BEBUT VERIFICATION SI BD DISPO
   $BDdispo=BDdispo($bddt,$_POST['type']); echo $BDdispo;
    if($BDdispo!="@")  {
    $tabl=array();
    $tabl=explode("@",$BDdispo);
    $idlesbases=$tabl[0];  $nombase=$tabl[1];
    $server=$tabl[2];  $benutzer=$tabl[3];
    $passwort=BDdispopw($bddt);  
      

    $diffdossier1=difflien($lien,$lienparent);
    if($diffdossier1==0){
        
           //copie dossier  
            if(!file_exists($lien) AND !file_exists($lienparent)){ 
                $nometab=$_POST['nometab'];$numetab=$_POST['numetab'];$villetab=$_POST['villetab'];
                $qtieretab=$_POST['qtieretab'];$_SESSION['nomadm']=$_POST['nomadm'];$numadm=$_POST['numadm'];
                $_SESSION['lien']=$_POST['lien'];$_SESSION['lienparent']=$_POST['lienparent'];$_SESSION['user']=$_POST['user'];
                $_SESSION['motp']=$_POST['motp']; $_SESSION['liencomplet']=urlracine().$_SESSION['lien'];
                $_SESSION['liencompletparent']=urlracine().$_SESSION['lienparent'];
                $_SESSION['typus']=$_POST['type'];
                if($_SESSION['typus']==1){
                    $baseoriginal=dataprim();
                }
                if($_SESSION['typus']==2){
                    $baseoriginal=datacol();
                }
                  //année en cours
                  $v="SELECT * FROM lesannees";
                  $reponse = $bddt->query($v);
                  $seeyear=0;
                     while ($donnees = $reponse->fetch() AND $seeyear==0)
                     { $lacatif=$donnees['actif']; 
                        if($lacatif==1){ 
                        $idlu=$donnees['idas']; 
                         $lu=$donnees['nomas']; 
                         $seeyear=1;
                         }
                    } 
                     $reponse->closeCursor(); 
                  $annee=$lu;$IDannee=$idlu;
                  //fin année en cours


                  //debut gestion base de doonnées  
         $req=$bddt->prepare('INSERT INTO etabl(nometab,numetab,villetab,qtieretab,nomadm,numadm,lien,lienparent,user,motp)
          VALUES(?,?,?,?,?,?,?,?,?,?)');
         $req->execute(array($nometab,$numetab,$villetab,$qtieretab,$_SESSION['nomadm'],$numadm,$_SESSION['lien'],$_SESSION['lienparent']
        ,$_SESSION['user'],$_SESSION['motp'])); 
        $idEtab=$bddt->lastInsertId();
        $req=$bddt->prepare('INSERT INTO etablier(idetabl,nometab,numetab,villetab,qtieretab,nomadm,numadm,lien,lienparent,user,motp,base)
          VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
         $req->execute(array($idEtab,$nometab,$numetab,$villetab,$qtieretab,$_SESSION['nomadm'],$numadm,$_SESSION['lien'],$_SESSION['lienparent']
        ,$_SESSION['user'],$_SESSION['motp'],$nombase)); 
        $idEtablier=$bddt->lastInsertId();
        $dp=date('d'); $mp=date('m'); $ap=date('Y'); 
        if($mp==12){ $ap=$ap+1; $mpnew='01'; }  if($mp!=12){ $mpnew=$mp+1; }
           if(strlen($mpnew)==1) {
            $mpnew="0".$mpnew;
           }

        $newdateproro=$ap.".".$mpnew.".".$dp;
         $datedeb=date('Y.m.d');
        $req=$bddt->prepare('INSERT INTO inscrit(cout,totalavance,datedeb,dateproro,idetablier,idleiter,idas)
          VALUES(?,?,?,?,?,?,?)');
         $req->execute(array('0','0',$datedeb,$newdateproro,$idEtablier,'1',$IDannee)); 
         $r="UPDATE lesbases SET dispo='1' WHERE idlesbases='".$idlesbases."'";
         $req=$bddt->query($r);

         
         

         
           //fin gestion base de doonnées 



                //copie dossier personnel etabl
                mkdir($lien,0777);
                if($_SESSION['typus']==1){
                    copiedossier("AGAES_ETAB_PRI",$lien);
                }
                if($_SESSION['typus']==2){
                    copiedossier("AGAES_ETAB",$lien);
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
                    copiedossier("PARENTS_PRI",$lienparent);
                }
                if($_SESSION['typus']==2){
                    copiedossier("PARENTS",$lienparent);
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
                  


                   }
                   
                   if($_SESSION['typus']==1){
                    $contenu=dbprimaire();
                }
                if($_SESSION['typus']==2){
                    $contenu=dbcollege();
                }
              
               $req=$bdc->query($contenu);
               echo $contenu;
            $r="UPDATE lien SET idetabl='".$idEtab."' WHERE id='1'";
            $req=$bdc->query($r);
            $r="UPDATE lien SET idetablier='".$idEtablier."' WHERE id='1'";
            $req=$bdc->query($r);
                   $req = $bdc->prepare
            ('INSERT INTO admin(nom,mtpasse,user,genre,numtel,anens,verrou
            ,id_etab,sup,cni,intrus,migrer) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,? )'); 
                $req->execute(array($_SESSION['nomadm'],$_SESSION['motp'],$_SESSION['user'],'M',$numadm,$annee,'0',
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
   

             
    }
    $_SESSION['DBTRUE']=1;
}else { $_SESSION['DBTRUE']=0;}
    //FIN VERIFICATION SI BD DISPO
        header('location:confirmation.php');
}
?>