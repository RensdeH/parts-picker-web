<html>
<body>
	<div id="Artikelen">

	</div>

 </html>
</body>
<script>
$(document).ready( function() {
	//Get the tab-structure (PHP)
	$('#Artikelen').load("loadArtikels.php");
	//Get the full list of Articles (maybe data-trimmed) (PHP)
	//then fill appropriate tab (JQuery) with article (javascript)
	//makeTabs();
});
</script>
