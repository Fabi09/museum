<div class="Text">
<?php
$directory = realpath('main/data/'.$_GET['site'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt_'.($_GET['language']).'.csv')) as $key_index => $array){
if(!empty($array['titel'])){
echo <<<EOT

<h1>{$array['titel']}</h1>
<span>{$array['zusammenfassung']}</span>

EOT;
}
}
?>
</div>
