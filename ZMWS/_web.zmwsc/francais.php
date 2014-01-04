	<div id="contenu">
		<ul id="cont_menu_sub">
    		<li><span class="nav">Langues</span>		
    		<ul class="menu_sub">		
    		<li><a href="?lang=en" title="English language" ><span class="linker">English</span> <span class="linker_desc">This overview page in your language</span></a></li>		
    		<li><a href="?lang=fr" title="Langue fran�aise" ><span class="linker">Fran�ais</span> <span class="linker_desc">Voir cette page en fran�ais</span></a></li>
    		<li><a href="?lang=es" title="Langue espagnole" ><span class="linker">Espagnol</span> <span class="linker_desc">Voir cette page en espagnol</span></a></li>
    		<li><a href="?lang=it" title="Lingua italiana" ><span class="linker">Italiano</span> <span class="linker_desc">Vedere questa pagina in italiano</span></a></li>
                </ul>
    		</li>
    		
            <li><span class="nav">R�pertoires</span>
            <ul class="menu_sub">
            <?php
            $rep=opendir('.');
            $bAuMoinsUnRepertoire = false;
            while ($file = readdir($rep)) {
               if($file != '..' && $file !='.' && $file !='') {
                   if (is_dir($file)){
                       if (FALSE === strstr ($file, ".zmwsc") &&
                           $file<>"css" &&
                           $file<>"protected" &&
                           $file<>"icons") {
                           $bAuMoinsUnRepertoire = true;
                           print("<li><span class='linker'><a href='$file/'>$file</a></span>");
                       }
                   }
                }
            }
            if ($bAuMoinsUnRepertoire == false) {
               print("<li><span >");
               print("-&nbsp; R&eacute;pertoire vide &nbsp;-");
               print("</span>");
            }
            closedir($rep);
            clearstatcache();
            ?>
            </ul>
            </li>

            <li><span class="nav">Virtual Hosts</span>
            <ul class="menu_sub">
            <?php
    		$port = $_SERVER["SERVER_PORT"];
    		
            $rep = opendir('_vhosts.zmwsc');
            $bAuMoinsUnRepertoire = false;
            while ($file = readdir($rep)) {
                if ($file != '..' && $file !='.' && $file !='') {
                    if (is_dir('_vhosts.zmwsc/'.$file)){
                        if (FALSE === strstr ($file, ".zmwsc")) {
                            $bAuMoinsUnRepertoire = true;
                            if ($port==80)
                                print("<li><span class='linker'><a href='http://$file/'>$file</a></span>");
                            else
                                print("<li><span class='linker'><a href='http://$file:$port/'>$file</a></span>");
                        }
                    }
                }
            }
            if ($bAuMoinsUnRepertoire == false) {
               print("<li><span >");
               print("-&nbsp; R&eacute;pertoire vide &nbsp;-");
               print("</span>");
            }
            closedir($rep);
            clearstatcache();
            ?>
            </ul>
            </li>
		</ul>
		
		<div id="dr"><h1>Premier d&eacute;marrage</h1>
		
		
		<p id="chapeau_accueil" >
		<strong>Vous venez de lancer ZazouMiniWebServer et il fonctionne, bravo !!!</strong><br /><br />
		Vous utilisez actuellement la version <?php echo $_SERVER["SERVER_SOFTWARE"]."/php-".PHP_VERSION; ?><br /><br />
		Afin de vous guider dans l'utilisation de votre nouveau serveur, voici un petit guide qui repondra certainement au 1000 questions que vous vous posez en ce moment.
		</p>
		<h3>Les fichiers de votre site</h3>
		<p class="descriptif">Ou placer les fichiers de mon site ?</p>
		<p class="chapeau" >
		<strong>Les fichiers de votre site doivent �tre plac�s ici:</strong>
		<?php
		$docroot = str_replace("/", "\\", $_SERVER["DOCUMENT_ROOT"]);
		echo "<a class=\"fichiers\" href=\"".$_SERVER["PHP_SELF"]."?execute=opendocroot\">$docroot</a>\n";
		?><br /><br />
		Vous pouvez renommer ou supprimer le fichier <?php echo str_replace("/", "\\", $_SERVER["SCRIPT_FILENAME"]); ?> (cette page) pour avoir un listing de vos fichiers.<br /><br />
	</p>
	<h2>Outils</h2>
		<h3>Version Php</h3>
		<p class="descriptif">Quelle version de php est install�e ?</p>
		<p class="chapeau">Les informations de <strong>versions pour php</strong> sont <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=phpinfo"; ?>">disponibles ici</a></p>
		<h3>Bases de donn�es</h2>
		<p class="descriptif">Comment acceder et administrer mes bases de donn�es ?</p>
		<p class="chapeau"><a class="hidden" name="mysqlstart"></a><a  class="hidden" name="mysqlstop"></a>-<strong>MySql </strong><?php echo "<i><a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstart\" class=\"demarrer\">D�marrer</a> <a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstop\" class=\"arreter\">Arr�ter</a></i>\n"; ?><br />	
		vous pouvez administrer vos bases de donn�es ici : <a href="/phpmyadmin/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/phpmyadmin/</a><br /><br />	
		-<strong>SqlLite</strong><br />
		vous pouvez administrer vos bases de donn�es ici : <a href="/sqlitemanager/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/sqlitemanager/</a></p>
		
		<h3>Repertoire Prot�g�</h3>
		<p class="descriptif">Comment faire pour proteger un repertoire ?</p>
		<p class="chapeau">
		Pour voir un exemple de <strong>r�pertoire prot�g�</strong>, c'est ici (login: user1, mot de passe: pass1) : <a  class="fichiers" href="/protected/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/protected/</a>.<br /><br />
		<strong>Note</strong>: Tout est g�r� par le fichier _access.zmwsc situ� dans ce sous-r�pertoire. Sa simple pr�sence suffit � prot�ger le r�pertoire. La premi�re ligne est le nom � associ� � cette protection (qui appara�t dans la bo�te de login), les lignes suivantes sont des paires login, mot de passe s�par�s par le caract�re ':'.
		</p>
		<h3>Statistiques</h3>
		<p class="descriptif">Qui visite mon site ?</p>
		<p class="chapeau">
		Pour g�n�rer vos <strong>statistiques</strong>, double-cliquez sur do_stats. Vos statistiques sont ensuite disponibles ici : <a href="/stats/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/stats/</a>.<br /><br />
		Vous pouvez utiliser <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=dostats"; ?>">ce lien</a> pour <strong>g�n�rer et consulter vos statistiques</strong>.<br /><br />
		<strong>Note</strong>: Les fichiers .conf du dossier ZMWS sont utilis�s pour param�trer la pr�sentation de vos statistiques.
		</p>
		<h3> Arreter le serveur</h3>
		<p class="descriptif">Comment faire pour arreter mon serveur ?</p>
		<p class="chapeau">
		<strong>Stopper MySQL et ZazouMiniWebServer</strong><a class="arreter" href="<?php echo $_SERVER["PHP_SELF"]."?execute=stopall"; ?>">Arreter</a>.
		</p>
		<h2>Informations</h2>
		
		
		<h3>Le site</h3>
		<p class="chapeau">
		Consultez le site : <a href="http://www.zmws.com">http://www.zmws.com</a><br /><br />
		En savoir plus sur les fonctionnalit�s ? Vous avez <a href="http://www.zmws.com/doc/">une documentation disponible</a><br /><br />
		Sur le site vous trouverez aussi un <a href="http://www.zmws.com/forum/">forum</a> correspondant.
		</p>
		<h3>E-mail</h3>
		<p class="chapeau">
		Pour m'envoyer un mail, me poser, une question, me transmettre des id�es d'am�liorations, me dire que vous utilisez le serveur, etc... c'est <a href="mailto:xavier@xgarreau.org">xavier@xgarreau.org</a>.	
		</p>		
		</div>
		
		
		</div>
