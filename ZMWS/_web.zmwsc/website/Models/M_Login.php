<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : M_Page1.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a model of Page1 page.

----------------------------------------------------*/

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : logIn
	Return : -
	Role : Log user on website
	
	PARAMETER
	

----------------------------------------------------*/
function logIn($username, $password)
{
	
	$password = hash('md5', hash('sha256', hash('ripemd160', "1Mù%jJuY!BbV.O°0HlMo+z&:" . $password . ":1Gv}z&*/Kl_5k;mqt,à<Qq48-a")));

	$sqlQuery = "SELECT count(*) as nbAccount, reg_id FROM registered WHERE reg_login='" . $username . "' AND reg_password='" . $password . "'";

	$result = mysql_query($sqlQuery);
	$resultTab = mysql_fetch_array($result);
	
	if ($resultTab["nbAccount"])
	{ 
		$_SESSION['id'] = $resultTab["reg_id"];
		$_SESSION['token'] = generateToken();
		return 1;
	}	
	else
		return 0;

}

?>