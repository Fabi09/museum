<h1>Weltkarte mit Markierungen der Fundorte</h1>

<div class="image">
	<img src="<?php echo DIR_IMAGES ?>rsz_sfb1070_data_final2.jpg"  usemap="#map" alt="World Map"/>
	<h2><span>Klicken sie auf einen der Fundorte, um genauere Informationen zu erhalten.</span></h2>
</div>

<p style="text-align: center">
	<map id="map" name="map">
		<?php
		ECHO_IMAGE_MAP(DIR_PROJECTS.'MAP.csv');
		?>
	</map>
</p>