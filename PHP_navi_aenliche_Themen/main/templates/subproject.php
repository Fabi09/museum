<h1 style="background-color: rgba(130,185,160,0.5); color:#3B3B3B; margin-left:0px;">
<?php
	echo RETURN_SUBPROJECT_TEXT($_GET['project'], $_GET['subproject']);	
?>
</h1>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $(".bottom-menu").slideToggle();
    });
});
</script>

<style>
	.bottom-menu{
		display: none;
	}
	.bottom-menu ul {
		list-style: none;
	}
	
	button {
		background-color: rgb(130,185,160);
		border-radius: 12px;
		padding: 17px 35px 17px 35px;
		font-weight:bold;
		font-size:12px;
	}
</style>

<?php
$path = RETURN_FILE_PATH('PROJECTS',$_GET['project'], $_GET['subproject']);
#echo $path;

# echo csv file
ECHO_CSV_FILE($path, $_GET['subproject'].'.csv', $_GET['language']);

# generate Slide-bottom menu
echo '<nav class="bottom-menu">',
	'<ul>';
  for ($i=0; $i < SIMILAR_NUM; $i++) { 
	if (in_array($_GET['subproject'], $SIM[$i])){
		for ($j=0; $j < count($SIM[$i]); $j++) { 
			echo '<li>';
			ECHO_TAG_A('index.php', '',  $SIM[$i][$j]{0},  $SIM[$i][$j], $_GET['language'], '', RETURN_SUBPROJECT_TEXT($SIM[$i][$j]{0}, $SIM[$i][$j]));
			echo '</li>';
		}
	}
  }
  echo  '</ul>',
'</nav>';
?>
<br />
<button> <?php echo constant('SIM_'.$_GET['language']);?> </button>


<!-- die Rechte zu den Bildern -->
<hr />
<div style="font-size: 9px;">Die Rechte der auf dieser Seite verwendeten Bilder liegen beim SFB 1070, Teilprojekt <?php echo $_GET['subproject']; ?></div><br />

