<?php
	require_once("../acts/connect.php");	
		
	if (!isset($_SESSION["usu_id"]) || empty($_SESSION["usu_id"]) || 
	!isset($_SESSION['usu_nivel']) || empty($_SESSION["usu_nivel"]) ||
	$_SESSION['usu_nivel'] == "3" || $_SESSION["usu_id"] == "0") header('Location: ./');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="Ionita Krugner" />
	<meta name="keywords" content="Advogado, Ionita, Krugner, Mulher, Direitos" />
	<meta name="author" content="Bruno Gomes"/>

	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
	
	<title>Ionita Krugner</title>

	<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
	<link rel="manifest" href="../img/favicon/manifest.json">
	<link rel="mask-icon" href="../img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="../img/favicon/favicon.ico">	
	<meta name="msapplication-config" content="../img/favicon/browserconfig.xml">	
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-toggle.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="css/textext.plugin.autocomplete.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">	
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#"><img src="img/logo.png" width="40"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="home.php">Inicio</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-slides.php">Slides</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-videos.php">Videos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-servicos.php">Serviços</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-entrevistas.php">Entrevistas</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-informativos.php">Informativos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-jurisprudencia.php">Jurisprudência</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ger-blog.php">Blog</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Configurações do site</a>
	      </li>
	    </ul>
	    <ul class="navbar-nav mr-auto">
	    	<span class="circle">
	      		<img src="img/perfil/<?php echo $_SESSION["usu_nome"] ?>.png" width="40"> 
	      	</span>
	    	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">          
		          Olá <?php echo $_SESSION["usu_nome"] ?>, Bem vinda!
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Meus dados</a>          
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" id="logout" href="#">Sair</a>
		        </div>
		      </li>
	    </ul>
	  </div>
	</nav>
	</header>