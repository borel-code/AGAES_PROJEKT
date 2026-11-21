<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
$_SESSION['newensg']=" ";
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
				 
         function matRech(str){
             if(str==" "){
                 document.getElementById("mat").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("mat").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","ajoutensajax.php?q="+str,true);
                 xmlhttp.send();
             }
         }

         function clRech(str){
             if(str==" "){
                 document.getElementById("cl").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("cl").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","ajoutensajax2.php?q="+str,true);
                 xmlhttp.send();
             }
         }


         function rechercher(str){
             if(str==" "){
                 document.getElementById("suchen").innerHTML=" ";
                 return ;
             }
             else{
                 var xmlhttp=new XMLHttpRequest();
                 xmlhttp.onreadystatechange=function(){
                     if(this.readyState==4 && this.status==200 ){
                         document.getElementById("suchen").innerHTML=this.responseText;
                     }
                 };
                 xmlhttp.open("POST","ajoutensrech.php?q="+str,true);
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
            <h1 class="m-0">LES MEMBRES DE L'ADMINISTRATION </h1>&nbsp&nbsp&nbsp
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
  <?php  if($_SESSION['engadmin']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Membre enregistré(e)</i></h5>
    </div>
     <?php   $_SESSION['engadmin']=0; } ?>

     <?php  if($_SESSION['engadmin']==2){ ?>
  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle">Membre non enregistré(e).Changez le mot de passe ,nom d'utilisateur ou N° CNI</i></h5>
    </div>
     <?php   $_SESSION['engadmin']=0; } ?>


     <?php  if($_SESSION['modifadmin']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Membre  modifié(e)</i></h5>
    </div>
     <?php  $_SESSION['modifadmin']=0; } ?>
 
     <?php  if($_SESSION['supadmin']==1){ ?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Membre  supprimé(e)</i></h5>
    </div>
     <?php  $_SESSION['supadmin']=0; } ?>

     

      
  <H4 style='color : purple'><B> </B></H4> 
 
  <div class="row">
  <button type='button'  style='width: 100%; height: 5%;' class='btn btn-default' data-toggle='modal' data-target='#aide'>
   Aide  </button> </br></br>
  <button type="button"  style="width: 100%; height: 5%;" class="btn btn-primary" data-toggle="modal" data-target="#enregdev">
 <i class='fas fa-plus'>
   </i> Ajouter un(e) nouvel(le) membre
   </br>&nbsp &nbsp    </button>
   </br>   </br></br>
           </div>
           </br>
           <div class="row">
          
     
       
        </div> 
        
        <form action="enregad.php" method="POST">
   <input name='requete' placeholder='saisir ici quelques caractères du  nom  '   style="width: 100%; height: 5%;"    class='form-control' id='exampleInputEmaile'> 
   </br> 
  <button type="submit" name="rechercher" style="width: 100%; height: 5%;" class="btn btn-success" data-toggle="modal"  >
  <i class="fas fa-search">
   </i> Rechercher
   </br>&nbsp &nbsp    </button>
    </form>       </br>

           
           <?php if(isset($_POST['rechercher'])){                 
echo "  <form action='enregad.php' method='POST'>                 
 <button type='submit'  style='width: 100%; height: 5%;' class='btn btn-default' data-toggle='modal' data-target='# '>
   Afficher tout</button></form></br></br>  ";
  }
  ?>   

  </div>
    <!-- /.modal-content -->
 
    <!-- /.content -->
     
  </div>
  <!-- /.content-wrapper -->
  <div id="suchen"> 

  </div>
  <div class="card card-solid">
  <div class="card-body">
   <div class="row">
   <?php  
   
   
 
  if($_SESSION['code']!=50){ 
  $v="SELECT * FROM admin WHERE sup='0' AND intrus='0' ORDER BY nom";
  if(isset($_POST['rechercher'])){
    $valeurrech=$_POST['requete'];
    if(!empty($valeurrech) AND $valeurrech!=" "){ 
      
        $v="SELECT * FROM admin  WHERE sup='0' AND intrus='0'
        AND  nom LIKE'%".$valeurrech."%'   ORDER BY nom";
  
      }
    else{ 
      $v="SELECT * FROM admin  WHERE sup='0' AND intrus='0' ORDER BY nom";
 
    }
  }
}

if($_SESSION['code']==50){ 
  $v="SELECT * FROM admin WHERE sup='0'  ORDER BY nom";
  if(isset($_POST['rechercher'])){
    $valeurrech=$_POST['requete'];
    if(!empty($valeurrech) AND $valeurrech!=" "){ 
      
        $v="SELECT * FROM admin  WHERE sup='0'  
        AND  nom LIKE'%".$valeurrech."%'   ORDER BY nom";
  
      }
    else{ 
      $v="SELECT * FROM admin  WHERE sup='0'  ORDER BY nom";
 
    }
  }
}
  $_SESSION['imprimdev']=$v;
  $reponse = $bdda->query($v);
  $i=1; $to=0; $tno=0;
while ($donnees = $reponse->fetch() )
{
  $idev=$donnees['id'];
  $nomdev=$donnees['nom'];
  $user=$donnees['user'];
  $mtp=$donnees['mtpasse'];
  $tel=$donnees['numtel'];
  $intrus=$donnees['intrus'];
  $an=$donnees['anens'];
  $genre=$donnees['genre'];
  $statut=$donnees['verrou'];
  $cni=$donnees['cni'];
  $migrer=$donnees['migrer'];
  $montant=0+montantpayeadmin($bdda,$idev,$_SESSION['annee']);
  
   

  $modaj='#modaal-ajout'.$i;
  $modaj1='modaal-ajout'.$i;
  $moda='#modaal-success'.$i;
  $moda1='modaal-success'.$i;
  $modadang='#modaal-danger'.$i;
  $modadang1='modaal-danger'.$i;
  $modahist='#modaal-hist'.$i;
  $modahist1='modaal-hist'.$i;
echo "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column' style='color:black';> <div class='card card-solid'>
        <div class='card-body pb-0 '><b># ".$i."</br>
        Noms : ".$nomdev."</br>
        Téléphone : <span class='badge bg-primary'>".$tel."</span></br>
        poste(s) occupé(s) : </br> ";
       if($intrus==0){ 
     echo toutposte($bdda,$idev,$_SESSION['annee'],$genre);
      }
      if($intrus==1){ 
        echo "Webmaster ".toutposte($bdda,$idev,$_SESSION['annee'],$genre);
         }
      
         echo "  </br> id utilisateur : ".$idev."</br></br></b><div class='btn-group w-100 mb-2'>
     
     <button value='".$idev."' 
    type='button'  class='btn btn-danger' data-toggle='modal' data-target='".$modadang."'
    title='supprimer' >
    
    <i class='fas fa-trash'>
  </i>
  </button>
     
     <button value='".$idev."' 
    name='modif'  type='button'  class='btn btn-success' data-toggle='modal' data-target='".$moda."'
       title='modifier'>
      
      <i class='fas fa-pencil-alt'>
    </i>
    </button>   
      </div>
    </div></div></div> ";?>



 
<?php  
   echo "<div class='modal fade' id='".$moda1."'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Modification</h4>
         
        <form action='enregad1.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><div class="form-group">
          <label for="exampleInputEmail1">Noms<i> (Obligatoire)</i></label>
              <input value="<?php echo $nomdev; ?>" name="nom"  class="form-control" id="exampleInputEmail1"   required >
            </div> </p>
            
            <p><div class="form-group">
                    <label for="exampleInputEmail1">Genre</label>
                    <select name="genre"   class="form-control" id="exampleInputEmail1">
                    <?php  
                    if($genre=='M'){
                   echo" <option value='M'>Masculin</option>
                    <option value='F'>Féminin</option>";
                     } 
                     if($genre=='F'){
                      echo" 
                      <option value='F'>Féminin</option><option value='M'>Masculin</option>
                       ";
                        } 
                     ?>
                  </select>  </div>
                   </p>
                   <p><div class="form-group">
                    <label for="exampleInputEmail1">Statut du compte</label>
                    <select name="statut"   class="form-control" id="exampleInputEmail1">
                    <?php  
                    if($statut==0){
                   echo" <option value='0'>Actif</option>
                    <option value='1'>Bloqué</option>";
                     } 
                     if($statut==1){
                      echo" 
                      <option value='1'>Bloqué</option>
                      <option value='0'>Actif</option>
                       ";
                        } 
                     ?>
                  </select>  </div>
                   </p>

            <p><div class="form-group">
         <label for="exampleInputEmail1">Téléphone</label>
              <input value="<?php echo $tel; ?>" name="tel"  class="form-control" id="exampleInputEmail1"    >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">Nom d'utilisateur<i> (Obligatoire)</i></label>
              <input value="<?php echo $user; ?>" name="user"  class="form-control" id="exampleInputEmail1"   required >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">Mot de passe<i> (Obligatoire)</i></label>
              <input value="<?php echo $mtp; ?>" name="mtp"  class="form-control" id="exampleInputEmail1"   required >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">CNI<i> (Obligatoire)</i> </label>
              <input value="<?php echo $cni; ?>" name="cni"  class="form-control" id="exampleInputEmail1" required >
            </div> </p>
           

            <p><div class="form-group">
            <label for="exampleInputEmail1">Ses postes cette année scolaire</label>
            </div> 
            <b> 
            <div class="form-check"><label class="form-check-label">  
  <input type="checkbox" class="form-check-input" value="1" <?php echo cochposte($bdda,$idev,$_SESSION['annee'],1); ?> name="poste1"> Fondateur/Fondatrice   
  </label></div> 
  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="2"   <?php echo cochposte($bdda,$idev,$_SESSION['annee'],2); ?> name="poste2">Principal(e)  
          </label></div>
          <div class="form-check">  <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="3"   <?php echo cochposte($bdda,$idev,$_SESSION['annee'],3); ?> name="poste3">Censeur(e)     
          </label></div>
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="4"   <?php echo cochposte($bdda,$idev,$_SESSION['annee'],4); ?> name="poste4">Econome   
          </label></div>
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="5"   <?php echo cochposte($bdda,$idev,$_SESSION['annee'],5); ?> name="poste5">Surveillant(e) général(e)  
          </label></div>
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"  value="6"  <?php echo cochposte($bdda,$idev,$_SESSION['annee'],6); ?> name="poste6">Surveillant(e) de secteur
          </label></div>
          <div class="form-check">  <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="7"   <?php echo cochposte($bdda,$idev,$_SESSION['annee'],7); ?> name="poste7">Sécrétaire      
          </label></div>       
          <?php 
          if($_SESSION['code']==50){ 
            if($intrus==1){
            ?>
            <div class="form-check">  <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="50" checked="checked"    name="poste50">Webmaster      
            </label></div> 
            <?php
            }
            if($intrus==0){
              ?>
              <div class="form-check">  <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="50"  name="poste50">Webmaster      
              </label></div> 
              <?php
              }
          }
          ?>
          </b> 
 
                   <p><div class="form-group">
         <label for="exampleInputEmail1">Salaire pour cette année scolaire</label>
              <input value="<?php echo $montant; ?>" name="montant"  class="form-control" id="exampleInputEmail1"    >
            </div> </p>


            <p><div class="form-group">
                    <label for="exampleInputEmail1">L'autoriser l'accès pour l'autre établissement<i> (Cas des complexes)</i></label>
                    <select name="migrer"   class="form-control" id="exampleInputEmail1">
                    <?php  
                    if($migrer==0){
                   echo" <option value='0'>Non</option>
                    <option value='1'>Oui</option>";
                     } 
                     if($migrer==1){
                      echo" 
                      <option value='1'>Oui</option>
                      <option value='0'>Non</option>
                       ";
                        } 
                     ?>
                  </select>  </div>
                   </p>




            id : <?php echo $idev  ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name="modifadm" value="<?php echo $idev; ?>" class="btn btn-primary">Enregistrer</button>
</form></div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


      


<?php  
     
   echo "<div class='modal fade' id='".$modadang1."'> " ; ?>
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
               
              <form action='enregad1.php' method='POST'>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><div class="form-group">
                    <label for="exampleInputEmail1">Noms et prénoms</label>
                    <select name="idev"  class="form-control" id="exampleInputEmail1">
                    <?php echo "<option value='".$idev."'>".$nomdev." ".$prenom."</option>"; ?>
  </select>
                  </div> id : <?php echo $idev  ?></br>
                  <h5><i class="icon fas fa-exclamation-triangle">
                   Voulez vous vraiment supprimer ?
                  </i></h5>    
                  </p>
                  
            </div>
            <div class="modal-footer justify-content-between">


             
              <button type="submit" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button  type="submit" name="supadm" value="<?php echo $idev; ?>" class="btn btn-danger">Supprimer</button>
    </form></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      




       
<?php 
      $i++;
  } 
  $reponse->closeCursor(); 
     
  $i=$i-1;
 


 


 
  ?>







  
  </div> </div> </div> 
  <!-- /.content-wrapper -->
  


</br></br> 
  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="enregadIMP.php" data-filter="all">version imprimable</a>
                    <a class="btn btn-info" href="enregadANNEE.php" data-filter="1">trier par année</a>
                     </div>

   </br></br> 
  

  

  <?php  
     echo "<div class='modal fade' id='enregdev'> " ; ?>
     <div class="modal-dialog">
       <div class="modal-content ">
         <div class="modal-header">
           <h4 class="modal-title">Nouvel(le) membre</h4>
            
           <form action='enregad1.php' method='POST'>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <p><div class="form-group">
             <label for="exampleInputEmail1">Noms<i> (Obligatoire)</i></label>
                 <input name="nom"  class="form-control" id="exampleInputEmail1"   required >
               </div> </p>
               
               <p><div class="form-group">
                       <label for="exampleInputEmail1">Genre</label>
                       <select name="genre"   class="form-control" id="exampleInputEmail1">
                       <option value='M'>Masculin</option>
                       <option value='F'>Féminin</option>";
                         
                     </select>  </div>
                      </p>
                      
   
               <p><div class="form-group">
            <label for="exampleInputEmail1">Téléphone</label>
                 <input   name="tel"  class="form-control" id="exampleInputEmail1"    >
               </div> </p>
               <p><div class="form-group">
            <label for="exampleInputEmail1">Nom d'utilisateur<i> (Obligatoire)</i></label>
                 <input  name="user"  class="form-control" id="exampleInputEmail1"   required >
               </div> </p>
               <p><div class="form-group">
            <label for="exampleInputEmail1">Mot de passe<i> (Obligatoire)</i></label>
                 <input   name="mtp"  class="form-control" id="exampleInputEmail1"   required >
               </div> </p>
               <p><div class="form-group">
            <label for="exampleInputEmail1">CNI<i> (Obligatoire)</i> </label>
                 <input   name="cni"  class="form-control" id="exampleInputEmail1" required >
               </div> </p>
              
   
               <p><div class="form-group">
               <label for="exampleInputEmail1">Ses postes cette année scolaire</label>
               </div> 
               <b> 
               <div class="form-check"><label class="form-check-label">  
     <input type="checkbox" class="form-check-input" value="1"  name="poste1"> Fondateur/Fondatrice   
     </label></div> 
     <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="2"    name="poste2">Principal(e)  
             </label></div>
             <div class="form-check">  <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="3"  name="poste3">Censeur(e)     
             </label></div>
             <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="4"   name="poste4">Econome   
             </label></div>
             <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" value="5"   name="poste5">Surveillant(e) général(e)  
             </label></div>
             <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"  value="6"  name="poste6">Sécrétaire    
             </label></div>
             <div class="form-check">  <label class="form-check-label"><b><input type="checkbox" class="form-check-input" value="7"  name="poste7">Surveillant(e) de secteur  
             </label></div>       
             <?php 
          if($_SESSION['code']==50){ 
             ?>
            <div class="form-check">  <label class="form-check-label"><b><input type="checkbox" class="form-check-input" value="50"  name="poste50">Webmaster      
              </label></div> 
              <?php   
          }
          ?>
             
             </b> 
   
                      <p><div class="form-group">
            <label for="exampleInputEmail1">Salaire pour cette année scolaire</label>
                 <input  name="montant"  class="form-control" id="exampleInputEmail1"    >
               </div> </p>

               <p><div class="form-group">
                    <label for="exampleInputEmail1">L'autoriser l'accès pour l'autre établissement<i> (Cas des complexes)</i></label>
                    <select name="migrer"   class="form-control" id="exampleInputEmail1">
                     <option value='0'>Non</option>
                    <option value='1'>Oui</option>";
                   </select>  </div>
                   </p>
              
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
           <button type="submit" name="engadm"  class="btn btn-primary">Enregistrer</button>
   </form></div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
      
     



<?php  
   echo "<div class='modal fade' id='aide'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Aide</h4>
         
        <form action='ajoutensgenreg.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
           
            <p><div class="form-group">
            <label for="exampleInputEmail1"> 
            Cliquer sur le bouton  vert sur la ligne du membre pour modifier ses informations  
            ou l'ajouter un/plusieurs postes dans l'année scolaire en cours
            </label>
                       </div>
                   </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">
         Cliquer sur le bouton rouge sur la ligne du membre pour le supprimer de l'établissement
         </label>
              
            </div> </p>
            
      </div>
       </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




 



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


 