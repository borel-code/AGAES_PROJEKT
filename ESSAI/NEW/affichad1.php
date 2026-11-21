<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';require '../lesmenushoriz2.php';
if(isset($_POST['send'])){
$an=$_POST['ann'];$_SESSION['anenstout1']=$_POST['ann'];
 
}
else{
  $an=$_SESSION['anenstout1']; 
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">LISTE DU PERSONNEL ADMINISTRATIF <?php echo $an;?> </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php echo affichad1horizcoll();?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center><img src="AGAES3.png" height=180px" width="1300px" ><br>
             
            <img src="espace.png" height=100px" width="1000px" ><br> <br>
           </center>
           <?php if(isset($_POST['send'])){//etatclass
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                  <br><br> LISTE DU PERSONNEL ADMINISTRATIF</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, commercial, industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    if($_POST['choix']=='1'){ 
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                  <br><br> LISTE DU PERSONNEL ADMINISTRATIF</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, commercial, industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;
    }

    if( $_POST['choix']==2 ){ 
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                  <br><br> LISTE DU PERSONNEL ADMINISTRATIF</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, commercial, industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;
    }
 

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  

 function format($date){
    $a=substr($date,0,4);
     
    $m=substr($date,5,2);
     
    $j=substr($date,8,2);
     
    $dat=$j."/".$m."/".$a;
    return $dat;
  }

  function respsco($bdda,$id){
    
 $v="SELECT * FROM admin WHERE id_etab='0' ";
 $reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
        if($donnees['id']==$id  ){ 
           $genre= $donnees['genre'];
           if($genre=='M'){
             $nom= 'M . '.$donnees['nom'];
           }
          if($genre=='F'){
            $nom= 'Mme '.$donnees['nom'];
          }
        }
 } 
 $reponse->closeCursor(); 
 return $nom;
}

 if(isset($_POST['send'])){ 

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
<td><B>GENRE</B></td><td><B>TELEPHONE</B></td><td><B>POSTE</B></td>
 </tr> ";


$ve="SELECT * FROM admin WHERE  anens='".$an."' AND id_etab='0' AND intrus=0 AND sup='0' ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       $tel=$donnees['numtel'];
       $code=$donnees['code'];
                echo "<tr><td ><B>".$i."</B></td>
               <td ><B>".$nname."</B></td>
               <td ><B>".$genre."</B></td>
               <td ><B>".$tel."</B></td> 
               <td ><B>".postefonct($code)."</B></td>
               </tr>" ;
       $n=$n+1;
     } 
     $reponse->closeCursor();
      
  }

 if(isset($_POST['send1'])){  
  

    if($_POST['choix']=='1'){ 
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
        <td><B>GENRE</B></td><td><B>TELEPHONE</B></td><td><B>POSTE</B></td>
         </tr> ";
        
        
        $ve="SELECT * FROM admin WHERE  anens='".$an."' AND id_etab='0' AND intrus=0 AND sup='0' ORDER BY code";
        $reponse = $bdda->query($ve);
             $n=0; 
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $nname=$donnees['nom'];
               $genre=$donnees['genre'];
               if($genre=='M'){
                $nname="M . ".$nname;
               }
               if($genre=='F'){
                $nname="Mme ".$nname;
               }
               $tel=$donnees['numtel'];
               $code=$donnees['code'];
                        echo "<tr><td ><B>".$i."</B></td>
                       <td ><B>".$nname."</B></td>
                       <td ><B>".$genre."</B></td>
                       <td ><B>".$tel."</B></td> 
                       <td ><B>".postefonct($code)."</B></td>
                       </tr>" ;
               $n=$n+1;
             } 
             $reponse->closeCursor();
    }

    if( $_POST['choix']==2 ){ 
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
        <td><B>GENRE</B></td><td><B>TELEPHONE</B></td><td><B>POSTE</B></td><td><B>SALAIRE</B></td>
        <td><B>NOM D'UTILISATEUR</B></td><td><B>MOT DE PASSE</B></td> </tr> ";
        
        
        $ve="SELECT * FROM admin WHERE  anens='".$an."' AND id_etab='0' AND intrus=0 AND sup='0' ORDER BY code";
        $reponse = $bdda->query($ve);
             $n=0; 
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $nname=$donnees['nom'];
               $genre=$donnees['genre'];
               if($genre=='M'){
                $nname="M . ".$nname;
               }
               if($genre=='F'){
                $nname="Mme ".$nname;
               }
               $tel=$donnees['numtel'];
               $code=$donnees['code'];
                        echo "<tr><td ><B>".$i."</B></td>
                       <td ><B>".$nname."</B></td>
                       <td ><B>".$genre."</B></td>
                       <td ><B>".$tel."</B></td> 
                       <td ><B>".postefonct($code)."</B></td><td ><B>".$donnees['salaire']." FCFA</td>
                       <td ><B>
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                      <option></option><option>".$donnees['user']."</option></select></form>
                     </td>
                     <td ><B> 
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                     <option></option><option>".$donnees['mtpasse']."</option></select></form>
                      </td>
                       </tr>" ;
               $n=$n+1;
             } 
             $reponse->closeCursor();

     }

    if( $_POST['choix']==3 ){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>DATE DE NAISSANCE</B></td><td><B>TELEPHONE</B></td>
      <td><B>TAUX HORAIRE</B></td><td><B>SALAIRE</B></td><td><B>N°CNI</B></td>
      
      <td><B>MOT DE PASSE</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      $n=0;
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
          
           while ($donnees = $reponse->fetch())
           {
               if(testypensg($bdda,$donnees['cni'],$an,'1')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".datensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".tauxensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>".salaireensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                      <option></option><option>".cniensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                     </td>
                     <td ><B> 
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                     <option></option><option>".mtpasseensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                      </td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
           }  } 
           $reponse->closeCursor();
     }
 
     if($_POST['choix']=='4'){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>TELEPHONE</B></td>
      
      <td><B>MATIERES ET CLASSES</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'2')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".matclassensg1($bdda,$donnees['cni'],$an,'2','2')."</B></td><td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();
    }

    if( $_POST['choix']==5){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
         
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'2')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();

     }

    if( $_POST['choix']==6){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>DATE DE NAISSANCE</B></td><td><B>TELEPHONE</B></td>
      <td><B>TAUX HORAIRE</B></td><td><B>SALAIRE</B></td><td><B>N°CNI</B></td>
      
      <td><B>MOT DE PASSE</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      $n=0;
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
          
           while ($donnees = $reponse->fetch())
           {
               if(testypensg($bdda,$donnees['cni'],$an,'2')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".datensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".tauxensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>".salaireensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                      <option></option><option>".cniensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                     </td>
                     <td ><B> 
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                     <option></option><option>".mtpasseensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                      </td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
           }  } 
           $reponse->closeCursor();
     }
        
     if($_POST['choix']=='7'){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>TELEPHONE</B></td>
      
      <td><B>MATIERES ET CLASSES</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'3')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".matclassensg1($bdda,$donnees['cni'],$an,'3','3')."</B></td><td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();
    }

    if( $_POST['choix']==8){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
         
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'3')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();

     }

    if( $_POST['choix']==9){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>DATE DE NAISSANCE</B></td><td><B>TELEPHONE</B></td>
      <td><B>TAUX HORAIRE</B></td><td><B>SALAIRE</B></td><td><B>N°CNI</B></td>
      
      <td><B>MOT DE PASSE</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      $n=0;
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
          
           while ($donnees = $reponse->fetch())
           {
               if(testypensg($bdda,$donnees['cni'],$an,'3')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".datensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".tauxensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>".salaireensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                      <option></option><option>".cniensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                     </td>
                     <td ><B> 
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                     <option></option><option>".mtpasseensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                      </td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
           }  } 
           $reponse->closeCursor();
     }

     if($_POST['choix']=='10'){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>TELEPHONE</B></td>
      
      <td><B>MATIERES ET CLASSES</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'4')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".matclassensg1($bdda,$donnees['cni'],$an,'4','4')."</B></td><td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();
    }

    if( $_POST['choix']==11){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
         
      <td><B>A/S</B></td></tr> ";
      
      
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
           $n=0; 
           while ($donnees = $reponse->fetch())
           {
             if(testypensg($bdda,$donnees['cni'],$an,'4')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
            }  }
           $reponse->closeCursor();

     }

    if( $_POST['choix']==12){ 
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
      <td><B>GENRE</B></td><td><B>DATE DE NAISSANCE</B></td><td><B>TELEPHONE</B></td>
      <td><B>TAUX HORAIRE</B></td><td><B>SALAIRE</B></td><td><B>N°CNI</B></td>
      
      <td><B>MOT DE PASSE</B></td>  
      <td><B>A/S</B></td></tr> ";
      
      $n=0;
      $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
      $reponse = $bdda->query($ve);
          
           while ($donnees = $reponse->fetch())
           {
               if(testypensg($bdda,$donnees['cni'],$an,'4')==1 ){
             $i=$n+1;  
             $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
             $phras =$donnees['cni'] ; 
                      
                      $pe="value=".$phras;
                     echo "<tr><td ><B>".$i."</B></td>
                     <td ><B>".$de."</B></td>
                     <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".datensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                     <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td>
                     <td ><B>".tauxensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>".salaireensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                     <td ><B>
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                      <option></option><option>".cniensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                     </td>
                     <td ><B> 
                     <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                     <option></option><option>".mtpasseensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                      </td>
                     <td ><B>".$an."</B></td></tr>" ;
             $n=$n+1;
           }  } 
           $reponse->closeCursor();
     }
          




        if( $_POST['choix']==13 ){  
  
          echo " <table class='table table-bordered table-hover'> 
          <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
          <td><B>GENRE</B></td><td><B>TELEPHONE</B></td>
          
          <td><B>MATIERES ET CLASSES</B></td>  
          <td><B>A/S</B></td></tr> ";
          
          
          $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
          $reponse = $bdda->query($ve);
               $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
               while ($donnees = $reponse->fetch())
               {
                 $i=$n+1;  
                 $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
                 $phras =$donnees['cni'] ; 
                          
                          $pe="value=".$phras;
                         echo "<tr><td ><B>".$i."</B></td>
                         <td ><B>".$de."</B></td>
                         <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                         <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                         <td ><B>".matclassensg($bdda,$donnees['cni'],$an)."</B></td><td ><B>".$an."</B></td></tr>" ;
                 $n=$n+1;
               } 
               $reponse->closeCursor();
          }
          
           if( $_POST['choix']==14 ){  
  
          echo " <table class='table table-bordered table-hover'> 
          <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
          <td><B>A/S</B></td>
           </tr> ";
          
          
          $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
          $reponse = $bdda->query($ve);
               $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
               while ($donnees = $reponse->fetch())
               {
                 $i=$n+1;  
                 $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
                 $phras =$donnees['cni'] ; 
                          
                          $pe="value=".$phras;
                         echo "<tr><td ><B>".$i."</B></td>
                         <td ><B>".$de."</B></td>
                         <td ><B>".$an."</B></td></tr>" ;
                 $n=$n+1;
               } 
               $reponse->closeCursor();
          }
          
          if( $_POST['choix']==15 ){  
  
            echo " <table class='table table-bordered table-hover'> 
            <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td>
            <td><B>GENRE</B></td><td><B>DATE DE NAISSANCE</B></td><td><B>TELEPHONE</B></td>
            <td><B>TAUX HORAIRE</B></td><td><B>SALAIRE</B></td><td><B>N°CNI</B></td>
            
            <td><B>MOT DE PASSE</B></td>  
            <td><B>A/S</B></td></tr> ";
            
            $n=0;
            $ve="SELECT DISTINCT cni FROM enseignant WHERE  anens='".$an."' AND id_etab='0' AND discipline!=' ' AND supp='0' ORDER BY nomens";
            $reponse = $bdda->query($ve);
                
                 while ($donnees = $reponse->fetch())
                 {
                   $i=$n+1;  
                   $de=nomensmitjahr($bdda,$donnees['cni'],$an); 
                   $phras =$donnees['cni'] ; 
                            
                            $pe="value=".$phras;
                           echo "<tr><td ><B>".$i."</B></td>
                           <td ><B>".$de."</B></td>
                           <td ><B>".sexensuniq($bdda,$donnees['cni'],$an)."</B></td>
                           <td ><B>".datensuniq($bdda,$donnees['cni'],$an)."</B></td> 
                           <td ><B>".telensuniq($bdda,$donnees['cni'],$an)."</B></td>
                           <td ><B>".tauxensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                           <td ><B>".salaireensuniq($bdda,$donnees['cni'],$an)." FCFA</td>
                           <td ><B>
                           <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'>
                            <option></option><option>".cniensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                           </td>
                           <td ><B> 
                           <form><select class='form-control select2' style='width: 100%;' id='exampleInputPassword1'> 
                           <option></option><option>".mtpasseensuniq($bdda,$donnees['cni'],$an)."</option></select></form>
                            </td>
                           <td ><B>".$an."</B></td></tr>" ;
                   $n=$n+1;
                 } 
                 $reponse->closeCursor();
            }
            

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