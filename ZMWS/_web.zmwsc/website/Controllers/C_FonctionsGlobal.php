<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FILE
	Name : C_FonctionsGlobal.php
	Last modified : 05/02/2013
	
	DESCRIPTION
	This controller include the global functions of web site.

----------------------------------------------------*/

session_start();

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : loginOnDatabase
	Return : Nothing
	Role : initializes the connection on database.

----------------------------------------------------*/
function loginOnDatabase()
{

	//Define informations for login on database
	$server = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "horizon-stage";

	mysql_connect($server, $user, $password) or die("Error connecting on server.");

	mysql_select_db($database) or die("Error connecting on database.");
	

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : headerPage
	Return : Nothing
	Role : Display the header of HTML page.
	
	PARAMETER
	$title (optional) : The title of page.

----------------------------------------------------*/
function headerPage($title="Horizon-Stage")
{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
	<head>

		<title><?php echo $title ?></title>

		
		<link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="./css/style.css" rel="stylesheet" media="screen">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="./js/bootstrap.min.js"></script>
	</head>

	<body style=" padding: 0px;"> <!-- For IE -->






	<div id="headerProfilStudent" class="container">	
		
		<img src="./img/LogoHorizonStage2.png" WIDTH=200 HEIGHT=100/>

		<ul class="nav nav-tabs">
		<li><a href="./index.php"><?php print getXmlText("home", 1); ?></a></li>
		<li><a href="./index.php?page=StudentProfil"><?php print getXmlText("profil", 1); ?></a></li>
		
		
		<li><a href="./index.php?page=Page1"><?php print getXmlText("book", 1); ?></a></li>

		<li><a href="./index.php?page=Page2"><?php print getXmlText("post", 1); ?></a></li>
			
		
		
		<li><a href="schedrule.php"><?php print getXmlText("agenda", 1); ?></a></li>
		<li><a href="advancedSearch.php"><?php print getXmlText("search", 1); ?></a></li>
		
		<li><form class="navbar-search pull-left">
		<input type="text" class="search-query" placeholder="Search" data-provide="typeahead" >
		</form></li>
		
		
		</ul>
		
	</div>

<?php
}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : headerPage
	Return : Nothing
	Role : Display the footer of HTML page.

----------------------------------------------------*/
function footerPage()
{

?>
			
			</div>	
			



		</body>
	</html>

<?php

}


/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : filterUserEntrySQL
	Return : String
	Role : Filter the SQL special characters
	
	PARAMETER
	$valueToBeFiltered : The value to be filtered
	$isNumeric (optional) : Is a bool that indicates whether the value is a number or a string.

----------------------------------------------------*/
function filterUserEntrySQL($valueToBeFiltered, $isNumeric=0)
{

	$result = $valueToBeFiltered;
	
	if ($isNumeric == 1) //If the parameter must be numeric
	{
		if (!is_numeric($result)) //If the parameter is not numeric
			$result = -1; //The result is -1
	
	}
	else
		$result = mysql_real_escape_string($result); //Filter the SQL special characters
	
	return $result;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : filterUserEntryGlobal
	Return : String
	Role : Filter the global (SQL and HTML) special characters
	
	PARAMETER
	$valueToBeFiltered : The value to be filtered
	$isNumeric (optional) : Is a bool that indicates whether the value is a number or a string.

----------------------------------------------------*/
function filterUserEntryGlobal($valueToBeFiltered, $isNumeric=0)
{
	$result = $valueToBeFiltered;
	
	$result = filterUserEntrySQL($result, $isNumeric); //Filter the SQL special characters
	
	if ($isNumeric == 0)
		$result = htmlspecialchars($result); //Filter the HTML special characters
	
	return $result;
}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : getXmlText
	Return : String
	Role : Return the text for display on a page or -1 if there is an error.
	

	PARAMETER
	$alias : The name on the text tag in XML file.
	$global : If the text is in a tag <common> for display text on more pages.

----------------------------------------------------*/
function getXmlText($alias, $global=0)
{

	$path = "./language/";
	$extension = ".xml";
	$defaultFile = $path . "Francais" . $extension;
	

	if (isset($_POST["language"]))
		$file = $path . $_POST["language"] . $extension;

	else
		if (isset($_COOKIE["language"]))
			$file = $path . $_COOKIE["language"] . $extension;

		else
			$file = $defaultFile;
	
	if(!file_exists($file))
		$file = $defaultFile;
		
	$page = "index"; //The index is default page
	
	if (isset($_GET["page"]))
		$page = $_GET["page"]; //Recovery PHP page

	if ($global)
		$xpath = "/language/common/text[@name=\"" . $alias  . "\"]"; //The xpath request for recovery the text.
		
	else
		$xpath = "/language/page[@name=\"" . $page  . "\"]/text[@name=\"" . $alias  . "\"]"; //The xpath request for recovery the text.

	$xml = simplexml_load_file($file); //Load XML file

	$tabResult = $xml->xpath($xpath); //Run xpath request
	
	if(count($tabResult) != "1") //If count of taf is not equal to 1, there is an error
		$result = -1;

	else
		$result = $tabResult[0];


	return utf8_decode($result);	

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : initializeLanguage
	Return : Nothing
	Role : Initialize user's language.

----------------------------------------------------*/
function initializeLanguage()
{

	if(isset($_POST["language"]))
		setcookie("language", $_POST["language"], time() + (365*24*3600));

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : checkToken
	Return : Bool
	Role : Return 1 if token is user's token
	

	PARAMETER
	$token : Token to check.

----------------------------------------------------*/
function checkToken($token)
{

	if($_SESSION['token'] === $token)
		return 1;
	else
		return 0;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jeremy

	FUNCTION
	Name : generateHtmlRequestToken
	Return : String
	Role : Generate HTML code for send token with form.
	
	PARAMETER
	$typeRequest : GET or POST.

----------------------------------------------------*/
function generateHtmlRequestToken($typeRequest)
{

	if($typeRequest === "GET" || $typeRequest === 0)
		print "&token=" . $_SESSION['token'];
	
	else if ($typeRequest === "POST" || $typeRequest === 1)
		print "<input name=\"token\" type=\"hidden\" value=\"" . $_SESSION['token']  . "\" />";

	else
		print -1;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : generateToken
	Return : String
	Role : Generate random token for user.

----------------------------------------------------*/
function generateToken()
{

	$nbRand = rand(1, 5000);
	$nbHash = rand(1, 10);

	$token .= microtime(true);
	$token .= uniqid(rand(), true);

	for ($i = 0; $i <= $nbRand; $i++)
		$token .= rand();

	for ($i = 0; $i <= $nbHash; $i++)
	{

		$token = hash('ripemd160', $token);
		$token = hash('sha256', $token);
		$token = hash('md5', $token);

	}

	return $token;

}

?>
