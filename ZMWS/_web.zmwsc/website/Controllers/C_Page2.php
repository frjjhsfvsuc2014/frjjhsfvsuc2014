<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : C_Page2.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a controller of Page2 page.

----------------------------------------------------*/

include_once("./Models/M_Page2.php"); //Include Model

if (isset($_POST["texte"]))
{
	$texte = filterUserEntryGlobal($_POST["texte"]); //Recover variable $_GET["texte"]
	include_once("./Views/V_Page2_AfficherTexte.php"); //Include view V_Page2_AfficherTexte.php if the user fill in the form.
}
else
	include_once("./Views/V_Page2_AfficherFormulaireTexte.php"); //Include view V_Page2_AfficherFormulaireTexte.php if the user don't fill the form. (This view display form)

?>
