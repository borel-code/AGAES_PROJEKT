<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require '../lienC2.php';;require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php'; 
require '../lesmenushoriz.php'; 
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
AND ($_SESSION['code']==50 OR $_SESSION['code']==1  OR $_SESSION['code']==2 
OR $_SESSION['code']==4) ){ 
   
  $_SESSION['nomsimpl']=nomsimple($_SESSION['id']);
 


    $_SESSION['verifimprim']=0;
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
  

</script> 


  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <script>
	 



         function rechercher(str){
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
                 xmlhttp.open("POST","paiem1ajax.php?q="+str,true);
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
      <button class='btn btn-info' type='button' data-toggle='modal'   data-target='#essai'>Ajouter un nouveau établissement</button>
        
      </li>

     <!-- Messages Dropdown Menu -->
    
       <!-- Notifications Dropdown Menu -->
  
       
        
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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nom'];  ?></a>
        </div>
      </div>

       
      <!-- Sidebar Menu -->
      <?php if($_SESSION['code']==50){webmaster();}  if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 OR $_SESSION['code']==3){principalcollege();}if($_SESSION['code']==7){secretairecollege();}if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}?>
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
            <h1 class="m-0">ALLER VERS UN AUTRE ETABLISSEMENT </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
           
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
    <?php



          $idetabl=0;
          $vs="SELECT * FROM lien WHERE id='1'";
          $reponses = $bdda->query($vs);
             while ($donnees = $reponses->fetch())
             {  
                $idetabl=$donnees['idetabl']; 
                $_SESSION['lieugpe']=$idetabl;
            } 
             $reponses->closeCursor();
          
          $v="SELECT * FROM etablier WHERE idetabl='".$idetabl."'";
                  $reponse = $bdser->query($v);
                     while ($donnees = $reponse->fetch())
                     {$nomet=$donnees['nometab']; 
                      $idetablier=$donnees['idetablier']; 
                      $dossier=$donnees['lien']; 
                      $dossierparent=$donnees['lienparent'];
                      $base=$donnees['base'];
                      if($_SESSION['code']!=50){
                        echo "<a href='../".$dossier."/menufondat.php'><div class='container-fluid'>
                         <div class='card card-solid'>
                     <div class='card-body'><b>";
                          echo $nomet."<br>	       
                            ";       
                           }       
                           if($_SESSION['code']==50){
                             echo "<a href='../".$dossier."/menuweb.php'><div class='container-fluid'>
                              <div class='card card-solid'>
                          <div class='card-body'><b>";
                               echo $nomet."<br>	       
                                 ";       
                                }        
                     
                   
 
        echo "</b></div></div></div></a>";  
    } 
    $reponse->closeCursor(); 
        ?>                          
                                 
   </br>   </br> 
           
   <div id="detail">

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


  <?php
  echo "<div class='modal fade' id='essai'>
  <div class='modal-dialog'>
    <div class='modal-content '>
      <div class='modal-header'>
        <h4 class='modal-title'>Nouveau établissement</h4>
         
        <form action='deplacer2.php' method='POST'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <p>
       
        <label for='exampleInputEmail1'>&nbsp &nbsp &nbsp &nbsp===== INFORMATIONS DE BASE =====</label><br>
        <div class='form-group'>
        <label for='exampleInputEmail1'>Type d'établissement</label>
        <select name='type' class='form-control'>
        <option value='1'>Primaire et maternelle</option>
        <option value='2'>Secondaire</option>
        </select>
        </div>
        <div class='form-group'>
        <label for='exampleInputEmail1'>Nom de l'établissement</label>
          <input name='nometab'  class='form-control' id='exampleInputEmail1' required>
          </div>
          <label for='exampleInputEmail1'>Numéro de téléphone de l'établissement</label>
          <div class='input-group mb-3' >
          <div class='input-group-append'>
                      <span class='input-group-text'>+237</span>
                  </div>
          <input name='numetab' class='form-control' type='number' id='exampleInputEmail1' required>
          </div>
          <div class='form-group'>
          <label for='exampleInputEmail1'>Ville de l'établissement</label>
            <input name='villetab'  class='form-control' id='exampleInputEmail1' required>
            </div> 
            <div class='form-group'>
            <label for='exampleInputEmail1'>Quartier de l'établissement</label>
              <input name='qtieretab'  class='form-control' id='exampleInputEmail1' required>
              </div> 
          
          <br><br><label for='exampleInputEmail1'>&nbsp &nbsp &nbsp========= LES LIENS D'ACCES =========</label><br><br>
           <label for='exampleInputEmail1'>Lien d'accès pour vous et votre personnel(Compléter avec un mot)</label>
                  <div class='input-group mb-3' >
                  <div class='input-group-append'>
                              <span class='input-group-text'>http://ajesuis.com</span>
                          </div>
                  <input name='lien' class='form-control' id='exampleInputEmail1' required>
                  </div>
                  <label for='exampleInputEmail1'>Lien d'accès pour les parents d'élèves(différent du lien ci-dessus)</label>
                  <div class='input-group mb-3' >
                  <div class='input-group-append'>
                              <span class='input-group-text'>http://ajesuis.com</span>
                          </div>
                  <input name='lienparent' class='form-control' id='exampleInputEmail1' required>
                  </div>
                  <label for='exampleInputEmail1'>Votre nom d'utilisateur</label>
                  <div class='input-group mb-3'>
          <input type='text' name='user' value='".$_SESSION['util']."' class='form-control' readonly>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-user'></span>
            </div>
          </div>
        </div>
        <label for='exampleInputEmail1'>Votre mot de passe</label>
        <div class='input-group mb-3'>
          <input type='text' name='motp' value='".$_SESSION['mtp']."' class='form-control' readonly>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-lock'></span>
            </div>
          </div>
        </div>
        </p>
      </div>
      <div class='modal-footer justify-content-between'>
        <button type='button'  class='btn btn-default' data-dismiss='modal'>Fermer</button>
        <button type='submit' name='modifvar' value=' ' class='btn btn-primary'>Enregistrer</button>
</form></div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
";
?>




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