	<div id="contenu">

		<ul id="cont_menu_sub">
    		<li><span class="nav">International</span>		
    		<ul class="menu_sub">		
    		<li><a href="?lang=en" title="English language" ><span class="linker">English</span> <span class="linker_desc">This overview page in your language</span></a></li>		
    		<li><a href="?lang=fr" title="Langue fran�aise" ><span class="linker">Fran�ais</span> <span class="linker_desc">Voir cette page en fran�ais</span></a></li>
    		<li><a href="?lang=es" title="Langue espagnole" ><span class="linker">Espagnol</span> <span class="linker_desc">Voir cette page en espagnol</span></a></li>
    		<li><a href="?lang=it" title="Lingua italiana" ><span class="linker">Italiano</span> <span class="linker_desc">Vedere questa pagina in italiano</span></a></li>
                </ul>
    		</li>
    		
            <li><span class="nav">Directorios</span>
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
               print("-&nbsp; Nada aqui &nbsp;-");
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
               print("-&nbsp; Nada aqui &nbsp;-");
               print("</span>");
            }
            closedir($rep);
            clearstatcache();
            ?>
            </ul>
            </li>
		</ul>

		<div id="dr"><h1>Primer Arranque</h1>


		<p id="chapeau_accueil" >
		<strong>��� Acaba de ejecutar ZazouMiniWebServer y funciona, bravo !!!</strong><br /><br />
		Esta utilzando la versi�n <?php echo $_SERVER["SERVER_SOFTWARE"]."/php-".PHP_VERSION; ?><br /><br />
		 Para guiaros en su utilizaci�n para vuestro servidor, e aqu� unas explicaciones a vuestras posibles preguntas.
		</p>
		<h3>Directorio de vuestros ficheros</h3>
		<p class="descriptif">� Donde situar los ficheros de mi sitio ?</p>
		<p class="chapeau" >
		<strong>Los ficheros de vuestro sitio deben estar aqui:</strong>
		<?php
		$docroot = str_replace("/", "\\", $_SERVER["DOCUMENT_ROOT"]);
		echo "<a class=\"fichiers\" href=\"".$_SERVER["PHP_SELF"]."?execute=opendocroot\">$docroot</a>\n";
		?><br /><br />
		 Puedes renombrar o suprimir el fichero <?php echo str_replace("/", "\\", $_SERVER["SCRIPT_FILENAME"]); ?> (esta p�gina) para obtener un listado de tus ficheros.<br /><br />
	</p>
	<h2>Herramientas</h2>
		<h3>Versi�n Php</h3>
		<p class="descriptif">� Que versi�n de php tengo instalada ?</p>
		<p class="chapeau">Las informaciones de <strong>versiones para php</strong> estan <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=phpinfo"; ?>">disponibles aqui</a></p>
		<h3>Bases de datos</h2>
		<p class="descriptif">� Como acceder y administrar mis bases de datos ?</p>
		<p class="chapeau"><a class="hidden" name="mysqlstart"></a><a  class="hidden" name="mysqlstop"></a>-<strong>MySql </strong><?php echo "<i><a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstart\" class=\"demarrer\">D�marrer</a> <a href=\"".$_SERVER["PHP_SELF"]."?execute=mysqlstop\" class=\"arreter\">Arr�ter</a></i>\n"; ?><br />
		 Puedes gestionar tus bases de datos aqui : <a href="/phpmyadmin/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/phpmyadmin/</a><br /><br />
		-<strong>SqlLite</strong><br />
		 Puedes gestionar tus bases de datos aqui : <a href="/sqlitemanager/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/sqlitemanager/</a></p>

		<h3>Directorio protegido</h3>
		<p class="descriptif">� Como hacer un directorio protegido ?</p>
		<p class="chapeau">
		Para ver un ejemplo de <strong>directorio protegido</strong>, es aqu� (usuario: user1, clave: pass1) : <a  class="fichiers" href="/protected/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/protected/</a>.<br /><br />
		<strong>Nota</strong>Todo esta administrado por el fichero  _access.zmwsc situado en un subdirectorio. Es tan simple como que su sola presencia protege el directorio. La primera linea esta el nombre asociado a esta protecci�n ( aparece en la caja de login ), las lineas siguientes son un par de logins, y claves separados por el caracter ':'.
		</p>
		<h3>Estad�sticas</h3>
		<p class="descriptif">� Quien visita mi sitio ?</p>
		<p class="chapeau">
		Para generar tus <strong>estad�sticas</strong>, doble-clic sobre do_stats. Tus estad�sticas seran despu�s disponibles aqui : <a href="/stats/">http://localhost<?php if ($port!=80) echo ":$port"; ?>/stats/</a>.<br /><br />
		Pod�is utlisar <a href="<?php echo $_SERVER["PHP_SELF"]."?execute=dostats"; ?>">este link</a> para <strong>generar y consultar tus estad�sticas</strong>.<br /><br />
		<strong>Nota</strong>: Los ficheros .conf de la carpeta ZMWS son utilizados para parametrizar la presentaci�n de tus estad�sticas.
		</p>
		<h3>Parar tu servidor.</h3>
		<p class="descriptif">� Como hacer para parar mi servidor ?</p>
		<p class="chapeau">
		<Pod�is <strong>parar MySQL y ZazouMiniWebServer</strong><a class="arreter" href="<?php echo $_SERVER["PHP_SELF"]."?execute=stopall"; ?>">a este link</a>.
		</p>
		<h2>� Quieres saber mas ?</h2>


		<h3>El web (en franc�s)</h3>
		<p class="chapeau">
		Consultar el web : <a href="http://www.zmws.com">http://www.zmws.com</a><br /><br />
		� Quieres saber mas sobre su funcionalidad ? Tienes <a href="http://www.zmws.com/doc/"> documentaci�n disponible </a><br /><br />
		 En este web podr�is encontrar tambi�n un <a href="http://www.zmws.com/forum/">foro</a> correspondiente.
		</p>
		<h3>E-mail</h3>
		<p class="chapeau">
		Para enviarme un mail, preguntar, transmitir tus ideas para mejorar, decirme que usas el servidor, etc... es <a href="mailto:xavier@xgarreau.org">xavier@xgarreau.org</a>.
		</p>
		</div>


		</div>
