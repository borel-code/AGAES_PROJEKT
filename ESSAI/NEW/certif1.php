<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; 
if(isset($_POST['send'])){
$an=$_POST['ann'];$_SESSION['anlistklas']=$_POST['ann'];
$klas=$_POST['clas'];$_SESSION['klaslistklas']=$_POST['clas'];
}
 
else{
    if(isset($_POST['sendautr'])){
        $_SESSION['klaslistklas']=$_POST['autrclas'];
        $klas=$_SESSION['klaslistklas'];
        $an=$_SESSION['anlistklas'];
      }
      else{ 
  $an=$_SESSION['anlistklas'];
  $klas=$_SESSION['klaslistklas'];}
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
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR   $_SESSION['code']==4 OR   $_SESSION['code']==7) ){ 
  



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
    <!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
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
      <li class="nav-item">
      <form action='certif.php' method='POST'>
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
            <h1 class="m-0">  <?php 
            
            echo " 
            <form method='POST' action='certif1.php'><table class='table table-bordered table-hover'>
            <TR><TH>
            <div class='select2-purple'>
            <select name='autrclas'  class='select2' id='exampleInputPassword1'>
         ";   
         $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' ");
         while ($donnees = $reponse->fetch()){   
        
            $phrase =$donnees['id'] ; 
            $p='value='.$phrase;
            $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            if($effect>0){ 
              echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
              &nbsp ( '.$effect.' )</option>' ; 
             }  } 
        $reponse->closeCursor();
        echo "</select></div></TH><TH><button type='submit' class='btn btn-primary' name='sendautr'>OK</button></TH></TR>
        </TABLE> </form>
        ";?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0"> 
           
            </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php  
              echo "<ol class='breadcrumb float-sm-right'>
              <li class='breadcrumb-item'>
              <form method='POST' action='certif1.php'><table class='table table-bordered table-hover'>
              <TR><TH>
               
              <select name='choix'  class='select2' id='exampleInputPassword1'>
          <option value='0'>TOUT</option> ";   
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
          $reponse = $bdda->query($v);
           
          while ($donnees = $reponse->fetch())
          {
             echo "<option value='".$donnees['matelev']."'>".$donnees['nomelev']." ".$donnees['preelev']."</option> ";
          } 
          $reponse->closeCursor();
          echo "</select> </TH><TH><button type='submit' class='btn btn-primary' name='send1'>OK</button></TH></TR>
          </TABLE> </form>
          ";
          
        
             ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
     
           
  
                




    <!-- /.content -->  

    
        

          <?php 
  


 if(isset($_POST['send'])){ 

 


          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "  
     <table class='table table-bordered table-hover'> 
      <tr> 
      <center> <th><img src='ENTBULL.png' height='150px' width='1100px' ><br>
     <img src='ENTBULL1.png' height='200px' width='1000px' >
     <img src='espace.png' height=100px' width='1000px' > </center> <br> <br>
   ";
     
   
     echo " <B><img src='LOGOCERTIF.png' height=110px' width='1100px' ><br> 
     <img src='espace.png' height=70px' width='1000px' ><br>
     Je soussigné, certifie que / I the undersigned, certify that<br>
     <img src='espace.png' height=30px' width='1000px'><br>
     L'élève / The student :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['nomelev'] ." ".$donnees['preelev']."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Née le / Born on :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['datelev'] ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Matricule / Registration N° :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['matelev'] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Est inscrit(e) dans mon établissement / 
     is registered in my school
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Classe / Class :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".classparid($bdda,$donnees['niveauelev'],$_SESSION['annee']) ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Année académique / Academic year :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$_SESSION['annee']."
     <br><img src='espace.png' height=100px' width='1000px'><br>
     En foi de quoi le présent certificat lui est délivré pour servir et valoir ce que de droit
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
     This certificate is consequently issued to serve all legal purposes
     <br><img src='espace.png' height=200px' width='1000px'><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Fait à Douala le .....................................................
      <br> 
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Done in Douala on  
      <br><img src='espace.png' height=30px' width='500px'><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Le chef de l'établissement &nbsp&nbsp / &nbsp&nbsp The head of Establishment
      <br><img src='espace.png' height=200px' width='500px'><br>
     </B></th></tr></table> ";
     $n=$n+1;
   } 
   $reponse->closeCursor();
  }



  if(isset($_POST['sendautr'])){ 

 


    $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
$reponse = $bdda->query($v);
$n=0;
while ($donnees = $reponse->fetch())
{
$i=$n+1;  
 echo "  
     <table class='table table-bordered table-hover'> 
      <tr> 
      <center> <th><img src='ENTBULL.png' height='150px' width='1100px' ><br>
     <img src='ENTBULL1.png' height='200px' width='1000px' >
     <img src='espace.png' height=100px' width='1000px' > </center> <br> <br>
   ";
     
   
     echo " <B><img src='LOGOCERTIF.png' height=110px' width='1100px' ><br> 
     <img src='espace.png' height=70px' width='1000px' ><br>
     Je soussigné, certifie que / I the undersigned, certify that<br>
     <img src='espace.png' height=30px' width='1000px'><br>
     L'élève / The student :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['nomelev'] ." ".$donnees['preelev']."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Née le / Born on :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['datelev'] ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Matricule / Registration N° :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['matelev'] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Est inscrit(e) dans mon établissement / 
     is registered in my school
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Classe / Class :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".classparid($bdda,$donnees['niveauelev'],$_SESSION['annee']) ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Année académique / Academic year :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$_SESSION['annee']."
     <br><img src='espace.png' height=100px' width='1000px'><br>
     En foi de quoi le présent certificat lui est délivré pour servir et valoir ce que de droit
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
     This certificate is consequently issued to serve all legal purposes
     <br><img src='espace.png' height=200px' width='1000px'><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Fait à Douala le .....................................................
      <br> 
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Done in Douala on  
      <br><img src='espace.png' height=30px' width='500px'><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Le chef de l'établissement &nbsp&nbsp / &nbsp&nbsp The head of Establishment
      <br><img src='espace.png' height=200px' width='500px'><br>
     </B></th></tr></table> ";
$n=$n+1;
} 
$reponse->closeCursor();
}


 if(isset($_POST['send1'])){  
   

    if($_POST['choix']=='0'){ 
        $v="SELECT *  FROM eleve  WHERE anelev='".$_SESSION['anlistklas']."' AND id_etab='0' AND niveauelev='".$_SESSION['klaslistklas']."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
    echo "  
     <table class='table table-bordered table-hover'> 
      <tr> 
      <center> <th><img src='ENTBULL.png' height='150px' width='1100px' ><br>
     <img src='ENTBULL1.png' height='200px' width='1000px' >
     <img src='espace.png' height=100px' width='1000px' > </center> <br> <br>
   ";
     
   
     echo " <B><img src='LOGOCERTIF.png' height=110px' width='1100px' ><br> 
     <img src='espace.png' height=70px' width='1000px' ><br>
     Je soussigné, certifie que / I the undersigned, certify that<br>
     <img src='espace.png' height=30px' width='1000px'><br>
     L'élève / The student :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['nomelev'] ." ".$donnees['preelev']."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Née le / Born on :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['datelev'] ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Matricule / Registration N° :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['matelev'] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Est inscrit(e) dans mon établissement / 
     is registered in my school
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Classe / Class :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".classparid($bdda,$donnees['niveauelev'],$_SESSION['annee']) ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Année académique / Academic year :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$_SESSION['annee']."
     <br><img src='espace.png' height=100px' width='1000px'><br>
     En foi de quoi le présent certificat lui est délivré pour servir et valoir ce que de droit
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
     This certificate is consequently issued to serve all legal purposes
     <br><img src='espace.png' height=200px' width='1000px'><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Fait à Douala le .....................................................
      <br> 
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Done in Douala on  
      <br><img src='espace.png' height=30px' width='500px'><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Le chef de l'établissement &nbsp&nbsp / &nbsp&nbsp The head of Establishment
      <br><img src='espace.png' height=200px' width='500px'><br>
     </B></th></tr></table> ";
     $n=$n+1;
   } 
   $reponse->closeCursor();

    }

    if( $_POST['choix']!=0 ){ 
        $v="SELECT *  FROM eleve  WHERE anelev='".$_SESSION['anlistklas']."' AND id_etab='0' 
        AND niveauelev='".$_SESSION['klaslistklas']."' AND matelev='".$_POST['choix']."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $i=$n+1;  
    echo "  
     <table class='table table-bordered table-hover'> 
      <tr> 
      <center> <th><img src='ENTBULL.png' height='150px' width='1100px' ><br>
     <img src='ENTBULL1.png' height='200px' width='1000px' >
     <img src='espace.png' height=100px' width='1000px' > </center> <br> <br>
   ";
     
   
     echo " <B><img src='LOGOCERTIF.png' height=110px' width='1100px' ><br> 
     <img src='espace.png' height=70px' width='1000px' ><br>
     Je soussigné, certifie que / I the undersigned, certify that<br>
     <img src='espace.png' height=30px' width='1000px'><br>
     L'élève / The student :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['nomelev'] ." ".$donnees['preelev']."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Née le / Born on :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['datelev'] ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Matricule / Registration N° :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$donnees['matelev'] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Est inscrit(e) dans mon établissement / 
     is registered in my school
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Classe / Class :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".classparid($bdda,$donnees['niveauelev'],$_SESSION['annee']) ."
     <br><img src='espace.png' height=30px' width='1000px'><br>
     Année académique / Academic year :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     ".$_SESSION['annee']."
     <br><img src='espace.png' height=100px' width='1000px'><br>
     En foi de quoi le présent certificat lui est délivré pour servir et valoir ce que de droit
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
     This certificate is consequently issued to serve all legal purposes
     <br><img src='espace.png' height=200px' width='1000px'><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Fait à Douala le .....................................................
      <br> 
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Done in Douala on  
      <br><img src='espace.png' height=30px' width='500px'><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     Le chef de l'établissement &nbsp&nbsp / &nbsp&nbsp The head of Establishment
      <br><img src='espace.png' height=200px' width='500px'><br>
     </B></th></tr></table> ";
        $n=$n+1;
      } 
      $reponse->closeCursor();

     }

    

  }
  
  ?>
  </Br></Br></Br></Br></Br>
  
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



<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>



</body>
</html>
<?php }   ?>