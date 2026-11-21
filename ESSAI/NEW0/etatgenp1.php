<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'salaireoutil.php'; require 'pointagefonction.php'; require '../listabrvtype.php'; 
 
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
OR $_SESSION['code']==2 OR $_SESSION['code']==7
OR $_SESSION['code']==4 OR $_SESSION['code']==3 OR $_SESSION['code']==5) ){ 
  

  $_SESSION['engpointi']=0;
  $_SESSION['reqpointsal']="SELECT * FROM salaire WHERE an='".$_SESSION['annee']."'  ORDER BY datep DESC";
  $_SESSION['engsalaire']=0; 
  $_SESSION['modifsalaire']=0;
  $_SESSION['supsalaire']=0;
  $_SESSION['engpointsal']=0;
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

   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  
   <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 <!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    
 
  <script>
	 



         function detail(str){
             if(str==" "){
                 document.getElementById("detail").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("detail").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","pointageajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }



  </script>




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
    </a> </center> 

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
            <h1 class="m-0">ETAT DES FINANCES </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              
            </ol>
          </div><!-- /.col -->

          <div class="col-sm-6">
          

          <form action='etatgendir.php'  method='POST'>
          <div class='callout callout-primary'>
<b>

<div class='btn-group w-100 mb-2'>
<button type='submit' name='p1' style='width: 100%; height: 5%;' class='btn btn-secondary'>Enseig. Commercial</button>                 
<button type='submit' name='p2' style='width: 100%; height: 5%;' class='btn btn-success'>Enseig. Général</button>                  
</div> 
<div class='btn-group w-100 mb-2'>
<button type='submit' name='p3' style='width: 100%; height: 5%;' class='btn btn-warning'>Enseig. Industriel</button>                  
<button type='submit' name='p4' style='width: 100%; height: 5%;' class='btn btn-danger'>Enseig. Anglophone</button>                  
</div>  
<div class='btn-group w-100 mb-2'>
<button type='submit' name='p5' style='width: 100%; height: 5%;' class='btn btn-info active'>Toutes les sections</button>                  
</div>   
        
</b> 
 </div></form>   

          </div>
          
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
 <!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
  <?php  if($_SESSION['engpointage']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Paiement enregistré(e)</i></br>
                  </br>
                  <?php  echo $_SESSION['msgengpointage'];   ?> </h5>
    </div>
     <?php $_SESSION['engpointage']=0; } ?>

     <?php  if($_SESSION['engpointage']==2){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Paiement non enregistré(e)</i></br>
                  </br>
                  <?php  echo $_SESSION['msgengpointage'];   ?> </h5>
    </div>
     <?php $_SESSION['engpointage']=0; } ?>

     <?php  if($_SESSION['modifpointage']==2){ ?>
  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle">Non modifié. </i>
                  </br>
                  <?php  echo $_SESSION['msgmodifpointage'];   ?>
                </h5>
    </div>
     <?php   $_SESSION['modifpointage']=0; } ?>
 

     <?php  if($_SESSION['modifpointage']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Modifié  avec succès</i></br>
                  <?php  echo $_SESSION['msgmodifpointage'];   ?></h5>
    </div>
     <?php  $_SESSION['modifpointage']=0; } ?>
 
     <?php  if($_SESSION['suppointage']==1){ ?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Paiement  supprimé(e)</i>
                  </br>
                  <?php  echo $_SESSION['msgsuppointage'];   ?></h5>
    </div>
     <?php  $_SESSION['suppointage']=0; } ?>

     

      
  <H4 style='color : purple'><B>Enseignement Commercial</B></H4> 
 
  <div class="row">
  
   </br>   </br></br>
           </div>
           </br>
           <div class="row">
          
     
       
        </div> 
        
           </br>

           
           <?php 
   $DATE=date('Y-m-d');
           
 
  ?>   

  </div>
    <!-- /.modal-content -->
 
    <!-- /.content -->
     
  </div>
  <!-- /.content-wrapper -->
  <div id="suchen"> 

  </div>
  <div class="card card-solid">
  <div class="card-body">
   <div class="row">
   <?php  
 
 $_SESSION['annee1']=substr($_SESSION['annee'],0,4);
 $_SESSION['annee2']=substr($_SESSION['annee'],5,4);
 $Niveauelev=array();
 $Fraishors=array();
 $REmise=array();
 $montant=array();
 $DAte=array();
 $IDempl=array();
 $TYPerem=array();
 $SORtieM=array(); $SORtieD=array(); $SORtieidem=array();
 $SALM=array(); $AUTREPM=array(); $AUTREPD=array(); $SALD=array(); $SALidem=array();
 $EXAMM=array(); $EXAMD=array(); $EXAMidem=array();
 $ALLDATE=array();
 $alld=0;
 function datexist($tab,$date){
  $to=0;$i=0;
  $len=count($tab);
  while($i<$len AND $to==0){
       if($tab[$i]==$date){
          $to=1;
       }
       $i++;
     }
 
   return  $to;
  }

 $vt="SELECT id,niveauelev,anelev,cout,reste  FROM eleve WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
 $reponset = $bdda->query($vt);
 $coutall=0;$resteall=0;
while ($donneest = $reponset->fetch())
{
    $typens=TYPENS($donneest['niveauelev'],$_SESSION['annee']);
  if($typens==2){
    $coutall+=$donneest['cout'];
    $resteall+=$donneest['reste'];
  }
   
} 
$reponset->closeCursor();


$v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
if(isset($_POST['tria'])){
  $du=$_POST['du'];
  $au=$_POST['au'];
  $user=$_POST['user'];
  if($du=='a'){
    if($user=='a'){
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($user!='a'){
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['annee']."' AND idempl='".$user."'  ORDER BY id";
     }
  }
  if($du!='a'){
    if($au=='a' AND $user=='a'){
      $v="SELECT *  FROM detail  WHERE date='".$du."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au=='a' AND $user!='a'){
      $v="SELECT *  FROM detail  WHERE date='".$du."' AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user=='a'){
      $v="SELECT *  FROM detail  WHERE date>='".$du."' AND  date<='".$au."'  AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user!='a'){
      $v="SELECT *  FROM detail  WHERE date>='".$du."' AND  date<='".$au."'  AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
  }
}
$reponse = $bdda->query($v);
$no=0;
while ($donnees = $reponse->fetch())
{
    $typens=TYPENS($donnees['niveauelev'],$_SESSION['annee']);
    if($typens==2){
   $Niveauelev[$no]=$donnees['niveauelev'];
   
   $Fraishors[$no]=$donnees['frais'];
   $REmise[$no]=$donnees['remise'];
   $montant[$no]=$donnees['montant'];
   $DAte[$no]=$donnees['date'];  
   $IDempl[$no]=$donnees['idempl']; 
   $TYPerem[$no]=$donnees['typerem'];  
   $vv=datexist($ALLDATE,$donnees['date']);  
    if($vv==0){
      $ALLDATE[$alld]=$donnees['date'];
      $alld++;
    }  
   $no++;  
 } 
} 
$reponse->closeCursor();  

$vb="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
$reponseb = $bdda->query($vb);
while ($donneesb = $reponseb->fetch())
{ 
    $typens=TYPENS($donneesb['niveauelev'],$_SESSION['annee']);
    if($typens==2){
   $vv=datexist($ALLDATE,$donneesb['date']);  
    if($vv==0){
      $ALLDATE[$alld]=$donneesb['date'];
      $alld++;
    }   
} 
} 
$reponseb->closeCursor();  



$v="SELECT *  FROM autrepayefrais WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
 
if(isset($_POST['tria'])){
 $du=$_POST['du'];
 $au=$_POST['au'];
 $user=$_POST['user'];
 if($du=='a'){
   if($user=='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
    }
    if($user!='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE  anelev='".$_SESSION['annee']."' AND idempl='".$user."'  ORDER BY id";
    }
 }
 if($du!='a'){
   if($au=='a' AND $user=='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE date='".$du."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
    }
    if($au=='a' AND $user!='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE date='".$du."' AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
    }
    if($au!='a' AND $user=='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE date>='".$du."' AND  date<='".$au."'  AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
    }
    if($au!='a' AND $user!='a'){
     $v="SELECT *  FROM autrepayefrais  WHERE date>='".$du."' AND  date<='".$au."'  AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
    }
 }
}

$reponse = $bdda->query($v);
$nxautr=0;
while ($donnees = $reponse->fetch())
{
  $typens=TYPENS(Classe($bdda,$donnees['matelev'],$_SESSION['annee']),$_SESSION['annee']);
    if($typens==2){ 
 $AUTREPM[$nxautr]=$donnees['montant'];
  $AUTREPD[$nxautr]=$donnees['date'];  
  $AUTREPidem[$nxautr]=$donnees['idempl']; 
  $vv=datexist($ALLDATE,$donnees['date']); 
   
  if($vv==0){
    $ALLDATE[$alld]=$donnees['date'];
    $alld++;
  }  
   $nxautr++;  
  } 
} 
$reponse->closeCursor();

$vm="SELECT *  FROM autrepayefrais WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
$reponser = $bdda->query($vm);
while ($donneesr = $reponser->fetch())
{
$vv=datexist($ALLDATE,$donneesr['date']);  
 if($vv==0){
   $ALLDATE[$alld]=$donneesr['date'];
   $alld++;
 }  
} 
$reponser->closeCursor();



 $v="SELECT *  FROM exam WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
 
 if(isset($_POST['tria'])){
  $du=$_POST['du'];
  $au=$_POST['au'];
  $user=$_POST['user'];
  if($du=='a'){
    if($user=='a'){
      $v="SELECT *  FROM exam  WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($user!='a'){
      $v="SELECT *  FROM exam  WHERE  anelev='".$_SESSION['annee']."' AND idempl='".$user."'  ORDER BY id";
     }
  }
  if($du!='a'){
    if($au=='a' AND $user=='a'){
      $v="SELECT *  FROM exam  WHERE date='".$du."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au=='a' AND $user!='a'){
      $v="SELECT *  FROM exam  WHERE date='".$du."' AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user=='a'){
      $v="SELECT *  FROM exam  WHERE date>='".$du."' AND  date<='".$au."'  AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user!='a'){
      $v="SELECT *  FROM exam  WHERE date>='".$du."' AND  date<='".$au."'  AND idempl='".$user."' AND  anelev='".$_SESSION['annee']."'  ORDER BY id";
     }
  }
}
 $reponse = $bdda->query($v);
 $nxb=0;
while ($donnees = $reponse->fetch())
{
    $typens=TYPENS($donnees['niveauelev'],$_SESSION['annee']);
    if($typens==2){
  $EXAMM[$nxb]=$donnees['montant'];
  $EXAMD[$nxb]=$donnees['date'];  
  $EXAMidem[$nxb]=$donnees['idempl']; 
    $vv=datexist($ALLDATE,$donnees['date']);  
    if($vv==0){
      $ALLDATE[$alld]=$donnees['date'];
      $alld++;
    }
    $nxb++;  
} 
} 
$reponse->closeCursor();

$vb="SELECT *  FROM exam WHERE  anelev='".$_SESSION['annee']."'  ORDER BY id";
$reponseb = $bdda->query($vb);
while ($donneesb = $reponseb->fetch())
{
    $typens=TYPENS($donneesb['niveauelev'],$_SESSION['annee']);
    if($typens==2){
    $vv=datexist($ALLDATE,$donneesb['date']);  
    if($vv==0){
      $ALLDATE[$alld]=$donneesb['date'];
      $alld++;
    }  
}
} 
$reponseb->closeCursor();




 $v="SELECT *  FROM salaire WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
 
 if(isset($_POST['tria'])){
  $du=$_POST['du'];
  $au=$_POST['au'];
  $user=$_POST['user'];
  if($du=='a'){
    if($user=='a'){
      $v="SELECT *  FROM salaire  WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($user!='a'){
      $v="SELECT *  FROM salaire  WHERE  an='".$_SESSION['annee']."' AND idempl='".$user."'  ORDER BY id";
     }
  }
  if($du!='a'){
    if($au=='a' AND $user=='a'){
      $v="SELECT *  FROM salaire  WHERE datep='".$du."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au=='a' AND $user!='a'){
      $v="SELECT *  FROM salaire  WHERE datep='".$du."' AND idempl='".$user."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user=='a'){
      $v="SELECT *  FROM salaire  WHERE datep>='".$du."' AND  datep<='".$au."'  AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user!='a'){
      $v="SELECT *  FROM salaire  WHERE datep>='".$du."' AND  datep<='".$au."'  AND idempl='".$user."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
  }
}

 $reponse = $bdda->query($v);
 $nxi=0;
while ($donnees = $reponse->fetch())
{
  $SALM[$nxi]=$donnees['montant'];
   $SALD[$nxi]=$donnees['datep'];  
   $SALidem[$nxi]=$donnees['idempl']; 
   $vv=datexist($ALLDATE,$donnees['datep']);  
   if($vv==0){
     $ALLDATE[$alld]=$donnees['datep'];
     $alld++;
   }  
    $nxi++;   
} 
$reponse->closeCursor();

$vb="SELECT *  FROM salaire WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
$reponseb = $bdda->query($vb);
while ($donneesb = $reponseb->fetch())
{
$vv=datexist($ALLDATE,$donneesb['datep']);  
  if($vv==0){
    $ALLDATE[$alld]=$donneesb['datep'];
    $alld++;
  }  
} 
$reponseb->closeCursor();


 $v="SELECT *  FROM sortie WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
 if(isset($_POST['tria'])){
  $du=$_POST['du'];
  $au=$_POST['au'];
  $user=$_POST['user'];
  if($du=='a'){
    if($user=='a'){
      $v="SELECT *  FROM sortie  WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($user!='a'){
      $v="SELECT *  FROM sortie  WHERE  an='".$_SESSION['annee']."' AND idempl='".$user."'  ORDER BY id";
     }
  }
  if($du!='a'){
    if($au=='a' AND $user=='a'){
      $v="SELECT *  FROM sortie  WHERE date='".$du."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au=='a' AND $user!='a'){
      $v="SELECT *  FROM sortie  WHERE date='".$du."' AND idempl='".$user."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user=='a'){
      $v="SELECT *  FROM sortie  WHERE date>='".$du."' AND  date<='".$au."'  AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
     if($au!='a' AND $user!='a'){
      $v="SELECT *  FROM sortie  WHERE date>='".$du."' AND  date<='".$au."'  AND idempl='".$user."' AND  an='".$_SESSION['annee']."'  ORDER BY id";
     }
  }
}
 $reponse = $bdda->query($v);
 $nx=0;
while ($donnees = $reponse->fetch())
{
   $SORtieM[$nx]=$donnees['total'];
    $SORtieD[$nx]=$donnees['date'];  
    $SORtieidem[$nx]=$donnees['idempl']; 
    
    $nx++;   
} 
$reponse->closeCursor(); 

$vb="SELECT *  FROM sortie WHERE  an='".$_SESSION['annee']."'  ORDER BY id";
$reponseb = $bdda->query($vb);
while ($donneesb = $reponseb->fetch())
{
  
   $vv=datexist($ALLDATE,$donneesb['date']);  
   if($vv==0){
     $ALLDATE[$alld]=$donneesb['date'];
     $alld++;
   }  
} 
$reponseb->closeCursor(); 


function examducumois($montant,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois){
          $to+=$montant[$i];
       }
     }
  }
   return  $to;
  }

function salaireducumois($montant,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois){
          $to+=$montant[$i];
       }
     }
  }
   return  $to;
  }


function sortieducumois($montant,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois){
          $to+=$montant[$i];
       }
     }
  }
   return  $to;
  }
//fraisndeducumois
function fraisndeducumois($montant,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois){
          $to+=$montant[$i];
       }
     }
  }
   return  $to;
  }
function fraisdeducumois($montant,$frais,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois AND $frais[$i]!=" "){
          $to+=$frais[$i];
       }
     }
  }
   return  $to;
  }
 function remisemois($montant,$remise,$date,$imois){
    $to=0;
    $len=count($montant);
    if($len>0){
       for($i=0;$i<$len;$i++){
         $datum=$date[$i];
         $pdate=substr($datum,0,7);
         if($pdate==$imois AND $remise[$i]=="OUI"){
            $to+=$montant[$i];
         }
       }
    }
    return  $to;
 }
 
  
 
  function scorecumois($montant,$remise,$date,$imois){
  $to=0;
  $len=count($montant);
  if($len>0){
     for($i=0;$i<$len;$i++){
       $datum=$date[$i];
       $pdate=substr($datum,0,7);
       if($pdate==$imois AND $remise[$i]!="OUI"){
          $to+=$montant[$i];
       }
     }
  }
   return  $to;
  }
   
  $scorec=0;
$remisem=0;
$examm=0;
$fraisdeducum=0;
$fraisndeducum=0;
$salaireducum=0;
$sortieducum=0;
$diffa=0;
 
 // echo scorecumois($montant,$REmise,$DAte,"06")." ".nomdevise('1') ;
   echo "     
   <form action='etatgenp1.php' method='POST'> "; 
   

   echo "<div class='btn-group w-100 mb-2'>";
   
   echo "<B>Du</B> : <select name='du'   class='select2' data-placeholder='Choisir' data-dropdown-css-class='select2-purple' style='width: 100%;'>
   ";
   echo "<option value='a'>jj/mm/aaaa</option>";
$ji=0;
   while($ji<$alld){
    echo "<option value='".$ALLDATE[$ji]."'>".format($ALLDATE[$ji])."</option>";
 $ji++;
   }
   echo"</select>";
     
   
   echo "<B>Au</B> : <select name='au'   class='select2' data-placeholder='Choisir' data-dropdown-css-class='select2-purple' style='width: 100%;'>
   ";
   echo "<option value='a'>jj/mm/aaaa</option>";
$ji=$alld-1;
   while($ji>=0){
    echo "<option value='".$ALLDATE[$ji]."'>".format($ALLDATE[$ji])."</option>";
 $ji--;
   }
   echo"</select>"; 
   
   echo "<B>Utilisateurs</B> : <select name='user'   class='select2' data-placeholder='Choisir' data-dropdown-css-class='select2-purple' style='width: 100%;'>
   ";
   echo "<option value='a'>Tous les utilisateurs</option>";
   $xvai="SELECT DISTINCT idadmin FROM admin_poste WHERE 
   sup='0'  AND anens='".$_SESSION['annee']."' AND (idposte='1' OR idposte='4')   " ;
   $reponsexai= $bdda->query($xvai);
   while ($donneesxai= $reponsexai->fetch() )
     { 
      echo " 
      <option value='".$donneesxai['idadmin']."'>
      ".nomC($donneesxai['idadmin'])." 
      </option> ";
     }
     $reponsexai->closeCursor(); 
   echo"</select>"; 
    echo "</div>"; 

    echo "<div class='btn-group w-100 mb-2'>
    <button type='submit' name='tria' style='width: 100%; height: 5%;' class='btn btn-info active'>OK</button>                  
    </div>"; 

   echo "</form>";
   echo  "<table border='3'  class='table table-head-fixed text-nowrap table-hover'> 
            <thead>   
  <tr bgcolor='#70DBDB'><td><B>Mois</B></td>
  <td><B>SCOLARITE </Br>NETTE RECU </B></td>
  <td><B>LES REMISES </Br>EFFECTUEES </B></td> 
  <td><B>FRAIS DIVERS </Br>DEDUCTIBLES A </Br>L'INSCRIPTION</B></td>
  <td><B>FRAIS DIVERS </Br>NON DEDUCTIBLES A</Br> L'INSCRIPTION</B></td>
  <td><B>FRAIS </Br>DES EXAMENS</B></td>  
  <td><B>SOLDE</B></td>
  </tr> </thead>";
  
   
  echo "  <tr> 
  <td><B>JANVIER ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-01");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-01");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-01");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-01");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-01");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-01");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-01");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 

echo "  <tr> 
  <td><B>FEVRIER ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-02");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-02");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-02");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-02");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-02");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-02");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-02");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>MARS ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-03");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-03");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-03");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-03");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-03");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-03");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-03");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>AVRIL ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-04");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-04");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-04");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-04");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-04");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-04");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-04");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>MAI ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-05");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-05");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-05");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-05");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-05");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-05");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-05");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>JUIN ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-06");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-06");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-06");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-06");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-06");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-06");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-06");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>JUILLET ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-07");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-07");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-07");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-07");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-07");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-07");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-07");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;


  echo "  <tr> 
  <td><B>AOUT ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-08");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-08");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-08");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-08");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-08");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-08");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-08");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>SEPTEMBRE ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-09");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-09");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-09");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-09");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-09");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-09");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-09");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>OCTOBRE ".$_SESSION['annee1']." </B></td> 
  
";
$examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-10");
$scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-10");
$remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-10");
$fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-10");
$fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-10");
$salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-10");
$sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-10");
$diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
echo"
<td><B>".$scorecumois." ".nomdevise('1')."</B></td>
<td><B>".$remisemois." ".nomdevise('1')."</B></td>
<td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
<td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
<td><B>".$examcumois." ".nomdevise('1')."</B></td>
";

echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
$scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>NOVEMBRE ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-11");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-11");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-11");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-11");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-11");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-11");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-11");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>DECEMBRE ".$_SESSION['annee1']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee1']."-12");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee1']."-12");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee1']."-12");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee1']."-12");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee1']."-12");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee1']."-12");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee1']."-12");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff; 
 
 

echo "  <tr> 
  <td><B>JANVIER ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-01");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-01");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-01");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-01");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-01");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-01");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-01");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>FEVRIER ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-02");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-02");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-02");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-02");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-02");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-02");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-02");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>MARS ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-03");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-03");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-03");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-03");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-03");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-03");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-03");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>AVRIL ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-04");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-04");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-04");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-04");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-04");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-04");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-04");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>MAI ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-05");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-05");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-05");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-05");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-05");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-05");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-05");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>JUIN ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-06");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-06");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-06");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-06");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-06");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-06");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-06");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;

echo "  <tr> 
  <td><B>JUILLET ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-07");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-07");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-07");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-07");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-07");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-07");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-07");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;


  echo "  <tr> 
  <td><B>AOUT ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-08");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-08");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-08");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-08");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-08");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-08");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-08");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
   
   ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
  
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>SEPTEMBRE ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-09");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-09");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-09");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-09");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-09");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-09");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-09");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>OCTOBRE ".$_SESSION['annee2']." </B></td> 
  
";
$examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-10");
$scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-10");
$remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-10");
$fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-10");
$fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-10");
$salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-10");
$sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-10");
$diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
echo"
<td><B>".$scorecumois." ".nomdevise('1')."</B></td>
<td><B>".$remisemois." ".nomdevise('1')."</B></td>
<td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
<td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
<td><B>".$examcumois." ".nomdevise('1')."</B></td>
";

echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
$scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>NOVEMBRE ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-11");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-11");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-11");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-11");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-11");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-11");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-11");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
  echo "  <tr> 
  <td><B>DECEMBRE ".$_SESSION['annee2']." </B></td> 
  ";
  $examcumois=examducumois($EXAMM,$EXAMD,$_SESSION['annee2']."-12");
  $scorecumois=scorecumois($montant,$REmise,$DAte,$_SESSION['annee2']."-12");
  $remisemois=remisemois($montant,$REmise,$DAte,$_SESSION['annee2']."-12");
  $fraisdeducumois=fraisdeducumois($montant,$Fraishors,$DAte,$_SESSION['annee2']."-12");
 $fraisndeducumois= fraisndeducumois($AUTREPM,$AUTREPD,$_SESSION['annee2']."-12");
 $salaireducumois=salaireducumois($SALM,$SALD,$_SESSION['annee2']."-12");
 $sortieducumois=sortieducumois($SORtieM,$SORtieD,$_SESSION['annee2']."-12");
 $diff=$scorecumois+$fraisdeducumois+$examcumois+$fraisndeducumois;
  echo"
  <td><B>".$scorecumois." ".nomdevise('1')."</B></td>
  <td><B>".$remisemois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisdeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$fraisndeducumois." ".nomdevise('1')."</B></td>
  <td><B>".$examcumois." ".nomdevise('1')."</B></td>
  ";

  echo "<td><B>".$diff." ".nomdevise('1')."</B></td></tr> ";
  $scorec+=$scorecumois;
$examm+=$examcumois; $remisem+=$remisemois; 
$fraisdeducum+=$fraisdeducumois;
$fraisndeducum+=$fraisndeducumois; 
$salaireducum+=$salaireducumois;
$sortieducum+=$sortieducumois;
$diffa+=$diff;
     
echo "  <tr> 
<td><B>TOTAUX </B></td> 

";

echo"
<td><B>".$scorec." ".nomdevise('1')."</B></td>
<td><B>".$remisem." ".nomdevise('1')."</B></td>
<td><B>".$fraisdeducum." ".nomdevise('1')."</B></td>
<td><B>".$fraisndeducum." ".nomdevise('1')."</B></td>
<td><B>".$examm." ".nomdevise('1')."</B></td>


 ";

echo "<td><B>".$diffa." ".nomdevise('1')."</B></td></tr> ";
  echo "  </table> </br> ";


  

 
  ?>







  
    </div> </div> </div> 
  <!-- /.content-wrapper -->
  
  </br> 
  <B>COUTS DE LA SCOLARITE+
    FRAIS DIVERS DEDUCTIBLES A L'INSCRIPTION : <?php  echo $coutall." ".nomdevise('1'); ?></br></B>
    <B>SCOLARITE NETTE+
    FRAIS DIVERS DEDUCTIBLES A L'INSCRIPTION DEJA PERCU: <?php $tt=$scorec+$fraisdeducum; echo $tt." ".nomdevise('1'); ?></br></B>
    <B>RESTE DE LA SCOLARITE A PERCEVOIR : <?php  echo $resteall." ".nomdevise('1'); ?></B></Br>

   </br></br>
 
  
  

  

  <?php  
     echo "<div class='modal fade' id='enregdev'> " ; ?>
     <div class="modal-dialog">
       <div class="modal-content ">
         <div class="modal-header">
           <h4 class="modal-title"><b>Effectuer un pointage des heures des enseignants
</b>
             </h4>
            
           <form action='pointage0.php' method='POST'>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
         <p><div  class="form-group" >
    <label for='exampleInputEmail1'>Choisir une periode</label>
    <div class="select2-purple">
    <select name='idpe'   class='select2'
    data-dropdown-css-class='select2-purple' style='width: 100%;'>";
     
   <?php
    $xv="SELECT * FROM periodesal   ORDER BY id  " ;
    $reponsex= $bdda->query($xv);
    while ($donneesx= $reponsex->fetch() )
      { 
       echo " 
       <option value='".$donneesx['id']."'>
       ".$donneesx['nom'] ."</option> ";
      }
      $reponsex->closeCursor(); 
       ?>
	   </select> </div> 
 </div>  </p>
 
    
              
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
           <button type="submit" name="pointagelog"  class="btn btn-primary">OK</button>
   </form></div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
      
     



<?php  
   echo "<div class='modal fade' id='aide'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Aide</h4>
         
        <form action='ajoutensgenreg.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
           
            <p><div class="form-group">
            <label for="exampleInputEmail1"> 
            Cliquer sur le bouton  vert sur la ligne pour modifier
                       </div>
                   </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">
         Cliquer sur le bouton rouge sur la ligne pour supprimer 
         </label>
            </div> </p>
            <p><div class="form-group">
            <label for="exampleInputEmail1"> 
            Cliquer sur l'espace de recherche pour faire des tris en saisissant une partie 
            des noms des enseignants, une date, ou une periode(saisir 1 pour la periode de septembre à octobre 
            , 2 pour octobre à novembre etc ...)
                       </div>
                   </p>     
      </div>
       </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





 


 



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
<!-- Ion Slider -->
<script src="../plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<!-- AdminLTE for demo purposes -->
 
<!-- Page specific script -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 0,
      max     : 5000,
      from    : 1000,
      to      : 4000,
      type    : 'double',
      step    : 1,
      prefix  : '$',
      prettify: false,
      hasGrid : true
    })
    $('#range_2').ionRangeSlider()

    $('#range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
      type    : 'single',
      step    : 0.1,
      postfix : ' mm',
      prettify: false,
      hasGrid : true
    })
    $('#range_6').ionRangeSlider({
      min     : -50,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    })

    $('#range_4').ionRangeSlider({
      type      : 'single',
      step      : 100,
      postfix   : ' light years',
      from      : 55000,
      hideMinMax: true,
      hideFromTo: false
    })
    $('#range_3').ionRangeSlider({
      type    : 'double',
      postfix : ' miles',
      step    : 10000,
      from    : 25000000,
      to      : 35000000,
      onChange: function (obj) {
        var t = ''
        for (var prop in obj) {
          t += prop + ': ' + obj[prop] + '\r\n'
        }
        $('#result').html(t)
      },
      onLoad  : function (obj) {
        //
      }
    })
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


 