
# Nom de l'application : AGAES
  Adresse email pour contacter AGAES : borelware@gmail.com

# Gestion d'établissement scolaire : Système camerounais

Application web de  gestion d'établissements scolaires permettant l'envoi des SMS ,la gestion des classes, des matières ,
 des frais de scolarité,des élèves,  des enseignants , des notes, des bulletins, des présences, des absences et fournir les rapports statistiques
 AGAES est multi-utilisateur. Chaque utilisateur posssède un nom d'utiliateur et un mot de passe pour 
 se connecter et peut avoir avoir un ou plusieurs rôles.


## Technologies 
   Backend : PHP 
   Frontend : HTML, CSS, JAVASRIPT
   Datenbank : MySQL


## Premier pas
Installer wampserver si ce n'est pas encore installé
Decompresser le fichier AGAES_PROJEKT.zip
Placer le dossier AGAES_PROJEKT dans le dossier www de Wampserver

## Fichiers à la racine du dossier AGAES_PROJEKT
- `index.php` : page d'accueil présentant les grands modules du logiciel
- `lesmenus.php` : le dashboard de chaque type d'utilisateur.
- `agaesbd.txt`    : base de données de AGAES
- `lesfunctions.php`, `lesmenushoriz.php`, `lesmenushoriz2.php`,`inscripfunction.php`, `lesemplois.php`,
   `bullinfo.php`      : ces fichiers contiennent toutes les fonctions utilisées dans cette application.

- `lienC2.php` : connexion à la base de données `agaesbd`


## Les dossiers à la racine du dossier AGAES_PROJEKT
- `ESSAI` : représente le dossier d'un établissement (Test)
     ***** Fichiers du dossier `ESSAI` ****
      - `bd.txt` contient la base de données pour l'essai


## Structure du projet

 
AGAES_PROJEKT/
├── index.php
├── bullinfo.php
├── lienC2.php
├── agaesbd.txt
├── ...
├── ESSAI/ 
    ├──   index.php
    ├──   lien.php
    ├──   connecterC.php
    ├──   essaibd.txt
    ├──   ...

└── README.md



## Démarrage 
Créer la base de données agaesbd et créer ses tables sous phpmyadmin
Les tables de la base de données `agaesbd` se trouve dans le fichier agaesbd.txt à la racine 

Créer la base de données essaibd et créer ses tables sous phpmyadmin
Les tables de la base de données `essaibd` se trouve dans le fichier essaibd.txt du dossier `ESSAI`

Sous Wampserver
 l'adresse à saisir dans la barre d'adresse du navigateur est :
 http://localhost/AGAES_PROJEKT/ESSAI
Sous un hebergeur un ligne
 remplacer 'http://localhost/' par votre nom de domaine ou sous domaine

 Cliquer sur se connecter
   Administrateur 
        `nom d'utilisateur`: test
        `mot de passe`: test   
        L'année scolaire contenant déjà des données pour test est 2025/2026

## Création d'un nouvel établissement
   Lorsqu'il faut ajouter un nouvel établissement scolaire, on procède comme suit :
   - Création de sa base de données
   - Créer un nouveau dossier (Beispiel : schule1 ) 
   - copier le contenu du dossier `ESSAI` vers le dossier Schule1
   - copier le contenu du fichier `leere_datenbank.txt` qui se trouve dans le dossier `ESSAI` vers l'espace reservé aux requetes SQL de la base de données dans `phpmyadmin`, puis exécuter la requète. Le contenu de ce fichier représente les tables de la base de données.

   - Aller dans la table `prorogation` au niveau du champs `date` pour modifier la date d'expiration d'utilisation de l'abonnement de cet établisement nouvellement crée. (Choisir une date dans le futur)
   Celà permet de fixer la date de fin l'abonnement.
   Lorsque la date est expirée , certaines fonctionnaliés sont bloquées

   - Configurer dans le fichier `lien.php` se trouve dans le dossier schule1 les paramètres de connexion à la base de données du nouvel établissement.
   A l'interieur on peut : 
    - modifier les paramètres de connexion de la base de données
    
  Si le dossier de l'établissement est 'Schule1' alors 
  l'adresse à saisir dans la barre d'adresse du navigateur
  http://localhost/AGAES_PROJEKT/Schule1

   - Au pied de page de l'interface affichée cliquer sur webmaster
        `nom utilisateur`: web
        `mot de passe`: web
   - Se connecter et enregistrer le fondateur de cet établissement   

 
## Rôles
- Administrateur(Fondateur, principal, censeur, économe, secretaire, surveillant général)
- Enseignant
- Parent/Elève

## Fonctionnalités

- Ajouter un membre de l'administration (webmaster, fondateur)
- Configurer les classes , les matières (Fondateur)
- Configrer les couts de la scolarité (Fondateur, principal)
- Inscrire un éleve, effectuer les paiements de la scolarité (Fondateur, économe)
- Consulter le bilan financier (Fondateur, économe)
- Modifier les données personnelles d'un élève (Fondateur, principal,secretaire,censeur,économe)
- Supprimer un élève , modifier et supprimer un paiement (Fondateur)
- Ajouter , supprimer et modifier les données d'un enseignant(Fondateur, principal,secretaire,censeur)
- Attribuer les matères et classes aux enseignants(Fondateur, principal,secretaire,censeur)
- Gérer les heures d'absences des élèves (Fondateur, principal,secretaire,censeur, surveillant général)
- Saisir des notes (Fondateur, principal,secretaire,censeur, enseignant)
- Verouiller la saisie des notes (Fondateur, principal)
  chaque enseignat saisit les notes lui concernant
- Saisir les heures effectués par les enseignans (Fondateur, principal,secretaire,censeur)
- Enregistrer le paiement des salaires (Fondateur, principal)
- Imprimer les résultats trimestrielles des élèves (Fondateur, principal,secretaire,censeur)
- Envoi des SMS (Fondateur, principal)
- Envoi des sujets d'évaluation et des travaux dirigés  (Fondateur, principal,secretaire,censeur, enseignant)
- Les parents ou élèves peuvent consulter l'état d'avancement de leur scolarité, les heures d'absences

## Explications sur les bases de données
 Chaque établissement ajouté a droit à une base de données et dossier qui doivent être crées. 
 Par exemple notre établissement de test a pour dossier ESSAI. Sa base de données est
 `essaibd`.

 == Les tables ne sont plus d'actualités pour le developpement mais elles ne doivent absolument pas être modifiées car elles representent les tables des anciennes versions ==
    `1ere_sequence` ,`2eme_sequence`, `3eme_sequence`, `4eme_sequence`,
    `5eme_sequence`, `6eme_sequence`, `7eme_sequence`, `8eme_sequence`, `9eme_sequence`, 
   `admini`,  `classe1`, `3eme_sequence`, `competence`, `competenceclas`, `3eme_sequence`, `eleve1`, 
   `enseignantanc`, `evaluation`, `honneur`, `matiere1`, `moyenne`, `moyenneannuel`, `moyennetrim`, `moymatieretrim`, 
   `moymatiereeval`, `3eme_sequence`, `note`, `notegroupval`, `notenew`, `notetrimestre`, `proof`,
   `proofdetail`,  `proofmdifdetail`, `schuler`, `schulerdetail`, `trim1`, `trim2`, `trim3`, 

==  Toutes les tables suivantes sont d'actualité
    `absence` stocke les absences des élèves
    `admin` stocke les données personnels des administrateurs et le webmasters
    `admin_poste` stocke les identifiants des administrateurs et leurs différents rôles
    `admin_salaire` stocke les identifiants des administrateurs et leurs salaires
    `autrefrais` stocke les motifs des frais facultatifs à l'inscription
    `autrefraispaye` stocke les paiements des frais facultatifs
    `batiment` stocke les informations des bâtiments de l'établissement
    `classe` stocke les classes de l'établissement
    `cordon` stocke la configuration des coûts de la scolarité 
    `delai` permet de verrouiller la saisie des notes
    `detail` permet de stocker les frais divers exigibles et les paiements de la scolarité des élèves 
    `devise` est la devise de la monnaie utilisée lors de l'affichage des paiements
    `eleve` stocke les donées personnelles des élèves et leur classes dans une année scolaire 
    `emploi` stocke les identifiants des enseignants, des matières, des classes, des jours pour l'élaboration de l'emploi de temps
    `enseigmatclass`   stocke les identifiants  des matières(`idmat`) , des classes (`idclas`)
    des enseignants(`idens`), l'année scolaire(`anens`), le champs `titulaire` pour désigner le titulaire
    `enseignant` stocke les données personnelles des enseignants
    `enseigsalaire` stocke la grille salariale de chaque enseignant (par heure ou taux fixe)
    `evaltrim` stocke le nombre maximal d'évaluations par trimestre dans chaque classe. On a
    les identifants pour la classe (`idcl`), le code du trimestre (`codetrim`) , 
    le nombre d'évaluations du trimestre (`nbre`), l'année scolaire (`anens`)
    `exam` stocke le paiements des frais d'examens des élèves
    `fact` est utilsé pour créer les matricules internes dans de chaque élève dans l'application
    chaque élève possède dans un premier temps un matricule national qui est fourni par le ministère de l'enseignament secondaire. Ce matricule est à saisir ici dans AGAES lors de l'inscription de l'élève. Donc l'élève possède dans notre système un matricule nationle et un matricule interne. 
    C'est le matricule interne qui est utilisé pour le traitement des données.

    Le système d'éducation du secondaire est organisé sur 3 trimestres. Compte tenu de celà et le nombre important des élèves , les notes de chaque trimestre sont dans chaque table.

`marktrim1` stocke les notes du trimestre 1 de chaque élève
    cette table est organisée comme suit : le maticul de l'élève (`matelev`), la classe (`idcl` ) ,
    la matière (`idmat`), le groupe de la matière (`idgp`), la note d'une matère de la première evaluation du trimestre   (`mark1`) , la note d'une matère de la deuxième evaluation du trimestre   (`mark2`) ,la note d'une matère de la troisième evaluation du trimestre   (`mark3`) ,
    la note trimestrielle d'une matière dans le trimestre   (`notetrim`) , 
    le coefficient de la matière (`coef`) , la note trimestrielle coefficiciée de la matière dans le trimestre 1 (`notrimcoef`) , les notes coefficiées de chaque matière dans la première evaluation du trimestre (`m1c`) , deuxième evaluation (`m2c`) , troisième evaluation (`m3c`) .
    (`rg1`) ,(`rg2`) ,(`rg3`) (`rgtrim`) ,les rangs respectifs des élèves dans chaque evaluation et du trimestre
    (`compet1`) ,(`compet2`) ,(`compet3`) les compétences évaluées respectivement dans une matière dans le trimestre
    (`mcltrim`) la moyenne générale trimestrielle dd'une classe  en une matière
    (`mintrim`) la plus petite moyenne trimestrielle d'une classe en une matière
    (`maxtrim`) la plus grande moyenne trimestrielle d'une classe  en une matière
    (`cpse`) effectf des élèves évalués dans une classe en une matière
     (`adm`) le nombre d'élèves admis dans une classe en une matière
      (`pctrim`) pourcentage de réussite des élèves évalués dans une classe en une matière

 cette précédente configuration est pareille dans les trimestre 2 (`marktrim2`) ET trimestre 3 (`marktrim3`)

 (`markmoytrim1`) , (`markmoytrimé2`) , (`markmoytrim3`) Contiennent les moyennes trimestrielles et d'évaluations de chaque élève

  (`markgrouptrim1`) , (`markgrouptrimé2`) , (`markgrouptrim3`) Contiennent les moyennes trimestrielles de chaque groupe de matières de chaque élève

  la table (`pointage`) contient le nombre d'heures enseignées par les enseignants
    la table (`prorogation`) permet d'inserer la date maximale pour l'abonnement de l'établissement
  la table (`remise`) contient les types de reductions de la scolarité à accorder aux élèves
    la table (`retard`) permet de pointer les retards à l'école des élèves
    la table (`salaire`) les paiemens de salaires des enseignants
    la table (`salaireadmin`) les paiements des salaires des administrateurs
    la table (`sujet`)  permet de stocker les sujets dévaluations et des travaux dirigés
