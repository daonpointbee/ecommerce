<?php

/**
 * author: 
 * date:
 * description: A root class for all manage classes. This class communicates with DB
 */

define("DB_HOST", 'localhost');
define("DB_NAME", 'ecommerce');
define("DB_PORT", 3306);
define("DB_USER","root");
define("DB_PWORD","");

define("LOG_LEVEL_SEC",0);
define("LOG_LEVEL_DB_FAIL",0);

define("PAGE_SIZE",10);

function log_msg($level, $er_code, $msg, $mysql_msg){
    return 0;
}

/**
 * Class Adb
 *
 * This is a class to model the mysqli instances,
 * thus to handle connections, querying, fetching
 * and closing of the connection to the database
 * server. It also extends 'mysqli' to be able to
 * access it methods and objects
 *
 */
class Adb extends mysqli
{
    /**error description*/
    var $str_error;
    /*error code*/
    var $error;
    /*db connection link*/
    var $link;
    /* Every error log has a 4 digit code. The first two digits(prefix) tells you which class logged the error*/
    var $er_code_prefix;
    /* query result resource*/
    var $result;

    /**
     * Adb constructor.
     *
     * Function to establish a connection each time
     * the adb class is instantiated. The constructor
     * takes in the host, username, password, the name
     * of the database and the port as its parameters
     *
     * @internal param string $host
     * @internal param string $username
     * @internal param string $passwd
     * @internal param string $dbname
     * @internal param int $port
     */
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PWORD, DB_NAME, DB_PORT);

        if (mysqli_connect_error()) {
            die('Connection Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }

}


