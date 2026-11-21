<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';    require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; require 'etattranche.php'; 
require 'bilrecetfunction.php';  require 'calfunction.php';
if(isset($_POST['send'])){
  $an=$_POST['ann'];$_SESSION['anbil']=$_POST['ann'];
  
  $_SESSION['typebilan']=0;   $_SESSION['typeuser']=0;
 
  }

  
  if(isset($_GET['tri'])){
 $_SESSION['typebilan']=$_GET['tri'];
  }  
  if(isset($_GET['triuser'])){
 $_SESSION['typeuser']=$_GET['triuser'];
  } 

   if(isset($_POST['autrdat'])){
    $an= $_SESSION['anbil'] ;
    $dat=$_POST['dat']; $_SESSION['datbil1']=$dat;
    $xj=substr($dat,0,2);
    $xm=substr($dat,3,2);
    $xa=substr($dat,6,4);
    $dato=$xa."-".$xm."-".$xj; $_SESSION['datobil1']=$dato;
    }
  
    $valdevis="FCFA";
function effectif($an,$clas){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND  date='".$dato."' ";
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
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR     $_SESSION['code']==7) ){ 
  


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


    function respsco($id){

     $v="SELECT * FROM admin WHERE id_etab='0' ";
     $reponse = $bdda->query($v); $nom=" ";
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
	 



         function detail(str){
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
                 xmlhttp.open("POST","misescoajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }



  </script>




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
      <form action='birecanad.php' method='POST'>
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
  <B>
        <a  class='btn btn-primary' data-toggle='modal'   data-target='#modajout'>
        Cliquer pour filtrer
       </a></B>
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
            <h4 class="m-0">RECETTE SUR UNE ANNEE</h4>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
 <!-- Default box -->
<div class="card card-solid">
  <div class="card-body">

  <?php   
     $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
     if(!$isMob){  
   echo "  <center><img src='ENTBULL.png' height='200px' width='1300px'><br>
            <img src='ENTBULL1.png' height='200px' width='1000px'>
            <img src='espace.png' height='100px' width='1000px'><br> <br>  </center>";
     } 


     echo "<b>
      <div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>
     
     
     <div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      ANNEE SCOLAIRE : ".$_SESSION['anbil']."<br>"; 

           if($_SESSION['typebilan']==0){
                echo "BILAN DES ENTREES <br><br>";
           }
           if($_SESSION['typebilan']==1){
                echo "BILAN DES REMISES <br><br>";
           }
           if($_SESSION['typebilan']==2){
                echo "BILAN DE LA SCOLARITE SANS LES REMISES <br><br>";
           }
           if($_SESSION['typebilan']==3){
                echo "BILAN DES FRAIS DIVERS A L'INSCRIPTION <br><br>";
           }
           if($_SESSION['typebilan']==4){
                echo "BILAN DES AUTRES FRAIS DIVERS <br><br>";
           }
            if($_SESSION['typebilan']==5){
                echo "BILAN DES FRAIS D'EXAMENS <br><br>";
           }
           echo "</div></div></div>";


            echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0'>";
 if($_SESSION['typeuser']==0){
                echo "Tout le personnel<br><br>";
           }
           if($_SESSION['typeuser']!=0){
                echo "Responsable d'enregistrement :<br> ".respsco($_SESSION['typeuser'])."<br><br>";
           }
     echo "</div></div></div>";


           echo "</div></div></div></b>";

     if(!$isMob){  
      if($_SESSION['typebilan']==0){   // TOUT LE BILAN
        echo " <table class='table table-bordered table-hover'>

<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>MATRICULE</B></td><td><B>CLASSE</B></td><td><B>MONTANT</B></td>
<td><B>MOTIF</B></td><td><B>REMISE ?</B></td><td><B>FRAIS DIVERS</B></td>
<td><B>DATE</B></td><td><B>HEURE</B></td><td><B>RESPONSABLE</B></td></tr></thead> ";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."' AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
            $affremis="NON";
if($donnees['remise']=='OUI'){
$affremis="OUI";
}
     echo "<tr><td><B>".$count."</B></td><td><B>".$donnees['nomelev']." ".$donnees['preelev']."</B></td>
    <td><B>".$donnees['matelev'] ."</B></td><td><B>".classparid($donnees['niveauelev'],$_SESSION['anbil'])."</B></td> 
    <td><B>".$donnees['montant']." ".$valdevis."</B></td>
    <td><B>SCOLARITE</B></td> 
     
     <td><B>".$affremis."</B></td><td><B>".$fra." ".$valdevis."</B></td><td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
echo " </table>";
$sansremise=$ytotalt-$ytotalrem;   
 echo "<b>TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES : ".$sansremise."  ".$valdevis."
  <br>TOTAL DES REMISES : ".$ytotalrem." ".$valdevis." 
   <br>TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION : ".$ytotalfrais." ".$valdevis."<br><br> </b><br> <br>";

 echo " <table class='table table-bordered table-hover'> 
        <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>MATRICULE</B></td><td><B>CLASSE</B></td>
        <td><B>MONTANT</B></td><td><B>MOTIF</B></td><td><B>DATE</B></td><td><B>HEURE</B></td> <td><B>RESPONSABLE</B></td></tr></thead> ";
if ($_SESSION['typeuser']==0){// TOUT LE MONDE SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
}
if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
}
             $reponse = $bdda->query($v);
           
           $count=1;
             $ytotaluni=0; 
             while ($donnees = $reponse->fetch())
             {
                
              $xd=format($donnees['date'] );
               echo  "<tr> <td nowrap><B>".$count."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$_SESSION['anbil'])."</B></td> 
               <td><B>".$donnees['matelev']."</B></td><td nowrap><B>".classparid(Classe($bdda,$donnees['matelev'] ,$_SESSION['anbil']),$_SESSION['anbil'])."</B></td>
               <td nowrap> <B>".$donnees['montant']." ".$valdevis."</B></td>
              <td nowrap><B> 
                ".nommotif($donnees['frais']); 
                if($donnees['frais']==9){ 
                echo "(".namemois($donnees['mois'])." )";
              }
               echo "</B></td>
                <td><B>".$donnees['date']."</B></td><td><B>".$donnees['heure']."</B></td>
               <td><B>".respsco($donnees['idempl']) ."</B></td></tr> " ; 
              
             $ytotaluni=$ytotaluni+$donnees['montant'];
             $count++;
               } 
             $reponse->closeCursor();
        
             
            echo " </table>";
echo "<b>TOTAL DES AUTRES FRAIS DIVERS : ".$ytotaluni."  ".$valdevis."</b><br><br>";

echo " <table class='table table-bordered table-hover'> 
        <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>MATRICULE</B></td><td><B>CLASSE</B></td>
        <td><B>MONTANT</B></td><td><B>MOTIF</B></td><td><B>DATE</B></td><td><B>HEURE</B></td> <td><B>RESPONSABLE</B></td></tr></thead> ";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE ET FRAIS exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
        }
     if ($_SESSION['typeuser']!=0){ // par user ET FRAIS Exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."' AND idempl='".$_SESSION['typeuser']."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
        }
         $ytotalex=0; 
     while ($donnees = $reponse->fetch())
     {
         
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
     echo "<tr><td><B>".$count."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
     <td><B>".$donnees['matelev']."</B></td><td><B>".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."</B></td>
      <td><B>".$donnees['montant']."  ".$valdevis."</B></td><td><B>EXAMENS</B></td><td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td><td><B>".$aut."</B></td> </tr>";
    $count++;
     } 
     $reponse->closeCursor();
  echo " </table>";
echo "<b>TOTAL DES FRAIS D'EXAMENS : ".$ytotalex."  ".$valdevis."</b><br> <br> <br>";

$alltotal=$sansremise+$ytotaluni+$ytotalex;
 
echo "<b>BILAN DES ENTREES SUR L'ANNEE SCOLAIRE : ".$_SESSION['datbil1']."<br>TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES+TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION+TOTAL DES FRAIS D'EXAMENS+TOTAL DES AUTRES FRAIS DIVERS
 :<br> ".$alltotal."  ".$valdevis."</b><br>";
      }   // fin TOUT LE BILAN



            if($_SESSION['typebilan']==1){   // LES REMISES 2
 echo " <table class='table table-bordered table-hover'>

<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>MATRICULE</B></td><td><B>CLASSE</B></td><td><B>MONTANT</B></td>
<td><B>MOTIF</B></td><td><B>TYPE DE LA REMISE</B></td>
<td><B>DATE</B></td><td><B>HEURE</B></td><td><B>RESPONSABLE</B></td></tr></thead> ";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE LES REMISES 2
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."' AND remise='OUI'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER LES REMISES 2
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   AND remise='OUI'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
     echo "<tr><td><B>".$count."</B></td><td><B>".$donnees['nomelev']." ".$donnees['preelev']."</B></td>
    <td><B>".$donnees['matelev'] ."</B></td><td><B>".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."</B></td> 
    <td><B>".$donnees['montant']." ".$valdevis."</B></td>
    <td><B>REMISE</B></td><td><B>".$donnees['typerem']."</B></td><td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
echo " </table>";
$sansremise=$ytotalt-$ytotalrem;   
 echo "<b>TOTAL DES REMISES : ".$ytotalrem." ".$valdevis."</b>";

            }

 
if($_SESSION['typebilan']==2){   //  SCO SANS REMISE
 echo " <table class='table table-bordered table-hover'>

<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>MATRICULE</B></td><td><B>CLASSE</B></td><td><B>MONTANT</B></td>
<td><B>MOTIF</B></td>
<td><B>DATE</B></td><td><B>HEURE</B></td><td><B>RESPONSABLE</B></td></tr></thead> ";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO SANS REMISE
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  AND remise!='OUI'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO SANS REMISE
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   AND remise!='OUI'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
     echo "<tr><td><B>".$count."</B></td><td><B>".$donnees['nomelev']." ".$donnees['preelev']."</B></td>
    <td><B>".$donnees['matelev'] ."</B></td><td><B>".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."</B></td> 
    <td><B>".$donnees['montant']." ".$valdevis."</B></td>
    <td><B>SCOLARITE</B></td><td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
echo " </table>";
$sansremise=$ytotalt-$ytotalrem;   
 echo "<b>TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES : ".$sansremise." ".$valdevis."</b>";

            }



if($_SESSION['typebilan']==4){   //  FRAIS NON EXIG
echo " <table class='table table-bordered table-hover'> 
        <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>MATRICULE</B></td><td><B>CLASSE</B></td>
        <td><B>MONTANT</B></td><td><B>MOTIF</B></td><td><B>DATE</B></td><td><B>HEURE</B></td> <td><B>RESPONSABLE</B></td></tr></thead> ";
if ($_SESSION['typeuser']==0){// TOUT LE MONDE SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'   ORDER BY id DESC";
}
if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
}
             $reponse = $bdda->query($v);
           
           $count=1;
             $ytotaluni=0; 
             while ($donnees = $reponse->fetch())
             {
                
              $xd=format($donnees['date'] );
               echo  "<tr> <td nowrap><B>".$count."</B></td> <td nowrap><B>".nomElev($bdda,$donnees['matelev'],$_SESSION['anbil'])."</B></td> 
               <td><B>".$donnees['matelev']."</B></td><td nowrap><B>".classparid(Classe($bdda,$donnees['matelev'] ,$_SESSION['anbil']),$_SESSION['anbil'])."</B></td>
               <td nowrap> <B>".$donnees['montant']." ".$valdevis."</B></td>
              <td nowrap><B> 
                ".nommotif($donnees['frais']); 
                if($donnees['frais']==9){ 
                echo "(".namemois($donnees['mois'])." )";
              }
               echo "</B></td>
                <td><B>".$donnees['date']."</B></td><td><B>".$donnees['heure']."</B></td>
               <td><B>".respsco($donnees['idempl']) ."</B></td></tr> " ; 
              
             $ytotaluni=$ytotaluni+$donnees['montant'];
             $count++;
               } 
             $reponse->closeCursor();
        
             
            echo " </table>";
echo "<b>TOTAL DES AUTRES FRAIS DIVERS : ".$ytotaluni."  ".$valdevis."</b><br><br>";
 }



if($_SESSION['typebilan']==3){   //  FRAIS  EXIG

echo " <table class='table table-bordered table-hover'>

<thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
<td><B>MATRICULE</B></td><td><B>CLASSE</B></td><td><B>MONTANT</B></td>
<td><B>MOTIF</B></td>
<td><B>DATE</B></td><td><B>HEURE</B></td><td><B>RESPONSABLE</B></td></tr></thead> ";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."' AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       if($donnees['frais']!=0){ 
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
     echo "<tr><td><B>".$count."</B></td><td><B>".$donnees['nomelev']." ".$donnees['preelev']."</B></td>
    <td><B>".$donnees['matelev']."</B></td><td><B>".classparid($donnees['niveauelev'],$_SESSION['anbil'])."</B></td> 
   <td><B>".$fra." ".$valdevis."</B></td>
    <td><B>Frais divers à l'inscription</B></td> <td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td>
     <td><B>".$aut."</B></td></tr>";
    
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++; }
     } 
     $reponse->closeCursor();
       
echo " </table>";
$sansremise=$ytotalt-$ytotalrem;   
 echo "<b>  <br>TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION : ".$ytotalfrais." ".$valdevis."<br><br> </b><br> <br>";

}

     


if($_SESSION['typebilan']==5){   //  FRAIS  EXAMENS
echo " <table class='table table-bordered table-hover'> 
        <thead><tr bgcolor='orange'><td><B>N°</B></td><td><B>NOMS ET PRENOMS</B></td> 
        <td><B>MATRICULE</B></td><td><B>CLASSE</B></td>
        <td><B>MONTANT</B></td><td><B>MOTIF</B></td><td><B>DATE</B></td><td><B>HEURE</B></td> <td><B>RESPONSABLE</B></td></tr></thead> ";
 if ($_SESSION['typeuser']==0){ // TOUT LE MONDE ET FRAIS exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
   
        }
     if ($_SESSION['typeuser']!=0){ // par user ET FRAIS Exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."' AND idempl='".$_SESSION['typeuser']."'   ORDER BY id DESC";
    
        }
     $ytotalex=0; 
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
         
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
     echo "<tr><td><B>".$count."</B></td> <td><B>". $donnees['nomelev'] ." ".$donnees['preelev']."</B></td> 
     <td><B>".$donnees['matelev']."</B></td><td><B>".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."</B></td>
      <td><B>".$donnees['montant']."  ".$valdevis."</B></td><td><B>EXAMENS</B></td><td><B>".$xd."</B></td><td><B>".$donnees['heure']."</B></td><td><B>".$aut."</B></td> </tr>";
    $count++;
     } 
     $reponse->closeCursor();
  echo " </table>";
echo "<b>TOTAL DES FRAIS D'EXAMENS : ".$ytotalex."  ".$valdevis."</b><br> <br> <br>";

    }






     }
     

















      if($isMob){ 

  




              if($_SESSION['typebilan']==0){   // TOUT LE BILAN
    
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }

         echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";

     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
       $affremis="NON";
if($donnees['remise']=='OUI'){
$affremis="<span class='badge bg-danger'>OUI</span>";
}
        echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev']." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'],$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Scolarité</span> <br>
      Est-ce une remise ? : ".$affremis."<br>
      Frais déductibles à l'inscription : ".$fra." ".$valdevis."<br>
      Date : ".$xd."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".$aut."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>";
     
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
 
$sansremise=$ytotalt-$ytotalrem;  
 
 echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b>- TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES :<br> ".$sansremise."  ".$valdevis."
  <br>- TOTAL DES REMISES : <br>".$ytotalrem." ".$valdevis." 
   <br>- TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION : <br>".$ytotalfrais." ".$valdevis."<br><br>
   </div> 
      </div></div> </b><br> <br>";

        echo "</div></div></div>";


if ($_SESSION['typeuser']==0){// TOUT LE MONDE SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
}
if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
}
             $reponse = $bdda->query($v);
            echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";

           $count=1;
             $ytotaluni=0; 
             while ($donnees = $reponse->fetch())
             {
                
              $xd=format($donnees['date'] );

               echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$_SESSION['anbil'])."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$_SESSION['anbil']),$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>".nommotif($donnees['frais'])."</span> <br>";
      if($donnees['frais']==9){ 
                echo "(".namemois($donnees['mois'])." )";
              }
      
      echo "Date : ".$donnees['date']."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".respsco($donnees['idempl'])."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>"; 
              
             $ytotaluni=$ytotaluni+$donnees['montant'];
             $count++;
               } 
             $reponse->closeCursor();
        
             
         
echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b>TOTAL DES AUTRES FRAIS DIVERS : ".$ytotaluni."  ".$valdevis."</b></div></div></div><br><br>";
 echo "</div></div></div>";


 
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE ET FRAIS exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
     $reponse = $bdda->query($v);
        }
     if ($_SESSION['typeuser']!=0){ // par user ET FRAIS Exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'   ORDER BY id DESC";
     $reponse = $bdda->query($v);
        }
        echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
         $ytotalex=0; 
     while ($donnees = $reponse->fetch())
     {
         
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);

          echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev'] ." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Frais d'examens</span> <br>
      Date : ".$donnees['date']."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".respsco($donnees['idempl'])."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>"; 
        $count++;
     } 
     $reponse->closeCursor();
 
echo "<br><b>TOTAL DES FRAIS D'EXAMENS : ".$ytotalex."  ".$valdevis."</b><br> <br>";
 echo "</div></div></div>";
$alltotal=$sansremise+$ytotaluni+$ytotalex;
 
      echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
echo "<b>- BILAN DES ENTREES SUR L'ANNEE SCOLAIRE  : ".$_SESSION['datbil1']."<br>TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES+TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION+TOTAL DES FRAIS D'EXAMENS+TOTAL DES AUTRES FRAIS DIVERS
 :<br> <br>".$alltotal."  ".$valdevis."</b><br>";
  echo "</div></div></div>";
      }   // fin TOUT LE BILAN







        if($_SESSION['typebilan']==1){   // LES REMISES 2
 
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE LES REMISES 2
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   AND remise='OUI'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER LES REMISES 2
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  AND remise='OUI'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
       echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
        echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev']." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'],$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Remise scolarité</span> <br>
      Type de la remise : ".$donnees['typerem']."<br>
      Date : ".$xd."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".$aut."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>";
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
 
$sansremise=$ytotalt-$ytotalrem;   
 echo "</br><b>- TOTAL DES REMISES : ".$ytotalrem." ".$valdevis."</b>";
 echo "</div></div></div>";
            }

 
if($_SESSION['typebilan']==2){   //  SCO SANS REMISE
 echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO SANS REMISE
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   AND remise!='OUI'  ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO SANS REMISE
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   AND remise!='OUI'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];

        echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev']." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'],$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Scolarité</span> <br>
      Date : ".$xd."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".$aut."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>";
   
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++;
     } 
     $reponse->closeCursor();
       
 
$sansremise=$ytotalt-$ytotalrem;   
 echo "<br><b>- TOTAL DE LA SCOLARITE SANS LE REGLEMENT DES REMISES : ".$sansremise." ".$valdevis."</b>";
 echo "</div></div></div>";
            }



if($_SESSION['typebilan']==4){   //  FRAIS NON EXIG

  echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
if ($_SESSION['typeuser']==0){// TOUT LE MONDE SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  ORDER BY id DESC";
}
if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS NON EXIG
 $v="SELECT *  FROM autrepayefrais   WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
}
             $reponse = $bdda->query($v);
           
           $count=1;
             $ytotaluni=0; 
             while ($donnees = $reponse->fetch())
             {
                
              $xd=format($donnees['date'] );
              echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".nomElev($bdda,$donnees['matelev'],$_SESSION['anbil'])."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid(Classe($bdda,$donnees['matelev'] ,$_SESSION['anbil']),$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>".nommotif($donnees['frais'])."</span> <br>";
      if($donnees['frais']==9){ 
                echo "(".namemois($donnees['mois'])." )";
              }
      
      echo "Date : ".$donnees['date']."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".respsco($donnees['idempl'])."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>"; 
              
             $ytotaluni=$ytotaluni+$donnees['montant'];
             $count++;
               } 
             $reponse->closeCursor();
        
           
echo "<br><b>- TOTAL DES AUTRES FRAIS DIVERS : ".$ytotaluni."  ".$valdevis."</b><br><br>";
 echo "</div></div></div>";
 }



if($_SESSION['typebilan']==3){   //  FRAIS  EXIG

echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
        if ($_SESSION['typeuser']==0){ // TOUT LE MONDE SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'   ORDER BY id DESC";
        }
          if ($_SESSION['typeuser']!=0){ // PAR USER SCO ET FRAIS EXIG
           $i=0; $count=1;
      $v="SELECT *  FROM detail  WHERE  anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'  ORDER BY id DESC";
        }
     $reponse = $bdda->query($v);
     $n=0;
     $ytotalt=0; // y compris les remises
     $ytotalrem=0; // remises
     $ytotalfrais=0; // frais
     
     while ($donnees = $reponse->fetch())
     {
      
       $xd=format($donnees['date'] );
       $ytotalt=$ytotalt+$donnees['montant'];
       if($donnees['frais']!=0){ 
       $ytotalfrais=$ytotalfrais+$donnees['frais'];
      $aut=respsco($donnees['idempl']);
       $fra=0+$donnees['frais'];
        echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev']." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'],$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Frais divers à l'inscription</span> <br>Date : ".$xd."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".$aut."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>";
     
    
  
       if($donnees['remise']=='OUI'){
        $ytotalrem=$ytotalrem+$donnees['montant'];
       }
       $count++; }
     } 
     $reponse->closeCursor();
       
 
$sansremise=$ytotalt-$ytotalrem;   
 echo "<b>  <br>- TOTAL DES FRAIS DIVERS EXIGIBLES A L'INSCRIPTION : ".$ytotalfrais." ".$valdevis."<br><br> </b><br> <br>";
  echo "</div></div></div>";
}

     


if($_SESSION['typebilan']==5){   //  FRAIS  EXAMENS
echo "<div class='card card-solid'>
         <div class='card-body pb-0'>
         <div class='row'>";
 if ($_SESSION['typeuser']==0){ // TOUT LE MONDE ET FRAIS exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'   ORDER BY id DESC";
   
        }
     if ($_SESSION['typeuser']!=0){ // par user ET FRAIS Exams
           $i=0; $count=1;
$v="SELECT *  FROM exam  WHERE anelev='".$_SESSION['anbil']."'  AND idempl='".$_SESSION['typeuser']."'   ORDER BY id DESC";
    
        }
     $ytotalex=0; 
       $reponse = $bdda->query($v);
     while ($donnees = $reponse->fetch())
     {
         
        $xd=format($donnees['date'] );
        $ytotalex=$ytotalex+$donnees['montant']; 
        $aut=respsco($donnees['idempl']);
       echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '>
      <b># ".$count." <br>
      Noms et prénoms : ".$donnees['nomelev'] ." ".$donnees['preelev']."<br>
      Matricule : ".$donnees['matelev'] ."<br>
      Classe : ".classparid($donnees['niveauelev'] ,$_SESSION['anbil'])."<br>
      Montant : <span class='badge bg-info'>".$donnees['montant']." ".$valdevis."</span><br>
      Motif : <span class='badge bg-primary'>Frais d'examens</span> <br>
      Date : ".$donnees['date']."<br>
      Heure : ".$donnees['heure']."<br>
      Responasble : ".respsco($donnees['idempl'])."<br>
      id du paiement : ".$donnees['id']." <br>
       </div> 
      </div></div>"; 
      
    
        $count++;
     } 
     $reponse->closeCursor();

echo "<br><b>- TOTAL DES FRAIS D'EXAMENS : ".$ytotalex."  ".$valdevis."</b><br> <br> <br>";
         echo "</div></div></div>";
    }





    //
      }
     
     ?>

 

 
     
  </div>
  </div>
    </section>
    <!-- /.content -->

    </br></br></br></br></br> 


</br></br> 
  
  

  
 

<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark">
<footer class="main-footer">
  <div class="btn-group w-100 mb-2">
       <?php  
     if($_SESSION['typebilan']==0){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Entrées nettes : ".$alltotal." ".$valdevis."</a>";
     }
     if($_SESSION['typebilan']==1){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Total : ".$ytotalrem." ".$valdevis."</a>";
     }
      if($_SESSION['typebilan']==2){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Total : ".$sansremise." ".$valdevis."</a>";
     }
      if($_SESSION['typebilan']==3){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Total : ".$ytotalfrais." ".$valdevis."</a>";
     }
      if($_SESSION['typebilan']==4){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Total : ".$ytotaluni." ".$valdevis."</a>";
     }
     if($_SESSION['typebilan']==5){
      echo "
      <a class='btn btn-success' href='#' data-filter='3'> Total : ".$ytotalex." ".$valdevis."</a>";
     }

 
    
     

     ?>
                       
    </div>
    <strong> </strong>  
  </footer>
   </div></nav>



<?php  echo "<div class='modal fade' id='modajoutdat'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Choisir une date </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   <form  method="POST" action="birecan1ad.php" name="paiem">
  <?php
          echo "  
          <div class='form-group'>
                    <label for='exampleInputEmail1'>DATE</label>
                    <input name='dat' placeholder='01/02/2022' class='form-control' required>
                  </div>";
          
            ?>
  </br>
      
     
  
  </div>
    <div class="modal-footer justify-content-between">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      
      <button type="submit" name="autrdat"  class="btn btn-primary">Valider</button>
       </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 


  
 </form> 

 



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>




<?php  echo "<div class='modal fade' id='modajout'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">FILTRER</h4>
         
     
        <button type="button" class="close" class='btn btn-danger' data-dismiss="modal" aria-label="Close">
          fermer
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
  echo"<div class='btn-group w-100 mb-2'><a class='btn btn-primary' href='birecan1ad.php?tri=0' data-filter='2'>Tout le bilan de l'année</a>";
 echo" <a class='btn btn-success' href='birecan1ad.php?tri=1' data-filter='2'>les remises</a>
 </div>";
  echo"<div class='btn-group w-100 mb-2'><a class='btn btn-secondary' href='birecan1ad.php?tri=2' data-filter='2'>Scolarité sans le règlement des remises</a>";
 echo"
 </div>";
 echo"<div class='btn-group w-100 mb-2'><a class='btn btn-warning' href='birecan1ad.php?tri=3' data-filter='2'>Frais exigibles à l'inscription</a>";
 echo" <a class='btn btn-danger' href='birecan1ad.php?tri=4' data-filter='2'>Autres frais divers</a>
 </div>";
 echo"<div class='btn-group w-100 mb-2'><a class='btn btn-info' href='birecan1ad.php?tri=5' data-filter='2'>Frais d'examens</a>";
 echo"
 </div>";
         
            
  echo "</br></br><b> Trier par employé</br>";
   echo "<div class='btn-group w-100 mb-2'>
        <a class='btn btn-default' href='birecan1ad.php?triuser=0' data-filter='2'>Tout le personnel</a></div>";
      $vet="SELECT DISTINCT idadmin FROM admin_poste WHERE  anens='".$_SESSION['anbil']."' AND sup='0'  ";
$reponset = $bdda->query($vet);
     $n=0; 
     while ($donneest = $reponset->fetch())
     {
         
       $i=$n+1;  
       $nname=nomC($donneest['idadmin']);
        echo "<div class='btn-group w-100 mb-2'>
        <a class='btn btn-default' href='birecan1ad.php?triuser=".$donneest['idadmin']."' data-filter='2'>".$nname."</a></div>";
    } 
    $reponset->closeCursor();
     
    echo "</b> ";
    ?>
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Ion Slider -->
<script src="../plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
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


 