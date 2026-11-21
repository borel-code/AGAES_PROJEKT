<?php 

//MODELE 1
 
 $nomcniclientrec=$_FILES["fich1"]["name"]; // on recupere le nom de l'image avec son extension
 $taille=$_FILES["fich1"]["size"];  //optionnelle, mnt vous avez la taille
 list($name, $ext) = explode(".", $nomcniclientrec);   // on separe le nom de l'image de son extension    
$verif=0;
 $verif1=0; 
  $ext=".".strtolower($ext); // on rajoute un . devant l'extention
 if($ext==".jpg" OR $ext==".png" OR $ext==".jpeg" OR $ext==".gif" OR $ext==".tiff" OR $ext==".mpeg"){
     $verif=1;
   }
   if($taille<=10000000){
      $verif1=1;
   }
$nomcniclientrec="logoac.png";
$chemin =$nomcniclientrec; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
if($verif==1 AND $verif1==1){ echo $chemin;
unlink("logoac.png");
move_uploaded_file($_FILES["fich1"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
$_SESSION['respenvoi']=1; 
}





$nomcniclientrec=$_FILES["fich2"]["name"]; // on recupere le nom de l'image avec son extension
 $taille=$_FILES["fich2"]["size"];  //optionnelle, mnt vous avez la taille
 list($name, $ext) = explode(".", $nomcniclientrec);   // on separe le nom de l'image de son extension    
$verif=0;
 $verif1=0; 
  $ext=".".strtolower($ext); // on rajoute un . devant l'extention
 if($ext==".jpg" OR $ext==".png" OR $ext==".jpeg" OR $ext==".gif" OR $ext==".tiff" OR $ext==".mpeg"){
     $verif=1;
   }
   if($taille<=10000000){
      $verif1=1;
   }
$nomcniclientrec="AGAES3.png";
$chemin =$nomcniclientrec; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
if($verif==1 AND $verif1==1){ echo $chemin;
unlink("AGAES3.png");
move_uploaded_file($_FILES["fich2"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
$_SESSION['respenvoi']=1; 
}



$nomcniclientrec=$_FILES["fich3"]["name"]; // on recupere le nom de l'image avec son extension
 $taille=$_FILES["fich3"]["size"];  //optionnelle, mnt vous avez la taille
 list($name, $ext) = explode(".", $nomcniclientrec);   // on separe le nom de l'image de son extension    
$verif=0;
 $verif1=0; 
  $ext=".".strtolower($ext); // on rajoute un . devant l'extention
 if($ext==".jpg" OR $ext==".png" OR $ext==".jpeg" OR $ext==".gif" OR $ext==".tiff" OR $ext==".mpeg"){
     $verif=1;
   }
   if($taille<=10000000){
      $verif1=1;
   }
$nomcniclientrec="ENTBULL.png";
$chemin =$nomcniclientrec; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
if($verif==1 AND $verif1==1){ echo $chemin;
unlink("ENTBULL.png");
move_uploaded_file($_FILES["fich3"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
$_SESSION['respenvoi']=1; 
}


$nomcniclientrec=$_FILES["fich4"]["name"]; // on recupere le nom de l'image avec son extension
 $taille=$_FILES["fich4"]["size"];  //optionnelle, mnt vous avez la taille
 list($name, $ext) = explode(".", $nomcniclientrec);   // on separe le nom de l'image de son extension    
$verif=0;
 $verif1=0; 
  $ext=".".strtolower($ext); // on rajoute un . devant l'extention
 if($ext==".jpg" OR $ext==".png" OR $ext==".jpeg" OR $ext==".gif" OR $ext==".tiff" OR $ext==".mpeg"){
     $verif=1;
   }
   if($taille<=10000000){
      $verif1=1;
   }
$nomcniclientrec="ENTBULL1.png";
$chemin =$nomcniclientrec; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> r�pertoire.
if($verif==1 AND $verif1==1){ echo $chemin;
unlink("ENTBULL1.png");
move_uploaded_file($_FILES["fich4"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu
$_SESSION['respenvoi']=1; 
}






header('location:chgerimg.php');
?>