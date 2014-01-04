
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

AUTHOR
Last name : ZYRA,CHARDON
First name : Jérémy, Jonathan

FILE
Name : V_ProfileSchool.php
Last modified : 20/12/2013

DESCRIPTION
It is the Profil School's View .
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>

        <title><?php print getXmlText("title"); ?></title>

        <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen"></link>
        <link href="./css/style.css" rel="stylesheet" media="screen"></link>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"></link>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>

        <script src ="./js/dynamicsFormSchool.js"></script>
        <script type="text/javascript">

            //hide modification pencil if user is not authorized to modify the page
            var idUser = 1;
            var idToken = 1;

            $(document).ready(function() {
                enableModifAuthorisation(idUser, idToken);
            });
        </script>
    </head>
    <body>

        <?php
        headerPage(getXmlText("title")); //This function display header of page.
//Load informations on school
        ?>
        <div id="row-fluid marketing" class="container">
            <!-- premiere colonne -->
            <div class="FirstColumn" class="span8 container">
                <?php
                validateVisitCard($id);
                $visitCard = getVisitCard($id);
                ?>
                <h1><?php print getXmlText("visitCard"); ?></h1>	
                <div class="visitCard">
                    <i class= "icon-pencil" onclick ="showModifVisitCard();"><span><?php print getXmlText("modify"); ?></span></i>	
                    <img src="<?php print $visitCard["sch_avatar"] ?>"alt=" logo de l'ecole"/>
                    <ul>
                        <li class= "name"><?php print $visitCard["sch_name"]; ?> </li>
                        <li><?php print $visitCard["add_number"] . ' ' . $visitCard["add_street"]; ?> </li>
                        <li><?php print $visitCard["zip_code"]; ?> </li>
                        <li><?php print $visitCard["tow_name"]; ?> </li>
                        <li><?php print $visitCard["pho_number"]; ?> </li>
                        <li><?php print $visitCard["reg_email"]; ?> </li>

                    </ul>
                </div>

                <div class = "modifVisitCard formatForm">
                    <form method = "post">
                        <button type="button" class="close closeModifVisitCard" onclick ="hideModifVisitCard();" >&times;</button>
                        <ul>
                            <li><?php print getXmlText("schoolName") . " : " ?> <input name = "schoolName" type="text"/></li>
                            <li> <?php print getXmlText("streetNumber") . " :" ?> <input name= "streetNumber" type="text"/></li>
                            <li> <?php print getXmlText("adress") . " :" ?> <input name= "adress" type="text"/></li>
                            <li> <?php print getXmlText("zipCode") . " :" ?> <input name= "zipCode" type="text"/></li>
                            <li> <?php print getXmlText("town") . " :" ?> <input name= "town" type="text"/></li>
                            <li><?php print getXmlText("phone") . " :"; ?><input name ="phoneNumber" type ="text"/></li>
                            <li><?php print getXmlText("email") . " :"; ?><input name ="mail" type ="text"/></li>
                            <li>Avatar : <input name = "avatar" type="text"/></li>
                        </ul>	
                        <input type="submit" name="submitVisitCard" onsubmit = "hideModifVisitCard();"/>
                    </form>
                </div>

                <?php
                validatePresentation($id);
                $presentation = getPresentation($id);
                ?>

                <h1><?php print getXmlText("introduce"); ?></h1>
                <div class="presentation">
                    <i class= "icon-pencil" onclick ="showModifPresentation();"><span><?php print getXmlText("modify"); ?></span></i>
                    <ul>	
                        <li><?php print $presentation["sch_presentation"]; ?></li>
                    </ul>
                </div>

                <div class ="modifPresentation formatForm">		
                    <form method="post">
                        <button type="button" class="close closeModifPresentation" onclick ="hideModifPresentation();" >&times;</button>
                        <ul>   
                            <li><?php print getXmlText("introduce2"); ?><textarea name = "presentation"></textarea></li>
                        </ul>
                        <input type="submit" name="submitPresentation" onsubmit = "hideModifPresentation();"/>
                    </form>
                </div>

                <?php
                validateSchoolTraining($id);
                ValidateDeleteTraining();
                $schoolTraining = getTraining($id);
                ?>
                <h1><?php print getXmlText("training"); ?></h1>	
                <div class="training">		
                    <i class= "icon-pencil"onclick ="showModifTraining();"><span><?php print getXmlText("add"); ?></span></i>		
                    <form method="post">
                        <ul>
                            <?php
                            while ($training = mysql_fetch_array($schoolTraining)) {


                                print "<li>                                          
                                            <button value =\"" . $training["tra_id"] . "\" name =\"delete\" type=\"submit\" class=\"close closeIndividualTraining\" >&times;</button> 
                                        </li>";
                                print "<li><span class=\"traLevel\">" . $training["tra_level"] . " : " . "</span>" . "<span class= \"traName\">" . $training["tra_name"] . "</span>" . "  " . "<span class=\"speciality\">" . getXmlText("dipSpeciality") . " : " . $training["tra_speciality"] . "</span></li>";
                            }
                            ?>
                        </ul>
                    </form>
                </div>

                <div class ="modifTraining formatForm">		
                    <form method="post">
                        <button type="button" class="close closeModifTraining" onclick ="hideModifTraining();" >&times;</button>
                        <ul>
                            <li><?php print getXmlText("dipLevel"); ?><input name = "level" type="text"/></li>
                            <li><?php print getXmlText("dipTitle"); ?><input name = "title" type="text"/></li>
                            <li><?php print getXmlText("dipSpeciality"); ?><input name = "speciality" type="text"/></li>
                        </ul>
                        <input type="submit" name="submitTraining" onsubmit = "hideModifTraining();" />
                    </form>
                </div>

            </div>

            <!-- seconde colonne -->	
            <div class="secondColumn" class="span4">	
                <!--  
                   <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: relative; z-index: 1; display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">July</span>&nbsp;<span class="ui-datepicker-year">2013</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">5</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">6</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">7</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">12</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">13</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">14</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">15</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default ui-state-highlight ui-state-hover" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">19</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">20</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">21</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">22</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">26</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">27</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">28</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">30</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">31</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;
                                       </div>
                -->
                <div class="contact">	
                    <h2>Annuaire</h2>
                    <ul>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                    </ul>
                    <ul>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                    </ul>
                    <ul>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                    </ul>
                    <ul>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                        <li>contact1</li>
                    </ul>


                </div>								
                <?php
                include 'newsSmall.php'
                ?>
            </div>
        </div>

    </body>

    <?php
    include 'footer.php';
    ?>	

</html>

