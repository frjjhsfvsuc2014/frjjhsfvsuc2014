<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : V_BusinessProfil.php
	Last modified : 09/07/2013
	
	DESCRIPTION
	It is a view of business profil page.

----------------------------------------------------*/

headerPage(getXmlText("title"));

//ID de l'user, étant donnée que la zone membre n'existe pas, on le fixe en dur en attendant.


?>

	<div id="body">
	<div class="container" id="presentationEntreprise">	
	<?php
	
		//Load Infos on business
		$arrayInfosBusiness = loadBusinessInfos($id);
		
		//Display infos on business
		print "<img src=\"" . $arrayInfosBusiness["En_avatar"] . "\" WIDTH=100 HEIGHT=100 /><h1>" . $arrayInfosBusiness["En_name"] . "</h1><br><br><br><br>";
		print "<h2>" . getXmlText("presentation") . "</h2>";
		print "<p>" . $arrayInfosBusiness["En_presentation"] . "</p>";
		
	
	?>


<?php	
	footerPage();
?>