	<!--Navigation bar-->
	<nav>
		<ul>
			<li><?php ECHO_TAG_A('index.php',constant('SITE_HOME_EN'),'',$_GET['language'],'', constant ('SITE_HOME_'.$_GET['language'])) ?> </li>
			<li><?php ECHO_TAG_A('index.php',constant('SITE_PROJECTS_EN'),'',$_GET['language'],'', constant ('SITE_PROJECTS_'.$_GET['language'])) ?>


				<ul>
					<li><?php ECHO_TAG_A('index.php','','A',$_GET['language'],'', constant ('PROJECT_A_'.$_GET['language'])) ?>
						<ul>
						<li><a href="index2.php?projekt=a01">A01</a></li>
						<li><a href="index2.php?projekt=a02">A02</a></li>
						<li><a href="index2.php?projekt=a03">A03</a></li>
						<li><a href="index2.php?projekt=a04">A04</a></li>
						<li><a href="index2.php?projekt=a05">A05</a></li>
						<li><a href="index2.php?projekt=a06">A06</a></li>
						</ul>
					</li>


					<li><?php ECHO_TAG_A('index.php','','B',$_GET['language'],'', constant ('PROJECT_B_'.$_GET['language'])) ?>
						<ul>
						<li><a href="index2.php?projekt=b01">B01</a></li>
						<li><a href="index2.php?projekt=b02">B02</a></li>
						<li><a href="index2.php?projekt=b03">B03</a></li>
						<li><a href="index2.php?projekt=b04">B04</a></li>
						<li><a href="index2.php?projekt=b05">B05</a></li>
						<li><a href="index2.php?projekt=b06">B06</a></li>
						<li><a href="index2.php?projekt=b07">B07</a></li>
						</ul>
					</li>


					<li><?php ECHO_TAG_A('index.php','','C',$_GET['language'],'', constant ('PROJECT_C_'.$_GET['language'])) ?>
						<ul>
						<li><a href="index2.php?projekt=c02">C02</a></li>
						<li><a href="index2.php?projekt=c03">C03</a></li>
						<li><a href="index2.php?projekt=c04">C04</a></li>
						<li><a href="index2.php?projekt=c05">C05</a></li>
						<li><a href="index2.php?projekt=c06">C06</a></li>
						<li><a href="index2.php?projekt=c07">C07</a></li>
						</ul>
					</li>
					<li><?php ECHO_TAG_A('index.php','','M',$_GET['language'],'', constant ('PROJECT_M_'.$_GET['language'])) ?>
				</ul>
			</li>




			<li><?php ECHO_TAG_A('index.php',constant('SITE_HISTORY_EN'),'',$_GET['language'],'', constant ('SITE_HISTORY_'.$_GET['language'])) ?></li>

			<li><?php ECHO_TAG_A('index.php',constant('SITE_PUBLICATIONS_EN'),'',$_GET['language'],'', constant ('SITE_PUBLICATIONS_'.$_GET['language'])) ?></li>

			<li><?php ECHO_TAG_A('index.php',constant('SITE_DATE_EN'),'',$_GET['language'],'', constant ('SITE_DATE_'.$_GET['language'])) ?></li>

			<div class="globus">
				<a>Hier klicken um die Weltkarte zu sehen</a>
				<?php ECHO_TAG_A('index.php',constant('SITE_GLOBE_EN'),'',$_GET['language'],'', RETURN_TAG_IMG (IMG_GLOBE, 'Image Map', 40)) ?>
			</div>
		</ul>
	</nav>
</div>
