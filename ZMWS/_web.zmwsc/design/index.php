<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA, CARRERE
	First name : Jérémy, Radjiv

	FILE
	Name : index.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	This is the main controller and it include the controller according the variable $_GET["page"].

----------------------------------------------------*/
/*
include_once("./Controllers/C_FonctionsGlobal.php"); //Include the controller with the global function.

$page = filterUserEntryGlobal($_GET["page"]); //Recover variable $_GET["page"], the variable is filter by the function filterUserEntryGlobal()

switch($page) 
{

	case "Page1": //If $page is egual at "Page1"
		include_once("./Controllers/C_Page1.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
		
	case "Page2": //If $page is egual at "Page2"
		include_once("./Controllers/C_Page2.php"); //Include the controller of Page2 (The file name is the value of $page with "C_" prefix)
		break;
	
	//Other pages...
	
	default:
		include_once("./Controllers/C_Welcome.php"); //Include the controller of Welcome (The file name is the value of $page with "C_" prefix)
		break;

}
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>

		<title>Horizon-Stage</title>

		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body style=" padding: 0px;"> <!-- For IE -->
		<div id = "connection" class="container">
				<form action="Views/profilsEtudiant.php" method="post">
					
					   <input type="text" name="useraname"    >
					   <input type="text" name="password" type="password" value="password">
					   <input type="submit" name="connection" value="connection">
				</form>	  
					 
			
		</div>
	</body>
</html>