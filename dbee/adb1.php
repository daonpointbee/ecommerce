<?php



define("DB_HOST", "localhost");
define("DB_USER","root");
define("DB_PWORD","");
define("DB_NAME", "winedb");

define("LOG_LEVEL_SEC",0);
define("LOG_LEVEL_DB_FAIL",0);

define("PAGE_SIZE",10);

function log_msg($level, $er_code, $msg, $mysqli_msg){
    return 0;
}

class adb1 {

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
    var $conn;
   //var $server = "localhost";
    //var $user = "root";
    //var $password = "";
    //var $name = "winedb";


    function adb1() {
       
        $this->er_code_prefix=1000;
        $this->link=false;
        $this->result = false;
    }

    /**
     * logs error into database using functions defined in log.php
     */
    function log_error($level, $code, $msg, $mysqli_msg = "NONE") {
        $er_code = $this->er_code_prefix + $code;
        //call to a predefined function 
        $log_id = log_msg($level, $er_code, $msg, $mysqli_msg);
        //if log id is false return 0;
        if (!$log_id) {
            return 0;
        }

        //display this code to user
        $this->error="$er_code-$log_id";
        return $log_id;
    }

    /**
    * creates connection to database
    */
    function connect() {

        //if($this->link)
        //{
           // return true;
        //}
        //try to connect to db
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
        if($this->conn->connect_errno){
            
            printf("Unable to connect to database %s" . $conn->connect_error);
            
            
        }       
      
 
           //echo "connected";
        //if (!mysqli_select_db($conn,$name)) {
            
          //  $log_id = $this->log_error(LOG_LEVEL_DB_FAIL,2, "select db failed   in db:connect()", mysqli_error($this->conn));
           // return false;
        //}

        return true;
    }

        
    /**
    *returns a row from a data set
    */
    function fetch() {
        return mysqli_fetch_assoc($this->result);
    }

    /**
    * connect to db and run a query 
    */
    function query($str_sql) {
        
        if (!$this->connect()) {        
            return false;
        }
        
       // $this->result = mysqli_query($str_sql,$this->link);
        if (!$this->result) {
            $this->log_error(LOG_LEVEL_DB_FAIL, 4, "query failed", mysqli_error($this->link));
            return false;
        }

        return true;
    }
    
    /**
    * returns number of rows in current dataset
    */
    function get_num_rows() {
        return mysqli_num_rows($this->result);
    }
    /**
    *returns last auto generated id 
    */
    function get_insert_id() {
        return mysqli_insert_id($this->link);
    }
    
}

?>





