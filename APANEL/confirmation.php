<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'lesmenusac.php';  require 'connecterC.php';
 $bloc=0;$actif=$bloc; $pageactif=0;
 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGAES | OFFICIEL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
      <img src="AGAES2.png"  width="85px" height="35px" alt="Photo">
      </li>
       
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
       
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <a class="btn btn-info" href="tel:+237674494384" data-filter="2"> <b>+237 674494384</b></a>
       </li>
      <!-- Notifications Dropdown Menu -->
       
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php

menuhautappli();

?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       
      <?php
 
menuhautnom(' ',' ');

?>
       

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php

tableaubord($bloc,$actif,$pageactif,' ');

?>



           
          
          
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LE SITE OFFICIEL D'AGAES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Etat de confirmation</b></h3>

          <div class="card-tools">
             
          </div>
        </div>
        <div class="card-body">
        <b> <?php  
    
      
       

 
       echo "Votre nom complet ".$_SESSION['nomadm']."<br><br>";
        echo "Le lien d'accès de votre personnel et vous à votre établissement est &nbsp &nbsp ".$_SESSION['liencomplet']."<br><br>";
         echo "Votre nom d'utilisateur est ".$_SESSION['user']."<br><br>";
         echo "Votre mot de passe est ".$_SESSION['motp']."<br><br>";
             echo "Le lien d'accès des parents d'élèves à votre établissement est &nbsp &nbsp ".$_SESSION['liencompletparent']."<br><br>";
             echo "Veuillez retenir ces informations ci-dessus<br><br>";
             echo "Vous avez 1 mois d'essai<br>";
             echo "Cliquez sur ce bouton pour vous connecter <a href='".$_SESSION['liencomplet']."'>aller se connecter</a><br>";
            
             $_SESSION['DBTRUE']=0;
             ?>
        </b>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer"> <b>
          AGAES <?php echo date('Y'); ?>
          </b></div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  </br></br></br></br></br>
  <footer class="main-footer">
 
  <div class="btn-group w-100 mb-2">
  <?php   echo "<a class='btn btn-success' href='".$_SESSION['liencomplet']."'>Aller se connecter</a>";

?>
  </div>
   </footer>
   
   <?php
  echo "<div class='modal fade' id='essai'>
  <div class='modal-dialog'>
    <div class='modal-content '>
      <div class='modal-header'>
        <h4 class='modal-title'>Demander un essai</h4>
         
        <form action='confirmation.php' method='POST'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <p>
        <label for='exampleInputEmail1'>&nbsp &nbsp &nbsp &nbsp===== INFORMATIONS DE BASE =====</label><br>
        <div class='form-group'>
        <label for='exampleInputEmail1'>Nom de l'établissement</label>
          <input name='nometab'  class='form-control' id='exampleInputEmail1' required>
          </div>
          <label for='exampleInputEmail1'>Numéro de téléphone de l'établissement</label>
          <div class='input-group mb-3' >
          <div class='input-group-append'>
                      <span class='input-group-text'>+237</span>
                  </div>
          <input name='numetab' class='form-control' type='number' id='exampleInputEmail1' required>
          </div>
          <div class='form-group'>
          <label for='exampleInputEmail1'>Ville de l'établissement</label>
            <input name='villetab'  class='form-control' id='exampleInputEmail1' required>
            </div> 
            <div class='form-group'>
            <label for='exampleInputEmail1'>Quartier de l'établissement</label>
              <input name='qtieretab'  class='form-control' id='exampleInputEmail1' required>
              </div> 
         <div class='form-group'>
          <label for='exampleInputEmail1'>Votre nom complet (vous aurez les attributs du fondateur/fondatrice)</label>
          <input name='nomadm'  class='form-control' id='exampleInputEmail1' required>
           </div> 
           <label for='exampleInputEmail1'>Votre numéro de téléphone</label>
          <div class='input-group mb-3' >
          <div class='input-group-append'>
                      <span class='input-group-text'>+237</span>
                  </div>
          <input name='numadm' class='form-control' type='number' id='exampleInputEmail1' required>
          </div>
          <br><br><label for='exampleInputEmail1'>&nbsp &nbsp &nbsp========= LES LIENS D'ACCES =========</label><br><br>
           <label for='exampleInputEmail1'>Lien d'accès pour vous et votre personnel(Compléter avec un mot)</label>
                  <div class='input-group mb-3' >
                  <div class='input-group-append'>
                              <span class='input-group-text'>http://ajesuis.com</span>
                          </div>
                  <input name='lien' class='form-control' id='exampleInputEmail1' required>
                  </div>
                  <label for='exampleInputEmail1'>Lien d'accès pour les parents d'élèves(différent du lien ci-dessus)</label>
                  <div class='input-group mb-3' >
                  <div class='input-group-append'>
                              <span class='input-group-text'>http://ajesuis.com</span>
                          </div>
                  <input name='lien' class='form-control' id='exampleInputEmail1' required>
                  </div>
        </p>
      </div>
      <div class='modal-footer justify-content-between'>
        <button type='button'  class='btn btn-default' data-dismiss='modal'>Fermer</button>
        <button type='submit' name='modifvar' value=' ' class='btn btn-primary'>Enregistrer</button>
</form></div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
";
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
 
</body>
</html>
