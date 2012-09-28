<?php
    /*
     *~~~~~~Practice 1: Winging it~~~~~~
     *Author:Zoe Wood
     *Summary: Login System using php and mySQL LETS DO THIS!!!
     */

    // Connect to database NOTE TO SELF: really need to look into this using classes

    session_start(); // Sets up login session for the user
?>

<?php
    require_once('./handlers/database.handler.php');

    $objDatabase = new DatabaseHandler('localhost', 'root', 'local');

    //USERNAME AND PASSWORD SENT FROM FORM
    if( isset( $_POST['username']) && isset( $_POST['password']) )
    {
        $strUserName = mysql_real_escape_string( $_POST['username'] );
        $strUserPass = mysql_real_escape_string( $_POST['password'] );

        $strQuery = 'SELECT strUserName '.
                         ', strUserPass '.
                      'FROM testlogin.tbl_user '.
                     "WHERE strUserName='$strUserName' ".
                       "AND strUserPass='$strUserPass'";

        $objUser = mysql_query( $strQuery );
        $arrUser = mysql_fetch_assoc( $objUser );

    }

    if(//hmmmm it seems ive encountered a problem here better ask the sensei xD im pretty sure $arrUser is the key variable i need here but how do i present it without it logging in EVERYTHING...)
    {
        $_SESSION['username'] = $strUserName;           //If Login is Successful
        $_SESSION['password'] = $strUserPass;
        echo "Login Successful";
     }else{                              //If it isnt...
        echo "Incorrect Login, try again";
    }
//Notes so far (man its getting late -.-)
//Need to see what sessions are all about still probably getting ahead of myself again ^^'
//Also button? that is all... might need something like a $bolLoggedIn=false like i did with arrays hmmmm
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
            </form
        </body>
    </html>
