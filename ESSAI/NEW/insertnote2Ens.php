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









$conneEns=idtl($bdda,$_SESSION['mtp'],$_SESSION['annee']); 
 
if($conneEns!=0){  



    $v="SELECT *  FROM prorogation WHERE id='1' ";
    $reponse = $bdda->query($v);
    $delai=' ';
    while ($donnees = $reponse->fetch() )
    {
     
      $delai=$donnees['date'];
      
    } 
    $reponse->closeCursor();



function effectifencours($an,$clas){
	
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





    function verifpctmateval($idcl,$matiere,$eval,$trim,$an){//  

      
    $i=0;  $som=0;
    $v="SELECT id,idcl,matiere,eval,trimestre,anens FROM pourcentagematiereval 
      WHERE eval='".$eval."' AND idcl='".$idcl."' AND anens='".$an."'
    AND trimestre='".$trim."'";
    $reponse = $bdda->query($v);
    $i=0;$tr=0;
    while ($donnees = $reponse->fetch() AND $i==0)
    {
      if($donnees['matiere']==$matiere){
        $tr=$donnees['id'];
       $i=1;
      }
      
    } 
    $reponse->closeCursor(); 
     return $tr;
    }



    function verifmoymateval($idcl,$matiere,$eval,$trim,$an){//  

      
    $i=0;  $som=0;
    $v="SELECT id,idcl,matiere,eval,trimestre,anens FROM moymatiereval 
      WHERE eval='".$eval."' AND idcl='".$idcl."'
    AND trimestre='".$trim."' AND anens='".$an."'";
    $reponse = $bdda->query($v);
    $i=0;$tr=0;
    while ($donnees = $reponse->fetch() AND $i==0)
    {
      if($donnees['matiere']==$matiere){
        $tr=$donnees['id'];
       $i=1;
      }
      
    } 
    $reponse->closeCursor(); 
     return $tr;
    }



    function verifpctmatrim($idcl,$matiere,$trim,$an){//  

      
    $i=0;  $som=0;
    $v="SELECT id,idcl,matiere,trimestre,anens FROM pourcentagematieretrim 
      WHERE   idcl='".$idcl."'
    AND trimestre='".$trim."' AND anens='".$an."'";
    $reponse = $bdda->query($v);
    $i=0;$tr=0;
    while ($donnees = $reponse->fetch() AND $i==0)
    {
      if($donnees['matiere']==$matiere){
        $tr=$donnees['id'];
       $i=1;
      }
      
    } 
    $reponse->closeCursor(); 
     return $tr;
    }



    function verifmoymatrim($bdda,$idcl,$matiere,$trim,$an){//  

      
    $i=0;  $som=0;
    $v="SELECT id,idcl,matiere,trimestre,anens FROM moymatieretrim 
      WHERE   idcl='".$idcl."'
    AND trimestre='".$trim."' AND anens='".$an."'";
    $reponse = $bdda->query($v);
    $i=0;$tr=0;
    while ($donnees = $reponse->fetch() AND $i==0)
    {
      if($donnees['matiere']==$matiere){
        $tr=$donnees['id'];
       $i=1;
      }
      
    } 
    $reponse->closeCursor(); 
     return $tr;
    }




 
    if(isset($_POST['send2']) ){
        $matiere=$_POST['matiere'];$_SESSION['matiereremplir']=$matiere;
        $eval=$_POST['eval'];$_SESSION['evalremplir']=$eval;
        $effectif= effectif($bdda,$_SESSION['anremplir'],$_SESSION['clasremplir']);
        $_SESSION['effecremplir']=$effectif;
        $tabElev=array(); $tabElev1=array();$tabElev2=array();
        $i=1;
        $v="SELECT anelev,nomelev,niveauelev,matelev  FROM eleve WHERE anelev='".$_SESSION['anremplir']."' AND niveauelev='".$_SESSION['clasremplir']."' ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() )
{
    $tabElev[$i]=$donnees['matelev'];
    $i++;
} 
$reponse->closeCursor(); 
 $effectif1=($effectif-$effectif%2)/2 ;
 $initial2=$effectif1+1;
 $_SESSION['tableaumatricule']=$tabElev;
 
   }










   else if (isset($_POST['autreval'])){

    $_SESSION['evalremplir']=$_POST['autreval'];

   }


   else if (isset($_POST['autremat'])){
   
    $_SESSION['matiereremplir']=$_POST['matiere2'];
  
   // $_SESSION['effecremplir']=effectifencours($_SESSION['anremplir'],$_SESSION['clasremplir']);
 

   }









   else{
    $matiere= $_SESSION['matiereremplir'] ;
    $eval= $_SESSION['evalremplir'] ;
    $effectif=$_SESSION['effecremplir'];

    $tabElev=array(); $tabElev1=array();$tabElev2=array();
    $i=1;
    $v="SELECT anelev,niveauelev,nomelev,matelev FROM eleve WHERE anelev='".$_SESSION['anremplir']."' AND niveauelev='".$_SESSION['clasremplir']."' ORDER BY nomelev" ;
$reponse = $bdda->query($v);
$true=0;   $tr=" ";
while ($donnees = $reponse->fetch() )
{
$tabElev[$i]=$donnees['matelev'];
$i++;
} 
$reponse->closeCursor(); 
 
$_SESSION['tableaumatricule'] =$tabElev;


   }
 
 //cherche l'id du groupe de la matière
 $_SESSION['typeclasremplir']=TYPENS($bdda,$_SESSION['clasremplir'],$_SESSION['anremplir']);
  

 $_SESSION['gpematiereremplir']=matgroupidgroup($bdda,$_SESSION['matiereremplir'],$_SESSION['anremplir'],$_SESSION['typeclasremplir']);
 
//liste les matieres du groupe
$v="SELECT *  FROM matclasse WHERE anens='".$_SESSION['anremplir']."' AND sup='0' AND idcl='".$_SESSION['clasremplir']."'";
$reponse = $bdda->query($v);
 $l=1; $listMat=array();
  while ($donnees = $reponse->fetch() )
  {
    if($donnees['idgp']==$_SESSION['gpematiereremplir']){ 
      $listMat[$l]=$donnees['idmat'];  
            $l++; 
        }
   }
  $reponse->closeCursor();

  $_SESSION['tableaulistmatgrup'] =$listMat;

//


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
<body class="hold-transition sidebar-mini" >
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
      <form action='insertnote1Ens.php' method='POST'>
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
            <h1 class="m-0">  <?php 
            
            function etat($bdda,$an,$eval){
 

               $v="SELECT *  FROM delai WHERE id_etab='0' AND an= '".$an."'";
               $reponse = $bdda->query($v);
                  $t=0; $eta=0;
                while ($donnees = $reponse->fetch()  AND $t==0)
                {
                  if($donnees['eval']==$eval) {
                      $eta=$donnees['verrou'];
                  $t= 1;
                 }
                }
                $reponse->closeCursor();
               return $eta;
              }
              $laclasse=classparid($bdda,$_SESSION['clasremplir'],$_SESSION['anremplir']);
             $etat=etat($bdda,$_SESSION['anremplir'],$_SESSION['trimremplir']);
            
            echo initialEtab($bdda);
            if($etat==0) {
              echo "</br></br>LES NOTES SONT VERROUILLEES !!!";
            }
            ?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h3 class="m-0">REMPLISSAGE DES NOTES <?php echo Nametrim($bdda,$_SESSION['trimremplir'])." /
            EVALUATION ".$_SESSION['evalremplir']." 
            EN ". classparid($bdda,$_SESSION['clasremplir'],$_SESSION['anremplir']);?></h3>&nbsp&nbsp&nbsp
          <?php  if($_SESSION['remplerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check">  succès !! Veuillez cliquer sur la petite croix pour l'enlever</i> 
                  <?php ?> </h5>
    </div>
     <?php $_SESSION['remplerfolg']=0; } ?>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b> </b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
            <form  method='POST' action='insertnote2Ens.php' name='paiem'>
            <label for="exampleInputPassword1">Autre(s) matière(s) dans cette classe</label>
            <select name="matiere2" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
                    <?php $x=1; $cpt=count($_SESSION['sesmatiere']);
                   

                    
                            
							              $reponse = $bdda->query("SELECT * FROM enseigmatclasse WHERE  
       idens='".$_SESSION['idENS']."'  AND sup ='0' AND anens='".$_SESSION['annee']."' 
      AND idcl='".$_SESSION['clasremplir']."'");
                                         
                                        while ($donnees = $reponse->fetch())
                                        {
                                         
                                            $idmat=$donnees['idmat'];
                                            $saklas=$donnees['idcl'];
                                            // $couple=$idmat."-".$saklas; 
                                             $couple=$idmat ;
                                         $i=$n+1; 
                                         $exist=existmatclassgpe($bdda,$idmat,$_SESSION['anremplir'],$saklas);
                                         $idecl=existmatclass($bdda,$idmat,$_SESSION['anremplir'],$saklas); 
                                         
                                         if($exist!=0){ 
                                          $TOREMPL= effectcompomat($bdda,$idmat,$saklas, 
           $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);  
                                             $remplirencours=effectifencours($_SESSION['anremplir'],$saklas);

                                         
                                         
                                         echo " <option value='".$couple."'>&nbsp&nbsp&nbsp&nbsp".matparid($bdda,$idmat,$_SESSION['anremplir'])."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                         ".$TOREMPL."&nbsp&nbsp/&nbsp&nbsp".$remplirencours."</option> ";
                                         $n=$n+1;
                                         }
                                        } 
                                        $reponse->closeCursor();
                                    
                                 





							 ?>
								</select><br>
                <button type='submit'  name='autremat' value='idmat' class='btn btn-primary' >OK</button>
                <?php   //    
                  ?>
                 </form>

            <table><tr>
            <?php 
             $nbrevaltri1=nbreval($bdda,$_SESSION['clasremplir'],1,$_SESSION['anremplir']);
             $nbrevaltri2=nbreval($bdda,$_SESSION['clasremplir'],2,$_SESSION['anremplir']);
             $nbrevaltri3=nbreval($bdda,$_SESSION['clasremplir'],3,$_SESSION['anremplir']);
                    if($_SESSION['trimremplir']==1){
                      
                      for($i=1;$i<$nbrevaltri1+1;$i++){
                        echo "<td><form  method='POST' action='insertnote2Ens.php' name='paiem'>
<button type='submit'  name='autreval' value='".$i."' class='btn btn-danger' >Evaluation ".$i."</button>
</form></td>";
                      }
                    }
                    if($_SESSION['trimremplir']==2){
                       
                      $total=$nbrevaltri1+$nbrevaltri2;
                      $j=$nbrevaltri1+1;
                      
                      for($i=$j;$i<$total+1;$i++){
                        echo "<td><form  method='POST' action='insertnote2Ens.php' name='paiem'>
                        <button type='submit'  name='autreval' value='".$i."' class='btn btn-danger' >Evaluation ".$i."</button>
                        </form></td>";
                      }
                  
                    }
                    if($_SESSION['trimremplir']==3){
                      
                      $total=$nbrevaltri1+$nbrevaltri2+$nbrevaltri3;
                      $j=$nbrevaltri1+$nbrevaltri2+1;
                      for($i=$j;$i<$total+1;$i++){
                        echo "<td><form  method='POST' action='insertnote2Ens.php' name='paiem'>
                        <button type='submit'  name='autreval' value='".$i."' class='btn btn-danger' >Evaluation ".$i."</button>
                        </form></td>";
                      }
                    }

                    ?>
                       </tr></table></br>
                       </li>
                  
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->




            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MATIERE :&nbsp&nbsp
                  <?php 
                  $lamatiere=matparid($bdda,$_SESSION['matiereremplir'],$_SESSION['anremplir']);
                  echo $lamatiere."&nbsp&nbsp&nbsp 
                   EVALUATION ".$_SESSION['evalremplir'];?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="insertnote3Ens.php" name="paiem">
                <div class="card-body">
 
                <div class="form-group" >
                    <label for="exampleInputEmail1">COEFFICIENTS</label>
                   
                    <?php  	
                    $coef=returncoefevaluation($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'],$_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
                    if($etat==1){
                echo "<input name='coef'  value='".$coef."'   class='form-control' id='exampleInputEmail1'   required >  ";
                    }
                    if($etat==0){
                      echo "<input name='coef'  value='".$coef."'   class='form-control' id='exampleInputEmail1'  
                      disabled='disabled' required >  ";
                          }
                            
                            ?>
								 
                  </div><hr>




                  <?php
                  $tabmatri=array();
                   /* function visuelnote($note){
                    if(substr($note,-2)=='00'){ 
                       $note=trim($note,"00");
                       $note=trim($note,".");
                    }
                        return $note;
                   }
                */
                function visuelnote($note){
                  if($note>=0 AND $note<=20 AND mb_strlen(trim($note))!=0){ 
                    $note=$note+0;
                   }
                     return $note;
                }
                  


                  $v="SELECT matelev,nomelev,preelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['anremplir']."' AND niveauelev='".$_SESSION['clasremplir']."' ORDER BY nomelev" ;
                  $reponse = $bdda->query($v);
                  $j=1;   $tr=" ";
                  while ($donnees = $reponse->fetch() )
                  {
                    $champ="champ".$j;
                    $nom=$donnees['nomelev']." ".$donnees['preelev'];
                    $ENSEMBLE=array();
                    $NOTEETRG= noteETrgmatevaluation($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'],
                    $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$donnees['matelev']);
                    $ENSEMBLE=explode(":",$NOTEETRG);
                    
                    $rg=$ENSEMBLE[1];
                    $note=$ENSEMBLE[0];
                    if($rg=='a'){
                      $rg=' ';
                    }
                    if($note=='a'){
                      $note=' ';
                    }
                     if($note>0){ 
                      $co=$coef; 
                      $nc=$note*$co;
                      $total=20*$co;
                    $affich=$nc."/".$total;
                    }
                      else{
                         $affich=" ";
                          
                      }
                echo " <b><H7>".$j." ) ".$nom."</H7></b> <br>";  

                if($etat==1){
                  echo "<div class='input-group mb-3' bgcolor='yellow'><input name='".$champ."'  value='".visuelnote($note)."' 
                   class='form-control' id='exampleInputEmail1'  >
                   <div class='input-group-append'>
                   <span class='input-group-text'>".$affich."</span>
               </div>
               <div class='input-group-append'>
                   <span class='input-group-text'>".$rg."</span>
               </div>
                   </div>  <br>  ";
             }
             if($etat==0){
               echo "<div class='input-group mb-3' bgcolor='yellow'><input name='".$champ."'  value='".visuelnote($note)."' 
               class='form-control' id='exampleInputEmail1' disabled='disabled' >
               <div class='input-group-append'>
               <span class='input-group-text'>".$affich."</span>
           </div>
           <div class='input-group-append'>
               <span class='input-group-text'>".$rg."</span>
           </div>
               </div>  <br>  ";
             }   
                      $j++;
                     
                } 
                $reponse->closeCursor(); 		
                            
                            ?>
								 
                  <hr>







 
 

                  <div class="form-group">
                   
                  <div class="select2-purple">
                     
                </div> 
                <?php 
                if($etat==1) {?>
                                <div class="card-footer">
                                <?php 
if($delai>=date('Y.m.d')){
echo  "<button type='submit'  name='sendok' class='btn btn-primary' >Valider</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
<button type='reset' class='btn btn-danger'>Annuler</button>";
    }
    ?>

                </div>
                <?php   }?>
              </form>
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
            <img src='../bild/image20.jpeg' height='115px' width='150px' >
            <img src='../bild/image10.jpeg' height='115px' width='170px' >
            <img src='../bild/image19.jpeg' height='115px' width='170px' >
            <form  method="POST" action="insertnote1.php" name="paiem">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">STATISTIQUES EVALUATION <?php echo  $_SESSION['evalremplir'] ; ?>
                </br>    <?php echo $lamatiere." EN ".$laclasse;?>
              </h3>
              </div>
              <div class="card-body">
              NOM DE L'ENSEIGNANT(E) :<?php echo ensgdsmat($bdda,$_SESSION['matiereremplir'],$_SESSION['clasremplir'],$_SESSION['anremplir']); ?></br>
               Effectif total : <?php echo  $_SESSION['effecremplir']; ?></br>
               <img src="espace.png" height="10px" width="40px" ></br>
               <B><u> STATISTIQUES POUR CETTE EVALUATION</u></B></br>
               Composés :   <?php $petad=array(); 
               $presentETadmiseva=presentETadmiseva($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'], 
               $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
               $petad=explode(":",$presentETadmiseva);
               $compose= $petad[0];
           echo $compose;?></br>
               Nombre admis à la matière : <?php $admis= $petad[1];
           echo $admis ;
           $admistrim=admiscompomatrim($bdda,$_SESSION['matiereremplir'],$_SESSION['clasremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
           ?></br>
           Moyenne de la classe : <?php $moy= $petad[2];
           if($moy=='a'){
            $moy=' ';
           }
           echo $moy ;$pct=" ";
          ?></br>
        
            Pourcentage réussite : <?php  
            if($compose>0){ 
            $pct=Round((($admis*100)/$compose),2);
            echo $pct;}?></br>
            <img src="espace.png" height="20px" width="40px" ></br>
            <B><u> STATISTIQUES POUR LE TRIMESTRE</u></B></br>

            Composés :   <?php $petmyTRI=array(); 
            $presentrimETmoy=presentrimETmoy($bdda,$_SESSION['matiereremplir'] ,$_SESSION['clasremplir'], 
            $_SESSION['trimremplir'],$_SESSION['anremplir']);
            $petmyTRI=explode(":",$presentrimETmoy);
            $composetrim= $petmyTRI[0];
           echo $composetrim;?>
            <?php  $pctrim=" ";
            if($composetrim>0){
            $pctrim=Round((($admistrim*100)/$composetrim),2);
            }
            echo "</br>Pourcentage de réussite au trimestre : ".$pctrim;?></br>
            Moyenne de la classe au trimestre : <?php $moytri= $petmyTRI[1]; if($moytri=='a'){ $moytri=' '; } echo $moytri ;?></br>
            <img src="espace.png" height="30px" width="30px" ></br> 
            
            <?php 
            $VERIFPCTRIM=verifpctmatrim($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
            $_SESSION['trimremplir'],$_SESSION['anremplir']);
            $verifPCT=verifpctmateval($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
            $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
            $verifMOY=verifmoymateval($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
            $_SESSION['evalremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
            $VERIFMOYTRIM=verifmoymatrim($bdda,$_SESSION['clasremplir'],$_SESSION['matiereremplir'],
            $_SESSION['trimremplir'],$_SESSION['anremplir']);
            if($verifPCT==0){
              $req = $bdda->prepare('INSERT INTO pourcentagematiereval ( idcl, matiere,eval
              , trimestre, compose ,pct,anens ) VALUES( ?,?,?,?,?,?,?)'); 
              $req->execute(array($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
               $_SESSION['evalremplir'],$_SESSION['trimremplir'],$compose,$pct,$_SESSION['anremplir']));
            }
            if($verifPCT!=0){
              $r="UPDATE pourcentagematiereval  SET pct='".$pct."' WHERE id='".$verifPCT."'";
              $req=$bdda->query($r);
              $r="UPDATE pourcentagematiereval  SET compose='".$compose."' WHERE id='".$verifPCT."'";
              $req=$bdda->query($r);
            }


            if($verifMOY==0){
              $req = $bdda->prepare('INSERT INTO moymatiereval ( idcl, matiere,eval
              , trimestre, compose ,moy,anens ) VALUES(?, ?,?,?,?,?,?)'); 
              $req->execute(array($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
               $_SESSION['evalremplir'],$_SESSION['trimremplir'],$compose,$moy,$_SESSION['anremplir']));
            }
            if($verifMOY!=0){
              $r="UPDATE moymatiereval  SET moy='".$moy."' WHERE id='".$verifPCT."'";
              $req=$bdda->query($r);
              $r="UPDATE moymatiereval  SET compose='".$compose."' WHERE id='".$verifPCT."'";
              $req=$bdda->query($r);
            }



            if($VERIFPCTRIM==0){
              $req = $bdda->prepare('INSERT INTO pourcentagematieretrim ( idcl, matiere 
              , trimestre,compose, pct,anens ) VALUES(?, ?,?,?,?,?)'); 
              $req->execute(array($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
                $_SESSION['trimremplir'],$composetrim,$pctrim,$_SESSION['anremplir']));
            }
            if($VERIFPCTRIM!=0){
              $r="UPDATE pourcentagematieretrim  SET pct='".$pctrim."' WHERE id='".$VERIFPCTRIM."'";
              $req=$bdda->query($r);
              $r="UPDATE pourcentagematieretrim  SET compose='".$composetrim."' WHERE id='".$VERIFPCTRIM."'";
              $req=$bdda->query($r);
              
            }

            if($VERIFMOYTRIM==0){
              $req = $bdda->prepare('INSERT INTO moymatieretrim ( idcl, matiere 
              , trimestre,compose, moy,anens ) VALUES( ?,?,?,?,?,?)'); 
              $req->execute(array($_SESSION['clasremplir'],$_SESSION['matiereremplir'],
                $_SESSION['trimremplir'],$composetrim,$moytri,$_SESSION['anremplir']));
            }
            if($VERIFMOYTRIM!=0){
              $r="UPDATE moymatieretrim  SET moy='".$moytri."' WHERE id='".$VERIFMOYTRIM."'";
              $req=$bdda->query($r);
              $r="UPDATE moymatieretrim  SET compose='".$composetrim."' WHERE id='".$VERIFMOYTRIM."'";
              $req=$bdda->query($r);
              
            }

            ?>

<b><u> LES CINQ PREMIERES NOTES DANS CETTE EVALUATION</u></b> :</br>
               <?php
               $v="SELECT *  FROM  note WHERE anens='".$_SESSION['anremplir']."' AND idcl='".$_SESSION['clasremplir']."' AND
 trimestre='".$_SESSION['trimremplir']."' AND typeval='".$_SESSION['evalremplir']."' ORDER BY note DESC  " ;
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch() AND $i<=5)
{
  
if($donnees['matiere']==$_SESSION['matiereremplir']){
  
  $note=$donnees['note'];
  $matkey=$donnees['matricule'];
  echo $i." ) ".nameschuler($bdda,$matkey)." ".vornameschuler($bdda,$matkey)."&nbsp&nbsp&nbsp&nbsp ".$note."</br>"; 
  $i++;
}
} 
$reponse->closeCursor(); 
?>

</br>
            <img src="espace.png" height="30px" width="30px" ></br> 
            <b><u> LES CINQ DERNIERES NOTES DANS CETTE EVALUATION</u></b> :</br>
               <?php
               $v="SELECT *  FROM  note WHERE anens='".$_SESSION['anremplir']."' AND idcl='".$_SESSION['clasremplir']."' AND
 trimestre='".$_SESSION['trimremplir']."' AND typeval='".$_SESSION['evalremplir']."'
 AND rgeval!=' ' ORDER BY note " ;
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch() AND $i<=5)
{
  
if($donnees['matiere']==$_SESSION['matiereremplir']){
  
  $note=$donnees['note'];
  $matkey=$donnees['matricule'];
  echo $i." ) ".nameschuler($bdda,$matkey)." ".vornameschuler($bdda,$matkey)."&nbsp&nbsp&nbsp&nbsp ".$note."</br>"; 
  $i++;
}
} 
$reponse->closeCursor(); 
?>



<img src="espace.png" height="30px" width="30px" ></br>
<b><u> LES CINQ PREMIERES NOTES DU TRIMESTRE</u></b> :</br>
               <?php
               $v="SELECT *  FROM  notetrimestre WHERE  idcl='".$_SESSION['clasremplir']."' AND
 trimestre='".$_SESSION['trimremplir']."'  AND anens='".$_SESSION['anremplir']."' ORDER BY note DESC  " ;
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch() AND $i<=5)
{
  
if($donnees['matiere']==$_SESSION['matiereremplir']){
  
  $note=$donnees['note'];
  $matkey=$donnees['matricule'];
  echo $i." ) ".nameschuler($bdda,$matkey)." ".vornameschuler($bdda,$matkey)."&nbsp&nbsp&nbsp&nbsp ".$note."</br>"; 
  $i++;
}
} 
$reponse->closeCursor(); 
?>

</br>
            <img src="espace.png" height="10px" width="30px" ></br> 
            <b><u> LES CINQ DERNIERES NOTES DU TRIMESTRE</u></b> :</br>
               <?php
               $v="SELECT *  FROM  notetrimestre WHERE   idcl='".$_SESSION['clasremplir']."' AND
 trimestre='".$_SESSION['trimremplir']."'  AND anens='".$_SESSION['anremplir']."' AND rgtrim!=' ' ORDER BY note " ;
$reponse = $bdda->query($v);
$i=1;
while ($donnees = $reponse->fetch() AND $i<=5)
{
  
if($donnees['matiere']==$_SESSION['matiereremplir']){
  
  $note=$donnees['note'];
  $matkey=$donnees['matricule'];
  echo $i." ) ".nameschuler($bdda,$matkey)." ".vornameschuler($bdda,$matkey)."&nbsp&nbsp&nbsp&nbsp ".$note."</br>"; 
  $i++;
}
} 
$reponse->closeCursor(); 
?>






              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            




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