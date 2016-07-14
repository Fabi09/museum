<h1>
	<?php echo constant('LBL_PROJECT_'.$_GET['project'].'_'.$_GET['language']) ;?>
</h1>

<?php

ECHO_CSV_FILE('PROJECTS', 'C', '', 'C.csv');

?>