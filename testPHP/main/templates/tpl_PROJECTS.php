<?php
	$pr = array('A', 'B', 'C', 'M');
	$l = count($pr);
	
	for ($i=0; $i < $l; $i++) { 
		echo '<div class="Images">';
		ECHO_TAG_IMG(DIR_IMAGES.$pr[$i].'.jpg', '', '330', '330');
		ECHO_TAG_A('index.php', $_GET['site'], $pr[$i], '', $_GET['language'], '', '<span>'.constant('LBL_PROJECT_'.$pr[$i].'_'.$_GET['language']).'</span>');
		echo '</div>';
	}
?>