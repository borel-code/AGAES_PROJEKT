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
  
  
  $_SESSION['pagenregens']=0;

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
      <li class="nav-item">
        <div class="btn-group w-100 mb-2">  
        <button type="button"  style="width: 100%; height: 15%;" class="btn btn-primary" data-toggle="modal" data-target="#enregdev">
 <i class='fas fa-plus'>
   </i> Nouvel(le) enseignant(e)
    </button> 
        </div>
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
            <h1 class="m-0">LES ENSEIGNANT(E)S  </h1>&nbsp&nbsp&nbsp
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
  <?php  if($_SESSION['engensg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Enseignant(e) enregistré(e)</i></h5>
    </div>
     <?php   $_SESSION['engensg']=0; } ?>

     

     <?php  if($_SESSION['modifensg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Enseignant(e) modifié(e)</i></h5>
    </div>
     <?php  $_SESSION['modifensg']=0; } ?>
 
     <?php  if($_SESSION['supensg']==1){ ?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">Enseignant(e) supprimé(e)</i></h5>
    </div>
     <?php  $_SESSION['supensg']=0; } ?>

     

      
  <H4 style='color : purple'><B> </B></H4> 
 
  <div class="row">
  <button type='button'  style='width: 100%; height: 5%;' class='btn btn-success' data-toggle='modal' data-target='#aide'>
   Aide  </button>  
  </br>  </div>

  </div>
    <!-- /.modal-content --><!-- /.content -->
  </div>









 <div class="card card-solid">
  <div class="card-body">
<div class="row">
          <form action="ajoutensn.php" method="POST">
                      <div class="btn-group w-100 mb-2">
                        <input name='requete'    
                      placeholder=" "  class='form-control' id='exampleInputEmail'>
                       <button type='submit' value="rechercher" name="rechercher" style="width: 100%; height: 5%;" class='btn btn-warning'>rechercher</button>  
                       </div>  
 </form>  
 </div>  
           
  </div>
    <!-- /.modal-content --><!-- /.content -->
  </div> 



 
  
                 <?php if(isset($_POST['rechercher'])){       
  echo "  <div class='card card-solid'>
  <div class='card-body'>
 <div class='row'><a href='ajoutensn.php' style='width: 100%; height: 5%;' class='btn btn-default'> 
 Afficher tout  </a></div> </div> </div>  </br></br>  ";
  }
  ?>             

 







  <!-- /.content-wrapper -->
  <div id="suchen"> 

  </div>
  <div class="card card-solid">
  <div class="card-body">
   <div class="row">
   <?php  
   
   
   
            
 


  $_SESSION['confajout']=0;  
  $v="SELECT * FROM enseignant WHERE supp='0'  ORDER BY nomens";
  if(isset($_POST['rechercher'])){
    $valeurrech=$_POST['requete'];
    if(!empty($valeurrech) AND $valeurrech!=" "){ 
      
        $v="SELECT * FROM enseignant WHERE supp='0' 
        AND( ( nomens LIKE'%".$valeurrech."%' )
      OR  ( prenomens LIKE'%".$valeurrech."%' )
      OR  ( telens LIKE'%".$valeurrech."%' )
      OR  ( genre LIKE'%".$valeurrech."%' )
      OR  ( datens LIKE'%".$valeurrech."%' )
      ) ORDER BY nomens";
  
      }
    else{ 
      $v="SELECT * FROM enseignant WHERE supp='0'  ORDER BY nomens";
 
    }
  }
  $_SESSION['imprimdev']=$v;
  $reponse = $bdda->query($v);
  $i=1; $to=0; $tno=0;
while ($donnees = $reponse->fetch() )
{
  $idev=$donnees['id'];
  $nomdev=$donnees['nomens'];
  $prenom=$donnees['prenomens'];
  $tel=$donnees['telens'];
  $mtp=$donnees['mtpasse'];
  $an=$donnees['anens'];
  $genre=$donnees['genre'];
  $datens=$donnees['datens'];
  $cni=$donnees['cni'];
   
  $montant=montantpaye($bdda,$idev,$_SESSION['annee']);
  $typepaye=typepaye($bdda,$idev,$_SESSION['annee']);
   

  $modaj='#modaal-ajout'.$i;
  $modaj1='modaal-ajout'.$i;
  $moda='#modaal-success'.$i;
  $moda1='modaal-success'.$i;
  $modadang='#modaal-danger'.$i;
  $modadang1='modaal-danger'.$i;
  $modahist='#modaal-hist'.$i;
  $modahist1='modaal-hist'.$i;

  echo " <div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>
             
             <div class='card bg-light d-flex flex-fill'>
               <div class='btn btn-default'><b>
    ".$i." . ".$nomdev."   ".$prenom." 
                </b> 
                  
      
</div> 
   <div class='no-print'>
 <div class='modal-footer justify-content-between'>

  <div class='btn-group w-100 mb-2'>
     <a href='ajoutsesmat.php?idens=".$idev."' 
      name='idens'  type='submit'  class='btn btn-secondary'>
      <i class='nav-icon fas fa-book'></i>&nbsp &nbsp <small>Voir ses matières et classes </small>
      </a> 
  </div>

 <div class='btn-group w-100 mb-2'>
      
  <a href='ajoutmatensg.php?idens=".$idev."' 
      name='idens'  type='submit'  class='btn btn-info'  
         title='ajouter les matières'><i class='fas fa-plus'></i>
      </a> 

    <button value='".$idev."' 
    name='modif'  type='button'  class='btn btn-default' data-toggle='modal' data-target='".$moda."'
       title='modifier'><i class='fas fa-pencil-alt'></i> </button> 

     <button value='".$idev."' 
      type='button'  class='btn btn-default' data-toggle='modal' data-target='".$modadang."'
    title='supprimer'><i class='fas fa-trash'></i></button> 
    
 </div> 
  </div> </div> 

</div> </div>";



   ?>




<?php  
   echo "<div class='modal fade' id='".$modaj1."'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Ajout des matieres pour cette année scolaire</h4>
         
        <form action='ajoutensgenreg.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><div class="form-group">
        <?php   ?>
              <label for="exampleInputEmail1"><?php echo $nomdev." ".$prenom; ?></label>
             </div> </p>


             <p><div class="form-group">
                    <label for="exampleInputEmail1">Type d'enseignement</label>
                    <select name="type" onChange="matRech(this.value)" class="form-control" id="exampleInputEmail1">
                    <option value='a'>Choisir</option>
                    <option value='1'>Général</option>
                     <option value='2'>Commercial</option>  
                     <option value='3'>Industriel</option> 
                     <option value='4'>Anglophone</option> 
                  </select>  </div>
                   </p>
                   <p><div class="form-group">
                   <div id="mat">

                   </div>
                   </div>
                   <p><div class="form-group">
                   <div id="cl">

                   </div>
                   </div>

                   </p>
                   id : <?php echo $idev  ?></br>
       </div>
      <div class="modal-footer justify-content-between">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name="modifdev" value="<?php echo $idev; ?>" class="btn btn-primary">Enregistrer</button>
</form></div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<?php  
   echo "<div class='modal fade' id='".$moda1."'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Modification</h4>
         
        <form action='ajoutensgenreg.php' method='POST'>
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
         <label for="exampleInputEmail1">Prénoms</label>
              <input value="<?php echo $prenom; ?>" name="prenom"  class="form-control" id="exampleInputEmail1"    >
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
         <label for="exampleInputEmail1">Téléphone</label>
              <input value="<?php echo $tel; ?>" name="tel"  class="form-control" id="exampleInputEmail1"    >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">date de naissance</label>
              <input value="<?php echo $datens; ?>" name="datens"  class="form-control" id="exampleInputEmail1"  >
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
                    <label for="exampleInputEmail1">Type de paiement</label>
                    <select name="paiement"   class="form-control" id="exampleInputEmail1">
                    <?php if($typepaye=='1'){
                   echo" <option value='1'>actuellement c'est taux horaire</option>
                    <option value='2'>Salaire fixe</option>";
                     } 
                     if($typepaye=='2'){
                      echo" 
                      <option value='2'>actuellement c'est salaire fixe</option>
                      <option value='1'>Taux horaire</option>
                       ";
                        } 
                        if($typepaye!='1' AND $typepaye!='2'){
                          echo" <option value='1'>Taux horaire</option>
                           <option value='2'>Salaire fixe</option>";
                            } 
                     ?>
                   </select> </div>
                   </p>
                   <p><div class="form-group">
         <label for="exampleInputEmail1">Montant pour cette année scolaire</label>
              <input value="<?php echo $montant; ?>" name="montant"  class="form-control" id="exampleInputEmail1"    >
            </div> </p>
            id : <?php echo $idev  ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name="modifEng" value="<?php echo $idev; ?>" class="btn btn-primary">Enregistrer</button>
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
               
              <form action='ajoutensgenreg.php' method='POST'>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><div class="form-group">
                    <label for="exampleInputEmail1">Noms et prénoms</label>
                    <select name="idevise"  class="form-control" id="exampleInputEmail1">
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
              <button  type="submit" name="supENSG" value="<?php echo $idev; ?>" class="btn btn-danger">Supprimer</button>
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







  
  </div></div> </div>  
  <!-- /.content-wrapper -->
  


   </br></br> </br></br></br></br> 
 
    
  



 
<div class='no-print'>
  <footer class="main-footer">
  <div class="btn-group w-100 mb-2">
  <?php    
 
 echo "<a class='btn btn-primary'  type='button' data-toggle='modal' data-target='#options' data-filter='2'><i class='fas fa-cogs'></i> Options </a>";
  

 ?>
  </div>
   </footer>
   </div>  


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



 <?php  echo "<div class='modal fade' id='options'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Options  </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="ajoutensIMP.php" data-filter="all">version imprimable</a>
                    <a class="btn btn-primary" href="ajoutensANNEE.php" data-filter="1">pour cette année</a>
                    <a class="btn btn-success" href="ajoutitulaire.php" data-filter="2">Gérer les titulaires</a>
   </div>

   </br></br> 
  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-secondary" href="ensclasse.php" data-filter="all">Enseignants par classe</a>
                    <a class="btn btn-default" href="ajoutdept.php" data-filter="all">Enseignants par département</a>
                  </div>

                  </br></br>
  
  </div>
       
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 






 <?php  
   echo "<div class='modal fade' id='enregdev'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Nouvel(le) enseignant(e)</h4>
         
        <form action='ajoutensgenreg.php' method='POST'>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><div class="form-group">
          <label for="exampleInputEmail1">Noms<i> (Obligatoire)</i></label>
              <input   name="nom"  class="form-control" id="exampleInputEmail1"   required >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">Prénoms</label>
              <input   name="prenom"  class="form-control" id="exampleInputEmail1"    >
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
         <label for="exampleInputEmail1">date de naissance</label>
              <input   name="datens"  class="form-control" id="exampleInputEmail1"  >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">Mot de passe<i> (Obligatoire)</i></label>
              <input   name="mtp"  class="form-control" id="exampleInputEmail1"   required >
            </div> </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">CNI<i> (Obligatoire)</i></label>
              <input   name="cni"  class="form-control" id="exampleInputEmail1" required >
            </div> </p>
            <p><div class="form-group">
                    <label for="exampleInputEmail1">Type de paiement</label>
                    <select name="paiement"   class="form-control" id="exampleInputEmail1">
                     <option value='1'>Taux horaire</option>
                           <option value='2'>Salaire fixe</option>";
                           
                   </select> </div>
                   </p>
                   <p><div class="form-group">
         <label for="exampleInputEmail1">Montant pour cette année scolaire</label>
              <input  name="montant"  class="form-control" id="exampleInputEmail1"   >
            </div> </p>
 
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name="enregEng"   class="btn btn-primary">Enregistrer</button>
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
          <label for="exampleInputEmail1">Cliquer sur le nom de l'enseignant pour afficher ou supprimer ses matières  dans l'année en cours </label>
              
            </div> </p>
            <p><div class="form-group">
 <label for="exampleInputEmail1">Cliquer sur le bouton  (+)  de l'enseignant pour l'ajouter les matières et les jours de passage dans l'année en cours </label>  
              
            </div> </p>
            <p><div class="form-group">
            <label for="exampleInputEmail1"> 
             Cliquer sur le bouton <i class='fas fa-pencil-alt'></i>   de l'enseignant pour modifier ses informations personnelles  
            </label>
                       </div>
                   </p>
            <p><div class="form-group">
         <label for="exampleInputEmail1">
         Cliquer sur le bouton <i class='fas fa-trash'></i> de l'enseignant pour le supprimer de l'établissement  
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


 