<?php


function init_get ($var, $value)
{
	if (empty ($_GET[$var]))
	{
		$_GET[$var] = $value;
	}
}
function ECHO_TAG_A ($href, $href_site, $href_project, $href_language, $css_class, $text)
{
	# Function to echo a link

	echo '<a href="';
	echo $href;
	echo '?';
	# Add parameters
	if (!empty ($href_site))
	{
		echo 'site=';
		echo $href_site;
	}
	if (!empty ($href_project))
	{
		echo '&amp;project=';
		echo $href_project;
	}

	if (!empty ($href_language))
	{
		echo '&amp;language=';
		echo $href_language;
	}

	if (!empty ($css_class))
	{
		echo '" class="';
		echo $css_class;
	}
	echo '">';
	echo $text;
	echo '</a>';
}


function ECHO_TAG_IMG ($img, $class, $height = '', $width = '')
{
	# Function to return an image
	echo '<img src="'.$img;
	if (!empty ($class)) {
		echo '" class="'.$class;
	}
	if (!empty ($height))
	{
		echo '" height="'.$height.'px;';
	}
	if (!empty ($width))
	{
		echo '" width="'.$width.'px;';
	}
	echo '">';
}


function RETURN_TAG_IMG ($img, $alt, $height)
{
	# Function to return an image
	return '<img src="'.$img.'" alt="'.$alt.'" height="'.$height.'">';
}



function ECHO_FLAGS (){


	if ($_GET['language'] == DEFAULT_LANGUAGE){
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], DEFAULT_LANGUAGE, '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE), constant ('LANGUAGE_'.DEFAULT_LANGUAGE), '15px'));
		echo '&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], constant('LANGUAGE_EN'), '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant ('LANGUAGE_EN')), constant ('LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '15px'));
	} else {
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], DEFAULT_LANGUAGE, '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.DEFAULT_LANGUAGE), constant ('LANGUAGE_'.DEFAULT_LANGUAGE), '15px'));
		echo '&nbsp;&nbsp;&nbsp;';
		ECHO_TAG_A ('index.php', $_GET['site'], $_GET['project'], constant('LANGUAGE_EN'), '', RETURN_TAG_IMG (constant ('IMG_FLAG_'.constant ('LANGUAGE_EN')), constant ('LANGUAGE_'.constant ('LANGUAGE_'.$_GET['language'])), '15px'));

	}
}

function RETURN_CSVFILE_CONTENT ($file)
{

	$return_array = array ();

	if (file_exists ($file))
	{
		$fp = fopen ($file, 'r');
			flock ($fp, LOCK_SH);
				$i = - 1;
				while (($temp_array = fgetcsv ($fp, filesize ($file), ';')) !== false)
				{
					if ($i != - 1)
					{
						foreach ($header_array as $key_ind => $content)
						{

							if (isset ($temp_array[$key_ind]))
							{
								$return_array[$i][$content] = $temp_array[$key_ind];
							}
							else
							{
								$return_array[$i][$content] = '';
							}
						}
					}
					else
					{

						$header_array = $temp_array;
					}
					$i++;
				}
			flock ($fp, LOCK_UN);
		fclose ($fp);
	}

	return $return_array;
}

function RETURN_CSV_FILE ($path, $file){
	$csv = array();

	# check path
	if (substr($path, -1) != "/") { $f = $path.'/'.$file; }
	else { $f = $path.$file; }

	if (file_exists($f)){

		$row = 0;
		$i = 0;


		if (($handle = fopen($f, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
				if ($row > 0){
					#print_r($data);
					$csv[$i] = $data;
					$i++;
				}


				$row++;
			}

		}

		fclose($handle);
	} else {
		echo "$file existiert nicht in dem Dateiordner $path";
	}

	return $csv;
}

 ?>
