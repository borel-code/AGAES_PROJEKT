<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 




if(isset($_POST['send3']) OR isset($_POST['send5']) OR isset($_POST['send4']) ){

  function idf1($anf,$motf,$cni){
     // Insertion du message à l'aide d'une requête préparée 
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
      
      // Insertion du message à l'aide d'une requête préparée 
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
   
        // Insertion du message à l'aide d'une requête préparée 
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
  
  
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0){  
   
  
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
        <?php if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 
        OR $_SESSION['code']==3){principalcollege();}
        if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}
        if($_SESSION['code']==7){secretairecollege();}?>
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
              <h1 class="m-0">  </h1>&nbsp&nbsp&nbsp
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <ol class="breadcrumb float-sm-right">
               <?php echo listouthorizcoll();
               
               echo" ";
               
               
               
               ?> 
                
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
  //ABRVTYPENS(TYPENS($donnees['niveauelev']))
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
  
   /* echo" <form method='post' action='ajoutensn1.php'>  
    <select name='choix' >
     <option value='".$cni."'></option></select>
    <button type='submit' name='send1' value='".TYPENS($klassewahl[0],$an)."' class='btn btn-primary'>
    Retour </button>
     </form>";
   */
  
  echo " <table class='table table-bordered table-hover'> 
  <tr bgcolor='#hfc45d'><td><B>N°</B></td><td><B>MATIERES</B></td><td><B>CLASSES</B></td><td><B>DECISION</B></td> 
  <td><B>CHOIX</B></td></tr>"
  ; 
  if (idf1($an,$MOT,$cni)==1){// diiff teacher mais mm mot de passe
      echo "Veuillez changer de mot de passe" ; 
  }
  else{    
  for($i=0;$i<count($klassewahl);$i++){
       $n=$i+1;  
       $matier="matieri".$i; $clas=$klassewahl[$i]; $_SESSION[$matier]=$_POST['discipline'];
       $klas="klasi".$i; $_SESSION[$klas]=$klassewahl[$i];   
       if(verifenregens($_POST['discipline'],$klassewahl[$i],$an)==1){ // matiere existe
      
            if(rechcnimat($_POST['discipline'],$klassewahl[$i],$an,$cni)==1){ //mm prof
             echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
              </td><td></td> </tr>";
             }
       
              else{ //pas le mm prof
                echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
                </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Un autre y est déjà
                   </td><td> 
                   <form method='post' action='ajoutensn1.php'>  
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
         
   
          echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
           </td><td></td> </tr>";
          } 
      }   
     }
    }
  
  
    ////////////////////////////////////////////////////////
   if(isset($_POST['send5'])){  
     $in=$_SESSION['totaligne']-1;
   /* echo" <form method='post' action='ajoutensn1.php'>  
    <select name='choix' >
     <option value='".$cni."'></option></select>
    <button type='submit' name='send1' value='".TYPENS($_SESSION['klasi0'],$an)."' class='btn btn-primary'>
    Retour </button>
     </form>";*/
  
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
          if(verifenregens($_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
        
            if(rechcnimat($_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
             echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
              </td><td></td> </tr>";
             }
       
              else{ //pas le mm prof
                echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
                </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
                   </td><td> 
                 </form>
                  </td> </tr>";
             }   
        }
        else{  //pas matiere existante
  
          $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
          $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
         
  
          echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
           </td><td></td> </tr>";
          }   
         }
         
  
         else{ // CE QU'ON NE MODIFIE PAS 
         if(verifenregens($_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
        
              if(rechcnimat($_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
               echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
               </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
                </td><td></td> </tr>";
               }
         
                else{ //pas le mm prof
                  echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
                  </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Un autre y est déjà
                     </td><td> 
                     <form method='post' action='ajoutensn1.php'>  
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
           
    
            echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
               </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
             </td><td></td> </tr>";
            } }
  
  
  
        }   
       }
  
  
  
  
  
    }
  //////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['send4'])){  
  
      $in=$_SESSION['totaligne']-1;
    /*   echo" <form method='post' action='ajoutensn1.php'>  
      <select name='choix' >
       <option value='".$cni."'></option></select>
      <button type='submit' name='send1' value='".TYPENS($_SESSION['klasi0'],$_SESSION['annee'])."' class='btn btn-primary'>
      Retour </button>
       </form>"; */
     
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
          if(verifenregens($_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
        
            if(rechcnimat($_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
             echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
              </td><td></td> </tr>";
             }
       
              else{ //pas le mm prof
                echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
                </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
                   </td><td> 
                 </form>
                  </td> </tr>";
             }   
        }
        else{  //pas matiere existante
  
          $req = $bdda->prepare('INSERT INTO enseignant(nomens, prenomens, id_etab, telens, discipline, mtpasse,nivens,niveau,anens,genre,datens,cni,salaire,taux ) VALUES(?,?,?,?,?, ?,?,?, ?, ?, ?, ?, ?,? )'); 
          $req->execute(array($nam,$prenam,'0',$tel,$_SESSION[$matier],$MOT,$_SESSION[$klas],'0',$an,$genre,$datens,$cni,$salaire,$taux)); 
         
  
          echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
             </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
           </td><td></td> </tr>";
          }   
         }
         
  
         else{ // CE QU'ON NE MODIFIE PAS 
         if(verifenregens($_SESSION[$matier],$_SESSION[$klas],$an)==1){ // matiere existe
        
              if(rechcnimat($_SESSION[$matier],$_SESSION[$klas],$an,$cni)==1){ //mm prof
               echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
               </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
                </td><td></td> </tr>";
               }
         
                else{ //pas le mm prof
                  echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
                  </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Un autre y est déjà
                     </td><td> 
                     <form method='post' action='ajoutensn1.php'>  
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
           
    
            echo "<tr><td><B>".$n."</th><td><B>".matparid($_SESSION[$matier],$an)." 
               </td> <td><B>".classparid($_SESSION[$klas],$an)."</B></td> <td><B> Enregistré
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
  <?php }  }    










else{ 

if(isset($_POST['send'])){
  $an=$_POST['ann'];$_SESSION['anajoutensn1']=$_POST['ann'];
   
  }
  if(isset($_POST['send1']) ){
    $an=$_SESSION['anajoutensn1']; 
    $_SESSION['newensg']=$_POST['choix'];
    
  }

  if( isset($_POST['sendaz'])){
    $an=$_SESSION['anajoutensn1']; 
     
    
  }

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


  // conne economat
  $conne=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'4');
  //conne fondateur
$conneF=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'1');
//conne principal
$conneP=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'2');
 //conne censeur
 $conneCEN=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'3');  $conneSECRE=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'7');
  //conne surv
$conneSUR=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'5');

   //secret
   $conneSECRE=idt($_SESSION['util'],$_SESSION['mtp'],$_SESSION['annee'],'7');
 $conneEns=idtl($_SESSION['mtp'],$_SESSION['annee']);
 if($conneF==1 OR $conneP==1 OR $conneCEN==1 OR $conneSECRE==1 OR $conneSUR==1 OR $conneSECRE==1 OR $conneEns==1){   
   
 
  //sendaz
  if(isset($_POST['sendaz'])){
   
    $nomaz=$_POST['nomens'];
    $prenomaz=$_POST['prenomens'];
    $genreaz=$_POST['genre'];
    $datensaz=$_POST['datens'];
    
    $telensaz=$_POST['telens'];
    $cniaz=$_POST['cni'];
    $salaireaz=$_POST['salaire'];
    $tauxaz=$_POST['taux'];
    $mtpasseaz=$_POST['mtpasse'];
               }
 //fin sendaz

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
      <?php if($_SESSION['code']==4){economatcollege();} if($_SESSION['code']==1){fondatcollege();}if($_SESSION['code']==2 
        OR $_SESSION['code']==3){principalcollege();}
        if($_SESSION['code']==5){survcollege();}if($_SESSION['code']==6){secteurcollege();}
        if($_SESSION['code']==7){secretairecollege();}?>
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
            <h1 class="m-0">ENREGISTRER UN(E)  ENSEIGNANT(E) </h1>&nbsp&nbsp&nbsp
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Choisir un enseignant</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
            <?php echo ajoutensn1horizcoll($_SESSION['annee']);?> 
            </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->   



              
            </ol>
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
                <h3 class="card-title"> <?php

if(isset($_POST['send'])){
  if($_POST['send']==1){
echo "Enseignement secondaire général";
  }
  if($_POST['send']==2){
    echo "Enseignement secondaire commercial";
      }
      if($_POST['send']==3){
        echo "Enseignement secondaire industriel";
          }   
          if($_POST['send']==4){
            echo "Enseignement secondaire anglophone";
              }
   
  }
  if(isset($_POST['sendaz'])){
    if($_POST['sendaz']==1){
      echo "Enseignement secondaire général";
        }
        if($_POST['sendaz']==2){
          echo "Enseignement secondaire commercial";
            }
            if($_POST['sendaz']==3){
              echo "Enseignement secondaire industriel";
                }   
                if($_POST['sendaz']==4){
                  echo "Enseignement secondaire anglophone";
                    }
  } 
                ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="ajoutensn1.php" name="inscrip">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NOMS  </label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='nomens' class='form-control' id='exampleInputEmail1' required >";
                  }
                  if(isset($_POST['send1'])){  
        echo  "<input name='nomens' class='form-control' id='exampleInputEmail1' value='".nomensuniqohnejahr($_POST['choix'])."' required >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='nomens' class='form-control' id='exampleInputEmail1' value='".$nomaz."' required >";
                               }    
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">PRENOMS </label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='prenomens' class='form-control' id='exampleInputEmail1' >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='prenomens' class='form-control' id='exampleInputEmail1' value='".prenomensuniqohnejahr($_POST['choix'])."' >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='prenomens' class='form-control' id='exampleInputEmail1' value='".$prenomaz."' >";
                               }     
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">SEXE</label>
                    <select name="genre" class="form-control" id="exampleInputPassword1">
                    <?php  if(isset($_POST['send'])){
                  echo " <option value='M'>MASCULIN</option>
								   <option value='F'>FEMININ</option>";
                  }
                   
                  if(isset($_POST['send1'])){
                    if($_POST['choix']!=" "){
                    $sex=sexensuniqohnejahr($_POST['choix']);
                    if($sex=="M"){
                      echo "<option value='".$sex."'>MASCULIN</option>";
                      echo " <option value='F'>FEMININ</option>";
                    }
                    if($sex=="F"){
                      echo "<option value='".$sex."'>FEMININ</option>";
                      echo " <option value='M'>MASCULIN</option>";
                    } }
                    else{
                      echo " <option value='M'>MASCULIN</option>";
                      echo "<option value='F'>FEMININ</option>";
                   
                    }
                    }
                     
                    if(isset($_POST['sendaz'])){
                      
                      if($genreaz=="M"){
                        echo " <option value='".$genreaz."'>MASCULIN</option>" ;
                        echo " <option value='F'>FEMININ</option>";
                      }
                      else{
                        echo " <option value='".$genreaz."'>FEMININ</option>" ;
                        echo " <option value='M'>MASCULIN</option>";
                      }
                      }

                    ?>
								</select>
                            </div>
                            <div class="form-group">
                    <label for="exampleInputPassword1">DATE DE NAISSANCE </label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='datens' class='form-control' id='exampleInputEmail1'  >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='datens' class='form-control' id='exampleInputEmail1' value='".datensuniqohnejahr($_POST['choix'])."' >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='datens' class='form-control' id='exampleInputEmail1' value='".$datensaz."' >";
                               }
                    ?> </div>  
                  <?php  if(isset($_POST['send1']) AND  $_POST['choix']!=" "){   $_SESSION['choe']=$_POST['choix']; ?>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">SES MATIERES ET CLASSES DEJA ATTRIBUEES</label>
                    <select name="se" class="form-control" id="exampleInputPassword1">
                    <?php 
                           // Insertion du message à l'aide d'une requête préparée 
                            $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND cni='".$_POST['choix']."'";
                            $reponse = $bdda->query($v);
                              
                             while ($donnees = $reponse->fetch() )
                             {
                              echo "<option value='' >".matparid($donnees['discipline'],$an)." ----- ".classparid($donnees['nivens'],$an)."</option>" ; 
                              }
                             $reponse->closeCursor();
                            }   

                           
                      ?>   



<?php  if(isset($_POST['sendaz']) ){   ?>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">SES MATIERES ET CLASSES DEJA ATTRIBUEES</label>
                    <select name="se" class="form-control" id="exampleInputPassword1">
                    <?php 
                            // Insertion du message à l'aide d'une requête préparée 
                            $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND cni='".$_SESSION['choe']."'";
                            $reponse = $bdda->query($v);
                              
                             while ($donnees = $reponse->fetch() )
                             {
                              echo "<option value='' >".matparid($donnees['discipline'],$an)." ----- ".classparid($donnees['nivens'],$an)."</option>" ; 
                              }
                             $reponse->closeCursor();
                             ?>   
                             </select>
                               </div> <?php  }  ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">TELEPHONE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='telens' class='form-control' id='exampleInputEmail1' >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='telens' class='form-control' id='exampleInputEmail1' value='".telensuniqohnejahr($_POST['choix'])."' >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='telens' class='form-control' id='exampleInputEmail1' value='".$telensaz."' >";
                               }          
                    ?> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">N° CNI</label>
                    <?php
                         if(isset($_POST['send'])){
                          echo  "<input name='cni' class='form-control' id='exampleInputEmail1' value=' '  required>";
                                     }
                                     if(isset($_POST['send1'])){
                                      if($_POST['choix']!=" "){         
                                      echo  "<input name='cni' class='form-control' id='exampleInputEmail1' value='".$_POST['choix']."'  required>";
                                      }
                                      else{
                                        echo  "<input name='cni' class='form-control' id='exampleInputEmail1'  required >";
                                      }
                                    }
                                    if(isset($_POST['sendaz'])){
                                      echo  "<input name='cni' class='form-control' id='exampleInputEmail1' value='".$cniaz."' required>";
                                                 }             
                    ?> 
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">SALAIRE FIXE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='salaire' class='form-control' id='exampleInputEmail1'  >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='salaire' class='form-control' id='exampleInputEmail1' value='".salaireensuniq($_POST['choix'],$an)."' >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='salaire' class='form-control' id='exampleInputEmail1' value='".$salaireaz."' >";
                               }
                    ?> 
                  </div>
            </br>

            <label for="exampleInputPassword1">TAUX HORAIRE</label>
            <?php
                    if(isset($_POST['send'])){
       echo  "<input name='taux' class='form-control' id='exampleInputEmail1'   >";
                  }
                  if(isset($_POST['send1'])){
        echo  "<input name='taux' class='form-control' id='exampleInputEmail1' value='".tauxensuniq($_POST['choix'],$an)."'  >";
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='taux' class='form-control' id='exampleInputEmail1' value='".$tauxaz."'  >";
                               }         
                    ?> 
                    </br>


                </div>
                <!-- /.card-body -->

               
            </div>
            <!-- /.card -->

             
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-12 col-sm-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Autres informations </h3>
              </div>
              <div class="card-body">
              
               
              


<div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>TYPE D'ENSEIGNEMENT</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                  <?php 
            
            echo "  <button type='submit' name='sendaz' value='1' class='external-event bg-success' >Général
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            <button type='submit'  name='sendaz' value='2' class='external-event bg-warning'  >Commercial
            &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>  
            <button type='submit'  name='sendaz' value='3' class='external-event bg-info' >Industriel
            &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            <button type='submit' name='sendaz' value='4' class='external-event bg-info' >Anglophone
            &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button> 
            <button type='submit' name='sendaz' value='5' class='external-event bg-info' >Tout le sécondaire
            &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
             ";
            ?>
                  </li>
                  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

              <div class="form-group">
                    <label for="exampleInputPassword1">DISCIPLINES</label>
                    <select name="discipline" class="form-control select2" style="width: 100%;" id="exampleInputPassword1">
                    
							      <?php 
                    	
                       if(isset($_POST['send'])){
                        $tipp=$_POST['send'];
                        
                          $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' AND (typeEns='".$tipp."'
        OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
         ) ORDER BY codemat";
                     $reponse = $bdda->query($v);
                                   
                       }
                       else{
                        $tipp=$_POST['sendaz'];  
                        if($tipp!=5){
                        $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--' AND (typeEns='".$tipp."'
      OR typeEns LIKE '$tipp%' OR typeEns LIKE '%$tipp' OR typeEns LIKE '%$tipp%' 
       ) ORDER BY codemat";
       }
                       else{
                           $v="SELECT *  FROM matiere  WHERE sup='0'   AND codemat!='--'  ORDER BY codemat";  
                         }
                   $reponse = $bdda->query($v);
                       }
                      while ($donnees = $reponse->fetch()){                            
                       $phrase = $donnees['id']; ; 
         $p="value=".$phrase;
         
         
         echo "<option ".$p." >".matparid($phrase,$an)." </option>" ;
        }
                       
                  $reponse->closeCursor(); 
                   ?>
                     </select>
                  </div>

                   

              <div class="form-group">
                    <label for="exampleInputPassword1">CLASSES</label>
                    <div class="select2-purple">
                    <select class="select2" name="nivens[]"  multiple="multiple" data-placeholder="Choisir ses classes" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <optgroup label='Cycle 1' >
							      <?php 
                    	
                       if(isset($_POST['send'])){
                        if($_POST['send']==1){
                     $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='1' AND sup='0' ");
                        }
                        if($_POST['send']==2){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='1' AND sup='0'  ");
                             }
                       if($_POST['send']==3){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='1' AND sup='0'  ");
                                 }    
                       if($_POST['send']==4){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='1' AND sup='0' ");
                           }            
                       }
                       else{
                        if($_POST['sendaz']==1){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='1' AND sup='0'  ");
                             }
                             if($_POST['sendaz']==2){
                               $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='1' AND sup='0' ");
                                  }
                            if($_POST['sendaz']==3){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='1' AND sup='0'  ");
                                      }    
                            if($_POST['sendaz']==4){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='1' AND sup='0'  ");
                                } 
                                if($_POST['sendaz']==5){
                                  $reponse = $bdda->query("SELECT * FROM classe WHERE cycle='1' AND sup='0' ");
                               }      
                       }
                     
                      while ($donnees = $reponse->fetch()){                            
                       $phrase=$donnees['id'] ; 
         $p='value='.$phrase;
  
         echo '<option '.$p.' >'.classparid($phrase,$_SESSION['annee']).' </option>' ;
                       } 
                  $reponse->closeCursor(); 
                   ?>
                    </optgroup >

                    <optgroup label='Cycle 2' >
							      <?php 
                    	
                       if(isset($_POST['send'])){
                        if($_POST['send']==1){
                     $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='2' AND sup='0' ");
                        }
                        if($_POST['send']==2){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='2' AND sup='0'  ");
                             }
                       if($_POST['send']==3){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='2' AND sup='0'  ");
                                 }    
                       if($_POST['send']==4){
                              $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='2' AND sup='0' ");
                           }   
                                      
                       }
                       else{
                        if($_POST['sendaz']==1){
                          $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='1' AND cycle='2' AND sup='0'  ");
                             }
                             if($_POST['sendaz']==2){
                               $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='2' AND cycle='2' AND sup='0'  ");
                                  }
                            if($_POST['sendaz']==3){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='3' AND cycle='2' AND sup='0'  ");
                                      }    
                            if($_POST['sendaz']==4){
                                   $reponse = $bdda->query("SELECT * FROM classe WHERE typeEns='4' AND cycle='2' AND sup='0' ");
                                }  
                                if($_POST['sendaz']==5){
                                  $reponse = $bdda->query("SELECT * FROM classe WHERE  cycle='2' AND sup='0' ");
                               }      
                       }
                      while ($donnees = $reponse->fetch()){                            
                        $phrase=$donnees['id'] ; 
                        $p='value='.$phrase;
                 
                        echo '<option '.$p.' >'.classparid($phrase,$_SESSION['annee']).' </option>' ;
                       } 
                  $reponse->closeCursor(); 
                   ?>
                    </optgroup >
								</select> </div>
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">ANNEE SCOLAIRE</label>
                    <select name="anens" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$_SESSION['annee']."'>".$_SESSION['annee']." </option>";
						      ?>
								</select>
                  </div>
                 
                    <label for="exampleInputPassword1">MOT DE PASSE</label>
                    <?php
                    if(isset($_POST['send'])){
       echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' value=' '  required >";
                  }
                  if(isset($_POST['send1'])){
                    if($_POST['choix']!=" "){
        echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' value='".mtpasseensuniq($_POST['choix'],$an)."'  required >";
                     }    
                     else{
                      echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' required >";
                     }        
                   }
                   if(isset($_POST['sendaz'])){
                    echo  "<input name='mtpasse' class='form-control' id='exampleInputEmail1' value='".$mtpasseaz."'  required >";
                                 }            
                    ?> <div class="card-footer">
                    </br> <button type="submit" name="send3" class="btn btn-primary">Enregistrer</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                  <button type="reset" class="btn btn-danger">Annuler</button>
                </div></br></br></br></br>
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
<?php } }   ?>