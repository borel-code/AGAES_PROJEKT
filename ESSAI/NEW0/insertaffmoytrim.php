<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';require '../listabrvtype.php';  require '../bullinfo.php';


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
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
	

  if(isset($_POST['send2'])){
    $_SESSION['evalcalcul']=$_POST['eval']; $eva=$_POST['eval'];
    $listalphab=array();
    $m=1;
    $v="SELECT  matelev,anelev,nomelev,niveauelev FROM eleve  WHERE anelev='".$_SESSION['ancalcul']."'
     AND niveauelev='".$_SESSION['clascalcul']."'  ORDER BY nomelev";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch())
       {
      $listalphab[$m]=$donnees['matelev'];
      $m++;
      } 
       $reponse->closeCursor(); 
     $_SESSION['listalphab']=$listalphab;

}
else{
    $eva=$_SESSION['evalcalcul'];
}

$lesidgroupe=array();

$v="SELECT *  FROM groupmatensg1   WHERE   typeEns='".$_SESSION['typensgcalcul']."'" ;
   $reponse= $bdda->query($v);
    $i=1;   
    while ($donnees= $reponse->fetch())
     {
      $lesidgroupe[$i]=$donnees['code'];


      $i++;
    } 
    $reponse->closeCursor();   
$NBRGROUPE=count($lesidgroupe);


//PROF TITUL
$cnititul=" ";
       $de=ensgdstitulaire($_SESSION['clascalcul'],$_SESSION['ancalcul']);
//PROF TITULAIRE

  

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
  
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
</head>
<?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo "<body class='hold-transition sidebar-mini'>";
    }
    if($isMob){    
      echo "<body class='hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>";
      }
    ?>
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
      <form action='insertcalcul1.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab();?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0"> </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          
      <form method='post' action='insertaffmoytrim.php'>
          <div class='select2-purple'> 
<select name='choix' class='select2'   data-placeholder='Choisir l'enseignant(e)' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
<optgroup label='ORDRE DE MERITE' >  <option value='1'>ADMIS</option> 
<option value='2'>ECHOUES</option><option value='a'>moyenne < 8</option>
<option value='b'>8 ≤ moyenne < 10</option><option value='c'>10 ≤ moyenne < 12</option>
<option value='d'>12 ≤ moyenne ≤ 20</option><option value='3'>TOUT</option> </optgroup>
<optgroup label='ORDRE ALPHABETIQUE' >  <option value='4'>ADMIS</option> 
<option value='5'>ECHOUES</option>
<option value='a1'>moyenne < 8</option>
<option value='b1'>8 ≤ moyenne < 10</option><option value='c1'>10 ≤ moyenne < 12</option>
<option value='d1'>12 ≤ moyenne ≤ 20</option>
<option value='6'>TOUT</option> </optgroup>
 
 </select> </div></br> <button type='submit' name='sendexp' value='1' class='btn btn-primary'>Afficher</button>  
     </br></br>  </form>
     
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center>
    <?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo " <img src='ENTBULL.png' height='150px' width='1300px'><br>
    <img src='ENTBULL1.png' height='200px' width='1000px'>
    <img src='espace.png' height='100px' width='1000px'><br> <br>";
    }?>
  
            
           </center>
           <?php if(isset($_POST['send2'])){//VENANT DE listclasse
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
                 <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
                 LISTE PAR ORDRE DE MERITE </b> 
                 </H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE : ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['sendexp'])){  
    if($_POST['choix']=='1'){//ADMIS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE DE MERITE</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==2 ){//ECHECS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ECHOUES PAR ORDRE DE MERITE </b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;
    }



    if($_POST['choix']=='a'){//moy 8
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE DE MERITE </br>AYANT OBTENU UNE MOYENNE INFERIEURE A 8</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='b'){// 8 moy 10
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE DE MERITE </br> 8 ≤ MOYENNE < 10</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='c'){// 10 moy 12
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE DE MERITE </br> 10 ≤ MOYENNE < 12</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='d'){// 12 moy 20
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE DE MERITE </br> 10 ≤ MOYENNE ≤ 20</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }




    if( $_POST['choix']==3 ){//tout
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE PAR ORDRE DE MERITE </b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==4 ){//AD ALPHAB
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE ALPHABETIQUE</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;
    }

    if( $_POST['choix']==5 ){//ECHE ALPHAB
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ECHOUES PAR ORDRE ALPHABETIQUE</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;
    }



    if($_POST['choix']=='a1'){//moy 8
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE ALPHABETIQUE </br>AYANT OBTENU UNE MOYENNE INFERIEURE A 8</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='b1'){// 8 moy 10
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE ALPHABETIQUE </br> 8 ≤ MOYENNE < 10</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='c1'){// 10 moy 12
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE ALPHABETIQUE </br> 10 ≤ MOYENNE < 12</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }



    if($_POST['choix']=='d1'){// 12 moy 20
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE DES ADMIS PAR ORDRE ALPHABETIQUE </br> 10 ≤ MOYENNE ≤ 20</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }


    if( $_POST['choix']==6 ){//TOUT ALPHAB
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
               <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>RESULTATS DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
               LISTE PAR ORDRE ALPHABETIQUE</b> 
               </H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE :  ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;
    }

    

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 $totaleval=array();
 if($_SESSION['trimcalcul']==1){
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  for($i=1;$i<$nbrevaltri1+1;$i++){
 
    $totaleval[$i]=$i;
  }
}
if($_SESSION['trimcalcul']==2){
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
  $nbrevaltri2=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $total=$nbrevaltri1+$nbrevaltri2;
  $j=$nbrevaltri1+1;
  $grand=$total-$j+1; 
  for($i=1;$i<$grand+1;$i++){  
     
    $totaleval[$i]=$j;  $j++;
  }
}
if($_SESSION['trimcalcul']==3){
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
  $nbrevaltri2=nbreval($_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
  $nbrevaltri3=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
  $j=$nbrevaltri1+$nbrevaltri2+1;
  $grand=$total-$j+1;
  for($i=1;$i<$grand+1;$i++){  
    
    $totaleval[$i]=$j;  $j++;
  }
}




 if(isset($_POST['send2'])){
  //debut ordi 
  if(!$isMob){ 
    echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
  
for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
}
       $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
  
 echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
  echo "<tr><td > </td> ";

  for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
}
for($k=1;$k<=count($totaleval);$k++){
  $idval=$totaleval[$k];  
     echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
    }
echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  



          $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."' ORDER BY  moytrim DESC";
     $reponse = $bdda->query($v);
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
   while ($donnees = $reponse->fetch())
   {
    $effec++; 
     $mazt=$donnees['matricule'];
     $MOY=$donnees['moytrim'];
     $RG=$donnees['rgtrim'];
     echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
     for($j=1;$j<=$NBRGROUPE;$j++){
        $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
        $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
        if($rg!=" " AND !empty($rg)){
          echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
        }else{
          echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
        }
        
    }
    for($k=1;$k<=count($totaleval);$k++){
      $idval=$totaleval[$k]; 
      $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
         echo " 
         <TD> <B> ".$moyeva." </B> </TD>
         <TD> <B> ".$rgeva." </B> </TD>"; 
        }
    if($MOY>=10){
        $admis++;
      }
    $effeclasse++;$totalmoy+=$MOY;
    if($RG!=" " AND !empty($RG)){
        echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
       
    }
    else{
        echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
    }  
   } 
   $reponse->closeCursor();
   echo "</tr></table>";
   if($effeclasse>0){
    $prozent=Round((($admis*100)/$effeclasse),2);
  }
  if($effeclasse>0){
    $moyennecl=Round(($totalmoy/$effeclasse),2);
  }
$_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$effeclasse;
$_SESSION['admis']=$admis;
$_SESSION['prozent']=$prozent;
$_SESSION['moyennecl']=$moyennecl;
   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
   <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
    <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
    <UL>";

    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}//FIN ORDI

//DEBUT MOBILE
 if($isMob){ 
    
   
          $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."' ORDER BY  moytrim DESC";
     $reponse = $bdda->query($v);
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
   while ($donnees = $reponse->fetch())
   {
    $effec++; 
    $mazt=$donnees['matricule'];
    $MOY=$donnees['moytrim'];
    $RG=$donnees['rgtrim'];
    echo "<div class='callout callout-success'><b>";
    echo "Noms et prénoms : ".nameschuler($mazt)." ".vornameschuler($mazt)."</Br>";
    echo "Matricule : ".$mazt."</Br>";
     if($RG!=" " AND !empty($RG)){
       echo "Rang trimestrielle : ".$RG."<sup> e</sup></Br>";
   }
   else{
       echo"Rang trimestrielle : Non classé</Br>";
   }  
   echo "Moyenne trimestrielle : ".$MOY."</Br>";
   
   
   echo "<ul>";
   for($j=1;$j<=$NBRGROUPE;$j++){
     $nomgp=groupmatensgnom($lesidgroupe[$j]);
     echo "<li>";
     echo "Synthèse ".$nomgp." du trimestre</Br>";
     echo "</li>";
     $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
     $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
     if($rg!=" " AND !empty($rg)){
       echo"&nbsp &nbsp Note : ".$note." &nbsp &nbsp Rang : ".$rg."<sup> e</sup></Br>";
     }else{
       echo"&nbsp &nbsp Note : ".$note." &nbsp &nbsp Rang : ".$rg."</Br>";
     }
  }
 echo "</ul>";

  
 for($k=1;$k<=count($totaleval);$k++){
   $idval=$totaleval[$k]; 
    
   echo "Evaluation ".$idval."</Br>";
    
   $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
   $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      echo "&nbsp &nbsp Moyenne : ".$moyeva." &nbsp &nbsp Rang : ".$rgeva."</Br>";
     }
  
    echo "
    </b></div>";
     
   
  
   if($MOY>=10){
       $admis++;
     }
   $effeclasse++;$totalmoy+=$MOY;
   } 
   $reponse->closeCursor();
   
   if($effeclasse>0){
    $prozent=Round((($admis*100)/$effeclasse),2);
  }
  if($effeclasse>0){
    $moyennecl=Round(($totalmoy/$effeclasse),2);
  }
$_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$effeclasse;
$_SESSION['admis']=$admis;
$_SESSION['prozent']=$prozent;
$_SESSION['moyennecl']=$moyennecl;
   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
   <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
    <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
    <UL>";

    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
      echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}


//FIN MOBILE


     }

 if(isset($_POST['sendexp'])){  
   

  if($_POST['choix']=='1'){//ADMIS
    echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
}
$espcolsp=count($totaleval)*2;
   echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
   echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
   echo "<tr><td > </td> ";
 
   for($j=1;$j<=$NBRGROUPE;$j++){
     $nomgp=groupmatensgnom($lesidgroupe[$j]);
     echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
 }
 for($k=1;$k<=count($totaleval);$k++){
   $idval=$totaleval[$k];  
      echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
     }
 echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  


      $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
      AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='10'  ORDER BY  moytrim DESC";
 $reponse = $bdda->query($v);
 $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
while ($donnees = $reponse->fetch())
{
$effec++; 
 $mazt=$donnees['matricule'];
 $MOY=$donnees['moytrim'];
 $RG=$donnees['rgtrim'];
 echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
 for($j=1;$j<=$NBRGROUPE;$j++){
    $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
    if($rg!=" " AND !empty($rg)){
      echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
    }else{
      echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
    }
    
}
for($k=1;$k<=count($totaleval);$k++){
  $idval=$totaleval[$k]; 
  $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
     echo " 
     <TD> <B> ".$moyeva." </B> </TD>
     <TD> <B> ".$rgeva." </B> </TD>"; 
    }
if($MOY>=10){
    $admis++;
  }
$effeclasse++;$totalmoy+=$MOY;
if($RG!=" " AND !empty($RG)){
    echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
   
}
else{
    echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
}  
} 
$reponse->closeCursor();
echo "</tr></table>";
if($effeclasse>0){
$prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
$moyennecl=Round(($totalmoy/$effeclasse),2);
}

echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
<I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
<B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
<img src='espace.png' height='80px' width='40px' </br>";
echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
<I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
<UL>";

for($j=1;$j<=$NBRGROUPE;$j++){
  $nomgp=groupmatensgnom($lesidgroupe[$j]);
  $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
  </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
  </br><img src='espace.png' height='30px' width='40px'> </br>";   
}
 echo "</UL></br>";
 echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 
 <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
  ";



}

    if( $_POST['choix']==2 ){//ECHECS
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
          
        for($j=1;$j<=$NBRGROUPE;$j++){
            $nomgp=groupmatensgnom($lesidgroupe[$j]);
            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
        }
         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";   
        
        
        
                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                  AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim<'10'  ORDER BY  moytrim DESC";
             $reponse = $bdda->query($v);
             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
           while ($donnees = $reponse->fetch())
           {
            $effec++; 
             $mazt=$donnees['matricule'];
             $MOY=$donnees['moytrim'];
             $RG=$donnees['rgtrim'];
             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
             for($j=1;$j<=$NBRGROUPE;$j++){
                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                if($rg!=" " AND !empty($rg)){
                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                }else{
                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                }
                
            }
            for($k=1;$k<=count($totaleval);$k++){
              $idval=$totaleval[$k]; 
              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                 echo " 
                 <TD> <B> ".$moyeva." </B> </TD>
                 <TD> <B> ".$rgeva." </B> </TD>"; 
                }
            if($MOY>=10){
                $admis++;
              }
            $effeclasse++;$totalmoy+=$MOY;
            if($RG!=" " AND !empty($RG)){
                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
               
            }
            else{
                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
            }  
           } 
           $reponse->closeCursor();
           echo "</tr></table>";
           if($effeclasse>0){
            $prozent=Round((($admis*100)/$effeclasse),2);
          }
          if($effeclasse>0){
            $moyennecl=Round(($totalmoy/$effeclasse),2);
          }
         
           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
            <img src='espace.png' height='80px' width='40px' </br>";
            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
            <UL>";
        
            for($j=1;$j<=$NBRGROUPE;$j++){
              $nomgp=groupmatensgnom($lesidgroupe[$j]);
              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
              </br><img src='espace.png' height='30px' width='40px'> </br>";   
            }
             echo "</UL></br>";
             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             
             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
              ";
        

     }



     if($_POST['choix']=='a'){// moy 8
      echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";

for($j=1;$j<=$NBRGROUPE;$j++){
  $nomgp=groupmatensgnom($lesidgroupe[$j]);
  echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
}
$espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";    



        $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
        AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim<'8'  ORDER BY  moytrim DESC";
   $reponse = $bdda->query($v);
   $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
 while ($donnees = $reponse->fetch())
 {
  $effec++; 
   $mazt=$donnees['matricule'];
   $MOY=$donnees['moytrim'];
   $RG=$donnees['rgtrim'];
   echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
   for($j=1;$j<=$NBRGROUPE;$j++){
      $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
      if($rg!=" " AND !empty($rg)){
        echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
      }else{
        echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
      }
      
  }
  for($k=1;$k<=count($totaleval);$k++){
    $idval=$totaleval[$k]; 
    $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
       echo " 
       <TD> <B> ".$moyeva." </B> </TD>
       <TD> <B> ".$rgeva." </B> </TD>"; 
      }
  if($MOY>=10){
      $admis++;
    }
  $effeclasse++;$totalmoy+=$MOY;
  if($RG!=" " AND !empty($RG)){
      echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
     
  }
  else{
      echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
  }  
 } 
 $reponse->closeCursor();
 echo "</tr></table>";
 if($effeclasse>0){
  $prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
  $moyennecl=Round(($totalmoy/$effeclasse),2);
}
 
 echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
 <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
 <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
  <img src='espace.png' height='80px' width='40px' </br>";
  echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
  <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
  <UL>";

  for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
    $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
    $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
    echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
    </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
    </br><img src='espace.png' height='30px' width='40px'> </br>";   
  }
   echo "</UL></br>";
   echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   
   <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
   &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
   &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
   &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
   &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
    ";



  }




  if($_POST['choix']=='b'){// 8 moy 10
    echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
echo"<td colspan='2'><B> ".$nomgp." </B></td>";   
}
$espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";   



      $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
      AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='8' AND moytrim<'10'  ORDER BY  moytrim DESC";
 $reponse = $bdda->query($v);
 $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
while ($donnees = $reponse->fetch())
{
$effec++; 
 $mazt=$donnees['matricule'];
 $MOY=$donnees['moytrim'];
 $RG=$donnees['rgtrim'];
 echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
 for($j=1;$j<=$NBRGROUPE;$j++){
    $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
    $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
    if($rg!=" " AND !empty($rg)){
      echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
    }else{
      echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
    }
    
}
for($k=1;$k<=count($totaleval);$k++){
  $idval=$totaleval[$k]; 
  $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
     echo " 
     <TD> <B> ".$moyeva." </B> </TD>
     <TD> <B> ".$rgeva." </B> </TD>"; 
    }
if($MOY>=10){
    $admis++;
  }
$effeclasse++;$totalmoy+=$MOY;
if($RG!=" " AND !empty($RG)){
    echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
   
}
else{
    echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
}  
} 
$reponse->closeCursor();
echo "</tr></table>";
if($effeclasse>0){
$prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
$moyennecl=Round(($totalmoy/$effeclasse),2);
}
 
echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
<I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
<B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
<img src='espace.png' height='80px' width='40px' </br>";
echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
<I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
<UL>";

for($j=1;$j<=$NBRGROUPE;$j++){
  $nomgp=groupmatensgnom($lesidgroupe[$j]);
  $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
  echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
  </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
  </br><img src='espace.png' height='30px' width='40px'> </br>";   
}
 echo "</UL></br>";
 echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 
 <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
  ";



}




if($_POST['choix']=='c'){// 10 moy 12
  echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
echo"<td colspan='2'><B> ".$nomgp." </B></td>";   
}
$espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";    



    $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='10' AND moytrim<'12'  ORDER BY  moytrim DESC";
$reponse = $bdda->query($v);
$n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
while ($donnees = $reponse->fetch())
{
$effec++; 
$mazt=$donnees['matricule'];
$MOY=$donnees['moytrim'];
$RG=$donnees['rgtrim'];
echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
for($j=1;$j<=$NBRGROUPE;$j++){
  $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
  if($rg!=" " AND !empty($rg)){
    echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
  }else{
    echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
  }
  
}
for($k=1;$k<=count($totaleval);$k++){
  $idval=$totaleval[$k]; 
  $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
     echo " 
     <TD> <B> ".$moyeva." </B> </TD>
     <TD> <B> ".$rgeva." </B> </TD>"; 
    }
if($MOY>=10){
  $admis++;
}
$effeclasse++;$totalmoy+=$MOY;
if($RG!=" " AND !empty($RG)){
  echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
 
}
else{
  echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
}  
} 
$reponse->closeCursor();
echo "</tr></table>";
if($effeclasse>0){
$prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
$moyennecl=Round(($totalmoy/$effeclasse),2);
}
 
echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
<I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
<B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
<img src='espace.png' height='80px' width='40px' </br>";
echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
<I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
<UL>";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
$PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
</Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
</br><img src='espace.png' height='30px' width='40px'> </br>";   
}
echo "</UL></br>";
echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
";



}



if($_POST['choix']=='d'){// 12 moy 20
  echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
echo"<td colspan='2'><B> ".$nomgp." </B></td>";   
}
$espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  



    $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='12' AND moytrim<='20'  ORDER BY  moytrim DESC";
$reponse = $bdda->query($v);
$n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
while ($donnees = $reponse->fetch())
{
$effec++; 
$mazt=$donnees['matricule'];
$MOY=$donnees['moytrim'];
$RG=$donnees['rgtrim'];
echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
for($j=1;$j<=$NBRGROUPE;$j++){
  $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
  if($rg!=" " AND !empty($rg)){
    echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
  }else{
    echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
  }
  
}
for($k=1;$k<=count($totaleval);$k++){
  $idval=$totaleval[$k]; 
  $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
     echo " 
     <TD> <B> ".$moyeva." </B> </TD>
     <TD> <B> ".$rgeva." </B> </TD>"; 
    }


    
if($MOY>=10){
  $admis++;
}
$effeclasse++;$totalmoy+=$MOY;
if($RG!=" " AND !empty($RG)){
  echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
 
}
else{
  echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
}  
} 
$reponse->closeCursor();
echo "</tr></table>";
if($effeclasse>0){
$prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
$moyennecl=Round(($totalmoy/$effeclasse),2);
}
 
echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
<I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
<B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
<img src='espace.png' height='80px' width='40px' </br>";
echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
<I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
<UL>";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
$PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
</Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
</br><img src='espace.png' height='30px' width='40px'> </br>";   
}
echo "</UL></br>";
echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
";



}





    if( $_POST['choix']==3 ){//TOUT
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
          
        for($j=1;$j<=$NBRGROUPE;$j++){
            $nomgp=groupmatensgnom($lesidgroupe[$j]);
            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
        }
         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
        
        
        
                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                  AND idcl='".$_SESSION['clascalcul']."'  AND codetrim='".$_SESSION['trimcalcul']."'  ORDER BY  moytrim DESC";
             $reponse = $bdda->query($v);
             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
           while ($donnees = $reponse->fetch())
           {
            $effec++; 
             $mazt=$donnees['matricule'];
             $MOY=$donnees['moytrim'];
             $RG=$donnees['rgtrim'];
             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
             for($j=1;$j<=$NBRGROUPE;$j++){
                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                if($rg!=" " AND !empty($rg)){
                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                }else{
                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                }
                
            }
         
            for($k=1;$k<=count($totaleval);$k++){
              $idval=$totaleval[$k]; 
              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                 echo " 
                 <TD> <B> ".$moyeva." </B> </TD>
                 <TD> <B> ".$rgeva." </B> </TD>"; 
                }

            if($MOY>=10){
                $admis++;
              }
            $effeclasse++;$totalmoy+=$MOY;
            if($RG!=" " AND !empty($RG)){
                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
               
            }
            else{
                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
            }  
           } 
           $reponse->closeCursor();
           echo "</tr></table>";
           if($effeclasse>0){
            $prozent=Round((($admis*100)/$effeclasse),2);
          }
          if($effeclasse>0){
            $moyennecl=Round(($totalmoy/$effeclasse),2);
          }
   
           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
            <img src='espace.png' height='80px' width='40px' </br>";
            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
            <UL>";
        
            for($j=1;$j<=$NBRGROUPE;$j++){
              $nomgp=groupmatensgnom($lesidgroupe[$j]);
              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
              </br><img src='espace.png' height='30px' width='40px'> </br>";   
            }
             echo "</UL></br>";
             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             
             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
              ";
        

     }
 
    if( $_POST['choix']==4 ){//ADMIS ALPHAB
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
          
        for($j=1;$j<=$NBRGROUPE;$j++){
            $nomgp=groupmatensgnom($lesidgroupe[$j]);
            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
        }
         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
        
        for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
        
                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                  AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='10'  ORDER BY  moytrim DESC";
             $reponse = $bdda->query($v);
             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
           while ($donnees = $reponse->fetch())
           {
            $effec++; 
             $mazt=$donnees['matricule'];
             $MOY=$donnees['moytrim'];
             $RG=$donnees['rgtrim'];
             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
             for($j=1;$j<=$NBRGROUPE;$j++){
                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                if($rg!=" " AND !empty($rg)){
                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                }else{
                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                }
                
            }
         
            for($k=1;$k<=count($totaleval);$k++){
              $idval=$totaleval[$k]; 
              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                 echo " 
                 <TD> <B> ".$moyeva." </B> </TD>
                 <TD> <B> ".$rgeva." </B> </TD>"; 
                }

            if($MOY>=10){
                $admis++;
              }
            $effeclasse++;$totalmoy+=$MOY;
            if($RG!=" " AND !empty($RG)){
                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
               
            }
            else{
                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
            }  
           } 
           $reponse->closeCursor();}
           echo "</tr></table>";
           if($effeclasse>0){
            $prozent=Round((($admis*100)/$effeclasse),2);
          }
          if($effeclasse>0){
            $moyennecl=Round(($totalmoy/$effeclasse),2);
          }
    
           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
            <img src='espace.png' height='80px' width='40px' </br>";
            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
            <UL>";
        
            for($j=1;$j<=$NBRGROUPE;$j++){
              $nomgp=groupmatensgnom($lesidgroupe[$j]);
              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
              </br><img src='espace.png' height='30px' width='40px'> </br>";   
            }
             echo "</UL></br>";
             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             
             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
              ";
          }



          if( $_POST['choix']=='a1' ){// moy 8
            echo " <table class='table table-bordered table-hover'> 
            <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
              
            for($j=1;$j<=$NBRGROUPE;$j++){
                $nomgp=groupmatensgnom($lesidgroupe[$j]);
                echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
            }
             $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
            
            for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
            
                      $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                      AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'
                      AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim<'8'  ORDER BY  moytrim DESC";
                 $reponse = $bdda->query($v);
                 $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
               while ($donnees = $reponse->fetch())
               {
                $effec++; 
                 $mazt=$donnees['matricule'];
                 $MOY=$donnees['moytrim'];
                 $RG=$donnees['rgtrim'];
                 echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
                 for($j=1;$j<=$NBRGROUPE;$j++){
                    $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                    $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                    if($rg!=" " AND !empty($rg)){
                      echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                    }else{
                      echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                    }
                    
                }
             
                for($k=1;$k<=count($totaleval);$k++){
                  $idval=$totaleval[$k]; 
                  $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                  $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                     echo " 
                     <TD> <B> ".$moyeva." </B> </TD>
                     <TD> <B> ".$rgeva." </B> </TD>"; 
                    }

                if($MOY>=10){
                    $admis++;
                  }
                $effeclasse++;$totalmoy+=$MOY;
                if($RG!=" " AND !empty($RG)){
                    echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
                   
                }
                else{
                    echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
                }  
               } 
               $reponse->closeCursor();}
               echo "</tr></table>";
               if($effeclasse>0){
                $prozent=Round((($admis*100)/$effeclasse),2);
              }
              if($effeclasse>0){
                $moyennecl=Round(($totalmoy/$effeclasse),2);
              }
          
               echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
               <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
               <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
                <img src='espace.png' height='80px' width='40px' </br>";
                echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
                <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
                <UL>";
            
                for($j=1;$j<=$NBRGROUPE;$j++){
                  $nomgp=groupmatensgnom($lesidgroupe[$j]);
                  $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                  $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                  $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                  echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
                  </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
                  </br><img src='espace.png' height='30px' width='40px'> </br>";   
                }
                 echo "</UL></br>";
                 echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 
                 <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
                 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
                 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                 &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                  ";
              }
      
           


              if( $_POST['choix']=='b1' ){// 8 moy 10
                echo " <table class='table table-bordered table-hover'> 
                <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
                  
                for($j=1;$j<=$NBRGROUPE;$j++){
                    $nomgp=groupmatensgnom($lesidgroupe[$j]);
                    echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
                }
                 $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
                
                for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
                
                          $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                          AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'
                          AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='8' AND moytrim<'10'  ORDER BY  moytrim DESC";
                     $reponse = $bdda->query($v);
                     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
                   while ($donnees = $reponse->fetch())
                   {
                    $effec++; 
                     $mazt=$donnees['matricule'];
                     $MOY=$donnees['moytrim'];
                     $RG=$donnees['rgtrim'];
                     echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
                     for($j=1;$j<=$NBRGROUPE;$j++){
                        $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                        $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                        if($rg!=" " AND !empty($rg)){
                          echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                        }else{
                          echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                        }
                        
                    }
                 
                    for($k=1;$k<=count($totaleval);$k++){
                      $idval=$totaleval[$k]; 
                      $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                      $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                         echo " 
                         <TD> <B> ".$moyeva." </B> </TD>
                         <TD> <B> ".$rgeva." </B> </TD>"; 
                        }

                    if($MOY>=10){
                        $admis++;
                      }
                    $effeclasse++;$totalmoy+=$MOY;
                    if($RG!=" " AND !empty($RG)){
                        echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
                       
                    }
                    else{
                        echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
                    }  
                   } 
                   $reponse->closeCursor();}
                   echo "</tr></table>";
                   if($effeclasse>0){
                    $prozent=Round((($admis*100)/$effeclasse),2);
                  }
                  if($effeclasse>0){
                    $moyennecl=Round(($totalmoy/$effeclasse),2);
                  }
                 
                   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
                   <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
                   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                   &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
                    <img src='espace.png' height='80px' width='40px' </br>";
                    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
                    <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
                    <UL>";
                
                    for($j=1;$j<=$NBRGROUPE;$j++){
                      $nomgp=groupmatensgnom($lesidgroupe[$j]);
                      $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                      $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                      $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                      echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
                      </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
                      </br><img src='espace.png' height='30px' width='40px'> </br>";   
                    }
                     echo "</UL></br>";
                     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     
                     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
                     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
                     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                      ";
                  }


                  if( $_POST['choix']=='c1' ){// 10 moy 12
                    echo " <table class='table table-bordered table-hover'> 
                    <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
                      
                    for($j=1;$j<=$NBRGROUPE;$j++){
                        $nomgp=groupmatensgnom($lesidgroupe[$j]);
                        echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
                    }
                     $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
                    
                    for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
                    
                              $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                              AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'
                              AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='10' AND moytrim<'12'  ORDER BY  moytrim DESC";
                         $reponse = $bdda->query($v);
                         $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
                       while ($donnees = $reponse->fetch())
                       {
                        $effec++; 
                         $mazt=$donnees['matricule'];
                         $MOY=$donnees['moytrim'];
                         $RG=$donnees['rgtrim'];
                         echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
                         for($j=1;$j<=$NBRGROUPE;$j++){
                            $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                            $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                            if($rg!=" " AND !empty($rg)){
                              echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                            }else{
                              echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                            }
                            
                        }
                     
                        for($k=1;$k<=count($totaleval);$k++){
                          $idval=$totaleval[$k]; 
                          $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                          $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                             echo " 
                             <TD> <B> ".$moyeva." </B> </TD>
                             <TD> <B> ".$rgeva." </B> </TD>"; 
                            }


                        if($MOY>=10){
                            $admis++;
                          }
                        $effeclasse++;$totalmoy+=$MOY;
                        if($RG!=" " AND !empty($RG)){
                            echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
                           
                        }
                        else{
                            echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
                        }  
                       } 
                       $reponse->closeCursor();}
                       echo "</tr></table>";
                       if($effeclasse>0){
                        $prozent=Round((($admis*100)/$effeclasse),2);
                      }
                      if($effeclasse>0){
                        $moyennecl=Round(($totalmoy/$effeclasse),2);
                      }
                     
                       echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
                       <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
                       <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
                        <img src='espace.png' height='80px' width='40px' </br>";
                        echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
                        <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
                        <UL>";
                    
                        for($j=1;$j<=$NBRGROUPE;$j++){
                          $nomgp=groupmatensgnom($lesidgroupe[$j]);
                          $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                          $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                          $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
                          </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
                          </br><img src='espace.png' height='30px' width='40px'> </br>";   
                        }
                         echo "</UL></br>";
                         echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         
                         <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
                         &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
                         &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                         &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                         &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                          ";
                      }




                      if( $_POST['choix']=='d1' ){// 12 moy 20
                        echo " <table class='table table-bordered table-hover'> 
                        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
                          
                        for($j=1;$j<=$NBRGROUPE;$j++){
                            $nomgp=groupmatensgnom($lesidgroupe[$j]);
                            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
                        }
                         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";   
                        
                        for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
                        
                                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                                  AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'
                                  AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim>='12' AND moytrim<='20'  ORDER BY  moytrim DESC";
                             $reponse = $bdda->query($v);
                             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
                           while ($donnees = $reponse->fetch())
                           {
                            $effec++; 
                             $mazt=$donnees['matricule'];
                             $MOY=$donnees['moytrim'];
                             $RG=$donnees['rgtrim'];
                             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
                             for($j=1;$j<=$NBRGROUPE;$j++){
                                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                                if($rg!=" " AND !empty($rg)){
                                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                                }else{
                                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                                }
                                
                            }
                         

                            for($k=1;$k<=count($totaleval);$k++){
                              $idval=$totaleval[$k]; 
                              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                                 echo " 
                                 <TD> <B> ".$moyeva." </B> </TD>
                                 <TD> <B> ".$rgeva." </B> </TD>"; 
                                }

                            if($MOY>=10){
                                $admis++;
                              }
                            $effeclasse++;$totalmoy+=$MOY;
                            if($RG!=" " AND !empty($RG)){
                                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
                               
                            }
                            else{
                                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
                            }  
                           } 
                           $reponse->closeCursor();}
                           echo "</tr></table>";
                           if($effeclasse>0){
                            $prozent=Round((($admis*100)/$effeclasse),2);
                          }
                          if($effeclasse>0){
                            $moyennecl=Round(($totalmoy/$effeclasse),2);
                          }
                      
                           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
                           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
                           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
                            <img src='espace.png' height='80px' width='40px' </br>";
                            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
                            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
                            <UL>";
                        
                            for($j=1;$j<=$NBRGROUPE;$j++){
                              $nomgp=groupmatensgnom($lesidgroupe[$j]);
                              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
                              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
                              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
                              </br><img src='espace.png' height='30px' width='40px'> </br>";   
                            }
                             echo "</UL></br>";
                             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             
                             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
                              ";
                          }






    if( $_POST['choix']==5 ){//Echecs alphab
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
          
        for($j=1;$j<=$NBRGROUPE;$j++){
            $nomgp=groupmatensgnom($lesidgroupe[$j]);
            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
        }
         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
        
        for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
        
                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                  AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."' AND codetrim='".$_SESSION['trimcalcul']."'  AND moytrim<'10'  ORDER BY  moytrim DESC";
             $reponse = $bdda->query($v);
             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
           while ($donnees = $reponse->fetch())
           {
            $effec++; 
             $mazt=$donnees['matricule'];
             $MOY=$donnees['moytrim'];
             $RG=$donnees['rgtrim'];
             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
             for($j=1;$j<=$NBRGROUPE;$j++){
                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                if($rg!=" " AND !empty($rg)){
                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                }else{
                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                }
                
            }
         
            for($k=1;$k<=count($totaleval);$k++){
              $idval=$totaleval[$k]; 
              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                 echo " 
                 <TD> <B> ".$moyeva." </B> </TD>
                 <TD> <B> ".$rgeva." </B> </TD>"; 
                }

            if($MOY>=10){
                $admis++;
              }
            $effeclasse++;$totalmoy+=$MOY;
            if($RG!=" " AND !empty($RG)){
                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
               
            }
            else{
                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
            }  
           } 
           $reponse->closeCursor();}
           echo "</tr></table>";
           if($effeclasse>0){
            $prozent=Round((($admis*100)/$effeclasse),2);
          }
          if($effeclasse>0){
            $moyennecl=Round(($totalmoy/$effeclasse),2);
          }
      
           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
            <img src='espace.png' height='80px' width='40px' </br>";
            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
            <UL>";
        
            for($j=1;$j<=$NBRGROUPE;$j++){
              $nomgp=groupmatensgnom($lesidgroupe[$j]);
              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
              </br><img src='espace.png' height='30px' width='40px'> </br>";   
            }
             echo "</UL></br>";
             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             
             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
              ";
     }

     if( $_POST['choix']==6 ){//TOUT ALPHAB
      if(!$isMob){ 
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
          
        for($j=1;$j<=$NBRGROUPE;$j++){
            $nomgp=groupmatensgnom($lesidgroupe[$j]);
            echo"<td colspan='2'><B> Synthèse ".$nomgp." du trimestre</B></td>";   
        }
         $espcolsp=count($totaleval)*2;
       echo"<td colspan='".$espcolsp."'><B> EVALUATION(S) </B></td>"; 
       echo"<td colspan='2'><B> TRIMESTRE </B></td></tr> ";  
       echo "<tr><td > </td> ";
     
       for($j=1;$j<=$NBRGROUPE;$j++){
         $nomgp=groupmatensgnom($lesidgroupe[$j]);
         echo"<td><B> Note </B></td><td><B> Rang </B></td>";   
     }
     for($k=1;$k<=count($totaleval);$k++){
       $idval=$totaleval[$k];  
          echo "  <TD><B> Moy Eval ".$idval." </B></TD> <TD><B>Rg Eval".$idval."</B></TD>"; 
         }
     echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr> ";  
        
        for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
        
                  $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
                  AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'  AND codetrim='".$_SESSION['trimcalcul']."'   ORDER BY  moytrim DESC";
             $reponse = $bdda->query($v);
             $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
           while ($donnees = $reponse->fetch())
           {
            $effec++; 
             $mazt=$donnees['matricule'];
             $MOY=$donnees['moytrim'];
             $RG=$donnees['rgtrim'];
             echo "<tr><td><B>".nameschuler($mazt)." ".vornameschuler($mazt)." </B> </td>";
             for($j=1;$j<=$NBRGROUPE;$j++){
                $note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                $rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
                if($rg!=" " AND !empty($rg)){
                  echo"<td><B>".$note."</B></td><td><B>".$rg."<sup> e</sup></B></td>";
                }else{
                  echo"<td><B>".$note."</B></td><td><B>".$rg."</B></td>";
                }
                
            }
         
            for($k=1;$k<=count($totaleval);$k++){
              $idval=$totaleval[$k]; 
              $moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
              $rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
                 echo " 
                 <TD> <B> ".$moyeva." </B> </TD>
                 <TD> <B> ".$rgeva." </B> </TD>"; 
                }

            if($MOY>=10){
                $admis++;
              }
            $effeclasse++;$totalmoy+=$MOY;
            if($RG!=" " AND !empty($RG)){
                echo"<td><B>".$MOY."</B></td><td><B>".$RG."<sup> e</sup></B></td>";
               
            }
            else{
                echo"<td><B>".$MOY."</B></td><td><B>Non classé</B></td>";
            }  
           } 
           $reponse->closeCursor();}
           echo "</tr></table>";
           if($effeclasse>0){
            $prozent=Round((($admis*100)/$effeclasse),2);
          }
          if($effeclasse>0){
            $moyennecl=Round(($totalmoy/$effeclasse),2);
          }
        
           echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
           <I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
           <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           &nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
            <img src='espace.png' height='80px' width='40px' </br>";
            echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
            <I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
            <UL>";
        
            for($j=1;$j<=$NBRGROUPE;$j++){
              $nomgp=groupmatensgnom($lesidgroupe[$j]);
              $PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              $ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
              echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
              </Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
              </br><img src='espace.png' height='30px' width='40px'> </br>";   
            }
             echo "</UL></br>";
             echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             
             <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
             &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
              ";

   
echo "</table> ";
}




//DEBUT MOBILE
if($isMob){ 
  for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
        
    $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND matricule='".$_SESSION['listalphab'][$m]."'  AND codetrim='".$_SESSION['trimcalcul']."'   ORDER BY  moytrim DESC";

   
   $reponse = $bdda->query($v);
$n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
while ($donnees = $reponse->fetch())
{
$effec++; 
$mazt=$donnees['matricule'];
$MOY=$donnees['moytrim'];
$RG=$donnees['rgtrim'];
echo "<div class='callout callout-success'><b>";
echo "Noms et prénoms : ".nameschuler($mazt)." ".vornameschuler($mazt)."</Br>";
echo "Matricule : ".$mazt."</Br>";
if($RG!=" " AND !empty($RG)){
echo "Rang trimestrielle : ".$RG."<sup> e</sup></Br>";
}
else{
echo"Rang trimestrielle : Non classé</Br>";
}  
echo "Moyenne trimestrielle : ".$MOY."</Br>";


echo "<ul>";
for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
echo "<li>";
echo "Synthèse ".$nomgp." du trimestre</Br>";
echo "</li>";
$note=Elevnotegrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
$rg=Elevrggrouptrim($mazt,$_SESSION['clascalcul'], $lesidgroupe[$j],$_SESSION['trimcalcul'],$_SESSION['ancalcul']); 
if($rg!=" " AND !empty($rg)){
echo"&nbsp &nbsp Note : ".$note." &nbsp &nbsp Rang : ".$rg."<sup> e</sup></Br>";
}else{
echo"&nbsp &nbsp Note : ".$note." &nbsp &nbsp Rang : ".$rg."</Br>";
}
}
echo "</ul>";
 

for($k=1;$k<=count($totaleval);$k++){
$idval=$totaleval[$k]; 

echo "Evaluation ".$idval."</Br>";

$moyeva=moyeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
$rgeva=rgeleveva($mazt,$_SESSION['clascalcul'],$idval,$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
echo "&nbsp &nbsp Moyenne : ".$moyeva." &nbsp &nbsp Rang : ".$rgeva."</Br>";
}

echo "
</b></div>";
if($MOY>=10){
  $admis++;
  }
  $effeclasse++;$totalmoy+=$MOY;



} 
$reponse->closeCursor();}

if($effeclasse>0){
$prozent=Round((($admis*100)/$effeclasse),2);
}
if($effeclasse>0){
$moyennecl=Round(($totalmoy/$effeclasse),2);
}
 
echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE</u>&nbsp&nbsp
<I>( Le pourcentage et la moyenne de la classe sont établis avec les élèves classés )</I></B></br>
<B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp Effectif classé : &nbsp".$_SESSION['effeclasse']."
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
<img src='espace.png' height='80px' width='40px' </br>";
echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES</u>&nbsp&nbsp
<I>( Ici le pourcentage et la moyenne de la classe sont établis avec tous les élèves)</I></B></br>
<UL>";

for($j=1;$j<=$NBRGROUPE;$j++){
$nomgp=groupmatensgnom($lesidgroupe[$j]);
$PCTCLASSEGP=pctclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$MOYCLASSEGP=moyclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
$ADMISCLASSEGP=nbradmisclassegrouptrim($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$lesidgroupe[$j],$_SESSION['ancalcul']);
echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
</Br> &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
</br><img src='espace.png' height='30px' width='40px'> </br>";   
}
echo "</UL></br>";
echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
&nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
";
}


//FIN MOBILE



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