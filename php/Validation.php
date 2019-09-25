<?php
// define variables and set to empty values
// $nameErr = $mob_noErr = $emailErr = $passwordErr = "";
// $name    = $mob_no = $email = $password = "";

class validation {
    public function validate(){
        $error = array();
        if (isset($_POST)) {
        
            //validation for name
            if (empty($_POST['user']['name'])) {
                $error["empty_name"] = "This field is required";
                //return false;
                
            } else {
                $name = ($_POST['user']['name']);
                // check name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $error["nameErr"] = "Enter valid name(only alphabets)";
                
                }
            }
            
            //validation for mobile no
            if (empty($_POST['user']['mob_no'])) {
                $error["empty_mob_no"] = "This field is required(10 digits)";
            
            } else {
                $mob_no = ($_POST['user']['mob_no']);
                
            }
            
            //validation for email
            if (empty($_POST['user']['email'])) {
                $error["empty_email"] = "This field is required";
            
            } else {
                $email = ($_POST['user']['email']);
                // check if e-mail address syntax is valid or not
                if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
                {
                    $error["emailErr"] = "Enter valid email"; 
                } 
               
            }
            
            
            
            //validation for password
            if (empty($_POST['user']['password'])) {
                $error["empty_password"] = "This field is required";
                
            }else {
                $password = ($_POST['user']['password']);
                if (!empty($_POST['user']['password']) && strlen($_POST['user']['password']) < 8){
                    $error["passwordErr"] = "minimum 8 characters";
                
                }
            }

            if (!empty($error))
            {
                return $error;

            }
            else
            {
                return '0';                
        
            }
        }    
    }
}
    
?>
