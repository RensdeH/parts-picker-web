<?php
// Start the session
session_start();
?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="save_changes.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<a class="btn btn-primary" href="artikelen.php" role="button">Vorige</a><br>
	<br>
	<div class="col6" id="werkregels">
	</div>
	<div class="col-6">
		<button class="btn btn-primary btn-block" onclick="doeiets()" role="button">Voeg regel toe</button><br>
		<button class="btn btn-primary btn-block" onclick="saveWerk()" role="button">Sla order op.</button>
	</div>
	<?php
	function displayKlant(){
		echo "Klantnaam: ".$_SESSION["klant"]["name"]."<br>";
		echo "Klantemail: ".$_SESSION["klant"]["email"]."<br>";
		echo "Klanttelefoon: ".$_SESSION["klant"]["telefoon"]."<br>";
	}
	echo "GebrNaam: ".$_SESSION["gebruikersnaam"]."<br>";
	displayKlant();
	foreach($_SESSION["Artikelen"] as $art){
		echo "Artikel: ".$art["id"]."-Aantal: ".$art["count"]."<br>";
	}
	?>
</body>
<script>
function doeiets(){
	addWerkRegel();
}
function deleteWerk(id){
	$('#werk-regel-'+id).remove();
}

function saveWerk(){
	data = $('.werk-item');
	data2 = [];
	if (data.length==0){
		return;
	}
	for (i = 0; i < data.length; i++){
		element = $(data[i]);
		btwOption = element.find('.active').attr('id');
		if (btwOption=="option1"){
			btw = 0;
		}
		else{
			btw = 21;
		}
		Omschrijving = element.find('#Omschrijving').val();
		Prijs = element.find('#Prijs').val();
		if(Prijs==''){
			alert('Geen prijs opgegeven');
			return;
		}
		console.log(Prijs);
		var id = data[i].id.split('-')[2];
		data2.push({id:id,Omschrijving:Omschrijving,prijs:Prijs,btw:btw});
	}
	$.post('saveWerk.php',{Werk:data2});
	window.location.href = 'displayData.php';
}

function addWerkRegel(){
id = 0;
html = "";
html +=	"<div class=\"input-group mb-3 col-6 werk-item\" id=\"werk-regel-"+id+"\">";
html +=	"<div class=\"input-group-prepend btn-group btn-group-toggle\" data-toggle=\"buttons\">";
html +=	"		  <label class=\"btn btn-outline-dark active options\" id=\"option1\">";
html +=	"		    <input type=\"radio\" name=\"options\" autocomplete=\"off\"> 0%";
html +=	"		  </label>";
html +=	"		  <label class=\"btn btn-outline-dark options\" id=\"option2\">";
html +=	"	    <input type=\"radio\" name=\"options\" autocomplete=\"off\"> 21%";
html +=	"		  </label>";
html +=	"		</div>";
html +=	 " <input type=\"text\" class=\"form-control\" id=\"Omschrijving\" placeholder=\"Omschrijving\" aria-label=\"Text input with radio button\">";
html +=		"<div class=\"input-group-append\">";
html +=		"	<span class=\"input-group-text btn-success\" >€</span>";
html +="	<div class=\"input-group-append\">";
html +=		"		<input type=\"number\" class=\"form-control currency\" style=\"border-top-left-radius:0;border-bottom-left-radius:0\" placeholder=\"0\" min=\"0\" step=\"0.01\" data-number-to-fixed=\"2\" data-number-stepfactor=\"100\" id=\"Prijs\">";
html +="<button class=\"btn btn-danger\" type=\"button\" name=\"delete\" id=\"delete\" autocomplete=\"off\" onclick=\"deleteWerk("+id+")\">X</button>";
html +=		"</div>";
html +=		"</div>";
html +"	</div>";
$('#werkregels').append(html);
id++;
}

</script>
