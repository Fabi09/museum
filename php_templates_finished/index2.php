<?php
require_once ('main/config.php');				# Config-file
require_once ('main/php/functions.php');                        # PHP-functions

init_get ('site',			'');
init_get ('project',		'');
init_get ('language',		DEFAULT_LANGUAGE);
?>

<!DOCTYPE html>
<html lang="de">
	
	<!------------Head---------------------->
	<head>
		<title><?php echo 'Ressourcen Kulturen:'.$_GET['site'] ?></title>

		<meta charset="UTF-8"/>
		<link href="main/stylesheets/styleSubPage.css" rel="stylesheet" type="text/css">
		<link href="main/stylesheets/sliderStyle.css" rel="stylesheet" type="text/css">
	</head>

	<!------------Body---------------------->
	<body>

		<!------------Banner---------------------->
		<div class="banner">
			<!--Deutsch/Englisch-->
			<div id="flag"  align="right" >
				<?php ECHO_FLAGS (); ?>
			</div>
			<img src="main/images/Logo-uni-tuebingen.png" >

		</div>
		
                <!------------Navibar---------------------->
		<?php require_once('main/templates/tpl_navibar.php'); ?>

		<!---------Background------------------>
		<div class="Background">

			<div class="Text">
				<!--------------Inhalt---------------->
				<?php
				$directory = realpath('main/data/'.$_GET['projekt'].'/');
				foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt.csv')) as $key_index => $array){
				if(!empty($array['titel'])){
				echo <<
				<EOT

				<h1>{$array['titel']}</h1>
				<h2>Zusammenfassung</h2>
				<span>{$array['zusammenfassung']}</span>

				<br>
				<br>
				<span>{$array['zusammenfassung2']}</span>
				<br>
				<br>
				EOT;
				}
				}
				?>
					<div id="slider" style="text-align: center;">
						<div id="imageContainer">
							<ul id="imageBox">
								<?php

								$directory = realpath('main/data/'.$_GET['projekt'].'/');
								foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt.csv')) as $key_index => $array){
								if (file_exists ($directory.'/bilder/'.$array['bild'])){
								echo '
								<li><img src="main/data/'.$_GET['projekt'].'/bilder/'.$array['bild'].'" onclick="showImg(this)" />
								</li>';

								}
								}
								?>
							</ul>
						</div>
						<img id="main-img" src="main/images/A01.jpg" />
					</div>
					
					<!--------------Image slider-------------------->
					<script type="text/javascript">
						function showImg(s) {
							document.getElementById("main-img").src = s.src;
						}
					</script>
			</div>
		</div>

		<!--------------Impressum---------------->
		<div class="Impressum">

			<div style="font-size: 12px; float: right; color: black; font-family: Open Sans; padding-top: 195px;">
				University of Tübingen&nbsp;&middot;
				SFB 1070 ResourceCultures&nbsp;&middot;
				Gartenstraße 29 &nbsp;&middot; D-72074 Tübingen&nbsp;&middot;
				Phone +49 7071 29-73596&nbsp;&middot;
				www.sfb1070.uni-tuebingen.de

			</div>
			<img style="float: left;" src="main/images/SFB1070-Logo.png" width="300px" height="300px">

		</div>

		</div>

	</body>

</html>
