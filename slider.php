<!DOCTYPE html>
<html lang="de">
	<head>
    	<title>Slider mit PHP</title>
  
    	<meta charset="ISO-8859-1"/>
    	<link rel="stylesheet" type="text/css" href="style/style.css" />
    	<script src="javascript/prefixfree.min.js"></script>   
    	<style type="text/css">
    		/* image-slider*/
			.slider_content {
			    background-color: #444444 /*rgb(180,160,150)*/;
			    }
			.slider_row { float:left; background-color:#444444; width: 100%}
			.slider_col { float:left;  border: 2px solid #000000; margin:5px; }
			.img_slider{
				margin-left: auto;
			    margin-right: auto;
				max-height: 70%; 
				max-width: 100%;
			    width: auto;
			}
			.slider_hover { width: 50px; height:40px;}
    	</style>
  	</head>
  	<body>
  		<noscript>
	      <h1>In Ihrem Browser ist JavaScript deaktiviert.</h1>
	      <p>Im <a href="https://wiki.selfhtml.org/wiki/JavaScript/Tutorials/JavaScript_aktivieren">SELFHTML-Wiki</a> erfahren Sie,
	          wie Sie JavaScript in Ihrem Browser aktivieren können.
	      </p>
	    </noscript>
	  	<div class="slider_content" style="max-width:90%">
	  		<!-- Bilder mit PHP auflisten -->
	  		<?php
	  			$imgDir = dir("images/slides");
				$counter = 0;
				$imgs = array();
	  			while (($f = $imgDir->read()) != false) {
	  				if ($f != "." && $f != ".."){
	  					// Nur die Bilder auslesen
	  					$format = substr ($f, -3);
	  					if (strtolower($format) == "jpg" || strtolower($format) == "png" || strtolower($format) == "gif") //und so weiter
	  					if (is_dir("files/".$f)){ // wenn ein Verzeichnis
	  						// erstmal nichts machen
	  					} else {
							$imgs[$counter] = $imgDir->path."/".$f;
							echo "\t<img class=\"img_slider\" src=\"".$imgs[$counter]."\">\n"; //$f."<br /> \n";
							$counter++;
							
	  					}
	  				}
	  			}
	  			$imgDir->close();
				echo "<div class=\"slider_row\">\n";
				$i = 0;
				while ($i < $counter) {
					echo "\t<div class=\"slider_col\"><img class=\"slider_hover\" src=\"".$imgs[$i]."\" onclick=\"currentImg(".($i+1).")\" style=\"width: 50px; height:35px\"></div>\n";
					$i++;
				}
				echo "</div>\n";
	  		?>
			</div>
	  		<script type="text/javascript">
			var slideIndex = 1;
			showImg(slideIndex);
			
			function currentImg(n) {
			  showImg(slideIndex = n);
			}
			
			function showImg(n) {
			  var i;
			  var x = document.getElementsByClassName("img_slider");
			  var dots = document.getElementsByClassName("slider_hover");
			  if (n > x.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = x.length}
			  for (i = 0; i < x.length; i++) {
			     x[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			     dots[i].className = dots[i].className.replace("slider_hover", "");
			  }
			  x[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += "slider_hover";
			}
			</script>
	  		<div id="footer"></div>
  		</div>
 	</body>
</html>