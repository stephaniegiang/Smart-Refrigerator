
<?php
	session_start();
	$success = session_destroy();
	if($success) // Destroying All Sessions
	{
	header("Location: index.php"); // Redirecting To Home Page
	}
?>