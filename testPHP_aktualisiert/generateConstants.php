<?php
require_once ('main/config.php');				# Config-file
require_once (DIR_PHP.'php__HTMLELEMENTS.php'); # PHP-functions to echo HTML-tags
require_once (DIR_PHP.'php__BASIC.php');        # PHP-functions

$php_file = DIR_CONSTANTS.'constants.php';


if( is_writeable( $php_file ) ){ 
   if( $handle = fopen( $php_file, 'w' ) ){ 
       # delete file content
       fwrite( $handle, '');
	   
	   # fill file content 
	   file_put_contents($php_file, "<?php \n", FILE_APPEND | LOCK_EX);
	   
	   # csv files
	   $file_nav		= 'navigation.csv';
	   $file_projects	= 'projects.csv';
	   $file_a			= 'A.csv';
	   $file_b			= 'B.csv';
	   $file_c			= 'C.csv';
	   $file_similar	= 'similar.csv';
	   
	   # define navigation constants
	   $nav = RETURN_CSV_FILE(DIR_CSV, $file_nav);
	   $len = count($nav);
	   
	   file_put_contents($php_file, "# Navigation\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < $len; $i++){
		   file_put_contents($php_file, "define('SITE_".($i+1)."_DE','".$nav[$i][0]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_file, "define('SITE_".($i+1)."_EN','".$nav[$i][1]."');\n", FILE_APPEND | LOCK_EX);
	   }
	   #file_put_contents($php_file, "define('SITE_MAP_DE','Karte');\n", FILE_APPEND | LOCK_EX);
	   #file_put_contents($php_file, "define('SITE_MAP_EN','Map');\n", FILE_APPEND | LOCK_EX);


	   # define Project constants
	   file_put_contents($php_file, "\n\n #Projekte \n", FILE_APPEND | LOCK_EX);
	   
	   $project = RETURN_CSV_FILE(DIR_CSV, $file_projects);
	   $len = count($project);
	   
	   for ($i=0; $i < $len; $i++){
		   file_put_contents($php_file, "define('PROJECT_".$project[$i][0]."_DE','".$project[$i][1]."');\n", FILE_APPEND | LOCK_EX);
		   file_put_contents($php_file, "define('PROJECT_".$project[$i][0]."_EN','".$project[$i][2]."');\n", FILE_APPEND | LOCK_EX);
	   }
	   
	   # define Subproject arrays
	   file_put_contents($php_file, "\n\n #Subprojekte \n", FILE_APPEND | LOCK_EX);
	   
	   # Teilprojekt A
	   $project_a = RETURN_CSV_FILE(DIR_CSV, $file_a);
	   $len = count($project_a);
	   file_put_contents($php_file, "\ndefine('A_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_file, '$A_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_a[$i][0]."' => '".$project_a[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_a[$len-1][0]."' => '".$project_a[$len-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_file, '$A_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_a[$i][0]."' => '".$project_a[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_a[$len-1][0]."' => '".$project_a[$len-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n", FILE_APPEND | LOCK_EX);
	   
	   # Teilprojekt B
	   $project_b = RETURN_CSV_FILE(DIR_CSV, $file_b);
	   $len = count($project_b);
	   file_put_contents($php_file, "\ndefine('B_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_file, '$B_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_b[$i][0]."' => '".$project_b[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_b[$len-1][0]."' => '".$project_b[$len-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_file, '$B_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_b[$i][0]."' => '".$project_b[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_b[$len-1][0]."' => '".$project_b[$len-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   # Teilprojekt C
	   $project_c = RETURN_CSV_FILE(DIR_CSV, $file_c);
	   $len = count($project_c);
	   file_put_contents($php_file, "\ndefine('C_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
	   
	   file_put_contents($php_file, '$C_DE = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_c[$i][0]."' => '".$project_c[$i][1]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_c[$len-1][0]."' => '".$project_c[$len-1][1]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n", FILE_APPEND | LOCK_EX);
	   
	   
	   file_put_contents($php_file, '$C_EN = array('."\n", FILE_APPEND | LOCK_EX);
	   for ($i=0; $i < ($len-1); $i++){
		   file_put_contents($php_file, "\t'".$project_c[$i][0]."' => '".$project_c[$i][2]."',\n" , FILE_APPEND | LOCK_EX);
	   }
	   # letzte Array-Element:
	   file_put_contents($php_file, "\t'".$project_c[$len-1][0]."' => '".$project_c[$len-1][2]."'\n" , FILE_APPEND | LOCK_EX);
	   file_put_contents($php_file, "); \n\n", FILE_APPEND | LOCK_EX);
	   
	   
	   # aenliche Projekte
	   $sim = RETURN_CSV_FILE(DIR_CSV, $file_similar);
	   $len = count($sim);
	   
	   for ($i=0; $i < $len; $i++) { 
		   $len2 = count($sim[$i]);
		   
		   file_put_contents($php_file, '$SIM['.$i.'] = array( ', FILE_APPEND | LOCK_EX);
		   for ($j=0; $j < ($len2-1); $j++) {
			   	if (!empty($sim[$i][$j])){
			   		file_put_contents($php_file, "'".$sim[$i][$j]."'" , FILE_APPEND | LOCK_EX);
			   	}
				if (!empty($sim[$i][$j+1])){
			   		file_put_contents($php_file, "," , FILE_APPEND | LOCK_EX);
			   	}   
		   }
		   if (!empty($sim[$i][$len2-1])){
		   	file_put_contents($php_file, "'".$sim[$i][$len2-1]."');\n " , FILE_APPEND | LOCK_EX);
		   } else {
		   	file_put_contents($php_file, ");\n" , FILE_APPEND | LOCK_EX);
		   }
		   
	   }
	   
	   file_put_contents($php_file, "\ndefine('SIMILAR_NUM',".$len.");\n", FILE_APPEND | LOCK_EX);
 
	   # close PHP and File
       file_put_contents($php_file, "\n?>", FILE_APPEND | LOCK_EX);
       fclose( $handle ); 
   } 	
} else {
	echo "In dem Ordner ".DIR_CSV." gibt es kein File -  $file_nav \n";
	echo "\n\n\n ---- \nErstellen Sie neu oder kopieren aus DEFAULT-ORDNER/main/csv/";
}


$keys = array('foo', 5, 10, 'bar');
$values = array('racxa1', 'racxa2', 'racxa3','hihi');
$a = array_combine($keys, $values);


#$csv = RETURN_CSV_FILE(DIR_CSV, 'navigation.csv');
#print_r($csv);


echo "Done!    Bitte pruefen Sie die Inhalt der file '$php_file' nach Korrektheit'"

?>