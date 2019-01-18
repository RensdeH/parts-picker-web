<?php
// Start the session
session_start();
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
	<a class="btn btn-primary" href="index.php" role="button">Vorige</a>
Welkom <?php echo $_SESSION["gebruikersnaam"];?><br>
Factuursoort: <?php echo $_SESSION["soortFactuur"];?>
<?php
if (isset($_GET['empty_field'])) {
    echo "Gebruikersnaam is leeg";
}?>

 <form name="klantForm" action="process_klant.php" method="post" autocomplete="off">
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Naam:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="name" <?php if(!empty($_SESSION["klant"]['name'])) {echo "value=".$_SESSION["klant"]['name'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">E-mail:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="email" <?php if(!empty($_SESSION["klant"]['email'])) {echo "value=".$_SESSION["klant"]['email'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Telefoon:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="telefoon" <?php if(!empty($_SESSION["klant"]['telefoon'])) {echo "value=".$_SESSION["klant"]['telefoon'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Straat:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="straat" <?php if(!empty($_SESSION["klant"]['straat'])) {echo "value=".$_SESSION["klant"]['straat'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Postcode:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="postcode" <?php if(!empty($_SESSION["klant"]['postcode'])) {echo "value=".$_SESSION["klant"]['postcode'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Plaats:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="plaats" <?php if(!empty($_SESSION["klant"]['plaats'])) {echo "value=".$_SESSION["klant"]['plaats'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Kenteken:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="kenteken" <?php if(!empty($_SESSION["klant"]['kenteken'])) {echo "value=".$_SESSION["klant"]['kenteken'];} ?>>
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-sm-1 col-form-label">Km-stand:</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="km-stand" <?php if(!empty($_SESSION["klant"]['km-stand'])) {echo "value=".$_SESSION["klant"]['km-stand'];} ?>>
		</div>
	</div>
 <input class="save btn btn-primary" type="submit" value="Sla klant op"><br><br>
 <button type="reset" class="btn btn-danger">Maak velden leeg</button>
</form>
 <a type="submit" onclick="clearSession()" href="index.php" ><button class="btn btn-danger">Restart</button></a>
</body>
</html>
<script>

function emptyForm(){
	var elements = $("input:text");
	for (var i = 0; i < elements.length; i++) {
    elements[i].value = "";
		//console.log(elements[i].value);
	}
}
</script>
