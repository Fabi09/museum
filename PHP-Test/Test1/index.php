<?php

error_reporting(E_ALL & ~E_NOTICE);
define('SCRIPTNAME', 'index');

include_once "basic.php";

// Seitenheader und Layout oben
echo globaler_header('Homepage', '');
echo globallayoutoben('Willkommen', 'HAUPTMENUE', SCRIPTNAME);
?>
<!-- INHALTE DER SEITE -->

<!-- INHALTE DER SEITE -->
<?php
// Seitenfooter
echo globaler_footer();
?>
