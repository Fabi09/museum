
<div class="Text">

	<h1> <?php echo  constant('SITE_PROJECT_'.strtoupper($_GET['project']).'_'.$_GET['language']);?> </h1><br />

<?php

$A_DE = array(
	'A01' => 'Ressourcen und die Herausbildung von Ungleichheit. Rohstoffe und Kommunikationssysteme im prähistorischen Südosteuropa',
	'A02' => 'Viel Erz und wenig Wasser. Sozio-kultureller Wandel in Verbindung mit Ressourcennutzung in der jüngeren Vorgeschichte der iberischen Halbinsel',
	'A03' => 'Steine aus dem Süden. Der Austausch von Ressourcen zwischen Mesopotamien und dem Gebiet des Persischen Golfs',
	'A04' => 'Die Entwicklung der Palast-RessourcenKulturen Syriens',
	'A05' => '„Das Land, in dem Milch und Honig fließen“. Entwicklung und Bedeutung von Agrarressourcen im bronze- und eisenzeitlichen Palästina',
	'A06' => 'Politischer Kollaps als Folge ökonomischen Wandels? Ressourcenkontrolle am Übergang von der Bronze- zur Eisenzeit im Ostmittelmeerraum'
); 

$A_EN = array(
	'A01' => 'Resources and the Emergence of Inequality: Raw Materials and Communication Systems in Prehistoric South-East Europe',
	'A02' => 'Many Ores and Little Water. Socio-Cultural Change in Connection with the Use of Resources in the Later Prehistory of the Iberian Peninsula',
	'A03' => 'Stones from the South. Exchange of Resources between Mesopotamia and the Region of the Persian Gulf',
	'A04' => 'The Development of Palace-ResourceCultures in Syria',
	'A05' => '"The Land flowing with Milk and Honey". Development and Significance of Agrarian Resources in Bronze and Iron Age Palestine',
	'A06' => 'Political Collapse as a Consequence of Economic Change? Control of Resources at the Transition from the Bronze to the Iron Age in the Eastern Mediterranean'
);

$text_DE = array(
	'A01' => 'Das Ziel des Projektes ist es, Veränderungen der Nutzung von anstehenden Ressourcen im
  	prähistorischen Südosteuropa anhand von zwei  Beispielregionen, den Gebieten des Banat
  	in Südwestrumänien und dem bulgarischen Schwarzmeerraum, zu untersuchen . Die vergleichende Analyse wird
  	insbesondere soziale Auswirkungen auf die Bevölkerung im
  	Zusammenhang mit der Ressourcennutzung aufzeigen .',
	'A02' => 'In diesem Teilprojekt werden die Dynamiken und
  	die Diversität der sozio-kulturellen Erscheinungsformen auf der
  	iberischen Halbinsel in Relation zur Nutzung von Ressourcen umfassend in einer
  	Langzeitperspektive vom dritten bis ersten Jahrtausend v . Chr . analysiert und rekonstruiert .
  	Durch die geplanten Gegenüberstellungen detaillierter Studien in zwei Regionen mit deutlich verschiedenen
  	Standortbedingungen ergibt sich die Chance Ressourcen als Faktoren in solchen Prozessen wesentlich deutlicher als bisher zu
  	identifizieren .',
	'A03' => 'In dem Teilprojekt soll die Zirkulation von Ressourcen im Bereich
  	des Persischen Golfes, der vor allem auf den Erhalt wertvoller Steine durch die
  	mesopotamischen Stadtstaaten und Großreiche des 3 . Jahrtausends v . Chr . abzielte, erforscht werden .
  	Im Zentrum stehen dabei die Auswirkungen dieser weiträumigen Prozesse auf die Herausbildung von lokalen RessourcenKulturen
  	in der Golfregion . Zu diesem Zweck wird in Zusammenarbeit mit dem Iranischen Forschungsinstitut für Kulturerbe und
  	Tourismus (richt) ein archäologischer Survey in der
  	iranischen Provinz Kerman durchgeführt....',
	'A04' => 'Das Teilprojekt zielt darauf ab, das traditionelle Konzept der
  	Palastwirtschaft für die syrischen Klein- und Mittelstaaten des 2 . Jahrtausends v . Chr .
  	durch ein Modell der Palast- RessourcenKulturen zu ersetzen und die Entwicklung dieser Systeme zu erforschen .
  	Dieses neue Konzept stellt die gezielte Belegung von Materialien und Objekten
  	mit kulturellem Symbolgehalt zu Zwecken der Herrschaftsstabilisierung in den Vordergrund .
  	In dem Teilprojekt wird die Bedeutung von Gütern aus wertvollen Materialien in palatialen Kontexten untersucht .',
	'A05' => 'Das Teilprojekt soll die landwirtschaftlichen Ressourcen
  	Palästinas mit Schwerpunkt auf dem Ackerbau durch zwei Fallstudien
  	erforschen: eine archäobotanische Fallstudie, welche die naturwissenschaftlichen
  	und ethnologischen Quellen untersuchen wird, und eine biblisch archäologische Fallstudie
  	zu den archäologischen, historischen und philologischen Quellen . Das Arbeitsprogramm wird dabei
  	so strukturiert werden, dass eine möglichst enge Kooperation zwischen beiden Fallstudien erzielt werden kann .',
	'A06' => 'Das Teilprojekt betrachtet am Beispiel des Übergangs von der Bronze- zur Eisenzeit
  	im Ostmittelmeerraum die Frage nach den Wechselwirkungen zwischen sozio-kulturellen Dynamiken
  	und der Nutzung  von Ressourcen . Während der ersten Phase des SFB sollen in einer Fallstudie archäologische
  	Funde der süd lichen Levante aus dem obengenannten Blickwinkel untersucht werden . In späteren Phasen des SFB werden
  	weitere Fallstudien das Untersuchungsgebiet ausweiten um zu einem besseren Verständnis der wirtschaftlichen,
  	politischen und historischen Vorgänge während ....'
);

$text_EN = array(
	'A01' => 'The aim of the project is to study changes in the availability of raw materials and strategies of their use as well as the acceptance and use of technological innovations in two model regions in prehistoric South-Eastern Europe, namely the Banat and the western coast of the Black Sea. The comparative analysis will highlight how these factors have been instrumental for the formation, stability, and decline of social groups.',
	'A02' => 'The project aims at investigating and reconstructing the dynamics and the diversity of the socio-cultural manifestations on the Iberian Peninsula in relation to the use of resources. The analysis will be conducted in a comprehensive way using a long-term perspective from the third to the first millennia BC. By comparing detailed studies in two regions with markedly different natural conditions there will be the chance to identify resources as factors in these processes more perspicuously as before.',
	'A03' => 'This project will investigate the circulation of cultural resources in the Persian Gulf. It will try to pinpoint the motivation of this exchange, which primarily aimed at obtaining precious stones for the Mesopotamian city-states and empires of the third millennium BC. The consequences of these far-reaching processes for the formation of local resource-cultures in the Gulf will be particularly emphasized. To achieve this an archaeological survey will be carried out in the Iranian province of Hormuzgan.',
	'A04' => 'The project aims at replacing the traditional concept of the palace-economy, used to describe small and middle-sized Kingdoms in second millennium BC Syria, by the model of palace ResourceCultures and to explore the development of these systems. This new concept emphasises the systematic endowment of materials and objects with symbolic value in order to strengthen political power. In one case study, the importance of objects made of precious materials in palatial contexts is investigated, while a second case study is devoted to the so-called “International Style” as a political resource.',
	'A05' => 'This project will investigate the agricultural resources of Ancient Palestine (Bronze to Iron Age; with a focus on the cultivation of plants) by conducting two case studies (each as dissertation project): an archaeobotanical case study analysing the natural scientific and ethnographic sources, and a biblical archaeological case study on the archaeological, historical and literal sources. The work program will be specifically organized to arrange a very close cooperation between both case studies.',
	'A06' => 'The transition from Bronze- to Iron Age in the Eastern Mediterranean stands as an example for an analysis of the interaction between socio-cultural processes and the use and control of resources. A case study dealing with the Southern Levant will study both archaeological and philological evidence under this point of view. Later on further regions will be included to achieve a better understanding of economic, political and historic processes during the 13th and 12th centuries BC.'
)

?>

  
  <?php 
  # echo divs
  for ($i=1; $i < 7; $i++) {
  	echo '<div class="read-more-box">';
  	if ($_GET['language'] == 'DE'){
  		echo '<h2 > A 0'.$i.'  ·   ', $A_DE['A0'.$i], '</h2><p>';
		echo '<img class="img-left" src="main/images/A0'.$i.'.JPG" width="160px" height="160px" >';
		echo $text_DE['A0'.$i], '</p></br>';
		echo '<a class="read-more-btn" href="index2.php?projekt=a0'.$i.'"> Mehr lesen </a>';
		
  	} else {
  		echo '<h2 > A 0'.$i.'  ·   ', $A_EN['A0'.$i], '</h2><p>';
		echo '<img class="img-left" src="main/images/A0'.$i.'.JPG" width="160px" height="160px" >';
		echo $text_EN['A0'.$i], '</p></br>';
		echo '<a class="read-more-btn" href="index2.php?projekt=a0'.$i.'"> Mehr lesen </a>';
  	}
	echo '</div>';
  }
  ?>
  <!--
  	<div class="read-more-box">
  	<h2 > A 01  ·   Ressourcen und die Herausbildung von Ungleichheit. Rohstoffe und Kommunikationssysteme im prähistorischen Südosteuropa

  	</h2>
  	<p>
  	<img class="img-left" src="main/images/A01.JPG" width="160px" height="160px" >

  	Das Ziel des Projektes ist es, Veränderungen der Nutzung von anstehenden Ressourcen im
  	prähistorischen Südosteuropa anhand von zwei  Beispielregionen, den Gebieten des Banat
  	in Südwestrumänien und dem bulgarischen Schwarzmeerraum, zu untersuchen . Die vergleichende Analyse wird
  	insbesondere soziale Auswirkungen auf die Bevölkerung im
  	Zusammenhang mit der Ressourcennutzung aufzeigen . </p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a01"> Mehr lesen </a>
  </div>

  	<div class="read-more-box">
      <h2 > A 02 · Viel Erz und wenig Wasser. Sozio-kultureller  Wandel in Verbindung mit
  	Ressourcennutzung in der jüngeren  Vorgeschichte der iberischen Halbinsel

  </h2>
     <p><img class="img-left" src="main/images/A02.jpg" width="160px" height="160px"  >



  	In diesem Teilprojekt werden die Dynamiken und
  	die Diversität der sozio-kulturellen Erscheinungsformen auf der
  	iberischen Halbinsel in Relation zur Nutzung von Ressourcen umfassend in einer
  	Langzeitperspektive vom dritten bis ersten Jahrtausend v . Chr . analysiert und rekonstruiert .
  	Durch die geplanten Gegenüberstellungen detaillierter Studien in zwei Regionen mit deutlich verschiedenen
  	Standortbedingungen ergibt sich die Chance Ressourcen als Faktoren in solchen Prozessen wesentlich deutlicher als bisher zu
  	identifizieren .
    </p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a02"> Mehr lesen </a>
  	</div>



  	   <div class="read-more-box">
      <h2 > A 03 ·  Steine aus dem Süden. Der Austausch von  Ressourcen zwischen Mesopotamien und dem Gebiet  des Persischen Golfs


   </h2>
     <p><img class="img-left" src="main/images/A03.jpg" width="160px" height="160px"  >



  	In dem Teilprojekt soll die Zirkulation von Ressourcen im Bereich
  	des Persischen Golfes, der vor allem auf den Erhalt wertvoller Steine durch die
  	mesopotamischen Stadtstaaten und Großreiche des 3 . Jahrtausends v . Chr . abzielte, erforscht werden .
  	Im Zentrum stehen dabei die Auswirkungen dieser weiträumigen Prozesse auf die Herausbildung von lokalen RessourcenKulturen
  	in der Golfregion . Zu diesem Zweck wird in Zusammenarbeit mit dem Iranischen Forschungsinstitut für Kulturerbe und
  	Tourismus (richt) ein archäologischer Survey in der
  	iranischen Provinz Kerman durchgeführt....</p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a03"> Mehr lesen </a>
  	</div>


  	   <div class="read-more-box">
      <h2 > A 04  · Die Entwicklung der Palast-RessourcenKulturen Syriens</h2>
     <p><img class="img-left" src="main/images/A04.jpg" width="160px" height="160px"  >



  	Das Teilprojekt zielt darauf ab, das traditionelle Konzept der
  	Palastwirtschaft für die syrischen Klein- und Mittelstaaten des 2 . Jahrtausends v . Chr .
  	durch ein Modell der Palast- RessourcenKulturen zu ersetzen und die Entwicklung dieser Systeme zu erforschen .
  	Dieses neue Konzept stellt die gezielte Belegung von Materialien und Objekten
  	mit kulturellem Symbolgehalt zu Zwecken der Herrschaftsstabilisierung in den Vordergrund .
  	In dem Teilprojekt wird die Bedeutung von Gütern aus wertvollen Materialien in palatialen Kontexten untersucht .
   </p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a04"> Mehr lesen </a>
  	</div>

  	   <div class="read-more-box">
      <h2 > A 05  · Reis und Heilpflanzen. </br> „Das Land, in dem Milch und Honig fließen“.  Entwicklung und Bedeutung von Agrarressourcen im  bronze- und eisenzeitlichen Palästina


   </h2>
     <p><img class="img-left" src="main/images/A05.JPG" width="160px" height="160px"  >



  	Das Teilprojekt soll die landwirtschaftlichen Ressourcen
  	Palästinas mit Schwerpunkt auf dem Ackerbau durch zwei Fallstudien
  	erforschen: eine archäobotanische Fallstudie, welche die naturwissenschaftlichen
  	und ethnologischen Quellen untersuchen wird, und eine biblisch archäologische Fallstudie
  	zu den archäologischen, historischen und philologischen Quellen . Das Arbeitsprogramm wird dabei
  	so strukturiert werden, dass eine möglichst enge Kooperation zwischen beiden Fallstudien erzielt werden kann .

    </p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a05"> Mehr lesen </a>
  	</div>

  	   <div class="read-more-box">
      <h2 > A 06  · Politischer Kollaps als Folge ökonomischen Wandels? Ressourcenkontrolle
  	am Übergang von der Bronze- zur  Eisenzeit im Ostmittelmeerraum
   </h2>
     <p><img class="img-left" src="main/images/A06.JPG" width="160px" height="160px"  >



  	Das Teilprojekt betrachtet am Beispiel des Übergangs von der Bronze- zur Eisenzeit
  	im Ostmittelmeerraum die Frage nach den Wechselwirkungen zwischen sozio-kulturellen Dynamiken
  	und der Nutzung  von Ressourcen . Während der ersten Phase des SFB sollen in einer Fallstudie archäologische
  	Funde der süd lichen Levante aus dem obengenannten Blickwinkel untersucht werden . In späteren Phasen des SFB werden
  	weitere Fallstudien das Untersuchungsgebiet ausweiten um zu einem besseren Verständnis der wirtschaftlichen,
  	politischen und historischen Vorgänge während ....
  	   </p></br>
  	<a class="read-more-btn" href="index2.php?projekt=a06"> Mehr lesen </a>
  	</div>

</div>
-->
