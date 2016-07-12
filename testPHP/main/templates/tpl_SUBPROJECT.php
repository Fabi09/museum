<h1>
	<?php echo constant('LBL_PROJECT_'.$_GET['project'].'_'.$_GET['language']) ;?>
</h1>

<?php

ECHO_CSV_TEXTFILE('PROJECTS', 'C', '', 'C.csv');

?>