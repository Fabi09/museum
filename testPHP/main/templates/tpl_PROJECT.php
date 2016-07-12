<h1>
	<?php echo constant('LBL_PROJECT_'.$_GET['project'].'_'.$_GET['language']) ;?>
</h1>

<?php
	$pr = $_GET['project'];
	$pr_array = array();
	switch ($pr) {
		case 'A':
			$pr_array = array('A01','A02','A03','A04','A05','A06');
			break;
		case 'B':
			$pr_array = array('B01','B02','B03','B04','B05','B06', 'B07');
			break;
		case 'C':
			$pr_array = array('C01','C02','C03','C04','C05','C06', 'C07');
			break;
		default:
			break;
	}
	
	$pr_length = count($pr_array);
	$i = 0;

	while ($i < $pr_length) {
		echo '<div class="read_more_box">';
		
		ECHO_CSV_TEXTFILE('PROJECTS', $pr, '', $pr_array[$i].'.csv');
		
		echo '</div>';
		
		$i++;
	}
?>