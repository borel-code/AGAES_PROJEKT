<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';
         
          

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
  




  $_SESSION['modaff']=0;
       $_SESSION['modafford']=0;
       $_SESSION['infotranche']="Tous les élèves";

 
    if(isset($_POST['send']) ){
        $an=$_POST['ann'];$_SESSION['ancalcul']=$an;
        $trim=$_POST['trim'];$_SESSION['trimcalcul']=$trim;
        $clas=$_POST['clas'];$_SESSION['clascalcul']=$clas; 
        $v="SELECT *  FROM classe WHERE   sup='0' 
        ";
   $reponse = $bdda->query($v);
    $l=0;  
     while ($donnees = $reponse->fetch() AND $l==0)
     {
       if($donnees['id']==$_SESSION['clascalcul']){ 
        $_SESSION['Categ']=$donnees['categ'];  
               $l=1; 
           }
      }
     $reponse->closeCursor();  
   }
  
   else{
       $an=$_SESSION['ancalcul'] ;
       $trim=$_SESSION['trimcalcul'] ;
       $clas=$_SESSION['clascalcul'] ;
   }
   $_SESSION['typensgcalcul']=TYPENS($_SESSION['clascalcul'],$_SESSION['ancalcul']);
   $GROUP1=array();$GROUP2=array();$GROUP3=array();

   $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
   $reponse = $bdda->query($v);
    $l=1;  
     while ($donnees = $reponse->fetch() )
     {
       if($donnees['idgp']==1){ 
        $GROUP1[$l]=$donnees['idmat'];  
               $l++; 
           }
      }
     $reponse->closeCursor();
    $_SESSION['GROUP1'] =$GROUP1;

    $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
    $reponse = $bdda->query($v);
     $l=1;  
      while ($donnees = $reponse->fetch() )
      {
        if($donnees['idgp']==2){ 
         $GROUP1[$l]=$donnees['idmat'];  
                $l++; 
            }
       }
      $reponse->closeCursor();
     $_SESSION['GROUP2'] =$GROUP2;


     $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
    $reponse = $bdda->query($v);
     $l=1;  
      while ($donnees = $reponse->fetch() )
      {
        if($donnees['idgp']==3){ 
         $GROUP1[$l]=$donnees['idmat'];  
                $l++; 
            }
       }
      $reponse->closeCursor();
     $_SESSION['GROUP3'] =$GROUP3;




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
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <script> 
  
  function nbremat(str){
             if(str==" "){
                 document.getElementById("eval").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("eval").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","insertcalajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }

</script> 


  <!-- Select2 -->
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
      <form action='insertcalculvu.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab();?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h3 class="m-0">Calcul des moyennes, affichage des bulletins et statistiques <?php echo Nametrim($_SESSION['trimcalcul'])." en ". classparid($clas,$an);?></h3>&nbsp&nbsp&nbsp
            <?php  if($_SESSION['calerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Evaluation calculée avec  succès !! Veuillez cliquer sur la petite croix pour l'enlever</i> 
                  <?php ?> </h5>
    </div>
     <?php $_SESSION['calerfolg']=0; } ?>

     <?php  if($_SESSION['caltrimerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Trimestre calculé avec succès !! Veuillez cliquer sur la petite croix pour l'enlever</i> 
                  <?php ?> </h5>
    </div>
     <?php $_SESSION['caltrimerfolg']=0; } ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
         
              <li class="breadcrumb-item ">
       <b>Système à partir de  2025/2026</b>
            </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <!-- Main content -->
 <?php  $_SESSION['elevemattri']=array();  $_SESSION['elevemarktri']=array(); $_SESSION['elevepostri']=array();
        $_SESSION['elevemoy1']=array();  $_SESSION['elevemoy2']=array(); $_SESSION['elevemoy3']=array();
        $_SESSION['eleverg1']=array();  $_SESSION['eleverg2']=array(); $_SESSION['eleverg3']=array();
        $_SESSION['elevMCL']=array();  $_SESSION['elevFM']=array(); $_SESSION['elevLM']=array();
        $_SESSION['elevCPSE']=array();
        $_SESSION['moytrim08']=0;  $_SESSION['moytrim810']=0;  $_SESSION['moytrim1012']=0;
        $_SESSION['moytrim1220']=0;
        $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];


        $veux="SELECT moytrim,anelev,idcl FROM ". $tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
        AND idcl='".$_SESSION['clascalcul']."' 
         ORDER BY moytrim DESC";
         $rep = $bdda->query($veux);
         $pos=1;
         while ($dop = $rep->fetch())
         {
           $trimoy=$dop['moytrim'];
           if($trimoy!=-1){
            if($trimoy<8){
              $_SESSION['moytrim08']++;
            }
            if($trimoy>=8 AND $trimoy<10){
              $_SESSION['moytrim810']++;
            }
            if($trimoy>=10 AND $trimoy<12){
              $_SESSION['moytrim1012']++;
            }
            if($trimoy>=12 AND $trimoy<=20){
              $_SESSION['moytrim1220']++;
            }
 
           }
}$rep->closeCursor();

$nb08=0;  $nb810=0; $nb1012=0; $nb1220=0;
        if($_SESSION['trimcalcul']!=3){
         $vZ="SELECT * FROM ". $tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
        AND idcl='".$_SESSION['clascalcul']."' 
         ORDER BY moytrim DESC";
         $reponsZ = $bdda->query($vZ);
         $pos=1;
         while ($donneesZ = $reponsZ->fetch())
         {
           $trimoy=$donneesZ['moytrim'];
           if($trimoy!=-1){
            if($trimoy<8){
              $_SESSION['moytrim08']++;  $nb08++;
            }
            if($trimoy>=8 AND $trimoy<10){
              $_SESSION['moytrim810']++;   $nb810++;
            }
            if($trimoy>=10 AND $trimoy<12){
              $_SESSION['moytrim1012']++;  $nb1012++;
            }
            if($trimoy>=12 AND $trimoy<=20){
              $_SESSION['moytrim1220']++;   $nb1220++;
            }
 
           }
          $_SESSION['elevemattri'][$pos]= $donneesZ['matelev'];
           $_SESSION['elevemarktri'][$pos]= $donneesZ['moytrim'];
           $_SESSION['elevepostri'][$pos]= $donneesZ['rgtrim'];

           $_SESSION['elevMCL'][$pos]= $donneesZ['mcltrim'];
          $_SESSION['elevFM'][$pos]= $donneesZ['maxtrim'];
          $_SESSION['elevLM'][$pos]= $donneesZ['mintrim'];
          $_SESSION['elevCPSE'][$pos]= $donneesZ['cpse'];

          $_SESSION['elevemoy1'][$pos]= $donneesZ['moy1'];
          $_SESSION['elevemoy2'][$pos]= $donneesZ['moy2'];
          $_SESSION['elevemoy3'][$pos]= $donneesZ['moy3'];
          $_SESSION['eleverg1'][$pos]= $donneesZ['rg1'];
          $_SESSION['eleverg2'][$pos]= $donneesZ['rg2'];
          $_SESSION['eleverg3'][$pos]= $donneesZ['rg3'];

          
          
           $pos++;
        }$reponsZ->closeCursor();
        $_SESSION['effectrim']=$pos-1;
        }
       
          


        if($_SESSION['trimcalcul']==3){


$_SESSION['moytrima08']=0;  $_SESSION['moytrima810']=0;  $_SESSION['moytrima1012']=0;
        $_SESSION['moytrima1220']=0;

          $vZan="SELECT *  FROM markmoyan WHERE anelev='".$_SESSION['ancalcul']."' 
         AND idcl='".$_SESSION['clascalcul']."' ORDER BY moyan DESC";
          $reponsZan = $bdda->query($vZan);
          $posa=1; // matelev	idcl	anelev	moyan	rgan	mclan	minan	maxan	cpse	adm	pctan
          while ($donneesZan = $reponsZan->fetch())
          { 

            $trimoy=$donneesZan['moyan'];
           if($trimoy!=-1){
            if($trimoy<8){
              $_SESSION['moytrima08']++; $nb08++;
            }
            if($trimoy>=8 AND $trimoy<10){
              $_SESSION['moytrima810']++;  $nb810++;
            }
            if($trimoy>=10 AND $trimoy<12){
              $_SESSION['moytrima1012']++;  $nb1012++;
            }
            if($trimoy>=12 AND $trimoy<=20){
              $_SESSION['moytrima1220']++;  $nb1220++;
            }
 
           }
            $lcontenu=searchtablemoy($donneesZan['matelev'],$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
            $cellule=array();
            $cellule=explode("@",$lcontenu);

            $_SESSION['elevemoy1'][$posa]= $cellule[0];
          $_SESSION['elevemoy2'][$posa]= $cellule[2];
          $_SESSION['elevemoy3'][$posa]= $cellule[4];
          $_SESSION['eleverg1'][$posa]= $cellule[1];
          $_SESSION['eleverg2'][$posa]= $cellule[3];
          $_SESSION['eleverg3'][$posa]= $cellule[5];

           $_SESSION['elevemattri'][$posa]= $donneesZan['matelev'];
           $_SESSION['elevemarktri'][$posa]= $donneesZan['moyan'];
           $_SESSION['elevepostri'][$posa]= $donneesZan['rgan'];

           $_SESSION['elevMCL'][$posa]= $donneesZan['mclan'];
          $_SESSION['elevFM'][$posa]= $donneesZan['maxan'];
          $_SESSION['elevLM'][$posa]= $donneesZan['minan'];
          $_SESSION['elevCPSE'][$posa]= $donneesZan['cpse'];
          $_SESSION['elevANADM'][$posa]= $donneesZan['adm'];
          $_SESSION['elevANPCT'][$posa]= $donneesZan['pctan'];
            $posa++;
         }$reponsZan->closeCursor();
          $_SESSION['effectrim']=$posa-1;
         }

         $effecti=count($_SESSION['elevemattri']);
         $_SESSION['counteleve']=$effecti;

         ?> 

  <section class="content">
      <div class='container-fluid'>
        <div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>

<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertcaltrim.php' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-info'>
<b>Calculer les moyennes du </br> trimestre</b>
</div> 
</div></a></div>


<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a class='nav-link' type='button' data-toggle='modal' data-target='#rechercher' data-filter='2'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-primary'>
<b>Afficher les bulletins du</br> trimestre</b>
</div> 
</div></a></div>
<?php  echo "<div class='modal fade' id='rechercher'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Afficher les bulletins du trimestre</h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php    
                
                    if($_SESSION['trimcalcul']==3){  
                    echo" <form  method='POST' action='insertvubullanmod.php' name='paiem'>";
                  }
                  if($_SESSION['trimcalcul']!=3){  
                    echo" <form  method='POST' action='insertvubulltrimod.php' name='paiem'>";
                  }
                ?>  
                  
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Rang</label>
                  <div class="select2-purple">
                    <select name="ordre" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                   <option value="8">Pour tous les élèves</option>
                   <?php  
                    if($effecti<15){
                      $acc='1-'.$effecti;
                      echo "<option value='".$acc."'>du 1er au ".$effecti."ème</option>";
                    }
                    if($effecti>=15){
                      $reste=$effecti%15;
                      $tour=($effecti-$reste)/15;
                      $itera=1;$min=0;
                      while($itera<=$tour){
                        $min=$min+1; $max=$itera*15;
                        $acc=$min.'-'.$max;
                        if($min==1){
                          echo "<option value='".$acc."'>du ".$min."er au ".$max."ème</option>";
                        }
                        if($min!=1){
                          echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                        }
                        $min=$max;
                         $itera++;
                      }
                    }
                    if($reste!=0){
                      $min=$max+1; $max=$max+$reste;
                      $acc=$min.'-'.$max;
                      echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                    }
                    ?>
                    
                     
                    </select>
                </div> </br>
<label for="exampleInputPassword1">Modèl</label>
                  <div class="select2-purple">
                    <select name="model" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                   <option value="1">Système par séquence</option>
                   <option value="2">Système par compétence-mode 1</option>
                   <option value="3">Système par compétence-mode 2</option>
                    </select>
                </div> </br>

                                <div class="card-footer"><div class='btn-group w-100 mb-2'>
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  </div>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
  </br></br>
      
     

              <?php    
                
                if($_SESSION['trimcalcul']==3){  
                echo" <form  method='POST' action='insertvubullanelevmod.php' name='paiem'>";
              }
              if($_SESSION['trimcalcul']!=3){  
                echo" <form  method='POST' action='insertvubulltrimelevmod.php' name='paiem'>";
              }
            ?>  
              
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Afficher les bulletins du trimestre par elève</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Noms</label>
                  <div class="select2-purple">
                    <select name="matri" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php    
                       $v="SELECT matelev,nomelev,preelev,anelev FROM  eleve WHERE anelev='".$_SESSION['ancalcul']."' 
       AND niveauelev='".$_SESSION['clascalcul']."'   ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$i=1;   
while ($donnees = $reponse->fetch())
{
 $mazt=$donnees['matelev'];
 echo "<option value='".$mazt."'>".$donnees['nomelev']." ".$donnees['preelev']."</option>" ;

} 
$reponse->closeCursor();
  ?>
                    </select>
                </div> </br>
<label for="exampleInputPassword1">Modèl</label>
                  <div class="select2-purple">
                    <select name="model" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                   <option value="1">Système par séquence</option>
                   <option value="2">Système par compétence-mode 1</option>
                   <option value="3">Système par compétence-mode 2</option>
                    </select>
                </div> </br>

                                <div class="card-footer"><div class='btn-group w-100 mb-2'>
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button></div>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            </br></br>
           
  
  </div>

<form  method='POST' action='insertvulescompev.php' name='paiem'>
  <div class="card-footer"><div class='btn-group w-100 mb-2'>
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher les compétences évaluées </br>pour le "système par compétence-mode 2"</button> 
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
    </div></div></form> </br></br></br></br>

      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvumoytrim.php?vu=0' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-success'>
<b>Afficher les moyennes du </br>trimestre</b>
</div> 
</div></a></div>








         </div>
         </div>
        </div>
      </div>
  </section>





<section class="content">
      <div class='container-fluid'>
        <div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>


  <div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvupvtrim.php' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-danger'>
<b>Afficher les procès verbaux </br>du trimestre</b>
</div> 
</div></a></div>


<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvustatrim.php' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-info'>
<b>Afficher les statistiques </br>du trimestre</b>
</div> 
</div></a></div>






<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a class='nav-link' type='button' data-toggle='modal' data-target='#recherche2' data-filter='2'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-primary'>
<b>Afficher les bulletins des</br> évaluations</b>
</div> 
</div></a></div>
<?php  echo "<div class='modal fade' id='recherche2'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Afficher les bulletins des évaluations </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
  
      
                
                    
              <form  method="POST" action="insertvubulleva.php" name="paiem">
                  <label for="exampleInputPassword1">Evaluation</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                     $listeval=" ";

                    
                        echo " <option value='1' >N° 1 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                          echo " <option value='2' >N° 2 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                             echo " <option value='3' >N° 3 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                    

                    ?>
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Rang</label>
                  <div class="select2-purple">
                    <select name="ordre" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option value="8">Pour tous les élèves</option><!--option value="1">Du 1er au 15ème</option><option value="2">Du 16ème au 30ème</option>
                    <option value="3">Du 31ème au 45ème</option><option value="4">Du 46ème au 60ème</option>
                    <option value="5">Du 61ème au 75ème</option><option value="6">Du 76ème au 90ème</option>
                    <option value="7">Du 91ème au 105ème</option--> 
                     
                    </select>
                </div> </br>


                                <div class="card-footer">
                 <div class='btn-group w-100 mb-2'> <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                 </div>
                 
                </div>
              </form>     
                 
                      
  </br></br>
      
     

              <form  method="POST" action="insertvubullevaelev.php" name="paiem">
                  <label for="exampleInputPassword1">Afficher les bulletins des évaluations par élève</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                     echo " <option value='1' >N° 1 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                          echo " <option value='2' >N° 2 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                             echo " <option value='3' >N° 3 du TRIM ".$_SESSION['trimcalcul']."</option> ";
                    
                    ?>
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Noms</label>
                  <div class="select2-purple">
                    <select name="matri" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php    
                       $v="SELECT matelev,nomelev,preelev,anelev FROM  eleve WHERE anelev='".$_SESSION['ancalcul']."' 
       AND niveauelev='".$_SESSION['clascalcul']."'   ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$i=1;   
while ($donnees = $reponse->fetch())
{
 $mazt=$donnees['matelev'];
 echo "<option value='".$mazt."'>".$donnees['nomelev']." ".$donnees['preelev']."</option>" ;

} 
$reponse->closeCursor();
  ?>
                    </select>
                </div> </br>


                                <div class="card-footer">
                <div class='btn-group w-100 mb-2'>  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                 </div>
                 
                </div>
              </form>
            </br></br></br></br>



  
  </div>
      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->









          </div>
         </div>
        </div>
      </div>
  </section>








<section class="content">
      <div class='container-fluid'>
        <div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>


  <div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvumoyan.php?vu=0' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-success'>
<b>Afficher les moyennes </br>annuelles </b>
</div> 
</div></a></div>


<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvumoytrim.php' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-danger'>
<b>Afficher les statistiques </br>annuelles</b>
</div> 
</div></a></div>



<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
            <a href='insertvustatetab.php' class='nav-link'>
             <div class='card bg-light d-flex flex-fill'>
                 <div class='btn btn-warning'>
<b>Afficher les statistiques </br>de l'établissement</b>
</div> 
</div></a></div>





  </div>
         </div>
        </div>
      </div>
  </section>






<section class="content">
      <div class="container-fluid">

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><b>
                  <?php  if($_SESSION['trimcalcul']!=3){
                    echo "Aperçu des resultats du trimestre";
                    $moy08=$nb08; 
                     $moy810=$nb810; 
                     $moy1012=$nb1012; 
                      $moy1220=$nb1220;
                      $total=$nb08+$nb810+$nb1012+$nb1220;
                  }  
                  if($_SESSION['trimcalcul']==3){
                    echo "Aperçu des resultats sur l'année scolaire";
                     $moy08=$nb08; 
                     $moy810=$nb810; 
                     $moy1012=$nb1012; 
                      $moy1220=$nb1220;
                      $total=$nb08+$nb810+$nb1012+$nb1220;
                  }  

                  
                  ?>
                
                </b></h5>

                <!--div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong> </strong>
                    </p>

                    <!-- debut montant-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"><b> </b></h3>
                   
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                   
                   
                </div>
                <!-- /.d-flex -->
<?php 
$pg08=" ";
$pg810=" ";
$pg1012=" ";
$pg1220=" ";
if($total>0){ 
$pg08=($moy08*100)/$total;
$pg810=($moy810*100)/$total;
$pg1012=($moy1012*100)/$total;
$pg1220=($moy1220*100)/$total;
}
     echo "<div class='progress-group'>
                   <b> Nombre de moyenne inférieure à 8</b></br>
                      <span class='float-right'><b>".$moy08."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-danger' style='width: ".$pg08."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";
echo "<div class='progress-group'>
                   <b> Nombre de moyenne allant de 8 et inférieure à 10</b></br>
                      <span class='float-right'><b>".$moy810."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-warning' style='width: ".$pg810."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";  
echo "<div class='progress-group'>
                   <b> Nombre de moyenne allant de 10 et inférieure à 12</b></br>
                      <span class='float-right'><b>".$moy1012."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-primary' style='width: ".$pg1012."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";  
echo "<div class='progress-group'>
                   <b> Nombre de moyenne supérieure ou égale à 12</b></br>
                      <span class='float-right'><b>".$moy1220."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-warning' style='width: ".$pg1220."%'></div>
                      </div>
                    </div>
                    <!-- /.progress-group --> ";                 
              ?>     
                  

              </div>
            </div>
            <!-- /.card -->
          </div>
           <!-- fin montant-->
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>
                      <?php  if($_SESSION['trimcalcul']!=3){
                    echo "Les 5 premier(e)s du trimestre";
                    
                  }  
                  if($_SESSION['trimcalcul']==3){
                    echo "Les 5 premier(e)s  sur l'année scolaire";
                      
                  }  

                  
                  ?>  
                      
                      </strong>
                    </p>
                     
<?php $count=count($_SESSION['elevemattri']);
if($count>0){
  $rt=1; $vrg=1;
  while($rt<=$count AND $vrg<=5){
       $datenschuler=datenschuler($_SESSION['elevemattri'][$rt],$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
    $progres=($_SESSION['elevemarktri'][$rt]*100)/20;
   echo "<div class='progress-group'>
                   <b> ".$vrg.". ".$nom." ".$prenom."</b></br>
                      <span class='float-right'><b>".$_SESSION['elevemarktri'][$rt]."/20</b></span>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-primary' style='width: ".$progres."%'></div>
                      </div>
                    </div>
                    <!-- /.progress-group --></br> ";
    $rt++; $vrg++;
  }
}
  ?>                  

                     


                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
               
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



 



</div>
  </section>



 
    <!-- /.content -->
   </br></br></br></br>
  <!-- /.content-wrapper -->
 
  <!-- Main Footer -->
  <footer class="main-footer">
  <div class="btn-group w-100 mb-2">
       <?php  
     $msg="AGAES";
     $mcours=date('m');
     if($mcours==12){  $msg="Joyeux noel à vous !";}
      echo "
      <a class='btn btn-success' href='#' data-filter='3'><small>".$msg."</small></a>
       ";
      
  
     
     ?>
                       
    </div>
    <strong> </strong>  
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







<script>
    $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true
var moy08=document.getElementById("n08").value; 
var moy810=document.getElementById("n810").value;
var moy1012=document.getElementById("n1012").value;
var moy1220=document.getElementById("n1220").value;  
             
var $salesChart1 = $('#sales-chart1')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart1, {
    type: 'bar',
    data: {
      labels: ['JAN', 'FEV', 'MARS', 'AVR', 'MAI', 'JUIN', 'JUI','AOUT', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: 'blue',
          borderColor: 'blue',
          data: [moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220]
        },
        {
          backgroundColor: 'gray',
          borderColor: 'gray',
          data: [moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220]
        },
        {
          backgroundColor: 'green',
          borderColor: 'green',
          data: [moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220]
        },
        {
          backgroundColor: 'red',
          borderColor: 'red',
          data: [moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220,moy08,moy810,moy1012,moy1220]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
           /*   if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
            */
             //return '$' + value
            return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })


 



 





 





  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type: 'line',
        data: [100, 120, 170, 167, 180, 177, 160],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type: 'line',
        data: [60, 80, 70, 67, 80, 77, 100],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
})


</script>







</body>
</html>
<?php }   ?>