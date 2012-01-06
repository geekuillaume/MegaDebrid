$(function() {
	$("#liens").sortable({ axis: 'y' });
});
function getXMLHttpRequest() {
	var xhr = null;
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}
/*function is_megavideo(lien) {
	if(testeur_mv(lien) == 'megavideo'){
		return (true);
	}
	else {return (false);}
}*/
function recupererlien () {
	var conteneur = document.getElementById('lien');
	var liens = conteneur.value;
	var boxdepart = document.getElementById('contenu');
	$("#contenu").hide("slow");
	liens = liens.split('\n');
	for(var i = 0; liens[i]; i++)
	{
		var lienenvoye = encodeURIComponent(liens[i]);
		/*if (testeur_mv(liens[i])) {
			var convertisseur_brut = convertisseur_mv_mu(liens[i]);
			alert (convertisseur_brut);
		}
		*/
		request(lienenvoye, i);
		$("#liens").prepend('<div class="conteneur_lien" id="conteneur_' + i +'"><img src="img/ajax-loader.gif" alt="Chargement..." height=40px></div>');
	}
	if(conteneur.value == '')
	{
		document.getElementById('liens').innerHTML = '<div class="erreur">Veuillez entrer au moins un lien.</div><br><a onclick="retour()" class="button">Retour</a>';	
	}
	else 
	{
		$("#liens").append('<br><a onclick="afficherliste()" class="button" id="triggerlistelien">Afficher la liste des liens débridés</a><br><a onclick="retour()" class="button">Retour</a>')
	}
}
function request(lienenvoye, i) {
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			afficherlien(xhr.responseText, i);
		}
		if (xhr.readyState == 4 && xhr.status == 500) {
			lien_erreur(i);
		}
	};
	xhr.open("POST", "ajax.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("lien=" + lienenvoye);
}
/*function convertisseur_mv_mu(lien) {
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			return xhr.responseText;
		}
			if (xhr.readyState == 4 && xhr.status == 500) {
			return true;
		}
	};
	xhr.open("GET", "http://metaupload.net/metaconvert/metaconvert2.php?link=" + lien, true);
	xhr.send(null);
}
function testeur_mv(lien) {
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			if(xhr.responseText == 'megavideo'){return true;}
			else {return false;}
		}
			if (xhr.readyState == 4 && xhr.status == 500) {
			return false;
		}
	};
	xhr.open("POST", "is_megavideo.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("lien=" + lien);
}*/
function afficherlien(lien, i) {
	if (lien == '') {document.getElementById('conteneur_' + i).innerHTML = 'Le lien ' + i + ' est indisponible.</div><br>';}
	else {
		document.getElementById('conteneur_' + i).innerHTML = '<a class="hreflien" href="'+ lien +'">Lien Débridé ' + i + '</a><a class="playvideo" href="lecteur.php?lien='+ lien +'">Lire</a></div><br>';
		lien = encodeURIComponent(lien);
		$("#listelien").append(lien);
		};
}
function lien_erreur(i) {
	document.getElementById('conteneur_' + i).innerHTML = 'Le lien n\'a pas pu être décodé. Veuillez réessayer.<br />';
}
function retour() {
	$("#liens").empty();
	$("#lien").val('');
	$("#contenu").show("slow");
	$("#liens").append('<textarea id="listelien" style="display:none;"></textarea>');
}
function afficherliste() {
	$("#triggerlistelien").hide();
	$("#listelien").show("fold", "slow");
}
