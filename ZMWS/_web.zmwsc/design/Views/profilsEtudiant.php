<!----------------------------------------------------

	AUTHOR
	Last name : L
	First name : Vincent

	FILE
	Name : index.html
	Last modified : 11/07/2013
	
	DESCRIPTION
	Code retravaillé, suppression de balises inutile, remise en forme du code.
	Ajout: 	du calendrier, les couleur, le cadre description, fond sur les h1, 
			background-color, changement de couleur pour les barre d evenements.

------------------------------------------------------>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Horizon-Stage</title>

	
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../css/style.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- agenda -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  	<script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	</script>

</head>
<body>
	<div id="container" class=" container-narrow">
		<div id="menu">
			<?php
				include 'menu.php';
			?>
		</div>
		
		<div id="row-fluid_marketing" class="container">
			<!-- premiere colonne -->
			<div id="FirstColumn" class="span8 container">
				<div id="bandeau-pub"></div>
				<?php include "visitCard.php" ?>
				<div id="presentation">	
					<h1>Presentation</h1>
					<i class="icon-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier</i>
					<p>Bonjour à vous, Passionné par linformatique depuis presque 3 ans, 
					jai vu , étudié et pratiqué plusieurs langages informatiques allant de C jusquau PHP 
					en passant par une multitude dautres langages dont notamment le C++ , le JAVA... etc.
					Après avoir validé un BTS IRIS (Brevet Technicien Supérieur dans Informatique Réseaux 
						pour lIndustrie et les Services). Je poursuit ma formation à linstitut G4 de paris 
					en partenariat avec Alcatel-Lucent en tant que Développeur JAVA/J2EE dans le but de validé
					 un cursus dingénierie double compétence Informatique et management aboutissant sur un 
					 diplôme de Chef de Projet en Systèmes dinformation reconnu par létat de niveau 1 (BAC +5)
					  et dune certification du Project Management Institut ou PMI. 
						Polyvalent, sérieux et rigoureux, toujours au fil de lactualité informatique, je maintiens 
						et renforce mes connaissances poussé par la motivation de maméliorer de jour en jour. Je 
						vous remercie de votre visite et vous invite à consulter mon parcours.
					</p>					
				</div>				
				<div id="experience" >	
					<h1>Experience</h1><i class=" icon-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier</i>
					<table class="table">						
						<tr>
							<td width=1 bgcolor=#ff3333></td>
							<td>
								<h3>Software developer JAVA/J2EE</h3><br>
								<h4><a href="www.alcatel-lucent.fr">Alcatel-Lucent</a></h4>
								<p>
									<br />Refonte d’applications WEB pour la gestion de la qualité du logiciel
								</p>
							</td>
						</tr>					
						<tr>
							<td width=1 bgcolor=#ff3333></td>
							<td>
								<h3>Chef de projet</h3><br>
								<h4><a href="#">Horizon Stage</a></h4>
								<p>
									<br>Recrutement des développeurs, management, organisation, planification, étude de marché.
								</p>
							</td>
						</tr>
					</table>
				</div>			
				<div id="formation" >
					<h1>Formation</h1>
					<i class=" icon-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier</i>	
					<table  class="table">
						<tr>
							<td width=1 bgcolor=##02A320>
							</td>
							<td>
								<h3>Institut International DIngénierie Informatique Et De Management</h3><br>4IM Informatique et Management<br>Chef de Projet en Systeme dinformation
							</td>
						</tr>
						<tr>
							<td width=1 bgcolor=##02A320></td>
							<td>
								<h4>lycee edmont michelet</h4>
								<br>BTS IRIS
							</td>
						</tr>
					</table>
				</div>					
				<div id="competance" >	
					<h1>Comp&eacute;tance</h1> 
					<i class=" icon-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier</i>
					<table class="table">			
						<tr>
							<td>
								<h3>Reseaux</h3>
							</td>
							<td>
								<h3>langage</h3>
							</td>
							<td>
								<h3>Management</h3>
							</td>
						</tr>
						<tr>
							<td>vpn</td>
							<td>langage C</td>
							<td>merise</td> 
						</tr>
						<tr>
							<td>ip</td>
							<td>JAVA</td>
							<td>agile</td> 
						</tr>			
					</table>
				</div>			
			</div>	
			<!-- seconde colonne -->	
			<div id="secondColumn" class="span4">
				<div>	
					<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: relative; z-index: 1; display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">July</span>&nbsp;<span class="ui-datepicker-year">2013</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">5</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">6</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">7</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">12</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">13</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">14</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">15</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default ui-state-highlight ui-state-hover" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">19</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">20</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">21</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">22</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">26</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">27</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">28</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">30</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">31</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;
					</td>
					</tr>
					</tbody></table></div>

				</div>
				<div id="contact" >	
					<h2>Annuaire</h2>
					<table>			
						<tr>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
						</tr>
						<tr>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
						</tr>
						<tr>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
						</tr>
						<tr>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
							<td>contact1</td>
						</tr>					
					</table>
				</div>								
					<?php
						include 'newsSmall.php'
					?>
				</div>
			</div>
	</div>
</body>
<footer>
<?php
	include 'footer.php';
?>	
</footer>
</html>

	
	
	
	
	
	
	
	
	
	