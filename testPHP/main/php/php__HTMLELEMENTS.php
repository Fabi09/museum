<?php

function ECHO_CSS ($href) {
	# Function to echo a css file
	#
	# $site - parameter site
	if (file_exists(DIR_STYLESHEETS.$href.'.css')) {
		echo '<link href="';
		echo DIR_STYLESHEETS.'$href';
		echo '.css" rel="stylesheet" type="text/css">';
	}	
}

function ECHO_JS ($href) {
	# Function to echo a javascript file
	#
	# $site - parameter site
	if (file_exists(DIR_JAVASCRIPTS.$href.'.js')) {
		echo '<script src="';
		echo DIR_JAVASCRIPTS.$href;
		echo '.js" type="text/javascript"></script>';
	}	
}

function RETURN_TAG_AREA ($alt, $title, $c1, $c2, $c3, $c4, $href) {
	# Function to return area tag for MAP
	return '<area shape="rect" alt="'.$alt.'" title="'.$title.'" coords="'.$c1.','.$c2.','.$c3.','.$c4.'" href="'.$href.'" target="_self" />';
}

function RETURN_CSS_HREF ($href, $site, $project, $subproject, $language) {
	$h = $href.'?';
	# Add parameters
	if (!empty ($site))
	{
		$h = $h.'&amp;site='.$site;
	}
	if (!empty ($project))
	{
		$h = $h.'&amp;project='.$project;
	}
	if (!empty ($subproject))
	{
		$h = $h .'&amp;subproject='.$subproject;
	}
	if (!empty ($language))
	{
		$h = $h.'&amp;language='.$language;
	}
	return $h;
}

function ECHO_TAG_A ($href, $href_site, $href_project, $href_subproject, $href_language, $css_class, $text)
{
	# => Function to echo a link-tag
	# Parameters:
	# - $href:             Directory and file name
	# - $href_site:        Href parameter: Site
	# - $href_language:    Href parameter: Language
	# - $text:             Displayed text
	# - $css_class:        CSS class name

	echo '<a href="';
	echo $href;
	echo '?';
	# Add parameters
	if (!empty ($href_site))
	{
		echo 'site=';
		echo $href_site;
	}
	if (!empty ($href_project))
	{
		echo '&amp;project=';
		echo $href_project;
	}
	if (!empty ($href_subproject))
	{
		echo '&amp;subproject=';
		echo $href_subproject;
	}
	if (!empty ($href_language))
	{
		echo '&amp;language=';
		echo $href_language;
	}

	if (!empty ($css_class))
	{
		echo '" class="';
		echo $css_class;
	}
	echo '">';
	echo $text;
	echo '</a>';
}


function ECHO_TAG_IMG ($img, $class, $height = '', $width = '')
{
	# => Function to return an image-tag
	# Parameters:
	# - $img   : Directory and file name
	# - $class : CSS-class-name
	# - $alt   : Alternative text (onMouseOver)
	# - $height: Height
	# - $width : Width

	echo '<img src="'.$img;
	if (!empty ($class)) {
		echo '" class="'.$class;
	}
	if (!empty ($height))
	{
		echo '" height="'.$height.'px;';
	}
	if (!empty ($width))
	{
		echo '" width="'.$width.'px;';
	}
	echo '">';
}


function RETURN_TAG_IMG ($img, $alt, $height)
{
	# => Function to return an image-tag
	# Parameters:
	# - $img   : Directory and file name
	# - $alt   : Alternative text (onMouseOver)
	# - $height: Height (e.g. '20px')

	return '<img src="'.$img.'" alt="'.$alt.'" height="'.$height.'">';
}

function ECHO_TAG_P ($file) {
	# Function tu return txt-file content
	if (file_exists($file)) {
		$txt = file_get_contents($file);
		echo nl2br($txt);
	}	
}

function ECHO_TAG_VIDEO ($video)
{
	# => Function to return an image-tag
	# Parameters:
	# - $src   : Directory and file name
	echo '<video autoplay controls>';
	echo '<source src="'.$video.'"></source>';
	echo 'Your browser does not support HTML5 video';
	echo '</video></br>';
}

?>