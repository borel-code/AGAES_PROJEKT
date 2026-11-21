<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require '../lesmenusad.php';require '../connecterC.php';require '../lesfunctions.php';
 $bloc=1;$actif=$bloc; $pageactif=1;

 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGAES | OFFICIEL - Admin</title>

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
        <a class="nav-link" data-widget="pushmenu" href="../#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
      <img src="../AGAES2.png"  width="85px" height="35px" alt="Photo">
      </li>
       
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
       
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <a class="btn btn-primary" href="../tel:+237674494384" data-filter="2"> <b>+237 674494384</b></a>
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
    <section class="content">
      <div class="container-fluid">
      <h3 class="mt-4 mb-4">Tableau de bord | <?php echo $_SESSION['datepanel'];  ?></h3>

<div class="row">

<?php 
  
 $reponse = $bddt->query($_SESSION['frage']);
  while ($donnees = $reponse->fetch())
   {
    $idetablier=$donnees['idetablier'] ;
  $deja=dansannee($bddt,$idetablier,$_SESSION['idatepanel']);
    
    $idetabl=$donnees['idetabl'] ;
 $institution=$donnees['nometab'] ;
 $respo=$donnees['nomadm'] ;
 $ville=$donnees['villetab'] ;
 $quartier=$donnees['qtieretab'] ;
 $Lien=$donnees['lien'] ;
 $Lieneltern=$donnees['lienparent'] ;

 /* $contenu=infoinscrit($bddt,$idetablier,$_SESSION['idatepanel']);
 
 if($contenu!='@')  {
 $tabl=array();
    $tabl=explode('@',$contenu);
    $_SESSION['linscrit']=$tabl[0];  $_SESSION['lcout']=$tabl[1];
    $_SESSION['ltotalavance']=$tabl[2];  $_SESSION['ldatedeb']=$tabl[3];
    $_SESSION['ldateproro']=$tabl[4];  $_SESSION['lleiter']=$tabl[5];
  }
  if($contenu=='@')  {
    $_SESSION['ldatedeb']='---';
    $_SESSION['ldateproro']='---';   
  }
*/

echo "
<div class='col-md-4'>
    <!-- Widget: user widget style 2 -->
    <div class='card card-widget widget-user-2'>
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class='widget-user-header bg-info'>
        <div class='widget-user-image'>
          <!--img class='img-circle elevation-2' src='#'-->
        </div>
        <!-- /.widget-user-image -->
        <h7 class='widget-user-username'><b>".$institution." .</b></h7></br>
        <h7 class='widget-user-desc'>Responsable :  ".$respo."</h7>
      </div>
      <div class='card-footer p-0'>
        <ul class='nav flex-column'>
        <li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>";
            if($deja==0){
             echo "Année scolaire <span class='float-right badge bg-warning'></span>";
            }
            if($deja!=0){
                echo "Année scolaire <span class='float-right badge bg-warning'>".$_SESSION['datepanel']."</span>";
               }
             echo "</a>
          </li>
          <li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>
              Ville <span class='float-right badge bg-primary'>".$ville."</span>
            </a>
          </li>
          <li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>
              Quartier <span class='float-right badge bg-info'>".$quartier."</span>
            </a>
          </li>
          <li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>
              Lien du personnel <span class='float-right badge bg-info'>".$Lien."</span>
            </a>
          </li>
          <li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>
              Lien des parents <span class='float-right badge bg-info'>".$Lieneltern."</span>
            </a>
          </li>";
         

         

          echo "<li class='nav-item'>
            <a href='detail.php?etab=".$idetablier."' class='nav-link'>
              Date création <span class='float-right badge bg-info'>".format(infoi1stnscrit($bddt,$idetablier))."</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <!-- /.col -->

";


      }
 $reponse->closeCursor();
  
  ?>



   
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </br></br></br></br></br>
  <footer class="main-footer">
 
  <div class="btn-group w-100 mb-2">
  <?php   echo "<button class='btn btn-secondary' type='button' data-toggle='modal'   data-target='#essai'>Demander un essai</button>";

?>
  </div>
   </footer>
   
   <?php
  echo "<div class='modal fade' id='essai'>
  <div class='modal-dialog'>
    <div class='modal-content '>
      <div class='modal-header'>
        <h4 class='modal-title'>Demander un essai</h4>
         
        <form action='traitement.php' method='POST'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <p>
       
        <label for='exampleInputEmail1'>&nbsp &nbsp &nbsp &nbsp===== INFORMATIONS DE BASE =====</label><br>
        <div class='form-group'>
        <label for='exampleInputEmail1'>Type d'établissement</label>
        <select name='type' class='form-control'>
        <option value='1'>Primaire et maternelle</option>
        <option value='2'>Secondaire</option>
        </select>
        </div>
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
                  <input name='lienparent' class='form-control' id='exampleInputEmail1' required>
                  </div>
                  <label for='exampleInputEmail1'>Votre nom d'utilisateur</label>
                  <div class='input-group mb-3'>
          <input type='text' name='user' class='form-control'>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-user'></span>
            </div>
          </div>
        </div>
        <label for='exampleInputEmail1'>Votre mot de passe</label>
        <div class='input-group mb-3'>
          <input type='password' name='motp' class='form-control'>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-lock'></span>
            </div>
          </div>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
 
</body>
</html>
