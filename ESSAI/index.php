﻿<?php session_cache_limiter('private_no_expire,must-revalidate');
session_start();
$_SESSION['ENSEIG']=0;$_SESSION['ENSEIGTITUL']=0;
  $_SESSION['nom']=''; $_SESSION['code']='';
  $_SESSION['id']=''; $_SESSION['annee']='';$_SESSION['contenusms']='';
$_SESSION['klasms']=''; $_SESSION['mitteilung']= " ";
$_SESSION['engensg']=0;$_SESSION['modifensg']=0;$_SESSION['supensg']=0;
$_SESSION['supsesmat']=0;$_SESSION['titulaireaj']=0;$_SESSION['elevmodif']=0;
$_SESSION['elevsup']=0;$_SESSION['engadmin']=0;$_SESSION['modifadmin']=0;
$_SESSION['supadmin']=0; $_SESSION['engmisesco']=0;$_SESSION['modifmisesco']=0; 
$_SESSION['supmisesco']=0;$_SESSION['engmisexam']=0;$_SESSION['modifmisexam']=0;
$_SESSION['supmisexam']=0;$_SESSION['engmisesortie']=0;$_SESSION['modifmisesortie']=0;
$_SESSION['supmisesortie']=0;$_SESSION['engmiseaut']=0;$_SESSION['modifmiseaut']=0;
$_SESSION['supmiseaut']=0;$_SESSION['inscripnew']=0;
$_SESSION['engconfigfrais']=0;$_SESSION['modifconfigfrais']=0;
$_SESSION['supconfigfrais']=0;$_SESSION['engconfigremise']=0;
$_SESSION['modifconfigremise']=0; $_SESSION['supconfigremise']=0;
$_SESSION['engpointage']=0;$_SESSION['modifpointage']=0; 
$_SESSION['suppointage']=0;$_SESSION['modifmode']=0;$_SESSION['modifmotad']=0;
 $_SESSION['modifcomplexe']=0; $_SESSION['supcomplexe']=0;
 $_SESSION['modifconfigsms']=0; $_SESSION['supconfigsms']=0;
$_SESSION['modifsalairead']=0;$_SESSION['supsalairead']=0;$_SESSION['engsalairead']=0;
$_SESSION['msgengsalairead']=" ";$_SESSION['msgmodifsalairead']=" ";
$_SESSION['engpointsalad']=0;$_SESSION['recondaj']=0;


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="AGAES, une solution simple et moderne pour la gestion de votre établissement scolaire.">
  <title>AGAES | Un logiciel de gestion scolaire</title>
  <link rel="stylesheet" href="styleindex.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <header class="site-header">
    <a class="brand" href="#accueil" aria-label="AGAES - Accueil"><img src=" AGAES2.png" alt="">
     
      <span class="brand-description">Application de Gestion Administrative<br>d’un Établissement Scolaire</span>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="Ouvrir le menu" aria-expanded="false">☰</button>
    <nav class="main-nav" id="mainNav">
      <a class="active" href="#accueil">Accueil</a>
      <a href="#fonctionnalites">Fonctionnalités</a>
      
      <a class="login-button" href="loguer.php">♟ &nbsp; Se connecter</a>
    </nav>
  </header>

  <main>
    <section class="hero" id="accueil">
      <div class="hero-shade"></div>
      <div class="hero-content">
        <span class="eyebrow">Bienvenue sur</span>
        <h1>AGAES</h1>
        <h2>La solution complète pour la gestion de votre établissement scolaire</h2>
        <p>Gérez facilement vos élèves, enseignants, classes, notes, présences, frais de scolarité et bien plus encore.</p>
        <p class="hero-small">Avec AGAES, la gestion de votre école devient simple, rapide et efficace.</p>
        <div class="hero-actions">
          <a class="button button-primary" href="loguer.php">♟ &nbsp; Se connecter <span>→</span></a>
          <a class="button button-outline" href="#fonctionnalites"><span class="play-icon">▶</span> Découvrir AGAES</a>
        </div>
      </div>
    </section>

    <section class="features section-wrap" id="fonctionnalites">
      <div class="section-heading"><span></span><h2>Nos principales fonctionnalités</h2></div>
      <div class="feature-grid">
        <article class="feature-card">
          <div class="feature-icon blue">♟</div>
          <h3>Gestion des élèves</h3>
          <p>Inscription, suivi et gestion des profils élèves.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon green">👥</div>
          <h3>Gestion des enseignants</h3>
          <p>Enregistrement et suivi des enseignants.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon purple">▣</div>
          <h3>Gestion des classes</h3>
          <p>Organisation des classes et des matières.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon orange">▤</div>
          <h3>Notes et bulletins</h3>
          <p>Saisie des notes, moyennes et génération des bulletins.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon red">▤</div>
          <h3>Frais de scolarité</h3>
          <p>Suivi des paiements et des impayés.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon sky">▦</div>
          <h3>Présences et absences</h3>
          <p>Suivi des présences, absences et retards.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon teal">↗</div>
          <h3>Rapports et statistiques</h3>
          <p>Tableaux de bord et rapports détaillés.</p>
        </article>
      </div>
    </section>

    <section class="about" id="apropos">
      <div class="about-inner">
        <div class="school-symbol" aria-hidden="true">🏫</div>
        <div class="about-copy">
          <h2>Une école mieux organisée,<br>pour de meilleurs résultats</h2>
          <p>AGAES accompagne les établissements scolaires dans la digitalisation de leur gestion quotidienne.</p>
        </div>
        <p class="handwritten">Ensemble<br>vers l’excellence !</p>
        <div class="books-art" aria-hidden="true">📚</div>
      </div>
    </section>
  </main>

  <footer class="site-footer" id="contact">
    <a class="footer-brand" href="#accueil">
      <span aria-hidden="true">🎓</span><strong>AGAES</strong>
      <small>Application de Gestion  Administrative<br>d’un Établissement Scolaire</small>
    </a>
    <nav class="footer-nav" aria-label="Navigation de pied de page">
       
 
       
      <a target='_blank' href="http://agaesware.com">site officiel : agaesware.com</a><i>|</i>
      <a href="mailto:borelware@gmail.com">borelware@gmail.com</a><i>|</i>
      <a href='https://wa.me/+4915510591193'>cliquez ici pour contacter l'équipe par whatsapp +4915510591193</a>
      <a target='_blank' href="loginw.php">Webmaster</a><i>|</i>
    </nav>
    <p class="copyright">© <?php echo date('Y');?> AGAES. Tous droits réservés.<br>Bâtir aujourd’hui l’éducation de demain.</p>
  </footer>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    menuToggle.addEventListener('click', () => {
      const isOpen = mainNav.classList.toggle('is-open');
      menuToggle.setAttribute('aria-expanded', String(isOpen));
    });
  </script>
</body>
</html>