<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';require '../listabrvtype.php';
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



function oldsearchcomp($bdda,$idmat,$trim,$an,$idcl){//verifie si la matier existe, si oui retourne id de note 

$table="marktrim".$trim; $key="idmark".$trim;
$v="SELECT  ".$key." , matelev,anelev,idcl,idmat,compet1,compet2,compet3  FROM ".$table." 
WHERE  anelev='".$an."'  AND idcl='".$idcl."'  AND idmat='".$idmat."' ORDER BY ".$key." DESC" ;
$reponse = $bdda->query($v);
$true=0;  $id=0; $note1=-1; $note2=-1;  $note3=-1; 
$ok1=1; $ok2=1;  $ok3=1;  $nb=0; $compet1="---"; $compet2="---"; $compet3="---";
while ($donnees = $reponse->fetch() AND $true==0)
{
 
if($donnees['compet1']!="---" AND $donnees['compet1']!=" "){
 $id=$donnees[$key];  
$compet1=$donnees['compet1'];  $compet2=$donnees['compet2']; $compet3=$donnees['compet3'];
  
  $true=1;
}
  $nb++;
} 
$reponse->closeCursor(); 
$ensb=$id."@".$compet1."@".$compet2."@".$compet3;
return $ensb;
}

$trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==2 OR $_SESSION['code']==3
OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
  

 
$_SESSION['backnew']=0;
if(isset($_POST['transmis'])){
$_SESSION['fachrempl']=$_POST['matiere'];
$_SESSION['namefachrempl']=matparid($bdda,$_POST['matiere'],$_SESSION['anremplir']);
// $_SESSION['clasremplir']   $_SESSION['affklas'] le nom de la classe
}

 $_SESSION['idkrupmat']=avoiridgpmat($bdda,$_SESSION['fachrempl'],$_SESSION['clasremplir'],$_SESSION['anremplir']);
 

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
      <form action='marknote.php' method='POST'>
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
        <a   data-toggle='modal'   data-target='#modajout'>
        Infos pour la saisie des notes ici
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
            <h1 class="m-0">  <?php echo initialEtab($bdda);?></h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
            <h4 class="m-0">Remplissage des notes- <?php echo Nametrim($bdda,$_SESSION['trimremplir'])." - ".$_SESSION['affklas'];?></h4>&nbsp&nbsp&nbsp
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
  
  function  matingpe($bdda,$idmat,$an){
        

     $v="SELECT idmat,anens  FROM matgroup";
     $reponse = $bdda->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch() AND $t==0)
      {
        if($donnees['idmat']==$idmat AND $donnees['anens']==$an){ 
           $t=1;        
            }
       }
      $reponse->closeCursor();
      return $t;
    } 
  
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
  
   $etat=etat($bdda,$_SESSION['anremplir'],$_SESSION['trimremplir']);
   
  if(!isset($_SESSION['remplerfolg'])){
    $_SESSION['remplerfolg']=0;
  }
  if($_SESSION['remplerfolg']==1){ ?>
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"> enregistrée(s) avec succès</i></br>
                  </br>
                  <?php // echo $_SESSION['msgengmisesco'];   ?> </h5>
    </div>
     <?php $_SESSION['remplerfolg']=0; } ?>

      <?php    if($etat==0){ ?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button"></button>
                  <h5><i class="fas fa-exclamation-triangle"> Les notes sont verrouillées</i></br>
                  </br>
                  <?php 
               ?> </h5>
    </div>
     <?php $_SESSION['remplerfolg']=0; } 
     if($_SESSION['code']==50 OR $_SESSION['code']==1 OR $_SESSION['code']==2){ 
     if($etat==0){
     echo "<a href='verrounote2.php?etat=1' class='btn btn-danger'><small>Cliquer pour deverrouiller les notes</small></a> ";
     }              
     if($etat==1){
     echo "<a href='verrounote2.php?etat=0' class='btn btn-success'><small>Cliquer pour verrouiller les notes</small></a> ";
     }
    }
     ?>

     

      
  <H4 style='color : purple'><B> </B></H4> 
 
  <div class="row">
    
           </div>
           </br>
           <div class="row">
          
     
       
        </div> 
         <form action="markinsert3.php" method="POST">
         
        <center> <b>Matière : <?php echo $_SESSION['namefachrempl']; ?> </br><button type='button' data-toggle='modal'   data-target='#modaeng' class='btn btn-primary' name='inserer'><small>cliquer pour gérer ses compétences</small></button></b></center></br>
   
        <b>Saisir le coefficient</b></br>
     
                 <?php 
    $koef=searchkoef($bdda,$_SESSION['fachrempl'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$_SESSION['clasremplir']); 
 
                 echo "<input name='coef'   value='".$koef."'   class='form-control' id='exampleInputEmail1'   required>  ";?>
                    
              </br>
   <?php            
       $isMob=is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));
        $nbrevaltri=nbreval($bdda,$_SESSION['clasremplir'],$_SESSION['trimremplir'],$_SESSION['anremplir']);
    $_SESSION['nbevalrplir']=$nbrevaltri;
 if(!$isMob OR $isMob){  // ordinateur
    echo "<table class='table table-bordered table-hover'> 
   <tr bgcolor='orange'><td><B>N°</B></td><td><B>Noms et prénoms</B></td>";
$z=1;
for($z=1;$z<=$nbrevaltri;$z++){
 echo "<td><B>EVAL ".$z." du TRIM ".$_SESSION['trimremplir']."</B></td>";
}
  
   
   echo "</tr> ";
   $_SESSION['fato1']=0; $_SESSION['fato2']=0; $_SESSION['fato3']=0;
   $_SESSION['faadto1']=0; $_SESSION['faadto2']=0; $_SESSION['faadto3']=0;
   $compet1="---"; $compet2="---"; $compet3="---";
 $v="SELECT matelev,nomelev,preelev,niveauelev,anelev  FROM eleve WHERE anelev='".$_SESSION['anremplir']."' AND niveauelev='".$_SESSION['clasremplir']."' ORDER BY nomelev" ;
        $reponse = $bdda->query($v);
       $j=1;   $tr=" "; $l=1;  $_SESSION['tableaumatrikule']=array();
     while ($donnees = $reponse->fetch() )
      {
   $matrikule=$donnees['matelev'];   $_SESSION['tableaumatrikule'][$l]= $matrikule;     
  $nom=$donnees['nomelev']." ".$donnees['preelev'];
$ergebnisse=searchmark($bdda,$_SESSION['fachrempl'],$_SESSION['trimremplir'],$_SESSION['anremplir'],$_SESSION['clasremplir'],$matrikule); 
// $ensb=$id."@".$note1."@".$note2."@".$note3."@".$ok1."@".$ok2."@".$ok3;
$tab=explode("@",$ergebnisse);
$numid=$tab[0]; $N1=$tab[1]; $N2=$tab[2]; $N3=$tab[3]; $dec1=$tab[4]; $dec2=$tab[5]; $dec3=$tab[6]; $exist=$tab[7];
 
$comp1=$tab[8]; $comp2=$tab[9]; $comp3=$tab[10];
$note1=" ";  $note2=" ";  $note3=" "; //$dec1=1; $dec2=1; $dec3=1;
if($numid==0){   $note1=" ";  $note2=" ";  $note3=" "; $dec1=1; $dec2=1; $dec3=1;} // echo $dec1;
if($numid!=0){  
    if($dec1==0){$note1=" ";} if($dec2==0){$note2=" "; } if($dec3==0){$note3=" "; }
    if($dec1==1){
        if($N1 == -1){
        $note1=" ";
        }
       if($N1!=-1){
        $note1=$N1+0;
        }
        if($N1>=10){
          $_SESSION['faadto1']++;
        }
        $_SESSION['fato1']++;
    }

    if($dec2==1){
        if($N2==-1){
        $note2=" ";
        }
       if($N2!=-1){
        $note2=$N2+0;
        }
        if($N2>=10){
          $_SESSION['faadto2']++;
        }
        $_SESSION['fato2']++;
    }

    if($dec3==1){ 
        if($N3==-1){
        $note3=" ";
        }
       if($N3!=-1){
        $note3=$N3+0;
        }
        if($N3>=10){
          $_SESSION['faadto3']++;
        }
        $_SESSION['fato3']++;
    }
     
}
$numo="numo".$j;
$champn1="champn1".$j; $champdec1="champdec1".$j;
$champn2="champn2".$j; $champdec2="champdec2".$j;
$champn3="champn3".$j; $champdec3="champdec3".$j;
// 
echo "<tr><td style='display:none'; ><B><input name='".$numo."' value='".$numid."' class='form-control' id='exampleInputEmail1'></B></td><td><B>".$j."</B></td><td><B>".$nom."</B></td>";
if($nbrevaltri==1){
  if($etat==0){
 echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."' disabled='disabled' value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> "; }
 if($etat==1){
 echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."'  value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> "; }
} 
if($nbrevaltri==2){    //  disabled='disabled'
  if($etat==0){
   echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."' disabled='disabled' value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
 
  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn2."' disabled='disabled' value='".$note2."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec2."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec2==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec2==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
  }


   if($etat==1){   //echo $ergebnisse."<Br>";
   echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."'  value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'>  
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
 
  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn2."'  value='".$note2."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec2."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec2==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec2==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
  }


}
if($nbrevaltri==3){
   if($etat==0){
   echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."' disabled='disabled' value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
 
  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn2."' disabled='disabled' value='".$note2."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec2."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec2==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec2==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";

  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn3."' disabled='disabled' value='".$note3."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec3."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec3==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec3==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
  }


  if($etat==1){
   echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn1."'  value='".$note1."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec1."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec1==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec1==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
 
  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn2."'  value='".$note2."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec2."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec2==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec2==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";

  echo "<td><B><div class='input-group mb-3' bgcolor='yellow'>
<input name='".$champn3."'  value='".$note3."' class='form-control' id='exampleInputEmail1'>
<div class='input-group-append'> 
<select name='".$champdec3."' class='select2' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($dec3==0){ echo "<option value='0'>OFF</option><option value='1'>ON</option>";} 
if($dec3==1){ echo "<option value='1'>ON</option><option value='0'>OFF</option>";}  
echo "</select>
</div> 
 </div>  
 </B></td> ";
  }

}
  
   echo "</tr> ";
           $j++; $l++;
                     
     } 
       $reponse->closeCursor(); 
       echo "</table> ";	
 } 
 $_SESSION['effecremplir']=$l-1;
 // FIN ORDINATEUR
 ?>      
   
         </br>

           
           <?php  
         
  ?>   
 
    <!-- /.content -->
     
  </div>
  <!-- /.content-wrapper -->
  
   


 
 







  <!-- /.content-wrapper -->
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </br></br></br></br></br> 


</br></br> 
  
  

  
 

<footer class="main-footer">
  <div class="btn-group w-100 mb-2">
       <?php  
     if($exist==0){
    $etarem="Jamais enregistrées";
     }
     if($exist!=0){
    $etarem="A déjà eu un enregistrement";
     }
      echo "
      <a class='btn btn-info' href='#' data-filter='3'><small>".$etarem."</small></a>
      <a class='btn btn-secondary' href='markstat.php' data-filter='3'><small>Statistiques</small></a>
      ";
   
      if($etat==1){ 
       echo "<button type='submit' class='btn btn-success' name='inserer'>Valider</button>";
        ?>
      


        
      <?php 
      }
     

     ?>
                       
    </div>
    <strong> </strong>  
  </footer>



<?php  echo "<div class='modal fade' id='modaeng'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Les compétences </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
  if($comp1=="---" OR $comp1==" "){  
    $chdum=array(); $chdum=explode("/",$_SESSION['anremplir']); $dp1=$chdum[0]-1;
    $dp2=$chdum[1]-1; $newchdum=$dp1."/".$dp2;
  $eresult=oldsearchcomp($bdda,$_SESSION['fachrempl'],$_SESSION['trimremplir'],$newchdum,$_SESSION['clasremplir']);
$taberes=array();
$taberes=explode("@",$eresult);
 $comp1=$taberes[1]; $comp2=$taberes[2]; $comp3=$taberes[3];  
  }
          echo "  <CENTER><b> Les compétences sont optionnelles</br> </br>  </b></CENTER> 
 <table class='table table-bordered table-hover'> 
          <tr><td bgcolor='orange'><B>Compétence 1 ==== EVAL 1</B></td></tr>
          <tr> <td><B><textarea name='compet1' style='height: 150px' class='form-control'>".$comp1."</textarea></B></td></tr>
          </table>
          </br>  
           <table class='table table-bordered table-hover'>
          <tr><td bgcolor='orange'><B>Compétence 2 ==== EVAL 2</B></td></tr>
          <tr> <td><B><textarea name='compet2' style='height: 150px' class='form-control'>".$comp2."</textarea></B></td></tr>
          </table>
          </br>  
 <table class='table table-bordered table-hover'>
          <tr><td bgcolor='orange'><B>Compétence 3 ==== EVAL 3</B></td></tr>
          <tr> <td><B><textarea name='compet3' style='height: 150px' class='form-control'>".$comp3."</textarea></B></td></tr>
          </table>"; 
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


  
 </form> 

 



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>




<?php  echo "<div class='modal fade' id='modajout'> " ; ?>
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Explications sur la saisie des notes </h4>
         
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
  <div class="modal-body">
   
  <?php
          echo "  <CENTER><b>Une case ou cellule de note dont le bouton est sur ON sera prise en compte lors du calcul des différentes moyennes</br>
  </br> </br>  Une case ou cellule de note dont le bouton est sur OFF ne sera pas prise en compte lors du calcul des différentes moyennes</br>       
 </br> Par exemple en une matière : </br></b></CENTER> 
 <table class='table table-bordered table-hover'> 
          <tr><td><B>Noms et prénoms</B></td><td><B>EVAL 1</B></td><td><B>EVAL 2</B></td><td><B>Trimestre</B></td></tr>
          <tr><td><B>Elève 1</B></td><td><B><input name='rr' class='form-control'> </Br>ON</B></td><td><B><input name='rr' value='12' class='form-control'> </Br>ON</B></td><td><B>06</B></td></tr>
          <tr><td><B>Elève 2</B></td><td><B><input name='rr' class='form-control'> </Br>OFF</B></td><td><B><input name='rr' value='12' class='form-control'> </Br>ON</B></td><td><B>12</B></td></tr>
          <tr><td><B>Elève 3</B></td><td><B><input name='rr' value='16' class='form-control'> </Br>ON</B></td><td><B><input name='rr' value='12' class='form-control'> </Br>ON</B></td><td><B>14</B></td></tr>
          <tr><td><B>Elève 4</B></td><td><B><input name='rr' class='form-control'> </Br>OFF</B></td><td><B><input name='rr' class='form-control'> </Br>OFF</B></td><td><B>coefficient non pris en compte</B></td></tr>
          </table>"; 
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


 