function is_megavideo(lien) {
	var expression = /^http\:\/\/www\.megavideo\.com\/\?v\=\S{8}$/;
	if(lien.match(expression)) {
		return true;
	}
	else {
		return false;
	}
}
function recupererlien () {
	var conteneur = document.getElementById('lien');
	var liens = conteneur.value;
	var boxdepart = document.getElementById('contenu');
	$("#contenu").hide("slow");
	liens = liens.split('\n');
	for(var i = 0; liens[i]; i++)
	{
		var lienenvoye = encodeURIComponent(liens[i]);
		if (is_megavideo(liens[i]))
		{
			debrid_megavideo(liens[i], i);
		}
		else{
			debrid_megaupload(lienenvoye, i);
		}
		$("#liens").prepend('<div class="box7 " id="conteneur_' + i +'"><p class="nom">Chargement...</p></div>');
	}
	if(conteneur.value == '')
	{
		document.getElementById('liens').innerHTML = '<div class="erreur">Veuillez entrer au moins un lien.</div><br><a onclick="retour()" class="button">Retour</a>';	
	}
	else 
	{
		$("#liens").append('<br><a onclick="afficherliste()" class="btn large" id="triggerlistelien">Afficher la liste des liens débridés</a><br><a onclick="retour()" class="btn large error retour">Retour</a>')
	}
}
function debrid_megavideo(lienenvoye, i)
{
		$.ajax({url:"http://geekuillau.me/debrideur/index.php/debrideur/megavideo?lien=" + lienenvoye,
			success: function(data) {
				var lien = data;
				var extension = lien.substr(lien.lastIndexOf('.'));
				compteurplusun();
				ajouter_liste(lien);
				if (extension == '.avi')//fichier vidéo donc ajout du bouton "lire"
					{
						$("#conteneur_" + i).html('<p class="nom">Lien Megavideo</p><a class="btn large success download" href="'+lien+'">Téléchargement Premium</a>  <a class="btn large success" href="'+baseurl+'/index.php/debrideur/lecteur?lien='+lien+'">Lire</a>');
					}
				else
					{
						$("#conteneur_" + i).html('<p class="nom">Lien Megavideo</p><p class="taille"></p><a class="btn large success download" href="'+lien+'">Téléchargement Premium</a>');
					}
			
				}
			});

}
function afficherlien(lien, i) {
	if (lien == '') {document.getElementById('conteneur_' + i).innerHTML = 'Le lien ' + i + ' est indisponible.</div><br>';}
	else {
		lien=lien.split('___n___');
		var extension = lien[0].substr(lien[0].lastIndexOf('.'));//recuperer les 4 derniers caractères
		if (extension == '.avi')//fichier vidéo donc ajout du bouton "lire"
		{
			document.getElementById('conteneur_' + i).innerHTML = '<a class="hreflien" href="'+ lien[0] +'">'+ lien[1] + '</a><a class="playvideo" href="'+ baseurl +'index.php/debrideur/lecteur?lien='+ lien +'">Lire</a></div><br>';
		}
		else
		{
			document.getElementById('conteneur_' + i).innerHTML = '<a class="hreflien" href="'+ lien[0] +'">'+ lien[1] + '</a></div><br>';
		}
		$("#listelien").append(encodeURIComponent(lien[0]));
		compteurplusun();
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
function compteurplusun() {
	var compteur = $(".compteur");
	var nbliens = parseInt(compteur.html());
	nbliens += 1;
	compteur.fadeOut('fast', function() {
		compteur.html(nbliens);
 	});
	compteur.fadeIn('fast');
}
function ajouter_liste(lien) {
	$("#listelien").append(lien + '\n');
}
function debrid_megaupload(lien, i) {
	$.ajax({url:"http://geekuillau.me/debrideur/index.php/debrideur/lien_v2?lien=" + lien,
			success: function(data) {
				lien = data.split('<div class="download_member_bl" style="display:block;">');
				lien = lien[1].split("</a>");
				lien = lien[0].split('<a href="');
				lien = lien[1].split('" class="download_premium_but">');
				lien = lien[0];
				nom = data.split('<div class="download_file_name">');
				nom = nom[1].split('</div>');
				nom = nom[0];
				taille = data.split('<div class="download_file_size">');
				taille = taille[1].split('</div>');
				taille = taille[0];
				var extension = lien.substr(lien.lastIndexOf('.'));
				compteurplusun();
				ajouter_liste(lien);
				if (extension == '.avi')//fichier vidéo donc ajout du bouton "lire"
					{
						$("#conteneur_" + i).html('<p class="nom">'+nom+'</p><p class="taille">'+taille+'</p><a class="btn large success download" href="'+lien+'">Téléchargement Premium</a>  <a class="btn large success" href="'+baseurl+'/index.php/debrideur/lecteur?lien='+lien+'">Lire</a>');
					}
				else
					{
						$("#conteneur_" + i).html('<p class="nom">'+nom+'</p><p class="taille">'+taille+'</p><a class="btn large success download" href="'+lien+'">Téléchargement Premium</a>');
					}
			
				}
			});
}