<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';require '../lesmenushoriz2.php';
if(isset($_POST['send'])){
$an=$_POST['ann'];$_SESSION['anetatelev']=$_POST['ann'];
$niveauelev=$_POST['clas']; $_SESSION['clasetatelev']=$_POST['clas'];
}
else{
  $an=$_SESSION['anetatelev']; $niveauelev=$_SESSION['clasetatelev'];
}
function effectif($an,$clas){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 
	 if( $donnees['niveauelev']==$clas ){
		$true++;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}

$valdevis="FCFA";

$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR   $_SESSION['code']==4 OR   $_SESSION['code']==7) ){ 
  

    
    
     
    function nommotif($id){

          $nom=" ";
         
        $reponse = $bdda->query("SELECT * FROM autrefrais ");
        $true=0;
        while ($donnees = $reponse->fetch() AND $true==0){                            
           $phrase =$donnees['id'] ; 
           if($phrase==$id){
           $nom=$donnees['nom'];
           $true=1;
             }
       } 
      $reponse->closeCursor(); 
      return $nom;                  
    }
    
    function prixmotif($id){

          $nom=" ";
         
        $reponse = $bdda->query("SELECT * FROM autrefrais ");
        $true=0;
        while ($donnees = $reponse->fetch() AND $true==0){                            
           $phrase =$donnees['id'] ; 
           if($phrase==$id){
           $nom=$donnees['prix'];
           $true=1;
             }
       } 
      $reponse->closeCursor(); 
      return $nom;                  
    }
    
    
    function namemois($id){
      $nom=" ";
      if($id==1){
          $nom="Septembre";
      }
      if($id==2){
          $nom="Octobre";
      }
      if($id==3){
          $nom="Novembre";
      }
      if($id==4){
          $nom="Dècembre";
      }
      if($id==5){
          $nom="Janvier";
      }
      if($id==6){
          $nom="Février";
      }
      if($id==7){
          $nom="Mars";
      }
      if($id==8){
          $nom="Avril";
      }
      if($id==9){
          $nom="Mai";
      }
      if($id==10){
          $nom="Juin";
      }
      return $nom;                  
    }
 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
      <form action='etatuniform.php' method='POST'>
     <button type="submit" class="btn">
      <i class="fas fa-arrow-left text-muted">Retour</i>
    </button>
     </form> 
    </li>
      <li class="nav-item d-none d-sm-inline-block">
         
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
       

     <!-- Messages Dropdown Menu -->
     <li class="nav-item dropdown">
         
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
              
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
              
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
  
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
         </div>
       </li>
       <!-- Notifications Dropdown Menu -->
  <li class="nav-item">
        <a  class='btn btn-primary' data-toggle='modal'   data-target='#modajout'>
        Filtrer la liste
       </a>
         
      </li>
        
     </ul>
   </nav>
   <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link"></br> 
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a> </center> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <center>  </center>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      <center> </br></br><div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nom'];  ?>
</br>** <?php echo $_SESSION['nomfonct'];  ?> **</a>
        </div></center>
      </div>
       
      <!-- Sidebar Menu -->
      <?php if($_SESSION['code']==50){webmaster();}if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 OR $_SESSION['code']==3){principalcollege();}if($_SESSION['code']==7){secretairecollege();}if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}?>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">  <?php echo initialEtab();?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">ETATS DES UNIFORMES, ARBRE DE NOEL ...</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">

          <div class="card">
               
              <div class="card-body p-0">
                 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  
    <!-- Main content -->
     <?php
        $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
    echo "<center><img src='AGAES3.png' height=180px' width='1300px' ><br>
             
            <img src='espace.png' height=100px' width='1000px' ><br> <br>
           </center>";}
           ?>

           <?php if(isset($_POST['send'])){//etatclass
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>CLASSE : ".classparid($niveauelev,$an). "<br><br> Etat des uniformes, arbre de noel et autres frais divers</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    if($_POST['choix']=='a'){ 
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>CLASSE : ".classparid($niveauelev,$an). "<br><br> Etat des uniformes, arbre de noel et autres frais divers</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_POST['choix']!='a' ){ 
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>CLASSE : ".classparid($niveauelev,$an). "<br><br>ETATS : 
                 ".nommotif($_POST['choix']). "</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }
 
  }
  
  ?>
                




    <!-- /.content -->  

      <div class="card card-solid">
  <div class="card-body">
   <div class="row">
        

          <?php 
  

 function format($date){
    $a=substr($date,0,4);
     
    $m=substr($date,5,2);
     
    $j=substr($date,8,2);
     
    $dat=$j."/".$m."/".$a;
    return $dat;
  }

  function respsco($id){
    
 $v="SELECT * FROM admin WHERE id_etab='0' ";
 $reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
        if($donnees['id']==$id  ){ 
           $genre= $donnees['genre'];
           if($genre=='M'){
             $nom= 'M . '.$donnees['nom'];
           }
          if($genre=='F'){
            $nom= 'Mme '.$donnees['nom'];
          }
        }
 } 
 $reponse->closeCursor(); 
 return $nom;
}

     if(!$isMob){  
 if(isset($_POST['send'])){//VENANT DE etatclass

echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
<td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>MOTIFS</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
  </tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
       echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
       </B></B></td><td ><B><B>".$donnees['sexelev']."
       </B></B></td><td colspan='3'><B><B>". $donnees['idnational']."</B></td> </tr>";
            
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  "<tr> <td nowrap> </td> <td nowrap> </td> <td nowrap>
      </td> <td nowrap> </td><td nowrap> </td><td nowrap> 
       ".nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</td>
      <td nowrap>  
       ".$donneess['montant']."  ".$valdevis."</td> </tr> " ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     





       $n=$n+1;
     } 
     $reponse->closeCursor();
      
     echo "<tr ><td colspan='5'> </B></td> <td><B><B><B>Total</B></B></td><td ><B><B>".$ytotalt."  ".$valdevis."</B></B></td> </tr>";
     
  }

 if(isset($_POST['send1'])){  
  

    if($_POST['choix']=='a'){//inscrip non achev
     
echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
<td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>MOTIFS</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
  </tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
       echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
       </B></B></td><td ><B><B>".$donnees['sexelev']."
       </B></B></td><td colspan='3'><B><B>". $donnees['idnational']."</B></td> </tr>";
            
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  "<tr> <td nowrap> </td> <td nowrap> </td> <td nowrap>
      </td> <td nowrap> </td><td nowrap> </td><td nowrap> 
       ".nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</td>
      <td nowrap>  
       ".$donneess['montant']."  ".$valdevis."</td> </tr> " ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     





       $n=$n+1;
     } 
     $reponse->closeCursor();
      
     echo "<tr ><td colspan='5'> </B></td> <td><B><B><B>Total</B></B></td><td ><B><B>".$ytotalt."  ".$valdevis."</B></B></td> </tr>";
     
    }

    if( $_POST['choix']!='a' ){ 
      
echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
<td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>MOTIFS</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
  </tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
       echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
       </B></B></td><td ><B><B>".$donnees['sexelev']."
       </B></B></td><td colspan='3'><B><B>". $donnees['idnational']."</B></td> </tr>";
            
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'
       AND frais='".$_POST['choix']."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  "<tr> <td nowrap> </td> <td nowrap> </td> <td nowrap>
      </td> <td nowrap> </td><td nowrap> </td><td nowrap> 
       ".nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</td>
      <td nowrap>  
       ".$donneess['montant']."  ".$valdevis."</td> </tr> " ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     





       $n=$n+1;
     } 
     $reponse->closeCursor();
      
     echo "<tr ><td colspan='5'> </B></td> <td><B><B><B>Total</B></B></td><td ><B><B>".$ytotalt."  ".$valdevis."</B></B></td> </tr>";
     

     }
 

  }
  
 
 echo "</table>";

}



 if($isMob){ 





   if(isset($_POST['send'])){//VENANT DE etatclass

 



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
        echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b># ".$i."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
         Motifs : </br>";
 
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</br>
    Montant : ".$donneess['montant']."  ".$valdevis."</br>
     
    
    
    " ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     echo "</b></div></div></div> ";





       $n=$n+1;
     } 
     $reponse->closeCursor();
      

     
  }

 if(isset($_POST['send1'])){  
  

    if($_POST['choix']=='a'){//inscrip non achev
     
 



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
           echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b># ".$i."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
         Motifs : </br>";
 
            
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</br>
    Montant : ".$donneess['montant']."  ".$valdevis."</br>" ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     
echo "</b></div></div></div> ";




       $n=$n+1;
     } 
     $reponse->closeCursor();
      
   
     
    }

    if( $_POST['choix']!='a' ){ 
      
 


          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $mat=$donnees['matelev'];
       echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b># ".$i."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
         Motifs : </br>";
 

       $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'
       AND frais='".$_POST['choix']."'");
       while ($donneess = $reponses->fetch()){                            
           
      echo  nommotif($donneess['frais']); 
       if($donneess['frais']==9){ 
       echo "(".namemois($donneess['mois'])." )";
     }
      echo "</br>
    Montant : ".$donneess['montant']."  ".$valdevis."</br>" ; 
       $ytotalt+=$donneess['montant'];
        
          }  
     $reponses->closeCursor();
     
echo "</b></div></div></div> ";




       $n=$n+1;
     } 
     $reponse->closeCursor();
     
     

     }
 

  }

 echo "<table><tr><td> </B></td> <td><B>Total</B></td><td ><B>".$ytotalt."  ".$valdevis."</B></td> </tr></table>";
 }
    
 ?>
 </div></div></div> 
</Br></Br></Br></Br></Br>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <div class="wrapper">
 
<footer class="main-footer">
  <div class="btn-group w-100 mb-2">
       <?php  
      echo "<a class='btn btn-success' href='#' data-filter='3'> Total : ".$ytotalt." ".$valdevis."</a>";
     ?>
                       
    </div>
    <strong> </strong>  
  </footer>
   </div> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


  <?php  echo "<div class='modal fade' id='modajout'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Filtre </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo " 
          
          
          <table class='table table-bordered table-hover'>
<form  method='POST' action='etatuniform1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix'  class='select2' id='exampleInputPassword1'>
            <option value=' '>selectionner</option>
           <option value='a'>TOUT</option>" ;             
            $v="SELECT * FROM autrefrais  ";
                 $reponse = $bdda->query($v);
                    
                  while ($donnees = $reponse->fetch() )
                  {
                      $val=$donnees['nom'];
                       
                        echo "<option value='".$donnees['id']."'>".$val."</option>" ;  
                      
                   }
                  $reponse->closeCursor();
                 
        ?>

            </select>
    


</B></td> </tr> <tr> 
<td><B><div class='btn-group w-100 mb-2'><button type='submit' class='btn btn-primary' name='send1'>OK</button></div></B></td> 
 </tr>  </form> </table>
          
          
          
          
          
          
         
  </br>
      
     
  
  </div>
      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
 
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>






<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


</body>
</html>
<?php }   ?>