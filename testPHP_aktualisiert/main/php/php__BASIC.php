<?php

function RETURN_SUBPROJECT_TEXT($project, $subproject){
	# Function to return h1 in subprojects 
	# (e.g. C04 : Religiöse Ressourcen: Wertschöpfung und Wertkonvertierung ...)
	$spr = $GLOBALS[$project.'_'.$_GET['language']];
	return $subproject.'&nbsp&nbsp:&nbsp&nbsp'.$spr[$subproject];
}

function RETURN_FILE_PATH($path1, $path2, $path3){
	# Function to concatenate paths (e.g. ../A/SUBPROJECTS/A01)
	if (substr($path1, -1) != "/") {
		$path1 = $path1.'/';
	}
	if (!empty ($path2)) {
		$path1 = $path1.$path2.'/';
	}
	if (!empty ($path3)){
		$path1 = $path1.'/'.'SUBPROJECTS/'.$path3.'/';
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
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], DEFAULT_LANGUAGE, '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE), constant ('LANGUAGE_'.DEFAULT_LANGUAGE), '15px'));
		echo '&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], constant('LANGUAGE_EN'), 'flag', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant ('LANGUAGE_EN')), constant ('LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '15px'));
	} else {
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], DEFAULT_LANGUAGE, 'flag', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE), constant ('LANGUAGE_'.DEFAULT_LANGUAGE), '15px'));
		echo '&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], $_GET['subproject'], constant('LANGUAGE_EN'), '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant('LANGUAGE_EN')), constant ('LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '15px'));
	}
}

function ECHO_IMAGE_MAP ($file ) {
	if (file_exists($file)) {
		$row = 0;
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($map = fgetcsv($handle, 100, "\t")) !== FALSE) {
				#echo $map;
				if ($map[0] == 'S') {
					echo RETURN_TAG_AREA ($map[0], $map[1], $map[2], $map[3], $map[4], $map[5], 'https://www.uni-tuebingen.de/forschung/forschungsschwerpunkte/sonderforschungsbereiche/sfb-1070/serviceprojekt-s.html');
					continue;
				}
				echo RETURN_TAG_AREA ($map[0], $map[1], $map[2], $map[3], $map[4], $map[5], RETURN_CSS_HREF ('index.php', '', $map[0][0], $map[0], $_GET['language']));
				$row++;
			}
		}
		fclose($handle);
	 }
}  

function ECHO_IMG_SLIDER($imgDir){
	if (is_dir($imgDir)) {
		echo '<style type="text/css">
		.sliderFrame {background-color:#191919;color:#666;line-height:1.4;}
        .div1 a.current {color:#ccc;}
        .div1 a,{color:#34739c;}
        </style>';
		
		echo '<div class="sliderFrame">
        		<div id="slider">';
		$imgs = scandir($imgDir);
		$i = 0;
		
		foreach ($imgs as $datei) {
			if ($datei != "." && $datei != ".." && $datei[0] != ".") {
				if ($i > 0) {
					ECHO_TAG_A(RETURN_FILE_PATH($imgDir,'','').$datei,'','','',$_GET['language'], 'lazyImage','');
				} else {
					ECHO_TAG_A('','','','',$_GET['language'], '','');
				}
				$i++;
			}
		};
		
		echo '</div>        
        <!--thumbnails-->
        <div id="thumbs">';
		
		$i = 0;
		
		foreach ($imgs as $datei) {
			if ($datei != "." && $datei != ".." && $datei[0] != ".") {
				echo '<div class="thumb">';
				ECHO_TAG_IMG(RETURN_FILE_PATH($imgDir,'','').$datei, '', '140', '60');
				echo '</div>';
				$i++;
			}
		};
		
		echo '</div>
    	</div>';
	}
}

#-----------CSV functions

function ECHO_CSV_DIVS ($url, $file, $project) {
	 # Function to return csv content for project
	 $div = RETURN_CSV_FILE($url, $file);
	 $num = count($div);
	 
	 for ($i=0; $i < $num; $i++) {
	 	if(array_key_exists($_GET['project'].'0'.($i+1), $GLOBALS[$_GET['project'].'_'.$_GET['language']])){
	 		echo '<div class="read_more_box""><h2>'.RETURN_SUBPROJECT_TEXT($_GET['project'],$_GET['project'].'0'.($i+1)).'</h2>';
	 		if (!empty ($div[$i][0])){
		 		ECHO_TAG_IMG ($url.'images/'.$div[$i][0], 'img_left');
		 	}
		 	if (!empty ($div[$i][1])){
		 		echo ECHO_TAG_TEXT($url, $div[$i][1]).'<br />';
		 	}
		 	ECHO_TAG_A ('', '', $project, $_GET['project'].'0'.($i+1), $_GET['language'], 'read_more_btn', 'Mehr lesen');
		 	echo '<br /></div>';
		 }
	 }
}

function RETURN_CSV_FILE ($path, $file){
	$csv = array();
	
	# check path
	if (substr($path, -1) != "/") { $f = $path.'/'.$file; }
	else { $f = $path.$file; }
	
	if (file_exists($f)){
		
		$row = 0;
		$i = 0;
		
		$delimeter = getFileDelimiter($f);
	
		if (($handle = fopen($f, "r")) !== FALSE) {
			if (strlen($delimeter) < 2){
			while (($data = fgetcsv($handle, 100, $delimeter)) !== FALSE) {
				if ($row > 0){
					#print_r($data);
					$csv[$i] = $data;
					$i++;
				}
				
				
				$row++;
			}	
			} else {
			# wollte nicht string mit 2 Zeichen als variable akzeptieren
			while (($data = fgetcsv($handle, 100, "\t")) !== FALSE) {
				if ($row > 0){
					#print_r($data);
					$csv[$i] = $data;
					$i++;
				}
				
				
				$row++;
			}		
			}
			
		}
		
		fclose($handle);
	} else {
		echo "$file existiert nicht in dem Dateiordner $path";
	}
	
	return $csv;
}

function ECHO_CSV_LINE ($row) {
	 # Function to return html text content
	 switch ($row[0]) {
		 case 'h1':
			 echo '<h1>'.$row[2].'</h1>';
			 break;
		 case 'h2':
			 echo '<h2>'.$row[2].'</h2>';
			 break;
		case 'p':
			echo "<p>".$row[2]."</p>";
			break;
		case 'img':
			ECHO_TAG_IMG (RETURN_FILE_PATH($row[2],$row[3]), $row[1], $row[4], $row[4]);
			break;
		case 'video':
			ECHO_TAG_VIDEO ($row[3]);
			break;
		case 'a':
			ECHO_TAG_A('#', '', '', '', '', $row[1], $row[2]);
		 default:
			 
			 break;
	 }
}

function ECHO_CSV_FILE ($site, $project, $subproject, $file) {
	 # Function to return html text content
	 
	 $row = 1;
	 $f = RETURN_FILE_PATH($site, $project, $subproject);
	 
	 if (file_exists($f.$file)) {
	 	if (($handle = fopen($f.$file, "r")) !== FALSE) {
	 		while (($data = fgetcsv($handle, 100, "\t")) !== FALSE) {
	 			if ($row > 1 && !empty($data[1])){
	 				switch ($data[0]) {
					 	case 'titel':
							 echo "<h2>".$data[1]."</h2>";
						 	break;
						 case 'text';
						 	echo '<p style="margin-left:0px;">';
					 	 	ECHO_TAG_TEXT($f, $data[1]);
							echo '</p>';
					 	 	break;
						case 'code';
					 	 	ECHO_TAG_TEXT( $f, $data[1]);
					 	 	break;
					 	case 'single_img':
							ECHO_TAG_IMG( $f.'images/'.$data[1],'single_img');
					 	 	break;
					 	case 'video':
						 	echo '<br /><iframe width="420" height="315" src="'.$data[1].'"></iframe>';
							break;
						case 'slider':
							echo 'Image slider test <br />';
							if ($data[1] != 'images') {
								ECHO_IMG_SLIDER( $f.'images/'.$data[1]);
							} else {
								ECHO_IMG_SLIDER( $f.'images');
							}
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
		
	} else {
		if ($_GET['language'] == 'DE') { echo 'Inhalt in Bearbeitung ...';}
		else { echo 'Content in Processing ...';}
	}
}

function ECHO_CSV_FILE_OLD ($site, $project, $subproject, $file) {
	 # Function to return html text content
	 
	 $row = 1;
	 $f = RETURN_FILE_PATH($site, $project, $subproject);
	 #echo $f;
	 
	 if (file_exists($f.$file)) {
	 	if (($handle = fopen($f.$file, "r")) !== FALSE) {
	 		while (($data = fgetcsv($handle, 100, "\t")) !== FALSE) {
	 			if ($row > 1 && !empty($data[1])){
	 				switch ($data[0]) {
					 	case 'h1':
							 echo "<h1>".$data[1]."</h1>";
						 	break;
					 	case 'h2':
							 echo "<h2>".$data[1]."</h2>";
						 	break;
						 case 'h3':
							 echo "<h3>".$data[1]."</h3>";
							 break;
						 case 'p';
						 	echo '<p style="margin-left:0px;">';
					 	 	ECHO_TAG_TEXT($f, $data[1]);
							echo '</p>';
					 	 	break;
						case 'code';
					 	 	ECHO_TAG_TEXT( $f, $data[1]);
					 	 	break;
					 	case 'single_img':
							ECHO_TAG_IMG( $f.'images/'.$data[1],'single_img');
					 	 	break;
					 	case 'video':
						 	echo '<br /><iframe width="420" height="315" src="'.$data[1].'"></iframe>';
						case 'slider':
						 	ECHO_IMG_SLIDER($f.'images/'.$data[1]);
					 	case 'url';
					 	 	ECHO_TAG_A('#', '', '', '', '', $data[1], '');
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
		
	} else {
		if ($_GET['language'] == 'DE') { echo 'Inhalt in Bearbeitung ...';}
		else { echo 'Content in Processing ...';}
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



function getFileDelimiter($file, $checkLines = 2){
	# Function to find out csv file delimeter
	$file = new SplFileObject($file);
	$delimiters = array(',','\t',';','|',':', '~');
	
	$results = array();
	$i = 0;
	
	while($file->valid() && $i <= $checkLines){
		$line = $file->fgets();
		foreach ($delimiters as $delimiter){
			$regExp = '/['.$delimiter.']/';
			$fields = preg_split($regExp, $line);
			
			if(count($fields) > 1){
				if(!empty($results[$delimiter])){
					$results[$delimiter]++;
				} else {
					$results[$delimiter] = 1;
				}
			}
		}
		$i++;
	}
	
	$results = array_keys($results, max($results));
	return $results[0];
}
?>
