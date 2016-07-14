<?php

function RETURN_FILE_PATH($path1, $path2, $path3){
	# Function to concatenate paths (e.g. ../A/A01)
	if (isset($path2)) {
		$path1 = $path1.'/'.$path2;
	}
	if (isset($path3)){
		$path1 = $path1."/".$path3;
	}
	
	return $path1;
}

function INITIALIZE_GET_VAR ($var, $value)
{
	# => Function to initialize a $_GET-variable
	# Parameters:
	# - $var  : Variable name (e.g. 'language')
	# - $value: Value (e.g. 'DE')

	if (empty ($_GET[$var]))
	{
		$_GET[$var] = $value;
	}
}

function INITIALIZE_POST_VAR ($var, $value) {
	if (empty ($_POST[$var])) {
		$_POSZ[$var] = $value;
	}
}

function ECHO_FLAGS (){
	# => Function to echo the language flags

	if ($_GET['language'] == DEFAULT_LANGUAGE){
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], DEFAULT_LANGUAGE, '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE.'_ANIMATED'), constant ('LBL_LANGUAGE_'.DEFAULT_LANGUAGE), '20px'));
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], constant('LANGUAGE_EN'), '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant ('LANGUAGE_EN')), constant ('LBL_LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '20px'));
	} else {
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], DEFAULT_LANGUAGE, '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE), constant ('LBL_LANGUAGE_'.DEFAULT_LANGUAGE), '20px'));
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], constant('LANGUAGE_EN'), '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant('LANGUAGE_EN').'_ANIMATED'), constant ('LBL_LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '20px'));
	}
}

function ECHO_IMAGE_MAP ($file ) {
	if (file_exists($file)) {
		$row = 1;
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($map = fgetcsv($handle, 100, "\t")) !== FALSE) {
				echo RETURN_TAG_AREA ($map[0], $map[1], $map[2], $map[3], $map[4], $map[5], RETURN_CSS_HREF ('index.php', '', $map[0][0], $map[0], $_GET['language']));
				$row++;
			}
		}
		fclose($handle);
	 }
}  

#-----------CSV functions
function RETURN_CSV_FILE ($path, $file){
	$csv = array();
	$fp = fopen($path.$file, "r");
	
	while (($result = fgetcsv($file)) !== false){
		$csv[] = $result;
	}
	
	fclose($file);
	
	return $csv;
}

function ECHO_CSV_FILE ($site, $project, $subproject, $file) {
	 # Function to return html text content
	 
	 $row = 1;
	 $f = $site."/";
	 if (isset($project)) {
	 	$f = $f.$project;
		 if (isset($subproject)) {
		 	$f = $f.$subproject."/";
		 }
	 }
	 if (file_exists($f)) {
	 	if (($handle = fopen($f.$file, "r")) !== FALSE) {
	 		while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
				$tag = $data[0];
	 			if ($row > 1){
	 				switch ($tag) {
					 	case 'h1':
							 echo "<h1>".$data[2]."</h1>";
						 	break;
					 	case 'h2':
							 echo "<h2>".$data[2]."</h2>";
						 	break;
						 case 'h3':
							 echo "<h3>".$data[2]."</h3>";
							 break;
						 case 'p';
					 	 	ECHO_TAG_P( RETURN_FILE_PATH($f,$data[2],$data[3]));
					 	 	break;
					 	case 'img':
					 	 	ECHO_TAG_IMG( RETURN_FILE_PATH($f,$data[2],$data[3]), $data[1],$data[4], $data[4]);
					 	 	break;
					 	case 'video':
						 	ECHO_TAG_VIDEO($data[3]);
					 	case 'a';
					 	 	ECHO_TAG_A('#', '', '', '', '', $data[1], $data[2]);
					 	 	break;
					 	default:
						 	echo '';
						 	break;
					}
				}
				$row++;
			}
	 	}
		fclose($handle);
	}
}

function APPEND_CSV_ROW ($file, $row) {
	# Function to add new row(array) in csv-file
	$fp = fopen($file, 'a');
	fputcsv($fp, $row);
	fclose($fp);
}

function OVERWRITE_CSV ($file, $row) {
	# Function to overwrite csv-file content
	$fp = fopen($file, 'w+');
	fputcsv($fp, $arr);
	fclose($fp);
}

function DELETE_CSV_ROWELEMENT ($file, $elem) {
	# Function to delete row
	if (file_exists($file)){
		$lines=file($file);
		$num = sizeof($lines);
		
		// delete element in row
		for ($i = 0; $i < $num; $i++) {  
        	$entry = explode ("\t", $lines[$i]);
        	if ($entry[0] == $elem) {
        		$num--;
        		for ($j = $i; $j < $num; $j++){
        			$lines[$j] = $lines[$j+1];
				}
			}
		}
		
		// save changes 
		$fp = fopen($file,"w+");
		if ($fp) {
			for ($i=0; $i < $num; $i++) {
				fwrite($fp, $lines[$i]);
			} 
		}
		fclose($fp);
	}
}

?>
