<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
if(isset($_POST['send'])){
  $an=$_POST['ann'];$_SESSION['anajoutensa1']=$_POST['ann'];
  $_SESSION['newensg']=$_POST['choix'];
  }
  else{
    $an=$_SESSION['anajoutensa1']; 
    $_SESSION['newensg']=$_POST['choix'];
    
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
            <h1 class="m-0">INSERER UN(E) ANCIEN(NE) ENSEIGNANT(E) </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
          <?php
          
          
          
          echo "<ol class='breadcrumb float-sm-right'>";
          echo "<li class='breadcrumb-item'><form method='post' action='ajoutensa1.php'>  <div class='select2-purple'>
          <label for='exampleInputPassword1'>  </label>
          <div class='select2-purple'>
      <select name='choix' class='select2' data-placeholder='Choisir l'enseignant' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
      if($_SESSION['newensg']!=" "){
      $nom=nomensohnejahr($bdda,$_SESSION['newensg']);
      echo " <option value='".$_SESSION['newensg']."'>".$nom."</option>";
      echo " <option value=' '>NOUVEAU ENSEIGNANT</option>";
      }
      else{
          echo " <option value=' '>NOUVEAU ENSEIGNANT</option>";
      }
          
         
      $ve="SELECT DISTINCT cni FROM enseignant WHERE   id_etab='0' ORDER BY nomens";
      $repons = $bdda->query($ve);
      while ($donnees = $repons->fetch())
      {   
          
       $de=nomensohnejahr($bdda,$donnees['cni']);
       $phras =$donnees['cni'] ; 
                $phras =$donnees['cni'] ; 
                if(!empty($de) AND $de!=' ' AND $de!=$_SESSION['newensg']){ 
                $pe="value=".$phras;
               echo "<option ".$pe." >".$de."</option>" ;
             }
          } 
                  $repons->closeCursor(); 
           
      echo "</select></br>"; 
           echo"  <button type='submit' name='send1' value='1' class='btn btn-primary'>Général</button> ";
          echo" <button type='submit' name='send1' value='2' class='btn btn-primary'>Commercial</button> ";  
          echo"  <button type='submit' name='send1' value='3' class='btn btn-primary'>Industriel</button> ";  
          echo" </br></br><button type='submit' name='send1' value='4' class='btn btn-primary'>Anglophone</button>
          
          </form> </div></br>";  
          echo" <form method='post' action='ajoutensa.php'> 
           <button type='submit' name='send' value=' ' class='btn btn-primary'>Choisir une autre année scolaire</button>
          </form>";  
          
          if($_SESSION['code']==4) { 
                echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
               }
               if($_SESSION['code']==3) { 
                  echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                 }
                 if($_SESSION['code']==2) { 
                  echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                 }
                 if($_SESSION['code']==1) { 
                  echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
                 }
                 if($_SESSION['code']==5) { 
                  echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
                 }
                 if($_SESSION['code']==6) { 
                  echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
                 }
                   
                echo"</form>";
          
          ?> 
               
              
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
              <div class="card-header">
                <h3 class="card-title"> <?php

if(isset($_POST['send'])){
  if($_POST['send']==1){
echo "Enseignement secondaire général";
  }
  if($_POST['send']==2){
    echo "Enseignement secondaire commercial";
      }
      if($_POST['send']==3){
        echo "Enseignement secondaire industriel";
          }   
          if($_POST['send']==4){
            echo "Enseignement secondaire anglophone";
              }
   
  }
  else{
    if($_POST['send1']==1){
      echo "Enseignement secondaire général";
        }
        if($_POST['send1']==2){
          echo "Enseignement secondaire commercial";
            }
            if($_POST['send1']==3){
              echo "Enseignement secondaire industriel";
                }   
                if($_POST['send1']==4){
                  echo "Enseignement secondaire anglophone";
                    }
  } 
                ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="ajoutensa2.php" name="inscrip">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NOMS  </label>
                    <?php
                    if(isset($_POST['send'])){ 
       echo  "<input name='nomens' class='form-control' id='exampleInputEmail1' value='".nomensuniqohnejahr($bdda,$_SESSION['newensg'])."'  required >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='nomens' class='form-control' id='exampleInputEmail1' value='".nomensuniqohnejahr($bdda,$_SESSION['newensg'])."' required >";
                   }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">PRENOMS </label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='prenomens' class='form-control' id='exampleInputEmail1'  value='".prenomensuniqohnejahr($bdda,$_SESSION['newensg'])."' >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='prenomens' class='form-control' id='exampleInputEmail1' value='".prenomensuniqohnejahr($bdda,$_SESSION['newensg'])."' >";
                   }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">SEXE</label>  
                    <select name="genre" class="form-control" id="exampleInputPassword1">
                    <?php  if(isset($_POST['send'])){
                  $sex=sexensuniqohnejahr($bdda,$_SESSION['newensg']);
                  if($sex=="M"){
                    echo "<option value='".$sex."'>MASCULIN</option>";
                    echo " <option value='F'>FEMININ</option>";
                  }
                  if($sex=="F"){
                    echo "<option value='".$sex."'>FEMININ</option>";
                    echo " <option value='M'>MASCULIN</option>";
                  }
                  }
                   
                  if(isset($_POST['send1'])){
                    if($_POST['choix']!=" "){
                    $sex=sexensuniqohnejahr($bdda,$_SESSION['newensg']);
                    if($sex=="M"){
                      echo "<option value='".$sex."'>MASCULIN</option>";
                      echo " <option value='F'>FEMININ</option>";
                    }
                    if($sex=="F"){
                      echo "<option value='".$sex."'>FEMININ</option>";
                      echo " <option value='M'>MASCULIN</option>";
                    }
                  }
                  else{
                    echo " <option value='M'>MASCULIN</option>";
                    echo "<option value='F'>FEMININ</option>";
                 
                  }
                    }

                    ?>
								</select>
                            </div>
                            <div class="form-group">
                    <label for="exampleInputPassword1">DATE DE NAISSANCE </label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='datens' class='form-control' id='exampleInputEmail1' value='".datensuniqohnejahr($bdda,$_SESSION['newensg'])."'   >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='datens' class='form-control' id='exampleInputEmail1' value='".datensuniqohnejahr($bdda,$_SESSION['newensg'])."' >";
                   }
                   $jahrealt1=substr($an,0,4)-1;
                   $jahrealt2=substr($an,5,8)-1;
                   $jahrealt=$jahrealt1."/".$jahrealt2;

                  
                    ?> </div>  

<?php  if( $_POST['choix']!=" "){   ?>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">SES MATIERES ET CLASSES CETTE ANNEE </label>
                    <select name="se" class="form-control" id="exampleInputPassword1">
                    <?php 
                   
                           // Insertion du message à l'aide d'une requête préparée 
                            $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND cni='".$_SESSION['newensg']."' AND discipline!=' '";
                            $reponse = $bdda->query($v);
                              
                             while ($donnees = $reponse->fetch() )
                             {
                              echo "<option value='' >".namematier($donnees['discipline'])." ----- ".$donnees['nivens']."</option>" ; 
                              }
                             $reponse->closeCursor();
                    ?>   
								</select>
                  </div> <?php  }  ?>


                  <?php  if( $_POST['choix']!=" "){   ?>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">SES MATIERES ET CLASSES L'ANNEE DERNIERE </label>
                    <select name="se" class="form-control" id="exampleInputPassword1">
                    <?php 
                   
                          // Insertion du message à l'aide d'une requête préparée 
                            $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$jahrealt."' AND cni='".$_SESSION['newensg']."' AND discipline!=' '";
                            $reponse = $bdda->query($v);
                              
                             while ($donnees = $reponse->fetch() )
                             {
                              echo "<option value='' >".namematier($donnees['discipline'])." ----- ".$donnees['nivens']."</option>" ; 
                              }
                             $reponse->closeCursor();
                    ?>   
								</select>
                  </div> <?php  }  ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">TELEPHONE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='telens' class='form-control' id='exampleInputEmail1' value='".telensuniqohnejahr($bdda,$_SESSION['newensg'])."'  >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='telens' class='form-control' id='exampleInputEmail1' value='".telensuniqohnejahr($bdda,$_SESSION['newensg'])."' >";
                   }
                    ?> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">N° CNI</label>
                    <?php
                         if(isset($_POST['send'])){
                          echo  "<input name='cni' class='form-control' id='exampleInputEmail1' value='".cniensuniqohnejahr($bdda,$_SESSION['newensg'])."'  >";
                                     }
                                     if(isset($_POST['send1'])){
                                      if($_POST['choix']!=" "){         
                                      echo  "<input name='cni' class='form-control' id='exampleInputEmail1' value='".cniensuniqohnejahr($bdda,$_SESSION['newensg'])."'  >";
                                      }
                                      else{
                                        echo  "<input name='cni' class='form-control' id='exampleInputEmail1'  required >";
                                      }
                                    }
                    ?> 
                  </div>
                  
                </div>
                <!-- /.card-body -->

               
            </div>
            <!-- /.card -->

             
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-12 col-sm-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Autres informations </h3>
              </div>
              <div class="card-body">
              


                  <div class="form-group">
                    <label for="exampleInputPassword1">DISCIPLINES</label>
                    <select name="discipline" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
                    
							      <?php 
                    	
                       if(isset($_POST['send'])){
                        $tipp=$_POST['send'];
                        
                          $v="SELECT *  FROM matiere  WHERE sup='0' AND anens='".$an."' AND codemat!='--' AND (typeEns='".$tipp."'
        OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
         ) ORDER BY codemat";
                     $reponse = $bdda->query($v);
                                   
                       }
                       else{
                        $tipp=$_POST['send1'];
                        
                        $v="SELECT *  FROM matiere  WHERE sup='0' AND anens='".$an."' AND codemat!='--' AND (typeEns='".$tipp."'
      OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
       ) ORDER BY codemat";
                   $reponse = $bdda->query($v);
                       }
                      while ($donnees = $reponse->fetch()){                            
                       $phrase = $donnees['id']; ; 
         $p="value=".$phrase;
         
         
         echo "<option ".$p." >".matparid($bdda,$phrase,$an)." </option>" ;
        }
                       
                  $reponse->closeCursor(); 
                   ?>
                     </select>
                  </div>



              <div class="form-group">
                    <label for="exampleInputPassword1">CLASSES</label>
                    <div class="select2-purple">
                    <select class="select2" name="nivens[]"  multiple="multiple" data-placeholder="Choisir ses classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <optgroup label='Cycle 1' >
							      <?php 
                    	
                       if(isset($_POST['send'])){
                        if($_POST['send']==1){
                     $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                        }
                        if($_POST['send']==2){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                             }
                       if($_POST['send']==3){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                 }    
                       if($_POST['send']==4){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                           }            
                       }
                       else{
                        if($_POST['send1']==1){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                             }
                             if($_POST['send1']==2){
                               $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                  }
                            if($_POST['send1']==3){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                      }    
                            if($_POST['send1']==4){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='1' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                }  
                       }
                     
                      while ($donnees = $reponse->fetch()){                            
                       $phrase=$donnees['id'] ; 
         $p='value='.$phrase;
  
         echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ;
                       } 
                  $reponse->closeCursor(); 
                   ?>
                    </optgroup >

                    <optgroup label='Cycle 2' >
                    <?php 
                    	
                       if(isset($_POST['send'])){
                        if($_POST['send']==1){
                     $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                        }
                        if($_POST['send']==2){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                             }
                       if($_POST['send']==3){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                 }    
                       if($_POST['send']==4){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                           }            
                       }
                       else{
                        if($_POST['send1']==1){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                             }
                             if($_POST['send1']==2){
                               $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                  }
                            if($_POST['send1']==3){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                      }    
                            if($_POST['send1']==4){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='2' AND sup='0' AND anens='".$_SESSION['annee']."'");
                                }  
                       }
                      while ($donnees = $reponse->fetch()){                            
                        $phrase=$donnees['id'] ; 
                        $p='value='.$phrase;
                 
                        echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' </option>' ;
                       } 
                  $reponse->closeCursor(); 
                   ?>
                    </optgroup >
								</select> </div>
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">ANNEE SCOLAIRE</label>
                    <select name="anens" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$an."'>".$an." </option>";
						      ?>
								</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">SALAIRE FIXE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='salaire' class='form-control' id='exampleInputEmail1'  value='".salaireensuniqohnejahr($bdda,$_SESSION['newensg'])."'  >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='salaire' class='form-control' id='exampleInputEmail1' value='".salaireensuniqohnejahr($bdda,$_SESSION['newensg'])."' >";
                   }
                    ?> 
                  </div>
            </br>

            <label for="exampleInputPassword1">TAUX HORAIRE</label>
            <?php
                    if(isset($_POST['send'])){
       echo  "<input name='taux' class='form-control' id='exampleInputEmail1'  value='".tauxensuniqohnejahr($bdda,$_SESSION['newensg'])."'   >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='taux' class='form-control' id='exampleInputEmail1' value='".tauxensuniqohnejahr($bdda,$_SESSION['newensg'])."'  >";
                   }
                    ?> 
                    </br>

                    <label for="exampleInputPassword1">MOT DE PASSE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' value='".mtpasseensuniqohnejahr($bdda,$_SESSION['newensg'])."'  required >";
                  }
                  if(isset($_POST['send1'])){
                    if($_POST['choix']!=" "){
        echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' value='".mtpasseensuniqohnejahr($bdda,$_SESSION['newensg'])."'  required >";
                     }    
                     else{
                      echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' required >";
                     }        
                   }
                    ?> <div class="card-footer">
                    </br> <button type="submit" name="send3" class="btn btn-primary">Enregistrer</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                  <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
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