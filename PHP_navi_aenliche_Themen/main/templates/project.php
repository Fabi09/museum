<h1>
	<?php echo constant('PROJECT_'.$_GET['project'].'_'.$_GET['language']) ;?>
</h1>

<?php

	$pr = $_GET['project'];

	$path = RETURN_FILE_PATH('PROJECTS',$_GET['project'], $_GET['subproject']);
	
	ECHO_CSV_DIVS($path, $_GET['project'].'.csv', $_GET['project'], $_GET['language']);
?>