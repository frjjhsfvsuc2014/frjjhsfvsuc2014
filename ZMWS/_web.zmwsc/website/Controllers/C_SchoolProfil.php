<?php

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA
  First name : Jeremy

  FILE
  Name : C_SchoolProfil.php
  Last modified : 20/12/2013

  DESCRIPTION
  this is the Schoolprofil's controler .

  ---------------------------------------------------- */

include_once("./Models/M_SchoolProfil.php");

//Recuperation de l'ID de l'utilisateur
if (isset($_GET["id"]))
    $id = filterUserEntryGlobal($_GET["id"], 1);
else
    $id = -1;

//Compte le nombre d'enregistrement dans la base correspondant a cet id.
$countId = loadCountId($id);

//Si il y a un enregistrement, cela veut dire que l'etudiant existe, on inclus donc la vue pour afficher le profil. Si non, on mes un message d'erreur.
if ($countId == 1)
    include_once("./Views/V_SchoolProfil.php");
else
    include_once("./Views/V_UserNotFound.php");


/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateVisitCard
  Last modified : 20/12/2013

  DESCRIPTION
  this function is use to check if each field of the form visitCard constain something .

  ---------------------------------------------------- */

function validateVisitCard($id) {

    if ($_POST['submitVisitCard']) {

        if ($_POST['schoolName']) {
            if ($_POST['streetNumber']) {
                if ($_POST['adress']) {
                    if ($_POST['zipCode']) {
                        if ($_POST['town']) {
                            if ($_POST['phoneNumber']) {
                                if ($_POST['mail']) {
                                    if ($_POST['avatar']) {

                                        // filter SQL injections
                                        filterVisitCardForm();

                                        updateVisitCard(
                                                $id, $_POST['schoolName'], $_POST['streetNumber'], $_POST['adress'], $_POST['zipCode'], $_POST['town'], $_POST['phoneNumber'], $_POST['mail'], $_POST['avatar']
                                        );

                                        // Clean used $_POST variables
                                        cleanVisitCardForm();
                                    } else {

                                        print "le champ avatar est manquant";
                                    }
                                } else {

                                    print "le champ Email est manquant";
                                }
                            } else {

                                print "le champ numero de telephone est manquant";
                            }
                        } else {

                            print "le champ ville est manquant";
                        }
                    } else {

                        print "le champ code postal est manquant";
                    }
                } else {

                    print "le champ adresse est manquant";
                }
            } else {

                print "le champ numero de rue  est manquant";
            }
        } else {
            print "le champ nom de l ecole est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateVisitCard
  Last modified : 20/12/2013

  DESCRIPTION
  this function is use to check if each field of the form visitCard constain something .

  ---------------------------------------------------- */

function filterVisitCardForm() {

    $_POST['schoolName'] = filterUserEntrySQL($_POST['schoolName']);
    $_POST['streetNumber'] = filterUserEntrySQL($_POST['streetNumber']);
    $_POST['adress'] = filterUserEntrySQL($_POST['adress']);
    $_POST['zipCode'] = filterUserEntrySQL($_POST['zipCode']);
    $_POST['town'] = filterUserEntrySQL($_POST['town']);
    $_POST['phoneNumber'] = filterUserEntrySQL($_POST['phoneNumber']);
    $_POST['mail'] = filterUserEntrySQL($_POST['mail']);
    $_POST['avatar'] = filterUserEntrySQL($_POST['avatar']);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanVisitCardForm
  Last modified : 20/12/2013

  DESCRIPTION
  this function remove POST variable from VisitCard form

  ---------------------------------------------------- */

function cleanVisitCardForm() {

    $_POST['schoolName'] = null;
    $_POST['streetNumber'] = null;
    $_POST['adress'] = null;
    $_POST['zipCode'] = null;
    $_POST['town'] = null;
    $_POST['phoneNumber'] = null;
    $_POST['mail'] = null;
    $_POST['avatar'] = null;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validatePresentation

  DESCRIPTION
  this function is use to validate presentation form

  ---------------------------------------------------- */

function validatePresentation($id) {

    if ($_POST['submitPresentation']) {
        if ($_POST['presentation']) {
// filter SQL injections
            $_POST["presentation"] = filterUserEntrySQL($_POST['presentation']);

            updateSchoolPresentation($id, $_POST['presentation']);
// clean $_POST Variable				  
            $_POST['presentation'] = null;
        } else {
            print "Le champ presentation est manquant";
        }
    }
}
/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateSchoolTraining

  DESCRIPTION
  this function is use to validate schoolTraining form

  ---------------------------------------------------- */
function validateSchoolTraining($id) {

    if ($_POST['submitTraining']) {

        if ($_POST['level']) {

            if ($_POST['title']) {

                if ($_POST['title']) {

// filter SQL injections		

                    filterTrainingForm();

                    insertSchoolTraining($id, $_POST['level'], $_POST['title'], $_POST['speciality']);
                    // clean $_POST Variable
                    cleanTrainingForm();
                } else {

                    print "Le champ specialité est manquant";
                }
            } else {

                print "Le champ intitule du diplome est manquant";
            }
        } else {
            print "Le champs niveau du diplome est manquant";
        }
    }
}
/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : filterOfferForm

  DESCRIPTION
  this function is use to remove SQL injection from 

  ---------------------------------------------------- */
function filterTrainingForm() {

    $_POST["title"] = filterUserEntrySQL($_POST["title"]);
    $_POST["level"] = filterUserEntrySQL($_POST["level"]);
    $_POST["speciality"] = filterUserEntrySQL($_POST["speciality"]);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanTrainingForm

  DESCRIPTION
  this function is use to remove form's fields after validation

  ---------------------------------------------------- */

function cleanTrainingForm() {

    $_POST['title'] = null;
    $_POST['level'] = null;
    $_POST['speciality'] = null;
}

function validateSchoolContact($id) {
    if ($_POST['submitContact']) {
        if ($_POST['phoneNumber']) {
            if ($_POST['streetNumber']) {
                if ($_POST['address']) {

                    filterContactForm();

                    updateSchoolContact(
                            $id, $_POST['phoneNumber'], $_POST['streetNumber'], $_POST['address']
                    );

            
                    cleanContactForm();
                } else {
                    print "manque adresse";
                }
            } else {
                print "manque numero de rue";
            }
        } else {
            print "manque numero de telephone";
        }
    }
}
/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : filterContactForm

  DESCRIPTION
  this function is use to filter SQL injections

  ---------------------------------------------------- */


function filterContactForm() {

    $_POST["phoneNumber"] = filterUserEntrySQL($_POST["phoneNumber"]);
    $_POST["adress"] = filterUserEntrySQL($_POST["adress"]);
    $_POST["streetNumber"] = filterUserEntrySQL($_POST["streetNumber"]);
}
/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanContactForm

  DESCRIPTION
  this function is use to clean the post form variables

  ---------------------------------------------------- */
function cleanContactForm() {

    $_POST["phoneNumber"] = null;
    $_POST["streetNumber"] = null;
    $_POST["address"] = null;
}

function ValidateDeleteTraining() {

    if ($_POST['delete']) {

        $_POST["delete"] = filterUserEntrySQL($_POST["delete"]);
        deleteSchoolTraining($_POST['delete']);
        $_POST["delete"] = filterUserEntrySQL($_POST["delete"]);
    }
}
?>
