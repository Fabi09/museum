<?php
require_once ('main/config.php');				# Paths
require_once (DIR_PHP.'php__HTMLELEMENTS.php'); # PHP-functions to echo HTML-tags
require_once (DIR_PHP.'php__BASIC.php');        # PHP-functions
require_once (DIR_CONSTANTS.'constants.php');     # PHP-Constants

INITIALIZE_GET_VAR ('site',			'');
INITIALIZE_GET_VAR ('project',		'');
INITIALIZE_GET_VAR ('subproject',	'');
INITIALIZE_GET_VAR ('language',		DEFAULT_LANGUAGE);

#INITIALIZE_POST_VAR ('site',			'');
#INITIALIZE_POST_VAR ('project',		'');
#INITIALIZE_POST_VAR ('subproject',	'');
#INITIALIZE_POST_VAR ('language',		DEFAULT_LANGUAGE);
?>
<!DOCTYPE html>
<html lang="de">
	<head>
    	<title>
    	<?php
    		if (!empty ($_GET['project'])){
				echo constant('PROJECT_'.strtoupper($_GET['project']).'_'.$_GET['language']);
			} else {
				echo constant('SITE_'.strtoupper($_GET['site']).'_'.$_GET['language']);
			}
		?></title>
  
    	<meta charset="UTF-8"/>
    	
    	<!-- Image Slider links -->
    	<link href="main/stylesheets/js-image-slider.css" rel="stylesheet" type="text/css" />
    	<script src="main/javascripts/js-image-slider.js" type="text/javascript"></script>
    	
    	<link href="<?php echo DIR_STYLESHEETS.'style.css'; ?>" rel="stylesheet" type="text/css">
    	<?php 
    	if (!empty($_GET['site']) && file_exists(DIR_STYLESHEETS.strtoupper($_GET['site']).'.css') && $_GET['site'] != 'Home') {
			echo '<link href="';
			echo DIR_STYLESHEETS.strtoupper($_GET['site']);
			echo '.css" rel="stylesheet" type="text/css">';
		}
		if (!empty($_GET['project']) && file_exists(DIR_STYLESHEETS.'PROJECT.css')) {
			echo '<link href="'.DIR_STYLESHEETS.'PROJECT.css" rel="stylesheet" type="text/css">';
		}
		/*
    		if (!empty ($_GET['site']) && $_GET['site'] != 'Home') {
    			ECHO_CSS (strtoupper($_GET['site'])); 
				ECHO_JS ($_GET['site']);
    		}
			if (!empty ($_GET['project'])) {
    			ECHO_CSS ($_GET['project']); 
				ECHO_JS ($_GET['project']);
    		}		
			if (!empty ($_GET['subproject'])) {
    			ECHO_CSS ($_GET['subproject']); 
				ECHO_JS ($_GET['subproject']);
    		}
		 */
    	?>
    	<script type="text/javascript" src="<?php echo DIR_JAVASCRIPTS.'HOME.js'; ?>"></script>
  	</head>
  	<body>
  		<noscript>
	      <h1>In Ihrem Browser ist JavaScript deaktiviert.</h1>
	      <p>Im <a href="https://wiki.selfhtml.org/wiki/JavaScript/Tutorials/JavaScript_aktivieren">SELFHTML-Wiki</a> erfahren Sie, wie Sie JavaScript in Ihrem Browser aktivieren können.</p>
	    </noscript>
	    
	    
	    <div class="Background">
	    <?php
	 		require_once(DIR_TEMPLATES.'header.php');
			#require_once(DIR_CONSTANTS.'navi_list.php');
	 		
	 		if ($_GET['site'] != 'Map') echo '<div style="padding-left: 6%; padding-right:6%;">';
			if (!empty ($_GET['project'])){
				if (!empty ($_GET['subproject'])) {
					require_once(DIR_TEMPLATES.'subproject.php');
				} else {
					require_once(DIR_TEMPLATES.'project.php');
				}
			} else if (!empty ($_GET['site'])){
				require_once (DIR_TEMPLATES.constant('TPL_'.$_GET['site']));
			} else {
				require_once (DIR_TEMPLATES.'home.php');
			}
			if ($_GET['site'] != 'Map') echo '</div>';
		?>
	 	</div>
 	</body>
</html>