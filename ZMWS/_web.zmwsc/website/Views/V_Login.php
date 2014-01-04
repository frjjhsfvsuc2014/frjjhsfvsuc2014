<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : V_Page1.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a controller of Page1 page.

----------------------------------------------------*/

headerPage("Login"); //This function display header of page.

?>

<div id="connection" class="container">
	<form action="index.php?page=Login&Submit" method="post">					
	   <input type="text" name="username" />
	   <input type="text" name="password" type="password" value="password" />
	   <input type="submit" name="connection" value="<?php print getXmlText("login"); ?>" />
	</form>	  			
</div>

<?php

if(isset($loged))
	print "<font>" . getXmlText("error") . "</font>";

footerPage(); //This function display footer of page.

?>
