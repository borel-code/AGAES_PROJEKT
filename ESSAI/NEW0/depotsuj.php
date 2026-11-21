<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';


 function format($date){
  $a=substr($date,0,4);
   
  $m=substr($date,5,2);
   
  $j=substr($date,8,2);
   
  $dat=$j."/".$m."/".$a;
  return $dat;
}


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


 
$conneEns=idtl($_SESSION['mtp'],$_SESSION['annee']); 
 
if($conneEns!=0){  
    $_SESSION['respenvoi']=0;
 

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


 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <script> 
  

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
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a>  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <center> <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nom'];  ?>
 </a>
        </div></center>
      </div>

       
      <!-- Sidebar Menu -->
       <?php 
    if($_SESSION['ENSEIG']==1){  enseignantcollege(); } ?> 
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
            <h1 class="m-0">ENVOI DE SUJETS</h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php  ?> 
              
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
                <h3 class="card-title">Choisir la classe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="depotsuj1.php" name="paiem">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">TRIMESTRE</label>
                    <select name="trim" class="form-control" id="exampleInputPassword1">
                    <?php  
								echo "
                                <option value='1'>1</option>
                                <option value='2'>2</option> 
                                <option value='3'>3</option>";
							 ?>
								</select>
                                </div>

                  <div class="form-group">
                  <label for="exampleInputPassword1">CLASSE</label>
                  <div class="select2-purple">
                    <select name="clas" class="select2" data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
                  
							      <?php 
                    	
                      
                     $reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  idens='".$_SESSION['idENS']."' AND sup='0' AND anens='".$_SESSION['annee']."'");
                     while ($donnees = $reponse->fetch()){                            
                       $phrase =$donnees['idcl'] ; 
           $effect=effectif($_SESSION['annee'],$phrase);
          echo "<option value='".$phrase."' >".classparid($phrase,$_SESSION['annee'])."   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
         &nbsp ( ".$effect." )</option>" ; 
                       } 
                  $reponse->closeCursor(); 
                   ?>
                

                    
								</select>
                </div> </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ANNEE SCOLAIRE</label>
                    <select name="ann" class="form-control" id="exampleInputPassword1">
                  
                    <?php  
							 echo "<option value='".$_SESSION['annee']."'>".$_SESSION['annee']." </option>";
						 ?>
								</select>
                                <div class="card-footer">
                  <button type="submit"  name="send" class="btn btn-primary" >Valider</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                  <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
              </form>
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                        </br> </br>
                        
             
        
        
        </div>
          <!--/.col (left) -->




         
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->



      <?php  
              echo " <div class='card card-solid'>
              <div class='card-body'>
              <H2>   Tous mes sujets envoyés</H2> 
           </br>  
           
<div class='card-body table-responsive p-0' style='height: 300px;''>  
           <table border='3'  class='table table-head-fixed text-nowrap'> 
 
         

           
 <tr bgcolor='#70DBDB'><td><B>#</B></td><td><B>Matière</B></td><td><B>Classe</B></td>
 <td><B>Evaluation</B></td>
 <td colspan='3'><B>Actions</B></td><td><B>Trimestre</B></td><td><B>Type</B></td><td><B>Date</B></td>
 <td><B>Par</B></td> </tr> ";


  $v="SELECT * FROM sujet WHERE sup='0' AND idresp='".$_SESSION['idENS']."'  
  AND  anens='".$_SESSION['annee']."' ORDER BY idsuj DESC";
 /* if(isset($_POST['rechcateg1'])){
   $v="SELECT * FROM categorie WHERE sup='0' AND idcateg='".$_POST['rechcateg']."'
    AND idagence='".$_SESSION['idagence']."' ORDER BY nomcateg";
 } */



  $reponse = $bdda->query($v);
   $i=1;
 while ($donnees = $reponse->fetch() )
 {
   $idsuj=$donnees['idsuj'];
   $nom =$donnees['nom'];
   $typeuser=$donnees['typeresp'];
   $IDEVAL=$donnees['ideva'];
   if($IDEVAL==-1){
    $IDEVAL="Travaux dirigés";
   }
   if($typeuser==1){
    $auteur=namensgrade($donnees['idresp']);
   }
   if($typeuser!=1){
    $auteur=nomC($donnees['idresp']);
   }
   $moda='#modaal-success'.$i;
   $moda1='modaal-success'.$i;

   $modadang='#modaal-danger'.$i;
   $modadang1='modaal-danger'.$i;
   

     echo "  <tr> <td bgcolor='#8FBC8F'><B>".$i."</B></td>
     <td><B>".matparid($donnees['idmat'],$_SESSION['annee'])."</B></td> 
     <td><B>".classparid($donnees['idcl'],$_SESSION['annee'])."</B></td>
     
     <td><B>EVAL ".$IDEVAL."</B></td>
    



     <td><B><form action='sujet/".$nom."' method='POST'> <button  
     name='telech'  type='submit' value='".$nom."'  class='btn btn-primary btn-sm' data-toggle='modal' title='télécharger'>
     <i class='fas fa-download'>
     </i>
      
 </button> </form></B></td>

     <td><B> <form action='sujet/".$nom."' method='POST'> <button  
   name='voir'  type='submit' value='".$nom."' class='btn btn-success' data-toggle='modal' 
      title='voir'>
     
     <i class='fas fa-eye'>
   </i>
   </button>  </form></B></td>
   <td><B><form action='' method='POST'> <button value='".$idsuj."' 
   type='button'  class='btn btn-danger' data-toggle='modal' data-target='".$modadang."'
   title='supprimer' >
   
   <i class='fas fa-trash'>
 </i>
 </button>  </form></B></td>
 <td><B>TRIM ".$donnees['idtrim']."</B></td>
 <td><B>".$donnees['extension']."</B></td>
 <td><B>".format($donnees['datesuj'])." ".$donnees['heuresuj']."</B></td>
     <td><B>".$auteur."</B></td>
 </tr> ";?>





<?php  echo "<div class='modal fade' id='".$moda1."'> " ; ?>
 <div class="modal-dialog">
   <div class="modal-content ">
     <div class="modal-header">
       <h4 class="modal-title">Modification</h4>
        
       <form action='enregcat1.php' method='POST'>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <p><div class="form-group">
       <?php   ?>
             <label for="exampleInputEmail1">Nom de la categorie</label>
             <input value="<?php echo $nomcateg; ?>" name="nomcateg"  class="form-control" id="exampleInputEmail1"   required >
           </div> </p>
     </div>
     <div class="modal-footer justify-content-between">
       <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
       <button type="submit" name="modif" value="<?php echo $idcateg; ?>" class="btn btn-primary">Enregistrer</button>
</form></div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>
<!-- /.modal -->







<?php  echo "<div class='modal fade' id='".$modadang1."'> " ; ?>
       <div class="modal-dialog">
         <div class="modal-content ">
           <div class="modal-header">
             <h4 class="modal-title">Suppression</h4>
              
             <form action='deposuj2.php' method='POST'>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <p><div class="form-group">
                   <label for="exampleInputEmail1">Nom du sujet</label>
                   <select name="nomsuj"  class="form-control" id="exampleInputEmail1">
                   <?php echo "<option value='".$nom."'>".$nom."</option>"; ?>
 </select>
                 </div> </br>
                 <h5><i class="icon fas fa-exclamation-triangle">

                 En cliquant sur supprimer, tous les produits de cette categorie ne 
                 seront plus utilisables pour
                  des besoins futurs.
                 </i></h5>    
                 </p>
           </div>
           <div class="modal-footer justify-content-between">


            
             <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
             <button  type="submit" name="supini" value="<?php echo $idsuj ?>" class="btn btn-danger">Supprimer</button>
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
 echo "  </table></div><B>Total :  ".$i." </B>
  </form>
  
  </div></div> ";
  ?>




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





<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: 'dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
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