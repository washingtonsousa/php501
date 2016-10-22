<?php
$folder = APP_ENV === 'live' ? 'dist'                       : 'assets';
$css    = APP_ENV === 'live' ? 'dist/css/dexter.min.css'    : 'assets/css/estilo.css';
$js     = APP_ENV === 'live' ? 'dist/js/dexter.min.js'      : 'assets/js/script.js';
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<title> Dexter Courier – Lab04 </title>

        <link rel="shortcut icon" href="<?= $folder ?>/images/favicon.png" type="image/x-icon" />
        <link rel="icon" href="<?= $folder ?>/images/favicon.png" type="image/x-icon" />

		<meta name="viewport" content="width=1200, initial-scale=1" />
		<meta name="description" content="Lorem ipsum dolor sit amet. Fusce luctus pretium quam quis malesuada." />
		<meta name="keywords" content="Lorem, ipsum, dolor, sit, amet, pretium, quam, quis, malesuada" />
		<meta name="author" content="Dexter Courier" />

		<meta property="og:locale" content="pt_BR" />
		<meta property="og:url" content="http://dexter-4605.rhcloud.com/" />
		<meta property="og:title" content="Dexter Courier" />
		<meta property="og:site_name" content="Dexter Courier" />
		<meta property="og:description" content="Lorem ipsum dolor sit amet luctus pretium quam quis malesuada." />
		<meta property="og:image" content="http://dexter-4605.rhcloud.com/assets/images/logo_dexter_share.png" />
		<meta property="og:type" content="website" />

		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/plugins/bxslider/jquery.bxslider.css" />
        <link rel="stylesheet" href="<?= $css ?>" />

		<script src="assets/plugins/jquery-1.11.2.js"></script>

		<!--[if lt IE 9]>
			<script src="assets/plugins/html5.js"></script>
			<script src="assets/plugins/selectivizr.js"></script>
		<![endif]-->
		<script src="assets/plugins/placeholder/jquery-placeholder.js"></script>
	</head>
	<body>
		<main id="website">
			<!-- INÍCIO - TOPO DO SITE -->
			<header id="topo">
				<div class="conteudo_padrao">
					<h1 id="logo"><a href="?q=index.html" title="Dexter Courier">Dexter Courier</a></h1> 

					<!-- INÍCIO - MENU -->
					<nav id="menu">
						<ul>
							<li><a href="?q=index.html" title="Home">Home</a></li>
							<li>
								<a href="?q=quem_somos.html" title="Sobre a Dexter">Sobre a Dexter</a>
								<ul class="submenu">
									<li><a href="?q=quem_somos.html" title="Quem Somos">Quem Somos</a></li>
									<li><a href="?q=nossos_valores.html" title="Nossos Valores">Nossos Valores</a></li>
									<li><a href="?q=linha_do_tempo.html" title="Linha do Tempo">Linha do Tempo</a></li>
								</ul>
							</li>
							<li>
								<a href="?q=servicos.html" title="Serviços">Serviços</a>
								<ul class="submenu">
									<li><a href="?q=servicos.html" title="Lab04">Lab04</a></li>
								</ul>
							</li>
							<li><a href="?q=cadastre_se.html" title="Cadastre-se">Cadastre-se</a></li>
							<li><a href="?q=contato.html" title="Contato">Contato</a></li>
						</ul>
					</nav>
					<!-- FIM - MENU -->
				</div>
			</header>
			<!-- FIM - TOPO DO SITE -->

			<!-- INÍCIO - CORPO DO SITE -->
