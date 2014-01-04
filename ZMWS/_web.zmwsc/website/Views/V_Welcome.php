<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : V_Welcome.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a controller of Welcome page.

----------------------------------------------------*/

headerPage(); //This function display header of page.

?>

<h4><?php print getXmlText("welcome"); ?></h4>

<?php

footerPage(); //This function display footer of page.

?>
