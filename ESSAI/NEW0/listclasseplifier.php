<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; 
 
  $an=$_SESSION['anlistklas'];
  $klas=$_SESSION['klaslistklas'];
 
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


$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==4
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
 

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
      <form action='listclasse1.php?simple=0' method='POST'>
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
            <h1 class="m-0">LISTE DES ELEVES </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        

      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center>
    <?php   $i=0;
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
   echo "<img src='ENTBULL.png' height='200px' width='1300px'><br>
            <img src='ENTBULL1.png' height='200px' width='1000px'>
            <img src='espace.png' height='100px' width='1000px'><br> <br>";
     } ?>
           </center>
           <?php if(isset($_GET['simple'])){//VENANT DE listclasse
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>CLASSE : ".classparid($klas,$an)." </br>LISTE DES ELEVES </b> </H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    if($_POST['choix']=='1'){//ELEV GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DES ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DE TOUS LES ANCIENS ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DE TOUS LES NOUVEAUX ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DES NOUVELLES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LISTE DES ANCIENNES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)." <br>LISTE DES NOUVEAUX ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)." <br>LISTE DES ANCIENS ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==9 ){//STATISTIQUES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)."<br> LES STATISTIQUES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==10 ){//TOUS LES ELEVES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>CLASSE : ".classparid($klas,$an)." <br>LISTE DES ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($klas,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

  }
  
  ?>
                




    <!-- /.content -->  
    </br> 
     

          <?php 
  

 $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

 //DEBUT ordi
 if(!$isMob){
 if(isset($_GET['simple'])){//VENANT DE LISTCLASSE

echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
 <td><B>SEXE</B></td></tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
  }

 if(isset($_POST['send1'])){  
   $ent="<table class='table table-bordered table-hover'> 
   <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
   <td><B>SEXE</B></td> 
    </tr> ";

    if($_POST['choix']=='1'){//ELEV GARCONS
      echo $ent;
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();

    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo $ent;
             $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";  
     $n=$n+1;
   } 
   $reponse->closeCursor();

     }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>"; 
        $n=$n+1;
   } 
   $reponse->closeCursor();

     }
 
    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."'  AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
      $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
      $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
      $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo $ent;
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
      $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==9 ){//STATISTIQUES
        $t=TYPENS($klas,$an);
        $gegar=BelegschaftG($t,'M',$an); $geanc=BelegschaftA($t,'A',$an);$genew=BelegschaftA($t,'N',$an);
        $gefil=BelegschaftG($t,'F',$an);$tgen=$gegar+$gefil;

        $cogar=BelegschaftG($t,'M',$an);$coanc=BelegschaftA($t,'A',$an);$conew=BelegschaftA($t,'N',$an);
        $cofil=BelegschaftG($t,'F',$an);$tco=$cogar+$cofil;

        $ingar=BelegschaftG($t,'M',$an);$inanc=BelegschaftA($t,'A',$an);$innew=BelegschaftA($t,'N',$an);
        $infil=BelegschaftG($t,'F',$an);$tin=$ingar+$infil;

        $angar=BelegschaftG($t,'M',$an);$ananc=BelegschaftA($t,'A',$an);$annew=BelegschaftA($t,'N',$an);
        $anfil=BelegschaftG($t,'F',$an);$tan=$angar+$anfil;
          
      echo " 
      
      <table class='table table-bordered table-hover'> 
      <tr><td  bgcolor='ccae3'><B>CLASSES</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
      <td><B>TOTAUX</B></td> <td><B>ANCIENS</B></td><td><B>NOUVEAUX</B></td></tr> ";
      
       $cls=$klas; 
       $totalcls=BelegschaftKLASSE($t,'M',$an,$cls)+BelegschaftKLASSE($t,'F',$an,$cls);
      echo " <tr><td  bgcolor='ccae3'><B>".classparid($cls,$an)."</B></td><td><B>".BelegschaftKLASSE($t,'M',$an,$cls)."</B></td>
      <td><B>".BelegschaftKLASSE($t,'F',$an,$cls)."</B></td> 
      <td><B>".$totalcls."</B></td> <td><B>".BelegschaftKLASSEA($t,'A',$an,$cls)."</B></td><td><B>".BelegschaftKLASSEA($t,'N',$an,$cls)."</B></td></tr> ";
    
        
      $TOTAL=$angar+$anfil;
       
     
    echo "</table> ";
                                               


     }

    if( $_POST['choix']==10 ){
      echo $ent;

       $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND niveauelev='".$klas."' AND id_etab='0' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th> <th ><B>".$donnees['sexelev']."</B></th></tr>";
      $n=$n+1;
   } 
   $reponse->closeCursor();
    }

  }
  
  
 echo "</table> ";
}
//fin ordi





//DEBUT mobile
if($isMob){
  if(isset($_GET['simple'])){//VENANT DE LISTCLASSE
 
    echo "<section class='content'>
    <div class='container-fluid>
    <div class='row'>";

           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
     
      echo "<div class='callout callout-success'><b>";
     echo "N° : ".$i ."</br>
     Noms : ".$donnees['nomelev']."</br>
     Prénoms : ".$donnees['preelev']."</br>
     Date de naissance : ".$donnees['datelev']."</br>
     Genre : ".$donnees['sexelev']."</br>
     Numéro(s) de téléphone : ".$donnees['telev']."</br>
     Année scolaire : ".$donnees['anelev']."</br>
    Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
    Matricule : ".$donnees['matelev']."</br>
    Statut : ".$donnees['statut']."</br>
   ";
   echo "
   </b></div>";
     
     
      $n=$n+1;
    } 
    $reponse->closeCursor();
   }
 
  if(isset($_POST['send1'])){  
    
     if($_POST['choix']=='1'){//ELEV GARCONS
       
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
     }
 
     if( $_POST['choix']==2 ){//ELEV FILLES
       
              $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
     echo "N° : ".$i ."</br>
     Noms : ".$donnees['nomelev']."</br>
     Prénoms : ".$donnees['preelev']."</br>
     Date de naissance : ".$donnees['datelev']."</br>
     Genre : ".$donnees['sexelev']."</br>
     Numéro(s) de téléphone : ".$donnees['telev']."</br>
     Année scolaire : ".$donnees['anelev']."</br>
    Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
    Matricule : ".$donnees['matelev']."</br>
    Statut : ".$donnees['statut']."</br>
   ";
   echo "
   </b></div>";
     
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
      }
 
     if( $_POST['choix']==3 ){//ELEV ANCIENS
        
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND statut='A' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
      }
  
     if( $_POST['choix']==4 ){//ELEV NOUVEAUX
        
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."'  AND statut='N' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
     }
 
     if( $_POST['choix']==5 ){//ELEV NOUV FILLES
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' AND statut='N' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
       
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='F' AND statut='A' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' AND statut='N' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
     
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' AND sexelev='M' AND statut='A' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==9 ){//STATISTIQUES
         $t=TYPENS($klas,$an);
         $gegar=BelegschaftG($t,'M',$an); $geanc=BelegschaftA($t,'A',$an);$genew=BelegschaftA($t,'N',$an);
         $gefil=BelegschaftG($t,'F',$an);$tgen=$gegar+$gefil;
 
         $cogar=BelegschaftG($t,'M',$an);$coanc=BelegschaftA($t,'A',$an);$conew=BelegschaftA($t,'N',$an);
         $cofil=BelegschaftG($t,'F',$an);$tco=$cogar+$cofil;
 
         $ingar=BelegschaftG($t,'M',$an);$inanc=BelegschaftA($t,'A',$an);$innew=BelegschaftA($t,'N',$an);
         $infil=BelegschaftG($t,'F',$an);$tin=$ingar+$infil;
 
         $angar=BelegschaftG($t,'M',$an);$ananc=BelegschaftA($t,'A',$an);$annew=BelegschaftA($t,'N',$an);
         $anfil=BelegschaftG($t,'F',$an);$tan=$angar+$anfil;
           
       echo " 
       <div class='card-body table-responsive p-0' style='height: 300px;''> 
       <table class='table table-bordered table-hover'> 
       <tr><td  bgcolor='ccae3'><B>CLASSES</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
       <td><B>TOTAUX</B></td> <td><B>ANCIENS</B></td><td><B>NOUVEAUX</B></td></tr> ";
       
        $cls=$klas; 
        $totalcls=BelegschaftKLASSE($t,'M',$an,$cls)+BelegschaftKLASSE($t,'F',$an,$cls);
       echo " <tr><td  bgcolor='ccae3'><B>".classparid($cls,$an)."</B></td><td><B>".BelegschaftKLASSE($t,'M',$an,$cls)."</B></td>
       <td><B>".BelegschaftKLASSE($t,'F',$an,$cls)."</B></td> 
       <td><B>".$totalcls."</B></td> <td><B>".BelegschaftKLASSEA($t,'A',$an,$cls)."</B></td><td><B>".BelegschaftKLASSEA($t,'N',$an,$cls)."</B></td></tr> ";
     
         
       $TOTAL=$angar+$anfil;
        
      
     echo "</table></div>";
                                                
 
 
      }
 
     if( $_POST['choix']==10 ){
        
 
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND niveauelev='".$klas."' AND id_etab='0' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Date de naissance : ".$donnees['datelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Numéro(s) de téléphone : ".$donnees['telev']."</br>
      Année scolaire : ".$donnees['anelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>
     Matricule : ".$donnees['matelev']."</br>
     Statut : ".$donnees['statut']."</br>
    ";
    echo "
    </b></div>"; 
      $n=$n+1;
    } 
    $reponse->closeCursor();
     }
 
   }
   
   
   echo "</div></div></div>";
 }
 //fin mobile







 
 ?></Br></Br></Br></Br></Br>
  
  <!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->

  <!-- Main Footer -->
   <div class='no-print'>
  <footer class="main-footer">
   <div class="btn-group w-100 mb-2">
    <a class="btn btn-success"  data-filter='2'><small>  Total : 
  <?php  echo $i; ?></small></a>   <a class='btn btn-secondary' href='listclasse1.php?simple=0' data-filter='2'><small>cliquer pour tout afficher </small></a>
    <a class='btn btn-primary' href='listclasse.php' data-filter='2'><small>choisir une autre classe </small></a>  </div>
  </footer></div>

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
<form  method='POST' action='listclasseplifier.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select>

    


</B></td> 
<td><B><button type='submit' class='btn btn-primary' name='send1'>OK</button></B></td> 
 </tr>  </form> </table>
          
          
          
          
          
          
          
          "; 
            ?>
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
</body>
</html>
<?php }   ?>