<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php';  
 
if(!empty($_POST['envoi'])){ 
  $_SESSION['util']= $_POST['user'] ;
  $_SESSION['mtp']= $_POST['password'] ;
  $_SESSION['annee']=$_POST['an']; 
}
 
   $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']); 
if($trueadmin!=0){  
$_SESSION['id']=$trueadmin;
$_SESSION['nom']=nomC($bdda,$_SESSION['id']);
$_SESSION['code']= postemaxadmin($bdda,$_SESSION['id'],$_SESSION['annee']);
$_SESSION['genreadmin']=genre_admin($bdda,$_SESSION['id']);
$_SESSION['migrer']=migrer_admin($bdda,$_SESSION['id']);
$_SESSION['cni']=cni_admin($bdda,$_SESSION['id']);
$_SESSION['tel']=tel_admin($bdda,$_SESSION['id']);
$_SESSION['nomfonct']=nom_poste($_SESSION['code'],$_SESSION['genreadmin']);
$DATE=date('Y-m-d');
$_SESSION['reqmiseco']="SELECT *  FROM detail  WHERE date='".$DATE."' AND anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
$_SESSION['reqmisexam']="SELECT *  FROM exam  WHERE  date='".$DATE."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";
 $_SESSION['reqmisesortie']="SELECT *  FROM sortie  WHERE  an='".$_SESSION['annee']."'  ORDER BY date DESC";
 $_SESSION[' reqmiseaut']="SELECT *  FROM autrepayefrais   WHERE  date='".$DATE."' AND  anelev='".$_SESSION['annee']."'  ORDER BY date DESC";     
$_SESSION['reqconfigfrais']="SELECT *  FROM  autrefrais   ORDER BY nom";
$_SESSION['reqconfigremise']="SELECT *  FROM  remise   ORDER BY nom";
$_SESSION['reqpointens']="SELECT * FROM pointage WHERE an='".$_SESSION['annee']."'  ORDER BY datep DESC";
  $_SESSION['reqpointsalad']="SELECT * FROM salaireadmin WHERE an='".$_SESSION['annee']."'  ORDER BY datep DESC";
  $_SESSION['reqaudit']="SELECT *  FROM proofmodifdetail  WHERE anelev='".$_SESSION['annee']."'  ORDER BY id DESC";
?>
<!DOCTYPE html>

<html> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>   </title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
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
  <a href= "menueco.php" class="brand-link">
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
      <?php if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 OR $_SESSION['code']==3){principalcollege();}if($_SESSION['code']==7){secretairecollege();}if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}?>
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> </li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
       
     
        <!-- Small Box (Stat card) -->
       <b>Date du jour : <?php echo date('d.m.Y');








function nbclasse($bdda,$an){
 

     $v="SELECT DISTINCT niveauelev  FROM eleve WHERE anelev='".$an."'";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch())
      {
             $t++;
           
       }
      $reponse->closeCursor();
      return $t;
    }
       
     $nbclasse=nbclasse($bdda,$_SESSION['annee']);  


       function nbeleve($bdda,$an){
 

     $v="SELECT anelev,niveauelev,sexelev,statut  FROM eleve WHERE anelev='".$an."'";
     $reponse = $bdda->query($v);
       $t=0; $anc=0; $new=0; $masc=0; $fem=0;
      while ($donnees = $reponse->fetch())
      {
           if($donnees['statut']=='A'){ $anc++;} if($donnees['statut']=='N'){ $new++;}
           if($donnees['sexelev']=='M'){ $masc++;} if($donnees['sexelev']=='F'){ $fem++;}
             $t++;
           
       }
      $reponse->closeCursor();
      return $t."@".$anc."@".$new."@".$masc."@".$fem;
    }
       $tabi=array(); $nbeleve=nbeleve($bdda,$_SESSION['annee']);  
       $tabi=explode("@",$nbeleve);
     

     function nbenseig($bdda,$an){
 

     $v="SELECT DISTINCT idens  FROM enseigmatclasse WHERE anens='".$an."' AND sup='0'";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch())
      {
             $t++;
           
       }
      $reponse->closeCursor();
      return $t;
    }
       
     $nbenseig=nbenseig($bdda,$_SESSION['annee']); 
     
     
     function nbadmin($bdda,$an){
 

     $v="SELECT DISTINCT idadmin  FROM admin_poste WHERE anens='".$an."' AND sup='0'";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch())
      {
             $t++;
           
       }
      $reponse->closeCursor();
      return $t;
    }
       
     $nbadmin=nbadmin($bdda,$_SESSION['annee']); 


     
       
   
       
       
       ?></b></br></br>  
        <div class='row'>


<div class='col-12 col-sm-6 col-md-3'>
            <div class='info-box'>
              <span class='info-box-icon bg-info elevation-1'><i class='fas fa-cog'></i></span>

              <div class='info-box-content'>
                <span class='info-box-text'>Classes</span>
                <span class='info-box-number'>
                  <?php echo $nbclasse;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class='col-12 col-sm-6 col-md-3'>
            <div class='info-box mb-3'>
              <span class='info-box-icon bg-danger elevation-1'><i class='fas fa-thumbs-up'></i></span>

              <div class='info-box-content'>
                <span class='info-box-text'>Administrateurs</span>
                <span class='info-box-number'><?php echo $nbadmin;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class='clearfix hidden-md-up'></div>

          <div class='col-12 col-sm-6 col-md-3'>
            <div class='info-box mb-3'>
              <span class='info-box-icon bg-success elevation-1'><i class='fas fa-user'></i></span>

              <div class='info-box-content'>
                <span class='info-box-text'>Elèves</span>
                <span class='info-box-number'> <?php echo $tabi[0];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class='col-12 col-sm-6 col-md-3'>
            <div class='info-box mb-3'>
              <span class='info-box-icon bg-warning elevation-1'><i class='fas fa-users'></i></span>

              <div class='info-box-content'>
                <span class='info-box-text'>Enseignant.e.s</span>
                <span class='info-box-number'><?php echo $nbenseig;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


        
       


         
         


           
           

         </div>
        <!-- /.row -->

        
        <!-- =========================================================== -->


 
 <!-- =========================================================== -->



    </br></br> 

   

 

      </div><!-- /.container-fluid -->
    </section>









<section class="content">
      <div class="container-fluid">

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><b>
                  <?php   
                    echo "Statistiques sur les élèves";
                    $nbancien=$tabi[1]; 
                     $nbnew=$tabi[2]; 
                     $nbmasc=$tabi[3]; 
                      $nbfem=$tabi[4];
                      $total=$tabi[0];
                 

                  
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
$pgancien=0;
$pgnew=0;
$pgmasc=0;
$pgfem=0;

 
if($total>0){
$pgancien=($nbancien*100)/$total;
$pgnew=($nbnew*100)/$total;
$pgmasc=($nbmasc*100)/$total;
$pgfem=($nbfem*100)/$total;
 }
     echo "<div class='progress-group'>
                   <b> Anciens élèves</b></br>
                      <span class='float-right'><b>".$nbancien."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-danger' style='width: ".$pgancien."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";
echo "<div class='progress-group'>
                   <b> Nouveaux élèves</b></br>
                      <span class='float-right'><b>".$nbnew."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-warning' style='width: ".$pgnew."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";  
echo "<div class='progress-group'>
                   <b> Elèves du genre masculin</b></br>
                      <span class='float-right'><b>".$nbmasc."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-primary' style='width: ".$pgmasc."%'></div>
                      </div>
                    </div></br></br>
                    <!-- /.progress-group --> ";  
echo "<div class='progress-group'>
                   <b> Elèves du genre feminin</b></br>
                      <span class='float-right'><b>".$nbfem."/".$total."</b></span></br>
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-warning' style='width: ".$pgfem."%'></div>
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
                      <?php  
                    echo "Les 5 derniers paiements";
                    
                    

                  
                  ?>  
                      
                      </strong>
                    </p>
                     
<?php  

    $v="SELECT id,nomelev,preelev,montant,date,niveauelev  FROM detail WHERE anelev='".$_SESSION['annee']."' ORDER BY id DESC";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch() AND $t<5)
      {
        echo "<div class='progress-group'>
                   <b> ".$donnees['nomelev']." ".$donnees['preelev']."</br>
                      <span class='float-right'><b>".$donnees['montant']." FCFA</b></span>
                       ".classparid($bdda,$donnees['niveauelev'] ,$_SESSION['annee'])." / ". $donnees['date'] ." </b>
                    </div>
                    <!-- /.progress-group --></br> ";
             $t++;
           
       }
      $reponse->closeCursor();
     
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







<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                 
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
  <b> Calendrier / Calendar </b>
                    
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
               
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
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
   



  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
 
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var totalanc=document.getElementById("totalancien").value;
    var totalnew=document.getElementById("totalnew").value;
    var totalancgen=document.getElementById("totalanciengen").value;
    var totalnewgen=document.getElementById("totalnewgen").value;
    var totalanccom=document.getElementById("totalanciencom").value;
    var totalnewgcom=document.getElementById("totalnewcom").value;
    var totalancind=document.getElementById("totalancienind").value;
    var totalnewind=document.getElementById("totalnewind").value;
    var totalancang=document.getElementById("totalancienang").value;
    var totalnewang=document.getElementById("totalnewang").value;
   
    var totalgar=document.getElementById("totalgar").value;
    var totalfil=document.getElementById("totalfil").value;

    var filgen=document.getElementById("filgen").value;
    var filcom=document.getElementById("filcom").value;
    var filind=document.getElementById("filind").value;
    var filang=document.getElementById("filang").value;

    var gargen=document.getElementById("gargen").value;
    var garcom=document.getElementById("garcom").value;
    var garind=document.getElementById("garind").value;
    var garang=document.getElementById("garang").value;
    
    var areaChartCanvas = $('#barChart').get(0).getContext('2d')
    var areaChartData = {
      labels  : ['Enseignement géneral', 'Enseignement commercial', 'Enseignement industriel', 'Enseignement anglophone'],
      datasets: [
        {
          label               : 'Anciens',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [totalancgen,totalanccom,totalancind,totalancang]
        },
        {
          label               : 'Nouveaux',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [totalnewgen,totalnewgcom,totalnewind,totalnewang]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

  //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })







    var areaChartCanvas = $('#barChart2').get(0).getContext('2d')
    var areaChartData = {
      labels  : ['Enseignement géneral', 'Enseignement commercial', 'Enseignement industriel', 'Enseignement anglophone'],
      datasets: [
        {
          label               : 'Masculin',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [gargen,garcom,garind,garang]
        },
        {
          label               : 'Féminin',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [filgen,filcom,filind,filang]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
//-------------
    //- BAR CHART2 -
    //-------------
    var barChartCanvas = $('#barChart2').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })






    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
     var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Anciens élèves',
          'Nouveaux élèves',
          
      ],
      datasets: [
        {
          data: [totalanc,totalnew],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


 //-------------
    //- DONUT CHART2 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
        'Féminin',
          'Masculin',
          
          
      ],
      datasets: [
        {
          data: [totalfil,totalgar],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  








    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>







<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });



    /*
       events: [
    {
          title          : ' ',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : ' ',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : ' ',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : ' ',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : ' ',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : ' ',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : ' ',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
  ],
  */
    
    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>





<?php
$an=$_SESSION['annee'];
 
        ?>

 
</body>
</html>
<?php }     ?>




 
 
 