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

	<link href="../css/style.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body style=" padding: 0px;"> <!-- For IE -->


	<?php
		include 'menu.php';
	?>

	<div id="message" class="container" >	
		<h1>Message Recus</h1>
		
	
		<button class="btn btn-primary" type="button">Nouveau Message</button>
		<button class="btn btn-mini" type="button">Marquer comme lu</button>
		<button class="btn btn-mini" type="button">Supprimer</button>	
	
		
		
		<h2>11 Messages</h2>
		<table class="table">			
			<tr>
				<td><input type="checkbox" name="selection" value=""> </td><td width=15 ><img src="../img/avatar.png"  width="30" height="30" alt="Avatar" /></td><td><a href="profilsEtudiant.php">Yohan Goncalves</td> <td>Opportunité ile de france</td> <td><i class=" icon-remove"></i></td>
			</tr>
			
			<tr>
				<td><input type="checkbox" name="selection" value=""> </td><td width=15 ><img src="../img/avatar.png"  width="30" height="30" alt="Avatar" /></td><td><a href="profilsEtudiant.php">Pierre Machin</td> <td>Opportunité ile de france</td> <td><i class=" icon-remove"></i></td>
			</tr>
			
			<tr>
				<td><input type="checkbox" name="selection" value=""> </td><td width=15 ><img src="../img/avatar.png"  width="30" height="30" alt="Avatar" /></td><td><a href="profilsEntreprise.php">Pierre Couchard (Orange)</td> <td>Opportunité ile de france</td> <td><i class=" icon-remove"></i></td>
			</tr>
					
		</table>
	</div>
	
		



	<?php
		include 'footer.php';
	?>	

	</body>
</html>