<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; 
if(isset($_POST['send'])){
$an=$_POST['ann'];$_SESSION['anlistklas']=$_POST['ann'];
$klas=$_POST['clas'];$_SESSION['klaslistklas']=$_POST['clas'];
}
else{
  $an=$_SESSION['anlistklas'];
  $klas=$_SESSION['klaslistklas'];
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
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 

  function normaliser($chaine){



    $acces=array();
    $acces=explode(' ',$chaine);
    $long=count($acces);
    if($long>0){
    for($i=0; $i<$long;$i++){
    echo $acces[$i].'<br>';
    }
    }
    
    else{
    echo $chaine ;
    }
       
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
      <form action='fichenote.php' method='POST'>
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
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
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
            <h1 class="m-0">FICHE DE REPORT DES NOTES </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
               
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <table class='table table-bordered table-hover'>
<form  method='POST' action='fichenote1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B> 
<select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Modèle 1</option>
 <option value='2'>Modèle 2</option>
 <option value='3'>Modèle 3</option>
      
</select>


</B></td> 
<td><B><button type='submit' class='btn btn-primary' name='send1'>OK</button></B></td> 
 </tr>  </form> </table>
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center> <?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo "<img src='AGAES3.png' height='200px' width='1200px'>";
    }?><img src="espace.png" height="100px" width="1000px" ><br> <br>
           </center>
           <?php if(isset($_POST['send'])){//VENANT DE listclasse
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>CLASSE : ".classparid($bdda,$klas,$an)." </br>FICHE DE REPORT DES NOTES
                 </br>NOM DE L'ENSEIGNANT(E) :</b> </H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$klas,$an))."
    </br>MATIERE : </br>COEFFICIENT : </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

  if(isset($_POST['send1'])){ 
    if($_POST['choix']==1 OR $_POST['choix']==2){
    echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
 <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
      <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
      <br><br>CLASSE : ".classparid($bdda,$klas,$an)." </br>FICHE DE REPORT DES NOTES
      </br>NOM DE L'ENSEIGNANT(E) :</b> </H5>
      </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
            
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$klas,$an))."
</br>MATIERE : </br>COEFFICIENT : </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 

}

if($_POST['choix']==3){
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
    <br><br>CLASSE : ".classparid($bdda,$klas,$an)." </br>FICHE DE REPORT DES NOTES
    </br>NOM DE L'ENSEIGNANT(E) :</b> </H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
          
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,TYPENS($bdda,$klas,$an))."
</br </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 

}

}
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 if(isset($_POST['send'])){ 

echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='#b1dfbb'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
<td><B>DEVOIR 1</B></td> <td><B>DEVOIR 2</B></td><td><B>DEVOIR 3</B></td><td><B>DEVOIR 4</B></td>
<td><B>DEVOIR 5</B></td><td><B>DEVOIR 6</B></td><td><B°0987321²+7°²>DEVOIR 7</B></td><td><B>DEVOIR 8</B></td>
<td><B>DEVOIR 9</B></td></tr> </thead>";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th><B>". $donnees['preelev'] ."
     </B></th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th> </tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
  }

 if(isset($_POST['send1'])){  
   
    if($_POST['choix']=='1'){ 
      echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='#b1dfbb'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
<td><B>DEVOIR 1</B></td> <td><B>DEVOIR 2</B></td><td><B>DEVOIR 3</B></td><td><B>DEVOIR 4</B></td>
<td><B>DEVOIR 5</B></td><td><B>DEVOIR 6</B></td><td><B°0987321²+7°²>DEVOIR 7</B></td><td><B>DEVOIR 8</B></td>
<td><B>DEVOIR 9</B></td></tr></thead> ";



          $v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' AND niveauelev='".$klas."' ORDER BY nomelev";
     $reponse = $bdda->query($v);
     $n=0;
   while ($donnees = $reponse->fetch())
   {
     $i=$n+1;  
     echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th><B>". $donnees['preelev'] ."
     </B></th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th> </tr>";
     $n=$n+1;
   } 
   $reponse->closeCursor();
    }
 
    if($_POST['choix']=='2'){
      echo " <table class='table table-bordered table-hover'> 
      <thead><tr bgcolor='#b1dfbb'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
      <td><B>CC </B></td> <td><B>EVAL</B></td><td><B>SEQ </B></td><td><B>CC </B></td> <td><B>EVAL</B></td><td><B>SEQ </B></td>
      <td><B>CC </B></td> <td><B>EVAL</B></td><td><B>SEQ </B></td>
      <td><B>CC </B></td> <td><B>EVAL</B></td><td><B>SEQ </B></td>
      <td><B>CC </B></td> <td><B>EVAL</B></td><td><B>SEQ </B></td></tr></thead> ";
      
      
      
                $v="SELECT *  FROM eleve  WHERE anelev='".$an."'  AND niveauelev='".$klas."' ORDER BY nomelev";
           $reponse = $bdda->query($v);
           $n=0;
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           echo "<tr><th ><B>".$i ."</B></th><th ><B>".$donnees['nomelev'] ."</B></th><th><B>". $donnees['preelev'] ."
           </B></th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th><th> </th> 
           <th> </th><th> </th><th> </th><th> </th><th> </th><th> </th></tr>";
           $n=$n+1;
         } 
         $reponse->closeCursor();

    }


    if($_POST['choix']=='3'){
      echo " <table border='2' cellspacing='0'> 
      <thead><tr bgcolor='#b1dfbb'><td><B>N°</B></td><td><B>NOMS</B></td><td><B>PRENOMS</B></td> 
   ";
      
      
      $nbr=0;
      $vs="SELECT  *  FROM matclasse  WHERE anens='". $_SESSION['annee']."' 
      AND idcl='".$klas."' AND sup='0'";
  $reponses = $bdda->query($vs);
  while ($donneess = $reponses->fetch())
  {
      $idmat=$donneess['idmat'];
      $namemat=matparid($bdda,$idmat, $_SESSION['annee']);
     
      echo"<td><SMALL><B>"; echo normaliser($namemat); echo"  </B></SMALL> </td>";   
      $nbr++;
  // echo"<td><SMALL><B>".normaliser($namemat)." </Br><center>".$coeff."</cenvter></B></SMALL> </td>";  
  } 
  $reponses->closeCursor();
  echo "<td><B>Total Coef</B></td><td><B>Total notes</Br> coéfficiées</B></td><td><B>Moy</B></td><td><B>Rang</B></td></tr> ";
   
  $v="SELECT *  FROM eleve  WHERE anelev='".$an."'  AND niveauelev='".$klas."' ORDER BY nomelev";
  $reponse = $bdda->query($v);
  $n=0;
while ($donnees = $reponse->fetch())
{
  $i=$n+1;  
  echo "<tr><td><B>".$i ."</B></td><td><B>".$donnees['nomelev'] ."</B></td><td><B>". $donnees['preelev'] ."
  </B></td> ";
  $m=0;
  if($nbr>0){
    while($m<$nbr){
      echo "<td> </td>";
      $m++;
    }
  }


  echo "<td> </td><td> </td><td> </td><td> </td></tr> </thead>";
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