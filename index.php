<?php

    /**
     * Login System
     * Desc:        Basic Login
     * Author:      Zoe
     */

    $bolLoggedIn = false;

    $arrUsers = array( array( 'username' => 'Meh',  'password' => 'test' )
                      ,array( 'username' => 'test', 'password' => 'test2' ) );

    if( isset( $_POST['username'] ) && isset( $_POST['password'] ) )
    {

        /**
         * Escape String
         * When using a real database make it safe by escaping it
         *
         * $strUsername = mysql_real_escape_string($_POST['username'])
         */
        $strUsername = $_POST['username'];
        $strPassword = $_POST['password'];

        foreach( $arrUsers as $arrUser )
        {

            if( $strUsername == $arrUser['username'] && $strPassword == $arrUser['password'] )
            {

                $bolLoggedIn = true;
                break;

            }

        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Practice</title>
    </head>
    <body>
        <?php

            if(!$bolLoggedIn) {

        ?>
        <form method="POST">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Password">
            <input type="submit">
        </form>
        <?php

            } else{

        ?>
        <p>Welcome back, <?php echo $strUsername; ?>.</p>
        <?php

            }

        ?>
    </body>
</html>
