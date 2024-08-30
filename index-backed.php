<?php
require($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/libs/Smarty.class.php'); //PATH TO Smarty class
require('process.php'); //PATH TO THE PHP FILE THAT PROCESSES REGISTER AND LOGIN DATA
use Smarty\Smarty;
$smarty = new Smarty();

$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/templates');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/templates_c');
$smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/cache');
$smarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/configs');

//$smarty->assign('name', 'Ned');
//$smarty->display('index.tpl');

//SET OUPUT DATA VARIABLES
$email_returned = $fullname_returned = $country_returned = $password_returned = $phone_returned = $date_of_birth_returned ="";
$success_message =""; //Defined success message
$output_all =""; //This variable shows all output data at once

//SET INPUT DATA VARIABLES
$email = $fullname = $country = $password = $phone = $date_of_birth ="";
$error_message=""; //DEfined error message
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = trim(stripslashes(htmlspecialchars($_POST["email"])));
    $fullname = trim(stripslashes(htmlspecialchars($_POST["fullname"])));
    $password = $_POST["password"]; //No need to trim nor strip passwords because user may use space, or any character for his/her passwords, since we will still hash it
    $country = trim(stripslashes(htmlspecialchars($_POST["country"])));
    $phone = trim(stripslashes(htmlspecialchars($_POST["phone"])));
    $date_of_birth = trim(stripslashes(htmlspecialchars($_POST["date_of_birth"])));

    //Phone must be numeric
    if(!is_numeric($phone)){
        $error_message ="Phone must be numeric";
    }
    elseif(strlen($password) < 8){
        $error_message ="Password must be atleast 8 characters";
    }
    elseif(is_numeric($phone) && strlen($password) >= 8){
        //NOW HASH PASSWORD
        $hashed_password = md5($password);
        //SEND DATA TO PROCESS
        $send_to_process = $newUser->register($email, $fullname, $country, $hashed_password, $phone, $date_of_birth);
        if($send_to_process !="failed"){
            //RETRIEVE DATA
            $data_processed = json_decode($send_to_process, TRUE);
            $email_returned = $data_processed["email"];
            $fullname_returned = $data_processed["fullname"];
            $country_returned = $data_processed["country"];
            $password_returned = $data_processed["password"];
            $phone_returned = $data_processed["phone"];
            $date_of_birth_returned = $data_processed["date_of_birth"];
            $success_message ="Data Registered Successfully";
            $output_all ="Registered Email: <b>$email_returned</b><br> Fullname Registered: <b>$fullname_returned</b><br> Country Registered: <b>$country_returned</b><br>
            Password Hashed: <b>$password_returned</b><br> Phone Registered: <b>$phone_returned</b><br> Date of birth registered: <b>$date_of_birth_returned</b>";
        }
    }
}

//SET SMARTY DATA FOR INPUT DATA TO BE SENT TO TEMPLATE
$smarty->assign('email', $email);
$smarty->assign('fullname', $fullname);
$smarty->assign('country', $country);
$smarty->assign('password', $password);
$smarty->assign('phone', $phone);
$smarty->assign('date_of_birth', $date_of_birth);
$smarty->assign('error_message', $error_message);

//SET SMARTY DATA FOR OUTPUT DATA TO BE SENT TO TEMPLATE
$smarty->assign('email_returned', $email_returned);
$smarty->assign('fullname_returned', $fullname_returned);
$smarty->assign('country_returned', $country_returned);
$smarty->assign('password_returned', $password_returned);
$smarty->assign('phone_returned', $phone_returned);
$smarty->assign('date_of_birth_returned', $date_of_birth_returned);
$smarty->assign('success_message', $success_message);
$smarty->assign('output_all', $output_all);


$smarty->display('index.tpl');

?>