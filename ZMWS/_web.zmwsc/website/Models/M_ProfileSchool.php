<?php
/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FILE
	Name : M_Page1.php
	Last modified : 09/02/2013
	
	DESCRIPTION
	It is a model of school profil page.

----------------------------------------------------*/

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadInfos
	Return : Array
	Role : Return informations on a school.
	
	PARAMETER
	$id : id of school

----------------------------------------------------*/
function loadInfos($id)
{

	$query = "SELECT * FROM school WHERE sch_id=" . $id . ";";
	
	$result = mysql_query($query);
	
	return mysql_fetch_array($result);

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadCountId
	Return : Number
	Role : Return one if the school exist on database
	
	PARAMETER
	$id : id of school

----------------------------------------------------*/
function loadCountId($id)
{

	$query = "SELECT count(*) as nbId FROM student WHERE stu_id=" . $id;
	
	$result = mysql_query($query);
	
	$result = mysql_fetch_array($result);
	
	//Return the number of students
	
	return $result["nbId"];

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadInfos
	Return : Array
	Role : Return informations on a school's traine.
	
	PARAMETER
	$id : id of school
	$firstRecording : Number of first recording
	$lastRecording :  Number of last recording

----------------------------------------------------*/
function loadTraining($id, $firstRecording=0, $lastRecording=30)
{

	$query = "SELECT tra_id, CONCAT(tra_name, ' - ', tra_specialty) AS trainingDisplay 
	FROM training 
	WHERE tra_sch_id=" . $id . " 
	LIMIT " . $firstRecording . ", " . $lastRecording . ";";
	
	$result = mysql_query($query);
	
	return $result;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadAddress
	Return : Array
	Role : Return address informations on a school.
	
	PARAMETER
	$id : id of school
	$firstRecording : Number of first recording
	$lastRecording :  Number of last recording
	
----------------------------------------------------*/
function loadAddress($id, $firstRecording=0, $lastRecording=30)
{

	$query = "SELECT CONCAT(add_number, ', ', add_street) AS addressDisplay 
	FROM (address INNER JOIN registered ON address.add_reg_id = registered.reg_id 
	INNER JOIN school ON address.add_reg_id = school.sch_reg_id) 
	WHERE sch_id=" . $id . " 
	LIMIT " . $firstRecording . ", " . $lastRecording . ";";
	
	$result = mysql_query($query);
	
	return $result;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadPhone
	Return : Array
	Role : Return phone informations on a school.
	
	PARAMETER
	$id : id of school
	$firstRecording : Number of first recording
	$lastRecording :  Number of last recording
	
----------------------------------------------------*/
function loadPhone($id, $firstRecording=0, $lastRecording=30)
{

	$query = "SELECT pho_number 
	FROM (phone INNER JOIN registered ON phone.pho_reg_id = registered.reg_id 
	INNER JOIN school ON phone.pho_reg_id = school.sch_reg_id) 
	WHERE sch_id=" . $id . " 
	LIMIT " . $firstRecording . ", " . $lastRecording . ";";
	
	$result = mysql_query($query);
	
	return $result;

}

/*--------------------------------------------------

	AUTHOR
	Last name : ZYRA
	First name : Jérémy

	FUNCTION
	Name : loadMail
	Return : Array
	Role : Return mail informations on a school.
	
	PARAMETER
	$id : id of school
	$firstRecording : Number of first recording
	$lastRecording :  Number of last recording
	
----------------------------------------------------*/
function loadMail($id)
{

	$query = "SELECT reg_email 
	FROM registered 
	INNER JOIN school ON sch_reg_id = reg_id 
	WHERE sch_id=" . $id . ";";
	
	$result = mysql_query($query);
	
	$result = mysql_fetch_array($result);
	
	return $result["reg_email"];

}
?>
