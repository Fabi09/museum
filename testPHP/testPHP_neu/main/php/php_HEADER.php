<?php
#read header csv file and generate new header

$header_cvs = DIR_CSV.'header.csv'; 

if (is_writable($header_cvs)) {
	$new_header = fopen($header_cvs, 'w');
}

?>