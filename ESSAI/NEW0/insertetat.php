<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';   require 'calfunction.php';
require 'competfunction.php';
$_SESSION['newensg']=" ";


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
  


  function kategclas($idclas){
    $v=' ';
    if($idclas=='A'){
        $v='Sixième ou première année';
    }
    if($idclas=='B'){
        $v='Cinquième ou deuxième année';
    }
    if($idclas=='C'){
        $v='Quatrième ou troième année';
    }
    if($idclas=='D'){
        $v='Troisième ou quatrième année';
    }
    if($idclas=='E'){
        $v='Seconde';
    }
    if($idclas=='F'){
        $v='Première';
    }
    if($idclas=='G'){
        $v='Terminale';
    }
    return $v;
  }

  $trim=$_SESSION['trimremplir'];
  $an=$_SESSION['annee'];

  function  matingpe($bdda,$idmat,$an){
        

     $v="SELECT idmat,anens  FROM matgroup";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch() AND $t==0)
      {
        if($donnees['idmat']==$idmat AND $donnees['anens']==$an){ 
           $t=1;        
            }
       }
      $reponse->closeCursor();
      return $t;
    } 
  
 
if(isset($_POST['engcompet'])){
    $_SESSION['icompetclas']=$_POST['idclas'];
}
if(isset($_GET['classe'])){
    $_SESSION['icompetclas']=$_GET['classe'];
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
                 xmlhttp.open("POST","misescoajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }



  </script>




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
      <?php  echo "<form action='insertnote1.php' method='POST'>"; ?>
     <button type="submit" class="btn"  style='color:white';>
      <i class="fas fa-arrow-left text-muted">retour</i>
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

      <li class="nav-item dropdown">
         
       </li>
      <!--li class="nav-item dropdown">
        <a class="btn btn-secondary"  data-toggle='modal'   data-target='#modajout'>
         Choisir une autre classe
          
        </a>
       </li-->


       
       

       
     </ul>
   </nav>
   <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link">
    </br> <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a> </center> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <center>  </center>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      <center> <div class="info">
          <a href="#" class="d-block"></br><?php echo $_SESSION['nom'];  ?>
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
            <h1 class="m-0">Etat de remplissage des notes du trimestre  <?php echo $_SESSION['trimremplir'];?></h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
 <!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
  

     

      
  <H4 style='color : purple'><B> </B></H4> 
 
           </br><center>
           <?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo " <img src='ENTBULL.png' height='150px' width='1300px'><br>
    <img src='ENTBULL1.png' height='200px' width='1000px'>
    <img src='espace.png' height='100px' width='1000px'><br> <br>";
    }?></center>

           <?php 
           $i=0;  
     $reponse = $bdda->query("SELECT cycle,id,sup  FROM classe WHERE sup='0' ORDER BY cycle");
      while ($donnees = $reponse->fetch())
      {
        
        $phrase =$donnees['id'] ; 
         $effect=effectif($_SESSION['annee'],$phrase);
          if($effect>0){ 
            $nomcl=classparid($phrase,$_SESSION['annee']);
            echo "<div class='card card-solid'>
            <div class='card-body'>
               <B> 
                Etat de remplissage des notes du trimestre  ".$_SESSION['trimremplir']."</Br>
               Classe : ".classparid($phrase,$_SESSION['annee'])."</Br> Année scolaire : ".$_SESSION['annee']."</Br>
               Trimestre : ".$_SESSION['trimremplir']."</Br>
               Effectif : ".$effect."
               </B>
          </div></div> 
          ";
          echo " <table class='table table-bordered table-hover'> 
          <tr><td><B>N°</B></td><td><B>Matières</B></td><td><B>Classe</B></td>";
          if($trim==1){
            $nbrevaltri1=nbreval($phrase,$trim,$_SESSION['annee']);
            for($i=1;$i<$nbrevaltri1+1;$i++){
              echo " <td><B>Eval ".$i."</B></td> ";
            }
          }
          if($trim==2){
            $nbrevaltri1=nbreval($phrase,1,$_SESSION['annee']);
            $nbrevaltri2=nbreval($phrase,$_SESSION['trimremplir'],$_SESSION['annee']);
            $total=$nbrevaltri1+$nbrevaltri2;
            $j=$nbrevaltri1+1;
            for($i=$j;$i<$total+1;$i++){
                echo " <td><B>Eval ".$i."</B></td> ";
            }
          }
          if($trim==3){
            $nbrevaltri1=nbreval($phrase,1,$_SESSION['annee']);
            $nbrevaltri2=nbreval($phrase,2,$_SESSION['annee']);
            $nbrevaltri3=nbreval($phrase,$_SESSION['trimremplir'],$_SESSION['annee']);
            $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
            $j=$nbrevaltri1+$nbrevaltri2+1;
            for($i=$j;$i<$total+1;$i++){
                echo " <td><B>Eval ".$i."</B></td> ";
            }
          }
          echo "<td><B>Enseignants</B></td></tr> ";




          $vx="SELECT *  FROM matclasse  WHERE sup='0'  AND anens='".$_SESSION['annee']."' AND idcl='".$phrase."' ORDER BY id DESC";
          $repons = $bdda->query($vx);
          $n=0;
         while ($donnee = $repons->fetch())
         {
          
          $idmat=$donnee['idmat'];
          
          $i=$n+1; 
         
           
           
echo "<tr><td><B>".$i."</B></td><td><B>".matparid($idmat,$_SESSION['annee'])."</B></td><td><B>".$nomcl."</B></td>";
if($trim==1){
    $nbrevaltri1=nbreval($phrase,$trim,$_SESSION['annee']);
    for($i=1;$i<$nbrevaltri1+1;$i++){
        $TOREMPL= effectcompomat($idmat,$phrase, 
        $i,$_SESSION['trimremplir'],$_SESSION['annee']); 
      echo " <td><B>".$TOREMPL." / ".$effect."</B></td> ";
    }
  }
  if($trim==2){
    $nbrevaltri1=nbreval($phrase,1,$_SESSION['annee']);
    $nbrevaltri2=nbreval($phrase,$_SESSION['trimremplir'],$_SESSION['annee']);
    $total=$nbrevaltri1+$nbrevaltri2;
    $j=$nbrevaltri1+1;
    for($i=$j;$i<$total+1;$i++){
        $TOREMPL= effectcompomat($idmat,$phrase, 
        $i,$_SESSION['trimremplir'],$_SESSION['annee']); 
      echo " <td><B>".$TOREMPL." / ".$effect."</B></td> ";
    }
  }
  if($trim==3){
    $nbrevaltri1=nbreval($phrase,1,$_SESSION['annee']);
    $nbrevaltri2=nbreval($phrase,2,$_SESSION['annee']);
    $nbrevaltri3=nbreval($phrase,$_SESSION['trimremplir'],$_SESSION['annee']);
    $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
    $j=$nbrevaltri1+$nbrevaltri2+1;
    for($i=$j;$i<$total+1;$i++){
        $TOREMPL= effectcompomat($idmat,$phrase, 
        $i,$_SESSION['trimremplir'],$_SESSION['annee']); 
      echo " <td><B>".$TOREMPL." / ".$effect."</B></td> ";
    }
  }

echo "<td><B>".ensgdsmat($idmat,$phrase,$_SESSION['annee'])."</B></td></tr> ";    
          /*
           $TOREMPL= effectcompomat($idmat,$phrase, 
$_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['annee']); 
          echo " <option value='".$idmat."' >".matparid($idmat,$_SESSION['annee'])
          ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          ".$TOREMPL."&nbsp&nbsp/&nbsp&nbsp".$_SESSION['effecremplir']."</option> "; */
          $n=$n+1;
          
         } 
         $repons->closeCursor();





          echo "</table>";
  /*
     echo "<div class='card card-solid'>
  <div class='card-body'>
     <B> 
     Matière : ".matparid($idmat,$_SESSION['annee'])."</Br>
     Intitulé de la compétence évaluée : </Br>".$intitu."</Br>
     Trimestre : ".$donnees['trimestre']."</Br>
     Niveau de la classe : ".kategclas($donnees['niveauclas'])."</Br>
     Classe : ".classparid($_SESSION['icompetclas'],$_SESSION['annee'])."</Br>
          <button class='btn btn-danger' data-toggle='modal' data-target='".$modadang."'>Supprimer</button>
       
     </B>
</div></div> 
";
*/
$i++;  }
}  
$reponse->closeCursor();
?>
    <!-- /.modal-content -->
 
    <!-- /.content -->
     
 
  <!-- /.content-wrapper -->
   

  </div>
   


 
 







   
  <!-- /.content-wrapper -->
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </br></br></br></br></br> 
 
  <!-- /.content-wrapper -->
   
   


</br></br> 
  
  

  
 
      
     


 

 



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


 