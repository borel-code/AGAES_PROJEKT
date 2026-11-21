<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../RACINE/lesmenus.php'; require 'debut.php';
$bloc=1;$actif=$bloc; $pageactif=1;

 


  
   
if(isset($_POST['connecter'])){
  $verifconnect=verifconnect($bdda,$_POST['matricule']);
  $_SESSION['pacid']=$verifconnect;
  $_SESSION['pmat']=$_POST['matricule'];   

}
 
 
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
/*
Si l'adresse ip est déjà enregistrée ds la bd et 
parametrer comme se souvenir de moi, on recherche les infos de cette adresse ip
on redirige l'utilisateur vers la page espace.php

*/
/*
$_SESSION['modeafficheoffr']=0; $_SESSION['ordreoffr']=0; $_SESSION['idqtieroff']=0;
$_SESSION['modeafficheoffrvil']='a';  $_SESSION['modeafficheoffrdom']='a'; $_SESSION['reqidqtieroff']=" ";
$_SESSION['oksuppdmd']=0; $_SESSION['listaboreq']="SELECT * FROM benutzer  WHERE sup='0' ORDER BY nomb";
$souvenir=souvenirip($_SESSION['addrIp']);
 
 if($souvenir==1){ 
  $_SESSION['yd']=$souvenir;
  $_SESSION['yuser']=userb($_SESSION['yd']);
  $_SESSION['ymtp']=mtpb($_SESSION['yd']);
  $_SESSION['ynom']=nomb($_SESSION['yd']);
  $_SESSION['yemail']=emailb($_SESSION['yd']);
  $_SESSION['yidville']=idvilleb($_SESSION['yd']);
  $_SESSION['yqtier']=qtierb($_SESSION['yd']);
  $_SESSION['yimage']=imageb($_SESSION['yd']);
  $_SESSION['yentrep']=entrepb($_SESSION['yd']);
  $_SESSION['mesdomaines']=array();$_SESSION['mesdomainesous']=array();
  header('location:espace.php'); 
  }

  
*/
if($_SESSION['pacid']!=0){ 
    $_SESSION['pnom']=namecomp($bdda,$_SESSION['pmat']); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../RACINE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../RACINE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../RACINE/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../RACINE/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../RACINE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../RACINE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../RACINE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../RACINE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../RACINE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <script>
    function modepaye(str){
       if(str==" "){
           document.getElementById("modepaye").innerHTML=" ";
           return ;
       }
       else{
           var xmlhttp=new XMLHttpRequest();
           xmlhttp.onreadystatechange=function(){
               if(this.readyState==4 && this.status==200 ){
                   document.getElementById("modepaye").innerHTML=this.responseText;
               }
           };
           xmlhttp.open("POST","modepaye.php?q="+str,true);
           xmlhttp.send();
       }
   }


   function modetab(str){
       if(str==" "){
           document.getElementById("modetab").innerHTML=" ";
           return ;
       }
       else{
           var xmlhttp=new XMLHttpRequest();
           xmlhttp.onreadystatechange=function(){
               if(this.readyState==4 && this.status==200 ){
                   document.getElementById("modetab").innerHTML=this.responseText;
               }
           };
           xmlhttp.open("POST","modetab.php?q="+str,true);
           xmlhttp.send();
       }
   }
</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
   

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       
       
      <li class="nav-item">
        <a href="#" class="nav-link"><B><?php echo $_SESSION['pnom'];?></B></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
       
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
   
      <!--li class="nav-item dropdown">
        <a class="nav-link"  href="#">
        <i class='nav-icon fas fa-chart-pie'></i>
          Evaluations
          < span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="color:blue;">Choisir une classe</span>
          
         

           
          
        </div>
      </li-->


       
       
    </ul>
  </nav>
  <!-- /.navbar -->


 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php

menuhautappli();

?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       
      <?php
$na=$_SESSION['pnom'];
menuhautnom($na,' ');

?>
       

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php

tableaubord($bloc,$actif,$pageactif,$_SESSION['pacid']);

?>



           
          
          
           
        </ul>
      </nav>
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
            <h1 class="m-0"><?php echo initialEtab($bdda);?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"> <b>ETAT DE LA SCOLARITE</b> </li>
            <li class="breadcrumb-item"> <b><?php echo  $_SESSION['pansco'];?></b> </li> 
               
             </ol>
         
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="card card-solid">
  

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
   
     
     
 

  $depot=0; $retrait=0; $solde=0;
  $date=date('Y.m.d');
  
   


?>

<section class="content">
      <div class="container-fluid">
       
     
        <!-- Small Box (Stat card) -->
         
 <?php 
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

echo "
   
  <div class='callout callout-warning'><b>Noms et prénoms : ".$_SESSION['pnom']."<br>
  Matricule : ".$_SESSION['pmat']."<br>
  Classe : ".nameclas($bdda,Classe($bdda,$_SESSION['pmat'], $_SESSION['pansco']),$_SESSION['pansco'])."<br>";
echo "Année scolaire : ".$_SESSION['pansco']."<br>
 </b></div> ";
 $v="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."' ORDER BY date DESC";
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
 

$v="SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."' ORDER BY date DESC";
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

$v=" SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'";
$total1=0;
$repons = $bdda->query($v);
while ($donnees = $reponse->fetch())
{
 $total1+=$donnees['montant'] ; 


} 
$repons->closeCursor(); 


$v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'";
$total2=0;
$reponse = $bdda->query($v);
while ($donnees = $reponse->fetch())
{
 $total2+=$donnees['montant'] ; 


} 
$reponse->closeCursor(); 

$frais=0;
  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
   $frais+=$donnees['frais'] ; 
  
  } 
  $reponse->closeCursor(); 
  
  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND  matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
  
  
  } 
  $reponse->closeCursor(); 
  



$v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'";

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
  $reponse = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$_SESSION['pmat']."' AND anelev='".$_SESSION['pansco']."'");
  while ($donnees = $reponse->fetch()){                            
      
 echo  "<tr><td nowrap><b>".format($donnees['date'])."</b></td> <td nowrap>
 <b>".$donnees['heure']."</b></td> <td nowrap><b> 
  ".nommotif($bdda,$donnees['frais']); 
  if($donnees['frais']==9){ 
  echo "(".namemois($donnees['mois'])." )";
}
 echo "</b></td>
 <td nowrap><b>  
  ".$donnees['montant']." fcfa</b></td> <td nowrap> </td><td nowrap> </td><td nowrap><b>".respsco($bdda,$donnees['idempl'])."</b></td></tr> " ; 
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
        <div id='modetab'>
        
           

        </div>

         
        <!-- /.row -->

        
        <!-- =========================================================== -->


 
 <!-- =========================================================== -->



    </br></br></br></br>

   

 

      </div><!-- /.container-fluid -->
    </section>
    <?php
     
 
?>
    <!-- /.content -->

     <footer class="main-footer">
    
    <div class="btn-group w-100 mb-2">
    <?php   echo"<a class='btn btn-success' data-filter='2'>Total déjà payé : ".$total." fcfa </a>";
  
  echo"<a class='btn btn-info' data-filter='2'>Coût de la scolarité : ".$rcout." fcfa  </a>";
  
  echo"<a class='btn btn-danger' data-filter='2'>Reste de la scolarité : ".$rrrest." fcfa  </a>";
  echo"<a class='btn btn-primary' data-filter='2'>Total complet versé : ".$global." fcfa  </a>";
 
  ?>
    
    
    </div></footer>
   
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
<?php
 }
?>
