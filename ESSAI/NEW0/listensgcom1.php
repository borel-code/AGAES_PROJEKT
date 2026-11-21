<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; 
 $an=$_SESSION['annee'];
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
AND ($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==4
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==6  OR $_SESSION['code']==7) ){ 
  

 

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
      <li class="nav-item">
      <form action='listconsul.php' method='POST'>
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
            <h1 class="m-0">Liste des élèves </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php  ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <table class='table table-bordered table-hover'>
<form  method='POST' action='listensgcom1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select>
    


</B></td> 
<td><B><button type='submit' class='btn btn-primary' name='send1'>OK</button></B></td> 
 </tr>  </form> </table>

      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center><img src="ENTBULL.png" height="200px" width="1300px" ><br>
            <img src="ENTBULL1.png" height="200px" width="1000px" >
            <img src="espace.png" height="100px" width="1000px" ><br> <br>
           </center>
           <?php if(isset($_GET['send'])){//VENANT DE LISTOUT
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LISTE DES ELEVES</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    if($_POST['choix']=='1'){//ELEV GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DE TOUS LES ANCIENS ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DE TOUS LES NOUVEAUX ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES NOUVELLES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ANCIENNES ELEVES FILLES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES NOUVEAUX ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ANCIENS ELEVES GARCONS</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==9 ){//STATISTIQUES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LES STATISTIQUES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

    if( $_POST['choix']==10 ){//TOUS LES ELEVES
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES ELEVES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Commercial </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
    }

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 if(isset($_GET['send'])){//VENANT DE LISTENSGEN

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>DATE NAISSANCE</B></td><td><B>SEXE</B></td><td><B>MATRICULE</B></td>
<td><B>TYPE ENS.</B></td><td><B>STATUT</B></td><td><B>A/S</B></td><td><B>TEL. PARENTS</B></td> </tr> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0'  ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
       if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;
       }
   } 
   $reponse->closeCursor();
  }

 if(isset($_POST['send1'])){  
   $ent="<table class='table table-bordered table-hover'> 
   <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
   <td><B>CLASSE</B></td> <td><B>DATE NAISSANCE</B></td><td><B>SEXE</B></td><td><B>MATRICULE</B></td>
   <td><B>TYPE ENS.</B></td><td><B>STATUT</B></td><td><B>A/S</B></td><td><B>TEL. PARENTS</B></td> </tr> ";

    if($_POST['choix']=='1'){//ELEV GARCONS
      echo $ent;
         $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='M' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;} 
   } 
   $reponse->closeCursor();

    }

    if( $_POST['choix']==2 ){//ELEV FILLES
      echo $ent;
             $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='F' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();

     }

    if( $_POST['choix']==3 ){//ELEV ANCIENS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();

     }
 
    if( $_POST['choix']==4 ){//ELEV NOUVEAUX
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();
    }

    if( $_POST['choix']==5 ){//ELEV NOUV FILLES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='F' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==6 ){//ELEV ANCIENNES FIILES
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='F' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==7) {//ELEV NOUVEAUX GARCONS
      echo $ent;
           $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='M' AND statut='N' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==8) {//ELEV ANCIENS GARCONS
      echo $ent;
          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND sexelev='M' AND statut='A' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
   } 
   $reponse->closeCursor();
     }

    if( $_POST['choix']==9 ){//STATISTIQUES
        $gegar=BelegschaftG(1,'M',$an); $geanc=BelegschaftA(1,'A',$an);$genew=BelegschaftA(1,'N',$an);
        $gefil=BelegschaftG(1,'F',$an);$tgen=$gegar+$gefil;

        $cogar=BelegschaftG(2,'M',$an);$coanc=BelegschaftA(2,'A',$an);$conew=BelegschaftA(2,'N',$an);
        $cofil=BelegschaftG(2,'F',$an);$tco=$cogar+$cofil;

        $ingar=BelegschaftG(3,'M',$an);$inanc=BelegschaftA(3,'A',$an);$innew=BelegschaftA(3,'N',$an);
        $infil=BelegschaftG(3,'F',$an);$tin=$ingar+$infil;

        $angar=BelegschaftG(4,'M',$an);$ananc=BelegschaftA(4,'A',$an);$annew=BelegschaftA(4,'N',$an);
        $anfil=BelegschaftG(4,'F',$an);$tan=$angar+$anfil;
          
      echo " 
      
      <table class='table table-bordered table-hover'> 
      <tr><td  bgcolor='ccae3'><B>CLASSES</B></td><td ><B>GARCONS</B></td><td><B>FILLES</B></td> 
      <td><B>TOTAUX</B></td> <td><B>ANCIENS</B></td><td><B>NOUVEAUX</B></td></tr> ";
      $v="SELECT *  FROM classe  WHERE typeEns='2' AND anens='".$an."' ";
      $reponse = $bdda->query($v);
      while ($donnees = $reponse->fetch())
      {  
       $cls=$donnees['id'];
       $totalcls=BelegschaftKLASSE(2,'M',$an,$cls)+BelegschaftKLASSE(2,'F',$an,$cls);
      echo " <tr><td  bgcolor='ccae3'><B>".classparid($cls,$an)."</B></td><td><B>".BelegschaftKLASSE(2,'M',$an,$cls)."</B></td>
      <td><B>".BelegschaftKLASSE(2,'F',$an,$cls)."</B></td> 
      <td><B>".$totalcls."</B></td> <td><B>".BelegschaftKLASSEA(2,'A',$an,$cls)."</B></td><td><B>".BelegschaftKLASSEA(2,'N',$an,$cls)."</B></td></tr> ";
    } 
    $reponse->closeCursor();
        
      $TOTAL=$cogar+$cofil;
       
     
    echo " <tr><td  bgcolor='ccae3'><B>TOTAUX</B></td><td><B>".$cogar."</B></td>
    <td><B>".$cofil."</B></td> 
      <td><B>".$TOTAL."</B></td> <td><B>".$coanc."</B></td>
      <td><B>".$conew."</B></td></tr></table> ";
                                               


     }

    if( $_POST['choix']==10 ){
      echo $ent;

       $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
    if(TYPENS($donnees['niveauelev'],$an)==2){ 
     $i=$n+1;  
     echo "<tr><th >".$i ."</th><th >".$donnees['nomelev'] ."</th><th >". $donnees['preelev'] ."
     </th><th >".classparid($donnees['niveauelev'] ,$an)."
     </th><th >".$donnees['datelev']."</th><th >".$donnees['sexelev']."</th><th >"
     . $donnees['idnational'] ."</th><th >".ABRVTYPENS(TYPENS($donnees['niveauelev'],$an))."</th><th >".$donnees['statut']."</th><th >".$donnees['anelev']."</th><th >". $donnees['telev'] ."</th></tr>";
     $n=$n+1;}
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