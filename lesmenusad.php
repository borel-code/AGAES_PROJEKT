<?php
// 
 
function logo1(){
  return "Le logo";
}
function menuhautappli(){ 
  echo "
  <a href='#' class='brand-link'>
  <center><b><img src='AGAES2.png' height='50px' width='80px' class='img-circle elevation-2' alt='User Image'></b></center>
     </a>"; 
     }

function menuhautnom($nom,$image){ 
  echo " 
  </br>  </br> 
       
  <center>
         <div class='image'>
           <img src='#' height='70px' width='70px' class='img-circle elevation-2' alt='User Image'>
         </div></center>
         <div class='info'>
           <a href='#' class='d-block'><center>  </center></a>
         </div>
       "; 
        
     }

//DEB WEBMASTER
function bloc($bloc){
  $bloc1='nav-item';$bloc2='nav-item';
  $bloc3='nav-item';$bloc4='nav-item';
  if($bloc==1){$bloc1='nav-item menu-open'; return $bloc1;}
  if($bloc==2){$bloc2='nav-item menu-open'; return $bloc2;}
  if($bloc==3){$bloc3='nav-item menu-open'; return $bloc3;}
  if($bloc==4){$bloc4='nav-item menu-open'; return $bloc4;}
}
function actif($actif){
  $actif1='nav-link';$actif2='nav-link';
  $actif3='nav-link';$actif4='nav-link';
  if($actif==1){$actif1='nav-link active'; return $actif1;}
  if($actif==2){$actif2='nav-link active'; return $actif2;}
  if($actif==3){$actif3='nav-link active'; return $actif3;}
  if($actif==4){$actif4='nav-link active'; return $actif4;}
}
function pageactif($pageactif){
  $actif1='nav-link';$actif2='nav-link';
  $actif3='nav-link';$actif4='nav-link';
  if($actif==1){$actif1='nav-link active'; return $actif1;}
  if($actif==2){$actif2='nav-link active'; return $actif2;}
  if($actif==3){$actif3='nav-link active'; return $actif3;}
  if($actif==4){$actif4='nav-link active'; return $actif4;}
}
function tableaubord($bloc,$actif,$pageactif,$idutil){
  $bloc0='nav-item';
  $bloc1='nav-item';$bloc2='nav-item';
  $bloc3='nav-item';$bloc4='nav-item';
  $bloc5='nav-item';$bloc6='nav-item';$bloc7='nav-item';
  if($bloc==0){$bloc0='nav-item menu-open'; }
  if($bloc==1){$bloc1='nav-item menu-open'; }
  if($bloc==2){$bloc2='nav-item menu-open'; }
  if($bloc==3){$bloc3='nav-item menu-open'; }
  if($bloc==4){$bloc4='nav-item menu-open'; }
  if($bloc==5){$bloc5='nav-item menu-open'; }
  if($bloc==6){$bloc6='nav-item menu-open'; }
  if($bloc==7){$bloc7='nav-item menu-open'; }

  $actif0='nav-link'; $actif1='nav-link';$actif2='nav-link';
  $actif3='nav-link';$actif4='nav-link';
  $actif5='nav-link';$actif6='nav-link';$actif7='nav-link';
  if($actif==0){$actif0='nav-link active';}
  if($actif==1){$actif1='nav-link active';}
  if($actif==2){$actif2='nav-link active';}
  if($actif==3){$actif3='nav-link active';}
  if($actif==4){$actif4='nav-link active';}
  if($actif==5){$actif5='nav-link active';}
  if($actif==6){$actif6='nav-link active';}
  if($actif==7){$actif7='nav-link active';}

  $pageactif0='nav-link';$pageactif1='nav-link';$pageactif2='nav-link';
  $pageactif3='nav-link';$pageactif4='nav-link';
  $pageactif5='nav-link';$pageactif6='nav-link';
  $pageactif7='nav-link';$pageactif8='nav-link';
  $pageactif9='nav-link';$pageactif10='nav-link';
  $pageactif11='nav-link';$pageactif12='nav-link';$pageactif13='nav-link';$pageactif14='nav-link';
  $pageactif15='nav-link'; $pageactif16='nav-link';
  if($pageactif==0){$pageactif0='nav-link active'; }
  if($pageactif==1){$pageactif1='nav-link active'; }
  if($pageactif==2){$pageactif2='nav-link active';}
  if($pageactif==3){$pageactif3='nav-link active';}
  if($pageactif==4){$pageactif4='nav-link active';}
  if($pageactif==5){$pageactif5='nav-link active';}
  if($pageactif==6){$pageactif6='nav-link active';}
  if($pageactif==7){$pageactif7='nav-link active'; }
  if($pageactif==8){$pageactif8='nav-link active'; }
  if($pageactif==9){$pageactif9='nav-link active'; }
  if($pageactif==10){$pageactif10='nav-link active'; }
  if($pageactif==11){$pageactif11='nav-link active'; }
  if($pageactif==12){$pageactif12='nav-link active'; }
  if($pageactif==13){$pageactif13='nav-link active'; }
  if($pageactif==14){$pageactif14='nav-link active'; }
  if($pageactif==15){$pageactif15='nav-link active'; }
  if($pageactif==16){$pageactif16='nav-link active'; }
   
  echo "  
   
  <li class='".$bloc0."'>
  <a href='index.php' class='".$actif0."'>
  <i class='nav-icon fas fa-tachometer-alt'></i>
  <p>
    Accueil
    <i class='fas fa-angle-left right'></i>
  </p>
  </a>
   
</li>";
 
  echo "<li class='".$bloc1."'>
   <a href='#' class='".$actif1."'>
   <i class='nav-icon far fa-user'></i>
   <p>
     Les clients
     <i class='fas fa-angle-left right'></i>
   </p>
   </a>
   <ul class='nav nav-treeview'>
   <li class='nav-item'>
       <a href='bord.php' class='".$pageactif1."'>
         <i class='far fa-circle nav-icon'></i>
         <p>Afficher les établissements</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='viewbd.php' class='".$pageactif2."'>
         <i class='far fa-circle nav-icon'></i>
         <p>Afficher les bases de données</p>
       </a>
     </li>
      
      
     
   </ul>
 </li> "; 
        
         
 
/* 
echo "<li class='".$bloc6."'>
   <a href='#' class='".$actif6."'>
   <i class='nav-icon far fa-calendar-alt'></i>
   <p>
     Je suis client
     <i class='fas fa-angle-left right'></i>
   </p>
   </a>
   <ul class='nav nav-treeview'>
   <li class='nav-item'>
       <a href='viewmvtcli.php' class='".$pageactif12."'>
         <i class='far fa-circle nav-icon'></i>
         <p>Afficher mes mouvements</p>
       </a>
     </li>
      
      
     
   </ul>
 </li> ";    
}
*/
/*
 echo "   
</br> 
<center><a href='index.php'  '>
 <p>Se déconnecter</p>
</a></center>
";
*/
}

//FIN WEBMASTER

 

//administrateur
 

 




?>