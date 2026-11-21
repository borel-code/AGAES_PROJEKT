<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'calfunction.php'; 
 
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
OR $_SESSION['code']==4) ){ 
  

    if(isset($_POST['envoifr2'])){
        $an=$_SESSION['annfr']; 
        $mat=$_SESSION['matfr']; 
        $niveauelev=Classe($bdda,$mat,$an);  
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

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
          <div class="col-sm-6">
            <h1 class="m-0">  <?php echo initialEtab();?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">PAIEMENT UNIFORME, ARBRE DE NOEL ... </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            &nbsp&nbsp&nbsp&nbsp   
             
           </form>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center><img src='AGAES3.png' height='180px' width='1300px' ><br>
             
    <img src='espace.png' height='40px' width='600px' ><br>  
           </center>
           <?php 
           
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

$date=date('Y-m-d');
 $heur=date('H:i'); 

 if(isset($_POST['envoifr2'])){       
           if(isset($_POST['envoifr2'])){// 
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>NOMS ET PRENOMS : ".$_SESSION['nomfr']." ".$_SESSION['prefr']." <br><br>CLASSE : ".classparid($_SESSION['clasfr'],$an). "<br><br>
                 MATRICULE : ".$mat. "</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>REGLEMENT DES FRAIS DIVERS<br>
     ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($_SESSION['clasfr'],$an))."<br>
DATE : ".format($date). " ".$heur."</b> </br></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ; 


}
  

  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  

 function nommotif($id){
    
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

 function prixmotif($id){
    
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



 if(isset($_POST['envoifr2'])){ 

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>MOTIF DES FRAIS / OTHER FEES</B></td><td><B>MONTANT / MOUNTANT</B></td> 
<td><B>MOIS DU TRANSPORT / MONTHS OF TRANSPORT</B></td> </tr> ";
$total=0;
$listmotif=array();
$listmois=array();
if(!empty($_POST['motif'])){
    $listmotif=$_POST['motif'];
      $ligne=count($listmotif);
      if($ligne>0){
        for($i=0;$i<$ligne;$i++){
            $n=$i+1;
            $idmotif=$listmotif[$i];
            $nommotif=nommotif($idmotif);
            $prixmotif=prixmotif($idmotif); 
            $transp=0; $valmois="";
            if($idmotif==9){
                $listmois=$_POST['mois'];
                $lignemois=count($listmois);
                if($lignemois>0){
                    echo "<tr><td><B>".$n."</B></td><td><B>".$nommotif."</B></td>";
                   for($j=0;$j<$lignemois;$j++){
                   $idmois=$listmois[$j];
                   $valmois=$valmois.namemois($idmois).",  &nbsp";
                   $date=date('Y-m-d');
 $heur=date('H:i');        
 $req = $bdda->prepare('INSERT INTO autrepayefrais(matelev,anelev,  
  frais,mois,montant,date,heure,idempl) VALUES( ?,?,?,?,?,?,?,?  )'); 
 $req->execute(array($_SESSION['matfr'], $_SESSION['annfr'],
 $idmotif,$idmois,$prixmotif ,$date,$heur,$_SESSION['id'])); 
                    }
                   $transp=$lignemois*$prixmotif;
                }
                echo "<td><B>".$transp." fcfa ( ".$lignemois." X ".$prixmotif." fcfa )</B></td>
                <td><B>".$valmois."</B></td></tr>";
                 
                $total+=$transp;   
            }
            else{
        
        
 $req = $bdda->prepare('INSERT INTO autrepayefrais(matelev,anelev,  
  frais,mois,montant,date,heure,idempl) VALUES( ?,?,?,?,?,?,?,?  )'); 
 $req->execute(array($_SESSION['matfr'], $_SESSION['annfr'],
 $idmotif," ",$prixmotif ,$date,$heur,$_SESSION['id'])); 
  
                $total+=$prixmotif;
              echo "<tr><td><B>".$n."</B></td><td><B>".$nommotif."</B></td>
              <td><B>".$prixmotif." fcfa</B></td><td><B> </B></td> </tr> "; 
            }
      }
    }
}
}
  
echo "<tr><td><B> </B></td><td><B> </B></td>
<td><B>TOTAL</B></td><td><B>".$total." fcfa</B></td> </tr> ";
 

  ?>
 </table> </Br>
 <section class='content'>     <div class='container-fluid'>
        <div class='row'> 
        <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
    <b> <U> SIGNATURE DU PARENT </U><br> </b>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> 
 <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
    <b> <U> ECONOMAT </U><br> <?php echo $_SESSION['nom'];?></b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
</Br></Br> <img src='espace.png' height='40px' width='1000px' >

  <!-- /.content-wrapper -->
  <?php } 










  if(isset($_POST['envoifr2'])){   
    echo "<center><img src='AGAES3.png' height='180px' width='1300px' ><br>
             
            <img src='espace.png' height='40px' width='600px' ><br> 
           </center>    ";
           if(isset($_POST['envoifr2'])){// 
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>NOMS ET PRENOMS : ".$_SESSION['nomfr']." ".$_SESSION['prefr']." <br><br>CLASSE : ".classparid($_SESSION['clasfr'],$an). "<br><br>
                 MATRICULE : ".$mat. "</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>REGLEMENT DES FRAIS DIVERS<br>
     ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS(TYPENS($_SESSION['clasfr'],$an))."<br>
DATE : ".format($date). " ".$heur."</b> </br></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ; 


}
  

  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  

  

 

 if(isset($_POST['envoifr2'])){ 

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='orange'><td><B>N°</B></td><td><B>MOTIF DES FRAIS / OTHER FEES</B></td><td><B>MONTANT / MOUNTANT</B></td> 
<td><B>MOIS DU TRANSPORT / MONTHS OF TRANSPORT</B></td> </tr> ";
$total=0;
$listmotif=array();
$listmois=array();
if(!empty($_POST['motif'])){
    $listmotif=$_POST['motif'];
      $ligne=count($listmotif);
      if($ligne>0){
        for($i=0;$i<$ligne;$i++){
            $n=$i+1;
            $idmotif=$listmotif[$i];
            $nommotif=nommotif($idmotif);
            $prixmotif=prixmotif($idmotif); 
            $transp=0; $valmois="";
            if($idmotif==9){
                $listmois=$_POST['mois'];
                $lignemois=count($listmois);
                if($lignemois>0){
                    echo "<tr><td><B>".$n."</B></td><td><B>".$nommotif."</B></td>";
                   for($j=0;$j<$lignemois;$j++){
                   $idmois=$listmois[$j];
                   $valmois=$valmois.namemois($idmois).",  &nbsp";
                   $date=date('Y-m-d');
 $heur=date('H:i');        
  
                    }
                   $transp=$lignemois*$prixmotif;
                }
                echo "<td><B>".$transp." fcfa ( ".$lignemois." X ".$prixmotif." fcfa )</B></td>
                <td><B>".$valmois."</B></td></tr>";
                 
                $total+=$transp;   
            }
            else{
        
        
  
  
                $total+=$prixmotif;
              echo "<tr><td><B>".$n."</B></td><td><B>".$nommotif."</B></td>
              <td><B>".$prixmotif." fcfa</B></td><td><B> </B></td> </tr> "; 
            }
      }
    }
}
}
  
echo "<tr><td><B> </B></td><td><B> </B></td>
<td><B>TOTAL</B></td><td><B>".$total." fcfa</B></td> </tr> ";
 

  ?>
 </table> </Br>
 <section class='content'>     <div class='container-fluid'>
        <div class='row'> 
        <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
    <b> <U> SIGNATURE DU PARENT </U><br> </b>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> 
 <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
    <b> <U> ECONOMAT </U><br> <?php echo $_SESSION['nom'];?></b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
</Br></Br></Br></Br>

  <!-- /.content-wrapper -->
  <?php }  ?>




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