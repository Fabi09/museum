<?php
require_once ('main/config.php');				# Config-file
require_once ('main/php/functions.php');        # PHP-functions

init_get ('site',			'');
init_get ('project',		'');
#init_get ('subproject',	'');
init_get ('language',		DEFAULT_LANGUAGE);
?>
<!DOCTYPE html>
<html lang="de">
	<head>
    	<title><?php echo 'Ressourcen Kulturen:'.$_GET['site'] ?></title>

    	<meta charset="UTF-8"/>
    	<link href=main/stylesheets/style.css rel="stylesheet" type="text/css">
  	</head>


	<!------------Body---------------------->
  	<body>


		<!------------banner---------------------->
			<div class="banner">
				<img src="main/images/Logo-uni-tuebingen.png" >
				<!--Deutsch/Englisch-->
				<div id="flag"  align="right" >
					<?php ECHO_FLAGS (); ?>
				</div>
			</div>


	    <?php
	 		require_once('main/templates/tpl_navibar.php'); ?>



			<div class="timeline">

					<img src="main/images/Zeitstrahl.jpg"  usemap="#timetable" alt="timetable" />

					<map id="timetable" name="timetable">
						<area shape="rect" alt="B01" title="" coords="102,196,171,214" href="index2.php?projekt=b01" target="" />
						<area shape="rect" alt="A01" title="" coords="332,85,624,105" href="index2.php?projekt=a01" target="" />
						<area shape="rect" alt="B01" title="" coords="482,255,1026,275" href="index2.php?projekt=c07" target="" />
						<area shape="rect" alt="A03" title="" coords="681,226,743,246" href="index2.php?projekt=a03" target="" />
						<area shape="rect" alt="A06" title="" coords="792,227,828,245" href="index2.php?projekt=a06" target="" />
						<area shape="rect" alt="A05" title="" coords="647,196,886,216" href="index2.php?projekt=a05" target="" />
						<area shape="rect" alt="C05" title="" coords="1121,194,1158,217" href="index2.php?projekt=c05" target="" />
						<area shape="rect" alt="C03" title="" coords="865,227,970,244" href="index2.php?projekt=c03" target="" />
						<area shape="rect" alt="A04" title="" coords="768,86,840,106" href="index2.php?projekt=a04" target="" />
						<area shape="rect" alt="B07" title="" coords="752,54,844,77" href="index2.php?projekt=b07" target="" />
						<area shape="rect" alt="B04" title="" coords="882,85,917,106" href="index2.php?projekt=b04" target="" />
						<area shape="rect" alt="C02" title="" coords="885,28,934,46" href="index2.php?projekt=c02" target="" />
						<area shape="rect" alt="B06" title="" coords="1056,85,1099,105" href="index2.php?projekt=b06" target="" />
						<area shape="rect" alt="B03" title="" coords="1110,56,1160,76" href="index2.php?projekt=b03" target="" />
						<area shape="rect" alt="C04" title="" coords="1184,86,1224,105" href="index2.php?projekt=c04" target="" />
						<area shape="rect" alt="C06" title="" coords="1187,196,1227,218" href="index2.php?projekt=c06" target="" />

					</map>

				</div>

<div class="Background">

<?php
			if (!empty ($_GET['site'])){
				require_once ('main/templates/tpl_'.strtolower($_GET['site']).'.php');
			}

			else {
				require_once ('main/templates/tpl_'.strtolower($_GET['project']).'.php');
			}
		?>

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
