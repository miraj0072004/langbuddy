
<?php 
// This page activates the user's account.
require ('includes/utilities.inc.php'); 
$page_title = 'Activate Your Account';
include ('includes/header.inc.php');

// If $x and $y don't exist or aren't of the proper format, redirect the user:
if (isset($_GET['x'], $_GET['y']) 
	&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)
	&& (strlen($_GET['y']) == 32 )
	) {

	// Update the database...
	
	$q = "UPDATE users_tab SET active=NULL WHERE (email=:email AND active=:active) LIMIT 1";
	$stmt = $pdo->prepare($q);
    $r = $stmt->execute(array(':email' => $_GET['x'],':active' => $_GET['y']));
	// Print a customized message:
	if ($r) {
		echo "<h3>Your account is now active. You may now log in.</h3>";
	} else {
		echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>'; 
	}

	

} else { // Redirect.

	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.

} // End of main IF-ELSE.

include ('includes/footer.inc.php');
?>