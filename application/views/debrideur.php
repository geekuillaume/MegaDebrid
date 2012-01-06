<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<title>Débrideur Megaupload by Geekuillaume</title>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $baseurl; ?>style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
		<script>
			var baseurl = '<?php echo $baseurl;?>';
		</script>
		<script src="<?php echo $baseurl; ?>function.js" type="text/javascript"></script>
		<script src="<?php echo $baseurl; ?>jquery-ui.js" type="text/javascript"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $baseurl; ?>img/favicon_megaupload.ico">
		<?php include("../pages/suivi.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<img src="<?php echo $baseurl; ?>/img/logo.png" alt="Geekuillaume" title="Geekuillaume"/>
			<div class="hr"></div>
			<h1>Débrideur Megaupload</h1>
			<div id="contenu">
				<p>Le débrideur est actuellement down... Plus d'infos bientôt !</p>
				<p>Inserez vos liens mégaupload ci-dessous pour les convertir en liens premium.</p>
				<p>(Un lien par ligne)</p>
				<textarea name="lien" id="lien"></textarea>
				<p><a class="btn large" onclick="recupererlien();"/>ENVOYER</a></p>
			</div>
			<div id="liens">
			<textarea id="listelien" style="display:none;"></textarea>
			</div>
			<div class="hr"></div>
			<h2>Nombre de liens débridés : </h2><p class="compteur"><?php echo $nombre_liens ?></p>
		</div>
	</body>
</html>