<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<title>Débrideur Megaupload by Geekuillaume</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
		<script src="function.js" type="text/javascript"></script>
		<script src="jquery-ui.js" type="text/javascript"></script>
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon_megaupload.ico">
		<?php include("../../pages/suivi.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<img src="img/logo.png" alt="Geekuillaume" title="Geekuillaume"/>
			<div class="hr"></div>
			<h1>Débrideur Megaupload</h1>
			<div id="contenu">
				<p>Inserez vos liens mégaupload ci-dessous pour les convertir en liens premium.</p>
				<p>(Un lien par ligne, 7 liens maximum)</p>
				<textarea name="lien" id="lien"></textarea>
				<p><a class="button" onclick="recupererlien();"/>ENVOYER</a></p>
			</div>
			<div id="liens">
			<textarea id="listelien" style="display:none;"></textarea>
			</div>
		</div>
	</body>
</html>
