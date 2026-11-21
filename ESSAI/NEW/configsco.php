<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php';require '../lesmenushoriz2.php'; 
set_time_limit(2000);

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
  
    if(isset($_POST['send3']) AND !empty($_POST['cls'])){
        $cls=$_POST['cls'];
        $kls=$cls; 
        $_SESSION['schuleconfigsco']=$kls;
        $vin=verifscowant($bdda,$kls,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
        $via=verifscowant($bdda,$kls,'A',$_SESSION['annee'],0);
        $vt1n=verifscowant($bdda,$kls,'N',$_SESSION['annee'],1);// VERIF EXIST TRANCH1 ANC
        $vt1a=verifscowant($bdda,$kls,'A',$_SESSION['annee'],1);
        $vt2n=verifscowant($bdda,$kls,'N',$_SESSION['annee'],2);
        $vt2a=verifscowant($bdda,$kls,'A',$_SESSION['annee'],2);
        $vt3n=verifscowant($bdda,$kls,'N',$_SESSION['annee'],3);
        $vt3a=verifscowant($bdda,$kls,'A',$_SESSION['annee'],3);
        $vfn=verifscowant($bdda,$kls,'N',$_SESSION['annee'],4);
        $vfa=verifscowant($bdda,$kls,'A',$_SESSION['annee'],4);

         $totaln=$vin+$vt1n+$vt2n+$vt3n;
         $totala=$via+$vt1a+$vt2a+$vt3a;
        }   

 

?>
<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     
  <title>  </title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script> 
      function confsupp(){
        var x=confirm("voulez-vous vraiment supprimer les modalités ? "  );
        if(x==true){
          return window.location="configsco2.php";
        }
        else{
          return false;
        }
      }

</script> 
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
            <h1 class="m-0"><b>GESTION DES COUTS DE LA SCOLARITE </b></h1>&nbsp&nbsp&nbsp
            <marquee direction="right">  <img src='acount.jpg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image31.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image15.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'>  
            <img src='acount.jpg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image31.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image15.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'> 
            <img src='acount.jpg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image31.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'>
            <img src='../bild/image15.jpeg' height=200px' width='200px' alt='profil'   style='opacity: .8'> 
    </marquee> 
    
      
        </br>
             
           
          </div><!-- /.col -->

 <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            <table  id="example2" class="table table-bordered table-hover">
            <tr><td colspan="2" bgcolor="orange"> <center><b>Afficher les couts de scolarité ici</b>
        </center></td>
        </tr>
            <tr><td><b>Général</b>
            <form method='POST' action='configsco.php'>
           <div class="select2-purple">
                <select class="select2" name="cls"   data-placeholder="Choisir les classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  
                <?php 
                    echo " <optgroup label='Cycle 1'>";
                     
                    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='1'  AND cycle='1'   ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                   echo " </optgroup>";
                   echo " <optgroup label='Cycle 2'>";
                  
                   $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='1'  AND cycle='2'   ");
                      while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['annee'],$phrase);
           
          echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                        } 
                   $reponse->closeCursor();
                  echo " </optgroup>";
                   
                   ?>
             </select></br><button type="submit" name="send3" value="1"  >&nbsp &nbsp &nbspOK&nbsp &nbsp &nbsp</button>
             &nbsp &nbsp &nbsp <a href="configscotoutg.php">Tout</a> 
             </form>
            </td>

            <td><b>Industriel</b>
            <form method='POST' action='configsco.php'>
           <div class="select2-purple">
                <select class="select2" name="cls"   data-placeholder="Choisir les classes" data-dropdown-css-class="select2-purple" style="width: 100%;">

                <?php 
                    echo " <optgroup label='Cycle 1'>";
                     
                    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='3'  AND cycle='1'  ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                   echo " </optgroup>";
                   echo " <optgroup label='Cycle 2'>";
                  
                   $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='3'  AND cycle='2'  ");
                      while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['annee'],$phrase);
           
          echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                        } 
                   $reponse->closeCursor();
                  echo " </optgroup>";
                   
                   ?>
             </select></br><button type="submit" name="send3" value="2" >&nbsp &nbsp &nbspOK&nbsp &nbsp &nbsp</button>
             &nbsp &nbsp &nbsp <a href="configscotouti.php">Tout</a> 
             </form>
            </td>
        </tr>
    
    
        <tr><td><b>Commercial</b>
            <form method='POST' action='configsco.php'>
           <div class="select2-purple">
                <select class="select2" name="cls"   data-placeholder="Choisir les classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <?php 
                    echo " <optgroup label='Cycle 1'>";
                     
                    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='2'  AND cycle='1'  ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                   echo " </optgroup>";
                   echo " <optgroup label='Cycle 2'>";
                  
                   $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='2'  AND cycle='2'  ");
                      while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['annee'],$phrase);
           
          echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                        } 
                   $reponse->closeCursor();
                  echo " </optgroup>";
                   
                   ?>
             </select></br><button type="submit" name="send3" value="3" >&nbsp &nbsp &nbspOK&nbsp &nbsp &nbsp</button>
             &nbsp &nbsp &nbsp <a href="configscotoutc.php">Tout</a> 
             </form>
            </td>

            <td><b>Anglophone</b>
            <form method='POST' action='configsco.php'>
           <div class="select2-purple">
                <select class="select2" name="cls"   data-placeholder="Choisir les classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <?php 
                    echo " <optgroup label='Cycle 1'>";
                     
                    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='4'  AND cycle='1'  ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                   echo " </optgroup>";
                   echo " <optgroup label='Cycle 2'>";
                  
                   $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='4'  AND cycle='2'  ");
                      while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['annee'],$phrase);
           
          echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                        } 
                   $reponse->closeCursor();
                  echo " </optgroup>";
                   
                   ?>
             </select></br><button type="submit" name="send3" value="4" >&nbsp &nbsp &nbspOK&nbsp &nbsp &nbsp</button>
             &nbsp &nbsp &nbsp <a href="configscotouta.php">Tout</a> 
             </form>
            </td>
        </tr>
    </table> 






            <?php //echo listouthorizcoll();?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
            <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo " 
                         <form  method='POST' action='configsco.php' name='paiem'>
                         <button type='submit' class='btn btn-success' value='4' ><b>Enregistrer une nouvelle modalité</b></button></form>";
                    }  ?> 
              <div class="card-header">
                <h3 class="card-title"> 
                <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo " SCOLARITE EN ".classparid($bdda,$kls,$_SESSION['annee'])." </br>TOTAL NOUVEAU=".$totaln."
                         Fcfa</br> TOTAL ANCIEN=".$totala." Fcfa 
                         ";
                    }else{  
                   echo "ENREGISTRER UNE NOUVELLE MODALITE";
                     } ?> 
              </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
             echo '<form  method="POST" action="configsco2.php" name="paiem">';
            }else{
              echo '<form  method="POST" action="configsco1.php" name="paiem">';
            } ?>
                 
                <div class="card-body">
                <div class="form-group"><I><b><u>INSCRIPTION</u></b></I></br></br>
                    <label for="exampleInputEmail1">Montant inscription nouveau élève*</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='inscripn' value='".$vin."'  class='form-control' id='exampleInputEmail1' required> ";
                    }else{  
                   echo" <input name='inscripn'   class='form-control' id='exampleInputEmail1' required> ";
                     } ?>
                    </div>
                 
                 <div class="form-group">
                    <label for="exampleInputPassword1">Montant inscription ancien élève*</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='inscripa' value='".$via."'  class='form-control' id='exampleInputEmail1' required> ";
                    }else{  
                   echo" <input name='inscripa'   class='form-control' id='exampleInputEmail1' required> ";
                     } ?>
                             </div>

                             <div class="form-group"><I><b><u>TRANCHE 1</u></b></I></br></br>
                    <label for="exampleInputPassword1">Montant tranche 1 nouveau élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche1n' value='".$vt1n."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche1n'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                             </div>
                             
                             <div class="form-group">
                    <label for="exampleInputPassword1">Montant tranche 1 ancien élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche1a' value='".$vt1a."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche1a'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                             </div>
                          
                             <div class="form-group"><I><b><u>TRANCHE 2</u></b></I></br></br>
                    <label for="exampleInputPassword1">Montant tranche 2 nouveau élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche2n' value='".$vt2n."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche2n'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                             </div>
                             
                             <div class="form-group">
                    <label for="exampleInputPassword1">Montant tranche 2 ancien élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche2a' value='".$vt2a."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche2a'   class='form-control' id='exampleInputEmail1' > ";
                     } ?>  
                          
                   
                    </br>
              
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                        </br></br>
           
                 
        
        
        </div>
          <!--/.col (left) -->




         
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
         
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> </h3>
              </div>
              <div class="card-body">
               
                             <div class="form-group"><I><b><u>TRANCHE 3</u></b></I></br></br>
                    <label for="exampleInputPassword1">Montant tranche 3 nouveau élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche3n' value='".$vt3n."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche3n'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                             </div>
                             
                             <div class="form-group">
                    <label for="exampleInputPassword1">Montant tranche 3 ancien élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='tranche3a' value='".$vt3a."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='tranche3a'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                             </div>  
                             
                             <div class="form-group"><I><b><u>FRAIS DIVERS</u></b></I></br></br>
                    <label for="exampleInputPassword1">Montant frais divers nouveau élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='fraisn' value='".$vfn."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='fraisn'   class='form-control' id='exampleInputEmail1' > ";
                     } ?>  
                             </div>
                             
                             <div class="form-group">
                    <label for="exampleInputPassword1">Montant frais divers ancien élève</label>
                    <?php   if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo" <input name='fraisa' value='".$vfa."'  class='form-control' id='exampleInputEmail1' > ";
                    }else{  
                   echo" <input name='fraisa'   class='form-control' id='exampleInputEmail1' > ";
                     } ?> 
                    </div> 
               
                <div class="form-group">
                   
                </br> 
                <div class="select2-purple">
                <label for="exampleInputPassword1">SELECTIONNER LES CLASSES</label>
                   
                    <?php 
                    if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                        echo "<select class='select2' name='cls[]'    multiple='multiple'    data-dropdown-css-class='select2-purple' style='width: 100%;'>
                     ";
                        echo "<option value='".$kls."' selected='selected'>".classparid($bdda,$kls,$_SESSION['annee'])."</option>" ; 
                        echo " <optgroup label='GENERAL'>";
                   
                        $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='1'   ");
                           while ($donnees = $reponse->fetch()){                            
                             $phrase =$donnees['id'] ; 
               $p='value='.$phrase;
               $effect=effectif($bdda,$_SESSION['annee'],$phrase);
                
               echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                             } 
                        $reponse->closeCursor();
                       echo " </optgroup>";
                       
                       echo " <optgroup label='COMMERCIAL'>";
                       $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='2'  ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).'  </option>' ; 
                         } 
                    $reponse->closeCursor();
                      echo " </optgroup>";
    
                      echo " <optgroup label='INDUSTRIEL'>";
                      $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='3'  ");
                           while ($donnees = $reponse->fetch()){                            
                             $phrase =$donnees['id'] ; 
               $p='value='.$phrase;
               $effect=effectif($bdda,$_SESSION['annee'],$phrase);
                
               echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                             } 
                        $reponse->closeCursor();
                      echo " </optgroup>";
    
                      echo " <optgroup label='ANGLOPHONE'>";
                      $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='4'  ");
                      while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['annee'],$phrase);
           
          echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                        } 
                   $reponse->closeCursor();
                      echo " </optgroup>";
                      }else{ 
                     echo "<select class='select2' name='cls[]'  multiple='multiple' data-placeholder='Choisir les classes' data-dropdown-css-class='select2-purple' style='width: 100%;'>
                     ";
                    echo " <optgroup label='GENERAL'>";
                   
                    $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='1'  ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                   echo " </optgroup>";
                   
                   echo " <optgroup label='COMMERCIAL'>";
                   $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='2'  ");
                   while ($donnees = $reponse->fetch()){                            
                     $phrase =$donnees['id'] ; 
       $p='value='.$phrase;
       $effect=effectif($bdda,$_SESSION['annee'],$phrase);
        
       echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).'  </option>' ; 
                     } 
                $reponse->closeCursor();
                  echo " </optgroup>";

                  echo " <optgroup label='INDUSTRIEL'>";
                  $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='3'   ");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
           $p='value='.$phrase;
           $effect=effectif($bdda,$_SESSION['annee'],$phrase);
            
           echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                         } 
                    $reponse->closeCursor();
                  echo " </optgroup>";

                  echo " <optgroup label='ANGLOPHONE'>";
                  $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND typeEns='4'  ");
                  while ($donnees = $reponse->fetch()){                            
                    $phrase =$donnees['id'] ; 
      $p='value='.$phrase;
      $effect=effectif($bdda,$_SESSION['annee'],$phrase);
       
      echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ; 
                    } 
               $reponse->closeCursor();
                  echo " </optgroup>";}
                   ?>

 						</select>		 
                  </div></div>
                  </br> 
                  <div class="card-footer">
                   
                  <?php 
                   if($trueadmin!=0 
                   AND ($_SESSION['code']==50 OR $_SESSION['code']==1
                   OR $_SESSION['code']==2 OR $_SESSION['code']==3
                   OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
                  if(isset($_POST['send3']) AND !empty($_POST['cls'])){ 
                    echo"<button type='submit' name='send' value='1' class='btn btn-primary' >Enregistrer </button>
                    </br>  </br> 
                     <button type='button' name='envoi'  value='1' class='btn btn-danger' onClick='confsupp()';>Supprimer les modalités en ".
                     classparid($bdda,$kls,$_SESSION['annee'])."</button>";
                    }else{  
                     echo "  <button type='submit' name='send' value='1' class='btn btn-primary' >Enregistrer</button>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                     <button type='reset'   value='1' class='btn btn-danger' >Annuler</button> ";
                    }} ?>
                   </br> 
                  
                </div>
                </br></br></br>
              </form>
                  </div>
                
               
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

         
            

            
         
            

            

             



            
            
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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