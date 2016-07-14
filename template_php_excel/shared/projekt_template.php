<?php
 require_once 'funktionen.php';
 echo <<<EOT
<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
EOT;
 
 echo '<div>';
 
$directory = realpath(__DIR__ . '/../data/'.$_GET['projekt'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt.csv')) as $key_index => $array){
	if(!empty($array['projektname'])){
	echo <<<EOT
	<h1>{$array['projektname']}</h1>
	<span>{$array['projektbeschreibung']}</span>
	<br>
	<br>
	<span style="color: red;">{$array['verantwortlicher']}</span>
	<br>
	<br>
EOT;
	}
	if (file_exists ($directory.'/bilder/'.$array['bild'])){
		echo '<img style="max-width: 300px; max-height: 300px" src="../data/' . $_GET['projekt'] . '/bilder/' . $array['bild'] . '" alt=""/>';
		echo '&nbsp;&nbsp;&nbsp;';
	}
	else {
		echo '&nbsp;&nbsp;&nbsp;';
	}
}
echo '</div>';
	
echo <<<EOT
	</body>
	</html>
EOT;
