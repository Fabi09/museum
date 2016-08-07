<?php
require_once ('php/functions.php');	# PHP-function to return csv array

$php_config	=	'config.php';
$php_nav	=	'templates/tpl_navibar.php';


if( is_writeable( $php_config ) && is_writeable($php_nav)){ 
   if( $handle = fopen( $php_config, 'w' ) ){
   	if ($handle2 = fopen($php_nav, 'w') ) {
       # delete file content
       fwrite( $handle, '');
	   fwrite( $handle2, '');
	   
	   # fill file content
	   file_put_contents($php_config, "<?php \n", FILE_APPEND | LOCK_EX);
	   file_put_contents($php_nav, "<!--Navigation bar-->\n<nav>\n<ul>\n", FILE_APPEND | LOCK_EX);
	   
	   # csv files
	   $file_nav		= 'navigation.csv';
	   #$file_projects	= 'projects.csv';
	   #$file_a			= 'A.csv';
	   #$file_b			= 'B.csv';
	   #$file_c			= 'C.csv';
	   #$file_similar	= 'similar.csv';
	   
	   # read csv files
	   $nav = RETURN_CSV_FILE('data/', $file_nav);
	   $len_nav = count($nav);

	   # generate constants in the config file
	   file_put_contents($php_config, "# Default values for \$_GET-vars
define ('DEFAULT_CONTENT',  'Startseite');
define ('DEFAULT_LANGUAGE', 'DE');

# language
define ('LANGUAGE_DE', 'DE');
define ('LANGUAGE_EN', 'EN');

# Images
define ('IMG_GLOBE',	'main/images/globe-green.png');
define ('IMG_FLAG_DE',	'main/images/de.gif');
define ('IMG_FLAG_EN',	'main/images/en.gif');

# Title
define ('TITLE_DE', 'SFB 1070 RessourcenKulturen');
define ('TITLE_EN', 'SFB 1070 ResourceCultures');

# Language
define ('LBL_LANGUAGE_DE', 'Deutsch');
define ('LBL_LANGUAGE_EN', 'English');\n\n", FILE_APPEND | LOCK_EX);
	   
	   
	   for ($i=0; $i < $len_nav; $i++){
		   $site = strtoupper(str_replace(" ", "", $nav[$i][1]));
		   if (strtoupper($nav[$i][1]) == 'PROJECTS'){
			   file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php',constant('SITE_".$site."_EN'),'',\$_GET['language'],'', constant ('SITE_".$site."_'.\$_GET['language'])) ?>\n", FILE_APPEND | LOCK_EX);
			   
			   # genetare navigation
			   file_put_contents($php_nav, "<ul>
			   		<li><?php ECHO_TAG_A('index.php','','A',\$_GET['language'],'', constant ('PROJECT_A_'.\$_GET['language'])) ?>\n
						<ul>
						<li><a href=\"index2.php?projekt=a01\">A01</a></li>
						<li><a href=\"index2.php?projekt=a02\">A02</a></li>
						<li><a href=\"index2.php?projekt=a03\">A03</a></li>
						<li><a href=\"index2.php?projekt=a04\">A04</a></li>
						<li><a href=\"index2.php?projekt=a05\">A05</a></li>
						<li><a href=\"index2.php?projekt=a06\">A06</a></li>
						</ul>
					</li>


					<li><?php ECHO_TAG_A('index.php','','B',\$_GET['language'],'', constant ('PROJECT_B_'.\$_GET['language'])) ?>
						<ul>
						<li><a href=\"index2.php?projekt=b01\">B01</a></li>
						<li><a href=\"index2.php?projekt=b02\">B02</a></li>
						<li><a href=\"index2.php?projekt=b03\">B03</a></li>
						<li><a href=\"index2.php?projekt=b04\">B04</a></li>
						<li><a href=\"index2.php?projekt=b05\">B05</a></li>
						<li><a href=\"index2.php?projekt=b06\">B06</a></li>
						<li><a href=\"index2.php?projekt=b07\">B07</a></li>
						</ul>
					</li>


					<li><?php ECHO_TAG_A('index.php','','C',\$_GET['language'],'', constant ('PROJECT_C_'.\$_GET['language'])) ?>
						<ul>
						<li><a href=\"index2.php?projekt=c02\">C02</a></li>
						<li><a href=\"index2.php?projekt=c03\">C03</a></li>
						<li><a href=\"index2.php?projekt=c04\">C04</a></li>
						<li><a href=\"index2.php?projekt=c05\">C05</a></li>
						<li><a href=\"index2.php?projekt=c06\">C06</a></li>
						<li><a href=\"index2.php?projekt=c07\">C07</a></li>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','M',\$_GET['language'],'', constant ('PROJECT_M_'.\$_GET['language'])) ?></li>
				</ul>
			</li>\n", FILE_APPEND | LOCK_EX);
			   
			   #file_put_contents($php_nav, "</ul>\n", FILE_APPEND | LOCK_EX);
		   } else if (strtoupper($nav[$i][1]) == 'MAP') {
		   		file_put_contents($php_nav, '<div class="globus">'."\n<a>Hier klicken um die Weltkarte zu sehen</a>\n", FILE_APPEND | LOCK_EX);
		   		file_put_contents($php_nav, "<?php ECHO_TAG_A('index.php',constant('SITE_".$site."_EN'),'',\$_GET['language'],'', RETURN_TAG_IMG (IMG_GLOBE, 'Image Map', 40)) ?> \n", FILE_APPEND | LOCK_EX);
				file_put_contents($php_nav, '</div>'."\n", FILE_APPEND | LOCK_EX);
		   } else {
		   		file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php',str_replace(\" \", \"\", constant('SITE_".$site."_EN')),'',\$_GET['language'],'', constant ('SITE_".$site."_'.\$_GET['language'])) ?> </li>\n", FILE_APPEND | LOCK_EX);
		   }
		   
		   # generate constants
		   file_put_contents($php_config, "define('SITE_".$site."_DE','".$nav[$i][0]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_config, "define('SITE_".$site."_EN','".$nav[$i][1]."');\n", FILE_APPEND | LOCK_EX);
		   
		   # if template not exists copy from default
		   if ( !file_exists('tpl_'.strtolower($site).'.php')){
		   	@copy('templates/tpl_default.php', 'templates/tpl_'.strtolower($site).".php");
		   }
		   
		   file_put_contents($php_config, "\n", FILE_APPEND | LOCK_EX);
	   } 
	file_put_contents($php_config, "# Projects
define ('SITE_PROJECT_A_DE', 'Entwicklungen');
define ('SITE_PROJECT_A_EN', 'Developments');

define ('SITE_PROJECT_B_DE', 'Bewegungen');
define ('SITE_PROJECT_B_EN', 'Movements');

define ('SITE_PROJECT_C_DE', 'Bewertungen');
define ('SITE_PROJECT_C_EN', 'Valuations');

define ('SITE_PROJECT_M_DE', 'Minigraduiertenkolleg');
define ('SITE_PROJECT_M_EN', 'Special Research Unit');

define ('PROJECT_A_DE', 'A: Entwicklungen');
define ('PROJECT_A_EN', 'A: Developments');

define ('PROJECT_B_DE', 'B: Bewegungen');
define ('PROJECT_B_EN', 'B: Movements');

define ('PROJECT_C_DE', 'C: Bewertungen');
define ('PROJECT_C_EN', 'C: Valuations');

define ('PROJECT_M_DE', 'Mini-Graduiertenkolleg');
define ('PROJECT_M_EN', 'Special Research Unit');", FILE_APPEND | LOCK_EX);
	  
	   # close PHP and Files
       file_put_contents($php_config, "\n?>", FILE_APPEND | LOCK_EX);
	   file_put_contents($php_nav, "\n</ul>\n</nav>\n", FILE_APPEND | LOCK_EX);
	   
       fclose( $handle ); 
	   fclose( $handle2 );
	   
	   
	   echo "Done!<br />Bitte pruefen Sie die Inhalt der file <br />*<b>$php_config</b>  und <br />*<b>$php_nav</b> <br />nach Korrektheit!";
   		}
	}

} else {
	echo "Sie haben entweder keine Schreibrechte auf Dateien <br />* <b>".$php_config."</b> bzw. <br />* <b>".$php_nav."</b>";
	echo "<br />oder die Dateien existieren nicht.";
}

?>
