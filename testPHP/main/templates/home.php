<h1>
	<?php if (!empty ($_GET['site'])){
		echo constant('SITE_'.strtoupper($_GET['site']).'_'.$_GET['language']) ;
	} else {
		echo constant('SITE_HOME'.'_'.$_GET['language']);
	}?>
</h1>
	
<div class="timeline">

					<img src="<?php echo DIR_IMAGES; ?>timetable.jpg"  usemap="#timetable" alt="timetable" width="100%"/>

					<map id="timetable" name="timetable">
						<area shape="rect" alt="A01" title="A01" coords="308,80,588,91" href="" target="_self" />
						<area shape="rect" alt="B01" title="B01" coords="106,185,178,199" href="" target="_self" />
						<area shape="rect" alt="B01" title="B01" coords="458,240,983,259" href="" target="_self" />
						<area shape="rect" alt="A03" title="A03" coords="648,213,702,229" href="" target="_self" />
						<area shape="rect" alt="A06" title="A06" coords="756,214,786,227" href="" target="_self" />
						<area shape="rect" alt="C03" title="C03" coords="827,210,915,228" href="" target="_self" />
						<area shape="rect" alt="A05" title="A05" coords="614,184,847,203" href="" target="_self" />
						<area shape="rect" alt="A04" title="A04" coords="729,82,801,93" href="" target="_self" />
						<area shape="rect" alt="B04" title="B04" coords="839,78,873,96" href="" target="_self" />
						<area shape="rect" alt="B07" title="B07" coords="722,50,807,62" href="" target="_self" />
						<area shape="rect" alt="C02" title="C02" coords="845,23,886,37" href="" target="_self" />
						<area shape="rect" alt="B06" title="B06" coords="1009,77,1052,96" href="" target="_self" />
						<area shape="rect" alt="B03" title="B03" coords="1061,48,1101,67" href="" target="_self" />
						<area shape="rect" alt="C04" title="C04" coords="1120,78,1173,98" href="c04.html" target="_self" />
						<area shape="rect" alt="C05" title="C05" coords="1070,185,1109,201" href="" target="_self" />
						<area shape="rect" alt="C06" title="C06" coords="1134,183,1169,200" href="c06.html" target="_self" />
					</map>

				</div>			
				
	
		