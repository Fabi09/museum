<div id="page">
	<!--Banner Bild-->
	<div class="banner">
		<div id="flag"  align="right" style="height: 60px; padding-right:25px;">
			<input type="submit" name="go" value="Submit" style="visibility:hidden; width: 0px"/>
			<input name="q" size="20" style="padding-top: 3px; margin-right:20px;" value="" class="searchinput" placeholder="<?php echo constant('SEARCH_'.$_GET['language'])  ?>" type="text" >
			
			<?php ECHO_FLAGS (); ?> <!--Deutsch/Englisch-->
	  	</div>
	  	
		<?php 
			ECHO_TAG_A('https://www.uni-tuebingen.de','','','','','',RETURN_TAG_IMG (LOGO_UNI, 'Universität Tübingen',''));
		?>
			
	</div>
			
	<!--Navigation bar-->
	<nav>
		<ul>
			<li><?php ECHO_TAG_A('index.php','1','','',$_GET['language'],'', constant ('SITE_1_'.$_GET['language'])) ?> </li>
			<li><?php ECHO_TAG_A('index.php','2','','',$_GET['language'],'', constant ('SITE_2_'.$_GET['language'])) ?> 
				<ul>
					<li><?php ECHO_TAG_A('index.php','','A','',$_GET['language'],'', constant ('PROJECT_A_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=1; $i < 7; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','A','A0'.$i,$_GET['language'],'', 'A 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','B','',$_GET['language'],'', constant ('PROJECT_B_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=1; $i < 8; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','B','B0'.$i,$_GET['language'],'', 'B 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','C','',$_GET['language'],'', constant ('PROJECT_C_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=2; $i < 8; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','C','C0'.$i,$_GET['language'],'', 'C 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','M','',$_GET['language'],'', constant ('PROJECT_M_'.$_GET['language'])) ?>
				</ul>
			</li>
			<li><?php ECHO_TAG_A('index.php','3','','',$_GET['language'],'', constant ('SITE_3_'.$_GET['language'])) ?></li>
			<li><?php ECHO_TAG_A('index.php','4','','',$_GET['language'],'', constant ('SITE_4_'.$_GET['language'])) ?></li>
			<li><?php ECHO_TAG_A('index.php','5','','',$_GET['language'],'', constant ('SITE_5_'.$_GET['language'])) ?></li>
			<div class="globus">
				<?php ECHO_TAG_A('index.php','6','','',$_GET['language'],'', RETURN_TAG_IMG (IMG_GLOBE, 'Image Map', 40)) ?>
			</div>
		</ul>
	</nav>
</div>