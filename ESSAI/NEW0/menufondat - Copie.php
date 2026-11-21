<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../lesmenus.php'; 
 
if(!empty($_POST['envoi'])){ 
  $_SESSION['util']= $_POST['user'] ;
  $_SESSION['mtp']= $_POST['password'] ;
  $_SESSION['annee']=$_POST['an']; 
}
   $trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']); 
if($trueadmin!=0){  
$_SESSION['id']=$trueadmin;
$_SESSION['nom']=nomC($_SESSION['id']);
$_SESSION['code']= postemaxadmin($_SESSION['id'],$_SESSION['annee']);
$_SESSION['genreadmin']=genre_admin($_SESSION['id']);
$_SESSION['migrer']=migrer_admin($_SESSION['id']);
$_SESSION['cni']=cni_admin($_SESSION['id']);
$_SESSION['tel']=tel_admin($_SESSION['id']);
$_SESSION['nomfonct']=nom_poste($_SESSION['code'],$_SESSION['genreadmin']);
$DATE=date('Y-m-d');
$_SESSION['reqmiseco']="SELECT *  FROM detail  WHERE date='".$DATE."' AND anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
$_SESSION['reqmisexam']="SELECT *  FROM exam  WHERE  date='".$DATE."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
 $_SESSION['reqmisesortie']="SELECT *  FROM sortie  WHERE  an='".$_SESSION['annee']."'  ORDER BY date DESC";
 $_SESSION[' reqmiseaut']="SELECT *  FROM autrepayefrais   WHERE  date='".$DATE."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";     
$_SESSION['reqconfigfrais']="SELECT *  FROM  autrefrais   ORDER BY nom";
$_SESSION['reqconfigremise']="SELECT *  FROM  remise   ORDER BY nom";
$_SESSION['reqpointens']="SELECT * FROM pointage WHERE an=".$_SESSION['annee']."  ORDER BY datep DESC";
?>
<!DOCTYPE html>

<html> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>   </title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

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
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-si" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     
  <center>
  <a href= "menueco.php" class="brand-link">
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a> </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <center>  </center>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      <center> <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nom'];  ?>
</br>** <?php echo $_SESSION['nomfonct'];  ?> **</a>
        </div></center>
      </div>

       
      <!-- Sidebar Menu -->
      <?php if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 OR $_SESSION['code']==3){principalcollege();}if($_SESSION['code']==7){secretairecollege();}if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}?>
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
            <h1 class="m-0">  <?php echo initialEtab();?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> </li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
       <h2 class="mb-2"><i class="fas fa-database"></i> Gestion de la scolarité</h2>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image14.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
               
            </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image15.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
              <a href="bilrecjad.php">Recette journalière</a></br>
              <a href="bilrecperioad.php">Recette sur une periode</a></br>
              <a href="birecanad.php">Recette sur l'année scolaire</a></br>
              </br></br></br></br></br></br>
            </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image31.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
              <a href="sorteff.php">Effectuer une sortie d'argent</a></br>
              <a href="sortjour.php">Historique des sorties journalières</a></br>
              <a href="sortperiod.php">Historique des sorties periodiques</a></br>
              <a href="sortan.php">Historique des sorties sur l'année scolaire</a></br>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image35.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
              <a href="listout.php">Afficher tous les élèves</a></br>
              <a href="listclasse.php">Afficher les élèves par classe</a></br>
              <a href="certif.php">Certificat de scolarité</a></br>
              </br></br></br></br></br>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 




        </div>
        <!-- /.row -->

        <!-- =========================================================== -->
        <h2 class="mb-2"><i class="fas fa-users"></i> Gestion pédagogique</h2>
        <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image19.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
              <a href="ajoutensn.php">Gérer les enseignants</a></br>
              <a href="insertnote.php">Insérer les notes</a></br> 
              <a href="insertnote.php">Moyennes, bulletins et statistiques</a></br> 
            </br></br></br></br></br></br>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 
           
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image18.jpeg' height='405px' width='250px' >
               

              <div class="info-box-content">
              <a href="gestn1.php">Nombre d'évaluations par trimestre</a></br>
              <a href="depotsujad.php">Envoi des sujets et travaux dirigés</a></br> 
              <a href="verrounote.php">Vérouillage/devérouillage des notes</a></br> 
            </br></br></br></br></br>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image16.jpeg'  height='405px'  width='250px' >
               

              <div class="info-box-content">
              <a href="ajoutmat.php">Ajouter une matière</a></br>
              <a href="ajoutclasse.php">Ajouter une classe</a></br> 
              <a href="ajoutmatclasse.php">Attribuer les matières dans les classes </a></br> 
            </br></br></br></br></br></br>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <img src='../bild/image32.jpeg'  height='405px'  width='250px' >
               

              <div class="info-box-content">
              <a href="anzeigmatclas.php">Afficher les matières par classe</a></br>
              <a href="absedit.php">Editer les heures d'absences</a></br> 
              <a href="retardedit.php">Editer les retards</a></br> 
            </br></br></br></br></br>
                 
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> 


        </div>
        <!-- /.row -->

        
         <!-- =========================================================== -->
       

         
         
        

         
        <!-- =========================================================== -->
         
 <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>   </strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b> </b> 
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
 
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard3.js"></script>

</body>
</html>
<?php }     ?>




 
 
 