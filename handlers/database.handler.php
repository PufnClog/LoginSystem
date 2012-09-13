<?php

    /**
     * Database Handler
     *
     * @desc        This file will handle the database abstraction
     */

    class DatabaseHandler
    {

        public function __construct($strHost, $strUser, $strPass)
        {
            mysql_connect($strHost, $strUser, $strPass);
        }
    }



/**
 * Read up on classes, function types, public, protected and private, and class variables.
 *
 * Read up on mysqli, GOOGLE FOR EXAMPLES!!!
 *
 * Look at how to make an instance of a class and use methods in classes. How to call methods and use class variables.
 */
