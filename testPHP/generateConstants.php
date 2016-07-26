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
		   if (substr($nav[$i][2], 0, -4) == 'projectlist'){
			   file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php','".($i+1)."','','',\$_GET['language'],'', constant ('SITE_".($i+1)."_'.\$_GET['language'])) ?>\n<ul>\n", FILE_APPEND | LOCK_EX);
			   # genetare Project- and Subproject-list
			   for ($l=0; $l < $len_pr; $l++) { 
				   file_put_contents($php_nav, "".$project[$i][0]."\n", FILE_APPEND | LOCK_EX);
			   }
		   } else {
		   	file_put_contents($php_nav, "<li><?php ECHO_TAG_A('index.php','".($i+1)."','','',\$_GET['language'],'', constant ('SITE_".($i+1)."_'.\$_GET['language'])) ?> </li>\n", FILE_APPEND | LOCK_EX);
		   }
		   file_put_contents($php_const, "define('SITE_".($i+1)."_DE','".$nav[$i][0]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_const, "define('SITE_".($i+1)."_EN','".$nav[$i][1]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_const, "define('TPL_".($i+1)."','".$nav[$i][2]."');\n\n", FILE_APPEND | LOCK_EX);
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
		   	file_put_contents($php_const, "'".$sim[$i][$len2-1]."');\n " , FILE_APPEND | LOCK_EX);
		   } else {
		   	file_put_contents($php_const, ");\n" , FILE_APPEND | LOCK_EX);
		   }
		   
	   }
	   
	   file_put_contents($php_const, "\ndefine('SIMILAR_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
 
	   # close PHP and File
       file_put_contents($php_const, "\n?>", FILE_APPEND | LOCK_EX);
	   file_put_contents($php_nav, "\n</ul>\n</nav>\n", FILE_APPEND | LOCK_EX);
	   
       fclose( $handle ); 
	   fclose( $handle2 );
	   
	   
	   echo "Done!    Bitte pruefen Sie die Inhalt der file    '$php_const'    und    '$php_nav'    nach Korrektheit!";
   		}
	}
	
} else {
	echo "Sie haben keine Schreibrechte auf Dateien ".DIR_CSV;
	echo ".\nBitte Aendern Sie es wie im Doku beschrieben und gehen sicher, dass die Dateien ";
	echo $php_const." und ".$php_nav." unter dem Ordner ".DIR_CSV." liegen!";
}

?>