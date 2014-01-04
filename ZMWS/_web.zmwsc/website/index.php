<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA, CHARDON
	First name : Jeremy, Jonathan

	FILE
	Name : index.php
	Last modified : 18/07/2013
	
	DESCRIPTION
	This is the main controller and it include the controller according the variable $_GET["page"].

----------------------------------------------------*/

include_once("./Controllers/C_FonctionsGlobal.php"); //Include the controller with the global function.

initializeLanguage();
loginOnDatabase();

if (isset($_GET["page"]))
	$page = filterUserEntryGlobal($_GET["page"]); //Recover variable $_GET["page"], the variable is filter by the function filterUserEntryGlobal()
else
	$page = "";

switch($page) 
{

	case "Page1": //If $page is egual at "Page1"
		include_once("./Controllers/C_Page1.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
		
	case "Page2": //If $page is egual at "Page2"
		include_once("./Controllers/C_Page2.php"); //Include the controller of Page2 (The file name is the value of $page with "C_" prefix)
		break;
	
	case "SchoolProfil": //If $page is egual at "Page1"
		include_once("./Controllers/C_SchoolProfil.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;

	case "BusinessProfil": //If $page is egual at "Page1"
		include_once("./Controllers/C_BusinessProfil.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;

	case "Login": //If $page is egual at "Page1"
		include_once("./Controllers/C_Login.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
		
	case "Logout": //If $page is egual at "Page1"
		include_once("./Controllers/C_Logout.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
		
	case "StudentProfil": //If $page is egual at "Page1"
		include_once("./Controllers/C_StudentProfil.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
	
	case "EntrepriseProfil": //If $page is egual at "Page1"
		include_once("./Controllers/C_EntrepriseProfil.php"); //Include the controller of Page1 (The file name is the value of $page with "C_" prefix)
		break;
	//Other pages...
	
	default:
		include_once("./Controllers/C_Welcome.php"); //Include the controller of Welcome (The file name is the value of $page with "C_" prefix)
		break;

}

?>
