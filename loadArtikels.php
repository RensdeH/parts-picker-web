<?php
// Start the session
session_start();

include 'apifunctions.php';

$artikelen = getArtikels();
foreach($artikelen as $art){
	makeButton($art);
}

function makeButton($art){
	$fotoUrl = getProductImage($art->id);
	echo "<input class=\"col-2 border border-success\" type=\"image\" src=\"".$fotoUrl."\" onclick=productClick(".$art->id.")>";
}

?>
