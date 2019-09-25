<?php
	
	//database connection
	class Connection{ 
	
		public $servername = 'localhost';
		public $username = 'root';
		public $password = '123456';
		public $dbname = 'example';
		public $conn;
		public $db;
		public function __construct(){
			// Create connection
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			}
			//echo"connected succesfully";
		}

		//creating singleton class
	    /*public static function singleton(){
	        if (!isset(self::$db)) {
	            self::$db = new database('localhost', 'root', '123456', 'example');
	            return self::$db;
	        }
	        else
	            return self::$db;
	    }*/
	}
	//$connection = new connection();
	//$db = connection::singleton();

?>
