<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../listabrvtype.php'; 


function idf1($anf,$motf,$cni){
 

    $v="SELECT *  FROM enseignant WHERE id_etab='0' ";
    $reponse = $bdda->query($v);
      
     while ($donnees = $reponse->fetch() )
     {
        if($donnees['anens']==$anf AND $donnees['mtpasse']== $motf AND $donnees['cni'] != $cni){
          
          return 1;
        }
      }
     $reponse->closeCursor();
     
   }  
   
    
     function idf2($mat,$an,$clas){
    

     $v="SELECT *  FROM enseignant WHERE id_etab='0' ";
     $reponse = $bdda->query($v);
        $val=0;
      while ($donnees = $reponse->fetch() )
      {
         if($donnees['anens']==$an AND $donnees['discipline']== $mat AND $donnees['nivens'] == $clas){
           
           $val=1;
         }
       }
      $reponse->closeCursor();
      return $val;
    } 


    function numcniAnc($mat,$an,$clas){
    

      $ve="SELECT * FROM enseignant WHERE  id_etab='0' AND  anens='".$an."' AND discipline='".$mat."' AND nivens='".$clas."' ";
      $repons = $bdda->query($ve);
      while ($donnees = $repons->fetch())
      {   
          $val=$donnees['cni'] ;
          } 
              $repons->closeCursor(); 
              return $val;
      } 
  

    function occurAnc($an,$cni){
 

       $ri="SELECT COUNT(*) AS n FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND cni='".$cni."'";
     $r = $bdda->query($ri);
     while ($d = $r->fetch()){
     $numb=$d['n']; 
    return $numb; 
    }
    $r->closeCursor(); 
      }  

$klassewahl=array();
if(!empty($_POST['nivens'])){
$klassewahl=$_POST['nivens'];
 
 
$_SESSION['totaligne']=count($klassewahl);
}
if(isset($_POST['send3'])){
$an=$_POST['anens'];$_SESSION['anajoutensn2']=$_POST['anens'];
$cni=$_POST['cni'];$_SESSION['cniajoutensn2']=$_POST['cni']; 
$namens=$_POST['nomens']." ".$_POST['prenomens'];
$_SESSION['namensajoutensn2']=$_POST['nomens']." ".$_POST['prenomens'];
$MOT=$_POST['mtpasse'];$_SESSION['mtpasseajoutensn2']=$MOT;
$nam=$_POST['nomens'];$_SESSION['nam']=$nam;
$prenam=$_POST['prenomens'];$_SESSION['prenam']=$prenam;
$tel=$_POST['telens'];$_SESSION['tel']=$tel;
$mtp=$_POST['mtpasse'];$_SESSION['mtpasse']=$mtp;
 
$genre=$_POST['genre'];$_SESSION['genre']=$genre;
$datens=$_POST['datens'];$_SESSION['datens']=$datens;
$salaire=$_POST['salaire'];$_SESSION['salaire']=$salaire;
$taux=$_POST['taux'];$_SESSION['taux']=$taux;
}
else{
  $an=$_SESSION['anajoutensn2'];$cni=$_SESSION['cniajoutensn2'] ;
  $namens=$_SESSION['namensajoutensn2'];
  $MOT=$_SESSION['mtpasseajoutensn2'];
  $nam=$_SESSION['nam'];$prenam=$_SESSION['prenam'];$tel=$_SESSION['tel'];
 $mtp= $_SESSION['mtpasse'];$genre=$_SESSION['genre'];
 $datens=$_SESSION['datens'];$salaire=$_SESSION['salaire'];
 $taux=$_SESSION['taux'];
}
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


 // conne economat
 $conne=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'4');
 //conne fondateur
 $conneF=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'1');
 //conne principal
 $conneP=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'2');
  //conne censeur
  $conneCEN=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'3');  $conneSECRE=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'7');
  
  
if($conne==1 OR $conneF==1 OR $conneP==1 OR $conneCEN==1 OR $conneSECRE==1 ){   

 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>
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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nom'];  ?></a>
        </div>
      </div>

       
      <!-- Sidebar Menu -->
      <?php if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 OR $_SESSION['code']==3){principalcollege();}if($_SESSION['code']==7){secretairecollege();}if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}?>
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
             <?php echo listouthorizcoll();?> 
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <center> 
           </center>
           <?php if(isset($_POST['send3'])){
               echo " <section class='content'>     <div class='container-fluid'>
        <div class='row'>    <!-- left column -->  <div class='col-md-6'>
            <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
                 <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
                 <br><br>Résultat(s) de l'enregistrement de ".$namens." </b></H5>
                 </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
    <div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                       
    <H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

  " ;  }
//ABRVTYPENS($bdda,TYPENS($bdda,$donnees['niveauelev']))
else{  
    
  echo " <section class='content'>     <div class='container-fluid'>
  <div class='row'>    <!-- left column -->  <div class='col-md-6'>
      <!-- general form elements -->      <div class='card card-primary'>   <div class='card-body'>
           <div class='form-group'> <H5><b>ANNEE SCOLAIRE : ".$an." 
           <br><br>Résultat(s) de l'enregistrement de ".$namens." </b></H5>
           </div> </div>     <!-- /.card-body --> </div>  <!-- /.card --> </div>  <!-- right column -->
<div class='col-md-6'> <!-- Form Element sizes --> <div class='card card-success'> <div class='card-body'> <div class='form-group'>
                 
<H5><b>ENSEIGNEMENT SECONDAIRE<br>TYPE D'ENSEIGNEMENT : Général,commercial,industriel et anglophone</b></H5>
</div> <!-- /.card-body --> </div> <!-- /.card --> </div> <!-- /.card -->  </div> <!--/.col (right) --> </div> <!-- /.row --> </div><!-- /.container-fluid -->  </section>

" ;

    }

    

  
  
  ?>
                




    <!-- /.content -->  

    
        

          <?php 
  


 if(isset($_POST['send3'])){ 

  echo" <form method='post' action='ajoutensn1.php'>  
  <select name='choix' >
   <option value='".$cni."'></option></select>
  <button type='submit' name='send1' value='".TYPENS($bdda,$klassewahl[0],$an)."' class='btn btn-primary'>
  Retour </button>
   </form>";
 

echo " <table class='table table-bordered table-hover'> 
<tr bgcolor='#hfc45d'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>CLASSES</B></td><td><B>DECISION</B></td> 
<td><B>CHOIX</B></td></tr>"; 
if (idf1($an,$MOT,$cni)==1){// diiff teacher mais mm mot de passe
    echo "Veuillez changer de mot de passe" ; 
}
else{    
for($i=0;$i<count($klassewahl);$i++){
     $n=$i+1;  
     $matier="matieri".$i; $clas=$klassewahl[$i]; $_SESSION[$matier]=$_POST['discipline'];
     $klas="klasi".$i; $_SESSION[$klas]=$klassewahl[$i];   
     if(verifenregens($bdda,$_POST['discipline'],$klassewahl[$i],$an)==1){ // matiere existe
    
          if(rechcnimat($bdda,$_POST['discipline'],$klassewahl[$i],$an,$cni)==1){ //mm prof
           echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
            </td><td></td> </tr>";
           }
     
            else{ //pas le mm prof
              echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
              </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Un autre y est déjà
                 </td><td> 
                 <form method='post' action='ajoutensn2.php'>  
               <button type='submit' name='send4' value='".$i."' class='btn btn-primary'>Insérer en remplaçant l'ancien </button>
              &nbsp &nbsp
               <button type='submit' name='send5' value='".$i."' class='btn btn-danger'>Insérer sans remplacer l'ancien </button>
                </form>
                </td> </tr>";
           }   
      }
      else{  //pas matiere existante

        $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
        $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
       
 
        echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
         </td><td></td> </tr>";
        } 
    }   
   }
  }


  ////////////////////////////////////////////////////////
 if(isset($_POST['send5'])){  
   $in=$_SESSION['totaligne']-1;
  echo" <form method='post' action='ajoutensn1.php'>  
  <select name='choix' >
   <option value='".$cni."'></option></select>
  <button type='submit' name='send1' value='".TYPENS($bdda,$_SESSION['klasi0'],$an)."' class='btn btn-primary'>
  Retour </button>
   </form>";

    echo " <table class='table table-bordered table-hover'> 
    <tr bgcolor='#hfc45d'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>CLASSES</B></td><td><B>DECISION</B></td> 
    <td><B>CHOIX</B></td></tr>
  ";
 
 

  if (idf1($an,$MOT,$cni)==1){// diff teacher mais mm mot de passe
      echo "Veuillez changer de mot de passe";
  }
  else{    
  for($i=0;$i<$_SESSION['totaligne'];$i++){
       $n=$i+1;  
       $matier="matieri".$i;  
       $klas="klasi".$i;    
       if($_POST['send5']==$i){//CE QU'ON MODIFIE
        $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
        $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
        if(verifenregens($bdda,$_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
      
          if(rechcnimat($bdda,$_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
           echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
            </td><td></td> </tr>";
           }
     
            else{ //pas le mm prof
              echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
              </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
                 </td><td> 
               </form>
                </td> </tr>";
           }   
      }
      else{  //pas matiere existante

        $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
        $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
       

        echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
         </td><td></td> </tr>";
        }   
       }
       

       else{ // CE QU'ON NE MODIFIE PAS 
       if(verifenregens($bdda,$_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
      
            if(rechcnimat($bdda,$_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
             echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
              </td><td></td> </tr>";
             }
       
              else{ //pas le mm prof
                echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
                </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Un autre y est déjà
                   </td><td> 
                   <form method='post' action='ajoutensn2.php'>  
                 <button type='submit' name='send4' value='".$i."' class='btn btn-primary'>Insérer en remplaçant l'ancien </button>
                &nbsp &nbsp
                 <button type='submit' name='send5' value='".$i."' class='btn btn-danger'>Insérer sans remplacer l'ancien </button>
                  </form>
                  </td> </tr>";
             }   
        }
        else{  //pas matiere existante
  
          $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
          $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
         
  
          echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($bdda,$_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
           </td><td></td> </tr>";
          } }



      }   
     }





  }
//////////////////////////////////////////////////////////////////////////////////////////
  if(isset($_POST['send4'])){  

    $in=$_SESSION['totaligne']-1;
    echo" <form method='post' action='ajoutensn1.php'>  
    <select name='choix' >
     <option value='".$cni."'></option></select>
    <button type='submit' name='send1' value='".TYPENS($bdda,$_SESSION['klasi0'])."' class='btn btn-primary'>
    Retour </button>
     </form>";
   
    echo " <table class='table table-bordered table-hover'> 
    <tr bgcolor='#hfc45d'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>CLASSES</B></td><td><B>DECISION</B></td> 
    <td><B>CHOIX</B></td></tr>
  ";
 
 

  if (idf1($an,$MOT,$cni)==1){// diff teacher mais mm mot de passe
      echo "Veuillez changer de mot de passe";
  }
  else{    
  for($i=0;$i<$_SESSION['totaligne'];$i++){
       $n=$i+1;  
       $matier="matieri".$i;  
       $klas="klasi".$i;    
       if($_POST['send4']==$i){//CE QU'ON MODIFIE
         $numcniAnc=numcniAnc($_SESSION[$matier],$an,$_SESSION[$klas]);
         $occurAnc= occurAnc($an,$numcniAnc);
         if($occurAnc==1){
 
          $req="UPDATE enseignant SET discipline=' ' WHERE id_etab='0' AND cni='". $numcniAnc."' AND anens='".$an."' AND nivens='".$_SESSION[$klas]."' AND discipline='".$_SESSION[$matier]."'" ;
         $repon = $bdda->query($req);
         
       
      }
      if($occurAnc > 1){
        $req="DELETE FROM enseignant WHERE id_etab='0' AND cni='". $numcniAnc."' AND anens='".$an."' AND nivens='".$_SESSION[$klas]."' AND discipline='".$_SESSION[$matier]."'" ;
         $repon = $bdda->query($req);
      
      }

        $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
        $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
        if(verifenregens($bdda,$_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
      
          if(rechcnimat($bdda,$_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
           echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Enregistré
            </td><td></td> </tr>";
           }
     
            else{ //pas le mm prof
              echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
              </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Enregistré
                 </td><td> 
               </form>
                </td> </tr>";
           }   
      }
      else{  //pas matiere existante

        $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
        $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
       

        echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
           </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Enregistré
         </td><td></td> </tr>";
        }   
       }
       

       else{ // CE QU'ON NE MODIFIE PAS 
       if(verifenregens($bdda,$_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
      
            if(rechcnimat($bdda,$_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
             echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
             </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Enregistré
              </td><td></td> </tr>";
             }
       
              else{ //pas le mm prof
                echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
                </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Un autre y est déjà
                   </td><td> 
                   <form method='post' action='ajoutensn2.php'>  
                 <button type='submit' name='send4' value='".$i."' class='btn btn-primary'>Insérer en remplaçant l'ancien </button>
                &nbsp &nbsp
                 <button type='submit' name='send5' value='".$i."' class='btn btn-danger'>Insérer sans remplacer l'ancien </button>
                  </form>
                  </td> </tr>";
             }   
        }
        else{  //pas matiere existante
  
          $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
          $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
         
  
          echo "<tr><td><B>".$n."</th><td><B>".matparid($bdda,$_SESSION[$matier],$an)." 
             </td> <td><B>".$_SESSION[$klas]."</B></td> <td><B> Enregistré
           </td><td></td> </tr>";
          } }



      }   
     }


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
</body>
</html>
<?php }   ?>