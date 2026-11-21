<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
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

 
  if(isset($_POST['send'])){
    $_SESSION['ensclassean']=$_POST['ann'];
    $_SESSION['ensidclasse']=$_POST['clas'];
   }
   if(isset($_POST['autrchp'])){
    $_SESSION['ensclassean']=$_POST['year'];
    $_SESSION['ensidclasse']=$_POST['clas'];
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
				 
         function matRech(str){
             if(str==" "){
                 document.getElementById("mat").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("mat").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","ajoutensajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }
 

         function rechercher(str){
             if(str==" "){
                 document.getElementById("suchen").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("suchen").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","ajoutensrech.php?q="+str,true);
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

      <?php
      $retour='ensclasse.php' ;
      
       ?>
      <li class="nav-item">
      <form action='<?php echo $retour;  ?>' method='POST'>
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
        <h1 class="m-0">  <?php echo initialEtab();?></h1> 
    </br>   </br> 
    <button type="button"  style="width: 100%; height: 5%;" class="btn btn-info" data-toggle="modal" data-target="#autran">
Faire un autre choix
   </br>&nbsp &nbsp    </button>

   </br> 

          <div class="col-sm-6">
        
            &nbsp&nbsp&nbsp</div><!-- /.col -->
            
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
  
  <H4 style='color : purple'><B> </H4> 
  <div class="row">
  <h5 class="m-0"><B>
    Les enseignants de la  
    <?php 
    
    
 
    echo  classparid($_SESSION['ensidclasse'],"df")." 
    en ".$_SESSION['ensclassean'];?> </B></h5>
   
           </div>
           </br>
       

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
   
   
   echo "     
            
            <table border='3'  class='table table-head-fixed text-nowrap'> 
        
  <tr bgcolor='#70DBDB'><td><B>#</B></td><td><B>Matières</B></td>
  <td><B>Enseignant(e)s</B></td>
    </tr> ";
   
  $v="SELECT *  FROM enseigmatclasse 
  WHERE sup='0' AND anens='".$_SESSION['ensclassean']."'
  AND idcl='".$_SESSION['ensidclasse']."' ORDER BY idmat";
   
   
  $reponse = $bdda->query($v);
  $i=1;  
while ($donnees = $reponse->fetch() )
{
    $ensemble=$donnees['id'];
    $matensg='matensg'.$i;
    $checkmatensg='checkmatensg'.$i;
   
  
   

  $modaj='#modaal-ajout'.$i;
  $modaj1='modaal-ajout'.$i;
  $moda='#modaal-success'.$i;
  $moda1='modaal-success'.$i;
  $modadang='#modaal-danger'.$i;
  $modadang1='modaal-danger'.$i;
  $modahist='#modaal-hist'.$i;
  $modahist1='modaal-hist'.$i;
  echo "  <tr> <td bgcolor='#8FBC8F'><B>".$i."</B></td>
      <td><B>".matparid($donnees['idmat'],'jj')."</B></td>
      <td> <B> ".namensgrade($donnees['idens'])." </B> </td> 
      
   
    
  
  </tr> ";?>




  
 
 

<?php  
     
   echo "<div class='modal fade' id='".$modadang1."'> " ; ?>
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header">
              <h4 class="modal-title">Suppression
              <?php echo "de ".matparid($donnees['idmat'],'jj')."
               en ".classparid($donnees['idcl'],'ff');  ?>
              </Br>
              <?php echo   namensg($_SESSION['idensesmat']);  ?>
            </h4>
               
              <form action='ajoutensgenreg.php' method='POST'>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><div class="form-group">
                    
                  <h5><i class="icon fas fa-exclamation-triangle">
                   Voulez vous vraiment supprimer ?
                  </i></h5>    
                  </p>
                  
            </div>
            <div class="modal-footer justify-content-between">


             
              <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button  type="submit" name="supsesmat" value="<?php echo $ensemble; ?>" class="btn btn-danger">OK</button>
    </form></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      






       
<?php 
      $i++;
  } 
  $reponse->closeCursor(); 
   
  $i=$i-1;
  echo "  </table> ";


 


 
  ?>







  
    </div> </div> </div> 
  <!-- /.content-wrapper -->
  

</br> 




   

<div class='modal fade' id='autran'>  
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Les enseignants par classe</h4>
         
        <form action='ensclasse1.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  <p><div class="form-group">
       <label for="exampleInputEmail1">Choisir une année scolaire</label>
        <select name="year"   data-placeholder='Choisir la classe ' class='form-control select2' type='search' placeholder='Search' aria-label='Search'>
         <?php 
               $vexw="SELECT DISTINCT anens FROM enseigmatclasse WHERE sup='0' 
               ORDER BY anens DESC";
  $reponxw = $bdda->query($vexw); 
  
  while ($donnxw = $reponxw->fetch() )
 {
   
  echo "<option value='".$donnxw['anens']."'>".$donnxw['anens']."</option>";
  
 } 
 $reponxw->closeCursor(); 
    ?>  </select>   
      </div> </p>

      <p><div class="form-group">
      <label for='exampleInputEmail1'>Classes</label>
      <?php  echo " <select name='clas'   class='form-control select2' > 
    ";
    $vexw="SELECT * FROM  classe WHERE sup='0' 
       AND    cycle='1'   ";
  $reponxw = $bdda->query($vexw); 
  while ($donnxw = $reponxw->fetch() )
 {
 $exist1=existensmaclas($donnxw['id']);
 if($exist1==1){ 
   echo "<option value='".$donnxw['id']."'>".$donnxw['code']."</option>";
   }
  } 
 $reponxw->closeCursor();  

 $vexw="SELECT * FROM  classe WHERE sup='0' 
 AND   cycle='2'  ";
$reponxw = $bdda->query($vexw); 
while ($donnxw = $reponxw->fetch() )
{
  $exist2=existensmaclas($donnxw['id']);
  if($exist2==1){ 
    echo "<option value='".$donnxw['id']."'>".$donnxw['code']."</option>";
    }
} 
$reponxw->closeCursor();
echo"</select> ";	 ?>
    
      </div> </p>
     
     
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name="autrchp"  class="btn btn-primary">OK</button>
</form></div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 

<div class="modal fade" id="autrteach">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <h4 class="modal-title">Choix d'un(e) enseignant(e)</h4>
              <form action='ajoutsesmat.php' method='POST'>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p><div class="form-group">
        <?php   ?>
              <label for="exampleInputEmail1">Noms et prénoms</label>
               
            
              <select name="idchoix" class="form-control select2" type="search" placeholder="Search" aria-label="Search">
              <?php 

 
             $vh="SELECT * FROM enseignant WHERE supp='0' ORDER BY nomens ";
 $reponseh = $bdda->query($vh); 
 while ($donneesh = $reponseh->fetch() )
{
  
 echo "<option value='".$donneesh['id']."'>".$donneesh['nomens']."
 ".$donneesh['prenomens']."</option>";
  
} 
$reponseh->closeCursor(); 
 
 ?>   </select> 
            </div> </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" name="autrteach" class="btn btn-primary">OK</button>
    </form></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
       





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


 