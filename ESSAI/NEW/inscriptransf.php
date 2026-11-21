<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 

function effectif($bdda,$an,$clas){
	
	$v="SELECT niveauelev,anelev,id_etab FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
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
	
	$v="SELECT matelev,anelev,id  FROM eleve  WHERE anelev='".$an."'";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
	 if( $donnees['matelev']==$mat ){
		$true=1;
	  } 
	  
  } 
  $reponse->closeCursor();
   return $true;   
}

function eleveCl($mat,$an){
	
	$v="SELECT matelev,anelev,niveauelev  FROM eleve  WHERE anelev='".$an."'";
	$reponse = $bdda->query($v);
  $true=0; 
  while ($donnees = $reponse->fetch() AND $true==0 )
  {
	 if( $donnees['matelev']==$mat ){
		$true=$donnees['niveauelev'];
	  } 
	  
  } 
  $reponse->closeCursor();
   return classparid($bdda,$true,'d');   
}

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==2
OR $_SESSION['code']==3 OR $_SESSION['code']==4 OR $_SESSION['code']==5
OR $_SESSION['code']==6 OR $_SESSION['code']==7)){ 
  $_SESSION['verifinscrip']=0;
    if(isset($_POST['sendold'])){
        $matschule=$_POST['elev'];$_SESSION['matschule']=$_POST['elev'];
        $nom=nameschuler($bdda,$matschule);
        $prenom=vornameschuler($bdda,$matschule);
        $date=geburtstag($bdda,$matschule);
        $genre=genre($bdda,$matschule);
        $numero=nummer($bdda,$matschule);

        }
        if(isset($_POST['rechercher'])){
          $_SESSION['inscripnew']=0;
  
          }   
 
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
                 xmlhttp.open("POST","inscriptransf1.php?q="+str,true);
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">INSCRIPTION  </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
           
            
               
              
            </ol>
             
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
if(isset($_POST["rechEL"])){
    $_SESSION['anrechEL']=$_POST["mat"];  
   $_SESSION['waselecta']=1;  
} 
if(isset($_POST["rechcL"])){
  $_SESSION['anrechCL']=$_POST["lkas"];
 $_SESSION['waselecta']=0;  
}  
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="card card-solid">
  <div class="card-body">
  <form action="inscriptransf.php" method="POST">
      <label for="exampleInputPassword1"> <i>ANNEE SCOLAIRE ANTERIEURE DU TRI</i></label>
      <div class="btn-group w-100 mb-2">
   <select name="mat" onChange="rechercher(this.value)" class="select2" data-placeholder="Choisir l'élève" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option value='0'>Choisir l'année du tri pour transférer</option>
							      <?php 
                    	
                       $reponse = $bdda->query("SELECT DISTINCT anens FROM admin_poste   ORDER BY anens DESC");
                       while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['anens'] ; 
          $p='value='.$phrase;
   
          echo '<option '.$p.' >'.$phrase.'</option>' ;
                        } 
                   $reponse->closeCursor(); 
                    ?>
  </select> <button type="submit" name="rechEL" style="width: 100%; height: 5%;" class="btn btn-primary" data-toggle="modal"  >
     OK    </button>           
   </div></form>          
   <?php
 
 
?>
   

   <form action="inscriptransf.php" method="POST">
      <label for="exampleInputPassword1"> <i>CHOISIR LA CLASSE ANTERIEURE</i></label>
    
   <select name="lkas" onChange="rechercher(this.value)" class="select2" data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
                   
							      <?php 
                    	
                       $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0'   ORDER BY cycle");
                       while ($donnees = $reponse->fetch()){                            
                         $phrase =$donnees['id'] ; 
                $effect=effectif($bdda,$_SESSION['anrechEL'],$phrase);
                if($effect>0){
                echo "<option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['anrechEL'])." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                &nbsp ( ".$effect." )</option>" ; 
                          }   } 
                    $reponse->closeCursor(); 
                    ?>
  </select> </br><button type="submit" name="rechcL" style="width: 100%; height: 5%;" class="btn btn-secondary" data-toggle="modal"  >
     Trier dans les classes de l'année antérieure  </button>           
    </form>



                                </div>      
   </br>   </br> 
   
   <form action="inscriptransf.php" method="POST">
 <div class="btn-group w-100 mb-2">
 
 <button type="submit" name="selectall" style="width: 100%; height: 5%;" class="btn btn-success" data-toggle="modal"  >
     Sélectionner tout    </button> 
     <button type="submit" name="selectn" style="width: 100%; height: 5%;" class="btn btn-danger" data-toggle="modal"  >
     Desélectionner tout   </button>  
                       
   </div>
   </form>

   <form action="inscriptransf1.php" method="POST">
   <label for="exampleInputPassword1"> <i>Classe pour cette année scolaire</i></label>
                    <div class="select2-purple">
                    <select name="clsnew"  class="select2" data-placeholder="Choisir la classe pour cette année scolaire" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
       
       $reponsew = $bdda->query("SELECT * FROM classe WHERE sup='0'  ORDER BY cycle");
       while ($donneesw = $reponsew->fetch()){                            
         $phrase =$donneesw['id'] ; 
         $vin=verifsco($bdda,$phrase,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
       $via=verifsco($bdda,$phrase,'A',$_SESSION['annee'],0);
$effect=effectif($bdda,$_SESSION['annee'],$phrase);
if($vin!=0 AND $via!=0){
echo "<option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp ( ".$effect." )</option>" ; 
          }   } 
    $reponsew->closeCursor();   
        
      
                    ?>
 
                                 </select>  </div>

   <?php
 


    echo "</br> <table class='table table-bordered table-hover'> 
    <thead>
    <tr bgcolor='#bvcxd'><td colspan='4'><B>Classe antérieure : ".classparid($bdda,$_SESSION['anrechCL'],$_SESSION['annee'])."</B></td> 
     </tr></thead>
     <thead><tr bgcolor='#bvcxd'><td><B>N°</B></td><td><B>NOMS , PRENOMS</B></td> 
     <td><B>MATRICULE</B></td> <td><B>Cocher</B></td>
     </tr></thead> ";
  
     if(isset($_POST["selectn"])){
      
        $v="SELECT id,matelev,nomelev,preelev,niveauelev,id_etab,sexelev,datelev,telev  
        FROM eleve  WHERE anelev='".$_SESSION['anrechEL']."'
         AND niveauelev='".$_SESSION['anrechCL']."' AND id_etab='0' 
           ORDER BY nomelev";
         if( $_SESSION['waselecta']==1){
          $v="SELECT id,matelev,nomelev,preelev,niveauelev,id_etab,sexelev,datelev,telev  
        FROM eleve  WHERE anelev='".$_SESSION['anrechEL']."'
         AND  id_etab='0' 
           ORDER BY nomelev";
         }   
    $reponse = $bdda->query($v);
    $n=0; 
    while ($donnees = $reponse->fetch())
    {
     $i=$n+1;  
     $cocher="cocher".$i; 
     $nomelev="nomelev".$i; $datelev="datelev".$i;
   $preelev="preelev".$i;$sexe="sexe".$i;
   $tel="tel".$i;
     $verif=eleveEXIST($bdda,$donnees['matelev'],$_SESSION['annee']);
               $mes=" ";
               if($verif!=0){
                $mes="(déjà inscrit(e) en ".eleveCl($donnees['matelev'],$_SESSION['annee']).") ";
               }
               echo "<tr  title='".$donnees['nomelev']." ".$donnees['preelev']."
                ".$donnees['matelev']."'><td> <B>".$i."</B></td><td><B>".$donnees['nomelev']." , ".$donnees['preelev']." ".$mes."
     </B></td><td><B>".$donnees['matelev']."</B></td>
     <td>
     <div style='display:none';>
    <input name='".$nomelev."' value='".$donnees['nomelev']."'>
    <input name='".$preelev."' value='".$donnees['preelev']."'>
    <input name='".$datelev."' value='".$donnees['datelev']."'>
    <input name='".$sexe."' value='".$donnees['sexelev']."'>
    <input name='".$tel."' value='".$donnees['telev']."'>
    </div>
     <B><input type='checkbox' name='".$cocher."' value='".$donnees['matelev']."'> </B></td></tr>";
     $n=$n+1;
    } 
    $reponse->closeCursor(); 
    }

    else if(isset($_POST["rechEL"])){
      $v="SELECT id,matelev,nomelev,preelev,niveauelev,id_etab,sexelev,datelev,telev 
      FROM eleve  WHERE anelev='".$_SESSION['anrechEL']."'
       AND  id_etab='0' 
         ORDER BY nomelev";
          
  $reponse = $bdda->query($v);
  $n=0; 
  while ($donnees = $reponse->fetch())
  {
   $i=$n+1;  
   $cocher="cocher".$i;
   $nomelev="nomelev".$i; $datelev="datelev".$i;
   $preelev="preelev".$i;$sexe="sexe".$i;
   $tel="tel".$i;
   $verif=eleveEXIST($bdda,$donnees['matelev'],$_SESSION['annee']);
             $mes=" ";
             if($verif!=0){
              $mes="(déjà inscrit(e) en ".eleveCl($donnees['matelev'],$_SESSION['annee']).") ";
             }
             echo "<tr  title='".$donnees['nomelev']." ".$donnees['preelev']." ".$donnees['matelev']."'><td><B>".$i."</B></td>
             <td><B>".$donnees['nomelev']." , ".$donnees['preelev']." ".$mes."
   </B></td><td><B>".$donnees['matelev']."</B></td>
   <td>
   <div style='display:none';>
    <input name='".$nomelev."' value='".$donnees['nomelev']."'>
    <input name='".$preelev."' value='".$donnees['preelev']."'>
    <input name='".$datelev."' value='".$donnees['datelev']."'>
    <input name='".$sexe."' value='".$donnees['sexelev']."'>
    <input name='".$tel."' value='".$donnees['telev']."'>
    </div>
   
   <B><input type='checkbox' name='".$cocher."' checked value='".$donnees['matelev']."'> </B></td></tr>";
   $n=$n+1;
  } 
  $reponse->closeCursor(); 
  } 
   else{
    
              $v="SELECT id,matelev,nomelev,preelev,niveauelev,id_etab,sexelev,datelev,telev  
              FROM eleve  WHERE anelev='".$_SESSION['anrechEL']."'
               AND niveauelev='".$_SESSION['anrechCL']."'  AND id_etab='0' 
                 ORDER BY nomelev";
                  
                 if( $_SESSION['waselecta']==1){
                  $v="SELECT id,matelev,nomelev,preelev,niveauelev,id_etab  
                FROM eleve  WHERE anelev='".$_SESSION['anrechEL']."'
                 AND  id_etab='0' 
                   ORDER BY nomelev";
                 }   

 $reponse = $bdda->query($v);
         $n=0; 
         while ($donnees = $reponse->fetch())
         {
           $i=$n+1;  
           $cocher="cocher".$i; 
           $nomelev="nomelev".$i; $datelev="datelev".$i;
   $preelev="preelev".$i;$sexe="sexe".$i;
   $tel="tel".$i;
           $verif=eleveEXIST($bdda,$donnees['matelev'],$_SESSION['annee']);
           $mes=" ";
           if($verif!=0){
            $mes="(déjà inscrit(e) en ".eleveCl($donnees['matelev'],$_SESSION['annee']).") ";
           }
           echo "<tr title='".$donnees['nomelev']." ".$donnees['preelev']." ".$donnees['matelev']."'><td><B>".$i."</B></td><td><B>".$donnees['nomelev']." , ".$donnees['preelev']." ".$mes."
           </B></td><td><B>".$donnees['matelev']."</B></td>
           <td>
           <div style='display:none';>
    <input name='".$nomelev."' value='".$donnees['nomelev']."'>
    <input name='".$preelev."' value='".$donnees['preelev']."'>
    <input name='".$datelev."' value='".$donnees['datelev']."'>
    <input name='".$sexe."' value='".$donnees['sexelev']."'>
    <input name='".$tel."' value='".$donnees['telev']."'>
    </div>
           <B><input type='checkbox' name='".$cocher."'  checked value='".$donnees['matelev']."'> </B></td></tr>";
           $n=$n+1;
         } 
         $reponse->closeCursor();
}

           echo "</table>";
        






   ?>
  

    
   

   


   <?php  
    
    
   ?>   
    <div style='display:none';>
    <input name='total' value='<?php echo $n;?>'>
    </div>
    <button type="submit" name="save" id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top" data-dismiss="modal">
        Enregistrer</button> 
    </form>
    
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