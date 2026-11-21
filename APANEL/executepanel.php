<?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require '../lesmenusac.php';  require '../connecterC.php'; require '../lesfunctions.php';



    $server="localhost";
    $benutzer="root";
    $passwort="";



 
if(isset($_POST['supproro'])){  
  $idetablier=$_POST['supproro'];
  $cont_tab_dmd=infoschool($bddt,$_SESSION['institut']);
  $tableau=array();
  $tableau=explode('@',$cont_tab_dmd);
    
  if(file_exists("../".$tableau[7])){ 
   
  deletefolder("../".$tableau[7]);
  }
  if(file_exists("../".$tableau[8])){ 
    
    deletefolder("../".$tableau[8]);
  }
 

   $line=lineBD($bddt,$_SESSION['jbase']);
    $table=array();
    $table=explode('@',$line);
    $ubd=$table[3]; $mbd=$table[5]; 

    try 
   {
    $bdc = new PDO("mysql:host=".$server.";dbname=".$_SESSION['jbase'],$ubd,$mbd);  
    } 
    catch(Exception $e) 
    {       
    die('Erreur : '.$e->getMessage());
    }
     
  
     

  $r="DELETE FROM inscrit WHERE idetablier='".$idetablier."'";
    $req=$bddt->query($r);
    $r="UPDATE lesbases SET dispo='0' WHERE nom='".$_SESSION['jbase']."'";
    $req=$bddt->query($r);

    $r="DELETE FROM etablier WHERE idetablier='".$idetablier."'";
    $req=$bddt->query($r);

      $r="TRUNCATE TABLE detail";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE exam";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE autrefraispaye";
            $req=$bdc->query($r);
             $r="TRUNCATE TABLE eleve";
            $req=$bdc->query($r);
            
            $r="TRUNCATE TABLE marktrim1";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE marktrim2";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE marktrim3";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markgrouptrim1";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markgrouptrim2";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markgrouptrim3";
            $req=$bdc->query($r);
             $r="TRUNCATE TABLE markmoytrim1";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markmoytrim2";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markmoytrim3";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markmoyan";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE absence";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE retard";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE fact";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE eleve";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE detail";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE exam";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE autrefraispaye";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE matclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE matclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE matiere";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE matclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);

             $r="TRUNCATE TABLE cordon";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE classe";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE matclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdc->query($r);
             $r="TRUNCATE TABLE marktrim1";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE marktrim2";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE marktrim3";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE markmoytrim1";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE markmoytrim2";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE markmoytrim3";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE marktrim1";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE marktrim2";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE marktrim3";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markgrouptrim1";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE markgrouptrim2";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE markgrouptrim3";
            $req=$bdc->query($r);
              $r="TRUNCATE TABLE markmoyan3";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE enseignant";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE enseigsalaire";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE enseigmatclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE salaire";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE pointage";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE sortie";
            $req=$bdc->query($r);

            $r="TRUNCATE TABLE periode";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE absence";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE retard";
            $req=$bdc->query($r);

            $r="DELETE FROM admin WHERE intrus='0'";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE admin_poste";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE admin_salaire";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE enseignant";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE enseigmatclasse";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE enseigsalaire";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE salaire";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE salaireadmin";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE salle";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE batiment";
            $req=$bdc->query($r);
            $r="TRUNCATE TABLE sujet";
            $req=$bdc->query($r);
            $r="UPDATE prorogation SET date=' '";
            $req=$bdc->query($r);
        
      header('location:bord.php'); 
    
}



if(isset($_POST['modifanch'])){  
   $_SESSION['idatepanel']=$_POST['newan'] ;
    $_SESSION['datepanel']=namean($bddt,$_SESSION['idatepanel']) ;
     header('location:detail.php'); 
    
}



if(isset($_POST['regisbd'])){  
   $namdb=$_POST['nambd'] ; 
   $ensb="u356752624_".$namdb;
   $sort=$_POST['sort'] ; 
   $tb="SELECT * FROM lesbases ORDER BY nom DESC" ;
  $teponse = $bddt->query($tb);
   $true=0;
  while ($tonnees = $teponse->fetch() AND $true==0)
  {
    if($tonnees['nom']==$ensb){
      $true=1;
    }

    } 
  $teponse->closeCursor(); 

  //SV6PduF7v8UDq5S

  if($true==0){
    $req = $bddt->prepare('INSERT INTO lesbases(nom,hostb,userb,mpb,dispo,type)
   VALUES(?,?,?,?,?,? )');   
	$req->execute(array($ensb,$server,$ensb,'SV6PduF7v8UDq5S','0',$sort)); 
   
  }

     header('location:viewbd.php'); 
    
}



if(isset($_POST['modifproro'])){  
  $date=date('Y.m.d');
$heure=date('H:i'); 
  $idinscrit=$_POST['modifproro']; 
  $montant=$_POST['paye'] ;  $newdate=$_POST['daterenouv'] ;
  $totalavance=payeinscri($bddt,$idinscrit);
  $cout=$_POST['cout'] ;
  $mode=1; // ESPECE
  $idleiter=1; // responsable admin
  // $_SESSION['jcout']
$fluxavance=$totalavance+$montant;
if($fluxavance>=0 AND $fluxavance<=$cout){
  $req = $bddt->prepare('INSERT INTO versement(idinscrit,datean,datepro,montant,idas,mode,date,heure,idleiter)
   VALUES(?,?,?,?,?,?,?,?,? )'); 
	$req->execute(array($idinscrit,$_SESSION['jdateproro'],format2($newdate),$montant,$_SESSION['idatepanel'],$mode,$date,$heure,$idleiter )); 
  $r="UPDATE inscrit SET totalavance='".$fluxavance."' WHERE idinscrit='".$idinscrit."'";
    $req=$bddt->query($r);
    $r="UPDATE inscrit SET cout='".$cout."' WHERE idinscrit='".$idinscrit."'";
    $req=$bddt->query($r);
    $r="UPDATE inscrit SET dateproro='".format2($newdate)."' WHERE idinscrit='".$idinscrit."'";
    $req=$bddt->query($r);
 
    $line=lineBD($bddt,$_SESSION['jbase']);
    $table=array();
    $table=explode('@',$line);
    $ubd=$table[3]; $mbd=$table[5]; 


    try 
   {
    $bdc = new PDO("mysql:host=".$server.";dbname=".$_SESSION['jbase'],$ubd,$mbd);  
    } 
    catch(Exception $e) 
    {       
    die('Erreur : '.$e->getMessage());
    }
     
    $r="UPDATE prorogation SET date='".format2($newdate)."'";
    $reqi=$bdc->query($r);
    echo   $r;
}
  
      header('location:detail.php'); 
    
}
?>