<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php';  require 'etattranche.php'; require '../listabrvtype.php';
 require '../lesmenushoriz2.php'; 

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
OR $_SESSION['code']==4 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  


 


$_SESSION['selectout']=0;

if(isset($_POST['sendautr'])){
  $_SESSION['contenusms']=$_POST['message']; 
    $klasms=$_POST['autrclas'];$_SESSION['klasms']=$_POST['autrclas'];
    }
     
    else{
      
        if(isset($_POST['sendtout'])){
            $_SESSION['selectout']=$_POST['sendtout'];
          }
       
    }
    
   
    
    if(isset($_POST['supp'])){
      $_SESSION['contenusms']=" ";
    }


    //CHARGER SMS
    if(isset($_POST['envoisms'])){
      $_SESSION['contenusms']=$_POST['message']; 
       $toutlesnum=" ";
       $nbrenvoi=0;
      if($_SESSION['totallignesms']>0){
        for($j=1;$j<=$_SESSION['totallignesms'];$j++){
          $matricule="matricule".$j;
          if(isset($_POST[$matricule])){
            $matschule=$_POST[$matricule];
            $numer=nummer($matschule);
            $numer=substr($numer,0,9); 
            $debnumer=substr($numer,0,1);
            $numersend="237".$numer; 
            if(is_numeric($numer)==1 AND $debnumer==6){
              $toutlesnum=$toutlesnum."237".$numer.",";
              
             $nbrenvoi++;
            }
          }
        
        }  
      }
      
      if($toutlesnum!=" " AND !empty($toutlesnum)){
        $toutlesnum=rtrim($toutlesnum,",");
        

         //DEBUT ENVOI
      
      // 1- constante à ne pas modifier 
      $user = usersms();
    $password = mtpsms();
    $url = urlsms();
      // 2 - variable à remplir à completer: senderid, sms, mobiles
      $senderid =initialEtab();
      $mobiles =$toutlesnum;
      $sms = $_SESSION['contenusms'];
   
      
      $sms_body = array(
          'user' => $user,
          'password' => $password,
          'senderid' => $senderid,
          'sms' => $sms,
          'mobiles' => $mobiles
      );
  
      $send_data = http_build_query($sms_body);
      $gateway_url = $url . "?" . $send_data;
  
      $back ="";

              $output = curl_error($ch);
              $back = "erreur_sms";
              $back = curl_error($ch);
          }
          else{
              var_dump($output);
          }
          curl_close($ch);
      }
  
      catch (Exception $exception){
          echo $exception->getMessage();
      }

    //FIN ENVOI

    }
      
  
      
  


    }

      //FIN CHARGER

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
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


   <!-- Select2 -->
   <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <style>
  input[type="checkbox"]
                
                {
                    border-radius:5px;
                    transform:translate(5px);
                    float:rigth;
                    height:18px;
                    font-size:10px;
                    width:70px;
                    font-family:Times New Roman;
                    
                }
                
                .positionInTab{
                    border-radius:15px;  
                    float:rigth;
                    height:8px;
                    font-size:18px;
                    font-family:Harrington;
                    width:150px;
                }
                </style>

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Envoi des sms</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php ?> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>CLASSES</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                  <?php 
            
            echo " 
            <form method='POST' action='schenkesms.php'> 
            <div class='select2-purple'>
            <div class='btn-group w-100 mb-2'>
            <select name='autrclas'  class='select2' id='exampleInputPassword1'>
         ";   
         $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' ORDER BY categ");
         while ($donnees = $reponse->fetch()){   
        
            $phrase =$donnees['id'] ; 
            $p='value='.$phrase;
            $effect=effectif($_SESSION['annee'],$phrase);
            if($effect>0){ 
              echo '<option '.$p.' >'.classparid($phrase,$_SESSION['annee']).' &nbsp &nbsp   &nbsp &nbsp &nbsp 
              &nbsp ( '.$effect.' )</option>' ; 
             } }  
        $reponse->closeCursor();
        echo "</select></div></div> <button type='submit' class='btn btn-primary' name='sendautr'>OK</button></TH></TR>
         
        ";?>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>TRI</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                  <?php 
            
            echo "  <button type='submit' class='external-event bg-success' name='sendallclas'>Toute la classe
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            <button type='submit' class='external-event bg-warning' name='sendinscrip'>Inscription non achevée
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>  
            <button type='submit' class='external-event bg-info' name='sendtr1'>Tranche 1 non achevée
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            <button type='submit' class='external-event bg-info' name='sendtr2'>Tranche 2 non achevée
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button> 
            <button type='submit' class='external-event bg-info' name='sendtr3'>Tranche 3 non achevée
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            <button type='submit' class='external-event bg-info' name='sendsco'>Scolarité non achevée
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</button></br>
            <button type='submit' class='external-event bg-danger' name='sendfrais'>Frais d'examens non payées
            &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp </button>
            <button type='submit' class='external-event bg-danger' name='sendabs'>Les absents du jour &nbsp&nbsp&nbsp&nbsp
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</button>";
            ?>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>LISTE</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"> 
                <ul class="nav nav-pills flex-column">

                  <li class="nav-item">
                 
                  <?php  
                  if($_SESSION['selectout']==0){  
                    echo "<button type='submit' name='sendtout' value='1' class='external-event bg-success'>Sélectionner tous les élèves
                    &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp</button>";
                  }
                  if($_SESSION['selectout']==1){  
                    echo "<button type='submit' name='sendtout' value='0' class='btn btn-primary btn-block mb-3'>Désélectionner tout</button>";
                    }
                  ?>
                    </li>
                  <table class='table table-bordered table-hover'>
            
                  <?php 
                  if(isset($_POST['sendautr']) OR isset($_POST['sendallclas'])){  

                    $_SESSION['contenusms']=$_POST['message']; 
                    $_SESSION['tachesms']= 1;
                    $_SESSION['totallignesms']=0;
                  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
          $reponse = $bdda->query($v);
           $i=1;  
          while ($donnees = $reponse->fetch())
          { 
            $_SESSION['totallignesms']++;
            $matricule="matricule".$i;
            if($_SESSION['selectout']==1){ 
            echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
             " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
             </TH></TR> ";
            }
            if($_SESSION['selectout']==0){ 
                echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
                 " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
                 </TH></TR> ";
                }
                 
                $i++;
          } 
          $reponse->closeCursor(); 
          
        }  

          if(isset($_POST['sendinscrip'])){  
            $_SESSION['tachesms']= 2;
            $_SESSION['totallignesms']=0;
            $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
    $reponse = $bdda->query($v);
     $i=1;
    while ($donnees = $reponse->fetch())
    {
      $_SESSION['totallignesms']++;
      $matricule="matricule".$i;
      $verse=$donnees['total'];
      $statut=$donnees['statut']; 
      $bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
           if($verse<$bareme){ 
                  if($_SESSION['selectout']==1){ 
                echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
                " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
                    </TH></TR> ";
                  }
              if($_SESSION['selectout']==0){ 
                 echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
                 " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
                   </TH></TR> ";
               }
          $i++;
        } 
    } 
    $reponse->closeCursor();} 

    if(isset($_POST['sendtr1'])){ 
      $_SESSION['tachesms']= 3; 
      $_SESSION['totallignesms']=0;
      $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$verse=$donnees['total'];
$statut=$donnees['statut']; 
$bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
     if($verse<$bareme){ 
            if($_SESSION['selectout']==1){ 
          echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
          " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
              </TH></TR> ";
            }
        if($_SESSION['selectout']==0){ 
           echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
           " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
             </TH></TR> ";
         }
    $i++;
  } 
} 
$reponse->closeCursor();} 



if(isset($_POST['sendtr2'])){ 
  $_SESSION['tachesms']= 4; 
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$verse=$donnees['total'];
$statut=$donnees['statut']; 
$bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee'])
+tranche2pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
 if($verse<$bareme){ 
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
} 
} 
$reponse->closeCursor();} 


if(isset($_POST['sendtr3'])){  
  $_SESSION['tachesms']= 5;
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$verse=$donnees['total'];
$statut=$donnees['statut']; 
$bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee'])
+tranche2pension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche3pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
 if($verse<$bareme){ 
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
} 
} 
$reponse->closeCursor();} 


if(isset($_POST['sendsco'])){  
  $_SESSION['tachesms']= 6;
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
 
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
 
} 
$reponse->closeCursor();}

function exisexa($mat,$an){

  $v="SELECT *  FROM exam WHERE id_etab='0'";
       $reponse = $bdda->query($v);
     $j=0;   
     while ($donnees = $reponse->fetch() AND $j ==0)
     {
          if ($donnees['matelev'] == $mat AND $donnees['anelev'] == $an)
       {
        $j=1 ;
       } 
         
     } 
     $reponse->closeCursor();
     return $j;
  }

  function exisabs($mat,$an){

    $v="SELECT *  FROM absence  ";
         $reponse = $bdda->query($v);
       $j=0;   $date=date('Y-m-d');
       while ($donnees = $reponse->fetch() AND $j ==0)
       {
            if ($donnees['matelev'] == $mat AND $donnees['anelev'] == $an
            AND $donnees['datenreg'] ==$date)
         {
          $j=1 ;
         } 
           
       } 
       $reponse->closeCursor();
       return $j;
    }

if(isset($_POST['sendfrais'])){  
 

  $_SESSION['tachesms']= 7;
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$veri=exisexa($donnees['matelev'],$donnees['anelev']);
if($veri==0){
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
    }
 
} 
$reponse->closeCursor();}

if(isset($_POST['sendabs'])){  
 

  $_SESSION['tachesms']= 8;
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$veri=exisabs($donnees['matelev'],$donnees['anelev']);
if($veri!=0){
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
    }
 
} 
$reponse->closeCursor();}

if(isset($_POST['sendtout'])){  
  if($_SESSION['tachesms']==1){ 
    $_SESSION['tachesms']= 1;
    $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
  $reponse = $bdda->query($v);
  $i=1;
  while ($donnees = $reponse->fetch())
  {
  $_SESSION['totallignesms']++;
  $matricule="matricule".$i;
  if($_SESSION['selectout']==1){ 
  echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
  " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
  </TH></TR> ";
  }
  if($_SESSION['selectout']==0){ 
  echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
  " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
  </TH></TR> ";
  }
  $i++;
  } 
  $reponse->closeCursor(); 
  }


  if($_SESSION['tachesms']== 2){ 
    $_SESSION['tachesms']= 2;
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
    $reponse = $bdda->query($v);
    $i=1;
    while ($donnees = $reponse->fetch())
    {
    $_SESSION['totallignesms']++;
    $matricule="matricule".$i;
    $verse=$donnees['total'];
    $statut=$donnees['statut']; 
    $bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
    if($verse<$bareme){ 
    if($_SESSION['selectout']==1){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
      </TH></TR> ";
    }
    if($_SESSION['selectout']==0){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
     </TH></TR> ";
    }
    $i++;
    } 
    } 
    $reponse->closeCursor();
  }


  if($_SESSION['tachesms']==3){ 
    $_SESSION['tachesms']= 3; 
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
    $reponse = $bdda->query($v);
    $i=1;
    while ($donnees = $reponse->fetch())
    {
    $_SESSION['totallignesms']++;
    $matricule="matricule".$i;
    $verse=$donnees['total'];
    $statut=$donnees['statut']; 
    $bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
    if($verse<$bareme){ 
    if($_SESSION['selectout']==1){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
    </TH></TR> ";
    }
    if($_SESSION['selectout']==0){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
    </TH></TR> ";
    }
    $i++;
    } 
    } 
    $reponse->closeCursor();
  }


  if($_SESSION['tachesms']==4){ 
    $_SESSION['tachesms']= 4; 
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
    $reponse = $bdda->query($v);
    $i=1;
    while ($donnees = $reponse->fetch())
    {
    $_SESSION['totallignesms']++;
    $matricule="matricule".$i;
    $verse=$donnees['total'];
    $statut=$donnees['statut']; 
    $bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee'])
    +tranche2pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
    if($verse<$bareme){ 
    if($_SESSION['selectout']==1){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
    </TH></TR> ";
    }
    if($_SESSION['selectout']==0){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
    </TH></TR> ";
    }
    $i++;
    } 
    } 
    $reponse->closeCursor();
  }


  if($_SESSION['tachesms']==5){ 
    $_SESSION['tachesms']= 5;
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' ORDER BY nomelev";
    $reponse = $bdda->query($v);
    $i=1;
    while ($donnees = $reponse->fetch())
    {
    $_SESSION['totallignesms']++;
    $matricule="matricule".$i;
    $verse=$donnees['total'];
    $statut=$donnees['statut']; 
    $bareme=inscripension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche1pension($_SESSION['klasms'],$statut,$_SESSION['annee'])
    +tranche2pension($_SESSION['klasms'],$statut,$_SESSION['annee'])+tranche3pension($_SESSION['klasms'],$statut,$_SESSION['annee']);  
    if($verse<$bareme){ 
    if($_SESSION['selectout']==1){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
    </TH></TR> ";
    }
    if($_SESSION['selectout']==0){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
    </TH></TR> ";
    }
    $i++;
    } 
    } 
    $reponse->closeCursor();
  }

  
  if($_SESSION['tachesms']==6){ 
    $_SESSION['tachesms']= 6;
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
    $reponse = $bdda->query($v);
    $i=1;
    while ($donnees = $reponse->fetch())
    {
    $_SESSION['totallignesms']++;
    $matricule="matricule".$i;
    
    if($_SESSION['selectout']==1){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
    </TH></TR> ";
    }
    if($_SESSION['selectout']==0){ 
    echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
    " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
    </TH></TR> ";
    }
    $i++;
    
    } 
    $reponse->closeCursor();
  }


  if($_SESSION['tachesms']==7){ 
    $_SESSION['tachesms']= 7;
  $_SESSION['totallignesms']=0;
  $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch())
{
$_SESSION['totallignesms']++;
$matricule="matricule".$i;
$veri=exisexa($donnees['matelev'],$donnees['anelev']);
if($veri==0){
        if($_SESSION['selectout']==1){ 
      echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
      " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
          </TH></TR> ";
        }
    if($_SESSION['selectout']==0){ 
       echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
       " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
         </TH></TR> ";
     }
$i++;
    }
 
} 
$reponse->closeCursor();
  }

  if($_SESSION['tachesms']== 8){  
 

    $_SESSION['tachesms']= 8;
    $_SESSION['totallignesms']=0;
    $v="SELECT *  FROM eleve WHERE niveauelev='".$_SESSION['klasms']."' AND anelev='".$_SESSION['annee']."' AND reste>0 ORDER BY nomelev";
  $reponse = $bdda->query($v);
  $i=1;
  while ($donnees = $reponse->fetch())
  {
  $_SESSION['totallignesms']++;
  $matricule="matricule".$i;
  $veri=exisabs($donnees['matelev'],$donnees['anelev']);
  if($veri!=0){
          if($_SESSION['selectout']==1){ 
        echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
        " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."' checked='checked'> 
            </TH></TR> ";
          }
      if($_SESSION['selectout']==0){ 
         echo "<TR><TH>".$i.". ".$donnees['nomelev']." ".$donnees['preelev'].
         " </TH><TH><input name='".$matricule."' type='checkbox'   value='".$donnees['matelev']."'> 
           </TH></TR> ";
       }
  $i++;
      }
   
  } 
  $reponse->closeCursor();}

}




          ?> 
               </TABLE> 

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><B>Nouveau message/New Message : <?php echo classparid($_SESSION['klasms'],$_SESSION['annee']);?></B></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 
              <form method='POST' action='schenkesms.php'>
                <div class="form-group">
                <?php 
                // <textarea id='compose-textarea' 
                echo"<textarea  
                name='message'  class='form-control' style='height: 300px'>";
                       echo $_SESSION['contenusms'] ;
                       ?>
                    </textarea>
                </div>
                 
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                <button type="submit" name="supp" class="btn btn-danger"><i class="far fa-trash-alt"></i> Effacer le contenu</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="submit" name="envoisms" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyer</button>
                  </div>
                
              </div>
              <!-- /.card-footer --></form> 
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 
    </div>
    <strong> 
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
 
<!-- Page specific script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
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