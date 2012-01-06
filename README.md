MegaDebrid est une application basée sur le framework PHP CodeIgniter.
===

### Intro :

Cette appli pour CodeIgniter est un débrideur pour Megaupload et Megavideo avec un design soigné et une bonne réactivité.
Pour la faire fonctionner il faut un compte premium et une base de donnée SQL.
Elle génère uniquement des liens premium et les envoie à l'utilisateur.
De plus un lecteur DivX est integré pour voir les vidéos en streaming. 

## Définir les variables système :


	- application/config/config.php	-> Remplir l'adresse URL
	- application/config/database.php	-> Remplir les infos de la base de données

## Créer la base de données :

	
	- Créer une base de données nommée "liens"
	- Créer une base de données nommée "utilisateurs"
	
## Ajouter le cookie :


	- application/controllers/debrideur.php		-> Remplacer les "******" par la valeur de votre cookie "user" premium. (3x)
	
## Customiser le tout :


	- La page principale se trouve ici : /application/view/debrideur.php
	
### Crédits

Créateur : [Geekuillaume] (geekuillau.me)