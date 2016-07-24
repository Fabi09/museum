<?php
# generate Pop-Up menu
echo '<a href="#" onclick="showText('.'similar'.');return(false)">Ähnliche Themen</a>';
echo '<div class="similar">';

for ($i=0; $i < SIMILAR_NUM; $i++) { 
	if (in_array($_GET['subproject'], $SIM[$i])){
		echo '<ul>';
		for ($j=0; $j < count($SIM[$i]); $j++) { 
			echo '<li>';
			ECHO_TAG_A('index.php', '',  $SIM[$i][$j]{0},  $SIM[$i][$j], $_GET['language'], '', RETURN_SUBPROJECT_TEXT($SIM[$i][$j]{0}, $SIM[$i][$j]));
			echo '</li>';
		}
		echo '</ul>';
	}
}
echo '</div>';

?>
<h1 style="background-color: rgba(130,185,160,0.5); color:#3B3B3B; margin-left:0px;">
<?php
	echo RETURN_SUBPROJECT_TEXT($_GET['project'], $_GET['subproject']);	
?>
</h1>

<?php

ECHO_CSV_FILE('PROJECTS', $_GET['project'], $_GET['subproject'], $_GET['subproject'].'_'.$_GET['language'].'.csv');

echo '<hr /><div style="font-size: 9px;">';
echo 'Die Rechte der auf dieser Seite verwendeten Bilder liegen beim SFB 1070, Teilprojekt '.$_GET['subproject'].'</div>';

?>

