<!----------------------------------------------------

	AUTHOR
	Last name : CARRERE
	First name : Radjiv

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
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body style=" padding: 0px;"> <!-- For IE -->


<?php
	include 'menu.php';
?>	

<div id="body">	
	
	<div id="HeaderNews" class="container" >
		<h2>Notification 14</h2>
		<table class="table">
			<tr>
				<td width= 30> <img src="../img/avatar.png"  width="40" height="30" alt="Avatar" /> </td> <td width= 20> <input type="text" value="Publier un statut "></td> <td><button class="btn btn-large btn-primary" height="32" type="button">Publier</button> </td>
	
			</tr>
		</table>
	
	
	</div>
	<div id="News" class="container" >	
		
		
		
		<table class="table">			
			<tr>
				<td width=15 ><img src="../img/logo.gif"  width="40" height="40" alt="Avatar" /></td><td><a href="profilsEntreprise.php"><h3>Orange</h3></a><p>a publier:</p><br> <p>est pr��sent au 22��me Forum ATUGE - Orange jobs - actualit��s </p></td>
			</tr>
			
			<tr>
				<td width=15 ><img src="../img/logo.gif"  width="40" height="40" alt="Avatar" /></td><td><a href="profilsEntreprise.php"><h3>Orange</h3></a><p>a publier:</p><br> <p>l'alternance vous int��resse ? - Orange jobs - actualit��s </p></td>
			</tr>
			
		</table>
	<div>
	<?php
		include 'footer.php';
	?>	
<div>
