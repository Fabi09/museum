<div class="Text">

<?php
$directory = realpath('main/data/'.$_GET['site'].'/');
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/inhalt_'.($_GET['language']).'.csv')) as $key_index => $array){
if(!empty($array['titel'])){
echo <<<EOT

<h1>{$array['titel']}</h1>

<span>{$array['zusammenfassung']}</span>
<br/>
<br/>
EOT;
}
}
foreach (RETURN_CSVFILE_CONTENT (realpath($directory.'/newsfeed_'.($_GET['language']).'.csv')) as $key_index => $array){
if(!empty($array['tag'])){
							echo <<<EOT

								<span>{$array['tag']}-{$array['monat']}-{$array['jahr']}:</span>
								<br>
								<span>{$array['beschreibung']}</span>
                <br/>
EOT;
}
}
?>
</div>

					<div align="center" >
					<iframe width="920" height="500" src="https://www.youtube.com/embed/FR3Zhw8KqT0?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>

<!--------------Bildermenu-------------------->

        <div class="Images">

          <img src="main/images/A.jpg"   width="400" height="340">
          <a href="#">
          <spanA>
            Projekt A
          </spanA></a>
        </div>

        <div class="Images">
          <img src="main/images/B.jpg" width="400" height="340">
          <a href="#">
          <spanB>
            Projekt B
          </spanB></a>
        </div>

        <div class="Images">
          <img src="main/images/C.jpg" width="400" height="340">
          <a href="bewertungen.html">
          <spanC>
            Projekt C
          </spanC></a>
        </div>

        <div class="Images">
          <img src="main/images/mini.png" width="400" height="340">
          <a href="#">
          <Minigrad>
            Minigraduiertenkolleg
          </Minigrad></a>
        </div>
</div>
