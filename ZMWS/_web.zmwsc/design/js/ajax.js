function appelAjax( url, data){
	var methode='POST';
	if(data) method='POST';
}

jQuery.ajax({
  type: 'GET', // Le type de ma requete
  url: 'CVTheque.php', // L'url vers laquelle la requete sera envoyee
  data: {
    name: 'MEttre name entreprise / etudiant', // Les donnees que l'on souhaite envoyer au serveur au format JSON
  }, 
  success: function(data, textStatus, jqXHR) {
    // La reponse du serveur est contenu dans data
    // On peut faire ce qu'on veut avec ici
  },
  error: function(jqXHR, textStatus, errorThrown) {
    // Une erreur s'est produite lors de la requete
  }
});


<?php

//coter php
$CVTheque = array(
	"name" => "Peugeot",
);
echo json_encode($CVTheque);

?>



$(document).ready(function()){

  jQuery.ajax({
    type: 'POST', // Le type de ma requete
    url: '/php/CVTheque.php', // L'url vers laquelle la requete sera envoyee
    data: {
     etudiant : 
    }, 
    success: function(data, textStatus, jqXHR) {
    // La reponse du serveur est contenu dans data
    // On peut faire ce qu'on veut avec ici
    },
    error: function(jqXHR, textStatus, errorThrown) {
    // Une erreur s'est produite lors de la requete
    }
  })
}