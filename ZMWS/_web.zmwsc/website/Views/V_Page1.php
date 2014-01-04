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

headerPage("Page 1"); //This function display header of page.

function DisplayLanguage()
{
	$dirname = './language/';
	$dir = opendir($dirname); 

	print "<SELECT name=\"language\" size=\"1\">";
	while($file = readdir($dir)) 
	{
		if($file != '.' && $file != '..' && !is_dir($dirname.$file) && substr($file, 0, 1) != ".")
		{
			$file = substr($file, 0, -4);
			print "<option value=\"" . $file  . "\">" . $file . "</a>";
		}
	}
	print "</SELECT>";
}

?>

<h4><?php print getXmlText("exemple1"); ?></h4>

<form action="./index.php?page=Page1" method="POST">
	<?php print getXmlText("choose"); ?>
	<?php DisplayLanguage();  ?>
	<input type="submit" value="<?php print getXmlText("send"); ?>" />	
</form>

<?php

footerPage(); //This function display footer of page.

?>
