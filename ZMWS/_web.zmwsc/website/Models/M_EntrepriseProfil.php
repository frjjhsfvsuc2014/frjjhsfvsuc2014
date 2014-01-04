<?php

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FILE
  Name : M_EntrepriseProfil.php
  Last modified : 18/07/2013

  DESCRIPTION
  It is a model of entreprise profil page.

  ---------------------------------------------------- */

function loadCountId($id) {
    $query = "SELECT count(*) as nbId FROM entreprise WHERE ent_id=" . $id;

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
  Name : loadEntreprisePresentation
  Return : Array
  Role : Return entreprise presentation.

  PARAMETER
  $id : id of Entreprise

  ---------------------------------------------------- */

function getVisitCard($id) {

    $query = "SELECT `ent_name`, `ent_avatar`, `reg_email`, `add_number`, `add_street` , `tow_name`, `zip_code`, `pho_number`"
            . " FROM entreprise"
            . " INNER JOIN registered ON ent_reg_id = reg_id"
            . " INNER JOIN address ON add_reg_id = reg_id"
            . " INNER JOIN town ON tow_add_id = add_id"
            . " INNER JOIN zip_code ON zip_add_id = add_id"
            . " INNER JOIN phone ON  pho_reg_id = reg_id"
            . " AND ent_id =" . $id;

    $result = mysql_query($query);

    return mysql_fetch_array($result);
}

function updateVisitCard($id, $entrepriseName, $streetNumber, $adress, $zipCode, $town, $phoneNumber, $email, $avatar) {

    $add_id = null;

    $reg_id = get_reg_id($id);

    if ($reg_id != null) {

        if (updateEntrepriseNameAndAvatar($reg_id, $entrepriseName, $avatar)) {

            if (updateEmail($reg_id, $email)) {

                if (updateAdress($reg_id, $streetNumber, $adress)) {

                    $add_id = getAdd_id($reg_id);

                    if ($add_id != null) {

                        if (updateZipCode($add_id, $zipCode)) {

                            if (updateTown($add_id, $town)) {

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
            print "impossible de mettre à jour les champs nom de l'entreprise et avatar";
        }
    } else {

        print "utilisateur non enregistré";
    }
}

function updateEntrepriseNameAndAvatar($id, $schoolName, $avatar) {
    $query = "UPDATE entreprise"
            . " SET ent_name = '" . $schoolName . "' , ent_avatar = '" . $avatar
            . "' WHERE ent_reg_id = " . $id;

    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name :  CHARDON
  First name : Jonathan

  FUNCTION
  Name : Updateschool
  Return : Boolean
  Role : get reg_id where entreprise id

  PARAMETER
  $id : id of entreprise


  ---------------------------------------------------- */

function get_reg_id($id) {

    $query = "SELECT ent_reg_id  FROM entreprise WHERE ent_id=" . $id;

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);

    return $result["ent_reg_id"];
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

function updateTown($add_id, $town) {
    $query = "UPDATE town"
            . " SET tow_name = '" . $town . "'"
            . " WHERE add_tow_id = " . $add_id;
    echo $query;
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

function getPresentation($id) {

    $query = "SELECT ent_presentation "
            . " FROM entreprise"
            . " WHERE ent_id =" . $id;

    $result = mysql_query($query);

    return mysql_fetch_array($result);
}

function updatePresentation($id, $presentation) {

    $query = "UPDATE entreprise"
            . " SET ent_presentation = '" . $presentation . "'"
            . " WHERE ent_id = " . $id;
    mysql_query($query);
    return mysql_affected_rows();
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : loadEntrepriseInformation
  Return : Array
  Role : Return entreprise informations.

  PARAMETER
  $id : id of Entreprise

  ---------------------------------------------------- */

function loadEntrepriseInformation($id) {

    $query = "SELECT inf_id, inf_article, inf_date
	FROM information 
	INNER JOIN entreprise ON ent_id = inf_ent_id
	WHERE ent_id=" . $id;

    $result = mysql_query($query);

    return $result;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : loadEntrepriseIntership
  Return : Array
  Role : Return entreprise Intership.

  PARAMETER
  $id : id of Entreprise

  ---------------------------------------------------- */

function loadEntrepriseIntership($id) {

    $query = "SELECT ino_name, ino_id, ino_description
	FROM internship_offer  
	WHERE ino_ent_id=" . $id;

    $result = mysql_query($query);

    return $result;
}

function insertEntrepriseInternship($id, $description, $offerName) {

    $query = "INSERT INTO internship_offer (ino_ent_id, ino_description, ino_name)"
            . " VALUE ('" . $id . "', '" . $description . "', '" . $offerName . "')";

    mysql_query($query);
}

function deleteIntership($id) {

    $query = "DELETE FROM internship_offer"
            . " WHERE ino_id = " . $id;
    mysql_query($query);
}

function InsertEntrepriseNews($id, $actuality) {

    $query = "INSERT INTO information (inf_ent_id, inf_article, inf_date) "
             . " VALUE ('" . $id . "', '" . $actuality . "',  NOW())";
    mysql_query($query);
}

 function deleteNews($deleteNews){
         $query = "DELETE FROM information "
             . " WHERE inf_id=" . $deleteNews;
    mysql_query($query);
     
     
 }

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : loadEntrepriseCarousel
  Return : Array
  Role : Return carousel picture link

  PARAMETER
  $id : id of Entreprise

  ---------------------------------------------------- */

function loadEntrepriseCarousel($id) {
    $query = "SELECT pic_URLPicture, COUNT(*) as nbRow
	FROM entreprise  
	INNER JOIN picture_carousel ON pic_ent_id = ent_id
	WHERE ent_id=" . $id;

    $result = mysql_query($query);

    return mysql_fetch_array($result);
}
?>

