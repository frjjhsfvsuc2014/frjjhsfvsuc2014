<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FILE
	Name : C_Page1.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a controller of Page1 page.

----------------------------------------------------*/

include_once("./Models/M_Login.php"); //Include Model

if(!isset($_SESSION['id']))
{

	if(isset($_GET["Submit"]))
	{
		$loged = logIn(filterUserEntryGlobal($_POST["username"]), filterUserEntryGlobal($_POST["password"]));
		if($loged)
			header('location: index.php');
	}

	include_once("./Views/V_Login.php"); //Include View
}
else
	include_once("./Views/V_AlreadyLogged.php"); //Include View

?>