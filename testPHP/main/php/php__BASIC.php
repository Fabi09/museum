<?php

function RETURN_SUBPROJECT_TEXT($subproject){
	$spr = $GLOBALS[$_GET['project'].'_'.$_GET['language']];
	return $subproject.'&nbsp&nbsp:&nbsp&nbsp'.$spr[$subproject];
}

function RETURN_FILE_PATH($path1, $path2, $path3){
	# Function to concatenate paths (e.g. ../A/A01)
	if (!empty ($path2)) {
		if (substr($path1, -1) == "/") { $path1 = $path1.$path2.'/'; }
		else { $path1 = $path1.'/'.$path2.'/'; }
	}
	if (!empty ($path3)){
		if (substr($path1, -1) == "/") { $path1 = $path1.'SUBPROJECTS/'.$path3.'/'; }
		else { $path1 = $path1.'/'.'SUBPROJECTS/'.$path3.'/'; }
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
	/*
	if (is_dir($imgDir)) {
	$counter = 0;
	$imgs = array();
	
	while (($f = $imgDir->read()) != false) {
		if ($f != "." && $f != ".."){
			// Nur die Bilder auslesen
			$format = substr ($f, -3);
			
			if (strtolower($format) == "jpg" || strtolower($format) == "png" || strtolower($format) == "gif") {//und so weiter
				if (is_dir("files/".$f)){ // wenn ein Verzeichnis
	  				// erstmal nichts machen
	  			} else {
	  				$imgs[$counter] = $imgDir->path."/".$f;
					echo "\t<img class=\"img_slider\" src=\"".$imgs[$counter]."\">\n"; //$f."<br /> \n";
					$counter++;
				}
			}
	  	}
	}
	
	$imgDir->close();
	 * 
	$i = 0;
	while ($i < $counter) {
		echo "\t<div class=\"slider_col\"><img class=\"slider_hover\" src=\"".$imgs[$i]."\" onclick=\"currentImg(".($i+1).")\" style=\"width: 50px; height:35px\"></div>\n";
		$i++;
	}
	echo "</div>\n";
	*/
	
	if (is_dir($imgDir)) {
		echo '<style type="text/css">
		#slider {
	max-height: 500px;
	text-align: center;
}

#main-img
{ 
    padding: 5px;
	max-height: 350px;
    box-shadow: 0px 5px 15px 5px #333;   
}

#imageContainer
{
    width: 70%;
    margin: 0px auto 0px auto;
    position: relative;
}
#imageBox {
    padding: 10px;
    background-color: rgba(0,0,0,0.75);
    list-style: none;
    overflow-y: scroll;
    height:300px;
    width:100px;
}
 
#imageBox li {
    display: inline-block;
    margin: 0 10px 0 0;
}

#imageBox img {
    width: 90px;
    cursor: pointer;
    border: 3px solid #eee;
    max-height:50px;
}

#imageContainer ::-webkit-scrollbar {
    height: 0px;
    width:10px;
    background-color: #eee;
    border-radius: 1px;
}

#imageContainer ::-webkit-scrollbar-thumb {
	background: #111111;
	border-radius: 5px;
}

#imageContainer ::-webkit-scrollbar-thumb:window-inactive {
    background: #aaa;
}
</style>';
		echo '<div id="slider" style="text-align: center;">
			<table> <tr><td width="150px">
	 			<div id="imageContainer">
					<ul id="imageBox">';
	
		$imgs = scandir($imgDir);
		$i = 0;
		
		foreach ($imgs as $datei) {
			if ($datei != "." && $datei != ".." && $datei[0] != ".") {
				echo '<li><img src="'.$imgDir.'/'.$datei.'" onclick="showImg(this)" /></li>';
			} else { $i++;}	
		};
		
		echo '</ul>
			</div></td><td align="center">
			<div style="height:350px; width:auto;">
			<img id="main-img" src="'.$imgDir.'/'.$imgs[$i].'" />
			</div></td></tr></table>
		</div>
		<script type="text/javascript">
			function showImg(s){
				document.getElementById("main-img").src = s.src;
			}
		</script> <br />';
	}
}

#-----------CSV functions

function ECHO_CSV_DIVS ($url, $file, $project) {
	 # Function to return csv content as div
	if (file_exists($url.$file)){
		$row = 0;
		$i = 0;
	 	if ($_GET['project'] == 'C') { $i++;}
	 	
	 	if (($handle = fopen($url.$file, "r")) !== FALSE) {
	 		while (($data = fgetcsv($handle, 100, "\t")) !== FALSE) {
				if ($row > 0) {
					echo '<div class="read_more_box""><h2>'.RETURN_SUBPROJECT_TEXT($_GET['project'].'0'.$i).'</h2>';
					if (!empty ($data[0])){
						ECHO_TAG_IMG ($url.'images/'.$data[0], 'img_left');
					} 
					if (!empty ($data[1])){
						echo ECHO_TAG_TEXT($url, $data[1]).'<br />';
					}
					ECHO_TAG_A ('', '', $project, $_GET['project'].'0'.$i, $_GET['language'], 'read_more_btn', 'Mehr lesen');
					echo '<br /></div>';
				}
				$row++;
				$i++;
			}
	 	}
	 	fclose($handle);
	} else {
		if ($_GET['language'] == 'DE') { echo 'Inhalt in Bearbeitung ...';}
		else { echo 'Content in Processing ...';}
	}
}

function RETURN_CSV_FILE ($path, $file){
	$csv = array();
	$fp = fopen($path.$file, "r");
	
	while ( ($result = fgetcsv($file, 100, "\t")) !== false){
		$csv[] = $result;
	}
	
	fclose($file);
	
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
							echo 'Image slider <br />';
						 	ECHO_IMG_SLIDER( $f.'images/'.$data[1]);
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

?>
