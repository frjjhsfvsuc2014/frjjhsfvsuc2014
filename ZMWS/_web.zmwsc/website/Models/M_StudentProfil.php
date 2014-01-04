<?php

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA, CHARDON
  First name : Jérémy, Jonathan

  FILE
  Name : M_StudentProfil.php
  Last modified : 22/12/2013

  DESCRIPTION
  It is a model of student profil page.

  ---------------------------------------------------- */

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA
  First name : Jérémy

  FUNCTION
  Name : loadVisitCard
  Return : Array
  Role : Return informations on visit card of student.

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function loadStudentVisitCard($id) {

    $query = "SELECT stu_firstname, stu_lastname, stu_profession, stu_avatar, stu_county,"
            . " reg_email, add_number, add_street , tow_name, zip_code, pho_number"
            . " FROM student"
            . " INNER JOIN registered ON stu_reg_id = reg_id"
            . " INNER JOIN address ON add_reg_id = reg_id"
            . " INNER JOIN town ON tow_add_id = add_id"
            . " INNER JOIN zip_code ON zip_add_id = add_id"
            . " INNER JOIN phone ON  pho_reg_id = reg_id"
            . " WHERE stu_id=" . $id;
    $result = mysql_query($query);
    return mysql_fetch_array($result);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : loadStudentPresentation
  Return : Array
  Role : Return  student's presentation.

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function loadStudentPresentation($id) {

    $query = "SELECT stu_presentation FROM student WHERE stu_id=" . $id;

    $result = mysql_query($query);
    return mysql_fetch_array($result);
}

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA
  First name : Jérémy

  FUNCTION
  Name : loadCountId
  Return : Number
  Role : Return one if the student exist on database

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function loadCountId($id) {

    $query = "SELECT count(*) as nbId FROM student WHERE stu_id=" . $id;

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);

//Return the number of students

    return $result["nbId"];
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : loadXPStudent
  Return : Array
  Role :

  PARAMETER
  $id :

  ---------------------------------------------------- */

function loadXPStudent($id) {

    $query = "SELECT ent_name, ent_URLWebsite, exp_responsability, exp_function, exp_id, exp_duration
FROM experience INNER JOIN entreprise ON exp_ent_id = ent_id
AND exp_stu_id =" . $id;

    $result = mysql_query($query);

    return $result;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : LoadFormationStudent
  Return : Array
  Role :

  PARAMETER
  $id :

  ---------------------------------------------------- */

function LoadFormationStudent($id) {

    $query = "SELECT sch_name, dip_name , dip_id FROM student 
INNNER JOIN diploma ON stu_id = dip_stu_id 
INNER JOIN school ON sch_id = dip_sch_id
WHERE stu_id =" . $id;

    $result = mysql_query($query);

    return $result;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : LoadSkillsStudent
  Return : Array
  Role :

  PARAMETER
  $id :

  ---------------------------------------------------- */

function LoadSkillsStudent($id) {

    $query = "SELECT qua_name, qua_id FROM student 
INNNER JOIN qualification ON stu_id = qua_stu_id 
WHERE stu_id =" . $id;

    $result = mysql_query($query);

    return $result;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : updateStudentVisitCard
  Return : void
  Role : update student visitCard

  PARAMETER
  too much

  ---------------------------------------------------- */

function updateStudentVisitCard($id, $name, $firstName, $fonction, $streetNumber, $adress, $zipCode, $town, $phone, $email, $avatar) {

    $add_id = null;

    $reg_id = get_reg_id($id);

    if ($reg_id != null) {

        if (updateStudentTable($id, $name, $firstName, $fonction, $avatar)) {

            if (updateEmail($reg_id, $email)) {

                if (updateAdress($reg_id, $streetNumber, $adress)) {

                    $add_id = getAdd_id($reg_id);

                    if ($add_id != null) {

                        if (updateZipCode($add_id, $zipCode)) {

                            if (updateTown($add_id, $town)) {

                                if (updatePhone($reg_id, $phone)) {
                                    
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
            print "impossible de mettre à jour les champs de la table etudiant";
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
  Name : get_reg_id
  Return : Boolean
  Role : get reg_id where stu_id = $id

  PARAMETER
  $id : id of student


  ---------------------------------------------------- */

function get_reg_id($id) {

    $query = "SELECT stu_reg_id  FROM student WHERE stu_id=" . $id;

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);

    return $result["stu_reg_id"];
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : updateStudentTable
  Return : number of rows affected
  Role :  update student Table

  PARAMETER
  too much

  ---------------------------------------------------- */

function updateStudentTable($id, $name, $firstName, $fonction, $avatar) {

    $query = "UPDATE student"
            . " SET stu_lastname ='" . $name . "',"
            . " stu_firstname ='" . $firstName . "',"
            . " stu_profession ='" . $fonction . "',"
            . " stu_avatar ='" . $avatar . "',"
            . " stu_lastname ='" . $name . "'"
            . " WHERE stu_id = '" . $id . "'";
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : updateEmail
  Return : void
  Role :  update email

  PARAMETER
  $reg_id : registered student id


  ---------------------------------------------------- */

function updateEmail($reg_id, $email) {

    $query = "UPDATE registered"
            . " SET reg_email ='" . $email . "'"
            . " WHERE reg_id = '" . $reg_id . "'";

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

function updateTown($add_id, $town) {
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
  $town : student town

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
  Name : updateStudentPresentation
  Return : void
  Role :  update student presentation

  PARAMETER
  $id : id of student


  ---------------------------------------------------- */

function updatePresentation($id, $presentation) {

    $query = "UPDATE student"
            . " SET stu_presentation ='" . $presentation . "'"
            . " WHERE stu_id =" . $id;

    mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : insertStudentSkills
  Return : void
  Role :  insert new student skill

  PARAMETER
  $id : id of student
  $addSkill: new skill

  ---------------------------------------------------- */

function insertStudentSkills($id, $addSkill) {

    $query = "INSERT INTO qualification (qua_stu_id, qua_name)"
            . " VALUE ('" . $id . "','" . $addSkill . "')";
    mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : deleteStudentSkills
  Return : void
  Role :  delete one student skill

  PARAMETER
  $id : id of skill

  ---------------------------------------------------- */

function deleteStudentSkills($id) {

    $query = "DELETE FROM qualification"
            . " WHERE qua_id = " . $id;
    mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : entrepriseAlreadyExist
  Return : void or entreprise id
  Role : check if entreprise Already Exist on the database
 * in this case the fonction return the entreprise ID, return false if the entreprise is unknown

  PARAMETER
  $entrepriseName

  ---------------------------------------------------- */

function entrepriseAlreadyExist($entrepriseName) {

    $query = "SELECT ent_id"
            . " FROM entreprise "
            . "WHERE ent_name LIKE '%" . $entrepriseName . "%'";
    $result = mysql_query($query);

//TODO case of more than 1 return not managed yet

    if (mysql_affected_rows() >= 1) {
        $regid = mysql_fetch_array($result);
        return $regid["ent_id"];
    } else {
        return false;
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : insertStudentXPUnknownEntreprise
  Return : void
  Role :  insert new XP qnd new entreprise when the entreprise in Unknown
  PARAMETER
  $id : id of skill

  ---------------------------------------------------- */

function insertStudentXPUnknownEntreprise($id, $xpDuration, $functionXP, $EntrepriseName, $responsability) {
    $query = "INSERT INTO entreprise (ent_name)"
            . " VALUE('" . $EntrepriseName . "')";


    $result = mysql_query($query);

    $query = "INSERT INTO experience(exp_stu_id,exp_ent_id, exp_function, exp_responsability,exp_duration)"
            . "VALUE ('" . $id . "',LAST_INSERT_ID(),'" . $functionXP . "','" . $responsability . "','" . $xpDuration . "') ";
    $result = mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : insertStudentXPknownEntreprise
  Return : void
  Role :  insert new XP when the entreprise in known
  PARAMETER
  $id : id of skill

  ---------------------------------------------------- */

function insertStudentXPKnownEntreprise($id, $xpDuration, $fonctionXP, $entrepriseID, $responsability) {
    $query = "INSERT INTO experience(exp_stu_id,exp_ent_id, exp_function, exp_responsability,exp_duration)"
            . "VALUE ('" . $id . "','" . $entrepriseID . "','" . $functionXP . "','" . $responsability . "','" . $xpDuration . "') ";

    $result = mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : deleteStudentXP
  Return : void
  Role : Delete XP of Student
  PARAMETER
  $id : id of skill

  ---------------------------------------------------- */

function deleteStudentXP($id) {

    $query = "DELETE FROM experience"
            . " WHERE exp_id = " . $id;

    mysql_query($query);
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : insertStudentFormation
  Return : void
  Role : InsertNewFormations
  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function schoolAlreadyExist($schoolName) {

    $query = "SELECT sch_id"
            . " FROM school "
            . "WHERE sch_name LIKE '%" . $schoolName . "%'";
    $result = mysql_query($query);

//TODO case of more than 1 return not managed yet

    if (mysql_affected_rows() == 1) {

        $regid = mysql_fetch_array($result);
        return $regid["sch_id"];
    } else {

        return false;
    }
}

function insertStudentFormationKnowSchool($id, $id_school, $formationName) {
    
    $query = "INSERT INTO diploma (dip_name, dip_stu_id, dip_sch_id)"
            . " VALUE ('" . $formationName . "','" . $id . "','" . $id_school . "')";
    $result = mysql_query($query);

    return $result;
}

function insertStudentFormationUnKnowSchool($id, $schoolName, $formationName) {

    $query = "INSERT INTO school (sch_name)"
            . " VALUE('" . $schoolName . "')";
    $result = mysql_query($query);


    $query = "INSERT INTO diploma (dip_name, dip_stu_id, dip_sch_id)"
            . " VALUE ('" . $formationName . "','" . $id . "',LAST_INSERT_ID())";
    $result = mysql_query($query);

    return $result;
}

function deleteStudentDiploma($deleteDiploma){

    $query = "DELETE FROM diploma"
            . " WHERE dip_id = " . $deleteDiploma;
    
    mysql_query($query);
}
    

?>

