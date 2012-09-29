<?php

	/**
	 * ~~~~~~Practice 1: Winging it~~~~~~
	 * 
	 * Author:Zoe Wood
	 * Summary: Login System using php and mySQL LETS DO THIS!!!
	 */

	// Connect to database NOTE TO SELF: really need to look into this using classes

	session_start(); // Starts PHP sessions.

	require_once('./handlers/database.handler.php');

	$objDatabase = new DatabaseHandler('localhost', 'root', 'Diablo2');

	// If the username and password have been sent to the server:
	if( isset( $_POST['username']) && isset( $_POST['password']) )
	{
		$strUserName = mysql_real_escape_string( $_POST['username'] );
		$strUserPass = mysql_real_escape_string( $_POST['password'] );

		$strQuery = 'SELECT strUserName, '.
		                  ' strUserPass '.
		              'FROM testlogin.tbl_user '.
		             "WHERE strUserName='$strUserName' ".
		               "AND strUserPass='$strUserPass'";

		$objUser = mysql_query( $strQuery );
		$arrUser = mysql_fetch_assoc( $objUser );

		if( $arrUser )
		{
			// If the login was sucessful:
			$_SESSION['username'] = $arrUser['strUserName'];
			$_SESSION['password'] = $arrUser['strUserPass'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Practice</title>
	</head>
	<body>
		<h1>Welcome back!</h1>
		<p>How've you been <?php echo $_SESSION['username']; ?>. We've missed you!</p>
	</body>
</html>

<?php

		}
		else
		{
			// If the login was unsuccessful:
			echo "Incorrect Login, try again";
		}
	} else {

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Practice</title>
	</head>
	<body>
		<form method="POST">
			<input name="username" type="text" placeholder="Username">
			<input name="password" type="password" placeholder="Password">
			<input type="submit">
		</form>
	</body>
</html>

<?php
	
	}

?>
