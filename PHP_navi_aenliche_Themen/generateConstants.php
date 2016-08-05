<?php
require_once ('main/config.php');				# Config-file
require_once (DIR_PHP.'php__HTMLELEMENTS.php'); # PHP-functions to echo HTML-tags
require_once (DIR_PHP.'php__BASIC.php');        # PHP-functions

$php_const = DIR_CONSTANTS.'constants.php';
$php_nav = DIR_CONSTANTS.'navi_list.php';


if( is_writeable( $php_const ) && is_writeable($php_nav)){ 
   if( $handle = fopen( $php_const, 'w' ) ){
   	if ($handle2 = fopen($php_nav, 'w') ) {
       # delete file content
       fwrite( $handle, '');
	   fwrite( $handle2, '');
	   
	   # fill file content 
	   file_put_contents($php_const, "<?php \n", FILE_APPEND | LOCK_EX);
	   file_put_contents($php_nav, "<nav>\n<ul>\n", FILE_APPEND | LOCK_EX);
	   
	   # csv files
	   $file_nav		= 'navigation.csv';
	   $file_projects	= 'projects.csv';
	   $file_a			= 'A.csv';
	   $file_b			= 'B.csv';
	   $file_c			= 'C.csv';
	   $file_similar	= 'similar.csv';
	   
	   # read csv files
	   $nav = RETURN_CSV_FILE(DIR_CSV, $file_nav);
	   $len_nav = count($nav);
	   
	   $project = RETURN_CSV_FILE(DIR_CSV, $file_projects);
	   $len_pr = count($project);
	   
	   $project_a = RETURN_CSV_FILE(DIR_CSV, $file_a);
	   $len_a = count($project_a);
	   
	   $project_b = RETURN_CSV_FILE(DIR_CSV, $file_b);
	   $len_b = count($project_b);
	   
	   $project_c = RETURN_CSV_FILE(DIR_CSV, $file_c);
	   $len_c = count($project_c);
	   
	   # define navigation constants and create navigation list
	   file_put_contents($php_const, "# Navigation\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < $len_nav; $i++){
	   		#echo substr($nav[$i][2],0, -4)."\t".$nav[$i][2]."\n\n";
		   $site = strtoupper(str_replace(" ", "", $nav[$i][1]));
		   if (substr($nav[$i][2], 0, -4) == 'projectlist'){
			   file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php','".$site."','','',\$_GET['language'],'', constant ('SITE_".$site."_'.\$_GET['language'])) ?>\n", FILE_APPEND | LOCK_EX);
			   
			   # genetare Project- and Subproject-list
			   file_put_contents($php_nav, "<ul>\n", FILE_APPEND | LOCK_EX);
			   
			   for ($l=0; $l < $len_pr; $l++) {
			   		
				   	if ($project[$l][0] == 'A'){
				   		file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','A','',\$_GET['language'],'', constant ('PROJECT_A_'.\$_GET['language'])) ?>\n<ul>\n", FILE_APPEND | LOCK_EX);
						
						for ($a=0; $a < $len_a; $a++) { 
							file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','A','".$project_a[$a][0]."', \$_GET['language'],'', 'A 0".substr($project_a[$a][0], -1)."')?> </li>\n", FILE_APPEND | LOCK_EX);
						}
						file_put_contents($php_nav, "</ul> \n</li>\n", FILE_APPEND | LOCK_EX);
						
				   	} else if ($project[$l][0] == 'B') {
				   		file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','B','',\$_GET['language'],'', constant ('PROJECT_B_'.\$_GET['language'])) ?>\n<ul>\n", FILE_APPEND | LOCK_EX);
						
						for ($b=0; $b < $len_b; $b++) { 
							file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','B','".$project_b[$b][0]."', \$_GET['language'],'', 'B 0".substr($project_b[$b][0], -1)."') ?> </li>\n", FILE_APPEND | LOCK_EX);
						}
						file_put_contents($php_nav, "</ul> \n</li>\n", FILE_APPEND | LOCK_EX);
						
				   	} else if ($project[$l][0] == 'C') {
				   		file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','C','',\$_GET['language'],'', constant ('PROJECT_C_'.\$_GET['language'])) ?>\n<ul>\n", FILE_APPEND | LOCK_EX);
						
						for ($c=0; $c < $len_c; $c++) { 
							file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','C','".$project_c[$c][0]."', \$_GET['language'],'', 'C 0".substr($project_c[$c][0], -1)."') ?> </li>\n", FILE_APPEND | LOCK_EX);
						}
						file_put_contents($php_nav, "</ul> \n</li>\n", FILE_APPEND | LOCK_EX);
				   	} else {
				   		file_put_contents($php_nav, "<li> <?php ECHO_TAG_A('index.php','','".$project[$l][0]."','',\$_GET['language'],'', constant ('PROJECT_".$project[$l][0]."_'.\$_GET['language'])) ?>\n</li>\n", FILE_APPEND | LOCK_EX);
				   	}
				   #file_put_contents($php_nav, "".$project[$i][0]."\n", FILE_APPEND | LOCK_EX);
			   }
			   
			   file_put_contents($php_nav, "</ul>\n", FILE_APPEND | LOCK_EX);
		   } else if (substr($nav[$i][2], 0, -4) == 'map') {
		   		file_put_contents($php_nav, '<div class="globus">'."\n", FILE_APPEND | LOCK_EX);
		   		file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php','".$site."','','',\$_GET['language'],'', RETURN_TAG_IMG (IMG_GLOBE, 'Image Map', 40)) ?> </li>\n", FILE_APPEND | LOCK_EX);
				file_put_contents($php_nav, '<div>'."\n", FILE_APPEND | LOCK_EX);
		   } else {
		   		file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php','".$site."','','',\$_GET['language'],'', constant ('SITE_".$site."_'.\$_GET['language'])) ?> </li>\n", FILE_APPEND | LOCK_EX);
		   }
		   
		   # pages
		   file_put_contents($php_const, "define('SITE_".$site."_DE','".$nav[$i][0]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_const, "define('SITE_".$site."_EN','".$nav[$i][1]."');\n", FILE_APPEND | LOCK_EX);
		   if (empty($nav[$i][2])){
		   		if (!file_exists(DIR_TEMPLATES."$site.php")){
		   			@copy(DIR_TEMPLATES.'default_site.php', DIR_TEMPLATES.strtolower($site).".php");
		   		}
		   		file_put_contents($php_const, "define('TPL_".$site."','".strtolower($site).".php');\n", FILE_APPEND | LOCK_EX);
		   		#$datei = fopen(DIR_CONSTANTS.str_replace(" ", "", "bla blu bla.php"),"w");
		   		#fwrite($datei, "Hallo Welt",100);
		   		#fclose($datei);	
		   } else {
		   		file_put_contents($php_const, "define('TPL_".$site."','".$nav[$i][2]."');\n", FILE_APPEND | LOCK_EX);
		   }
		   if (!empty($nav[$i][3])) {
		   		file_put_contents($php_const, "define('CSV_".$site."','".$nav[$i][3]."');\n", FILE_APPEND | LOCK_EX);
		   }
		   file_put_contents($php_const, "\n", FILE_APPEND | LOCK_EX);
	   }
	   #file_put_contents($php_const, "define('SITE_MAP_DE','Karte');\n", FILE_APPEND | LOCK_EX);
	   #file_put_contents($php_const, "define('SITE_MAP_EN','Map');\n", FILE_APPEND | LOCK_EX);


	   # define Project constants
	   file_put_contents($php_const, "\n\n #Projekte \n", FILE_APPEND | LOCK_EX);
	   
	   for ($i=0; $i < $len_pr; $i++){
		   file_put_contents($php_const, "define('PROJECT_".$project[$i][0]."_DE','".$project[$i][1]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_const, "define('PROJECT_".$project[$i][0]."_EN','".$project[$i][2]."');\n\n", FILE_APPEND | LOCK_EX);
	   }
	   
	   # define Subproject arrays
	   file_put_contents($php_const, "\n\n #Subprojekte \n", FILE_APPEND | LOCK_EX);
	   
	   # Teilprojekt A
	   file_put_contents($php_const, "\ndefine('A_NUM',".$len_a.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_const, '$A_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_a-1); $i++){
		   file_put_contents($php_const, "\t'".$project_a[$i][0]."' => '".$project_a[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_a[$len_a-1][0]."' => '".$project_a[$len_a-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_const, '$A_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_a-1); $i++){
		   file_put_contents($php_const, "\t'".$project_a[$i][0]."' => '".$project_a[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_a[$len_a-1][0]."' => '".$project_a[$len_a-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n", FILE_APPEND | LOCK_EX);
	   
	   # Teilprojekt B
	   file_put_contents($php_const, "\ndefine('B_NUM',".$len_b.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_const, '$B_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_b-1); $i++){
		   file_put_contents($php_const, "\t'".$project_b[$i][0]."' => '".$project_b[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_b[$len_b-1][0]."' => '".$project_b[$len_b-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_const, '$B_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_b-1); $i++){
		   file_put_contents($php_const, "\t'".$project_b[$i][0]."' => '".$project_b[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_b[$len_b-1][0]."' => '".$project_b[$len_b-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   # Teilprojekt C
	   file_put_contents($php_const, "\ndefine('C_NUM',".$len_c.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_const, '$C_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_c-1); $i++){
		   file_put_contents($php_const, "\t'".$project_c[$i][0]."' => '".$project_c[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_c[$len_c-1][0]."' => '".$project_c[$len_c-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_const, '$C_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len_c-1); $i++){
		   file_put_contents($php_const, "\t'".$project_c[$i][0]."' => '".$project_c[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_const, "\t'".$project_c[$len_c-1][0]."' => '".$project_c[$len_c-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_const, "); \n\n", FILE_APPEND | LOCK_EX);
	   
	   
	   # aenliche Projekte
	   $sim = RETURN_CSV_FILE(DIR_CSV, $file_similar);
	   $len = count($sim);
	   
	   for ($i=0; $i < $len; $i++) { 
		   $len2 = count($sim[$i]);
		   
		   file_put_contents($php_const, '$SIM['.$i.'] = array( ', FILE_APPEND | LOCK_EX);
		   for ($j=0; $j < ($len2-1); $j++) {
			   	if (!empty($sim[$i][$j])){
			   		file_put_contents($php_const, "'".$sim[$i][$j]."'" , FILE_APPEND | LOCK_EX);
			   	}
				if (!empty($sim[$i][$j+1])){
			   		file_put_contents($php_const, "," , FILE_APPEND | LOCK_EX);
			   	}   
		   }
		   if (!empty($sim[$i][$len2-1])){
		   	file_put_contents($php_const, "'".$sim[$i][$len2-1]."');\n" , FILE_APPEND | LOCK_EX);
		   } else {
		   	file_put_contents($php_const, ");\n" , FILE_APPEND | LOCK_EX);
		   }
		   
	   }
	   
	   file_put_contents($php_const, "\ndefine('SIMILAR_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
 
	   # close PHP and Files
       file_put_contents($php_const, "\n?>", FILE_APPEND | LOCK_EX);
	   file_put_contents($php_nav, "\n</ul>\n</nav>\n", FILE_APPEND | LOCK_EX);
	   
       fclose( $handle ); 
	   fclose( $handle2 );
	   
	   
	   echo "Done!<br />Bitte pruefen Sie die Inhalt der file <br />*<b>$php_const</b>  und <br />*<b>$php_nav</b> <br />nach Korrektheit!";
   		}
	}

} else {
	echo "Sie haben entweder keine Schreibrechte auf Dateien im <b>".DIR_CSV;
	echo "</b>.\n<br />Oder die Datei <br />* <b>";
	echo $php_const."</b> bzw. <br />* <b>".$php_nav."</b><br />liegt nicht im Ordner ".DIR_CSV."!";
}

?>