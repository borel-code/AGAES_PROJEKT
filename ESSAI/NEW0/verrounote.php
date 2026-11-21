<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require '../lesmenushoriz2.php';
set_time_limit(900);
if(isset($_POST['send2'])){
$an= $_SESSION['annee'] ;
$klas=$_POST['cls']; $_SESSION['klas']=$klas;
}
else{
  $an=$_SESSION['annee'] ;  $klas=$_SESSION['klas'];
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


 



$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2) ){ 
  

 

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
            <h1 class="m-0">VERROUILLER/DEVERROUILLER LES NOTES</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           </ol>  
            <ol class="breadcrumb float-sm-right">
             <?php echo listouthorizcoll();?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center> 
           </center>
           <?php  
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 function etat($bdda,$an,$eval){
 

     $v="SELECT *  FROM delai WHERE id_etab='0' AND an= '".$an."'";
     $reponse = $bdda->query($v);
        $t=0; $eta=0;
      while ($donnees = $reponse->fetch()  AND $t==0)
      {
        if($donnees['eval']==$eval) {
            $eta=$donnees['verrou'];
        $t= 1;
       }
      }
      $reponse->closeCursor();
     return $eta;
    } 
    
    
    function msg($cde){
  
            if($cde=='0') {
                return 'Verrouillé';
           }
           else {
            return 'Déverrouillé';
       }
        
        } 

        function action($cde){
  
            if($cde=='0') {
                return '1';
           }
           else {
            return '0';
       }
        
        }    


        function actionmsg($cde){
  
            if($cde=='0') {
                return 'déverrouiller';
           }
           else {
            return 'verrouiller';
       }
        
        } 

        function couleur($cde){
  
            if($cde=='0') {
                return 'btn btn-danger';
           }
           else {
            return 'btn btn-success';
       }
        
        } 

 if(isset($_POST['send2'])){// 
    $verifier1=etat($bdda,$_SESSION['annee'],'1');
    $mesg1=msg($verifier1);
    $verifier2=etat($bdda,$_SESSION['annee'],'2');
    $mesg2=msg($verifier2);
    $verifier3=etat($bdda,$_SESSION['annee'],'3');
    $mesg3=msg($verifier3);
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>TRIMESTRES (ETATS)</B></td><td><B>ACTIONS</B></td> 
 
 </tr> ";

  
 
 echo "<tr><th ><B>TRIMESTRE 1 ( ".$mesg1." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send1' value='".action($verifier1)."'
  class='".couleur($verifier1)."'>cliquer pour ".actionmsg($verifier1)."</button></th> ";

  echo "<tr><th ><B>TRIMESTRE 2 ( ".$mesg2." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send2' value='".action($verifier2)."'
  class='".couleur($verifier2)."'>cliquer pour ".actionmsg($verifier2)."</button></th> ";
  
  echo "<tr><th ><B>TRIMESTRE 3 ( ".$mesg3." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send3' value='".action($verifier3)."'
  class='".couleur($verifier3)."'>cliquer pour ".actionmsg($verifier3)."</button></th> ";
  
  }

   else{
       
    $verifier1=etat($bdda,$_SESSION['annee'],'1');
    $mesg1=msg($verifier1);
    $verifier2=etat($bdda,$_SESSION['annee'],'2');
    $mesg2=msg($verifier2);
    $verifier3=etat($bdda,$_SESSION['annee'],'3');
    $mesg3=msg($verifier3);
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>TRIMESTRES (ETATS)</B></td><td><B>ACTIONS</B></td> 
 
 </tr> ";

  
 
 echo "<tr><th ><B>TRIMESTRE 1 ( ".$mesg1." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send1' value='".action($verifier1)."'
  class='".couleur($verifier1)."'>cliquer pour ".actionmsg($verifier1)."</button></th> ";

  echo "<tr><th ><B>TRIMESTRE 2 ( ".$mesg2." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send2' value='".action($verifier2)."'
  class='".couleur($verifier2)."'>cliquer pour ".actionmsg($verifier2)."</button></th> ";
  
  echo "<tr><th ><B>TRIMESTRE 3 ( ".$mesg3." )</th>  
  <th><B> <form  method='POST' action='verrounote1.php' name='paiem'>
 <button type='submit' name='send3' value='".action($verifier3)."'
  class='".couleur($verifier3)."'>cliquer pour ".actionmsg($verifier3)."</button></th> ";
   }
  
  ?>
 </table> </Br></Br></Br></Br></Br>
 
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