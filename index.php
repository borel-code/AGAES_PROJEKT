<?php
session_cache_limiter('private_no_expire,must-revalidate');session_start();
 require 'lesmenusac.php';
 $bloc=0;$actif=$bloc; $pageactif=0;
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="AGAES : plateforme moderne de gestion d'établissement scolaire.">
  <title>AGAES | OFFICIEL | LOGICIEL SCOLAIRE</title>
  <link rel="stylesheet" href="home.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="#accueil" aria-label="AGAES - Accueil"><img src=" AGAES2.png" height="55px" width="100px" alt="">
     
      <!--span class="brand-description">Application de Gestion Administrative<br>d’un Établissement Scolaire</span-->
    </a>
  <nav class="nav">
    <a class="current" href="#accueil">Accueil</a>
    <a href="#fonctionnalites">Fonctionnalités</a>
    <a href="#avantages">Avantages</a>
    
    <a href="#contact">Contact</a>
  </nav>
  <a class="login login-top" target='_blank' href="ESSAI/">Essayez gratuitement</a>
</header>

<main>
  <section class="hero" id="accueil">
    <div class="hero-copy">
      <p class="eyebrow">UNE ÉCOLE MIEUX GÉRÉE, UN AVENIR MEILLEUR</p>
      <h1>Bienvenue sur <span>AGAES</span></h1>
      <h2>La solution intelligente pour la gestion de votre établissement scolaire</h2>
      <p class="hero-description">Simplifiez la gestion des élèves, des enseignants, des classes, des notes, des présences et des frais de scolarité grâce à une plateforme moderne et facile à utiliser.</p>
      <div class="hero-actions">
        <a class="button button-gold" href="https://wa.me/+4915510591193">Nous contacter <span class='fab fa-whatsapp' style='color:white';></span><span>→</span></a>
        <a class="button button-outline" target='_blank' href="ESSAI/"><span>▶</span> Essayez AGAES</a>
      </div>
      <div class="hero-trust"><span>✓</span> Simple à utiliser <span>✓</span> Données organisées <span>✓</span> Accès sécurisé</div>
    </div>
    <div class="hero-image" role="img" aria-label="Établissement scolaire et élèves"></div>
    <div class="hero-ribbon">APPRENDRE AUJOURD’HUI<br><strong>POUR CONSTRUIRE DEMAIN</strong></div>
  </section>

  <section class="features section" id="fonctionnalites">
    <div class="section-heading">
      <div><p class="eyebrow dark-eyebrow">TOUT AU MÊME ENDROIT</p><h2>Une gestion scolaire plus simple</h2></div>
      <p>Les outils essentiels pour organiser efficacement la vie de votre établissement.</p>
    </div>
    <div class="feature-grid">
      <article class="feature-card"><div class="feature-icon violet">♟</div><h3>Gestion des élèves</h3><p>Inscriptions, dossiers et suivi des élèves.</p></article>
      <article class="feature-card"><div class="feature-icon green">♙</div><h3>Enseignants</h3><p>Profils, affectations et suivi du personnel.</p></article>
      <article class="feature-card"><div class="feature-icon blue">🎓</div><h3>Classes et matières</h3><p>Organisation des classes et des matières.</p></article>
      <article class="feature-card"><div class="feature-icon orange">▤</div><h3>Notes et bulletins</h3><p>Saisie des notes et calcul des moyennes.</p></article>
      <article class="feature-card"><div class="feature-icon red"></div><h3>Frais de scolarité</h3><p>Suivi des paiements et des impayés.</p></article>
      <article class="feature-card"><div class="feature-icon cyan">▦</div><h3>Présences</h3><p>Suivi des présences, absences et retards.</p></article>
      <article class="feature-card"><div class="feature-icon gold">↗</div><h3>Rapports</h3><p>Indicateurs et rapports de l’établissement.</p></article>
    </div>
  </section>

  <section class="benefits section" id="avantages">
    <div class="books-image" role="img" aria-label="Livres et matériel scolaire"></div>
    <div class="benefit-copy">
      <p class="eyebrow dark-eyebrow">POURQUOI CHOISIR AGAES ?</p>
      <h2>Plus de clarté pour l’administration, plus de temps pour l’éducation.</h2>
      <ul>
        <li>Une interface claire et facile à prendre en main</li>
        <li>Les informations scolaires centralisées</li>
        <li>Un suivi plus rapide des opérations quotidiennes</li>
        <li>Une organisation adaptée aux différents utilisateurs</li>
        <li>Une collaboration entre votre établissement et les parents</li>
      </ul>
      <!--a class="text-link" href="#apropos">Découvrir notre vision <span>→</span></a-->
    </div>
    <aside class="quote-card">
      <span class="quote-mark">“</span>
      <p>Une école bien organisée crée les conditions de la réussite.</p>
      <small>AGAES — Ensemble vers l’excellence</small>
    </aside>
  </section>

  <section class="about section" id="apropos">
    <div class="about-icon">🏫</div>
    <div><p class="eyebrow">NOTRE AMBITION</p><h2>Mettre le numérique au service de l’éducation.</h2><p>AGAES accompagne les établissements scolaires dans l’organisation de leurs activités quotidiennes avec une solution centralisée et évolutive.</p></div>
    <a class="button button-light" href="ESSAI/">Accéder à la plateforme →</a>
  </section>
</main>

<footer class="footer" id="contact">
  <a class="footer-brand" href="#accueil"><span>🎓</span> AGAES</a>
  <p>Application de Gestion Administrative<br>d’un Établissement Scolaire</p>
  <div class="footer-links">
    
  <a href="mailto:borelware@gmail.com">borelware@gmail.com</a> 
<a href='https://wa.me/+4915510591193'>cliquez ici pour contacter l'équipe par whatsapp +4915510591193</a></div>
  <small>© <?php echo date('Y');?> AGAES. Tous droits réservés.<br>Bâtir aujourd’hui l’éducation de demain.</small>
</footer>
</body>
</html>
