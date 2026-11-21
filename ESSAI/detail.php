<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';    require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'calfunction.php'; 
 
 
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
OR $_SESSION['code']==4 OR $_SESSION['code']==7) ){ 
  

 

  if(isset($_GET['identifier'])){
    $an=$_SESSION['annee'];$_SESSION['aninfop']=$_SESSION['annee'];
    $mat=$_GET['identifier'];$_SESSION['matinfop']=$_GET['identifier'];
    $niveauelev=Classe($bdda,$mat,$an); $_SESSION['clasinfop']=$niveauelev;
     $idnational=$_GET['idnational'];
     
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
      <form action='etatclass1.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">HISTORIQUE DE PAYE </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php   ?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <?php
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
   echo "<img src='AGAES3.png' height='180px' width='1300px'><br>
   <img src='espace.png' height='100px' width='1000px'><br> <br>";
     } ?>
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
         
         if(!$isMob){   
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>Année scolaire : ".$an." 
                <br>Noms et prénoms : ".nomElev($bdda,$mat,$an). "<br>Classe : ".classparid($bdda,$niveauelev,$an). "<br>
                   Matricule : ".$idnational. "</b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
    <div class='form-group'>
     <H5><b>Enseignement secondaire<br>Type d'endeignement : ".ABRVTYPENS($bdda,TYPENS($bdda,$niveauelev,$an))."<br>Historique de paye</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  
         }
  
  ?>
                




    <!-- /.content -->  

    
        

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
  
 // DEBUT ORDI
 if(!$isMob){ 
  
 
 echo " <table class='table table-bordered table-hover'> 
 <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>DATE</B></td><td><B>HEURE</B></td> 
 <td><B>MOTIF</B></td> <td><B>MONTANT</B></td> <td><B>REMISE</B></td>
  <td><B>FRAIS DIVERS <br>HORS SCOLARITE</B></td><td><B>RESPONSABLE</B></td </tr></thead> ";
 
 
 
  $v="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' ORDER BY date DESC";
  $reponse = $bdda->query($v);
  $n=0;
 while ($donnees = $reponse->fetch())
 {
  $i=$n+1;
 $xd=format($donnees['date'] );  
 echo "<tr> <td nowrap><B>".$i."</B></td><td nowrap><B>".$xd."</B></td><td nowrap><B>".$donnees['heure']."</B></td><td nowrap><B>SCOLARITE</B></td>
  </td> <td nowrap><B>".$donnees['montant']." fcfa</B></td> <td nowrap><B>".$donnees['remise']."</B></td>
  <td nowrap><B>".$donnees['frais']." fcfa</B></td><td nowrap><B>".respsco($bdda,$donnees['idempl'])."</B></td>
   </tr>";
  $n=$n+1;
 } 
 $reponse->closeCursor();
 
 
 
 $v="SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' ORDER BY date DESC";
 $reponse = $bdda->query($v);
 $ni=$n;
 while ($donnees = $reponse->fetch())
 {
 $j=$ni+1;  
 $xd=format($donnees['date'] );
 echo "<tr> <td nowrap><B>".$j."</B></td><td nowrap>".$xd."</B></td><td nowrap><B>".$donnees['heure']."</B></td>
 <td nowrap><B>EXAMENS</B></td><td nowrap><B>". $donnees['montant']."fcfa</B></td><td></td><td></td> 
 <td nowrap><B>".respsco($bdda,$donnees['idempl'])."</B></td></tr>";
 $ni=$ni+1;
 } 
 $reponse->closeCursor();
 
 
 $v=" SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
 $total1=0;
 $repons = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
  $total1+=$donnees['montant'] ; 
 
 
 } 
 $repons->closeCursor(); 
 
 $frais=0;
 $v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
 $total2=0;
 $reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
  $total2+=$donnees['montant'] ; 
  $frais+=$donnees['frais'] ; 
 
 } 
 $reponse->closeCursor(); 
 
 
 
 
 $v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
 
 $reponse = $bdda->query($v);
 while ($donnees = $reponse->fetch())
 {
  $rrrest=$donnees['reste'] ; 
 $rcout=$donnees['cout'] ; 
 $statut=$donnees['statut'] ; 
 
 } 
 $reponse->closeCursor(); 
 
 
 $som=0;
     $reponse = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
     while ($donnees = $reponse->fetch()){                            
         
    echo  "<tr> <td nowrap><B>".$ni."</B></td> <td nowrap><B>". format($donnees['date'])."</B></td> <td nowrap>
    <B>".$donnees['heure']."</B></td> <td nowrap><B> 
     ".nommotif($bdda,$donnees['frais']); 
     if($donnees['frais']==9){ 
     echo "(".namemois($donnees['mois'])." )";
   }
    echo "</B></td>
    <td nowrap><B>  
     ".$donnees['montant']." fcfa</B></td> <td nowrap> </td><td nowrap> </td><td nowrap><B>".respsco($bdda,$donnees['idempl'])."</B></td> </tr> " ; 
     $som+=$donnees['montant'];
     $ni++;
        }  
   $reponse->closeCursor(); 
 
 
  
 $global=$total1+$total2+$frais+$som;
  echo "<tr><td nowrap colspan='6'></td><td nowrap><B>T.PAYE SCOL</B></td><td nowrap><B>".$total2." fcfa</B></td></tr>";
 echo "<tr><td nowrap colspan='6'></td><td nowrap><B>COUT SCOLARITE (".$statut.")</B></td><td nowrap><B>".$rcout." fcfa</B></td></tr>";
 echo "<tr><td nowrap colspan='6'></td><td nowrap><B>RESTE SCOLARITE</B></td><td nowrap><B>".$rrrest." fcfa</B></td></tr>";
 echo "<tr><td nowrap colspan='6'></td><td nowrap><B>EXAMENS</B></td><td nowrap><B>".$total1." fcfa</B></td></tr>";
 echo "<tr><td nowrap colspan='6'></td><td nowrap><B>TOTAL COMPLET VERSE</B></td><td nowrap><B>".$global." fcfa</B></td></tr>";
 echo " </table>
 
 </Br>
  <section class='content'>     <div class='container-fluid'>
         <div class='row'> 
         <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
     <div class='form-group'>
     <b> <U> SIGNATURE DU PARENT </U><br> </b>
 </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
 </div> 
  <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
     <div class='form-group'>
     <b> <U> ECONOMAT </U><br>".$_SESSION['nom']."</b></H5>
 </div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
 </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>
 </Br></Br></Br></Br>
 
 ";
   
 
 
  
  
 echo " </table>";
  }
 //FIN ORDI


 // DEBUT MOBILE

 if($isMob){ 
  
 
    echo "
   
    <div class='callout callout-warning'><b>Noms et prénoms : ".nomElev($bdda,$mat,$an)."<br>
    Matricule : ".$idnational."<br>
   Classe : ".classparid($bdda,$niveauelev,$an). "<br> ";
  echo "Année scolaire : ".$an."<br>
   </b></div> ";
   $v="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' ORDER BY date DESC";
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
   
   
  
  $v="SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."' ORDER BY date DESC";
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
  Responsable : ".respsco($bdda,$donnees['idempl'])." <br>
  
   </b></div>";
  $ni=$ni+1;
  } 
  $reponse->closeCursor();
  
  $v=" SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
  $total1=0;
  $repons = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total1+=$donnees['montant'] ; 
  
  
  } 
  $repons->closeCursor(); 
  
  
  $frais=0;
  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
   $frais+=$donnees['frais'] ; 
  
  } 
  $reponse->closeCursor(); 
  

  $v=" SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
  $total2=0;
  $reponse = $bdda->query($v);
  while ($donnees = $reponse->fetch())
  {
   $total2+=$donnees['montant'] ; 
  
  
  } 
  $reponse->closeCursor(); 
  
  
  
  
  $v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$an."'";
  
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
  <table class='table table-bordered table-hover'> ";
  $reponse = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$an."'");
  while ($donnees = $reponse->fetch()){                            
      
 echo  "<tr> <td nowrap>".$ni."</td> <td nowrap>". format($donnees['date'])."</td> <td nowrap>
 ".$donnees['heure']."</td> <td nowrap> 
  ".nommotif($bdda,$donnees['frais']); 
  if($donnees['frais']==9){ 
  echo "(".namemois($donnees['mois'])." )";
}
 echo "</td>
 <td nowrap>  
  ".$donnees['montant']." fcfa</td> <td nowrap> </td><td nowrap> </td><td nowrap>".respsco($bdda,$donnees['idempl'])."</td> </tr> " ; 
  $som+=$donnees['montant'];
  $ni++;
     }  
$reponse->closeCursor(); 
echo "</table></div></br>";

   
  $total=$total1+$total2;
  
  $global=$total1+$total2+$frais+$som;
echo "<div class='callout callout-success'><b>Total de la scolarité déjà payé : ".$total." fcfa <br>
Coût de la scolarité (statut : ".$statut.") : ".$rcout." fcfa <br>";
echo "
 Reste de la scolarité : ".$rrrest." fcfa <br>
 Examens : ".$total1." fcfa <br>
Total complet versé : ".$global." fcfa <br>
 </b></div>";
 
 
 
  
   
  
  }


 //FIN MOBILE
   ?>
 </Br></Br></Br></Br></Br>

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