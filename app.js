$(document).ready(function () {
	$("#submit").click(function (event) {
		appelAjax(); // exécute notre fonction pour le traitement du submit
	});


	function appelAjax() {

		$.get("ajax.php", function (data) {
			console.log(data);
			console.log($.parseJSON(data));
	var result = $.parseJSON(data);
var ouvertureTable = "<table border='1'>";
var contentTable = "";
var fermetureTable = "</table>";

			$.each(result,function(indice, objet){
				console.log("indice = " + indice + " " + "objet= " + objet.id_car);
			});

$.each(result, function (indice, objet) {
	contentTable += "<tr>";
	contentTable += "<td>" + objet.
	 + "</td>";
	contentTable += "<td>" + objet.prenom + "</td>";
	contentTable += "<td>" + objet.nom + "</td>";
	contentTable += "<td>" + objet.sexe + "</td>";
	contentTable += "<td>" + objet.service + "</td>";
	contentTable += "<td>" + objet.salaire + "</td>";
	contentTable += "<td>" + objet.date_embauche + "</td>";
	contentTable += "</tr>";
});

var table = ouvertureTable + contentTable + fermetureTable;
$("#resultat").html(table);



});

}


});
