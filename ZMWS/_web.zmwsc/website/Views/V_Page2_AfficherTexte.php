<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : V_Page2_AfficherTexte.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a controller of Page2 page.

----------------------------------------------------*/

headerPage(); //This function display header of page.

echo("<h4>" . getXmlText("textIs") . " : " . $texte . "</h4>");

footerPage(); //This function display footer of page.

?>
