/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FILE
 Name : dynamicFormEntreprise.php
 Last modified : 06/08/2013
 
 DESCRIPTION
 jquery sheet to dynamic Entreprise page form.
 
 ----------------------------------------------------*/

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : main fonction
 Return : void
 Role : Hide all form by default, 
 hide the modification pencils by default
 
 PARAMETER
 void
 ----------------------------------------------------*/
$(function()
{

    // the modification pencils are disable by default		
    $(".icon-pencil").hide();

    //hide all form by default
    hideModifVisitCard();
    hideModifPresentation();
    hideModifNew();
    hideModifInternship();
    

});

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : enableModifAuthorisation
 Return : void
 Role : Show modification pencils if the user is autorised
 
 PARAMETER
 $id : id  of user display page
 $idToken : id of the authenticate user
 ----------------------------------------------------*/

function enableModifAuthorisation($id, $tokenId)
{

    if ($id == $tokenId) {

        //show the icone modification if the user is autorized
        $(".icon-pencil").show();

    }
}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifVisitCard
 Return : void
 Role : Show visitCard form,	
 hide modification pencils and show close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifVisitCard()
{

    $(".modifVisitCard").show();
    $(".visitCard").hide();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : HideModifVisitCard
 Return : void
 Role : Hide visitCard form,	
 show modification pencils and hide close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifVisitCard()
{

    $(".modifVisitCard").hide();
    $(".visitCard").show();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifPresentation
 Return : void
 Role : Show presentation form,	
 hide modification pencils and show close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifPresentation()
{

    $(".modifPresentation").show();
    $(".presentation").hide();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : HideModifPresentation
 Return : void
 Role : Hide presentation form,	
 show modification pencils and hide close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifPresentation()
{

    $(".modifPresentation").hide();
    $(".presentation").show();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifNew
 Return : void
 Role : show news form,	
 hide modification pencils and show close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifNew()
{

    $(".modifNews").show();
    $(".news").hide();


}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : hideModifNew
 Return : void
 Role : hide news form,	
 hide modification pencils and show close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifNew()
{

    $(".modifNews").hide();
    $(".news").show();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifInternship
 Return : void
 Role : show Internship form,	
 hide modification pencils and show close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifInternship()
{

    $(".modifInternship").show();
    $(".internship").hide();


}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : hideModifInternship
 Return : void
 Role : hide Internship form,	
 show modification pencils and hide close form button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifInternship()
{

    $(".modifInternship").hide();
    $(".internship").show();

}
