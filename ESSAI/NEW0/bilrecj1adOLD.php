<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';    require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';  require 'calfunction.php';
if(isset($_POST['send'])){
  $an=$_POST['ann'];$_SESSION['anbil']=$_POST['ann'];
  $dat=$_POST['dat']; $_SESSION['datbil1']=$_POST['dat'];
  $xj=substr($dat,0,2);
  $xm=substr($dat,3,2);
  $xa=substr($dat,6,4);
  $dato=$xa."-".$xm."-".$xj; $_SESSION['datobil1']=$dato;
  }
  else if(isset($_POST['sendautredate'])){
    $an= $_SESSION['anbil'] ;
    $dat=format($_POST['autredate']); $_SESSION['datbil1']=format($_POST['autredate']);
    $xj=substr($dat,0,2);
    $xm=substr($dat,3,2);
    $xa=substr($dat,6,4);
    $dato=$xa."-".$xm."-".$xj; $_SESSION['datobil1']=$dato;
    }
  else{
    $an=$_SESSION['anbil']; $dat=$_SESSION['datbil1'];  $dato=$_SESSION['datobil1'];
  }
function effectif($an,$clas){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND  date='".$dato."' ";
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
OR     $_SESSION['code']==7) ){ 
  


  function nommotif($id){

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
  
  function prixmotif($id){

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


    function respsco($id){

     $v="SELECT * FROM admin WHERE id_etab='0' ";
     $reponse = $bdda->query($v); $nom=" ";
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
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  
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
      <form action='bilrecjad.php' method='POST'>
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
     
    <img src=" AGAES2.png" height="50px" width="100px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
      <div> </div>

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
            <h1 class="m-0">RECETTE JOURNALIERE </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">

          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>TRIER&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                </b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                  
            <table>
            <form method='POST' action='bilrecj1ad.php'><TR><TH> 
            <div class='select2-purple'>
            <select name='autredate'  class='select2' id='exampleInputPassword1'>
            <option value=' '>selectionner une autre date</option>
            <?php
            echo "<option value='".$dato."'>".format($dato)."</option>" ;                 
            $v="SELECT DISTINCT date FROM detail WHERE    anelev='".$an."'";
                 $reponse = $bdda->query($v);
                    
                  while ($donnees = $reponse->fetch() )
                  {
                      $val=$donnees['date'];
                      if($val!=$dato){
                        echo "<option value='".$val."'>".format($val)."</option>" ;  
                      }
                   }
                  $reponse->closeCursor();


                  $v="SELECT DISTINCT date FROM exam WHERE    anelev='".$an."'";
                 $reponse = $bdda->query($v);
                    
                  while ($donnees = $reponse->fetch() )
                  {
                      $val=$donnees['date'];
                      if($val!=$dato){
                        echo "<option value='".$val."'>".format($val)."</option>" ;  
                      }
                   }
                  $reponse->closeCursor();

                  $v="SELECT DISTINCT date FROM autrepayefrais WHERE    anelev='".$an."'";
                 $reponse = $bdda->query($v);
                    
                  while ($donnees = $reponse->fetch() )
                  {
                      $val=$donnees['date'];
                      if($val!=$dato){
                        echo "<option value='".$val."'>".format($val)."</option>" ;  
                      }
                   }
                  $reponse->closeCursor();
        ?>


          </select></div> </TH> <TH>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <button type='submit' class='btn btn-primary' name='sendautredate'>OK</button></TH></TR></form>
                  
            <form method='POST' action='bilrecj1ad.php'><TR><TH>
            <div class='select2-purple'>
            <select name='choix'  class='form-control' id='exampleInputPassword2'>
           
            <option value=' '>selectionner le critère</option>    
            <?php
echo "<option value=' '>Trier</option>    
<optgroup label='Bilan du jour'>";
$ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."' AND sup='0'  ";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donnees['idadmin']);
        
       echo "<option value='4-".$donnees['idadmin']."'>".$nname."</option>";
     
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."' AND sup='0'  ";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donnees['idadmin']);
        
       echo "<option value='1-".$donnees['idadmin']."'>".$nname."</option>";
     
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."' AND sup='0'  ";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donnees['idadmin']);
        
       echo "<option value='2-".$donnees['idadmin']."'>".$nname."</option>";
     
    } 
    $reponse->closeCursor();    

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."' AND sup='0'  ";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donnees['idadmin']);
        
       echo "<option value='3-".$donnees['idadmin']."'>".$nname."</option>";
     
    } 
    $reponse->closeCursor();   
 

 echo "<option value='3-t'>Tout le personnel</option>
 </optgroup>
 <optgroup label='Uniquement les uniformes, arbre de noel...'>";
 $ve="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$an."' AND sup='0'  ";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donnees['idadmin']);
        
       echo "<option value='5-".$donnees['idadmin']."'>".$nname."</option>";
     
    } 
    $reponse->closeCursor();    
 
 echo "<option value='5-t'>Tout le personnel</option>
 </optgroup>";
?>


            </select></div> </TH><TH>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <button type='submit' class='btn btn-primary' name='send1'>OK</button></TH></TR></form>
         
             <TR> 
              <TH> 
            </TH>
          </TR> 
        
         
          </TABLE>  
       
          </li>
                  
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  
    <!-- Main content -->
    <center>
      <?php
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){
    echo "<img src='AGAES3.png' height='180px' width='1300px'><br>
            <img src='espace.png' height='100px' width='1000px'><br> <br>
           </center>";
     }
    ?>
           <?php if(isset($_POST['send']) OR isset($_POST['sendautredate'])){// 
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>BILAN DU : ".$dat. "<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['send1'])){  
    $valeur=$_POST['choix']; 
    $tab =explode("-",$valeur);
    $choix=$tab[0];
    $resp=$tab[1];  
    if($choix =='1'){//REMISES
        if($resp =='t'){
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LES REMISES DU : ".$dat. "<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

  else{
    echo " <section class='content'>     <div class='container-fluid'>
    <div class='row'>    <!-- left column -->  <div class='col-md-6'>
        <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
             <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
             <br><br>LES REMISES EFFECTUES PAR ".respsco($resp)." DU : ".$dat. "<br><br> </b></H5>
             </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
 <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  }

    }

    if( $choix ==2 ){//EXAMENS
        if($resp =='t'){
            echo " <section class='content'>     <div class='container-fluid'>
            <div class='row'>    <!-- left column -->  <div class='col-md-6'>
                <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                     <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                     <br><br>LES EXAMENS PAYES DU : ".$dat. "<br><br> </b></H5>
                     </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
        <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
         <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
      " ;  }
    
      else{
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LES PAYES DES EXAMENS EFFECTUES PAR ".respsco($resp)." DU : ".$dat. "<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
    " ;  }
    
    }

    if( $choix ==3 ){//FRAIS
        if($resp =='t'){
            echo " <section class='content'>     <div class='container-fluid'>
            <div class='row'>    <!-- left column -->  <div class='col-md-6'>
                <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                     <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                     <br><br>LES FRAIS DIVERS PAYES DU : ".$dat. "<br><br> </b></H5>
                     </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
        <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
         <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
      " ;  }
    
      else{
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>LES PAYES DES FRAIS DIVERS EFFECTUES PAR ".respsco($resp)." DU : ".$dat. "<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
    " ;  }
    
    }

    if( $choix ==5 ){//UNIFORME
      if($resp =='t'){
          echo " <section class='content'>     <div class='container-fluid'>
          <div class='row'>    <!-- left column -->  <div class='col-md-6'>
              <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                   <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                   <br><br>LES UNIFORMES, ARBRE DE NOEL ET AUTRES  PAYES DU : ".$dat. "<br><br> </b></H5>
                   </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
      <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
      <div class='form-group'>
       <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
  </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
  
    " ;  }
  
    else{
      echo " <section class='content'>     <div class='container-fluid'>
      <div class='row'>    <!-- left column -->  <div class='col-md-6'>
          <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
               <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
               <br><br>LES UNIFORMES, ARBRE DE NOEL ET AUTRES EFFECTUES PAR ".respsco($resp)." DU : ".$dat. "<br><br> </b></H5>
               </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
  <div class='form-group'>
   <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
  </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
  
  " ;  }
  
  }

    if( $choix ==4 ){//TOUT LE BILAN
        if($resp =='t'){
            echo " <section class='content'>     <div class='container-fluid'>
            <div class='row'>    <!-- left column -->  <div class='col-md-6'>
                <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                     <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                     <br><br>TOUT LE BILAN DU : ".$dat. "<br><br> </b></H5>
                     </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
        <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
         <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
      " ;  }
    
      else{
        echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>TOUS LES PAYEMENTS EFFECTUES PAR ".respsco($resp)." DU : ".$dat. "<br><br> </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général, Commercial, Industriel, Anglophone </b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
    
    " ;  }
    
    }

    

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  
 

 $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

 //DEBUT ordi
 if(!$isMob){

 if(isset($_POST['send']) OR isset($_POST['sendautredate'])){//VENANT DE etatclass   id='example1' class='table table-bordered table-striped' <table class='table table-bordered table-hover'>

echo " <table class='table table-bordered table-hover'>

<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td><td><B>MOTIF</B></td>
<td><B>MONTANT</B></td><td><B>REMISE ?</B></td><td><B>FRAIS DIVERS</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";


 
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       
     echo "<tr><td><B>".$i ."</B></td><td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td>
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td> <td><B>". $donnees['matelev'] ."</B></td>
    <td><B>".$donnees['heure']."</B></td><td><B>SCOLARITE</B></td><td><B>
     ". $donnees['montant'] ." fcfa</B></td>
     <td><B>". $donnees['remise'] ."</B></td><td><B>". $donnees['frais'] ." fcfa</B></td><td><B>".$xd ."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
       $n=$n+1;
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
     } 
     $reponse->closeCursor();

     $ni=$n; //EXAMENS

     $v="SELECT *  FROM exam  WHERE  anelev='".$an."'  AND  date='".$dato."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;$ytotalex=0; 
     while ($donnees = $reponse->fetch())
     {
        $j=$ni+1;  
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
     echo "<tr><td><B>".$j."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td> <td>EXAMEN</td><td>
     ". $donnees['montant'] ." fcfa</B></td ><td> </td><td> </td><td><B>".$xd ."</B></td> <td><B>".$aut."</B></td> </tr>";
     $ni=$ni+1;
     } 
     $reponse->closeCursor();
 
     $ytotalssrem=$ytotalt-$ytotalrem;
     $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
     echo "<tr ><td colspan='9'> </td> <td><B>Total de la scolarité<br > y compris les remises</td> <td><B>".$ytotalt." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des remises</td> <td><B>".$ytotalrem." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total de la scolarité <br > sans les remises</td> <td><B>".$ytotalssrem." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des examens</td> <td><B>".$ytotalex." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des frais divers</td> <td><B>".$ytotalfrais." fcfa</B></td> </tr>";
     echo " </table> ";
  
  
  
       echo " <img src='espace.png' height='50px' width='1000px'></br>
       <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
       </Br><img src='espace.png' height='50px' width='1000px'></br>
       <table class='table table-bordered table-hover'> 
       <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
       <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
       <td><B>MOTIF</B></td><td><B>MONTANT</B></td><td><B>RESPONSABLE</B></td> </tr> ";
       
       
        
       $v="SELECT *  FROM autrepayefrais   WHERE anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
       $reponse = $bdda->query($v);
            $n=0;
          
            $ytotaluni=0; // UNIFORMES
           
            
            while ($donnees = $reponse->fetch())
            {
              $i=$n+1;  
              $xd=format($donnees['date'] );
              echo  "<tr> <td nowrap><B>".$i."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$an)."</B></td> <td nowrap><B>
              ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</B></td><td><B>". $donnees['matelev'] ."</B></td>
              <td><B>".$donnees['heure']."</B></td><td nowrap><B> 
               ".nommotif($donnees['frais']); 
               if($donnees['frais']==9){ 
               echo "(".namemois($donnees['mois'])." )";
             }
              echo "</B></td>
              <td nowrap> <B> 
               ".$donnees['montant']." fcfa</B></td>
               <td><B>".respsco($donnees['idempl'])."</B></td></tr> " ; 
             
            $ytotaluni=$ytotaluni+$donnees['montant'];
              $n=$n+1;
              } 
            $reponse->closeCursor();
       
            
            echo "<tr ><td colspan='6'> </td> <td><B>Total</B></td> <td><B>".$ytotaluni." fcfa</B></td> </tr>";
            $global=$ytotaluni+$ytotalnet;
             echo "</table>
             
             <section class='content'>     <div class='container-fluid'>
            <div class='row'> 
            <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> </U><br> </b>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> 
     <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
  
  }

 if(isset($_POST['send1'])){  
    $valeur=$_POST['choix']; 
    $tab =explode("-",$valeur);
    $choix=$tab[0];
    $resp=$tab[1];  

    if($choix =='1'){//REMISES
        if($resp =='t'){
     
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
<td><B>MONTANT</B></td><td><B>TYPE DE LA REMISE</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";


 
          $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND  date='".$dato."' AND remise='OUI'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalrem=0; // remises
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
        
      
       
     echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
     ". $donnees['montant'] ." fcfa</B></td><td><B>". $donnees['typerem'] ."</B></td> <td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
     $ytotalrem=$ytotalrem+$donnees['montant'];
       $n=$n+1;
       } 
     $reponse->closeCursor();

     
     echo "<tr ><td colspan='6'> </td> <td><B>Total des remises</td> <td><B>".$ytotalrem." fcfa</B></td> </tr>";
    }



    else{
     
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
        <td><B>MONTANT</B></td><td><B>TYPE DE LA REMISE</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";
        
        
         
                  $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."' AND remise='OUI'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotalrem=0; // remises
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
                
              
               
             echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
            <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
             ". $donnees['montant'] ." fcfa</B></td><td><B>". $donnees['typerem'] ."</B></td> <td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
             $ytotalrem=$ytotalrem+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
        
             
             echo "<tr ><td colspan='6'> </td> <td><B>Total des remises</td> <td><B>".$ytotalrem." fcfa</B></td> </tr>";
            }




    }

    if($choix =='2'){//exam
        if($resp =='t'){
      
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
<td><B>MONTANT</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";


 
          $v="SELECT *  FROM exam  WHERE  anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalex=0; // examens
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
        
      
       
     echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
     ". $donnees['montant'] ." fcfa</B></td><td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
     $ytotalex=$ytotalex+$donnees['montant'];
       $n=$n+1;
       } 
     $reponse->closeCursor();

     
     echo "<tr ><td colspan='6'> </td> <td><B>Total des examens</td> <td><B>".$ytotalex." fcfa</B></td> </tr>";
    }


    else{
      
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
        <td><B>MONTANT</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";
        
        
         
                  $v="SELECT *  FROM exam  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotalex=0; // examens
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
                
              
               
             echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
            <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
             ". $donnees['montant'] ." fcfa</B></td><td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
             $ytotalex=$ytotalex+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
        
             
             echo "<tr ><td colspan='6'> </td> <td><B>Total des examens</td> <td><B>".$ytotalex." fcfa</B></td> </tr>";
            }





     }

     if($choix =='3'){//FRAIS
        if($resp =='t'){
      
     
echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
<td><B>MONTANT (en fcfa)</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";


 
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'  AND frais>'0' ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalfrais=0; // frais
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
        
      
       
     echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
     ". $donnees['frais'] ." </td ><td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
     $ytotalfrais=$ytotalfrais+$donnees['frais'];
       $n=$n+1;
       } 
     $reponse->closeCursor();

     
     echo "<tr ><td colspan='5'> </td> <td><B>Total des frais divers</td> <td><B>".$ytotalfrais." fcfa</B></td> </tr>";
    }


   else{
      
     
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
        <td><B>MONTANT (en fcfa)</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";
        
        
         
                  $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  AND frais>'0' ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotalfrais=0; // frais
            
             
             while ($donnees = $reponse->fetch()) 
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
                
              
               
             echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
            <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td>  <td>
             ". $donnees['frais'] ." </td ><td><B>".$xd ."</B></td> <td><B>".respsco($donnees['idempl']) ."</B></td>  </tr>";
             $ytotalfrais=$ytotalfrais+$donnees['frais'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
        
             
             echo "<tr ><td colspan='5'> </td> <td><B>Total des frais divers</td> <td><B>".$ytotalfrais." fcfa</B></td> </tr>";
            }

     }




     if($choix =='5'){//UNIFORM
      if($resp =='t'){
    
   
        echo " <table class='table table-bordered table-hover'> 
        <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
        <td><B>MOTIF</B></td><td><B>MONTANT</B></td><td><B>RESPONSABLE</B></td> </tr> ";
        
        
         
                  $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotaluni=0; // UNIFORMES
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
               echo  "<tr> <td nowrap><B>".$i."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$an)."</B></td> <td nowrap><B>
               ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</B></td><td><B>". $donnees['matelev'] ."</B></td>
               <td><B>".$donnees['heure']."</B></td><td nowrap><B> 
                ".nommotif($donnees['frais']); 
                if($donnees['frais']==9){ 
                echo "(".namemois($donnees['mois'])." )";
              }
               echo "</B></td>
               <td nowrap> <B> 
                ".$donnees['montant']." fcfa</B></td><td><B>".respsco($donnees['idempl']) ."</B></td></tr> " ; 
              
             $ytotaluni=$ytotaluni+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
        
             
             echo "<tr ><td colspan='6'> </td> <td><B>Total</td> <td><B>".$ytotaluni." fcfa</B></td> </tr>";
             }


 else{
    
  echo " <table class='table table-bordered table-hover'> 
  <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
  <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
  <td><B>MOTIF</B></td><td><B>MONTANT</B></td><td><B>RESPONSABLE</B></td> </tr> ";
  
  
   
            $v="SELECT *  FROM autrepayefrais   WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
       $reponse = $bdda->query($v);
       $n=0;
     
       $ytotaluni=0; // UNIFORMES
      
       
       while ($donnees = $reponse->fetch())
       {
         $i=$n+1;  
         $xd=format($donnees['date'] );
         echo  "<tr> <td nowrap><B>".$i."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$an)."</B></td> <td nowrap><B>
         ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</B></td><td><B>". $donnees['matelev'] ."</B></td>
         <td><B>".$donnees['heure']."</B></td><td nowrap><B> 
          ".nommotif($donnees['frais']); 
          if($donnees['frais']==9){ 
          echo "(".namemois($donnees['mois'])." )";
        }
         echo "</B></td>
         <td nowrap> <B> 
          ".$donnees['montant']." fcfa</B></td><td><B>".respsco($donnees['idempl']) ."</B></td></tr> " ; 
        
       $ytotaluni=$ytotaluni+$donnees['montant'];
         $n=$n+1;
         } 
       $reponse->closeCursor();
  
       
       echo "<tr ><td colspan='6'> </td> <td><B>Total</td> <td><B>".$ytotaluni." fcfa</B></td> </tr>";
       }

   }



 
     if($choix =='4'){//TOUT LE BILAN
        if($resp =='t'){
      
  
echo " <table class='table table-bordered table-hover'>

<tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td><td><B>MOTIF</B></td>
<td><B>MONTANT</B></td><td><B>REMISE ?</B></td><td><B>FRAIS DIVERS</B></td><td><B>DATE</B></td><td><B>RESPONSABLE</B></td> </tr> ";


 
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       
     echo "<tr><td><B>".$i ."</B></td><td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td>
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td> <td><B>". $donnees['matelev'] ."</B></td>
    <td><B>".$donnees['heure']."</B></td><td><B>SCOLARITE</B></td><td><B>
     ". $donnees['montant'] ." fcfa</B></td>
     <td><B>". $donnees['remise'] ."</B></td><td><B>". $donnees['frais'] ." fcfa</B></td><td><B>".$xd ."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
       $n=$n+1;
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
     } 
     $reponse->closeCursor();

     $ni=$n; //EXAMENS

     $v="SELECT *  FROM exam  WHERE  anelev='".$an."'  AND  date='".$dato."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;$ytotalex=0; 
     while ($donnees = $reponse->fetch())
     {
        $j=$ni+1;  
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
     echo "<tr><td><B>".$j."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
    <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td> <td>EXAMEN</td><td>
     ". $donnees['montant'] ." fcfa</B></td ><td> </td><td> </td><td><B>".$xd ."</B></td> <td><B>".$aut."</B></td> </tr>";
     $ni=$ni+1;
     } 
     $reponse->closeCursor();
 
     $ytotalssrem=$ytotalt-$ytotalrem;
     $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
     echo "<tr ><td colspan='9'> </td> <td><B>Total de la scolarité<br > y compris les remises</td> <td><B>".$ytotalt." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des remises</td> <td><B>".$ytotalrem." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total de la scolarité <br > sans les remises</td> <td><B>".$ytotalssrem." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des examens</td> <td><B>".$ytotalex." fcfa</B></td> </tr>";
     echo "<tr ><td colspan='9'> </td> <td><B>Total des frais divers</td> <td><B>".$ytotalfrais." fcfa</B></td> </tr>";
     echo " </table> ";
  
  
  
       echo " <img src='espace.png' height='50px' width='1000px'></br>
       <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
       </Br><img src='espace.png' height='50px' width='1000px'></br>
       <table class='table table-bordered table-hover'> 
       <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
       <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
       <td><B>MOTIF</B></td><td><B>MONTANT</B></td><td><B>RESPONSABLE</B></td> </tr> ";
       
       
        
       $v="SELECT *  FROM autrepayefrais   WHERE anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
       $reponse = $bdda->query($v);
            $n=0;
          
            $ytotaluni=0; // UNIFORMES
           
            
            while ($donnees = $reponse->fetch())
            {
              $i=$n+1;  
              $xd=format($donnees['date'] );
              echo  "<tr> <td nowrap><B>".$i."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$an)."</B></td> <td nowrap><B>
              ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</B></td><td><B>". $donnees['matelev'] ."</B></td>
              <td><B>".$donnees['heure']."</B></td><td nowrap><B> 
               ".nommotif($donnees['frais']); 
               if($donnees['frais']==9){ 
               echo "(".namemois($donnees['mois'])." )";
             }
             echo "</B></td>
             <td nowrap> <B> 
              ".$donnees['montant']." fcfa</B></td>
              <td><B>".respsco($donnees['idempl'])."</B></td></tr> " ; 
            
           $ytotaluni=$ytotaluni+$donnees['montant'];
             $n=$n+1;
             } 
           $reponse->closeCursor();
      
           
           echo "<tr ><td colspan='6'> </td> <td><B>Total</B></td> <td><B>".$ytotaluni." fcfa</B></td> </tr>";
           $global=$ytotaluni+$ytotalnet;
            echo "</table>
             
             <section class='content'>     <div class='container-fluid'>
            <div class='row'> 
            <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> </U><br> </b>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> 
     <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
  
    }


    else{
      
     
      echo " <table class='table table-bordered table-hover'> 
      <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
      <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td><td><B>MOTIF</B></td>
      <td><B>MONTANT</B></td><td><B>REMISE ?</B></td><td><B>FRAIS DIVERS</B></td> </tr> ";
      
      
       
                $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND anelev='".$an."' AND id_etab='0' AND date='".$dato."' ORDER BY id DESC";
           $reponse = $bdda->query($v);
           $n=0;
           $ytotalt=0; // y compris les remises
           $ytotalrem=0; // remises
           $ytotalfrais=0; // frais
           
           while ($donnees = $reponse->fetch())
           {
             $i=$n+1;  
             $xd=format($donnees['date'] );
             $ytotalt=$ytotalt+$donnees['montant'];
             $ytotalfrais=$ytotalfrais+$donnees['frais'];
            
             
           echo "<tr><td><B>".$i ."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
          <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td> <td>SCOLARITE </td><td>
           ". $donnees['montant'] ." fcfa</B></td ><td><B>". $donnees['remise'] ."</B></td> <td><B>". $donnees['frais'] ." fcfa</B></td></tr>";
          
             $n=$n+1;
             if($donnees['remise']=='OUI'){
              $ytotalrem=$ytotalrem+$donnees['montant'];
             }
           } 
           $reponse->closeCursor();
      
           $ni=$n; //EXAMENS
      
           $v="SELECT *  FROM exam  WHERE idempl='".$resp."' AND anelev='".$an."' AND id_etab='0' AND date='".$dato."' ORDER BY id DESC";
           $reponse = $bdda->query($v);
           $n=0;$ytotalex=0; 
           while ($donnees = $reponse->fetch())
           {
              $j=$ni+1;  
              $ytotalex=$ytotalex+$donnees['montant']; 
           echo "<tr><td><B>".$j."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
          <td><B>".classparid($donnees['niveauelev'] ,$an)."</B></td>  <td><B>". $donnees['matelev'] ."</B></td> <td><B>".$donnees['heure']."</B></td> <td>EXAMEN</td> <td>
           ". $donnees['montant'] ." fcfa</B></td ><td> </td><td> </td></tr>";
           $ni=$ni+1;
           } 
           $reponse->closeCursor();
       
           $ytotalssrem=$ytotalt-$ytotalrem;
           $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
           echo "<tr ><td colspan='7'> </td> <td><B>Total de la scolarité<br > y compris les remises</td> <td><B>".$ytotalt." fcfa</B></td> </tr>";
           echo "<tr ><td colspan='7'> </td> <td><B>Total des remises</td> <td><B>".$ytotalrem." fcfa</B></td> </tr>";
           echo "<tr ><td colspan='7'> </td> <td><B>Total de la scolarité <br > sans les remises</td> <td><B>".$ytotalssrem." fcfa</B></td> </tr>";
           echo "<tr ><td colspan='7'> </td> <td><B>Total des examens</td> <td><B>".$ytotalex." fcfa</B></td> </tr>";
           echo "<tr ><td colspan='7'> </td> <td><B>Total des frais divers</td> <td><B>".$ytotalfrais." fcfa</B></td> </tr>";
           echo " </table> ";
      
      
      
           echo " <img src='espace.png' height='50px' width='1000px'></br>
           <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
           </Br><img src='espace.png' height='50px' width='1000px'></br>
           <table class='table table-bordered table-hover'> 
           <tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
           <td><B>CLASSE</B></td> <td><B>MATRICULE</B></td><td><B>HEURE</B></td> 
           <td><B>MOTIF</B></td><td><B>MONTANT</B></td> </tr> ";
           
           
            
           $v="SELECT *  FROM autrepayefrais   WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
           $reponse = $bdda->query($v);
                $n=0;
              
                $ytotaluni=0; // UNIFORMES
               
                
                while ($donnees = $reponse->fetch())
                {
                  $i=$n+1;  
                  $xd=format($donnees['date'] );
                  echo  "<tr> <td nowrap><B>".$i."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$an)."</B></td> <td nowrap><B>
                  ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</B></td><td><B>". $donnees['matelev'] ."</B></td>
                  <td><B>".$donnees['heure']."</B></td><td nowrap><B> 
                   ".nommotif($donnees['frais']); 
                   if($donnees['frais']==9){ 
                   echo "(".namemois($donnees['mois'])." )";
                 }
                  echo "</B></td>
                  <td nowrap> <B> 
                   ".$donnees['montant']." fcfa</B></td></tr> " ; 
                 
                $ytotaluni=$ytotaluni+$donnees['montant'];
                  $n=$n+1;
                  } 
                $reponse->closeCursor();
           
                
                echo "<tr ><td colspan='5'> </td> <td><B>Total</B></td> <td><B>".$ytotaluni." fcfa</B></td> </tr>";
                $global=$ytotaluni+$ytotalnet;
                 echo "</table>
                 
                 <section class='content'>     <div class='container-fluid'>
                <div class='row'> 
                <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
            <div class='form-group'>
            <b> <U> </U><br> </b>
        </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
        </div> 
         <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
            <div class='form-group'>
            <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
        </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
        </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
      
            }



} 




  }

}
  //FIN ORDI





//DEBUT MOBILE

 if($isMob){

 if(isset($_POST['send']) OR isset($_POST['sendautredate'])){//VENANT DE etatclass   id='example1' class='table table-bordered table-striped' <table class='table table-bordered table-hover'>
echo "<section class='content'>
<div class='container-fluid>
<div class='row'>";
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       echo "<div class='callout callout-success'><b>";
     echo "N° : ".$i ."</br>
     Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
    Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
    Montant : ". $donnees['montant']." fcfa</br>Motif : SCOLARITE</br>";
    if($donnees['remise']=='OUI'){
  echo "Il s'agit d'une remise</br>";
    }
   echo "Frais divers : ". $donnees['frais']." fcfa</br>
    Date et heure : ".$xd."  ".$donnees['heure']."</br>
     Enregistré par : ".$aut."</br>";
    echo "</b></div>";
       $n=$n+1;
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
     } 
     $reponse->closeCursor();

     $ni=$n; //EXAMENS

     $v="SELECT *  FROM exam  WHERE  anelev='".$an."'  AND  date='".$dato."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;$ytotalex=0; 
     while ($donnees = $reponse->fetch())
     {
        $j=$ni+1;  
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
        echo "<div class='callout callout-success'><b>";
        echo "N° : ".$j ."</br>
        Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
       Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
       Montant : ". $donnees['montant']." fcfa</br>Motif : Frais d'examens</br>";
       echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
        Enregistré par : ".$aut."</br>";
       echo "</b></div>";
     
     $ni=$ni+1;
     } 
     $reponse->closeCursor();
 
     $ytotalssrem=$ytotalt-$ytotalrem;
     $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
    
     echo "<div class='callout callout-info'><b>";
     echo "Total de la scolarité y compris les remises : ".$ytotalt." fcfa</br>
     Total des remises : ".$ytotalrem." fcfa</br>
     Total de la scolarité sans les remises : ".$ytotalssrem." fcfa</br>
     Total des examens : ".$ytotalex." fcfa</br>";
    echo "Total des frais divers : ".$ytotalfrais." fcfa</br>";
    echo "</b></div>";
  
  
       echo " <img src='espace.png' height='50px' width='1000px'></br>
       <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
       </Br><img src='espace.png' height='50px' width='1000px'></br>
         ";
       
       
        
       $v="SELECT *  FROM autrepayefrais   WHERE anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
       $reponse = $bdda->query($v);
            $n=0;
          
            $ytotaluni=0; // UNIFORMES
           
            
            while ($donnees = $reponse->fetch())
            {
              $i=$n+1;  
              $xd=format($donnees['date'] );
              echo "<div class='callout callout-success'><b>";
               echo "N° : ".$i ."</br>
               Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$an)."</br>
              Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</br>Matricule : ".$donnees['matelev']."</br>
              Montant : ". $donnees['montant']." fcfa</br>Motif : ".nommotif($donnees['frais'])."</br>";
              if($donnees['frais']==9){
                echo "Mois : ".namemois($donnees['mois'])."</br>";
              }
             echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
               Enregistré par : ".respsco($donnees['idempl'])."</br>";
              echo "</b></div>";

            $ytotaluni=$ytotaluni+$donnees['montant'];
              $n=$n+1;
              } 
            $reponse->closeCursor();
       
            echo "<div class='callout callout-info'><b>";
     echo "Total uniformes...: ".$ytotaluni." fcfa</br>
    </b></div>";
           
            $global=$ytotaluni+$ytotalnet;
             echo " 
             
             <section class='content'>     <div class='container-fluid'>
            <div class='row'> 
            <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> </U><br> </b>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> 
     <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
        <div class='form-group'>
        <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
    </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
    </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
  
  }

 if(isset($_POST['send1'])){  
    $valeur=$_POST['choix']; 
    $tab =explode("-",$valeur);
    $choix=$tab[0];
    $resp=$tab[1];  

    if($choix =='1'){//REMISES
        if($resp =='t'){
     
   $v="SELECT *  FROM detail  WHERE anelev='".$an."' AND  date='".$dato."' AND remise='OUI'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalrem=0; // remises
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       echo "<div class='callout callout-success'><b>";
       echo "N° : ".$i ."</br>
       Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
      Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
      Montant : ". $donnees['montant']." fcfa</br>Motif : Remise</br>";
      
     echo "Type de la remise : ".$donnees['typerem']."</br>
      Date et heure : ".$xd."  ".$donnees['heure']."</br>
       Enregistré par : ".respsco($donnees['idempl'])."</br>";
      echo "</b></div>";
      
       
     $ytotalrem=$ytotalrem+$donnees['montant'];
       $n=$n+1;
       } 
     $reponse->closeCursor();
     echo "<div class='callout callout-success'><b>";
     echo "Total des remises : ".$ytotalrem." fcfa</br>
   </b></div>";
     
    }



    else{
              $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."' AND remise='OUI'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotalrem=0; // remises
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
               echo "<div class='callout callout-success'><b>";
       echo "N° : ".$i ."</br>
       Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
      Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
      Montant : ". $donnees['montant']." fcfa</br>Motif : Remise</br>";
      
     echo "Type de la remise : ".$donnees['typerem']."</br>
      Date et heure : ".$xd."  ".$donnees['heure']."</br>
       Enregistré par : ".respsco($donnees['idempl'])."</br>";
      echo "</b></div>";
         $ytotalrem=$ytotalrem+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
             echo "<div class='callout callout-success'><b>";
             echo "Total des remises : ".$ytotalrem." fcfa</br>
           </b></div>";
          }




    }

    if($choix =='2'){//exam
        if($resp =='t'){
 
          $v="SELECT *  FROM exam  WHERE  anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalex=0; // examens
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       echo "<div class='callout callout-success'><b>";
       echo "N° : ".$i ."</br>
       Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
      Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
      Montant : ". $donnees['montant']." fcfa</br>Motif : Remise</br>
      Date et heure : ".$xd."  ".$donnees['heure']."</br>
       Enregistré par : ".respsco($donnees['idempl'])."</br>";
      echo "</b></div>";
      $ytotalex=$ytotalex+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
             echo "<div class='callout callout-success'><b>";
             echo "Total des examens : ".$ytotalex." fcfa</br>
           </b></div>";
    }


    else{
      
      
        
        
         
                  $v="SELECT *  FROM exam  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           $ytotalex=0; // examens
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
               echo "<div class='callout callout-success'><b>";
               echo "N° : ".$i ."</br>
               Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
              Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
              Montant : ". $donnees['montant']." fcfa</br>Motif : Remise</br>
              Date et heure : ".$xd."  ".$donnees['heure']."</br>
               Enregistré par : ".respsco($donnees['idempl'])."</br>";
              echo "</b></div>";
              $ytotalex=$ytotalex+$donnees['montant'];
                       $n=$n+1;
                       } 
                     $reponse->closeCursor();
                   
                    echo "<div class='callout callout-success'><b>";
                    echo "Total des examens : ".$ytotalex." fcfa</br>
                  </b></div>";
                }





     }

     if($choix =='3'){//FRAIS
        if($resp =='t'){
      
 
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'  AND frais>'0' ORDER BY id DESC";
     $reponse = $bdda->query($v);
     $n=0;
   
     $ytotalfrais=0; // frais
    
     
     while ($donnees = $reponse->fetch())
     {
       $i=$n+1;  
       $xd=format($donnees['date'] );
       echo "<div class='callout callout-success'><b>";
       echo "N° : ".$i ."</br>
       Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
      Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
      Montant : ". $donnees['frais']." fcfa</br>Motif : Frais divers exigibles</br>
      Date et heure : ".$xd."  ".$donnees['heure']."</br>
       Enregistré par : ".respsco($donnees['idempl'])."</br>";
      echo "</b></div>";
      
     $ytotalfrais=$ytotalfrais+$donnees['frais'];
       $n=$n+1;
       } 
     $reponse->closeCursor();
     echo "<div class='callout callout-success'><b>";
     echo "Total des frais divers : ".$ytotalfrais." fcfa</br>
   </b></div>";
    }


   else{
      
     
       
                  $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  AND frais>'0' ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotalfrais=0; // frais
            
             
             while ($donnees = $reponse->fetch()) 
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
                
               echo "<div class='callout callout-success'><b>";
       echo "N° : ".$i ."</br>
       Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
      Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
      Montant : ". $donnees['frais']." fcfa</br>Motif : Frais divers exigibles</br>
      Date et heure : ".$xd."  ".$donnees['heure']."</br>
       Enregistré par : ".respsco($donnees['idempl'])."</br>";
      echo "</b></div>";
               
            
             $ytotalfrais=$ytotalfrais+$donnees['frais'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
             echo "<div class='callout callout-success'><b>";
             echo "Total des frais divers : ".$ytotalfrais." fcfa</br>
           </b></div>";
            }

     }




     if($choix =='5'){//UNIFORM
      if($resp =='t'){
    
   
        $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
             $reponse = $bdda->query($v);
             $n=0;
           
             $ytotaluni=0; // UNIFORMES
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
              
                echo "<div class='callout callout-success'><b>";
                echo "N° : ".$i ."</br>
                Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$an)."</br>
               Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</br>Matricule : ".$donnees['matelev']."</br>
               Montant : ". $donnees['montant']." fcfa</br>Motif : ".nommotif($donnees['frais'])."</br>";
               if($donnees['frais']==9){
                 echo "Mois : ".namemois($donnees['mois'])."</br>";
               }
              echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
                Enregistré par : ".respsco($donnees['idempl'])."</br>";
               echo "</b></div>";
 

             $ytotaluni=$ytotaluni+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
             echo "<div class='callout callout-success'><b>";
             echo "Total : ".$ytotaluni." fcfa</br>
           </b></div>";
             }


 else{
 
   
            $v="SELECT *  FROM autrepayefrais   WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
       $reponse = $bdda->query($v);
       $n=0;
     
       $ytotaluni=0; // UNIFORMES
      
       
       while ($donnees = $reponse->fetch())
       {
         $i=$n+1;  
         $xd=format($donnees['date'] );
         echo "<div class='callout callout-success'><b>";
                echo "N° : ".$i ."</br>
                Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$an)."</br>
               Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</br>Matricule : ".$donnees['matelev']."</br>
               Montant : ". $donnees['montant']." fcfa</br>Motif : ".nommotif($donnees['frais'])."</br>";
               if($donnees['frais']==9){
                 echo "Mois : ".namemois($donnees['mois'])."</br>";
               }
              echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
                Enregistré par : ".respsco($donnees['idempl'])."</br>";
               echo "</b></div>";
        
       $ytotaluni=$ytotaluni+$donnees['montant'];
         $n=$n+1;
         } 
       $reponse->closeCursor();
       echo "<div class='callout callout-success'><b>";
       echo "Total : ".$ytotaluni." fcfa</br>
     </b></div>";
       }

   }



 
     if($choix =='4'){//TOUT LE BILAN
        if($resp =='t'){
      
          $v="SELECT *  FROM detail  WHERE  anelev='".$an."' AND  date='".$dato."'   ORDER BY id DESC";
          $reponse = $bdda->query($v);
          $n=0;
          $ytotalt=0; // y compris les remises
          $ytotalrem=0; // remises
          $ytotalfrais=0; // frais
          
          while ($donnees = $reponse->fetch())
          {
            $i=$n+1;  
            $xd=format($donnees['date'] );
            $ytotalt=$ytotalt+$donnees['montant'];
            $ytotalfrais=$ytotalfrais+$donnees['frais'];
           $aut=respsco($donnees['idempl']);
            echo "<div class='callout callout-success'><b>";
          echo "N° : ".$i ."</br>
          Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
         Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
         Montant : ". $donnees['montant']." fcfa</br>Motif : SCOLARITE</br>";
         if($donnees['remise']=='OUI'){
       echo "Il s'agit d'une remise</br>";
         }
        echo "Frais divers : ". $donnees['frais']." fcfa</br>
         Date et heure : ".$xd."  ".$donnees['heure']."</br>
          Enregistré par : ".$aut."</br>";
         echo "</b></div>";
            $n=$n+1;
            if($donnees['remise']=='OUI'){
             $ytotalrem=$ytotalrem+$donnees['montant'];
            }
          } 
          $reponse->closeCursor();
     
          $ni=$n; //EXAMENS
     
          $v="SELECT *  FROM exam  WHERE  anelev='".$an."'  AND  date='".$dato."'  ORDER BY id DESC";
          $reponse = $bdda->query($v);
          $n=0;$ytotalex=0; 
          while ($donnees = $reponse->fetch())
          {
             $j=$ni+1;  
             $xd=format($donnees['date'] );
             $ytotalex=$ytotalex+$donnees['montant']; 
             $aut=respsco($donnees['idempl']);
             echo "<div class='callout callout-success'><b>";
             echo "N° : ".$j ."</br>
             Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
            Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
            Montant : ". $donnees['montant']." fcfa</br>Motif : Frais d'examens</br>";
            echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
             Enregistré par : ".$aut."</br>";
            echo "</b></div>";
          
          $ni=$ni+1;
          } 
          $reponse->closeCursor();
      
          $ytotalssrem=$ytotalt-$ytotalrem;
          $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
         
          echo "<div class='callout callout-info'><b>";
          echo "Total de la scolarité y compris les remises : ".$ytotalt." fcfa</br>
          Total des remises : ".$ytotalrem." fcfa</br>
          Total de la scolarité sans les remises : ".$ytotalssrem." fcfa</br>
          Total des examens : ".$ytotalex." fcfa</br>";
         echo "Total des frais divers : ".$ytotalfrais." fcfa</br>";
         echo "</b></div>";
       
       
            echo " <img src='espace.png' height='50px' width='1000px'></br>
            <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
            </Br><img src='espace.png' height='50px' width='1000px'></br>
              ";
            
            
             
            $v="SELECT *  FROM autrepayefrais   WHERE anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
            $reponse = $bdda->query($v);
                 $n=0;
               
                 $ytotaluni=0; // UNIFORMES
                
                 
                 while ($donnees = $reponse->fetch())
                 {
                   $i=$n+1;  
                   $xd=format($donnees['date'] );
                   echo "<div class='callout callout-success'><b>";
                    echo "N° : ".$i ."</br>
                    Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$an)."</br>
                   Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</br>Matricule : ".$donnees['matelev']."</br>
                   Montant : ". $donnees['montant']." fcfa</br>Motif : ".nommotif($donnees['frais'])."</br>";
                   if($donnees['frais']==9){
                     echo "Mois : ".namemois($donnees['mois'])."</br>";
                   }
                  echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
                    Enregistré par : ".respsco($donnees['idempl'])."</br>";
                   echo "</b></div>";
     
                 $ytotaluni=$ytotaluni+$donnees['montant'];
                   $n=$n+1;
                   } 
                 $reponse->closeCursor();
            
                 echo "<div class='callout callout-info'><b>";
          echo "Total uniformes...: ".$ytotaluni." fcfa</br>
         </b></div>";
                
                 $global=$ytotaluni+$ytotalnet;
                  echo " 
                  
                  <section class='content'>     <div class='container-fluid'>
                 <div class='row'> 
                 <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
             <div class='form-group'>
             <b> <U> </U><br> </b>
         </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
         </div> 
          <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
             <div class='form-group'>
             <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
         </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
         </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
    }

//ICI ARRET
    else{
      
     
      $v="SELECT *  FROM detail  WHERE idempl='".$resp."' AND  anelev='".$an."' AND  date='".$dato."'   ORDER BY id DESC";
      $reponse = $bdda->query($v);
      $n=0;
      $ytotalt=0; // y compris les remises
      $ytotalrem=0; // remises
      $ytotalfrais=0; // frais
      
      while ($donnees = $reponse->fetch())
      {
        $i=$n+1;  
        $xd=format($donnees['date'] );
        $ytotalt=$ytotalt+$donnees['montant'];
        $ytotalfrais=$ytotalfrais+$donnees['frais'];
       $aut=respsco($donnees['idempl']);
        echo "<div class='callout callout-success'><b>";
      echo "N° : ".$i ."</br>
      Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
     Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
     Montant : ". $donnees['montant']." fcfa</br>Motif : SCOLARITE</br>";
     if($donnees['remise']=='OUI'){
   echo "Il s'agit d'une remise</br>";
     }
    echo "Frais divers : ". $donnees['frais']." fcfa</br>
     Date et heure : ".$xd."  ".$donnees['heure']."</br>
      Enregistré par : ".$aut."</br>";
     echo "</b></div>";
        $n=$n+1;
        if($donnees['remise']=='OUI'){
         $ytotalrem=$ytotalrem+$donnees['montant'];
        }
      } 
      $reponse->closeCursor();
 
      $ni=$n; //EXAMENS
 
      $v="SELECT *  FROM exam  WHERE idempl='".$resp."' AND  anelev='".$an."'  AND  date='".$dato."'  ORDER BY id DESC";
      $reponse = $bdda->query($v);
      $n=0;$ytotalex=0; 
      while ($donnees = $reponse->fetch())
      {
         $j=$ni+1;  
         $xd=format($donnees['date'] );
         $ytotalex=$ytotalex+$donnees['montant']; 
         $aut=respsco($donnees['idempl']);
         echo "<div class='callout callout-success'><b>";
         echo "N° : ".$j ."</br>
         Noms et prénoms : ". $donnees['nomelev'] ." ".$donnees['preelev']."</br>
        Classe : ".classparid($donnees['niveauelev'] ,$an)."</br>Matricule : ".$donnees['matelev']."</br>
        Montant : ". $donnees['montant']." fcfa</br>Motif : Frais d'examens</br>";
        echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
         Enregistré par : ".$aut."</br>";
        echo "</b></div>";
      
      $ni=$ni+1;
      } 
      $reponse->closeCursor();
  
      $ytotalssrem=$ytotalt-$ytotalrem;
      $ytotalnet=$ytotalssrem+$ytotalex+$ytotalfrais;
     
      echo "<div class='callout callout-info'><b>";
      echo "Total de la scolarité y compris les remises : ".$ytotalt." fcfa</br>
      Total des remises : ".$ytotalrem." fcfa</br>
      Total de la scolarité sans les remises : ".$ytotalssrem." fcfa</br>
      Total des examens : ".$ytotalex." fcfa</br>";
     echo "Total des frais divers : ".$ytotalfrais." fcfa</br>";
     echo "</b></div>";
   
   
        echo " <img src='espace.png' height='50px' width='1000px'></br>
        <B> UNIFORMES DE CLASSE, ECUSSONS, ARBRE DE NOEL, TRANSPORT DES ELEVES ETC ... </B>
        </Br><img src='espace.png' height='50px' width='1000px'></br>
          ";
        
        
         
        $v="SELECT *  FROM autrepayefrais   WHERE idempl='".$resp."' AND anelev='".$an."' AND  date='".$dato."'  ORDER BY id DESC";
        $reponse = $bdda->query($v);
             $n=0;
           
             $ytotaluni=0; // UNIFORMES
            
             
             while ($donnees = $reponse->fetch())
             {
               $i=$n+1;  
               $xd=format($donnees['date'] );
               echo "<div class='callout callout-success'><b>";
                echo "N° : ".$i ."</br>
                Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$an)."</br>
               Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$an),$an)."</br>Matricule : ".$donnees['matelev']."</br>
               Montant : ". $donnees['montant']." fcfa</br>Motif : ".nommotif($donnees['frais'])."</br>";
               if($donnees['frais']==9){
                 echo "Mois : ".namemois($donnees['mois'])."</br>";
               }
              echo "Date et heure : ".$xd."  ".$donnees['heure']."</br>
                Enregistré par : ".respsco($donnees['idempl'])."</br>";
               echo "</b></div>";
 
             $ytotaluni=$ytotaluni+$donnees['montant'];
               $n=$n+1;
               } 
             $reponse->closeCursor();
        
             echo "<div class='callout callout-info'><b>";
      echo "Total uniformes...: ".$ytotaluni." fcfa</br>
     </b></div>";
            
             $global=$ytotaluni+$ytotalnet;
              echo " 
              
              <section class='content'>     <div class='container-fluid'>
             <div class='row'> 
             <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
         <div class='form-group'>
         <b> <U> </U><br> </b>
     </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
     </div> 
      <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
         <div class='form-group'>
         <b> <U> TOTAL NET RECU</U><br>".$global." fcfa</b></H5>
     </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
     </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>";
      
            }



} 




  }
echo "</div></div></div>";
}

//FIN MOBILE


  ?>
  

</Br>  </Br></Br></Br>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <div class='no-print'>
  <footer class="main-footer">
   <div class="btn-group w-100 mb-2">
     <a class="btn btn-success"  data-filter='2'>   TOTAL NET RECU :  
   <?php   echo $global;  ?>fcfa </a> 
    </div>
  </footer></div> 


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