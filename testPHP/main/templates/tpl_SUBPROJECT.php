<h1 style="background-color: rgba(130,185,160,0.5); color:#3B3B3B; margin-left:0px;">
<?php
	echo RETURN_SUBPROJECT_TEXT($_GET['subproject']);	
?>
</h1>

<?php

ECHO_CSV_FILE('PROJECTS', $_GET['project'], $_GET['subproject'], $_GET['subproject'].'_'.$_GET['language'].'.csv');

echo '<hr /><div style="font-size: 9px;">';
echo 'Die Rechte der auf dieser Seite verwendeten Bilder liegen beim SFB 1070, Teilprojekt '.$_GET['subproject'].'</div>';

?>
