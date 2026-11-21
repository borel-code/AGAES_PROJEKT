<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../RACINE/lesmenus.php';  require '../lesemploi.php';  
require '../lesmenushoriz.php';  require '../lesmenushoriz2.php'; 
  require 'debut.php';
function format($date){
	$a=substr($date,0,4);
	
	$m=substr($date,5,2);
	
	$j=substr($date,8,2);
	
	$dat=$j."/".$m."/".$a;
	return $dat;
	} 
 
  function  nameclas($bdda,$id,$an){
        
    
     $v="SELECT *  FROM classe  ";
     $reponse = $bdda->query($v);
       $t=0; $cni=" ";
      while ($donnees = $reponse->fetch() AND $t==0)
      {
        if($donnees['id']==$id){ 
            $cni=$donnees['code']; 
                $t=1; 
               
            }
       }
      $reponse->closeCursor();
      return $cni;
    }



  function Classe($bdda,$mat,$an){
     // Insertion du message à l'aide d'une requête préparée 
      $v="SELECT matelev,anelev,id_etab,niveauelev  FROM eleve WHERE matelev= '".$mat."' AND anelev='".$an."'  AND id_etab='0'";
      $reponse = $bdda->query($v);
         
       while ($donnees = $reponse->fetch())
       {
          return $donnees['niveauelev'];
        }
       $reponse->closeCursor();
     }

  function respsco($id){
    
 $v="SELECT * FROM admin WHERE id_etab='0' ";
 $reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
        if($donnees['id']==$id  ){ 
           $genre= $donnees['genre'];
           if($genre=='M'){
             $nom= 'M . '.$donnees['nom'];
           }
          if($genre=='F'){
            $nom= 'Mme '.$donnees['nom'];
          }
        }
 } 
 $reponse->closeCursor(); 
 return $nom;
}
  ?>
   <html>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../RACINE/plugins/fontawesome-free/css/all.min.css">

   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../RACINE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../RACINE/plugins/toastr/toastr.min.css">
  
   <!-- Font Awesome -->
  <link rel="stylesheet" href="../RACINE/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../RACINE/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../RACINE/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../RACINE/dist/css/adminlte.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="../RACINE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../RACINE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="../RACINE/dist/css/adminlte.min.css">
  <head>
  <script>
 
   </script>
</head>

<?php
 
 
 $q=$_GET["q"];
  
 
function prixmotif($bdda,$id){
  
      $nom=" ";
     
    $reponse = $bdda->query("SELECT * FROM autrefrais ");
    $true=0;
    while ($donnees = $reponse->fetch() AND $true==0){                            
       $phrase =$donnees['id'] ; 
       if($phrase==$id){
       $nom=$donnees['prix'];
       $true=1;
         }
   } 
  $reponse->closeCursor(); 
  return $nom;                  
}

function formatjour($n){
    if($n==1){return 'Lundi'; }if($n==2){return 'Mardi'; }if($n==3){return 'Mercredi'; }
    if($n==4){return 'Jeudi'; }if($n==5){return 'Vendredi'; }if($n==6){return 'Samedi'; }
    if($n==7){return 'Dimanche'; }
                }
  
                function numjour($jo){ 
    $tab=explode('-',$jo);
    $timestamp=mktime(0,0,0,$tab[1],$tab[2],$tab[0]);
    $jsem=date('w',$timestamp);
    return $jsem;
  }
 
  
  function arrivertard($bdda,$date,$mat,$an){
     
        $aut="..."; $haut="...";
       $vc="SELECT * FROM retard WHERE anelev='".$an."'";
      $reponse = $bdda->query($vc);
      $true=0;
      while ($donnees = $reponse->fetch() AND $true==0){  
         if($donnees['matelev']==$mat AND $donnees['datenreg']==$date AND $donnees['duree']==1){
            $aut=$donnees['nomenreg'];
            $haut=$donnees['heurenreg'];
            $true=1;
           }
     } 
    $reponse->closeCursor(); 
    return $true."@".$haut."@".$aut;                  
  }

  function retardane($bdda,$mat,$an){
    
        $aut="..."; $haut="...";
       $vc="SELECT * FROM retard WHERE anelev='".$an."'";
      $reponse = $bdda->query($vc);
      $true=0;
      while ($donnees = $reponse->fetch()){  
         if($donnees['matelev']==$mat AND $donnees['duree']==1){
            $true+=$donnees['duree'];
           }
     } 
    $reponse->closeCursor(); 
    return $true;                  
  }



  function absenceane($bdda,$mat,$an){
     
        $aut="..."; $haut="...";
       $vc="SELECT * FROM absence WHERE anelev='".$an."'";
      $reponse = $bdda->query($vc);
      $true=0;
      while ($donnees = $reponse->fetch()){  
         if($donnees['matelev']==$mat){
            $true+=$donnees['duree'];
           }
     } 
    $reponse->closeCursor(); 
    return $true;                  
  }


  
 if($q!=0){
    $arrivertard=arrivertard($bdda,$q,$_SESSION['pmat'],$_SESSION['pansco']);
   $tabl=array();
   $tabl=explode("@",$arrivertard);
    echo "
   <div class='callout callout-warning'><b>Noms et prénoms : ".$_SESSION['pnom']."<br>
    Matricule : ".$_SESSION['pmat']."<br>
    Classe : ".nameclas($bdda,Classe($bdda,$_SESSION['pmat'],$_SESSION['pansco']),$_SESSION['pansco'])."<br>";
  echo "Année scolaire : ".$_SESSION['pansco']."<br>
   </b></div> ";
   echo "
   <div class='callout callout-info'><b><h4>Etat du retard et des absences</h4></b><br>
   <b>Date : ".formatjour(numjour($q))." ".format($q)."</b><br>";
   if($tabl[0]==0){ 
    echo "
    <b>Aucun retard signalé  <br>
    </b>  ";
   }
   if($tabl[0]==1){ 
    echo "
     <b>Votre retard a été enregistré à ".$tabl[1]." par ".$tabl[2]."<br>
    </b> ";
   }
 
  echo "
   </b></div> ";
    


   $v="SELECT *  FROM absence WHERE anelev='".$_SESSION['pansco']."'
   AND datenreg='".$q."' AND matelev='".$_SESSION['pmat']."'";
$reponse = $bdda->query($v);

 $n=0; $k=1; $retajour=0;
 while ($donnees = $reponse->fetch())
 {
   
    echo "
    <div class='callout callout-danger'><b>
    ABSENT(E)<br>
    Periode horaire : ".nomperiod($donnees['dateabs'])."<br>
    Matière : ".matparid($bdda,$donnees['matiere'],$_SESSION['pansco'])."<br>
    Durée : ".$donnees['duree']." heure(s)<br>
    Enregistré à ".$donnees['heurenreg']." par ".$donnees['nomenreg']."<br>
    </b></div> ";
    $retajour+=$donnees['duree'];


   $n=$n+1;$k++;
  } 
 $reponse->closeCursor();





echo "<div class='callout callout-success'><b>
Total des absences du ".formatjour(numjour($q))." ".format($q)." : ".$retajour." heure(s) <br>";
echo "
 Total des retards sur l'année scolaire : ".retardane($bdda,$_SESSION['pmat'],$_SESSION['pansco'])." <br>
 Total des absences sur l'année scolaire : ".absenceane($bdda,$_SESSION['pmat'],$_SESSION['pansco'])." heure(s)<br>
 </b></div>";
  ?>



  
  
  <!-- /.content-wrapper -->
  
 

  </br></br></br></br></br> 
    
    </div></br></br></br></br> 
    <!-- /.content-wrapper -->
  
    <footer class="main-footer">
    
    <div class="btn-group w-100 mb-2">
    <?php   echo"<a class='btn btn-success' data-filter='2'>Total des absences du ".formatjour(numjour($q))." ".format($q)." : ".$retajour." heure(s)</a>";
  
  echo"<a class='btn btn-info' data-filter='2'>Retards sur l'année scolaire : ".retardane($bdda,$_SESSION['pmat'],$_SESSION['pansco'])."</a>";
  echo"<a class='btn btn-danger' data-filter='2'>Absences sur l'année scolaire : ".absenceane($bdda,$_SESSION['pmat'],$_SESSION['pansco'])." heure(s)</a>";
 
 
  ?>
    
    
    </div></footer>
    <?php }
  ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../RACINE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../RACINE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../RACINE/dist/js/adminlte.min.js"></script>
<!-- Ion Slider -->
<script src="../RACINE/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../RACINE/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
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

  
 

<script src="../RACINE/plugins/select2/js/select2.full.min.js"></script>
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
 