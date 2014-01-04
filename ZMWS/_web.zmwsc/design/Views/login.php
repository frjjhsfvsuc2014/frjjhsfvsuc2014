<!----------------------------------------------------

	AUTHOR
	Last name : ZYRA, CARRERE
	First name : Jérémy

	FILE
	Name : index.html
	Last modified : 03/03/2013
	
	DESCRIPTION
	This page contain the basic html code.

------------------------------------------------------>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Horizon-Stage</title>

	
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body style=" padding: 0px;"> <!-- For IE -->


	

	
	
	<div id="login" class="login" >	
		<fieldset>
			<label class="login-user">
				E-mail	<input class="text" type="text" autofocus="" tabindex="1" maxlength="80" name="login_form[username]">
			</label>
		
		</fieldset>
		<fieldset>
			<label class="login-pass">
				Mot de passe
				<br>
				<input class="text" type="password" data-preloader="" tabindex="2" maxlength="80" name="login_form[password]">
				<a class="lost-password" tabindex="5" href="lostpassword.php">Mot de passe oublié ?</a>
			</label>
		</fieldset>
		<button tabindex="60" type="submit"> Connexion </button>	
	</div>	
	
	<div id="loginpresentation" class="loginpresentation" >	
	
		<h1>Je vous sert un cafe<h1/>
		
		<h2>Qui sommes nous?</h2>
		<p>jjjjjjjjjjdsjdjkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjdjjddjdjdjdjdj</p>
		<h2>blbllall</h2>	
		<p>jjjjjjjjjjdsjdjkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjdjjddjdjdjdjdj</p>	
	</div>
	
	<div id="incription" class="incription" >	
		
		<li>
			<label for="reg-first_name">Prénom </label>
			<input id="reg-first_name" class="text" type="text" data-error-message="Veuillez entrer votre prénom." autocomplete="off" tabindex="10" value="" name="first_name">
		</li>
		<li>
			<label for="reg-last_name">Nom </label>
			<input id="reg-last_name" class="text" type="text" data-error-message="Veuillez entrer votre nom de famille ici." autocomplete="off" tabindex="20" value="" name="last_name">
		</li>
		<li>
			<label for="reg-email">E-mail</label>
			<input id="reg-email" class="text" type="text" data-error-message="SVP vérifiez l'adresse e-mail entrée." autocomplete="off" tabindex="30" value="" name="email">
		</li>
		<li>
			<label for="reg-password">Mot de passe</label>
			<input id="reg-password" class="password text" type="password" data-error-message="Veuillez choisir un mot de passe (4 caractères minimum)." autocomplete="off" tabindex="40" value="" maxlength="80" name="password">
		</li>
		<li class="underline-link mb15 terms-and-conditions">
			<label for="terms-and-conditions">
			<input id="terms-and-conditions" type="checkbox" data-error-message="Veuillez confirmer que vous acceptez les Conditions générales d'utilisation et la Déclaration de confidentialité." tabindex="50" name="tandc_check">
			J'accepte la
			<a target="_blank" href="/app/user?op=tandc&what=dp">Déclaration de confidentialité</a>
			et les
			<a target="_blank" href="/app/user?op=tandc">Conditions d'utilisation</a>
			de .
			</label>
		</li>
		<li>
			<button tabindex="60" type="submit"> Inscrivez-vous gratuitement ! </button>
		</li>
		
		
	</div>



	</body>
</html>