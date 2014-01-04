<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FILE
	Name : C_BusinessProfil.php
	Last modified : 09/07/2013
	
	DESCRIPTION
	It is a controller of business profil page.

----------------------------------------------------*/


include_once("./Models/M_BusinessProfil.php");

//Recuperation de l'ID de l'utilisateur
if(isset($_GET["id"]))
	$id = filterUserEntryGlobal($_GET["id"], 1);
else
	$id = -1;

//Compte le nombre d'enregistrement dans la base correspondant a cet id.
$countId = loadCountId($id); 

//Si il y a un enregistrement, cela veut dire que l'etudiant existe, on inclus donc la vue pour afficher l'entreprise. Si non, on mes un message d'erreur.
if ($countId == 1)
	include_once("./Views/V_BusinessProfil.php");
else
	include_once("./Views/V_BusinessProfil.php");

?>