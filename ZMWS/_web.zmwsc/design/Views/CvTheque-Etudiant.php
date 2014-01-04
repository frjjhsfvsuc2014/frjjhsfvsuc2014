<!----------------------------------------------------

	AUTHOR
	Last name : LAFOSSE
	First name : Vincent

	FILE
	Name : CvTheque-Etudiant
	Last modified : 04/07/2013
	
	DESCRIPTION
	This page contain AJAX code the Library Student.

------------------------------------------------------>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link href="../css/style.css" rel="stylesheet" media="screen">
		<style type="text/css">
			.picture{
				height: 200px;
				width: 200px;
				background-color: blue;
			}
			.offer{		
			    border-left-width: 10px;
				padding-left: 20px;
				background-color: green;
			}
			.contact{
				padding-left: 20px;
				background-color: purple;
			}
			.description{
				padding-top: 10px;
				background-color: yellow;
			}
			.ancre{
				border-color: black;
				margin-left: -20px;
				width: 50px;
				height: 452px;
			}
			.lettre{
				width: 60px;
				list-style: none;
			}
			.firstLetter{
				background-color: gray; 
				color: white;
			}
			.filter{
				background-color: gray;
				margin-bottom: 25px;
				height: 25px;
			}
			.firstName{
				padding: 5px 0 5px 0;
				background-color: green;
			}
			.name{
				padding: 5px 0 5px 0;
				background-color: yellow;
			}
			.addresse{
				padding: 5px 0 5px 0;
				background-color: brown;
				color: white;
			}
			.phone{
				padding: 5px 0 5px 0;
				background-color: purple;
				color: white;
			}
			.website{
				padding: 5px 0 5px 0;				
			}
			.avatar{
				padding: 10px 5px 0 60px;
				color: white;
				background-color: blue;
			}
			.center{
				text-align: center;
			}
		</style>
	</head>
	<body>	
		<div id="container" class=" container-narrow">
			<div id="menu">
				<?php
					include 'menu.php';
				?>
			</div>	
			<form ACTION="#" method="post">
				<div class='container'>
					<p><h1>La CVTheque &agrave; quatre colonnes</h1></p>				
					<div class="navbar navbar-static">
		              <div class="navbar-inner">
		                <div class="" style="width: auto;">
		                  <a class="brand" >Liste filtres</a>
		                  <ul class="nav" role="navigation">
		                    <li class="dropdown">
		                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Filtre 1 <b class="caret"></b></a>
		                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre</a></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 2</a></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 3</a></li>
		                        <li role="presentation" class="divider"></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 4</a></li>
		                      </ul>
		                    </li>
		                    <li class="dropdown">
		                      <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Filtre 2 <b class="caret"></b></a>
		                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre</a></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 2</a></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 3</a></li>
		                        <li role="presentation" class="divider"></li>
		                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Filtre 4</a></li>
		                      </ul>
		                    </li>
		                  </ul>                  
		                </div>
		              </div>
		            </div>
					<div class="row">
						<div class="span3">
							<div class="control-group">
								<div class="controls">
									<select id="region" class="ajaxList" data- size="25" name="region-id">
										<option value="1">Entreprises</option>
										<option value="2">Lieux</option>
										<option value="3">Secteurs</option>
										<option value="4">Activit&eacute; r&eacute;centes</option>
									</select>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="control-group" style="display: block;">
								<div class="controls">
									<select  size="25" >
										<option id="M" class="firstLetter">M</option>
										<option value="3">Mathilde Szavour</option>
										<option id="L" class="firstLetter">L</option>
										<option value="2">Ledurant Laurent</option>
										<option id="T" class="firstLetter">T</option>
										<option value="3">Toto plouf</option>
										<option value="3">Tom cruise</option>
									</select>
								</div>
							</div>
						</div>
						<div class="span1 ancre">
							<ul size="25" class="lettre">
								<li value="lettre"><a href="#0">0</a></li>
								<li value="lettre"><a href="#A">A</a></li>
								<li value="lettre"><a href="#B">B</a></li>
								<li value="lettre"><a href="#C">C</a></li>
								<li value="lettre"><a href="#D">D</a></li>
								<li value="lettre"><a href="#">E</a></li>
								<li value="lettre"><a href="#">F</a></li>
								<li value="lettre"><a href="#">G</a></li>
								<li value="lettre"><a href="#">H</a></li>
								<li value="lettre"><a href="#">I</a></li>
								<li value="lettre"><a href="#">J</a></li>
								<li value="lettre"><a href="#">K</a></li>
								<li value="lettre"><a href="#">L</a></li>
								<li value="lettre"><a href="#">M</a></li>
								<li value="lettre"><a href="#">N</a></li>
								<li value="lettre"><a href="#">Q</a></li>
								<li value="lettre"><a href="#">P</a></li>
								<li value="lettre"><a href="#">R</a></li>
								<li value="lettre"><a href="#">S</a></li>
								<li value="lettre"><a href="#">t</a></li>
								<li value="lettre"><a href="#">v</a></li>
								<li value="lettre"><a href="#">w</a></li>
								<li value="lettre"><a href="#">z</a></li>			
							</ul>
						</div>
						<div class="control-group span3">
							<div class="controls">								
									<div id="hcard" style="margin-left:0px;" >	
										<table>		
											<tbody class="center"><tr>
											<td><img src="../img/avatar.png" width="130" height="80" alt="Avatar"></td><td>
												<i class=" icon-pencil" style="margin-left: 200px;margin-top: 10px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modifier</i>
												<h1>Radjiv CARRERE</h1>
												<h2>&nbsp;&nbsp;&nbsp;Software Developper</h2>
												&nbsp;&nbsp;&nbsp;Villejuif <br>
												&nbsp;&nbsp;&nbsp;Tel:&nbsp; <b>7441425 225 </b> <br>
												&nbsp;&nbsp;&nbsp;mail:&nbsp; <b>tre e@trter </b><br>											
											</td>
											</tr>
										</tbody></table>										
									</div>
									<!--<table>
										<tr>
											<td class="firstName">
												First Name
											</td>
											<td class="avatar" rowspan="4">
												Photo
											</td>
										</tr>
										<tr>
	 										<td class="name">
												Name
											</td>
										</tr>
										<tr>
											<td class="addresse">
											 	adresse
											</td>
										</tr>
										<tr>
											<td class="phone">
											 	Num Tel
											</td>
										</tr>
										<tr>
											<td classe="website">
											 	Liens Web
											</td>
										</tr>
									</table>-->
								</div>
						</div>

					</div>
				</div>
			</form>
		</div>
	<footer>
		<?php
			include 'footer.php';
		?>
		<!-- insertion du javascrip -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</footer>
</body>
</html>