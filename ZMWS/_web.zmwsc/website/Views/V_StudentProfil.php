
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        AUTHOR
        Last name : ZYRA, CHARDON, L
        First name : Jérémy,Jonathan, Vincent

        FILE
        Name : V_StudentProfil.php
        Last modified : 15/12/2013
        
        DESCRIPTION
        It is a view of student profil page.

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>

        <title><?php print getXmlText("title"); ?></title>

        <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen"></link>
        <link href="./css/style.css" rel="stylesheet" media="screen"></link>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"></link>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <!-- agenda -->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"></link>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>

        <script src ="./js/dynamicsFormStudent.js"></script>

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

        <div class=" container-narrow">
            <div id="menu">
                <?php
                include 'menu.php';
                ?>
            </div>

            <div id="row-fluid marketing" class="container">
                <!-- premiere colonne -->
                <div class="FirstColumn" class="span8 container">
                    <div id="bandeau-pub"></div>

                    <?php
                    validateStudentVisitCard($id);
                    $visitCard = loadStudentVisitCard($id);
                    ?>

                    <h1><?php print getXmlText("visitCard"); ?></h1>
                    <div  class = "visitCard" >    
                        <i class= "icon-pencil" onclick ="showModifVisitCard();"><span><?php print getXmlText("modify"); ?></span></i>

                        <img src="<?php print $visitCard["stu_avatar"] ?>"alt=".<?php print getXmlText("logo"); ?>."/>			
                        <ul>
                            <li class = "name"><?php print $visitCard["stu_firstname"] . " " . $visitCard["stu_lastname"]; ?> </li>
                            <li><?php print $visitCard["stu_profession"]; ?> </li>
                            <li><?php print $visitCard["add_number"] . "  " . $visitCard["add_street"]; ?></li>
                            <li><?php print $visitCard["zip_code"] . "  " . $visitCard["tow_name"] . "  " . $visitCard["stu_county"]; ?></li>
                            <li><?php print getXmlText("phone") . " :"; ?>&nbsp; <b> <?php print $visitCard["pho_number"]; ?> </b></li>
                            <li><?php print getXmlText("email") . " : "; ?> &nbsp; <b><?php print $visitCard["reg_email"]; ?> </b></li>                
                        </ul>
                    </div>
                    <!-- div modifVisitCard hidden when visit card is display-->
                    <div class = "modifVisitCard formatForm">
                        <form method = "post" action =""> 
                            <button type="button" class="close closeModifVisitCard" onclick ="hideModifVisitCard();" >&times;</button>
                            <ul>
                                <li><?php print getXmlText("lastname") . " : "; ?> <input name = "name" type="text"></input></li>
                                <li><?php print getXmlText("firstname") . " : "; ?> <input name = "firstName" type="text"></input></li>
                                <li><?php print getXmlText("function") . " : "; ?> <input name = "fonction" type="text"></input></li>
                                <li> <?php print getXmlText("streetNumber") . " :"; ?> <input name= "streetNumber" type="text"></input></li>
                                <li> <?php print getXmlText("adress") . " :"; ?> <input name= "adress" type="text"></input></li>
                                <li> <?php print getXmlText("zipCode") . " :"; ?> <input name= "zipCode" type="text"></input></li>
                                <li> <?php print getXmlText("town") . " :"; ?> <input name= "town" type="text"></input></li>
                                <li> <?php print getXmlText("phone") . " :"; ?> <input name= "phone" type="text"></input></li>
                                <li> <?php print getXmlText("email") . " : "; ?> <input name ="email" type="text"></input></li>
                                <li> Avatar : <input name = "avatar" type="text"></input></li>
                            </ul>
                            <input type="submit" name ="submitVisitCard" onsubmit = "hideModifVisitCard();"></input>
                        </form>
                    </div>    



                    <?php
                    validateStudentPresentation($id);
                    $visitCard = loadStudentPresentation($id);
                    ?>
                    <h1><?php print getXmlText("presentation"); ?></h1>
                    <div class="presentation">	 
                        <i class="icon-pencil" onclick = "showModifPresentation();"><span><?php print getXmlText("modify"); ?></span></i>
                        <ul>
                            <li><?php print $visitCard["stu_presentation"] ?></li>	
                        </ul>
                    </div>
                    <!-- div modifPresentation hidden when visit card is display-->

                    <div class ="modifPresentation formatForm" action ="">		
                        <form method="post">
                            <button type="button" class="close closeModifPresentation" onclick ="hideModifPresentation();" >&times;</button>
                            <ul>
                                <li><?php print getXmlText("introduce") . " : "; ?> </li>
                                <li><textarea name = "presentation"></textarea></li>
                            </ul>
                            <input type="submit" name="submitStudentProfil" onsubmit = "hideModifPresentation();" ></input>
                        </form>
                    </div>

                    <?php
                    validateStudentXP($id);
                    validatedeleteStudentXP($id);
                    $arrayXPStudent = loadXPStudent($id);
                    ?>
                    <h1><?php print getXmlText("experience"); ?></h1>
                    <div class="experience" >	 
                        <i class=" icon-pencil" onclick = "showModifExperience();"><span><?php print getXmlText("add"); ?></span></i>
                        <div class = "blockExperience"> 
                            <?php
                            while ($XPStudent = mysql_fetch_array($arrayXPStudent)) {
                                print "
                                <form method = \"post\"> 
                                    <ul>            
                                        <li><button value = \"" . $XPStudent['exp_id'] . "\" name =\"deleteXP\" type=\"submit\" class=\"close buttonDeleteExperience\" >&times;</button> </li>
                                        <li>" . " Duree de l'experience : " . $XPStudent["exp_duration"] . "</li>                                        
                                        <li>" . $XPStudent["exp_function"] . "</li>
                                        <li><a href = " . $XPStudent["ent_URLWebsite"] . ">" . $XPStudent["ent_name"] . "</a></li>
                                        <li>" . $XPStudent["exp_responsability"] . "</li>      
                                    </ul>
                                </form>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class ="modifExperience formatForm">
                        <form method = "post">
                            <button type="button" class="close closeModifExperience" onclick ="hideModifExperience();
                                    " >&times;</button>
                            <ul>
                                <li><?php print getXmlText("xpduration") . " : "; ?> <input name = "xpDuration" type="text"></input></li>
                                <li><?php print getXmlText("postName") . " : "; ?> <input name = "fonctionXP" type="text"></input></li>
                                <li><?php print getXmlText("entName") . " : "; ?> <input name = "EntrepriseName" type="text"></input></li>
                                <li><?php print getXmlText("responsability") . " : "; ?> <input name ="responsability" type="text"></input></li>	 
                            </ul>
                            <input type="submit" name ="submitStudentXP" onsubmit ="hideModifExperience();
                                   "></input>
                        </form>		
                    </div>
                    <?php
                    validateStudentFormation($id);
                    validatedeleteStudentFormation($id);
                    $formation = LoadFormationStudent($id);
                    ?>
                    
                    <h1><?php print getXmlText("education"); ?></h1> 
                    <div class="formation">		  
                        <i class=" icon-pencil" onclick = "showModifFormation();
                           "><span><?php print getXmlText("add"); ?></span></i>
                        <div class = "education">
                            <ul>
                                <?php
                                while ($FormationStudent = mysql_fetch_array($formation)) {

                                    print "<form method = \"post\"> 
                                        <li><button value = \"" . $FormationStudent['dip_id'] . "\" name =\"deleteDiploma\" type=\"submit\" class=\"close buttonDeleteEducation\" >&times;</button> </li>	
                                            <li>" . $FormationStudent['sch_name'] . "</li>
                                            <li>" . $FormationStudent['dip_name'] . "</li>
                                        </form>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>


                    <div class ="modifFormation formatForm">
                        <form method = "post">
                            <button type="button" class="close closeModifFormation" onclick ="hideModifFormation();">&times;</button>
                            <ul>
                                <li><?php print getXmlText("schoolName") . " : " ?><input name = "schoolName" type="text"></li>
                                <li><?php print getXmlText("educationName") . " : " ?><input name = "formationName" type="text"></li>
                            </ul>
                            <input type="submit" name="submitFormation" onsubmit ="hideModifFormation();"></input>
                        </form>		
                    </div>

                    <?php
                    validateStudentSkill($id);
                    validatedeleteStudentSkill($id);
                    $skills = LoadSkillsStudent($id);
                    ?>


                    <h1><?php print getXmlText("skills"); ?></h1> 
                    <div class="skills" >	
                        <i class=" icon-pencil" onclick = "showModifSkill();"><span><?php print getXmlText("add"); ?></span></i>
                        <ul>
                            <form method = "post"> 
                                <?php
                                while ($SkillsStudent = mysql_fetch_array($skills)) {

                                    print "<li><button value =\"" . $SkillsStudent['qua_id'] . "\" name =\"delete\" type=\"submit\" class=\"close closeIndividualTraining\" >&times;</button> </li>";
                                    print "<li class=\"divSkills\">" . $SkillsStudent['qua_name'] . "</li>";
                                }
                                ?>
                            </form>
                        </ul>
                    </div>	

                    <div class ="modifSkills formatForm">
                        <form method = "post">
                            <button type="button" class="close closeModifSkill" onclick ="hideModifSkill();" >&times;</button>          
                            <ul>
                                <li><?php print getXmlText("addSkill") . " : " ?> <input name = "addSkill" type="text"></li>
                            </ul>	
                            <input type="submit" name ="submitStudentSkill" onsubmit = "hideModifSkill();"></input>
                        </form>	
                    </div>

                </div>
                <!-- seconde colonne -->	
                <div class="secondColumn" class="span4">	
                    <!--  
                       <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: relative; z-index: 1; display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">July</span>&nbsp;<span class="ui-datepicker-year">2013</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">5</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">6</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">7</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">12</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">13</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">14</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">15</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default ui-state-highlight ui-state-hover" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">19</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">20</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">21</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">22</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">26</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">27</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">28</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">30</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="6" data-year="2013"><a class="ui-state-default" href="#">31</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;
                                           </div>
                    -->
                    <div class="contact" >	
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

