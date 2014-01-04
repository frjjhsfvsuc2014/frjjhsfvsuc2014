/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FILE
 Name : dynamicFormSchool.php
 Last modified : 06/08/2013
 
 DESCRIPTION
 jquery sheet to dynamic school page form.
 
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

    //hide all modification form by default

    hideModifVisitCard();
    hideModifPresentation();
    hideModifTraining();
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
 Name : hideModifVisitCard
 Return : void
 Role : hide visitCard form,	
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
 Name : hideModifPresentation
 Return : void
 Role : hide visitCard form,	
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
 Name : showModifTraining
 Return : void
 Role : Show training form,	
 hide modification pencils,
 show close form button
 and show individual training delete button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifTraining()
{
    $(".modifTraining").show();
    $(".training").hide();

}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : HideModifTraining
 Return : void
 Role : hide training form,	
 show modification pencils,
 hide close form button
 and hide individual training delete button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifTraining()
{

    $(".modifTraining").hide();
    $(".training").show();

}