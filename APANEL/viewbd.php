<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require '../lesmenusad.php';require '../connecterC.php';require '../lesfunctions.php';
 $bloc=1;$actif=$bloc; $pageactif=2;

    if(isset($_GET['etab'])){
        $_SESSION['institut']=$_GET['etab'];
   }
    if(isset($_GET['action'])){
        $_SESSION['actiondet']=$_GET['action'];
    }
    $cont_tab_dmd=infoschool($bddt,$_SESSION['institut']);
    $tableau=array();
    $tableau=explode('@',$cont_tab_dmd);
    $_SESSION['jidetablier']=$tableau[0];  $_SESSION['jnometab']=$tableau[1];
    $_SESSION['jnumetab']=$tableau[2]; $_SESSION['jvilletab']=$tableau[3];
    $_SESSION['jqtieretab']=$tableau[4]; $_SESSION['jnomadm']=$tableau[5];
    $_SESSION['jnumadm']=$tableau[6]; $_SESSION['jlien']=$tableau[7];
    $_SESSION['jlienparent']=$tableau[8]; $_SESSION['juser']=$tableau[9];
    $_SESSION['jmotp']=$tableau[10]; $_SESSION['jbase']=$tableau[11];
    $_SESSION['jinitial']=$tableau[12]; 

    $contenu=infoinscrit($bddt,$_SESSION['institut'],$_SESSION['idatepanel']);

    $_SESSION['jcout']=0;
    $_SESSION['jtotalavance']=0;  $_SESSION['jdatedeb']=' ';
    $_SESSION['jdateproro']=' ';  $_SESSION['jleiter']=' ';
    if($contenu!='@')  {
    $tabl=array();
    $tabl=explode('@',$contenu);
    $_SESSION['jinscrit']=$tabl[0];  $_SESSION['jcout']=$tabl[1]+0;
    $_SESSION['jtotalavance']=$tabl[2]+0;  $_SESSION['jdatedeb']=$tabl[3];
    $_SESSION['jdateproro']=$tabl[4];  $_SESSION['jleiter']=$tabl[5];
    }
    if($contenu=='@')  {
      $_SESSION['jdatedeb']='---';
      $_SESSION['jdateproro']='---';   
    }
 ?>
    
    
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGAES | OFFICIEL</title>

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
      <?php  echo "<form action='bord.php' method='POST'>"; ?>
     <button type="submit" class="btn"  style='color:white';>
      <i class="fas fa-arrow-left text-muted"></i>
    </button>
     </form> 
    </li>
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
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="nav-icon fas fa-th"></i>
          <b>Menu</b>
          <!--span class="badge badge-warning navbar-badge">15</span-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="color:blue;">Actions</span>
          
          <?php  
          echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=0' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Inscription dans une année scolaire
               </a>";
               echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=1' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Paiements/renouvellements
               </a>";
                echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=5' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Choisir une année scolaire
               </a>";
           echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=4' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Informations de l'établissement
               </a>";
            
            echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=2' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Supprimer l'établissement
               </a>";
         echo "<div class='dropdown-divider'></div>
               <a href='detail.php?action=3' class='dropdown-item'>
                 <i class='fas fa-file mr-2'></i> Paiements
               </a>";
         
            ?>

           
          
        </div>
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
      <h3 class="mt-4 mb-4">GERER LES BASES DE DONNEES  </h3>

<div class="row">

<?php 
 
 echo "
 <div class='col-lg-6'>
           <div class='card card-primary card-outline'>
              
               
              
              <div class='card-body'>
                <h6 class='card-title'><b>
            
 <table><tr bgcolor='purple'><td style='color:white';>
 <center>&nbsp &nbsp &nbsp &nbsp GERER LES BASES DE DONNEES &nbsp &nbsp &nbsp &nbsp </center></td></tr></table>
 
     </b></h6></br></br> 
    <form action='executepanel.php' method='POST'>             
        <label for='exampleInputEmail1'>Les bases de données disponibles</label>
        <select name='newan' class='form-control'>";
         $tb="SELECT * FROM lesbases ORDER BY nom DESC" ;
  $teponse = $bddt->query($tb);
   
  while ($tonnees = $teponse->fetch() )
  {
        if($tonnees['dispo']==0){
            $DISDB="Disponible";
        }
        if($tonnees['dispo']==1){
            $DISDB="Non disponible";
        }
        if($tonnees['type']==1){
            $TDB="Primaire/maternelle";
        }
        if($tonnees['type']==2){
            $TDB="Secondaire";
        }
        echo "<option value='".$idlesbases."'>".$tonnees['nom']." [ ".$DISDB." ] [ ".$TDB." ] </option>";  
      
  } 
  $teponse->closeCursor(); 
       echo "</select></br>
        <label for='exampleInputEmail1'>Type d'établissement</label>
        <select name='sort' class='form-control'>
 <option value='1'>Primaire/maternelle</option> <option value='2'>Secondaire</option>
        </select></br>
       <label for='exampleInputEmail1'>Nom de la base de données</label>
       <div class='input-group mb-3' >
          <div class='input-group-append'>
                      <span class='input-group-text'>u356752624_</span>
                  </div>
               <input name='nambd'  class='form-control'   id='exampleInputEmail1' required> 
               </div>
      <div class='modal-footer justify-content-between'>
        <button type='button'  class='btn btn-default' data-dismiss='modal'> </button>
        <button type='submit' name='regisbd'   class='btn btn-primary'>Enregistrer</button>
</div></form>

              </div>
            </div>

             
          </div>
          <!-- /.col-md-6 -->

          <div class='col-lg-6'>
            <div class='card card-default card-outline'>
              
              <div class='card-body'> 
                <!--label for='exampleInputEmail1'>Avance en FCFA</label-->
                
                 </br> </br></br></br> </br>
                </b>
              </div>
            </div>
 
             
          </div>
          <!-- /.col-md-6 -->
 ";
 



  
 
  ?>



   
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </br></br></br></br></br>
  <footer class="main-footer">
 
  <div class="btn-group w-100 mb-2">
  <?php    
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
