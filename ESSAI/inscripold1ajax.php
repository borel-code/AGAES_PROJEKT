<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

 
  ?>
   
   <html>
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     
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
<form  method="POST" action="inscrip1.php" name="inscrip">
<?php
 
 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==4) ){ 

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



function eleveEXIST($bdda,$mat,$an){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."'";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 if( $donnees['matelev']==$mat ){
		$true=1;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}






  
  $v="SELECT *  FROM prorogation WHERE id='1' ";
	$reponse = $bdda->query($v);
  $delai=' ';
  while ($donnees = $reponse->fetch() )
  {
	 
    $delai=$donnees['date'];
	  
  } 
  $reponse->closeCursor();
  $affich=0;
 $q=$_GET["q"];
if($q!=0){ 
  
  $xv="SELECT * FROM eleve   ORDER BY nomelev " ;
  $reponsex= $bdda->query($xv);
  $true=0;
  while ($donneesx= $reponsex->fetch() AND $true==0)
    { $_SESSION['inscripnew']=1;
      if($donneesx['matelev']==$q){ 
        $eleveEXIST=eleveEXIST($bdda,$donneesx['matelev'],$_SESSION['annee']) ;
        if($eleveEXIST==0){ 
         $matschule=$donneesx['matelev'];  $idnational=$donneesx['idnational']; 
        $nom=nameschuler($bdda,$matschule);
        $prenom=vornameschuler($bdda,$matschule);
        $date=geburtstag($bdda,$matschule);
        $genre=genre($bdda,$matschule);
        $numero=nummer($bdda,$matschule);
    $an=$_SESSION['annee'];?>

              
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Inscription enseignement secondaire : ancien élève
        </br> En cas d'erreur sur le montant, seul la fondation peut corriger.
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Matricule</label>
                    <?php  
                   echo "<input name='idnational' value='".$idnational."' class='form-control' id='exampleInputEmail1'   required >";
                    ?>
                    </div>  
                <div class="form-group">
                    <label for="exampleInputEmail1">NOMS DE L'ELEVE</label>
                    <?php  
                   echo "<input name='nomelev' value='".$nom."' class='form-control' id='exampleInputEmail1'   required >";
                    ?>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">PRENOMS DE L'ELEVE</label>
                    <?php  
                   echo "<input name='preelev' value='".$prenom."' class='form-control' id='exampleInputEmail1'  >";
                     ?></div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">DATE ET LIEU DE NAISSANCE</label>
                    <?php 
                   echo "<input name='datelev' value='".$date."' class='form-control' id='exampleInputEmail1' placeholder='jj/mm/aaaa'   >";
                    ?>
                     
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">SEXE</label>
                    <select name="sexe" class="form-control" id="exampleInputPassword1">
                    <?php 
                          if($genre=="M"){
                            echo "<option value='M'>MASCULIN</option>
								   <option value='F'>FEMININ</option>";
                          }
                          else{
                            echo "
                            <option value='F'>FEMININ</option>
                            <option value='M'>MASCULIN</option>
								   ";
                          }
                     ?>
                   
								</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">TELEPHONES PARENTS</label> 
                    <?php  
                    echo "<input name='tel' value='".$numero."' class='form-control' id='exampleInputEmail1' placeholder='677665544/699887766'>";
                    ?>
                    </div>
                    
                     
                </div>
                <!-- /.card-body -->
                
               
            </div>
            <!-- /.card -->
           
             
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Informations obligatoires</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
                    <label for="exampleInputPassword1">CLASSE</label>
                    
                    <select name="niveauelev"   class="form-control select2" style="width: 100%;" id="exampleInputPassword1" >
                    <optgroup label='Cycle 1' >
							      <?php 
                    	
                      
                     $reponsew = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='1'  ORDER BY categ");
                     while ($donneesw = $reponsew->fetch()){ 
                        $phrase =$donneesw['id'] ; 
                        $vin=verifsco($bdda,$phrase,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
        $via=verifsco($bdda,$phrase,'A',$_SESSION['annee'],0);
               if($vin!=0 AND $via!=0){    
        $p='value='.$phrase;
        $effect=effectif($bdda,$_SESSION['annee'],$phrase);
         
        echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
        &nbsp ( '.$effect.' )</option>' ; 
    }      } 
                 $reponsew->closeCursor(); 
                   ?>
                    </optgroup >

                    <optgroup label='Cycle 2' >
							      <?php 
                    	
                      
                     $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='2'   ORDER BY categ ");
                     while ($donnees = $reponse->fetch()){                            
                      $phrase =$donnees['id'] ;
                      $vin=verifsco($bdda,$phrase,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
                      $via=verifsco($bdda,$phrase,'A',$_SESSION['annee'],0);
                             if($vin!=0 AND $via!=0){    
        $p='value='.$phrase;
        $effect=effectif($bdda,$_SESSION['annee'],$phrase);
         
        echo '<option '.$p.' >'.classparid($bdda,$phrase,$_SESSION['annee']).' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
        &nbsp ( '.$effect.' )</option>' ; 
                       }  } 
                 $reponse->closeCursor(); 
                   ?>
                    </optgroup >
								</select>
                  </div>
                 
                
            </br>

                <label for="exampleInputPassword1">MONTANT AVANCE</label>
                    <input name="mtnt" class="form-control" id="exampleInputPassword1"  placeholder=" EXPLE : 25000" required >
                    </br>
                    

                    <div class="form-group">
                    <label for="exampleInputPassword1">ANNEE SCOLAIRE</label>
                    <select name="anelev" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$_SESSION['annee']."'>".$_SESSION['annee']." </option>";
						 ?>
								</select>
                  </div>
                  <div class="form-group">
                <label for="exampleInputPassword1">STATUT</label>
                    <select name="stat" class="form-control" id="exampleInputPassword1">
                
								 <option value="A">ANCIEN(NE)</option>
								</select> </div>

                    <label for="exampleInputPassword1">RESPONSABLE SCOLARITE</label>
                    <select name="nomeco" class="form-control" id="exampleInputPassword1">
								  <?php  
								  echo "<option value='".$_SESSION['id']."'>".$_SESSION['nom']." </option>";?>
								  
								  </select></br> <div class="card-footer">
                  <?php
                   if($delai>=date('Y.m.d')){
echo "<button type='submit' name='sendancien' value='".$matschule."' class='btn btn-primary' >Enregistrer</button>
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
<button type='reset' class='btn btn-danger'>Annuler</button>"; 
                      }?>
                </div>
                 
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

            
            
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <?php    $true=1;
      }
      else{
        if($affich==0){ 
      echo "<div class='alert alert-warning alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      <h5><i class='icon fas fa-exclamation-triangle'>Cet(te) élève est déjà inscrit(e). </i></h5>
</div>";$affich=1;}
      }
   }



  }
    $reponsex->closeCursor(); 
    }


}
?>

</form>

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