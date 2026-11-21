<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';require '../lesmenushoriz2.php';
if(isset($_POST['send'])){
$an=$_POST['ann'];$_SESSION['anetatelev']=$_POST['ann'];
$niveauelev=$_POST['clas']; $_SESSION['clasetatelev']=$_POST['clas'];
$_SESSION['entreeok']=0;
}

if(isset($_POST['send1'])){
$_SESSION['choixchoice']=$_POST['choix'];
$_SESSION['entreeok']=1;
}
 $an=$_SESSION['anetatelev'];
 $niveauelev=$_SESSION['clasetatelev'];
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
 $valdevis="F CFA";

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR   $_SESSION['code']==4 OR   $_SESSION['code']==7) ){ 
  
   
  function nommotif($bdda,$id){

        $nom=" ";
       
      $reponse = $bdda->query("SELECT * FROM autrefrais ");
      $true=0;
      while ($donnees = $reponse->fetch() AND $true==0){                            
         $phrase =$donnees['id'] ; 
         if($phrase==$id){
         $nom=$donnees['nom'];
         $true=1;
           }
     } 
    $reponse->closeCursor(); 
    return $nom;                  
  }
  
  function prixmotif($bdda,$id){

        $nom=" ";
       
      $reponse = $bdda->query("SELECT * FROM autrefrais ");
      $true=0;
      while ($donnees = $reponse->fetch() AND $true==0){                            
         $phrase =$donnees['id'] ; 
         if($phrase==$id){
         $nom=$donnees['prix'];
         $true=1;
           }
     } 
    $reponse->closeCursor(); 
    return $nom;                  
  }
  
  
  function namemois($id){
    $nom=" ";
    if($id==1){
        $nom="Septembre";
    }
    if($id==2){
        $nom="Octobre";
    }
    if($id==3){
        $nom="Novembre";
    }
    if($id==4){
        $nom="Dècembre";
    }
    if($id==5){
        $nom="Janvier";
    }
    if($id==6){
        $nom="Février";
    }
    if($id==7){
        $nom="Mars";
    }
    if($id==8){
        $nom="Avril";
    }
    if($id==9){
        $nom="Mai";
    }
    if($id==10){
        $nom="Juin";
    }
    return $nom;                  
  }


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
      <form action='etatclass.php' method='POST'>
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
        <a  class='btn btn-primary' data-toggle='modal'   data-target='#modajout'>
        Filtrer la liste
       </a>
         
      </li>

      
     </ul>
   </nav>
   <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link"></br> 
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a> </center> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <center>  </center>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      <center> </br></br><div class="info">
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
            <h1 class="m-0">ETAT DE LA SCOLARITE </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
              
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </Br></Br>
 
      </div><!-- /.container-fluid -->
    </div>
   
   
	 

    <!-- Main content -->
    <center>  <?php
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
   echo "<img src='ENTBULL.png' height='200px' width='1300px'><br>
            <img src='ENTBULL1.png' height='200px' width='1000px'>
            <img src='espace.png' height='100px' width='1000px'><br> <br>";
     } ?>    </center>
           <?php if($_SESSION['entreeok']==0){//etatclass
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> ETAT DE LA SCOLARITE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

  if($_SESSION['entreeok']!=0){  
  
    if($_SESSION['choixchoice']=='1'){//inscript non achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> INSCRIPTION NON ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==2 ){//tranch 1 non achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 1 NON ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==3 ){//tranch 2 non achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 2 NON ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==4 ){//ELEV NOUVEAUX
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 3 NON ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==5 ){//sco non achevée
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
          <div class='form-group'> <H5><b>Année scolaire : ".$an." 
          <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>SCOLARITE NON ACHEVEE</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_SESSION['choixchoice']==6 ){//inscrip achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> INSCRIPTION ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==7) {//tranch 1 achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 1 ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==8) {//tranch 2 achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 2 ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==9 ){//tranch 3 achev
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                 <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> TRANCHE 3 ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }

    if( $_SESSION['choixchoice']==10 ){//sco achevée
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
            <div class='form-group'> <H5><b>Année scolaire : ".$an." 
            <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>SCOLARITE ACHEVEE</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
  </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
  
  " ; 
    }

    if($_SESSION['choixchoice']==11){//etatclass
      echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
   <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
        <div class='form-group'> <H5><b>Année scolaire : ".$an." 
        <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br> ETAT DE LA SCOLARITE</b></H5>
        </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  }

if($_SESSION['choixchoice']==12){//remise
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>Année scolaire : ".$an." 
    <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>LES REMISES DEJA EFFECTUEES</b></H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  }

if($_SESSION['choixchoice']==13){//frais divers
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>Année scolaire : ".$an." 
    <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>LES FRAIS DIVERS RECUS</b></H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  }

if($_SESSION['choixchoice']==14){//uniformes
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>Année scolaire : ".$an." 
    <br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>LES PAYES UNIFORMES, ARBRE DE NOEL, TD ...</b></H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  }

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
//DEBUT ordi
if(!$isMob){
 if($_SESSION['entreeok']==0){//VENANT DE etatclass

echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
<td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
<td><B><B>RESTE</B></B></td><td><B>DATE DERNIER VERSEMENT</B></td>
 </tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['cout'];
       $ytotalv=$ytotalv+$donnees['total'];
       $ytotalr=$ytotalr+$donnees['reste'];
       echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
       </B></B></td><td ><B><B>".$donnees['sexelev']."
       </B></B></td><td ><B><B>".$donnees['idnational']."</B></B></td><td ><B><B>". $donnees['cout'] ." ".$valdevis."  </B></B></td><td ><B><B>"
       . $donnees['total'] ." ".$valdevis."  </B></B></td><td ><B><B>". $donnees['reste'] ." ".$valdevis."  </B></B></td>
       <td ><B><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></B></td> </tr>";
       $n=$n+1;
     } 
     $reponse->closeCursor();
     $ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
     $ytotalssrem=$ytotalv-$ytotalrem;
     echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total cout de la scolarité</B></B></td><td ><B><B>".$ytotalt." ".$valdevis." </B></B></td> </tr>";
     echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total de la scolarité déjà versé y compris les remises</B></B></td><td ><B><B>".$ytotalv." ".$valdevis." </B></B></td> </tr>";
     echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total des remises</B></B></td><td ><B><B>".$ytotalrem." ".$valdevis." </B></B></td> </tr>";
      echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total de la scolarité déjà versé sans les remises</B></B></td><td ><B><B>".$ytotalssrem." ".$valdevis." </B></B></td> </tr>";
     echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total du reste de scolarité y compris les remises </B></B></td><td ><B><B>".$ytotalr." ".$valdevis." </B></B></td> </tr>";
    
  }

 if($_SESSION['entreeok']!=0){  
  

    if($_SESSION['choixchoice']=='1'){//inscrip non achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an);
             if($verse<$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
    }

    if( $_SESSION['choixchoice']==2 ){//tranch 1 NON ACHEV
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an);
             if($verse<$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();

     }

    if( $_SESSION['choixchoice']==3 ){//tranch 2 non achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an);
             if($verse<$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
     }
 
    if( $_SESSION['choixchoice']==4 ){//tranch 3 NON ACHEV
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an)+tranche3pension($bdda,$niveauelev,$statut,$an);
             if($verse<$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
    }

    if( $_SESSION['choixchoice']==5 ){//sco non achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";


          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND reste>0 ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     $xd=format($donnees['date'] );
     echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
     </B></td><td ><B>".$donnees['sexelev']."
     </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
     . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
     }

    if( $_SESSION['choixchoice']==6 ){//insrip acheve
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an) ;
             if($verse>=$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
     }

    if( $_SESSION['choixchoice']==7) {//tranch 1 achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an) ;
             if($verse>=$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
     }

    if( $_SESSION['choixchoice']==8) {//tranch 2 achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an) ;
             if($verse>=$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();
     }

    if( $_SESSION['choixchoice']==9 ){//tanch 3 achev
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $verse=$donnees['total'];
        $statut=$donnees['statut'];
        $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an)+tranche3pension($bdda,$niveauelev,$statut,$an);
             if($verse>=$bareme){ 
         $i=$n+1;  
        $xd=format($donnees['date'] );
        echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
        </B></td><td ><B>".$donnees['sexelev']."
        </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
        . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
        $n=$n+1;
            } 
      } 
      $reponse->closeCursor();

     }

    if( $_SESSION['choixchoice']==10 ){
      echo "<table class='table table-bordered table-hover'> 
   <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
   <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
   <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
 


          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND reste=0 ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     $xd=format($donnees['date'] );
     echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
     </B></td><td ><B>".$donnees['sexelev']."
     </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['cout'] ." ".$valdevis."  </B></td><td ><B>"
     . $donnees['total'] ." ".$valdevis."  </B></td><td ><B>". $donnees['reste'] ." ".$valdevis."  </B></td><td ><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
    }

    if( $_SESSION['choixchoice']==12 ){ //remises
      echo "<table class='table table-bordered table-hover'> 
   <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
   <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td> <td><B><B>MONTANT </B></B></td><td><B><B>TYPE DE </br>LA REMISE</B></B></td>
   <td><B><B>RESPONSABLE </B></B></td><td><B><B>DATE </B></B></td> </tr></thead> ";
 


      $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND remise='OUI' ORDER BY date";
 $reponse = $bdda->query($v);
 $n=0;
while ($donnees = $reponse->fetch())
{
 $i=$n+1;  
 $xd=format($donnees['date'] );
 echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
 </B></td><td ><B>".$donnees['sexelev']."
 </B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['montant'] ." ".$valdevis."  </B></td>
 <td ><B>". $donnees['typerem']."</B></td><td ><B>".respsco($bdda,$donnees['idempl'])."</B></td> <td><B><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
 $n=$n+1;
} 
$reponse->closeCursor();
$ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
echo "<tr ><td colspan='7'> </B></td> <td><B><B>Total des remises</B></td><td ><B>".$ytotalrem." ".$valdevis." </B></td> </tr>";
}
    

if( $_SESSION['choixchoice']==13 ){ //frais divers
  echo "<table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
<td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td> <td><B><B>MONTANT </B></B></td> 
<td><B><B>RESPONSABLE </B></B></td><td><B><B>DATE </B></B></td> </tr></thead> ";



  $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND frais>'0' ORDER BY date";
$reponse = $bdda->query($v);
$n=0;
while ($donnees = $reponse->fetch())
{
$i=$n+1;  
$xd=format($donnees['date'] );
echo "<tr ><td ><B>".$i ."</B></td><td ><B>".$donnees['nomelev'] ."</B></td><td ><B>". $donnees['preelev'] ."
</B></td><td ><B>".$donnees['sexelev']."
</B></td><td ><B>". $donnees['idnational']."</B></td><td ><B>". $donnees['frais'] ." ".$valdevis."  </B></td>
 <td ><B>".respsco($bdda,$donnees['idempl'])."</B></td> <td><B><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></td> </tr>";
$n=$n+1;
} 
$reponse->closeCursor();
$ytotalfrais=TfraisCLASSpourETAT($bdda,$niveauelev,$an);
echo "<tr ><td colspan='6'> </B></td> <td><B><B>Total des frais divers</B></td><td ><B>".$ytotalfrais." ".$valdevis." </B></td> </tr>";
}

if( $_SESSION['choixchoice']==14){//UNIFORMES

  echo " <table class='table table-bordered table-hover'> 
  <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
  <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>MOTIFS</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
    </tr></thead> ";
  
  
  
            $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
       $reponse = $bdda->query($v);
       $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
       while ($donnees = $reponse->fetch())
       {
         $i=$n+1;  
         $xd=format($donnees['date'] );
         $mat=$donnees['matelev'];
         echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
         </B></B></td><td ><B><B>".$donnees['sexelev']."
         </B></B></td><td colspan='3'><B><B>". $donnees['idnational']."</B></B></td> </tr>";
              
   
  
         $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
         while ($donneess = $reponses->fetch()){                            
             
        echo  "<tr> <td nowrap> </td> <td nowrap> </td> <td nowrap>
        </td> <td nowrap> </td><td nowrap> </td><td nowrap> 
         ".nommotif($bdda,$donneess['frais']); 
         if($donneess['frais']==9){ 
         echo "(".namemois($donneess['mois'])." )";
       }
        echo "</td>
        <td nowrap>  
         ".$donneess['montant']." ".$valdevis." </td> </tr> " ; 
         $ytotalt+=$donneess['montant'];
          
            }  
       $reponses->closeCursor();
       
  
  
  
  
  
         $n=$n+1;
       } 
       $reponse->closeCursor();
        
       echo "<tr ><td colspan='5'> </B></td> <td><B><B><B>Total</B></B></td><td ><B><B>".$ytotalt." ".$valdevis." </B></B></td> </tr>";
       
    }


    if($_SESSION['choixchoice']==11){//VENANT DE etatclass
      echo "<table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
      <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>COUT SCOLARITE</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
      <td><B><B>RESTE</B></B></td><td><B><B>DATE DERNIER VERSEMENT</B></B></td> </tr></thead> ";
     
      
                $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
           $reponse = $bdda->query($v);
           $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           $xd=format($donnees['date'] );
           $ytotalt=$ytotalt+$donnees['cout'];
           $ytotalv=$ytotalv+$donnees['total'];
           $ytotalr=$ytotalr+$donnees['reste'];
           echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></td><td ><B><B>". $donnees['preelev'] ."
           </B></B></td><td ><B><B>".$donnees['sexelev']."
           </B></B></td><td ><B><B>". $donnees['idnational']."</B></B></td><td ><B><B>". $donnees['cout'] ." ".$valdevis."  </B></B></td><td ><B><B>"
           . $donnees['total'] ." ".$valdevis."  </B></B></td><td ><B><B>". $donnees['reste'] ." ".$valdevis."  </B></B></td><td ><B><B>".$xd." <div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></B></B></td> </tr>";
           $n=$n+1;
         } 
         $reponse->closeCursor();
         $ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
         $ytotalssrem=$ytotalv-$ytotalrem;
         echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total cout de la scolarité</B></B></td><td ><B><B>".$ytotalt." ".$valdevis." </B></td> </tr>";
         echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total de la scolarité déjà versé y compris les remises</B></B></td><td ><B><B>".$ytotalv." ".$valdevis." </B></B></td> </tr>";
         echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total des remises</B></B></td><td ><B><B>".$ytotalrem." ".$valdevis." </B></td> </tr>";
          echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total de la scolarité déjà versé sans les remises</B></B></td><td ><B><B>".$ytotalssrem." ".$valdevis." </B></B></td> </tr>";
         echo "<tr ><td colspan='7'> </B></td> <td><B><B><B>Total du reste de scolarité y compris les remises </B></B></td><td ><B><B>".$ytotalr." ".$valdevis." </B></B></td> </tr>";
        }
      

  } echo "</table>";
}
//FIN ORDI





//DEBUT mobile
if($isMob){
  if($_SESSION['entreeok']==0){//VENANT DE etatclass
    echo "<section class='content'>
    <div class='container-fluid>
    <div class='row'>";
 
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
      while ($donnees = $reponse->fetch())
      {
        $i=$n+1;  
        $xd=format($donnees['date'] );
        $ytotalt=$ytotalt+$donnees['cout'];
        $ytotalv=$ytotalv+$donnees['total'];
        $ytotalr=$ytotalr+$donnees['reste'];
          echo "<div class='callout callout-success'><b>";
     echo "N° : ".$i ."</br>
     Noms : ".$donnees['nomelev']."</br>
     Prénoms : ".$donnees['preelev']."</br>
     Genre : ".$donnees['sexelev']."</br>
     Matricule : ".$donnees['idnational']."</br>
    Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
    Montant versé : ".$donnees['total']." ".$valdevis." </br>
    Reste : ".$donnees['reste']." ".$valdevis." </br>
    Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
      ";
   echo "
   </b></div>";
       
        $n=$n+1;
      } 
      $reponse->closeCursor();
      $ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
      $ytotalssrem=$ytotalv-$ytotalrem;
        echo "<div class='callout callout-info'><b>";
      echo "Total coût de la scolarité : ".$ytotalt." ".$valdevis." </br>
      Total de la scolarité déjà versé y compris les remises : ".$ytotalv." ".$valdevis." </br>
      Total des remises : ".$ytotalrem." ".$valdevis." </br>
      Total de la scolarité déjà versé sans les remises : ".$ytotalssrem." ".$valdevis." </br>
      Total du reste de scolarité y compris les remises : ".$ytotalr." ".$valdevis." </br>";
    echo "
    </b></div>";

    echo "</div></div></div>";
   }
 
  if($_SESSION['entreeok']!=0){  
    echo "<section class='content'>
    <div class='container-fluid>
    <div class='row'>";
 
     if($_SESSION['choixchoice']=='1'){//inscrip non achev
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an);
              if($verse<$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
     }
 
     if( $_SESSION['choixchoice']==2 ){//tranch 1 NON ACHEV
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an);
              if($verse<$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
 
      }
 
     if( $_SESSION['choixchoice']==3 ){//tranch 2 non achev
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an);
              if($verse<$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
      }
  
     if( $_SESSION['choixchoice']==4 ){//tranch 3 NON ACHEV
        $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an)+tranche3pension($bdda,$niveauelev,$statut,$an);
              if($verse<$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
     }
 
     if( $_SESSION['choixchoice']==5 ){//sco non achev
       
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND reste>0 ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      $xd=format($donnees['date'] );
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Matricule : ".$donnees['idnational']."</br>
     Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
     Montant versé : ".$donnees['total']." ".$valdevis." </br>
     Reste : ".$donnees['reste']." ".$valdevis." </br>
     Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
      }
 
     if( $_SESSION['choixchoice']==6 ){//insrip acheve
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an) ;
              if($verse>=$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
      }
 
     if( $_SESSION['choixchoice']==7) {//tranch 1 achev
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an) ;
              if($verse>=$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
      }
 
     if( $_SESSION['choixchoice']==8) {//tranch 2 achev
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an) ;
              if($verse>=$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
      }
 
     if( $_SESSION['choixchoice']==9 ){//tanch 3 achev
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
         $reponse = $bdda->query($v);
         $n=0;
       while ($donnees = $reponse->fetch())
       {
         $verse=$donnees['total'];
         $statut=$donnees['statut'];
         $bareme=inscripension($bdda,$niveauelev,$statut,$an)+tranche1pension($bdda,$niveauelev,$statut,$an)+tranche2pension($bdda,$niveauelev,$statut,$an)+tranche3pension($bdda,$niveauelev,$statut,$an);
              if($verse>=$bareme){ 
          $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$i ."</br>
         Noms : ".$donnees['nomelev']."</br>
         Prénoms : ".$donnees['preelev']."</br>
         Genre : ".$donnees['sexelev']."</br>
         Matricule : ".$donnees['idnational']."</br>
        Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
        Montant versé : ".$donnees['total']." ".$valdevis." </br>
        Reste : ".$donnees['reste']." ".$valdevis." </br>
        Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
       ";
       echo "
       </b></div>";
         $n=$n+1;
             } 
       } 
       $reponse->closeCursor();
 
      }
 
     if( $_SESSION['choixchoice']==10 ){
       
 
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND reste=0 ORDER BY nomelev";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $i=$n+1;  
      $xd=format($donnees['date'] );
      echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms : ".$donnees['nomelev']."</br>
      Prénoms : ".$donnees['preelev']."</br>
      Genre : ".$donnees['sexelev']."</br>
      Matricule : ".$donnees['idnational']."</br>
     Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
     Montant versé : ".$donnees['total']." ".$valdevis." </br>
     Reste : ".$donnees['reste']." ".$valdevis." </br>
     Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
    ";
    echo "
    </b></div>";
      $n=$n+1;
    } 
    $reponse->closeCursor();
     }
 
     if( $_SESSION['choixchoice']==12 ){ //remises
       
 
       $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND remise='OUI' ORDER BY date";
  $reponse = $bdda->query($v);
  $n=0;
 while ($donnees = $reponse->fetch())
 {
  $i=$n+1;  
  $xd=format($donnees['date'] );
  echo "<div class='callout callout-success'><b>";
 echo "N° : ".$i ."</br>
 Noms : ".$donnees['nomelev']."</br>
 Prénoms : ".$donnees['preelev']."</br>
 Genre : ".$donnees['sexelev']."</br>
 Matricule : ".$donnees['idnational']."</br>
Montant : ".$donnees['montant']." ".$valdevis." </br>
Motif : Remise</br>
Type de la remise : ".$donnees['typerem']."</br>
Enregistré par : ".respsco($bdda,$donnees['idempl'])."</br>
Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
";
echo "
</b></div>";
  $n=$n+1;
 } 
 $reponse->closeCursor();
 $ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
 echo "<div class='callout callout-info'><b>";
 echo "Total des remises : ".$ytotalrem." ".$valdevis." </br>
";
echo "
</b></div>"; 
 
 }
     
 
 if( $_SESSION['choixchoice']==13 ){ //frais divers
  
 
   $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' AND frais>'0' ORDER BY date";
 $reponse = $bdda->query($v);
 $n=0;
 while ($donnees = $reponse->fetch())
 {
 $i=$n+1;  
 $xd=format($donnees['date'] );
 echo "<div class='callout callout-success'><b>";
 echo "N° : ".$i ."</br>
 Noms : ".$donnees['nomelev']."</br>
 Prénoms : ".$donnees['preelev']."</br>
 Genre : ".$donnees['sexelev']."</br>
 Matricule : ".$donnees['idnational']."</br>
Montant : ".$donnees['frais']." ".$valdevis." </br>
Motif : Frais divers</br>
Enregistré par : ".respsco($bdda,$donnees['idempl'])."</br>
Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
";
echo "
</b></div>";
 $n=$n+1;
 } 
 $reponse->closeCursor();
 $ytotalfrais=TfraisCLASSpourETAT($bdda,$niveauelev,$an);
 echo "<div class='callout callout-info'><b>";
 echo "Total des frais divers : ".$ytotalfrais." ".$valdevis." </br>
";
echo "
</b></div>";  
  
 }
 
 if( $_SESSION['choixchoice']==14){//UNIFORMES
 
   echo " 
   <div class='card-body table-responsive p-0' style='height: 300px;''>  
   <table class='table table-bordered table-hover'> 
   <thead><tr bgcolor='orange'><td><B><B>N°</B></B></td><td><B><B>NOMS</B></B></td><td><B><B>PRENOMS</B></B></td> 
   <td><B><B>SEXE</B></B></td> <td><B><B>MATRICULE</B></B></td><td><B><B>MOTIFS</B></B></td><td><B><B>MONTANT VERSE</B></B></td>
     </tr></thead> ";
   
   
   
             $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
        $reponse = $bdda->query($v);
        $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
        while ($donnees = $reponse->fetch())
        {
          $i=$n+1;  
          $xd=format($donnees['date'] );
          $mat=$donnees['matelev'];
          echo "<tr ><td ><B><B>".$i ."</B></B></td><td ><B><B>".$donnees['nomelev'] ."</B></B></td><td ><B><B>". $donnees['preelev'] ."
          </B></B></td><td ><B><B>".$donnees['sexelev']."
          </B></B></td><td colspan='3'><B><B>". $donnees['idnational']."</B></B></td> </tr>";
               
    
   
          $reponses = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
          while ($donneess = $reponses->fetch()){                            
              
         echo  "<tr> <td nowrap> </td> <td nowrap> </td> <td nowrap>
         </td> <td nowrap> </td><td nowrap> </td><td nowrap> 
          ".nommotif($bdda,$donneess['frais']); 
          if($donneess['frais']==9){ 
          echo "(".namemois($donneess['mois'])." )";
        }
         echo "</td>
         <td nowrap>  
          ".$donneess['montant']." ".$valdevis." </td> </tr> " ; 
          $ytotalt+=$donneess['montant'];
           
             }  
        $reponses->closeCursor();
        
   
   
   
   
   
          $n=$n+1;
        } 
        $reponse->closeCursor();
        echo"</table></div></br>";
         echo "<div class='callout callout-info'><b>";
          echo "Total : ".$ytotalt." ".$valdevis." </br>
         ";
        echo "
        </b></div>";  
     }
 
 
     if($_SESSION['choixchoice']==11){//VENANT DE etatclass
       
       
                 $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$niveauelev."' ORDER BY nomelev";
            $reponse = $bdda->query($v);
            $n=0;$ytotalt=0;$ytotalv=0;$ytotalr=0;
          while ($donnees = $reponse->fetch())
          {
            $i=$n+1;  
            $xd=format($donnees['date'] );
            $ytotalt=$ytotalt+$donnees['cout'];
            $ytotalv=$ytotalv+$donnees['total'];
            $ytotalr=$ytotalr+$donnees['reste'];
            
            echo "<div class='callout callout-success'><b>";
            echo "N° : ".$i ."</br>
            Noms : ".$donnees['nomelev']."</br>
            Prénoms : ".$donnees['preelev']."</br>
            Genre : ".$donnees['sexelev']."</br>
            Matricule : ".$donnees['idnational']."</br>
           Coût de la scolarité : ".$donnees['cout']." ".$valdevis." </br>
           Montant versé : ".$donnees['total']." ".$valdevis." </br>
           Reste : ".$donnees['reste']." ".$valdevis." </br>
           Date dernier versement : ".$xd."</br><div class='btn-group w-100 mb-2'><div class='no-print'><a type='submit' href='detail.php?identifier=".$donnees['matelev']."&idnational=".$donnees['idnational']."' name='send3'  class='btn btn-warning'>Détails</a></div></div></br>
          ";
          echo "
          </b></div>";
            $n=$n+1;
          } 
          $reponse->closeCursor();
          $ytotalrem=TremiseCLASSpourETAT($bdda,$niveauelev,$an);
          $ytotalssrem=$ytotalv-$ytotalrem;
          echo "<div class='callout callout-info'><b>";
          echo "Total coût de la scolarité : ".$ytotalt." ".$valdevis." </br>
          Total de la scolarité déjà versé y compris les remises : ".$ytotalv." ".$valdevis." </br>
          Total des remises : ".$ytotalrem." ".$valdevis." </br>
          Total de la scolarité déjà versé sans les remises : ".$ytotalssrem." ".$valdevis." </br>
          Total du reste de scolarité y compris les remises : ".$ytotalr." ".$valdevis." </br>";
        echo "
        </b></div>";  
        }
       
 
   }  echo "</div></div></div>";
 }
 //FIN mobile









  ?>
   </Br></Br></Br></Br></Br>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
   <!--div class='no-print'>
  <footer class="main-footer">
    <strong>   </strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b> </b> 
    </div>
  </footer></div-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


<?php  echo "<div class='modal fade' id='modajout'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Filtre </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo " 
          
          
          <table class='table table-bordered table-hover'>
<form  method='POST' action='etatclass1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>  
 <option value='11'>Afficher toute la classe</option></optgroup >  
<optgroup label='Groupe 1' >
 <option value='1'>Inscription non achevée</option><option value='2'>1<sup>ère</sup> Tranche non achevée</option>
     <option value='3'>2<SUP>ème</SUP> Tranche non achevée</option>
     <option value='4'>3<SUP>ème</SUP> Tranche non achevée</option>
     <option value='5'>Scolarité non achevée</option>
     </optgroup ><optgroup label='Groupe 2' >
     <option value='6'>Inscription achevée</option><option value='7'>1<SUP>ère</SUP> Tranche achevée</option>
     <option value='8'>2<SUP>ème</SUP> Tranche achevée</option>
     <option value='9'>3<SUP>ème</SUP> Tranche achevée</option>
     <option value='10'>Scolarité achevée</option></optgroup >
     <optgroup label='Groupe 3' >
     <option value='12'>Afficher les remises éffectuées</option>
     <option value='13'>Afficher les frais divers reçus</option>
     <option value='14'>Afficher les payes des uniformes, TD ...</option>

</select>
    


</B></td> 
<td><B><button type='submit' class='btn btn-primary' value='1' name='send1'>OK</button></B></td> 
 </tr>  </form> </table>
          
          
          
          
          
          
          
          "; 
            ?>
  </br>
      
     
  
  </div>
      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->







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