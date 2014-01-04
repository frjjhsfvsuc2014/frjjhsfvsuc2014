<!----------------------------------------------------

	AUTHOR
	Last name : ZYRA, CARRERE
	First name : Jérémy

	FILE
	Name : index.html
	Last modified : 03/03/2013
	
	DESCRIPTION
	This page contain the basic html code.

------------------------------------------------------>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Horizon-Stage</title>

	
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../css/style.css" rel="stylesheet" media="screen">
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>




<?php
	include 'menu.php';
?>	

<div id="body">	
	
	<div id="presentationEntreprise" class="container">	
		<img src="../img/logo.gif" width="100" height="100" alt="Avatar" /><h1>Orange</h1>
		<br><br><br><br><h2>Presentation</h2>
		<p>

		Mon métier change avec Orange
		Chez Orange, nous sommes 170 000 femmes et hommes à accompagner chaque jour nos clients pour faciliter leur vie numérique partout dans le monde. En nous rejoignant, vous découvrirez toute une diversité de métiers au cœur du monde numérique.
		Nos métiers
		Quels que soient votre profil et vos atouts, il y a chez Orange un poste fait pour vous. Venez exprimer pleinement vos talents dans nos nombreux domaines d’activité.

		</p>
	<div>
	
	<div id="news" class="container">	
	<h2>Nos News, c'est aussi</h2>
		<table class="table">
		
						
		<tr>
			<td>Orange est pr��sent au 22��me Forum ATUGE - Orange jobs - actualit��s</td>
		</tr>
		
		<tr>
			<td>l'alternance vous int��resse ? - Orange jobs - actualit��s</td>
		</tr>
		
		
		</table>	
	<div>
	
	
	<div id="intership" class="container">	
		<h2>Offres de stages</h2>
		<table class="table">			
			<tr>
				<td>Offres 1 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			
				<td>Offres 2 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			
				<td>Offres 3 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			</tr>
			<tr>
				<td>Offres 1 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			
				<td>Offres 2 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			
				<td>Offres 3 <br>Orange France <br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</td>
			</tr>
		</table>
	<div>
	
	

	
	<div id="myCarousel" class="carousel slide">
		<h2>Nos Adresses</h2>
		<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Carousel items -->
		<div class="carousel-inner">
		<div class="active item"><img src="../img/images0.jpg"  WIDTH=300 HEIGHT=200/></div>
		<div class="item"><img src="../img/images1.jpg" WIDTH=300 HEIGHT=200/></div>
		<div class="item"><img src="../img/images2.jpg" WIDTH=300 HEIGHT=200/> Orange france</div>
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>	
	
	
	<div id="contact" class="container">	
		<h2>Nous contacter</h2>
			<table id="contactEntreprise">
				<tr><td>rh-contact@orange.fr</td></tr>	
				<tr><td><a href="www.orange.fr">www.orange.fr</a></td></tr>	
			</table>
	<div>
	<?php
		include 'footer.php';
	?>	
<div>


	
	
	
	
	
	
	
	
	
	