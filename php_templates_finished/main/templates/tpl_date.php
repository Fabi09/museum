<div class="Text">
<?php

echo <<<EOT
<h1>Termine</h1>
EOT;

$directory = realpath('main/data/'.$_GET['site'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt_'.($_GET['language']).'.csv')) as $key_index => $array){
if(!empty($array['tag'])){
echo '<tr>';
				echo '<td align="left" style="width: 1%" valign="top">';
						echo $array['tag'];
						echo '-';
						echo sprintf($array['monat']);
						echo '-';
						echo sprintf($array['jahr']);
						echo ' ';
						echo $array['beschreibung'];
						echo '<br>';						
				echo '</td>';
echo '</tr>';
			
}
}
?>
</div>
