<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lecteur de vidéos - Geekuillau.me</title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $baseurl; ?>style.css" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $baseurl; ?>img/favicon_megaupload.ico">
</head>
<body onload="openNewMovie()">
<div class="video_conteneur">
<object classid="clsid:67DABFBF-D0AB-41fa-9C46-CC0F21721616" width="1200" height="800" codebase="http://go.divx.com/plugin/DivXBrowserPlugin.cab">

 <param name="custommode" value="none" />

  <param name="mode" value="zero" />
  <param name="src" value="<?php echo $lien; ?>" />

<embed type="video/divx" src="<?php echo $_GET['lien']; ?>" custommode="none" width="1200" height="800" mode="zero"  pluginspage="http://go.divx.com/plugin/download/">
</embed>
</object>
<br />Pas de vidéos ? <a href="http://www.divx.com/software/divx-plus/web-player" target="_blank">Télécharger</a> DivX Plus Web Player.
</div>
</body>
</html>