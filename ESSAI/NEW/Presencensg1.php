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


$conneEns=idtl($bdda,$_SESSION['mtp'],$_SESSION['annee']); 
 
if($conneEns!=0){  

  if(isset($_POST['send'])){
    $an=$_POST['ann'];$_SESSION['anabsedit1']=$_POST['ann'];
    $clas=$_POST['clas'];$_SESSION['clasabsedit1']=$_POST['clas'];
    $trim=$_POST['trim'];$_SESSION['trimabsedit1']=$_POST['trim'];
    $ctype =$_POST['send'];$_SESSION['ctype']=$_POST['send'];
    $_SESSION['tagabsedit1']=date('Y-m-d');
    $periodklas=array();
    if(!empty($_POST['period'])){
        $periodklas=$_POST['period'];
         $_SESSION['totaligne']=count($periodklas);
         $_SESSION['periode']=$periodklas;
        
         $n=0;
         $reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  idens='".$_SESSION['idENS']."' 
          AND sup ='0' AND anens='".$_SESSION['anabsedit1']."' 
         AND idcl='".$_SESSION['clasabsedit1']."'");
                                                    
                                           while ($donnees = $reponse->fetch() AND $n<1)
                                           {
                                            
                                            $idmat=$donnees['idmat'];
                                            
                                            $i=$n+1; 
                                            $exist=existmatclassgpe($bdda,$idmat,$_SESSION['anabsedit1'],$_SESSION['clasabsedit1']);
                                            $idecl=existmatclass($bdda,$idmat,$_SESSION['anabsedit1'],$_SESSION['clasabsedit1']); 
                                            if($exist!=0){ 
                                            $_SESSION['idmatiere']=$idmat;
                                            $n++;
                                            }
                                           } 
                                           $reponse->closeCursor();




        }
  
    }
if(isset($_POST['send2'])){
     
    $_SESSION['tagabsedit1']=$_POST['tag'];
    }    

    if(isset($_POST['sendmatier'])){
     
        $_SESSION['idmatiere']=$_POST['tag'];
        }        
    if(isset($_POST['otherclas'])){ 
     
      $_SESSION['clasabsedit1']=$_POST['clas']; 
      }   

      if(isset($_POST['sendautreperiod'])){ 
        $periodklas=array();
        if(!empty($_POST['period'])){
            $periodklas=$_POST['period'];
             $_SESSION['totaligne']=count($periodklas);
             $_SESSION['periode']=$periodklas;
        } 
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
                    height:25px;
                    font-size:18px;
                    width:100px;
                    font-family:Times New Roman;
                    
                }
                
                .positionInTab{
                    border-radius:5px;  
                    float:rigth;
                    height:17px;
                    font-size:18px;
                    font-family:Harrington;
                    width:100px;
                }

               </style>
  
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
      <li class="nav-item">
      <form action='Presencensg.php' method='POST'>
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
      <?php if($_SESSION['ENSEIG']==1){  enseignantcollege(); } ?>
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

            <table class='table table-bordered table-hover'>
<tr> <td><form  method='POST' action='Presencensg1.php' name='paiem'>
<div class="select2-purple">
                    <select name="clas" class="select2" data-placeholder="Choisir ses classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                     
<?php 

 $reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  idens='".$_SESSION['idENS']."' AND sup='0' AND anens='".$_SESSION['annee']."'");
 while ($donnees = $reponse->fetch()){                            
   $phrase =$donnees['idcl'] ; 
$effect=effectif($bdda,$_SESSION['annee'],$phrase);
echo "<option value='".$phrase."' >".classparid($bdda,$phrase,$_SESSION['annee'])."   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp ( ".$effect." )</option>" ; 
   } 
$reponse->closeCursor(); 
                   ?>
	</select></div></br>
  <button type='submit' name='otherclas'  class="btn btn-primary">OK</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
 </form></td></tr></table>

            </h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">EDITER LES HEURES D'ABSENCES <?php echo $_SESSION['anabsedit1'];?> </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <ol class="breadcrumb float-sm-right">
             <?php  ?> 
              
            </ol>
            &nbsp&nbsp&nbsp<form  method='POST' action='abseditaens.php' name='paiem'> 
  <button type='submit' name='sendan'  class='butCircle'>Afficher pour l'année</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
 </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center>
    <?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo "<img src='AGAES3.png' height='180px' width='1300px'><br>
             
    <img src='espace.png' height='100px' width='1000px'><br> <br>";
    }?>  
    
           </center>
           <?php 
            
            
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
$jsem=numjour($bdda,$_SESSION['tagabsedit1']);
if(!empty($_POST['send3'])){ 
    echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
 <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
      <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['anabsedit1']." 
      <br><br> EDITER LES HEURES D'ABSENCES</br>TRIMESTRE ".$_SESSION['trimabsedit1']."
      </br>DATE : ".formatjour($bdda,$jsem)." ".format($_SESSION['tagabsedit1'])."</br>PERIODES :";
     $totaldur=0;
      for($i=0;$i<$_SESSION['totaligne'];$i++){
         echo  nomperiod($bdda,$_SESSION['periode'][$i])."&nbsp&nbsp&nbsp";
         $totaldur+=dureeperiod($bdda,$_SESSION['periode'][$i]);
      }
       echo "</br>DUREE : ".$totaldur." H
       </br>MATIERE : ".matparid($bdda,$_SESSION['idmatiere'],$_SESSION['anabsedit1'])."</b></H5>
      </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,$_SESSION['ctype'])."
</br> </br>NOM DE L'ELEVE : ".nameschuler($bdda,$_SESSION['matabsedit1'])." ".vornameschuler($bdda,$_SESSION['matabsedit1'])."
</br>CLASSE : ".classparid($bdda,$_SESSION['clasabsedit1'],$_SESSION['anabsedit1'])."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  
</div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;  } 

if(empty($_POST['send3'])){ 
  echo " <section class='content'>     <div class='container-fluid'>
<div class='row'>    <!-- left column -->  <div class='col-md-6'>
<!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
    <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['anabsedit1']." 
    <br><br> EDITER LES HEURES D'ABSENCES</br>TRIMESTRE ".$_SESSION['trimabsedit1']."
    </br>DATE : ".formatjour($bdda,$jsem)." ".format($_SESSION['tagabsedit1'])."</br>PERIODES :";
    $totaldur=0;
      for($i=0;$i<$_SESSION['totaligne'];$i++){
         echo  nomperiod($bdda,$_SESSION['periode'][$i])."&nbsp&nbsp&nbsp";
         $totaldur+=dureeperiod($bdda,$_SESSION['periode'][$i]);
      }
     echo "</br>DUREE : ".$totaldur." H
     </br>MATIERE : ".matparid($bdda,$_SESSION['idmatiere'],$_SESSION['anabsedit1'])."</b></H5>
    </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> 
<div class='form-group'>
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($bdda,$_SESSION['ctype'])."
</br>
</br>CLASSE : ".classparid($bdda,$_SESSION['clasabsedit1'],$_SESSION['anabsedit1'])."</b></H5>
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
 
echo " <table  class='table table-bordered table-hover'> 
<tr><th><form  method='POST' action='Presencensg1.php' name='paiem'> 
<div class='select2-purple'>
  <select name='tag' class='select2' data-placeholder='Choisir la matières' data-dropdown-css-class='select2-purple' style='width: 100%;'>
  ";  
  echo " <option value='".$_SESSION['idmatiere']."'>".matparid($bdda,$_SESSION['idmatiere'],$_SESSION['anabsedit1'])."</option> ";
                                           
                                           
  $reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  idens='".$_SESSION['idENS']."' AND sup ='0' AND anens='".$_SESSION['anabsedit1']."' 
  AND idcl='".$_SESSION['clasabsedit1']."' AND idmat!='".$_SESSION['idmatiere']."'");
                                             
                                    while ($donnees = $reponse->fetch())
                                    {
                                     
                                     $idmat=$donnees['idmat'];
                                     
                                     $i=$n+1; 
                                     $exist=existmatclassgpe($bdda,$idmat,$_SESSION['anabsedit1'],$_SESSION['clasabsedit1']);
                                     $idecl=existmatclass($bdda,$idmat,$_SESSION['anabsedit1'],$_SESSION['clasabsedit1']); 
                                     if($exist!=0){ 
                                        
                                     
                                     
                                     echo " <option value='".$idmat."'>".matparid($bdda,$idmat,$_SESSION['anabsedit1'])."</option> ";
                                     $n=$n+1;
                                     }
                                    } 
                                    $reponse->closeCursor();
   echo "	</select></div><br>
    <button type='submit' name='sendmatier'  class='btn btn-success' >OK</button>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
  </form></th><th> 

  <form  method='POST' action='Presencensg1.php' name='paiem'> 
<div class='select2-purple'>
  <select name='tag' class='select2' data-placeholder='Choisir les jours' data-dropdown-css-class='select2-purple' style='width: 100%;'>
  ";  
  echo "<option value='".date('Y-m-d')."'>Aujourd'hui</option>" ;                 
  $v="SELECT DISTINCT datenreg FROM absence WHERE id_etab='0' AND trimestre='".$_SESSION['trimabsedit1']."' 
  AND anelev='".$_SESSION['anabsedit1']."' AND motensgt='".$_SESSION['idENS']."'";
       $reponse = $bdda->query($v);
          
        while ($donnees = $reponse->fetch() )
        {
            $val=$donnees['datenreg'];
            if($val!=date('Y-m-d')){
              echo "<option value='".$val."'>".formatjour($bdda,numjour($bdda,$val))." ".format($val)."</option>" ;  
            }
         }
        $reponse->closeCursor();
   echo "	</select></div><br>
    <button type='submit' name='send2'  class='btn btn-success' >OK</button>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
  </form> </th></tr>
  <tr><th> 

  <form  method='POST' action='Presencensg1.php' name='paiem'> 
<div class='select2-purple'>
  <select  name='period[]'  multiple='multiple' class='select2' data-placeholder='Choisir les periodes' data-dropdown-css-class='select2-purple' style='width: 100%;'>
  ";  
                  
  $reponse = $bdda->query("SELECT * FROM periode");
  while ($donnees = $reponse->fetch()){  
    $idperiode =$donnees['id'] ;
    echo "<option value='".$idperiode."'>".$donnees['nom']." </option>" ;
} 
$reponse->closeCursor(); 
   echo "	</select></div><br>
    <button type='submit' name='sendautreperiod'  class='btn btn-success' >OK</button>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
  </form>
  
  
  </th>
  
  
  </tr> </table></Br></Br>




  <B><I>Cocher les absents</I></B>
 <table class='table table-bordered table-hover'>
<form  method='POST' action='absedit2ens.php' name='paiem'> 
<tr bgcolor='orange'>
<td><B>NOMS ET PRENOMS</B></td> ";
for($i=0;$i<$_SESSION['totaligne'];$i++){
    echo  "<td><B>".nomperiod($bdda,$_SESSION['periode'][$i])."</B></td>";
     
 }
 

echo  " </tr> ";


$listabs1=array();
$ve="SELECT * FROM eleve WHERE niveauelev='".$_SESSION['clasabsedit1']."' AND anelev='".$_SESSION['anabsedit1']."' ORDER BY nomelev  ";
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
          $nomtri="abs".$_SESSION['trimabsedit1'];
          $val=heurelevtri($bdda,$mat,$_SESSION['anabsedit1'],$nomtri);  
           $totalvaltag=totalheurelevtag($bdda,$mat,$_SESSION['anabsedit1'],$_SESSION['trimabsedit1'],$_SESSION['tagabsedit1']);
               echo "<tr>
               <td ><B>".$i."&nbsp.&nbsp ".$donnees['nomelev']." ".$donnees['preelev']."</B></td>
                ";
                for($j=0;$j<$_SESSION['totaligne'];$j++){
                  $HEURE=$heur.$j;
                  $dauert=dureeperiod($bdda,$_SESSION['periode'][$j]);
                  $valtag=existabsencelevtag($bdda,$mat,$_SESSION['anabsedit1'],$_SESSION['trimabsedit1'],$_SESSION['tagabsedit1'],
                  $_SESSION['periode'][$j],$_SESSION['idENS'],$_SESSION['idmatiere']);
                  $check=" ";
                  if($valtag>0){
                    $check="checked";
                  }   
                  
                  echo  "<td> <input name='".$HEURE."' type='checkbox'   value='".$dauert."' ".$check." > </td>";
                   
                 }

               echo "  </tr>" ;
       $n=$n+1;$k++;
      } 
     $reponse->closeCursor();
     $_SESSION['listabs1']=$listabs1;
     
     echo "<tr><td colspan='4'>
     
      

     
     <button type='submit' name='send2'  class='btn btn-primary' >Valider</button>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
  <button type='reset' class='btn btn-danger'>Annuler</button> </td> </tr> 
  </form>";
   
   
  ?>
 </table> </Br></Br></Br></Br></Br>

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