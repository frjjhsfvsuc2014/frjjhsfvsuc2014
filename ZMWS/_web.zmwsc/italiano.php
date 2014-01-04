	<div id="contenu">
		<ul id="cont_menu_sub">
    		<li><span class="nav">Lingue</span>
    		<ul class="menu_sub">		
    		<li><a href="?lang=en" title="English language" ><span class="linker">English</span> <span class="linker_desc">This overview page in your language</span></a></li>		
    		<li><a href="?lang=fr" title="Langue française" ><span class="linker">Français</span> <span class="linker_desc">Voir cette page en français</span></a></li>
    		<li><a href="?lang=es" title="Langue espagnole" ><span class="linker">Espagnol</span> <span class="linker_desc">Voir cette page en espagnol</span></a></li>
    		<li><a href="?lang=it" title="Lingua italiana" ><span class="linker">Italiano</span> <span class="linker_desc">Vedere questa pagina in italiano</span></a></li>
                </ul>
    		</li>
    		
            <li><span class="nav">Cartelle</span>
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
               print("-&nbsp;Cartella vuota &nbsp;-");
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
               print("-&nbsp;Cartella vuota &nbsp;-");
               print("</span>");
            }
            closedir($rep);
            clearstatcache();
            ?>
            </ul>
            </li>
		</ul>
		
		<div id="dr"><h1>Primo avvio</h1>
		
		
		<p id="chapeau_accueil" >
		<strong>Stai per utilizzare ZazouMiniWebServer: funziona bravo !!!</strong><br /><br />
		Attualmente stai utilizzando la versione <?php echo $_SERVER["SERVER_SOFTWARE"]."/php-".PHP_VERSION; ?><br /><br />
		Al fine di guidarti nell'utilizzo del tuo nuovo server, ecco una piccola guida che risponder&agrave; certamente alle 1000 domande che ti stai ponendo in questo momento.
		</p>
		<h3>I file del tuo sito</h3>
		<p class="descriptif">Dove mettere i file del mio sito ?</p>
		<p class="chapeau" >
		<strong>I file del tuo sito devono essere messi qui:</strong>
		<?php
		$docroot = str_replace("/", "\\", $_SERVER["DOCUMENT_ROOT"]);
		echo "<a class=\"fichiers\" href=\"".$_SERVER["PHP_SELF"]."?execute=opendocroot\">$docroot</a>\n";
		?><br /><br />
		Puoi rinominare o cancellare il file <?php echo str_replace("/", "\\", $_SERVER["SCRIPT_FILENAME"]); ?> (questa pagina) per avere una lista dei tuoi file.<br /><br />
	</p>
	<h2>Outils</h2>
		<h3>Versione Php</h3>
		<p class="descriptif">Che versione di PHP &egrave; installata ?</p>
		<p class="chapeau">Le informazioni relative alla <strong>versione di PHP</strong> sono <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=phpinfo"; ?>">qui disponibili</a></p>
		<h3>Base dati</h2>
		<p class="descriptif">Come accedere alla mia base dati ed amministrarla ?</p>
		<p class="chapeau"><a class="hidden" name="mysqlstart"></a><a class="hidden" name="mysqlstop"></a>-<strong>MySql </strong><?php echo "<i><a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstart\" class=\"demarrer\">Avviare</a> <a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstop\" class=\"arreter\">Arrestare</a></i>\n"; ?><br />
		puoi amministrare la tua base dati qu&igrave; : <a href="/phpmyadmin/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/phpmyadmin/</a><br /><br />	
		-<strong>SqlLite</strong><br />
		puoi amministrare la tua base dati qu&igrave; : <a href="/sqlitemanager/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/sqlitemanager/</a></p>
		
		<h3>Cartelle protette</h3>
		<p class="descriptif">Come proteggere una cartella ?</p>
		<p class="chapeau">
		Un esempio di <strong>cartella protetta</strong>, &egrave; qu&igrave; (login: user1, mot de passe: pass1) : <a  class="fichiers" href="/protected/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/protected/</a>.<br /><br />
		<strong>Nota</strong>: tutto viene gestito dal file _access.zmwsc situato in questa sotto-cartella. La sua presenza è sufficiente a proteggere la cartella. La prima linea rappresenta il nome associato a questa protezione (che apparir&agrave; nel box del login); le linee seguenti rappresentano allo stesso modo login e parloa d'ordine separati dal carattere ':'.
		</p>
		<h3>Statistiche</h3>
		<p class="descriptif">Chi visita il mio sito ?</p>
		<p class="chapeau">
		Per gestire le tue <strong>statistiche</strong>, clicca due volte su do_stats. Le tue statistiche saranno poi disponibili qu&igrave; : <a href="/stats/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/stats/</a>.<br /><br />
		Puoi utilizzare <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=dostats"; ?>">questo collegamento</a> per <strong>gestire e consultare le statistiche</strong>.<br /><br />
		<strong>Nota</strong>: i file .conf della cartella ZMWS sono utilizzati per parametrare la presentazione delle tue statistiche.
		</p>
		<h3> Arrestare il server</h3>
		<p class="descriptif">Come fare per arrestare il server ?</p>
		<p class="chapeau">
		<strong>Per spegnere MySQL e ZazouMiniWebServer </strong><a class="arreter" href="<?php echo $_SERVER["PHP_SELF"]."?execute=stopall"; ?>">Clicca qu&igrave;</a>.
		</p>
		<h2>Informazioni</h2>
		
		
		<h3>Il sito</h3>
		<p class="chapeau">
		Consulta il sito : <a href="http://www.zmws.com">http://www.zmws.com</a><br /><br />
		Saperne di più sulle funzionalit&agrave; ? C'&egrave; <a href="http://www.zmws.com/doc/">una documentazione disponibile</a><br /><br />
		Sul sito troverai anche un <a href="http://www.zmws.com/forum/">forum</a> corrispondente.
		</p>
		<h3>E-mail</h3>
		<p class="chapeau">
		Per inviarmi una e-mail, pormi una domanda, suggerirmi delle idee di miglioramento, dirmi se utilizzate il server, etc... scrivete a : <a href="mailto:xavier@xgarreau.org">xavier@xgarreau.org</a>.
		</p>		
		</div>
		</div>
