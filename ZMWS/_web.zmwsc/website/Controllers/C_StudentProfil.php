<?php

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA, CHARDON
  First name : Jérémy, Jonathan

  FILE
  Name : C_StudentProfil.php
  Last modified : 20/08/2013

  DESCRIPTION
  It is a controller of student profil page.

  ---------------------------------------------------- */

include_once("./Models/M_StudentProfil.php");

//Récupération de l'ID de l'utilisateur
if (isset($_GET["id"]))
    $id = filterUserEntryGlobal($_GET["id"], 1);
else
    $id = -1;

//Compte le nombre d'enregistrement dans la base correspondant a cet id.
$countId = loadCountId($id);

//Si il y a un enregistrement, cela veut dire que l'étudiant existe, on inclus donc la vue pour afficher le profil. Si non, on mes un message d'erreur.
if ($countId == 1)
    include_once("./Views/V_StudentProfil.php");
else
    include_once("./Views/V_UserNotFound.php");


/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateStudentVisitCard
  Return : void
  Role : Basic php form controler for StudentVisitCard

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function validateStudentVisitCard($id) {

    if ($_POST['submitVisitCard']) {

        if ($_POST['name']) {

            if ($_POST['firstName']) {

                if ($_POST['fonction']) {

                    if ($_POST['streetNumber']) {

                        if ($_POST['adress']) {

                            if ($_POST['zipCode']) {

                                if ($_POST['town']) {

                                    if ($_POST['phone']) {

                                        if ($_POST['email']) {

                                            if ($_POST['avatar']) {


                                                // filter SQL injections
                                                filterStudentVisitCardForm();

                                                updateStudentVisitCard(
                                                        $id, $_POST['name'], $_POST['firstName'], $_POST['fonction'], $_POST['streetNumber'], $_POST['adress'], $_POST['zipCode'], $_POST['town'], $_POST['phone'], $_POST['email'], $_POST['avatar']);


                                                // Clean used $_POST variables
                                                cleanStudentVisitCardForm();
                                            } else {
                                                print "le champ Avatar manquant";
                                            }
                                        } else {
                                            print "le champ email est manquant";
                                        }
                                    } else {
                                        print "le champ téléphone est manquant";
                                    }
                                } else {
                                    print "le champ ville est manquant";
                                }
                            } else {

                                print "le champ code postal est manquant";
                            }
                        } else {

                            print "le champ adress est manquant";
                        }
                    } else {

                        print "le champ numero de rue est manquant";
                    }
                } else {

                    print "le champs fonction est manquant";
                }
            } else {

                print "le champ prenom est manquant";
            }
        } else {

            print "le champ nom est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : filterStudentVisitCardForm
  Return : void
  Role : filter User SQL entry from StudentVisitCard

  PARAMETER
  void

  ---------------------------------------------------- */

function filterStudentVisitCardForm() {

    $_POST['name'] = filterUserEntrySQL($_POST['name']);
    $_POST['firstname'] = filterUserEntrySQL($_POST['firstname']);
    $_POST['fonction'] = filterUserEntrySQL($_POST['fonction']);
    $_POST['streetNumber'] = filterUserEntrySQL($_POST['streetNumber']);
    $_POST['adress'] = filterUserEntrySQL($_POST['adress']);
    $_POST['zipCode'] = filterUserEntrySQL($_POST['zipCode']);
    $_POST['town'] = filterUserEntrySQL($_POST['town']);
    $_POST['phone'] = filterUserEntrySQL($_POST['phone']);
    $_POST['email'] = filterUserEntrySQL($_POST['email']);
    $_POST['avatar'] = filterUserEntrySQL($_POST['avatar']);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanStudentVisitCardForm
  Return : void
  Role : clean $_POST variable after form validation

  PARAMETER
  void

  ---------------------------------------------------- */

function cleanStudentVisitCardForm() {

    $_POST['name'] = null;
    $_POST['firstname'] = null;
    $_POST['fonction'] = null;
    $_POST['streetNumber'] = null;
    $_POST['adress'] = null;
    $_POST['zipCode'] = null;
    $_POST['town'] = null;
    $_POST['phone'] = null;
    $_POST['email'] = null;
    $_POST['avatar'] = null;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateStudentPresentation
  Return : void
  Role : validate StudentPresentation form

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function validateStudentPresentation($id) {

    if ($_POST['submitStudentProfil']) {
        if ($_POST['presentation']) {
// filter SQL injections
            $_POST['presentation'] = filterUserEntrySQL($_POST['presentation']);

            updateStudentPresentation(
                    $id, $_POST['presentation']);

// clean $_POST variable				 

            $_POST['presentation'] = null;
        } else {
            print "Le champ présentation est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateStudentXP
  Return : void
  Role : validate StudentXP form

  PARAMETER
  $id : id of student

  ---------------------------------------------------- */

function validateStudentXP($id) {

    if ($_POST['submitStudentXP']) {
        if ($_POST['xpDuration']) {
            if ($_POST['fonctionXP']) {
                if ($_POST['EntrepriseName']) {
                    if ($_POST['responsability']) {
// filter SQL injections
                        filterStudentXP();

                        if (entrepriseAlreadyExist($_POST['EntrepriseName'])) {

                            $id_entreprise = entrepriseAlreadyExist($_POST['EntrepriseName']);

                            insertStudentXPKnownEntreprise($id, $_POST['xpDuration'], $_POST['fonctionXP'], $id_entreprise, $_POST['responsability']);
                        } else {
                            insertStudentXPUnknownEntreprise($id, $_POST['xpDuration'], $_POST['fonctionXP'], $_POST['EntrepriseName'], $_POST['responsability']);
                        }

// Clean used $_POST variables
                        cleanStudentXP();
                    } else {
                        print "le champ responsabilitées confiées est manquant";
                    }
                } else {
                    print "le champ nom de l'entreprise est manquant";
                }
            } else {
                print "le champs fonction occupée est manquant";
            }
        } else {
            print "le champs durée de l'experience est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : filterStudentXP
  Return : void
  Role : filterStudentXP form

  PARAMETER
  void

  ---------------------------------------------------- */

function filterStudentXP() {

    $_POST['xpDuration'] = filterUserEntrySQL($_POST['xpDuration']);
    $_POST['fonctionXP'] = filterUserEntrySQL($_POST['fonctionXP']);
    $_POST['EntrepriseName'] = filterUserEntrySQL($_POST['EntrepriseName']);
    $_POST['responsability'] = filterUserEntrySQL($_POST['responsability']);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanStudentXP
  Return : void
  Role : clean StudentXP form  after validation

  PARAMETER
  void

  ---------------------------------------------------- */

function cleanStudentXP() {

    $_POST['xpDuration'] = null;
    $_POST['fonctionXP'] = null;
    $_POST['EntrepriseName'] = null;
    $_POST['responsability'] = null;
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validatedeleteStudentXP
  Return : void
  Role : validate delete StudentXP

  PARAMETER
  $id : student's xp id

  ---------------------------------------------------- */

function validatedeleteStudentXP($id) {

    if ($_POST['deleteXP']) {

        $_POST["deleteXP"] = filterUserEntrySQL($_POST["deleteXP"]);

        deleteStudentXP($_POST['deleteXP']);
        $_POST["deleteXP"] = null;
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateStudentSkill
  Return : void
  Role : validate StudentSkill form

  PARAMETER
  $id : student's id

  ---------------------------------------------------- */

function validateStudentSkill($id) {

    if ($_POST['submitStudentSkill']) {
        if ($_POST['addSkill']) {
// filter SQL injections
            $_POST['addSkill'] = filterUserEntrySQL($_POST['addSkill']);

// create new Skill
            insertStudentSkills($id, $_POST['addSkill']);

//Clean $_POST['addSkill'])
            $_POST['addSkill'] = null;
        } else {
            print "le champs competence est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : deleteStudentSkill
  Return : void
  Role : delete specifical student skill

  PARAMETER
  $id : student's id

  ---------------------------------------------------- */

function validatedeleteStudentSkill($id) {

    if ($_POST['delete']) {

        $_POST['delete'] = filterUserEntrySQL($_POST['delete']);

        deleteStudentSkills($_POST['delete']);

        $_POST['delete'] = null;
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : validateStudentFormation
  Return : void
  Role : validate Student Formation form

  PARAMETER
  void

  ---------------------------------------------------- */

function validateStudentFormation($id) {

    if ($_POST['submitFormation']) {
        if ($_POST['schoolName']) {
            if ($_POST['formationName']) {

                filterStudentFormation();

                if (schoolAlreadyExist($_POST['schoolName'])) {

                    $id_school = schoolAlreadyExist($_POST['schoolName']);
                    
                    insertStudentFormationKnowSchool($id, $id_school, $_POST['formationName']);
                } else {

                    insertStudentFormationUnKnowSchool($id, $_POST['schoolName'], $_POST['formationName']);
                }

                cleanStudentFormation();
            } else {

                print "champ nom de la formation manquante ";
            }
        } else {

            print "champ manquant nom de l'ecole manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : filterStudentFormation
  Return : void
  Role : filter Student Formation form

  PARAMETER
  void

  ---------------------------------------------------- */

function filterStudentFormation() {

    $_POST['schoolName'] = filterUserEntrySQL($_POST['schoolName']);
    $_POST['formationName'] = filterUserEntrySQL($_POST['formationName']);
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  FUNCTION
  Name : cleanStudentFormation
  Return : void
  Role : clean Student Formation form

  PARAMETER
  void

  ---------------------------------------------------- */

function cleanStudentFormation() {

    $_POST['schoolName'] = null;
    $_POST['formationName'] = null;
}

function validatedeleteStudentFormation($id) {
    


    if ($_POST['deleteDiploma']) {

        $_POST['deleteDiploma'] = filterUserEntrySQL($_POST['deleteDiploma']);
            
        deleteStudentDiploma($_POST['deleteDiploma']);

        $_POST['deleteDiploma'] = null;
    }
}

