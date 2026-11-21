<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require '../lesmenusad.php';require '../connecterC.php';require '../lesfunctions.php';
 $bloc=1;$actif=$bloc; $pageactif=1;



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
  <title>AGAES | OFFICIEL - détails</title>

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
      <h3 class="mt-4 mb-4">Tableau de bord | <?php echo $_SESSION['jnometab']; ?></h3>

<div class="row">

<?php 
if($_SESSION['actiondet']==0){ 
 echo "
 <div class='col-lg-6'>
           <div class='card card-primary card-outline'>
              <div class='card-header'>
                <h7><b>
                Année scolaire : ".$_SESSION['datepanel']."</br>
                ID de l'établissement : ".$_SESSION['jidetablier']."</br>
                ID du groupe de l'établissement :  </br>
                Numéro téléphone : ".$_SESSION['jnumetab']."</br>
                Base de données : ".$_SESSION['jbase']."</br>
                Dossier du personnel : ".$_SESSION['jlien']."</br>
                Dossier des parents : ".$_SESSION['jlienparent']."</br>
                Lien du personnel : <a href='".urlracine().$_SESSION['jlien']."' target='_blank'>".urlracine().$_SESSION['jlien']."</a></br>
                Lien des parents : <a href='".urlracine().$_SESSION['jlienparent']."' target='_blank'>".urlracine().$_SESSION['jlienparent']."</a></br>
                </b></h7>
              </div>
              <div class='card-header'>
                <h7><b>
                Ses années d'inscription : ";
                $tb="SELECT * FROM inscrit ORDER BY idas" ;
  $teponse = $bddt->query($tb);
  while ($tonnees = $teponse->fetch() )
  {
  if($tonnees['idetablier']==$_SESSION['jidetablier']){
        echo namean($bddt,$tonnees['idas']).", ";  
     
      }
  } 
  $teponse->closeCursor(); 
                echo "</b></h7>
              </div>
              
              <div class='card-body'>
                <h6 class='card-title'><b>
            
 <table><tr bgcolor='purple'><td style='color:white';>
 <center>&nbsp &nbsp &nbsp &nbsp INSCRIRE DANS UNE ANNEE SCOLAIRE &nbsp &nbsp &nbsp &nbsp </center></td></tr></table>
 
     </b></h6></br></br> 
    <form action='executepanel.php' method='POST'>             
        <label for='exampleInputEmail1'>Année scolaire</label>
        <select name='newan' class='form-control'>";
         $tb="SELECT * FROM lesannees ORDER BY idas DESC" ;
  $teponse = $bddt->query($tb);
  while ($tonnees = $teponse->fetch() )
  {
    $Vinscr=Vinscrit($bddt,$_SESSION['jidetablier'],$tonnees['idas']);
  if($Vinscr==0){
        echo "<option value='".$tonnees['idas']."'>".$tonnees['nomas']."</option>";  
     
      }
  } 
  $teponse->closeCursor(); 
       echo "</select></br>
       <label for='exampleInputEmail1'>Coût sur l'année scolaire en FCFA</label>
               <input name='total'  class='form-control'   id='exampleInputEmail1' required></br>
      
              </div>
            </div>

             
          </div>
          <!-- /.col-md-6 -->

          <div class='col-lg-6'>
            <div class='card card-default card-outline'>
              
              <div class='card-body'> 
                <label for='exampleInputEmail1'>Avance en FCFA</label>
               <input name='avance'  class='form-control'   id='exampleInputEmail1' required></br>
               <label for='exampleInputEmail1'>Date du renouvellement (jj.mm.aaaa)</label>
               <input name='daterenouv'  class='form-control'   id='exampleInputEmail1' required>
                <div class='modal-footer justify-content-between'>
        <button type='button'  class='btn btn-default' data-dismiss='modal'> </button>
        <button type='submit' name='modifproro'   class='btn btn-primary'>Enregistrer</button>
</div></form>
                 </br> </br></br></br> </br>
                </b>
              </div>
            </div>
 
             
          </div>
          <!-- /.col-md-6 -->
 ";
}




if($_SESSION['actiondet']==1){ 
   $yest=dansannee($bddt,$_SESSION['jidetablier'],$_SESSION['idatepanel']);
   $restep=$_SESSION['jcout']-$_SESSION['jtotalavance'];
 echo "
 <div class='col-lg-6'>
           <div class='card card-success card-outline'>
              <div class='card-header'>
                <h7><b>
                Année scolaire : ".$_SESSION['datepanel']."</br>
                ID de l'établissement : ".$_SESSION['jidetablier']."</br>
                ID du groupe de l'établissement :  </br>
                Numéro téléphone : ".$_SESSION['jnumetab']."</br>
                Base de données : ".$_SESSION['jbase']."</br>
                Dossier du personnel : ".$_SESSION['jlien']."</br>
                Dossier des parents : ".$_SESSION['jlienparent']."</br>
                Lien du personnel : <a href='".urlracine().$_SESSION['jlien']."' target='_blank'>".urlracine().$_SESSION['jlien']."</a></br>
                Lien des parents : <a href='".urlracine().$_SESSION['jlienparent']."' target='_blank'>".urlracine().$_SESSION['jlienparent']."</a></br>
               
                </b></h7>
              </div>
              <div class='card-header'>
                <h7><b>
                
                Date actuelle du renouvellement  : ".format($_SESSION['jdateproro'])."</br>
                Coût sur l'année scolaire en FCFA : ".$_SESSION['jcout']."</br>
                Montant déjà payé en FCFA : ".$_SESSION['jtotalavance']."</br>
                Reste en FCFA : ".$restep."</br></b></h7>
              </div>
              
               
    ";            
       if($yest==0){
       echo "
       <div class='card-body'>
                <h6 class='card-title'><b>
       <b>Vous ne pouvez pas effectuer de paiements/renouvellements dans cette année scolaire .</b></br></br>
       </b></h6></div> ";
         }  
       echo "
              
            </div>

             
          </div>
          <!-- /.col-md-6 -->

          <div class='col-lg-6'>
            <div class='card card-default card-outline'>
              
              <div class='card-body'> 
                 <table><tr bgcolor='purple'><td style='color:white';>
 <center>&nbsp &nbsp &nbsp &nbsp &nbsp  PAIEMENTS / RENOUVELLEMENTS &nbsp &nbsp &nbsp &nbsp &nbsp </center></td></tr></table>
 </br>
 <form action='executepanel.php' method='POST'> 
 <label for='exampleInputEmail1'>Coût sur l'année scolaire en FCFA</label>
               <input name='cout'  class='form-control' value='".$_SESSION['jcout']."'  id='exampleInputEmail1' required></br>
      
 <label for='exampleInputEmail1'>Montant payé en FCFA</label>
               <input name='paye'  class='form-control'   id='exampleInputEmail1'></br>
      
               <label for='exampleInputEmail1'>Prochaine date du renouvellement (jj.mm.aaaa)</label>
               <input name='daterenouv'  class='form-control'   id='exampleInputEmail1' required>
                <div class='modal-footer justify-content-between'>";
               
                if($yest!=0){
       echo "<button type='button'  class='btn btn-default' data-dismiss='modal'> </button>
        <button type='submit' name='modifproro' value='".$_SESSION['jinscrit']."'  class='btn btn-primary'>Enregistrer</button>";
         }
         
echo "</div></form>
                  
                </b>
              </div>
            </div>
 
             
          </div>
          <!-- /.col-md-6 -->
 ";
}


if($_SESSION['actiondet']==5){ 
 echo "
 <div class='col-lg-6'>
           <div class='card card-primary card-outline'>
              <div class='card-header'>
                <h7><b>
                Année scolaire choisie : ".$_SESSION['datepanel']."</br></br>
                ID de l'établissement : ".$_SESSION['jidetablier']."</br>
                ID du groupe de l'établissement :  </br>
                Numéro téléphone : ".$_SESSION['jnumetab']."</br></br>
                </b></h7>
              </div>
              <div class='card-header'>
                <h7><b>
                Ses années d'inscription : ";
                $tb="SELECT * FROM inscrit ORDER BY idas" ;
  $teponse = $bddt->query($tb);
  while ($tonnees = $teponse->fetch() )
  {
  if($tonnees['idetablier']==$_SESSION['jidetablier']){
        echo namean($bddt,$tonnees['idas']).", ";  
     
      }
  } 
  $teponse->closeCursor(); 
                echo "</b></h7>
              </div>
              
              <div class='card-body'>
                <h6 class='card-title'><b>
   
     </b></h6></br> 
    <form action='executepanel.php' method='POST'>             
       
        
              </div>
            </div>

             
          </div>
          <!-- /.col-md-6 -->

          <div class='col-lg-6'>
            <div class='card card-default card-outline'>
              
              <div class='card-body'> 
                <table><tr bgcolor='purple'><td style='color:white';>
 <center>&nbsp &nbsp &nbsp &nbsp CHOISIR UNE AUTRE ANNEE SCOLAIRE &nbsp &nbsp &nbsp &nbsp </center></td></tr></table>
  </br><label for='exampleInputEmail1'>Année scolaire</label>
        <select name='newan' class='form-control'>";   
         $tb="SELECT * FROM inscrit ORDER BY idas" ;
  $teponse = $bddt->query($tb);
  while ($tonnees = $teponse->fetch() )
  {
  if($tonnees['idetablier']==$_SESSION['jidetablier']){
       
        echo "<option value='".$tonnees['idas']."'>".namean($bddt,$tonnees['idas'])."</option>"; 
     
      }
  } 
  $teponse->closeCursor(); 
       echo "</select></br>
                <div class='modal-footer justify-content-between'>
        <button type='button'  class='btn btn-default' data-dismiss='modal'> </button>
        <button type='submit' name='modifanch'   class='btn btn-primary'>Enregistrer</button>
</div></form>
                  
                </b>
              </div>
            </div>
 
             
          </div>
          <!-- /.col-md-6 -->
 ";
}




if($_SESSION['actiondet']==2){ 
  echo "
  <div class='col-lg-6'>
            <div class='card card-primary card-outline'>
               <div class='card-header'>
                 <h5 class='card-title m-0'><b>Supprimer définitivement du système</b></h5>
               </div>
               <div class='card-body'>
                 <h7><b> 
                 
                 Année scolaire : ".$_SESSION['datepanel']."</br>
                ID de l'établissement : ".$_SESSION['jidetablier']."</br>
                ID du groupe de l'établissement :  </br>
                Numéro téléphone : ".$_SESSION['jnumetab']."</br>
                Base de données : ".$_SESSION['jbase']."</br>
                Dossier du personnel : ".$_SESSION['jlien']."</br>
                Dossier des parents : ".$_SESSION['jlienparent']."</br>
                Lien du personnel : <a href='".urlracine().$_SESSION['jlien']."' target='_blank'>".urlracine().$_SESSION['jlien']."</a></br>
                Lien des parents : <a href='".urlracine().$_SESSION['jlienparent']."' target='_blank'>".urlracine().$_SESSION['jlienparent']."</a></br>
               
                </b></h7></br>
 <form action='executepanel.php' method='POST'>
               
                 <div class='modal-footer justify-content-between'>
         <button type='button'  class='btn btn-default' data-dismiss='modal'> </button>
         <button type='button' data-toggle='modal' data-target='#modaal-danger'   class='btn btn-danger'>Supprimer</button>
 
 <div class='modal fade' id='modaal-danger'>
        <div class='modal-dialog'>
          <div class='modal-content '>
            <div class='modal-header'>
              <h4 class='modal-title'>Suppression définitivement du système</h4>
               
              <form action='executepanel.php' method='POST'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <p><div class='form-group'><b>
               Année scolaire : ".$_SESSION['datepanel']."</br>
                ID de l'établissement : ".$_SESSION['jidetablier']."</br>
                ID du groupe de l'établissement :  </br>
                Numéro téléphone : ".$_SESSION['jnumetab']."</br>
                Base de données : ".$_SESSION['jbase']."</br>
                Dossier du personnel : ".$_SESSION['jlien']."</br>
                Dossier des parents : ".$_SESSION['jlienparent']."</br>
                  </b></div> 
                   
                  <h5><i class='icon fas fa-exclamation-triangle'>
                   Voulez vous vraiment supprimer définitivement du système?
                  </i></h5>    
                  </p>
                  
            </div>
            <div class='modal-footer justify-content-between'>


             
              <button type='submit' class='btn btn-default' data-dismiss='modal'>Fermer</button>
              <button  type='submit' name='supproro' value='".$_SESSION['jidetablier']."' class='btn btn-danger'>Supprimer</button>
    </form></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 
 
         </div></form>
               </div>
             </div>
 
              
           </div>
           <!-- /.col-md-6 -->
 
           <div class='col-lg-6'>
             <div class='card card-primary card-outline'>
               <div class='card-header'>
                 <h5 class='card-title m-0'><b> </b></h5>
               </div>
               <div class='card-body'> 
                 
               </div>
             </div>
  
              
           </div>
           <!-- /.col-md-6 -->
  ";
 }
  ?>



   
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </br></br></br></br></br>
  <footer class="main-footer">
 
  <div class="btn-group w-100 mb-2">
  <?php   echo "<button class='btn btn-info' type='button' data-toggle='modal'>".$_SESSION['jnometab']."</button>";

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
