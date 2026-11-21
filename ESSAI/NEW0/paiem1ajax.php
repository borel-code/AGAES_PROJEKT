<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php';   require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; 
$trueadmin=idamin( $_SESSION['util'],$_SESSION['mtp']);
if($trueadmin!=0 
AND ($_SESSION['code']==50 OR $_SESSION['code']==1
OR $_SESSION['code']==4) ){ 
 
  ?>
   
  
 
<?php
 

  $v="SELECT *  FROM prorogation WHERE id='1' ";
	$reponse = $bdda->query($v);
  $delai=' ';
  while ($donnees = $reponse->fetch() )
  {
	 
    $delai=$donnees['date'];
	  
  } 
  $reponse->closeCursor();
 $q=$_GET["q"];
if($q!=0){ 
  $xv="SELECT * FROM eleve WHERE   anelev='".$_SESSION['annee']."' ORDER BY nomelev " ;
  $reponsex= $bdda->query($xv);
  $true=0;
  while ($donneesx= $reponsex->fetch() AND $true==0)
    { 
      if($donneesx['matelev']==$q){ 
  
    $nom=$donneesx['nomelev'];
    $pre=$donneesx['preelev'];
    $mat=$donneesx['matelev'];
    $clas=$donneesx['niveauelev'];
    $an=$_SESSION['annee'];
    $idnational=$donneesx['idnational'];?>

<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $nom." ".$pre." &nbsp&nbsp&nbsp&nbsp&nbsp</br>Classe : ".classparid($clas,$an); ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="POST" action="paiem2.php" name="paiem">
                <div class="card-body">
                  
                  <div class="form-group">
                  <label for="exampleInputPassword1">MONTANT AVANCE</label>
                    <input name="mtnt" class="form-control" id="exampleInputPassword1"  placeholder=" EXPLE : 25000" required >
                    </br>

                    <label for="exampleInputPassword1">REMISE</label>
                    <select name="remise" class="form-control" id="exampleInputPassword1">
                    <option value=" ">NON</option>
								 <option value="OUI">OUI</option>
								</select>
            </br>

            <label for="exampleInputPassword1">TYPE DE REMISE</label>
                    <select name="genre" class="form-control" id="exampleInputPassword1">
                    <option value=" "> </option>
                    <?php  
                   
                     $wx="SELECT * FROM remise   ORDER BY nom " ;
                     $reponsew= $bdda->query($wx);
                     while ($donneesw= $reponsew->fetch() )
                       { 
                        echo " 
                        <option value='".$donneesw['nom']."'>
                        ".$donneesw['nom'] ."</option> ";
                       }
                       $reponsew->closeCursor(); 
                      ?>
								</select>
            </br>

            <label for="exampleInputEmail1">MATRICULE</label>
                    <select name="mat" class="form-control" id="exampleInputPassword1">
                    <?php  
						   echo "<option value='".$mat."'>".$idnational." </option>";
						 
							 ?>
								</select></br>

                <div class="form-group">
                    <label for="exampleInputEmail1">ANNEE SCOLAIRE</label>
                    <select name="an" class="form-control" id="exampleInputPassword1">
                    <?php  
							 echo "<option value='".$an."'>".$an." </option>";
						 
							 ?>
								</select>
                  </div>

                                <label for="exampleInputPassword1">RESPONSABLE SCOLARITE</label>
                    <select name="nomeco" class="form-control" id="exampleInputPassword1">
								  <?php  
								  echo "<option value='".$_SESSION['id']."'>".$_SESSION['nom']." </option>";?>
								  
								  </select></br>

                                <div class="card-footer">
                                <?php 
if($delai>=date('Y.m.d')){
echo "<button type='submit' name='vermitteln' class='btn btn-primary' >Valider</button>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp 
                  <button type='reset' class='btn btn-danger'>Annuler</button>";
    }
    ?>
                </div>
              </form>
                  </div> 
                </div>
                <!-- /.card-body --> 
            </div>
            <!-- /.card -->  
        
                       
        
        
        </div>
          <!--/.col (left) -->







  <!-- right column -->
 <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Détails de ses paiements</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
              <TABLE cellspacing='3'> 
              <TR><TD>Date</TD><TD>-----Heure-----</TD><TD>Montant</TD></TR>
							      <?php 


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




function format($date){
    $a=substr($date,0,4);
     
    $m=substr($date,5,2);
     
    $j=substr($date,8,2);
     
    $dat=$j."/".$m."/".$a;
    return $dat;
  }
                    	
                       $frais=0;
                      $ve="SELECT *  FROM detail  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$_SESSION['annee']."' ORDER BY date DESC";

                     $reponse = $bdda->query($ve);

                     while ($donnees = $reponse->fetch()){  
                        $xd=format($donnees['date'] );   
                        $frais+=$donnees['frais'] ;                         
                             echo  "<TR><TD>". $xd."</TD><TD>-----".$donnees['heure']."----</TD><TD>".$donnees['montant']." FCFA</TD></TR>";
                       } 
                  $reponse->closeCursor(); 
                   ?>
            </TABLE> 
                     
            <?php

            $v=" SELECT *  FROM eleve  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$_SESSION['annee']."'";
   
   $reponse = $bdda->query($v);
   while ($donnees = $reponse->fetch())
   {
      $rrrest=$donnees['reste'] ; 
	  $rcout=$donnees['cout'] ; 
	   $statut=$donnees['statut'];
       $total=$donnees['total'] ; 
      
   } 
   $reponse->closeCursor(); 
   
   echo "Cout de la scolarité : ".$rcout." FCFA<br>Total scolarité déjà versé : ".$total." FCFA<br>Reste : ".$rrrest." FCFA <br>"; 
    echo "Statut : ".$statut."<br>";
    
    
    $v=" SELECT *  FROM exam  WHERE id_etab='0' AND matelev='".$mat."' AND anelev='".$_SESSION['annee']."'";
    $total1=0;
    $repons = $bdda->query($v);
    while ($donnees = $repons->fetch())
    {
       $total1+=$donnees['montant'] ; 
        
     
    } 
    $repons->closeCursor(); 
    echo " Examen : ".$total1." FCFA <br><br>";
    echo " Frais éxigibles : ".$frais." FCFA <br><br>";

 
$som=0;
    $reponse = $bdda->query("SELECT * FROM autrepayefrais WHERE matelev='".$mat."' AND anelev='".$_SESSION['annee']."' ");
    while ($donnees = $reponse->fetch()){                            
        
   echo   format($donnees['date'])." --- ".$donnees['heure']."---- 
    ".nommotif($donnees['frais'])."---  ".namemois($donnees['mois'])."  ---  
    ".$donnees['montant']." FCFA</br><br>  " ; 
    $som+=$donnees['montant'];
       } 
  $reponse->closeCursor(); 
  $global=$som+$total+$frais;
  echo "<br><br>TOTAL COMPLET VERSE: ".$global." FCFA<br>";
    ?>
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
        <?php    $true=1;
   }
  }
    $reponsex->closeCursor(); 
    }


}
?>