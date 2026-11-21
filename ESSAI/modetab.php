<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../RACINE/lesmenus.php';  
  require 'debut.php';
function format($date){
	$a=substr($date,0,4);
	
	$m=substr($date,5,2);
	
	$j=substr($date,8,2);
	
	$dat=$j."/".$m."/".$a;
	return $dat;
	} 
 
  function  nameclas($bdda,$id,$an){
        
   // Insertion du message à l'aide d'une requête préparée 
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

  function respsco($bdda,$id){
    
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
  
 function nommotif($bdda,$id){
  
      $nom=" ";
     
    $reponse = $bdda->query("SELECT * FROM autrefrais ");
    $true=0;
    while ($donnees = $reponse->fetch() AND $true==0){                            
       $phrase =$donnees['id'] ; 
       if($phrase==$id){
       $nom=$donnees['nom'];
       $true=1;
         }
   } 
  $reponse->closeCursor(); 
  return $nom;                  
}

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


function namemois($id){
  $nom=" ";
  if($id==1){
      $nom="Septembre";
  }
  if($id==2){
      $nom="Octobre";
  }
  if($id==3){
      $nom="Novembre";
  }
  if($id==4){
      $nom="Dècembre";
  }
  if($id==5){
      $nom="Janvier";
  }
  if($id==6){
      $nom="Février";
  }
  if($id==7){
      $nom="Mars";
  }
  if($id==8){
      $nom="Avril";
  }
  if($id==9){
      $nom="Mai";
  }
  if($id==10){
      $nom="Juin";
  }
  return $nom;                  
}
  
  
 if($q!=0){
  echo "
   
  <div class='callout callout-warning'><b>Noms et prénoms : ".$_SESSION['pnom']."<br>
  Matricule : ".$_SESSION['pmat']."<br>
  Classe : ".nameclas($bdda,Classe($bdda,$_SESSION['pmat'],$q),$q)."<br>";
echo "Année scolaire : ".$q."<br>
 </b></div> ";
 $v="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."' ORDER BY date DESC";
 $reponse = $bdda->query($v);
 $n=0;
while ($donnees = $reponse->fetch())
{
 $i=$n+1;
$xd=format($donnees['date'] );  
echo "<div class='callout callout-success'><b>N° ".$i." <br>
Montant : ".$donnees['montant'] ." fcfa "; if($donnees['remise']=="OUI"){echo "(Remise)";} echo "<br>";
echo "Motif : Scolarité<br>
Frais divers : ".$donnees['frais']." fcfa<br>
Date : ".$xd." <br>Heure : ".$donnees['heure']." <br>
Responsable : ".respsco($bdda,$donnees['idempl'])." <br>

 </b></div>";
 $n=$n+1;
} 
$reponse->closeCursor();
 

$v="SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."' ORDER BY date DESC";
$reponse = $bdda->query($v);
$ni=$n;
while ($donnees = $reponse->fetch())
{
$j=$ni+1;  
$xd=format($donnees['date'] );
echo "<div class='callout callout-success'><b>N° ".$i." <br>
Montant : ".$donnees['montant'] ." fcfa <br>";
echo "Motif : Examens<br>
Date : ".$xd." <br>Heure : ".$donnees['heure']." <br>
Responsable : ".respsco($donnees['idempl'])." <br>

 </b></div>";
$ni=$ni+1;
} 
$reponse->closeCursor();

$v=" SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."'";
$total1=0;
$repons = $bdda->query($v);
while ($donnees = $reponse->fetch())
{
 $total1+=$donnees['montant'] ; 


} 
$repons->closeCursor(); 


$v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."'";
$total2=0;
$reponse = $bdda->query($v);
while ($donnees = $reponse->fetch())
{
 $total2+=$donnees['montant'] ; 


} 
$reponse->closeCursor(); 

$frais=0;
  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
   $frais+=$donnees['frais'] ; 
  
  } 
  $reponse->closeCursor(); 
  
  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND  matelev='".$_SESSION['pmat']."' AND anelev='".$q."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
  
  
  } 
  $reponse->closeCursor(); 
  



$v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$q."'";

$reponse = $bdda->query($v);
while ($donnees = $reponse->fetch())
{
 $rrrest=$donnees['reste'] ; 
$rcout=$donnees['cout'] ; 
$statut=$donnees['statut'] ; 

} 
$reponse->closeCursor(); 

$som=0;
  echo "
  <div class='card-body table-responsive p-0' style='height: 300px;''>
  <table class='table table-bordered table-hover'>";
  $reponse = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$_SESSION['pmat']."' AND anelev='".$q."'");
  while ($donnees = $reponse->fetch()){                            
      
 echo  "<tr><td nowrap><b>".format($donnees['date'])."</b></td> <td nowrap>
 <b>".$donnees['heure']."</b></td> <td nowrap><b> 
  ".nommotif($bdda,$donnees['frais']); 
  if($donnees['frais']==9){ 
  echo "(".namemois($donnees['mois'])." )";
}
 echo "</b></td>
 <td nowrap><b>  
  ".$donnees['montant']." fcfa</b></td> <td nowrap> </td><td nowrap> </td><td nowrap><b>".respsco($donnees['idempl'])."</b></td></tr> " ; 
  $som+=$donnees['montant'];
  $ni++;
     }  
$reponse->closeCursor(); 
echo "</b></table></div></br>";

 
$total=$total1+$total2;
  
$global=$total1+$total2+$frais+$som;

echo "<div class='callout callout-success'><b>Total de la scolarité déjà payé : ".$total." fcfa <br>
Coût de la scolarité (statut : ".$statut.") : ".$rcout." fcfa <br>";
echo "
 Reste de la scolarité : ".$rrrest." fcfa <br>
 Examens : ".$total1." fcfa <br>
Total complet versé : ".$global." fcfa <br>
 </b></div>";
  ?>



  
  
  <!-- /.content-wrapper -->
  
 

  </br></br></br></br></br> 
    
    </div></br></br></br></br> 
    <!-- /.content-wrapper -->
  
    <footer class="main-footer">
    
    <div class="btn-group w-100 mb-2">
    <?php   echo"<a class='btn btn-success' data-filter='2'>Total déjà payé : ".$total." fcfa </a>";
  
  echo"<a class='btn btn-info' data-filter='2'>Coût de la scolarité : ".$rcout." fcfa  </a>";
  
  echo"<a class='btn btn-danger' data-filter='2'>Reste de la scolarité : ".$rrrest." fcfa  </a>";
  echo"<a class='btn btn-primary' data-filter='2'>Total complet versé : ".$global." fcfa  </a>";
 
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
 