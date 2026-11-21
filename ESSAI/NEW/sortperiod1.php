<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';
if(isset($_POST['send'])){
    $an=$_POST['ann'];$_SESSION['anbilp']=$_POST['ann'];
    $dat=$_POST['dat']; $_SESSION['datbilp1']=$_POST['dat'];//DATE MIN
    $dat1=$_POST['dat1']; $_SESSION['datbilp2']=$_POST['dat1'];// DATE MAX
    $xj=substr($dat,0,2);
    $xm=substr($dat,3,2);
    $xa=substr($dat,6,4);
    
    $xj1=substr($dat1,0,2);
    $xm1=substr($dat1,3,2);
    $xa1=substr($dat1,6,4);
    $dato=$xa."-".$xm."-".$xj; $_SESSION['datobilp1']=$dato;
    $dato1=$xa1."-".$xm1."-".$xj1; $_SESSION['datobilp2']=$dato1;
    }
    else{
      $an=$_SESSION['anbilp']; 
      $dat=$_SESSION['datbilp1'];  $dato=$_SESSION['datobilp1'];
      $dat1=$_SESSION['datbilp2'];  $dato1=$_SESSION['datobilp2'];
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
OR $_SESSION['code']==2 OR $_SESSION['code']==4 OR $_SESSION['code']==7) ){ 
  


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
            <h1 class="m-0">SORTIES SUR UNE PERIODE </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php 
             
             echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='sortperiod1.php'>
    <select name='choix' class='form-control' id='exampleInputPassword1'>
    <option value=' '>Trier ...</option> ";
    $ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."'  AND idposte!='50' AND sup='0'  ";
    $reponse = $bdda->query($ve);
         $n=0; 
         while ($donnees = $reponse->fetch())
         {
             
           $i=$n+1;  
           $nname=nomC($bdda,$donnees['idadmin']);
            
           echo "<option value='".$donnees['idadmin']."'>".$nname."</option>";
         
        } 
        $reponse->closeCursor(); 
        echo "<option value='t'>Tout le personnel</option>";

echo"</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'>
<form action='sortperiod.php'>
<input type='submit' value='choisir une autre date'></form></li>";

             
             ?> 
              
      </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center><img src="AGAES3.png" height="180px" width="1300px" ><br>
             
            <img src="espace.png" height="100px" width="1000px" ><br> <br>
           </center>
           <?php if(isset($_POST['send'])){ 
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>"; if($_SESSION['code']==4){echo "MES SORTIES DE CAISSE";} 
                 if($_SESSION['code']!=4){echo "SORTIES DE CAISSE";} echo " DU : ".$dat. " AU ".$dat1."<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  

  if($_POST['choix']=='t'){
    echo " <section class='content'>     <div class='container-fluid'>
    <div class='row'>    <!-- left column -->  <div class='col-md-6'>
        <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
             <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
             <br><br>"; if($_SESSION['code']==4){echo "MES SORTIES DE CAISSE";} 
             if($_SESSION['code']!=4){echo "SORTIES DE CAISSE";} echo " DU : ".$dat. " AU ".$dat1."<br><br> </b></H5>
             </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
 <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ; 
  }

  if($_POST['choix']!='t'){
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LES SORTIES DE CAISSE  : DU  ".$dat. " AU ".$dat1." EFFECTUEES PAR ".respsco($bdda,$_POST['choix'])."<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
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

 if(isset($_POST['send'])){// 

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>DESCRIPTION</B></td> 
<td><B>QUANTITE</B></td> <td><B>TOTAL</B></td><td><B>REMIS A</B></td><td><B>ENREGISTRER PAR</B></td>
<td><B>DATE</B></td> </tr> ";


if($_SESSION['code']==4){
          $v="SELECT *  FROM sortie  WHERE idempl='".$_SESSION['id']."' AND an='".$an."' AND  date>='".$dato."' AND date<='".$dato1."' ORDER BY id DESC";
}
if($_SESSION['code']!=4){
  $v="SELECT *  FROM sortie  WHERE  an='".$an."' AND  date>='".$dato."' AND date<='".$dato1."' ORDER BY id DESC";
}
          $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; //  
     
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['total'];
      
      
       
     echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['descr']."</B></td> 
     <td><B>".$donnees['qte']."</B></td>  <td><B>". $donnees['total'] ." fcfa</B></td><td><B>".$donnees['desti']."</B></td>  <td>
     ". respsco($bdda,$donnees['idempl']) ." </td ><td><B>".$xd."</B></td>  </tr>";
    
       $n=$n+1;
      
     } 
     $reponse->closeCursor();
 
     if($_SESSION['code']==4){
      $v="SELECT * FROM salaire WHERE datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."' AND idempl='".$_SESSION['id']."' ORDER BY datep";
     }
     if($_SESSION['code']!=4){
       $v="SELECT * FROM salaire WHERE  datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."'   ORDER BY datep";
     }
      $reponse = $bdda->query($v);
      $all=0;
      while ($donnees = $reponse->fetch())
      {
 $all+=$donnees['montant'];
     } 
     $reponse->closeCursor();

     if($_SESSION['code']==4){
      $v="SELECT * FROM salaireadmin WHERE datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."' AND idempl='".$_SESSION['id']."' ORDER BY datep";
     }
     if($_SESSION['code']!=4){
       $v="SELECT * FROM salaireadmin WHERE  datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."'   ORDER BY datep";
     }
      $reponse = $bdda->query($v);
      
      while ($donnees = $reponse->fetch())
      {
 $all+=$donnees['montant'];
     } 
     $reponse->closeCursor();

     $ytotalt+=$all;
     echo "<tr ><td colspan='5'> </td> <td><B>LES SALAIRES</td> <td><B>".$all." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='5'> </td> <td><B>Total </td> <td><B>".$ytotalt." fcfa</B></td> </tr>";
 

  }

 if(isset($_POST['send1'])){   
  if($_POST['choix']!='t'){
    echo " <table class='table table-bordered table-hover'> 
    <tr bgcolor='orange'><td><B>N°</B></td><td><B>DESCRIPTION</B></td> 
    <td><B>QUANTITE</B></td> <td><B>TOTAL</B></td><td><B>REMIS A</B></td><td><B>ENREGISTRER PAR</B></td>
    <td><B>DATE</B></td> </tr> ";
    
    
     
              $v="SELECT *  FROM sortie  WHERE idempl='".$_POST['choix']."' AND an='".$an."' AND id_etab='0' AND  date>='".$dato."' AND date<='".$dato1."' ORDER BY id DESC";
         $reponse = $bdda->query($v);
         $n=0;
         $ytotalt=0; //  
         
         
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           $xd=format($donnees['date'] );
           $ytotalt=$ytotalt+$donnees['total'];
          
          
           
         echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['descr']."</B></td> 
         <td><B>".$donnees['qte']."</B></td>  <td><B>". $donnees['total'] ." fcfa</B></td><td><B>".$donnees['desti']."</B></td>  <td>
         ". respsco($bdda,$donnees['idempl']) ."</td ><td><B>".$xd."</B></td>  </tr>";
        
           $n=$n+1;
          
         } 
         $reponse->closeCursor();
     
         $v="SELECT * FROM salaire WHERE  datep>='".$dato."' AND datep<='".$dato1."'  AND an ='".$an."' AND idempl='".$_POST['choix']."' ORDER BY datep";
     $reponse = $bdda->query($v);
     $all=0;
     while ($donnees = $reponse->fetch())
     {
$all+=$donnees['montant'];
    } 
    $reponse->closeCursor();

    $v="SELECT * FROM salaireadmin WHERE  datep>='".$dato."' AND datep<='".$dato1."'  AND an ='".$an."' AND idempl='".$_POST['choix']."' ORDER BY datep";
     $reponse = $bdda->query($v);
     
     while ($donnees = $reponse->fetch())
     {
$all+=$donnees['montant'];
    } 
    $reponse->closeCursor();
    $ytotalt+=$all;
    echo "<tr ><td colspan='5'> </td> <td><B>LES SALAIRES</td> <td><B>".$all." fcfa</B></td> </tr>";
    echo "<tr ><td colspan='5'> </td> <td><B>Total </td> <td><B>".$ytotalt." fcfa</B></td> </tr>";


  }


  if($_POST['choix']=='t'){

    echo " <table class='table table-bordered table-hover'> 
    <tr bgcolor='orange'><td><B>N°</B></td><td><B>DESCRIPTION</B></td> 
    <td><B>QUANTITE</B></td> <td><B>TOTAL</B></td><td><B>REMIS A</B></td><td><B>ENREGISTRER PAR</B></td>
    <td><B>DATE</B></td> </tr> ";
    
    
    if($_SESSION['code']==4){
              $v="SELECT *  FROM sortie  WHERE idempl='".$_SESSION['id']."' AND an='".$an."' AND  date>='".$dato."' AND date<='".$dato1."' ORDER BY id DESC";
    }
    if($_SESSION['code']!=4){
      $v="SELECT *  FROM sortie  WHERE  an='".$an."' AND  date>='".$dato."' AND date<='".$dato1."' ORDER BY id DESC";
    }
              $reponse = $bdda->query($v);
         $n=0;
         $ytotalt=0; //  
         
         
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           $xd=format($donnees['date'] );
           $ytotalt=$ytotalt+$donnees['total'];
          
          
           
         echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['descr']."</B></td> 
         <td><B>".$donnees['qte']."</B></td>  <td><B>". $donnees['total'] ." fcfa</B></td><td><B>".$donnees['desti']."</B></td>  <td>
         ". respsco($bdda,$donnees['idempl']) ." </td ><td><B>".$xd."</B></td>  </tr>";
        
           $n=$n+1;
          
         } 
         $reponse->closeCursor();
     
         if($_SESSION['code']==4){
          $v="SELECT * FROM salaire WHERE   datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."' AND idempl='".$_SESSION['id']."' ORDER BY datep";
         }
         if($_SESSION['code']!=4){
           $v="SELECT * FROM salaire WHERE  datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."'   ORDER BY datep";
         }
          $reponse = $bdda->query($v);
          $all=0;
          while ($donnees = $reponse->fetch())
          {
     $all+=$donnees['montant'];
         } 
         $reponse->closeCursor();

         if($_SESSION['code']==4){
          $v="SELECT * FROM salaireadmin WHERE   datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."' AND idempl='".$_SESSION['id']."' ORDER BY datep";
         }
         if($_SESSION['code']!=4){
           $v="SELECT * FROM salaireadmin WHERE  datep>='".$dato."' AND datep<='".$dato1."' AND an ='".$an."'   ORDER BY datep";
         }
          $reponse = $bdda->query($v);
          
          while ($donnees = $reponse->fetch())
          {
     $all+=$donnees['montant'];
         } 
         $reponse->closeCursor();
         $ytotalt+=$all;
         echo "<tr ><td colspan='5'> </td> <td><B>LES SALAIRES</td> <td><B>".$all." fcfa</B></td> </tr>";
         echo "<tr ><td colspan='5'> </td> <td><B>Total </td> <td><B>".$ytotalt." fcfa</B></td> </tr>";
     
    
  }

  }
  
  ?>
 </table> </Br></Br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <?php if($_SESSION['code']==4 AND isset($_POST['send'])){
 echo"<U>ECONOME</U>";} if($_SESSION['code']!=4){
  echo"<U>VISUALISE PAR</U>";}?></Br>
 &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
  <?php echo  $_SESSION['nom'];?></Br></Br></Br>

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