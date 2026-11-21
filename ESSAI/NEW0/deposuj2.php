<?php 

session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);

// AUSSI ENSEIGNANT
$conneEns=idtl($_SESSION['mtp'],$_SESSION['annee']); 
 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 OR $conneEns!=0 ){ 
  

    if(isset($_POST['send2'])){
$idcl=$_SESSION['clasdepot'] ; // on recupere id classe
$eva=$_POST['eval'];
$idmat=$_POST["matiere"];
$nom=$_FILES["fich"]["name"]; // on recupere le nom de l'image avec son extension
$taille=$_FILES["fich"]["size"];  //optionnelle, mnt vous avez la taille
list($name, $ext) = explode(".", $nom);   // on separe le nom de l'image de son extension    
  
$verif=0;
$verif1=0; 
  
  $ext=".".strtolower($ext); // on rajoute un . devant l'extention
 
  if($ext==".pdf" OR $ext==".doc" OR $ext==".docx" OR $ext==".jpg" OR $ext==".jpeg"
  OR $ext==".png"){
    $verif=1;
  }
  if($taille<=3000000){
     $verif1=1;
  }
  $nb=0;
  $v="SELECT MAX(idsuj) AS n  FROM sujet" ;
  $rep=$bdda->query($v);
  while ($donnee=$rep->fetch())
  {
    $nb=$donnee['n'];   
  }
  $rep->closeCursor();
   
  $matiere=substr(matparid($idmat,$_SESSION['annee']),0,3);
  $classe= classparid($idcl,$_SESSION['annee']) ;
  //$iniannee=substr($_SESSION['annee'],0,4);
  $eval="Eval".$eva;
  $nom=$matiere."_".$nb."_".$classe."_".$eval.$ext;
 $chemin = "sujet/".$nom; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
 
 if($verif==1 AND $verif1==1){
  move_uploaded_file($_FILES["fich"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
  $_SESSION['respenvoi']=1; 

  $date=date('Y-m-d');
 $heur=date('H:i');
  
  $req = $bdda->prepare('INSERT INTO sujet(idmat,idcl,idtrim,
    ideva,nom,extension,anens,typeresp,idresp,datesuj,heuresuj) VALUES(?,?,?,?,?,?,?,?,?,?,? )'); 
  $req->execute(array($idmat,$idcl,$_SESSION['trimdepot'],
  $eva,$nom,$ext,$_SESSION['annee'],'1',$_SESSION['idENS'], $date,$heur
   )); 
}
if($verif==0 OR $verif1==0){
      $_SESSION['respenvoi']=2; 
  }
 
 header('location:depotsuj1.php');
    }



    if(isset($_POST['sendad'])){ 
     $idcl=$_SESSION['clasdepot'] ; // on recupere id classe
      $eva=$_POST['eval'];
      $idmat=$_POST["matiere"];
      $nom=$_FILES["fich"]["name"]; // on recupere le nom de l'image avec son extension
      $taille=$_FILES["fich"]["size"];  //optionnelle, mnt vous avez la taille
      list($name, $ext) = explode(".", $nom);   // on separe le nom de l'image de son extension    
        
      $verif=0;
      $verif1=0; 
        
        $ext=".".strtolower($ext); // on rajoute un . devant l'extention
       
        if($ext==".pdf" OR $ext==".doc" OR $ext==".docx" OR $ext==".jpg" OR $ext==".jpeg"
        OR $ext==".png"){
          $verif=1;
        }
        if($taille<=3000000){
           $verif1=1;
        }
        $nb=0;
        $v="SELECT MAX(idsuj) AS n  FROM sujet" ;
        $rep=$bdda->query($v);
        while ($donnee=$rep->fetch())
        {
          $nb=$donnee['n'];   
        }
        $rep->closeCursor();
         
        $matiere=substr(matparid($idmat,$_SESSION['annee']),0,3);
        $classe= classparid($idcl,$_SESSION['annee']) ;
        //$iniannee=substr($_SESSION['annee'],0,4);
        $eval="Eval".$eva;
        $nom=$matiere."_".$nb."_".$classe."_".$eval.$ext;
       $chemin = "sujet/".$nom; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
       
       if($verif==1 AND $verif1==1){
        move_uploaded_file($_FILES["fich"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
        $_SESSION['respenvoi']=1; 
      
        $date=date('Y-m-d');
       $heur=date('H:i');
        $req = $bdda->prepare('INSERT INTO sujet(idmat,idcl,idtrim,
          ideva,nom,extension,anens,typeresp,idresp,datesuj,heuresuj) VALUES( ?,?,?,?,?,?,?,?,?,?,? )'); 
        $req->execute(array($idmat,$idcl,$_SESSION['trimdepot'],
        $eva,$nom,$ext,$_SESSION['annee'],2,$_SESSION['id'], $date,$heur
         )); 
      }
      if($verif==0 OR $verif1==0){
            $_SESSION['respenvoi']=2; 
        }
       
       header('location:deposuj1ad.php');
          }
      


    if(isset($_POST['sup'])){
      $id=$_POST['sup'];
      $nom=$_POST['nomsuj'];
      $rdw="UPDATE sujet SET sup='1' WHERE idsuj='".$id."'";
      $reqdw=$bdda->query($rdw);
      $dir="sujet/".$nom;
      unlink($dir);
      header('location:depotsuj1.php');
    }


    if(isset($_POST['supad'])){
      $id=$_POST['supad'];
      $nom=$_POST['nomsuj'];
      $rdw="UPDATE sujet SET sup='1' WHERE idsuj='".$id."'";
      $reqdw=$bdda->query($rdw);
      $dir="sujet/".$nom;
      unlink($dir);
      header('location:deposuj1ad.php');
    }

    if(isset($_POST['supini'])){
      $id=$_POST['sup'];
      $nom=$_POST['nomsuj'];
      $rdw="UPDATE sujet SET sup='1' WHERE idsuj='".$id."'";
      $reqdw=$bdda->query($rdw);
      $dir="sujet/".$nom;
      unlink($dir);
      header('location:deposuj.php');
    }

    if(isset($_POST['telech'])){
       
      $nom=$_POST['telech'];  
      $filename="sujet/".$nom;
      header("Content-Type:application/force-download");
      header("Content-Disposition:attachement; filename='".$nom."'");
       readfile($filename);
    //  header('location:deposuj1.php');
    }


 }
?>