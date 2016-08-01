<h1>
	<?php echo constant('SITE_'.strtoupper($_GET['site']).'_'.$_GET['language']) ;?>
</h1>

<style type="text/css">
		* { outline: none; }
		.c { clear: both; }
		#wrapper { margin: 0 auto; padding-left:15%; width: 960px; }		
</style>
			<!--------------Image slider-------------------->
			 
			<div id="wrapper">

		<div id="examples_outer">
			

			<div id="slider_container_1">

				<div id="SliderName">

					<a href="#1">
						<img src="<?php echo DIR_IMAGE_SLIDER; ?>A01_1.jpg" title="Description from Image Title" />
						<div class="SliderNameDescription"><strong>Pojekt: A01</strong><br />hah hvd bd yb ydf bdfybyfdb ydbydb </div>
					</a>
					<div class="SliderNameDescription">
						<img src="<?php echo DIR_IMAGE_SLIDER; ?>A01_2.jpg" height="40" style="float:left;margin-right:5px;" />
						<div class="SliderNameDescription"><strong>Pojekt: A01</strong><br />A01</div>
					</div>
					<a href="#2">
						<img src="<?php echo DIR_IMAGE_SLIDER; ?>A01_3.jpg" />
						<div class="SliderNameDescription"><strong>Pojekt: A01</strong><br />A01</div>
					</a>
					<img src="<?php echo DIR_IMAGE_SLIDER; ?>A01_4.jpg" />
					<div class="SliderNameDescription"><strong>Pojekt: A01</strong><br />A01</div>
					<img src="<?php echo DIR_IMAGE_SLIDER; ?>A01_5.jpg" />
					<div class="SliderNameDescription"><strong>Pojekt: A01</strong><br />A01</div>
				</div>
				<div class="c"></div>
				<div id="SliderNameNavigation"></div>
				<div class="c"></div>

				<script type="text/javascript">

					
					Sliderman.effect({name: 'demo01', cols: 40, rows: 0, delay: 5, fade: true, order: 'straight_stairs'});

					var demoSlider = Sliderman.slider({container: 'SliderName', width: 640, height: 428, effects: 'demo01',
					display: {
						pause: true, // slider pauses on mouseover
						autoplay: 3000, // 3 seconds slideshow
						description: {background: '#ffffff', opacity: .5, height: 50, position: 'bottom'}, // image description box settings
						buttons: {opacity: 1, prev: {className: 'SliderNamePrev', label: ''}, next: {className: 'SliderNameNext', label: ''}}, // Next/Prev buttons settings
					}});

				</script>

				<div class="c"></div>
			</div>
			<div class="c"></div>
		</div>

		<div class="c"></div>
	</div>
			
