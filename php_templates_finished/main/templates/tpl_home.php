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

$news = (RETURN_CSV_FILE($directory, 'newsfeed_'.$_GET['language'].'.csv' )) ;
for($i=0;$i<4;$i++){
  for($j=0;$j<4;$j++){
    echo '<div class="news green">';
    echo '<ul>';
    echo '<li><a href="#">';echo $news[0][0];echo '-'; echo $news[0][1]; echo '-'; echo $news[0][2]; echo':'; echo $news[0][3];echo '</a></li>';
    echo '<li><a href="#">';echo $news[1][0];echo '-'; echo $news[1][1]; echo '-'; echo $news[1][2]; echo':'; echo $news[1][3];echo '</a></li>';
    echo '<li><a href="#">';echo $news[2][0];echo '-'; echo $news[2][1]; echo '-'; echo $news[2][2]; echo':'; echo $news[2][3];echo '</a></li>';
    echo '<li><a href="#">';echo $news[3][0];echo '-'; echo $news[3][1]; echo '-'; echo $news[3][2]; echo':'; echo $news[3][3];echo '</a></li>';
    echo '</ul>';
    echo '</div>';
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
