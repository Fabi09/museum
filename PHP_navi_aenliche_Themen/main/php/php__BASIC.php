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
		$path1 = $path1.'SUBPROJECTS/'.$path3.'/';
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

function ECHO_CSV_DIVS ($url, $file, $project, $language) {
	 # Function to return csv content for project
	 $div = RETURN_CSV_FILE($url, $file);
	 $num = count($div);
	 $c = 1; # content DEUTSCH
	 
	 #project C
	 $pr = 1;
	 if ($_GET['project'] == 'C') { $pr = 2; }
	 
	 if ($language == 'EN') { $c = 2;} # content ENGLISH
	 
	 for ($i=0; $i < $num; $i++) {
	 	if(array_key_exists($_GET['project'].'0'.($i+$pr), $GLOBALS[$_GET['project'].'_'.$_GET['language']])){
	 		echo '<div class="read_more_box""><h2>'.RETURN_SUBPROJECT_TEXT($_GET['project'],$_GET['project'].'0'.($i+$pr)).'</h2>';
	 		if (!empty ($div[$i][0])){
		 		ECHO_TAG_IMG ($url.'images/'.$div[$i][0], 'img_left');
				#echo $url;
		 	}
		 	if (!empty ($div[$i][$c])){
		 		ECHO_TAG_TEXT($url, $div[$i][$c]).'<br />';
		 	}
		 	echo '<br /><br />';
		 	ECHO_TAG_A ('', '', $project, $_GET['project'].'0'.($i+$pr), $_GET['language'], 'read_more_btn', constant('READ_'.$_GET['language']));
		 	echo '<br /></div>';
		 }
	 }
}

function RETURN_CSV_FILE ($path, $file){
	# Function to return csv file content
	$csv = array();
	
	# check path
	if (substr($path, -1) != "/") { $f = $path.'/'.$file; }
	else { $f = $path.$file; }
	
	if (file_exists($f)){
		
		$row = 0;
		$i = 0;
		
		# get delimeter
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
		echo "$file existiert nicht. Bitte erstellen Sie erst und versuchen Sie dann nochmal!";
	}
	
	return $csv;
}

function ECHO_CSV_FILE ($path, $file, $language) {
	 # Function to return html text content
	 # 
	 $csv = RETURN_CSV_FILE($path, $file);
	 $len = count($csv);
	 
	 $c = 1; # content DEUTSCH
	 if ($language == 'EN'){ $c = 2; } # content ENGLISH
	 
	 for ($i=0; $i < $len; $i++) { 
		 if (!empty($csv[$i][$c])) {
		 	#echo $csv[$i][$c];
		 	switch ($csv[$i][0]) {
				 case 'titel':
				 	echo "<h2>".$csv[$i][$c]."</h2>";
				 	break;
				case 'text';
					echo '<p style="margin-left:0px;">';
					ECHO_TAG_TEXT($path, $csv[$i][$c]);
					echo '</p>';
					break;
				case 'code';
					ECHO_TAG_TEXT( $path, $csv[$i][$c]);
					break;
				case 'single_img':
					ECHO_TAG_IMG( $path.'images/'.$csv[$i][$c],'single_img');
					break;
				case 'video':
					echo '<br /><iframe width="420" height="315" src="'.$csv[$i][$c].'"></iframe>';
					break;
				case 'slider':
					echo '<br />';
					if ($csv[$i][$c] != 'images') {
						ECHO_IMG_SLIDER( $path.'images/'.$csv[$i][$c]);
					} else {
						ECHO_IMG_SLIDER( $path.'images');
					}
					break;
				case 'audio':
					ECHO_TAG_AUDIO($path.'audios/'.$csv[$i][$c]);
					break;
				default:
					echo '';
					break;
			}
		 }
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
