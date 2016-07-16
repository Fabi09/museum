<div id="page">
	<!--Banner Bild-->
	<div class="banner">
		<div id="flag"  align="right" style="height: 60px; padding-right:25px;">
			<input name="q" size="20" style="padding-top: 3px; margin-right:20px;" value="" class="searchinput" placeholder="<?php echo constant('LBL_SEARCH_'.$_GET['language'])  ?>" type="text" >
			<?php ECHO_FLAGS (); ?> <!--Deutsch/Englisch-->
	  	</div>
	  	
		<?php 
			ECHO_TAG_A('https://www.uni-tuebingen.de','','','','','',RETURN_TAG_IMG (LOGO_UNI, 'Universität Tübingen',''));
		?>
			
	</div>
			
	<!--Navigation bar-->
	<nav>
		<ul>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_HOME_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_HOME_'.$_GET['language'])) ?> </li>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_PROJECTS_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_PROJECTS_'.$_GET['language'])) ?> 
				<ul>
					<li><?php ECHO_TAG_A('index.php','','A','',$_GET['language'],'', constant ('LBL_PROJECT_A_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=1; $i < 7; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','A','A0'.$i,$_GET['language'],'', 'A 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','B','',$_GET['language'],'', constant ('LBL_PROJECT_B_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=1; $i < 8; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','B','B0'.$i,$_GET['language'],'', 'B 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','C','',$_GET['language'],'', constant ('LBL_PROJECT_C_'.$_GET['language'])) ?>
						<ul>
							<?php 
							for ($i=2; $i < 8; $i++) { 
								echo '<li>'; ECHO_TAG_A('index.php','','C','C0'.$i,$_GET['language'],'', 'C 0'.$i); echo '</li>';
							}?>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','M','',$_GET['language'],'', constant ('LBL_PROJECT_M_'.$_GET['language'])) ?>
				</ul>
			</li>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_HISTORY_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_HISTORY_'.$_GET['language'])) ?></li>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_PUBLICATIONS_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_PUBLICATIONS_'.$_GET['language'])) ?></li>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_GALLERY_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_GALLERY_'.$_GET['language'])) ?></li>
			<li><?php ECHO_TAG_A('index.php',constant('LBL_SITE_CONTACT_EN'),'','',$_GET['language'],'', constant ('LBL_SITE_CONTACT_'.$_GET['language'])) ?></li>

			<div class="globus">
				<?php ECHO_TAG_A('index.php',constant('LBL_SITE_MAP_EN'),'','',$_GET['language'],'', RETURN_TAG_IMG (IMG_GLOBE, 'Image Map', 40)) ?>
			</div>
		</ul>
	</nav>
</div>
