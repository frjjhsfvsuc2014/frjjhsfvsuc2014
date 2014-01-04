<?php
// CVTheque /
// Realisé par Lafosse VIncent @ 29/04/2013

class connect{
	static function wamp(){
		//fixe les variable de connection pour l'envirronemnt de dev
		$hostname='127.0.0.1';
		$dbuser='root';
		$dbpassword='';
		//connect au serveur
		$link = mysql_connect($hostname, $dbuser, $dbpassword); 
		//verifie la connection
		if (!$link)
			die('Could not connect to MySQL: ' . mysql_error()); 
		//pour le mode debug
		echo $debug==TRUE ? 'Connection OK'; mysql_close($link);
	} 


	// appel quand il y aura deploiment
	/* 
	static function deploiment($hostname, $dbuser, $dbpassword){
		//connect au serveur
		$link = mysql_connect('hostname','dbuser','dbpassword'); 
		//verifie la connection
		if (!$link)
			die('Could not connect to MySQL: ' . mysql_error()); 
		//pour le mode debug
		echo $debug==TRUE ? 'Connection OK'; mysql_close($link);
	} 
	*/
}

class CVTheque{
	static function loadEntreprise(){
		// test si les parametre sont vide
		connect::wamp();
		//requete preparé
		$sql = "SELECT * 
				FROM entreprise AS en
				LEFT JOIN activity_sector AS ac 
				ON en.En_id = ac.Ac_en_id
				LEFT JOIN address AS ad
				ON en.En_id = ad.Ad_re_id;"
		//execution de la requete
		$res = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		return $res;
	}

	static function loadEtudiant(){
		//connection a la bdd
		connect::wamp();
		//requete sql
		$sql = "SELECT * 
				FROM students AS st
				LEFT JOIN entreprise AS en 
				ON st.St_id = en.En_re_id
				LEFT JOIN school AS sc
				ON st.St_id = sc.Sc_re_id
				LEFT JOIN professional_travel AS pr
				ON st.St_id = pr.Pr_st_id
				;"
		//execution de la requete
		$res = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		return $res;

	}

}

CVTheque::loadEntreprise();
?>