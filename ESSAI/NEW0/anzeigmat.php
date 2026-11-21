<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require '../lesmenushoriz2.php';
set_time_limit(2000);
if(isset($_POST['envoi1'])){
$an= $_SESSION['annee'] ;
}
else{
  $an=$_SESSION['annee'] ;
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
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
 

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
      <form action='gestmatclas.php' method='POST'>
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
            <h1 class="m-0">LISTE DES MATIERES</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
         
            
             <?php // echo anzeigmat();?> 
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center>
    <?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo "<img src='ENTBULL.png' height='150px' width='1300px'><br>
    <img src='ENTBULL1.png' height='200px' width='1000px'>
    <img src='espace.png' height='100px' width='1000px'><br> <br>";
    }?>  
    
           </center>
           <?php if(isset($_POST['envoi1'])){//VENANT DE ajoutmatclass
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LISTE DES MATIERES</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['envoi3'])){  
    if($_POST['choix']!=0){ 
        $tensg=$_POST['choix'];
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LISTE DES MATIERES</b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                     
  <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT :".nomgroupetype($tensg)."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  
    }

    else{
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LISTE DES MATIERES</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
    }
  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  

 $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
 if(isset($_POST['envoi1'])){// ajoutmatclass
 
  if(!$isMob){
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>TYPE D'ENSEIGNEMENT</B></td> 
<td><B>GROUPE DANS L'ENSEIGNEMENT GENERAL</B></td> <td><B>GROUPE DANS L'ENSEIGNEMENT COMMERCIAL</B></td>
<td><B>GROUPE DANS L'ENSEIGNEMENT INDUSTRIEL</B></td><td><B>GROUPE DANS L'ENSEIGNEMENT ANGLOPHONE</B></td>
 </tr> ";



          $v="SELECT *  FROM matiere  WHERE sup='0' AND codemat!='--' ORDER BY codemat";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     $idmat=$donnees['id'];
     $type=$donnees['typeEns'];
     $idgrup1=matgroupidgroup($idmat,$an,1);
     $nomgrup1=groupmatensgnom($idgrup1);
     $idgrup2=matgroupidgroup($idmat,$an,2);
     $nomgrup2=groupmatensgnom($idgrup2);
     $idgrup3=matgroupidgroup($idmat,$an,3);
     $nomgrup3=groupmatensgnom($idgrup3);
     $idgrup4=matgroupidgroup($idmat,$an,4);
     $nomgrup4=groupmatensgnom($idgrup4);
     echo "<tr><th >".$i ."</th><th >".matparid($idmat,$an)."</th><th >".nomgroupetype($type)."
     </th><th >".$nomgrup1."</th><th >".$nomgrup2."</th><th >".$nomgrup3."</th><th >".$nomgrup4."</th> </tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
   echo "</table>";
    }

    if($isMob){
      
      
      
                $v="SELECT *  FROM matiere  WHERE sup='0' AND codemat!='--' ORDER BY codemat";
           $reponse = $bdda->query($v);
           $n=0;
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           $idmat=$donnees['id'];
           $type=$donnees['typeEns'];
           $idgrup1=matgroupidgroup($idmat,$an,1);
           $nomgrup1=groupmatensgnom($idgrup1);
           $idgrup2=matgroupidgroup($idmat,$an,2);
           $nomgrup2=groupmatensgnom($idgrup2);
           $idgrup3=matgroupidgroup($idmat,$an,3);
           $nomgrup3=groupmatensgnom($idgrup3);
           $idgrup4=matgroupidgroup($idmat,$an,4);
           $nomgrup4=groupmatensgnom($idgrup4);
           echo "<div class='callout callout-success'><b>
           &nbsp N° ".$i."</br>
           &nbsp Nom de la matière : ".matparid($idmat,$an)."</br>
           &nbsp Type d'enseignement : ".nomgroupetype($type)."</br>
           &nbsp Groupe dans l'enseignement général : ".$nomgrup1."</br>
           &nbsp Groupe dans l'enseignement commercial : ".$nomgrup2."</br>
           &nbsp Groupe dans l'enseignement industriel : ".$nomgrup3."</br>
           &nbsp Groupe dans l'enseignement anglophone : ".$nomgrup4."</br>
           </b></div>";
           
           $n=$n+1;
         } 
         $reponse->closeCursor();
          }
  }

  if(isset($_POST['envoi3'])){ 
    if(!$isMob){
    echo " <table class='table table-bordered table-hover'> 
    <tr bgcolor='orange'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>TYPE D'ENSEIGNEMENT</B></td> 
    <td><B>GROUPE DANS L'ENSEIGNEMENT GENERAL</B></td> <td><B>GROUPE DANS L'ENSEIGNEMENT COMMERCIAL</B></td>
    <td><B>GROUPE DANS L'ENSEIGNEMENT INDUSTRIEL</B></td><td><B>GROUPE DANS L'ENSEIGNEMENT ANGLOPHONE</B></td>
     </tr> ";
     
    if($_POST['choix']!=0){ 
        $tipp=$_POST['choix'];
        $tbl=array();
        $tbl=$tipp;
        $tail=strlen($tipp); 
        $c1=substr($tipp,0,1);
        $c2=substr($tipp,1,1); 
        $c3=substr($tipp,2,2); 
        $c4=substr($tipp,3,3); 
        $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' AND (typeEns='".$tipp."'
        OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
         ) ORDER BY codemat";
        $reponse = $bdda->query($v);
        $n=0;
      while ($donnees = $reponse->fetch())
      {
        $type=$donnees['typeEns'];
       // if($type==$c1 OR $type==$c2 OR $type==$c3 OR $type==$c4 OR $type==$tipp){  
        $i=$n+1;  
        
        $idmat=$donnees['id'];
        
        $idgrup1=matgroupidgroup($idmat,$an,1);
        $nomgrup1=groupmatensgnom($idgrup1);
        $idgrup2=matgroupidgroup($idmat,$an,2);
        $nomgrup2=groupmatensgnom($idgrup2);
        $idgrup3=matgroupidgroup($idmat,$an,3);
        $nomgrup3=groupmatensgnom($idgrup3);
        $idgrup4=matgroupidgroup($idmat,$an,4);
        $nomgrup4=groupmatensgnom($idgrup4);
        echo "<tr><th >".$i ."</th><th >".matparid($idmat,$an)."</th><th >".nomgroupetype($type)."
        </th><th >".$nomgrup1."</th><th >".$nomgrup2."</th><th >".$nomgrup3."</th><th >".$nomgrup4."</th> </tr>";
        $n=$n+1;
       // }
      } 
      $reponse->closeCursor();
    } 
else{

    $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' ORDER BY codemat";
    $reponse = $bdda->query($v);
    $n=0;
  while ($donnees = $reponse->fetch())
  {
    $i=$n+1;  
    $idmat=$donnees['id'];
    $type=$donnees['typeEns'];
    $idgrup1=matgroupidgroup($idmat,$an,1);
    $nomgrup1=groupmatensgnom($idgrup1);
    $idgrup2=matgroupidgroup($idmat,$an,2);
    $nomgrup2=groupmatensgnom($idgrup2);
    $idgrup3=matgroupidgroup($idmat,$an,3);
    $nomgrup3=groupmatensgnom($idgrup3);
    $idgrup4=matgroupidgroup($idmat,$an,4);
    $nomgrup4=groupmatensgnom($idgrup4);
    echo "<tr><th >".$i ."</th><th >".matparid($idmat,$an)."</th><th >".nomgroupetype($type)."
    </th><th >".$nomgrup1."</th><th >".$nomgrup2."</th><th >".$nomgrup3."</th><th >".$nomgrup4."</th> </tr>";
    $n=$n+1;
  } 
  $reponse->closeCursor();
}
echo "</table>";
  }///
  






if($isMob){
   
  if($_POST['choix']!=0){ 
      $tipp=$_POST['choix'];
      $tbl=array();
      $tbl=$tipp;
      $tail=strlen($tipp); 
      $c1=substr($tipp,0,1);
      $c2=substr($tipp,1,1); 
      $c3=substr($tipp,2,2); 
      $c4=substr($tipp,3,3); 
      $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' AND (typeEns='".$tipp."'
      OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
       ) ORDER BY codemat";
      $reponse = $bdda->query($v);
      $n=0;
    while ($donnees = $reponse->fetch())
    {
      $type=$donnees['typeEns'];
     // if($type==$c1 OR $type==$c2 OR $type==$c3 OR $type==$c4 OR $type==$tipp){  
      $i=$n+1;  
      
      $idmat=$donnees['id'];
      
      $idgrup1=matgroupidgroup($idmat,$an,1);
      $nomgrup1=groupmatensgnom($idgrup1);
      $idgrup2=matgroupidgroup($idmat,$an,2);
      $nomgrup2=groupmatensgnom($idgrup2);
      $idgrup3=matgroupidgroup($idmat,$an,3);
      $nomgrup3=groupmatensgnom($idgrup3);
      $idgrup4=matgroupidgroup($idmat,$an,4);
      $nomgrup4=groupmatensgnom($idgrup4);
      echo "<div class='callout callout-success'><b>
      &nbsp N° ".$i."</br>
      &nbsp Nom de la matière : ".matparid($idmat,$an)."</br>
      &nbsp Type d'enseignement : ".nomgroupetype($type)."</br>
      &nbsp Groupe dans l'enseignement général : ".$nomgrup1."</br>
      &nbsp Groupe dans l'enseignement commercial : ".$nomgrup2."</br>
      &nbsp Groupe dans l'enseignement industriel : ".$nomgrup3."</br>
      &nbsp Groupe dans l'enseignement anglophone : ".$nomgrup4."</br>
      </b></div>";
      $n=$n+1;
     // }
    } 
    $reponse->closeCursor();
  } 
else{

  $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' ORDER BY codemat";
  $reponse = $bdda->query($v);
  $n=0;
while ($donnees = $reponse->fetch())
{
  $i=$n+1;  
  $idmat=$donnees['id'];
  $type=$donnees['typeEns'];
  $idgrup1=matgroupidgroup($idmat,$an,1);
  $nomgrup1=groupmatensgnom($idgrup1);
  $idgrup2=matgroupidgroup($idmat,$an,2);
  $nomgrup2=groupmatensgnom($idgrup2);
  $idgrup3=matgroupidgroup($idmat,$an,3);
  $nomgrup3=groupmatensgnom($idgrup3);
  $idgrup4=matgroupidgroup($idmat,$an,4);
  $nomgrup4=groupmatensgnom($idgrup4);
  echo "<div class='callout callout-success'><b>
  &nbsp N° ".$i."</br>
  &nbsp Nom de la matière : ".matparid($idmat,$an)."</br>
  &nbsp Type d'enseignement : ".nomgroupetype($type)."</br>
  &nbsp Groupe dans l'enseignement général : ".$nomgrup1."</br>
  &nbsp Groupe dans l'enseignement commercial : ".$nomgrup2."</br>
  &nbsp Groupe dans l'enseignement industriel : ".$nomgrup3."</br>
  &nbsp Groupe dans l'enseignement anglophone : ".$nomgrup4."</br>
  </b></div>";
  $n=$n+1;
} 
$reponse->closeCursor();
}

}///
 
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
</body>
</html>
<?php }   ?>