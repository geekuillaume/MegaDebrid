<?php
// =============================== Ajax debrideur megaupload ===============================
preg_match_all("#http://(www\.)?megaupload\.com/[a-zA-Z]*/?\?d=([A-Za-z0-9]{8}$)#i",$_POST['lien'], $lien_mu);

if ($lien_mu[0][0] != '') 
{
	$lien = escapeshellarg(escapeshellcmd(trim(htmlspecialchars($lien_mu[0][0]))));
	$commande = 'plowdown -a guillaumeb10:monkeyisland --download-info-only=%url ';
	$commande .= $lien;
	If ($resultat = shell_exec($commande)) {
		echo $resultat;
	}
	try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=debrideur', 'debrideur', 'hqUCrE9KVx6E2reC', $pdo_options);
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	//$bdd->execute('INSERT INTO liens(IP, lien, date) VALUES(\''$_SERVER["REMOTE_ADDR"]'\', \''$lien_mu'\', NOW())');
	/*$req = $bdd->prepare('INSERT INTO liens(IP, lien, date) VALUES(:IP, :lien, :date)');
	$req->execute(array(
		'IP' => $_SERVER["REMOTE_ADDR"],
		'lien' => $lien,
		'date' => NOW()
		));*/
}
?>