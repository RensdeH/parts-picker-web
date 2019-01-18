<?php
// Start the session
session_start();
include 'apifunctions.php';
?>
<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="save_changes.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<button class="btn btn-primary" onclick="wantToSave()" role="button">Vorige</button>
	<div class="container">
		<div class="row">
			<div class="col-8" id="Artikelen">
				Artikelen worden geladen...
			</div>
			<div class="col-4">
				<div class="col input-group-btn" id="orderlijst">
				</div>
				<div class="col input-group-btn" id="bottom">
					<a class="btn btn-primary btn-block" href="nextpage.php" onclick="saveOrder()" role="button">Sla order op.</a>
					<p></p>
					<a class="btn btn-danger btn-block" href="index.php" onclick="clearSession()" role="button">Restart</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">

$(document).ready( function() {
	$.get("showOrderArtikelen.php",showOrderArtikelenCallback);
});
$(document).ready( function() {
	$("#Artikelen").load("loadArtikels.php");
});

function showOrderArtikelenCallback(dataString,status){
	data = JSON.parse(dataString);
	console.log(data);
	for(i=0;i<data.length;i++){
		newProduct(data[i].id,data[i].count);
	}
}

function wantToSave(){
	window.location.href = 'klant.php';
}

function saveOrder(){
	data = $('.order-item');
	data2 = [];
	for (i = 0; i < data.length; i++){
		var count = data[i].innerHTML;
		var id = data[i].id.split('-')[2];
		data2.push({id:id,count:count});
	}
	for(j = 0;j<data2.length;j++){
		console.log(data2[j]);
	}
	$.post('saveOrder.php',{Artikelen:data2});
}

function productClick(id){
	if ($('#product-'+id).length){
		addProduct(id);
	}
	else{
		newProduct(id);
	}
}

function addProduct(id){
	aantal = $('#text-count-'+id).html();
	$('#text-count-'+id).html(parseInt(aantal)+1);
}

function removeProduct(id){
	aantal = $('#text-count-'+id).html();
	if(aantal == '1'){
		deleteProduct(id);
	}
	$('#text-count-'+id).html(parseInt(aantal)-1);
	if($('.order-item').length == 0){
		$('#orderlijst').html('Voeg items toe');
	}
}

function deleteProduct(id){
	$('#product-'+id).remove();
	if($('.order-item').length == 0){
		$('#orderlijst').html('Voeg items toe');
	}
}

function newProduct(id, count = 1){
	if($('.order-item').length == 0){
		$('#orderlijst').html('');
	}

	html = "";
	html += "<div class=\"input-group mb-3\" id=\"product-"+id+"\">";
  html += "<div class=\"input-group-prepend\">";
  html += "  <button class=\"btn btn-danger\" type=\"button\" id=\"button-delete\" onclick=\"deleteProduct("+id+")\">X</button>";
  html += "</div>";
  html += "<span class=\"input-group-text\" id=\"product-name\">"+id+"</span>";
	html += "<div class=\"input-group-append\">";
	html += "  <button class=\"btn btn-secondary\" type=\"button\" id=\"button-removeone\" onclick=\"removeProduct("+id+")\">-</button>";
	html += "  <span class=\"input-group-text order-item\" id=\"text-count-"+id+"\">"+count+"</span>";
  html += "  <button class=\"btn btn-secondary\" type=\"button\" id=\"button-addone\" onclick=\"addProduct("+id+")\">+</button>";
  html += "</div>";
	html += "</div>";

	$("#orderlijst").append(html);
	//$('#Content').html("<button>Hallo1</button><br><button>Hallo2</button>");
	//$.post("addProduct.php", product ); //$_SESSION[Artikelen].append(product)
}
</script>
