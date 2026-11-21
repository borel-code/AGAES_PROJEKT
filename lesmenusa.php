<?php
 
//BREF POUR L'economat primaire a le meme nom de fonction economatcollege
   

function economatcollege(){
  $nbretablissement=nbretablissement();
       echo "  <nav class='mt-2'>
        <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               ";
                
               
                      
               
               echo "<li class='nav-item'>
                         <a href='deplacer.php' class='nav-link'>
                        
                          ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
                         </a></br></br>
                       </li>";
                      
               
                       echo "  


          <li class='nav-item menu-open'>
            <a href='#' class='nav-link active'>
              <i class='nav-icon fas fa-tachometer-alt'></i>
              <p>
                PAIEMENTS  
                <i class='right fas fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='inscripold1.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Inscrire un élève</p>
                </a>
              </li> 
              <li class='nav-item'>
                <a href='paiem1.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Règlement de la scolarité</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='autrefrais.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Paiement des uniformes, arbre de noel...</p>
              </a>
            </li>
              <li class='nav-item'>
                <a href='exam.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Règlement des frais des examens</p>
                </a>
              </li>
              
            </ul>
          </li>
          




          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
            </ul>
          </li>






          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-copy'></i>
              <p>
                MODIFIER LES INFORMATIONS OU RECHERCHER LES ELEVES
                <i class='fas fa-angle-left right'></i>
                 
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='nom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Noms,prénoms,date de naissance etc ...</p>
                </a>
              </li>
             
              
              
              
            </ul>
          </li>





          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-book'></i>
              <p>
                ETATS DE SCOLARITE ET EXAMENS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='etatclass.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Etats scolarité par classe</p>
                </a>
              </li>
               
              <li class='nav-item'>
                <a href='etatexampay.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Les examens payés</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='etatexampayn.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Les examens non payés</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='etatuniform.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Les uniformes, arbre de noel...</p>
              </a>
            </li>
              <li class='nav-item'>
                <a href='infop.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Historique de paye par élève</p>
                </a>
              </li>
            </ul>
          </li>

 

             
 <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-book'></i>
              <p>
                Envoi des sujets
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
             <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
               
              
            </ul>
          </li>

 

          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-chart-pie'></i>
              <p>
               MON BILAN D'ENTREES DES CAISSES
                <i class='right fas fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='bilrecj.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Recette journalière</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='bilrecperio.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Recette sur une periode</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='birecan.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Recette sur l'année scolaire</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='etatgen.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Etat général</p>
              </a>
            </li>
             </ul>
          </li>


             
          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-th'></i>
              <p>
                SORTIE DES CAISSES
                <i class='right fas fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='sorteff.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Effectuer une sortie d'argent</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='sortjour.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Historique des sorties journalières </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='sortperiod.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Historique des sorties sur une periode </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='sortan.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Historique des sorties sur l'année scolaire</p>
                </a>
              </li>
             </ul>
          </li>

  

          <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-edit'></i>
              <p>
                GESTION DES SALAIRES
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='salairens.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Salaire des enseignants</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='salairad.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Salaire du personnel administratif</p>
                </a>
              </li>
              </ul>
              </li>
              <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='reparer.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>actualiser le stockage</p>
     </a>
   </li>
     </ul>   
     </li>
            <li class='nav-item'>
            </br></br><a href='index.php' class='nav-link'>
                <i class='far fa-squart nav-icon'></i>
              SE DECONNECTER</p>
              </a></br></br>
            </li>

          </nav>";
    }
    
//FIN MENU ECONOMAT


//PRINCIPAL ET CENSEUR

function principalcollege(){
  $nbretablissement=nbretablissement();
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          ";
          echo "<li class='nav-item'>
          <a href='deplacer.php' class='nav-link'>
             
           ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
          </a></br></br>
        </li>";
           
                     
                     
                       echo "  

        
  <li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           ENREGISTREMENT DES ENSEIGNANTS  
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='ajoutensn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Cliquer pour gérer</p>
           </a>
         </li>
         
         
       </ul>
     </li>
     


 



     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-table'></i>
       <p>
         CONFIGURATION DES MATIERES, CLASSES ET MODALITES DE LA SCOLARITE
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='recond.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Reconduire les classes d'une année antérieure à l'année en cours</p>
     </a>
   </li>
       <li class='nav-item'>
         <a href='ajoutmat.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une matière</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutclasse.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une classe </p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutmatclass.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Attribuer les matières dans les classes</p>
         </a>
       </li>
       
   <li class='nav-item'>
   <a href='anzeigmatclas.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>Afficher les matières par classe</p>
   </a>
 </li>
       <li class='nav-item'>
         <a href='configsco.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer les modalités de la scolarité</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='configfrais.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer le montant de l'arbre de noel,travaux dirigés etc... </p>
         </a>
       </li>
       <li class='nav-item'>
       <a href='configremise.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Les types de remises </p>
       </a>
     </li>
       
     </ul>
   </li>


<li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
            <i class='nav-icon fas fa-chart-pie'></i>
            <p>
              BILAN D'ENTREES DES CAISSES
              <i class='right fas fa-angle-left'></i>
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='bilrecjad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette journalière</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='bilrecperioad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur une periode</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='birecanad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur l'année scolaire</p>
              </a>
            </li>
            <li class='nav-item'>
            <a href='etatgen.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Etat général</p>
            </a>
          </li>
           </ul>
        </li>
 



     <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
              
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='certif.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Certificat de scolarité</p>
              </a>
            </li><li class='nav-item'>
              <a href='parent.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Liste des parents</p>
              </a>
            </li>
            </ul>
          </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              CONDUITE DES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='absedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les heures d'absences</p>
              </a>
            </li>
           
            <li class='nav-item'>
              <a href='retardedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les retards</p>
              </a>
            </li>
            
            
          </ul>
        </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              MODIFIER LES INFORMATIONS OU RECHERCHER LES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='nom.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Noms,prénoms,date de naissance etc ...</p>
              </a>
            </li>
           
            

            <li class='nav-item'>
              <a href='cartelev.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Carte scolaire</p>
              </a>
            </li>
            
            
          </ul>
        </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-book'></i>
         <p>
           ETATS DE SCOLARITE ET EXAMENS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='etatclass.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Etats scolarité par classe</p>
           </a>
         </li>
          
         <li class='nav-item'>
           <a href='etatexampay.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens payés</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='etatexampayn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens non payés</p>
           </a>
         </li>
         <li class='nav-item'>
              <a href='etatuniform.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Les uniformes, arbre de noel...</p>
              </a>
            </li>
         <li class='nav-item'>
           <a href='infop.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Historique de paye par élève</p>
           </a>
         </li>
       </ul>
     </li>



         

     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='gestn1.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Inscrire le nombre d'évaluations par trimestre</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='insertnote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         <li class='nav-item'>
         <a href='insertcalcul.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Calculer les moyennes, afficher les bulletins, statistiques</p>
         </a>
       </li>
       <li class='nav-item'>
           <a href='fichenote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Fiche manuelle de report des notes</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='verrounote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Verrouiller les notes</p>
           </a>
         </li>
         <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
         <a href='ancienbull/marknote.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>bulletin 2020/2021 ET 2021/2022</p>
         </a>
       </li>
        </ul>
     </li>


        
     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-th'></i>
         <p>
           GESTION DU PERSONNEL ADMINISTRATIF
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='enregad.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Enregistrer un membre administratif</p>
           </a>
         </li>
         
          
        </ul>
     </li>



     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         GESTION DES SALAIRES
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='salairens.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire des enseignants</p>
     </a>
   </li>
   <li class='nav-item'>
     <a href='salairad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire du personnel administratif</p>
     </a>
   </li>
        
     </ul>
     </li>


     <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         STRUCTURE DE L'ETABLISSEMENT
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Gerer</p>
     </a>
   </li>  
     </ul>
     </li>

     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-th'></i>
       <p>
         GESTION D'EMPLOI DE TEMPS
         <i class='right fas fa-angle-left'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
         <a href='ecriremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Editer l'emploi de temps</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='liremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Afficher l'emploi de temps </p>
         </a>
       </li>
        
      </ul>
   </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-edit'></i>
         <p>
           GESTION DES SMS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='schenkesms.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Envoi d'sms</p>
       </a>
     </li>
          
       </ul>
       </li>


       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='chgerimg.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer les en-têtes</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='suppdonnees.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Supprimer les données</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='complexe.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Initial de l'établissement</p>
     </a>
   </li>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='reparer.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>actualiser le stockage</p>
     </a>
   </li>
     </ul>   
     </li>

       



       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}




//surveillant general

function survcollege(){
  $nbretablissement=nbretablissement();
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          ";
          echo "<li class='nav-item'>
          <a href='deplacer.php' class='nav-link'>
             
           ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
          </a></br></br>
        </li>";
               
                       echo "  
  
  <li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           ENREGISTREMENT DES ENSEIGNANTS  
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='ajoutensn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Cliquer pour gérer</p>
           </a>
         </li>
        
     
         
       </ul>
     </li>
     




     


     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-table'></i>
       <p>
         CONFIGURATION DES MATIERES ET CLASSES 
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='recond.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Reconduire les classes d'une année antérieure à l'année en cours</p>
     </a>
   </li>
       <li class='nav-item'>
         <a href='ajoutmat.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une matière</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutclasse.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une classe </p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutmatclass.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Attribuer les matières dans les classes</p>
         </a>
       </li>
       
   <li class='nav-item'>
   <a href='anzeigmatclas.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>Afficher les matières par classe</p>
   </a>
 </li>
        
 
       
     </ul>
   </li>











     <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
              
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
               
            </ul>
          </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              CONDUITE DES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='absedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les heures d'absences</p>
              </a>
            </li>
           
            <li class='nav-item'>
              <a href='retardedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les retards</p>
              </a>
            </li>
            
            
          </ul>
        </li>

 




      



         

     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='gestn1.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Inscrire le nombre d'évaluations par trimestre</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='insertnote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         <li class='nav-item'>
         <a href='insertcalcul.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Calculer les moyennes, afficher les bulletins, statistiques</p>
         </a>
       </li>
       <li class='nav-item'>
           <a href='fichenote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Fiche manuelle de report des notes</p>
           </a>
         </li>
         <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
         <a href='ancienbull/marknote.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>bulletin 2020/2021 ET 2021/2022</p>
         </a>
       </li>
        </ul>
     </li>


        
      

 

     <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         STRUCTURE DE L'ETABLISSEMENT
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
        <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Gerer</p>
     </a>
   </li>
     </ul>
     </li>

     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-th'></i>
       <p>
         GESTION D'EMPLOI DE TEMPS
         <i class='right fas fa-angle-left'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
         <a href='ecriremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Editer l'emploi de temps</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='liremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Afficher l'emploi de temps </p>
         </a>
       </li>
        
      </ul>
   </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-edit'></i>
         <p>
           GESTION DES SMS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='schenkesms.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Envoi d'sms</p>
       </a>
     </li>
       </ul>
       </li>

       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='reparer.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>actualiser le stockage</p>
     </a>
   </li>
     </ul>   
     </li>


       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}






//secretaire
function secretairecollege(){
  $nbretablissement=nbretablissement();
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          ";
          echo "<li class='nav-item'>
          <a href='deplacer.php' class='nav-link'>
         
           ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
          </a></br></br>
        </li>";
               
                       echo "  
     
  <li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           ENREGISTREMENT DES ENSEIGNANTS  
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='ajoutensn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Cliquer pour gérer</p>
           </a>
         </li>
         
         
       </ul>
     </li>
     


 



     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-table'></i>
       <p>
         CONFIGURATION DES MATIERES ET CLASSES 
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='recond.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Reconduire les classes d'une année antérieure à l'année en cours</p>
     </a>
   </li>
       <li class='nav-item'>
         <a href='ajoutmat.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une matière</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutclasse.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une classe </p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutmatclass.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Attribuer les matières dans les classes</p>
         </a>
       </li>
       
   <li class='nav-item'>
   <a href='anzeigmatclas.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>Afficher les matières par classe</p>
   </a>
 </li>
        
 
       
     </ul>
   </li>



 




     <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
              
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
               
            </ul>
          </li>


           
  <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              MODIFIER LES INFORMATIONS OU RECHERCHER LES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
          <li class='nav-item'>
          <a href='nom.php' class='nav-link'>
            <i class='far fa-circle nav-icon'></i>
            <p>Noms,prénoms,date de naissance etc ...</p>
          </a>
        </li>

            <li class='nav-item'>
              <a href='cartelev.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Carte scolaire</p>
              </a>
            </li>
            
            
          </ul>
        </li>





      



         

     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='gestn1.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Inscrire le nombre d'évaluations par trimestre</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='insertnote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         <li class='nav-item'>
         <a href='insertcalcul.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Calculer les moyennes, afficher les bulletins, statistiques</p>
         </a>
       </li>
       <li class='nav-item'>
           <a href='fichenote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Fiche manuelle de report des notes</p>
           </a>
         </li>
         <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
         <a href='ancienbull/marknote.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>bulletin 2020/2021 ET 2021/2022</p>
         </a>
       </li> 
        </ul>
     </li>


        
      

 

     <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         STRUCTURE DE L'ETABLISSEMENT
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Gerer</p>
     </a>
   </li>
     </ul>


     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-th'></i>
       <p>
         GESTION D'EMPLOI DE TEMPS
         <i class='right fas fa-angle-left'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
         <a href='ecriremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Editer l'emploi de temps</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='liremploi.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Afficher l'emploi de temps </p>
         </a>
       </li>
        
      </ul>
   </li>

   <li class='nav-item'>
   <a href='#' class='nav-link'>
     <i class='nav-icon fas fa-edit'></i>
     <p>
       GESTION DES SALAIRES
       <i class='fas fa-angle-left right'></i>
     </p>
   </a>
   <ul class='nav nav-treeview'>
     <li class='nav-item'>
       <a href='salairens.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Salaire des enseignants</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='salairad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Salaire du personnel administratif</p>
       </a>
     </li>
     </ul>
     </li>


     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-edit'></i>
         <p>
           GESTION DES SMS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='schenkesms.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Envoi d'sms</p>
       </a>
     </li>
          
       </ul>
       </li>

       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='chgerimg.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer les en-têtes</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='suppdonnees.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Supprimer les données</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='complexe.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Initial de l'établissement</p>
     </a>
   </li>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='reparer.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>actualiser le stockage</p>
     </a>
   </li>
     </ul>   
     </li>


       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}








 



//FONDAT


function fondatcollege(){
  $nbretablissement=nbretablissement();
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library --> ";
          echo "<li class='nav-item'>
                         <a href='deplacer.php' class='nav-link'>
                            
                          ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
                         </a></br></br>
                       </li>";
          
                  echo "  
<li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
            <i class='nav-icon fas fa-chart-pie'></i>
            <p>
              BILAN D'ENTREES DES CAISSES
              <i class='right fas fa-angle-left'></i>
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='bilrecjad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette journalière</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='bilrecperioad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur une periode</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='birecanad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur l'année scolaire</p>
              </a>
            </li>
            <li class='nav-item'>
            <a href='etatgen.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Etat général</p>
            </a>
          </li>
           </ul>
        </li>

        <li class='nav-item'>
        <a href='#' class='nav-link'>
          <i class='nav-icon fas fa-th'></i>
          <p>
            PAIEMENTS  
            <i class='right fas fa-angle-left'></i>
          </p>
        </a>
        <ul class='nav nav-treeview'>
          <li class='nav-item'>
            <a href='inscripold1.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Inscrire un élève</p>
            </a>
          </li> 
          <li class='nav-item'>
            <a href='paiem1.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Règlement de la scolarité</p>
            </a>
          </li>
          <li class='nav-item'>
          <a href='autrefrais.php' class='nav-link'>
            <i class='far fa-circle nav-icon'></i>
            <p>Paiement des uniformes, arbre de noel...</p>
          </a>
        </li>
          <li class='nav-item'>
            <a href='exam.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Règlement des frais des examens</p>
            </a>
          </li>
          
        </ul>
      </li>
      
           
        <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-th'></i>
            <p>
              SORTIE DES CAISSES
              <i class='right fas fa-angle-left'></i>
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='sorteff.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Effectuer une sortie d'argent</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortjour.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties journalières </p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortperiod.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties sur une periode </p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortan.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties sur l'année scolaire</p>
              </a>
            </li>
           </ul>
        </li>




  <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           ENREGISTREMENT DES ENSEIGNANTS  
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='ajoutensn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Cliquer pour gérer</p>
           </a>
         </li>
        
          
       </ul>
     </li>
     



      




     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-table'></i>
       <p>
         CONFIGURATION DES MATIERES, CLASSES ET MODALITES DE LA SCOLARITE
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='recond.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Reconduire les classes d'une année antérieure à l'année en cours</p>
     </a>
   </li>
       <li class='nav-item'>
         <a href='ajoutmat.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une matière</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutclasse.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une classe </p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutmatclass.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Attribuer les matières dans les classes</p>
         </a>
       </li>
       
   <li class='nav-item'>
   <a href='anzeigmatclas.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>Afficher les matières par classe</p>
   </a>
 </li>
       <li class='nav-item'>
         <a href='configsco.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer les modalités de la scolarité</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='configfrais.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer le montant de l'arbre de noel,travaux dirigés etc... </p>
         </a>
       </li>
       <li class='nav-item'>
       <a href='configremise.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Les types de remises </p>
       </a>
     </li>

       
     </ul>
   </li>



 

     <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
             
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='certif.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Certificat de scolarité</p>
              </a>
            </li><li class='nav-item'>
              <a href='parent.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Liste des parents</p>
              </a>
            </li>
            </ul>
          </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              CONDUITE DES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='absedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les heures d'absences</p>
              </a>
            </li>
           
            <li class='nav-item'>
              <a href='retardedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les retards</p>
              </a>
            </li>
            
            
          </ul>
        </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              MODIFIER LES INFORMATIONS OU RECHERCHER LES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='nom.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Noms,prénoms,date de naissance etc ...</p>
              </a>
            </li>
           
            
            
            
          </ul>
        </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-book'></i>
         <p>
           ETATS DE SCOLARITE ET EXAMENS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='etatclass.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Etats scolarité par classe</p>
           </a>
         </li>
          
         <li class='nav-item'>
           <a href='etatexampay.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens payés</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='etatexampayn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens non payés</p>
           </a>
         </li>
         <li class='nav-item'>
              <a href='etatuniform.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Les uniformes, arbre de noel...</p>
              </a>
            </li>
         <li class='nav-item'>
           <a href='infop.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Historique de paye par élève</p>
           </a>
         </li>
       </ul>
     </li>



         

     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='gestn1.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Inscrire le nombre d'évaluations par trimestre</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='insertnote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         <li class='nav-item'>
         <a href='insertcalcul.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Calculer les moyennes, afficher les bulletins, statistiques</p>
         </a>
       </li>
       <li class='nav-item'>
           <a href='fichenote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Fiche manuelle de report des notes</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='verrounote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Verrouiller les notes</p>
           </a>
         </li>
         <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
         <a href='ancienbull/marknote.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>bulletin 2020/2021 ET 2021/2022</p>
         </a>
       </li>
        </ul>
     </li>


        
     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-th'></i>
         <p>
           GESTION DU PERSONNEL ADMINISTRATIF
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='enregad.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Enregistrer un membre administratif</p>
           </a>
         </li>
         
          
        </ul>
     </li>



     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         GESTION DES SALAIRES
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='salairens.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire des enseignants</p>
     </a>
   </li>
   <li class='nav-item'>
     <a href='salairad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire du personnel administratif</p>
     </a>
   </li>
        
     </ul>
     </li>


     <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         STRUCTURE DE L'ETABLISSEMENT
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Gerer</p>
     </a>
   </li>
     </ul>
     </li>

     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-th'></i>
       <p>
         GESTION D'EMPLOI DE TEMPS
         <i class='right fas fa-angle-left'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='ecriremploi.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Editer l'emploi de temps</p>
     </a>
   </li>
   <li class='nav-item'>
     <a href='liremploi.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Afficher l'emploi de temps </p>
     </a>
   </li>
      </ul>
   </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-edit'></i>
         <p>
           GESTION DES SMS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='schenkesms.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Envoi d'sms</p>
       </a>
     </li>
         
       </ul>
       </li>



       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='chgerimg.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer les en-têtes</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='suppdonnees.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Supprimer les données</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='complexe.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Initial de l'établissement</p>
     </a>
   </li>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='reparer.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>actualiser le stockage</p>
     </a>
   </li>
     </ul>   
     </li>

       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
            CORRIGER LES ERREURS DE PAIEMENTS ET AUDIT
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
        
       <li class='nav-item'>
       <a href='misesco.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour scolarité </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='misexam.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour des examens </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='miseaut.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour arbre de noel, frais de TD... </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='misesortie.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour des sorties d'argent</p>
       </a>
     </li>
      <li class='nav-item'>
       <a href='proof.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Audit </p>
       </a>
     </li>
        
        </ul>
     </li>


       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}
//FIN FONDAT






//WEBMASTER


function webmaster(){
   
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
 
        ";
    
        echo "<li class='nav-item'>
                         <a href='deplacer.php' class='nav-link'>
                            
                          ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
                         </a></br></br>
                       </li>";
             
        
                echo "  


          <li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
            <i class='nav-icon fas fa-chart-pie'></i>
            <p>
              BILAN D'ENTREES DES CAISSES
              <i class='right fas fa-angle-left'></i>
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='bilrecjad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette journalière</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='bilrecperioad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur une periode</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='birecanad.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Recette sur l'année scolaire</p>
              </a>
            </li>
            <li class='nav-item'>
            <a href='etatgen.php' class='nav-link'>
              <i class='far fa-circle nav-icon'></i>
              <p>Etat général</p>
            </a>
          </li>
           </ul>
        </li>


           
        <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-th'></i>
            <p>
              SORTIE DES CAISSES
              <i class='right fas fa-angle-left'></i>
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='sorteff.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Effectuer une sortie d'argent</p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortjour.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties journalières </p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortperiod.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties sur une periode </p>
              </a>
            </li>
            <li class='nav-item'>
              <a href='sortan.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Historique des sorties sur l'année scolaire</p>
              </a>
            </li>
           </ul>
        </li>




  <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           ENREGISTREMENT DES ENSEIGNANTS  
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='ajoutensn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Cliquer pour gérer</p>
           </a>
         </li>
        
         
       </ul>
     </li>
     



      




     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-table'></i>
       <p>
         CONFIGURATION DES MATIERES, CLASSES ET MODALITES DE LA SCOLARITE
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='recond.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Reconduire les classes d'une année antérieure à l'année en cours</p>
     </a>
   </li>
       <li class='nav-item'>
         <a href='ajoutmat.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une matière</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutclasse.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Ajouter une classe </p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='ajoutmatclass.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Attribuer les matières dans les classes</p>
         </a>
       </li>
       
   <li class='nav-item'>
   <a href='anzeigmatclas.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>Afficher les matières par classe</p>
   </a>
 </li>
       <li class='nav-item'>
         <a href='configsco.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer les modalités de la scolarité</p>
         </a>
       </li>
       <li class='nav-item'>
         <a href='configfrais.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Gerer le montant de l'arbre de noel,travaux dirigés etc... </p>
         </a>
       </li>
       
 
       
     </ul>
   </li>



 

     <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-table'></i>
              <p>
                LISTE DES ELEVES ET PARENTS
                <i class='fas fa-angle-left right'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='listout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Tous les élèves</p>
                </a>
              </li>
             
              <li class='nav-item'>
                <a href='listclasse.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Par classe avec dossier médical et activités </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgen.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement francophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgcom.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement anglophone</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listensgind.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement bilingue</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='listanglo.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Enseignement autre</p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='certif.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Certificat de scolarité</p>
              </a>
            </li><li class='nav-item'>
              <a href='parent.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Liste des parents</p>
              </a>
            </li>
            </ul>
          </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              CONDUITE DES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='absedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les heures d'absences</p>
              </a>
            </li>
           
            <li class='nav-item'>
              <a href='retardedit.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Editer les retards</p>
              </a>
            </li>
            
            
          </ul>
        </li>


          <li class='nav-item'>
          <a href='#' class='nav-link'>
            <i class='nav-icon fas fa-copy'></i>
            <p>
              MODIFIER LES INFORMATIONS OU RECHERCHER LES ELEVES
              <i class='fas fa-angle-left right'></i>
               
            </p>
          </a>
          <ul class='nav nav-treeview'>
            <li class='nav-item'>
              <a href='nom.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Noms,prénoms,date de naissance etc ...</p>
              </a>
            </li>
           
            
            
            
          </ul>
        </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-book'></i>
         <p>
           ETATS DE SCOLARITE ET EXAMENS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='etatclass.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Etats scolarité par classe</p>
           </a>
         </li>
          
         <li class='nav-item'>
           <a href='etatexampay.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens payés</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='etatexampayn.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Les examens non payés</p>
           </a>
         </li>
         <li class='nav-item'>
              <a href='etatuniform.php' class='nav-link'>
                <i class='far fa-circle nav-icon'></i>
                <p>Les uniformes, arbre de noel...</p>
              </a>
            </li>
         <li class='nav-item'>
           <a href='infop.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Historique de paye par élève</p>
           </a>
         </li>
       </ul>
     </li>



         

     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='gestn1.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Inscrire le nombre d'évaluations par trimestre</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='insertnote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         <li class='nav-item'>
         <a href='insertcalcul.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>Calculer les moyennes, afficher les bulletins, statistiques</p>
         </a>
       </li>
       <li class='nav-item'>
           <a href='fichenote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Fiche manuelle de report des notes</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='verrounote.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Verrouiller les notes</p>
           </a>
         </li>
         <li class='nav-item'>
     <a href='deposujad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
         <a href='ancienbull/marknote.php' class='nav-link'>
           <i class='far fa-circle nav-icon'></i>
           <p>bulletin 2020/2021 ET 2021/2022</p>
         </a>
       </li>
        </ul>
     </li>


        
     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-th'></i>
         <p>
           GESTION DU PERSONNEL ADMINISTRATIF
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='enregad.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Enregistrer un membre administratif</p>
           </a>
         </li>
         
          
        </ul>
     </li>



     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         GESTION DES SALAIRES
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='salairens.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire des enseignants</p>
     </a>
   </li>
   <li class='nav-item'>
     <a href='salairad.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Salaire du personnel administratif</p>
     </a>
   </li>
        
     </ul>
     </li>


     <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='nav-icon fas fa-edit'></i>
       <p>
         STRUCTURE DE L'ETABLISSEMENT
         <i class='fas fa-angle-left right'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
       <li class='nav-item'>
     <a href='structureetab.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Gerer</p>
     </a>
   </li>
     </ul>
     </li>

     <li class='nav-item'>
     <a href='#' class='nav-link'>
       <i class='nav-icon fas fa-th'></i>
       <p>
         GESTION D'EMPLOI DE TEMPS
         <i class='right fas fa-angle-left'></i>
       </p>
     </a>
     <ul class='nav nav-treeview'>
     <li class='nav-item'>
     <a href='ecriremploi.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Editer l'emploi de temps</p>
     </a>
   </li>
   <li class='nav-item'>
     <a href='liremploi.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Afficher l'emploi de temps </p>
     </a>
   </li>
      </ul>
   </li>




     <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-edit'></i>
         <p>
           GESTION DES SMS
           <i class='fas fa-angle-left right'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='schenkesms.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Envoi d'sms</p>
       </a>
     </li>
         
       </ul>
       </li>

       
       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='fa fa-cog'></i>
         <p>
         PARAMETRES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='chgerimg.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer les en-têtes</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='suppdonnees.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Supprimer les données</p>
       </a>
     </li>
       <li class='nav-item'>
       <a href='motad.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Nom d'utilisateur, mot de passe</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='mode.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer de mode utilisateur</p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='modans.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Changer d'année scolaire</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='complexe.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Complexe d'établissements</p>
     </a>
   </li>
   <li class='nav-item'>
   <a href='reparer.php' class='nav-link'>
     <i class='far fa-circle nav-icon'></i>
     <p>actualiser le stockage</p>
   </a>
 </li>
   <li class='nav-item'>
     <a href='configsms.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Configuration des sms</p>
     </a>
   </li>
     </ul>   
     </li>

       <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
            CORRIGER LES ERREURS DE PAIEMENTS ET AUDIT
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
        
       <li class='nav-item'>
       <a href='misesco.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour scolarité </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='misexam.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour des examens </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='miseaut.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour arbre de noel, frais de TD... </p>
       </a>
     </li>
     <li class='nav-item'>
       <a href='misesortie.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>mise à jour des sorties d'argent</p>
       </a>
     </li>
      <li class='nav-item'>
       <a href='proof.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Audit </p>
       </a>
     </li>
        
        </ul>
     </li>


       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}
//FIN WEBMASTER


 




 













function enseignantcollege(){
  echo "  <nav class='mt-2'>
   <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
     <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
           <li class='nav-item'>
          <a href='deplacerensg.php' class='nav-link'>
            
           ALLER VERS D'AUTRES</br> ETABLISSEMENTS</p>
          </a></br></br>
        </li> 
        
  <li class='nav-item menu-open'>
       <a href='#' class='nav-link active'>
         <i class='nav-icon fas fa-tachometer-alt'></i>
         <p>
           MES INFORMATIONS ET REGLAGES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
         <li class='nav-item'>
           <a href='Classensg.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Mes classes et matières</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='Presencensg.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Liste de présence des élèves</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='liremploi2.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Mon emploi de temps</p>
           </a>
         </li>
         <li class='nav-item'>
           <a href='Motensg.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Modifier mon mot de passe</p>
           </a>
         </li>
        
         
         
         
       </ul>
     </li>
    <li class='nav-item'>
       <a href='#' class='nav-link'>
         <i class='nav-icon fas fa-chart-pie'></i>
         <p>
          GESTION DES NOTES
           <i class='right fas fa-angle-left'></i>
         </p>
       </a>
       <ul class='nav nav-treeview'>
       <li class='nav-item'>
       <a href='fichenotens.php' class='nav-link'>
         <i class='far fa-circle nav-icon'></i>
         <p>Fiche manuelle de report des notes</p>
       </a>
     </li>
     <li class='nav-item'>
     <a href='depotsuj.php' class='nav-link'>
       <i class='far fa-circle nav-icon'></i>
       <p>Envoyer les sujets</p>
     </a>
   </li>
         <li class='nav-item'>
           <a href='insertnoteEns.php' class='nav-link'>
             <i class='far fa-circle nav-icon'></i>
             <p>Insérer les notes</p>
           </a>
         </li>
         

        </ul>
     </li>
     

        
     
 

     

      




     
       <li class='nav-item'>
       </br></br><a href='index.php' class='nav-link'>
           <i class='far fa-squart nav-icon'></i>
         SE DECONNECTER</p>
         </a></br></br>
       </li>

     </nav>";
}




?>