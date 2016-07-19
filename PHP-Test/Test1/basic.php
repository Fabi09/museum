<?php
error_reporting(E_ALL & ~E_NOTICE);

if (!defined('SCRIPTNAME')) {
echo 'Unzul&auml;ssiger Scriptaufruf';
exit;
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Templatedaten holen fuer Templates ohne Ersatzvariablen
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function get_tdata($tmplname) {
if(file_exists($tmplname)) {
$lines = implode("",file($tmplname));
return $lines;
} else {
print_scripterror("Fehler!", "Die Datei: $tmplname kann nicht ge&ouml;ffnet werden");
exit;
}
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Templateinhalt holen fuer Einzelausgaben und Ausgaben in
// while, for und foreach Schleifen
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function get_tpldata($templatename) {

if(file_exists($templatename)) {
$templatecontent = file($templatename);
return $templatecontent;
} else {
print_scripterror("Fehler!", "Die Datei: $templatename kann nicht ge&ouml;ffnet werden");
exit;
}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Templateparser
// Aufrufbeispiel:
// echo $tp_content_out = templateparser($templatecontent, $wertearray);
// $templatecontent     = Template HTML Code
// $wertearray             = Zu ersetztende Platzhalterdaten
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function templateparser($templatedatei, $wertearray) {

if(is_array($wertearray)) {
foreach($wertearray as $key => $value) {
$suchmuster = "/<%%(".strtoupper($key).")%%>/si";

// Gefundene Platzhalter mit Werten aus $wertearray ersetzen
$templatedatei = preg_replace($suchmuster, $value, $templatedatei);
}
// Nicht ersetzte Platzhalter aus Template entfernen
$templatedatei = preg_replace("/((<%%)(.+?)(%%>))/si", '', $templatedatei);
}

return (implode("", $templatedatei));
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Globaler Header
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function globaler_header($seitentitel ='', $zusatzcontent ='') {

$contentarray = array(
"SEITENTITEL"         => $seitentitel,
"ZUSATZCONTENT"     => $zusatzcontent
);
// Templatename
$templatecontent = get_tpldata("templates/header.html");
return $tp_content_out = templateparser($templatecontent, $contentarray);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Globales oberes Layout
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function globallayoutoben($seitentitel = '', $navimenue = '', $navlink = '') {

$contentarray = array(
"SEITENUEBERSCHRIFT"     => $seitentitel,
"MENUEAUSGABE"             => get_navi($navimenue, $navlink)
);
// Templatename
$templatecontent = get_tpldata("templates/layoutoben.html");
return $tp_content_out = templateparser($templatecontent, $contentarray);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Globaler Footer
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function globaler_footer() {

// Templatename
$contentarray = array(
"FOOTERCONTENT"     => 'Footerinhalt'
);
$templatecontent = get_tpldata("templates/footer.html");
return $tp_content_out = templateparser($templatecontent, $contentarray);

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Navigation
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function get_navi($navimenue = '' , $aktiverlink = '') {

if ($navimenue == 'HAUPTMENUE') {

    $menuedaten = array(
    'index'         => 'Startseite',
    'dlseite1'         => 'Downloads',
    'kontakt'         => 'Kontakt'
    );

} elseif ($navimenue == 'DOWNLOADMENUE') {

    $menuedaten = array(
    'index'         => 'Startseite',
    'dlseite1'         => 'Downloadseite 1',
    'dlseite2'         => 'Downloadseite 2',
    'dlseite3'         => 'Downloadseite 3'
    );

}

while(list($key, $val) = each($menuedaten)) {

    if ($key != $aktiverlink) {
    $menuelinks .= "<a href=\"$key.php\">$val</a>\n";
    } else {
    $menuelinks .= "<div class=\"aktuell\">$val</div>\n";
    }

}
return $menuelinks;
}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
// Scripterror
// Sofortiger Scriptabbruch bei Fehlern
// gibt einfache HTML Seite aus mit Fehlerhinweisen
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
function print_scripterror($titel = '', $fehlertext = '') {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

<title><?php echo $titel; ?></title>

<style type="text/css">
body {
background-color: #f7f7f7;
font-family: Verdana, Arial;
font-size: 12px;
color: #000000;
}
.err {
background-color: #000000;
}
.errtop {
background-color: #ffcc00;
font-size: 12px;
color: #000000;
padding: 4px;
}

.errcont {
background-color: #ffffff;
font-size: 12px;
color: #000000;
padding: 4px;
}
</style>

</head>
<body>
<div align="center">
<table cellspacing="1" cellpadding="0" border="0" width="600" class="err">
<tr>
    <td class="errtop"><b><?php echo $titel; ?></b></td>
</tr>
<tr>
    <td class="errcont"><?php echo $fehlertext; ?></td>
</tr>
</table>
</div>
</body>
</html>
<?php
exit;
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - //
?>
