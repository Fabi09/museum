<?php
require_once ('main/config.php');				# Config-file
require_once (DIR_PHP.'php__HTMLELEMENTS.php'); # PHP-functions to echo HTML-tags
require_once (DIR_PHP.'php__BASIC.php');        # PHP-functions
require_once (DIR_LABELS.'lbl__BASIC.php');     # PHP-definitions

INITIALIZE_GET_VAR ('site',			'');
INITIALIZE_GET_VAR ('project',		'');
INITIALIZE_GET_VAR ('subproject',	'');
INITIALIZE_GET_VAR ('language',		DEFAULT_LANGUAGE);
?>
<!DOCTYPE html>
<html lang="de">
	<head>
    	<title>Websiteninhalt generieren</title>
    	
    	<meta charset="UTF-8"/>
    	<link href="<?php echo DIR_STYLESHEETS.'style.css'; ?>" rel="stylesheet" type="text/css">
    	<script language=javascript> 
    	function saveChanges() {
    		var box = window.confirm("Wollen Sie die Änderungen speichern?");
    		
    		if (box) {
    			DASWASBEIOKGEMACHTWIRD;
    		} else {
    			DASWASBEIABBRECHENGEMACHTWIRD;
    		}
    	} 
		</script>
	</head>
  	<body>
  		<noscript>
	      <h1>In Ihrem Browser ist JavaScript deaktiviert.</h1>
	      <p>Im <a href="https://wiki.selfhtml.org/wiki/JavaScript/Tutorials/JavaScript_aktivieren">SELFHTML-Wiki</a> erfahren Sie, wie Sie JavaScript in Ihrem Browser aktivieren können.</p>
	    </noscript>
	    <div id="Background">
	    	<form name="Form" action="">
	    		HTML-Element auswählen:
	    		<select name="Tag">
	    			<option value="h1">1. Überschrift</option>
	    			<option value="h2">2. Überschrift</option>
	    			<option value="p">Text</option>
	    			<option value="img">Bild</option>
	    			<option value="script">Video</option>
	    			<option value="audio">Audio</option>
	    			<option value="slider">Slider</option>
	    		</select> 
	    		Datei zum Hochladen auswählen:
	    		<input name="Datei" type="file" size="50">
	    		<br />
	    		<textarea rows="4" name="Text" cols="100"></textarea> <br />
	    		<input type="button" value="Element einfügen" onclick="add_HTML_TAG()" style="background-color: red;"/>
	    		<input type="button" value="Inhalt ändern" onclick="test()" style="background-color: red;"/>
	    		<input type="file" webkitdirectory directory multiple/>
	    	</form>
	    	
	    	<script>
	    	function add_HTML_TAG () {
	    		var Typ = document.Form.Tag.options[document.Form.Tag.selectedIndex].value;
	    		var new_tag = document.createElement(Typ);
	    		if (Typ == "h1" || Typ == "h2" || Typ == "p") {
	    			var text = document.createTextNode(document.Form.Text.value);
	    			new_tag.appendChild(text);
	    		}
	    		
	    		if (Typ == "img" || Typ == "audio") {
	    			new_tag.setAttribute("src", document.Form.Datei.value);
	    		}
	    		
	    		if (Typ == "video") {
	    			new_tag.setAttribute("src", "https://www.youtube.com/watch?v=FR3Zhw8KqT0");
	    		}
      			document.getElementById("Background").appendChild(new_tag);
      		}
      		
      		function changeTag (tag, index, input) { 
      			var inhalt = document.getElementsByTagName(tag)[index].innerHTML = input; 
      			console.log(p); console.log(inhalt);
      		}
      		
      		function test(){
      		var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var playerDiv = document.getElementById('Background');
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player(playerDiv, {
                    height: '250',
                    width: '444',
                    videoId: 'sIFYPQjYhv8'
                });
            }
      		}
      		</script>
	    <?php ?>
	 	</div>
 	</body>
</html>