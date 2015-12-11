<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 12:36 PM
 */

require_once "includes/loader.php";

if(isset($_POST['login'])){

    $validator = new Validator();
    $rules = array(
        "email" => "required|email",
        "password" => "required"
    );

    $validator->run($rules);

    if($validator->fails()){
        $_SESSION["data"] = input_old();
        $_SESSION['messages'] = $validator->getMessages();
        header("Location: login.php");
    } else {
        $user = new User();
        $user_id = $user->authCheck(get_input("email"),get_input("password"));
        if($user_id != false){
            $_SESSION['user_login']['user_id'] = $user_id;
            header("Location: index.php");
        } else {
            $_SESSION["data"] = input_old();
            $_SESSION['messages'] = array("Combination of Email and Password do not match");
        }
    }
}

header("Location: login.php");