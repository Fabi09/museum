<?php

#$path = RETURN_FILE_PATH('pages','', '');

ECHO_CSV_FILE('pages/', $_GET['site'].'.csv', $_GET['language']);

?>