<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php';  
 
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
if($trueadmin!=0 AND $_SESSION['code']==1){ 
  
  
 
 

?>
<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     
  <title>  </title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script> 
  

</script> 


</head>
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
    <a href="#" class="brand-link">
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a>  

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
            <h1 class="m-0">SUPPRESSION DES DONNEES</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php  ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">

    <div class="card card-solid">
  <div class="card-body">
  
     <?php
     
     if(isset($_POST['valider'])){
        if(isset($_POST['paiem'])){
            $r="TRUNCATE TABLE detail";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE exam";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE autrefraispaye";
            $req=$bdda->query($r);
            $r="UPDATE eleve SET total=' '";
            $req=$bdda->query($r);
            $r="UPDATE eleve SET reste=' '";
            $req=$bdda->query($r);
          }
          if(isset($_POST['note'])){
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
           
          }  
          if(isset($_POST['eleve'])){
            $r="TRUNCATE TABLE absence";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE retard";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE fact";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE eleve";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE detail";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE exam";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE autrefraispaye";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
         }  
         if(isset($_POST['matclas'])){
            $r="TRUNCATE TABLE matclasse";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
          }
          if(isset($_POST['groupmat'])){
            $r="TRUNCATE TABLE matclasse";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
          }
          if(isset($_POST['matiere'])){
            $r="TRUNCATE TABLE matiere";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE matclasse";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
          }
          if(isset($_POST['cout'])){
            $r="TRUNCATE TABLE cordon";
            $req=$bdda->query($r);
          }
         
          if(isset($_POST['classe'])){
            $r="TRUNCATE TABLE classe";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE matclasse";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE matgroup";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE note";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegroupeval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notegrouptrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE notetrimestre";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pourcentagematiereval";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenne";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyenneannuel";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moyennetrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatieretrim";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE moymatiereval";
            $req=$bdda->query($r);
          }
          if(isset($_POST['enseign'])){
            $r="TRUNCATE TABLE enseignant";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE enseigsalaire";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE enseigmatclasse";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE salaire";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE pointage";
            $req=$bdda->query($r);
          }
          if(isset($_POST['frais'])){
            $r="TRUNCATE TABLE autrefrais";
            $req=$bdda->query($r);
          }
          if(isset($_POST['periode'])){
            $r="TRUNCATE TABLE periode";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE absence";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE retard";
            $req=$bdda->query($r);
          }
          if(isset($_POST['remise'])){
            $r="TRUNCATE TABLE remise";
            $req=$bdda->query($r);
          }
          if(isset($_POST['depense'])){
            $r="TRUNCATE TABLE sortie";
            $req=$bdda->query($r);
          }
          if(isset($_POST['retard'])){
            $r="TRUNCATE TABLE retard";
            $req=$bdda->query($r);
            $r="TRUNCATE TABLE absence";
            $req=$bdda->query($r);
          }
          echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h5><i class='icon fas fa-check'>Succès</i></h5>
</div>";
     }
     
     ?>
     
     
     
     
     
     
         
   </div>
   </div> 







      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Suppression des données (elles seront irreversibles)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="suppdonnees.php" name="inscrip">
                <div class="card-body"><B>
                    Cocher puis cliquer sur valider </br></br>
                <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="1" name="paiem"> Supprimer les paiements   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="2" name="note"> Supprimer les notes   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="3" name="retard"> Supprimer les retards et absences des élèves  
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="3" name="eleve"> Supprimer les élèves   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="4" name="matclas"> Supprimer les attributions des matières dans les classes   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="5" name="groupmat"> Supprimer les matières des groupes   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="6" name="matiere"> Supprimer les matières   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="7" name="cout"> Supprimer les coûts de la scolarité   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="8" name="classe"> Supprimer les classes   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="9" name="enseign"> Supprimer les enseignants   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="10" name="frais"> Supprimer les types de frais(Tenue, écusson...)   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="11" name="periode"> Supprimer les periodes horaires   
  </label></div></br>
  <div class="form-check"><label class="form-check-label">  
    <input type="checkbox" class="form-check-input" value="12" name="remise"> Supprimer les types de remises   
    </label></div></br>
    <div class="form-check"><label class="form-check-label">  
    <input type="checkbox" class="form-check-input" value="13" name="depense"> Supprimer les dépenses   
    </label></div></br>

     </B>              
                  <div class="card-footer">
                  <div class="btn-group w-100 mb-2">
   <button type='submit' name='valider' class='btn btn-primary'>Valider</button>   
  </div>         
                 
                </div>
                  
                </div>
                <!-- /.card-body -->

               
            </div>
            <!-- /.card -->

             
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
           

           
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>   </strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b> </b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
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
</body>
</html>
<?php }   ?>