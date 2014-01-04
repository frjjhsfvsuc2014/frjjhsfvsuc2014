<?php

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA, CHARDON
  First name : Jérémy, Jonathan

  FILE
  Name : M_SchoolProfil.php
  Last modified : 23/12/2013
  DESCRIPTION
  It is a model of school profil page.

  ---------------------------------------------------- */

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA, CHARDON
  First name : Jérémy, Jonathan

  FUNCTION
  Name : getVisitCard
  Return : Array
  Role : Return informations on a school.

  PARAMETER
  $id : id of school

  ---------------------------------------------------- */

function getVisitCard($id) {    
    $query = "SELECT `sch_name`, `sch_avatar`, `reg_email`, `add_number`, `add_street` , `tow_name`, `zip_code`, `pho_number`"
     ." FROM school"
     ." INNER JOIN registered ON sch_reg_id = reg_id" 
     ." INNER JOIN address ON add_reg_id = reg_id" 
     ." INNER JOIN town ON tow_add_id = add_id" 
     ." INNER JOIN zip_code ON zip_add_id = add_id" 
     ." INNER JOIN phone ON  pho_reg_id = reg_id"
     ." AND sch_id =" . $id;


    $result = mysql_query($query);
    return mysql_fetch_array($result);
}

function updateVisitCard($id, $schoolName, $streetNumber, $adress, $zipCode, $town, $phoneNumber, $email, $avatar) {

    $add_id = null;

    $reg_id = get_reg_id($id);

    if ($reg_id != null) {

        if (updateSchoolNameAndAvatar($reg_id, $schoolName, $avatar)) {

            if (updateEmail($reg_id, $email)) {

                if (updateAdress($reg_id, $streetNumber, $adress)) {

                    $add_id = getAdd_id($reg_id);

                    if ($add_id != null) {

                        if (updateZipCode($add_id, $zipCode)) {

                            if (updadeTown($add_id, $town)) {

                                if (updatePhone($reg_id, $phoneNumber)) {
                                    
                                } else {

                                    print "impossible de mettre a jour le numero de telephone";
                                }
                            } else {
                                print "impossible de mettre a jour la ville";
                            }
                        } else {
                            print "impossible de mettre a jour le code postal";
                        }
                    } else {
                        print "impossible de trouver  l'id de l'adresse";
                    }
                } else {

                    print "impossible de mettre a jour l'adresse";
                }
            } else {

                print "impossible de mettre a jour l'email";
            }
        } else {
            print "impossible de mettre à jour les champs nom de l'ecole et avatar";
        }
    } else {

        print "utilisateur non enregistré";
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : Updateschool
  Return : Boolean
  Role : get reg_id where school id

  PARAMETER
  $id : id of school


  ---------------------------------------------------- */

function get_reg_id($id) {

    $query = "SELECT sch_reg_id  FROM school WHERE sch_id=" . $id;

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);

    return $result["sch_reg_id"];
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : Updateschool
  Return : Boolean
  Role : update sch_name, sch_avatar return false if update fail .

  PARAMETER
  $id : id of school
  $schoolName : name of school
  $avatar : logo school url

  ---------------------------------------------------- */

function updateschoolNameAndAvatar($id, $schoolName, $avatar) {
    $query = "UPDATE school"
            . " SET sch_name = '" . $schoolName . "' , sch_avatar = '" . $avatar
            . "' WHERE sch_reg_id = " . $id;

    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : UpdateEmail
  Return : Boolean
  Role : update reg_email return false if update fail .

  PARAMETER
  $id : id of registered
  $email : email of school

  ---------------------------------------------------- */

function updateEmail($id, $email) {

    $query = "UPDATE registered "
            . "SET reg_email = '" . $email . "'"
            . " WHERE reg_id = " . $id;

    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : UpdateAdress
  Return : Boolean
  Role : update streetNumber adress return false if update fail .

  PARAMETER
  $id : id of registered
  $streetNumber : street number
  $Adress : adress
  ---------------------------------------------------- */

function updateAdress($id, $streetNumber, $adress) {

    $query = "UPDATE address "
            . "SET add_number ='" . $streetNumber . "'"
            . ", add_street =  '" . $adress . "'"
            . " WHERE add_reg_id = " . $id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : get_add_id
  Return : id_add_id
  Role : find add_id with reg_id .

  PARAMETER
  $id : id of registered

  ---------------------------------------------------- */

function getAdd_id($reg_Id) {

    $query = "SELECT `add_id`"
            . " FROM address "
            . "WHERE add_reg_id = " . $reg_Id;

    $result = mysql_query($query);
    $regid = mysql_fetch_array($result);
    return $regid["add_id"];
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : updateZipCode
  Return : boolean
  Role : find update zip code return false in case of failure

  PARAMETER
  $id : id of adress registred

  ---------------------------------------------------- */

function updateZipCode($add_id, $zip_code) {
    $query = "UPDATE zip_code"
            . " SET zip_code = '" . $zip_code . "'"
            . " WHERE add_zip_id = " . $add_id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : updateTown
  Return : boolean
  Role :  update town return false in case of failure

  PARAMETER
  $id : id of adress registred
  $town : school town

  ---------------------------------------------------- */

function updadeTown($add_id, $town) {
    $query = "UPDATE town"
            . " SET tow_name = '" . $town . "'"
            . " WHERE tow_add_id = " . $add_id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : updatePhone
  Return : boolean
  Role :  update Phone  return false in case of failure

  PARAMETER
  $id : id of adress registred
  $town : school town

  ---------------------------------------------------- */

function updatePhone($id, $phoneNumber) {
    $query = "UPDATE phone"
            . " SET pho_number = '" . $phoneNumber . "'"
            . " WHERE pho_reg_id = " . $id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : getPresentation
  Return : Array
  Role : Return  school's presentation .

  PARAMETER
  $id : id of school

  ---------------------------------------------------- */

function getPresentation($id) {
    $query = "SELECT `sch_presentation`"
            . " FROM school"
            . " WHERE sch_id = " . $id;

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);
    return $result;
}

function updateSchoolPresentation($id, $presentation) {

    $query = "UPDATE school"
            . " SET sch_presentation = '" . $presentation . "'"
            . " WHERE sch_id = " . $id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA
  First name : Jérémy

  FUNCTION
  Name : loadCountId
  Return : Number
  Role : Return one if the school exist on database

  PARAMETER
  $id : id of school

  ---------------------------------------------------- */

function loadCountId($id) {

    $query = "SELECT count(*) as nbId FROM student WHERE stu_id= '" . $id . "'";

    $result = mysql_query($query);

    $result = mysql_fetch_array($result);

    //Return the number of students

    return $result["nbId"];
}

/* --------------------------------------------------

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

  ---------------------------------------------------- */

function getTraining($id, $firstRecording = 0, $lastRecording = 30) {

    $query = "SELECT tra_id, tra_level ,tra_name, tra_speciality"
	. " FROM training"
	." WHERE tra_sch_id = " . $id 
	." LIMIT " . $firstRecording . ", " . $lastRecording . ";";
    
    $result = mysql_query($query);
    return $result;
}
/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : insertSchoolTraining
  Return : void
  Role : insert new school training

  PARAMETER
  $id : school id
  $level : diploma level ex MASTER
  $title : diploma title ex IRIS
  $speciality : diploma speciality ex electronics

  ---------------------------------------------------- */
function insertSchoolTraining($id, $level, $title, $speciality) {

    $query = "INSERT INTO training (tra_sch_id, tra_level, tra_name, tra_speciality)"
            . " VALUES ('" . $id . "', '" . $level . "','" . $title . "','" . $speciality . "');";
    $result = mysql_query($query);
}


function deleteSchoolTraining($id) {

    $query = "DELETE FROM training WHERE tra_id =" . $id;
    mysql_query($query);

}

?>
