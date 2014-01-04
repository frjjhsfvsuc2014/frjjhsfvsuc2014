<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : M_BusinessProfil.php
	Last modified : 09/07/2013
	
	DESCRIPTION
	It is a model of business profil page.

----------------------------------------------------*/

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadBusinessInfos
	Return : Array
	Role : Return informations on Business.
	
	PARAMETER
	$id : id of business

----------------------------------------------------*/
function loadBusinessInfos($id)
{

	$query = "SELECT * FROM entreprise WHERE En_id=" . $id;
	$result = mysql_query($query);
	
	return mysql_fetch_array($result);

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadCountId
	Return : Array
	Role : Return one if the business exist on database.
	
	PARAMETER
	$id : id of business

----------------------------------------------------*/

function loadCountId($id)
{

	$query = "SELECT count(*) as nbId FROM entreprise WHERE En_id=" . $id;
	$result = mysql_query($query);
	
	$result = mysql_fetch_array($result);
	
	return $result["nbId"];

}

?>

