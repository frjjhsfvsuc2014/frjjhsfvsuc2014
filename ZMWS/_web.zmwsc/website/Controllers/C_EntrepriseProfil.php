<?php

/* --------------------------------------------------

  AUTHOR
  Last name : ZYRA, CHARDON
  First name : Jérémy ,Jonathan

  FILE
  Name : C_EntrepriseProfil.php
  Last modified : 18/07/2013

  DESCRIPTION
  It is a controller of Entreprise profil page.

  ---------------------------------------------------- */

include_once("./Models/M_EntrepriseProfil.php");

// get the entreprise ID
if (isset($_GET["id"]))
    $id = filterUserEntryGlobal($_GET["id"], 1);
else
    $id = -1;

//count row's numbers of this id in the database
$countId = loadCountId($id);

//Show the view if the entreprise exist else show an error 
if ($countId == 1)
    include_once("./Views/V_EntrepriseProfil.php");
else
    include_once("./Views/V_UserNotFound.php");




/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  Last modified : 08/08/2013

  FUNCTION
  Name : validateVisitCard
  Return : void
  Role : Validate the VisitCard form
  (filter SQL Symbol do the query and clean used $_POST Parameter)

  PARAMETER
  $id : id of Entreprise

  ---------------------------------------------------- */

function validateEntrepriseVisitCard($id) {
    if ($_POST['submitVisitCard']) {

        if ($_POST['entrepriseName']) {
            if ($_POST['streetNumber']) {
                if ($_POST['adress']) {
                    if ($_POST['zipCode']) {
                        if ($_POST['town']) {
                            if ($_POST['phoneNumber']) {
                                if ($_POST['email']) {
                                    if ($_POST['avatar']) {

                                        // filter SQL injections
                                        filterVisitCardForm();

                                        updateVisitCard($id, $_POST['entrepriseName'], $_POST['streetNumber'], $_POST['adress'], $_POST['zipCode'], $_POST['town'], $_POST['phoneNumber'], $_POST['email'], $_POST['avatar']);

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
            print "le champ nom de l'entreprise est manquant";
        }
    }
}

/* --------------------------------------------------

  AUTHOR
  Last name : CHARDON
  First name : Jonathan

  Last modified : 08/08/2013

  FUNCTION
  Name : filterVisitCardForm
  Return : void
  Role : Filter user input in the Visit Card form

  PARAMETER
  void

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

  Last modified : 08/08/2013

  FUNCTION
  Name :  CleanVisitCardFormPost
  Return : void
  Role : do to null value the $_POST parameter

  PARAMETER
  void

  ---------------------------------------------------- */

function CleanVisitCardForm() {


    $_POST['schoolName'] = null;
    $_POST['streetNumber'] = null;
    $_POST['adress'] = null;
    $_POST['zipCode'] = null;
    $_POST['town'] = null;
    $_POST['phoneNumber'] = null;
    $_POST['mail'] = null;
    $_POST['avatar'] = null;
}

function validateEntreprisePresentation($id) {

    if ($_POST['submitPresentation']) {
        if ($_POST['presentation']) {
            $_POST['presentation'] = filterUserEntrySQL($_POST['presentation']);
            // do the update query
            updatePresentation($id, $_POST['presentation']);
            //clean used $_POST
            $_POST['presentation'] = null;
        } else {
            print "manque presentation";
        }
    }
}

function validateEntrepriseInformation($id) {
    if ($_POST['submitEntrepriseNews']) {
        if ($_POST['actuality']) {
            $_POST['actuality'] = filterUserEntrySQL($_POST['actuality']);
            // do the update query
            InsertEntrepriseNews($id, $_POST['actuality']);
            //clean used $_POST
            $_POST['actuality'] = null;
        } else {
            print "manque actualitée";
        }
    }
}

function validateEntrepriseIntership($id) {
    if ($_POST['submitEntrepriseInternship']) {
        if ($_POST['offerName']) {
            if ($_POST['description']) {

                $_POST['offerName'] = filterUserEntrySQL($_POST['offerName']);
                $_POST['description'] = filterUserEntrySQL($_POST['description']);

                // do the update query
                insertEntrepriseInternship($id, $_POST['description'], $_POST['offerName']);
                //clean used $_POST

                $_POST['offerName'] = null;
                $_POST['description'] = null;
            } else {

                print "manque description du poste";
            }
        } else {
            print "manque intitulé du poste";
        }
    }
}



function validateDeleteIntership($id) {
    if ($_POST['deleteInternShips']) {
        echo 'plop';
        $_POST['deleteInternShips'] = filterUserEntrySQL($_POST['deleteInternShips']);
        deleteIntership($_POST['deleteInternShips']);
        //clean used $_POST

        $_POST['deleteInternShips'] = null;
    }
}

function validateDeleteInformation($id){
    
        if ($_POST['deleteNews']) {
        echo 'plop';
        $_POST['deleteNews'] = filterUserEntrySQL($_POST['deleteNews']);
        deleteNews($_POST['deleteNews']);
        //clean used $_POST

        $_POST['deleteNews'] = null;
    }
}

?>