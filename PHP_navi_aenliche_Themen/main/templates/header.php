<div id="page">
	<!--Banner Bild-->
	<div class="banner">
		<div id="flag"  align="right" style="height: 60px; padding-right:25px;">
			<input type="submit" name="go" value="Submit" style="visibility:hidden; width: 0px"/>
			<input name="q" size="20" style="padding-top: 3px; margin-right:20px;" value="" class="searchinput" placeholder="<?php echo constant('SEARCH_'.$_GET['language'])  ?>" type="text" >
			
			<?php ECHO_FLAGS (); ?> <!--Deutsch/Englisch-->
	  	</div>
	  	
		<?php 
			ECHO_TAG_A('https://www.uni-tuebingen.de/forschung/forschungsschwerpunkte/sonderforschungsbereiche/sfb-1070.html','','','','','',RETURN_TAG_IMG (LOGO_UNI, 'Universität Tübingen',''));
		?>
			
	</div>
			
	<!--Navigation bar-->
	<?php 
		require_once(DIR_CONSTANTS.'navi_list.php');
	?>
</div>