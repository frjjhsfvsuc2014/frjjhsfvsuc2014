<!---------------------------------------------------------+

	AUTHOR
	Last name : CHARDON
	First name : Jonathan 

	FILE
	Name : advancedResearch.php
	Last modified : 02/06/2013
	
	DESCRIPTION
	
	This page contain the advanced research form in HTML 
	without the PHP code.

+---------------------------------------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Horizon-Stage</title>

	<link href="../css/style.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body style=" padding: 0px;"> <!-- For IE -->
<?php
		include 'menu.php';
	?>

		<div id = "advancedSearchBox" class="container">
			<div id="headerSearch">
			<form method="post" action="">
				
				<h1>Vous recherchez ...</h1><input type="text" name="zipcode" data-provide="typeahead"  >
				<br><br>
				<!-- not yet implanted in the database -->
			</div>
				<div id= "FirstColumn">
					<label for="pays">Pays</label>
					<select name="pays" id="pays">
						<option value="france">France</option>
						<option value="espagne">Espagne</option>
						<option value="italie">Italie</option>
						<option value="royaume-uni">Royaume-Uni</option>
						<option value="canada">Canada</option>
						<option value="etats-unis">États-Unis</option>
						<option value="chine">Chine</option>
						<option value="japon">Japon</option>
					</select>

				
					<!-- not yet implanted in the database -->
			
					<label for="jobs"> M&eacute;tier</label>
					<select name="jobs" id="jobs">
					   <option value="plomblier">plombier</option>
					   <option value="platrier">platrier</option>
					   <option value="charcutier">charcutier</option>
					   <option value="graphiste">graphiste</option>
					   <option value="developpeur">developpeur</option>
					   <option value="chirurgien">chirurgien</option>
					   <option value="dentiste">dentiste</option>
					</select>
				
				
					<!-- not yet implemented in the database -->	
			
					<label for="area">Zone Geographique</label>
					<select name="area" id="area">
					   <option value="france">France</option>
					   <option value="espagne">Espagne</option>
					   <option value="italie">Italie</option>
					   <option value="royaume-uni">Royaume-Uni</option>
					   <option value="canada">Canada</option>
					   <option value="etats-unis">États-Unis</option>
					   <option value="chine">Chine</option>
					   <option value="japon">Japon</option>
					</select>
				
					Code Postal : <input type="text" name="zipcode">
					
				
					<label for="contract">Dans un rayon de : </label>
					<select name="contract" id="contract">
						<option value="distance1">80 km</option>
						<option value="distance2">100 km</option>
						<option value="distance3">150 km</option>
						<option value="distance4">200 km</option>
					   
					</select>	
				</div>
				
				<div id = "secondColumn">
						<!-- not yet implemented in the database -->	

						<label for="contract">Type de contrat</label>
						<select name="contract" id="contract">
							<option value="intern">Stage</option>
							<option value="alternation">Alternance</option>
							<option value="professional">Contrat Pro</option>
							
						</select>
					   
						<!-- not yet implemented in the database -->	
			
						<label for="area">Exp&eacute;rience</label>
						<select name="XPLevel" id="XPLevel">
							<option value="none">Aucune</option>
							<option value="oneYear">1 ans</option>
							<option value="twoYears">2 ans</option>
							<option value="TreeYears">3 ans et plus</option>
						</select>
					   
						<!-- not yet implemented in the database -->	
			
						<label for="Appeared">Parues</label>
						<select name="Appeared" id="Appeared">
							<option value="all">Aujourd'hui</option>
							<option value="oneYear">Il y a une semaine</option>
							<option value="twoYears">Il y a un mois</option>
							<option value="TreeYears">3 ans et plus</option>
						</select>
					   
					   
						<label for="sizeOfEntreprise">Taille de l'entreprise</label>
						<select name="sizeOfEntreprise" id="sizeOfEntreprise">
							<option value="smallAndMedium">PME</option>
							<option value="big">Grande</option>
							<option value="World">multinational</option>
						  
						</select>
				</div>	 
					<br>	
				<div id="buttonGroup">	
				   <button class="btn btn-warning" type="button" type="submit" value="Annuler" >Annuler</button>
				   <button class="btn btn-warning" type="button" type="submit" value="Trouver" >Trouver</button>
				</div>
			
			</form>

		</div>
		
		
		

	<?php
		include 'footer.php';
	?>	

	</body>
</html>