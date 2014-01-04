/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FILE
 Name : dynamicFormStudent.php
 Last modified : 15/12/2013
 
 DESCRIPTION
 jquery sheet to dynamic student page form.
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
    hideModifExperience();
    hideModifFormation();
    hideModifSkill();

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

    if ($id == $tokenId)
    {

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
 Role : hide presentation form,	
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
 Name : showModifExperience
 Return : void
 Role : Show Experience form,	
 hide modification pencils,
 show close form button,
 show individual delete experience button
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifExperience()
{

    $(".modifExperience").show();
    $(".experience").hide();


}


/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : hideModifExperience
 Return : void
 Role :hide Experience form,	
 show modification pencils,
 hide close form button,
 hide individual delete experience button
 
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifExperience()
{

    $(".modifExperience").hide();
    $(".experience").show();

}


/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifFormation
 Return : void
 Role :show Modif form,	
 hide modification pencils,
 show close form button,
 show individual delete formation button
 
 
 PARAMETER
 void
 ----------------------------------------------------*/

function showModifFormation()
{

    $(".modifFormation").show();
    $(".formation").hide();


}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : hideModifFormation
 Return : void
 Role :hide Modif form,	
 show modification pencils,
 hide close form button,
 hide individual delete formation button
 
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifFormation()
{

    $(".modifFormation").hide();
    $(".formation").show();


}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : showModifSkill
 Return : void
 Role :show Skill form,	
 hide modification pencils,
 show close form button,
 show individual delete skill button
 
 
 PARAMETER
 void
 ----------------------------------------------------*/


function showModifSkill()
{

    $(".modifSkills").show();
    $(".skills").hide();


}

/*--------------------------------------------------
 
 AUTHOR
 Last name : CHARDON
 First name : Jonathan
 
 FUNCTION
 Name : hideModifSkill
 Return : void
 Role :hide Skill form,	
 show modification pencils,
 hide close form button,
 hide individual delete skill button
 
 
 PARAMETER
 void
 ----------------------------------------------------*/

function hideModifSkill()
{

    $(".modifSkills").hide();
    $(".skills").show();

}

