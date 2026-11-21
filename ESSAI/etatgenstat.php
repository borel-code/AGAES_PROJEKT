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
$_SESSION['reqpointens']="SELECT * FROM pointage WHERE an=".$_SESSION['annee']."  ORDER BY datep DESC";
$_SESSION['reqpointsalad']="SELECT * FROM salaireadmin WHERE an='".$_SESSION['annee']."'  ORDER BY datep DESC";

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
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div  style="display:none";  class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Statisques des élèves pour tout l'établissement</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                   
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<!-- DONUT CHART2 -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Statisques des élèves de l'établissement par genre</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->








            <!-- PIE CHART -->
            <div  style="display:none";   class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div style="display:none"; class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Statistiques des élèves par type d'enseignement</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


 <!-- BAR CHART 2-->
 <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Statistiques par genre et par type d'enseignement</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <!-- STACKED BAR CHART -->
            <div   style="display:none";  class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
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
      labels  : ['Enseignement francophone', 'Enseignement anglophone', 'Enseignement bilingue', 'Enseignement autre'],
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
      labels  : ['Enseignement francophone', 'Enseignement anglophone', 'Enseignement bilingue', 'Enseignement autre'],
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


<?php
$an=$_SESSION['annee'];
$gegar=BelegschaftG($bdda,1,'M',$an); $geanc=BelegschaftA($bdda,1,'A',$an);$genew=BelegschaftA($bdda,1,'N',$an);
        $gefil=BelegschaftG($bdda,1,'F',$an);$tgen=$gegar+$gefil;

        $cogar=BelegschaftG($bdda,2,'M',$an);$coanc=BelegschaftA($bdda,2,'A',$an);$conew=BelegschaftA($bdda,2,'N',$an);
        $cofil=BelegschaftG($bdda,2,'F',$an);$tco=$cogar+$cofil;

        $ingar=BelegschaftG($bdda,3,'M',$an);$inanc=BelegschaftA($bdda,3,'A',$an);$innew=BelegschaftA($bdda,3,'N',$an);
        $infil=BelegschaftG($bdda,3,'F',$an);$tin=$ingar+$infil;

        $angar=BelegschaftG($bdda,4,'M',$an);$ananc=BelegschaftA($bdda,4,'A',$an);$annew=BelegschaftA($bdda,4,'N',$an);
        $anfil=BelegschaftG($bdda,4,'F',$an);$tan=$angar+$anfil;
        
        $gegaran=BelegschaftATS($bdda,1,'A','M',$an);$gegarnew=BelegschaftATS($bdda,1,'N','M',$an);
        $gefilan=BelegschaftATS($bdda,1,'A','F',$an);$gefilnew=BelegschaftATS($bdda,1,'N','F',$an);
  
        $cogaran=BelegschaftATS($bdda,2,'A','M',$an);$cogarnew=BelegschaftATS($bdda,2,'N','M',$an);
        $cofilan=BelegschaftATS($bdda,2,'A','F',$an);$cofilnew=BelegschaftATS($bdda,2,'N','F',$an);
  
        $ingaran=BelegschaftATS($bdda,3,'A','M',$an);$ingarnew=BelegschaftATS($bdda,3,'N','M',$an);
        $infilan=BelegschaftATS($bdda,3,'A','F',$an);$infilnew=BelegschaftATS($bdda,3,'N','F',$an);
  
        $angaran=BelegschaftATS($bdda,4,'A','M',$an);$angarnew=BelegschaftATS($bdda,4,'N','M',$an);
        $anfilan=BelegschaftATS($bdda,4,'A','F',$an);$anfilnew=BelegschaftATS($bdda,4,'N','F',$an);
  
        $totalgaran=$gegaran+$cogaran+$ingaran+$angaran;   $totalgarnew=$gegarnew+$cogarnew+$ingarnew+$angarnew;
        $totalfilan=$gefilan+$cofilan+$infilan+$anfilan;    $totalfilnew=$gefilnew+$cofilnew+$infilnew+$anfilnew;
         
        $totalgar=$gegar+$cogar+$ingar+$angar;   $totalfil=$gefil+$cofil+$infil+$anfil;
      $totalelev=$tgen+$tco+$tin+$tan;          $totalanc=$geanc+$coanc+$inanc+$ananc;
                                                 $totalnew=$genew+$conew+$innew+$annew; 
     
        ?>

<div  style="display:none";>       
<form>
  <p><div class="form-group">
    <label for="exampleInputEmail1">Total anciens</label>
        <input id="totalancien" value="<?php echo $totalanc; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
  <p><div class="form-group">
    <label for="exampleInputEmail1">Total nouveaux</label>
        <input id="totalnew" value="<?php echo $totalnew; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
  <p><div class="form-group">
    <label for="exampleInputEmail1">Total ancien gen</label>
        <input id="totalanciengen" value="<?php echo $geanc; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>    
 <p><div class="form-group">
    <label for="exampleInputEmail1">Total new gen</label>
        <input id="totalnewgen" value="<?php echo $genew; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1">Total ancien com</label>
        <input id="totalanciencom" value="<?php echo $coanc; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>    
 <p><div class="form-group">
    <label for="exampleInputEmail1">Total new com</label>
        <input id="totalnewcom" value="<?php echo $conew; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>     
      <p><div class="form-group">
    <label for="exampleInputEmail1">Total ancien ind</label>
        <input id="totalancienind" value="<?php echo $inanc ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>    
 <p><div class="form-group">
    <label for="exampleInputEmail1">Total new ind</label>
        <input id="totalnewind" value="<?php echo $innew; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>
      <p><div class="form-group">
    <label for="exampleInputEmail1">Total ancien ang</label>
        <input id="totalancienang" value="<?php echo $ananc; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>    
 <p><div class="form-group">
    <label for="exampleInputEmail1">Total new ang</label>
        <input id="totalnewang" value="<?php echo $annew; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1">Total gar</label>
        <input id="totalgar" value="<?php echo $totalgar; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1">Total fill</label>
        <input id="totalfil" value="<?php echo $totalfil; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
  

      <p><div class="form-group">
    <label for="exampleInputEmail1"> fill gen</label>
        <input id="filgen" value="<?php echo $gefil; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1"> gar gen</label>
        <input id="gargen" value="<?php echo $gegar; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>
      
      <p><div class="form-group">
    <label for="exampleInputEmail1"> fill com</label>
        <input id="filcom" value="<?php echo $cofil; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1"> gar gen</label>
        <input id="garcom" value="<?php echo $cogar; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>

      <p><div class="form-group">
    <label for="exampleInputEmail1"> fill ind</label>
        <input id="filind" value="<?php echo $ingar; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1"> gar ind</label>
        <input id="garind" value="<?php echo $infil; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>


      <p><div class="form-group">
    <label for="exampleInputEmail1"> fill ang</label>
        <input id="filang" value="<?php echo $anfil; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p> 
      <p><div class="form-group">
    <label for="exampleInputEmail1"> gar ang</label>
        <input id="garang" value="<?php echo $angar; ?>" name="date"  class="form-control" id="exampleInputEmail1"   required >
      </div> </p>
</form>
</div>
</body>
</html>
<?php }     ?>




 
 
 