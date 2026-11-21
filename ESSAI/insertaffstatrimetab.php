<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';require '../listabrvtype.php'; 


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



function minmoytrimETAB( $an,$trim){ 

  
  $v="SELECT  MIN(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."'   AND 
    codetrim='".$trim."' AND rgtrim!= ' '" ;
  $reponse = $bdda->query($v);
  $i=0;   
  while ($donnees = $reponse->fetch() )
  {
    $nb=$donnees['n'];
  } 
  $reponse->closeCursor(); 
   return $nb;
  }

  function maxmoytrimETAB( $an,$trim){ 

  
  $v="SELECT  MAX(moytrim) AS n   FROM  moyennetrim WHERE anens='".$an."'   AND 
    codetrim='".$trim."' AND rgtrim!= ' '" ;
  $reponse = $bdda->query($v);
  $i=0;   
  while ($donnees = $reponse->fetch() )
  {
    $nb=$donnees['n'];
  } 
  $reponse->closeCursor(); 
   return $nb;
  }



  function maxmoyanETAB($bdda,$an){ 

  
  $v="SELECT  MAX(moyan) AS n   FROM  moyenneannuel WHERE anens='".$an."'   AND 
     rgan!= ' '" ;
  $reponse = $bdda->query($v);
  $i=0;   
  while ($donnees = $reponse->fetch() )
  {
    $nb=$donnees['n'];
  } 
  $reponse->closeCursor(); 
   return $nb;
  }

  function minmoyanETAB($bdda,$an){ 

  
  $v="SELECT  MIN(moyan) AS n   FROM  moyenneannuel WHERE anens='".$an."'   AND 
     rgan!= ' '" ;
  $reponse = $bdda->query($v);
  $i=0;   
  while ($donnees = $reponse->fetch() )
  {
    $nb=$donnees['n'];
  } 
  $reponse->closeCursor(); 
   return $nb;
  }


function effectifETAB($bdda,$an){
	
	$v="SELECT *  FROM eleve  WHERE anelev='".$an."' AND id_etab='0' ";
	$reponse = $bdda->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() )
  {
	 $true++;
	  
  } 
  $reponse->closeCursor();
   return $true;   
}

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 

	

  if(isset($_POST['send2'])){
    $_SESSION['evalcalcul']=$_POST['eval']; $eva=$_POST['eval'];
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
else{
    $eva=$_SESSION['evalcalcul'];
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
       $de=ensgdstitulaire($bdda,$_SESSION['clascalcul'],$_SESSION['ancalcul']); 

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
<li class="nav-item">
      <form action='insertcalcul1.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
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
    <center><img src="ENTBULL.png" height="150px" width="1300px" ><br>
            <img src="ENTBULL1.png" height="200px" width="1000px" >
            <img src="espace.png" height="100px" width="1000px" ><br> <br>
           </center>
           <?php if(isset($_POST['send2'])){//VENANT DE listclasse
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$_SESSION['ancalcul']." 
                 <br><br> 
                  </br>STATISTIQUES DU TRIMESTRE ".$_SESSION['trimcalcul']." DE L'ETABLSSEMENT</br>
                  
                 EFFECTIF DE L'ETABLISSEMENT :&nbsp&nbsp".effectifETAB($bdda,$_SESSION['ancalcul'])."</br>
                 </b> 
                 </H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE </b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }

 if(isset($_POST['sendexp'])){  
   

  }
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 if(isset($_POST['send2'])){// 
echo "<Br><img src='espace.png' height='30px' width='20px'>
<Br> 
<Br> ";
  
    
      
   
 
echo "<Br><img src='espace.png' height='30px' width='20px'>
<Br><center><img src='statmoy.png' height='90px' width='900px'></center><Br>
<Br><img src='espace.png' height='30px' width='20px'>
<Br>
<B><I>(NB : les statistiques sur les moyennes de ce trimestre)</I></B>";
echo " <table class='table table-bordered table-hover'>
  <tr bgcolor='orange'><td><B>Moyenne</B></td><td><B>[0 ; 8[</B></td><td><B>[8 ; 10[</B></td>
  <td><B>[10 ; 12[</B></td><td><B>[12 ; 20]</B></td><td><B>TOTAL EFFECTIF CLASSE</B></td>
   </tr>";



   $v="SELECT  matricule,moytrim,rgtrim,anens,idcl,codetrim  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."'  
          AND codetrim='".$eva."'  ORDER BY  moytrim DESC";
     $reponse = $bdda->query($v);
     $n=0;$totalmoy=0;$effeclasse=0;$effec=0;$a=0;$b=0;$c=0;$d=0;$prozent=" "; $moyennecl=" ";$admis=0;
   while ($donnees = $reponse->fetch())
   {
    $effec++; 
     $mazt=$donnees['matricule'];
     $MOY=$donnees['moytrim'];
     $RG=$donnees['rgtrim'];
     if($RG!=" " AND !empty($RG)){
         $effeclasse++;$totalmoy+=$MOY; 
        if($MOY>=10){
          $admis++;
        }
    
    if($MOY<8){
      $a++;} 
      if($MOY>=8 AND $MOY<10){
      $b++;} 
      if($MOY>=10 AND $MOY<12){
      $c++;} 
      if($MOY>=12 AND $MOY<=20){
      $d++;}

    }
    } 
   $reponse->closeCursor();
$pa=" "; $pb=" "; $pc=" "; $pd=" ";
if($effeclasse>0){
$pa=Round((($a*100)/$effeclasse),2); $pc=Round((($c*100)/$effeclasse),2);
$pb=Round((($b*100)/$effeclasse),2);$pd=Round((($d*100)/$effeclasse),2);
$prozent=Round((($admis*100)/$effeclasse),2);

$moyennecl=Round(($totalmoy/$effeclasse),2); 
  }
  $moymin =minmoytrimETAB($_SESSION['ancalcul'], $_SESSION['trimcalcul']);
  $moymax =maxmoytrimETAB($_SESSION['ancalcul'], $_SESSION['trimcalcul']); 
   echo " 
   <tr><td><B>Effectifs classés</B></td><td><B>".$a."</B></td><td><B>".$b."</B></td>
   <td><B>".$c."</B></td><td><B>".$d."</B></td><td><B>".$effeclasse."</B></td>
    </tr>";
  echo " 
 <tr><td><B>Fréquence ( % )</B></td><td><B>".$pa."</B></td><td><B>".$pb."</B></td>
 <td><B>".$pc."</B></td><td><B>".$pd."</B></td><td><B>100</B></td>
</tr></table>";   

echo "<Br><img src='espace.png' height='10px' width='10px'>";
echo " <table class='table table-bordered table-hover'>
  <tr><td><B>1<sup>ère</sup> MOYENNE</B></td><td><B>DERNIERE MOYENNE</B></td><td><B>ADMIS</B>
  </td> <td><B>% REUSSITE</B></td><td><B>MOY </B></td> 
   </tr>";
   echo "  
   <tr><td><B>".$moymax."</B></td><td><B>".$moymin."</B></td><td><B>".$admis."</B>
   </td> <td><B>".$prozent."</B></td><td><B>".$moyennecl."</B></td> 
    </tr></table>";
    
    
    echo "<Br><img src='espace.png' height='10px' width='10px'>";
    echo " <table class='table table-bordered table-hover'>
      <tr><td><B>5 PREMIER(E)S </B></td><td><B>5 DERNIER(E)S  </B></td>  
       </tr><tr><td><B>";

       $v="SELECT * FROM  moyennetrim WHERE anens='".$_SESSION['ancalcul']."' 
       AND 
  codetrim='".$_SESSION['trimcalcul']."'   AND rgtrim != ' ' ORDER BY moytrim DESC" ;
$reponse = $bdda->query($v);
$i=1; $deja=1;  
while ($donnees = $reponse->fetch() AND $i<=5)
{
  $mazt=$donnees['matricule'];
  $mote=$donnees['moytrim'];
  if($deja!=5){ 
    echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
    }
    else{ 
      echo "<B>".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
      }
      $i++;
} 
$reponse->closeCursor(); 
echo"</B></td> <td><B>";

$v="SELECT * FROM  moyennetrim WHERE anens='".$_SESSION['ancalcul']."'  AND 
 codetrim='".$_SESSION['trimcalcul']."'   AND rgtrim != ' ' ORDER BY moytrim" ;
$reponse = $bdda->query($v);
$i=1;   $deja=1;  
while ($donnees = $reponse->fetch() AND $i<=5)
{
  $mazt=$donnees['matricule'];
  $mote=$donnees['moytrim'];
  if($deja!=5){ 
   echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
    }
    else{ 
     echo "<B>".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
      }
      $i++;
} 
$reponse->closeCursor();

        echo"</B></td> </tr></table>";

        echo"</br><img src='espace.png' height='10px' width='10px'> </br>
        <b>MOYENNE ET POURCENTAGE DE REUSSITE DU TRIMESTRE DES CLASSES  </b> 
        </br><img src='espace.png' height='8px' width='10px'></br> 
        <table class='table table-bordered table-hover' border='2' cellspacing='0'><thead><tr bgcolor='grey'><td>CLASSES</td><td>Effectif</td><td>Total d'admis</td>
<td>Total d'echecs</td><td>Pourcentage de reussite</td><td>Pourcentage d'echecs</td><td>MOY . CL</td></thead> </tr>";
    
        
        $v="SELECT *  FROM classe WHERE sup='0' ";

   $reponse = $bdda->query($v);
   while ($donnees = $reponse->fetch())
   {
      $kls= $donnees['id']  ; $klsnom=classparid($bdda,$kls,$_SESSION['ancalcul']);
       
      if(effectif($bdda,$_SESSION['ancalcul'],$kls)>0){ 
        $v="SELECT *  FROM moyennetrim  WHERE anens='".$_SESSION['ancalcul']."' AND idcl='".$kls."'
         AND codetrim='".$_SESSION['trimcalcul']."'  ORDER BY  moytrim DESC";
         $repons = $bdda->query($v);
        $n=0;$totalmoy=0;$effeclasse=0;$effec=0;$a=0;$b=0;$c=0;$d=0;$prozent=" "; $moyennecl=" ";$admis=0;
$echec=0;
        while ($donnee = $repons->fetch())
        {
           $effec++; 
           $MOY=$donnee['moytrim'];
           $RG=$donnee['rgtrim'];
           if($RG!=" " AND !empty($RG)){
               $effeclasse++;$totalmoy+=$MOY; 
               if($MOY>=10){
                  $admis++;
               }
if($MOY<10){
                  $echec++;
               }
            }
        }
        $repons->closeCursor();  
        if($effeclasse>0){
          $prozent=Round((($admis*100)/$effeclasse),2);
          $moyennecl=Round(($totalmoy/$effeclasse),2);
        } 
        echo "<tr><td><B>".$klsnom."</B></td><td><B>".effectif($bdda,$_SESSION['ancalcul'],$kls)."</B></td>
<td><B>".$admis."</B></td><td><B>".$echec."</B></td><td><B>".$prozent."</B></td>
 <td><B>".Round((($echec*100)/$effeclasse),2)."</B></td>

 <td><B>".$moyennecl."</B></td>  </tr>" ;
    }
  }
    $reponse->closeCursor();

echo"</table></br><img src='espace.png' height='20px' width='10px'> </br>" ;







if($_SESSION['trimcalcul']==3){ 





    echo "<Br><img src='espace.png' height='30px' width='20px'>
    <Br><center><img src='statmoyan.png' height='90px' width='900px'></center><Br>
    <Br><img src='espace.png' height='30px' width='20px'>
    <Br>
    <B><I>(NB : les statistiques sur les moyennes annuelles)</I></B>";
    echo " <table class='table table-bordered table-hover'>
      <tr bgcolor='orange'><td><B>Moyenne</B></td><td><B>[0 ; 8[</B></td><td><B>[8 ; 10[</B></td>
      <td><B>[10 ; 12[</B></td><td><B>[12 ; 20]</B></td><td><B>TOTAL EFFECTIF CLASSE</B></td>
       </tr>";
    
    
    
       $v="SELECT *  FROM moyenneannuel  WHERE anens='".$_SESSION['ancalcul']."'  
              ORDER BY  moyan DESC";
         $reponse = $bdda->query($v);
         $n=0;$totalmoy=0;$effeclasse=0;$effec=0;$a=0;$b=0;$c=0;$d=0;$prozent=" "; $moyennecl=" ";$admis=0;
       while ($donnees = $reponse->fetch())
       {
        $effec++; 
         $mazt=$donnees['matricule'];
         $MOY=$donnees['moyan'];
         $RG=$donnees['rgan'];
         if($RG!=" " AND !empty($RG)){
             $effeclasse++;$totalmoy+=$MOY; 
            if($MOY>=10){
              $admis++;
            }
        
        if($MOY<8){
          $a++;} 
          if($MOY>=8 AND $MOY<10){
          $b++;} 
          if($MOY>=10 AND $MOY<12){
          $c++;} 
          if($MOY>=12 AND $MOY<=20){
          $d++;}
    
        }
        } 
       $reponse->closeCursor();
    $pa=" "; $pb=" "; $pc=" "; $pd=" ";
    if($effeclasse>0){
    $pa=Round((($a*100)/$effeclasse),2); $pc=Round((($c*100)/$effeclasse),2);
    $pb=Round((($b*100)/$effeclasse),2);$pd=Round((($d*100)/$effeclasse),2);
    $prozent=Round((($admis*100)/$effeclasse),2);
    
    $moyennecl=Round(($totalmoy/$effeclasse),2); 
      }
      $moymin =minmoyanETAB($bdda,$_SESSION['ancalcul']);
      $moymax =maxmoyanETAB($bdda,$_SESSION['ancalcul']); 
       echo " 
       <tr><td><B>Effectifs classés</B></td><td><B>".$a."</B></td><td><B>".$b."</B></td>
       <td><B>".$c."</B></td><td><B>".$d."</B></td><td><B>".$effeclasse."</B></td>
        </tr>";
      echo " 
     <tr><td><B>Fréquence ( % )</B></td><td><B>".$pa."</B></td><td><B>".$pb."</B></td>
     <td><B>".$pc."</B></td><td><B>".$pd."</B></td><td><B>100</B></td>
    </tr></table>";   
    
    echo "<Br><img src='espace.png' height='10px' width='10px'>";
    echo " <table class='table table-bordered table-hover'>
      <tr><td><B>1<sup>ère</sup> MOYENNE</B></td><td><B>DERNIERE MOYENNE</B></td><td><B>ADMIS</B>
      </td> <td><B>% REUSSITE</B></td><td><B>MOY  </B></td> 
       </tr>";
       echo "  
       <tr><td><B>".$moymax."</B></td><td><B>".$moymin."</B></td><td><B>".$admis."</B>
       </td> <td><B>".$prozent."</B></td><td><B>".$moyennecl."</B></td> 
        </tr></table>";
        
        
        echo "<Br><img src='espace.png' height='10px' width='10px'>";
        echo " <table class='table table-bordered table-hover'>
          <tr><td><B>5 PREMIER(E)S DE LA CLASSE</B></td><td><B>5 DERNIER(E)S DE LA CLASSE</B></td>  
           </tr><tr><td><B>";
    
           $v="SELECT * FROM  moyenneannuel WHERE anens='".$_SESSION['ancalcul']."' 
             AND rgan != ' ' ORDER BY moyan DESC" ;
    $reponse = $bdda->query($v);
    $i=1;   
    while ($donnees = $reponse->fetch() AND $i<=5)
    {
      $mazt=$donnees['matricule'];
      $mote=$donnees['moyan'];
      if($deja!=5){ 
       echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
        }
        else{ 
         echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
          }
          $i++;
    } 
    $reponse->closeCursor(); 
    echo"</B></td> <td><B>";
    
    $v="SELECT * FROM  moyenneannuel WHERE anens='".$_SESSION['ancalcul']."'    AND rgan != ' ' ORDER BY moyan" ;
    $reponse = $bdda->query($v);
    $i=1;   $deja=1;  
    while ($donnees = $reponse->fetch() AND $i<=5)
    {
      $mazt=$donnees['matricule'];
      $mote=$donnees['moyan'];
      if($deja!=5){ 
       echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
        }
        else{ 
        echo "<B>".$i." . ".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".classparid($bdda,$donnees['idcl'],$_SESSION['ancalcul'])." &nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp".$mote."</B><Hr>";
          }
          $i++;
    } 
    $reponse->closeCursor();
    
            echo"</B></td> </tr></table>";





    echo"</br><img src='espace.png' height='10px' width='10px'> </br>
    <b>MOYENNE ET POURCENTAGE DE REUSSITE ANNUELLES DES CLASSES </b> 
    </br><img src='espace.png' height='8px' width='10px'></br> 
     <table class='table table-bordered table-hover' border='2' cellspacing='0'><thead><tr bgcolor='grey'><td>CLASSES</td><td>Effectif</td><td>Total d'admis</td>
<td>Total d'echecs</td><td>Pourcentage de reussite</td><td>Pourcentage d'echecs</td><td>MOY . CL</td></thead> </tr>";
    
        
        $v="SELECT *  FROM classe WHERE sup='0' ";

   $reponse = $bdda->query($v);
   while ($donnees = $reponse->fetch())
   {
      $kls= $donnees['id']  ; $klsnom=classparid($bdda,$kls,$_SESSION['ancalcul']);
       
      if(effectif($bdda,$_SESSION['ancalcul'],$kls)>0){ 
        $v="SELECT *  FROM moyenneannuel  WHERE anens='".$_SESSION['ancalcul']."' AND idcl='".$kls."'
          ORDER BY  moyan DESC";
         $repons = $bdda->query($v);
        $n=0;$totalmoy=0;$effeclasse=0;$effec=0;$a=0;$b=0;$c=0;$d=0;$prozent=" "; $moyennecl=" ";$admis=0;
$echec=0;
        while ($donnee = $repons->fetch())
        {
           $effec++; 
           $MOY=$donnee['moyan'];
           $RG=$donnee['rgan'];
           if($RG!=" " AND !empty($RG)){
               $effeclasse++;$totalmoy+=$MOY; 
               if($MOY>=10){
                  $admis++;
               }
if($MOY<10){
                  $echec++;
               }
            }
        }
        $repons->closeCursor();  
        if($effeclasse>0){
          $prozent=Round((($admis*100)/$effeclasse),2);
          $moyennecl=Round(($totalmoy/$effeclasse),2);
        } 
        echo "<tr><td><B>".$klsnom."</B></td><td><B>".effectif($bdda,$_SESSION['ancalcul'],$kls)."</B></td>
<td><B>".$admis."</B></td><td><B>".$echec."</B></td><td><B>".$prozent."</B></td>
 <td><B>".Round((($echec*100)/$effeclasse),2)."</B></td>

 <td><B>".$moyennecl."</B></td>  </tr>" ;
    }
  }
    $reponse->closeCursor();

echo"</table>"; 

}





echo"</br><img src='espace.png' height='20px' width='10px'> </br>" ;
 echo " </br><b>  <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLe Censeur</I> </b>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<b> <I>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</I> </b>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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













 if(isset($_POST['sendexp'])){  
   
 

  }
  
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