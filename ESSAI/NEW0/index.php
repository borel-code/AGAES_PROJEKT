<?php session_cache_limiter('private_no_expire,must-revalidate');
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
<!doctype html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>AGAES</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../vendors/linericon/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../vendors/animate-css/animate.css">
	<!-- main css -->
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6 col-4 header-top-left">
						<a href="tel:+237674 94 384">
							<span class="lnr lnr-phone"></span>
							<span class="text">
								<span class="text">+237674 494 384</span>
							</span>
						</a>
						<a href="mailto:agaesapplication@gmail.com">
							<span class="lnr lnr-envelope"></span>
							<span class="text">
								<span class="text">agaesapplication@gmail.com</span>
							</span>
						</a>
					</div>
					<div class="col-lg-6 col-sm-6 col-8 header-top-right">
						<a href="connexion1.html" class="text-uppercase">Connexion</a>
					</div>
				</div>
			</div>
		</div>

		<div class="main_menu">
			<div class="search_input" id="search_input_box">
				<div class="container">
					<form class="d-flex justify-content-between" method="" action="">
						<input type="text" class="form-control" id="search_input" placeholder="Search Here">
						<button type="submit" class="btn"></button>
						<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
					</form>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src=" AGAES2.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
							
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Administration</a>
								<ul class="dropdown-menu">
								    <li class="nav-item"><a class="nav-link" href="loginf.php">Connexion</a></li>
								    
									
								</ul>
							</li>
							
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Enseignements</a>
								<ul class="dropdown-menu">
									 
									<li class="nav-item"><a class="nav-link" href="login6.php">Enseignants</a></li>
									 
								</ul>
								
							</li>
							
							
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Messagerie</a>
								<ul class="dropdown-menu">
									 
									 <li class="nav-item"><a class="nav-link" href="Messagerie_Interne/index1.php">Envoyer / Recevoir</a></li>
								</ul>
							</li>
						
							
							 
							
							 
							
							<li class="nav-item">
								<a href="#" class="nav-link search" id="search">
									<i class="lnr lnr-magnifier"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->

	<!--================ Start Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="banner_content">
							<h2>
								Eduquer, c'est entendre le besoin.<br>
								Prévoyons l'avenir de nos futurs générations.
							</h2>
							<p>
								L'éducation est un procéssus continuel d'ajustement et réajustement. 
								L'important c'est que chacun de nous continue de se voir comme faisant partie de la solution plutôt  que du problème.
							</p>
							<div class="search_course_wrap">
								<form action="" class="form_box d-flex justify-content-between w-100">
									<input type="text" placeholder="Entrer un matricule à rechercher" class="form-control" name="username" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Search Courses'">
									<button type="submit" class="btn search_course_btn">recherche</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Start Feature Area =================-->
	<section class="feature_area">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-4">
					
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="fa fa-trophy"></span>
						</div>
						<div class="desc">
							<h4>Welcome</h4>
							<p>
								Bienvenu sur le site officiel AGAES, tout le plaisir est pour nous. Découvrez, explorer ...
							</p>
						</div>
					</div>
					
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="lnr lnr-book"></span>
						</div>
						<div class="desc">
							<h4>Classes Scientifiques</h4>
							<p>
								Dans l'histoire moderne de l'éducation, il y'a probablement de plus grand pas en avant pour l'intégrité et le développement.
							</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!--================ End Feature Area =================-->

	


	<!--================ Start Registration Area =================-->
	<div class="section_gap registration_area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Stop Coronavirus!</h1>
							<p>Dans le but de lutter et limiter la propagation du coronavirus, nous sommes priés de bien vouloir mettre en 
							pratique les mesures barrières prescrites par l'OMS.</p>
						</div>
						<div class="col clockinner1 clockinner">
							<h1 class="days">235</h1>
							<span class="smalltext">Jours</span>
						</div>
						<div class="col clockinner clockinner1">
							<h1 class="hours">23</h1>
							<span class="smalltext">Heures</span>
						</div>
						<div class="col clockinner clockinner1">
							<h1 class="minutes">47</h1>
							<span class="smalltext">Minutes</span>
						</div>
						<div class="col clockinner clockinner1">
							<h1 class="seconds">59</h1>
							<span class="smalltext">Secondes</span>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 offset-lg-1">
				            <div class="single_testimonial">
							
							<div class="testimonial_head">
								<img src="img/quote.png" alt="">
								<h4>Notation</h4>
								<div class="review">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="testimonial_content">
								<p>Les auteurs-réalisateurs.</p>
							</div>
						
					

					<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
						
						<div class="owl-thumb-item">
							<div class="position-relative">
								<img class="img-fluid" src="../img/instructors/A5.jpg" width="130px" alt="">
							</div>
							<div class="overlay-grad"></div>
						</div>
						<div class="owl-thumb-item">
							<div class="position-relative">
								<img class="img-fluid" src="../img/instructors/A2.png" width="142px" alt="">
							</div>
							<div class="overlay-grad"></div>
						</div>
						<div class="owl-thumb-item">
							<div class="position-relative">
								<img class="img-fluid" src="../img/instructors/A3.png" width="150px" alt="">
							</div>
							<div class="overlay-grad"></div>
						</div>
						</div>
					 </div>
                    </div>
				
			</div>
		</div>
	</div>
	<!--================ End Registration Area =================-->

	
	<!--================ Start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>A Propos</h4>
					<ul>
						<li><a href="loginw.php">Admin-site</a></li>
					 
					</ul>
				</div>
				<!--div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						Copyright ©
					</div>
				</div-->
			</div>
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white"> AGAES <?php echo date('Y');?> | +237 674494384 
					 </p>
				<div class="col-lg-4 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/stellar.js"></script>
	<script src="../js/countdown.js"></script>
	<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="../js/owl-carousel-thumb.min.js"></script>
	<script src="../js/jquery.ajaxchimp.min.js"></script>
	<script src="../vendors/counter-up/jquery.counterup.js"></script>
	<script src="../js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="../js/gmaps.min.js"></script>
	<script src="../js/theme.js"></script>
</body>

</html>