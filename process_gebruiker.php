<?php
// Start the session
session_start();
?>
	<?php
	if(!empty($_POST["gebruikersnaam"])) {
			$_SESSION["gebruikersnaam"] = $_POST["gebruikersnaam"];
			$_SESSION["soortFactuur"] = $_POST["soortFactuur"];
	    header("Location: /klant.php");
	}
	else{
			header("Location: /index.php?empty_field");
	}
	    // $user = new User;
	    // $user->login($_POST['username']);
			//
	    // if ($user->isLoggedIn()) {
	    //     header("Location: /klant.php");
	    //     exit;
	    // }
	    // else {
	    //     header("Location: /login.php?invalid_login");
	    // }
	?>
