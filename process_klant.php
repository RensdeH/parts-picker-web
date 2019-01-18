<?php
// Start the session
session_start();
?>
	<?php
	if(!empty($_POST)) {
			$_SESSION["klant"] = $_POST;
	    header("Location: /artikelen.php");
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
