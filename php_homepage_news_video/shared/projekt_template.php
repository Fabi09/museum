<?php
 require_once 'funktionen.php';
 echo <<<EOT
<!DOCTYPE html>

<html>

	<!-----------------HEAD--------------------->
	<head>
		<title>c04</title>
		<meta charset="utf-8">

		<link href="style2.css" type="text/css" rel="stylesheet"/>
		
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400;300' rel='stylesheet' type='text/css'>
		
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="keywords" content="slideman, sliderman.js, javascript slider, jquery, slideshow, effects" />
	<meta name="description" content="Sliderman" />
	
		<!-- sliderman.js -->
	<script type="text/javascript" src="HomePageSlider.js"></script>
	<link rel="stylesheet" type="text/css" href="HomePageSlider.css" />
	<!-- /sliderman.js -->
	<style type="text/css">
		* { outline: none; }
		.c { clear: both; }
		#wrapper { margin: 0 auto; padding-right: 140px; width: 500px; }
		
	</style>


	</head>

	<!-----------------BODY--------------------->
	<body>
<div class="bg">
		<!--Banner Bild-->
		<div class="banner">
		<div id="flag"  align="right" style="height: 50px; padding-right:5px;">
	    		<a href="index.html"><img src="images/de.gif" title="Deutsch" alt="Deutsch" /></a>
	  			<a href="index_en.html"><img src="images/en.gif" title="English" alt="English" /></a>
	  		</div>
			<div id="search" align= "right" style=" margin-right= 50px;">
			<input name="q" size="20" value="" class="searchinput" placeholder="Suche" type="text" >
			</div>
			<img style="padding-bottom:50px;  padding-left:15px;" src="images/Logo-uni-tuebingen.png" >
			<!--Deutsch/Englisch-->
		
		</div>
		<!--Navigation bar-->
			<nav>
		
			<ul>
				<li>
					<li>	<a  href="http://localhost/php/shared/homepage_news_video.php?projekt=newsfeed">Home</a>
				</li>

				<li>
					<a class="active" href="">Teilprojekte</a>
					<ul>
				<li><a href="#">A: Entwicklungen</a>
				<ul>
				<li><a href="#">A01</a></li>
				<li><a href="#">A02</a></li>
				<li><a href="#">A03</a></li>
				<li><a href="#">A04</a></li>
				<li><a href="#">A05</a></li>
				</ul>
				</li>
				<li><a href="#">B: Bewegungen</a>
				<ul>
				<li><a href="#">B01</a></li>
				<li><a href="#">B02</a></li>
				<li><a href="#">B03</a></li>
				<li><a href="#">B04</a></li>
				<li><a href="#">B05</a></li>
				</ul></li>
				<li><a href="bewertungen.html">C: Bewertungen</a>
				<ul>
				<li><a href="#">C01</a></li>
				<li><a href="#">C02</a></li>
				<li><a href="#">C03</a></li>
				<li><a href="http://localhost/php/shared/projekt_template.php?projekt=c04">C04</a></li>
				<li><a href="#">C05</a></li>
				<li><a href="http://localhost/php/shared/projekt_template.php?projekt=c06">C06</a></li>
				</ul></li>
				<li><a href="#">Minigraduiertenkolleg</a></li>
			
				</ul> </li>

				<li>
					<a href="#">Geschichte</a>
				</li>

				<li>
					<a href="#">Publikationsreihe</a>
				</li>

				<li>
					<a href="#">Termine</a>
				</li>

				<li>
					<a href="#">Kontakt</a>
				</li>

			
		

				<div class="globus">
				<a style= "padding:0px; border:120px;" href="map.html"><img src="images/globe-green.png" height="40px" width="40px"> </a> </div>
			</ul>
		</nav>
		<!--Menu Main body 
		<div class="icon-menu">
			<i class="fa fa-bars"></i>
			Gruppen Projekte

		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="app.js"></script>
-->
		<!--------------Inhalt---------------->
EOT;
 
	echo '<div class="Background">';
	echo '<div class="Text">';
 
$directory = realpath(__DIR__ . '/../data/'.$_GET['projekt'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt.csv')) as $key_index => $array){
	if(!empty($array['titel'])){
	echo <<<EOT
	
	<h1>{$array['titel']}</h1>
	<h2>Zusammenfassung</h2>
	<span>{$array['zusammenfassung']}</span>
	
	<br>
	<br>
	<span style="color: red;">{$array['zusammenfassung2']}</span>
	<br>
	<br>
EOT;
	}
	if (file_exists ($directory.'/bilder/'.$array['bild'])){
		echo '<img style="max-width: 100; max-height: 100px" src="../data/' . $_GET['projekt'] . '/bilder/' . $array['bild'] . '" alt=""/>';
		echo '&nbsp;&nbsp;&nbsp;';
	}
	else {
		echo '&nbsp;&nbsp;&nbsp;';
	}
}
echo '</div>';
	
echo <<<EOT
	</body>
	</html>
EOT;
