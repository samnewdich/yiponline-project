<?php
require($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/libs/Smarty.class.php'); //PATH TO Smarty class
require('process.php'); //PATH TO THE PHP FILE THAT PROCESSES REGISTER AND LOGIN DATA
use Smarty\Smarty;
$smarty = new Smarty();

$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/templates');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/templates_c');
$smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/cache');
$smarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/sapp/smarty-master/configs');


//SET OUPUT DATA VARIABLES
$email_returned = $username_returned = $password_returned ="";
$success_message =""; //Defined success message
$output_all =""; //This variable shows all output data at once

//SET INPUT DATA VARIABLES
$email = $username = $password ="";
$error_message=""; //DEfined error message
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = trim(stripslashes(htmlspecialchars($_POST["email"])));
    $username = trim(stripslashes(htmlspecialchars($_POST["username"])));
    $password = $_POST["password"]; //No need to trim nor strip passwords because user may use space, or any character for his/her passwords, since we will still hash it

    //SEND DATA FOR PROCESSING
    $send_to_process = $newUser->register($email, $username, $password);
    if($send_to_process =="failed"){
        $error_message ="All fields must be filled";
    }
    elseif($send_to_process =="invalid_username" || $send_to_process =="short_username" || $send_to_process =="invalid_email" || $send_to_process =="short_password" || $send_to_process =="weak_password"){
        $error_message = str_replace("_"," ", $send_to_process);
    }
    else{
       //RETRIEVE DATA
        $data_processed = json_decode($send_to_process, TRUE);
        $email_returned = $data_processed["email"];
        $username_returned = $data_processed["username"];
        $password_returned = $data_processed["password"];
        $password_hashed_returned = $data_processed["password_hashed"];
        $success_message ="Data Registered Successfully";
        $output_all ="Email Registered: <b>$email_returned</b><br> Username Registered: <b>$username_returned</b><br> Password Registered: <b>$password_returned</b> <br> Password Hashed: <b>$password_hashed_returned</b>";
    }
}

//SET SMARTY DATA FOR INPUT DATA TO BE SENT TO TEMPLATE
$smarty->assign('email', $email);
$smarty->assign('username', $username);
$smarty->assign('password', $password);
$smarty->assign('error_message', $error_message);

//SET SMARTY DATA FOR OUTPUT DATA TO BE SENT TO TEMPLATE
$smarty->assign('email_returned', $email_returned);
$smarty->assign('username_returned', $username_returned);
$smarty->assign('password_returned', $password_returned);
$smarty->assign('password_hashed_returned', $password_hashed_returned);
$smarty->assign('success_message', $success_message);
$smarty->assign('output_all', $output_all);


$smarty->display('register.tpl');

?>