/**@description Callback : Récupère et affiche les inputs de formulaire.
* L’implémentation utilise jQuery .
* @function afficheDonneesForm
* @param { jQueryEvent } event−l’évènement ( de type submit ) géré par ce Handler
*/
var afficheDonneesForm = function(event) {
	// récupération ( via jQuery ) de la valeur de l’input d’ID”nom”
	var nom = $("#nom").val();
	// récupération ( via jQuery ) de la valeur du select d’ID”annee”
	var annee = $("#annee").val();
	// test de champs obligatoires et d’expressions régulière sur le nom
	if ((annee !== "Première" && annee !== "Deuxième") && nom == ''){
		$("#spanResultat").html("Problème : forme d'un champs incorrect.");
	return false;
	}else{
		$("#spanResultat").html('<em>Nom :</em>' + nom + '<br>' + '<em>Année :</em>' + annee);
		return false;
	}
	// Éviter d’appeler l’”action” par défaut(requête sur un script PHP, etc.)
	// du formulaire lors du click sur le bouton submit
	event.premventDefault();
};
	// Gestion de l’événement submit du formulaire.
	// On définit afficheDonneesForm comme gestionnaire(handler)
	// de l’évènement.
$("#formStudentData").on("submit",afficheDonneesForm);