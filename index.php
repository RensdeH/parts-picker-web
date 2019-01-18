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


Welcome To Parts-picker-php,<br>
Vul je naam in:<br>
<?php
if (isset($_GET['empty_field'])) {
	echo "<div class=\"alert alert-danger\" role=\"alert\">";
  echo "Vul een gebruikersnaam in";
	echo "</div>";
}?>
<form action="process_gebruiker.php" method="post" autocomplete="off">
<div class="form-group">
	<label for="gebruikersnaam">Gebruikersnaam</label>
	<input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikers Naam" <?php if(!empty($_SESSION['gebruikersnaam'])) {echo "value=".$_SESSION['gebruikersnaam'];} ?>><br>
</div>
<div class="form-group">
	<label for="soortFactuur">
	<select class="form-control" name="soortFactuur" id="soortFactuur">
		<option value="Reparatie">Reparatie</option>
		<option value="Artikelen">Artikelen</option>
		<option value="Verkoop">Verkoop</option>
		<option value="Inkoop">Inkoop</option>
	</select>
</div>
<input class="save btn btn-primary" type="submit" value="Ga verder">
</form>
<a type="submit" onclick="clearSession()" href="index.php" ><button class="btn btn-danger">Restart</button></a>
</body>
</html>
<script>
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "index.php");
    }
</script>
