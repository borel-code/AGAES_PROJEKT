<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 
  $an=$_SESSION['annee'];
 

function cycle($clas){
	
	$v="SELECT *  FROM classe WHERE sup='0'";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
	 
	 if( $donnees['id']==$clas ){
		$true=$donnees['cycle'];
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}

function effectif($bdda,$an,$clas){
	
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


$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==4
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==6  OR $_SESSION['code']==7) ){ 
  
 
 

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
      <form action='listconsul.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">Liste des élèves </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php //01simple-download-xls ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->


   
  

      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center> 
    <?php    $i=0;
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
   echo "<img src='ENTBULL.png' height='200px' width='1300px'><br>
            <img src='ENTBULL1.png' height='200px' width='1000px'>
            <img src='espace.png' height='100px' width='1000px'><br> <br>";
     } ?>    
  </center>
           <?php if(isset($_GET['send'])){//VENANT DE LISTOUT
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LISTE DES ELEVES</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    if($_POST['choix']=='1'){//ELEV GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DE TOUS LES ANCIENS ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DE TOUS LES NOUVEAUX ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES NOUVELLES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ANCIENNES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES NOUVEAUX ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ANCIENS ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==9 ){//STATISTIQUES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LES STATISTIQUES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==11) {//PREMIER CYCLE
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>TOUT LE PREMIER CYCLE</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }
    if( $_POST['choix']==12) {//SECOND CYCLE
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>TOUT LE SECOND CYCLE</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==10 ){//TOUS LES ELEVES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

 //DEBUT ordi
 if(!$isMob){
 if(isset($_GET['send'])){//VENANT DE LISTCLASSE

echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>DATE NAISSANCE</B></td><td><B>SEXE</B></td><td><B>MATRICULE</B></td>
 
<td><B>TYPE ENS.</B></td><td><B>STATUT</B></td><td><B>A/S</B></td><td><B>TEL. PARENTS</B></td> </tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
  }

 if(isset($_POST['send1'])){  
   $ent="<table class='table table-bordered table-hover'> 
   <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
   <td><B>CLASSE</B></td> <td><B>DATE NAISSANCE</B></td><td><B>SEXE</B></td><td><B>MATRICULE</B></td>
    
   <td><B>TYPE ENS.</B></td><td><B>STATUT</B></td><td><B>A/S</B></td><td><B>TEL. PARENTS</B></td> </tr></thead> ";

    if($_POST['choix']=='1'){//ELEV GARCONS
      echo $ent;
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();

    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo $ent;
             $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();

     }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();

     }
 
    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'   AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo $ent;
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
     }

     if( $_POST['choix']==9 ){//STATISTIQUES
      $gegar=BelegschaftG($bdda,1,'M',$an); $geanc=BelegschaftA($bdda,1,'A',$an);$genew=BelegschaftA($bdda,1,'N',$an);
      $gefil=BelegschaftG($bdda,1,'F',$an);$tgen=$gegar+$gefil;

      $cogar=BelegschaftG($bdda,2,'M',$an);$coanc=BelegschaftA($bdda,2,'A',$an);$conew=BelegschaftA($bdda,2,'N',$an);
      $cofil=BelegschaftG($bdda,2,'F',$an);$tco=$cogar+$cofil;

      $ingar=BelegschaftG($bdda,3,'M',$an);$inanc=BelegschaftA($bdda,3,'A',$an);$innew=BelegschaftA($bdda,3,'N',$an);
      $infil=BelegschaftG($bdda,3,'F',$an);$tin=$ingar+$infil;

      $angar=BelegschaftG($bdda,4,'M',$an);$ananc=BelegschaftA($bdda,4,'A',$an);$annew=BelegschaftA($bdda,4,'N',$an);
      $anfil=BelegschaftG($bdda,4,'F',$an);$tan=$angar+$anfil;
        
    echo " 
    
    <table class='table table-bordered table-hover'> 
    <tr><td  bgcolor='ccae3'><B>TYPE D'ENSEIGNEMENT</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
    <td><B>TOTAUX</B></td> <td><B>ANCIENS</B></td><td><B>NOUVEAUX</B></td></tr> ";

    echo " <tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT GENERAL</B></td><td><B>".$gegar."</B></td>
    <td><B>".$gefil."</B></td> 
    <td><B>".$tgen."</B></td> <td><B>".$geanc."</B></td><td><B>".$genew."</B></td></tr> ";

    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT COMMERCIAL</B></td><td><B>".$cogar."</B></td>
    <td><B>".$cofil."</B></td> 
    <td><B>".$tco."</B></td> <td><B>".$coanc."</B></td><td><B>".$conew."</B></td></tr> ";
    
    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT INDUSTRIEL</B></td><td><B>".$ingar."</B></td>
    <td><B>".$infil."</B></td> 
    <td><B>".$tin."</B></td> <td><B>".$inanc."</B></td><td><B>".$innew."</B></td></tr> ";

    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT ANGLOPHONE</B></td><td><B>".$angar."</B></td>
    <td><B>".$anfil."</B></td> 
    <td><B>".$tan."</B></td> <td><B>".$ananc."</B></td><td><B>".$annew."</B></td></tr> ";

    $totalgar=$gegar+$cogar+$ingar+$angar;   $totalfil=$gefil+$cofil+$infil+$anfil;
    $totalelev=$tgen+$tco+$tin+$tan;          $totalanc=$geanc+$coanc+$inanc+$ananc;
                                               $totalnew=$genew+$conew+$innew+$annew; 
    echo"<tr><td  bgcolor='ccae3'><B>TOTAUX</B></td><td><B>".$totalgar."</B></td><td><B>".$totalfil."</B></td> 
    <td><B>".$totalelev."</B></td> <td><B>".$totalanc."</B></td><td><B>".$totalnew."</B></td></tr> </table> 
    </Br> <img src='espace.png' height='20px' width='1000px' >";
    //DEB ANCIENNETE
      
    $gegaran=BelegschaftATS($bdda,1,'A','M',$an);$gegarnew=BelegschaftATS($bdda,1,'N','M',$an);
    $gefilan=BelegschaftATS($bdda,1,'A','F',$an);$gefilnew=BelegschaftATS($bdda,1,'N','F',$an);

    $cogaran=BelegschaftATS($bdda,2,'A','M',$an);$cogarnew=BelegschaftATS($bdda,2,'N','M',$an);
    $cofilan=BelegschaftATS($bdda,2,'A','F',$an);$cofilnew=BelegschaftATS($bdda,2,'N','F',$an);

    $ingaran=BelegschaftATS($bdda,3,'A','M',$an);$ingarnew=BelegschaftATS($bdda,3,'N','M',$an);
    $infilan=BelegschaftATS($bdda,3,'A','F',$an);$infilnew=BelegschaftATS($bdda,3,'N','F',$an);

    $angaran=BelegschaftATS($bdda,4,'A','M',$an);$angarnew=BelegschaftATS($bdda,4,'N','M',$an);
    $anfilan=BelegschaftATS($bdda,4,'A','F',$an);$anfilnew=BelegschaftATS($bdda,4,'N','F',$an);


    echo " <table class='table table-bordered table-hover'> 
    <tr><td  bgcolor='ccae3'><B> </B></td><td colspan='2'><B><center>ANCIENS</center></B></td>  
    <td colspan='2'><B><center>NOUVEAUX</center></B></td> </tr> 
    <tr><td  bgcolor='ccae3'><B>TYPE D'ENSEIGNEMENT</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
    <td><B>GARCONS</B></td> <td><B>FILLES</B></td></tr> ";

    echo " <tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT GENERAL</B></td><td><B>".$gegaran."</B></td>
    <td><B>".$gefilan."</B></td> 
    <td><B>".$gegarnew."</B></td> <td><B>".$gefilnew."</B></td> </tr> ";

    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT COMMERCIAL</B></td><td><B>".$cogaran."</B></td>
    <td><B>".$cofilan."</B></td> 
    <td><B>".$cogarnew."</B></td> <td><B>".$cofilnew."</B></td> </tr> ";
    
    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT INDUSTRIEL</B></td><td><B>".$ingaran."</B></td>
    <td><B>".$infilan."</B></td> 
    <td><B>".$ingarnew."</B></td> <td><B>".$infilnew."</B></td> </tr> ";

    echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT ANGLOPHONE</B></td><td><B>".$angaran."</B></td>
    <td><B>".$anfilan."</B></td> 
    <td><B>".$angarnew."</B></td> <td><B>".$anfilnew."</B></td> </tr> ";

    $totalgaran=$gegaran+$cogaran+$ingaran+$angaran;   $totalgarnew=$gegarnew+$cogarnew+$ingarnew+$angarnew;
    $totalfilan=$gefilan+$cofilan+$infilan+$anfilan;    $totalfilnew=$gefilnew+$cofilnew+$infilnew+$anfilnew;
                                            
    echo"<tr><td  bgcolor='ccae3'><B>TOTAUX</B></td><td><B>".$totalgaran."</B></td><td><B>".$totalfilan."</B></td> 
    <td><B>".$totalgarnew."</B></td> <td><B>".$totalfilnew."</B></td> </tr> </table> ";





   }
    if( $_POST['choix']==10 ){
      echo $ent;

       $v="SELECT *  FROM eleve  WHERE anelev='".$an."'  AND id_etab='0' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th ><B>". $donnees['preelev'] ."
     </B></th><th ><B>".classparid($bdda,$donnees['niveauelev'] ,$an) ."
     </B></th><th ><B>".$donnees['datelev']."</B></th><th ><B>".$donnees['sexelev']."</B></th> <th ><B>".$donnees['idnational']."</B></th><th ><B>".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</B></th><th ><B>".$donnees['statut']."</B></th><th ><B>".$donnees['anelev']."</B></th><th ><B>". $donnees['telev'] ."</B></th></tr>";
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
  if(isset($_GET['send'])){//VENANT DE LISTCLASSE
 
    echo "<section class='content'>
    <div class='container-fluid>
    <div class='row'>";

           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  ORDER BY nomelev";
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
    Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
     
      Matricule : ".$donnees['idnational']."</br>
    Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
   ";
   echo "
   </b></div>";
     
     
      $n=$n+1;
    } 
    $reponse->closeCursor();
   }
 
  if(isset($_POST['send1'])){  
    
     if($_POST['choix']=='1'){//ELEV GARCONS
       
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
     }
 
     if( $_POST['choix']==2 ){//ELEV FILLES
       
              $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' ORDER BY nomelev";
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
    Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
     
      Matricule : ".$donnees['idnational']."</br>
    Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
   ";
   echo "
   </b></div>";
     
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
      }
 
     if( $_POST['choix']==3 ){//ELEV ANCIENS
        
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND statut='A' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      
      $n=$n+1;
    } 
    $reponse->closeCursor();
 
      }
  
     if( $_POST['choix']==4 ){//ELEV NOUVEAUX
        
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'   AND statut='N' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
     }
 
     if( $_POST['choix']==5 ){//ELEV NOUV FILLES
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' AND statut='N' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='F' AND statut='A' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
       
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' AND statut='N' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
     
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  AND sexelev='M' AND statut='A' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
      if( $_POST['choix']==9 ){//STATISTIQUES
        $gegar=BelegschaftG($bdda,1,'M',$an); $geanc=BelegschaftA($bdda,1,'A',$an);$genew=BelegschaftA($bdda,1,'N',$an);
        $gefil=BelegschaftG($bdda,1,'F',$an);$tgen=$gegar+$gefil;

        $cogar=BelegschaftG($bdda,2,'M',$an);$coanc=BelegschaftA($bdda,2,'A',$an);$conew=BelegschaftA($bdda,2,'N',$an);
        $cofil=BelegschaftG($bdda,2,'F',$an);$tco=$cogar+$cofil;

        $ingar=BelegschaftG($bdda,3,'M',$an);$inanc=BelegschaftA($bdda,3,'A',$an);$innew=BelegschaftA($bdda,3,'N',$an);
        $infil=BelegschaftG($bdda,3,'F',$an);$tin=$ingar+$infil;

        $angar=BelegschaftG($bdda,4,'M',$an);$ananc=BelegschaftA($bdda,4,'A',$an);$annew=BelegschaftA($bdda,4,'N',$an);
        $anfil=BelegschaftG($bdda,4,'F',$an);$tan=$angar+$anfil;
          
      echo " 
      <div class='card-body table-responsive p-0' style='height: 300px;''>
      <table class='table table-bordered table-hover'> 
      <tr><td  bgcolor='ccae3'><B>TYPE D'ENSEIGNEMENT</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
      <td><B>TOTAUX</B></td> <td><B>ANCIENS</B></td><td><B>NOUVEAUX</B></td></tr> ";

      echo " <tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT GENERAL</B></td><td><B>".$gegar."</B></td>
      <td><B>".$gefil."</B></td> 
      <td><B>".$tgen."</B></td> <td><B>".$geanc."</B></td><td><B>".$genew."</B></td></tr> ";

      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT COMMERCIAL</B></td><td><B>".$cogar."</B></td>
      <td><B>".$cofil."</B></td> 
      <td><B>".$tco."</B></td> <td><B>".$coanc."</B></td><td><B>".$conew."</B></td></tr> ";
      
      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT INDUSTRIEL</B></td><td><B>".$ingar."</B></td>
      <td><B>".$infil."</B></td> 
      <td><B>".$tin."</B></td> <td><B>".$inanc."</B></td><td><B>".$innew."</B></td></tr> ";

      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT ANGLOPHONE</B></td><td><B>".$angar."</B></td>
      <td><B>".$anfil."</B></td> 
      <td><B>".$tan."</B></td> <td><B>".$ananc."</B></td><td><B>".$annew."</B></td></tr> ";

      $totalgar=$gegar+$cogar+$ingar+$angar;   $totalfil=$gefil+$cofil+$infil+$anfil;
      $totalelev=$tgen+$tco+$tin+$tan;          $totalanc=$geanc+$coanc+$inanc+$ananc;
                                                 $totalnew=$genew+$conew+$innew+$annew; 
      echo"<tr><td  bgcolor='ccae3'><B>TOTAUX</B></td><td><B>".$totalgar."</B></td><td><B>".$totalfil."</B></td> 
      <td><B>".$totalelev."</B></td> <td><B>".$totalanc."</B></td><td><B>".$totalnew."</B></td></tr> </table></div>
      </Br> <img src='espace.png' height='20px' width='1000px' >";
      //DEB ANCIENNETE
        
      $gegaran=BelegschaftATS($bdda,1,'A','M',$an);$gegarnew=BelegschaftATS($bdda,1,'N','M',$an);
      $gefilan=BelegschaftATS($bdda,1,'A','F',$an);$gefilnew=BelegschaftATS($bdda,1,'N','F',$an);

      $cogaran=BelegschaftATS($bdda,2,'A','M',$an);$cogarnew=BelegschaftATS($bdda,2,'N','M',$an);
      $cofilan=BelegschaftATS($bdda,2,'A','F',$an);$cofilnew=BelegschaftATS($bdda,2,'N','F',$an);

      $ingaran=BelegschaftATS($bdda,3,'A','M',$an);$ingarnew=BelegschaftATS($bdda,3,'N','M',$an);
      $infilan=BelegschaftATS($bdda,3,'A','F',$an);$infilnew=BelegschaftATS($bdda,3,'N','F',$an);

      $angaran=BelegschaftATS($bdda,4,'A','M',$an);$angarnew=BelegschaftATS($bdda,4,'N','M',$an);
      $anfilan=BelegschaftATS($bdda,4,'A','F',$an);$anfilnew=BelegschaftATS($bdda,4,'N','F',$an);


      echo " <div class='card-body table-responsive p-0' style='height: 300px;''><table class='table table-bordered table-hover'> 
      <tr><td  bgcolor='ccae3'><B> </B></td><td colspan='2'><B><center>ANCIENS</center></B></td>  
      <td colspan='2'><B><center>NOUVEAUX</center></B></td> </tr> 
      <tr><td  bgcolor='ccae3'><B>TYPE D'ENSEIGNEMENT</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
      <td><B>GARCONS</B></td> <td><B>FILLES</B></td></tr> ";

      echo " <tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT GENERAL</B></td><td><B>".$gegaran."</B></td>
      <td><B>".$gefilan."</B></td> 
      <td><B>".$gegarnew."</B></td> <td><B>".$gefilnew."</B></td> </tr> ";

      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT COMMERCIAL</B></td><td><B>".$cogaran."</B></td>
      <td><B>".$cofilan."</B></td> 
      <td><B>".$cogarnew."</B></td> <td><B>".$cofilnew."</B></td> </tr> ";
      
      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT INDUSTRIEL</B></td><td><B>".$ingaran."</B></td>
      <td><B>".$infilan."</B></td> 
      <td><B>".$ingarnew."</B></td> <td><B>".$infilnew."</B></td> </tr> ";

      echo"<tr><td  bgcolor='ccae3'><B>ENSEIGNEMENT ANGLOPHONE</B></td><td><B>".$angaran."</B></td>
      <td><B>".$anfilan."</B></td> 
      <td><B>".$angarnew."</B></td> <td><B>".$anfilnew."</B></td> </tr> ";

      $totalgaran=$gegaran+$cogaran+$ingaran+$angaran;   $totalgarnew=$gegarnew+$cogarnew+$ingarnew+$angarnew;
      $totalfilan=$gefilan+$cofilan+$infilan+$anfilan;    $totalfilnew=$gefilnew+$cofilnew+$infilnew+$anfilnew;
                                              
      echo"<tr><td  bgcolor='ccae3'><B>TOTAUX</B></td><td><B>".$totalgaran."</B></td><td><B>".$totalfilan."</B></td> 
      <td><B>".$totalgarnew."</B></td> <td><B>".$totalfilnew."</B></td> </tr> </table></div> ";





     }
     if( $_POST['choix']==10 ){
        
 
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."'  AND id_etab='0' ORDER BY nomelev";
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
     Classe : ".classparid($bdda,$donnees['niveauelev'] ,$an)."</br>
      
       Matricule : ".$donnees['idnational']."</br>
     Statut : ".$donnees['statut']."</br>Type d'enseignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev'],$an ))."</br>
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




  
  ?>
  </Br></Br></Br></Br></Br>
 
  

<!-- /.content-wrapper -->

  <!-- Main Footer -->
   <div class='no-print'>
  <footer class="main-footer">
   <div class="btn-group w-100 mb-2">
    <a class="btn btn-success"  data-filter='2'> Total : 
  <?php  echo $i; ?> </a>
    </div>
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
<form  method='POST' action='listout1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='11'>Tout le premier cycle</option><option value='12'>Tout le second cycle</option>
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