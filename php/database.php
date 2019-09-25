<?php
class database{
    
    public $servername = 'localhost';
    public $username = 'root';
    public $password = '123456';
    public $dbname = 'example';
    public $conn;
    private static $instance = null;
    private function __construct(){
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        //echo"connected succesfully";
    }
    //singleton class
    public static function singleton(){
          if (self::$instance == null)
          {
            self::$instance = new database();
          }
       
          return self::$instance;
    }
    //new user insert(create)
    public function insert($table_name, $column_name, $column_value){
        $sql = "INSERT INTO `".$table_name."` (".$column_name.") VALUES (".$column_value.")";
        //var_dump($column_value);
        if ($this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        $conn->close();
    }
    //returning row count for email_ajax, email existence
    public function num_rows($table_name, $column_name,$column_name2, $column_value,$column_value2){
        //$emailID = $email;
        $query=" SELECT $column_name FROM $table_name WHERE $column_name= '$column_value' && NOT $column_name2='$column_value2'";        
        $check_email = mysqli_query($this->conn,$query);
        $result = mysqli_num_rows($check_email);
        return $result;
    }
    //email valdation for signup
    public function num_rows1($table_name, $column_name, $column_value){
        //$emailID = $email;
        $query=" SELECT $column_name FROM $table_name WHERE $column_name= '$column_value'";        
        $check_email = mysqli_query($this->conn,$query);
        $result = mysqli_num_rows($check_email);
        return $result;
    }
    // login for user and admin
    public function login_access($table_name,$column_name1,$column_name2,$column_name3,$column_value1,$column_value2,$column_value3){

        $query ="SELECT $column_name1,$column_name2 FROM $table_name WHERE $column_name1= '$column_value1' && $column_name2= '$column_value2' && status = 'active' && $column_name3 = '$column_value3'";
        $login_check = mysqli_query($this->conn,$query);
        $result = mysqli_num_rows($login_check);
        return $result;
    }
    //returns conn variable
    public function return_conn(){
        return $this->conn;
    }
    //update table
    public function update_table($table_name,$column_name1,$column_name2,$column_name3,$column_name4,$column_value1,$column_value2,$column_value3,$column_value4){
        $query =  "UPDATE $table_name set $column_name1 = '$column_value1', $column_name2 = '$column_value2',$column_name3 = '$column_value3' where $column_name4 = '$column_value4';";
    
        $result = mysqli_query($this->conn,$query);
    }
    //delete that is inactive user
    public function delete_user($table_name,$column_name1,$column_name2,$column_value1,$column_value2){
        $query =  "UPDATE $table_name set $column_name1 = '$column_value1' where $column_name2 = '$column_value2';";
        $result = mysqli_query($this->conn,$query);
    }
   
}
$db = database::singleton();


?>