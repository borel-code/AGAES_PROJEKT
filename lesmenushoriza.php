<?php 
 set_time_limit(2000);
 echo " <meta charset='utf-8'>";
    function paiemhorizcoll(){
         echo "<ol class='breadcrumb float-sm-right'>
         &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='".versprimdoss()."/paiem.php'><input type='submit' value='Paiement primaire'></form>
            <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>
           </form>";
    }
    function paiemhorizpri(){
        echo "<ol class='breadcrumb float-sm-right'>
        &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='".verscolldoss()."/paiem.php'><input type='submit' value='Paiement Primaire et maternelle'></form>
           <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>
          </form>";
   }

   function paiem1horizcoll(){
    echo " &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='paiem.php'><input type='submit' value='Tableau paiement primaire'></form>
    &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='".versprimdoss()."/paiem.php'><input type='submit' value='Paiement secondaire'></form>
        <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>
       </form>";
}
function paiem1horizpri(){
    echo " &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='paiem.php'><input type='submit' value='Tableau paiement Primaire et Maternelle'></form>
    &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='".verscolldoss()."/paiem.php'><input type='submit' value='Paiement secondaire'></form>
        <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>
       </form>";
}

 
function examhorizpri(){
    echo "<ol class='breadcrumb float-sm-right'>
    &nbsp&nbsp&nbsp&nbsp  <li class='breadcrumb-item'><form action='exam.php'><input type='submit' value='Menu examen primaire'></form>
       
        &nbsp&nbsp&nbsp&nbsp   <li class='breadcrumb-item'><form action='".verscolldoss()."/exam.php'><input type='submit' value='Examen Primaire et maternelle'></form>
           <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>
          </form>";
}



function listouthorizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function listout1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listout1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listout.php'><input type='submit' value='choisir une année scolaire'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function listensgen1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listensgen1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listensgen.php'><input type='submit' value='choisir une année scolaire'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function listensgcom1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listensgcom1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listensgcom.php'><input type='submit' value='choisir une année scolaire'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function listensgind1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listensgind1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listensgind.php'><input type='submit' value='choisir une année scolaire'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function listanglo1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listanglo1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listanglo.php'><input type='submit' value='choisir une année scolaire'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function listclasse1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='listclasse1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 <option value='1'>Les garçons</option><option value='2'>Les filles</option>
     <option value='3'>Les anciens</option><option value='4'>Les nouveaux</option>
     <option value='5'>Les nouvelles filles</option><option value='6'>Les anciennes filles</option>
<option value='7'>Les nouveaux garçons</option><option value='8'>Les anciens garçons</option>
<option value='9'>Les statistiques</option><option value='10'>Tous les élèves</option>
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='listclasse.php'><input type='submit' value='choisir une autre classe'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function etatclass1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='etatclass1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Groupe 1' >
 <option value='1'>Inscription non achevée</option><option value='2'>1<sup>ère</sup> Tranche non achevée</option>
     <option value='3'>2<SUP>ème</SUP> Tranche non achevée</option>
     <option value='4'>3<SUP>ème</SUP> Tranche non achevée</option>
     <option value='5'>Scolarité non achevée</option>
     </optgroup ><optgroup label='Groupe 2' >
     <option value='6'>Inscription achevée</option><option value='7'>1<SUP>ère</SUP> Tranche achevée</option>
     <option value='8'>2<SUP>ème</SUP> Tranche achevée</option>
     <option value='9'>3<SUP>ème</SUP> Tranche achevée</option>
     <option value='10'>Scolarité achevée</option></optgroup >
     <optgroup label='Groupe 3' >
     <option value='12'>Afficher les remises éffectuées</option>
     <option value='13'>Afficher les frais divers reçus</option>
 <option value='11'>Afficher toute la classe</option></optgroup >
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='etatclass.php'><input type='submit' value='choisir une autre classe'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function etatexpay1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
 <li class='breadcrumb-item'><form action='etatexampay.php'><input type='submit' value='choisir une autre classe'></form>";
 echo "<ol class='breadcrumb float-sm-right'>";
 if($_SESSION['code']==4) { 
  echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
 }
 if($_SESSION['code']==3) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==2) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==1) { 
    echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==5) { 
    echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==6) { 
    echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
   }
  if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function etatexpayn1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
 <li class='breadcrumb-item'><form action='etatexampayn.php'><input type='submit' value='choisir une autre classe'></form>";
 echo "<ol class='breadcrumb float-sm-right'>";
 if($_SESSION['code']==4) { 
  echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
 }
 if($_SESSION['code']==3) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==2) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==1) { 
    echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==5) { 
    echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==6) { 
    echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
   }
  if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function infop1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
 <li class='breadcrumb-item'><form action='infop.php'><input type='submit' value='choisir une autre classe'></form>";
 echo "<ol class='breadcrumb float-sm-right'>";
 if($_SESSION['code']==4) { 
  echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
 }
 if($_SESSION['code']==3) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==2) { 
    echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==1) { 
    echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==5) { 
    echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
   }
   if($_SESSION['code']==6) { 
    echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
   }
  if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function infop2horizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='infop2.php'>
    <div class='select2-purple'>
    <select name='choix' class='select2' data-placeholder='Choisir un autre élève' data-dropdown-css-class='select2-purple' style='width: 100%;'>
    <option value=' '>Choisir un autre élève</option>";
    $ve="SELECT * FROM eleve WHERE anelev='".$an."'  AND id_etab='0' ORDER BY nomelev";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   

    
 
       $de=$donnees['nomelev'] ;
              $dee=$donnees['preelev'] ;
              $phras =$donnees['matelev'] ; 
              $pe="value=".$phras;
             echo "<option ".$pe." >".$de." ".$dee."</option>" ;
            } 
            $repons->closeCursor(); 
     
echo "</select></div><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='infop.php'><input type='submit' value='choisir une autre classe'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function bilrecj1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecj1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises du jour</option>
 <option value='2'>Mes examens du jour</option>
     <option value='3'>Mes frais divers éxigibles du jour</option>
     <option value='5'>Uniformes,arbre de noel ... </option>
     <option value='4'>Mon bilan du jour</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecj.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function bilrecj1adhorizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecj1ad.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Bilan du jour'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='4-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='1-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='3-t'>Tout le personnel</option>
</optgroup>


  
  
    
      
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecjad.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}






function bilrecjtype1adhorizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecjtype1ad.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Bilan du jour'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='4-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='1-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='3-t'>Tout le personnel</option>
</optgroup>


  
  
    
      
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecjad.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}





function bilrecperio1adhorizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecperio1ad.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Bilan sur cette periode'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='4-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='1-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='3-t'>Tout le personnel</option>
</optgroup>


  
  
    
      
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecj1ad.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}





function bilrecjtype1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecjtype1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises du jour</option>
 <option value='2'>Mes examens du jour</option>
     <option value='3'>Mes frais divers du jour</option>
     <option value='4'>Mon bilan du jour</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecj.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function bilrecperio1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecperio1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises sur cette période</option>
 <option value='2'>Mes examens sur cette période</option>
     <option value='3'>Mes frais divers sur cette période</option>
     <option value='4'>Mon bilan sur cette période</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecperio.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function bilrecperiotype1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='bilrecperiotype1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises sur cette période</option>
 <option value='2'>Mes examens sur cette période</option>
     <option value='3'>Mes frais divers sur cette période</option>
     <option value='4'>Mon bilan sur cette période</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='bilrecperio.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function birecan1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='birecan1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises sur cette année</option>
 <option value='2'>Mes examens sur cette année</option>
     <option value='3'>Mes frais divers sur cette année</option>
     <option value='4'>Mon bilan sur cette année</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='birecan.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function birecan1adhorizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='birecan1ad.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Bilan annuel'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='4-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='1-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='3-t'>Tout le personnel</option>
</optgroup>


  
  
    
      
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='birecanad.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function birecan1typeadhorizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='birecantype1ad.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier</option>    
<optgroup label='Bilan annuel'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='4-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='4-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les remises'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='1-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='1-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les examens'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='2-t'>Tout le personnel</option>
</optgroup>
<optgroup label='Uniquement les frais divers'>";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND id_etab='0' AND sup='0'  ORDER BY code";
$reponse = $bdda->query($ve);
     $n=0; 
     while ($donnees = $reponse->fetch())
     {
        if($donnees['code']==1 OR $donnees['code']==4){ 
       $i=$n+1;  
       $nname=$donnees['nom'];
       $genre=$donnees['genre'];
       if($genre=='M'){
        $nname="M . ".$nname;
       }
       if($genre=='F'){
        $nname="Mme ".$nname;
       }
       echo "<option value='2-".$donnees['id']."'>".$nname."</option>";
    }
    } 
    $reponse->closeCursor();  

echo "<option value='3-t'>Tout le personnel</option>
</optgroup>


  
  
    
      
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='birecanad.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}







function birecantype1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='birecantype1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
    
<option value=' '>Trier</option>    
 
 <option value='1'>Mes remises sur cette année</option>
 <option value='2'>Mes examens sur cette année</option>
     <option value='3'>Mes frais divers sur cette année</option>
     <option value='4'>Mon bilan sur cette année</option>
      
</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='birecan.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}






















function sortjour1horizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='sortjour1.php'>
    <select name='choix' class='form-control' id='exampleInputPassword1'>
    <option value=' '>Trier ...</option><optgroup label='FONDATEURS' >";
    $ve="SELECT * FROM admini WHERE  code='1' AND id_etab='0' ORDER BY nom";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   
             $de=$donnees['nom'] ;
              $phras =$donnees['id'] ; 
              $pe="value=".$phras;
             echo "<option ".$pe." >".$de."</option>" ;
            } 
            $repons->closeCursor(); 
     
echo "</optgroup >"; 

echo"<optgroup label='ECONOMES' >";
$ve="SELECT * FROM admini WHERE anens='".$an."' AND code='4' AND id_etab='0' ORDER BY nom";
$repons = $bdda->query($ve);
while ($donnees = $repons->fetch())
{   
         $de=$donnees['nom'] ;
          $phras =$donnees['id'] ; 
          $pe="value=".$phras;
         echo "<option ".$pe." >".$de."</option>" ;
        } 
        $repons->closeCursor(); 
 
echo "</optgroup >"; 

echo"</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='sortjour.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function sortperiod1horizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='sortperiod1.php'>
    <select name='choix' class='form-control' id='exampleInputPassword1'>
    <option value=' '>Trier ...</option><optgroup label='FONDATEURS' >";
    $ve="SELECT * FROM admini WHERE  code='1' AND id_etab='0' ORDER BY nom";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   
             $de=$donnees['nom'] ;
              $phras =$donnees['id'] ; 
              $pe="value=".$phras;
             echo "<option ".$pe." >".$de."</option>" ;
            } 
            $repons->closeCursor(); 
     
echo "</optgroup >"; 

echo"<optgroup label='ECONOMES' >";
$ve="SELECT * FROM admini WHERE anens='".$an."' AND code='4' AND id_etab='0' ORDER BY nom";
$repons = $bdda->query($ve);
while ($donnees = $repons->fetch())
{   
         $de=$donnees['nom'] ;
          $phras =$donnees['id'] ; 
          $pe="value=".$phras;
         echo "<option ".$pe." >".$de."</option>" ;
        } 
        $repons->closeCursor(); 
 
echo "</optgroup >"; 

echo"</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='sortperiod.php'><input type='submit' value='choisir une autre date'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function sortan1horizcoll($an){

    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form method='POST' action='sortan1.php'>
    <select name='choix' class='form-control' id='exampleInputPassword1'>
    <option value=' '>Trier ...</option><optgroup label='FONDATEURS' >";
    $ve="SELECT * FROM admini WHERE   code='1' AND id_etab='0' ORDER BY nom";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   
             $de=$donnees['nom'] ;
              $phras =$donnees['id'] ; 
              $pe="value=".$phras;
             echo "<option ".$pe." >".$de."</option>" ;
            } 
            $repons->closeCursor(); 
     
echo "</optgroup >"; 

echo"<optgroup label='ECONOMES' >";
$ve="SELECT * FROM admini WHERE  anens='".$an."' AND code='4' AND id_etab='0' ORDER BY nom";
$repons = $bdda->query($ve);
while ($donnees = $repons->fetch())
{   
         $de=$donnees['nom'] ;
          $phras =$donnees['id'] ; 
          $pe="value=".$phras;
         echo "<option ".$pe." >".$de."</option>" ;
        } 
        $repons->closeCursor(); 
 
echo "</optgroup >"; 

echo"</select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
     </form>
<li class='breadcrumb-item'><form action='sortan.php'><input type='submit' value='choisir une autre année'></form>";
echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function nomens($cni,$an){
 

     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
     $reponse = $bdda->query($v);
       $t=0; $nom=" ";
      while ($donnees = $reponse->fetch())
      {
        
          if($donnees['cni']==$cni ){ 
            $genr=$donnees['genre'];
   
         if($genr=='M') {
            $nom='M. '.$donnees['nomens'].'  '.$donnees['prenomens']  ;
                }
                  else {
            $nom='Mme '.$donnees['nomens'].' '.$donnees['prenomens'] ;
                } 
           }
       }
      $reponse->closeCursor();
      return $nom;
    } 

    function nomensohnejahr($cni){
 

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch())
          {
            
              
                $genr=$donnees['genre'];
       
             if($genr=='M') {
                $nom='M. '.$donnees['nomens'].'  '.$donnees['prenomens']  ;
                    }
                      else {
                $nom='Mme '.$donnees['nomens'].' '.$donnees['prenomens'] ;
                    } 
               }
           
          $reponse->closeCursor();
          return $nom;
        } 

    function nomensuniq($cni,$an){
 

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() AND $t==0)
          {
            
              if($donnees['cni']==$cni ){ 
                 $nom= $donnees['nomens'];
                 $t=1;
               }
           }
          $reponse->closeCursor();
          return $nom;
        } 

        function prenomensuniq($cni,$an){
 

             $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
             $reponse = $bdda->query($v);
               $t=0; $nom=" ";
              while ($donnees = $reponse->fetch() AND $t==0)
              {
                
                  if($donnees['cni']==$cni ){ 
                     $nom= $donnees['prenomens'];
                     $t=1;
                   }
               }
              $reponse->closeCursor();
              return $nom;
            } 

            function datensuniq($cni,$an){
 

                 $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                 $reponse = $bdda->query($v);
                   $t=0; $nom=" ";
                  while ($donnees = $reponse->fetch() AND $t==0)
                  {
                    
                      if($donnees['cni']==$cni ){ 
                         $nom= $donnees['datens'];
                         $t=1;
                       }
                   }
                  $reponse->closeCursor();
                  return $nom;
                } 

                function telensuniq($cni,$an){
 

                     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                     $reponse = $bdda->query($v);
                       $t=0; $nom=" ";
                      while ($donnees = $reponse->fetch() AND $t==0)
                      {
                        
                          if($donnees['cni']==$cni ){ 
                             $nom= $donnees['telens'];
                             $t=1;
                           }
                       }
                      $reponse->closeCursor();
                      return $nom;
                    } 

                    function cniensuniq($cni,$an){
 

                         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                         $reponse = $bdda->query($v);
                           $t=0; $nom=" ";
                          while ($donnees = $reponse->fetch() AND $t==0)
                          {
                            
                              if($donnees['cni']==$cni ){ 
                                 $nom= $donnees['cni'];
                                 $t=1;
                               }
                           }
                          $reponse->closeCursor();
                          return $nom;
                        } 

                        function salaireensuniq($cni,$an){
 

                             $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                             $reponse = $bdda->query($v);
                               $t=0; $nom=" ";
                              while ($donnees = $reponse->fetch() AND $t==0)
                              {
                                
                                  if($donnees['cni']==$cni ){ 
                                     $nom= $donnees['salaire'];
                                     $t=1;
                                   }
                               }
                              $reponse->closeCursor();
                              return $nom;
                            } 


                            function tauxensuniq($cni,$an){
 

                                 $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                                 $reponse = $bdda->query($v);
                                   $t=0; $nom=" ";
                                  while ($donnees = $reponse->fetch() AND $t==0)
                                  {
                                    
                                      if($donnees['cni']==$cni ){ 
                                         $nom= $donnees['taux'];
                                         $t=1;
                                       }
                                   }
                                  $reponse->closeCursor();
                                  return $nom;
                                } 



                                function mtpasseensuniq($cni,$an){
 

                                     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                                     $reponse = $bdda->query($v);
                                       $t=0; $nom=" ";
                                      while ($donnees = $reponse->fetch() AND $t==0)
                                      {
                                        
                                          if($donnees['cni']==$cni ){ 
                                             $nom= $donnees['mtpasse'];
                                             $t=1;
                                           }
                                       }
                                      $reponse->closeCursor();
                                      return $nom;
                                    } 

    // *******************  DEB ajoutensa1 

    function nomensuniqohnejahr($cni){
 

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch())
          {
             $nom= $donnees['nomens'];
                 $t=1;
 
           }
          $reponse->closeCursor();
          return $nom;
        } 



        function nomadmin($cni){
 

             $v="SELECT *  FROM admini WHERE id_etab='0' AND cni='".$cni."' ";
             $reponse = $bdda->query($v);
               $t=0; $nom=" ";
              while ($donnees = $reponse->fetch() AND $t==0)
              {
                 $nom= $donnees['nom'];
                     $t=1;
     
               }
              $reponse->closeCursor();
              return $nom;
            } 
       


            function  verifadminan($cni,$an){
 

                 $v="SELECT *  FROM admini WHERE id_etab='0' AND   anens='".$an."'";
                 $reponse = $bdda->query($v);
                   $t=0; $nom=" ";
                  while ($donnees = $reponse->fetch() AND $t==0)
                  {
                     $cn= $donnees['cni'];
                     if($cn=$cni){
                         $t=1;
                        }
                   }
                  $reponse->closeCursor();
                  return $t;
                } 


       
        function prenomensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch())
          {
             $nom= $donnees['prenomens'];
                 $t=1;
              
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
        function datensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() )
          {
             
                 $nom= $donnees['datens'];
                 $t=1; 
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
        function sexensuniqohnejahr($cni){
        

             $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
             $reponse = $bdda->query($v);
               $t=0; $nom=" ";
              while ($donnees = $reponse->fetch() )
              {
                 
                     $nom= $donnees['genre'];
                     $t=1; 
               }
              $reponse->closeCursor();
              return $nom;
            } 
           

        function telensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() )
          {
              $nom= $donnees['telens'];
                 $t=1; 
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
        function cniensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() )
          { 
                 $nom= $donnees['cni'];
                 $t=1; 
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
        function salaireensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() )
          {
             $nom= $donnees['salaire'];
               
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
       
        function tauxensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch())
          {
              $nom= $donnees['taux'];
                 $t=1;
               
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
        function mtpasseensuniqohnejahr($cni){
        

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() )
          {
              $nom= $donnees['mtpasse'];
               
           }
          $reponse->closeCursor();
          return $nom;
        } 
       
       

    
    //*****************FIN ajoutensa1 

                                    function namematier($inicode){
 

                                         $v="SELECT *  FROM matiere WHERE code= '".$inicode."'";
                                         $reponse = $bdda->query($v);
                                            
                                          while ($donnees = $reponse->fetch())
                                          {
                                             return $donnees['codemat'];
                                           }
                                          $reponse->closeCursor();
                                        } 
                                           
                                        
                                        function sexensuniq($cni,$an){
 

                                             $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                                             $reponse = $bdda->query($v);
                                               $t=0; $nom=" ";
                                              while ($donnees = $reponse->fetch() AND $t==0)
                                              {
                                                
                                                  if($donnees['cni']==$cni ){ 
                                                     $nom= $donnees['genre'];
                                                     $t=1;
                                                   }
                                               }
                                              $reponse->closeCursor();
                                              return $nom;
                                            } 


                                            function rechcnimat($clas,$an,$cni){
 

                                                 $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' AND cni='".$cni."' ";
                                                 $reponse = $bdda->query($v);
                                                   $t=0; $nom=" ";
                                                  while ($donnees = $reponse->fetch() AND $t==0)
                                                  {
                                                    
                                                      if($donnees['nivens']==$clas ){ 
                                                          
                                                         $t=1;
                                                       }
                                                   }
                                                  $reponse->closeCursor();
                                                  return $t;
                                                } 
            

                                                function verifenregens($disc,$clas,$an){
 

                                                     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND anens='".$an."' ";
                                                     $reponse = $bdda->query($v);
                                                       $t=0; $nom=" ";
                                                      while ($donnees = $reponse->fetch() AND $t==0)
                                                      {
                                                        
                                                          if($donnees['discipline']==$disc AND  $donnees['nivens']==$clas){ 
                                                            
                                                             $t=1;
                                                           }
                                                       }
                                                      $reponse->closeCursor();
                                                      return $t;
                                                    } 
                
                                          


function ajoutensn1horizcoll($x){

    echo "<ol class='breadcrumb float-sm-right'>";
    echo "<li class='breadcrumb-item'><form method='post' action='ajoutensn1.php'>
    <div class='select2-purple'> 
<select name='choix' class='select2'   data-placeholder='Choisir l'enseignant(e)' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($_SESSION['newensg']!=" "){
 
echo " <option value=' '>NOUVEAU ENSEIGNANT</option>";
}
else{
    echo " <option value=' '>NOUVEAU ENSEIGNANT</option>";
}
    
   
    $ve="SELECT DISTINCT cni FROM enseignant WHERE  discipline!=' ' AND supp='0' AND id_etab='0' ORDER BY nomens";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   
         
        if($donnees['cni']!=$_SESSION['newensg']){ 
             
             $de=nomensuniqohnejahr($donnees['cni'])." ".prenomensuniqohnejahr($donnees['cni']);
              $phras =$donnees['cni'] ; 
              $pe="value=".$phras;
             echo "<option ".$pe." >".$de."</option>" ;
            } 
        } 
            $repons->closeCursor(); 
     
echo "</select> </br>"; 
     echo"  <button type='submit' name='send1' value='1' class='btn btn-primary'>OK</button>  
     </br></br>  </form>";  
    
    
    if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
             
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function enregadhorizcoll($x){

    echo "<ol class='breadcrumb float-sm-right'>";
    echo "<li class='breadcrumb-item'><form method='post' action='enregad.php'>
    <div class='select2-purple'> 
<select name='choix' class='select2'   data-placeholder='Vous pouvez choisir ici' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
if($_SESSION['newadm']!=" "){
 
echo " <option value=' '>NOUVEAU MEMBRE</option>";
}
else{
    echo " <option value=' '>NOUVEAU MEMBRE</option>";
}
    
   
    $ve="SELECT DISTINCT cni FROM admini WHERE   sup='0' AND id_etab='0'
     AND intrus='0' ORDER BY nom";
    $repons = $bdda->query($ve);
    while ($donnees = $repons->fetch())
    {   
         
        if($donnees['cni']!=$_SESSION['newadm']){ 
             
             $de=nomadmin($donnees['cni']) ;
              $phras =$donnees['cni'] ; 
              $pe="value=".$phras;
              $verifadminan=verifadminan($de,$x);
              if($verifadminan==1){ 
             echo "<option ".$pe." >".$de."&nbsp&nbsp&nbsp&nbsp( OK )</option>" ;
              }
             else{ 
                echo "<option ".$pe." >".$de."</option>" ;
                 }
            } 
        } 
            $repons->closeCursor(); 
     
echo "</select> </br>"; 
     echo"  <button type='submit' name='send1' value='1' class='btn btn-primary'>OK</button>  
     </br></br>  </form>";  
    
    
    if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
             
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}




function ensgtitul($ans,$cls){

    $true=0; $namz=" ";
    $v="SELECT * FROM  enseignant WHERE anens='".$ans."' AND nivens='".$cls."' AND supp='0'";
    $reponse = $bdda->query($v);
    while ($donnees = $reponse->fetch() AND $true==0){      
         if($donnees['titulaire']==1){
            $genr=$donnees['genre'];
              if($genr=='M') {
                $namz= "&nbsp &nbsp &nbsp &nbsp &nbsp M .".$donnees['nomens']." ".$donnees['prenomens'];
            }
            if($genr=='F') {
                $namz= "&nbsp &nbsp &nbsp &nbsp &nbsp Mme  ".$donnees['nomens']." ".$donnees['prenomens'];
               }
            $true=1;
         }
    }
    return  $namz;
}

function ajoutenstitul1(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='ajoutenstitul.php'><input type='submit' value='Choisir une autre classe'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function modifens1(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='modifens.php'><input type='submit' value='Choisir une autre année'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function modifens2(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='modifens1.php' method='POST'><input type='submit' value='Modifier un(e) autre enseignant(e)'></form>";
    echo" <li class='breadcrumb-item'><form action='modifens.php' method='POST'><input type='submit' value='Choisir une autre année'></form>";    
    if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}

function enlevens1(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='enlevens.php'><input type='submit' value='Choisir une autre année'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function enlevens2(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='enlevens1.php' method='POST'><input type='submit' value='Choisir un(e) autre enseignant(e)'></form>";
    echo" <li class='breadcrumb-item'><form action='enlevens.php' method='POST'><input type='submit' value='Choisir une autre année'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


    function nomensmitjahr($cni,$an){
 

         $v="SELECT *  FROM enseignant WHERE id_etab='0' AND supp='0' AND cni='".$cni."' AND anens='".$an."' ";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";
          while ($donnees = $reponse->fetch() AND $t==0)
          {
            
              if($donnees['cni']==$cni){
                $genr=$donnees['genre'];
       
             if($genr=='M') {
                $nom='M. '.$donnees['nomens'].'  '.$donnees['prenomens']  ;
                    }
                      else {
                $nom='Mme '.$donnees['nomens'].' '.$donnees['prenomens'] ;
                    } 
               }$t=1;
            }
          $reponse->closeCursor();
          return $nom;
        } 


        
function nbreligneensg($cni,$an){
        

     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND anens='".$an."' AND supp='0'";
     $reponse = $bdda->query($v);
       $t=0; $nom=" ";
      while ($donnees = $reponse->fetch() )
      {
        if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
         
             $nom= $donnees['genre'];
             $t++; 
            }
       }
      $reponse->closeCursor();
      return $t;
    } 



    function matclassensg($cni,$an){
        


        $tabId=array(); $tabMat=array(); $tabclas=array();
         $v="SELECT DISTINCT discipline FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND anens='".$an."' AND supp='0'";
         $reponse = $bdda->query($v);
           $t=0; $nom=" ";$i=0;$tab=array(); 
          while ($donnees = $reponse->fetch() )
          {
            if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
             
                 $tab[$i]=$donnees['discipline'] ;
                 
                 $t++; $i++; 
                }
           }
          $reponse->closeCursor();
          $debpar="("; $finpar=")";$matclas=" ";
            for($j=0;$j<count($tab);$j++){
                $mat=$tab[$j];
                $mat1=matparid($mat,$an)." ".$debpar; $mat1virgul=$mat1;
                 //DEB
                 $v="SELECT nivens FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND discipline='".$mat."' AND anens='".$an."' AND supp='0'";
                 $reponse = $bdda->query($v);
                 while ($donnees = $reponse->fetch() )
                 {
                     if($mat1virgul==$mat1){ 
                       $virg=" ";
                       $mat1=$mat1.$virg."&nbsp".classparid($donnees['nivens'],$an);
                     }
                     else{
                        $virg=","; 
                        $mat1=$mat1."&nbsp".$virg."&nbsp".classparid($donnees['nivens'],$an);
                     }
                    
                }
                $reponse->closeCursor();
                $mat1=$mat1.$finpar."<Br><Br>";
                 //FIN
               $matclas=$matclas.$mat1;
            }return $matclas;
        } 
    



        function enstout1horizcoll(){
            echo "<ol class='breadcrumb float-sm-right'>
            <li class='breadcrumb-item'><form method='POST' action='enstout1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
        <option value=' '>Trier</option>    
        <optgroup label='ENSEIGNEMENT GENERAL' >
         <option value='1'>Noms,prénoms, matière(s) et classe(s) </option>
         <option value='2'>Noms et prénoms</option>
             <option value='3'>Les informations personnels</option> </optgroup >
             <optgroup label='ENSEIGNEMENT COMMERCIAL' >
         <option value='4'>Noms,prénoms, matière(s) et classe(s) </option>
         <option value='5'>Noms et prénoms</option>
             <option value='6'>Les informations personnels</option> </optgroup >
             <optgroup label='ENSEIGNEMENT INDUSTRIEL' >
             <option value='7'>Noms,prénoms, matière(s) et classe(s) </option>
             <option value='8'>Noms et prénoms</option>
                 <option value='9'>Les informations personnels</option> </optgroup >
                 <optgroup label='ENSEIGNEMENT ANGLOPHONE' >
                 <option value='10'>Noms,prénoms, matière(s) et classe(s) </option>
                 <option value='11'>Noms et prénoms</option>
                     <option value='12'>Les informations personnels</option> </optgroup >
                     <optgroup label='TOUS LES ENSEIGNEMENTS' >
                     <option value='13'>Noms,prénoms, matière(s) et classe(s) </option>
                     <option value='14'>Noms et prénoms</option>
                         <option value='15'>Les informations personnels</option> </optgroup >
        </select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
             </form>
        <li class='breadcrumb-item'><form action='enstout.php'><input type='submit' value='choisir une autre année'></form>";
        echo "<ol class='breadcrumb float-sm-right'>";
        if($_SESSION['code']==4) { 
         echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
        }
        if($_SESSION['code']==3) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==2) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==1) { 
           echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==5) { 
           echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==6) { 
           echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
          }
         if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
        }
        



        function affichad1horizcoll(){
            echo "<ol class='breadcrumb float-sm-right'>
            <li class='breadcrumb-item'><form method='POST' action='affichad1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
            
    
         <option value='1'>Liste sans tous les détails </option>
         <option value='2'>Liste avec tous les détails</option>
             
        </select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
             </form>
        <li class='breadcrumb-item'><form action='affichad.php'><input type='submit' value='choisir une autre année'></form>";
        echo "<ol class='breadcrumb float-sm-right'>";
        if($_SESSION['code']==4) { 
         echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
        }
        if($_SESSION['code']==3) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==2) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==1) { 
           echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==5) { 
           echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==6) { 
           echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
          }
         if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
        }





        function testypensg($cni,$an,$type){
        

             $v="SELECT *  FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND anens='".$an."' AND supp='0'";
             $reponse = $bdda->query($v);
               $t=0;  
              while ($donnees = $reponse->fetch() AND $t==0)
              {
                if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
                 
                     if(TYPENS($donnees['nivens'],$an)==$type){ 
                     $t=1; 
                    }
                    }
               }
              $reponse->closeCursor();
              return $t;
            } 
        

            function matclassensg1($cni,$an,$typecl,$typemat1){
        

        
                $tabId=array(); $tabMat=array(); $tabclas=array();
                 $v="SELECT DISTINCT discipline FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND anens='".$an."' AND supp='0'";
                 $reponse = $bdda->query($v);
                   $t=0; $nom=" ";$i=0;$tab=array(); 
                  while ($donnees = $reponse->fetch() )
                  {
                    if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
                     
                         $tab[$i]=$donnees['discipline'] ;
                         
                         $t++; $i++; 
                        }
                   }
                  $reponse->closeCursor();
                  $debpar="("; $finpar=")";$matclas=" ";
                    for($j=0;$j<count($tab);$j++){

                        if(strpos(TYPMATENS($tab[$j],$an),$typemat1)>=0){ 
                        $mat=$tab[$j];
                        $mat1=matparid($mat,$an)." ".$debpar; $mat1virgul=$mat1;
                         //DEB
                         $v="SELECT nivens FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND discipline='".$mat."' AND anens='".$an."' AND supp='0'";
                         $reponse = $bdda->query($v);
                         while ($donnees = $reponse->fetch() )
                         {
                             if(TYPENS($donnees['nivens'],$an)==$typecl){ 
                             if($mat1virgul==$mat1){ 
                               $virg=" ";
                               $mat1=$mat1.$virg."&nbsp".classparid($donnees['nivens'],$an);
                             }
                             else{
                                $virg=","; 
                                $mat1=$mat1."&nbsp".$virg."&nbsp".classparid($donnees['nivens'],$an);
                             }
                             }
                        }
                        $reponse->closeCursor();
                        $mat1=$mat1.$finpar."<Br><Br>";
                         //FIN
                       $matclas=$matclas.$mat1;
                    }}return $matclas;
                } 


                
        function ensclasse1horizcoll(){
            echo "<ol class='breadcrumb float-sm-right'>
            <li class='breadcrumb-item'><form method='POST' action='ensclasse1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
        <option value=' '>Trier</option>    
     
         <option value='1'>Noms,prénoms, matière(s) et classe(s) </option>
         <option value='2'>Noms et prénoms</option>
             <option value='3'>Les informations personnels</option> </optgroup >
             
        </select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
             </form>
        <li class='breadcrumb-item'><form action='ensclasse.php'><input type='submit' value='choisir une autre classe'></form>";
        echo "<ol class='breadcrumb float-sm-right'>";
        if($_SESSION['code']==4) { 
         echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
        }
        if($_SESSION['code']==3) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==2) { 
           echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==1) { 
           echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==5) { 
           echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
          }
          if($_SESSION['code']==6) { 
           echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
          }
         if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
        }


        function matclassensgclasse($cni,$an,$clas){
        

    
            $tabId=array(); $tabMat=array(); $tabclas=array();
             $v="SELECT DISTINCT discipline FROM enseignant WHERE id_etab='0' AND cni='".$cni."'   AND nivens='".$clas."' AND anens='".$an."' AND supp='0'";
             $reponse = $bdda->query($v);
               $t=0; $mat1=" ";  
              while ($donnees = $reponse->fetch() )
              {
                if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
                 
                     $mtier=matparid($donnees['discipline'],$an) ;
                     if($t==0){ 
                        $virg=" ";
                        $mat1=$mat1.$virg."&nbsp".$mtier;
                      }
                      else{
                         $virg=","; 
                         $mat1=$mat1."&nbsp".$virg."&nbsp".$mtier;
                      }
                      
                    }$t++;
               }
              $reponse->closeCursor();
             return $mat1;
            } 
        
            function ensclasmat1(){
                echo "<ol class='breadcrumb float-sm-right'>";
                echo" <li class='breadcrumb-item'><form action='modifens.php'><input type='submit' value='Choisir une autre année'></form>";
                     if($_SESSION['code']==4) { 
                      echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
                     }
                     if($_SESSION['code']==3) { 
                        echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==2) { 
                        echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==1) { 
                        echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==5) { 
                        echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==6) { 
                        echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
                       }
                      if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
            }



            function enclasmat2(){
                echo "<ol class='breadcrumb float-sm-right'>";
                echo" <li class='breadcrumb-item'><form action='ensclasmat1.php' method='POST'><input type='submit' name='sen' value='Choisir un(e) autre enseignant(e)'></form>";
                echo" <li class='breadcrumb-item'><form action='ensclasmat.php' method='POST'><input type='submit' value='Choisir une autre année'></form>";
                     if($_SESSION['code']==4) { 
                      echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
                     }
                     if($_SESSION['code']==3) { 
                        echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==2) { 
                        echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==1) { 
                        echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==5) { 
                        echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
                       }
                       if($_SESSION['code']==6) { 
                        echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
                       }
                      if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
            }



            

            function ensafftitul1horizcoll(){
                echo "<ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><form method='POST' action='ensafftitul1.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
            <option value=' '>Trier</option>    
            <optgroup label='ENSEIGNEMENT GENERAL' >
             <option value='1'>Noms,prénoms, matière(s) et classe(s) </option>
             <option value='2'>Noms et prénoms</option>
                 <option value='3'>Les informations personnels</option> </optgroup >
                 <optgroup label='ENSEIGNEMENT COMMERCIAL' >
             <option value='4'>Noms,prénoms, matière(s) et classe(s) </option>
             <option value='5'>Noms et prénoms</option>
                 <option value='6'>Les informations personnels</option> </optgroup >
                 <optgroup label='ENSEIGNEMENT INDUSTRIEL' >
                 <option value='7'>Noms,prénoms, matière(s) et classe(s) </option>
                 <option value='8'>Noms et prénoms</option>
                     <option value='9'>Les informations personnels</option> </optgroup >
                     <optgroup label='ENSEIGNEMENT ANGLOPHONE' >
                     <option value='10'>Noms,prénoms, matière(s) et classe(s) </option>
                     <option value='11'>Noms et prénoms</option>
                         <option value='12'>Les informations personnels</option> </optgroup >
                         <optgroup label='TOUS LES ENSEIGNEMENTS' >
                         <option value='13'>Noms,prénoms, matière(s) et classe(s) </option>
                         <option value='14'>Noms et prénoms</option>
                             <option value='15'>Les informations personnels</option> </optgroup >
            </select><button type='submit' class='btn btn-primary' name='send1'>OK</button>
                 </form>
            <li class='breadcrumb-item'><form action='ensafftitul.php'><input type='submit' value='choisir une autre année'></form>";
            echo "<ol class='breadcrumb float-sm-right'>";
            if($_SESSION['code']==4) { 
             echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
            }
            if($_SESSION['code']==3) { 
               echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==2) { 
               echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==1) { 
               echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==5) { 
               echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==6) { 
               echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
              }
             if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
            }
            



            function ensdept1horizcoll(){
                echo "<ol class='breadcrumb float-sm-right'>
                
            <li class='breadcrumb-item'><form action='ensdpt.php'><input type='submit' value='faire un autre choix'></form>";
           
            if($_SESSION['code']==4) { 
             echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
            }
            if($_SESSION['code']==3) { 
               echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==2) { 
               echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==1) { 
               echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==5) { 
               echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
              }
              if($_SESSION['code']==6) { 
               echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
              }
             if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
            }

 


                function  cniclastitul($clas,$an ){
        

                     $v="SELECT *  FROM enseignant WHERE id_etab='0' AND nivens='".$clas."' AND anens='".$an."' AND supp='0' ";
                     $reponse = $bdda->query($v);
                       $t=0; $cni=" ";
                      while ($donnees = $reponse->fetch() AND $t==0)
                      {
                        if($donnees['discipline']!=" " AND !empty($donnees['discipline']) AND $donnees['titulaire']==1){ 
                            $cni=$donnees['cni']; 
                                $t=1; 
                               
                            }
                       }
                      $reponse->closeCursor();
                      return $cni;
                    } 

              function rechvaltab($tab,$val){
                $i=0;
                $true=0;  
                while($i<count($tab) AND $true==0){
                    if($tab[$i]==$val){
                        $true=1;
                    }
                    $i++;
                }
                return $true;
            }

            function matclassensgdept($list,$cni,$an){
        

        
                $tabId=array(); $tabMat=array(); $tabclas=array();
                 $v="SELECT DISTINCT discipline FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND anens='".$an."' AND supp='0'";
                 $reponse = $bdda->query($v);
                   $t=0; $nom=" ";$i=0;$tab=array(); 
                  while ($donnees = $reponse->fetch() )
                  {
                    if($donnees['discipline']!=" " AND !empty($donnees['discipline'])){ 
                         $disc=$donnees['discipline'] ;
                         if(rechvaltab($list,$disc)==1){ 
                         $tab[$i]=$donnees['discipline'] ;
                         $i++; 
                         }
                         $t++; 
                        }
                   }
                  $reponse->closeCursor();
                  $debpar="("; $finpar=")";$matclas=" ";
                    for($j=0;$j<count($tab);$j++){
                        $mat=$tab[$j];
                        $mat1=matparid($mat,$an)." ".$debpar; $mat1virgul=$mat1;
                         //DEB
                         $v="SELECT nivens FROM enseignant WHERE id_etab='0' AND cni='".$cni."' AND discipline='".$mat."' AND anens='".$an."' AND supp='0'";
                         $reponse = $bdda->query($v);
                         while ($donnees = $reponse->fetch() )
                         {
                             if($mat1virgul==$mat1){ 
                               $virg=" ";
                               $mat1=$mat1.$virg."&nbsp".classparid($donnees['nivens'],$an);
                             }
                             else{
                                $virg=","; 
                                $mat1=$mat1."&nbsp".$virg."&nbsp".classparid($donnees['nivens'],$an);
                             }
                            
                        }
                        $reponse->closeCursor();
                        $mat1=$mat1.$finpar."<Br><Br>";
                         //FIN
                       $matclas=$matclas.$mat1;
                    }return $matclas;
                } 


                function absedit2horizcoll(){
                    echo "<ol class='breadcrumb float-sm-right'>
                    
                <li class='breadcrumb-item'><form action='absedit.php'><input type='submit' value='faire un autre choix'></form>";
               
                if($_SESSION['code']==4) { 
                 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
                }
                if($_SESSION['code']==3) { 
                   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==2) { 
                   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==1) { 
                   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==5) { 
                   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==6) { 
                   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
                  } 
                 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
                }


                function retardedit2horizcoll(){
                    echo "<ol class='breadcrumb float-sm-right'>
                    
                <li class='breadcrumb-item'><form action='retardedit.php'><input type='submit' value='faire un autre choix'></form>";
               
                if($_SESSION['code']==4) { 
                 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
                }
                if($_SESSION['code']==3) { 
                   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==2) { 
                   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==1) { 
                   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==5) { 
                   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
                  }
                  if($_SESSION['code']==6) { 
                   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
                  } 
                 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
                }
           
                
          //NEU      
                function  classparid($id,$an){
        

                     $v="SELECT *  FROM classe  ";
                     $reponse = $bdda->query($v);
                       $t=0; $cni=" ";
                      while ($donnees = $reponse->fetch() AND $t==0)
                      {
                        if($donnees['id']==$id){ 
                            $cni=$donnees['code']; 
                                $t=1; 
                               
                            }
                       }
                      $reponse->closeCursor();
                      return $cni;
                    } 

                    function  idparclass($clas,$an){
        

                         $v="SELECT *  FROM classe ";
                         $reponse = $bdda->query($v);
                           $t=0; $cni=" ";
                          while ($donnees = $reponse->fetch() AND $t==0)
                          {
                            if($donnees['code']==$clas){ 
                                $cni=$donnees['id']; 
                                    $t=1; 
                                   
                                }
                           }
                          $reponse->closeCursor();
                          return $cni;
                        } 


                        function  matparid($id,$an){
        

                             $v="SELECT *  FROM matiere  ";
                             $reponse = $bdda->query($v);
                               $t=0; $cni=" ";
                              while ($donnees = $reponse->fetch() AND $t==0)
                              {
                                if($donnees['id']==$id){ 
                                    $cni=$donnees['codemat']; 
                                        $t=1; 
                                       
                                    }
                               }
                              $reponse->closeCursor();
                              return $cni;
                            } 


                            function  nomgroupetype($id){
        

                                 $v="SELECT *  FROM groupetype";
                                 $reponse = $bdda->query($v);
                                   $t=0; $cni=" ";
                                  while ($donnees = $reponse->fetch() AND $t==0)
                                  {
                                    if($donnees['code']==$id){ 
                                        $cni=$donnees['nom']; 
                                            $t=1; 
                                           
                                        }
                                   }
                                  $reponse->closeCursor();
                                  return $cni;
                                } 


                                function  groupmatensgnom($id){
        

                                     $v="SELECT *  FROM groupmatensg";
                                     $reponse = $bdda->query($v);
                                       $t=0; $cni=" ";
                                      while ($donnees = $reponse->fetch() AND $t==0)
                                      {
                                        if($donnees['id']==$id){ 
                                            $cni=$donnees['nom']; 
                                                $t=1; 
                                               
                                            }
                                       }
                                      $reponse->closeCursor();
                                      return $cni;
                                    } 




                                    function  matgroupidgroup($mat,$an,$type){

                                         $v="SELECT *  FROM matgroup WHERE anens='".$an."' AND sup='0' AND idmat='".$mat."'";
                                        $reponse = $bdda->query($v);
                                           $t=0; $cni=" ";
                                          while ($donnees = $reponse->fetch() AND $t==0)
                                          {
                                            if($donnees['typeEns']==$type){ 
                                                $cni=$donnees['idgroup']; 
                                                    $t=1; 
                                                   
                                                }
                                           }
                                          $reponse->closeCursor();
                                          return $cni;
                                        } 

                                        function  cycleclasse($categ){
                                          if($categ=='MA'){
                                              return 1;
                                          }
                                          else{
                                              return 2;
                                          }
                                            }                               
    

                                            function  existmatclass($mat,$an,$clas){
        

                                                $v="SELECT *  FROM matclasse WHERE anens='".$an."' AND sup='0' AND idcl='".$clas."'";
                                                $reponse = $bdda->query($v);
                                                   $t=0; $cni=0;
                                                  while ($donnees = $reponse->fetch() AND $t==0)
                                                  {
                                                    if($donnees['idmat']==$mat){ 
                                                        $cni=$donnees['id']; 
                                                            $t=1; 
                                                           
                                                        }
                                                   }
                                                  $reponse->closeCursor();
                                                  return $cni;
                                                } 
            
    
                                                function  existmatclassgpe($mat,$an,$clas){
        

                                                    $v="SELECT *  FROM matclasse WHERE anens='".$an."' AND sup='0' AND idcl='".$clas."'";
                                                    $reponse = $bdda->query($v);
                                                       $t=0; $cni=0;
                                                      while ($donnees = $reponse->fetch() AND $t==0)
                                                      {
                                                        if($donnees['idmat']==$mat){ 
                                                            $cni=$donnees['idgp']; 
                                                                $t=1; 
                                                               
                                                            }
                                                       }
                                                      $reponse->closeCursor();
                                                      return $cni;
                                                    }                                             

  function ajoutmatclasshorizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='anzeigmat.php' method='POST'> <input type='submit' name='envoi1' value='Afficher toutes les matières'></form>";
    echo" <li class='breadcrumb-item'><form action='anzeigmatclas.php'  method='POST'><input type='submit' value='Afficher les matières par classe'></form>";
        
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}   





function anzeigmat(){
 
echo "<ol class='breadcrumb float-sm-right'>
<li class='breadcrumb-item'><form method='POST' action='anzeigmat.php'><select name='choix' class='form-control' id='exampleInputPassword1'>
<option value=' '>Trier les matières</option>  ";

$v="SELECT *  FROM groupetype ";
$reponse = $bdda->query($v);
  $t=0; $cni=" ";
 while ($donnees = $reponse->fetch() )
 {
   $code=$donnees['code'];
   if($code<=4){ 
    $nom=$donnees['nom']; 
     echo "<option value='".$code."'>".$nom."</option> ";       
   }      
    
  }
 $reponse->closeCursor();

 

echo "<option value='0'>Toutes les matières</option></select><button type='submit' class='btn btn-primary' name='envoi3'>OK</button>
 </form>
<li class='breadcrumb-item'><form action='anzeigmatclas.php'><input type='submit' value='Afficher les matières par classe'></form>
";

echo "<ol class='breadcrumb float-sm-right'>";
if($_SESSION['code']==4) { 
 echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
}
if($_SESSION['code']==3) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==2) { 
   echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==1) { 
   echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==5) { 
   echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
  }
  if($_SESSION['code']==6) { 
   echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
  }
 if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function anzeigmatclashorizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='ajoutmatclass.php'  method='POST'><input type='submit' value='Attribuer les matières dans les classes'></form>";
      
    echo" <li class='breadcrumb-item'><form action='anzeigmat.php' method='POST'> <input type='submit' name='envoi1' value='Afficher toutes les matières'></form>";
     
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}   




function anzeigmatclas1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>
    <li class='breadcrumb-item'><form action='anzeigmatclas.php'><input type='submit' value='Choisir une autre classe'></form>
  
    <li class='breadcrumb-item'><form action='ajoutmatclass.php'><input type='submit' value='Attribuer les matières dans les classes'></form>
    </br> ";
      echo" <li class='breadcrumb-item'><form action='anzeigmat.php' method='POST'> <input type='submit' name='envoi1' value='Afficher toutes les matières du Primaire et maternelle'></form>";
 
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function insertnote1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='insertnote.php'><input type='submit' value='Choisir un autre trimestre'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}



function insertnote1Enshorizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='insertnoteEns.php'><input type='submit' value='Choisir un autre trimestre'></form>";
          
          echo" <li class='breadcrumb-item'><form action='menuens.php'><input type='submit' value='Menu'></form>";
         
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function insertnote2Enshorizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='insertnoteEns.php'><input type='submit' value='Choisir un autre trimestre'></form>";
    echo" <li class='breadcrumb-item'><form action='insertnote1Ens.php'><input type='submit' value='Retour'></form>";
         
          echo" <li class='breadcrumb-item'><form action='menuens.php'><input type='submit' value='Menu'></form>";
         
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}


function insertcalcul1horizcoll(){
    echo "<ol class='breadcrumb float-sm-right'>";
    echo" <li class='breadcrumb-item'><form action='insertcalcul.php'><input type='submit' value='Choisir un autre trimestre ou classe'></form>";
         if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }echo"</form>";
}







function insertaffmoyeva(){

    echo "<ol class='breadcrumb float-sm-right'>";
    echo "<li class='breadcrumb-item'><form method='post' action='insertaffmoyeva.php'>
    <div class='select2-purple'> 
<select name='choix' class='select2'   data-placeholder='Choisir l'enseignant(e)' data-dropdown-css-class='select2-purple' style='width: 100%;'>";
 
 
echo " <optgroup label='ORDRE DE MERITE' >  <option value='1'>ADMIS</option> 
<option value='2'>ECHOUES</option><option value='3'>TOUT</option> </optgroup>
 ";
 
    
    
     
echo "</select> </div></br>"; 
     echo"  <button type='submit' name='sendexp' value='1' class='btn btn-primary'>OK</button>  
     </br></br>  </form></li>";  
    
    
    if($_SESSION['code']==4) { 
          echo" <li class='breadcrumb-item'><form action='menueco.php'><input type='submit' value='Menu'></form>";
         }
         if($_SESSION['code']==3) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==2) { 
            echo" <li class='breadcrumb-item'><form action='menuprinci.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==1) { 
            echo" <li class='breadcrumb-item'><form action='menufondat.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==5) { 
            echo" <li class='breadcrumb-item'><form action='menusurv.php'><input type='submit' value='Menu'></form>";
           }
           if($_SESSION['code']==6) { 
            echo" <li class='breadcrumb-item'><form action='menusecteur.php'><input type='submit' value='Menu'></form>";
           }
             
          if($_SESSION['code']==7) { 
                   echo" <li class='breadcrumb-item'><form action='menusecre.php'><input type='submit' value='Menu'></form>";
                  }
}






function teladmin($anf,$cni){
           

             $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
             $reponse = $bdda->query($v);
                $dec=" "; $true=0;
              while ($donnees = $reponse->fetch() AND $true==0)
              {
                 if($donnees['cni'] == $cni){
                   $dec=$donnees['numtel'];
                   
                   $true=1;
                }
            }
              $reponse->closeCursor();
              return $dec;
            } 


            function sexadmin($anf,$cni){
           

                         $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
                         $reponse = $bdda->query($v);
                            $dec=" "; $true=0;
                          while ($donnees = $reponse->fetch() AND $true==0)
                          {
                             if($donnees['cni'] == $cni){
                               $dec=$donnees['genre'];
                               
                               $true=1;
                            }
                        }
                          $reponse->closeCursor();
                          return $dec;
                        }          


                        function poste($anf,$cni){
           

                                     $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
                                     $reponse = $bdda->query($v);
                                        $dec=" "; $true=0;
                                      while ($donnees = $reponse->fetch() AND $true==0)
                                      {
                                         if($donnees['cni'] == $cni){
                                           $dec=$donnees['code'];
                                           
                                           $true=1;
                                        }
                                    }
                                      $reponse->closeCursor();
                                      return $dec;
                                    } 



 function salairadmin($anf,$cni){
           

      $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
     $reponse = $bdda->query($v);
       $dec=" "; $true=0;
      while ($donnees = $reponse->fetch() AND $true==0)
     {
    if($donnees['cni'] == $cni){
        $dec=$donnees['salaire'];
                                                       
     $true=1;
      }
    }
      $reponse->closeCursor();
          return $dec;
     } 



     function nomutiladmin($anf,$cni){
           

            $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
           $reponse = $bdda->query($v);
             $dec=" "; $true=0;
            while ($donnees = $reponse->fetch() AND $true==0)
           {
          if($donnees['cni'] == $cni){
              $dec=$donnees['user'];
                                                             
           $true=1;
            }
          }
            $reponse->closeCursor();
                return $dec;
           } 
 
           function mtpassadmin($anf,$cni){
           

                $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
               $reponse = $bdda->query($v);
                 $dec=" "; $true=0;
                while ($donnees = $reponse->fetch() AND $true==0)
               {
              if($donnees['cni'] == $cni){
                  $dec=$donnees['mtpasse'];
                                                                 
               $true=1;
                }
              }
                $reponse->closeCursor();
                    return $dec;
               } 

               function NNomadmin($anf,$cni){
           

                    $v="SELECT *  FROM admini WHERE id_etab='0' AND anens='".$anf."'";
                   $reponse = $bdda->query($v);
                     $dec=" "; $true=0;
                    while ($donnees = $reponse->fetch() AND $true==0)
                   {
                  if($donnees['cni'] == $cni){
                      $dec=$donnees['nom'];
                                                                     
                   $true=1;
                    }
                  }
                    $reponse->closeCursor();
                        return $dec;
                   } 
    

    
function postefonct($clas){
    if($clas=='1'){
        return 'FONDATEUR';
    }
    if($clas=='2'){
        return 'DIRECTEUR';
    }
     
    if($clas=='4'){
        return 'ECONOME';
    }
    if($clas=='5'){
        return 'SURVEILLANT';
    }
    
    if($clas=='7'){
        return 'SECRETAIRE';
    }
 } 


 function intext($val){ 
    $re=" ";
    if($val==1){
      $re="Interne";
    }
    if($val==2){
      $re="Externe";
    }
    return $re;
     }


     function nbrenfant($idparent,$an){

         $v="SELECT *  FROM parenteleve WHERE anelev='".$an."'";
         $reponse = $bdda->query($v);
              $nbre=0; $t="-";
          while ($donnees = $reponse->fetch())
          {
            if($donnees['idparent']==$idparent){ 
                  $t=$t.$donnees['matelev']."-"; $nbre++;
               }
           }
          $reponse->closeCursor();
          if($nbre>0){
            return $nbre.$t;
          }
          else{
            "-".$nbre."-";
          }
        } 

        function enseignsuppl($idens,$an){

             
             $civilite="/";
             $nbenfant=0;
             $formation=2;
             $diplome="/";
             $annedeb="/";
             $activite="/";
             $impot=2;
             $cnps=2;
             $prime=2;
             $avtgtel=2;
             $logement=2;
             $repas=2;
             $reduction=0;
             // Insertion du message à l'aide d'une requête préparée 
              $v="SELECT *  FROM enseignantsuppl WHERE anens='".$an."'";
              $reponse = $bdda->query($v);
                   $nbre=0; $t="-";
               while ($donnees = $reponse->fetch())
               { 
                  if($donnees['idens']==$idens){ 
                    $civilite=$donnees['civilite'];
                    $nbenfant=$donnees['nbenfant'];
                    $formation=$donnees['nbenfant'];
                    $diplome=$donnees['diplome'];
                    $annedeb=$donnees['annedeb'];
                    $activite=$donnees['activite'];
                    $impot=$donnees['impot'];
                    $cnps=$donnees['cotisation'];
                    $prime=$donnees['prime'];
                    $avtgtel=$donnees['avtgtel'];
                    $logement=$donnees['logement'];
                    $repas=$donnees['repas'];
                    $reduction=$donnees['reduction'];
                    }
                }
               $reponse->closeCursor();
              return $civilite."-".$nbenfant."-".$formation."-".$diplome."-".$annedeb."-".$activite."-".$impot."-".$cnps."-".$prime."-".$avtgtel."-".$logement."-".$repas."-".$reduction;
            } 
    










?>