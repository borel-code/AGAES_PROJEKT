<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php'; require '../lesemploi.php'; 

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



$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
  if(isset($_POST['send'])){
    $an=$_POST['ann'];$_SESSION['anretard1']=$_POST['ann'];
    $clas=$_POST['clas'];$_SESSION['clasretard1']=$_POST['clas'];
    $trim=$_POST['trim'];$_SESSION['trimretard1']=$_POST['trim'];
    $ctype =$_POST['send'];$_SESSION['ctype']=$_POST['send'];
    $_SESSION['tagretard1']=date('Y-m-d');
    }
if(isset($_POST['send2'])){
     
    $_SESSION['tagretard1']=$_POST['tag'];
    }    
    if(isset($_POST['otherclas'])){ 
     
      $_SESSION['clasretard1']=$_POST['clas'];
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

  <style type='text/css'> 
           
         
           .butCircle{
                  width: 215px;
                  height: 45px;
                line-height: 20px;
                 border-radius: 7%;
                text-align: center;
              
              color: purple;
               
              background: pink;
               font-size:17px ;
               border: 2px solid maroon;
               }

               input[type="checkbox"]
                
{
	border-radius:5px;
	transform:translate(1px);
	float:rigth;
	height:38px;
	font-size:18px;
	width:50px;
	font-family:Times New Roman;
    
}

.positionInTab{
	border-radius:5px;  
	float:rigth;
	height:23px;
	font-size:18px;
	font-family:Harrington;
	width:50px;
}
               </style>
  
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
      <form action='retardedit.php' method='POST'>
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
        <a  class='btn btn-info' data-toggle='modal'   data-target='#modajout'>
        Choisir une classe
       </a>
         
      </li>
      
     </ul>
   </nav>
   <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link"></br> 
    <img src=" AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
      <span class="brand-text font-weight-light"> </span>
    </a> </center> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <center>  </center>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      <center> </br></br><div class="info">
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
            <h1 class="m-0"> 

            

            </h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0"> <?php  ?> </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    
           <?php 

             $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){ 
      echo "<center><img src='AGAES3.png' height='180px' width='1300px'><br>
             
            <img src='espace.png' height='100px' width='1000px'><br> <br>
           </center>" ;}
            
            
             function format($date){
                $a=substr($date,0,4);
                 
                $m=substr($date,5,2);
                 
                $j=substr($date,8,2);
                 
                $dat=$j."/".$m."/".$a;
                return $dat;
              }

              function formatjour($bdda,$n){
  if($n==1){return 'Lundi'; }if($n==2){return 'Mardi'; }if($n==3){return 'Mercredi'; }
  if($n==4){return 'Jeudi'; }if($n==5){return 'Vendredi'; }if($n==6){return 'Samedi'; }
  if($n==7){return 'Dimanche'; }
              }

              function numjour($bdda,$jo){ 
  $tab=explode('-',$jo);
  $timestamp=mktime(0,0,0,$tab[1],$tab[2],$tab[0]);
  $jsem=date('w',$timestamp);
  return $jsem;
}
$jsem=numjour($bdda,$_SESSION['tagretard1']);
if(!empty($_POST['send3'])){ 
    echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
 <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
      <div class='form-group'> <H5><b>Année scolaire : ".$_SESSION['anretard1']." 
       <br><br> EDITER LES RETARDS</br>Trimestre ".$_SESSION['trimretard1']."
       </br>DATE : ".formatjour($bdda,$jsem)." ".format($_SESSION['tagretard1'])."</b></H5>
      </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>Enseignement secondaire<br>Type d'enseignement : ".ABRVTYPENS($bdda,$_SESSION['ctype'])."
</br> </br>Nom de l'élève : ".nameschuler($bdda,$_SESSION['matretard1'])." ".vornameschuler($bdda,$_SESSION['matretard1'])."
</br>Classe : ".classparid($bdda,$_SESSION['clasretard1'],$_SESSION['anretard1'])."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  } 

if(empty($_POST['send3'])){ 
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>Année scolaire : ".$_SESSION['anretard1']." 
     <br><br> EDITER LES RETARDS</br>Trimestre ".$_SESSION['trimretard1']."
     </br>Date : ".formatjour($bdda,$jsem)." ".format($_SESSION['tagretard1'])."</b></H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>Enseignement secondaire<br>Type d'enseignement : ".ABRVTYPENS($bdda,$_SESSION['ctype'])."
</br>
</br>Classe : ".classparid($bdda,$_SESSION['clasretard1'],$_SESSION['anretard1'])."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  } 

  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
 

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
/*$chiffre=3467;
  $lettre=new ChiffreEnLettre();
  $lettre->Conversion($chiffre);*/
 
 
   echo " </Br>
 <form  method='POST' action='retardedit2.php' name='paiem'> 
 <table class='table table-bordered table-hover'>

<thead><tr bgcolor='orange'>
<td><B>NOMS ET PRENOMS</B></td>";
 if(!$isMob){ 
echo "<td><B>TOTAL DU TRIMESTRE</B></td><td><B>COCHER</B></td>";
 } 
 if($isMob){ 
echo "<td><B>COCHER</B></td>";
 } 
 echo "</tr></thead> ";


$listabs1=array();
$ve="SELECT * FROM eleve WHERE niveauelev='".$_SESSION['clasretard1']."' AND anelev='".$_SESSION['anretard1']."' ORDER BY nomelev  ";
$reponse = $bdda->query($ve);
     $n=0; $k=1;
     while ($donnees = $reponse->fetch())
     {
        $i=$n+1;
        
        $nom=$donnees['nomelev']." ".$donnees['preelev'];
        $mat=$donnees['matelev'];
          $heur="heure".$i;
          $just="justif".$i;
          $matri="matricule".$i;      
          $listabs1[$k]=$mat;
          $nomtri="abs".$_SESSION['trimretard1'];
          $val=heurelevtri($bdda,$mat,$_SESSION['anretard1'],$nomtri);  
          $valtag=existretardelevtag($bdda,$mat,$_SESSION['anretard1'],$_SESSION['trimretard1'],$_SESSION['tagretard1']);
          $totalvaltag=totalretardtri($bdda,$mat,$_SESSION['anretard1'],$_SESSION['trimretard1']);
          $check=" ";
          if($valtag>0){
            $check="checked";
          }   
          
          echo "<tr>
               <td><B>".$i."&nbsp.&nbsp ".$donnees['nomelev']." ".$donnees['preelev']."</Br>";
                if($isMob){ 
echo "<div class='btn-group w-100 mb-2'><button class='badge bg-info'>Total du trimestre ".$_SESSION['trimretard1']." : ".$totalvaltag." retard(s)</button></div>";
                }
               echo "</B></td>
               ";
               if(!$isMob){ 
               echo "<td><B>".$totalvaltag."</B></td><td><input name='".$heur."' type='checkbox'   value='1' ".$check."></td>";
               }
               if($isMob){ 
               echo "<td><input name='".$heur."' type='checkbox'   value='1' ".$check."></td>";
               }
               echo "</tr>" ;
       $n=$n+1;$k++;
      } 
     $reponse->closeCursor();
     $_SESSION['listabs1']=$listabs1;
     
   
   
  ?>
 </table> </Br></Br></Br></Br></Br>

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <div class='no-print'>
  <footer class="main-footer">
   <div class="btn-group w-100 mb-2">
    <a class="btn btn-secondary"  data-toggle='modal'   data-target='#modaday' data-filter='2'><small>  Choisir un autre jour 
  </small></a>
  <button type='submit' name='send2'  class='btn btn-primary' >Enregistrer</button>
    </div>
  </footer></div>  </form>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


   
<?php  echo "<div class='modal fade' id='modajout'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Editer les retards </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo " 
          
      <B>Choisir une classe</B><Br>    
          <table class='table table-bordered table-hover'>
<form  method='POST' action='retardedit1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B>
<select name='clas' class='select2'   data-dropdown-css-class='select2-purple' style='width: 100%;'>
                     "; 
$reponse = $bdda->query("SELECT * FROM classe WHERE sup='0'  ");
                     while ($donnees = $reponse->fetch()){                            
                        $phrase =$donnees['id'] ; 
          $p='value='.$phrase;
          $effect=effectif($bdda,$_SESSION['anretard1'],$phrase);
          if($effect>0){ 
            echo "<option ".$p." >".classparid($bdda,$phrase,$_SESSION['annee'])." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            &nbsp ( ".$effect." )</option>" ; 
           }          } 
                   $reponse->closeCursor(); 
 echo "</select>

    


</B></td> 
<td><B><button type='submit' class='btn btn-primary' name='otherclas'>OK</button></B></td> 
 </tr>  </form> </table>
       "; 
            ?>
  </br>
   
  </div>
      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<?php  echo "<div class='modal fade' id='modaday'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Editer les retards </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo " 
          
      <B>Choisir une date</B><Br>    
          <table class='table table-bordered table-hover'>
<form  method='POST' action='retardedit1.php' name='paiem'> 
<tr bgcolor='purple'>
<td><B>
<select name='tag' class='select2' data-placeholder='Choisir les jours' data-dropdown-css-class='select2-purple' style='width: 100%;'>
  ";  
  echo "<option value='".date('Y-m-d')."'>Aujourd'hui</option>" ;                 
  $v="SELECT DISTINCT datenreg FROM retard WHERE id_etab='0' AND trimestre='".$_SESSION['trimretard1']."' 
  AND anelev='".$_SESSION['anretard1']."'";
       $reponse = $bdda->query($v);
          
        while ($donnees = $reponse->fetch() )
        {
            $val=$donnees['datenreg'];
            if($val!=date('Y-m-d')){
              echo "<option value='".$val."'>".formatjour($bdda,numjour($bdda,$val))." ".format($val)."</option>" ;  
            }
         }
        $reponse->closeCursor();
 echo "</select>
</B></td> 
<td><B><button type='submit' class='btn btn-primary' name='send2'>OK</button></B></td> 
 </tr>  </form> </table></br></br>

<form  method='POST' action='retarda.php' name='paiem'> 
 <div class='btn-group w-100 mb-2'>
<button type='submit' name='sendan'   class='btn btn-secondary'>Afficher pour toute l'année scolaire</button>
</div>
</form>
  "; 
 
            ?>
  </br>
   
  </div>
      <div class="modal-footer justify-content-right">
      
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->










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