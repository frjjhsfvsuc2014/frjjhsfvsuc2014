<!----------------------------------------------------

	AUTHOR
	Last name : ZYRA
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

<body style=" padding: 0px;"> <!-- For IE -->


<?php
	include 'menu.php';
?>	


	
		
			
			
		
		<div id="body_profilStudent">
			<?php include'visitCardPublic.php'?>
			<div id="presentation">	
				<h1>Presentation  </h1>
				<p>Bonjour à vous, Passionné par l'informatique depuis presque 3 ans, j'ai vu , étudié et pratiqué plusieurs langages informatiques allant de C jusqu'au PHP en passant par une multitude d'autres langages dont notamment le C++ , le JAVA... etc.Après avoir validé un BTS IRIS (Brevet Technicien Supérieur dans Informatique Réseaux pour l'Industrie et les Services). Je poursuit ma formation à l'institut G4 de paris en partenariat avec Alcatel-Lucent en tant que Développeur JAVA/J2EE dans le but de validé un cursus d'ingénierie double compétence Informatique et management aboutissant sur un diplôme de "Chef de Projet en Systèmes d'information" reconnu par l'état de niveau 1 (BAC +5) et d'une certification du Project Management Institut ou PMI. 
					Polyvalent, sérieux et rigoureux, toujours au fil de l'actualité informatique, je maintiens et renforce mes connaissances poussé par la motivation de m'améliorer de jour en jour. Je vous remercie de votre visite et vous invite à consulter mon parcours.
				</p>
				
			</div>
			
			<div id="experience" >	
				<h1>Experience</h1>
				<table class="table">						
				<tr>
					<td width=1 bgcolor=#ff3333></td>
					<td><h2>Software developer JAVA/J2EE</h2><br><h3><a href="www.alcatel-lucent.fr">Alcatel-Lucent</a>  </h3>
					<p><br>Refonte d’applications WEB pour la gestion de la qualité du logiciel</p></td>
				</tr>
				
				<tr>
					<td width=1 bgcolor=#ff3333></td>
					<td><h2>Chef de projet</h2><br><h3><a href="#">Horizon Stage</a> </h3>
					<p><br>Recrutement des développeurs, management, organisation,
					planification, étude de marché.</p></td>
				</tr>
				
				
				</table>
			</div>
		
			<div id="formation" >
				<h1>Formation</h1>	
				<table  class="table">
					<tr>
						<td width=1 bgcolor=#ff9900></td>
						<td><h2>Institut International D'Ingénierie Informatique Et De Management</h2><br>4IM Informatique et Management<br>Chef de Projet en Systeme d'information</td>
					</tr>
					<tr>
						<td width=1 bgcolor=#ff9900></td>
						<td><h2>lycee edmont michelet</h2><br>BTS IRIS</td>
					</tr>
				</table>
			</div>	
				
			<div id="competance" >	
				<h1>Competance</h1> 
					<table class="table">			
						<tr>
							<td><h2>Reseaux</h2></td> <td><h2>langage</h2></td> <td><h2>Management</h2></td> </h2>
						</tr>
						<tr>
							<td>vpn</td> <td>langage C</td> <td>merise</td> 
						</tr>
						<tr>
							<td>ip</td> <td>JAVA</td> <td>agile</td> 
						</tr>			
					</table>
			</div>
		
			<?php
				include 'footer.php';
			?>	
		
		</div>	
		
					<div id="colum">	
			<div id="calendar">	
				123456
				<script>
				<!--calendrier en jquery>
				
				</script>
			</div>
			<div id="contact" >	
				<h2>Mes contacts</h2>
				<table class="table">			
					<tr>
						<td>contact1</td> <td>contact1</td> <td>contact1</td> <td>contact1</td>
					</tr>
					<tr>
						<td>contact1</td> <td>contact1</td> <td>contact1</td> <td>contact1</td>
					</tr>
					<tr>
						<td>contact1</td> <td>contact1</td> <td>contact1</td> <td>contact1</td>
					</tr>
					<tr>
						<td>contact1</td> <td>contact1</td> <td>contact1</td> <td>contact1</td>
					</tr>
					
				</table>
			</div>
			
		<?php
				include 'news_small.php';
		?>
		
		
	</div>


	</body>
</html>

	
	
	
	
	
	
	
	
	
	