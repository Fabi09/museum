<?php
require_once ('main/config.php');				# Config-file
require_once ('main/php/functions.php'); # PHP-functions

init_get ('site',			'');
init_get ('project',		'');
init_get ('language',		DEFAULT_LANGUAGE);
?>

	<!DOCTYPE html>
	<html lang="de">
		<head>
	    	<title><?php echo 'Ressourcen Kulturen:'.$_GET['site'] ?></title>

	    	<meta charset="UTF-8"/>
	    	<link href="main/stylesheets/styleSubPage.css" rel="stylesheet" type="text/css">
	  	</head>


		<!------------Body---------------------->
	  	<body>


			<!------------banner---------------------->
				<div class="banner">
				<!--Deutsch/Englisch-->
				<div id="flag"  align="right" >
					<?php ECHO_FLAGS (); ?></div>
				<img src="main/images/Logo-uni-tuebingen.png" >

			</div>


		    <?php
		 		require_once('main/templates/tpl_navibar.php'); ?>

				<div class="timeline">
						<img src="main/images/timetable.jpg"  usemap="#timetable" alt="timetable" width="100%"/>
						<map id="timetable" name="timetable">
							<area shape="rect" alt="A01" title="A01" coords="308,80,588,91" href="" target="_blank" />
							<area shape="rect" alt="B01" title="B01" coords="106,185,178,199" href="" target="" />
							<area shape="rect" alt="B01" title="B01" coords="458,240,983,259" href="" target="" />
							<area shape="rect" alt="A03" title="A03" coords="648,213,702,229" href="" target="" />
							<area shape="rect" alt="A06" title="A06" coords="756,214,786,227" href="" target="" />
							<area shape="rect" alt="C03" title="C03" coords="827,210,915,228" href="" target="" />
							<area shape="rect" alt="A05" title="A05" coords="614,184,847,203" href="" target="" />
							<area shape="rect" alt="A04" title="A04" coords="729,82,801,93" href="" target="" />
							<area shape="rect" alt="B04" title="B04" coords="839,78,873,96" href="" target="" />
							<area shape="rect" alt="B07" title="B07" coords="722,50,807,62" href="" target="" />
							<area shape="rect" alt="C02" title="C02" coords="845,23,886,37" href="" target="" />
							<area shape="rect" alt="B06" title="B06" coords="1009,77,1052,96" href="" target="" />
							<area shape="rect" alt="B03" title="B03" coords="1061,48,1101,67" href="" target="" />
							<area shape="rect" alt="C04" title="C04" coords="1120,78,1173,98" href="c04.html" target="" />
							<area shape="rect" alt="C05" title="C05" coords="1070,185,1109,201" href="" target="" />
							<area shape="rect" alt="C06" title="C06" coords="1134,183,1169,200" href="c06.html" target="" />
						</map>
					</div>



<!---------Background------------------>
	<div class="Background">

<div class="Text">
		<!--------------Inhalt---------------->
		<?php
$directory = realpath('main/data/'.$_GET['projekt'].'/');
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
?>
 	</div>
		 	</div>



			<!--------------Impressum---------------->
			<div class="Impressum">

					<div style="float: left; color: black; font-family: Open Sans; padding-top: 80px;">
							University of Tübingen<br>
							SFB 1070 ResourceCultures<br>
							Gartenstraße 29 &middot; D-72074 Tübingen<br> <br>
							Phone +49 7071 29-73596<br>
							www.sfb1070.uni-tuebingen.de

							</div>
										<img style="float: right;" src="main/images/SFB1070-Logo.png" width="300px" height="300px">





							</div>

						</div>

	 	</body>




	</html>
