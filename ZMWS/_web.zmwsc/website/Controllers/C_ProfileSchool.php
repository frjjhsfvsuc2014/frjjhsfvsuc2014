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

include_once("./Models/M_ProfileSchool.php");

//Recuperation de l'ID de l'utilisateur
if(isset($_GET["id"]))
	$id = filterUserEntryGlobal($_GET["id"], 1);
else
	$id = -1;

//Compte le nombre d'enregistrement dans la base correspondant a cet id.
$countId = loadCountId($id); 

//Si il y a un enregistrement, cela veut dire que l'etudiant existe, on inclus donc la vue pour afficher le profil. Si non, on mes un message d'erreur.
if ($countId == 1)
	include_once("./Views/V_ProfileSchool.php");
else
	include_once("./Views/V_UserNotFound.php");

?>
