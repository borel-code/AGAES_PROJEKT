<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';require '../listabrvtype.php';  require '../bullinfo.php';


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


function normaliser($chaine){



$acces=array();
$acces=explode(' ',$chaine);
$long=count($acces);
if($long>0){
for($i=0; $i<$long;$i++){
echo $acces[$i].'<br>';
}
}

else{
echo $chaine ;
}
	 
}


$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  
	

if(isset($_GET['vu'])){ 
    $_SESSION['evalcalcul']=$_POST['eval']; 
    $listalphab=array();
    $m=1;
    $v="SELECT  matelev,anelev,nomelev,niveauelev FROM eleve  WHERE anelev='".$_SESSION['ancalcul']."'
     AND niveauelev='".$_SESSION['clascalcul']."'  ORDER BY nomelev";
     $reponse = $bdda->query($v);
        while ($donnees = $reponse->fetch())
       {
      $listalphab[$m]=$donnees['matelev'];
      $m++;
      } 
       $reponse->closeCursor(); 
     $_SESSION['listalphab']=$listalphab;
}

$lesidgroupe=array();

$v="SELECT *  FROM groupmatensg1   WHERE   typeEns='".$_SESSION['typensgcalcul']."'" ;
   $reponse= $bdda->query($v);
    $i=1;   
    while ($donnees= $reponse->fetch())
     {
      $lesidgroupe[$i]=$donnees['code'];


      $i++;
    } 
    $reponse->closeCursor();   
$NBRGROUPE=count($lesidgroupe);


//PROF TITUL
$cnititul=" ";
       $de=ensgdstitulaire($_SESSION['clascalcul'],$_SESSION['ancalcul']);
//PROF TITULAIRE

  

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
  
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
</head>
<?php    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    
    ?>
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
      <form action='insertcalculvu1.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab();?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0"> </h1>&nbsp&nbsp&nbsp
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
    <center>
    <?php   
    
    $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
    
    $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
    if(!$isMob){    
    echo " <img src='AGAES3.png' height='200px' width='1300px'><br>
  
    <img src='espace.png' height='100px' width='1000px'><br> <br>";
    }
    
    if(!isset($_SESSION['modaff'])){
       $_SESSION['modaff']=0;  // Par ordre de merite
    }
    if(!isset($_SESSION['modafford'])){
       $_SESSION['modafford']=0;  // Par ordre de merite
    }

    if(isset($_GET['mode'])){
      $_SESSION['modaff']=$_GET['mode'];
    }
    if(isset($_GET['ordre'])){
      $_SESSION['modafford']=$_GET['ordre'];
    }
    if(isset($_POST['send2'])){
       $_SESSION['modaff']=0;
       $_SESSION['modafford']=0;
       $_SESSION['infotranche']="Tous les élèves";
       $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."'  ORDER BY  moytrim DESC";
    }

    if($_SESSION['modaff']==0){
       $_SESSION['infoaff']="Liste par ordre de mérite";
       if($_SESSION['modafford']==0){
        $_SESSION['infotranche']="Tous les élèves";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==1){
        $_SESSION['infotranche']="Les élèves admis";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim >='10'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==2){
        $_SESSION['infotranche']="Les élèves échoués";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'10'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==3){
        $_SESSION['infotranche']="Les moyennes inférieures à 8";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'8'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==4){
        $_SESSION['infotranche']="Les moyennes à partir de 8 et inférieures à 10";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'10' AND moytrim >='8'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==5){
        $_SESSION['infotranche']="Les moyennes à partir de 10 et inférieures à 12";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'12' AND moytrim >='10'  ORDER BY  moytrim DESC";
       }
       if($_SESSION['modafford']==6){
        $_SESSION['infotranche']="Les moyennes à partir de 12 et jusqu'à 20";
        $_SESSION['modrequest']="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
          AND idcl='".$_SESSION['clascalcul']."' AND moytrim <='20' AND moytrim >='12'  ORDER BY  moytrim DESC";
       }
    }







    if($_SESSION['modaff']==1){
       $_SESSION['infoaff']="Liste par ordre alphabétique";
       if($_SESSION['modafford']==0){
        $_SESSION['infotranche']="Tous les élèves";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."'  ORDER BY  moytrim DESC";
          return $theme;
        }
        
       }
       if($_SESSION['modafford']==1){
        $_SESSION['infotranche']="Les élèves admis";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim >='10'   ORDER BY  moytrim DESC";
          return $theme;
        }
       }
       if($_SESSION['modafford']==2){
        $_SESSION['infotranche']="Les élèves échoués";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'10'   ORDER BY  moytrim DESC";
          return $theme;
        }
      }
       if($_SESSION['modafford']==3){
        $_SESSION['infotranche']="Les moyennes inférieures à 8";
        function kontrolapha($matel){
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'8'    ORDER BY  moytrim DESC";
          return $theme;
        } 
       }
       if($_SESSION['modafford']==4){
        $_SESSION['infotranche']="Les moyennes à partir de 8 et inférieures à 10";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'10' AND moytrim >='8'    ORDER BY  moytrim DESC";
          return $theme;
        } 
       }
       if($_SESSION['modafford']==5){
        $_SESSION['infotranche']="Les moyennes à partir de 10 et inférieures à 12";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim <'12' AND moytrim >='10'    ORDER BY  moytrim DESC";
          return $theme;
        } 
       }
       if($_SESSION['modafford']==6){
        $_SESSION['infotranche']="Les moyennes à partir de 12 et jusqu'à 20";
        function kontrolapha($matel){
           $tischmoy="markmoytrim".$_SESSION['trimcalcul']; $keytischmoy="idmarkmoy".$_SESSION['trimcalcul'];
         $theme="SELECT  *  FROM ".$tischmoy."  WHERE anelev='".$_SESSION['ancalcul']."' 
         AND matelev='".$matel."' AND idcl='".$_SESSION['clascalcul']."' AND moytrim <='20' AND moytrim >='12'   ORDER BY  moytrim DESC";
          return $theme;
        } 
        }
    }


    
    
    ?>
  
            
           </center>
           <?php 
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
                 <br><br>CLASSE : ".classparid($_SESSION['clascalcul'],$_SESSION['ancalcul'])." </br>PROCES VERBAUX DU TRIMESTRE ".$_SESSION['trimcalcul']."</br>
                 ".$_SESSION['infoaff']." </br>".$_SESSION['infotranche']."</b> 
                 </H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : ".ABRVTYPENS($_SESSION['typensgcalcul'])."</br> ENSEIGNANT(E) TITULAIRE : ".$de."</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;   
 
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  

     
 $totaleval=array();
 if($_SESSION['trimcalcul']==1){ $debut=1;
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  for($i=1;$i<$nbrevaltri1+1;$i++){
 
    $totaleval[$i]=$i;
  }
}
if($_SESSION['trimcalcul']==2){
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
  $nbrevaltri2=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $total=$nbrevaltri1+$nbrevaltri2;
  $j=$nbrevaltri1+1; $debut=$j;
  $grand=$total-$j+1; 
  for($i=1;$i<$grand+1;$i++){  
     
    $totaleval[$i]=$j;  $j++;
  }
}
if($_SESSION['trimcalcul']==3){
  $nbrevaltri1=nbreval($_SESSION['clascalcul'],1,$_SESSION['ancalcul']);
  $nbrevaltri2=nbreval($_SESSION['clascalcul'],2,$_SESSION['ancalcul']);
  $nbrevaltri3=nbreval($_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
  $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
  $j=$nbrevaltri1+$nbrevaltri2+1; $debut=$j;
  $grand=$total-$j+1;
  for($i=1;$i<$grand+1;$i++){  
    
    $totaleval[$i]=$j;  $j++;
  }
}

if($_SESSION['trimcalcul']==1){ $nbrecomp=$nbrevaltri1;}
 if($_SESSION['trimcalcul']==2){ $nbrecomp=$nbrevaltri2;}  
 if($_SESSION['trimcalcul']==3){ $nbrecomp=$nbrevaltri3;}  

$fachklasse=array(); $pl=0;
  if($_SESSION['modaff']==0){   // ORDRE MERITE
  //debut ordi 
  if(!$isMob){ 
    echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td ><B>NOMS ET PRENOMS</B> </td> ";
  $allcof=0;
for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    $num=$lesidgroupe[$j]; 
   $vs="SELECT  *  FROM matclasse  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND idgp='".$num."' AND sup='0'";
$reponses = $bdda->query($vs);
while ($donneess = $reponses->fetch())
{
    $idmat=$donneess['idmat'];
    $namemat=matparid($idmat,$_SESSION['ancalcul']);
    $fachklasse[$pl]=$idmat;
    
  //  $coeff=returncoeftrim($idmat ,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],
   //     $_SESSION['ancalcul']);
  /* $coeff=1;
        $allcof+=$coeff;
        if($coeff!=" " AND !empty($coeff)){
            $coeff="( ".$coeff." )";
        }
   */         
    echo"<td><SMALL><B>"; echo normaliser($namemat); echo" </Br><center>( 20 )</center></B></SMALL> </td>";   
$pl++;
}
  $reponses->closeCursor();  
}    
echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr></thead> ";  

$reponse = $bdda->query($_SESSION['modrequest']);
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
     $elevMCL=-1;
     $elevFM=-1;
     $elevLM=-1;
    $elevCPSE=-1; 
    $elevADM=-1;
   $elevPCT=-1;
   while ($donnees = $reponse->fetch())
   {
    $effec++; $mazt=$donnees['matelev'];
    $datenschuler=datenschuler($mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
     $mazt=$donnees['matelev'];
     $MOY=$donnees['moytrim'];   if($MOY==-1){$MOY=" ";}
     $RG=$donnees['rgtrim'];
      $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
     $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
     $elevMCL=$donnees['mcltrim'];  $elevFM=$donnees['maxtrim']; $elevLM=$donnees['mintrim'];
$elevCPSE=$donnees['cpse'];  $elevADM=$donnees['adm'];  $elevPCT=$donnees['pctrim'];
if($RG!=" " AND !empty($RG)){
           if($RG==1){
            $RG=$RG."<sup>er(e)/st</sup>";
            }
            else if($RG==2){
               $RG=$RG."<sup>e/nd</sup>";
               }
               else if($RG==3){
                  $RG=$RG."<sup>e/rd</sup>";
                  }
            else{
               $RG=$RG."<sup>e/th</sup>";
               }
        }
 echo "<tr><td><B>".$nom." ".$prenom." </B> </td>";
 $taille=count($fachklasse);
if($taille>0){
   for($cl=0; $cl<$taille; $cl++){
      $searchnotbulltrim=searchnotbulltrim($fachklasse[$cl],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
     $mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; 

if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 
   if($mcl==-1){$mcl=" ";}  if($mcl!=-1){$mcl=$mcl;}   if($mini==-1){$mini=" ";}  if($mini!=-1){$mini=$mini;}
  if($maxi==-1){$maxi=" ";}  if($maxi!=-1){$maxi=$maxi;}  
  if($pct==-1){$pct=" ";}  if($pct!=-1){$pct=$pct;}   
    if($rgmat==-1){$rgmat=" ";}  if($rgmat!=-1){$rgmat=$rgmat;} 
  

  $bgcolor=" ";
  if($marktrim!=" " AND !empty($marktrim)){
               if($marktrim<10){
                    $bgcolor="bgcolor='red' ";
               }
               else{
                  $marktrim= $marktrim ;
               }
            }
            if($marktrim==" " AND empty($marktrim)){
               $marktrim= $marktrim ;
            }


  echo "<TD ".$bgcolor."><center><B>".$marktrim."</B></center></TD>";
   }

}

if($MOY!=" " AND !empty($MOY)){
               if($MOY<10){
                    $bgcolormoy="bgcolor='red'";
               }
               if($MOY>=10){
                    $bgcolormoy="bgcolor='green' ";
               }
               else{
                  $MOY= $MOY ;
               }
            }
            if($MOY==" " AND empty($MOY)){
               $MOY= $MOY ;
            }
echo "<TD ".$bgcolormoy."><center><B>".$MOY."</B></center></TD><TD><center><B>".$RG."</B></center></TD>";
echo "</tr>";
     }
  $reponses->closeCursor(); 
     
   echo " </table>";
  
  
if($elevMCL==-1){$elevMCL=" ";}
               if($elevFM==-1){$elevFM=" ";}
               if($elevLM==-1){$elevLM=" ";}
               if($elevCPSE==-1){$elevCPSE=" ";} 
               if($elevADM==-1){$elevADM=" ";} 
               if($elevPCT==-1){$elevPCT=" ";} 
    $_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$elevCPSE;
$_SESSION['admis']=$elevADM;
$_SESSION['prozent']=$elevPCT;
$_SESSION['moyennecl']=$elevMCL;

   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE DE TOUTE LA CLASSE</u>&nbsp&nbsp
   <I> </I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Composés : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES DE TOUTE LA CLASSE</u>&nbsp&nbsp
    <I> </I></B></br>
    <UL>";
 
    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $cormul=array();
      $cormul=explode("@",$searchnotgptrim);
       
      
      $PCTCLASSEGP=$cormul[7];
      $MOYCLASSEGP=$cormul[2];
      $ADMISCLASSEGP=$cormul[5];
      $CPSECLASSEGP=$cormul[6];
      if($PCTCLASSEGP==-1){$PCTCLASSEGP=" ";}   if($MOYCLASSEGP==-1){$MOYCLASSEGP=" ";} 
      if($ADMISCLASSEGP==-1){$ADMISCLASSEGP=" ";}  if($CPSECLASSEGP==-1){$CPSECLASSEGP=" ";}  
           echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbsp Composés :&nbsp&nbsp ".$CPSECLASSEGP."&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }
 
 
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}//FIN ORDI

//DEBUT MOBILE
 if($isMob){ 
    

for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    $num=$lesidgroupe[$j]; 
   $vs="SELECT  *  FROM matclasse  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND idgp='".$num."' AND sup='0'";
$reponses = $bdda->query($vs);
while ($donneess = $reponses->fetch())
{
    $idmat=$donneess['idmat'];
    $namemat=matparid($idmat,$_SESSION['ancalcul']);
    $fachklasse[$pl]=$idmat;
      
   // echo"<td><SMALL><B>"; echo normaliser($namemat); echo" </Br><center>( 20 )</center></B></SMALL> </td>";   
$pl++;
}
  $reponses->closeCursor();  
}   

   
          $reponse = $bdda->query($_SESSION['modrequest']);
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
     $elevMCL=-1;
     $elevFM=-1;
     $elevLM=-1;
    $elevCPSE=-1; 
    $elevADM=-1;
   $elevPCT=-1;
   while ($donnees = $reponse->fetch())
   {
    $effec++; $mazt=$donnees['matelev'];
    $datenschuler=datenschuler($mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
     $mazt=$donnees['matelev'];
     $MOY=$donnees['moytrim'];  if($MOY==-1){$MOY=" ";}
     $RG=$donnees['rgtrim'];
     $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
     $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
     $elevMCL=$donnees['mcltrim'];  $elevFM=$donnees['maxtrim']; $elevLM=$donnees['mintrim'];
$elevCPSE=$donnees['cpse'];  $elevADM=$donnees['adm'];  $elevPCT=$donnees['pctrim'];
      
     if($note1==-1){$note1=" ";}  if($note2==-1){$note2=" ";}  if($note3==-1){$note3=" ";}
     if($rg1==-1){$rg1=" ";}  if($rg2==-1){$rg2=" ";}  if($rg3==-1){$rg3=" ";}

     if($RG!=" " AND !empty($RG)){
           if($RG==1){
            $RG=$RG."<sup>er(e)/st</sup>";
            }
            else if($RG==2){
               $RG=$RG."<sup>e/nd</sup>";
               }
               else if($RG==3){
                  $RG=$RG."<sup>e/rd</sup>";
                  }
            else{
               $RG=$RG."<sup>e/th</sup>";
               }
        }

      

    echo "<div class='callout callout-success'><b>";
    echo "Noms et prénoms : ".$nom." ".$prenom." </Br>";
    
     

$taille=count($fachklasse);
if($taille>0){
   for($cl=0; $cl<$taille; $cl++){
      $searchnotbulltrim=searchnotbulltrim($fachklasse[$cl],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
     $mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; 

if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 
   if($mcl==-1){$mcl=" ";}  if($mcl!=-1){$mcl=$mcl;}   if($mini==-1){$mini=" ";}  if($mini!=-1){$mini=$mini;}
  if($maxi==-1){$maxi=" ";}  if($maxi!=-1){$maxi=$maxi;}  
  if($pct==-1){$pct=" ";}  if($pct!=-1){$pct=$pct;}   
    if($rgmat==-1){$rgmat=" ";}  if($rgmat!=-1){$rgmat=$rgmat;} 
  

  $bgcolor=" ";
  if($marktrim!=" " AND !empty($marktrim)){
               if($marktrim<10){
                    $bgcolor="bgcolor='red' ";
               }
               else{
                  $marktrim= $marktrim ;
               }
            }
            if($marktrim==" " AND empty($marktrim)){
               $marktrim= $marktrim ;
            }


  echo  matparid($fachklasse[$cl],$_SESSION['ancalcul'])." : ".$marktrim."</Br>";
   }

}



   echo "Moyenne trimestrielle : ".$MOY."</Br>";
   if($RG!=" " AND !empty($RG)){
       echo "Rang trimestrielle : ".$RG."</Br>";
   }
   else{
       echo"Rang trimestrielle :  </Br>";
   }  
   
    

     for($j=1;$j<=$NBRGROUPE;$j++){
        //$lesidgroupe[$j]
         $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $nomgp=groupmatensgnom($lesidgroupe[$j]);
$cormul=array();
      $cormul=explode("@",$searchnotgptrim);
      $notegp=$cormul[0]; $rggp=$cormul[1]; 
        
        
           
    }


  
 




 


  
    echo "
    </b></div>";
     
   
  
    
   
   } 
   $reponse->closeCursor();
   
   if(isset($mazt)){ 
if($elevMCL==-1){$elevMCL=" ";}
               if($elevFM==-1){$elevFM=" ";}
               if($elevLM==-1){$elevLM=" ";}
               if($elevCPSE==-1){$elevCPSE=" ";} 
               if($elevADM==-1){$elevADM=" ";} 
               if($elevPCT==-1){$elevPCT=" ";} 
    $_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$elevCPSE;
$_SESSION['admis']=$elevADM;
$_SESSION['prozent']=$elevPCT;
$_SESSION['moyennecl']=$elevMCL;

   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE DE TOUTE LA CLASSE</u>&nbsp&nbsp
   <I> </I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Composés : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES DE TOUTE LA CLASSE</u>&nbsp&nbsp
    <I> </I></B></br>
    <UL>";

    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $cormul=array();
      $cormul=explode("@",$searchnotgptrim);
       
      
      $PCTCLASSEGP=$cormul[7];
      $MOYCLASSEGP=$cormul[2];
      $ADMISCLASSEGP=$cormul[5];
      $CPSECLASSEGP=$cormul[6];
      if($PCTCLASSEGP==-1){$PCTCLASSEGP=" ";}   if($MOYCLASSEGP==-1){$MOYCLASSEGP=" ";} 
      if($ADMISCLASSEGP==-1){$ADMISCLASSEGP=" ";}  if($CPSECLASSEGP==-1){$CPSECLASSEGP=" ";}  
           echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbsp Composés :&nbsp&nbsp ".$CPSECLASSEGP."&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }

  }
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}


//FIN MOBILE


     }

     // FIN ORDRE DE MERITE

     //DEBUT ORDRE ALPHABETIQUE




      if($_SESSION['modaff']==1){   // ORDRE ALPHABETIQUE
  //debut ordi 
  if(!$isMob){ 
    echo " <table class='table table-bordered table-hover'> 
<thead><tr bgcolor='orange'><td ><B>N°</B> </td><td ><B>NOMS ET PRENOMS</B> </td> ";
 $allcof=0;
for($j=1;$j<=$NBRGROUPE;$j++){
    $nomgp=groupmatensgnom($lesidgroupe[$j]);
    $num=$lesidgroupe[$j]; 
   $vs="SELECT  *  FROM matclasse  WHERE anens='".$_SESSION['ancalcul']."' 
    AND idcl='".$_SESSION['clascalcul']."' AND idgp='".$num."' AND sup='0'";
$reponses = $bdda->query($vs);
while ($donneess = $reponses->fetch())
{
    $idmat=$donneess['idmat'];
    $namemat=matparid($idmat,$_SESSION['ancalcul']);
    $fachklasse[$pl]=$idmat;
    
           
    echo"<td><SMALL><B>"; echo normaliser($namemat); echo" </Br><center>( 20 )</center></B></SMALL> </td>";   
$pl++;
}
  $reponses->closeCursor();  
}    
echo"<td><B> Moyenne trimestrielle </B></td><td><B> Rang trimestrielle</B></td></tr></thead> "; 


        
    
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
     $elevMCL=-1;
     $elevFM=-1;
     $elevLM=-1;
    $elevCPSE=-1; 
    $elevADM=-1;
   $elevPCT=-1;
   for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 

     $reponse = $bdda->query(kontrolapha($_SESSION['listalphab'][$m]));
   while ($donnees = $reponse->fetch())
   {
   $effec++; $mazt=$donnees['matelev'];
    $datenschuler=datenschuler($mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
     $mazt=$donnees['matelev'];
     $MOY=$donnees['moytrim'];  if($MOY==-1){$MOY=" ";}
     $RG=$donnees['rgtrim'];
      $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
     $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
     $elevMCL=$donnees['mcltrim'];  $elevFM=$donnees['maxtrim']; $elevLM=$donnees['mintrim'];
$elevCPSE=$donnees['cpse'];  $elevADM=$donnees['adm'];  $elevPCT=$donnees['pctrim'];
if($RG!=" " AND !empty($RG)){
           if($RG==1){
            $RG=$RG."<sup>er(e)/st</sup>";
            }
            else if($RG==2){
               $RG=$RG."<sup>e/nd</sup>";
               }
               else if($RG==3){
                  $RG=$RG."<sup>e/rd</sup>";
                  }
            else{
               $RG=$RG."<sup>e/th</sup>";
               }
        }
 echo "<tr><td><B>".$m." </B> </td><td><B>".$nom." ".$prenom." </B> </td>";
 $taille=count($fachklasse);
if($taille>0){
   for($cl=0; $cl<$taille; $cl++){
      $searchnotbulltrim=searchnotbulltrim($fachklasse[$cl],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
     $mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; 

if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 
   if($mcl==-1){$mcl=" ";}  if($mcl!=-1){$mcl=$mcl;}   if($mini==-1){$mini=" ";}  if($mini!=-1){$mini=$mini;}
  if($maxi==-1){$maxi=" ";}  if($maxi!=-1){$maxi=$maxi;}  
  if($pct==-1){$pct=" ";}  if($pct!=-1){$pct=$pct;}   
    if($rgmat==-1){$rgmat=" ";}  if($rgmat!=-1){$rgmat=$rgmat;} 
  

  $bgcolor=" ";
  if($marktrim!=" " AND !empty($marktrim)){
               if($marktrim<10){
                    $bgcolor="bgcolor='red' ";
               }
               else{
                  $marktrim= $marktrim ;
               }
            }
            if($marktrim==" " AND empty($marktrim)){
               $marktrim= $marktrim ;
            }


  echo "<TD ".$bgcolor."><center><B>".$marktrim."</B></center></TD>";
   }

}

if($MOY!=" " AND !empty($MOY)){
               if($MOY<10){
                    $bgcolormoy="bgcolor='red'";
               }
               if($MOY>=10){
                    $bgcolormoy="bgcolor='green' ";
               }
               else{
                  $MOY= $MOY ;
               }
            }
            if($MOY==" " AND empty($MOY)){
               $MOY= $MOY ;
            }
echo "<TD ".$bgcolormoy."><center><B>".$MOY."</B></center></TD><TD><center><B>".$RG."</B></center></TD>";
echo "</tr>";
     }
  $reponses->closeCursor(); 
    }   
   echo " </table>";
 
if(isset($mazt)){ 
if($elevMCL==-1){$elevMCL=" ";}
               if($elevFM==-1){$elevFM=" ";}
               if($elevLM==-1){$elevLM=" ";}
               if($elevCPSE==-1){$elevCPSE=" ";} 
               if($elevADM==-1){$elevADM=" ";} 
               if($elevPCT==-1){$elevPCT=" ";} 
    $_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$elevCPSE;
$_SESSION['admis']=$elevADM;
$_SESSION['prozent']=$elevPCT;
$_SESSION['moyennecl']=$elevMCL;

   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE DE TOUTE LA CLASSE</u>&nbsp&nbsp
   <I> </I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Composés : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES DE TOUTE LA CLASSE</u>&nbsp&nbsp
    <I> </I></B></br>
    <UL>";

    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $cormul=array();
      $cormul=explode("@",$searchnotgptrim);
       
      
      $PCTCLASSEGP=$cormul[7];
      $MOYCLASSEGP=$cormul[2];
      $ADMISCLASSEGP=$cormul[5];
      $CPSECLASSEGP=$cormul[6];
      if($PCTCLASSEGP==-1){$PCTCLASSEGP=" ";}   if($MOYCLASSEGP==-1){$MOYCLASSEGP=" ";} 
      if($ADMISCLASSEGP==-1){$ADMISCLASSEGP=" ";}  if($CPSECLASSEGP==-1){$CPSECLASSEGP=" ";}  
           echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbsp Composés :&nbsp&nbsp ".$CPSECLASSEGP."&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }

  }
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}//FIN ORDI

//DEBUT MOBILEALPHAB
 if($isMob){ 
    
   
           
     $n=0;$totalmoy=0;$effec=0;$effeclasse=0;$admis=0;$prozent=" "; $moyennecl=" ";
     $elevMCL=-1;
     $elevFM=-1;
     $elevLM=-1;
    $elevCPSE=-1; 
    $elevADM=-1;
   $elevPCT=-1;
  
 for($m=1;$m<=count($_SESSION['listalphab']);$m++){ 
     $reponse = $bdda->query(kontrolapha($_SESSION['listalphab'][$m]));
   while ($donnees = $reponse->fetch())
   {
    $effec++; $mazt=$donnees['matelev'];
    $datenschuler=datenschuler($mazt,$_SESSION['ancalcul'],$_SESSION['trimcalcul']);
        $tableau=array();  $tableau=explode("@",$datenschuler);
    $nom=$tableau[0]; $prenom=$tableau[1];
     $mazt=$donnees['matelev'];
     $MOY=$donnees['moytrim'];   if($MOY==-1){$MOY=" ";}
     $RG=$donnees['rgtrim'];
     $note1=$donnees['moy1']; $note2=$donnees['moy2']; $note3=$donnees['moy3'];  
     $rg1=$donnees['rg1']; $rg2=$donnees['rg2']; $rg3=$donnees['rg3'];
     $elevMCL=$donnees['mcltrim'];  $elevFM=$donnees['maxtrim']; $elevLM=$donnees['mintrim'];
$elevCPSE=$donnees['cpse'];  $elevADM=$donnees['adm'];  $elevPCT=$donnees['pctrim'];
      
     if($note1==-1){$note1=" ";}  if($note2==-1){$note2=" ";}  if($note3==-1){$note3=" ";}
     if($rg1==-1){$rg1=" ";}  if($rg2==-1){$rg2=" ";}  if($rg3==-1){$rg3=" ";}

     if($RG!=" " AND !empty($RG)){
           if($RG==1){
            $RG=$RG."<sup>er(e)/st</sup>";
            }
            else if($RG==2){
               $RG=$RG."<sup>e/nd</sup>";
               }
               else if($RG==3){
                  $RG=$RG."<sup>e/rd</sup>";
                  }
            else{
               $RG=$RG."<sup>e/th</sup>";
               }
        }

     

        

        
    echo "<div class='callout callout-success'><b>";
    echo "Noms et prénoms : ".$nom." ".$prenom." </Br>";
    
     

$taille=count($fachklasse);
if($taille>0){
   for($cl=0; $cl<$taille; $cl++){
      $searchnotbulltrim=searchnotbulltrim($fachklasse[$cl],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
      $formul=array();
      $formul=explode("@",$searchnotbulltrim);
// $note1."@".$ok1."@".$note2."@".$ok2."@".$note3."@".$ok3."@".$notetrim."@".$oktrim."@".$coef."@".$notrimcoef;
     $mark1=$formul[0]; $ok1=$formul[1];  $mark2=$formul[2]; $ok2=$formul[3];
$mark3=$formul[4]; $ok3=$formul[5]; $marktrim=$formul[6]; $oktrim=$formul[7];
$coef=$formul[8]; $maktrimcoef=$formul[9]; $rgmat=$formul[10];
$mcl=$formul[11]; $mini=$formul[12]; $cpse=$formul[15]; $adm=$formul[14];
$pct=$formul[16]; $maxi=$formul[13]; 

if($oktrim==0 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= " ";} if($oktrim==1 AND $marktrim==-1){$marktrim=" "; $maktrimcoef= "0.00";} if($oktrim==1 AND $marktrim!=-1){$marktrim=$marktrim; $maktrimcoef=$maktrimcoef;}
if($coef==-1){$coef=" ";}  if($oktrim==0){$coef=" ";} if($oktrim==1){$coef=$coef+0;} 
   if($mcl==-1){$mcl=" ";}  if($mcl!=-1){$mcl=$mcl;}   if($mini==-1){$mini=" ";}  if($mini!=-1){$mini=$mini;}
  if($maxi==-1){$maxi=" ";}  if($maxi!=-1){$maxi=$maxi;}  
  if($pct==-1){$pct=" ";}  if($pct!=-1){$pct=$pct;}   
    if($rgmat==-1){$rgmat=" ";}  if($rgmat!=-1){$rgmat=$rgmat;} 
  

  $bgcolor=" ";
  if($marktrim!=" " AND !empty($marktrim)){
               if($marktrim<10){
                    $bgcolor="bgcolor='red' ";
               }
               else{
                  $marktrim= $marktrim ;
               }
            }
            if($marktrim==" " AND empty($marktrim)){
               $marktrim= $marktrim ;
            }


  echo  matparid($fachklasse[$cl],$_SESSION['ancalcul'])." : ".$marktrim."</Br>";
   }

}


   echo "Moyenne trimestrielle : ".$MOY."</Br>";
   if($RG!=" " AND !empty($RG)){
       echo "Rang trimestrielle : ".$RG."</Br>";
   }
   else{
       echo"Rang trimestrielle :  </Br>";
   }  
   
   echo "<ul>";

     for($j=1;$j<=$NBRGROUPE;$j++){
        //$lesidgroupe[$j]
         $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $nomgp=groupmatensgnom($lesidgroupe[$j]);
$cormul=array();
      $cormul=explode("@",$searchnotgptrim);
      $notegp=$cormul[0]; $rggp=$cormul[1]; 
        if($notegp==-1){$notegp=" ";} 
        if($rggp==-1){$rggp=" ";} 
        
          if($rggp!=" " AND !empty($rggp)){
           if($rggp==1){
            $rggp=$rggp."<sup>er(e)/st</sup>";
            }
            else if($rggp==2){
               $rggp=$rggp."<sup>e/nd</sup>";
               }
               else if($rggp==3){
                  $rggp=$rggp."<sup>e/rd</sup>";
                  }
            else{
               $rggp=$rggp."<sup>e/th</sup>";
               }
        }
           echo "<li>";
     echo "Synthèse ".$nomgp." du trimestre</Br>";
     echo "</li>";
        
        echo"&nbsp &nbsp Note : ".$notegp." &nbsp &nbsp Rang : ".$rggp." </Br>";
        
    }


  
 echo "</ul>";




if($nbrecomp==1){
               echo "Evaluation ".$debut."</Br>
               &nbsp &nbsp Moyenne : ".$note1." &nbsp &nbsp Rang : ".$rg1."</Br>
               "; 
          }
          if($nbrecomp==2){
               echo "Evaluation ".$debut."</Br>
               &nbsp &nbsp Moyenne : ".$note1." &nbsp &nbsp Rang : ".$rg1."</Br>
               "; 
               $next1=$debut+1;
               echo "Evaluation ".$next1."</Br>
               &nbsp &nbsp Moyenne : ".$note2." &nbsp &nbsp Rang : ".$rg2."</Br>
               ";  
          }

          if($nbrecomp==3){
                echo "Evaluation ".$debut."</Br>
               &nbsp &nbsp Moyenne : ".$note1." &nbsp &nbsp Rang : ".$rg1."</Br>
               "; 
               $next1=$debut+1;
               echo "Evaluation ".$next1."</Br>
               &nbsp &nbsp Moyenne : ".$note2." &nbsp &nbsp Rang : ".$rg2."</Br>
               ";  
               $next2=$next1+1;
               echo "Evaluation ".$next2."</Br>
               &nbsp &nbsp Moyenne : ".$note3." &nbsp &nbsp Rang : ".$rg3."</Br>";
          }



  
    echo "
    </b></div>";
     
   
  
    
   
   } 
   $reponse->closeCursor();
  }
   if(isset($mazt)){ 
if($elevMCL==-1){$elevMCL=" ";}
               if($elevFM==-1){$elevFM=" ";}
               if($elevLM==-1){$elevLM=" ";}
               if($elevCPSE==-1){$elevCPSE=" ";} 
               if($elevADM==-1){$elevADM=" ";} 
               if($elevPCT==-1){$elevPCT=" ";} 
    $_SESSION['effec']=$effec;
$_SESSION['effeclasse']=$elevCPSE;
$_SESSION['admis']=$elevADM;
$_SESSION['prozent']=$elevPCT;
$_SESSION['moyennecl']=$elevMCL;

   echo "</br><img src='espace.png' height='40px' width='40px'><B>1.&nbsp&nbsp&nbsp<u>STATISTIQUES DU TRIMESTRE DE TOUTE LA CLASSE</u>&nbsp&nbsp
   <I> </I></B></br>
   <B>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Effectif Total : &nbsp ".$_SESSION['effec']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp Composés : &nbsp".$_SESSION['effeclasse']."
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nombre admis : &nbsp " .$_SESSION['admis']."</br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pourcentage réussite : &nbsp".$_SESSION['prozent']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp Moyenne de la classe : &nbsp".$_SESSION['moyennecl']."</B></br>
    <img src='espace.png' height='80px' width='40px' </br>";
    echo "<B>2.&nbsp&nbsp&nbsp<u>STATISTIQUES GROUPE DES MATIERES DE TOUTE LA CLASSE</u>&nbsp&nbsp
    <I> </I></B></br>
    <UL>";

    for($j=1;$j<=$NBRGROUPE;$j++){
      $nomgp=groupmatensgnom($lesidgroupe[$j]);
      $searchnotgptrim=searchnotgptrim($lesidgroupe[$j],$mazt,$_SESSION['clascalcul'],$_SESSION['trimcalcul'],$_SESSION['ancalcul']);
 //$notegroup."@".$rgtrim."@".$mcl."@".$min."@".$max."@".$adm."@".$cpse."@".$pct;
 $cormul=array();
      $cormul=explode("@",$searchnotgptrim);
       
      
      $PCTCLASSEGP=$cormul[7];
      $MOYCLASSEGP=$cormul[2];
      $ADMISCLASSEGP=$cormul[5];
      $CPSECLASSEGP=$cormul[6];
      if($PCTCLASSEGP==-1){$PCTCLASSEGP=" ";}   if($MOYCLASSEGP==-1){$MOYCLASSEGP=" ";} 
      if($ADMISCLASSEGP==-1){$ADMISCLASSEGP=" ";}  if($CPSECLASSEGP==-1){$CPSECLASSEGP=" ";}  
           echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<B><LI><u>".$nomgp."</u></LI>
      </Br> &nbsp&nbsp Composés :&nbsp&nbsp ".$CPSECLASSEGP."&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbspNombre d'admis :&nbsp&nbsp ".$ADMISCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Pourcentage :&nbsp&nbsp ".$PCTCLASSEGP."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      Moyenne de la classe &nbsp&nbsp : ".$MOYCLASSEGP." </B> 
      </br><img src='espace.png' height='30px' width='40px'> </br>";   
    }

  }
     echo "</UL></br>";
     echo " <b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Professeur titulaire</I> </b>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     
     <b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Principal</I> </b></br></br></br></br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> </br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
     &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br> &nbsp&nbsp&nbsp&nbsp&nbsp</br></br></br>
      ";
}


//FIN MOBILE


     }

 
  ?>
 </table> </Br></Br></Br></Br></Br>
  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <div class='no-print'>
  <footer class="main-footer">
  
  <div class="btn-group w-100 mb-2">
  <?php echo" 
 <a class='btn btn-info' type='button' data-toggle='modal' data-target='#rechercher' data-filter='2'> Cliquer pour faire le tri 
 </a>      
 ";
 ?>
  
  </div>
   </footer>
   </div>

  <?php  echo "<div class='modal fade' id='rechercher'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Faire le tri </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo "  <CENTER><b>Liste par ordre de mérite</b></CENTER>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=0'  class='btn btn-default'>Tous les élèves</a>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=1'  class='btn btn-default'>Les admis</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=2'  class='btn btn-default'>Les échoués</a>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=3'  class='btn btn-default'>moyenne < 8</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=4'  class='btn btn-default'>8 ≤ moyenne < 10</a>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=5'  class='btn btn-default'>10 ≤ moyenne < 12</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=0&ordre=6'  class='btn btn-default'>12 ≤ moyenne ≤ 20</a>
            </div>
             
            <br><br>"; 
            
             echo "  <CENTER><b>Liste par ordre alphabétique</b></CENTER>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=0'  class='btn btn-default'>Tous les élèves</a>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=1'  class='btn btn-default'>Les admis</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=2'  class='btn btn-default'>Les échoués</a>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=3'  class='btn btn-default'>moyenne < 8</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=4'  class='btn btn-default'>8 ≤ moyenne < 10</a>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=5'  class='btn btn-default'>10 ≤ moyenne < 12</a>
            </div>
            <div class='btn-group w-100 mb-2'>
            <a type='button'  href='insertvupvtrim.php?mode=1&ordre=6'  class='btn btn-default'>12 ≤ moyenne ≤ 20</a>
            </div>
             
            <br><br>";  
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