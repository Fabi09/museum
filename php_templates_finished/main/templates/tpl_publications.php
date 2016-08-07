<div class="Text">
<?php

echo <<<EOT
<h1>Publikationen</h1>
EOT;

$directory = realpath('main/data/'.$_GET['site'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt_'.($_GET['language']).'.csv')) as $key_index => $array){
if(!empty($array['zusammenfassung'])){
echo '<tr>';
				echo '<td align="left" style="width: 1%" valign="top">';
						echo '- ';
						echo $array['zusammenfassung'];
						echo '<br>';
						echo '<br>';
				echo '</td>';
echo '</tr>';
}
}
?>
</div>
