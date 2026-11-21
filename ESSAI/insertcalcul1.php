<?php
 session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
 require '../lesmenushoriz.php'; require '../lesmenushoriz2.php';
         
          

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
  


 
    if(isset($_POST['send']) ){
        $an=$_POST['ann'];$_SESSION['ancalcul']=$an;
        $trim=$_POST['trim'];$_SESSION['trimcalcul']=$trim;
        $clas=$_POST['clas'];$_SESSION['clascalcul']=$clas; 
        $v="SELECT *  FROM classe WHERE   sup='0' 
        ";
   $reponse = $bdda->query($v);
    $l=0;  
     while ($donnees = $reponse->fetch() AND $l==0)
     {
       if($donnees['id']==$_SESSION['clascalcul']){ 
        $_SESSION['Categ']=$donnees['categ'];  
               $l=1; 
           }
      }
     $reponse->closeCursor();  
   }
  
   else{
       $an=$_SESSION['ancalcul'] ;
       $trim=$_SESSION['trimcalcul'] ;
       $clas=$_SESSION['clascalcul'] ;
   }
   $_SESSION['typensgcalcul']=TYPENS($bdda,$_SESSION['clascalcul'],$_SESSION['ancalcul']);
   $GROUP1=array();$GROUP2=array();$GROUP3=array();

   $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
   $reponse = $bdda->query($v);
    $l=1;  
     while ($donnees = $reponse->fetch() )
     {
       if($donnees['idgp']==1){ 
        $GROUP1[$l]=$donnees['idmat'];  
               $l++; 
           }
      }
     $reponse->closeCursor();
    $_SESSION['GROUP1'] =$GROUP1;

    $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
    $reponse = $bdda->query($v);
     $l=1;  
      while ($donnees = $reponse->fetch() )
      {
        if($donnees['idgp']==2){ 
         $GROUP1[$l]=$donnees['idmat'];  
                $l++; 
            }
       }
      $reponse->closeCursor();
     $_SESSION['GROUP2'] =$GROUP2;


     $v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['ancalcul']."' AND sup='0' AND idcl='".$_SESSION['clascalcul']."'";
    $reponse = $bdda->query($v);
     $l=1;  
      while ($donnees = $reponse->fetch() )
      {
        if($donnees['idgp']==3){ 
         $GROUP1[$l]=$donnees['idmat'];  
                $l++; 
            }
       }
      $reponse->closeCursor();
     $_SESSION['GROUP3'] =$GROUP3;




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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script> 
  
  function nbremat(str){
             if(str==" "){
                 document.getElementById("eval").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("eval").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","insertcalajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }

</script> 


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
      <form action='insercalculseq.php' method='POST'>
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
    <img src="AGAES2.png" height="50px" width="200px" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8"></center> 
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
            <h3 class="m-0">Calcul des moyennes, affichage des bulletins et statistiques <?php echo Nametrim($bdda,$_SESSION['trimcalcul'])." en ". classparid($bdda,$clas,$an);?></h3>&nbsp&nbsp&nbsp
            <?php  if($_SESSION['calerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Evaluation calculée avec  succès !! Veuillez cliquer sur la petite croix pour l'enlever</i> 
                  <?php ?> </h5>
    </div>
     <?php $_SESSION['calerfolg']=0; } ?>

     <?php  if($_SESSION['caltrimerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Trimestre calculé avec succès !! Veuillez cliquer sur la petite croix pour l'enlever</i> 
                  <?php ?> </h5>
    </div>
     <?php $_SESSION['caltrimerfolg']=0; } ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
         
              <li class="breadcrumb-item ">
       <b>Système de 2022/2023 à 2024/2025</b>
            </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <!-- Main content -->
 <?php  $_SESSION['elevemattri']=array();  $_SESSION['elevemarktri']=array(); $_SESSION['elevepostri']=array();
          if($_SESSION['trimcalcul']!=3){
         $vZ="SELECT *  FROM moyennetrim WHERE anens='".$_SESSION['ancalcul']."' 
        AND idcl='".$_SESSION['clascalcul']."' 
       AND codetrim='".$_SESSION['trimcalcul']."' 
         ORDER BY moytrim DESC";
         $reponsZ = $bdda->query($vZ);
         $pos=1;
         while ($donneesZ = $reponsZ->fetch())
         {
          $_SESSION['elevemattri'][$pos]= $donneesZ['matricule'];
          $_SESSION['elevemarktri'][$pos]= $donneesZ['moytrim'];
          $_SESSION['elevepostri'][$pos]= $donneesZ['rgtrim'];
           $pos++;
        }$reponsZ->closeCursor();
        }

          


        if($_SESSION['trimcalcul']==3){
          $vZan="SELECT *  FROM moyenneannuel WHERE anens='".$_SESSION['ancalcul']."' 
         AND idcl='".$_SESSION['clascalcul']."' ORDER BY moyan DESC";
          $reponsZan = $bdda->query($vZan);
          $posa=1;
          while ($donneesZan = $reponsZan->fetch())
          {
           $_SESSION['elevemattri'][$posa]= $donneesZan['matricule'];
           $_SESSION['elevemarktri'][$posa]= $donneesZan['moyan'];
           $_SESSION['elevepostri'][$posa]= $donneesZan['rgan'];
            $posa++;
         }$reponsZan->closeCursor();
         }

         $effecti=count($_SESSION['elevemattri']);
         $_SESSION['counteleve']=$effecti;

         ?> 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
           <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Calcul des moyennes-système par séquence</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="insertcalcul2.php" name="paiem">
                <div class="card-body">
                   <div class="form-group">
                  <label for="exampleInputPassword1">EVALUATIONS</label>
                  <div class="select2-purple">
                    <select name="eval" onChange="nbremat(this.value)" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                    echo " <option value='0' >Choisir</option> ";
                    if($trim==1){
                      $nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==2){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==3){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,2,$an);
                      $nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }

                    ?>
								</select>
                </div> </br>
                <div id="eval">

                </div>
                <div class="form-group">
 

 <label for="exampleInputPassword1">Nombre minimal de matières</label>
 <input name='min' class='form-control' id='exampleInputEmail1'   required >
              
             </div>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Calculer</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                        </br> </br>
                        
             





                        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Calcul de la moyenne du trimestre-Tout système</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="insertcalcultrim.php" name="paiem">
                <div class="card-body">
               

                  <div class="form-group">
                  <label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                 


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Calculer</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                        </br> 
                      
                      
                      
                      
            
                        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" > Affichage des bulletins-système par séquence</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               
      
                  <div class="form-group">
                  <I>Pour la classe</I><table ><tr><td>   
                  <form  method="POST" action="insertaffbulleva.php" name="paiem">
                  <label for="exampleInputPassword1">Evaluations</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                    if($trim==1){
                      $nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==2){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==3){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,2,$an);
                      $nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }

                    ?>
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Rang</label>
                  <div class="select2-purple">
                    <select name="ordre" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option value="1">Du 1er au 15ème</option><option value="2">Du 16ème au 30ème</option>
                    <option value="3">Du 31ème au 45ème</option><option value="4">Du 46ème au 60ème</option>
                    <option value="5">Du 61ème au 75ème</option><option value="6">Du 76ème au 90ème</option>
                    <option value="7">Du 91ème au 105ème</option><option value="8">TOUT</option>
                     
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 
              <?php    
                
                    if($_SESSION['trimcalcul']==3){  
                    echo" <form  method='POST' action='insertaffbullan.php' name='paiem'>";
                  }
                  if($_SESSION['trimcalcul']!=3){  
                    echo" <form  method='POST' action='insertaffbulltrim.php' name='paiem'>";
                  }
                ?>  
                  
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Rang</label>
                  <div class="select2-purple">
                    <select name="ordre" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php  
                    if($effecti<15){
                      $acc='1-'.$effecti;
                      echo "<option value='".$acc."'>du 1er au ".$effecti."ème</option>";
                    }
                    if($effecti>=15){
                      $reste=$effecti%15;
                      $tour=($effecti-$reste)/15;
                      $itera=1;$min=0;
                      while($itera<=$tour){
                        $min=$min+1; $max=$itera*15;
                        $acc=$min.'-'.$max;
                        if($min==1){
                          echo "<option value='".$acc."'>du ".$min."er au ".$max."ème</option>";
                        }
                        if($min!=1){
                          echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                        }
                        $min=$max;
                         $itera++;
                      }
                    }
                    if($reste!=0){
                      $min=$max+1; $max=$max+$reste;
                      $acc=$min.'-'.$max;
                      echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                    }
                    ?>
                    <option value="8">Tout</option>
                     
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
            </td></tr> </table> 
            
            
             

            <H1><hr></H1>
            <I>Par élève</I><table><tr><td>   
                  <form  method="POST" action="insertaffbullevaelev.php" name="paiem">
                  <label for="exampleInputPassword1">Evaluations</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                    if($trim==1){
                      $nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==2){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==3){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,2,$an);
                      $nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }

                    ?>
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Noms</label>
                  <div class="select2-purple">
                    <select name="matri" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php    
                       $v="SELECT matelev,nomelev,preelev,anelev FROM  eleve WHERE anelev='".$_SESSION['ancalcul']."' 
       AND niveauelev='".$_SESSION['clascalcul']."'   ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$i=1;   
while ($donnees = $reponse->fetch())
{
 $mazt=$donnees['matelev'];
 echo "<option value='".$mazt."'>".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)."</option>" ;

} 
$reponse->closeCursor();
  ?>
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 
              <?php    
                
                if($_SESSION['trimcalcul']==3){  
                echo" <form  method='POST' action='insertaffbullanelev.php' name='paiem'>";
              }
              if($_SESSION['trimcalcul']!=3){  
                echo" <form  method='POST' action='insertaffbulltrimelev.php' name='paiem'>";
              }
            ?>  
              
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Noms</label>
                  <div class="select2-purple">
                    <select name="matri" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php    
                       $v="SELECT matelev,nomelev,preelev,anelev FROM  eleve WHERE anelev='".$_SESSION['ancalcul']."' 
       AND niveauelev='".$_SESSION['clascalcul']."'   ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$i=1;   
while ($donnees = $reponse->fetch())
{
 $mazt=$donnees['matelev'];
 echo "<option value='".$mazt."'>".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)."</option>" ;

} 
$reponse->closeCursor();
  ?>
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
            </td></tr> </table> 




                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
                                      
                      
                      
                      </br>





                      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" > Affichage des bulletins-système par compétence</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               
      
                  <div class="form-group">
                  <I>Pour la classe</I> 
              <?php    
                
                    if($_SESSION['trimcalcul']==3){  
                    echo" <form  method='POST' action='insertaffbullanew.php' name='paiem'>";
                  }
                  if($_SESSION['trimcalcul']!=3){  
                    echo" <form  method='POST' action='insertaffbulltrimnew.php' name='paiem'>";
                  }
                ?>  
                  
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Rang</label>
                  <div class="select2-purple">
                    <select name="ordre" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php  
                    if($effecti<15){
                      $acc='1-'.$effecti;
                      echo "<option value='".$acc."'>du 1er au ".$effecti."ème</option>";
                    }
                    if($effecti>=15){
                      $reste=$effecti%15;
                      $tour=($effecti-$reste)/15;
                      $itera=1;$min=0;
                      while($itera<=$tour){
                        $min=$min+1; $max=$itera*15;
                        $acc=$min.'-'.$max;
                        if($min==1){
                          echo "<option value='".$acc."'>du ".$min."er au ".$max."ème</option>";
                        }
                        if($min!=1){
                          echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                        }
                        $min=$max;
                         $itera++;
                      }
                    }
                    if($reste!=0){
                      $min=$max+1; $max=$max+$reste;
                      $acc=$min.'-'.$max;
                      echo "<option value='".$acc."'>du ".$min."ème au ".$max."ème</option>";
                    }
                    ?>
                    <option value="8">Tout</option>
                     
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
             
            
            
             

            <H1><hr></H1>
            <I>Par élève</I>  
              <?php    
                
                if($_SESSION['trimcalcul']==3){  
                echo" <form  method='POST' action='insertaffbullanelevnew.php' name='paiem'>";
              }
              if($_SESSION['trimcalcul']!=3){  
                echo" <form  method='POST' action='insertaffbulltrimelevnew.php' name='paiem'>";
              }
            ?>  
              
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                <label for="exampleInputPassword1">Noms</label>
                  <div class="select2-purple">
                    <select name="matri" class="select2" data-placeholder=" " data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php    
                       $v="SELECT matelev,nomelev,preelev,anelev FROM  eleve WHERE anelev='".$_SESSION['ancalcul']."' 
       AND niveauelev='".$_SESSION['clascalcul']."'   ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$i=1;   
while ($donnees = $reponse->fetch())
{
 $mazt=$donnees['matelev'];
 echo "<option value='".$mazt."'>".nameschuler($bdda,$mazt)." ".vornameschuler($bdda,$mazt)."</option>" ;

} 
$reponse->closeCursor();
  ?>
                    </select>
                </div> </br>


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
            




                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
                                      
                      
                      
                      </br>



                        

                        

        
        </div>
          <!--/.col (left) -->




         
          <!-- right column -->
         

          
           

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Affichage des moyennes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               

                  <div class="form-group"><table ><tr><td>   
                  <form  method="POST" action="insertaffmoyeva.php" name="paiem">
                  <label for="exampleInputPassword1">Evaluations</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                    if($trim==1){
                      $nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==2){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==3){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,2,$an);
                      $nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }

                    ?>
								</select>
                </div> </br>
                   
             


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 
               
                  <form  method="POST" action="insertaffmoytrim.php" name="paiem">
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                 


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
            </td></tr> </table>  
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
            </br> </br></br> </br></br></br>    
                        
               </br>  




               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Affichage des moyennes annuelles</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               

                  <div class="form-group"><table ><tr><td>   
                  <form  method="POST" action="insertaffmoyan.php" name="paiem">
                      <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td> </tr> </table>  
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
                        
 </br>  




                        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Affichage des procès verbaux</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               

                  <div class="form-group"><table ><tr><td>   
                  <form  method="POST" action="insertaffpveva.php" name="paiem">
                  <label for="exampleInputPassword1">Evaluations</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php 
                    if($trim==1){
                      $nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==2){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }
                    if($trim==3){
                      $nbrevaltri1=nbreval($bdda,$clas,1,$an);
                      $nbrevaltri2=nbreval($bdda,$clas,2,$an);
                      $nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo " <option value='".$i."' >Evaluation ".$i."</option> ";
                      }
                    }

                    ?>
								</select>
                </div> </br>
                   
             


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 
               
                  <form  method="POST" action="insertaffpvtrim.php" name="paiem">
                  &nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
                  <div class="select2-purple">
                    <select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    
                    <?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>
                     
								</select>
                </div> </br>
                   
                 


                                <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form>
            
            </td></tr> </table>  
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
                        

               
            

            </br>  












<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"> Affichage des statistiques</h3>
</div>
<!-- /.card-header -->
<!-- form start -->

<div class="card-body">


<div class="form-group"><table ><tr><td>   
<form  method="POST" action="insertaffstateva.php" name="paiem">
<label for="exampleInputPassword1">Evaluations</label>
<div class="select2-purple">
<select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
<?php 
if($trim==1){
$nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
for($i=1;$i<$nbrevaltri1+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}
if($trim==2){
$nbrevaltri1=nbreval($bdda,$clas,1,$an);
$nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
$total=$nbrevaltri1+$nbrevaltri2;
$j=$nbrevaltri1+1;
for($i=$j;$i<$total+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}
if($trim==3){
$nbrevaltri1=nbreval($bdda,$clas,1,$an);
$nbrevaltri2=nbreval($bdda,$clas,2,$an);
$nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
$total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
$j=$nbrevaltri1+$nbrevaltri2+1;
for($i=$j;$i<$total+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}

?>
</select>
</div> </br>




        <div class="card-footer">
<button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 

</div>
</form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 

<form  method="POST" action="insertaffstatrim.php" name="paiem">
&nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">Trimestre</label>
<div class="select2-purple">
<select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">

<?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>

</select>
</div> </br>




        <div class="card-footer">
<button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 

</div>
</form>

</td></tr> </table>  
</div> 
</div>
<!-- /.card-body --> 
</div>
<!-- /.card -->  


<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Affichage des statistiques annuelles</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
               

                  <div class="form-group"><table ><tr><td>   
                  <form  method="POST" action="insertaffstatan.php" name="paiem">
                      <div class="card-footer">
                  <button type="submit"  name="send2" class="btn btn-success" >Afficher</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 
                </div>
              </form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td> </tr> </table>  
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
                        
 </br>  





<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"> Affichage des statistiques de l'établissement</h3>
</div>
<!-- /.card-header -->
<!-- form start -->

<div class="card-body">


<div class="form-group"><table ><tr><td>   
<form  method="POST" action="insertaffstatetab.php" name="paiem">
<label for="exampleInputPassword1">EVALUATIONS</label>
<div class="select2-purple">
<select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">
<?php 
if($trim==1){
$nbrevaltri1=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
for($i=1;$i<$nbrevaltri1+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}
if($trim==2){
$nbrevaltri1=nbreval($bdda,$clas,1,$an);
$nbrevaltri2=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
$total=$nbrevaltri1+$nbrevaltri2;
$j=$nbrevaltri1+1;
for($i=$j;$i<$total+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}
if($trim==3){
$nbrevaltri1=nbreval($bdda,$clas,1,$an);
$nbrevaltri2=nbreval($bdda,$clas,2,$an);
$nbrevaltri3=nbreval($bdda,$clas,$_SESSION['trimcalcul'],$an);
$total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
$j=$nbrevaltri1+$nbrevaltri2+1;
for($i=$j;$i<$total+1;$i++){
echo " <option value='".$i."' >Evaluation ".$i."</option> ";
}
}

?>
</select>
</div> </br>




        <div class="card-footer">
<button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 

</div>
</form> </td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> 

<form  method="POST" action="insertaffstatrimetab.php" name="paiem">
&nbsp&nbsp&nbsp&nbsp<label for="exampleInputPassword1">TRIMESTRE</label>
<div class="select2-purple">
<select name="eval" class="select2" data-placeholder="Choisir l'évaluation" data-dropdown-css-class="select2-purple" style="width: 100%;">

<?php   echo " <option value='".$_SESSION['trimcalcul']."' >".$_SESSION['trimcalcul']."</option> ";?>

</select>
</div> </br>




        <div class="card-footer">
<button type="submit"  name="send2" class="btn btn-primary" >Afficher</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 

</div>
</form>

</td></tr> </table>  
</div> 
</div>
<!-- /.card-body --> 
</div>
<!-- /.card --> 










        
        </div>





          <!--/.col (right) -->
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