<?php
class User{
    public function register($email, $fullname, $country, $password, $phone, $date_of_birth){
        if($email !='' && $fullname !='' && $country !='' && $password !='' && $phone !='' && $date_of_birth !=''){
            $data = array("email"=>$email, "fullname"=>$fullname, "country"=>$country, "password"=>$password, "phone"=>$phone, "date_of_birth"=>$date_of_birth);
            $data_to_send = json_encode($data, TRUE);
            return $data_to_send;
        }
        else{
            return "failed";
        }
    }


    public function login($email, $fullname, $phone){
        if($email !='' && $fullname !='' && $phone !=''){
            //LOGIC CODE THAT CHECKS IF THE email, fullname, phone has been registered or not
        }
        else{
            return 'failed';
        }
    }
}


$newUser = new User();
?>