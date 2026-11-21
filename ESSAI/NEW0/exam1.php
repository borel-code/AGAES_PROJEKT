<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
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
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR   $_SESSION['code']==4 OR   $_SESSION['code']==7) ){ 
  
     if(!empty($_POST['mat']) AND !empty($_POST['ann'])){  
    $mat=$_POST['mat']; $_SESSION['matexam']=$mat; 
    $an=$_POST['ann'];  $_SESSION['anexam']=$an; 
    }
   else{  
        $mat=$_SESSION['matexam'] ; 
        $an=$_SESSION['anexam'] ; 
        }


    $v="SELECT *  FROM prorogation WHERE id='1' ";
    $reponse = $bdda->query($v);
    $delai=' ';
    while ($donnees = $reponse->fetch() )
    {
     
      $delai=$donnees['date'];
      
    } 
    $reponse->closeCursor();

    $v="SELECT * FROM eleve WHERE id_etab='0' AND matelev= '".$mat."' AND anelev= '".$an."'";
    $rep=$bdda->query($v);
    while($don=$rep->fetch()){
    $nom=$don['nomelev'];
    $pre=$don['preelev'];
    $clas=$don['niveauelev'];
}
$rep->closeCursor();
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
    <img src=" AGAES2.png" height=50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
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
            <h1 class="m-0">REGLEMENT DES FRAIS DES EXAMENS AU SECONDAIRE</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
               
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $nom." ".$pre." &nbsp&nbsp&nbsp&nbsp&nbsp ".classparid($clas,$an); ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="exam2.php" name="paiem">

                  <div class="form-group">
                  <label for="exampleInputPassword1">MONTANT</label>
                    <input name="mtnt" class="form-control" id="exampleInputPassword1"  placeholder=" EXPLE : 25000" required >
                    </br>
 

            <label for="exampleInputEmail1">MATRICULE</label>
                    <select name="mat" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$mat."'>".$mat." </option>";
						 
							 ?>
								</select></br>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ANNEE SCOLAIRE</label>
                    <select name="an" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$an."'>".$an." </option>";
						 
							 ?>
								</select>
                  </div>

                                <label for="exampleInputPassword1">RESPONSABLE SCOLARITE</label>
                    <select name="nomeco" class="form-control" id="exampleInputPassword1">
								  <?php  
								  echo "<option value='".$_SESSION['id']."'>".$_SESSION['nom']." </option>";?>
								  
								  </select></br>

                                <div class="card-footer">
                                <?php 
if($delai>=date('Y.m.d')){
echo "<button type='submit' class='btn btn-primary' >Valider</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
<button type='reset' class='btn btn-danger'>Annuler</button>";
    }
    ?>
                </div>
              </form>
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                       
        
        
        </div>
          <!--/.col (left) -->







  <!-- right column -->
  <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Détails de ses paiements</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
              <TABLE cellspacing='3'> 
              <TR><TD>Date</TD><TD>-----Heure-----</TD><TD>Montant</TD></TR>
							      <?php 

function format($date){
    $a=substr($date,0,4);
     
    $m=substr($date,5,2);
     
    $j=substr($date,8,2);
     
    $dat=$j."/".$m."/".$a;
    return $dat;
  }
                    	
                      $ve="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' ORDER BY date DESC";

                     $reponse = $bdda->query($ve);
                     while ($donnees = $reponse->fetch()){  
                        $xd=format($donnees['date'] );                           
                             echo  "<TR><TD>". $xd."</TD><TD>-----".$donnees['heure']."----</TD><TD>".$donnees['montant']." FCFA</TD></TR>";
                       } 
                  $reponse->closeCursor(); 
                   ?>
            </TABLE> 
                     
            <?php

            $v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
   
   $reponse = $bdda->query($v);
   while ($donnees = $reponse->fetch())
   {
      $rrrest=$donnees['reste'] ; 
	  $rcout=$donnees['cout'] ; 
	   $statut=$donnees['statut'];
       $total=$donnees['total'] ; 
   } 
   $reponse->closeCursor(); 
   
   echo "Cout de la scolarité : ".$rcout." FCFA<br>Total scolarité déjà versé : ".$total." FCFA<br>Reste : ".$rrrest." FCFA <br>"; 
    echo "Statut : ".$statut."<br>";
    
    $total1=0;
    $v="SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
    $repons = $bdda->query($v);
    while ($donnees = $repons->fetch())
    {
       $total1+=$donnees['montant'] ; 
        
    } 
    $repons->closeCursor(); 
    echo "Examen : ".$total1." FCFA<br>";
    ?>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

            
            
            </div>
            <!-- /.card -->
          </div>






          
          <!--/.col (right) -->
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