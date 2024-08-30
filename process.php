<?php
class User{
    public function register($email, $username, $password){
        if($email !='' && $username !='' && $password !=''){
            if(preg_match('/^[a-zA-Z0-9]+$/', $username)){
                //CHECK THAT IT IS BETWEEN 3 and 20 characters
                if(strlen($username) >= 3 && strlen($username) <= 20){
                    //NOW CHECK THE EMAIL FORMAT
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        //NOW CHECK PASSWORD
                        if(strlen($password) >= 8){
                            //NOW CHECK THAT PASSWORD IS ALPHANUMERIC
                            if(preg_match('/^[a-zA-Z0-9\s_-]+$/', $password)){
                                $data = array("email"=>$email, "username"=>$username, "password"=>$password);
                                $data_to_send = json_encode($data, TRUE);
                                return $data_to_send;
                            }
                            else{
                                return "weak_passwprd";
                            }
                        }
                        else{
                            return "short_password";
                        }
                    }
                    else{
                        return "invalid_email";
                    }
                }
                else{
                    return "short_username";
                }
            }
            else{
                return "invalid_username";
            }
        }
        else{
            return "failed";
        }
    }
}

$newUser = new User();
?>