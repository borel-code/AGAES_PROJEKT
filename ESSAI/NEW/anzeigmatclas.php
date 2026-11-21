<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; 
set_time_limit(900);

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
  
    if(isset($_POST['send2']) AND   !empty($_POST['mtier']) AND   !empty($_POST['cls'])){
         $matier=array();
         $clas=array();
         $matier=$_POST['mtier'];
         $clas=$_POST['cls'];
         $type=$_POST['send2']; 
         $tmat=count($matier);
         $tclas=count($clas);
         if($tmat>0 AND $tclas>0){ 
             for($i=0;$i<$tmat;$i++){
                $mat=$matier[$i];
                for($i=0;$i<$tclas;$i++){
                   $klas=$clas[$i];
                   $exist=existmatclass($bdda,$mat,$_SESSION['annee'],$klas);// 0 n'éxiste pas et id existe
                   $grupid=matgroupidgroup($bdda,$mat,$_SESSION['annee'],$type); //groupe de la matiere
                   if($exist==0){
                    $req=$bdda->prepare('INSERT INTO matclasse(idmat,idcl,idgp,anens,sup) VALUES(?,?,?,?,?)');
                    $req->execute(array($mat,$klas,$grupid,$_SESSION['annee'],0)); 
                   }
                   else{
                    $r="UPDATE matclasse SET idmat='".$mat."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                    $req=$bdda->query($r);
                    $r="UPDATE matclasse SET idcl='".$klas."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                    $req=$bdda->query($r); 
                    $r="UPDATE matclasse SET idgp='".$grupid."' WHERE id='".$exist."' AND anens='".$_SESSION['annee']."'";
                    $req=$bdda->query($r);
                   }


                } 
             }
    }

}

                  if(isset($_POST['send6'])){
                    $nom=$_POST['nom'];
                    $type=$_POST['type'];
                    $gp1=$_POST['gpe1'];
                    $gp2=$_POST['gpe2'];
                    $gp3=$_POST['gpe3'];
                    $gp4=$_POST['gpe4'];
                    if($nom!=" " AND !empty($nom)){
                      $r="UPDATE matiere SET codemat='".$nom."' WHERE id='".$_POST['send6']."' ";
                      $req=$bdda->query($r);
                      $r="UPDATE matiere SET typeEns='".$type."' WHERE id='".$_POST['send6']."'  ";
                      $req=$bdda->query($r);
                      $r="DELETE FROM matgroup  WHERE idmat='".$_POST['send6']."'  ";
                      $req=$bdda->query($r);
                      
                      
             if($gp1!=" " AND !empty($gp1)){
              $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
              $req->execute(array($_POST['send6'],$gp1,$_SESSION['annee'],1,0)); 
          }

          if($gp2!=" " AND !empty($gp2)){
            $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
            $req->execute(array($_POST['send6'],$gp2,$_SESSION['annee'],2,0)); 
          }

            
          if($gp3!=" " AND !empty($gp3)){
            $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
            $req->execute(array($_POST['send6'],$gp3,$_SESSION['annee'],3,0)); 
          }
          
          if($gp4!=" " AND !empty($gp4)){
            $req=$bdda->prepare('INSERT INTO matgroup(idmat,idgroup,anens,typeEns,sup) VALUES(?,?,?,?,?)');
            $req->execute(array($_POST['send6'],$gp4,$_SESSION['annee'],4,0)); 
          }
                    }
                           
                  
                  }

         
                  if(isset($_POST['send3']) AND !empty($_POST['mtier'])){
                    $tab=array();
                    $tab=$_POST['mtier'];
                  $total=count($tab);
                  $mat=$tab[0];
                   $v="SELECT *  FROM matiere WHERE   sup='0' AND id='".$mat."'";
                   $reponse = $bdda->query($v);
                   $true=0;
                   while ($donnees = $reponse->fetch() )
                   {
                    $idcodemat= $donnees['id'] ; 
                    $codemat= $donnees['codemat'] ; 
                  $code= $donnees['code'] ;  
                  
                  $type= $donnees['typeEns'] ;
                  $anc= $donnees['anc'] ; 
                   
                   } 
                   $reponse->closeCursor(); 

                  $gip1=matgroupidgroup($bdda,$idcodemat,$_SESSION['annee'],1);
                  $gip2=matgroupidgroup($bdda,$idcodemat,$_SESSION['annee'],2);
                  $gip3=matgroupidgroup($bdda,$idcodemat,$_SESSION['annee'],3);
                  $gip4=matgroupidgroup($bdda,$idcodemat,$_SESSION['annee'],4);

                  
                    }   


                  if(isset($_POST['send4']) AND !empty($_POST['mtier'])){
                    $tab=array();
                    $tab=$_POST['mtier'];
                  $total=count($tab);
                  for($i=0;$i<$total;$i++){
                   $r="UPDATE matiere SET sup = '1' WHERE id='".$tab[$i]."'  ";
                   $req=$bdda->query($r);
                 }
                     }         
        
                     if(isset($_POST['send5']) AND !empty($_POST['mtier'])){
                       echo 'a';
                      $tab=array();
                      $tab=$_POST['mtier'];
                    $total=count($tab);
                    for($i=0;$i<$total;$i++){
                     $r="UPDATE matiere SET sup = '0' WHERE id='".$tab[$i]."'  ";
                     $req=$bdda->query($r);
                   }
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script> 
  

</script> 
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
      <form action='gestmatclas.php' method='POST'>
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h1 class="m-0">AFFICHAGE DES MATIERES PAR CLASSE </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <?php if(isset($_POST['send3']) AND !empty($_POST['mtier'])){  
                echo "Modification de la matière : ".$codemat."";
              }
              else{
                echo "Choisir la classe";
              }
              ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                <div class="form-group">
                <?php if(isset($_POST['send3']) AND !empty($_POST['mtier'])){ ?> 
                    <form  method="POST" action="anzeigmatclas.php" name="paiem">
                    <label for="exampleInputEmail1">NOM DE LA MATIERE </label>
                    <?php        
        echo   "<input name='nom' value='".$codemat."' class='form-control' id='exampleInputEmail1' required > ";
        ?>  
                   
           </div>
                 
                 <div class="form-group">
                    <label for="exampleInputPassword1">TYPE D'ENSEIGNEMENT</label>

                    <select name="type" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
                      <?php 
                         echo "<option value='".$type."'>".nomgroupetype($bdda,$type)."</option>";

                         $v="SELECT *  FROM groupetype";
                         $reponse = $bdda->query($v);
                           
                          while ($donnees = $reponse->fetch()  )
                          {
                            if($donnees['code']!=$type){ 
                                $codetype=$donnees['code']; 
                                echo "<option value='".$codetype."'>".nomgroupetype($bdda,$codetype)."</option>";
                                    
                                   
                                }
                           } $reponse->closeCursor();
                      
                    
                   
           ?> 

							 </select></div>


               <div class="form-group">
                    <label for="exampleInputPassword1">Groupe dans l'enseignement général</label>

                    <select name="gpe1" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
                   
                    <?php 
                         echo "<option value='".$gip1."'>".groupmatensgnom($bdda,$gip1)."</option>";

                         $v="SELECT *  FROM groupmatensg1 WHERE typeEns='1'";
                         $reponse = $bdda->query($v);
                           
                          while ($donnees = $reponse->fetch()  )
                          {
                            if($donnees['code']!=$gip1){ 
                                $codetype=$donnees['code']; 
                                echo "<option value='".$codetype."'>".groupmatensgnom($bdda,$codetype)."</option>";
                                    
                                   
                                }
                           } $reponse->closeCursor();
                           echo "<option value=' '></option>";
                  
                   
           ?> 

							 </select>


               </div>


<div class="form-group">
     <label for="exampleInputPassword1">Groupe dans l'enseignement commercial</label>

     <select name="gpe2" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
     
                      <?php  
                       
                       echo "<option value='".$gip2."'>".groupmatensgnom($bdda,$gip2)."</option>";

                         $v="SELECT *  FROM groupmatensg1 WHERE typeEns='2'";
                         $reponse = $bdda->query($v);
                           
                          while ($donnees = $reponse->fetch()  )
                          {
                            if($donnees['code']!=$gip2){ 
                                $codetype=$donnees['code']; 
                                echo "<option value='".$codetype."'>".groupmatensgnom($bdda,$codetype)."</option>";
                                    
                                   
                                }
                           } $reponse->closeCursor();
                           echo "<option value=' '></option>";
                   
           ?> 

							 </select>

               </div>


<div class="form-group">
     <label for="exampleInputPassword1">Groupe dans l'enseignement industriel</label>

     <select name="gpe3" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
     
                     <?php  
                         echo "<option value='".$gip3."'>".groupmatensgnom($bdda,$gip3)."</option>";

                         $v="SELECT *  FROM groupmatensg1 WHERE typeEns='3'";
                         $reponse = $bdda->query($v);
                           
                          while ($donnees = $reponse->fetch()  )
                          {
                            if($donnees['code']!=$gip3){ 
                                $codetype=$donnees['code']; 
                                echo "<option value='".$codetype."'>".groupmatensgnom($bdda,$codetype)."</option>";
                                    
                                   
                                }
                           } $reponse->closeCursor();
                           echo "<option value=' '></option>";
                    
                    
           ?> 

							 </select>


               </div>


<div class="form-group">
     <label for="exampleInputPassword1">Groupe dans l'enseignement anglophone</label>

     <select name="gpe4" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
     
                    <?php 
                        echo "<option value='".$gip4."'>".groupmatensgnom($bdda,$gip4)."</option>";

                        $v="SELECT *  FROM groupmatensg1 WHERE typeEns='4'";
                        $reponse = $bdda->query($v);
                          
                         while ($donnees = $reponse->fetch()  )
                         {
                           if($donnees['code']!=$gip4){ 
                               $codetype=$donnees['code']; 
                               echo "<option value='".$codetype."'>".groupmatensgnom($bdda,$codetype)."</option>";
                                   
                                  
                               }
                          } $reponse->closeCursor();
                          echo "<option value=' '></option>";
                 
                   
           ?> 

							 </select><?php   
           echo "    <div class='card-footer'>
                  
                 <button type='submit' name='send6' value='".$idcodemat."'>Valider</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp   <button type='submit'>Annuler</button>
                </div> </form> "; 
              }
              else{
                ?> 
              <form  method="POST"  action="anzeigmatclas1.php" name="paiem">
              <H7><I> Enseignement général</I></H7>
             
              <div class="select2-purple">  </br> 
            <select class="select2" name="cls"  data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
            <optgroup label='Cycle 1'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='1' AND typeEns='1'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
               <optgroup label='Cycle 2'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='2' AND typeEns='1'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
                    </select>		 
              </div>  <div class="card-footer">
                <button type="reset" class="btn btn-danger">Annuler</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp
                <button type="submit" name="send2" value="1" class="btn btn-primary" >Valider</button> 
                
              </div></form>
              <h2><HR bgcolor="black"></h2>

              <form  method="POST" action="anzeigmatclas1.php" name="paiem">
              <H7><I> Enseignement commercial</I></H7>
              
              <div class="select2-purple">  </br> 
            <select class="select2" name="cls"  data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
            <optgroup label='Cycle 1'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='1' AND typeEns='2'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
               <optgroup label='Cycle 2'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='2' AND typeEns='2'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
                    </select>		 
              </div>  <div class="card-footer">
                <button type="reset" class="btn btn-danger">Annuler</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp
                <button type="submit" name="send2" value="2" class="btn btn-primary" >Valider</button> 
                
              </div></form>
              <h2><HR bgcolor="black"></h2>


              <form  method="POST" action="anzeigmatclas1.php" name="paiem">
              <H7><I> Enseignement industriel</I></H7>
             
              <div class="select2-purple">  </br> 
            <select class="select2" name="cls"  data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
            <optgroup label='Cycle 1'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='1' AND typeEns='3'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
               <optgroup label='Cycle 2'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='2' AND typeEns='3'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
                    </select>		 
              </div>  <div class="card-footer">
               
                <button type="reset" class="btn btn-danger">Annuler</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                 <button type="submit" name="send2" value="3" class="btn btn-primary" >Valider</button>
              </div></form>
              <h2><HR bgcolor="black"></h2>



              <form  method="POST" action="anzeigmatclas1.php" name="paiem">
              <H7><I> Enseignement anglophone</I></H7>
             
              <div class="select2-purple">  </br> 
            <select class="select2" name="cls"   data-placeholder="Choisir la classe" data-dropdown-css-class="select2-purple" style="width: 100%;">
            <optgroup label='Cycle 1'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='1' AND typeEns='4'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
               <optgroup label='Cycle 2'><?php $reponse = $bdda->query("SELECT * FROM classe WHERE sup='0' AND cycle='2' AND typeEns='4'  ");
                   while ($donnees = $reponse->fetch()){ 
                       $phrase =$donnees['id'] ; 
                      echo " <option value='".$phrase."'>".classparid($bdda,$phrase,$_SESSION['annee'])." </option >" ;
                     } 
               $reponse->closeCursor(); ?>
               </optgroup >
                    </select>		 
              </div>  <div class="card-footer">
                                <button type="reset" class="btn btn-danger">Annuler</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                <button type="submit" name="send2" value="4" class="btn btn-primary" >Valider</button>

              </div></form>
           


               <?php 
              }
              ?>  
                    
              </br> 
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                        </br> </br>
           
        
        
        </div>
          <!--/.col (left) -->




         
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <form  method="POST" action="anzeigmatclas.php" name="paiem">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> </h3>
              </div>
              <div class="card-body">
              
               
                <div class="form-group">
             </div>
                
                  <div class="card-footer">
                    
                  
                </div>
                
                
              </form></br> </br></br> </br>   
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

            </br> </br>
            

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> </h3>
              </div>
              <div class="card-body">
              
               
                <div class="form-group">
                <form  method="POST" action="anzeigmatclas.php" name="paiem">
                 </div>
                
                  <div class="card-footer">
                   
                  </br> 
                  
                </div>
                
                
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


             



            
            
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid --></br></br></br></br></br> 


</br></br>
    </section></br></br></br></br></br> 


</br></br>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
 
  <!-- Main Footer -->
  <!--footer class="main-footer">
   
    <strong> </strong>  
  </footer--> 

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